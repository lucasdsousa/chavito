<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function show($id, Request $request)
    {
        $uri = $request->getRequestUri();
        $uri_name = substr($uri, 11);
        $cat_id = DB::table('categorias')->where('nomeCategoria', substr($uri, 11))->first();
        $chav = DB::table('chavitos')->where('categoriaID', $cat_id->id)->get();

        return view('produtos_categoria', compact('chav'));
    }
}
