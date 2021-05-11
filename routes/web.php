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
    // return view('welcome');
    // return view('auth.login');
    return redirect()->guest('login');
});


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');


// Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
Route::group(['middleware'=>['auth','admin']], function () {
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		Route::get('admin/dashboard', 'User\DashboardController@index')->name('dashboard');
		Route::get('admin/dashboard', 'User\DashboardController@customersList')->name('customerslist');

		// Route::get('/', 'HomeController@index')->name('home');
		Route::get('admin/dashboard', 'Products\DashboardController@index')->name('products');
		Route::get('admin/dashboard', 'Products\DashboardController@productsList')->name('productslist');

		Route::get('admin/dashboard', 'Orders\DashboardController@index')->name('orders');
		Route::get('admin/dashboard', 'Orders\DashboardController@ordersList')->name('orderslist');
});


// Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function () {
Route::group(['middleware'=>['auth','user']], function () {
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('user/dashboard', 'User\DashboardController@index')->name('dashboard');
		Route::get('user/dashboard', 'User\DashboardController@customersList')->name('customerslist');
});


Route::group(['middleware'=>['auth','manager']], function () {
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('products/dashboard', 'Products\DashboardController@index')->name('products');
		Route::get('products/dashboard', 'Products\DashboardController@productsList')->name('productslist');

		Route::get('orders/dashboard', 'Orders\DashboardController@index')->name('orders');
		Route::get('orders/dashboard', 'Orders\DashboardController@ordersList')->name('orderslist');
});
