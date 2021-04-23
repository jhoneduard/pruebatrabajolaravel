<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PalabrasController extends Controller
{

    public function index(Request $request)
    {

    }


    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $id_categoria = request('id_categoria');

        $informacionCategoria = DB::table('categoria')
        ->select('nombre','id_categoria')
        ->where('id_categoria','=',$id_categoria)
        ->get();


        $uno = request('uno');
        $dos = request('dos');
        $tres = request('tres');
        $cuatro = request('cuatro');
        $cinco = request('cinco');

        $seis = request('seis');
        $siete = request('siete');
        $ocho = request('ocho');
        $nueve = request('nueve');
        $diez = request('diez');

        $once = request('once');
        $doce = request('doce');

        $array = array($uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once,$doce);  


        $resultado = DB::table('palabras')
        ->select('nombre','id_categoria')
        ->where('id_categoria','=',$id_categoria)
        ->Where(function ($query) use($array) {
            for ($i = 0; $i < count($array); $i++){
               $query->orwhere('nombre', 'like',  '%' . $array[$i] .'%');
            }      
       })->get();

        $Cantidad = DB::table('palabras')
        ->select('nombre','id_categoria')
        ->where('id_categoria','=',$id_categoria)
        ->Where(function ($query) use($array) {
            for ($i = 0; $i < count($array); $i++){
               $query->orwhere('nombre', 'like',  '%' . $array[$i] .'%');
            }      
       })->count();


        return view('resultados',['resultado'=>$resultado,'Cantidad'=>$Cantidad,'informacionCategoria'=>$informacionCategoria]);
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        
    }
}
