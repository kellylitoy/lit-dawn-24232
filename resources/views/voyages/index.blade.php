@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des voyages </h1>
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
                   <form method="GET" action="{{route('voyages.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="voyage">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                   </form>
                </div>
             
                <div>
                  <a href="{{route('voyages.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Nouveau voyage</a>
                </div>
            </div>
        </div>

    <div class="card-body">
      <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Voyage N°</th> 
                  <th scope="col">Navire</th>
                  <th scope="col">Année Expl.</th>
                 
                  <th scope="col">Actions</th>
              </tr>
           </thead>

           <tbody>
              @foreach ($showVoyages as $showVoyage)
               <tr>
                 <th scope="row">{{$showVoyage->id}}</th>
                 <td>{{$showVoyage->numVoy}}</td> 
                 <td>{{$showVoyage->nomNavire}}</td>
                 <td>{{$showVoyage->annee}}</td>
                 <td> <div>
                       <a href="{{route('voyages.edit',$showVoyage->id)}}" class="btn btn-success"> Ouvrir dossier </a>
                       </div></td>
                 <td style="display:flex">
                    {{--  --}}
                     
                    <form action="{{url('/delete-voyage/'.$showVoyage->id)}}" method="post" >
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