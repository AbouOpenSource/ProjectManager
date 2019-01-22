@extends('layouts.user')
@section('title')
Les Projets-ProjectManager
@stop
@section('css')

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css"> 
@endsection

@section('content')
<div class="container ">
<div class="row">
        <div class="col">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">            
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Projets</th>
                    <th scope="col">Budgets</th>
                    <th scope="col">Status</th>
                    <th scope="col">Niveau d'avancement</th>
                  </tr>
                </thead>
              <tbody class="tbody-dark">
                  @foreach($projets as $projet)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
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
                        <i class="bg-warning"></i>
                        {{$projet->Currentstatut->first()['intituleStatut']}}
                      </span>
                    </td>
                    <td>
                      <div class="{{-- d-flex align-items-center --}}">
                        {{-- <span class="mr-2">{{$projet->evolution}}%</span>
                         --}}<div>
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$projet->evolution}}%;" aria-valuenow="{{$projet->evolution}}" aria-valuemin="0" aria-valuemax="100">{{$projet->evolution}}%</div>
                          </div>
                        </div>
                      </div>
                    </td>
                  @endforeach
                </tbody>
              </table>
</div>
          
@stop

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
