<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_semana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_dia');
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
        Schema::dropIfExists('dias_semana');
    }
}

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_actividad');
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
        Schema::dropIfExists('actividades');
    }
}

class CreateAgendaAgenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_agente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dia_semana_id');
            $table->string('momento_dia');
            $table->unsignedInteger('actividad_id');
            $table->timestamps();

            $table->foreign('dia_semana_id')->references('id')->on('dias_semana');
            $table->foreign('actividad_id')->references('id')->on('actividades');
        });
    }
}