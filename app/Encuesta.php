<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';
    protected $fillable = [
      	'semestre','estado'
    ];
    public function encuestads(){
        return $this->hasMany('App\Encuestad');
    }
    public function encuestaes(){
        return $this->hasMany('App\Encuestae');
    }
    
}
