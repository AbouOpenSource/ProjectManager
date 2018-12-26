@extends('layouts.master')
@section('title')
Projets
@endsection
@section('css')

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

@endsection

@section('content')

<div class="row">
        <div class="col">
            <div class="card shadow">            
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Projets</th>
                    <th scope="col">Budgets</th>
                    <th scope="col">Status</th>
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
@endsection

@section('javascripts')
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="../assets/js/argon.js?v=1.0.0"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection

