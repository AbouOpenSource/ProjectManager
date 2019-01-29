<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class WordGenerateController extends Controller
{
  			public function createWordDocx()
			{

					$wordTest = new \PhpOffice\PhpWord\PhpWord();
					$styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
					$styleCell = array('valign' => 'center');
					$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
					
					$wordTest->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
					
					$newSection = $wordTest->addSection();

					$desc1="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, molestias odio facilis pariatur ad illum harum recusandae? Libero provident explicabo, in incidunt beatae architecto. Quia eum incidunt dolores suscipit autem?";

					$desc2="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa rerum ullam repellendus officia dolore quos tempora culpa repellat sit ut? Mollitia praesentium ullam soluta fugiat, molestiae. Minima distinctio praesentium quia.";

					$newSection->addText($desc1);
					$newSection->addText($desc2);
					$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest,'Word2007');
					try{
						$objectWriter->save(storage_path('TestWordFile.docx'));
					}	catch(Exception $e)
					{

					}
					return response()->download(storage_path('TestWordFile.docx'));

			}


public function createWordCV($idUser)
			{
					$wordTest = new \PhpOffice\PhpWord\PhpWord();
					$styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
					$styleCell = array('valign' => 'center');
					$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
					$wordTest->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
					
	$fontStyleName = 'oneUserDefinedStyle';
$wordTest->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$wordTest->addFontStyle(
    'titleStyle',
    array('name' => 'Tahoma', 'size' => 20, 'color' => '1B2232', 'bold' => true)
);
$wordTest->setDefaultFontName('Times New Roman');
$wordTest->setDefaultFontSize(12);

					$number=1;
					$user=User::find($idUser);
					$header = array('size' => 16, 'bold' => true);
					\PhpOffice\PhpWord\Settings::setCompatibility(false);
					$wordTest->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));
					$newSectionGenerale = $wordTest->addSection();

//					$newSectionFormation = $wordTest->addSection();

//					$newSectionLangue = $wordTest->addSection();

					$Titre="CURRICULUM VITAE";

					$Qualifications="";

					$title1=$number.". Informations générales";
					$number++;
					$newSectionGenerale->addText($Titre,$fontStyleName);
					$newSectionGenerale->addText($title1);
					$newSectionGenerale->addText(" ");
					
					$newSectionGenerale->addText('-  Nom de famille : '.$user->nom,
						null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)));
					
					$newSectionGenerale->addText('-  Prénoms : '.$user->prenom,
						null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)));
					

					$newSectionGenerale->addText('-  Matricule:'.$user->id,null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)));


if($user->Diplome->isNotEmpty())
					$newSectionGenerale->addText(" ");
{					
					$title2=$number.". Nationalité: Formation";
					$number++;
					$newSectionGenerale->addText($title2);
					$rows = count($user->Diplome);
					$newSectionGenerale->addText(" ");
					
					$table = $newSectionGenerale->addTable('Fancy Table');
					$table->addRow();
    				$table->addCell(1750,$styleCell)->addText("Diplome obtenu");
    				$table->addCell(1750,$styleCell)->addText("Numero diplome");
    				$table->addCell(1750,$styleCell)->addText("Date d'optention");
    								
					foreach($user->Diplome as $diplome) 
					{
    				$table->addRow();
    				$table->addCell(1750,$styleCell)->addText($diplome->libelleDiplome);
					$table->addCell(1750,$styleCell)->addText($diplome->pivot->numeroDiplome);
					$table->addCell(1750,$styleCell)->addText($diplome->pivot->dateDoptention);
        			}
}

if($user->Langue->isNotEmpty())
{
					$newSectionGenerale->addText(" ");
					
					$title3=$number.". Niveau des langues connues: (par compétences de 1-excellent à 5- rudimentaire)";
					$number++;
					$newSectionGenerale->addText($title3);
					//$rows = count($user->Diplome);
					$newSectionGenerale->addText(" ");
					
					$tableLangue = $newSectionGenerale->addTable('Fancy Table');
					$tableLangue->addRow();
    				$tableLangue->addCell(1750,$styleCell)->addText("Langues");
    				$tableLangue->addCell(1750,$styleCell)->addText("Lu");
    				$tableLangue->addCell(1750,$styleCell)->addText("Parlé");
    				$tableLangue->addCell(1750,$styleCell)->addText("Ecrit");
    				
					foreach($user->Langue as $langue) 
					{
    				$tableLangue->addRow();
    				$tableLangue->addCell(1750,$styleCell)->addText($langue->intituleLangue);
					$tableLangue->addCell(1750,$styleCell)->addText($langue->pivot->niveauLu);
					$tableLangue->addCell(1750,$styleCell)->addText($langue->pivot->niveauParle);
					$tableLangue->addCell(1750,$styleCell)->addText($langue->pivot->niveauEcrit);

        			}
}				
if($user->Association->isNotEmpty())
{
					$newSectionGenerale->addText(" ");
					
					$title4=$number.".Association ou corps professionnels: ";
					$number++;
					$newSectionGenerale->addText(" ");
					
					$newSectionGenerale->addText($title4);
					foreach($user->Association as $assoc) 
					{
    			$newSectionGenerale->addText('-'.$assoc->nomAssociation,
						null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)
								)
											);
					
					
        			}
}

if($user->Qualification->where('typeQualification','Secondaire'))
					$newSectionGenerale->addText(" ");
{					
					$title5=$number.".Autre qualifications ";
					$number++;
					$newSectionGenerale->addText($title5);
					$newSectionGenerale->addText(" ");
					
					foreach($user->Qualification->where('typeQualification','Secondaire') as $quali) 
					{
    			$newSectionGenerale->addText('-'.$quali->nomQualification,
						null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)
								)
											);
					
					
        			}
}
if($user->Qualification->where('typeQualification','Principale'))
{	
					$newSectionGenerale->addText(" ");				
					$title6=$number.".Qualifications Principale: ";
					$number++;
					$newSectionGenerale->addText(" ");
					
					$newSectionGenerale->addText($title6);
					foreach($user->Qualification->where('typeQualification','Principale') as $quali) 
					{
    						$newSectionGenerale->addText('-'.$quali->nomQualification,
						null,
						array('widowControl' => false, 
								'indentation' => array('left' => 240)
								)
											);
        			}

}

if($user->ExperienceSpecifique->isNotEmpty())
{
					$newSectionGenerale->addText(" ");
					
					$title7=$number.". Experience Specifique";
					$number++;
					$newSectionGenerale->addText($title7);
					
					$newSectionGenerale->addText(" ");
					
					$table = $newSectionGenerale->addTable('Fancy Table');
					$table->addRow();
    				$table->addCell(1750,$styleCell)->addText("Pays");
    				$table->addCell(1750,$styleCell)->addText("Date debut ");
    				$table->addCell(1750,$styleCell)->addText("Resumé");				
					foreach($user->ExperienceSpecifique as $exp) 
					{
    			$table->addRow();
    			$table->addCell(1750,$styleCell)->addText($exp->pays);
				$table->addCell(1750,$styleCell)->addText($exp->dateFinExperience);
				$table->addCell(1750,$styleCell)->addText($exp->resume);
        			}
}
if($user->ExperienceProfessionnelle->isNotEmpty())
					
{					
					$newSectionGenerale->addText(" ");
					$title8=$number.". Experience professionnelles";
					$number++;
					$newSectionGenerale->addText($title8);
					
					$newSectionGenerale->addText(" ");
					$table = $newSectionGenerale->addTable('Fancy Table');
					$table->addRow();
    				$table->addCell(1750,$styleCell)->addText("Debut et Fin");
    				$table->addCell(1750,$styleCell)->addText("Pays ");
    				$table->addCell(1750,$styleCell)->addText("Poste occupé ");

    				$table->addCell(3000)->addText("Description");				
					foreach($user->ExperienceProfessionnelle as $exp) 
					{
		    			$table->addRow();
		    			$table->addCell(1750,$styleCell)->addText($exp->DebutExperience.'-'.$exp->FinExperience);
						$table->addCell(1750,$styleCell)->addText($exp->pays);
						$table->addCell(1750,$styleCell)->addText($exp->posteOccupe);
						
						$table->addCell(3000,$styleCell)->addText($exp->description);
		        		
        			}
}

if($user->Publication->sortBy('datePublication')->isNotEmpty())
{					$newSectionGenerale->addText(" ");
					$title9=$number.". Les publications de $user->nom";
					$number++;
					$newSectionGenerale->addText($title9);
					//$newSectionGenerale->addText($i);
					$newSectionGenerale->addText(" ");
					$numb=1;
							foreach ($user->Publication->sortBy('datePublication') as $publi) 
							{ 	$newSectionGenerale->addText("Publication ".$numb);
								$newSectionGenerale->addText($publi->libellePublication.' '.$publi->YearPubli->year,null,array('widowControl' => false, 
										'indentation' => array('left' => 240)));
							$newSectionGenerale->addText(' ');
							$numb++;
							}	
							
}



if($user->CoPublication->sortBy('datePublication')->isNotEmpty())
{					$newSectionGenerale->addText(" ");
					$title10=$number.". Les Co publications de $user->nom";
					$number++;
					$newSectionGenerale->addText($title10);
					
					$newSectionGenerale->addText(" ");
						$numb=1;
							foreach ($user->CoPublication->sortBy('datePublication') as $publi) 
							{
						$newSectionGenerale->addText("Co Publication ".$numb);
								
						$newSectionGenerale->addText('Auteur '.$publi->pivot->ordreDimplication);
								$newSectionGenerale->addText($publi->libellePublication.' '.$publi->YearPubli->year,null,array('widowControl' => false, 
										'indentation' => array('left' => 240)));
							}	
							
}


if($user->Reference->isNotEmpty())
{					

					$newSectionGenerale->addText(" ");
					$title10=$number.". Experience Specifique";
					$number++;
					$newSectionGenerale->addText($title10);
					
					$newSectionGenerale->addText(" ");
					$table = $newSectionGenerale->addTable('Fancy Table');
					$table->addRow();
    				$table->addCell(2000,$styleCell)->addText("Nom et prenoms");
    				$table->addCell(2000,$styleCell)->addText("Email");
    				$table->addCell(2000,$styleCell)->addText("Telephone");				
					foreach($user->Reference as $ref) 
					{
		    			$table->addRow();
		    			$table->addCell(2000,$styleCell)->addText($ref->nomReference.' '.$ref->prenomReference);
						$table->addCell(2000,$styleCell)->addText($ref->emailReference);
						$table->addCell(2000,$styleCell)->addText($ref->telephoneReference);
						
						
		        		
        			}
}

				//$categories =array('A', 'B', 'C', 'D', 'E');
				//$series =array(1, 3, 2, 5, 4);
				//$chart = $newSectionGenerale->addChart('line', $categories, $series);

					$filename=$user->name.now().'.docx';
					$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest,'Word2007');
					try{
							$objectWriter->save(storage_path($filename));
						}	
					catch(Exception $e)
						{

						}
					return response()->download(storage_path($filename));

			}



}