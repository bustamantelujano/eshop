<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\Carrito;
use DB;
class UserController extends Controller{

    
    public function getperfilusuario(){
    	$user = Auth::user();
        $venta = $user->compras();
        return view ('profile',  array('user' => Auth::user()), compact('venta'));

    }

    public function destroy(){
        $user = Auth::user();
        $user->delete();
        return Redirect()->route('login');
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
    	$venta = $user->compras();
        return view ('profile',  array('user' => Auth::user()), compact('venta'));
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
     //   dd($user);
        $user->save();
        
        $venta = $user->compras();
        return view ('profile',  array('user' => Auth::user()), compact('venta'));
    }

    public function getAdminDashboard(){
        return view('home');
    }
    public function error401(){
        return view('401');
    }

}
