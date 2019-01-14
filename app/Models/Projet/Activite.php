<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    
	protected $fillable=[
		'projet_id',
		'contenu',
		'dateActivite',

	];

    protected $table= 'activites';
}
