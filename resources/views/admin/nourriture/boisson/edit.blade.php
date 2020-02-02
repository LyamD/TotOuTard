@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enregistrer une nouvelle boisson :</h2> <br />

    {{Form::model($plat, ['route' => ['boisson.update', $id]])}}

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
            {{Form::label('prix', 'Prix :')}}
            {{Form::number('prix', null, ['class' => 'form-control','step' => '0.01'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('description', 'Description :')}}
            {{Form::textarea('description')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('contenance', 'Contenance :')}}
            {{Form::number('contenance', null, ['class' => 'form-control','step' => '1'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('present_carte', 'Present sur la carte :')}}
            {{Form::checkbox('present_carte', '1', true)}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('contient_alcool', 'Contient de l\'alcool :')}}
            {{Form::checkbox('contient_alcool', '1', true)}}
        </div>
    </div>


    {{Form::submit('Valider')}}
    {{Form::close()}}

</div>
    @endsection