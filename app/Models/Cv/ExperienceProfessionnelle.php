<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class ExperienceProfessionnelle extends Model
{
    
	protected $fillable=[



	];

	protected function getDateFormat()
		{

					return 'd/m/Y';
		}





    protected $table='experiences_professionnelles';
}
