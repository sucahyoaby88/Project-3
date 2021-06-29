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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Login@login');
Route::post('login/cek', 'Login@cek');
Route::get('logout', 'Login@logout');

Route::get('registration', 'Login@registration');

Route::group(['middleware' => 'cek_login'], function(){
    Route::get('dashboard', 'PageController@dashboard');
    Route::get('kontak', 'PageController@kontak');
});
