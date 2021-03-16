<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_27', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->bigInteger('cliente_id')->unsigned()->nullable()->comment('Cliente');
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('vendedor_id')->unsigned()->nullable()->comment('Vendedor');
            $table->foreign('vendedor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->float('impuestos');
            $table->float('neto');
            $table->float('total');
            $table->string('metodo_pago');
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
        Schema::dropIfExists('ventas_27');
    }
}
