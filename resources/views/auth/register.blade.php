@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    

                            <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    


                        <div class="form-group row">
                            <label for="dateNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de Naissance') }}</label>

                            <div class="col-md-6">
                                <input id="dateNaissance" type="date" class="form-control{{ $errors->has('dateNaissance') ? ' is-invalid' : '' }}" name="dateNaissance" value="{{ old('dateNaissance') }}" required autofocus>

                                @if ($errors->has('dateNaissance'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dateNaissance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
        
    
                                                <div class="form-group row">
                            <label for="lieuNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de Naissance') }}</label>

                            <div class="col-md-6">
                                <input id="lieuNaissance" type="text" class="form-control{{ $errors->has('lieuNaissance') ? ' is-invalid' : '' }}" name="lieuNaissance" value="{{ old('lieuNaissance') }}" required autofocus>

                                @if ($errors->has('lieuNaissance'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lieuNaissance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                                                          <div class="form-group row">
                            <label for="nationalite" class="col-md-4 col-form-label text-md-right">{{ __('Nationalite') }}</label>

                            <div class="col-md-6">
                                <input id="nationalite" type="text" class="form-control{{ $errors->has('nationalite') ? ' is-invalid' : '' }}" name="nationalite" value="{{ old('nationalite') }}" required autofocus>

                                @if ($errors->has('nationalite'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationalite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="residence" class="col-md-4 col-form-label text-md-right">{{ __('Residence') }}</label>

                            <div class="col-md-6">
                                <input id="residence" type="text" class="form-control{{ $errors->has('residence') ? ' is-invalid' : '' }}" name="residence" value="{{ old('residence') }}" required autofocus>

                                @if ($errors->has('residence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>












<!--Select form equipe-->

 
                 <div class="form-group row">
                            <label for="equipe_id" class="col-md-4 col-form-label text-md-right">{{ __('Equipe') }}</label>

                            <div class="col-md-6">
                                <select name="equipe_id" class="custom-select custom-select-lg mb-3">
                                    <option selected value="">Choisir son equipe</option>
                                    @foreach($equipes as $equipe)
                                    
                                    <option value="{{$equipe->id}}">{{$equipe->nomEquipe}}</option>
                                    
                                    @endforeach
                            </select>   

                                @if ($errors->has('equipe'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('equipe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!--Select form Unite-->

                        <div class="form-group row">
                            <label for="unite" class="col-md-4 col-form-label text-md-right">{{ __('Unite') }}</label>

                            <div class="col-md-6">
                                <select name="unite_id" class="custom-select custom-select-lg mb-3">
                                    <option selected value="">Choisir son unite
                                    </option>
                                    @foreach($unites as $unite)
                                    
                                    <option value="{{$unite->id}}">{{$unite->nomUnite}}
                                    </option>
                                    
                                    @endforeach
                            </select>   

                                @if ($errors->has('unite'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Soumettre') }}
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
