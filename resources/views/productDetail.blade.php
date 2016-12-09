@extends('layouts.app')
@section('content')
<br><br><br>

    
    <div class="container" >
     <ul class="nav nav-tabs">
      <li class="active"><a href="#producto" data-toggle="tab" aria-expanded="true">Detalle del producto</a></li>
      <li class=""><a href="/comentarios" data-toggle="tab" aria-expanded="false">comentarios</a></li>
      
    </ul>
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
        
        <div class="modal-footer">
                            <a href="{{url('/')}}">
                                <button  type="button" class="btn btn-danger" data-dismiss="modal">Seguir comprando</button>
                            </a>
                        </div>

        <br><br><br><br><br><br>
        <div class="fb-comments" data-href="http://cvashop.herokuapp.com/producto" data-numposts="5" data-mobile=""></div>      <!--
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Agregado a tu carrito</strong> para seguir comprando presiona  <a href="/" class="alert-link">aquí</a>.
        </div>
        -->
        
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