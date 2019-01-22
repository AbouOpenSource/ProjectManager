<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\Cv\Diplome;
use App\Models\Cv\Langue;
use App\Models\Cv\Qualification;
use App\Models\Cv\FormationAcademique;
use App\Models\Cv\FormationEnCours;
use App\Models\Cv\TypeFormationEnCours;
use App\Models\Cv\ExperienceSpecifique;
use App\Models\Cv\ExperienceProfessionnelle;
use App\Models\Cv\Reference;
use App\User;


class UserController extends Controller
{
    //
    public function profile()
    {   
        $typeforma=TypeFormationEnCours::all();
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        
        return View('personneinterne.profile')
                                           ->with(['user'=>Auth::user(),
                                                 'diplomes'=> $diplomes,
                                                 'langues'=> $langues,
                                                 'qualifications'=> $qualifications,
                                                'typeFormationEnCours'=>$typeforma                                              
                                                ]);
        
     }
        public function infosCompte($idUser)
    {	
        
    	return view('personneinterne.photo')->with(['user'=>Auth::user()]);
     }

     public function updateAvatar(Request $request)
     {
     			     if($request->hasFile('avatar'))
				     {
				     	$avatar=$request->file('avatar');
				     	$filename = time(). '.' . $avatar->getClientOriginalExtension();
				     	Image::make($avatar)->resize(300,300)->save( public_path('uploads/avatars/'. $filename));
				     	$user=Auth::user();
				     	$user->avatar=$filename;
				     	$user->save();
				     }

    	$typeforma=TypeFormationEnCours::all();
        $diplomes=Diplome::all();
     	$langues=Langue::all();
    	$qualifications=Qualification::all();
    	

		return view('personneinterne.profile')->with(['user'=>Auth::user(),
    										 'diplomes'=> $diplomes,
    										 'langues'=> $langues,
    											 'qualifications'=> $qualifications,
    											'typeFormationEnCours'=>$typeforma
                                                ]);
				 
		}
     

	public function addDiplome(Request $request,$idUser)
	{
  
		$typeforma=TypeFormationEnCours::all();
        $diplomes=Diplome::all();
     	$langues=Langue::all();
   	    $qualifications=Qualification::all();
		$user=Auth::user();
		$user->Diplome()->attach($request->typeDiplome,['numeroDiplome' => $request->numeroDiplome,
														'dateDoptention'=> $request->dateOptention,]);
		return redirect()->route('profile',['user'=>Auth::user()
            ,
    											'diplomes'=>$diplomes,
    											'langues'=>$langues,
    										 'qualifications'=>$qualifications,
    										   'typeFormationEnCours'=>$typeforma,
                                                ]);		

	}
	public function addLangue(Request $request,$idUser)
	{
        $typeforma=TypeFormationEnCours::all();  
		$diplomes=Diplome::all();
    	$langues=Langue::all();
    	$qualifications=Qualification::all();
		$user=Auth::user();
		$user->Langue()->attach($request->langue,['niveauLu' => $request->niveauLu,
												  'niveauParle'=> $request->niveauParle,
												  'niveauEcrit'=>$request->niveauEcrit,
												]);
		
		return redirect()->route('profile',['user'=>Auth::user(),
    											 'diplomes'=>$diplomes,
    											'langues'=>$langues,
    										 'qualifications'=>$qualifications,
    											'typeFormationEnCours'=>$typeforma,
                                                 ]);		
	

	}
	public function addQualification(Request $request,$idUser)
	{
        $typeforma=TypeFormationEnCours::all();  
		$diplomes=Diplome::all();
     	$langues=Langue::all();
     	$qualifications=Qualification::all();
    	
		$user=Auth::user();
		$user->Qualification()->attach($request->qualification);
		return redirect()->route('profile',['user'=>Auth::user(),
    											'diplomes'=>$diplomes,
    											'langues'=>$langues,
    										   'qualifications'=>$qualifications,
    										  'typeFormationEnCours'=>$typeforma,               
                  ]);		
	

	}

    public function addFormationAcademique(Request $request,$idUser)
    {
        FormationAcademique::create([
        'personne_id'=>$idUser,
        'nomFormationAcademique'=>$request->nomFormationAcademique,
        'dateFormationAcademique'=>$request->dateFormationAcademique,
        'lieuFormationAcademique'=>$request->lieuFormationAcademique,

        ]);   

        $typeforma=TypeFormationEnCours::all();  
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        $user=Auth::user();
        


return redirect()->route('profile',['user'=>Auth::user(),
                                                 'diplomes'=>$diplomes,
                                                 'langues'=>$langues,
                                                 'qualifications'=>$qualifications,
                                                     'typeFormationEnCours'=>$typeforma,      
                                                ]);     
    



    }


public function addFormationEnCours(Request $request, $idUser)
    {

        FormationEnCours::create([
        'typeFormationEnCours_id'=>$request->typeFormationEnCours_id,
        'libelleFormation'=>$request->libelleFormation,
        'debut'=>$request->debut,
        'lieuFormation'=> $request->lieuFormation,
        'personne_id'=> $idUser,
        ]);
        
        $typeforma=TypeFormationEnCours::all();  
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        $user=Auth::user();
        return redirect()->route('profile',['user'=>Auth::user(),
                                                'diplomes'=>$diplomes,
                                                 'langues'=>$langues,
                                                 'qualifications'=>$qualifications,
                                                'typeFormationEnCours'=>$typeforma,
                                                ]);     
    }

    public function addExperienceSpe(Request $request, $idUser)
    {
        ExperienceSpecifique::create([
            'personne_id'=>$idUser,
            'resume'=>$request->resume,
            'dateFinExperience'=>$request->dateFinExperience,
            'pays'=>$request->pays,
        ]);

        $typeforma=TypeFormationEnCours::all();  
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        $user=Auth::user();
        return redirect()->route('profile',['user'=>Auth::user(),
                                                'diplomes'=>$diplomes,
                                                 'langues'=>$langues,
                                                 'qualifications'=>$qualifications,
                                                'typeFormationEnCours'=>$typeforma,
                                                ]);


    }

public function addExperiencePro(Request $request, $idUser)
    {

        ExperienceProfessionnelle::create([
            'posteOccupe'=>$request->posteOccupe,
            'description'=>$request->description,
            'DebutExperience'=>$request->DebutExperience,
            'FinExperience'=>$request->FinExperience,
            'pays'=>$request->pays,
            'personne_id'=>$idUser,
        ]);

        $typeforma=TypeFormationEnCours::all();  
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        $user=Auth::user();
        return redirect()->route('profile',['user'=>Auth::user(),
                                                'diplomes'=>$diplomes,
                                                 'langues'=>$langues,
                                                 'qualifications'=>$qualifications,
                                                'typeFormationEnCours'=>$typeforma,
                                                ]);


    }

public function addReference(Request $request, $idUser)
    {

        Reference::create([
            'nomReference'=>$request->nomReference,
            'prenomReference'=>$request->prenomReference,
            'emailReference'=>$request->emailReference,
            'telephoneReference'=>$request->telephoneReference,
            
            'personne_id'=>$idUser,
        ]);

        $typeforma=TypeFormationEnCours::all();  
        $diplomes=Diplome::all();
        $langues=Langue::all();
        $qualifications=Qualification::all();
        $user=Auth::user();
        return redirect()->route('profile',['user'=>Auth::user(),
                                                'diplomes'=>$diplomes,
                                                 'langues'=>$langues,
                                                 'qualifications'=>$qualifications,
                                                'typeFormationEnCours'=>$typeforma,
                                                ]);


    }

public function mesProjets($idUser)
    {

            $user=User::find($idUser);
            return $user->Projet;
    }

}
