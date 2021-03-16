<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_productos_27', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('venta_id')->unsigned()->nullable()->comment('venta');
            $table->foreign('venta_id')->references('id')->on('ventas_27')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('producto_id')->unsigned()->nullable()->comment('Productos');
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->float('precio_unitario');
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
        Schema::dropIfExists('venta_productos_27');
    }
}
