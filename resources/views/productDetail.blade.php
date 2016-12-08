@extends('layouts.app')
@section('content')
<br><br><br>

    
    <div class="container" >
    <div class="jumbotron" >

        <h4>{{ $producto -> descripcion }}</h2>{{ $producto -> clave }}
        <img style="width:180px; height:180px; float:left; border-radius:5%; margin-right:25px;" src="{{ $producto -> imagen }}">

        <div>
           <a href=""> {{ $producto -> ficha_comercial }}
            </a>
        </div>
        
        <form action="/carrito" method="post">
            <button class="btn btn-success" type="submit">
               Agregar a Carrito <span class= "glyphicon glyphicon-shopping-cart"></span> 
            </button>
            <input type="hidden" name="clave" value="{{$producto->clave}}" id="claveproducto">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokencsrf">


        </form> 
        <br><br><br><br><br><br>
        <div class="fb-comments" data-href="http://localhost:8000/producto/$clave" data-numposts="5"></div>
      <!--
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Agregado a tu carrito</strong> para seguir comprando presiona  <a href="/" class="alert-link">aquí</a>.
        </div>
        -->
        </div>
    </div>
    </div>


@endsection

    @yield('scripts')

<script type="text/javascript">
    function post(){
        $.post( 
            "/carrito", 
            {
                _token:$("#tokencsrf").val(),
                clave:$("#claveproducto").val()
            }, 
            function( data ) {
                if(data.validado){
                   $("#success") 
                }
            },
            "json"

        );
    }
</script>