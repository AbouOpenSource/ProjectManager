@extends('layouts.app')
@section('title')
Liste Des Personne
@endsection
@section('content')

@foreach($equipes as $equipe)
	<p>Le nom de l'equipe :{{$equipe->nomEquipe}}</p>
		@foreach($equipe->PersonneInterne as $personne)
				
					<small>{{$personne->nom}}<br></small>
		@endforeach
@endforeach

@endsection


