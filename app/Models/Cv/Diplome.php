<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
 		protected $fillable=[



	];






	public function nonbreDiplome()
	{

		return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'detail_diplome_interne', 
      'typeDiplome_id', 'personne_id')->withPivot('numeroDiplome','dateDoptention','mention');	
	}




 protected $table='type_diplomes';
}
