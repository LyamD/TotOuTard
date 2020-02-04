@extends('layouts.main')

@section('content')

@php
$affiches = App\Affiche::all();
$menus = App\Menu::all();
$categories = App\CategoriePlat::all();
@endphp

<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Grayscale</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start
                Bootstrap.</h2>
            <a href="#about" class="btn btn-primary js-scroll-trigger">Faire une réservation</a>
        </div>
    </div>
</header>

<section id="menus" class="slider_sec mb-5 bg-white text-dark text-center">
    <div class="container-fluid fix-cont">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider_in">
                    <h4>Cartes et Menus</h4>
                    <h3>...</h3>
                    <div id="owl-carousel-menus" class="owl-carousel owl-theme p-1 ">
                        <div class="item m-1 pb-3">
                            <img src="images/plat-carte-bg.jpg" class="img-fluid item-img">
                            <div class="item-text text-white ">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="m-b-md">
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
                                    <div class="col-6">
                                        <h5>What is Lorem Ipsum?</h5>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        @foreach ($menus as $menu)
                        @php
                        $plats = $menu->plats()->orderBy('categories_plat_id')->get();
                        @endphp
                        <div class="item m-1">
                            <img src="images/plat-carte-bg.jpg" class="img-fluid item-img">
                            <div class="item-text text-white">
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
    </div>
</section>
<!-- // slder sec -->




@if (!$affiches->isEmpty())
<div class="bg-light pb-5">
<section id="affiche" class="m-3">
    <div class="container platContainer text-primary">
        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <h1 class="text-center">
                    Nos Meilleurs plat
                </h1>
            </div>
        </div>
        @foreach ($affiches as $affiche)
            @php
                $plat = $affiche->plat()->get();
            @endphp
            @if (!$plat->isEmpty())
                
            
            <div class="row justify-content-center">
                <div class="col-6 plat-affiche text-center text-black pr-0">
                    <div class="row">
                        <div class="col col-l-6 p-5">
                            <h4>{{$affiche['nom']}}</h4>
                            <h5 class="mt-3">{{$plat[0]['nom']}}</h5>
                            <p class="mt-5">{{$affiche['description']}} </p>
                        </div>
                        <div class="col col-l-6 mr-0">
                            <img class="img-fluid" src="images/{{$affiche['imageName']}}">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</section>
</div>
@endif

<section id="photos" class="pt-5 text-center photo-evenement">
    <div class="row justify-content-center">
        <div class="card col-4 m-3 photos-text-card">
            <div class="card-body">
                <h1>Les photos de nos derniers évènements</h1>
            </div>
        </div>
    </div>
    <div id="owl-evenement" class="owl-carousel">
        {{-- @php
            $dirname = "images/Evenement/";
            $images = glob($dirname."*.png");
        @endphp
        @foreach ($images as $image)
            <div class="item">
            <img src="images/Evenement/Evenement1.jpg" class="img-fluid">
            <div class="owl-text">
                hehehehhh
            </div>
        </div>
        @endforeach --}}
            
        
        <div class="item">
            <img src="images/Evenement/Evenement1.jpg" class="img-fluid">
            <div class="owl-text">
                hehehehhh
            </div>
        </div>
    </div>
</section>




<section id="reservation" class="mt-3">
    <div class="container p-5 text-center ">
        <div class="row ">
            <div class="col-md-6">
                <img src="images/Evenement/affiche.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                @include('reservation.formulaire')
            </div>
        </div>
    </div>
</section>

@endsection