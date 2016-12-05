@extends('layouts.app')

@section('content')


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CompraEnCVA</title>
        <!-- Fonts -->
         <div class="container"> 
            <div class="row" >
                    <!--Empieza panel-->
                    @foreach($productos as $p)
                    <div class="col-md-6 col-xs-12 col-lg-4 ">

                    <div class="panel panel-default" id="linkPanel" >
                         <!--
                         <div class="panel-heading" href>   
                            <a href="">
                            @if (strlen("{{$p->ficha_comercial}}") > 37 )
                                {{substr($p->descripcion,0,37)}}...</span>
                            @else
                                {{$p->descripcion}}
                            @endif
                            </a>
                        </div>
                        -->

                        <div class="panel-body">
                            <div  style="margin: 3px">
                                @if (strlen("{{$p->imagen}}") < 20 )
                            <img href="/{{$p->clave}}" src="http://www.adwore.com/images/propiedad/sinimagendisp.png" style="width:180px; height:180px; float:left; border-radius:5%; margin-right:25px;">
                                @else
                            <a href="producto/{{$p->clave}}">
                            <img href="" src="{{$p->imagen}}" style="width:150px; height:150px; float:left; border-radius:5%; margin-right:25px;">
                            </a>
                            @endif
                            <span style="font-size: 10px ;"">
                                @if (strlen("{{$p->ficha_comercial}}") > 140 )
                                    {{substr($p->ficha_comercial,0,140)}}...</span>
                                @else
                                    {{$p->ficha_comercial}}
                                @endif
                            
                            </div>
                        </div>
                        <div class="text-right" style="font-size: 17px ; margin: 5px"><strong>Disponible: {{ $p -> disponible }} </strong></div>
                        <div class="text-right">

                            <h4></h4>

                            <span style="font-size: 20px; margin: 10px"><strong>${{$p->precio}} Pesos </strong>  </span>
                           <!--
                            
                            -->
                        </div>
                    </div>  

                </div>
                    <!--Termina panel-->
                    @endforeach

    {!! $productos->render() !!}
           
             </div> 
        </div>     
@endsection