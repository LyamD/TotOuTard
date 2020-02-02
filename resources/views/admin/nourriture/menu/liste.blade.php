@extends('layouts.home')

@section('homecontent')

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
            <tr> 
                <th colspan='4'> {{$menu['nom']}} </th> 
                <th colspan='2'> 
                    <form action="{{action('MenuController@destroy', $menu['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Supprimer ce menu</button>
                    </form>
                </th> 
            </tr>
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


<div>
    <a class="btn btn-light" href="{{route('menu.create')}}">Ajouter un menu</a>
</div>

@endsection