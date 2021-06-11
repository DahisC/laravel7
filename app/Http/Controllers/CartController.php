<?php

namespace App\Http\Controllers;

use App\Orders;
use GuzzleHttp;
use App\Product;
use Carbon\Carbon;
use App\OrderItems;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



/*
    https://github.com/Crinsane/LaravelShoppingcart/issues/367
    如果用 api 接收請求的話，laravel 預設通過 api 路由時都會重新產生一個 session 而不會使用 cookie 中存取的 session
    為了解決此問題，需要到 app/kernel.php 底下開啟下列的 middleware 以捕獲 cookie 中的 session

    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
*/

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view('cart.step1', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->productId);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->images[0]->url,
            ],
        ])->associate('App\Product');
        return response('Item has been added to cart.', 200);
    }
    public function clear()
    {
        \Cart::clear();
        return response('Cart cleared!', 200);
    }
    public function updateQuantity(Request $request)
    {
        \Cart::update($request->productId, [
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ]);
    }
    public function delete($productId)
    {
        \Cart::remove($productId);
        return response(compact('productId'));
    }
    public function check1()
    {
        return view('cart.step2');
    }
    public function step2()
    {
        return view('cart.step2');
    }
    public function check2(Request $request)
    {
        foreach (array_keys($request->all()) as $requestkey) {
            Session::put($requestkey, $request[$requestkey]);
        }
        // Session::put('payment_method', $request->payment_method);
        // Session::put('shipping_method', $request->logistics_method);
        return redirect()->route('cart.step3');
    }
    public function step3()
    {

        return view('cart.step3');
    }
    public function check3(Request $request)
    {
        foreach (array_keys($request->all()) as $requestkey) {
            Session::put($requestkey, $request[$requestkey]);
        }
        return redirect()->route('cart.step4');
    }
    public function step4()
    {

        return view('cart.step4');
    }
    public function check4()
    {
        $shipping_fee = 60;
        $cartItems = \Cart::getContent();
        // dd(Session::all(), \Cart::getContent(), \Cart::getTotal());
        $order = Orders::create([
            'order_no' => 'D' . Carbon::now()->timestamp,
            'user_id' => Auth::user()->id ?? null,
            'payment_method' => Session::get('payment_method'),
            'shipping_method' => Session::get('shipping_method'),
            'shipping_fee' => $shipping_fee,
            'payment_method' => Session::get('payment_method'),
            'recipient_email' => Session::get('email'),
            'recipient_name' => Session::get('name'),
            'recipient_phone' => Session::get('payment_method'),
            'recipient_county' => Session::get('county'),
            'recipient_district' => Session::get('district'),
            'recipient_zipcode' => Session::get('zipcode'),
            'recipient_address' => Session::get('address'),
            'total_price' => \Cart::getTotal() + $shipping_fee,
        ]);
        foreach ($cartItems as $cartItem) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'name' => $cartItem->name,
                'image' => $cartItem->attributes->image,
                'quantity' => $cartItem->quantity,
                'unit_price' => $cartItem->price,
            ]);
        }
        $this->ecpay($order->id);
        return redirect()->route('cart.step4');
    }
    private function ecpay($orderId)
    {
        $host = request()->getSchemeAndHttpHost();
        $order = Orders::with('items')->find($orderId);
        $orderObject = [
            'ChoosePayment' => 'Credit',
            'EncryptType' => 1,
            'ItemName' => 'Dahis',
            'MerchantID' => '2000132',
            'MerchantTradeDate' => date("Y/m/d H:i:s"),
            'MerchantTradeNo' => $order->order_no,
            'PaymentType' => 'aio',
            'ReturnURL' => $host . '/ecpay/paid',
            'TotalAmount' => 123,
            'TradeDesc' => '測試'
        ];

        $step3 = http_build_query($orderObject); // http_build_query 會在過程中先 encode 一次
        $step3 = urldecode($step3); // 所以需要在這邊將 encode 過的符號重新轉譯
        $step3 = 'HashKey=5294y06JbISpM5x9&' . $step3 . '&HashIV=v77hoKGq4kWxNNIS'; // 在頭尾加入 hash
        $step3 = urlencode($step3); // 重新對整個 query string 編碼
        $step4 = strtolower($step3); // 轉成小寫

        // 根據綠界的規定轉譯符號
        $step5 = $step4;
        $step5 = str_replace('%2d', '-', $step5);
        $step5 = str_replace('%5f', '_', $step5);
        $step5 = str_replace('%2e', '.', $step5);
        $step5 = str_replace('%21', '!', $step5);
        $step5 = str_replace('%2a', '*', $step5);
        $step5 = str_replace('%28', '(', $step5);
        $step5 = str_replace('%29', ')', $step5);

        $step6 = hash('sha256', $step5); // 以 sha256 加密

        $step7 = strtoupper($step6); // 轉成大寫

        $orderObject['CheckMacValue'] = $step7;

        Session::flash('ecpay', $orderObject); // 透過 Session::flash 將結果存回頁面並放入 form 表單中
        return redirect()->route('cart.step4'); // 導回時應該要自動幫使用者送出 form 表單
    }
    private function getCheckMacValue()
    {
    }
}
