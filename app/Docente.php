<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = "user_id";
    protected $fillable = [
      	'user_id'
    ];
    
    public function user(){
    	return $this->belongsto('App\User','user_id');
    }
    public function proyectos(){
        return $this->hasMany('App\Proyecto');
    }
}
