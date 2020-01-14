@extends('layouts.homeMenu')

@section('liste')
<?php
    use App\Plat;
    $plats = plat::all();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
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

<div>
    <a href="{{route('plat.create')}}">Ajouter un plat</a></button>
</div>

@endsection