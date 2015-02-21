<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchInspectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_inspection', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('batch');			//PK
			$table->string('code_letter', 1);
			$table->smallInteger('size');		
			$table->tinyInteger('aql_min');		
			$table->tinyInteger('aql_max');		
			$table->integer('heat_seal');		//FK	
			$table->integer('contents');		//FK	
			$table->integer('particulate');		//FK 	
			$table->integer('burst_strength');	//FK 	
			$table->integer('comment');			//N  FK 	
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
		Schema::drop('batch_inspection');
	}

}
