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
        $cartItems = \Cart::session(Session::getId())->getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->productId);
        \Cart::session(Session::getId())->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->image
            ],
            // 'associatedModel' => 'Product'
        ])->associate('App\Product');
        return response('Item has been added to cart.', 200);
    }
    public function clear()
    {
        \Cart::session(Session::getId())->clear();
        return response('Cart cleared!', 200);
    }
    public function update()
    {
    }
}
