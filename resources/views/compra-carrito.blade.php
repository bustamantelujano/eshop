@extends('layouts.app')
@section('content')


@if( $itemscarrito != null )
<br><br><br>


    <form>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <div class="row">
        <div class="col-sm-10 col-md-10 col-md-offset-10 col-sm-offset-10" style="margin: 20px">
            <ul class="list-group">
                @foreach($itemscarrito as $c)
                <li class="list-group-item">
                                <a href="/producto/{{$c->clave}}" class="text-left col-md-2" >
                                    <img src="{{$c->imagen}}" style="width:100px; height:100px;  border-radius:5%; margin:5px; ">
                                </a>               

                                <span class="badge" style="font-size: 14px"> 
                                    @if ( $c -> cantidad > 1 )
                                         {{ $c -> cantidad }} piezas ( ${{ $c-> precio }} por pieza ) 
                                    @else
                                        1 pieza
                                    @endif

                                </span>
                                <div class=" col-md-10">
                                   <div>                
                                        <strong>
                                            <a  href="/producto/{{$c->clave}}" style="font-size: 21px">{{ $c->descripcion }}</a>
                                        </strong>
                                        
                                        <div class="text-right" >
                                            <span class="text-right" style=" font-size: 20px; margin-bottom: 20px"><strong>${{ $c-> precio * $c->cantidad }} </strong></span>

                                        </div>
                            
                                    </div>  
                                    <br>
                                    <p>{{ $c -> ficha_comercial}} </p>
                                </div>
                                
                                   

                                <div class="text-right">

                                    <form action="/carrito/delete" method="POST">
                                        <input type="submit" class="btn btn-danger" value="Quitar">
                                        <input type="hidden" name="clave" value="{{$c->codigoitem}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    </form> 

                                </div>

                </li>
             @endforeach
            </ul>
        </div>
    </div>

     <div class="row" style="margin: 20px">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="font-size: 35px; margin: 40px">
               <div>
                    @if ($total == 0  )
                    No hay artículos en el carrito
                    @else
                    <strong>Total: ${{$total}} Pesos</strong>
                    <a href="/checkout" type="button" style="font-size: 26px" class="btn btn-success">Pasar a pagar 💵</a>

                    @endif
                    </div>
            </div>
        </div>
 <hr>
    
       <div class="row">
            
        </div>
    
    @else
    @endif
@endsection
