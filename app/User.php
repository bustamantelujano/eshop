<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function items(){
        $items = DB::table('carritos')
            ->where('idcliente', '=',  $this->id )
            ->select(DB::raw(' Sum(cantidad) as totalitems'))
            ->first();
            return $items ;

    }
    public function total(){

        $preciomultiple = DB::table('carritos as c')
            ->join('productos as p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $this->id )
            ->select(DB::raw(' Sum(cantidad*precio) as result'))
            ->first();
        $total = $preciomultiple->result;
        return $total;
    }
    public function itemsCarrito(){
        $itemscarrito = DB::table('carritos AS c')
            ->join('productos AS p', 'p.clave', '=', 'c.codigoitem')
            ->where('c.idcliente', '=',  $this->id )
            ->select('p.clave', 'c.idcliente','p.descripcion', 'p.precio', 'p.imagen', 'p.ficha_comercial', 'c.cantidad','c.codigoitem')
            ->get();

        return $itemscarrito;
    }
    public function isAdmin(){
        if ($this->is_admin == 1 ){
            return true;
        }
        else{
            return false;
        }  // this looks for an admin column in your users table
    }
}