<?php

namespace App\Http\Controllers;

use App\Product;
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
            'attributes' => array(),
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
    public function step2()
    {
        return view('cart.step2');
    }
    public function check2(Request $request)
    {
        Session::put('payment_method', $request->payment_method);
        Session::put('logistics_method', $request->logistics_method);
        return redirect()->route('cart.step3');
    }
    public function step3()
    {
        return view('cart.step3');
    }
}
