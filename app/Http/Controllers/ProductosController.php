<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

use App\Carrito;
use App\Productos;


class ProductosController extends Controller
{

	/*
	public function getIndex()
	{
		$productos = Productos::all();
		return view ('tienda.index', ['productos' => $productos]);
	}*/


    public function getAgregaCarrito(Request $request, $id){
    	$producto = Productos::find($id);
    	$carritoViejo = Session::has('Carrito') ? Session::get('Carrito') : null;
    	$Carrito = new Carrito($carritoViejo);
    	$Carrito->add($producto,$producto->id);

    	$request->session()->put('Carrito',$Carrito);
    	//dd($request->session()->get('Carrito'));
    	return redirect()->route('producto.agregaCarrito');
    }

    public function getCarrito(){
    	if (!Session::has('Carrito')){
    		return view ('compra-carrito');
    	}
    	$carritoViejo = Session::get('Carrito');
    	$Carrito = new Carrito($carritoViejo);
    	return view ('compra-carrito', ['productos' => $Carrito->articulos, 'totalPrecio' => $Carrito->totalPrecio]);
    }

     public function getReduceByOne($id) {
        $carritoViejo = Session::has('Carrito') ? Session::get('Carrito') : null;
        $Carrito = new Carrito($carritoViejo);
        $Carrito->reduceByOne($id);
        if (count($Carrito->articulos) > 0) {
            Session::put('Carrito', $Carrito);
        } else {
            Session::forget('Carrito');
        }
        return redirect()->route('producto.compraCarrito');
    }
    public function getRemoveItem($id) {
        $carritoViejo = Session::has('Carrito') ? Session::get('Carrito') : null;
        $Carrito = new Carrito($carritoViejo);
        $Carrito->removeItem($id);
        if (count($Carrito->articulos) > 0) {
            Session::put('Carrito', $Carrito);
        } else {
            Session::forget('Carrito');
        }
        return redirect()->route('producto.compraCarrito');
    }

}
