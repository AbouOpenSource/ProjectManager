<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
    	      $faker = Faker\Factory::create();

      DB::table('personne_internes')
      ->insert([
      	'name' => 'Admin',
      	'prenom' =>'Admin',
      	'dateNaissance'=>$faker->dateTimeThisCentury->format('Y-m-d'),
      	'lieuNaissance'=>'Burkina Faso',
      	'nationalite'=>'Burkinabé',
      	'email'=>'admin@admin.com',
      	'residence'=>$faker->address,
      	'login'=>$faker->username,
      	'password' =>bcrypt('secret'),
      	'approved_at' => now(),
      ]);
    


    }
}
