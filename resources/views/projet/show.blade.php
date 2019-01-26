 @extends('layouts.root')
@section('title')
Projet-{{$projet->id}}
@stop
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
<a href="{{ route('exporterProjet',$projet->id) }}"><button class="btn-primary">Repport du projet</button></a>
<div class="card">
  <h4 class="card-title text-center">{{$projet->intitule}}</h4>
</div>
<div class="container">
  <div class="my-3 p-3 bg-white rounded shadow-sm ">
      <div><strong>Resumé du projet</strong>: {{$projet->resumeProjet}} 
       <a data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit float_right" ></i></a>
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
    <h6 class="border-bottom border-gray pb-2 mb-0">Objectif</h6>
<button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddObectif" style="float: right;"><i class="fas fa-plus"></i> Ajouter Un objectif</button>
    
@foreach($projet->Objectif as $objectif)  
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small {{-- lh-125 border-bottom --}} border-gray">
        <strong class="d-block text-gray-dark">Objectif {{$objectif->id}}</strong>
        {{$objectif->description}}
        </p>
    </div>
@endforeach
</div>
</div>

<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Resultats Obtenus</h6><button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddResultat" style="float: right;"><i class="fas fa-plus"></i> Ajouter Un resultat</button>
    
@foreach($projet->ResultatObtenu as $resultat)  
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small {{-- lh-125 border-bottom --}} border-gray">
        <strong class="d-block text-gray-dark">Resultats {{$resultat->id}}: {{$resultat->contenu}}</strong>
        <small>Date de realisation: <em>{{$resultat->dateRealisation->format('M d Y')}}</em></small>
      </p>
    </div>
@endforeach
</div>
</div>


<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Investigateurs du projet</h6><button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddInvestigateur" style="float: right;"><i class="fas fa-plus"></i>Ajouter Un investigateur</button>
    <ul>
        
      
@foreach($projet->InvestigateurInterne as $investi)  
    <div class="media text-muted pt-3">
      <li>{{$investi->full_name}}</li>
    </div>
@endforeach
    </ul>
</div>
</div>



<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Les Co Investigateurs du projet</h6><button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddCoInvestigateur" style="float: right;"><i class="fas fa-plus"></i>Ajouter Un Co investigateur</button>
    <ul>
        
      
@foreach($projet->CoInvestigateurInterne as $investi)  
    <div class="media text-muted pt-3">
      <li>{{$investi->full_name}}</li>
    </div>
@endforeach
    </ul>
</div>
</div>










<div class="modal fade" id="modalAddObectif" tabindex="-1" role="dialog" aria-labelledby="modalAddObectifModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddResultatLabel">Ajout d'objectif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('createObectif',$projet->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Type objectif:</label>
            <select name="typeObjectif" class="form-control">
              <option value="principal">Principal</option>
              <option value="secondaire">Secondaire</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Objectif:</label>
            <textarea class="form-control" name="description" ></textarea>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-primary"></button>
      </div>
    </form>

    </div>
  </div>
</div>






<div class="modal fade" id="modalAddResultat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddResultatLabel">Ajout de résultat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('createResultat',$projet->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Résultat obtenu:</label>
            <textarea class="form-control" name="contenu" ></textarea>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-primary"></button>
      </div>
    </form>

    </div>
  </div>
</div>



<div class="modal fade" id="modalAddInvestigateur" tabindex="-1" role="dialog" aria-labelledby="modalAddInvestigateurModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddInvestigateurLabel">Ajout d'investigateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addInvestigateur',$projet->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Les chercheurs</label>
            <select name="personne_id" class="form-control">
                @foreach($users as $userItem)
                    <option value="{{$userItem->id}}">
                      <img src="/uploads/avatars/{{ $userItem->avatar }}" class="vcenter" style=" width: 50px;height: 50px ;float:left;border-radius: 50%; margin-right: 25px;">
                      {{$userItem->full_name}}
                    </option>
                @endforeach
            </select>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-primary"></button>
      </div>
    </form>

    </div>
  </div>
</div>


<div class="modal fade" id="modalAddCoInvestigateur" tabindex="-1" role="dialog" aria-labelledby="modalAddCoInvestigateurModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddCoInvestigateurLabel">Ajout de Co investigateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addCoInvestigateur',$projet->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Les chercheurs</label>
            <select name="personne_id" class="form-control">
                @foreach($users as $userItem)
                    <option value="{{$userItem->id}}">
                      <img src="/uploads/avatars/{{ $userItem->avatar }}" class="vcenter" style=" width: 50px;height: 50px ;float:left;border-radius: 50%; margin-right: 25px;">
                      {{$userItem->full_name}}
                    </option>
                @endforeach
            </select>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-primary"></button>
      </div>
    </form>

    </div>
  </div>
</div>




@stop