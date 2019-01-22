@extends('layouts.root')
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    
					

            </div>
    </div>
</div>
</div>


@foreach($departements as $departement)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">{{$departement->nomDepartement}}</div>
                
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Nom et Prenom</th>
                            <th scope="col">Debut de mandat</th>
                            <th scope="col">Fin de mandat</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($departement->chef as $person)
                    <tr>
                      <th scope="row">{{$person->full_name}}</th>
                      <td>{{$person->pivot->debutMandat}}</td>
                      <td>{{$person->pivot->finMandat}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>

              

            </div>
    </div>
</div>
</div>
@endforeach

<button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddChefDepartement" style="float: right;"><i class="fas fa-plus center-block"></i> Ajouter Un nouveau chef</button>
                
<div class="modal fade" id="modalAddChefDepartement" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddChefDepartementLabel">Ajout d'un chef</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addPostChefDepartement')}}">
          @csrf
          
          
          <div class="form-group">
            <label for="departement_id" class="col-form-label">Nom du departement</label>
            <select name="departement_id" class="form-control">
   				@foreach($departements as $departement)
   				<option value="{{$departement->id}}">{{$departement->nomDepartement}}</option>
   				@endforeach         	
            </select>
          </div>
          
          <div class="form-group">
            <label for="personne_id" class="col-form-label">Choisir la personne</label>
          	 <select name="personne_id" class="form-control" required>
   				<option value="" selected>Selecttionner une personne</option>
          @foreach($personnes as $personne)
   				<option value="{{$personne->id}}">{{$personne->full_name}}</option>         	
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