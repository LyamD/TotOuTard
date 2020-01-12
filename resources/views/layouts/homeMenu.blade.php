@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Tableau de bord</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        @yield('liste')

       
    </div>
</div>
@endsection