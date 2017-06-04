<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ed_i_i');
            $table->string('ed_i_ii');
            $table->string('ed_i_iii');
            $table->string('ed_i_iv');
            $table->string('ed_i_v');
            $table->string('ed_i_vi');
            $table->string('ed_i_vii');
            $table->string('ed_i_viii');
            $table->string('ed_i_ix');
            $table->string('ed_i_x');
            $table->string('ed_i_xi');
            $table->string('ed_i_xii');
            $table->string('ed_i_xiii');
            $table->string('ed_i_xiv');
            $table->string('ed_i_xv');
            $table->string('ed_i_xvi');
            $table->string('ed_i_xvii');
            $table->string('ed_i_xviii');
            $table->string('ed_i_xix');
            $table->string('ed_i_xx');

            $table->string('ed_ii_i');
            $table->string('ed_ii_ii');
            $table->string('ed_ii_iii');
            $table->string('ed_ii_iv');
            $table->string('ed_ii_v');
            $table->string('ed_ii_vi');
            $table->string('ed_ii_vii');
            $table->string('ed_ii_viii');
            $table->string('ed_ii_ix');
            $table->string('ed_ii_x');

            $table->string('ed_iii_i');
            $table->string('ed_iii_ii');
            $table->string('ed_iii_iii');
            $table->string('ed_iii_iv');
            $table->string('ed_iii_v');
            $table->string('ed_iii_vi');
            $table->string('ed_iii_vii');
            $table->string('ed_iii_viii');
            $table->string('ed_iii_ix');
            $table->string('ed_iii_x');
            $table->string('ed_iii_xi');
            $table->string('ed_iii_xii');
            $table->string('ed_iii_xiii');
            $table->string('ed_iii_xiv');
            $table->string('ed_iii_xv');
            $table->string('ed_iii_xvi');
            $table->string('ed_iii_xvii');
            $table->string('ed_iii_xviii');
            $table->string('ed_iii_xix');
            $table->string('ed_iii_xx');

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
        Schema::drop('encuestads');
    }
}
