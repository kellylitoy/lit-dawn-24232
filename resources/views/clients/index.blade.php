@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des clients </h1>
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
                <div class="col">
                   <form method="GET" action="{{route('clients.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Client">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                   </form>
                </div>
             
                <div>
                  <a href="{{route('clients.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Nouveau Client</a>
                </div>
           </div>
        </div>

          <div class="card-header">
             <div class="row">
                  {{-- <div class="col"> --}}
                   
                      <div class="col-xl-4 col-md-4 mb-4">
                         <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                               <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">                 
                                       {{-- <td> <button class="btn btn-primary mb-2"> </button><br/><br/></td>                --}}
                                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Clients</div> 
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$nbrClients}} </div>
                                  </div>             
                                </div>
                            </div>
                         </div>
                      </div>
                   
                  {{-- </div>            --}}
              </div>
          </div>

    <div class="card-body">
      <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Nom</th> 
                  <th scope="col">Adresse</th>
                  <th scope="col">Télephone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Actions</th>
              </tr>
           </thead>

           <tbody>
              @foreach ($showClients as $showClient)
               <tr>
                 <th scope="row">{{$showClient->id}}</th>
                 <td>{{$showClient->nomClient}}</td> 
                 <td>{{$showClient->adresseClient}}</td>
                 <td>{{$showClient->telephoneClient}}</td>
                 <td>{{$showClient->mail}}</td>
                 <td> <div>
                         <a href="{{route('clients.edit',$showClient->id)}}" class="btn btn-success"> Ouvrir dossier </a>
                       </div>
                </td>
                 {{-- <td style="display:flex"> --}}
                 <td> 
                   <form action="{{url('/delete-client/'.$showClient->id)}}" method="post" >
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                       <button  class="btn btn-danger" type="submit"> Suppimer </button>     
                    </form>
                 </td>
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
@endsection