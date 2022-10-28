@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Confirmation') }}
                <a href="{{route('voyages.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('voyages.update',$voyage->id) }}">  
                        @csrf
                        @method ('PUT') 
                        <div class="form-row">
                            <div class="form-group col-md-2">
                               <label for="id"> {{ __('Code voyage') }} </label>
                               <input type="text" class="form-control" id="id" name="id" value="{{ old('id',$voyage->id) }}">
                            </div>
                            <div class="form-group col-md-6">
                               <label for="nomClient"> {{ __('Nom du Client') }} </label>
                               <input type="text" class="form-control" id="numVoy" name="numVoy" value="{{ old('numVoy',$voyage->numVoy) }}">
                            </div>
                        </div>


                        <!--div class="row mb-0"-->
                            <!--div class="col-md-6 offset-md-4"-->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmer') }}
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