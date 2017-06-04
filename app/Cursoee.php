<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursoee extends Model
{
    protected $table = 'cursoees';
    protected $fillable = [
    	'encuesta_id','curso_id'
    ];
    public function encuestae(){
    	return $this->belongsto('App\Encuesta','encuesta_id');
    }
    public function curso(){
    	return $this->belongsto('App\Curso','curso_id');
    }
}
