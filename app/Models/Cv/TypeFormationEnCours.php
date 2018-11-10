<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class TypeFormationEnCours extends Model
{
    

	protected $fillable=[



	];


protected function getDateFormat()
		{

					return 'd/m/Y';
		}












    protected $table='type_formation_en_cours'; 
}
