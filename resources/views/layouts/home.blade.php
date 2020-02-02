@extends('layouts.app')

@section('content')
<section>
<div class="container pt-5">
    <h1>Tableau de bord</h1>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif    
    </div>

    @yield('homecontent')
</div>
</section>
@endsection