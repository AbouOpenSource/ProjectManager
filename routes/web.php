<?php

use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;
use App\Models\StructAdmin\UniteDeRecherche;
use App\Models\Institution\Institution;

Route::get('/notify', function(){

notify()->flash('Yo have success','success');
 
 return redirect()->to('/');

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

Route::resource('ideeDeProjets','IdeeDeProjetsController');

Route::resource('personneinternes','PersonneInternesController');

Route::resource('equipes','EquipesController');

Route::resource('uniterecherches','UniteDeRecherchesController');

Route::resource('publications','PublicationsController');