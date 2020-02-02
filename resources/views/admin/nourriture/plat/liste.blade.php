@extends('layouts.home')

@section('homecontent')
@php
    $menus = App\Menu::orderBy('id')->get();

@endphp

<h1> Tout les plats </h1>
{!! Form::open(['route' => ['plat.addToMenu']]) !!}
{{ Form::token() }}
<table class="table table-striped">
    <thead>
        <tr>
            <th colspan="2">Nom</th>
            <th>Prix</th>
            <th>commentaire</th>
            <th>contient porc</th>
            <th>présent carte</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($plats as $plat)
        <tr>
            <td>{{Form::checkbox('checkedPlats[]', $plat['id'])}}</td>
            <td>{{$plat['nom']}}</td>
            <td>{{$plat['prix']}}</td>
            <td>{{$plat['commentaire']}}</td>
            <td>{{$plat['contient_porc']}}</td>
            <td>{{$plat['present_carte']}}</td>

            <td>
                <a href="{{action('PlatsController@edit', $plat['id'])}}" class="btn btn-warning">Modifier</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<div class="row m-2">
    <div class="col-md-4">
        <select name="action" class="form-control">
            <option value="delete">Supprimer</option>
            <option value="detach">Enlever des Menus</option>
            <optgroup label="Ajouter à un menu">
                @foreach ($menus as $menu)
                    <option value="{{$menu['id']}}">{{$menu['nom']}}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
    <div class="col-md-4">
        <input class="btn btn-light" type="submit" value="Valider" id="checkBtn">
    </div>
</div>
{!! Form::close() !!}


<div>
    <a class="btn btn-light" href="{{route('plat.create')}}">Ajouter un plat</a>
</div>
@endsection