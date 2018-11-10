<?php

namespace App\Models\Actualite;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
  
	protected $fillable=[



	];


	protected function getDateFormat()
		{

					return 'd/m/Y';
		}






























  protected $table= 'evenements';
}
