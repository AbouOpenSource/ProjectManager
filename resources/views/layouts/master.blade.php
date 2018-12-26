<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      @yield('css')
    
    <title>ProjectManager</title>
  </head>
<body>
<header id="header">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-menu">
                <div class="container">
                      <a class="navbar-brand" href="#">ProjectManager</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            @guest

                              <a class="nav-link" href="{{route('projets.index')}}">Les Projets</a>

                            @else
                            <a class="nav-link dropdown-toggle" href="{{route('projets.index')}}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Les Projets
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{route('projets.index')}}">Tous les Projets</a>
                              <a class="dropdown-item" href="#">Mes Projets</a>
                              <a class="dropdown-item" href="#">Creer Un Projet</a>
                            </div>
                          </li>                    
                              @endguest

                          <li class="nav-item">
                            @guest
                              <a class="nav-link" href="#">Les Chercheurs</a>
                            @else                   
                            <a class="nav-link dropdown-toggle" href="{{route('projets.index')}}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Les Chercheurs
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="#">Mon membre de mon Unité</a>
                            
                            </div>
                          
                            @endguest
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('projets.index')}}">Les Publictions</a>
                          </li>
                          @guest
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('S\'authentifier') }}</a>
                          </li>
                          @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                                @endif 
                          @else
                         {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                            Se deconnecter <i class="fas fa-sign-out-alt"></i>
                            </a>
                          </li> 
                          --}} 
                                <li class="nav-item dropdown">
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
                        @endguest
                          




                        </ul>
                      </div>
                    </div>
                    </nav>

</header>
    
@yield('content')

<footer id="footer">
  <p>Copyright &hearts; Centre MURAZ</p>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   @yield('javascripts')
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>
  </body>
</html>