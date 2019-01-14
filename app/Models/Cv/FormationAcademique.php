<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class FormationAcademique extends Model
{
    
	protected $fillable=[
'personne_id',
'nomFormationAcademique',
'dateFormationAcademique',
'lieuFormationAcademique'


	];

	











    protected $table='formations_academiques';
}
