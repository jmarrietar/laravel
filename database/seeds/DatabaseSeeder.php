<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


 		DB::table('users')->insert([	
				'name' => 'Jose',
				'email'      => 'jmarrietar@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 3,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'Miguel',
				'email'      => 'Miguel@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 3,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'admin',
				'email'      => 'admin@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 1,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'agent',
				'email'      => 'agent@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 2,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);
 		

         $this->call(UserTableSeeder::class);
    }
}
