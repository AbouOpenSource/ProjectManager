@extends('layouts.root')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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
                    <th scope="col">Type de publication</th>
                    <th scope="col">Date de publication</th>
                  </tr>
                </thead>
              <tbody class="tbody-dark">
                  
                  @foreach($publications as $publication)
                  <tr>
                    <td>
                      <a href="">{{$publication->auteur->name}}</a>
                    </td>
                    <td>
                     {{$publication->libellePublication}}
                    </td>
                    <td>
                     {{$publication->typePublication->intituleType}}
                    </td>
                    <td>
                     {{$publication->datePublication->format('M d Y')}}
                    </td>
                  </tr>
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

