<?php

namespace App\Models\Institution;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable=[



	];




public function ProjetFinancier()
		{
			return $this
					->belongsToMany('App\Models\Projet\Projet', 'detail_partenariat_financier', 
      'institution_id', 'projet_id')
				->withPivot('volumeProjetFinance','anneeFinancementProjet');	
		}
	
public function ProjetTechnique()
		{
			return $this
					->belongsToMany('App\Models\Projet\Projet', 'detail_partenariat_financier', 
      'institution_id', 'projet_id')
				->withPivot('volumeProjetFinance','anneeFinancementProjet');	
		}




protected $table="institutions";
}
