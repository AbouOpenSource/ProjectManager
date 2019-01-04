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
                    <th scope="col">Date de publication</th>
                    </tr>
                </thead>
              <tbody class="tbody-dark">
                  @foreach($publications as $publication)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       <div class="media-body">
                          <span class="mb-0 text-sm"><a href="">{{$publication->libellePublication}}</a></span>
                        </div>
                      </div>
                    </th>
                    <td>
                     {{$publication->datePublication->format('M d Y')}}
                    </td>
                    @endforeach
                </tbody>
              </table>
</div>
          




@stop
@section('javascripts')



@stop