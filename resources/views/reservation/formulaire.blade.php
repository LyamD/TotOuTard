

<h1 class="m-b-md">
    Faire une reservation
</h1>


    <h3>Contact</h3>
    
    <form method="POST" action="{{ route('reservation.store') }}">
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
        
        
        <h3>reservation</h3>

        <div class="form-group row">
            <label for="datepicker" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>
            
            <div class="col-md-6">
                <input id="datePicker" name="dat" class="form-control" type="datetime">
            </div>
        </div>
        
        
        
        
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Se connecter') }}
                </button>
            </div>
        </div>
    </form>
    
    <!-- ------------------------------------------------------------ -->
