<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    protected $table = 'foros';
    protected $fillable = [
      	'proyecto_id','user_id','titulo','subtitulo','contenido','archivo','estado'
    ];
    
    public function proyecto(){
    	return $this->belongsto('App\Proyecto');
    }
    public function user(){
        return $this->belongsto('App\User');
    }
    public function scopeBuscar($query, $name){
        return $query->where('foros.titulo','LIKE',"%$name%");
    }
}
