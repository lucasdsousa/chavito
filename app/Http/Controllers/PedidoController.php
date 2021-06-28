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

        require $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';

        MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');    

        $pedido = new Pedido();

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();

        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = 'Meu produto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();

        $image = DB::table('images')->where('slug', '=', $slug)->get()->first();

        return view('form_pedido', compact('image', 'slug', 'preference'));
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

        $pedido->user = Auth::id();
        $pedido->image = $request->file('image')->store('imagem_pedido', 'public');
        $pedido->modelo = $request->input('modelo');
        $pedido->valor = $request->input('valor');

        /* $payment = $client->request('POST', 'https://api.mercadopago.com/merchant_orders', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ],
            'json' => [
                "external_reference" => "default",
                "preference_id" => "Preference identification",
                "payer" => [
                  "id" => 123,
                  "nickname" => "JOHN"
                ],
                "site_id" => "MLA",
                "items" => [
                  [
                    "id" => "item id",
                    "category_id" => "item category",
                    "currency_id" => "BRL",
                    "description" => "item description",
                    "picture_url" => "item picture",
                    "quantity" => 1,
                    "unit_price" => 5,
                    "title" => "item title"
                  ]
                ],
                "application_id" => 10000000000000000
              ]
        ]); */

        /* $payment = $client->request('POST', 'https://api.mercadopago.com/v1/payments', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ],
            'json' => [
                "additional_info" => [
                  "items" => [
                    [
                      "id" => "PR0001",
                      "title" => "Point Mini",
                      "description" => "Producto Point para cobros con tarjetas mediante bluetooth",
                      "picture_url" => "https://http2.mlstatic.com/resources/frontend/statics/growth-sellers-landings/device-mlb-point-i_medium@2x.png",
                      "category_id" => "electronics",
                      "quantity" => 1,
                      "unit_price" => 58.8
                    ]
                  ],
                  "payer" => [
                    "first_name" => "Test",
                    "last_name" => "Test",
                    "phone" => [
                      "area_code" => 11,
                      "number" => "987654321"
                    ],
                    "address" => []
                  ],
                  "shipments" => [
                    "receiver_address" => [
                      "zip_code" => "12312-123",
                      "state_name" => "Rio de Janeiro",
                      "city_name" => "Buzios",
                      "street_name" => "Av das Nacoes Unidas",
                      "street_number" => 3003
                    ]
                  ],
                  "barcode" => []
                ],
                "description" => "Payment for product",
                "external_reference" => "MP0001",
                "installments" => 1,
                "metadata" => [],
                "order" => [
                  "type" => "mercadolibre"
                ],
                "payer" => [
                  "entity_type" => "individual",
                  "type" => "customer",
                  "identification" => [],
                  "phone" => []
                ],
                "payment_method_id" => "visa",
                "transaction_amount" => 58.8
              ]
        ]); */

        $pedido->save();

        return redirect()->route('dashboard');
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
