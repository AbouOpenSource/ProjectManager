<?php

use Illuminate\Database\Seeder;

class AssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create();

      DB::table('associations')->insert([
      'numeroPv' =>'pv-121212',
      'nomAssociation'=>'Les Biochimiste',
      'typeAssociation'=>'Professionnels ',
      'but'=>$faker->text,
      'corpsProffesorale'=>'Biochimique',
      ]);


      DB::table('associations')->insert([
      'numeroPv' =>'pv-131313',
      'nomAssociation'=>'Seul la lutte libere ',
      'typeAssociation'=>'Syndicale',
      'but'=>'La patrie ou la ort nous vaincrons',

      ]);


    }
}
