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

    public function agregar($item, $id){
        $artAlmacenado = ['cantidad' => 0, 'precio' => $articulo->precio,'articulo' => $articulo];
        if($this->articulos){
            if(array_key_exists($id, $this->articulos)){
                $artAlmacenado = $this->articulos[$id];
            }
        }
        $artAlmacenado['cantidad']++;
        $artAlmacenado['precio'] = $articulo->precio * $artAlmacenado['cantidad'];
        $this->articulos[$id] = $artAlmacenado;
        $this->totalCantidad++;
        $this->totalPrecio += $item->precio;
    }


}
