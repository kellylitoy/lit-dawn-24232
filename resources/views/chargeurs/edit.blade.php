@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Chargeurs </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Modifier Chargeur') }}
                <a href="{{route('chargeurs.index')}}" class="float-right"> Retour Liste </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('chargeurs.update',$chargeur->id) }}">
                        @csrf
                        @method ('PUT') 

                        <div class="form-row">
                            <div class="form-group col-md-6">
                               <label for="nomChargeur"> {{ __('Nom du Chargeur *') }} </label>
                               <input type="text"  id="nomChargeur" class="form-control" name="nomChargeur" value="{{  old('nomChargeur',$chargeur->nomChargeur) }}">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="adresseChargeur"> {{ __('Adresse du Chargeur') }} </label>
                               <input type="text"  id="adresseChargeur" class="form-control" name="adresseChargeur" value="{{  old('adresseChargeur',$chargeur->adresseChargeur)}}">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="telephoneChargeur"> {{ __('Télephone du Chargeur') }} </label>
                               <input type="text"  id="telephoneChargeur" class="form-control" name="telephoneChargeur" value="{{ old('telephoneChargeur',$chargeur->telephoneChargeur)}}">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="mail"> {{ __('Adresse Mail') }} </label>
                               <input type="text"  id="mail" class="form-control" name="mail" value="{{old('mail',$chargeur->mail)}}"> <!--class="form-control"-->
                            </div>

                        </div>


                        <!--div class="row mb-0"-->
                            <!--div class="col-md-6 offset-md-4"-->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
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