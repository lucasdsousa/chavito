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
        $token = 'TEST-8321604311384550-102920-d200b79d81f94c808c742037c07a8521-69839783';
        $client = new GuzzleHttp\Client();

        $pedido = new Pedido();

        DB::table('pedidos')->where('user_id', Auth::id())->update(['status' => 'P
        A']);
        
        $items = DB::table('pedidos')->where('user_id', Auth::id())->where('status', 'RE')->get();

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
        $item->quantity = $items->sum('quantidade'); //$request->input('quantidade');
        $item->unit_price = $items->sum('valor'); //$produto->valor;
        $preference->items = array($item);
        $preference->save();

        print_r($item->title);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho)
    {
        $user_id = Auth::id();
        $items = DB::table('pedidos')->where('user_id', $user_id)->where('status', 'RE')->get();

        return view('carrinho', compact('user_id', 'items'));
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
