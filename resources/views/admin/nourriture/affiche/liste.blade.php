@extends('layouts.home')

@section('homecontent')

<h1> Menus et leur plats </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom Affiche</th>
            <th>Description</th>
            <th colspan="1" style="width: 30em;">Image</th>
        </tr>
    </thead>
    
        <tbody>
            @foreach($affiches as $affiche)
            @php
                $plat = $affiche->plat()->get();
            @endphp
            <tr>
                <td>{{$affiche['nom']}}</td>
                <td colspan="2">{{$affiche['description']}}</td>
                <td rowspan="4"> <img class="img-fluid" src="images/{{$affiche['imageName']}}"> </td>
            </tr>
            <tr>
                <th> Plat </th>
                <th> Prix </th>
                <th> Description </th>
            </tr>
            <tr>
                <td> {{$plat[0]['nom']}}</td>
                <td> {{$plat[0]['prix']}}</td>
                <td> {{$plat[0]['description']}}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <form action="{{action('AfficheController@destroy', $affiche['id'])}}" method="post">
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
    <a class="btn btn-light" href="{{route('affiche.create')}}">Ajouter une affiche</a>
</div>

@endsection