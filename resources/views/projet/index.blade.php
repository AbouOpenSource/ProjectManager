@extends('layouts.app')
@section('title')
Liste Des Projets
@endsection
@section('content')


<div class="container">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Liste Des Projet
  </a>
  

		@foreach($projets as $projet)
		  <a href="{{route('projets.show',$projet->id)}}" class="list-group-item list-group-item-action">{{$projet->intitule}}</a>
				@foreach($projet->Statut as $stat)
					<a href="#" class="badge badge-light">{{$stat->intituleStatut }}</a>
					@endforeach
				{{-- <a href="#" class="badge badge-primary">Primary</a>
				<a href="#" class="badge badge-secondary">Secondary</a>
				<a href="#" class="badge badge-success">Success</a>
				<a href="#" class="badge badge-danger">Danger</a>
				<a href="#" class="badge badge-warning">Warning</a>
				<a href="#" class="badge badge-info">Info</a>

				<a href="#" class="badge badge-dark">Dark</a>



			 --}}
				
		@endforeach
</div>
</div>

@endsection

