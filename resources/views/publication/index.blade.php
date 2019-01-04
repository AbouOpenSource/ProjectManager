@extends('layouts.root')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@stop
@section('content')


<div class="container ">
<div class="row">
        <div class="col">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">            
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Auteur</th>
                    <th scope="col">Intitule de la Publication</th>
                    <th scope="col">Date de publication</th>
                  </tr>
                </thead>
              <tbody class="tbody-dark">
                  @foreach($publications as $publication)
                  <tr>
                    <td scope="row">
                      <div class="media align-items-center">
                       <div class="media-body">
                          <span class="mb-0 text-sm"><a href="">{{$publication->auteur->name}}</a></span>
                        </div>
                      </div>
                    </td>
                    <td>
                     {{$publication->libellePublication}}
                    </td>
                    <td>
                     {{$publication->datePublication->format('M d Y')}}
                    </td>
                    @endforeach
                </tbody>
              </table>
</div>
@endsection
@section('javascripts')
    
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection

