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
                    <div class="col-md-4">

                    <div class="panel panel-default">
                        <div class="panel-heading">{{$p->clave}}</div>
                        <div class="panel-body">
                            <div  style="margin: 3px">
                            <img src="{{$p->imagen}}" style="width:150px; height:150px; float:left; border-radius:5%; margin-right:25px;">
                            <span>{{$p->descripcion}}</span>
                           
                            
                            </div>
                        </div>

                        <div class="text-right">

                            <h4></h4>
                            <span style="font-size: 20px"><strong>${{$p->precio}} {{$p->moneda}}  </strong></span>
                            <a href="#" class="btn btn-success "  style="margin-right:10px ; margin-bottom: 10px;"> 
                            Agregar
                             <span class= "glyphicon glyphicon-shopping-cart"></span> 
                            </a>
                        </div>
                    </div>  

                </div>
                    <!--Termina panel-->
                    @endforeach

    {!! $productos->render() !!}

  
                
             </div> 
        </div>     
@endsection