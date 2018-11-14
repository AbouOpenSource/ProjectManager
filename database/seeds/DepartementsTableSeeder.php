<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create();

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      'nomDepartement'=>'Departement des Sciences Biomédiadicales',
      'descriptionDepartement'=>$faker->text,
      'objectifDepartement'=>$faker->text
      ]);

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      'nomDepartement'=>'Departement de Recherche clinique  ',
      'descriptionDepartement'=>$faker->text,
      'objectifDepartement'=>''
      ]);

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      'nomDepartement'=>'Departement de Santé Publique',
      'descriptionDepartement'=>$faker->text,
      'objectifDepartement'=>$faker->text
      ]);













    }
}
