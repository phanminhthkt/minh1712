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
Route::group(['as' =>'Backend','namespace' => 'Backend'], function(){
	Route::get('/admin/login','UserController@GetLogin')->name(".Login")->middleware('CheckLogged');
	Route::post('/admin/login','UserController@PostLogin');
	Route::group(['middleware'=>['CheckLogin']],function(){
		Route::get('/admin',[
			'as' =>'.Dashboard',
			'uses'=>'IndexController@index'
		]);
		Route::get('/admin/logout','UserController@Logout');
		/*Product */
		/*Show view list product */
		Route::get('/admin/product/',[
		    'as' => '.Product.index',
		    'uses' => 'ProductController@show'
		]);
		/*Thực  thi add*/
		Route::post('/admin/product/','ProductController@store')->name('.Product.store');
		/*Show view add product */
		Route::get('/admin/product/add','ProductController@create');
		/*Show view edit product */
		Route::get('/admin/product/edit/{id}','ProductController@edit')->where('id','[0-9]+');
		/*Delete product */
		Route::get('/admin/product/del/{id}','ProductController@delete')->where('id','[0-9]+');
		/*Delete list product */
		Route::post('/admin/product/delall','ProductController@delete_all')->name('.Product.deleteAll');
		/*Thực  thi edit*/
		Route::post('/admin/product/update',[
			'as' => '.Product.update',
			'uses' => 'ProductController@update'
		]);
		Route::post('/admin/product/ajax_status',[
			'as' => '.Product.ajax',
			'uses' => 'ProductController@ajax_status'
		]);
		/*End Product */
		// Route::resource('product','ProductController');
	});
});


// Route::get('dang-nhap.html','UserController@getLogin')->name('login');
// Route::post('dang-nhap.html','UserController@postLogin');
// Route::get('dang-nhap-thanh-cong.html','LoginSuccessController@index')->middleware('Check_loginsuccess')->name("Userinfo");
// Route::get('dang-xuat.html','UserController@getLogout');
// Route::get('dang-ky.html','UserController@getRegister');
// Route::post('dang-ky.html','UserController@postRegister')->middleware('Check_register');
// Route::post('thong-tin-tai-khoan.html','UserController@postUpdateUser')->middleware('Check_update_user');
// Route::get('doi-mat-khau.html','UserController@getUpdatePassword');
// Route::post('doi-mat-khau.html','UserController@postUpdatePassword')->middleware('Check_update_password');


// Route::get('/home', 'HomeController@index')->name('home');
