@extends('layouts.app')
@section('content')
<br><br><br>

    
    <div class="container" >



















<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
    <head>
        

                        <input type="hidden" id="q" value=""/>
                        <input type="hidden" id="cat_id" value=""/>
                        <ul id="items" data-limit="25"></ul>
                        <div class="row" id="item-container"><!-- Nombre, Carrusel, Prechekout -->
                            <section>
                                <div id="item-detail">
                                    <button type="button" class="close pull-right" data-dismiss="item-container" aria-hidden="true">&times;</button>
                                    <h1 class="title"></h1>
                                    <div class="col-lg-8 col-md-8 col-sm-8" align="left">
                                        <div class="sp-wrap"></div>
                                        <div class="description">
                                            <h4>Descripción</h4>
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
                                                <script>
                                                    var gtmItemData = {
                                                        'name': 'Taza Negra',
                                                        'brand': 'Máquina 501',
                                                        'price': '150.00',
                                                        'id': '1120644',
                                                        'currency': 'MXN',
                                                    };
                                                </script>
                                                <button class="btn btn-primary btn-lg" data-quantity="1" id="buy_button" style="margin-top:30px;margin-bottom:10px" onclick="activitiesGTMCheckout.addProductShoppingCart(gtmItemData, this)">Lo quiero</button>
                                                <small><p class="text-center">Agregar al carrito</p></small>
                                                <div id="letrerogarantia" align="center"><span>Compra segura con</span>&nbsp;<a href="https://www.kichink.com/legales/garantia" target="_blank">Garant&iacute;a Kichink</a></div>
                                                <h3>Disponibilidad:</h3>
                                                <table width="100%">
                                                    <tr><td width="50%">Formas de pago</td><td width="50%">Tarjeta de cr&eacute;dito y efectivo</td></tr>
                                                    <tr><td width="50%">Disponibilidad</td><td width="50%" class='disponibilidad'></td></tr>
                                                    <tr style="display:none" class="sku-item"><td width="50%">SKU</td><td width="50%" class='sku'></td></tr>
                                                </table>
                                                <h4 class="unico">Art&iacute;culo &uacute;nico</h4>
                                                <h4 class="digital"><i class="fa fa-qrcode"></i> Contenido digital</h4>
                                            </div>

                                            
                                        </section>
                                    </div>
                                    <hr/>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <div class="modal fade " id="ModalBIP" tabindex="-1" role="dialog" aria-labelledby="ModalBIP" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content borde-cuadrado">
            <div class="modal-header sin-borde text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">&iexcl;BUENAS NOTICIAS!</h3>
                <h4 class="modal-subtitle">Para entregas dentro del D.F. y &aacute;rea metropolitana, esta tienda opera con</h4>
            </div>
            <div class="modal-body">
                <div id="img-header" class="col-md-12 col-sm-12 col-xs-12 text-center"></div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center contain-info">
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center item-bip">
                        <img src="https://s3.amazonaws.com/kichink-static/home/bipmodal/ico_1_bip.png" class="img-responsive center" alt="" />
                        <div class="info-bip text-center">
                            <h5 class="title-blue">REC&Iacute;BELO MA&Ntilde;ANA</h5>
                            Compra hoy y recibe ma&ntilde;ana antes de las 8pm.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center item-bip">
                        <img src="https://s3.amazonaws.com/kichink-static/home/bipmodal/ico_2_bip.png" class="img-responsive center" alt="" />
                        <div class="info-bip text-center">
                            Selecciona la opci&oacute;n de entrega y pago que mejor te convenga en el check out al momento de confirmar tu orden.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center item-bip">
                        <img src="https://s3.amazonaws.com/kichink-static/home/bipmodal/ico_3_bip.png" class="img-responsive center" alt="" />
                        <div class="info-bip text-center">
                            <h5 class="title-blue">PAGO EN PUERTA</h5>
                            Paga en la puerta de tu casa.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer sin-borde text-center">
                <div class="col-md-4 col-sm-4 hidden-xs"></div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <button type="button" class="btn btn-info center borde-cuadrado btn-bip" data-dismiss="modal">ENTERADO</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
   
        <script type='text/javascript'>
            (function(d, t) {
                var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
                bh.type = 'text/javascript';
                bh.src = '//www.bugherd.com/sidebarv2.js?apikey=dk4xj3l8mlpbreffvutrhg';
                s.parentNode.insertBefore(bh, s);
            })(document, 'script');
        </script>

        
        <script type="text/javascript">
            if (adKckCS.getCto() === 'ad_A') { // AdRoll
                adroll_custom_data = {
                    "product_id": "1120644",
                    "product_name" : "Taza Negra"
                };
            } else { // Criteo
                window.criteo_q = window.criteo_q || [];
                window.criteo_q.push(
                    { event: "setAccount", account: 30831 },
                    { event: "setEmail", email: "" },
                    { event: "setSiteType", type: "d" },
                    { event: "viewItem", item: "1120644" }
                );
            }
        </script>
        
        <script>var user_id = '';</script>
        

    </body>
</html>



























































































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