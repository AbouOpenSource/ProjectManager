<?php
use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;
use App\Models\StructAdmin\UniteDeRecherche;
use App\Models\Institution\Institution;
use App\Models\Publication\Publication;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

Route::get('/date',function()
{

return Auth::user()->Qualification;

});










Route::get('/encore',function(){
	Auth::user()->assignRole('admin');



	return view('publication.test');
});

//Pour les tests

Route::get('/rapport','WordProjetController@createProjetRapport')->middleware(['auth']);

Route::get('/tester',['as'=>'tester','uses'=>'WordGenerateController@createWordDocx'])->middleware(['auth']);
Route::get('/profile/cv',['as'=>'/profile/cv','uses'=>'WordGenerateController@createWordCV'])->middleware(['auth']);
Route::get('/test',['as'=>'/test','uses'=>'WordGenerateController@test'])->middleware(['auth']);

Route::get('/droit',function()
	{

		$user=Auth::user();
		//$user->roles()->attach($roleId);
		$user->UniteDeRechercheChef()->attach(1,['debutMandat'=>now()]);
	});


//User profil route
Route::get('/profile','UserController@profile')->name('profile')->middleware(['auth']);
Route::post('/profile','UserController@updateAvatar')->middleware(['auth']);


//Chemins des informations publiques 
Route::get('/acceuil','PublicController@displayAcceuil')->name('get.home');
Route::get('/projetspublics', 'PublicController@indexProjet')->name('get.projetsPublics');
Route::get('/chercheurs', 'PublicController@indexChercheur')->name('get.chercheurs');
Route::get('/publicationsPubliques','PublicController@indexPublication')->name('get.publications');


//Chemins particuliers pour quelques informations
Route::get('/chercheur/{id}/publications','PublicationsController@indexPubliPerso')->name('get.publiperso')->middleware('auth');




Route::get('/','PublicController@displayAcceuil');

Auth::routes(['verify' => true]);



//Ressources fixées
Route::middleware(['auth'])->group(function () {
    

    Route::get('/noConfirmed', 'HomeController@approval')->name('approved');
    

    Route::middleware(['confirmed'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });










});

Route::resource('bourses','BoursesController')->middleware(['auth','confirmed']);

Route::resource('departements','DepartementsController')->middleware(['auth','confirmed']);

Route::resource('directions','DirectionsController')->middleware(['auth','confirmed']);

Route::resource('projets','ProjetsController')->middleware(['auth','confirmed']);

Route::resource('ideeDeProjets','IdeeDeProjetsController')->middleware(['auth','confirmed']);

Route::resource('personneinternes','PersonneInternesController')->middleware(['auth','confirmed']);

Route::resource('equipes','EquipesController')->middleware(['auth','confirmed']);

Route::resource('uniterecherches','UniteDeRecherchesController')->middleware(['auth','confirmed']);

Route::resource('publications','PublicationsController')->middleware(['auth','confirmed']);

Route::get('/publications/{id}/addCoAuteur','PublicationsController@addCoAuteur')->name('addCoAuteur');


Route::post('/publications/{id}/addPostCoAuteur','PublicationsController@addPostCoAuteur')->name('addPostCoAuteur');

Route::post('projets/{id}/resultatObtenu/store','ProjetsController@addResultat')->name('createResultat')->middleware(['auth','confirmed']);
Route::post('projets/{id}/Objectif/store','ProjetsController@addObectif')->name('createObectif')->middleware(['auth','confirmed']);


Route::post('user/{id}/addDiplome','UserController@addDiplome')->name('addDiplome')->middleware(['auth','confirmed']);

Route::post('user/{id}/addLangue','UserController@addLangue')->name('addLangue')->middleware(['auth','confirmed']);

Route::post('user/{id}/addQualification','UserController@addQualification')->name('addQualification')->middleware(['auth','confirmed']);

Route::post('user/{id}/addFormationEnCours','UserController@addFormationEnCours')->name('addFormationEnCours')->middleware(['auth','confirmed']);

Route::post('user/{id}/addExperienceSpe','UserController@addExperienceSpe')->name('addExperienceSpe')->middleware(['auth','confirmed']);
Route::post('user/{id}/addExperiencePro','UserController@addExperiencePro')->name('addExperiencePro')->middleware(['auth','confirmed']);

Route::post('user/{id}/addFormationAcademique','UserController@addFormationAcademique')->name('addFormationAcademique')->middleware(['auth','confirmed']);

Route::post('user/{id}/addReference','UserController@addReference')->name('addReference')->middleware(['auth','confirmed']);

Route::get('/user/{id}/mesProjets','UserController@mesProjets')->name('mesProjets')->middleware(['auth','confirmed']);

Route::get('/user/{id}/infosCompte','UserController@infosCompte')->name('infosCompte')->middleware(['auth','confirmed']);

Route::get('/valideCompte','AdminController@valideCompte')->name('createRequest')->middleware(['auth','confirmed']);





Route::get('/accepteCompte/{id}','AdminController@accepteCompte')->name('accepteCompte')->middleware(['auth','confirmed']);

Route::get('/refuseCompte/{id}','AdminController@refuseCompte')->name('refuseCompte')->middleware(['auth','confirmed']);




Route::get('projets/{id}/changeStatut/{idStatut}','ProjetsController@changeStatut')->middleware(['auth','confirmed']);

Route::post('projets/{id}/addInvestigateur','ProjetsController@addInvestigateur')->name('addInvestigateur')->middleware(['auth','confirmed']);

Route::get('/uniterecherches/{idUnite}/projets','UniteDeRecherchesController@getProjet')->name('get.UniteProjet')->middleware(['auth','confirmed']);


Route::get('/uniterecherches/{id}/rapport','WordUniteGenerateController@createRapportUnite')->name('rapportUnite')->middleware(['auth','confirmed']);
Route::get('/listeDemande','AdminController@listeDemande')->name('listeDemande')->middleware(['auth','confirmed']);






//Ajouter les chefs 
Route::get('/addChefDirection','AdminController@addChefDirection')->name('addChefDirection')->middleware(['auth','confirmed']);
Route::get('/addChefDepartement','AdminController@addChefDepartement')->name('addChefDepartement')->middleware(['auth','confirmed']);
Route::get('/addChefLaboratoire','AdminController@addChefLaboratoire')->name('addChefLaboratoire')->middleware(['auth','confirmed']);
Route::get('/addChefEquipe','AdminController@addChefEquipe')->name('addChefEquipe')->middleware(['auth','confirmed']);
Route::get('addChefUnite','AdminController@addChefUnite')->name('addChefUnite')->middleware(['auth','confirmed']);

Route::post('/addPostChefDepartement','AdminController@addPostChefDepartement')->name('addPostChefDepartement')->middleware(['auth','confirmed']);

Route::get('/departement/reporting','DepartementsController@afficherDashboard')->name('reportDept');

Route::post('reportingDepartement/{id}','DepartementsController@reportingDepartement')->name('reportingDepartement');