<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyest extends Model
{
	protected $table = 'proyests';
    protected $fillable = [
    	'proyecto_id','estudiante_id'
    ];
    public function proyecto(){
    	return $this->belongsto('App\Proyecto');
    }
    public function estudiante(){
    	return $this->belongsto('App\Estudiante');
    }    
}
