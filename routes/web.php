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
Route::get('dang-nhap.html','user@getLogin')->name('login');
Route::post('dang-nhap.html','user@postLogin');
Route::get('dang-nhap-thanh-cong.html','LoginSuccessController@index')->middleware('Check_loginsuccess')->name("Userinfo");
Route::get('dang-xuat.html','user@getLogout');
Route::get('dang-ky.html','user@getRegister');
Route::post('dang-ky.html','user@postRegister')->middleware('Check_register');
Route::post('thong-tin-tai-khoan.html','user@postUpdateUser')->middleware('Check_update_user');
Route::get('doi-mat-khau.html','user@getUpdatePassword');
Route::post('doi-mat-khau.html','user@postUpdatePassword')->middleware('Check_update_password');