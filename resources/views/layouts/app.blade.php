<!DOCTYPE html>
<html lang="en" >
<title> CVAshop </title>
<head>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href='img/logoeshop.png' rel='shortcut icon' type='img/png' > 
    <meta charset="UTF-8">
    <script src="{{ asset("js/jquery.js") }}"></script>
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'CompraEnCVA') }}</title>

    <!-- Styles -->

    <!-- Scripts -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8&appId=536720366533941";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<!--// css -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->


<script src="{{url('/')}}/js/jquery-1.11.1.min.js"></script>
<script src="{{url('/')}}/js/bootstrap.js"></script>
</head>
<body >


        @if (!Auth::guest())
            @if (Auth::user()->activado == false)
            <br><br><br><br>
        <div class="container">
            <div class="alert alert-dismissible alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Confirma tu correo</h4>
              <p>Te enviamos un correo a <strong>{{Auth::user()->email}}</strong>, activa tu cuenta para seguir comprando, si no te llegó, presiona <a href="google.com"><strong>aquí</strong></a> para enviarlo otra vez.</p>
            </div>
        </div>
            @endif
        @endif
  

    <style type="text/css">
      
      body{
        padding:10px;
      }

      .show-on-hover:hover > ul.dropdown-menu {
        display: block;    
      }

    </style>


    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       CVAshop
                    </a>
                </div>
       
                    <ul class="nav navbar-nav">
                    <li class="dropdown btn-group show-on-hover" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Categorias <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="navigation">
                        <li><a href="{{url('/categorias')}}/accesorios">Accesorios</a></li>
                        <li><a href="{{url('/categorias')}}/audifonosmicro">Audífonos Y Micro</a></li>
                        <li><a href="{{url('/categorias')}}/backpack">Back Pack(Mochila)</a></li>
                        <li><a href="{{url('/categorias')}}/bocinas">Bocinas</a></li>
                        <li><a href="{{url('/categorias')}}/camaras">Camaras</a></li>
                        <li><a href="{{url('/categorias')}}/consumibles">Consumibles</a></li>
                        <li><a href="{{url('/categorias')}}/discosduros">Discos Duros</a></li>
                        <li><a href="{{url('/categorias')}}/energia">Energia</a></li>
                        <li><a href="{{url('/categorias')}}/equiposaudio">Equipos de Audio</a></li>
                        <li><a href="{{url('/categorias')}}/impresoras">Impresoras</a></li>
                        <li><a href="{{url('/categorias')}}/memorias">Memorias</a></li>
                        <li><a href="{{url('/categorias')}}/monitores">Monitores</a></li>
                        <li><a href="{{url('/categorias')}}/multifuncionales">Multifuncionales</a></li>
                        <li><a href="{{url('/categorias')}}/portatiles">Portatiles</a></li>
                        <li><a href="{{url('/categorias')}}/procesadores">Procesadores</a></li>
                        <li><a href="{{url('/categorias')}}/productoslimpieza">Productos de Limpieza</a></li>
                        <li><a href="{{url('/categorias')}}/rack">Rack</a></li>
                        <li><a href="{{url('/categorias')}}/software">Software</a></li>
                        <li><a href="{{url('/categorias')}}/tabletas">Tabletas</a></li>
                        <li><a href="{{url('/categorias')}}/tarjetamadre">Tarjeta Madre</a></li>
                        <li><a href="{{url('/categorias')}}/tecladomouse">Teclado Y Mouse</a></li>

                      </ul>
                    </li>
                  </ul>

                  

                 




                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="nav navbar-nav navbar-right">
                    <li>
                        
                        @if (!Auth::guest() && Auth::user()->isAdmin() )
                        <a href="{{ url('/admin/dashboard') }}">Panel de administrador <i class="glyphicon glyphicon-dashboard"></i></a>
                        @endif
                    </li>
                    <li>


                        @if (!Auth::guest())

                            <a href="{{ url('/carrito') }}">Carrito
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                @if( Auth::user()->numitemssinpagar() != null)
                                    <span class="badge">
                                        <strong>{{Auth::user()->numitemssinpagar()}}</strong>
                                    </span>
                                @endif
                             </a>   
                    
                        @endif
                    </li>

                    <ul class="nav navbar-nav navbar-right " >

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
                            <li><a href="{{ url('/register') }}">Regístrate</a></li>
                        @else
                            <li class="dropdown  btn-group show-on-hover">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img src="{{ url('/uploads/avatars') }}/{{ Auth::user()->avatar }}" style="  width:32px; height:32px; position:absolute; top:15px; left:10px; border-radius:50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                            
                                    <li>
                                     <a href="{{ url('/user') }}"><i class="glyphicon glyphicon-user"></i> Mi perfil</a>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-off"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                   
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if (Auth::guest())
              <br><br>  
        @endif
             
         @yield('content')
        <br>
    </div>

    <!-- Scripts -->
    @yield('scripts')

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '0dbfKbE2tL';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->


</body>
<footer>
        <hr>
        <div class="text-center">Ingeniería Web &copy; 2016</div>
    </footer></html>
