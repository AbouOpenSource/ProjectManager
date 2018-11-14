@extends('layouts.app')
@section('title')
Liste Des Unite Et Membres
@endsection
@section('content')

@foreach($unites as $unite)
	<p>Le nom de l'unite :{{$unite->nomUnite}}</p>
		@foreach($unite->PersonneInterne as $personne)
				
					<small>{{$personne->nom}}<br></small>

		@endforeach
@endforeach
@endsection


