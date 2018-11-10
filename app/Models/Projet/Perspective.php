<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class Perspective extends Model
{

	protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}











    protected $table= 'perspectives';
}
