<?php

namespace App\Models\Publication;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Carbon\Carbon;
class Publication extends Model
{
   
	protected $fillable=[
		'typePublication_id',
		'evenement_id',
		'projet_id',
		'personne_id',
		'libellePublication',
		'description',
		'datePublication',
		'sourcePublication',
		'media',
	];

	public function getYearPubliAttribute()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->datePublication);
	}


	public function auteur()
	{
		return $this->belongsTo('App\Models\Cv\PersonneInterne','personne_id');
	}

	public function typePublication()
	{
	return $this->belongsTo('App\Models\Publication\TypePublication','typePublication_id');	
	}
	public function getFile()
	{
		return is_null($this->media)? "Vrai":"faux";
	}

	public function getExtensionAttribute()
	{



	}


protected $dates=['datePublication'];
protected $table= 'publications';

	

}
