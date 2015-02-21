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

			$this->command->info ('Seeding `BatchForm` tables...');
			$this->call('BatchFormSeeder');
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
			'email' => 'superadmin@gmail.com',
			'privs' => 'superadmin',
			'status' => 'unlocked',
			'expires_at' => null
		));
		
	}
}

class BatchFormSeeder extends Seeder {
	public function run () {
		DB::table('employee')->delete ();
		//DB::table('permission_group')->delete ();
		//DB::table('expiration')->delete ();
		DB::table('approval')->delete ();
		DB::table('destruction')->delete ();
		DB::table('pouch')->delete ();
		DB::table('generation')->delete ();
		DB::table('sterilization')->delete ();
		DB::table('heat_seal')->delete ();
		DB::table('carton')->delete ();
		DB::table('carton_generation')->delete ();
		DB::table('comment')->delete ();
		DB::table('burst')->delete ();
		DB::table('batch')->delete ();
		DB::table('product')->delete ();
		DB::table('batch_machine')->delete ();
		DB::table('machine')->delete ();
		//DB::table('machine_high_temp')->delete ();
		//DB::table('machine_heat')->delete ();
		DB::table('machine_dwell')->delete ();
		//DB::table('machine_pressure')->delete ();
		DB::table('generation_pouch')->delete ();
		//DB::table('batch_procedure')->delete ();
		//DB::table('employee_procedure')->delete ();
		DB::table('batch_inspection')->delete ();
		DB::table('inspection')->delete ();
		//DB::table('procedure')->delete ();
		//DB::table('procedure_list')->delete ();
		//DB::table('procedure_form')->delete ();
		
		Batch::create (array (
			'product' => '18g x 3.5" Rx Coat',
			'inspection' => 1,
			/* 'comment' => 1, */
			'sealed_by' => 2 /*,	//octavian
			'sealed_date' => ''*/
		));

		Product::create (array (
			'lot' => 12186485,
			'name' => '18g x 3.5" Rx Coat'
		));

		Inspection::create (array (
			'approval' => 1,
			'pass' => true,
			'rejected' => 0
		));

		Batch_Inspection::create (array (
			'batch' => 1,
			'code_letter' => 'H',
			'size' => 20,
			'aql_min' => 0,
			'aql_max' => 2,
			'heat_seal' => 1,
			'contents' => 1,
			'particulate' => 1,
			'burst_strength' => 1,
			'comment' => 2
		));
		
		//1
		Approval::create (array (
			'approver' => 1 		//ceasar
			/* 'date' => '' */
		));

		Employee::create (array (
			'username' => 'ceasar',
			'password' => Hash::make ('qwerty'),
			'permission' => 'admin',
			'locked' => false
		));

		Employee::create (array (
			'username' => 'octavian',
			'password' => Hash::make ('qwerty'),
			'permission' => 'QC',
			'locked' => false
		));

		Employee::create (array (
			'username' => 'aquila',
			'password' => Hash::make ('qwerty'),
			'permission' => 'admin',
			'locked' => false
		));

		Employee::create (array (
			'username' => 'antony',
			'password' => Hash::make ('qwerty'),
			'permission' => 'admin',
			'locked' => false
		));
		
		Comment::create (array (
			'commentor' => 2, 	//octavian
			//'date' => timestamp
			'text' => ''
		));

		Pouch::create (array (
			'batch' => 1,		//18g x 3.5" Rx Coat
			'destruction' => 1
		));

		Generation::create (array (
			'generator' => 2,		//octavian
			'approval' => 2,		
			'amount' => 1704,
			'used' => 1701
		));

		//2
		Approval::create (array (
			'approver' => 1 		//ceasar
			/* 'date' => '' */
		));

		Generation_Pouch::create (array (
			'pouch' => 1,
			'generation' => 1
		));

		Destruction::create (array (
			'destroyer' => 1, 	//ceasar
			'amount' => 3 /*,
			'date' => '' */
		));

		Carton::create (array (
			'batch' => 1,
			'destruction' => 2
		));

		Generation::create (array (
			'generator' => 2,		//octavian
			'approval' => 3,		
			'amount' => 172,
			'used' => 171
		));

		//3
		Approval::create (array (
			'approver' => 3 		//aquilla
			/* 'date' => '' */
		));

		Carton_Generation::create (array (
			'carton' => 1,
			'generation' => 2
		));

		Destruction::create (array (
			'destroyer' => 3, 	//aquila
			'amount' => 1 /*,
			'date' => '' */
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 1,
			/*'time' => '',*/
			'pressure' => 60,
			'location' => 'RS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 2,
			/*'time' => '',*/
			'pressure' => 66,
			'location' => 'RS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 3,
			/*'time' => '',*/
			'pressure' => 70,
			'location' => 'RS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 4,
			/*'time' => '',*/
			'pressure' => 72,
			'location' => 'LS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 5,
			/*'time' => '',*/
			'pressure' => 90,
			'location' => 'LS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 6,
			/*'time' => '',*/
			'pressure' => 80,
			'location' => 'LS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 7,
			/*'time' => '',*/
			'pressure' => 60,
			'location' => 'LS'
		));

		Burst::create (array (
			'batch' => 1, 	
			'index' => 8,
			/*'time' => '',*/
			'pressure' => 60,
			'location' => 'LS'
		));

		Machine::create (array (
			'name' => 'CE-030'
		));

		Batch_Machine::create (array (
			'batch' => 1,
			'name' => 'CE-030'
		));

		MachineDwell::create (array (
			'machine' => 'CE-030',
			'dwell' => 25,
		));
		
		HeatSeal::create (array (
			'product' => '18g x 3.5" Rx Coat',
			'target' => 45,
			'alert' => 34,
			'action' => 23
		));

		Sterilization::create (array (
			'batch' => 1,
			'sterlizer' => 4,	//antony
			/* 'date' => '', */
			'work_order' => 'EP1514008',
			'quantity' => 1700,
			'approval' => 4
		));

		//4
		Approval::create (array (
			'approver' => 3 		//aquilla
			/* 'date' => '' */
		));
	}
}
