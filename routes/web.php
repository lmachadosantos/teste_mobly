<?php

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

Route::get('/', 'HomeController@index');

Route::get('/search/{id}', 'HomeController@index');

Route::get('/request/', 'RequestController@index');

Route::get('/request/add', 'RequestController@add');

Route::get('/request/update-item', 'RequestController@updateItem');

Route::get('/request/delete-item', 'RequestController@deleteItem');

Route::get('/request/close', 'RequestController@close');

Route::get('/request/finish', 'RequestController@finish');

Route::get('/product/{id}', 'ProductController@index');
