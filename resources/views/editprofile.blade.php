@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Actualiza la imagen de perfil</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-left btn btn-sm btn-primary" value="Subir imagen">
            </form>
            <div>
                <form action="/editprofile" method="POST">
                    <br />
                    <br />
                    <br />
                    <input type="hidden" name="_token" value="{{csrf_token() }}">

                    <h3>Mis datos</h3>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" required value="{{$user->telefono}}">
                    </div>
                    
                    <br><br>
                    <h3>Dirección</h3>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required value="{{$user->direccion}}">
                    </div>
                    <div class="form-group">
                        <label for="">Número interior (no obligatorio)</label>
                        <input type="text" class="form-control" name="numintdireccion"  value="{{$user->numintdireccion}}">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" required value="{{$user->ciudad}}">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" required value="{{$user->estado}}">
                    </div>
                    

                    <input type="submit" class="btn btn-primary" value="Actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <a href="{{url('/profile')}}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
        <div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection


