<?php

use Illuminate\Database\Seeder;

class TypeFormationEnCoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('type_formation_en_cours')->insert([
      'intituleTypeFormation' =>'Certifiante',
      ]);


      DB::table('type_formation_en_cours')->insert([
      'intituleTypeFormation' =>'Diplomante',
      ]);

      DB::table('type_formation_en_cours')->insert([
      'intituleTypeFormation' =>'Courte',
      ]);

    }
}
