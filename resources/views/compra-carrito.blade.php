@extends('layouts.app')
@section('content')


@if( $carritos != null )


    <form>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
	<div class="row">
		<div class="col-sm-10 col-md-10 col-md-offset-10 col-sm-offset-10" style="margin: 20px">
			<ul class="list-group">
				@foreach($carritos as $c)
				<li class="list-group-item">
                                <a href="/detalle/{{$c->clave}}" class="text-left col-md-2" >
                                    <img src="{{$c->imagen}}" style="width:100px; height:100px;  border-radius:5%; margin:5px; ">
                                </a>               

                                <span class="badge">{{ $c -> clave}}</span>
                                <div class=" col-md-10"> 
                                   <div>                
                                        <strong>
                                            <a  href="/detalle/{{$c->clave}}">{{ $c->descripcion }}</a>
                                        </strong>
                                        
                                        <div class="text-right" >
                                            <span class="text-right" style=" font-size: 20px; margin-bottom: 20px"><strong>${{ $c-> precio }}</strong></span>
                                        </div>  
                                    </div>  
                                    <br>
                                    <p>{{ $c -> ficha_comercial}}</p>
                                </div>


                                <div class="text-right">
                                    <a href="" class="btn btn-danger">Quitar</a>
                                </div>

                </li>
             @endforeach
			</ul>
		</div>
	</div>

	 <div class="row" style="margin: 20px">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="font-size: 35px; margin: 40px">
                <strong>Total: {{$total}} Pesos</strong>
            </div>
        </div>
 <hr>
        <!--
       <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Pagar</a>
            </div>
        </div>
        -->
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No hay articulos en el carrito</h2>
            </div>
        </div>
    @endif
@endsection
