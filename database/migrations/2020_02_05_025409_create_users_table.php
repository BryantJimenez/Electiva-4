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
            $table->bigIncrements('id');
            $table->string('name')->comment('Nombre'); 
            $table->string('user')->comment('Usuario');
            $table->string('slug')->unique()->comment('Identificador');
            $table->string('photo')->default('usuario.png');
            $table->string('dni');
            $table->string('phone')->comment('Telefono');
            $table->string('address')->comment('Direccion');
            $table->string('password')->nullable()->comment('Contraseña');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('state', [0, 1])->default(1)->comment('Estado');
            $table->enum('type', [1, 2, 3, 4, 5, 6])->nullable()->comment('Tipo');
            //1 = Admin
            //2 = Especial
            //3 = Vendedor
            //4 = Proveedor Particular
            //5 = Proveedor Empresarial
            //6 = Cliente
            $table->timestamp('last_login')->comment('Ultima_sesion');
            $table->timestamp('last_sale')->comment('Ultima_venta');
            $table->timestamps();

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
