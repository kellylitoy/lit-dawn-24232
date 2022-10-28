@extends('layouts.main')


@section('content')


                   {{--  <div>
                        <div class="col-xl-6 col-md-9 mb-5">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Opérations effectuées</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">   </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    
<div class="row">
  <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
                                
        {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Dossier de {{$nomClient}} </h6>
        </div> --}}
        
        
 <div class="card-header">
             <div class="row">
                <div class="col">
                   <form method="GET" action="{{route('chargeurs.index')}}">
                       <div class="form-row align-items-center">
                         {{--  <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Chargeur">
                          </div> --}}

                          <div class="col">
                              <h6 class="m-0 font-weight-bold text-primary"> Dossier de {{$nomClient}}  </h6>
                          </div>
                       </div>
                   </form>
                </div>
             
                <div>
                   <a href="#"  class="btn btn-sm btn-primary mb-2" class="float-rigth"
                     onclick=""
                    > 
                      <i class="fas fa-print "></i>
                   </a>
                </div>
             </div>
        </div>


          <div class="card-body"> 
          <table class="table">
           <thead>
              <tr>
                  <th scope="col">Voy.</th>
                  <th scope="col">Nav.</th>
                  {{-- <th scope="col">Client</th>  
                  <th scope="col">Adr Client</th> 
                  <th scope="col">Tél Client</th>

                  <th scope="col">Adr Chargeur</th> 
                  <th scope="col">Tél Chargeur</th>--}}

                  <th scope="col">Chargeur</th>
                   <th scope="col">Cond</th> 
                  <th scope="col">Qté</th>
                  <th scope="col">Ton.</th> 
                  <th scope="col">Cubage</th>
                  <th scope="col">Valeur</th>
                  <th scope="col">Reduct.</th>
                  <th scope="col">Avis Client</th>
                  <th scope="col">Plaintes</th>
                  <th scope="col">Rep. LMC</th>
              </tr>
           </thead>

           <tbody>
             @foreach ($clientDossiers as $clientDossier)
               <tr>
                 <th scope="row">{{$clientDossier->numVoy}}</th>
                 <th scope="row">{{$clientDossier->nomNavire}}</th>
                 {{-- <td>{{$clientDossier->nomClient}}</td>  
                 <td>{{$clientDossier->adresseClient}}</td> 
                 <td>{{$clientDossier->telephoneClient}}</td>
                 <td>{{$clientDossier->adresseChargeur}}</td> 
                 <td>{{$clientDossier->telephoneChargeur}}</td> --}}
                 <td>{{$clientDossier->nomChargeur}}</td> 
                 <td>{{$clientDossier->cond1}}</td> 
                 <td>{{$clientDossier->qty1}}</td>
                 <td>{{$clientDossier->poids1}} Kg</td> 
                 <td>{{$clientDossier->cubage1}} M3</td>
                 <td>{{$clientDossier->valeur1}} {{$clientDossier->monnaie1}} </td> 
                 <td>{{$clientDossier->reduction1}} {{$clientDossier->monnaie1}} </td> 
                 <td>{{$clientDossier->avisClient}}</td>
                 <td>{{$clientDossier->plainteClient}}</td>
                 <td>{{$clientDossier->reponseLmc}}</td>
                 
                
              </tr>  
              @endforeach 
          </tbody>
      </table>
  </div>
            <div class="chart-area">
               <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
 </div>


@endsection

 {{-- @section("javascript")
  <script>
     function print (el) {
         const page = document.body.innerHTML;
         const content = document.getElementById(el).innerHTML;
         document.body.innerHTML = content;
         window.print();
         document.body.innerHTML = page;

     }
  </script>
@endsection  --}}