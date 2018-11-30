<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poll extends Model
{
    protected $fillable = [
        'question', 'text', 'type',
    ];

    public function answer(){
    	return $this->hasOne('App\answer');
    }

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
