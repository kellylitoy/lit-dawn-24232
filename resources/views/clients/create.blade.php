@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Clients </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Nouveau Client') }}
                    <a href="{{route('clients.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                               <label for="nomClient"> {{ __('Nom du Client *') }} </label>
                               <input type="text" class="form-control" id="nomClient" name="nomClient" value="{{ old('nomClient') }}">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="adresseClient"> {{ __('Adresse du Client') }} </label>
                               <input type="text" class="form-control" id="adresseClient" name="adresseClient" value="{{ old('adresseClient')}}">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="telephoneClient"> {{ __('Télephone du client') }} </label>
                               <input type="text" class="form-control" id="telephoneClient" name="telephoneClient" value="{{ old('telephoneClient')}}">
                            </div>

                             <div class="form-group col-md-6">
                               <label for="mail"> {{ __('Adresse Mail') }} </label>
                               <input type="text" class="form-control" id="mail" name="mail" value="{{ old('mail')}}">
                            </div>
                        </div>


                        <!--div class="row mb-0"-->
                            <!--div class="col-md-6 offset-md-4"-->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sauvegarder') }}
                                </button>
                            <!--/div-->
                        <!--/div-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection