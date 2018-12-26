 @extends('layouts.master')
 @section('css')
<style>
i {
    margin-left: : 10px;
    font-size: 30px;
    height: 30px;
    vertical-align: middle;
}  
</style>


 @stop
 @section('content')
<section class="panel-title">
<div class="card">
  <h4 class="card-title text-center">{{$projet->intitule}}</h4>
  {{-- <div class="card-body">
  </div> --}}
</div>
    {{-- <div class="container">
    <p>{{$projet->resumeProjet}}</p>
    
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
         <strong class="d-block text-gray-dark">Durée Du Projet: {{$projet->dureeProjet}}</strong>
    </p>
  </div>
  
 --}}

<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm ">
    <div><strong>Resumé du projet</strong>: {{$projet->resumeProjet}} 
     <a><i class="fas fa-edit float_right"></i></a>
  </div>
</div>
</div>

<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm left">
  <strong>Durée du projet</strong>: {{$projet->dureeProjet}} 
</div>
</div>

<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
  <strong>Resumé des méthodes d'etude:</strong>: {{$projet->resumeDesMethodeEtude}} 
</div>
</div>




<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
    
    <h6 class="border-bottom border-gray pb-2 mb-0">Resultats Obtenus</h6>
  
@foreach($projet->ResultatObtenu as $resultat)  
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small {{-- lh-125 border-bottom --}} border-gray">
        <strong class="d-block text-gray-dark">Resultats {{$resultat->id}}</strong>
        {{$resultat->contenu}}
        <br>
        <small>Date de realisation: <em>{{$resultat->dateRealisation->format('M d Y')}}</em></small>
      </p>
    </div>
@endforeach
</div>
</div>
@stop