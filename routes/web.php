<?php
use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;
use App\Models\StructAdmin\UniteDeRecherche;
use App\Models\Institution\Institution;
use App\Models\Publication\Publication;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Pour les tests
Route::get('/rapport','WordProjetController@createProjetRapport');

Route::get('/tester',['as'=>'tester','uses'=>'WordGenerateController@createWordDocx']);
Route::get('/profile/cv',['as'=>'/profile/cv','uses'=>'WordGenerateController@createWordCV']);
Route::get('/test',['as'=>'/test','uses'=>'WordGenerateController@test']);

Route::get('/droit',function()
	{

		$user=Auth::user();
		//$user->roles()->attach($roleId);
		$user->UniteDeRechercheChef()->attach(1,['debutMandat'=>now()]);
	});


//User profil route
Route::get('/profile','UserController@profile')->name('profile');
Route::post('/profile','UserController@updateAvatar');


//Chemins des informations publiques 
Route::get('/acceuil','PublicController@displayAcceuil')->name('get.home');
Route::get('/projetspublics', 'PublicController@indexProjet')->name('get.projetsPublics');
Route::get('/chercheurs', 'PublicController@indexChercheur')->name('get.chercheurs');
Route::get('/publicationsPubliques','PublicController@indexPublication')->name('get.publications');


//Chemins particuliers pour quelques informations
Route::get('/chercheur/{id}/publications','PublicationsController@indexPubliPerso')->name('get.publiperso');




Route::get('/','PublicController@displayAcceuil');

Auth::routes(['verify' => true]);



//Ressources fixées
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bourses','BoursesController');

Route::resource('departements','DepartementsController');

Route::resource('directions','DirectionsController');

Route::resource('projets','ProjetsController');

Route::resource('ideeDeProjets','IdeeDeProjetsController');

Route::resource('personneinternes','PersonneInternesController');

Route::resource('equipes','EquipesController');

Route::resource('uniterecherches','UniteDeRecherchesController');

Route::resource('publications','PublicationsController');

Route::post('projets/{id}/resultatObtenu/store','ProjetsController@addResultat')->name('createResultat')->middleware('auth');
Route::post('projets/{id}/Objectif/store','ProjetsController@addObectif')->name('createObectif');


Route::post('user/{id}/addDiplome','UserController@addDiplome')->name('addDiplome');

Route::post('user/{id}/addLangue','UserController@addLangue')->name('addLangue');

Route::post('user/{id}/addQualification','UserController@addQualification')->name('addQualification');

Route::post('user/{id}/addFormationEnCours','UserController@addFormationEnCours')->name('addFormationEnCours');

Route::post('user/{id}/addExperienceSpe','UserController@addExperienceSpe')->name('addExperienceSpe');
Route::post('user/{id}/addExperiencePro','UserController@addExperiencePro')->name('addExperiencePro');

Route::post('user/{id}/addFormationAcademique','UserController@addFormationAcademique')->name('addFormationAcademique');

Route::post('user/{id}/addReference','UserController@addReference')->name('addReference');


Route::get('projets/{id}/changeStatut/{idStatut}','ProjetsController@changeStatut');

Route::get('/uniterecherches/{idUnite}/projets','UniteDeRecherchesController@getProjet')->name('get.UniteProjet');