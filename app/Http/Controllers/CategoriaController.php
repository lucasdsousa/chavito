<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function show($id)
    {
        $cats = DB::table('categorias')->where('id', $id)->get();
        $chav = DB::table('chavitos')->where('categoriaID', $id)->get();
        
        foreach($chav as $c) {
            print_r($c->title);
        }

        return view('produtos_categoria', compact('cats', 'chav'));
    }
}
