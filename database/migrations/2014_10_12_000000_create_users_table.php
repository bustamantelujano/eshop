<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->default('default.jpg');
            $table->string('password');
            $table->string('direccion')->default('');
            $table->string('numdireccion')->default('');
            $table->string('numdireccionint')->default('');
            $table->string('ciudad')->default('');
            $table->string('estado')->default('');
            $table->string('cp')->default('');
            $table->string('telefono')->default('');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('carrito', function (Blueprint $table) {
            $table->increments('idcliente');
            $table->string('codigoitem');
            $table->string('precioitem');
          
        });
        Schema::create('productos', function (Blueprint $table) {

            $table->string('clave');
            $table->string('codigo_fabricante');
            $table->string('descripcion');
            $table->string('grupo');
            $table->string('marca');
            $table->string('garantia');
            $table->string('clase');
            $table->string('disponible');
            $table->string('precio');
            $table->string('moneda');
            $table->string('ficha_tecnica');
            $table->string('ficha_comercial');
            $table->string('imagen');       
            
          
        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
