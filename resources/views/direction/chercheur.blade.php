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
                    <th scope="col">Nom et prenoms</th>
                    <th scope="col">Nombre de publication</th>
                    <th scope="col">Nombre de coPubliction</th>
                    <th scope="col">Extraire Cv</th>
                  </tr>
                </thead>
              <tbody class="tbody-dark">
                  
                  @foreach($personnes as $personne)
                  <tr>
                    <td >
                      <a href="{{ route('get.publiperso',$personne->id) }}">{{$personne->full_name}}</a>
                    </td>
                    <td>
                     {{$personne->Publication->count()}}
                    </td>
                    <td>
                     {{$personne->CoPublication->count()}}
                    </td>
                    <td>
                      @if($personne->cv_extract)
                      <a href="{{route('genererateCV',$personne->id)}}"><button>Extraire le Cv</button></a>
                      @else
                      <a class="btn disabled" href="{{route('genererateCV',$personne->id)}}"><button>Extraire le Cv</button></a>
                      
                      @endif
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

