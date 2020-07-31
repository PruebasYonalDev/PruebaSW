<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FK_id_user');
            $table->unsignedBigInteger('FK_id_product');
            $table->integer('state_estimate');
            $table->timestamps();

            // Relaciones
            $table->foreign('FK_id_user')->references('id')->on('users');
            $table->foreign('FK_id_product')->references('id_product')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate');
    }
}
