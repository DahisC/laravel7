<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index');

// Route::view('/news', 'news/index');

Route::get('/news', 'NewsController@index');
Route::view('/news/admin', 'news/admin');
Route::post('/news/create', 'NewsController@create');
Route::get('/news/update/{id}', 'NewsController@updateForm');
Route::get('/news/delete/{id}/', 'NewsController@delete');

Route::get('/news/{id}', 'NewsController@content');

// Route::get('/test', function () {
//     $name = 'Dahis';
//     return view('test', compact('name')); // compact 相當於建立一個變數名稱與值相同的物件
//     // return view('test', ['name' => $name]);
//     // return view('test')->with('name', 'Dahis'); // 上述兩種寫法等價！！
// });
