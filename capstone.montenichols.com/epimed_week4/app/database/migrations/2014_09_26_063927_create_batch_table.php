<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch', function(Blueprint $table)
		{
			$table->increments('id');		//PK
			$table->string('product', 16);	//FK
			$table->integer('inspection');	//FK
			$table->integer('comment');		//N  FK		
			$table->integer('sealed_by');	//FK	
			$table->timestamp('sealed_date');
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
		Schema::drop('batch');
	}

}
