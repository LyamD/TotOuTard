@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un nouveau menu</h2> <br />

    {{Form::open(['route' => ['menu.store']])}}

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
            {{Form::label('dateMenu', 'Date :')}}
            {{Form::date('dateMenu')}}
        </div>
    </div>


    {{Form::submit('Valider', ['class' => 'form-control'])}}
    {{Form::close()}}

</div>
    @endsection