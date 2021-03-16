<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_27', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod')->comment('Codigo');
            $table->string('slug')->unique()->comment('Identificador');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('Vendedor');
            $table->bigInteger('customer_id')->unsigned()->nullable()->comment('Cliente');
            $table->enum('way_pay', [1, 2, 3])->comment('Metodo_pago');
            //1 = Efectivo
            //2 = Tarjeta de Crédito
            //3 = Tarjeta de Débito
            $table->string('transaction_cod')->nullable()->comment('Codigo_transaccion');
            $table->float('net', 10, 2)->default(0.00)->comment('Neto');
            $table->float('total', 10, 2)->default(0.00);
            $table->timestamps();

            #Relations
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_27');
    }
}
