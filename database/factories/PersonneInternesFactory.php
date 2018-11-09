<?php

use Faker\Generator as Faker;
use App\Models\Cv\PersonneInterne;

use App\Models\StructAdmin\Equipe;

$factory->define(PersonneInterne::class, function (Faker $faker) {







    return [
      'Equ_identifiantEquipe' => rand(1,6),
      //'Uni_identifiantUnite' => rand(1,9),
      'nom' => $faker->lastName(),
      'prenom' =>$faker->firstName('femelle'),
      'dateNaissance'=>$faker->dateTimeThisCentury->format('Y-m-d'),
      'lieuNaissance'=>'Burkina Faso',
      'nationalite'=>'Burkinabé',
      'email'=>$faker->unique()->safeEmail,
      'residence'=>$faker->address,
      'login'=>$faker->username,
      'motDePasse' =>bcrypt('secret'),
      ];
});
