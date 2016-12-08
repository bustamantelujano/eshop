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
        return Redirect::route('/home');
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

    public function getArticulo($clave){

    //Route::get ('/admin/dashboard', 'UserController@getAdminDashboard');

        $a = \DB::table('productos')->where('clave', $clave )->first();

        return view('editararticulo',compact('a'));

    }

        public function actualizaArticulo(Request $request,$clave){

            $codigo_fabricante = $request->input('codigo_fabricante');
                     //   dd($codigo_fabricante);

            $grupo = $request->input('grupo');
            $marca = $request->input('marca');
            $garantia = $request->input('garantia');
            $clase = $request->input('clase');
            $disponible = $request->input('disponible');
            $precio = $request->input('precio');
            $ficha_tecnica = $request->input('ficha_tecnica');
            $ficha_comercial = $request->input('ficha_comercial');
  
            DB::table('productos')->where('clave', $clave )->update(['codigo_fabricante' => $codigo_fabricante]);
            DB::table('productos')->where('clave', $clave )->update(['grupo' => $grupo ]);
            DB::table('productos')->where('clave', $clave )->update(['marca' => $marca]);
            DB::table('productos')->where('clave', $clave )->update(['garantia' => $garantia]);
            DB::table('productos')->where('clave', $clave )->update(['clase' => $clase]);
            DB::table('productos')->where('clave', $clave )->update(['disponible' => $disponible]);
            DB::table('productos')->where('clave', $clave )->update(['precio' => $precio]);
            DB::table('productos')->where('clave', $clave )->update(['ficha_tecnica' => $ficha_tecnica]);
            DB::table('productos')->where('clave', $clave )->update(['ficha_comercial' => $ficha_comercial]);
     

          //  dd($clave);

       // $a = \DB::table('productos')->where('clave', $clave )->first();

        return redirect('/producto/'.$clave);

    }
    public function agregarArticulo(Request $request,$clave){

            $codigo_fabricante = $request->input('codigo_fabricante');
                     //   dd($codigo_fabricante);

            $grupo = $request->input('grupo');
            $marca = $request->input('marca');
            $garantia = $request->input('garantia');
            $clase = $request->input('clase');
            $disponible = $request->input('disponible');
            $precio = $request->input('precio');
            $ficha_tecnica = $request->input('ficha_tecnica');
            $ficha_comercial = $request->input('ficha_comercial');
  
            DB::table('productos')->where('clave', $clave )->update(['codigo_fabricante' => $codigo_fabricante]);
            DB::table('productos')->where('clave', $clave )->update(['grupo' => $grupo ]);
            DB::table('productos')->where('clave', $clave )->update(['marca' => $marca]);
            DB::table('productos')->where('clave', $clave )->update(['garantia' => $garantia]);
            DB::table('productos')->where('clave', $clave )->update(['clase' => $clase]);
            DB::table('productos')->where('clave', $clave )->update(['disponible' => $disponible]);
            DB::table('productos')->where('clave', $clave )->update(['precio' => $precio]);
            DB::table('productos')->where('clave', $clave )->update(['ficha_tecnica' => $ficha_tecnica]);
            DB::table('productos')->where('clave', $clave )->update(['ficha_comercial' => $ficha_comercial]);
     

          //  dd($clave);

       // $a = \DB::table('productos')->where('clave', $clave )->first();

        return redirect('/producto/'.$clave);

    }





    public function getAdminDashboard(){
        $venta = DB::select('select v.*, email from venta as v
                     join users as u on u.id = v.idcliente
                     order by fecha desc'); 
        $productos =  DB::select('select clave, descripcion, marca, grupo,precio,disponible from productos
                    order by grupo'); 
        return view('admin', compact('venta', 'productos'));
    }


    public function error401(){
        return view('401');
    }





}
