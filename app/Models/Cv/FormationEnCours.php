<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class FormationEnCours extends Model
{
   

	protected $fillable=[
		'typeFormationEnCours_id',
		'libelleFormation',
		'debut',
		'lieuFormation',
		'personne_id',


	];

	









    protected $table='formations_en_cours';
}
