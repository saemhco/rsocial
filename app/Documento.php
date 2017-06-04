<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
      	'proyecto_id','version','archivo'
    ];
    public function proyecto(){
    	return $this->belongsto('App\Proyecto','proyecto_id');
    }
}
