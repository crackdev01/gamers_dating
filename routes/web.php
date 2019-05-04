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

// Route::get('/addevent/{event_id}', 'EventsController@addEvent');
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

//ajax route for password update
// Route::get('/',function(){ return view('personal_profile'); });
Route::post('/changepassword','AjaxController@changePassword');

//ajax route for join an event, saves in database and shows result of join
//Route::get('/codeincludes',function(){ return view('eventpage'); });
Route::post('/addevent','AjaxController@addevent');

//ajax route for join an event, saves in database and shows result of join
//Route::get('/codeincludes',function(){ return view('eventpage'); });
Route::post('/getprofile','AjaxController@getProfile');

//ajax route for live search in the games
Route::get('/live_search', 'AjaxController@liveSearch'); 
Route::post('/live_search', 'AjaxController@liveSearch');

//ajax route for add live search in the games users table
Route::get('/my_games', 'AjaxController@myGames'); 
Route::post('/my_games', 'AjaxController@myGames');
