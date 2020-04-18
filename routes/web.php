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

Route::get('/', function () {
    return view('header').view('homepage').view('footer');
});
Route::get('/category', 'CategoryController@show_video');
Route::get('/product', 'ProductController@show_product');
Route::get('/pricer', 'PriceController@index');
Route::get('/regul', 'RegulController@index');
Route::get('/login/register', 'LoginController@register');
Route::post('/login/signin', 'LoginController@signin');
Route::post('/login/signup', 'LoginController@signup');
Route::post('/login/sessionlog', 'LoginController@sessionlog');
Route::get('/login/unlog', 'LoginController@unlog');
