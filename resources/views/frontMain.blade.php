<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Tot ou Tard') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Style flatPickr-->
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/light.css">

  @php
  $affiches = App\Affiche::all();
  $menus = App\Menu::all();
  $categories = App\CategoriePlat::all();
  @endphp

</head>

<body id="page-top">
  <div id="app">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">{{ config('app.name', 'Tot ou tard') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
          data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
          aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#menus">Carte & Menus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#affiche">Plat à l'affiche</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#photos">Photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#reservation">Réservations</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Grayscale</h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start
            Bootstrap.</h2>
          <a href="#reservation" class="btn btn-primary js-scroll-trigger">Faire une réservation</a>
        </div>
      </div>
      <!-- Wave divider -->
      <svg class="editorial" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 
      58-18 88-18s
      58 18 88 18 
      58-18 88-18 
      58 18 88 18
      v44h-352z" />
        </defs>
        <g class="parallax1">
          <use xlink:href="#gentle-wave" x="50" y="3" fill="#151318" />
        </g>
        <g class="parallax2">
          <use xlink:href="#gentle-wave" x="50" y="0" fill="#3f2a1d" />
        </g>
        <g class="parallax3">
          <use xlink:href="#gentle-wave" x="50" y="9" fill="#151318" />
        </g>
        <g class="parallax4">
          <use xlink:href="#gentle-wave" x="50" y="6" fill="#97745E" />
        </g>
      </svg>
    </header>



    <!-- Plats à l'affiche -->
    @if (!$affiches->isEmpty())
    <section id="affiche" class="bg-light">
      <div class="container text-primary text-center justify-content-center mb-5">
        <h1 class="text-center">
          Nos Meilleurs plats
        </h1>

        <div class="row justify-content-center">
          @foreach ($affiches as $affiche)
          @php
          $plat = $affiche->plat()->get();
          @endphp

          @if (!$plat->isEmpty())
          <div class="col w50 m-2">
            <div class="row plat-affiche">
              <div class="col-md p-5">
                <h4>{{$affiche['nom']}}</h4>
                <h5 class="mt-3">{{$plat[0]['nom']}}</h5>
                <p class="mt-5">{{$affiche['description']}} </p>
              </div>
              <div class="col-md mr-0 p-1">
                <img class="img-fluid" src="images/{{$affiche['imageName']}}">
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <!-- Divider -->
      <svg id="affiche-divider" preserveAspectRatio="xMidYMax meet" class="svg-separator sep12" viewBox="0 0 1600 200" data-height="200">
        <polygon class="div1" points="-4,24 800,198 1604,24 1604,204 -4,204 "></polygon> 
        <polygon class="div2" points="-4,0 800,198 1604,0 1604,11.833 800,198 -4,12 "></polygon> 
        <polygon class="div3" points="-4,12 -4,24 800,198 1604,24 1604,11.833 800,198 "></polygon>

        <defs>
          <linearGradient id="grad" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" class="grad1"/>
            <stop offset="100%" class="grad2"/>
          </linearGradient>

        </defs>
      </svg>
    </section>
    @endif

    <!-- carousel carte & menus-->
    <section id="menus" class="bg-light text-dark text-center">
      <div class="container-fluid pt-2">

        <h4>Cartes et Menus</h4>
        <h3>...</h3>

        <div class="row">
          <div class="col-lg-12">

            <div id="owl-carousel-menus" class="owl-carousel owl-theme p-4 ">

              <div class="item card">
                <div class="card-body">

                  <h5>
                    à la carte
                  </h5>
                  <p>
                    @php
                    foreach ($categories as $categorie) {
                    echo 'la categorie : ' . $categorie['nom'] .' <br>';
                    $plats = $categorie->plats()->get();
                    foreach ($plats as $plat) {
                    echo $plat['nom'] . ', ';
                    }
                    echo '<br>';
                    }
                    @endphp
                  </p>
                </div>
              </div>

              @foreach ($menus as $menu)
              @php
              $plats = $menu->plats()->orderBy('categories_plat_id')->get();
              @endphp
              <div class="item card">
                <div class="card-body">

                  <h5> {{$menu['nom']}} </h5>
                  @foreach ($plats as $plat)
                  <p> {{$plat['nom']}}</p> </br>
                  @endforeach
                </div>
              </div>
              @endforeach

            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- // slder sec -->

    <!-- Carousel photos -->
    <section id="photos" class="text-center pt-3">
      <h1>Photos</h1>

      <div id="owl-evenement" class="owl-carousel owl-theme">
        <div class="item">
          <img src="images/Evenement/Evenement1.jpg" class="img-fluid">
          <div class="owl-text">
            hehehehhh
          </div>
        </div>
      </div>
    </section>

    <!-- Reservations -->
    <section id="reservation">
      <div class="container text-center">


        <h1 class="mb-5">
          Faire une réservation
        </h1>


        <h3>Informations personnelles</h3>
        <p class="text-muted">Ces dernières ne seront utilisée qu'afin de confirmer votre réservation</p>

        <form method="POST" action="{{ route('reservation.store') }}" class="text-right">
          @csrf

          <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

            <div class="col-md-6">
              <input id="nom" type="nom" class="form-control @error('nom') is-invalid @enderror" name="nom"
                value="{{ old('nom') }}" required autocomplete="nom">

              @error('nom')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

            <div class="col-md-6">
              <input id="prenom" type="prenom" class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                required autocomplete="prenom">

              @error('prenom')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>

            <div class="col-md-6">
              <input id="numero" type="numero" class="form-control @error('numero') is-invalid @enderror" name="numero"
                required autocomplete="numero">

              @error('numero')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>


          <h3 class="mb-3 text-center">Réservation</h3>

          <div class="form-group row">
            <label for="datepicker"
              class="col-md-4 col-form-label text-md-right">{{ __('Date & Horaire de réservation') }}</label>

            <div class="col-md-6">
              <input id="datePicker" name="horaire" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-4">
              {{Form::label('nbDePersonnes', 'Nombre de personnes')}}
            </div>
            <div class="col-md-6">
              {{Form::number('nbDePersonnes', null, ['class' => 'form-control','step' => '1'])}}
            </div>
          </div>

          <div class="form-group text-center">
            {{Form::label('information', 'Information complémentaires :')}}
            {{Form::textarea('information', null, ['class' => 'form-control', 'style' => 'height: 6em;'])}}
          </div>




          <div class="form-group row mb-0 text-center">
            <div class="col-md-8 offset-md-2">
              <button type="submit" class="btn btn-primary">
                {{ __('Réserver') }}
              </button>
            </div>
          </div>
        </form>

        <!-- ------------------------------------------------------------ -->

      </div>

    </section>


    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Address</h4>
                <hr class="my-4">
                <div class="small text-black-50">4923 Market Street, Orlando FL</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#">hello@yourdomain.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Phone</h4>
                <hr class="my-4">
                <div class="small text-black-50">+1 (555) 902-8832</div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Your Website 2019
      </div>
    </footer>
  </div>
</body>

</html>