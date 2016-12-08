@extends('layouts.app')
@section('content')
<br><br><br>

    <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        
        <div class="modal-dialog">
            <div class="modal-content">
            <ul class="list-group">
  <li class="list-group-item list-group-item-success">
            <h2>Tarjeta de crédito o débito</h2>
            <center>
        <img src="img/banamex.jpg" width="100">
        <img src="img/banorte.jpg" width="72">
        <img src="img/santander.jpg" width="100">
        <img src="img/inbursa.jpg" width="100">
            </center>
            </li>
                <div class="modal-header">
                    <h2 class="modal-title">Tu compra</h2>
                    <h3 class="modal-title">Total: ${{ $total }} MXN</h3>
                </div>
                <div class="modal-body">
                    

                    <form action="/checkout" method="post" id="checkout-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" class="form-control" required name="name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                        <div class="col-xs-11">
                                <div class="form-group">
                                     <label for="address">Dirección</label>
                                        <input type="text" id="address" class="form-control" required name="address" value="{{Auth::user()->direccion}}">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-9">
                                        <div class="form-group">
                                            <label for="tel">Telefono</label>
                                            <input type="text" id="tel" class="form-control" required name="tel" value="{{Auth::user()->telefono}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <div class="checkbox">
                                            <br>
                                              <label>
                                                <input type="checkbox" value="true" checked id="recibosms"> Recibo SMS
                                              </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>  
                                <hr>
                                <img align="center" src="img/visa2.jpg" width="100">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label for="card-number">Número de tarjeta</label>
                                        <input type="text" id="card-number" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-month">Mes de expiración</label>
                                                <input type="text" id="card-expiry-month" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-year">Año de expiración</label>
                                                <input type="text" id="card-expiry-year" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                 <img align="center" src="img/visa.jpg" width="100">
                                
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="card-cvc">CVC</label>
                                        <input type="text" id="card-cvc" class="form-control"  required>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        


                    </div>
                        <div class="modal-footer">
                            <a href="{{url('/')}}">
                                <button  type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </a>

                            <button type="submit" class="btn btn-primary">Pagar ahora</button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>







        </div>
    </div>
@endsection
