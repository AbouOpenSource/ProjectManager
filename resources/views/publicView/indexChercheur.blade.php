@extends('layouts.user')
@section('title')
Les chercheurs-ProjectManager 
@stop
@section('content')
 <section id="team">
  <div class="container">
    <h2 class="section-title">
      Chercheurs
    </h2>
    <div class="members-container">
        <div class="row">
                      @foreach($users as $chercheur)
                        
                        <div class="col-lg-3 col-md-6 col-sm-12">
                           <div class="card shadow m-2">
                                <img class="card-img-top" src="/uploads/avatars/{{ $chercheur->avatar }}" alt="Card image cap" {{-- style=" width: 150px;height: 150px ;float:left;border-radius: 50%; margin-right: 25px;" --}}>
                                  <div class="card-body">
                                  <h5 class="card-title">{{$chercheur->full_name}}</h5>
                                  <p class="card-desc">
                                    @foreach($chercheur->Qualification->where('typeQualification','secondaire') as $quali)
                                                {{$quali->nomQualification}},
                                    @endforeach  
                                  <br>
                                  @foreach($chercheur->Diplome as $diplome)
                                    {{$diplome->libelleDiplome}} ,
                                  @endforeach
                                  </p>
                            </div>
                          </div>
                        </div>     
        
                      @endforeach                      
        </div>
    </div>
</div>
</section>

{{ $users->links() }}

@stop