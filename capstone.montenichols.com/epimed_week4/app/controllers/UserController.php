<?php

class UserController extends BaseController {

/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$users = DB::table($user->get_table())->get();
		return View::make ('admin/users/index', array(
			'users' => $users
		));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() 
	{		
		return View::make('admin/users/create', array (
		
		));
	}
	
	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function store()
	{
		/*
		// validate
		$rules = array(
			'username' => 'required|unique:users,username|min:3',
			'email' => 'required|between:3,64|email|unique:users,email',
			'password' => 'required|alphaNum|min:4|confirmed',
			'password_confirmation' => 'required|alphaNum|min:4',
			'privs' => 'required'
		);

		//Process the validator based on the rules
		$validator = Validator::make(Input::all(), $rules);
		//Get any messages
		$messages = $validator->messages();
		//process the validator
		if ($validator->fails()) {
			return Redirect::to('users')
				->with ('flash_notice', 'User creation failed '.$messages)
				->with('flash_type', 'failure');
		} else {
			
			// store user
			$input = Input::all();
			$this->storeUser($input);
						
			// redirect			
			return Redirect::to('users')
				->with ('flash_notice', 'User Created Successfully')
				->with('flash_type', 'success');
		}
		*/
		
		var_dump("not implemented");
		die();
	}	

	/**
	 * Display the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where ('id', $id)->firstOrFail();
				
		return View::make ('admin/users/show', array(
			'user' => $user
		));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where ('id', $id)->firstOrFail();
		
		return View::make ('admin/users/edit', array (
			'user' => $user,		
		));
	}

	
	
	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		/*
		$input = Input::except('_token');
			
		$user = User::where ('id', $input['id'])->firstOrFail();	
		
		$user->delete();
		// redirect
		die ('OK');
		*/
	}	
}