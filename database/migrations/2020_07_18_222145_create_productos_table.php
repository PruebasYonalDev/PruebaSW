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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('image')->nullable();
            $table->string('name_product');
            $table->text('description_product')->nullable();
            $table->unsignedBigInteger('FK_id_category');
            $table->integer('price');
            $table->integer('state_product');
            $table->timestamps();

            // Relaciones
            $table->foreign('FK_id_category')->references('id_category')->on('category');

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
