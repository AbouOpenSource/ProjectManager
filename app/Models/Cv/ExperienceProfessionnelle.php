<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class ExperienceProfessionnelle extends Model
{
    
	protected $fillable=[
		'societe_id',
		'posteOccupe',
		'description',
		'DebutExperience',
		'FinExperience',
		'pays',
		'personne_id'

	];

	





    protected $table='experiences_professionnelles';
}
