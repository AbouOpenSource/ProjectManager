<?php

namespace App\Models\Publication;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
   
	protected $fillable=[
		'typePublication_id',
		'evenement_id',
		'projet_id',
		'personne_id',
		'libellePublication',
		'description',
		'datePublication',
		'sourcePublication',
		'media',



	];

	










    protected $table= 'publications';
}
