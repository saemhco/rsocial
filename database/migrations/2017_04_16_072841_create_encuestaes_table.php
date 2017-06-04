<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestaes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ee_i_i');
            $table->string('ee_i_ii');
            $table->string('ee_i_iii');
            $table->string('ee_i_iv');
            $table->string('ee_i_v');
            $table->string('ee_i_vi');
            $table->string('ee_i_vii');
            $table->string('ee_i_viii');
            $table->string('ee_i_ix');
            $table->string('ee_i_x');
            $table->string('ee_i_xi');
            $table->string('ee_i_xii');
            $table->string('ee_i_xiii');
            $table->string('ee_i_xiv');
            $table->string('ee_i_xv');
            $table->string('ee_i_xvi');
            $table->string('ee_i_xvii');
            $table->string('ee_i_xviii');

            $table->string('ee_ii_i');
            $table->string('ee_ii_ii');
            $table->string('ee_ii_iii');
            $table->string('ee_ii_iv');
            $table->string('ee_ii_v');
            $table->string('ee_ii_vi');
            $table->string('ee_ii_vii');
            $table->string('ee_ii_viii');
            $table->string('ee_ii_ix');
            $table->string('ee_ii_x');

            $table->string('ee_iii_i');
            $table->string('ee_iii_ii');
            $table->string('ee_iii_iii');
            $table->string('ee_iii_iv');
            $table->string('ee_iii_v');
            $table->string('ee_iii_vi');
            $table->string('ee_iii_vii');
            $table->string('ee_iii_viii');
            $table->string('ee_iii_ix');
            $table->string('ee_iii_x');
            $table->string('ee_iii_xi');
            $table->string('ee_iii_xii');
            $table->string('ee_iii_xiii');
            $table->string('ee_iii_xiv');
            $table->string('ee_iii_xv');
            $table->string('ee_iii_xvi');
            $table->string('ee_iii_xvii');
            $table->string('ee_iii_xviii');
            $table->string('ee_iii_xix');
            $table->string('ee_iii_xx');
            $table->string('ee_iii_xxi');
            $table->string('ee_iii_xxii');
            $table->string('ee_iii_xxiii');

            $table->string('ee_iv_i');
            $table->string('ee_iv_ii');
            $table->string('ee_iv_iii');
            $table->string('ee_iv_iv');
            $table->string('ee_iv_v');
            $table->string('ee_iv_vi');
            $table->string('ee_iv_vii');
            $table->string('ee_iv_viii');
            $table->string('ee_iv_ix');
            $table->string('ee_iv_x');
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade');
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
        Schema::drop('encuestaes');
    }
}
