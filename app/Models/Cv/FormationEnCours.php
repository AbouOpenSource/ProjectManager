<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class FormationEnCours extends Model
{
   

	protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}










    protected $table='formations_en_cours ';
}
