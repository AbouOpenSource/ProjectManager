@extends('layouts.root')
@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">            
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nom et Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de creation</th>
                    <th scope="col">Choix</th>
                    
                    </tr>
                </thead>
              <tbody class="tbody-dark">
                  @foreach($users as $person)
                  
                  <tr>
                    <td >{{$person->full_name}}</td>
                    <td >{{$person->email}}</td>
                    <td >{{$person->created_at}}</td>
                      <td>
                         <button class="btn-primary" onclick="location.href='{{route('accepteCompte',$person->id)}}'">Accepter</button>
                         
                         {{-- <a href="{{route('accepteCompte',$person->id)}}" class="btn-primary">Accepter</a>
                      	 --}}	
                      </td>
                      <td>
                         <button class="btn-danger" onclick="location.href='{{route('refuseCompte',$person->id)}}'">Rejeter</button>
                        {{--  <a href="{{route('refuseCompte',$person->id)}}" class="btn-danger">Rejetter</a>
                      	 --}}	
                      </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
</div>

</div>
@endsection
