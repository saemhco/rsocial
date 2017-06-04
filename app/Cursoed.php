<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursoed extends Model
{
    protected $table = 'cursoeds';
    protected $fillable = [
    	'encuesta_id','curso_id'
    ];
    public function encuestad(){
    	return $this->belongsto('App\Encuesta','encuesta_id');
    }
    public function curso(){
    	return $this->belongsto('App\Curso','curso_id');
    }
}
