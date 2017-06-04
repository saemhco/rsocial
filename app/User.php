<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','dni', 'email', 'password','foto','sexo','tipo','estado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function admin() {
      return $this->hasOne('App\Admin');
    }
    public function estudiante() {
      return $this->hasOne('App\Estudiante','user_id', 'id');
      //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
    }
    public function docente() {
      return $this->hasOne('App\Docente');
    }
    public function frespuesta(){
        return $this->hasMany('App\Frespuesta');
    }
    public function foro(){
        return $this->hasMany('App\Foro');
    }
    public function encuestads(){
        return $this->hasMany('App\Encuestad');
    }
    public function setPasswordAttribute($valor){
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::Make($valor);
        }
    }
}
