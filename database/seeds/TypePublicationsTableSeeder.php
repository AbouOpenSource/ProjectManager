<?php

use Illuminate\Database\Seeder;

class TypePublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create('fr_FR');

      DB::table('type_publications')->insert([
      'intituleType' =>'Article',
      'descriptionType'=>$faker->text,
      'point'=>2
      ]);

      DB::table('type_publications')->insert([
      'intituleType' =>'Communication Orale',
      'descriptionType'=>$faker->text,
      'point'=>2
      ]);


      DB::table('type_publications')->insert([
      'intituleType' =>'Poster',
      'descriptionType'=>$faker->text,
      'point'=>2
      ]);


      DB::table('type_publications')->insert([
      'intituleType' =>'Livre',
      'descriptionType'=>$faker->text,
      'point'=>5
      ]);





    }
}
