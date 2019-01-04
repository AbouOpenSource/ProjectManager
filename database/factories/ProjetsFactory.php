<?php

use App\Models\Projet\Projet;
use Faker\Generator as Faker;

$factory->define(Projet::class, function (Faker $faker) {
    return [
      'unite_id' => rand(1,9),
      //'Equ_identifiantEquipe' =>,
      //'Ide_identifiantIdeeProjet' =>,
      'codeMuraz'=>str_random(10),
      'intitule' =>'Abolition des FHV',      
      'dureeProjet' => 'deux ans',
      'resumeProjet'=>$faker->text,
      'budgetProjet'=>rand(1,1000000).' '.'dollars',
      'siteDeMiseEnOeuvre'=>'Bobo Dioulasso',
      'contexteProjet'=>'Suite a l\'effervesance du monde de la recherche' ,
      'evolution'=>100,
      'nombreEmploi'=>0,
      'typeProjet_id'=>rand(1,3),
      'fraisIndirectverseCM'=>'200.00',
      'typeProjet_id'=>rand(1,3),
      'questionDeRecherche'=>$faker->text,
      'resumeDesMethodeEtude'=>$faker->text,
      'beneficeNational'=>$faker->text,
      'beneficeInstitutionnel'=>$faker->text,

    ];
});
