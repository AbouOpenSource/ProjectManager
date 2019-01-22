<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
	protected $fillable=[



	];

    protected $table= 'departements';


    public function Chef()
		{
			return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'detail_chef_departement', 
      'departement_id', 'personne_id')
				->withPivot('debutMandat','finMandat');	
		}
public function CurrentChef()
		{			
		
			return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'detail_chef_departement', 
      'departement_id', 'personne_id')
				->withPivot('debutMandat','finMandat')->wherePivot('finMandat', null);
		}	




public function Equipe()
{

return $this->hasMany('App\Models\StructAdmin\Equipe','departement_id');

}


public function Laboratoire()
{
return $this->hasMany('App\Models\StructAdmin\Laboratoire','departement_id');
}

}
