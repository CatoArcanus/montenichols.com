<?php

class Employee extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'employee';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array ('password');
	
	protected $primaryKey = 'id'; // laravel defaults to 'email'

	/**
	 * Get the Approvals for the employee.
	 *
	 * @return approvals
	 */
	public function approvals()
	{
		return $this->hasMany('Approval', 'approver', 'id');
	}

}
