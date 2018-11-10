<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class IdeeDeProjet extends Model
{

	protected $fillable=[



	];

protected function getDateFormat()
		{

					return 'd/m/Y';
		}








      protected $table= 'idees_de_projet';
}
