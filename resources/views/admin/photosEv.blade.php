@extends('layouts.home')

@section('homecontent')
@php
    $photos = App\Photos::all();
@endphp

<div class="mb-5">
    <table>
        <thead>
            <tr>
                <th>Supprimer</th>
                <th colspan="4">Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                @if ($photo['id'] == 1)
                <tr>
                    <td>
                        {{Form::open(['route' => ['photo.update', $photo['id']], 'files' => true])}}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                {{Form::label('image', 'Choisir une image')}}
                                {{Form::file('image', null, ['class' => 'form-control-file'])}}
                            </div>
                        </div>
                    
                        <button class="btn btn-light" type="submit"><i class="far fa-edit"></i></button>
                        {{Form::close()}}
                    </td>
                    <td colspan="4">
                        <img src="images/{{$photo['image']}}" class="img-fluid">
                    </td>
                </tr>
                @else 
                    <tr>
                        <td>
                        <a href="{{route('photo.destroy', $photo['id'])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <td colspan="4">
                            <img src="images/{{$photo['image']}}" class="img-fluid">
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    {{Form::open(['route' => ['photo.store'], 'files' => true])}}

    <h2>Ajouter une photo</h2>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('description', 'description :')}}
            {{Form::textarea('description', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('image', 'Choisir une image')}}
            {{Form::file('image', null, ['class' => 'form-control-file'])}}
        </div>
    </div>

    {{Form::submit('Valider', ['class' => 'form-control'])}}
    {{Form::close()}}
</div>

@endsection