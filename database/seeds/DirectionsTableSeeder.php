<?php

use Illuminate\Database\Seeder;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('directions')->insert([
      'nomDirection' => 'Direction Scientifique',
      ]);
    }
}