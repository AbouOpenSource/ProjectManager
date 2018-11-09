<?php

use Illuminate\Database\Seeder;

class ExamensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('examens')->insert([
      'libelleExamen' => 'Glycemie',
      ]);


      DB::table('examens')->insert([
      'libelleExamen' => 'Cystoscopie',
      ]);

      DB::table('examens')->insert([
      'libelleExamen' => 'Fibroscopie',
      ]);




























    }
}
