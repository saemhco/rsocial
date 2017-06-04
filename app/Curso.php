<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $table = 'cursos';
    protected $fillable = [
    	'curso','cod','semestre','estado'
    ];
    public function proyectos(){
        return $this->hasMany('App\Proyecto');
    }
    public function cursoeds(){
        return $this->hasMany('App\Cursoed');
    }
    public function cursoees(){
        return $this->hasMany('App\Cursoee');
    }
}
