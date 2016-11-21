@extends('layouts.app')
@section('content')

    <div class="container">
        <h4>{{ $producto -> descripcion }}</h2>{{ $producto -> clave }}
        <img src="{{ $producto -> imagen }}">




        <a href="/addToCart/{{ $producto -> clave }}" class="btn btn-success "  style="margin-right:10px ; margin-bottom: 10px;"> 
            Agregar
            <span class= "glyphicon glyphicon-shopping-cart"></span> 
        </a>

    </div>


@endsection
