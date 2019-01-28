@extends('layouts.root')

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create  Idée de Porjet') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projets.store') }}">
                        @csrf

                        
                     <div class="form-group row">
                            <label for="intituleIdee" class="col-md-4 col-form-label text-md-right">{{ __('L\'intitulé de l\'idee' ) }}</label>

                            <div class="col-md-6">
                                <input id="intituleIdee" type="text" class="form-control{{ $errors->has('intituleIdee') ? ' is-invalid' : '' }}" name="intituleIdee" value="{{ old('intituleIdee') }}" required autofocus>

                                @if ($errors->has('intituleIdee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('intituleIdee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="institutionSouhaite_id" class="col-md-4 col-form-label text-md-right">{{ __('Institution sponsor souhaite') }}</label>

                            <div class="col-md-6">
                                <select name="institutionSouhaite_id" class="custom-select custom-select-lg mb-3">
                                    <option selected>Choisir le sponsor souhaité</option>
                                    @foreach($institutions as $institution)
                                    
                                    <option value="{{$institution->id}}">{{$institution->nomInstitution}}</option>
                                    
                                    @endforeach
                            </select>   

                                @if ($errors->has('institutionSouhaite_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institutionSouhaite_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="institutionProposeur_id" class="col-md-4 col-form-label text-md-right">{{ __('Institution promotrice de l\'idée') }}</label>

                            <div class="col-md-6">
                                <select name="institutionProposeur_id" class="custom-select custom-select-lg mb-3">
                                    <option selected>Choisir le sponsor souhaité</option>
                                    @foreach($institutions as $institution)
                                    
                                    <option value="{{$institution->id}}">{{$institution->nomInstitution}}</option>
                                    
                                    @endforeach
                            </select>   

                                @if ($errors->has('institutionProposeur_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institutionProposeur_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="cheminProtocole" class="col-md-4 col-form-label text-md-right">{{ __('Le protocole') }}</label>

                            <div class="col-md-6">
                                <input id="cheminProtocole" type="file" class="form-control-file{{ $errors->has('cheminProtocole') ? ' is-invalid' : '' }}" name="cheminProtocole" value="{{ old('cheminProtocole') }}" required autofocus>

                                @if ($errors->has('cheminProtocole'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cheminProtocole') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                                                    
                         
                        <div class="form-group row">
                            <label for="soumettre" class="col-md-4 col-form-label text-md-right">{{ __('Soumettre') }}</label>

                            <div class="col-md-6">
                                <div class="row">
                                <label class="form-check-label col-md-6" for="soumettre">
                                Oui
                                </label>
                                <input class="form-check-input col-md-6" type="radio" name="soumettre" id="soumettre" value="true" checked>
                                <label class="form-check-label col-md-6" for="soumettre">
                                Non
                                </label>
                                <input class="form-check-input col-md-6" type="radio" name="soumettre" id="soumettre" value="false" checked>
              
                                </div>
                                
                                @if ($errors->has('soumettre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('soumettre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
   



















                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
 
                        </form>


                    </div>
             </div>
        </div>
    </div>
</div>
@endsection