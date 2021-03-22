<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('Tipo');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->string('Id_usuario_origen');
            $table->string('Id_usuario_destino');
            $table->string('Id_objetivo_dependiente')->nullable();
            $table->string('Completado')->nullable();
            $table->string('Year');
            $table->string('Comentario_origen_T1')->nullable();
            $table->string('Comentario_origen_T2')->nullable();
            $table->string('Comentario_origen_T3')->nullable();
            $table->string('Comentario_origen_T4')->nullable();
            $table->string('Comentario_destino_T1')->nullable();
            $table->string('Comentario_destino_T2')->nullable();
            $table->string('Comentario_destino_T3')->nullable();
            $table->string('Comentario_destino_T4')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
