@extends('layouts.root')
@section('title')
Co Auteur-ProjectManager
@stop

@section('content')

        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center"></div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddCoAuteur" style="float: right;"><i class="fas fa-plus"></i> Ajouter Un Co Auteur</button>
                
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Nom et prenom</th>
                            <th scope="col">Ordre d'implication</th>
                            <th scope="col">Description</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($publication->coAuteur as $coauteur)
                    <tr>
                      <th scope="row">{{$coauteur->name.' '.$coauteur->prenom}}</th>
                      <td>{{$coauteur->pivot->ordreDimplication}}</td>
                      <td>{{$coauteur->pivot->descriptionParticipation}}</td>
                   </tr>
                  @endforeach
                  </tbody>
              </table>


            </div>
    </div>
</div>
</div>



<div class="modal fade" id="modalAddCoAuteur" tabindex="-1" role="dialog" aria-labelledby="modalAddCoAuteur" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddCoAuteurLabel">Ajout d'un Co Auteur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addPostCoAuteur',$publication->id)}}">
          @csrf
          
          <div class="form-group">
            <label for="personne_id" class="col-form-label"></label>
            <select name="personne_id" class="form-control">
                @foreach($personnes as $personne)    
                <option value="{{$personne->id}}">{{$personne->full_name}}</option>
                @endforeach
            </select>
          </div>
          
          
          <div class="form-group">
            <label for="ordreDimplication" class="col-form-label">Ordre d'implication</label>
            <input type="number" name="ordreDimplication" class="form-control" min=1 ></input>
          </div>
          
          
          <div class="form-group">
            <label for="descriptionParticipation" class="col-form-label">Description de l'implication</label>
            <textarea type="text" name="descriptionParticipation" class="form-control"></textarea>
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