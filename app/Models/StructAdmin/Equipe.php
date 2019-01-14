<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    
	protected $fillable=[



	];






    protected $table= 'equipes';

public function PersonneInterne()
{
	return $this->hasMany('App\Models\Cv\PersonneInterne');
}

public function Projet()
{
	return $this->hasMany('App\Models\Projet\Projet');
}

public function Associe()
		{					
		return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'associe_internes', 
      'equipe_id', 'personne_id')
		;

		}	






}
