@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Marchandises </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Nouvelle Marchandise') }}
                <a href="{{route('marchandises.index')}}" class="float-right"> Voir Liste </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('marchandises.store') }}">
                        @csrf

                        <div class="col-xl-16 form-row">
                            <div class="form-group col-md-4">
                               <label for="nomClient"> {{ __('Client') }} </label>
                               
                                <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror" 
                                 value="{{ old('client_id') }}" required autocomplete="client_id" autofocus>
                                    
                                     <option value="">--Selectionner Client--</option>
                                      @foreach ($client as $row1 )
                                           <option value="{{$row1->id}}"> {{$row1->nomClient}}</option>
                                      @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                               <label for="adresseClient"> {{ __('Chargeur') }} </label>
                              
                               <select name="chargeur_id" id="chargeur_id" class="form-control @error('chargeur_id') is-invalid @enderror" 
                                 value="{{ old('chargeur_id') }}" required autocomplete="chargeur_id" autofocus>
                                    
                                     <option value="">--Selectionner Client--</option>
                                      @foreach ($chargeur as $row1 )
                                           <option value="{{$row1->id}}"> {{$row1->nomChargeur}}</option>
                                      @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group col-md-4">
                               <label for="telephoneClient"> {{ __('Voyage') }} </label>
                               <select name="voyage_id" id="voyage_id" class="form-control @error('voyage_id') is-invalid @enderror" 
                                         value="{{ old('voyage_id') }}" required autocomplete="voyage_id" autofocus>

                                    <option  value= "1" >0122</option>
                                    <option value= "2">0222</option>
                                    <option value= "3">0322</option>
                                    <option value= "4">0422</option> 
                                    <option value= "5">0522</option>
                                    <option value= "6">0422</option> 
                                    <option value= "7">0522</option>
                                    <option value= "8">0522</option>        
                                 </select>
                            </div> --}}
                            <div class="form-group col-md-4">
                               <label for="adresseClient"> {{ __('Voyage N°') }} </label>
                              
                               <select name="voyage_id" id="id" class="form-control  @error('voyage_id') is-invalid @enderror" 
                                 value="{{ old('voyage_id') }}" required autocomplete="voyage_id" autofocus>
                                    
                                     <option value="">--Selectionner voyage--</option>
                                      @foreach ($voyage as $row1 )
                                           <option value="{{$row1->id}}"> {{$row1->numVoy}}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Groupe1-->
                        <hr class="sidebar-divider">
                        <div class="col-xl-16 form-row">
                            <div class="form-group col-md-3">
                               <label for="cond1"> {{ __('Conditionnement') }} </label>
                               <select name="cond1" id="cond1" class="form-control @error('cond1') is-invalid @enderror" 
                                         value="{{ old('cond1') }}" required autocomplete="cond1" autofocus>
                                   
                                    <option value="">-Conditionnement-</option>
                                    <option value= "CTNR 40'">CTNR 40'</option>
                                    <option value= "CTNR 20'">CTNR 20'</option>
                                    <option value= "VEHICULES NEUFS">VEH. NEUFS</option>
                                    <option value= "VEHICULES USAGES">VEH. USAGES</option> 
                                    <option value= "AUTRES">AUTRES</option>    
                                 </select>
                            </div>

                            <div class="form-group col-md-3">
                               <label for="qty1"> {{ __('Quantité') }} </label>
                               <input type="text" class="form-control" id="qty1" name="qty1" value="{{ old('qty1')}}">
                            </div>

                             <div class="form-group col-md-3">
                               <label for="poids1"> {{ __('Tonnage') }} </label>
                               <input type="text" class="form-control" id="poids1" name="poids1" value="{{ old('poids1')}}">
                             </div>

                             <div class="form-group col-md-3">
                               <label for="cubage1"> {{ __('Cubage') }} </label>
                               <input type="text" class="form-control" id="cubage1" name="cubage1" value="{{ old('cubage1')}}">
                            </div>
                        </div>

                         
                        <hr class="sidebar-divider">
                        
                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                               <label for="valeur1"> {{ __('Valeur') }} </label>
                               <input type="text" class="form-control" id="valeur1" name="valeur1" value="{{ old('valeur1')}}">
                            </div>

                            <div class="form-group col-md-2">
                               <label for="qty2"> {{ __(' Monnaie ') }} </label>
                               <select name="monnaie1" id="monnaie1" class="form-control @error('monnaie1') is-invalid @enderror" 
                                         value="{{ old('monnaie1') }}" required autocomplete="monnaie1" autofocus>
                                   
                                    <option value= "CDF">CDF</option>
                                    <option value= "Euro">£uro</option>
                                    <option value= "Dollars">Dollard</option> 
                                 </select>
                            </div>

                            <div class="form-group col-md-4">
                               <label for="reduction1"> {{ __('Reduction (Facultatif)') }} </label>
                               <input type="text" class="form-control" id="reduction1" name="reduction1" value="{{ old('reduction1')}}">
                            </div>

                            <div class="form-group col-md-2">
                               <label for="qty2"> {{ __(' Monnaie ') }} </label>
                               <select name="monnaie1" id="monnaie1" class="form-control @error('monnaie1') is-invalid @enderror" 
                                         value="{{ old('monnaie1') }}" required autocomplete="monnaie1" autofocus>
                                   
                                    <option value= "CDF">CDF</option>
                                    <option value= "£">£uro</option>
                                    <option value= "$">Dollars</option>
                                 </select>
                            </div>
                        </div>
                        <hr class="sidebar-divider">

                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Avis du client</span>
                              </div>
                              <textarea class="form-control" aria-label="avisClient" name="avisClient" ></textarea>
                            </div>
                            <br/>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Plaintes du client</span>
                              </div>
                              <textarea class="form-control" aria-label="plainteClient" name="plainteClient"></textarea>
                            </div> 
                            <br/>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Reponse de l'entreprise</span>
                              </div>
                              <textarea class="form-control" aria-label="reponseLmc" name="reponseLmc"></textarea>
                            </div> 
                        

                        <hr class="sidebar-divider">


                          {{--  
                             <div class="form-group col-md-3">
                               <label for="poids3"> {{ __('Poids') }} </label>
                               <input type="text" class="form-control" id="poids3" name="poids3" value="{{ old('poids3')}}">
                             </div>

                             <div class="form-group col-md-3">
                               <label for="valeur3"> {{ __('Valeur') }} </label>
                               <input type="text" class="form-control" id="valeur3" name="valeur3" value="{{ old('valeur3')}}">
                            </div>
                       --}}

                        <!-- Groupe4-->
                        {{--  <hr class="sidebar-divider">
                        <div>Marchandises 4</div><br/>

                         <div class="form-row">
                            <div class="form-group col-md-3">
                               <label for="cond4"> {{ __('Conditionnement') }} </label>
                               <select name="cond4" id="cond4" class="form-control @error('cond4') is-invalid @enderror" 
                                         value="{{ old('cond4') }}" required autocomplete="cond4" autofocus>
                                   
                                    <option value="">-Conditionnement-</option>
                                    <option value= "CTNR 40'">CTNR 40'</option>
                                    <option value= "CTNR 20'">CTNR 20'</option>
                                    <option value= "VEHICULES NEUFS">VEHICULES NEUFS</option>
                                    <option value= "VEHICULES USAGES">VEHICULES USAGES</option> 
                                    <option value= "AUTRES">AUTRES</option>    
                                 </select>
                            </div>

                            <div class="form-group col-md-3">
                               <label for="qty4"> {{ __('Quantité') }} </label>
                               <input type="text" class="form-control" id="qty4" name="qty4" value="{{ old('qty4')}}">
                            </div>

                             <div class="form-group col-md-3">
                               <label for="poids4"> {{ __('Poids') }} </label>
                                <input type="text" class="form-control" id="poids4" name="poids4" value="{{ old('poids4')}}">
                             </div>

                             <div class="form-group col-md-3">
                               <label for="valeur4"> {{ __('Valeur') }} </label>
                               <input type="text" class="form-control" id="valeur4" name="valeur4" value="{{ old('valeur4')}}">
                            </div>
                         </div> --}}

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