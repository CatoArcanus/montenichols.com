<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerationPouchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generation_pouch', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('pouch');		//PK FK
			$table->integer('generation');	//PK FK
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
		Schema::drop('generation_pouch');
	}

}
