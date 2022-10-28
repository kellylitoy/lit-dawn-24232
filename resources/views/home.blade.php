@extends('layouts.main')


@section('content')


      <div class="row">
          <div class="col-xl-4 col-md-9 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">                 
                               {{-- <td> <button class="btn btn-primary mb-2"> </button><br/><br/></td>                --}}
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Clients</div> 
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nbrClients}}</div>
                           </div>                
                      </div>
                    </div>
               </div>
           </div>
           <div class="col-xl-4 col-md-9 mb-4">
               <div class="card border-left-primary shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">                 
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total voyages</div> 
                              <div class="h5 mb-0 font-weight-bold text-gray-800">  {{$nbrVoy}}  </div>
                           </div>                 
                       </div>
                   </div>
                </div>
            </div> 
            <div class="col-xl-4 col-md-9 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">                 
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total Chargeurs</div> 
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">  {{$nbrChargeur}}  </div>
                            </div>                 
                        </div>
                    </div>
                </div>
            </div>
       </div> 
@endsection
