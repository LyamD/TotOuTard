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

<section class="slider_sec mb-5 bg-light text-dark text-center">
    <div class="container-fluid fix-cont">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider_in">
                    <h4>Cartes et Menus</h4>
                    <h3>...</h3>
                    <div id="owl-carousel-menus" class="owl-carousel owl-theme p-5 ">
                        <div class="item m-1">
                            <img src="images/plat-carte-bg.jpg" class="img-fluid item-img">
                            <div class="item-text text-white">
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col">hey</div>
                    <div class="col">
                        <img class="img-fluid" src="images/dishes_1.jpg">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col">hey</div>
                    <div class="col">
                        <img class="img-fluid" src="images/dishes_1.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <h1>Les photos de nos derniers évènements</h1>
    <div id="owl-evenement" class="owl-carousel">
        <div class="item">
            <img src="images/Evenement/Evenement1.jpg" class="img-fluid">
            <div class="owl-text">
                hehehehhh
            </div>
        </div>
        <div class="item">
            <img src="images/Evenement/Evenement1.jpg" class="img-fluid">
            <div class="owl-text">
                hehehehhh
            </div>
        </div>
    </div>
</section>



@if (!$affiches->isEmpty())
<section>
    <div class="container">
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
    </div>
</section>
@endif

<section>
    <div class="container">
        <div class="row">
            <div class="col-6">
                @include('reservation.formulaire')
            </div>
            <div class="col-6">
                <img src="images/Evenement/affiche.jpg" class="img-fluid">
            </div>
        </div>
    </div>
</section>

@endsection