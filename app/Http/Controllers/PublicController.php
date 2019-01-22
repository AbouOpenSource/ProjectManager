<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet\Projet;
use App\User;
use App\Models\Publication\Publication;
use App\Models\StructAdmin\Departement;
class PublicController extends Controller
{
    public function indexProjet()
    {
    		
    		//$projets=Projet::all();
            //->with('Currentstatut');
            $projets=Projet::with('Currentstatut')->get();
            return view('publicView.indexProjet')->with(['projets'=>$projets]);
    }
    public function indexChercheur()
    {
    		$users=User::paginate(10);
    		return view('publicView.indexChercheur')->with(['users'=>$users]);


    }

    public function indexPublication()
    {
        
//TODO::Mettre une condition pour filtrer les publications afin qu'on puisse voir celles publiques.
        $publications=Publication::all();
        return view('publicView.indexPublication')->with(['publications'=>$publications]);
    }

    public function displayAcceuil()
    {
        $publications=Publication::orderBy('datePublication','desc')->take(3)->get();
        $nbrProjet=count(Projet::all());
        $departements=Departement::all();
        $chercheurs=User::all();
        return view('publicView.accueil')
        ->with(['nbrProjet'=>$nbrProjet])
        ->with(['publications'=>$publications])
        ->with(['chercheurs'=>$chercheurs])
        ->with(['departements'=>$departements]);
    
    }

}
