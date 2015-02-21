<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeatSealTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('heat_seal', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->string('product', 16);		//PK FK
			$table->integer('target');
			$table->integer('alert');
			$table->integer('action');
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
		Schema::drop('heat_seal');
	}

}
