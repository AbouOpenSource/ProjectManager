<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class UniteDeRecherche extends Model
{
    

	protected $fillable=[
		'nomUnite',
		'laboratoire_id',


	];



public function ToutChefUnite()
		{
			return $this
					->belongsToMany('App\Models\Cv\PersonneInterne', 'detail_chef_unite', 
      'unite_id', 'personne_id')
				->withPivot('debutMandat','finMandat');	
		}
	
public function ChefUnite()
		{
			return $this
					->belongsToMany('App\Models\Cv\PersonneInterne', 'detail_chef_unite', 
      'unite_id', 'personne_id')
				->withPivot('debutMandat','finMandat')->wherePivot('finMandat',null);	
		}
	






public function Projet()
{
	return $this->hasMany('App\Models\Projet\Projet','unite_id');
}

public function PersonneInterne()
{
	return $this->hasMany('App\Models\Cv\PersonneInterne','unite_id');
}




    protected $table= 'unite_de_recherches';

}
