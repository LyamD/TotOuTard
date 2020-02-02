@extends('layouts.home')

@section('homecontent')

<h1> Menus et leur plats </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Contenance</th>
            <th>Contient de l'alcool</th>
            <th>Présent sur la carte</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
        <tbody>
            @foreach($boissons as $boisson)
            <tr>
                <td>{{$boisson['nom']}}</td>
                <td>{{$boisson['prix']}}</td>
                <td>{{$boisson['description']}}</td>
                <td>{{$boisson['contenance']}}</td>
                <td>{{$boisson['contient_alcool']}}</td>
                <td>{{$boisson['present_carte']}}</td>
                <td>
                    <a href="{{action('BoissonController@edit', $boisson['id'])}}" class="btn btn-warning">Modifier</a>
                </td>
                <td>
                    <form action="{{action('BoissonController@destroy', $boisson['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    
</table>


<div>
    <a class="btn btn-light" href="{{route('boisson.create')}}">Ajouter une boisson</a>
</div>

@endsection