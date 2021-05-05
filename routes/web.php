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

Route::view('/', 'index');

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@createForm');
Route::get('/news/update/{id}', 'NewsController@updateForm');
Route::get('/news/delete/{id}/', 'NewsController@delete');
Route::get('/news/{id}', 'NewsController@content');

Route::post('/news/create', 'NewsController@create');
Route::post('/news/update/{id}', 'NewsController@update');
