<?php

namespace App\Http\Controllers;
use App\Models\Cv\PersonneInterne;
use Illuminate\Http\Request;
use App\Models\StructAdmin\Direction;
class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction=Direction::all();
        dump($direction);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    // public function reportingDirection()
    // {

    //      $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
    //                 $styleCell = array('valign' => 'center');
                    
    //                 $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '000', 'bgColor' => 'ececec');
                                
    //                 $word = new \PhpOffice\PhpWord\PhpWord();
                    
    //                 $word->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
                    
                    
    //                 $newSectionGenerale = $word->addSection();
                    
    //                 $entete = $newSectionGenerale->createHeader();      
                    
    //                 $entete->addText('MINISTERE DE LA SANTE');
    //                 $entete->addText('    -------------     ');
    //                 $entete->addText('SECRETARIAT GENERAL');
    //                 $entete->addText('    -------------     ');
    //                 $entete->addImage(public_path("logo.jpg"),array(
    //                             'width' => 100,
    //                             'height' => 50,
    //                             'wrappingStyle' => 'square',
    //                             'positioning' => 'absolute',
    //                             'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_CENTER,
    //                             'posHorizontalRel' => 'margin',
    //                             'posVerticalRel' => 'line',
    //                             ));

    //                 $newSectionEquipe = $word->addSection();
    //                 $newSectionEquipe->addText($departement->nomDepartement);
    //                 $newSectionEquipe->addText('Liste du personnel chercheur de '.$departement->nomDepartement);
    //        $departements=Departement::all();
    //     foreach ($departements as $departement) {
    

    //      $equipes=$departement->Equipe;
    //      $laboratoires=$departement->Laboratoire;


    //         foreach ($equipes as $equipe) 
    //         {
                        
    //                 $table = $newSectionEquipe->addTable('Fancy Table');
                        
    //                     $table->addRow();
    //                     $table->addCell($styleCell)->addText($equipe->nomEquipe);
    //                     $table->addRow();
    //                     $table->addCell(2000,$styleCell)->addText("Numero");
    //                     $table->addCell(2000,$styleCell)->addText("Nom et Prenoms");
    //                     $table->addCell(2000,$styleCell)->addText("Diplomes");
    //                     $table->addCell(2000,$styleCell)->addText("Qualifications");
    //                 foreach ($equipe->PersonneInterne as $membre) 
    //                 {
                                
    //                         $table->addRow();
                            
    //                         $table->addCell(2000,$styleCell)->addText($membre->id);
    //                         $table->addCell(2000,$styleCell)->addText($membre->full_name);
    //                         $diplome=$membre->Diplome->sortByDesc('niveauDiplome')->first();
                           
    //                         // foreach ($membre->Diplome as $diplome) {
    //                         //  $listeDiplome.= $diplome->libelleDiplome.', ';
    //                         // }
                           
    //                         $table->addCell(2000,$styleCell)->addText($diplome->libelleDiplome);

    //                        // $qualifications=$membre->Qualification->sortByDesc('niveauDiplome')->first();
                           
    //                          foreach ($membre->Qualification as $qualification) {
    //                           $listeQualification.= $qualification->nomQualification.', ';
    //                          }
    //                         $table->addCell(2000,$styleCell)->addText($listeQualification);
    //                 }

    //                         $table->addRow();
    //                         $table->addCell(2000,$styleCell)->addText("Total des personnes :");
    //                         $table->addCell(2000,$styleCell)->addText($equipe->PersonneInterne->count());
                            

    //         }

    //     $equipes=$departement->Equipe;
    //     $newSectionEquipe = $word->addSection();
    

    //     $newSectionGenerale->addTitle("Projets de ".$departement->nomDepartement);
    //     $table = $newSectionEquipe->addTable('Fancy Table');
                        
    //                     $table->addRow();
    //                     $table->addCell(2000,$styleCell)->addText("Equipe ");
    //                     $table->addCell(2000,$styleCell)->addText("Numero projet");
    //                     $table->addCell(2000,$styleCell)->addText("Intutilé de projet");
    //                     $table->addCell(2000,$styleCell)->addText("Statut");
    //       foreach ($equipes as $equipe) 
    //       {
                      
    //             $projets=$equipe->projets;
    //                 foreach ($projets as $projet) 
    //                 {
                        
    //                     $table->addRow();
    //                     $table->addCell(2000,$styleCell)->addText($equipe->nomEquipe); 
    //                     $table->addCell(2000,$styleCell)->addText($projet->id);
    //                     $table->addCell(2000,$styleCell)->addText($projet->intitule);
    //                     $table->addCell(2000,$styleCell)->addText($projet->CurrentStatut->first()->intituleStatut);   
    //                 }
    //         }          

    //         $projets=new Collection();
    //     foreach ($departement->Equipe as $equipe) {
    //         $projets=$projets->merge($equipe->Projet);
    //     }
    //     // Projets termines 
    //   if($projets->isNotEmpty())
    //   {
    //     $projetTermine=$projets->CurrentStatut->where('intituleStatut','Terminé');
    //     $newSectionProjetTermine = $word->addSection();
    //     $newSectionProjetTermine->addTitle("Projets Terminés");
    //     wordProjet($projetTermine,$newSectionProjetTermine);




    //     // Projets en cours 
    //     $projetEnCours=$projets->CurrentStatut->where('intituleStatut','En cours');
    //     $newSectionProjetEnCours = $word->addSection();
    //     $newSectionProjetEnCours->addTitle("Projets En cours");
    //     wordProjet($projetEnCours,$newSectionProjetEnCours);





    //     //Projets soumis
    //     $projetSoumis=$projets->CurrentStatut->where('intituleStatut','Soumis');
    //     $newSectionProjetSoumis = $word->addSection();
    //     $newSectionProjetSoumis->addTitle("Projets Soumis");
    //     wordProjet($projetSoumis,$newSectionProjetSoumis);
    //     }
    // }
    //     //les publications 
    //     $publications=Publication::all();
    //     $newSectionPublication = $word->addSection();
    //     // wordPublication($publications,$newSectionPublication);

    //     foreach($publications as $publication) 
    //                 {
    //                         $newSectionPublication->addTitle("Les publications");
    //                         $auteur=$publication->auteur->first();
    //                         $coAuteur=$publication->coAuteur->sortBy('ordreDimplication');
    //                         $listeCoAuteur=" ";
    //                         if($coAuteur->isNotEmpty())
    //                         {
                            
    //                         foreach($coAuteur as $person) 
    //                         {
    //                             $listeCoAuteur.=$person->full_name.' ,';
    //                         }
    //                 $newSectionPublication->addText($auteur->full_name.' ,'.$listeCoAuteur.' '.$publication->datePublication);
    //                         }
    //                         else
    //                         {
    //                             $newSectionPublication->addText($auteur->full_name.' '.$publication->datePublication);
                                
    //                         }
    //                 }
    



    //                 $filename=$departement->nomDepartement.now().'.docx';
    //                 $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($word,'Word2007');
    //                 try{
    //                         $objectWriter->save(storage_path($filename));
    //                     }   
    //                 catch(Exception $e)
    //                     {

    //                     }
    //                 return response()->download(storage_path($filename));


    // }



    // }


    public function wordProjet($projets,$newSectionGenerale)
    {

        foreach ($projets as $projet) 
                    {
                            $newSectionGenerale->addTitle("Projet".$projet->id);
                    
                            $title="Project";
                        

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
                                $table->addCell(4000,$styleCell)->addText("Code Muraz: ".$projet->siteDeMiseEnOeuvre);
                                
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
                                $activites->addText("Activités menées jusqu'en dateQuestion: ".$projet->resumeDesMethodeEtude);
                                foreach ($projet->Activite as $act) {
                                    $activites->addText($act->contenu);
                                }
                                
                                //Resultat
                                $table->addRow(2000);
                                $resultats = $table->addCell(10000);
                                $resultats->addText("resultats obtenu jusqu'en dateQuestion: ".$projet->resumeDesMethodeEtude);
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
                                

                        }                    
    }

            public function affichePage()
            {
                return view('direction.pageReporting');
            }

    public function afficherChercheur()
    {
        $personnes=PersonneInterne::all();
        return view('direction.chercheur')->with(['personnes'=>$personnes]);
    }
}
