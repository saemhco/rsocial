<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admins';
	protected $primaryKey = "user_id";
    protected $fillable = [
      	'user_id'
    ];
    
    public function user(){
    	return $this->belongsto('App\User','user_id');
    }
}
