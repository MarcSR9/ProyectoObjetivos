<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrimestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_administration', function (Blueprint $table) {
            $table->string('trimester_1');
            $table->string('trimester_2');
            $table->string('trimester_3');
            $table->string('trimester_4');
            $table->string('conclusions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_administration');
    }
}
