<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Chavito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercadoPago;


class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carrinho');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $produto_id = $request->input('chav_id');
        $pedido_img = $request->file('image')->store('images', 'public');
        $produto = DB::table('chavitos')->where('id', $produto_id)->get()->first();

        return view('carrinho', compact('produto', 'pedido_img'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrinho $carrinho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrinho $carrinho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrinho $carrinho)
    {
        //
    }
}
