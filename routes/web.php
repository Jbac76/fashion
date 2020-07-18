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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// backend routes
Route::get('/admin', 'Admin\HomeController@index')->name('admin');

// category based routes
Route::get('/create-category', 'Admin\CategoryController@create')->name('addcat');
Route::get('/manage-category', 'Admin\CategoryController@index')->name('managecat');
Route::post('/savecat','Admin\CategoryController@store')->name('savecat');
Route::post('/updatecat/{category_id}','Admin\CategoryController@update')->name('updatecat');
Route::get('/category/del/{category_id}','Admin\CategoryController@destroy')->name('deletecat');
Route::get('/category/edit/{category_id}','Admin\CategoryController@edit')->name('editcat');

// user based routes
Route::get('/adduser', 'Admin\UserController@create')->name('adduser');
Route::get('/manageuser', 'Admin\UserController@index')->name('manageuser');
Route::post('/saveuser','Admin\UserController@store')->name('saveuser');
Route::post('/updateuser/{user_id}','Admin\UserController@update')->name('updateuser');
Route::get('/user/del/{user_id}','Admin\UserController@destroy')->name('deleteuser');
Route::get('/user/edit/{user_id}','Admin\UserController@edit')->name('edituser');

// product based routes
Route::get('/add-product', 'Admin\ProductController@create')->name('addproduct');
Route::get('/manage-product', 'Admin\ProductController@index')->name('manageproduct');
Route::post('/saveproduct','Admin\ProductController@store')->name('saveproduct');
Route::post('/update-product/{product_id}','Admin\ProductController@update')->name('updateproduct');
Route::get('/product/del/{product_id}','Admin\ProductController@destroy')->name('deleteproduct');
Route::get('/product/edit/{product_id}','Admin\ProductController@edit')->name('editproduct');