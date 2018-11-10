<?php

namespace App\Models\Publication;

use Illuminate\Database\Eloquent\Model;

class TypePublication extends Model
{
    
	protected $fillable=[



	];


protected function getDateFormat()
		{

					return 'd/m/Y';
		}










    protected $table= 'type_publications';
}
