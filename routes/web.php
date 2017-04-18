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


// admin
Route::group(['namespace' => 'Admin'], function () {
    Route::any('admin/login', 'LoginController@login');
    Route::get('admin/code', 'LoginController@code');
    Route::get('admin/getcode', 'LoginController@getcode');
    Route::get('admin/index', 'IndexController@index');
    Route::get('admin/pass', 'IndexController@pass');
    Route::any('admin/info', 'IndexController@info');

    Route::get('admin/test', 'LoginController@test');
});