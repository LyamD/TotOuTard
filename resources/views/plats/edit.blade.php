@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enregistrer un nouveau plat:</h2><br />
    {{Form::model($plat, ['route' => ['plat.update', $id]])}}

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
            {{Form::label('commentaire', 'Commentaire :')}}
            {{Form::textarea('commentaire')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('contient_porc', 'Contient du porc :')}}
            {{Form::checkbox('contient_porc', '1')}}
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
            {{Form::label('categories_plat_id', 'categorie')}}
            {{Form::number('categories_plat_id')}}
        </div>
    </div>

    {{Form::submit('Valider')}}
    {{Form::close()}}


</div>
@endsection