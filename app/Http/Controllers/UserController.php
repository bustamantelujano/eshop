<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

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

    public function carrito()
    {
        return view ('/carrito', array('user' => Auth::user()));
    }

    public function addCarrito(request $request){
        $carrito = Auth::carrito();
        $carrito->id = $request->input('id');

        return view ('/carrito', array('user' => Auth::user()));
    }


}
