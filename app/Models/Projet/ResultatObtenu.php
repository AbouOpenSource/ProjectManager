<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class ResultatObtenu extends Model
{

	protected $fillable=['projet_id',
	'contenu',
	'dateRealisation',
	'detailResutltat',
	];

	protected $dates = ['dateRealisation'];















    protected $table= 'resultats_obtenus';
}
