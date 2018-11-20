<?php
use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;

Route::get('test',function(){
$test=Projet::find(1);
return $test->EquipementAcquis;
});



Route::get('/', function () {

    dump(PersonneInterne::all());

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bourses','BoursesController');

Route::resource('departements','DepartementsController');

Route::resource('directions','DirectionsController');

Route::resource('projets','ProjetsController');

Route::resource('ideeDeProjet','IdeeDeProjetsController');

Route::resource('personneinterne','PersonneInternesController');

Route::resource('equipe','EquipesController');

Route::resource('uniterecherche','UniteDeRecherchesController');
