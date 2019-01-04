<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	 	$faker = Faker\Factory::create();
			for($i=0;$i<100;$i++)
				{
					DB::table('publications')->insert
					(
						[
					      'typePublication_id'=>rand(1,4),
					      'projet_id'=>rand(1,50),
					      'personne_id'=>rand(1,50),
					      'libellePublication'=>$faker->userName,
					      'description'=>$faker->text,
					      'datePublication'=>$faker->dateTime,
					      'sourcePublication'=>$faker->company,
					      	'media'=>$faker->company,
					      	   ]
			      	  );
				}
	}
}
