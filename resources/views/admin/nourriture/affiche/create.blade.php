@extends('layouts.app')

@section('content')
@php
    $plats = App\Plat::all();
@endphp

<div class="container">
    <h2>Ajouter un film a l'affiche:</h2> <br />

    {{Form::open(['route' => ['affiche.store'], 'files' => true])}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('nom', 'Nom :')}}
            {{Form::text('nom', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('description', 'description :')}}
            {{Form::textarea('description', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('plats_id', 'Plat')}}
            <select name="plats_id" class="form-control">
                @foreach ($plats as $plat)
                    <option value="{{$plat['id']}}">{{$plat['nom']}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('image', 'Choisir une image')}}
            {{Form::file('image', null, ['class' => 'form-control'])}}
        </div>
    </div>

    {{Form::submit('Valider')}}
    {{Form::close()}}

</div>
    @endsection