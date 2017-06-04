<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = "user_id";
    protected $fillable = [
      	'user_id','f_nac','f_ing'
    ];
    
    public function user(){
    	return $this->belongsto('App\User');
    }
}
