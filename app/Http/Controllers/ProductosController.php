<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Auth;
use App\Productos;
use DB;

class ProductosController extends Controller
{

	/*
	public function getIndex()
	{
		$productos = Productos::all();
		return view ('tienda.index', ['productos' => $productos]);
	}*/


    public function detalleProducto($clave){

        $producto = \DB::table('productos')->where('clave', $clave )->first();

        return view('productDetail', compact('producto') );

    }





    // public function getCarrito(){
    // 	if (!Session::has('Carrito')){
    // 		return view ('compra-carrito');
    // 	}
    // 	$carritoViejo = Session::get('Carrito');
    // 	$Carrito = new Carrito($carritoViejo);
    // 	return view ('compra-carrito', ['productos' => $Carrito->articulos, 'totalPrecio' => $Carrito->totalPrecio]);
    // }


    //  public function getReduceByOne($id) {
    //     $carritoViejo = Session::has('Carrito') ? Session::get('Carrito') : null;
    //     $Carrito = new Carrito($carritoViejo);
    //     $Carrito->reduceByOne($id);
    //     if (count($Carrito->articulos) > 0) {
    //         Session::put('Carrito', $Carrito);
    //     } else {
    //         Session::forget('Carrito');
    //     }
    //     return  view ('compra-carrito');
    // }
    // public function getRemoveItem($id) {
    //     $carritoViejo = Session::has('Carrito') ? Session::get('Carrito') : null;
    //     $Carrito = new Carrito($carritoViejo);
    //     $Carrito->removeItem($id);
    //     if (count($Carrito->articulos) > 0) {
    //         Session::put('Carrito', $Carrito);
    //     } else {
    //         Session::forget('Carrito');
    //     }
    //     return view ('compra-carrito');
    // }

}
