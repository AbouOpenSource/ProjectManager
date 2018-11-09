<?php

use Illuminate\Database\Seeder;

class TypeDiplomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'BEPC',
      'niveauDiplome'=>'1',
      ]);

      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'BAC',
      'niveauDiplome'=>'2',
      ]);

      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'Doctorat',
      'niveauDiplome'=>'3',
      ]);

      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'MASTER 1',
      'niveauDiplome'=>'4',
      ]);
      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'MASTER 2',
      'niveauDiplome'=>'5',
      ]);
      DB::table('type_diplomes')->insert([
      'libelleDiplome'=>'PHD',
      'niveauDiplome'=>'6',
      ]);

    }
}
