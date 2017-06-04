<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frespuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foro_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('respuesta',500);
        $table->foreign('foro_id')->references('id')->on('foros')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('frespuestas');
    }
}
