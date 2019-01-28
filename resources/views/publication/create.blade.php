@extends('layouts.root')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('multi/css/multi-select.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center">{{ __('Enregistrer une publication') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('publications.store') }}" >
                        @csrf
                        <div class="form-group row">
                            <label for="typePublication_id" class="col-md-4 col-form-label text-md-right">{{ __('Type de Publication') }}</label>

                            <div class="col-md-6">
                                <select name= "typePublication_id"class="custom-select custom-select-lg mb-3" required>
                                    <option value="" selected>Choisir le type de Publication</option>
                                    @foreach($typePublications as $typePublications)
                                    
                                    <option value="{{$typePublications->id}}">{{$typePublications->intituleType}}</option>
                                    
                                    @endforeach
                            </select>   
                                @if ($errors->has('typePublication_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('typePublication_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
      <div class="form-group row">
                            <label for="libellePublication" class="col-md-4 col-form-label text-md-right">{{ __('Libelle de la publication') }}</label>

                            <div class="col-md-6">
                                <input id="libellePublication" type="text" class="form-control{{ $errors->has('libellePublication') ? ' is-invalid' : '' }}" name="libellePublication" value="{{ old('libellePublication') }}" required autofocus>

                                @if ($errors->has('libellePublication'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('intitule') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description de la publication') }}</label>

                            <div class="col-md-6">
                            <textarea name="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="libellePublication" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="datePublication" class="col-md-4 col-form-label text-md-right">{{ __('Date de la publication') }}</label>

                            <div class="col-md-6">
                                <input id="datePublication" type="date" class="form-control{{ $errors->has('datePublication') ? ' is-invalid' : '' }}" name="datePublication" value="{{ old('datePublication') }}" required autofocus>

                                @if ($errors->has('datePublication'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('datePublication') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="sourcePublication" class="col-md-4 col-form-label text-md-right">{{ __('Reference de la publication') }}</label>

                            <div class="col-md-6">
                                <input id="sourcePublication" type="text" class="form-control{{ $errors->has('sourcePublication') ? ' is-invalid' : '' }}" name="sourcePublication" value="{{ old('sourcePublication') }}" required autofocus>

                                @if ($errors->has('sourcePublication'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sourcePublication') }}</strong>
                                    </span>
                                @else
                                <small id="emailHelp" class="form-text text-muted">Lien web de publication</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('Joindre Un fichier') }}</label>

                            <div class="col-md-6">
                                <input id="media" type="file" class="form-control{{ $errors->has('media') ? ' is-invalid' : '' }}" name="media" value="{{ old('media') }}" >

                                @if ($errors->has('media'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('media') }}</strong>
                                    </span>
                                @else
                                <small id="emailHelp" class="form-text text-muted">Version admise pdf, jpeg, png</small>
                                
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('Le projet') }}</label>

                            <div class="col-md-6">
                                <select id="projet_id" type="file" class="form-control{{ $errors->has('media') ? ' is-invalid' : '' }}" name="projet_id" value="{{ old('media') }}" >
                                <option value="">Selectionner un projet</option>
                                
                                @foreach($projets as $projet)
                                <option value="{{$projet->id}}">{{$projet->intitule_court}}</option>

                                @endforeach



                                </select>
                                @if ($errors->has('media'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('projet_id') }}</strong>
                                    </span>
                                @else
                                <small id="emailHelp" class="form-text text-muted">Le projet donnant lieu a cette publication</small>
                                
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
@stop
 @section('javascripts')
<script src="{{asset("multi/js/jquery.multi-select.js")}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  
@stop
