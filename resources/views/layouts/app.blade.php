<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProjectManager') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @yield('inclusion')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #8042f4;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                ProjectManager   {{--  {{ config('app.name', 'ProjectManager') }}
 --}}                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <!-- Left Side Of Navbar -->
                    <ul class="nav-menu navbar-nav mr-auto">
                              <li class="menu-active nav-item"><a href="#intro">Home</a></li>
                              <li class="nav-item"><a href="{{route('projets.index')}}">Projets</a></li>
                              <li class="nav-item"><a href="{{route('personneinternes.index')}}">Chercheurs</a></li>
                              <li class="nav-item"><a href="#">Actualite</a></li>
                              <li class="nav-item"><a href="{{route('publications.index')}}">Publications</a></li>
                              <li class="nav-item"><a href="#">Contactez-Nous</a></li>
                                        </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="btnconnect" >
                                <a class="btn-primary" href="{{ route('login') }}" style="background-color: #8042f4; padding: 4px">{{ __('S\'authentifier') }}</a>
                            </li>
                            <li class="btnconnect">
                                @if (Route::has('register'))
                                    <a class="btn-primary" href="{{ route('register') }}" style="background-color: #8042f4;">{{ __('S\'inscrire') }}</a>
                                @endif
                            </li> 
      {{--                           <li class="btnconnect"><a href="#btnconnect">Se Connecter</a></li>
      @if (Route::has('register')) 
                                <li class="btnconnect"><a href="#btnconnect">S'inscrire</a></li>
      @endif
       --}}                  @else
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
        {{-- <main class="py-4">
 --}}            @yield('content')
{{--         </main>
 --}}    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@stack('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>
</html>
