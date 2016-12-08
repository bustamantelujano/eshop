<?php

namespace App\Http\Controllers;
use App\productos;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $productos=DB::table('productos')->paginate(12);

        return view('welcome', compact('productos' ));
    }
    
    public function getCompra($idcompra){
        
        $Compra = DB::select('select descripcion, marca, precio, cantidad, fecha, codigoitem from venta as v 
                     join carritos as c on c.idcompra = v.id
                     inner join productos as p on p.clave = c.codigoitem 
                     where v.idrecibo = ?'
                     ,[$idcompra]
                     ); 
        return view('detallecompra', compact('Compra', 'idcompra'));
    }
    
    public function perfils()
    {
        return view('perfil');
    }
}
