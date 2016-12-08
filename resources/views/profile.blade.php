@extends('layouts.app')
@section('content')
<br><br><br>


<table class="pg-empty-placeholder"></table>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#producto" data-toggle="tab" aria-expanded="true">Detalle</a></li>
      <li class=""><a href="#compras" data-toggle="tab" aria-expanded="false">Mis Compras</a></li>
      
    </ul>
<div class="jumbotron" style="min-height:600px">

<div id="myTabContent" class="tab-content" >
  <div class="tab-pane fade active in" id="perfil">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{url('/uploads/avatars')}}/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
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
                    
                     <form action="/user/delete" method="POST">
                                             <a href="/user/editar" class="btn btn-primary">Editar mis datos</a> 

                        <input type="submit" class="btn btn-danger" value="Eliminar mi cuenta">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                     </form> 
                     <br>                    <br>
                    <br>
                    <br>
                    <br>

                </fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
  </div>
  <div class="tab-pane fade" id="compras">
            <div class="col-md-10" style="align-content: center;">
                    <h2>Mis compras</h2>
                </div>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>ID de transacción</th>
              <th style="text-align: center;">Número de artículos</th>
              <th>Total</th>
              <th style="text-align: center;">Fecha</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @if($venta != null)
            @foreach($venta as $v)
            <tr>
                <td>{{$v->idrecibo}}</td>
                <td style="text-align: center;" center;">{{$v->numitems}}</td>
                <td>${{$v->total}}</td>
                <td style="text-align: center;"">{{$v->fecha}}</td>
                  
                <td style="text-align: center;">
                    <a href="{{url('/compra')}}/{{$v->idrecibo}}">
                        <button  class="btn btn-primary"> Detalle de compra <span class="glyphicon glyphicon-th-list "></span></button>
                    </a>
                </td>
              
            </tr>
            @endforeach
            @endif

          </tbody>
        </table> 
  </div>
  
</div>
</div>
    <div class="row">
        

        <div class="col-md-10">
        <br><br>
        </div>

        

        <form name="dataForm" id="dataForm" method="post" action="myData/validateData" class="ch-form myForm" novalidate="novalidate">
            <input type="hidden" name="updateOrigin" id="updateOrigin" value="">
            <input type="hidden" name="updateAddressOrigin" id="updateAddressOrigin" value="">
            <input type="hidden" name="updateAddressProcess" id="updateAddressProcess" value="">
            <a href="#" id="modalSeller" style="display:none" aria-label="ch-modal-6"></a>
            <a href="#" id="modalDeleteInfo" style="display:none" aria-label="ch-modal-7"></a>
        </form>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


</div>
@endsection






