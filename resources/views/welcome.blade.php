<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: white;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .carousel-item.active,
            .carousel-item-next,
            .carousel-item-prev{
                display:block;
            }

            .carousel-control-next,
            .carousel-control-prev {
                filter: invert(100%);
            }
        </style>
    </head>
    <body>
        <div id='app'>
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                @php
                    $affiches = App\Affiche::all();
                    $menus = App\Menu::all();
                    $categories = App\CategoriePlat::all();
                @endphp

                <div class="content">
                    <div class="title m-b-md">
                        Tot ou tard
                    </div>

                    

                    @if (!$affiches->isEmpty())
                        <h1 class="m-b-md">
                            a l'affiche
                        </h1>

                        @php
                            foreach ($affiches as $affiche) {
                                $plat = $affiche->plat()->get();
                                if (!$plat->isEmpty()) {
                                    echo $affiche['nom'] . '</br>';
                                    echo $plat[0]['nom'] . ', ' . $plat[0]['prix'] . ' €</br>';
                                    echo $affiche['description'];
                                }
                            }
                        @endphp
                    @endif

                    @if (!$menus->isEmpty())
                        <h1 class="m-b-md">
                            Menus
                        </h1>

                        <div id="carouselMenus" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php 
                                    $compteur = 0; 
                                @endphp
                                @foreach ($menus as $menu)
                                @php 
                                    $plats = $menu->plats()->orderBy('categories_plat_id')->get();
                                @endphp
                                    @if ($compteur == 0)
                                        <div class="carousel-item active text-center p-4">
                                            <h5> {{$menu['nom']}} </h5>
                                            @foreach ($plats as $plat)
                                               <p> {{$plat['nom']}}</p>
                                            @endforeach
                                        </div> 
                                    @else
                                        <div class="carousel-item text-center p-4">
                                            <h5> {{$menu['nom']}} </h5>
                                            @foreach ($plats as $plat)
                                               <p> {{$plat['nom']}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    @php
                                        $compteur++;
                                    @endphp
                                @endforeach

                            </div>

                            <a class="carousel-control-prev" href="#carouselMenus" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselMenus" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif


                    <h1 class="m-b-md">
                        à la carte
                    </h1>
                    @php 
                        foreach ($categories as  $categorie) {
                            echo 'la categorie : ' . $categorie['nom'] .' </br>';
                            $plats = $categorie->plats()->get();
                            foreach ($plats as $plat) {
                                echo $plat['nom'] . ', ';
                            }
                            echo '</br>';
                        }
                    @endphp


                    @include('reservation.formulaire')
                    
                </div>
            </div>
        </div>
    </body>
</html>
