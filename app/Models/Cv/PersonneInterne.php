<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class PersonneInterne extends Model
{
    

	protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}













    protected $table='personne_internes';
}
