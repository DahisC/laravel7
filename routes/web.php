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
Route::resource('/news', 'NewsResourceController')->middleware('auth');
Route::get('/news/delete/{news}', 'NewsResourceController@delete');
Route::get('/contact/store', 'ContactController@store');

// Route::delete('news/{news}', 'NewsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
