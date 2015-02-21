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
| 
*/
Route::get ('/', array ('as' => 'base', 'uses' => 'HomeController@index'));

//Wine Routing
Route::group (array ('prefix' => 'wine'), function () {
	
	//Get an index of all wines
	Route::get ('/index', function()
	{
	    print_r('{"array":[');			
		$wines = Wine::all();
		$total = count($wines);
		$i=0;
		foreach($wines as $wine)
		{
			$i++;
			print_r($wine->toJson());			
			if ($i != $total) print_r(" , ");
		}
		print_r(']}');
	});
/*
	//Get the specific table entry
	Route::get ('/show/{id}', function($id)
	{
		$wine = Wine::findOrFail($id);
		print_r($wine->toJson());			
	});
*/
	//POST: delete a wine
	Route::get('/delete/{id}', function($id)
	{
		// delete
		echo ("ding");	
		//$input = Input::all();
		var_dump ($id);
		$wine = Wine::findOrFail($id);
		var_dump($wine);
		//die();
		$wine->delete();
	});	
	
	//POST: Store a wine 
	Route::post('/store', function()
	{
	    echo ("ding");	
		$input = Input::all();
		var_dump ($input);
		//die();
		$wine = new Wine;
		$wine->name 			= Input::get('name', 'not_working');
		$wine->img_file_path 	= Input::get('img_file_path', 'not_working');
		$wine->varietal 		= Input::get('varietal', 'not_working');
		$wine->region 			= Input::get('region', 'not_working');
		$wine->vintage 			= Input::get('vintage', 'not_working');
		$wine->profile 			= Input::get('profile', 'not_working');
		$wine->color 			= Input::get('color', 'not_working');
		$wine->alcohol_content 	= Input::get('alcohol_content', 'not_working');
		$wine->rating 			= Input::get('rating', 'not_working');
		$wine->save();
	});
	/*
	//POST: update a wine
	Route::get('wine/update/{id}', function($id)
	{
	    echo ("ding");	
		$input = Input::all();
		var_dump ($input);
		//die();
		$wine = Wine::findOrFail($id);
		$wine->name 			= Input::get('name', 'not_working');
		$wine->img_file_path 	= Input::get('img_file_path', 'not_working');
		$wine->varietal 		= Input::get('varietal', 'not_working');
		$wine->region 			= Input::get('region', 'not_working');
		$wine->vintage 			= Input::get('vintage', 'not_working');
		$wine->profile 			= Input::get('profile', 'not_working');
		$wine->color 			= Input::get('color', 'not_working');
		$wine->alcohol_content 	= Input::get('alcohol_content', 'not_working');
		$wine->rating 			= Input::get('rating', 'not_working');
		$wine->save();
	});
	*/
			

});