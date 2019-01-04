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

	public function auteur()
	{
		return $this->belongsTo('App\Models\Cv\PersonneInterne','personne_id');
	}

protected $dates=['datePublication'];
protected $table= 'publications';
}
