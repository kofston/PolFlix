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

Route::get('/', 'SliderController@index');
Route::get('/category', 'CategoryController@show_video');
Route::get('/product', 'ProductController@show_product');
Route::get('/product/findVideo', 'ProductController@findVideo');
Route::get('/pricer', 'PriceController@index');
Route::get('/regul', 'RegulController@index');
Route::get('/product/like/{movie_id}', 'ProductController@like');
Route::get('/login/register', 'LoginController@register');
Route::post('/login/signin', 'LoginController@signin');
Route::post('/login/signup', 'LoginController@signup');
Route::post('/login/sessionlog', 'LoginController@sessionlog');
Route::get('/login/unlog', 'LoginController@unlog');
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/delete/{client_id}', 'ProfileController@delete');
Route::get('/rent', 'RentController@index');
Route::get('/admin/panel', 'AdminController@AdminPanel');
Route::get('/admin/send_reminder/{client_email}', 'AdminController@send_reminder');
Route::get('/admin/delete_movie/{movie_id}', 'AdminController@delete_movie');
Route::get('/admin/add_movie/{movie_id}', 'AdminController@add_movie');
Route::post('/admin/add_movie_form', 'AdminController@add_movie_form');
Route::get('/admin/return/{client_id}/{movie_id}', 'AdminController@returnmovie');
Route::post('/login/forgot_pass', 'LoginController@forgot_pass');
Route::get('/about_us', function () {
    return view('header').view('aboutus').view('footer');
});
Route::get('/login/tester', 'LoginController@tester');
