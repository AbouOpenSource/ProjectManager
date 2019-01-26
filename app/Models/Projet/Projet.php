<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projet\DetailStatutProjet;
class Projet extends Model
{

protected $dates = [''];
	protected $fillable=['codeMuraz','unite_id','equipe_id','ideeDeProjet_id','intitule','dureeProjet','resumeProjet','budgetProjet','siteDeMiseEnOeuvre','contexteProjet','nombreEmploi','fraisIndirectverseCM','typeProjet_id','questionDeRecherche','resumeDesMethodeEtude','beneficeNational','beneficeInstitutionnel','evolution'
];

	public function institutionFinancier()
		{
			return $this
					->belongsToMany('App\Models\Institution\Institution', 'detail_partenariat_financier', 
      'projet_id', 'institution_id')
				->withPivot('volumeProjetFinance','anneeFinancementProjet');	
		}
	public function institutionTechnique()
		{
					return $this
					->belongsToMany('App\Models\Institution\Institution', 'detail_partenariat_technique', 
      'projet_id', 'institution_id');			
		}
	
	public function Statut()
		{					
		return $this->belongsToMany('App\Models\Projet\Statut', 'detail_statut_projet', 
      'projet_id', 'statut_id')
			->withPivot('debutStatut','finStatut');

		}	
public function Currentstatut()
		{			
		return $this->belongsToMany('App\Models\Projet\Statut', 'detail_statut_projet', 
      'projet_id', 'statut_id')
			->withPivot('debutStatut','finStatut')->wherePivot('finStatut', null);
		}	
	public function Bourse()
		{
		return $this->hasMany('App\Models\Cv\Bourse','projet_id'); 
		}
	public function EquipementAcquis()
		{
		return $this->hasMany('App\Models\Projet\EquipementAcquis','projet_id'); 
		
		}
	public function Objectif()
		{
		return $this->hasMany('App\Models\Projet\Objectif','projet_id'); 
		}
	public function ResultatObtenu()
		{
		return $this->hasMany('App\Models\Projet\ResultatObtenu');
		}
	public function Activite()
		{
		return $this->hasMany('App\Models\Projet\Activite');
		}
	public function publication()
		{
		return $this->hasMany('App\Models\Publication\Publication');
		}
		


	public function CoInvestigateurInterne()
		{
		return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'co_investigateur_internes', 
      'projet_id', 'personne_id');

		}	
	


	public function CoInvestigateurExterne()
		{
		return $this->belongsToMany('App\Models\Cv\PersonneExterne', 'co_investigateur_externes', 
      'projet_id', 'personne_id');
		}	
  	public function InvestigateurInterne()
  		{
			return $this->belongsToMany('App\Models\Cv\PersonneInterne', 'investigateur_internes', 
      'projet_id', 'personne_id');
  		}

  	public function InvestigateurExterne()
  		{
			return $this->belongsToMany('App\Models\Cv\PersonneExterne', 'investigateur_externes', 
      'projet_id', 'personne_id');
  		}
  	protected $table= 'projets';


  		 public function Equipe()
    {
        
        return $this->belongsTo('App\Models\StructAdmin\Equipe','equipe_id');
    
    }


         public function UniteDeRecherche()
    {
        //return 'Salut';
        return $this->belongsTo('App\Models\StructAdmin\UniteDeRecherche','unite_id');
    
    }

    public function Perspective()
    {

    	return $this->hasMany('App\Models\Projet\Perspective');
    }



}
