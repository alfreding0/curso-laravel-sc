<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('creador');
            $table->integer('copias')->default(0);
            $table->float('precio')->default(0);
            $table->smallInteger('tipo');
            $table->unsignedBigInteger('genero_id');
            $table->timestamps();

            $table->foreign('genero_id')->on('generos')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
