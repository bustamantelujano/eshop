<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Carrito;
use Stripe\Charge;
use Stripe\Stripe;

class CarritoController extends Controller
{

	   public function getitems(){ 
	   	$user = Auth::user();
        $total = $user->total();
        $itemscarrito = $user->itemsCarrito();
        return view('compra-carrito', compact('itemscarrito', 'total', 'items'));
    }

        public function deleteitem(Request $request){
        $user = Auth::user();
        $clave = $request->input('clave');
        DB::table('carritos')
            ->where([
                ['idcliente', '=',  $user->id],
                ['codigoitem', '=',  $clave]
            ])->delete();
       return Redirect('/carrito');
    }

    public function quitadeexistencia($numitems, $clave){

    	return;
    }
        public function additem(Request $request){ 
        $user = Auth::user();

        $clave =  $request->input('clave');
        $itemsconclave = DB::table('carritos')
            ->where([['carritos.codigoitem', '=',  $clave ] ,['carritos.idcliente', '=', $user->id ],['carritos.idcompra','=',null]])
            ->select('carritos.*')
            ->first();
        $precioitem = DB::table('productos')
            ->where('clave', '=',  $clave )
            ->select('precio')
            ->get();
        //    dd($precioitem);
            if(!count($itemsconclave) ){ //El item no está en el carrito, entonces se hace uno nuevo

                $nuevo = new Carrito;
                $nuevo->codigoitem = $clave;
                $nuevo->idcliente = $user->id;
                $nuevo->cantidad = 1;
                $preciomultiple = $precioitem; 
                $nuevo -> save();

            }
            else{ //El item sí está en el carrito, entonces solo se aumenta la cantidad
                DB::table('carritos')
                    ->where([['idcliente', $user->id],['codigoitem',$clave],['carritos.idcompra','=',null]])
                    ->increment('cantidad' , 1);
            }
            $arreglo = array();
            $arreglo["validado"] = true;
            $producto = DB::table('productos')->where('clave', $clave )->first();

        return redirect('producto/'.$clave)->with('mensaje','Producto agregado a tu carrito');
    }

     public function getCheckout() {
     	$user = Auth::user();
     	$total = $user->total();
     	return view('checkout', compact('total'));
    }

    public function postCheckout(Request $request)  {
    	$user = Auth::user();

    	//dd($request);
    	if(strlen($user->telefono) < 10){
    		$user->agregatelefono($request->input('tel'));
    	}
        //dd($user->activado );
        if ($user->activado == 0 ) {
            
            $mensaje = "";
           return view('401');
            //return view('error', compact('mensaje'));

        }

        Stripe::setApiKey('sk_test_pUcnpeWTGArzktGqFTe8SoTE');

        try {
		    
			Stripe::setApiKey('sk_test_pUcnpeWTGArzktGqFTe8SoTE');

			$customer =  \Stripe\Customer::retrieve("cus_9h1dPct5LzNH3a");
			$total = $user->total() * 100;
			\Stripe\Charge::create(array(
				"customer"=> $customer,
				"amount" => ceil($total),
				"currency" => "mxn",
				"source" => $request->input('stripeToken'), // obtained with Stripe.js
				"description" => "Cargo de CVAshop"
			));

			//$compras

        } catch (\Exception $e) {
        	//dd($e);
            return redirect('/401');
        }


		$idcompra = $user->guardacompra();
        return redirect('/compra/'.$idcompra)->with('mensaje','Tu compra fue procesada exitosamente');
    }
}
