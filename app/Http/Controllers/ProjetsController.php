<?php

namespace App\Http\Controllers;
use App\Models\StructAdmin\Equipe;
use App\Models\StructAdmin\UniteDeRecherche;
use Auth;
use Illuminate\Http\Request;
use App\Models\Projet\Projet;
use App\Models\Projet\TypeProjet;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Projet\ResultatObtenu;
use App\Models\Projet\Objectif;
use App\User;
use Carbon\Carbon;
use App\Models\Projet\Statut;
use Illuminate\Database\Eloquent\Collection;
class ProjetsController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');

        Carbon::setLocale(config('app.locale'));
        Carbon::setToStringFormat('d/m/Y à H:i:s');

    }












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
        $statuts=Statut::all();
        return view('projet.create')
        ->with(['typeProjets'=>$typeProjets])
        ->with(['unites'=>$unites])
        ->with(['equipes'=>$equipes])
        ->with(['statuts'=>$statuts]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $projet=Projet::create([
            'codeMuraz'=>$request->codeMuraz,
            'unite_id'=>$request->unite_id,
             'equipe_id'=>$request->equipe_id,
            //'ideeDeProjet_id'=>,
             'intitule'=>$request->intitule,
             'dureeProjet'=>$request->dureeProjet,
            'resumeProjet'=>$request->resumeProjet,
            'budgetProjet'=>$request->budgetProjet,
            'siteDeMiseEnOeuvre'=>$request->siteDeMiseEnOeuvre,
            'contexteProjet'=>$request->contexteProjet,
           //'nombreEmploi'=>$request->nombreEmploi,
            'fraisIndirectverseCM'=>$request->fraisIndirectverseCM,
            'typeProjet_id'=>$request->typeProjet_id,
            'questionDeRecherche'=>$request->questionDeRecherche,
            'resumeDesMethodeEtude'=>$request->resumeDesMethodeEtude,
            'beneficeNational'=>$request->beneficeNational,
            'beneficeInstitutionnel'=>$request->beneficeInstitutionnel,
        ]);
        
           
           $projet->Statut()->attach($request->statut_id, ['debutStatut' => now()] );
            
            if($request->statut_id==6)
            {
                $projet=Projet::find($projet->id);
                $projet->evolution=100;
                $projet->save();
            }



            $permission = Permission::create(['name' => 'edit projet '.$projet->id]);
            Auth::user()->givePermissionTo('edit projet '.$projet->id);
            return redirect('/projets');

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
    //return $projet->InvestigateurInterne->get('id')->toArray();

        $users=User::all();
        //whereNotIn('id',$projet->InvestigateurInterne->get('id'));
      return view('projet.show',compact('projet'))->with(["users"=>$users]);  
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
       
}
    public function addResultat(Request $request, $idProjet)
    { 
            
            ResultatObtenu::create([
                'projet_id'=>$idProjet,
                'contenu'=>$request->contenu,
                'dateRealisation'=>now(),
                'detailResutltat'=>' ',
            ]);        
    
         return redirect()->route('projets.show',$idProjet);

    }

    public function addObectif(Request $request, $idProjet)
    {
        Objectif::create([
            'projet_id'=>$idProjet,
            'intiule'=>'Titre',
            'description'=>$request->description,
            'typeObjectif'=>$request->typeObjectif,


        ]);

     return redirect()->route('projets.show',$idProjet);


    }


    public function addInvestigateur(Request $request,$idProjet)
    {
    
            
           // return $request->personne_id;


            $projet=Projet::find($idProjet);
            $projet->InvestigateurInterne()->attach($request->personne_id);
            return redirect()->route('projets.show',$idProjet);
    

    }

    public function addCoInvestigateur(Request $request,$idProjet)
    {
         $projet=Projet::find($idProjet);
            $projet->CoInvestigateurInterne()->attach($request->personne_id);
            return redirect()->route('projets.show',$idProjet);

    }    

    public function exporterProjet($idProjet)
    {
                    $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
                    $styleCell = array('valign' => 'center');
                    
                    $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
                                
                    $word = new \PhpOffice\PhpWord\PhpWord();
                    
                    $word->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
                    
                    
                    $newSectionGenerale = $word->addSection();
                    
                    $entete = $newSectionGenerale->createHeader();      
                    
                    $entete->addText('MINISTERE DE LA SANTE');
                    $entete->addText('    -------------     ');
                    $entete->addText('SECRETARIAT GENERAL');
                    $entete->addText('    -------------     ');
                                        


                    $projet=Projet::find($idProjet);
                                if($projet->Currentstatut->isNotEmpty()){   
            $newSectionGenerale->addTitle("Projet ".$projet->Currentstatut->first()->intituleStatut);
                    }else{
                        $newSectionGenerale->addTitle("Projet ");
                    }
               $newSectionGenerale->addText(" ");
               $newSectionGenerale->addText(" ");
               
               $table = $newSectionGenerale->addTable('Fancy Table');
                                

                                $table->addRow();
                                $table->addCell(4000,$styleCell)->addText("Intitulé: ".$projet->intitule);
                                $table->addCell(4000,$styleCell)->addText("Unite de recherche : ".$projet->UniteDeRecherche->nomUnite);
                                

                                $table->addRow();
                                foreach ($projet->institutionFinancier as $inst)
                                {
                                    $listInst.=$inst->nomInstitution.' ,';
                                }
                                if(isset($listInst)){
                                    $instList=$listInst;
                                }else
                                {
                                    $instList=" Aucune institution Sponsor";
                                }
                                $table->addCell(4000,$styleCell)->addText("Sponsor: ".$instList);
                                $table->addCell(4000,$styleCell)->addText("Budget: ".$projet->budgetProjet );
                                $table->addRow();
                                $table->addCell(4000,$styleCell)->addText("Durée du projet: ".$projet->dureeProjet);
                                $listInstTech=" ";
                                foreach ($projet->InvestigateurInterne as $investigateur) 
                                {
                                    $listInstTech.=$investigateur->full_name.' ,';  
                                }
                                foreach($projet->CoInvestigateurInterne as $coinvestigateur)
                                {
                                    $listInstTech.=$investigateur->full_name.' ,';
                                }

                                foreach ($projet->institutionTechnique as $inst)
                                {
                                    $listInstTech.=$inst->nomInstitution.' ,';
                                }

                                if(isset($listInstTech)){
                                    $instListTech=$listInstTech;
                                }else
                                {
                                    $instListTech=" Aucune institution technique ";
                                }
                                $table->addCell(4000,$styleCell)->addText("Equipe de recherche et partenairiats etablis : ".$instListTech);
                                $table->addRow();
                                $table->addCell(4000,$styleCell)->addText("Site de mise en oeuvre au BF: ".$projet->siteDeMiseEnOeuvre);
                                $table->addCell(4000,$styleCell)->addText("Code Muraz: ".$projet->codeMuraz);
                                
                                $table->addRow(1750);
                                $table->addCell(10000,$styleCell)->addText("Contexte/ justification: ".$projet->contexteProjet);
                                
                                $table->addRow(1750);
                                $table->addCell(10000,$styleCell)->addText("Question de recherche / hypothèse: ".$projet->questionDeRecherche);
                                
                                $table->addRow(1750);
                                $objectifs=$table->addCell(8000,$styleCell);
                                $objectifs->addText("Objectifs : ");
                                $objectifPri=$projet->Objectif->where('typeObjectif','principal');
                                $objectifSec=$projet->Objectif->where('typeObjectif','secondaire');

                                //Objectif Doit faire un retrait sur la line. 
                                $objectifs->addText('-  Principal',null,
                                                    array( 'indentation' => array('left' => 240)));
                                foreach ($objectifPri as $obj) {
                                $objectifs->addText($obj->description);
                                    
                                    }
                                
                                $objectifs->addText('-  Secondaires',null,
                                                    array( 'indentation' => array('left' => 240)));
                                foreach ($objectifPri as $obj) {
                                $objectifs->addText($obj->description);
                                    
                                    }
                                
                                //activites
                                $table->addRow(2000);
                                $table->addCell(10000)->addText("Résumé des méthodes d\'étude: ".$projet->resumeDesMethodeEtude);
                                $table->addRow(2000);
                                $activites = $table->addCell(10000);
                                $activites->addText("Activités menées jusqu'en dateQuestion: ");
                                foreach ($projet->Activite as $act) {
                                    $activites->addText($act->contenu.' '.$act->dateActivite);
                                }
                                
                                //Resultat
                                $table->addRow(2000);
                                $resultats = $table->addCell(10000);
                                $resultats->addText("Resultats obtenu jusqu'en dateQuestion: ");
                                  $resultats->addText($projet->resumeDesMethodeEtude);
                                foreach ($projet->ResultatObtenu as $resul) {
                                    $resultats->addText($resul->contenu);
                                }
                                
                                //publications
                                    
                                
                                $table->addRow(3000);
                                $publications = $table->addCell(10000);
                                $publications->addText("Valorisation planifiée ou déja effectuée des resultats préliminaires du projet: ");
                                    //Articles
                                $nbrArticle=$projet->Publication->where('typePublication_id',1)->where('projet_id',$projet->id)->count();

                                $publications->addText("Articles: ".$nbrArticle);
                                
                                //Communication orales
                                $nbrOrale=$projet->Publication->where('typePublication_id',2)->where('projet_id',$projet->id)->count();
                                
                                $publications->addText("Communications orales: ".$nbrOrale);

                                //Posters
                                $nbrPoster=$projet->Publication->where('typePublication_id',3)->where('projet_id',$projet->id)->count();
                                
                                $publications->addText("Posters : ".$nbrPoster);

                                //Autres retombés 
                                
                                $nbrAutre=$projet->Publication->where('typePublication_id','!=',1)->where('typePublication_id','!=',2)->where('typePublication_id','!=',3)->count();
                                
                                $publications->addText("Autres : ".$nbrAutre);
                                
                                $table->addRow(3000);
                                $retombes = $table->addCell(10000);
                                $retombes->addText("Frais indirects versées au CM: ".$projet->fraisIndirectverseCM);
                                $retombes->addText("Equipemens acquis: ".$projet->EquipementAcquis->count());
                                $retombes->addText("Bourse de formation: ".$projet->Bourse->count());

                                $table->addRow(1500);
                                $perspectives = $table->addCell(10000);
                                $perspectives->addText("Perspectives: ");

                                foreach ($projet->Perspective as $per) 
                                {
                                    $perspectives->addText('-'.$per->contenu);
 
                                }
                                

                        










                    $file='rapportProjet'.$projet->id.'.docx';
                    $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($word,'Word2007');
                    try{
                            $objectWriter->save(storage_path($file));
                        }   
                    catch(Exception $e)
                        {

                        }
                    return response()->download(storage_path($file));

    }
    public function projetChercheur($idUser)
    {
        $user=User::find($idUser);
        $projets= new Collection();
        $user->ProjetInvestigue;
        $projets->merge($user->ProjetInvestigue);
        $projets->merge($user->ProjetCoInvestigue);
        $projets->merge($user->UniteDeRecherche->Projet);
        //return $user->ProjetInvestigue;
         return view('projet.projetPerso')->with(['projets'=>$user->ProjetInvestigue]);
        
    }

}
