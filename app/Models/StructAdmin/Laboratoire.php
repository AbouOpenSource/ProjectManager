<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    

	protected $fillable=[
		'departement_id',
		'nomLaboratoire',


	];





public function UniteDeRecherche()
{
return $this->hasMany('App\Models\StructAdmin\UniteDeRecherche','laboratoire_id');
}




    protected $table= 'laboratoires';
}
