@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des Chargeurs </h1>
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
                   <form method="GET" action="{{route('chargeurs.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Chargeur">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                   </form>
                </div>
             
                <div>
                   <a href="{{route('chargeurs.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Nouveau Chargeur</a>
                </div>
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
              @foreach ($showChargeurs as $showChargeur)
               <tr>
                 <th scope="row">{{$showChargeur->id}}</th>
                 <td>{{$showChargeur->nomChargeur}}</td> 
                 <td>{{$showChargeur->adresseChargeur}}</td>
                 <td>{{$showChargeur->telephoneChargeur}}</td>
                 <td>{{$showChargeur->mail}}</td>
                 <td> 
                   <form action="{{url('/delete-chargeur/'.$showChargeur->id)}}" method="post" >
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