<?php

namespace App\Http\Controllers;

use App\Models\Palabras;
use Illuminate\Http\Request;
use DB;

class GestionPalabrasController extends Controller
{

    public function index()
    {
        $palabras = DB::table('palabras')
        ->select('palabras.id_palabra','palabras.nombre','categoria.id_categoria','categoria.nombre AS NombreCategoria')
        ->join('categoria','categoria.id_categoria','=','palabras.id_categoria')
        ->get();

        $Categoria = DB::table('categoria')
        ->select('nombre','id_categoria')
        ->get();

        return view('palabras.index',['Categoria'=>$Categoria,'palabras'=>$palabras]);
    }


    public function create()
    {
 
    }

 
    public function store(Request $request)
    {
        $palabra = new Palabras();
        $palabra->id_palabra  = request('id_palabra');
        $palabra->nombre  = strtoupper(request('nombre'));
        $palabra->id_categoria  = request('id_categoria');
        $palabra->save();
        return redirect('/gestionpalabras');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        $palabra = Palabras::findOrFail($id);
        $palabra->nombre  = strtoupper(request('nombre'));
        $palabra->id_categoria  = request('id_categoria');
        $palabra->update();
        return redirect('/gestionpalabras');
    }


    public function destroy($id)
    {
        $palabra = Palabras::find($id);
        $palabra->delete();
        return redirect('/gestionpalabras');
    }
}
