@extends('layouts.app')
@section('content')
<br><br><br>

<div class="container">
    <div class="row">
        <div class="jumbotron" style="min-height: 1100px">
        <div class="col-md-10 col-md-offset-1">
            <h2>Editar artículo</h2>
            
            <div>
                <form action="/admin/agregar" method="POST">
                    <br />
                    
                    <input type="hidden" name="_token" value="{{csrf_token() }}">

                    <div class="form-group">
                        <label >Clave</label>
                        <input type="text" class="form-control" name="clave" disabled="true" required ">
                    </div>
                    <div class="form-group">
                        <label >Código fabricante</label>
                        <input type="text" class="form-control" name="codigo_fabricante" required ">
                    </div>
                    <div class="form-group">
                        <label >descripcion</label>
                        <input type="text" class="form-control" name="descripcion" required ">
                    </div>         
                    <div class="form-group">
                        <label >Grupo</label>
                        <input type="text" class="form-control" name="grupo"  ">
                    </div>
                    <div class="form-group">
                        <label >Marca</label>
                        <input type="text" class="form-control" name="marca" required ">
                    </div>
                    <div class="form-group">
                        <label >Garantía</label>
                        <input type="text" class="form-control" name="garantia" required ">
                    </div>
                    <div class="form-group">
                        <label >Clase</label>
                        <input type="text" class="form-control" name="clase" required ">
                    </div>
                    <div class="form-group">
                        <label >Disponible</label>
                        <input type="text" class="form-control" name="disponible" required ">
                    </div>
                    <div class="form-group">
                        <label >Precio</label>
                        <input type="text" class="form-control" name="precio" required ">
                    </div>
                   <div class="form-group">
                        <label >Ficha Técnica</label>
                        <input type="text" class="form-control" name="ficha_tecnica" required ">
                    </div>
                    <div class="form-group">
                        <label >Ficha comercial</label>
                        <input type="text" class="form-control" name="ficha_comercial" required >
                    </div>
                    

                    <input type="submit" class="btn btn-primary" value="Actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <a href="{{url('/user')}}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
        <div>
        </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection


