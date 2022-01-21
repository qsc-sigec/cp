<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('reg_act_id');
            $table->string('reg_acciones');
            $table->string('reg_lastUpdate');
            $table->string('reg_usr_id');
            $table->string('reg_status');
            $table->string('reg_prioridad');
            $table->string('reg_complejidad');
            $table->string('reg_estimado');
            $table->string('reg_fechaPropuesta');
            $table->string('reg_revision');
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
        Schema::dropIfExists('registros');
    }
}
