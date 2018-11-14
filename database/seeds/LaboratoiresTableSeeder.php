<?php

use Illuminate\Database\Seeder;

class LaboratoiresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('laboratoires')->insert([
      'departement_id' => 1 ,
      'nomLaboratoire'=>'Laboratoire de Biologie Clinique',
      ]);

      DB::table('laboratoires')->insert([
      'departement_id' => 1 ,
      'nomLaboratoire'=>'Laboratoire de Recherche',
      ]);
    }
}
