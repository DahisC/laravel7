<?php

use App\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/uploadImage', function (Request $request) {
    if ($request->hasFile('uploaded_img')) {
        $pathArray = helpers::uploadFile($request->file('uploaded_img'),);
        return response()->json([
            'url' => $pathArray
        ]);
    } else {
        return response('Failed', 400);
    }
});

Route::group(['prefix' => 'cart'], function () {
    Route::post('/add', 'CartController@add')->name('api.cart.add');
    Route::delete('/clear', 'CartController@clear')->name('api.cart.clear');
    Route::delete('/{productId}', 'CartController@delete')->name('api.cart.delete');
    Route::patch('/updateQuantity', 'CartController@updateQuantity')->name('api.cart.updateQuantity');
});

Route::group(['prefix' => 'ecpay'], function () {
    Route::post('/paid', 'ECPayController@paid');
});
