@extends('layouts.app')
@section('content')
<table class="pg-empty-placeholder"></table>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Perfil</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <fieldset>
                    <div>
                        <label>Actualiza la imagen de perfil</label>
                        <input type="file" name="avatar">
                    </div>
                    <input type="submit" class="pull-left btn btn-sm btn-primary">
                    <div class="ch-form-row">
                        <label> Nombre y apellido: </label>
                        <div>
                            <h3 class="title">Datos personales</h3>
                        </div>
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="ch-form-row">
                        <label> E-mail: </label>
                        <span>{{ $user->email }}</span>
                        <a class="smalla" href="https://myaccount.mercadolibre.com.mx/profile/changeEmail">Modificar</a>
                    </div>
                    <div class="ch-form-row">
                        <label> Teléfono: </label>
                        <span id="span_phone">
                            {{ $user->telefono }}</span>
                        <span id="span_alternative_phone">
                    </div>
                    <fieldset>
                        <h3 class="title">Direeción</h3>
                        <div class="ch-form-row">
                            <label> Colonia y calle:</label>
                            <span>{{ $user->direccion }}</span>
                        </div>
                        <div class="ch-form-row">
                            <label>Número de domicilio: </label>
                            <span>{{ $user->numdireccion }}</span>
                        </div>
                        <div class="ch-form-row">
                            <label>Número interior de domicilio: </label>
                            <span>{{ $user->numintdireccion }}</span>
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
                            {{ $user->Estado }}</span>
                            <span id="span_alternative_phone">
                        </div>
                    </fieldset>
                </fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
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


