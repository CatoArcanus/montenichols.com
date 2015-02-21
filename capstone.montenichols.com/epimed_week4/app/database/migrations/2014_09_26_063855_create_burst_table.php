<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBurstTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('burst', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->integer('batch');			//PK FK
			$table->integer('index');			//PK
			$table->time('time');
			$table->integer('pressure');		
			$table->string('location', 4);
			$table->integer('seal_transfer');	//N 	
			$table->boolean('wicking');			//N 	
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
		Schema::drop('burst');
	}

}
