<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ChavitoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Pedido;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';

Route::get('/alterar-cadastro/{id}', [RegisteredUserController::class, 'edit'])->name('alterar-cadastro');
Route::post('/alterar-cadastro/{id}', [RegisteredUserController::class, 'update']);

Route::get('/endereco', [EnderecoController::class, 'create'])->middleware(['auth'])->name('endereco');
Route::get('/alterar-endereco/{id}', [EnderecoController::class, 'edit'])->name('alterar-endereco');
Route::get('/apagar-endereco/{id}', [EnderecoController::class, 'destroy'])->name('apagar-endereco');
Route::post('/alterar-endereco/{id}', [EnderecoController::class, 'update']);
Route::post('/endereco', [EnderecoController::class, 'store']);


Route::get('/', [ChavitoController::class, 'index'])->name('home');
Route::get('/Catalogo', [ChavitoController::class, 'show']);

/* Route::get('/Do-seu-jeito', function(){
    return view('personalizar');
}); */

//Route::get('/Carrinho', [CarrinhoController::class, 'index'])->middleware(['auth'])->name('carrinho');
Route::get('/Carrinho', [CarrinhoController::class, 'show'])->middleware(['auth'])->name('carrinho');
Route::post('/Comprar', [CarrinhoController::class, 'store'])->middleware(['auth'])->name('comprar');
Route::get('/Carrinho/{id}', [CarrinhoController::class, 'destroy']);

Route::get('/Pedido/{slug}', [PedidoController::class, 'create'])->middleware(['auth'])->name('pedido_new');
Route::post('/add-carrinho', [PedidoController::class, 'store'])->middleware(['auth'])->name('carrinho_add');
//Route::post('/Pedido/{slug}', [PedidoController::class, 'store'])->name('pedido');

Route::get('/success', function () {
    $pedido = Pedido::find($id);

    $pedido->pago = "S";
    $pedido->save();

    return redirect()->route('dashboard');
});

Route::get('/failure/{id}', function ($id) {
    $pedido = Pedido::find($id);

    $pedido->pago = "N";
    $pedido->save();

    return redirect()->route('dashboard');
});

Route::get('/pending', function () {
    $pedido = Pedido::find($id);

    $pedido->pago = "N";
    $pedido->save();

    return redirect()->route('dashboard');
});


Route::get('/Pagamento', function () {
    return view('pagamento');
})->middleware(['auth']);

Route::get('admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');

Route::get('admin/chavitos', [ChavitoController::class, 'showChavitosAdmin'])->middleware(['auth'])->name('admin.chavitos');
Route::get('admin/chavitos/novo', [ChavitoController::class, 'create'])->middleware(['auth']);
Route::post('admin/chavitos/novo', [ChavitoController::class, 'store'])->middleware(['auth'])->name('chavitos-novo');
Route::get('admin/chavitos/editar-{id}', [ChavitoController::class, 'edit'])->middleware(['auth']);
Route::post('admin/chavitos/editar-{id}', [ChavitoController::class, 'update'])->middleware(['auth'])->name('chavitos-editar');
Route::post('admin/chavitos/apagar-{id}', [ChavitoController::class, 'destroy'])->middleware(['auth'])->name('chavitos-apagar');

Route::get('admin/administradores', [AdminController::class, 'show'])->middleware(['auth'])->name('admin.administradores');
Route::get('admin/administradores/novo', [AdminController::class, 'create'])->middleware(['auth']);
Route::post('admin/administradores/novo', [AdminController::class, 'store'])->middleware(['auth'])->name('admin-novo');
Route::get('admin/administradores/editar-{id}', [AdminController::class, 'edit'])->middleware(['auth']);
Route::post('admin/administradores/editar-{id}', [AdminController::class, 'update'])->middleware(['auth'])->name('admin-editar');
Route::post('admin/administradores/apagar-{id}', [AdminController::class, 'destroy'])->middleware(['auth'])->name('admin-apagar');

Route::get('admin/pedidos', [PedidoController::class, 'show'])->middleware(['auth'])->name('admin.pedidos');
Route::get('admin/pedidos/aprovados', [PedidoController::class, 'aprovados'])->middleware(['auth'])->name('pedidos-aprovados');
Route::get('admin/pedidos/aprovacao', [PedidoController::class, 'aprovacao'])->middleware(['auth'])->name('pedidos-aprovacao');
Route::post('admin/pedidos/aprovar-{id}', [PedidoController::class, 'aprovar'])->middleware(['auth'])->name('pedidos-aprovar');
Route::post('admin/pedidos/produzir-{id}', [PedidoController::class, 'produzir'])->middleware(['auth'])->name('pedidos-produzir');
Route::get('admin/pedidos/producao', [PedidoController::class, 'produzindo'])->middleware(['auth'])->name('pedidos-producao');
Route::get('admin/pedidos/enviados', [PedidoController::class, 'enviados'])->middleware(['auth'])->name('pedidos-enviado');
Route::get('admin/pedidos/envio', [PedidoController::class, 'envio'])->middleware(['auth'])->name('pedidos-envio');
Route::post('admin/pedidos/enviar-{id}', [PedidoController::class, 'enviar'])->middleware(['auth'])->name('pedidos-enviar');
Route::post('admin/pedidos/cancelar-{id}', [PedidoController::class, 'cancelar'])->middleware(['auth'])->name('pedidos-cancelar');
Route::get('admin/pedidos/cancelados', [PedidoController::class, 'cancelados'])->middleware(['auth'])->name('pedidos-cancelados');
