<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $palabras = DB::table('categoria')
        ->select('id_categoria','nombre')
        ->get();

        return view('home',['palabras'=>$palabras]);
    }
}
