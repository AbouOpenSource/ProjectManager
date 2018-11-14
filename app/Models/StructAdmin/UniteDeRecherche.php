<?php

namespace App\Models\StructAdmin;

use Illuminate\Database\Eloquent\Model;

class UniteDeRecherche extends Model
{
    

	protected $fillable=[



	];















    protected $table= 'unite_de_recherches';
	public function PersonneInterne()
			{
				return $this->hasMany('App\Models\Cv\PersonneInterne','unite_id');
			}

}
