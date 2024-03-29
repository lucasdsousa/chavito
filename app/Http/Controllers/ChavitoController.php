<?php

namespace App\Http\Controllers;

use App\Models\Chavito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChavitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chav = DB::table('chavitos')->get();
        $cats = DB::table('categorias')->get();

        return view('index', compact('chav', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new-chavito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chav = new Chavito();

        $chav->title = $request->input('modelo');
        $chav->descricao = $request->input('descricao');
        $chav->valor = $request->input('valor');
        $chav->slug = $request->input('slug');
        $chav->image_name = $request->file('image')->store('images/Chavitos', 'public');
        $chav->save();

        return redirect()->route('admin.chavitos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function show(Chavito $chavito, Request $request)
    {
        $uri = $request->getRequestUri();

        $chav = DB::table('chavitos')->get();
        //$chav = DB::table('chavitos')->where('id', '<=', '21')->paginate(9);
        $chav3 = DB::table('chavitos')->whereBetween('id', ['22', '27'])->get();
        $chav4 = DB::table('chavitos')->whereBetween('id', ['27', '35'])->get();
        $chav5 = DB::table('chavitos')->whereBetween('id', ['36', '38'])->get();

        return view('catalogo', compact('chav', 'chav3', 'chav4', 'chav5', 'uri'));
        //return redirect()->route('catalogo', ['page' => 1])->with('chav', $chav);
    }

    public function showChavitosAdmin()
    {
        $chavitos = DB::table('chavitos')->get();

        return view('admin.chavitos', compact('chavitos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function edit(Chavito $chavito, $id)
    {
        $chavito = Chavito::find($id);

        return view('admin.edit-chavito', compact('chavito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chavito $chavito, $id)
    {
        $chav = Chavito::find($id);

        $chav->title = $request->input('modelo');
        $chav->descricao = $request->input('descricao');
        $chav->valor = $request->input('valor');
        $chav->slug = $request->input('slug');
        $chav->image_name = $request->file('image')->store('images/Chavitos', 'public');
        $chav->save();

        return redirect()->route('admin.chavitos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chavito $chavito, $id)
    {
        Chavito::find($id)->delete();

        return redirect()->route('admin.chavitos');
    }
}
