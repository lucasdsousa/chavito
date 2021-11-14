<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Chavito;
use App\Models\User;
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

        $token = 'APP_USR-8734955682398657-091822-65c28dbb1394c5743927bf9a4ab19a53-69839783';

        $chav = DB::table('chavitos')->where('slug', '=', $slug)->get()->first();

        require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

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

        $token = 'APP_USR-8734955682398657-091822-65c28dbb1394c5743927bf9a4ab19a53-69839783';
        $client = new GuzzleHttp\Client();

        $validator = Validator::make($request->all(), [
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/Pedido')->withErrors($validator);
        }

        $produto_id = $request->input('chav_id');
        $produto = DB::table('chavitos')->where('id', $produto_id)->get()->first();

        $pedido = new Pedido();

        $pedido->user_id = Auth::id();
        $pedido->image = $request->file('image')->store('images/Pedidos', 'public');
        $pedido->modelo = $request->input('modelo');
        $pedido->pingente = "NAO"; //$request->input('pingente');
        $pedido->valor = $request->input('valor');
        $pedido->quantidade = 1; //$request->input('quantidade');
        $pedido->status = "RE";
        $pedido->enviado = "N";

        $pedido->save();

        return redirect()->route('carrinho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $pedidos = Pedido::get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos', compact('pedidos', 'user'));
    }

    public function aprovados(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')->where('status', 'AP')->get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos-aprovados', compact('pedidos', 'user'));
    }

    public function aprovacao(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')->where('status', 'RE')->get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos-aprovacao', compact('pedidos', 'user'));
    }

    public function envio(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')->where('enviado', 'N')->get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos-envio', compact('pedidos', 'user'));
    }

    public function enviados(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')->where('enviado', 'S')->get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos-enviados', compact('pedidos', 'user'));
    }

    public function cancelados(Pedido $pedido)
    {
        $pedidos = DB::table('pedidos')->where('status', 'CA')->get();
        $user = User::where('id', $pedido->user_id);

        return view('admin.pedidos-cancelados', compact('pedidos', 'user'));
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

    public function aprovar(Request $request, Pedido $pedido, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->status = "AP";
        $pedido->save();

        return redirect()->route('admin.pedidos');
    }

    public function enviar(Request $request, Pedido $pedido, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->enviado = "S";
        $pedido->save();

        return redirect()->route('admin.pedidos');
    }

    public function cancelar(Request $request, Pedido $pedido, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->status = "CA";
        $pedido->save();

        return redirect()->route('admin.pedidos');
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
