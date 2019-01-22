@extends('layouts.root')
@section('title')
Mes informations
@stop
@section('content')
<br>
<br>
<div class="list-inline">
                {{--  --}}
<a href="{{route('/profile/cv')}}"><button><i class="fas fa-file-word"></i><strong>Exporter son CV</strong></button></a>
<a href="{{route('/profile/cv')}}">Salut Salut</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Diplome de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddDiplome" style="float: right;"><i class="fas fa-plus"></i> Ajouter Un Diplome</button>
                
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Diplome</th>
                            <th scope="col">Numero diplome</th>
                            <th scope="col">Date d'optention</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->Diplome as $diplome)
                    <tr>
                      <th scope="row">{{$diplome->libelleDiplome}}</th>
                      <td>{{$diplome->pivot->numeroDiplome}}</td>
                      <td>{{$diplome->pivot->dateDoptention}}</td>
                   </tr>
                  @endforeach
                  </tbody>
              </table>


            </div>
    </div>
</div>
</div>
</div>





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Langue de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddLangue" style="float: right;"><i class="fas fa-plus"></i> Ajouter Une Langue</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Langue</th>
                            <th scope="col">NiveauLu</th>
                            <th scope="col">NiveauParlé</th>
                            <th scope="col">NiveauEcrit</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->Langue as $langue)
                    <tr>
                      <th scope="row">{{$langue->intituleLangue}}</th>
                      <td>{{$langue->pivot->niveauLu}}</td>
                      <td>{{$langue->pivot->niveauParle}}</td>
                      <td>{{$langue->pivot->niveauEcrit}}</td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>

              

            </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Qualification de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddQualification" style="float: right;"><i class="fas fa-plus"></i> Ajouter Une Qualification</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Qualification</th>
                            </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->Qualification as $qualification)
                    <tr>
                      <td scope="row">{{$qualification->nomQualification}}</td>
                      <td scope="row"><button></button></td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Formation Academique de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddFormationAcademique" style="float: right;"><i class="fas fa-plus"></i> Ajouter Une formation academique</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Formation Academique</th>
                            <th scope="col">Date</th>
                            <th scope="col">Lieu de la formation Academique</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->FormationAcademique as $formation)
                    <tr>
                      <td scope="row">{{$formation->nomFormationAcademique}}</td>
                      <td scope="row">{{$formation->dateFormationAcademique}}</td>
                      <td scope="row">{{$formation->lieuFormationAcademique}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Formations en cours de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddFormationEnCours" style="float: right;"><i class="fas fa-plus"></i> Ajouter Une formation en cours</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Formation En Cours</th>
                            <th scope="col">Date de debut</th>
                            <th scope="col">Lieu de la formation en cours</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->FormationEnCours as $formation)
                    <tr>
                      <td scope="row">{{$formation->libelleFormation}}</td>
                      <td scope="row">{{$formation->debut}}</td>
                      <td scope="row">{{$formation->lieuFormation}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Experience specifique de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddExperienceSpe" style="float: right;"><i class="fas fa-plus"></i> Ajouter une experience specifique</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Resumé</th>
                            <th scope="col">Date de fin debut</th>
                            <th scope="col">Pays de l'experience</th>
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->ExperienceSpecifique as $experience)
                    <tr>
                      <td scope="row">{{$experience->resume}}</td>
                      <td scope="row">{{$experience->dateFinExperience}}</td>
                      <td scope="row">{{$experience->pays}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Experience profesionnelle de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddExperiencePro" style="float: right;"><i class="fas fa-plus"></i> Ajouter une experience professionnelle</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Poste occupé</th>
                            <th scope="col">Description</th>
                            <th scope="col">Debut Experience</th>
                            <th scope="col">Fin Experience</th>
                            
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->ExperienceProfessionnelle as $experiencePro)
                    <tr>
                      <td scope="row">{{$experiencePro->posteOccupe}}</td>
                      <td scope="row">{{$experiencePro->description}}</td>
                      <td scope="row">{{$experiencePro->DebutExperience}}</td>
                      <td scope="row">{{$experiencePro->FinExperience}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Referend  de {{ $user->name }}</div>
                <button type="button" class="btn btn-primary border-right border-gray pb-2 mb-0" data-toggle="modal" data-target="#modalAddReference" style="float: right;"><i class="fas fa-plus"></i> Ajouter une experience specifique</button>
                <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Nom </th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            
                          </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($user->Reference as $ref)
                    <tr>
                      <td scope="row">{{$ref->nomReference}}</td>
                      <td scope="row">{{$ref->prenomReference}}</td>
                      <td scope="row">{{$ref->emailReference}}</td>
                      <td scope="row">{{$ref->telephoneReference}}</td>
                      
                    </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
    </div>
</div>
</div>



ref



















</div>





<div class="modal fade" id="modalAddDiplome" tabindex="-1" role="dialog" aria-labelledby="modalAddDiplomeModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddResultatLabel">Ajout de Diplome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addDiplome',Auth::user()->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Type Diplome:</label>
        <select name="typeDiplome" class="form-control">
          @foreach($diplomes as $diplome)   
              <option value="{{$diplome->id}}">{{$diplome->libelleDiplome}}</option>
          @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="numeroDiplome" class="col-form-label">Numero du diplome</label>
         <input class="form-control" type="text" name="numeroDiplome" ></input>
          </div><div class="form-group">
            <label for="dateOptention" class="col-form-label">Date d'optention</label>
         <input class="form-control" type="date" name="dateOptention" ></input>
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






<div class="modal fade" id="modalAddLangue" tabindex="-1" role="dialog" aria-labelledby="modalAddDiplomeModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLangueLabel">Ajout de Diplome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addLangue',Auth::user()->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Choisir la langue:</label>
            <select name="langue" class="form-control">
        @foreach($langues as $langue)   
         
              <option value="{{$langue->id}}">{{$langue->intituleLangue}}</option>
              
         @endforeach
             </select>
         

          </div>
          
          <div class="form-group">
            <label for="niveauLu" class="col-form-label">Niveau lu</label>
         <input class="form-control" type="number" min="0" max=5 name="niveauLu" ></input>
          </div>
          

          <div class="form-group">
            <label for="niveauParle" class="col-form-label">Niveau parlé</label>
         <input class="form-control" type="number"  min="0" max=5  name="niveauParle" ></input>
          </div>
        
          <div class="form-group">
            <label for="niveauEcrit" class="col-form-label">Niveau ecrit</label>
         <input class="form-control" type="number"  min="0" max=5  name="niveauEcrit" ></input>
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




<div class="modal fade" id="modalAddQualification" tabindex="-1" role="dialog" aria-labelledby="modalAddQualificationModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddQualificationLabel">Ajout de Qualification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addQualification',Auth::user()->id)}}">
          @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Choisir la qualification:</label>
            <select name="qualification" class="form-control">
        @foreach($qualifications as $qualification)   
         
              <option value="{{$qualification->id}}">{{$qualification->nomQualification}}</option>
              
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




<div class="modal fade" id="modalAddFormationAcademique" tabindex="-1" role="dialog" aria-labelledby="modalAddFormationAcademiqueModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddFormationAcademiqueLabel">Ajout de la formation academique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addFormationAcademique',Auth::user()->id)}}">
          @csrf
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nom de la formation academique</label>
            <input type="text" name="nomFormationAcademique" class="form-control">
          </div>
          

          <div class="form-group">
            <label for="dateFormationAcademique" class="col-form-label"></label>
            <input type="date" name="dateFormationAcademique" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="lieuFormationAcademique" class="col-form-label">Lieu de la formation academique</label>
            <input type="text" name="lieuFormationAcademique" class="form-control"></input>
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


<div class="modal fade" id="modalAddFormationEnCours" tabindex="-1" role="dialog" aria-labelledby="modalAddFormationEnCoursModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddFormationEnCoursLabel">Ajout d'une formation en cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addFormationEnCours',Auth::user()->id)}}">
          @csrf
          
          <div class="form-group">
            <label for="libelleFormation" class="col-form-label">Libellé de la formation en cours</label>
            <input type="text" name="libelleFormation" class="form-control">
          </div>
          
          <div class="form-group">
            <label for="" class="col-form-label">Type de formation</label>
            <select name="typeFormationEnCours_id" class="form-control">
              @foreach($typeFormationEnCours as $type)
                  <option value="{{$type->id}}">{{$type->intituleTypeFormation}}</option>
              @endforeach
            </select>
          </div>  

          <div class="form-group">
            <label for="debut" class="col-form-label"></label>
            <input type="date" name="debut" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="lieuFormation" class="col-form-label">Lieu de la formation academique</label>
            <input type="text" name="lieuFormation" class="form-control"></input>
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



<div class="modal fade" id="modalAddExperienceSpe" tabindex="-1" role="dialog" aria-labelledby="modalAddExperienceSpe" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddExperienceSpeLabel">Ajout d'un experience specifique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addExperienceSpe',Auth::user()->id)}}">
          @csrf
          
          <div class="form-group">
            <label for="resume" class="col-form-label">Resumé de l'experience</label>
            <textarea type="text" name="resume" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="dateFinExperience" class="col-form-label"></label>
            <input type="date" name="dateFinExperience" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="pays" class="col-form-label">Pays</label>
            <input type="text" name="pays" class="form-control"></input>
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



<div class="modal fade" id="modalAddExperiencePro" tabindex="-1" role="dialog" aria-labelledby="modalAddExperiencePro" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddExperienceProLabel">Ajout d'un experience professionnel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addExperiencePro', Auth::user()->id)}}">
          @csrf
          
          <div class="form-group">
            <label for="posteOccupe" class="col-form-label">Poste occupé</label>
            <input type="text" name="posteOccupe" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="description" class="col-form-label">Resumé de l'experience</label>
            <textarea type="text" name="description" class="form-control"></textarea>
          </div>
          
          <div class="form-group">
            <label for="DebutExperience" class="col-form-label">Date de debut</label>
            <input type="date" name="DebutExperience" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="FinExperience" class="col-form-label">Date de fin</label>
            <input type="date" name="FinExperience" class="form-control"></input>
          </div>
          
<div class="form-group">
            <label for="pays" class="col-form-label">Pays</label>
            <input type="text" name="pays" class="form-control"></input>
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

<div class="modal fade" id="modalAddReference" tabindex="-1" role="dialog" aria-labelledby="modalAddReference" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddReferenceLabel">Ajout d'un referend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{route('addReference',Auth::user()->id)}}">
          @csrf
          
          
          <div class="form-group">
            <label for="nomReference" class="col-form-label">Nom du referend</label>
            <input type="text" name="nomReference" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="prenomReference" class="col-form-label">Prénoms du referend</label>
            <input type="text" name="prenomReference" class="form-control"></input>
          </div>
          
          <div class="form-group">
            <label for="emailReference" class="col-form-label">Email du referend</label>
            <input type="text" name="emailReference" class="form-control"></input>
          </div>  
    
          <div class="form-group">
            <label for="telephoneReference" class="col-form-label">Numero tel du referend</label>
            <input type="text" name="telephoneReference" class="form-control"></input>
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




@endsection
