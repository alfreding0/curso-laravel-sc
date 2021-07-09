<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_alquiler');
            $table->dateTime('fecha_devolucion');
            $table->float('costo')->default(0);
            $table->integer('cantidad_items')->default(0);
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('cliente_id')->on('personas')->references('id')->onDelete('cascade');
            $table->foreign('usuario_id')->on('personas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquileres');
    }
}
