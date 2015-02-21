<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generation', function(Blueprint $table)
		{
			$table->increments('id');		//PK
			$table->integer('generator');	//FK
			$table->integer('approval');	
			$table->integer('amount');	
			$table->integer('used');	
			$table->timestamp('date');
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
		Schema::drop('generation');
	}

}
