@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enregistrer un nouveau film:</h2> <br />

    {{Form::open(['route' => ['plat.store']])}}
    @csrf

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
            {{Form::label('prix', 'Prix :')}}
            {{Form::number('prix', null, ['class' => 'form-control','step' => '0.01'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('commentaire', 'Commentaire :')}}
            {{Form::textarea('commentaire', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('contient_porc', 'Contient du porc :')}}
            {{Form::checkbox('contient_porc', '1' , false)}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('present_carte', 'Present sur la carte :')}}
            {{Form::checkbox('present_carte', '1', true)}}
        </div>
    </div>
    
    @php
        $categories = App\CategoriePlat::all();
    @endphp
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('categories_plat_id', 'categorie')}}
            <select name="categories_plat_id" class="form-control">
                @foreach ($categories as $cat)
                    <option value="{{$cat['id']}}">{{$cat['nom']}}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{Form::submit('Valider', ['class' => 'form-control'])}}
    {{Form::close()}}

</div>
    @endsection