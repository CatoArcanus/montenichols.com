<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Standard route for guests 
|--------------------------------------------------------------------------
| /
| login
| logout
| 
*/

Route::get ('/', 		array('as' => 'base', 	'uses' => 'HomeController@index'));
Route::post('login', 	array('as' => 'login', 	'uses' => 'HomeController@login'))->before ('not_authd')->before ('csrf');
Route::get ('logout', 	array('as' => 'logout', 'uses' => 'HomeController@logout'));
Route::get ('form', 	array('as' => 'form', 	'uses' => 'HomeController@form'))->before('auth');	

/*
|--------------------------------------------------------------------------
| User Route group -- this is for users (users encompasses everyone with a login)
|--------------------------------------------------------------------------
| user/profile
| user/edit_profile
| 
*/

// profile group
/*
Route::group (array ('before' => 'auth', 'prefix' => 'profile'), function () {
//Route::group (array ('prefix' => 'profile'), function () {
	Route::get ('/', 		array('as' => 'profile', 		'uses' => 'ProfileController@index'));
	Route::get ('/edit', 	array('as' => 'edit_profile', 	'uses' => 'ProfileController@edit'));
	Route::post('/update', 	array('as' => 'update_password','uses' => 'ProfileController@update'));	
	
});
*/
//Route::group (array ('before' => 'auth', 'prefix' => 'forms'), function () {

//Route::group (array (/*'before' => 'auth',*/ 'prefix' => 'forms'), function () {
	
//});

//moderator group
/*
Route::group (array('before' => 'moderator', 'prefix' => 'moderator'), function() {	
	// users group
	Route::group (array('prefix' => 'users'), function() {
		Route::get ('/', 			array( 'as' => 'users', 		'uses' => 'UserController@index'));
		Route::get ('/create', 		array( 'as' => 'create_user', 	'uses' => 'UserController@create'));
		Route::post('/store', 		array( 'as' => 'store_user', 	'uses' => 'UserController@store'));
		Route::get ('/{id}', 		array( 'as' => 'show_user', 	'uses' => 'UserController@show'));
		Route::get ('/{id}/edit', 	array( 'as' => 'edit_user', 	'uses' => 'UserController@edit'));
		Route::put ('/{id}/update', array( 'as' => 'update_user', 	'uses' => 'UserController@update'));
		Route::delete('/delete', 	array( 'as' => 'delete_user', 	'uses' => 'UserController@destroy'));
	});	
});
*/