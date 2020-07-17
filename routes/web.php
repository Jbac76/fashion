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

Route::get('/addcat', 'CategoryController@create')->name('addcat');
Route::get('/managecat', 'CategoryController@index')->name('managecat');