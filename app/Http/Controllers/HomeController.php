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
        $tope = count($request->user_id);
        // dd(count($tope));

        for ($i=0; $i <= $tope-1; $i++) { 
            
            $resp       = $request->respuesta[$i];
            $est        = $request->status[$i];
            $rad        = $request->radios[$i];
            $userid     = $request->user_id[$i];
            $pollid     = $request->poll_id[$i];
            $areaid     = $request->area_id[$i];
            $created    = date('Y-m-d H:m:s');

        DB::insert("INSERT INTO answers (answer,status,radios,user_id,poll_id,area_id,created_at) VALUES ('$resp','$est','$rad','$userid','$pollid','$areaid','$created')");    
        }

        return redirect('/');
    }
}
