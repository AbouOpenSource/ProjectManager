<?php
use App\Models\StructAdmin\Equipe;
use App\Models\Cv\PersonneInterne;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







Route::resource('bourses','BoursesController');

Route::resource('departements','DepartementsController');

Route::resource('directions','DirectionsController');

Route::resource('projets','ProjetsController');

Route::resource('ideeDeProjet','IdeeDeProjetsController');

Route::resource('personneinterne','PersonneInternesController');

Route::resource('equipe','EquipesController');

Route::resource('uniterecherche','UniteDeRecherchesController');

Route::get('/', function () {


    dump(PersonneInterne::all());



    return view('welcome');
});
