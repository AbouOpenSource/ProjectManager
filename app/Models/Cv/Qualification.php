<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    
	protected $fillable=[
		'nomQualification',
		'descriptionQualification',
		'typeQualification',



	];













    protected $table='qualifications';
}
