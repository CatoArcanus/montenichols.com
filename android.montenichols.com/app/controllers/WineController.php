<?php

class WineController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
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
		die();
		//return View::make('wine/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('wine/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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
		return Redirect::to('wine/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}