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

        return view('index', compact('chav'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function show(Chavito $chavito)
    {        
        $chav = DB::table('chavitos')->get();
    
        return view('catalogo', compact('chav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function edit(Chavito $chavito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chavito $chavito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chavito  $chavito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chavito $chavito)
    {
        //
    }
}
