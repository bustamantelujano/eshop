@extends('layouts.app')
@section('content')


<table class="pg-empty-placeholder"></table>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h1>{{ $user->name }}</h1>

                <fieldset>
                    <div>
                        <h3 class="title">Datos personales</h3>
                    </div>
                    <div class="ch-form-row">
                        <label> Nombre y apellido: </label>
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="ch-form-row">
                        <label> E-mail: </label>
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="ch-form-row">
                        <label> Teléfono: </label>
                        <span id="span_phone">
                            {{ $user->telefono }}</span>
                        <span id="span_alternative_phone">
                    </div>
                    <fieldset>
                        <h3 class="title">Dirección</h3>
                        <div class="ch-form-row">
                            <label>Dirección:</label>
                            <span>{{ $user->direccion }}</span>
                        </div>
                        <div class="ch-form-row">
                            <label>Número interior: </label>
                            <span>{{ $user->numdireccionint }}</span>
                        </div>
                        <div class="ch-form-row">
                            <label> Ciudad: </label>
                            <span id="span_phone">
                            {{ $user->ciudad }}</span>
                            <span id="span_alternative_phone">
                        </div>
                        <div class="ch-form-row">
                            <label> Estado: </label>
                            <span id="span_phone">
                            {{ $user->estado }}</span>
                            <span id="span_alternative_phone"><br />
                        </div>
                    </fieldset>
                    <br />

                    <br>
                    <form action="/user" method="delete">
                        <a href="/user/editar" class="btn btn-primary">Editar mis datos</a> 
                        <input type="submit" class="btn btn-danger" value="Eliminar mi cuenta">
                     </form> 
                </fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
        <form name="dataForm" id="dataForm" method="post" action="myData/validateData" class="ch-form myForm" novalidate="novalidate">
            <input type="hidden" name="updateOrigin" id="updateOrigin" value="">
            <input type="hidden" name="updateAddressOrigin" id="updateAddressOrigin" value="">
            <input type="hidden" name="updateAddressProcess" id="updateAddressProcess" value="">
            <a href="#" id="modalSeller" style="display:none" aria-label="ch-modal-6"></a>
            <a href="#" id="modalDeleteInfo" style="display:none" aria-label="ch-modal-7"></a>
        </form>
    </div>
</div>
@endsection






