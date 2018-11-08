<?php

use Illuminate\Database\Seeder;

class TypeInstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('type_institutions')->insert([
      'intituleType' =>'Université',
      ]);


      DB::table('type_institutions')->insert([
        'intituleType' =>'Institut de Recherche',
      ]);



      DB::table('type_institutions')->insert([
      'intituleType' =>'ONG',
      ]);


      DB::table('type_institutions')->insert([
      'intituleType' =>'Gouvernement',
        ]);

      

    }
}
