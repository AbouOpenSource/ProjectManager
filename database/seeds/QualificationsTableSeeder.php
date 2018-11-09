<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      DB::table('qualifications')->insert([
      'nomQualification' =>'Biologiste ' ,
      'descriptionQualification'=>'Equipe Médicale',
      'typeQualification'=>'Principale',

      ]);



      DB::table('qualifications')->insert([
      'nomQualification' => 'Entomologiste' ,
      'descriptionQualification'=>'Equipe Médicale',
      'typeQualification'=>'Secondaire',

      ]);


      DB::table('qualifications')->insert([
      'nomQualification' => 'TBM' ,
      'descriptionQualification'=>'Equipe Médicale',
      'typeQualification'=>'Principale',

      ]);

      DB::table('qualifications')->insert([
      'nomQualification' => 'Phramaciens' ,
      'descriptionQualification'=>'',
      'typeQualification'=>'Secondaire',

      ]);







    }
}
