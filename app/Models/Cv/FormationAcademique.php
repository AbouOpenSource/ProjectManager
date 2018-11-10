<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class FormationAcademique extends Model
{
    
	protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}












    protected $table='formations_academiques';
}
