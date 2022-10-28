@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Voyages </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Nouveau Voyage') }}
                <a href="{{route('voyages.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('voyages.store') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                               <label for="numVoy"> {{ __('Numéro Voyage') }} </label>
                               <input type="text" class="form-control" id="numVoy" name="numVoy" value="{{ old('numVoy')}}"  placeholder="Exemple 0121">
                            </div>

                              <div class="form-group col-md-6">
                               <label for="annee"> {{ __('Année') }} </label>
                               <input type="text" class="form-control" id="annee" name="annee" value="{{ old('annee')}}">
                            </div>
                            
                            <div class="form-group col-md-12">
                               <label for="nomNavire"> {{ __('Nom Navire') }} </label>
                               <input type="text" class="form-control" id="nomNavire" name="nomNavire" value="{{ old('nomNavire')}}">
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