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
Route::get('/admin-home', 'Admin\HomeController@index')->name('admin');
// category based routes
Route::get('/addcat', 'CategoryController@create')->name('addcat');
Route::get('/managecat', 'CategoryController@index')->name('managecat');
Route::post('/savecat','CategoryController@store')->name('savecat');
Route::post('/updatecat/{catid}','CategoryController@update')->name('updatecat');
Route::get('/cat/del/{catid}','CategoryController@destroy')->name('deletecat');
Route::get('/cat/edit/{catid}','CategoryController@edit')->name('editcat');

// user based routes
Route::get('/adduser', 'UserController@create')->name('adduser');
Route::get('/manageuser', 'UserController@index')->name('manageuser');
Route::post('/saveuser','UserController@store')->name('saveuser');
Route::post('/updateuser/{userid}','UserController@update')->name('updateuser');
Route::get('/user/del/{userid}','UserController@destroy')->name('deleteuser');
Route::get('/user/edit/{userid}','UserController@edit')->name('edituser');