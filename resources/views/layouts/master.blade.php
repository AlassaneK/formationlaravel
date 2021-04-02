<!doctype html>
<html lang="fr">
  <head>
    <title>Formation DSI</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
 {{--<link rel="stylesheet" href="{{ asset('css/app2.css') }}" >

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >--}}
 
</head>
  <body>
    
    <header>
        {{---<nav class="navbar navbar-expand-sm navbar-dark bg-success">
            <div class="container">--}}
                <nav class="navbar navbar-expand-sm navbar-dark bg-success">
                    <a class="navbar-brand ml-5" href="{{ route('accueil') }}">Formation DSI</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"></button>
                    <div class="collapse navbar-collapse d-flex justify-content-between " id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('accueil') }}">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('procedure', "burkina faso - Ouagadougou") }}">La Procédure</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produits.liste') }}">Liste des produits</a>
                            </li>
                            {{--<li class="nav-item dropdown">
                                {{--@guest--}}
                                {{--<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="
                                    event.preventDefault();
                                    document.getElementByID('logout').submit();
                                    ">Logout</a>
                                    <form id="logout" action="{{'logout'}}" method="post">
                                        @csrf
                                    </form>--}}
                                   {{-- <a class="dropdown-item" href="{{ route('register')}}">Créer votre compte</a>--}}
                                    {{--@endguest--}}
                                {{--</div>
                            </li>--}}
                        </ul>

                        <ul class="navbar-nav mt-2 mt-lg-0">
                            @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('login')}}">Login</a>
                                    <a class="dropdown-item" href="{{ route('register')}}">Créer votre compte</a>
                                </div>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Deconnexion</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="
                                    event.preventDefault();
                                    document.getElementById('logout').submit();
                                    ">Logout</a>
                                    <form id="logout" action="{{route('logout')}}" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest

                            {{--@auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Je suis deja connecte</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="
                                    event.preventDefault();
                                    document.getElementByID('logout').submit();
                                    ">Logout</a>
                                    <form id="logout" action="{{'logout'}}" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth --}}
                        </ul>                       
                        
                    </div>
                </nav>
            {{--</div>
        </nav>--}}
    </header>

    <main>

      {{ $slot }}
           
    </main>
    
    <br> 

   <footer class="bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <br>
                    <img src="https://www.anptic.gov.bf/fileadmin/user_upload/armoirie-burkina-faso.png" style="height: 100px" alt="">
                </div>
                <div class="col-md-9">
                    <br>
                    Boulevard de l'insurrection populaire des 30 et 31 octobre, Cissin, Secteur 25, OuagadougouBurkina Faso <br>
                    (+226) 25 49 77 77 / (+226) 25 33 13 87 <br>
                    infos@anptic.gov.bf <br>
                    centre de support et d'assistance : 226 25 49 77 77
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <small>
                        @Copyright 2021 | Mon Ministere | Burkina Faso 
                    </small>
                </div>
            </div>
        </div>
   </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   {{-- <script src="{{asset('js/app2.js')}}" ></script>--}}

</body>
</html>