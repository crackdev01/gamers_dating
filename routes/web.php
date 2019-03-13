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
Route::get('/', 'PageController@landingpage');
Route::get('/home', 'PageController@homepage');
Route::get('/profile', 'PageController@profilepage');
Route::get('/personal', 'PageController@personalpage');
Route::get('/chat', 'PageController@chatpage');
Route::get('/event', 'PageController@eventpage');
Route::get('/admin', 'PageController@adminpage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
