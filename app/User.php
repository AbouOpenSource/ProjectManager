<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =['name','prenom','login','email','dateNaissance','lieuNaissance','nationalite','residence', 'password','equipe_id','unite_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table='personne_internes';
public function getNomAttribute()
{
    return strtoupper($this->name);
}


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
        return $this->belongsToMany('App\Models\Publication\Publication', 'detail_co_auteur', 'personne_id', 'publication_id')->with('ordreDimplication');
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

    return $this->belongsToMany('App\Models\Cv\Langue', 'niveau_langue_interne', 'personne_id', 'langue_id')->withPivot('niveauLu','niveauParle','niveauEcrit');
    
    }

public function Association()
    {

    return $this->belongsToMany('App\Models\StructAdmin\Association', 'personne_associations', 'personne_id', 'association_id');
    
    }

public function Projet()
    {   
        /*if($this->Equipe->isEmpty())
            {
                $mesProjets = $this->UniteDeRecherche->projet;
                $mesProjetsInvestigue=$this->ProjetInvestigue;
                $mesProjetsCoInvestigue=$this->ProjetCoInvestigue;
                $mesProjets->merge($mesProjetsInvestigue);
                $mesProjets->merge($mesProjetsCoInvestigue);
                
                return $mesProjets;
            }
            else 
            {
                $mesProjets= $this->Equipe->projet;
                $mesProjetsInvestigue=$this->ProjetInvestigue;
                $mesProjetsCoInvestigue=$this->ProjetCoInvestigue;
                $mesProjets->merge($mesProjetsInvestigue);
                $mesProjets->merge($mesProjetsCoInvestigue);

                return $mesProjets;
            }
    */
    }
public function Bourse()
    {
        return $this->hasMany('App\Models\Projet\Bourse','personne_id');    

    }
public function UniteDeRechercheChef()
    {
    return $this->belongsToMany('App\Models\StructAdmin\UniteDeRecherche', 'detail_chef_unite', 'personne_id', 'unite_id')->withPivot('debutMandat','finMandat');
    }
public function DepartementChef()
    {
   

return $this->belongsToMany('App\Models\StructAdmin\Departement','detail_chef_departement','personne_id','departement_id')->withPivot('debutMandat','finMandat');
    }
public function ProjetInvestigue()
    {
    return $this->belongsToMany('App\Models\Projet\Projet', 'investigateur_internes', 'personne_id', 'projet_id');
    }
public function ProjetCoInvestigue()
    {
    return $this->belongsToMany('App\Models\Projet\Projet', 'co_investigateur_internes', 'personne_id', 'projet_id');
    }

public function getFullNameAttribute()
    {
        return $this->nom.' '.$this->prenom;
    }
}
