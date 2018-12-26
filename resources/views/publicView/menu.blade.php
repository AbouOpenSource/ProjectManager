<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Centre MURAZ</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  {{-- <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
   --}}<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>

  <body>

<header id="header">
       <div class="container">
        <div id="logo" class="pull-left">
        <a href="#intro" class="scrollto">
        
        </a>
      </div> 
      <nav  {{-- id="nav-menu-container" --}} class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #f9f7f7;">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="nav-menu navbar-nav mr-auto">
          <li id="logo" class="left"><a href="#intro">ProjectManager</a></li>
          <li class="menu-active nav-item"><a href="#intro">Home</a></li>
          <li class="nav-item"><a href="{{route('projets.index')}}">Projets</a></li>
          <li class="nav-item"><a href="{{route('personneinternes.index')}}">Chercheurs</a></li>
          <li class="nav-item"><a href="#">Actualite</a></li>
          <li class="nav-item"><a href="{{route('publications.index')}}">Publications</a></li>
          <li class="nav-item"><a href="#">Contactez-Nous</a></li>
@guest
          <li class="btnconnect"><a href="#btnconnect">Se Connecter</a></li>
      @if (Route::has('register')) 
          <li class="btnconnect"><a href="#btnconnect">S'inscrire</a></li>
      @endif
@else
{{--                     <li class="btnconnect">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->email }}
                    </a>
                    </li>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="background-color: #fff;">
                                        {{ __('Logout') }}
                                </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                          </form>
                    </div>
              
 --}}          

<li class="nav-item dropdown btnconnect">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
</li>
 li><a tabindex="-1" href="#">Regular link</a></li>
  <li class="disabled"><a tabindex="-1" href="#">Disabled link</a></li>
  <li><a tabindex="-1" href="#">Another link</a></li>
 @endguest                   
          </ul>
     </div>
      </nav>
     </div>
  </header>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  
</body>

</html>
