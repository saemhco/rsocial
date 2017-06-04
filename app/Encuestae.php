<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestae extends Model
{
   protected $fillable = [
      	'encuesta_id','user_id'
            ,'ee_i_i'
            ,'ee_i_ii'
            ,'ee_i_iii'
            ,'ee_i_iv'
            ,'ee_i_v'
            ,'ee_i_vi'
            ,'ee_i_vii'
            ,'ee_i_viii'
            ,'ee_i_ix'
            ,'ee_i_x'
            ,'ee_i_xi'
            ,'ee_i_xii'
            ,'ee_i_xiii'
            ,'ee_i_xiv'
            ,'ee_i_xv'
            ,'ee_i_xvi'
            ,'ee_i_xvii'
            ,'ee_i_xviii'

            ,'ee_ii_i'
            ,'ee_ii_ii'
            ,'ee_ii_iii'
            ,'ee_ii_iv'
            ,'ee_ii_v'
            ,'ee_ii_vi'
            ,'ee_ii_vii'
            ,'ee_ii_viii'
            ,'ee_ii_ix'
            ,'ee_ii_x'

            ,'ee_iii_i'
            ,'ee_iii_ii'
            ,'ee_iii_iii'
            ,'ee_iii_iv'
            ,'ee_iii_v'
            ,'ee_iii_vi'
            ,'ee_iii_vii'
            ,'ee_iii_viii'
            ,'ee_iii_ix'
            ,'ee_iii_x'
            ,'ee_iii_xi'
            ,'ee_iii_xii'
            ,'ee_iii_xiii'
            ,'ee_iii_xiv'
            ,'ee_iii_xv'
            ,'ee_iii_xvi'
            ,'ee_iii_xvii'
            ,'ee_iii_xviii'
            ,'ee_iii_xix'
            ,'ee_iii_xx'
            ,'ee_iii_xxi'
            ,'ee_iii_xxii'
            ,'ee_iii_xxiii'

            ,'ee_iv_i'
            ,'ee_iv_ii'
            ,'ee_iv_iii'
            ,'ee_iv_iv'
            ,'ee_iv_v'
            ,'ee_iv_vi'
            ,'ee_iv_vii'
            ,'ee_iv_viii'
            ,'ee_iv_ix'
            ,'ee_iv_x'
    ];
    public function encuesta(){
    	return $this->belongsto('App\Encuesta','encuesta_id');
    }
    public function user(){
    	return $this->belongsto('App\User','user_id');
    }
    public function cursoees(){
        return $this->hasMany('App\Cursoee');
    }
}
