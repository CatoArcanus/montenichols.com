<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSterilizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sterilization', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('batch');		//PK FK
			$table->integer('sterlizer');
			$table->timestamp('date');
			$table->string('work_order', 10);
			$table->integer('quantity');		
			$table->integer('approval');	//N  FK		
			
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
		Schema::drop('sterilization');
	}

}
