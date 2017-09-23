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

Route::get('/home', 'HomeController@index')->middleware('manager');


Route::group(['middleware' => 'visitors'], function(){

	Route::get('/', 'LoginController@login');
	Route::post('/login', 'LoginController@postLogin')->name('auth.login');

	//Forgot password routes
	Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgot.password');
	Route::post('/forgot-password', 'ForgotPasswordController@postforgotPassword')->name('forgot-password');
	Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword')->name('reset.password');
	Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@PostResetPassword')->name('reset-password');

});

// Manager Routes
Route::group(['middleware' => 'manager'], function(){

	Route::get('/manager-test', function(){

		return 'hello';

	});

});

Route::get('/register', 'RegistrationController@register');
Route::post('/register', 'RegistrationController@postRegister')->name('auth.register');
Route::get('/userlist', 'RegistrationController@index')->name('user.list');

Route::post('/logout', 'LoginController@logout')->name('logout');

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

//Admin routes
Route::get('/admin/index', 'AdminController@index')->name('admin');

//Products routes

Route::get('/product/create/{id?}', 'ProductsController@create')->name('product.create');
Route::get('/product/index', 'ProductsController@index')->name('product.index');
Route::post('/product/store/{id?}', 'ProductsController@store')->name('product.store');
Route::get('/product/delete/{id}', 'ProductsController@delete')->name('product.delete');

//Sells routes
Route::get('/sells/index', 'SellsController@index')->name('sells.index');

//suppliers routes
Route::get('/suppliers/index', 'SuppliersController@index')->name('suppliers.index');
Route::get('/suppliers/create/{id?}', 'SuppliersController@create')->name('suppliers.create');
Route::post('/suppliers/store/{id?}', 'SuppliersController@store')->name('suppliers.store');
Route::get('/suppliers/delete/{id}', 'SuppliersController@delete')->name('suppliers.delete');

//Category routes
Route::get('/category/index', 'CategoryController@index')->name('category.index');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::post('/category/store', 'CategoryController@store')->name('category.store');

//Orders Routes
Route::post('/order/store', 'OrdersController@store')->name('order.store');
Route::get('/order/delete/{id}', 'OrdersController@delete')->name('order.delete');
