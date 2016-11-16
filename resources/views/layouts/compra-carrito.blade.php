@extends('layouts.app')
@section('content')


@if(session::has('Carrito'))
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<ul class="list-group">
				@foreach($productos as $producto)
				<li class="list-group-item">
                                <span class="badge">{{ $producto['qty'] }}</span>
                                <strong>{{ $producto['articulo']['title'] }}</strong>
                                <span class="label label-success">{{ $producto['precio'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('producto.reduceByOne', ['id' => $producto['articulo']['id']]) }}">Reduce by 1</a></li>
                                        <li><a href="{{ route('producto.remove', ['id' => $producto['articulo']['id']]) }}">Reduce All</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
			</ul>
		</div>
	</div>

	 <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrecio }}</strong>
            </div>
        </div>
 <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No hay articulos en el carrito</h2>
            </div>
        </div>
    @endif
@endsection
