<?php

use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;
use App\Models\StructAdmin\UniteDeRecherche;
use App\Models\Institution\Institution;
use App\Models\Publication\Publication;


//User profil route
Route::get('/profile','UserController@profile')->name('profile');
Route::post('/profile','UserController@updateAvatar');


//Chemins des informations publiques 
Route::get('/acceuil','PublicController@displayAcceuil')->name('get.home');
Route::get('/projetspublics', 'PublicController@indexProjet')->name('get.projetsPublics');
Route::get('/chercheurs', 'PublicController@indexChercheur')->name('get.chercheurs');
Route::get('/publicationsPubliques','PublicController@indexPublication')->name('get.publications');


//Chemins particuliers pour quelques informations
Route::get('/chercheur/{id}/publications','PrivateController@indexPubliPerso')->name('get.publiperso');




Route::get('/', function () {

    dump(PersonneInterne::all());

    return view('welcome');
});

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

Route::get('projets/{id}/changeStatut/{idStatut}','ProjetsController@changeStatut');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
