<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Chavito;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercadoPago;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp;
use GuzzleHttp\Client;


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
        $token = 'APP_USR-8734955682398657-091822-65c28dbb1394c5743927bf9a4ab19a53-69839783';
        $client = new GuzzleHttp\Client();

        $pedido = new Pedido();

        //DB::table('pedidos')->where('user_id', Auth::id())->update(['status' => 'PA']);
        
        $items = DB::table('pedidos')->where('user_id', Auth::id())->where('status', 'RE');
        //$items->update(['status' => 'PEND']);

        require $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';

        // Adicione as credenciais
        MercadoPago\SDK::setAccessToken($token);

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();
        
        // Cria um item na preferência
        
        $preference->back_urls = array(
            "success" => "http://localhost:8000/success",
            "failure" => "http://localhost:8000/failure",
            "pending" => "http://localhost:8000/pending"
        );
        $preference->auto_return = "approved";
        
        $item = new MercadoPago\Item();
        $item->title = "Chavito"; //$produto->title;
        $item->quantity = $items->get()->sum('quantidade'); //$request->input('quantidade');
        $item->unit_price = $items->get()->sum('valor'); //$produto->valor;
        $preference->items = array($item);
        $preference->save();

        print_r($item->title);

        //return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho)
    {
        $token = 'APP_USR-8734955682398657-091822-65c28dbb1394c5743927bf9a4ab19a53-69839783';
        $public_key = 'APP_USR-ec7ed96d-c98c-49af-978a-81232df78f9d';

        $user_id = Auth::id();
        
        $items = DB::table('pedidos')->where('user_id', $user_id)->where('status', 'RE')->get();

        require $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';

        // Adicione as credenciais
        MercadoPago\SDK::setAccessToken($token);

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();
        
        // Cria um item na preferência        
        $item = new MercadoPago\Item();
        $item->title = "Chavito"; //$produto->title;
        $item->quantity = sizeof($items) == 0 ? 1 : $items->sum('quantidade'); //$request->input('quantidade');
        $item->unit_price = sizeof($items) == 0 ? 0.01 : $items->sum('valor'); //$produto->valor;
        $preference->items = array($item);
        $preference->save();
        
        $preference->back_urls = array(
            "success" => "http://localhost:8000/success",
            "failure" => "http://localhost:8000/failure",
            "pending" => "http://localhost:8000/pending"
        );

        $preference->auto_return = "approved";

        return view('carrinho', compact('user_id', 'items', 'preference', 'public_key'));
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
    public function destroy(Carrinho $carrinho, $id)
    {
        $item = DB::table('pedidos')->where('id', $id)->delete();

        return redirect()->route('carrinho');
    }
}
