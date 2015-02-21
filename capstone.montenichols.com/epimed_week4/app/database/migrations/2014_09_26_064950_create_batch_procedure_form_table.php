<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchProcedureFormTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_procedure_form', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('batch');			//PK FK
			$table->integer('prodecure_form');	//PK FK
			//$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batch_procedure_form');
	}

}
