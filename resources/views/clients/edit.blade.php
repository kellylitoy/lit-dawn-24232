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
                {{ __('Voulez-vous voir le dossier complet de ce client ?') }}
                <a href="{{route('clients.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.update',$client->id) }}">  
                        @csrf
                        @method ('PUT') 
                        

                    {{-- disabled --}}
                    <fieldset  >
                     <div class="form-row">
                          <div class="form-group col-md-6">
                            <label  for="nomClient">
                              {{ __('Client') }} <input type="text" class="form-control" id="nomClient" name="nomClient" value="{{ old('nomClient',$client->nomClient)}}" /> 
                           </label>
                        </div>
                        <div class="form-group col-md-1" >
                           <label for="id">
                              {{ __('Code ' ) }} <input type="text" class="form-control" id="id" name="id" value="{{ old('id',$client->id)}}"/>
                           </label>
                        </div>
                    </div>
                    </fieldset>



                        <!--div class="row mb-0"-->
                            <!--div class="col-md-6 offset-md-4"-->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('OUI') }}
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