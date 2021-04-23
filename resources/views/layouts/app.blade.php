<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Generador de Palabras</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
 <link href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3a6c2f3b7.js" crossorigin="anonymous"></script>

    <style>
        .footer{
            background-color:rgb(51, 170, 255);
            opacity:0.9;
            filter:alpha(opacity=60); /* IE < 9.0 */
            width: 100%;
            height: 30px;;
            bottom: 0;
            position: fixed;
            text-align: center;
            color:#000;
        }
    </style>

</head>
<body>

        <nav class="navbar navbar-dark bg-primary  navbar-expand-md   shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Generador de Palabras
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown bg-primary">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="footer footer-sm-md-lg-xl">
        <p class=" text-white">
            <strong class="text-white">Prueba Tecnica Desarrollador Web - Jhon Eduard Triana Vargas © Copyright <?php echo date("Y");?> </strong>
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    



    <script>
        $(document).ready(function() {
            $('#EmpleadosTable').DataTable( {
              "language": {
              "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
              "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
              "infoEmpty":			"Mostrando 0 registros de un total de 0.",
              "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
              "infoPostFix":			"(actualizados)",
              "lengthMenu":			"Mostrar _MENU_ registros",
              "loadingRecords":		"Cargando...",
              "processing":			"Procesando...",
              "search":			"<span style='font-size:15px;'>Buscar:</span>",
              "searchPlaceholder":		"Dato para buscar",
              "zeroRecords":			"No se han encontrado coincidencias.",
              "paginate": {
                "first":			"Primera",
                "last":				"Última",
                "next":				"Siguiente",
                "previous":			"Anterior"
              },
              "aria": {
                "sortAscending":	"Ordenación ascendente",
                "sortDescending":	"Ordenación descendente"
              }
            },
        
            "lengthMenu":		[[5,10, 15], [5,10,15]],
            "iDisplayLength":	2,
        
            } );
        
        } );
        
        </script>
    
    <script  src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>

    <script  src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
        <script src="js/popper.min.js "> </script>
        <script  src="js/bootstrap.min.js "> </script>

</body>
</html>
