

<h1 class="mb-5">
    Faire une réservation
</h1>


    <h3>Informations personnelles</h3>
    <p class="text-muted">Ces dernières ne seront utilisée qu'afin de confirmer la réservation</p>
    
    <form method="POST" action="{{ route('reservation.store') }}" class="text-right">
        @csrf
        
        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
            
            <div class="col-md-6">
                <input id="nom" type="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">
                
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
            
            <div class="col-md-6">
                <input id="prenom" type="prenom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" required autocomplete="prenom">
                
                @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail') }}</label>
            
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>
            
            <div class="col-md-6">
                <input id="numero" type="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" required autocomplete="numero">
                
                @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        
        <h3 class="mb-3 text-center">Réservation</h3>

        <div class="form-group row">
            <label for="datepicker" class="col-md-4 col-form-label text-md-right">{{ __('Date & Horaire de réservation') }}</label>
            
            <div class="col-md-6">
                <input id="datePicker"  name="horaire" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {{Form::label('nbDePersonnes', 'Nombre de personnes')}}
            </div>
            <div class="col-md-6">
                {{Form::number('nbDePersonnes', null, ['class' => 'form-control','step' => '1'])}}
            </div>
        </div>

        <div class="form-group text-center">
            {{Form::label('information', 'Information complémentaires :')}}
            {{Form::textarea('information', null, ['class' => 'form-control', 'style' => 'height: 6em;'])}}
        </div>
        
        
        
        
        <div class="form-group row mb-0 text-center">
            <div class="col-md-8 offset-md-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Réserver') }}
                </button>
            </div>
        </div>
    </form>
    
    <!-- ------------------------------------------------------------ -->
