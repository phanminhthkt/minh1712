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
Route::get('dang-nhap.html','user@getLogin')->name('login');
Route::post('dang-nhap.html','user@postLogin')->middleware('check_login');
Route::get('dang-nhap-thanh-cong.html','loginsuccess@index')->name('userinfo');
Route::get('dang-xuat.html','user@getLogout');