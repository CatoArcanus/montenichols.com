<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard ();
		if (App::environment () === 'development') {
			$this->command->info ('Seeding `users` table...');
			$this->call('UserTableSeeder');
			$this->command->info ('OK');

			$this->command->info ('Seeding `wines` table...');
			$this->call('WineTableSeeder');
			$this->command->info ('OK');
		}
	}

}

class UserTableSeeder extends Seeder {
	public function run () {
		DB::table('users')->delete ();
		User::create (array (
			'username' => 'superadmin',
			'password' => Hash::make ('qwerty'),
			'privs' => 'superadmin',
			'status' => 'unlocked',
			'primary_avatar' => '1',
			'updater_config_id' => '1',
			'expires_at' => null
		));		
	}
}

class WineTableSeeder extends Seeder {
	public function run () {
		DB::table('wines')->delete ();
		Wine::create (array (
			'name' => '96-West',
			'img_file_path' => 'img.myIMG.png',
			'varietal' => 'Tempranillo',
			'region' => 'Texas',
			'vintage' => '2012',
			'profile' => 'bold, nutty, black-cherry',
			'color' => 'Plum',
			'alcohol_content' => '14.5%',
			'rating' => '5'
		));		
	}
}