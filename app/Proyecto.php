<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $fillable = [
    	'docente_id','curso_id','semestre','ciclo','seccion','tipo','titulo','resolucion_informe','resolucion_proyecto','porcentaje','objetivos', 'justificacion','logros','dificultades','lugar','beneficiario','satisfacion_involucrados','sat_inv_excel','registro_participacion','grupo_interes','obs','evidencias'
    ];

    public function docente(){
    	return $this->belongsto('App\Docente');
    }
    public function curso(){
    	return $this->belongsto('App\Curso');
    }
    public function documentos(){
        return $this->hasMany('App\Documento');
    }
    public function foros(){
        return $this->hasMany('App\Foro');
    }
    public function frespuestas(){
        return $this->hasMany('App\Frespuesta');
    }
}
