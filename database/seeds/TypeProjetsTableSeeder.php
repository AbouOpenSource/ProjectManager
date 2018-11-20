<?php

use Illuminate\Database\Seeder;

class TypeProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_projets')->insert([
      'intitule' =>'Projet de Recherche ' ,
      
      'description'=>'A decrire',

      ]);



      DB::table('type_projets')->insert([
      'intitule' => 'Projet de renforcement de capacité' ,
      'description'=>'A decrire ',
      
      ]);


      DB::table('type_projets')->insert([
      'intitule' => 'Projet D\'Expertise' ,
      'description'=>'A decrire',
     	]);

    }
}
