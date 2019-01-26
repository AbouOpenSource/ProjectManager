<?php

namespace App\Models\Cv;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cv\TypeDiplome;


class PersonneInterne extends Model
{
    

	protected $fillable=[



	];

	



public function Diplome()
{
				return $this->belongsToMany('App\Models\Cv\TypeDiplome', 'detail_diplome_interne', 'personne_id', 'typeDiplome_id')
                ->withPivot('numeroDiplome','dateDoptention','mention');	
	
}

public function Qualification()
{
                return $this->belongsToMany('App\Models\Cv\Qualification', 'qualification_personne_internes', 'personne_id', 'qualification_id');
               
}

public function ExperienceProfessionnelle()
{

return $this->hasMany('App\Models\Cv\ExperienceProfessionnelle','personne_id');

}

public function ExperienceSpecifique()
{

return $this->hasMany('App\Models\Cv\ExperienceSpecifique','personne_id');

}




    protected $table='personne_internes';
    public function Equipe()
    {
    	//return 'Salut';
 		return $this->belongsTo('App\Models\StructAdmin\Equipe','equipe_id');
    
    }

        public function UniteDeRecherche()
    {
    	//return 'Salut';
 		return $this->belongsTo('App\Models\StructAdmin\UniteDeRecherche','unite_id');
    
    }

public function Publication()
    {

            return $this->hasMany('App\Models\Publication\Publication','personne_id');
        
    }

public function CoPublication()
    {
        return $this->belongsToMany('App\Models\Publication\Publication', 'detail_co_auteur', 'personne_id', 'publication_id')->withPivot('ordreDimplication');
    }

public function FormationEnCours()
    {

return $this->hasMany('App\Models\Cv\FormationEnCours','personne_id');


    }

public function FormationAcademique()
    {

    return $this->hasMany('App\Models\Cv\FormationAcademique','personne_id');


    }

public function Reference()
    {

    return $this->hasMany('App\Models\Cv\Reference','personne_id');


    }


public function Langue()
    {

    return $this->belongsToMany('App\Models\Cv\Langue', 'niveau_langue_interne', 'personne_id', 'langue_id')->with('niveauLu','niveauParle','niveauEcrit');
    
    }

public function Bourse()
    {
        return $this->hasMany('App\Models\Projet\Bourse','personne_id');    

    }

    public function getFullNameAttribute()
    {
        return $this->nom.' '.$this->prenom;
    }




}
