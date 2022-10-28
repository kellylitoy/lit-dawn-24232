

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clientèle</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
    {{-- <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"> </script> --}}
    <script type="text/javascript" src="js/jquery.printPage.js"></script>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
           crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

          <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <i class="bi bi-bandaid-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-2">GESTION CLIENTELE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- tableau de bord -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Client -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('clients.index')}}" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Repertoire Clients</span>
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('chargeurs.index')}}" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Repertoire Chargeurs</span>
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('voyages.index')}}" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Voyages</span>
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('marchandises.index')}}" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Marchandises</span>
                </a>
             </li>

            {{-- <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Gestion des utilisateurs
            </div> 

             <li class="nav-item">
                <a class="nav-link " href="{{route('users.index')}}" >
                    <i class="fas fa-fw fa-table"></i>
                    <span>Utilisateurs</span>
                </a>
            </li> --}}

           {{--  <li class="nav-item">
                <a class="nav-link collapsed" href="" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Roles</span>
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" >
                     <i class="fas fa-fw fa-table"></i>
                    <span>Permissions</span>
                </a>
             </li> --}}
        </ul>

         <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                     <ul class="navbar-nav ml-auto">

                         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                      
                     </ul>

                </nav>
                <div class="container-fluid">

           <div class="container-fluid">
               @yield('content')
           </div>              
    </div>
                               
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LMC.2022.INFO</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

         </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    
     {{-- @yield('javascript')  --}}


</body>

</html>