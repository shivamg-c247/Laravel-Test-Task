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

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

/* === Default === */
Route::group(['middleware'=>['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
});


/* === Admin Routing === */
Route::group(['middleware'=>['admin']], function () {

	Route::get('admin/dashboard/user', 'User\DashboardController@index')->name('dashboard');
	Route::get('admin/dashboard/user', 'User\DashboardController@customersList')->name('customerslist');

	Route::get('admin/dashboard/products', 'Products\DashboardController@index')->name('products');
	Route::get('admin/dashboard/products', 'Products\DashboardController@productsList')->name('productslist');

	Route::get('admin/dashboard', 'Orders\DashboardController@index')->name('orders');
	Route::get('admin/dashboard', 'Orders\DashboardController@ordersList')->name('orderslist');
	Route::get('admin/dashboard/show/{id}', 'Orders\DashboardController@show')->name('show');
});


/* === Customer/User Routing === */
Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['user']], function () {
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('dashboard', 'DashboardController@customersList')->name('customerslist');
});


/* === Manager Routing === */
Route::group(['middleware'=>['manager']], function () {
	
	Route::get('products/dashboard', 'Products\DashboardController@index')->name('products');
	Route::get('products/dashboard', 'Products\DashboardController@productsList')->name('productslist');

	Route::get('orders/dashboard', 'Orders\DashboardController@index')->name('orders');
	Route::get('orders/dashboard', 'Orders\DashboardController@ordersList')->name('orderslist');
	Route::get('orders/dashboard/show/{id}', 'Orders\DashboardController@show')->name('show');
});
