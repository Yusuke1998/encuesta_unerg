<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // protected $table = 'people';

    protected $fillable = [
        'name', 'email', 'password', 'person_id', 'role_id',
    ];

    public function person(){
        return $this->belongsTo('App\person');
    }

    public function rol(){
        return $this->belongsTo('App\rol','role_id');
    }

    public function answer(){
        return $this->hasOne('App\answer');
    }

    public function polls(){
        return $this->belongsToMany('App\poll');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
