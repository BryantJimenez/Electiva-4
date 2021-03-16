<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_27', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Nombre'); 
            $table->string('slug')->unique()->comment('Identificador');
            $table->enum('state', [0, 1])->default(1)->comment('Estado');
            $table->mediumText('description')->nullable()->comment('Descripcion');
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
        Schema::dropIfExists('categories');
    }
}
