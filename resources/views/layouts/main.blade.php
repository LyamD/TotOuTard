<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tot ou Tard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- MapBox-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id='app'>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
                            <a class="nav-link js-scroll-trigger" href="#reservation">Réservation</a>
                        </li>
                    </ul>
                </div>
            </div> 
        </nav>

        @yield('content')

        <footer class="site-footer bg-primary text-white" role="contentinfo">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4 mb-5">
                        <h3>Retrouvez nous aussi sur</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor
                            blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
                        <ul class="list-unstyled footer-link d-flex footer-social">
                            <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
                        </ul>

                    </div>
                    <div class="col-md-5 mb-5">
                        <div class="mb-5">
                            <h3>Horaires</h3>
                            <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM
                            </p>
                        </div>
                        <div>
                            <h3>Nous contacter</h3>
                            <ul class="list-unstyled footer-link">
                                <li class="d-block">
                                    <span class="d-block text-black">Adresse :</span>
                                    <span>284 Rue de la Digue 30140 Meyrannes</span>
                                </li>
                                <li class="d-block">
                                    <span class="d-block text-black">Téléphone:</span>
                                    <span> +33 4 66 24 84 37 </span>
                                </li>
                                <li class="d-block">
                                    <span class="d-block text-black">Email:</span>
                                    <span>info@yourdomain.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <h3>Position :</h3>
                        <div id='map' style='width: 400px; height: 300px;'></div>
                        <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoibHlhbSIsImEiOiJjam4xdXZpYncxeWlpM3FxbG13NG1hZnF6In0.1STn3brazLCiVhNaStbn2w';
                        var map = new mapboxgl.Map({
                            container: 'map',
                            style: 'mapbox://styles/mapbox/streets-v11'
                        });
                        </script>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-md-center text-left">
                        <p>
                            Tôt ou tard - Durand Lyam - 2018
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>