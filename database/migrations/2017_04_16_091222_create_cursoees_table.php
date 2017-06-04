<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursoees', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('encuesta_id')->unsigned();
        $table->integer('curso_id')->unsigned();
        $table->foreign('encuesta_id')->references('id')->on('encuestaes')->onDelete('cascade');
        $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::drop('cursoees');
    }
}
