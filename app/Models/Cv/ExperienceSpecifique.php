<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class ExperienceSpecifique extends Model
{
    
protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}







    protected $table='experiences_specifiques';
}
