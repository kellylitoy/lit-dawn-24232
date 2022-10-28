@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste Marchandises </h1>
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
                   <form method="GET" action="{{route('marchandises.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="marchandise">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                   </form>
                </div>
             
                <div>
                  <a href="{{route('marchandises.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Nouvelle Marchandise</a>
                </div>
            </div>
            <div>
                  <a href=""   class="float-rigth"> Total tonage  : {{$sommeTonage}}</a>
                  {{-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-6">Total tonage</div> --}}
            </div>
        </div>
        <div>
   
</div>

    <div class="card-body">
      <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Client</th> 
                  <th scope="col">Chargeur</th>
                  <th scope="col">Voyage</th>
                  <th scope="col">Conditionnement</th> 
                  <th scope="col">Quantité</th>
                  <th scope="col">Ton.</th>
                  <th scope="col">Cubage</th>
                  <th scope="col">Valeur</th>
                  <th scope="col">Monnaie</th>
                  <th scope="col">Reduction</th>
                 
                  <th scope="col">Actions</th>
              </tr>
           </thead>

           <tbody>
              @foreach ($showMarchandises as $showMarchandise)
               <tr>
                <th scope="row">{{$showMarchandise->id}}</th>
                 <td>{{$showMarchandise->nomClient}}</td> 
                 <td>{{$showMarchandise->nomChargeur}}</td>
                 <td>{{$showMarchandise->numVoy}}</td>
                 <td>{{$showMarchandise->cond1}}</td> <br/>
                 <td>{{$showMarchandise->qty1}}</td> <br/>
                 <td>{{$showMarchandise->poids1}}</td> 
                 <td>{{$showMarchandise->cubage1}}</td> 
                 <td>{{$showMarchandise->valeur1}}</td>
                 <td>{{$showMarchandise->monnaie1}}</td>
                 <td>{{$showMarchandise->reduction1}}</td>
                 <td> 
                    <form action="{{url('/delete-marchandise/'.$showMarchandise->id)}}" method="post" >
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