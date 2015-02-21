<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestructionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('destruction', function(Blueprint $table)
		{
			$table->increments('id');		//PK
			$table->integer('destoyer');	//FK
			$table->integer('amount');
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
		Schema::drop('destruction');
	}

}
