<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\poll;
use App\answer;
use App\user;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $preguntas = poll::orderBy('created_at','desc')->paginate('5');
        return view('cuestionario')->with('preguntas',$preguntas);
    }

    public function storeAnswer(Request $request)
    {
        // $respuesta = answer::create([
        //     'answer'        =>  $request->respuesta,
        //     'status'        =>  $request->status,
        //     'radios'        =>  $request->radios,
        //     'user_id'       =>  $request->user_id,
        //     'poll_id'       =>  $request->poll_id,
        //     'area_id'       =>  $request->area_id
        // ]);
        return redirect('/');
    }
}
