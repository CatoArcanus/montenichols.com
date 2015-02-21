<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up () {
		Schema::create ('users', function (Blueprint $table) {
			$table->increments ('id');
			$table->string ('username', 255);
			$table->string ('password', 255);
			$table->string ('email');
			$table->enum ('privs', array ('customer', 'QC', 'moderator', 'admin', 'superadmin'));
			$table->enum ('status', array ('unlocked', 'locked'));
			$table->timestamp ('expires_at');
			$table->timestamps (); // created_at and updated_at
		});		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down () {
		Schema::drop ('users');	
	}
	
}
