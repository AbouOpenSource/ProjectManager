<?php

use App\Models\Projet\Projet;
use Faker\Generator as Faker;

$factory->define(Projet::class, function (Faker $faker) {
    return [
      'unite_id' => rand(1,9),
      //'Equ_identifiantEquipe' =>,
      //'Ide_identifiantIdeeProjet' =>,
      'codeMuraz'=>str_random(10),
      'intitule' => 'Etude de hyposussions ', // secret
      'dureeProjet' => 'deux ans',
      'resumeProjet'=>$faker->text,
      'budgetProjet'=>'10 000 000 dollars',
      'siteDeMiseEnOeuvre'=>'Bobo Dioulasso',
      'contexteProjet'=>'Suite a l\'effervesance du monde de la recherche' ,
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
