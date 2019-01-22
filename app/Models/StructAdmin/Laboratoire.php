<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    

	protected $fillable=[



	];





public function Laboratoire()
{
return $this->hasMany('App\Models\StructAdmin\UniteDeRecherche','laboratoire_id');
}




    protected $table= 'laboratoires';
}
