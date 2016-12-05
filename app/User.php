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

    public function isAdmin(){
        if ($this->is_admin == 1 ){
            return true;
        }
        else{
            return false;
        }  // this looks for an admin column in your users table
    }
}