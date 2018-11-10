<?php

namespace App\Models\Actualite;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   
	protected $fillable=[



	];

		protected function getDateFormat()
		{

					return 'd/m/Y';
		}










   protected $tables='images';
}
