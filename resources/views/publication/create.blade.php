@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enregistrer Un Publication') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('publications.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="typePublication_id" class="col-md-4 col-form-label text-md-right">{{ __('Type de Publication') }}</label>

                            <div class="col-md-6">
                                <select name= "typePublication_id"class="custom-select custom-select-lg mb-3">
                                    <option selected>Choisir le type de Publication</option>
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
                            <label for="typePublication_id" class="col-md-4 col-form-label text-md-right">{{ __('Publication lié a quel projet') }}</label>

                            <div class="col-md-6">
                                <select name= "projet_id"class="custom-select custom-select-lg mb-3">
                                    <option selected>Choisir le Projet concerner </option>
                                    @foreach($projets as $projet)
                                    
                                    <option value="{{$projet->id}}">{{$projet->intitule}}</option>
                                    
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
                            <textarea name="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="libellePublication" value="{{ old('description') }}" required autofocus>
    
</textarea>

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
                            <label for="sourcePublication" class="col-md-4 col-form-label text-md-right">{{ __('Source de la publication') }}</label>

                            <div class="col-md-6">
                                <input id="sourcePublication" type="text" class="form-control{{ $errors->has('sourcePublication') ? ' is-invalid' : '' }}" name="sourcePublication" value="{{ old('sourcePublication') }}" required autofocus>

                                @if ($errors->has('sourcePublication'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sourcePublication') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('Media la publication') }}</label>

                            <div class="col-md-6">
                                <input id="media" type="text" class="form-control{{ $errors->has('media') ? ' is-invalid' : '' }}" name="media" value="{{ old('media') }}" required autofocus>

                                @if ($errors->has('media'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('media') }}</strong>
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