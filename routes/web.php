<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

require __DIR__.'/auth.php';

Route::get('/alterar-cadastro/{id}', [RegisteredUserController::class, 'edit'])->name('alterar-cadastro');
Route::post('/alterar-cadastro/{id}', [RegisteredUserController::class, 'update']);

Route::get('/endereco', [EnderecoController::class, 'create'])->middleware(['auth'])->name('endereco');
Route::get('/alterar-endereco/{id}', [EnderecoController::class, 'edit'])->name('alterar-endereco');
Route::get('/apagar-endereco/{id}', [EnderecoController::class, 'destroy'])->name('apagar-endereco');
Route::post('/alterar-endereco/{id}', [EnderecoController::class, 'update']);
Route::post('/endereco', [EnderecoController::class, 'store']);


Route::get('/', [ImageController::class, 'show']);
Route::get('/Catalogo', [ImageController::class, 'catalogo']);
Route::get('/Do-seu-jeito', function(){return view('personalizar');});

Route::get('/Pedido/{slug}', [PedidoController::class, 'create'])->middleware(['auth'])->name('pedido_new');
Route::post('/Pedido/{slug}', [PedidoController::class, 'store'])->name('pedido');

Route::get('/Pagamento', function(){
    return view('pagamento')->name('pagamento');
});
