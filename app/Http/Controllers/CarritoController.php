<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Carrito;

class CarritoController extends Controller
{

	   public function getitems(){ 
	   	$user = Auth::user();

	   	$items = DB::table('carritos')
            ->where('idcliente', '=',  $user->id )
            ->select(DB::raw(' Sum(cantidad) as totalitems'))
            ->first();
       // dd($user);
        // select Sum(cantidad*precio) as Result from 
        // carritos as c join productos as p on c.codigoitem = p.clave
        // where c.idcliente = '1'
        $preciomultiple = DB::table('carritos as c')
            ->join('productos as p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $user->id )
            ->select(DB::raw(' Sum(cantidad*precio) as result'))
            ->first();
        $total = $preciomultiple->result;
       // $total = 1;
      // $total = $total->total;
       //dd($total);
        $carritos = DB::table('carritos AS c')
            ->join('productos AS p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $user->id )
            ->select('p.clave', 'c.idcliente','p.descripcion', 'p.precio', 'p.imagen', 'p.ficha_comercial', 'c.cantidad','c.codigoitem')
            ->get();

        return view('compra-carrito', compact('carritos', 'total', 'items'));
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

        public function additem(Request $request){ 
        $user = Auth::user();
        $clave =  $request->input('clave');
        $itemsconclave = DB::table('carritos')
            ->where([['carritos.codigoitem', '=',  $clave ] ,['carritos.idcliente', '=', $user->id ]])
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
                    ->where([['idcliente', $user->id],['codigoitem',$clave]])
                    ->increment('cantidad' , 1);
            }

        return Redirect('/producto/'.$clave);
    }


}
