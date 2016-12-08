<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use GuzzleHttp\Client;

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


    public function numitemssinpagar(){

        $items = DB::table('carritos')
            ->where([['idcliente', '=',  $this->id],['idcompra', '=', null ] ] )
            ->select(DB::raw(' Sum(cantidad) as totalitems'))
            ->first();
            return $items->totalitems;

    }


    public function compras(){
        $venta = DB::table('venta')
            ->where('idcliente', '=',  $this->id )
            ->select('venta.*')
            ->orderBy('fecha', 'desc')
            ->get();
            //dd($venta);
            return $venta;
    }
    public function total(){

        $preciomultiple = DB::table('carritos as c')
            ->join('productos as p', 'p.clave', '=', 'c.codigoitem')
            ->where([['c.idcliente', '=',  $this->id],['c.idcompra', '=', null ]] )
            ->select(DB::raw(' Sum(cantidad*precio) as result'))
            ->first();
        $total = $preciomultiple->result;
        return $total;
    }
    public function itemsCarrito(){
        $itemscarrito = DB::table('carritos AS c')
            ->join('productos AS p', 'p.clave', '=', 'c.codigoitem')
            ->where([['c.idcliente', '=',  $this->id],['c.idcompra', '=', null ]] )
            ->select('p.clave', 'c.idcliente','p.descripcion', 'p.precio', 'p.imagen', 'p.ficha_comercial', 'c.cantidad','c.codigoitem')
            ->get();

        return $itemscarrito;
    }
    public function guardacompra(){
        $now = new \DateTime();
        //dd($now); = strtotime('2012-07-25 14:35:08' );
        $idrecibo = md5(time().$this->id);
        $idrecibo = substr($idrecibo, 0,19);
        DB::table('venta')->insert([
        'idcliente' => $this->id, 
        'fecha' => $now,
        'numitems' => $this->numitemssinpagar(),
        'total' => $this->total(),
        'idrecibo' => $idrecibo
        ]);


        $NumOrden = DB::table('venta')->where('idcliente', $this->id)->max('id');
        

        $client = new Client();

        $client->request('GET', 'http://smsgateway.me/api/v3/messages/send?email=bustamantelujano@gmail.com&password=1234554321&device=33055&number='.$this->telefono.'&message='.$this->name.', muchas gracias por tu compra, puede ver su recibo en cvashop.herokuapp.com/compra/'.$idrecibo);

   // dd($result);

        DB::table('carritos')
            ->where([['idcliente', '=',  $this->id],['idcompra', '=', null ]] )
            ->update(['idcompra' => $NumOrden]);


        return $idrecibo;
    }


    public function agregatelefono($numero){
        $result =  DB::table('users')
            ->where('id', '=',  $this->id )
            ->update(['telefono' => $numero]);
            return;
    }
    public function categorias(){
        $categorias = DB::table('productos')
            ->select('grupo')
            ->get();

        return $categorias;
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