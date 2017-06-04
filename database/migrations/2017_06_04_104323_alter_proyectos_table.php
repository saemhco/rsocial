<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->string('grupo_interes')->after('beneficiarios');
            $table->string('registro_participacion')->after('beneficiarios');
            $table->string('satisfacion_involucrados')->after('beneficiarios');
            $table->string('resolucion_proyecto')->after('titulo');
            $table->string('resolucion_informe')->after('titulo');
            $table->string('evidencias')->after('obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('grupo_interes');
            $table->dropColumn('registro_participacion');
            $table->dropColumn('satisfacion_involucrados');
            $table->dropColumn('resolucion_proyecto');
            $table->dropColumn('resolucion_informe');
            $table->dropColumn('evidencias');
        });
    }
}
