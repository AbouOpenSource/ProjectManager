<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{


protected $fillable=[
	'nomReference',
	'prenomReference',
	'emailReference',
	'telephoneReference',
	'personne_id',
	];








protected $table='references';
}
