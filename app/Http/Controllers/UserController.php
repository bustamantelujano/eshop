<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\Carrito;
use DB;
class UserController extends Controller
{
    
    public function profile(){
    	return view ('/profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('profile', array('user' => Auth::user()) );
    }
        public function editprofile(){
        return view ('/editprofile', array('user' => Auth::user()));
    }

    public function update_datos(Request $request){
        $user = Auth::user();
        
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');

        $user->direccion = $request->input('direccion');
        $user->numdireccionint = $request->input('numintdireccion');
        $user->ciudad = $request->input('ciudad');
        $user->estado = $request->input('estado');

        $user->save();
        
        return view('profile', array('user' => Auth::user()) );
    }
    public function addToCart($clave){ 
        $user = Auth::user();
        $nuevo = new Carrito;
        $nuevo->codigoitem = $clave;
        $nuevo->idcliente = $user->id;
        $nuevo -> save();

        return Redirect('/detalle/'.$clave);
    }


    public function getCarrito(){ 

        $user = Auth::user();

        $total = DB::table('carritos AS c')
            ->join('productos AS p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $user->id )
            ->select('p.clave', 'c.idcliente','p.descripcion', 'p.precio')
            ->sum('p.precio');

        $carritos = DB::table('carritos AS c')
            ->join('productos AS p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $user->id )
            ->select('p.clave', 'c.idcliente','p.descripcion', 'p.precio', 'p.imagen', 'p.ficha_comercial')
            ->get();

        return view('compra-carrito', compact('carritos', 'total'));
    }


    


}
