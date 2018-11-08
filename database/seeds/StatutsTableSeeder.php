<?php

use Illuminate\Database\Seeder;

class StatutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create('fr_FR');

      DB::table('statuts')->insert([
      'intituleStatut'=>'Soumis ',
      'descriptionStatut'=>$faker->text,
      ]);

      DB::table('statuts')->insert([
      'intituleStatut'=>'Accepté et non Financé',
      'descriptionStatut'=>$faker->text,
      ]);

      DB::table('statuts')->insert([
      'intituleStatut'=>'Accepté et Financé',
      'descriptionStatut'=>$faker->text,
      ]);

      DB::table('statuts')->insert([
       'intituleStatut'=>'En cours',
       'descriptionStatut'=>$faker->text,
       ]);

       DB::table('statuts')->insert([
        'intituleStatut'=>'En pause',
        'descriptionStatut'=>$faker->text,
        ]);

        DB::table('statuts')->insert([
         'intituleStatut'=>'Terminé',
         'descriptionStatut'=>$faker->text,
         ]);

    }
}
