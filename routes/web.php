<?php

Auth::routes();

use App\area;
use App\rol;
use App\answer;

Route::get('/', function () {
	$areas = area::all();
	$roles = rol::all();
	if(!empty(Auth::user())){
		$respuestas = answer::where('user_id','=',Auth::user()->id)->get();
    return view('auth/my_register_login')
    ->with('areas',$areas)
    ->with('roles',$roles)
    ->with('respuestas',$respuestas);
	}else{
		return view('auth/my_register_login')
	    ->with('areas',$areas)
	    ->with('roles',$roles);
	}

});

Route::get('encuesta', 'HomeController@index')->name('home');

Route::post('respuesta', 'HomeController@storeAnswer')->name('storeAnswer');

Route::post('registrar', 'usuariosController@userpeople')->name('userpeople');

Route::group(['prefix' => 'admin'],function(){
	// Route::resource('usuarios','usuariosController');
	Route::resource('preguntas','preguntasController');

});
