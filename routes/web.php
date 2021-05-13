<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsResourceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');
Route::resource('/news', 'NewsResourceController');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // prefix 是網址前綴
    // as 是路由名稱前綴
    // names 是路由名稱
    // parameters 是路由變數
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/news', 'AdminNewsController');
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::resource('/type', 'AdminProductTypeController');
        Route::resource('/', 'AdminProductController')->parameters(['' => 'product']);
    });
});

Auth::routes();
