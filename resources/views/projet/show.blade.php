 @extends('layouts.user')
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
</div>
<div class="container">
  <div class="my-3 p-3 bg-white rounded shadow-sm ">
      <div><strong>Resumé du projet</strong>: {{$projet->resumeProjet}} 
       <a data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit float_right"></i></a>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de resumé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Resumé:</label>
            <textarea class="form-control" id="message-text" values="Bonjour la famille"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>















@stop