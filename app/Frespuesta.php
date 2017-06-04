<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frespuesta extends Model
{
    protected $table = 'frespuestas';
    protected $fillable = [
    	'proyecto_id','user_id','respuesta'
    ];

    public function user(){
    	return $this->belongsto('App\User');
    }
    public function proyecto(){
        return $this->belongsto('App\Proyecto');
    }
    
}
