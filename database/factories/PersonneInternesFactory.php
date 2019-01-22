<?php

use Faker\Generator as Faker;
use App\Models\Cv\PersonneInterne;

use App\Models\StructAdmin\Equipe;

$factory->define(PersonneInterne::class, function (Faker $faker) {







    return [
      //'equipe_id' => rand(1,6),
      'unite_id' => rand(1,9),
      'name' => $faker->lastName(),
      'prenom' =>$faker->firstName('femelle'),
      'dateNaissance'=>$faker->dateTimeThisCentury->format('Y-m-d'),
      'lieuNaissance'=>'Burkina Faso',
      'nationalite'=>'Burkinabé',
      'email'=>$faker->unique()->safeEmail,
      'residence'=>$faker->address,
      'login'=>$faker->username,
      'password' =>bcrypt('secret'),
      'approved_at' => now(),
      
      ];
});
