@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un film a l'affiche:</h2> <br />

    {{Form::open(['route' => ['affiche.store']])}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('nom', 'Nom :')}}
            {{Form::text('nom')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('description', 'description :')}}
            {{Form::textarea('description')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('plats_id', 'Plat')}}
            {{Form::number('plats_id',  '2', ['class' => 'form-control','step' => '1'])}}
        </div>
    </div>

    {{Form::submit('Valider')}}
    {{Form::close()}}

</div>
    @endsection