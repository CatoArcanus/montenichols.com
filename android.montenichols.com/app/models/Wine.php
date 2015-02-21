<?php

class Wine extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wines';

	protected $primaryKey = 'id'; // laravel defaults to 'email'

	public $timestamps = false;

}