@extends('layouts.root')
@section('title')
Mes publications
@stop
@section('css')



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
                    <th scope="col">Intitule de la Publication</th>
                    <th scope="col">Type de Publication</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Fichier joint</th>
                    </tr>
                </thead>
              <tbody class="tbody-dark">
                  @foreach($publications as $publication)
                  
                  <tr>
                    <td >{{$publication->libellePublication}}</td>
                    <td >{{$publication->typePublication->intituleType}}</td>
                    <td >{{$publication->datePublication->format('M d Y')}}</td>
                      <td>
                       
                     {{$publication->file? "<a href=\"asset('storage/file.txt')\"><i class=\"far fa-file-pdf\"></i></a>" : " "}}    
                                              
                      </td>
                  </tr>
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


@stop