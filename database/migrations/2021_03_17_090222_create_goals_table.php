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
            $table->string('tipo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_usuario_origen');
            $table->integer('id_usuario_destino');
            $table->integer('id_objetivo_dependiente')->nullable();
            $table->string('completado')->nullable();
            $table->string('year');
            $table->string('comentario_origen_T1')->nullable();
            $table->string('comentario_origen_T2')->nullable();
            $table->string('comentario_origen_T3')->nullable();
            $table->string('comentario_origen_T4')->nullable();
            $table->string('comentario_destino_T1')->nullable();
            $table->string('comentario_destino_T2')->nullable();
            $table->string('comentario_destino_T3')->nullable();
            $table->string('comentario_destino_T4')->nullable();
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
