<?php

use Illuminate\Database\Seeder;

class LanguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('langues')->insert([
      'intituleLangue'=>'Bobo',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Français',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Anglais',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Dioula',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Mooré',
      ]);


      DB::table('langues')->insert([
      'intituleLangue'=>'Foulfoudé',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Chinois',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Espagnol',
      ]);

      DB::table('langues')->insert([
      'intituleLangue'=>'Italien',
      ]);












    }
}
