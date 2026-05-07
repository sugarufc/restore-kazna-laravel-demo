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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['admin', 'demo.writes']], function(){
    Route::get('/', 'OtdelController@index')->name('admin.index');
    Route::resource('/ip', 'IpaddressController');
    Route::resource('/otdel', 'OtdelController');
    Route::resource('/worker', 'WorkerController');
    Route::resource('/page', 'PageController');
    Route::get('/settings', 'MainController@settings')->name('settings');
});


Route::get('/', 'MainController@index')->name('home');
Route::get('/workers', 'MainController@workers')->name('workers');
Route::get('/workers/{id}', 'MainController@worker')->name('worker');
Route::get('/ip', 'MainController@ip')->name('ip');

Route::group(['middleware'=>'guest'], function (){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@loginAuth')->name('login.auth');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
