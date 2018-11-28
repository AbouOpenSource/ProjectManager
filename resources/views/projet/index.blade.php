@extends('layouts.app')
@section('title')
Liste Des Projets
@endsection
@section('content')


{{-- <div class="container">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Liste Des Projet
  </a>
  

		@foreach($projets as $projet)
		  <a href="{{route('projets.show',$projet->id)}}" class="list-group-item list-group-item-action">{{$projet->intitule}}</a>
				@foreach($projet->Statut as $stat)
					
						<a href="#" class="badge badge-success">{{$stat->intituleStatut }}</a>
				@endforeach
		@endforeach
</div>
</div>
 --}}




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">




</head>

<body>
	<script >
		swal("Good job!",
		 "You clicked the button!",
		  "success");



	</script>

<div class="row">
        <div class="col">
            <div class="card shadow">
            

            <div class="card-header border-0">
              <h3 class="mb-0">Projet Au Centre MURAZ</h3>
            </div>
            

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Projets</th>
                    <th scope="col">Budgets</th>
                    <th scope="col">Status</th>
                    <th scope="col">Users</th>
                    <th scope="col">Niveau d'avancement</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
              <tbody>
                  @foreach($projets as $projet)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$projet->intitule}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                     {{$projet->budgetProjet}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> pending
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
@endforeach
                </tbody>


              </table>
            </div>
          



          </div>
        </div>
</div>
</body>
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.0.0"></script>
</html>














@endsection

