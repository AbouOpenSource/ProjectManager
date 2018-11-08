<?php

use Illuminate\Database\Seeder;

class UniteDeRecherchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Parasitologie-Entomologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Bactériologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Mycobacteriologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Virologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'LNR-FHV',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Biologie Moléculaire',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Immunologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Nutrition-Toxicologie',
      ]);

      DB::table('unite_de_recherches')->insert([
      'Lab_identifiantLaboratoire' => 2 ,
      'nomUnite'=>'Pharmacognosie',
      ]);







    }
}
