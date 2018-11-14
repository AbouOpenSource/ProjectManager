<?php

use Illuminate\Database\Seeder;

class EquipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create();


      DB::table('equipes')->insert([
      'departement_id' => 2 ,
      'nomEquipe'=>'Equipe Médicale',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 2 ,
      'nomEquipe'=>'Equipe essais clinique',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe santé de la mère et de l\'enfant',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe politiques et système de Santé',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe sociétés et santé',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe santé environnementale, maladies chroniques et nutrition',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);
























    }
}
