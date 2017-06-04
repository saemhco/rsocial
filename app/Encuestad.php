<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestad extends Model
{
    protected $table = 'encuestads';
    protected $fillable = [
      	'encuesta_id','user_id','ed_i_i','ed_i_ii'
            ,'ed_i_iii'
            ,'ed_i_iv'
            ,'ed_i_v'
            ,'ed_i_vi'
            ,'ed_i_vii'
            ,'ed_i_viii'
            ,'ed_i_ix'
            ,'ed_i_x'
            ,'ed_i_xi'
            ,'ed_i_xii'
            ,'ed_i_xiii'
            ,'ed_i_xiv'
            ,'ed_i_xv'
            ,'ed_i_xvi'
            ,'ed_i_xvii'
            ,'ed_i_xviii'
            ,'ed_i_xix'
            ,'ed_i_xx'

            ,'ed_ii_i'
            ,'ed_ii_ii'
            ,'ed_ii_iii'
            ,'ed_ii_iv'
            ,'ed_ii_v'
            ,'ed_ii_vi'
            ,'ed_ii_vii'
            ,'ed_ii_viii'
            ,'ed_ii_ix'
            ,'ed_ii_x'

            ,'ed_iii_i'
            ,'ed_iii_ii'
            ,'ed_iii_iii'
            ,'ed_iii_iv'
            ,'ed_iii_v'
            ,'ed_iii_vi'
            ,'ed_iii_vii'
            ,'ed_iii_viii'
            ,'ed_iii_ix'
            ,'ed_iii_x'
            ,'ed_iii_xi'
            ,'ed_iii_xii'
            ,'ed_iii_xiii'
            ,'ed_iii_xiv'
            ,'ed_iii_xv'
            ,'ed_iii_xvi'
            ,'ed_iii_xvii'
            ,'ed_iii_xviii'
            ,'ed_iii_xix'
            ,'ed_iii_xx'
    ];
    public function encuesta(){
    	return $this->belongsto('App\Encuesta','encuesta_id');
    }
    public function user(){
    	return $this->belongsto('App\User','user_id');
    }
    public function cursoeds(){
        return $this->hasMany('App\Cursoed');
    }
}
