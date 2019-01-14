<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class ExperienceSpecifique extends Model
{
    
protected $fillable=[
'personne_id',
'resume',
'dateFinExperience',
'pays'
	];

	





    protected $table='experiences_specifiques';
}
