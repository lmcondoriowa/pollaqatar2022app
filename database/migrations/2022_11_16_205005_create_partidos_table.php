<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            //Defino la relación con la tabla paises
            $table->foreignId('pais_local_id')->references('id')->on('paises');
            $table->foreignId('pais_visitante_id')->references('id')->on('paises');
            $table->timestamp('fecha_partido')->useCurrent();
            $table->integer('local_goal')->default(0);
            $table->integer('visitante_goal')->default(0);
            $table->char('valoracion',1)->nullable()->comment('L:local | V:visitante | E:empate');
            $table->char('estado',1)->default('A')->comment('A:abierto | C:cerrado');
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
        Schema::dropIfExists('partidos');
    }
};
