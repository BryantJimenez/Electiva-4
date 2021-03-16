<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->nullable()->comment('Categoria');
            $table->bigInteger('provider_id')->unsigned()->nullable()->comment('Proveedor');
            $table->string('slug')->unique()->comment('Identificador');
            $table->string('cod')->nullable()->comment('Codigo');
            $table->string('image')->default('imagen.jpg');
            $table->string('name')->comment('Nombre');
            $table->integer('stock')->unsigned()->nullable();
            $table->float('sale_price', 10, 2)->default(0.00)->comment('Precio_venta');
            $table->float('purchase_price', 10, 2)->default(0.00)->comment('Precio_compra');
            $table->enum('state', [0, 1])->default(1)->comment('Estado');
            $table->timestamps();

             #Relations
            $table->foreign('category_id')->references('id')->on('categories_27')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('provider_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
