<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('imagen')->nullable();
            $table->string('nombre_producto');
            $table->text('descripcion_producto')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->integer('precio');
            $table->timestamps();

            // Relaciones
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
