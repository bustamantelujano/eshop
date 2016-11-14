<?php

namespace App\Http\Controllers;
use App\productos;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=DB::table('productos')->paginate(20);
        return view('welcome', compact('productos'));
    }

    public function consultar(){
        $usuarios=DB::table('usuarios')->paginate(20);
        return view('consultarUsuarios', compact('usuarios'));
    }


    public function perfils()
    {
        return view('perfil');
    }
}
