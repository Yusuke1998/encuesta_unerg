<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poll extends Model
{
    protected $fillable = [
        'question', 'text', 'type',
    ];

    public function answers(){
    	return $this->hasMany('App\answer');
    }

    public function scopeRrespuesta($query, $id_pregunta){
    	return $query->where('users.id','=','answers.user_id');
    }
}
