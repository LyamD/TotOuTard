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
  <script src="https://kit.fontawesome.com/c3088dd4dc.js" crossorigin="anonymous"></script>
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
  $photos = App\Photos::all();
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
              <a class="nav-link js-scroll-trigger" href="#affiche">Plat à l'affiche</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#menus">Carte & Menus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#photos">Photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#reservation">Réservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Tôt ou Tard</h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5">284 Rue de la Digue 30410 Meyrannes</h2>
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

    <div id="afficheButton">
      <a data-toggle="modal" data-target="#afficheModal">Prochain Evenement</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="afficheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">A venir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="images/Evenement/affiche.jpg" alt="Prochain évènement" class="img-fluid">
          </div>
        </div>
      </div>
    </div>


    <!-- Plats à l'affiche -->
    @if (!$affiches->isEmpty())
    <section id="affiche" class="bg-light pt-5">
      <div class="container text-primary text-center justify-content-center mb-5">
        <h1 class="text-center">
          Nos Meilleurs plats
        </h1>
        @php
        $i = 0;
        @endphp

        @foreach ($affiches as $affiche)
        @php
        $plat = $affiche->plat()->get();
        $i++;
        @endphp

        @if (!$plat->isEmpty())
        <div class="row justify-content-center mt-5 pt-5">
          @if ($i%2 == 1)
          <div class="col-md-4 pt-5 text-dark">
            <h4>{{$affiche['nom']}}</h4>
            <h5 class="mt-3">{{$plat[0]['nom']}}</h5>
            <p class="mt-5">{{$affiche['description']}} </p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid rounded-circle img-thumbnail" src="images/{{$affiche['imageName']}}">
          </div>
          <div class="col-md-4">

          </div>

          @else
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <img class="img-fluid rounded-circle img-thumbnail" src="images/{{$affiche['imageName']}}">
          </div>
          <div class="col-md-4 pt-5 text-dark">
            <h4>{{$affiche['nom']}}</h4>
            <h5 class="mt-3">{{$plat[0]['nom']}}</h5>
            <p class="mt-5">{{$affiche['description']}} </p>
          </div>
          @endif
        </div>

        @endif
        @endforeach
      </div>

      <!-- Divider -->
      <svg id="affiche-divider" preserveAspectRatio="xMidYMax meet" class="svg-separator sep12" viewBox="0 0 1600 200"
        data-height="200">
        <polygon class="div1" points="-4,24 800,198 1604,24 1604,204 -4,204 "></polygon>
        <polygon class="div2" points="-4,0 800,198 1604,0 1604,11.833 800,198 -4,12 "></polygon>
        <polygon class="div3" points="-4,12 -4,24 800,198 1604,24 1604,11.833 800,198 "></polygon>

        <defs>
          <linearGradient id="grad" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" class="grad1" />
            <stop offset="100%" class="grad2" />
          </linearGradient>

        </defs>
      </svg>
    </section>
    @endif

    <!-- carousel carte & menus-->
    <section id="menus" class="bg-light pt-5 text-dark text-center">
      <div class="container-fluid pt-2">

        <h1>Cartes et Menus</h1>
        <h3>...</h3>

        <div class="row">
          <div class="col-lg-12">

            <div id="owl-carousel-menus" class="owl-carousel owl-theme p-4 ">

              <div class="item card" data-merge="2">
                <div class="card-body">

                  <h4 class="text-uppercase mb-4 p-1">
                    à la carte
                  </h4>
                  @foreach ($categories as $categorie)
                    <h5 class="mb-3">{{$categorie['nom']}}</h5>
                    @php
                      $plats = $categorie->plats()->get();
                    @endphp
                    @foreach ($plats as $plat)
                      <div class="row">
                        <div class="col-8">
                          <span class="float-md-left text-danger">
                            <i class="fas fa-circle-notch"></i>
                            {{$plat['nom']}} 
                          </span>
                        </div>
                        <div class="col-4">
                          <span class="float-md-right">
                            {{$plat['prix']}}€
                          </span>
                        </div>
                      </div>

                      <div class="row p-2">
                        <span class="text-muted float-md-left text-left">{{$plat['commentaire']}}</span>
                      </div>
                    @endforeach
                  @endforeach
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
      <h1 class="text-dark">Photos</h1>

      <div id="owl-evenement" class="owl-carousel owl-theme">
        @foreach ($photos as $photo)
        @if ($photo['id'] != 1) 
          <div class="item">
            <img src="images/{{$photo['image']}}" class="img-fluid">
            <div class="owl-text text-white">
            <p class="text-muted pt-1 mb-0">{{$photo['description']}}</p>
            </div>
          </div>
        @endif
        @endforeach
      </div>
    </section>

    <!-- Reservations -->
    <section id="reservation">
      <div class="container text-center p-5">


        <h1 class="mb-5">
          Faire une réservation
        </h1>


        <h3>Informations personnelles</h3>
        <p class="text-muted">Ces dernières ne seront utilisée qu'afin de confirmer votre réservation</p>

        <form method="POST" action="{{ route('reservation.store') }}" class="text-center">
          @csrf

          <div class="form-group">
            <label for="nom" class="">{{ __('Nom :') }}</label>

            <div class="row justify-content-center">
              <input id="nom" type="text" class="form-control w-50 @error('nom') is-invalid @enderror" name="nom"
                value="{{ old('nom') }}" required autocomplete="nom">

              @error('nom')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="prenom" class="">{{ __('Prénom :') }}</label>

            <div class="row justify-content-center">
              <input id="prenom" type="text" class="form-control w-50 @error('prenom') is-invalid @enderror"
                name="prenom" required autocomplete="prenom">

              @error('prenom')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="">{{ __('Adresse Mail :') }}</label>

            <div class="row justify-content-center">
              <input id="email" type="email" class="form-control w-50 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="numero" class="">{{ __('Numéro de téléphone :') }}</label>

            <div class="row justify-content-center">
              <input id="numero" type="tel" class="form-control w-50 @error('numero') is-invalid @enderror"
                name="numero" required autocomplete="numero">

              @error('numero')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>


          <h3 class="mb-3 text-center">Réservation</h3>

          <div class="form-group">
            
            <label for="datepicker" class="">{{ __('Date & Horaire :') }}</label>

            <div class="row justify-content-center">
              <input id="datePicker" name="horaire" class="form-control w-50">
            </div>
          </div>

          <div class="form-group">
            <label for="nbDePersonnes" class="">{{ __('Nombre de personne :') }}</label>

            <div class="row justify-content-center">
              <input id="nbDePersonnes" type="number" min="1" step="1"
                class="form-control w-50 @error('nbDePersonnes') is-invalid @enderror" name="nbDePersonnes" required>

              @error('nbDePersonnes')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="information" class="">{{ __('Information complémentaire :') }}</label>

            <div class="row justify-content-center">
              <textarea id="information" type="textarea"
                class="form-control w-50 @error('information') is-invalid @enderror" name="information"></textarea>

              @error('information')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>




          <div class="form-group row mb-0 text-center">
            <div class="col-md-8 offset-md-2">
              <button type="submit" class="btn btn-primary">
                {{ __('Réserver') }}
              </button>
              <p class=" mt-2 text-muted">Vous recevrez un mail si votre réservation à bien été reçu</p>
            </div>
          </div>
        </form>

        <!-- ------------------------------------------------------------ -->

      </div>

    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-light pb-4">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Addresse</h4>
                <hr class="my-4">
                <div class="small text-dark">284 Rue de la Digue 30410 Meyrannes</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-dark-50">
                  <a href="#">hello@yourdomain.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Téléphone</h4>
                <hr class="my-4">
                <div class="small text-dark">04 66 24 84 37</div>
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
    <footer class="bg-primary small text-center text-white">
      <div class="container">
        Copyright &copy; Durand Lyam / Tôt ou Tard -
        <a href="">mentions légale</a>
        -
        <a href="{{ route('login') }}">connexion</a>
      </div>
    </footer>
  </div>
</body>

</html>