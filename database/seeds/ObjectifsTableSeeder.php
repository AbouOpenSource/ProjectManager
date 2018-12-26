<?php

use Illuminate\Database\Seeder;

class ObjectifsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
$faker = Faker\Factory::create();


for($i=0;$i<10;$i++){
for($u=1;$u<30;$u++){
		DB::table('objectifs')->insert([
      'projet_id' =>$u,
      'intiule'=>$faker->name,
      'description'=>$faker->text,
      'typeObjectif'=>'Principale'
      ]);



      DB::table('objectifs')->insert([
      'projet_id' =>$u ,
      'intiule'=>$faker->name,
      'description'=>$faker->text,
      	'typeObjectif'=>'Secondaire'
      ]);


      DB::table('objectifs')->insert([
      'projet_id' =>$u,
      'intiule'=>$faker->name,
      'description'=>$faker->text,
	  'typeObjectif'=>'Principale'
      ]);

      DB::table('objectifs')->insert([
      'projet_id' =>$u ,
      'intiule'=>$faker->name,
      'description'=>$faker->text,
      'typeObjectif'=>'Secondaire'
      ]);
}
}




     }
}
