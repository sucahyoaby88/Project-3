<?php

use Illuminate\Http\Request;

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

Route::post('/simpan_kelas','Kelascontroller@store');

Route::get('/tampil_siswa','Siswacontroller@show')->middleware('jwt.verify');
Route::post('/simpan_siswa','Siswacontroller@store')->middleware('jwt.verify');
Route::put('/ubah_siswa/{id}','Siswacontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_siswa/{id}','Siswacontroller@destroy')->middleware('jwt.verify');

Route::post('/simpan_kontak','Kontakcontroller@store');
Route::get('/tampil_kontak','Kontakcontroller@show');
Route::get('/join_kontak','Kontakcontroller@show2');
Route::put('/update_kontak/{id}','Kontakcontroller@edit');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('book', 'BookController@book');

Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
 