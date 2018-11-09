<?php

use Faker\Generator as Faker;
use App\Models\Cv\PersonneInterne;

use App\Models\StructAdmin\Equipe;
$factory->define(PersonneInterne::class, function (Faker $faker) {


  $pays=$faker->country;




    return [

      'Equ_identifiantEquipe' => rand(1,6),

      'nom' => $faker->lastName(),
      'prenom' =>$faker->firstName('femelle'),
      'dateNaissance'=>$faker->dateTimeThisCentury->format('Y-m-d'),
      'lieuNaissance'=>$pays,
      'nationalite'=>$pays,
      'email'=>$faker->unique()->safeEmail,
      'residence'=>$faker->address,
      'login'=>'DefaultLogin',
      'motDePasse' =>bcrypt('secret'),
      ];
});
