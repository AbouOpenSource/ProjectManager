@extends('layouts.app')
@section('title')
Liste Des Projets
@endsection
@section('content')

@foreach($projets as $projet)
	<p>This is name of Projet {{$projet->intitule }}</p>

@endforeach

@endsection

