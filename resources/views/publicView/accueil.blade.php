@extends('layouts.user')
@section('css')
<style>
#intro{
	min-height: 400px;
	display: flex;
	align-items: center;
	justify-content: center;
	/*background-image:linear-gradient(to bottom,rgb(0,128,128),rgba(14,148,200,0.37)), url('img/1.jpg');
	background-size:cover;*/
	background-image: url('img/4.jpg');
	color: #fff;
}
</style>
@stop
@section('content')
<section id="intro">
      <div class="container text-center">
        <h1 class="display-3 mb-3">
          <em>
            Le Centre MURAZ 
          </em>
          :c'est {{$nbrProjet}} projets de recherche
        </h1>
        <a href="" class="btn btn-info btn-lg">Lire plus</a>
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
          <a href="#">All updates</a>
        </small>
    </div>
											
</section>
</div>






























<section class="about-us">
  <div class="container">
    <h2 class="section-title"> About Us</h2>
    <div id="service">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="service">
              <div class="icon">    
              </div>
              <div class="title">
                <h5>
                  Title
                </h5>
              </div>
                <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio tempora fuga, eius cum animi veritatis explicabo dicta consequuntur veniam dolore pariatur molestias impedit provident rem culpa non. Vitae, illum, dolor.
                </p>                  
                </div>
            </div>
            
        </div>
        
        
        </div>
      </div>
    </div>



  </div>
</section>













@stop
