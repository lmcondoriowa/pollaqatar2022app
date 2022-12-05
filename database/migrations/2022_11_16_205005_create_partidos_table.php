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
            $table->integer('local_goal')->nullable();
            $table->integer('visitante_goal')->nullable();
            $table->char('valoracion',1)->nullable()->comment('L:local | V:visitante | E:empate');
            $table->integer('local_goal_penal')->nullable();
            $table->integer('visitante_goal_penal')->nullable();
            $table->char('valoracion_penal',1)->nullable()->comment('L:local | V:visitante | E:empate');
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
