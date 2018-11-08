<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Hematologie',
      ]);


      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Biochimie',
      ]);

      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Sérologie-Immunologie',
      ]);


      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Bactériologie',
      ]);


      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Parasitologie',
      ]);


      DB::table('sections')->insert([
      'Lab_identifiantLaboratoire' => 1 ,
      'nomSection'=>'Section Virologie',
      ]);











    }
}
