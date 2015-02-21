<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up () {
		Schema::create ('wines', function (Blueprint $table) {
			$table->increments ('id');
			$table->string ('name', 255);
			$table->string ('img_file_path', 255);
			$table->string ('varietal', 255);
			$table->string ('region', 255);
			$table->string ('vintage', 255);
			$table->string ('profile', 255);
			$table->string ('color', 255);
			$table->string ('alcohol_content', 255);
			$table->string ('rating', 255);			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down () {
		Schema::drop ('wines');
	}
	
}
