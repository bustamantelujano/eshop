@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Tu compra</h1>
            <h3>Total: ${{ $total }}</h3>
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
            </div>
            <form action="/checkout" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" id="address" class="form-control" required name="address">
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Nombre del tarjetahabiente</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Número de tarjeta</label>
                            <input type="text" id="card-number" class="form-control" required>
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
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Pagar ahora</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection