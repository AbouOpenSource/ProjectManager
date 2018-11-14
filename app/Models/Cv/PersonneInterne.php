<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

//use App\Models\StructAdmin\Equipe;


class PersonneInterne extends Model
{
    

	protected $fillable=[



	];

	












    protected $table='personne_internes';
    public function Equipe()
    {
    	//return 'Salut';
 		return $this->belongsTo('App\Models\StructAdmin\Equipe','equipe_id');
    
    }
}
