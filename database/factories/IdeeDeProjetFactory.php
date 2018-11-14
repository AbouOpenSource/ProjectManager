<?php

use Faker\Generator as Faker;

use App\Models\Projet\IdeeDeProjet;



$factory->define(IdeeDeProjet::class, function (Faker $faker) {
    return [
      			
            'institutionSouhaite_id'=>rand(1,20),
            //partenariat souhaite 
            'institutionProposeur_id'=>rand(20,30),
            //idee propose par institution
            'projet_id'=>rand(1,100),
            //idee propose par personne interne
            //'personneinterne_id'=>,
            //idee propose par personne externe
            'cheminProtocole'=>$faker->url,
            'dateSoumission'=> now(),  
    ];
});
