@extends('layouts.app')
@section('content')


@if(session::has('Carrito'))
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin: 20px">
			<ul class="list-group">
				@foreach($productos as $p)
				<li class="list-group-item">
                                <span class="badge">{{ $p['cantidad'] }}</span>
                                <strong>{{ $p['articulo']['clave'] }}</strong>
                                <span class="label label-success">{{ $p['precio'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action 
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('producto.reduceByOne', ['id' => $p['articulo']['id']]) }}">Quitar uno</a></li>
                                        <li><a href="{{ route('producto.remove', ['id' => $p['articulo']['id']]) }}">Quitar todos</a></li>
                                    </ul>
                                </div>
                            </li>
             @endforeach
			</ul>
		</div>
	</div>

	 <div class="row" style="margin: 20px">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="font-size: 40px; margin: 40px">
                <strong>Total: {{ $totalPrecio }}</strong>
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
