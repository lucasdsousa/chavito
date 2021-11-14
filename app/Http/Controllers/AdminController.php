<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chavito;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new User();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->user_type = "ADMIN";

        $admin->save();

        return redirect()->route('admin.administradores');
    }

    public function createChavito()
    {
        return view('admin.new-chavito');
    }

    public function storeChavito(Request $request)
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admins = User::get();

        return view('admin.admins', compact('admins'));
    }

    public function showChavitos()
    {
        $chavitos = DB::table('chavitos')->get();

        return view('admin.chavitos', compact('chavitos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin, $id)
    {
        $admin = User::find($id);

        return view('admin.edit-admin', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin, $id)
    {
        $admin = User::find($id);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->user_type = "ADMIN";

        $admin->save();

        return redirect()->route('admin.administradores');
    }

    public function editChavito(Chavito $chavito, $id)
    {
        $chavito = Chavito::find($id);

        return view('admin.edit-chavito', compact('chavito'));
    }

    public function updateChavito(Request $request, Chavito $chavito, $id)
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, $id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.administradores');
    }

    public function destroyChavito(Chavito $chavito, $id)
    {
        Chavito::find($id)->delete();

        return redirect()->route('admin.chavitos');
    }

    public function showPedidos()
    {
        return view('admin.pedidos');
    }
}
