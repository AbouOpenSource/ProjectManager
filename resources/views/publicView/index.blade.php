@extends('layouts.app')
@section('title')
Projets
@endsection
@section('inclusion')

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
@endsection


{{-- 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">




</head>

<body>
	<script >
		swal("Good job!",
		 "You clicked the button!",
		  "success");



	</script>

 --}}<div class="row">
        <div class="col">
            <div class="card shadow">            
{{-- 
            <div class="card-header border-0">
              <h3 class="mb-0">Projet Au Centre MURAZ</h3>
            </div>
            
 --}}
     
@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush