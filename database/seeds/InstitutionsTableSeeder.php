<?php

use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker\Factory::create();

for($i=0;$i<30;$i++)
    {   DB::table('institutions')->insert([
      
            'typeInstitution_id'=>rand(1,4),
            'nomInstitution'=>$faker->company,
            'emailInstitution'=>$faker->email,
            'adresseInstitution'=>$faker->address,
            'paysInstitution'=>$faker->country,

      ]);
}
    }
}
