<?php

namespace App;


class Carrito
{
    public $articulos = null;
    public $totalCantidad = 0;
    public $totalPrecio = 0;

    public function __construct($carritoViejo)
	{
        if($carritoViejo){
            $this->articulos = $carritoViejo->articulos;
            $this->totalCantidad = $carritoViejo->totalCantidad;
            $this->totalPrecio = $carritoViejo->totalPrecio;
        }
    }

    public function add($item, $id){
        $artAlmacenado = ['cantidad' => 0, 'precio' => $item->precio,'articulo' => $item];
        if($this->articulos){
            if(array_key_exists($id, $this->articulos)){
                $artAlmacenado = $this->articulos[$id];
            }
        }
        $artAlmacenado['cantidad']++;
        $artAlmacenado['precio'] = $item->precio * $artAlmacenado['cantidad'];
        $this->articulos[$id] = $artAlmacenado;
        $this->totalCantidad++;
        $this->totalPrecio += $item->precio;
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
        return redirect()->route('');
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

        return redirect()->route('product.shoppingCarrito');
    }



}
