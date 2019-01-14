<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
   



		protected $fillable=['projet_id',
	'intiule',
	'description',
	'typeObjectif',
	];












   protected $table='objectifs';
}
