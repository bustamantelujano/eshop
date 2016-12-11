@extends('layouts.app')
@section('content')


<br><br><br>


<table class="pg-empty-placeholder"></table>
<div class="container">


    @if (session('mensaje'))
    <br>

        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>{{ session('mensaje') }}</h4>
    </div>
    @endif



  
    <div class="col-md-10" style="align-content: center;">
                    <h2>Folio de compra: {{$idcompra}}</h2>
                </div>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
                <th>Clave </th>
                <th>descripción </th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($Compra as $c)
            <tr>
                <td> {{$c->codigoitem}}</td>
                <td> {{$c->descripcion}}</td>
                <td> {{$c->marca}}</td>
                <td> {{$c->cantidad}}</td>
                <td> ${{$c->precio}}</td>
                  
                <td>
                    <a href="{{url('/producto')}}/{{$c->codigoitem}}">
                        <button  class="btn btn-primary"> Detalle producto <span class="glyphicon glyphicon-th-list "></span></button>
                    </a>
                </td>
              
            </tr>
            @endforeach

          </tbody>
        </table> 
  </div>
               <div class="modal-footer">
                <a href="{{url('/')}}">
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
                </a>
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
</div>
@endsection






