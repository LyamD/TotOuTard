@extends('layouts.home')

@section('homecontent')

<div class="text-center p-4 text-white">

    <h1 class="text-primary"> Restaurant </h1>

    <div class="row m-4">
        <div class="col-md-6">
            <h4 class="text-primary">Reservations</h4>
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-light">Archive</a>
                <a type="button" class="btn btn-light">Liste des clients</a>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-primary">Photos Evenement</h4>
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-light">Ajouter</a>
                <a type="button" class="btn btn-light">Liste</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary"> Date de Fermeture </h4>
            <a class="btn btn-light">Ajouter</a>
        </div>
        <div class="col-md-6">
            <h4 class="text-primary">Administrateur</h4>
            <a class="btn btn-light">ajouter</a>
        </div>
    </div>

    <h1 class="text-primary">Plats & Menu</h1>
    <div class="row m-4">
        <div class="col-md-6">
            <h4 class="text-primary"> Plats </h4>
            <div class="btn-group" role="group">
                <a href="{{route('plat.create')}}" type="button" class="btn btn-light">Ajouter</a>
            <a href="{{route('plat.index')}}" type="button" class="btn btn-light">Liste</a>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-primary"> Boisson </h4>
            <div class="btn-group" role="group">
                <a href="{{route('boisson.create')}}" type="button" class="btn btn-light">Ajouter</a>
                <a href="{{route('boisson.index')}}" type="button" class="btn btn-light">Liste</a>
            </div>
        </div>
    </div>
    <div class="row m-4">
        <div class="col-md-6">
            <h4 class="text-primary"> Menu </h4>
            <div class="btn-group" role="group">
                <a href="{{route('menu.create')}}" type="button" class="btn btn-light">Ajouter</a>
                <a href="{{route('menu.index')}}" type="button" class="btn btn-light">Liste</a>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-primary"> Affiche </h4>
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-light">Ajouter</a>
                <a type="button" class="btn btn-light">Liste</a>
            </div>
        </div>
    </div>

</div>

@endsection