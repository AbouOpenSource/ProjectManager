<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class UniteDeRecherche extends Model
{
    

	protected $fillable=[
		'nomUnite',
		'laboratoire_id',


	];










public function Projet()
{
	return $this->hasMany('App\Models\Projet\Projet','unite_id');
}





    protected $table= 'unite_de_recherches';
	public function PersonneInterne()
			{
				return $this->hasMany('App\Models\Cv\PersonneInterne','unite_id');
			}


	




}
