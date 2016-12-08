@extends('layouts.app')
@section('content')
<br><br><br>


<table class="pg-empty-placeholder"></table> 
<div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#perfil" data-toggle="tab" aria-expanded="true">Mi perfil</a></li>
      <li class=""><a href="#compras" data-toggle="tab" aria-expanded="false">Mis ventas</a></li>
      <li class=""><a href="#articulos" data-toggle="tab" aria-expanded="false">Artículos</a></li>
      
    </ul>
<div class="jumbotron" style="min-height:600px">

<div id="myTabContent" class="tab-content" >
  <div class="tab-pane fade active in" id="perfil">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{url('/uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h1>{{ Auth::user()->name }}</h1>

                <fieldset>
         
                    <div class="ch-form-row">
                        <label> Nombre y apellido: </label>
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <fieldset>
                        <h3 class="title">Dirección</h3>
                        <div class="ch-form-row">
                            <label>Dirección:</label>
                            <span>{{ Auth::user()->direccion }}</span>
                        </div>
                    </fieldset>
                    
                   
                    <br>
                    

                </fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
  </div>
  <div class="tab-pane fade" id="compras">
            <div class="col-md-10" style="align-content: center;">
                    <h2>Mis ventas</h2>
                </div>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
                <th style="text-align: center;">id</th>
                <th style="text-align: center;">Email cliente</th>
                <th style="text-align: center;">Número de items</th>
                <th style="text-align: center;">Total</th>
                <th style="text-align: center;">fecha</th>
                <th style="text-align: center;"></th>
           
                
            </tr>
          </thead>
          <tbody>
          @if($venta != null)
            @foreach($venta as $v)
            <tr>
                <td style="text-align: center;" center;">{{$v->id}}</td>
                <td style="text-align: center;" center;">{{$v->email}}</td>
                <td style="text-align: center;" center;">{{$v->numitems}}</td>
                <td style="text-align: center;" center;">${{$v->total}}</td>
                <td style="text-align: center;" center;">{{$v->fecha}}</td>
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
  <div class="tab-pane fade" id="articulos">
            <div class="col-md-10" style="align-content: center;">

                    <h2>Mis artículos  </h2>
                </div>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
                <th style="text-align: center;">Clave</th>
                <th style="text-align: center;">Descripcion</th>
                <th style="text-align: center;">Marca</th>
                <th style="text-align: center;">grupo</th>
                <th style="text-align: center;">Precio</th>
                <th style="text-align: center;">Disponible</th>
                <th style="text-align: center;"></th>
           
                
            </tr>
          </thead>
          <tbody>
            @foreach($productos as $p)
            @if($p->disponible > 0 )
                <tr >
                    <td style="text-align: center;" center;">{{$p->clave}}</td>
                    <td style="text-align: center;" center;">{{$p->descripcion}}</td>
                    <td style="text-align: center;" center;">{{$p->marca}}</td>
                    <td style="text-align: center;" center;">${{$p->grupo}}</td>
                    <td style="text-align: center;" center;">{{$p->precio}}</td>
                    <td style="text-align: center;" center;">{{$p->disponible}}</td>
                    <td style="text-align: center;">
                        <a href="{{url('/admin/editararticulo')}}/{{$p->clave}}">
                            <button  class="btn btn-primary"> Editar <span class="glyphicon glyphicon-pencil "></span></button>
                        </a>
                    </td>
                  
                </tr>
            @else  
                <tr class="danger">
                    <td style="text-align: center;" center;">{{$p->clave}}</td>
                    <td style="text-align: center;" center;">{{$p->descripcion}}</td>
                    <td style="text-align: center;" center;">{{$p->marca}}</td>
                    <td style="text-align: center;" center;">{{$p->grupo}}</td>
                    <td style="text-align: center;" center;">${{$p->precio}}</td>
                    <td style="text-align: center;" center;">{{$p->disponible}}</td>
                    <td style="text-align: center;">
                        <a href="{{url('/admin/editararticulo')}}/{{$p->clave}}">
                            <button  class="btn btn-primary"> Editar <span class="glyphicon glyphicon-pencil "></span></button>
                        </a>
                    </td>
                  
                      
            @endif
            @endforeach

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






