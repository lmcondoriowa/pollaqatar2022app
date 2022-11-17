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
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            //Defino la relación con la tabla paises
        	$table->foreignId('grupo_id')->references('id')->on('grupos');
            $table->string('nombre', 45);
            $table->string('confederacion', 100)->nullable();
            $table->string('bandera', 45)->nullable()->default('default.jpg');
            $table->char('estado',1)->default('A')->comment('A:activo | I:inactivo');            
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
        Schema::dropIfExists('paises');
    }
};
