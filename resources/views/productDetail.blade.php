@extends('layouts.app')
@section('content')
<br><br>

    
    <div class="container" >

    <div class="jumbotron" >

            <div class="row" id="item-container"><!-- Nombre, Carrusel, Prechekout -->
                            

                            <section>
            <div class="col-md-3 col-sm-12 col-lg-4">
                <img style="width:300px; height:300px; float:left; border-radius:5%; margin:15px;" src="{{ $producto -> imagen }}">

            </div>


            <div id="item-detail">
                <h1 class="title"></h1>
                <div class="col-lg-8 col-md-12 col-sm-12" align="left">
                    <div class="sp-wrap"></div>
                    <div class="description">
                        <h4>{{ $producto -> descripcion }} </h4> 
                        <h5>SKU: {{ $producto -> clave }}</h5>
                        <p class="des"><p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <section>
                        <div class="options">
                            <p class="precio" style="padding-bottom:0;padding-top:0"></p>
                            <div class="opcioncompra" style="display:none">
                                <h3>Opciones de compra:</h3><br/>
                                <div id="opc" class="btn-group" data-toggle="buttons">
                                </div>
                            </div>
                           
                            <table width="100%">
                                <tr style="display:none" class="sku-item"><td width="50%">SKU</td><td width="50%" class='sku'></td></tr>
                            </table>
                            <h4 class="unico">Art&iacute;culo &uacute;nico</h4>
                            <h4 class="digital"><i class="fa fa-qrcode"></i> Contenido digital</h4>
                        </div>

                        <h4>Disponibles: {{$producto->disponible}}</h4>

                        <form action="/carrito" method="post" style="margin: 12px">
                            
                        @if($producto->disponible == 0)
                            <button class="btn btn-danger" type="" style="font-size: 20px" disabled="true">
                                Agotado <span class= "glyphicon glyphicon-shopping-cart"></span> 
                            </button>
                        @else
                            <button class="btn btn-success" type="submit" style="font-size: 20px">
                                Agregar a Carrito <span class= "glyphicon glyphicon-shopping-cart"></span> 
                            </button>
                        @endif

                            <input type="hidden" name="clave" value="{{$producto->clave}}" id="claveproducto">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokencsrf">
                        </form> 

                            
                        </section>
                    </div>
                <hr/>
               </div>
            </section>
        </div>
















        

        <div class="col-md-12">
           {{ $producto -> ficha_tecnica }}
            
        </div>
        
                
       
        <br><br><br><br><br><br>
        <div class="fb-comments" data-href="http://cvashop.herokuapp.com" data-numposts="5" data-mobile=""></div>      <!--
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