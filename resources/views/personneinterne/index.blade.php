@extends('layouts.app')
@section('title')
Liste Des Personne
@endsection
@section('content')

@foreach($personnes as $personne)
	<p>Le nom de la personne est {{$personne->Equipe->nomEquipe}}</p>

@endforeach

@endsection


