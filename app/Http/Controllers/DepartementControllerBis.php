<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartementControllerBis extends Controller
{
		public function wordProjet($projets,$newSectionGenerale)
    		{
				 $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
            	$styleCell = array('valign' => 'center');
            
            	$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '000', 'bgColor' => 'ececec');
                        
            	$word = new \PhpOffice\PhpWord\PhpWord();
            
            	$word->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
            
            
           		 $newSectionGenerale = $word->addSection();
           		        























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

}
