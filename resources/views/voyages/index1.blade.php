@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Dossier Voyage {{$numVoy}} </h1>
    </div>
    
<div class="row">
     <div class="card mx-auto">

                <div> 
                   @if (session()->has('message'))
                      <div class="alert alert-success">
                         {{session('message')}}
                     </div>
                   @endif
                </div>

             <div class="card-header">
               <div class="row">
                 <div class="card border-left-primary shadow h-100 py-2">
                   <div class="card-body">
                     <div class="row no-gutters align-items-center">
                       <div class="col mr-2">                 
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total tonage</div> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">   {{$sumTonage}} Kg  </div>
                       </div>                 
                     </div>
                   </div>
                 </div>
                 
                 <div class="card border-left-primary shadow h-100 py-2" >  
                   <div class="card-body">
                     <div class="row no-gutters align-items-center">
                       <div class="col mr-2">                 
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total Valeur</div> 
                         <div class="h5 mb-0 font-weight-bold text-gray-800">   {{$sumValeur}} £uro  </div>
                       </div>                 
                     </div>
                   </div>
                 </div>
               </div>
             </div>

    <div class="card-body">
      <table class="table">
           <thead>
              <tr>
                   
                  <th scope="col">Nav.</th>
                  <th scope="col">Client</th>
                  <th scope="col">Chargeur</th>
                   <th scope="col">Cond</th> 
                  <th scope="col">Qty</th>
                  <th scope="col">Tonage</th> 
                  <th scope="col">Cubage</th>
                  <th scope="col">Valeur</th>
                  <th scope="col">Reduct.</th>
                  <th scope="col">Avis Client</th>
                  <th scope="col">Plaintes</th>
                  <th scope="col">Rep. LMC</th>
              </tr>
           </thead>

           <tbody>
             @foreach ($voyageDossiers as $voyageDossier)
               <tr>
                 
                 <th scope="row">{{$voyageDossier->nomNavire}}</th>
                 <td>{{$voyageDossier->nomClient}}</td>  
                 <td>{{$voyageDossier->nomChargeur}}</td> 
                 <td>{{$voyageDossier->cond1}}</td> 
                 <td>{{$voyageDossier->qty1}}</td>
                 <td>{{$voyageDossier->poids1}}Kg </td> 
                 <td>{{$voyageDossier->cubage1}}M3 </td>
                 <td>{{$voyageDossier->valeur1}}  {{$voyageDossier->monnaie1}} </td> 
                 <td>{{$voyageDossier->reduction1}}  {{$voyageDossier->monnaie1}} </td> 
                 <td>{{$voyageDossier->avisClient}}</td>
                 <td>{{$voyageDossier->plainteClient}}</td>
                 <td>{{$voyageDossier->reponseLmc}}</td>

              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
@endsection