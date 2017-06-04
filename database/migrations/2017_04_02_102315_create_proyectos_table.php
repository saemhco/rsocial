<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('docente_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->string('semestre');
            $table->string('ciclo');
            $table->string('seccion');
            $table->string('tipo'); //1. proyección social, 2. Extenc Univers
            $table->string('titulo');
            $table->string('porcentaje');
            $table->string('objetivos',600);
            $table->string('justificacion',600);
            $table->string('logros',600);
            $table->string('dificultades',600);
            $table->string('lugar');
            $table->string('beneficiarios');
            $table->string('obs',600);
            $table->foreign('docente_id')->references('user_id')->on('docentes')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos');
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
        Schema::drop('proyectos');
    }
}
