<!DOCTYPE html>
<html>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

   <title>@yield('title')</title>

<!-- Bootstrap CSS CDN -->
   
   {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
--}} 

<link rel="stylesheet" href="{{ asset('boot/dist/css/bootstrap.min.css') }}">

<!-- Our Custom CSS -->
<link rel="stylesheet" href="{{asset('style2.css')}}">
<!-- Scrollbar Custom CSS -->
{{-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> --}}


<link rel="stylesheet" href="{{ asset('jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    @yield('css')

<!-- Font Awesome JS -->

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.32.4/sweetalert2.js"></script>
--}}


<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ProjectManager</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Menu</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Projet</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('projets.create')}}">Creer un projet</a>
                        </li>
                        <li>
                            <a href="{{route('projets.chercheur',Auth::user()->id)}}">Mes Projets</a>
                        </li>
                        <li>
                            <a href="{{route('projets.index')}}">Tous les Projets</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Publications</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('publications.create')}}">Enregistrer une publication</a>
                        </li>
                        <li>
                            <a href="{{route('get.publiperso',Auth::user()->id)}}">Mes publications</a>
                        </li>
                        <li>
                            <a href="{{route('publications.index')}}">Toutes les publications</a>
                        </li>
                    </ul>
                </li>
                
@role('chef unite')
                <li>
                    <a href="#pageUnite" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Unite :{{Auth::user()->UniteDeRechercheChef->first()->nomUnite}} </a>
                    <ul class="collapse list-unstyled" id="pageUnite">
                        <li>
                            <a href="{{route('get.UniteProjet',Auth::user()->UniteDeRechercheChef->first()->id)}}">Les projets de {{Auth::user()->UniteDeRechercheChef->first()->nomUnite}} </a>
                        </li>
                        <li>
                            <a href="{{route('rapportUnite',Auth::user()->UniteDeRechercheChef->first()->id)}}">Faire un reporting</a>
                        </li>
                    </ul>
                </li>
@else
    
@endrole
                
@role('chef equipe')
                <li>
                    <a href="#pageSubmenuequipe" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Département</a>
                    <ul class="collapse list-unstyled" id="#pageSubmenuequipe">
                        <li>
                            <a href="">Les projets au niveau du departement</a>
                        </li>
                        <li>
                            <a href="{{route('get.publiperso',Auth::user()->id)}}">Faire un reporting</a>
                        </li>
                    </ul>
                </li>
@else
    
@endrole
@role('chefDepartement')
                <li>
                    <a href="#pageSubmenudepartement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Département</a>
                    <ul class="collapse list-unstyled" id="pageSubmenudepartement">
                        <li>
                            <a href="">Les projets au niveau du departement</a>
                        </li>
                        <li>
                            <a href="{{route('reportDept')}}">Faire un reporting</a>
                        </li>
                    </ul>
                </li>
@else
    
@endrole

@role('chefDiretion')
                <li>
                    <a href="#pageSubmenudirecteur" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Direction Scientifique</a>
                    <ul class="collapse list-unstyled" id="pageSubmenudirecteur">
                        <li>
                            <a href="{{ route('directeurReporting') }}">Faire le reporting </a>
                        </li>
                        <li>
                            <a href="{{route('chercheursTout')}}">Liste des chercheurs</a>
                        </li>
                    </ul>
                </li>
@else
    
@endrole

@role('admin')
                <li>
                    <a href="#pageSubmenuadmin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrateur</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuadmin">
                        <li>
                            <a href="{{route('createRequest')}}">Les demandes d'inscription</a>
                        </li>
                        <li>
                            <a href="{{route('addChefDirection')}}">Ajouter un chef de direction</a>
                        </li>
                        <li>
                            <a href="{{route('addChefDepartement')}}">Ajouter un chef de departement</a>
                        </li>
                        <li>
                            <a href="{{route('addChefLaboratoire')}}">Ajouter un chef de Laboratoire </a>
                        </li>
                        <li>
                            <a href="{{route('addChefEquipe')}}">Ajouter un chef de Equipe </a>
                        </li>
                        <li>
                            <a href="{{route('addChefUnite')}}">Ajouter un chef de Unite</a>
                        </li>
                        
                    </ul>
                </li>
@else
    
@endrole












                <li>
                    <a href="{{route('profile')}}">Mes informations</a>
                </li>
                <li>
                    <a href="#">Contactez l'administrateur</a>
                </li>
            </ul>   
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu détaillé</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item {{url()->current()==url(route('personneinternes.index'))?'active':'' }}">
                                <a class="nav-link" href="{{route('get.chercheurs')}}">Chercheurs</a>
                            </li>
                            
                           


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px" >
    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width: 32px;height:32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{route('infosCompte',Auth::user()->id)}}"
                                       >
                                        <i class="fa fa-btn fa-user"></i> {{ __('Profile') }}
                                    </a>
                                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                   <form id="profil-form" action="{{ route('profile') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')

            
    </div>
    </body>           
   {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    --}} <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    
    <script src="{{ asset('jquery-3.3.1.slim.min.js') }}"></script>

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
     --}}
    <script src="{{ asset('boot/dist/js/bootstrap.min.js') }}"></script>
    <!-- jQuery Custom Scroller CDN -->
    
    <script src="{{ asset('jquery.mCustomScrollbar.concat.min.js') }}"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
     --}}
    

    
  
@yield('javascripts')
 <script type="text/javascript">
   
     $('#keep-order').multiSelect({ keepOrder: true }); 

        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>

 </html>