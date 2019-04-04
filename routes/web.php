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
//Route::get('/home', 'PageController@homepage');
Route::get('/profile', 'PageController@profilepage');
Route::get('/personal', 'PageController@personalpage');
Route::get('/personaledit', 'PageController@personaleditpage');
Route::get('/chat', 'PageController@chatpage');
Route::get('/event', 'PageController@eventpage');
Route::get('/admin', 'PageController@adminpage');
Route::get('/apigame', 'GamesController@index');
Auth::routes();

Route::get('/addevent/{event_id}', 'EventsController@addEvent');
// Route::get('/deleteevent', 'EventsController@deleteEvent');
// Route::get('/events/index', 'EventsController@show');
Route::resource('events', 'EventsController');
Route::resource('games', 'GamesController');
Route::resource('personalpages', 'PersonalPagesController');
Route::resource('profilepages', 'ProfilePagesController');
Route::get('/home', 'HomeController@index')->name('home');

//chat routes
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

//ajax route for adding date to database and show date
Route::get('/personalpages',function(){ return view('personal_profile'); });
Route::post('/getdates','AjaxController@index');

//ajax route for filter the database and show the dates
Route::get('/personalpages',function(){ return view('personal_profile'); });
Route::post('/findyourmatch','AjaxController@findyourmatch');
