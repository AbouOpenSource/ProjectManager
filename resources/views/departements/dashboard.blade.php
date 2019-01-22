@extends('layouts.root')

@section('title')
Dashbord Departement-ProjectManager 
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Reporting de departement</div>
	<form action="{{route('reportingDepartement',1)}}" method="POST">
				@csrf
				<label for="date_debut" class="col-form-label">Reporting depuis une date</label>
            	<input name="date_debut" type="date" class="form-control">
            	<input type="submit" value="Creer le reporting" class="center-block">
   	</form>
            
            
		<a href="{{-- {{route('reportingDepartement')}} --}}"><button class=""></button></a>
            </div>
    </div>
</div>
</div>


@stop