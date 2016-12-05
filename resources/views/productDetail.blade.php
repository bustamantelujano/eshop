@extends('layouts.app')
@section('content')

    <div class="container">
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
            <input type="hidden" name="clave" value="{{$producto->clave}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form> 

    </div>


@endsection
