

<h1 class="m-b-md">
    Faire une reservation
</h1>

{{Form::open(['route' => ['reservation.store']])}}
    @csrf

    <h3>Contact</h3>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('nom', 'Nom :')}}
            {{Form::text('nom')}}
            {{Form::label('prenom', 'Prénom :')}}
            {{Form::text('prenom')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('numero', 'N° de téléphone :')}}
            {{Form::text('numero')}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {{Form::label('email', 'Email :')}}
            {{Form::text('email')}}
        </div>
    </div>

    <h3>reservation</h3>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <div class="lepicker"></div>
        </div>
    </div>

    {{Form::submit('Valider')}}
    {{Form::close()}}