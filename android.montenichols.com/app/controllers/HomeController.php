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

	public function index()
	{		
		print_r('{"array":[');		
		$users = User::all();
		foreach($users as $user)
		{
			print_r($user->toJson());			
		}
		print_r(" , ");
		$wines = Wine::all();
		foreach($wines as $wine)
		{
			print_r($wine->toJson());
		}
		print_r(']}');
		//die();
		//return View::make('wine/create');
	}
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		/*$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {*/
			// store
		/*$inputs = Input::all();
		foreach($inputs as $input)
		{
		//var_dump($input);
		//die();
			$wine = new Wine;
			$wine->name = $input('name');
			$wine->img_file_path = $input('img_file_path');			
			$wine->varietal = $input('varietal');			
			$wine->region = $input('region');			
			$wine->vintage = $input('vintage');			
			$wine->profile = $input('profile');			
			$wine->color = $input('color');			
			$wine->alcohol_content = $input('alcohol_content');
			$wine->rating = $input('rating');			
			$wine->save();			
		//}
		}*/
		/*$input = Input::all();
		$wine = new Wine;
		$wine->name = $input('name');
		$wine->img_file_path = $input('img_file_path');			
		$wine->varietal = $input('varietal');			
		$wine->region = $input('region');			
		$wine->vintage = $input('vintage');			
		$wine->profile = $input('profile');			
		$wine->color = $input('color');			
		$wine->alcohol_content = $input('alcohol_content');
		$wine->rating = $input('rating');			
		$wine->save();*/
		$wine = new Wine;
		$wine->name = Input::get('name', 'not_working');
		$wine->img_file_path = Input::get('img_file_path');			
		$wine->varietal = Input::get('varietal');			
		$wine->region = Input::get('region');			
		$wine->vintage = Input::get('vintage');			
		$wine->profile = Input::get('profile');			
		$wine->color = Input::get('color');			
		$wine->alcohol_content = Input::get('alcohol_content');
		$wine->rating = Input::get('rating');			
		$wine->save();	
		// redirect
		Session::flash('message', 'Successfully created wine!');
		return Redirect::to('base');
	}
}