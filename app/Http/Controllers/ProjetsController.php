<?php

namespace App\Http\Controllers;
use App\Models\StructAdmin\Equipe;
use App\Models\StructAdmin\UniteDeRecherche;

use Illuminate\Http\Request;
use App\Models\Projet\Projet;
use App\Models\Projet\TypeProjet;
class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projets=Projet::all();
        return view('projet.index',compact('projets'))->with(['comeForm','projets']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unites=UniteDeRecherche::all();
        $equipes=Equipe::all();
        $typeProjets=TypeProjet::all();

        return view('projet.create')
        ->with(['typeProjets'=>$typeProjets])
        ->with(['unites'=>$unites])
        ->with(['equipes'=>$equipes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Projet::create([
            'codeMuraz'=>$request->codeMuraz,
            // 'unite_id'=>,
             'equipe_id'=>$request->equipe_id,
            // 'ideeDeProjet_id'=>,
             'intitule'=>$request->intitule,
             'dureeProjet'=>$request->dureeProjet,
            'resumeProjet'=>$request->resumeProjet,
            'budgetProjet'=>$request->budgetProjet,
            'siteDeMiseEnOeuvre'=>$request->siteDeMiseEnOeuvre,
            'contexteProjet'=>$request->contexteProjet,
           // 'nombreEmploi'=>$request->nombreEmploi,
            'fraisIndirectverseCM'=>$request->fraisIndirectverseCM,
            'typeProjet_id'=>$request->typeProjet_id,
            'questionDeRecherche'=>$request->questionDeRecherche,
            'resumeDesMethodeEtude'=>$request->resumeDesMethodeEtude,
            'beneficeNational'=>$request->beneficeNational,
            'beneficeInstitutionnel'=>$request->beneficeInstitutionnel,
        ]);
    
        $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $projet=Projet::with([ 'Objectif',
                            'ResultatObtenu',
                            'InvestigateurInterne',
                            'CoInvestigateurInterne',
                            'CoInvestigateurExterne',
                            'InvestigateurInterne',
                            'InvestigateurExterne',

                                ])
                    ->get()->find($id);
      return view('projet.show',compact('projet'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changeStatut($idProjet,$idStatut)
        {
        $projet=Projet::find($idProjet);
        if(!count($projet->Statut))
        {
          Projet::find($idProjet)->Statut()->attach($idStatut, ['debutStatut' => now()]);    
        }
       //   else
       //  {              
       // // $page->tags()->wherePivot('finStatut', null)->sync($tagIds);
       //  }   

}




}
