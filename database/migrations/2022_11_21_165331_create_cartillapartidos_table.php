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
        Schema::create('cartillapartidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cartilla_id')->references('id')->on('cartillas');
            $table->foreignId('partido_id')->references('id')->on('partidos');
            $table->integer('local_goal')->default(0);
            $table->integer('visitante_goal')->default(0);
            $table->char('valoracion',1)->nullable()->comment('L:local | V:visitante | E:empate');
            $table->integer('puntaje')->default(0);
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
        Schema::dropIfExists('cartillapartidos');
    }
};
