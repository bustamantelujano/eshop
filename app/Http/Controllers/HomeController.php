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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=DB::table('productos')->paginate(12);
        return view('welcome', compact('productos'));
    }
    
    
    public function perfils()
    {
        return view('perfil');
    }
}
