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
                <form action="{{url('/actualizar')}}/{{$user->id}}" method="POST">
                    <br />
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required value="{{$user->name}}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Actualizar">
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


