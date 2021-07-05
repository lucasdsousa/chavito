<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp;
use GuzzleHttp\Client;
use MercadoPago;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(String $slug)
    {

        $token = 'TEST-8321604311384550-102920-d200b79d81f94c808c742037c07a8521-69839783';

        $chav = DB::table('chavitos')->where('slug', '=', $slug)->get()->first();

        require $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';
        // Adicione as credenciais
        MercadoPago\SDK::setAccessToken($token);
        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();
        
        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = $chav->title;
        $item->quantity = 1;
        $item->unit_price = $chav->valor;
        $preference->items = array($item);
        $preference->save();

        return view('form_pedido', compact('chav', 'slug', 'preference', 'token'));
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

        $validator = Validator::make($request->all(), [
            'image' => 'required'
        ]);

        if ($validator->fails()){
            return redirect('/Pedido')->withErrors($validator);
        }

        $produto_id = $request->input('chav_id');
        $produto = DB::table('chavitos')->where('id', $produto_id)->get()->first();

        $pedido = new Pedido();

        $pedido->user_id = Auth::id();
        $pedido->image = $request->input('image');
        $pedido->modelo = $request->input('modelo');
        $pedido->valor = $request->input('valor');
        $pedido->quantidade = $request->input('quantidade');
        $pedido->status = "RE";

        $pedido->save();

        //redirect()->route('dashboard');

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
        $item->title = $produto->title;
        $item->quantity = $request->input('quantidade');
        $item->unit_price = $produto->valor;
        $preference->items = array($item);
        $preference->save();

        return view('pagamento', compact('token', 'client', 'preference'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
