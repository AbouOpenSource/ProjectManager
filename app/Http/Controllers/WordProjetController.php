<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\StructAdmin\Departement;
use App\Models\Projet\Projet;
use App\Models\Publication\Publication;
class WordProjetController extends Controller
{
    public function createProjetRapport()
    {
    				$styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
					$styleCell = array('valign' => 'center');
					
					$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
								
					$word = new \PhpOffice\PhpWord\PhpWord();
					
					$word->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
					$fontStyleName = 'oneUserDefinedStyle';
$word->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$word->addFontStyle(
    'titleStyle',
    array('name' => 'Tahoma', 'size' => 20, 'color' => '1B2232', 'bold' => true,'align'=>'center')
);
					
					$newSectionGenerale = $word->addSection();
					$word->setDefaultFontName('Times New Roman');
$word->setDefaultFontSize(12);
					$entete = $newSectionGenerale->createHeader();		
					
					$entete->addText('MINISTERE DE LA SANTE');
					$entete->addText('	  -------------	    ');
					$entete->addText('SECRETARIAT GENERAL');
					$entete->addText('	  -------------	    ');
				
$newSectionGenerale->addText('Le reporting général','titleStyle');
$newSectionGenerale->addText('');
				$departements=Departement::all();
 				foreach ($departements as $departement) 
{				$nombre=0;
 					$newSectionGenerale->addText($departement->nomDepartement,$fontStyleName);
 					if($departement->CurrentChef->isNotEmpty()){
 					$newSectionGenerale->addText("Chef de departement: ".$departement->CurrentChef->first()->name.' '.$departement->CurrentChef->first()->prenom);
 					}else
 					{
 					$newSectionGenerale->addText("Chef de departement:" );	
 					}
 					//$newSectionGenerale->addText(" ");

     				
                     $newSectionGenerale->addText('Liste du personnel chercheur du '.$departement->nomDepartement);
                      $laboratoires=$departement->Laboratoire;
 			foreach ($laboratoires as $laboratoire) 
 {
 				$unites=$laboratoire->UniteDeRecherche;
 					 //$newSectionGenerale->addText(' ');

                     foreach ($unites as $unite) 
 			         {	$newSectionGenerale->addText(' ');
        
                        $table = $newSectionGenerale->addTable('Fancy Table');
                        
                         $table->addRow();
                        $table->addCell(2000,$styleCell)->addText("Unite de recherche     ".$unite->nomUnite, array('align' => 'center'));
                         $table->addRow();
                        
                         $table->addCell(2000,$styleCell)->addText("Numero");
                        
                         $table->addCell(2000,$styleCell)->addText("Nom et Prenoms");
                        
                         $table->addCell(2000,$styleCell)->addText("Diplomes");
                        
                         $table->addCell(2000,$styleCell)->addText("Qualifications");
                     foreach ($unite->PersonneInterne as $membre) 
                    {                
                          $table->addRow();
                            
                              $table->addCell(2000,$styleCell)->addText($membre->id);
 					$table->addCell(2000,$styleCell)->addText($membre->name." ".$membre->prenom);
                    $diplome=$membre->Diplome->sortByDesc('niveauDiplome')->first();
                            
   					if($diplome!=null)
   							{
                              $table->addCell(2000,$styleCell)->addText($diplome->libelleDiplome); 
                          }
                    else
                              {
                              	$table->addCell(2000,$styleCell)->addText("Aucun diplome");
                              	 }
                              
                              

                             if($membre->Qualification->isEmpty()){
                             $listeQualification="Aucune qualification";
                         }
                         else
                         {

                         	$listeQualification=" ";
                      foreach ($membre->Qualification as $qualification) 
	  						{
           				$listeQualification.= $qualification->nomQualification.', ';
        					} 
        				}

                   $table->addCell(2000,$styleCell)->addText($listeQualification);
                     }
                     $table->addRow();
 
                     $table->addCell(2000,$styleCell)->addText("Nombre de chercheurs : ".$unite->PersonneInterne->count()." chercheurs");
                              	
// 				$nombre+=$unite->PersonneInterne->count();
 }

 }
$newSectionGenerale = $word->addSection();
 }








































					$publications=Publication::all();
        			//$newSectionGenerale = $word->addSection();
//return $publications;
       			$nbr=1;
                $newSectionGenerale->addText("Les publications",$fontStyleName);

        			foreach($publications as $publication) 
                    {
                            $newSectionGenerale->addText(' ');
                            $newSectionGenerale->addText("Publication",$nbr );
                            
                            $auteur=$publication->auteur;
                            $coAuteur=$publication->coAuteur->sortBy('ordreDimplication');
                            $listeCoAuteur=" ";
                        if($coAuteur->isNotEmpty())
                        {
                            
                            foreach($coAuteur as $person) 
                            {
                                $listeCoAuteur.=$person->name.' '.$person->prenom.' ,';
                            }
                        $newSectionGenerale->addText($auteur->name.' '.$auteur->prenom.' ,'.$listeCoAuteur.' '.$publication->libellePublication.' '.$publication->typePublication->intituleType.' '.$publication->datePublication->format('M d Y'));
                        }
                            else
                            {
                                $newSectionGenerale->addText($auteur->full_name.' '.$publication->libellePublication.' '.$publication->sourcePublication.' '.$publication->typePublication->intituleType." ".$publication->datePublication);
                                
                            }
                    $nbr++;
                    }


					
$newSectionGenerale = $word->addSection();
    
        $newSectionGenerale->addText("Projets de ".$departement->nomDepartement,$fontStyleName);
        $newSectionGenerale->addText(" ");

        $table = $newSectionGenerale->addTable('Fancy Table');
                        
                        $table->addRow();
                        $table->addCell(2000,$styleCell)->addText("Equipe ");
                        $table->addCell(2000,$styleCell)->addText("Numero projet");
                        $table->addCell(2000,$styleCell)->addText("Intutilé de projet");
                        $table->addCell(2000,$styleCell)->addText("Statut");

          foreach ($unites as $unite) 
          {
                      
               $projets=$unite->Projet;
               
                    foreach ($projets as $projet) 
                    {
                        
                        $table->addRow();
                        $table->addCell(2000,$styleCell)->addText($unite->nomUnite); 
                        $table->addCell(2000,$styleCell)->addText($projet->id);
                        $table->addCell(8000,$styleCell)->addText($projet->intitule);
                       // return $projet->Currentstatut;
                       if($projet->Currentstatut->isNotEmpty()) 
                       {
                        $table->addCell(2000,$styleCell)->addText($projet->Currentstatut->first()->intituleStatut);   
                        }
                        else
                        {
                        $table->addCell(2000,$styleCell)->addText("Aucun statut defini");   

                        } 
                    }



            }          



//$newSectionGenerale = $word->addSection();


					$user=Auth::user();
					$projets=Projet::whereNotNull('unite_id')->get();

					//return $projets;
					foreach ($projets as $projet) 
					{		
							$newSectionGenerale = $word->addSection();
					if($projet->Currentstatut->isNotEmpty()){
							$newSectionGenerale->addTitle("Projet ".$projet->Currentstatut->first()->intituleStatut);
					}else
					{
							$newSectionGenerale->addTitle("Projet ");
					}
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
								foreach ($objectifSec as $obj) {
								$objectifs->addText($obj->description);
									
									}
								
								//activites
								$table->addRow(2000);
								$table->addCell(10000)->addText("Résumé des méthodes d\'étude: ".$projet->resumeDesMethodeEtude);
								$table->addRow(2000);
								$activites = $table->addCell(10000);
								$activites->addText("Activités menées jusqu'en dateQuestion: ");
								foreach ($projet->Activite as $act) {
									$activites->addText($act->contenu);
								}
								
								//Resultat
								$table->addRow(2000);
								$resultats = $table->addCell(10000);
								$resultats->addText("resultats obtenu jusqu'en dateQuestion: ");
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

        				$filename="reporting".now().'.docx';
					$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($word,'Word2007');
					try{
							$objectWriter->save(storage_path($filename));
						}	
					catch(Exception $e)
						{

						}
					return response()->download(storage_path($filename));

	}



}
