<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index () {
		return View::make ('home/home');
	}
	
	public function login () {
		// laravel's Auth expects passwords to be hashed
		
		$credentials = array (
			'username' => Input::get ('username'),
			'password' => Input::get ('password')
		);
		
		// Log in puts the default trim size in the session
		if (Auth::attempt ($credentials)) {
			$user = (Auth::getUser());
			//return Redirect::route ('profile');
			return Redirect::route ('form');
		} else {
		
			Session::put('database', 'development');			
			return Redirect::to ('/')
				->with ('flash_notice', 'Login failed.')
				->with('flash_type', 'failure');
		}
	}
	
	public function logout () {
		Auth::logout ();
		return Redirect::to ('/')
			->with ('flash_notice', 'Logged out.');
	}
	
	public function form () {
		return View::make ('forms/form');
	}
}