<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni',8)->unique();
            $table->string('email')->unique();
            $table->string('password', 60)->default(bcrypt('12345678'));
            $table->string('foto')->default('user.png');
            $table->string('sexo');
            $table->string('tipo');
            $table->string('estado');
            $table->string('solicitud');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
