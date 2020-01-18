@extends('layouts.homeMenu')

@section('liste')
@php
    $plats = App\plat::all();
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
<select name="action">
    <option value="delete">Supprimer</option>
    <option value="detach">Enlever des Menus</option>
    <optgroup label="Ajouter à un menu">
        @foreach ($menus as $menu)
            <option value="{{$menu['id']}}">{{$menu['nom']}}</option>
        @endforeach
    </optgroup>
</select>
<input type="submit" value="Valider" id="checkBtn">
{!! Form::close() !!}


<div>
    <a href="{{route('plat.create')}}">Ajouter un plat</a>
</div>


<h1> Menus et leur plats </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>commentaire</th>
            <th>contient porc</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
        @foreach ($menus as $menu)
        <tbody>
            <tr> <th colspan='6'> {{$menu['nom']}} </th> </tr>
            @php
                $plats = $menu->plats()->orderBy('categories_plat_id')->get();
            @endphp
            @foreach($plats as $plat)
            <tr>
                <td>{{$plat['nom']}}</td>
                <td>{{$plat['prix']}}</td>
                <td>{{$plat['commentaire']}}</td>
                <td>{{$plat['contient_porc']}}</td>
                <td>
                    <a href="{{action('PlatsController@edit', $plat['id'])}}" class="btn btn-warning">Modifier</a>
                </td>
                <td>
                    {{ Form::open(['route' => ['plat.removeFromMenu', $menu['id'], $plat['id']]]) }}
                        @csrf
                        <button class="btn btn-danger" type="submit">Enlever du menu</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
        
    
</table>

@endsection