<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create();

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      
      'nomDepartement'=>'Departement des Sciences Biomédiadicales',
      

      'descriptionDepartement'=>'Le Département des Sciences Biomédicales (DSB) est né de l’organisation de la recherche au Centre MURAZ pour prendre en compte les suggestions du Conseil Scientifique International tenu en novembre 2016. Pour rappel, les suggestions qui avaient été faites par le Conseil Scientifique en 2016 étaient entre autre de faire en sorte que tous les plateaux techniques soient regroupés au sein de ce Département. Après plusieurs rencontres et concertations internes à travers le Collège des Chercheurs notamment, il a été convenu de façon consensuelle de sortir l’équipe de Biologie Clinique du Département de Recherche Clinique (DRC) pour la placer dans le DSB avec l’appellation de Laboratoire de Biologie Clinique (LBC).',
      

      'objectifDepartement'=>'Si l’on globalise cet ensemble, on peut dire que le champ de recherche du DSB est très large et comprend la recherche fondamentale et translationnelle de laboratoire. Il s’agit d’un regroupement horizontal de tous les laboratoires de recherche qui mènent des projets de recherche en rapport avec les maladies transmissibles comprenant les maladies à transmission vectorielles et les maladies de type bactérien et viral et les maladies non transmissibles. Ces laboratoires ont été créés pour répondre aux besoins prioritaires des populations du Burkina Faso dans le domaine de la recherche et de la biologie médicale. A ce titre, le Département est un organe de coordination de la recherche menée au sein des laboratoires de recherche.'
      ]);

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      
      'nomDepartement'=>'Departement de Recherche clinique  ',
      
      'descriptionDepartement'=>'En 2015 le Centre MURAZ a élaboré un nouvel organigramme scientifique. Dans cette nouvelle organisation, le champ de recherche du Département de Recherche Clinique (DRC), couvre : les essais cliniques, l’analyse décisionnelle médicale et les méthodes et outils de recherche clinique. Le DRC comprend deux (2) équipes de recherche ',
      
      'objectifDepartement'=>'L’objectif du DRC est d’obtenir à court terme, une meilleure gestion de ces ressources humaines et une meilleure organisation au quotidien du travail, pour améliorer sa productivité dans les différents domaines que sont la recherche (Grants et articles scientifiques), la formation et l’expertise. Cela permettra également une meilleure implication du Département dans le suivi de l’ensemble des essais cliniques hébergés au Centre MURAZ, à travers la rédaction et la mise en œuvre d’un plan de monitoring pour chacun de ces essais.'
      

      ]);

      DB::table('departements')->insert([
      'direction_id' => 1 ,
      
      'nomDepartement'=>'Departement de Santé Publique',
      
      'descriptionDepartement'=>'Le DSP couvre un large champ de thématiques de recherches dans une perspective transversale portant sur les maladies transmissibles, non transmissibles et les problèmes globaux de santé communautaire et publique. La force principale du Département est sa diversité, sa transversalité et sa complémentarité. En effet, l’ensemble des chercheurs du Département forme une task-force susceptible de répondre aux questions de recherche, d’expertise et de formation en rapport avec les problèmes prioritaires de santé publique du pays et de la sous-région. La faiblesse du département réside dans l’insuffisance des effectifs au sein de toutes les équipes et le faible financement dans certaines thématiques comme l’accidentologie.',
      
      'objectifDepartement'=>'La perspective du Département est de développer et d’opérationnaliser des contrats plans dans les domaines de la santé environnementale, de l’accidentologie, de la santé communautaire, des politiques publiques de santé en matière de financement, d’équité et de prise en charge des groupes spécifiques.'
      ]);













    }
}
