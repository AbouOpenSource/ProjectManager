<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\StructAdmin\Direction;
use App\Models\StructAdmin\Departement;
use App\Models\StructAdmin\Equipe;
use App\Models\StructAdmin\Laboratoire;
use App\Models\StructAdmin\UniteDeRecherche;

class AdminController extends Controller
{
    public function valideCompte(){
    	

    $users=User::where('approved_at',null);
    	//$users=User::all();
    
    	return view('admin.listeDemande')->with(['users'=>$users]);

    }


    public function accepteCompte($idUser)
    {
    	$user=User::find($idUser);
    	$user->approved_at=now();
    	$user->save();
        return redirect()->route('createRequest');
    }

    public function refuseCompte($idUser)
    {

	    $user=User::find($idUser);
    	$user->approved_at=now();
    	$user->save();
	    return redirect()->route('createRequest');
    
    }

    public function addChefDirection()
    {
           $directions=Direction::all();
            return view('admin.addChefDirection')->with(['directions'=>$directions]);
    }

    public function addChefDepartement()
    {   $personnes=User::all();    
        $departements=Departement::all();
            return view('admin.addChefDepartement')->with(['departements'=>$departements,'personnes'=>$personnes]);

    }

    public function addChefLaboratoire(){
            $laboratoires=Laboratoire::all();
            return view('admin.addChefLaboratoire')->with(['laboratoires'=>$laboratoires]);

    }

    public function addChefEquipe(){
        $equipes=Equipe::all();
        return view('admin.addChefEquipe')->with(['equipes'=>$equipes]);
    }

    public function addChefUnite(){
        $unites=UniteDeRecherche::all();
        return view('admin.addChefUnite')->with(['unites'=>$unites]);
    }

    public function addPostChefDepartement(Request $request){

             $departement=Departement::find($request->departement_id);
    
             $departement->chef()->attach($departement,['debutMandat'=>now()]);

             $user=User::find($request->personne_id);
             $user->assignRole('chefDepartement');

             return redirect()->route('addChefDepartement');
    }




}
