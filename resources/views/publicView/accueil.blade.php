@extends('layouts.user')
@section('title')
Accueil-ProjectManager
@stop
@section('css')
<style>
#intro
{
  min-height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
 /* background-image:linear-gradient(to bottom,rgb(0,128,128),rgba(14,148,200,0.37)), url('img/statut.jpg');
  background-size: auto;*/
  background-size:cover;
  background-image: url('img/statut.jpg');
  color: #fff;
}
#image{
  width: 1500px;
  height: 500px;
}
</style>
@stop

@section('content')
{{--  <img src="{{ asset('img/adn.jpg') }}" class="img-fluid">
 --}}{{-- 
 <section id="intro">
   

   <img class="img-fluid" src="img/chercheur.jpg" alt="" style="width: 1500px;
  height: 500px;">
 
<img class="img-fluid" src="img/statut.jpg" alt="" style="width: 1500px;
  height: 500px;">
 


 </section> --}}
<section id="intro">
      <div class="container text-center">
        <h1 class="display-3 mb-3">
          <em style=" font-size: 100px">
            Bienvenue au Centre MURAZ
          </em>
          
        </h1>
        {{-- <a href="" class="btn btn-info btn-lg">Lire plus</a> --}}
      </div>  
</section>

 <section id="team">
  <div class="container">
    <h2 class="section-title">
      Chercheurs
    </h2>
    <div class="members-container">
        <div class="row">
                      @foreach($chercheurs as $chercheur)
                        
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


<div class="container">	
<section>
	<div class="my-3 p-3 bg-white rounded box-shadow ">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recentes publications</h6>
        
        @foreach($publications as $publication)
	    <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$publication->auteur->name}}</strong>
          	  {{$publication->libellePublication}}
          </p>
        </div>
        @endforeach
        <small class="d-block text-right mt-3">
          <a href="{{route('get.publications')}}">Toutes les publications</a>
        </small>
    </div>
											
</section>
</div>

<section class="about-us">
  <div class="container">
    <h2 class="section-title">Les départements</h2>
    <div id="service">
      <div class="row">
        @foreach($departements as $departement)
        
        <div class="{{-- col-lg-3 --}}col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  {{$departement->nomDepartement}}
                </h5>
              </div>
                <div class="desc">
                <p>
                  {{$departement->descriptionDepartement}}
                </p>                  
                </div>
            </div>    
        </div>

        @endforeach

        














        </div>
      </div>
    </div>
</section>













@stop
