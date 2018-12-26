<?php

use App\Models\Projet\Projet;
use App\Models\Projet\Statut;
use App\Models\Cv\PersonneInterne;
use App\Models\StructAdmin\UniteDeRecherche;
use App\Models\Institution\Institution;

// Route::get('/test', function(){
// return view('publicView.menu');
Route::get('/test', function(){
return view('layouts.master');
});

//});
// Route::get('/tester', function(){
// return view('publicView.menu2');

// });

Route::get('users','publicViewController@getUsers')->name('get.users');
Route::get('tester',function(){

return view('datatables.index');

});

// Route::get('/datatable','publicViewController@getProjets')->name('get.projets');



// Route::get('/datatable', function(){

//     $projets=Projet::all();
// 	return view('publicView.table',compact('projets'));
// });






Route::get('/', function () {

    dump(PersonneInterne::all());

    return view('welcome');
});

Auth::routes(['verify' => true]);

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