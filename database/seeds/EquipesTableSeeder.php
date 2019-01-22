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


      //Les equipes de Departement recherche cliniques 

      DB::table('equipes')->insert([
      'departement_id' => 2 ,
      'nomEquipe'=>'L’équipe des essais cliniques (EEC)',
      'descriptionEquipe'=>'L\'equipe est chargée de la coordination, du monitoring et de la mise en œuvre selon les standards internationaux, de l’ensemble des essais cliniques hébergés au Centre MURAZ.',
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 2 ,
      'nomEquipe'=>'Equipe médicale',
      'descriptionEquipe'=>'est chargée de l’organisation et de la dispensation des soins offerts à la population dans les cliniques du Centre MURAZ, et de la recherche sur l’analyse décisionnelle médicale, en collaboration avec les chercheurs des différents Centres de Santé du Burkina.',
      'objectifEquipe'=>$faker->text
      ]);

      




      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe Politiques et Système de Santé (EPSS)',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe Santé Environnementale, Maladies Chroniques et Nutrition (ESEMCN)',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe Santé de la Mère et de l’Enfant (ESME)',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);

      DB::table('equipes')->insert([
      'departement_id' => 3 ,
      'nomEquipe'=>'Equipe Sociétés et Santé (ESS)',
      'descriptionEquipe'=>$faker->text,
      'objectifEquipe'=>$faker->text
      ]);
























    }
}
