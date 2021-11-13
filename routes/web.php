<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChavitoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

require __DIR__.'/auth.php';

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
Route::get('/cu/{id}', [CarrinhoController::class, 'destroy']);

Route::get('/Pedido/{slug}', [PedidoController::class, 'create'])->middleware(['auth'])->name('pedido_new');
Route::post('/add-carrinho', [PedidoController::class, 'store'])->middleware(['auth'])->name('carrinho_add');
//Route::post('/Pedido/{slug}', [PedidoController::class, 'store'])->name('pedido');

Route::get('/success', function(){
    return view('success');
});

Route::get('/failure', function(){
    return view('failure');
});

Route::get('/pending', function(){
    return view('pending');
});


Route::get('/Pagamento', function(){
    return view('pagamento');
})->middleware(['auth']);

Route::get('admin', [AdminController::class, 'index'])->middleware(['auth']);