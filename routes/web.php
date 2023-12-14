<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index', [HomeController::class, 'index'])->name('aula.index');



Route::get('index/cliente', [ClienteController::class, 'show'])->name('cliente.show');

Route::post('index/cliente/crear', [ClienteController::class, 'store'])->name('cliente.store');

Route::get('index/cliente/{cliente}/edit', [ClienteController::class, 'edit'])->name('cliente.edit'); // me lleva al form de edit junto a los datos a editar

Route::put('index/cliente/{cliente}/edit/update', [clienteController::class, 'update'])->name('cliente.update'); // actualiza en la BD los cambios

Route::delete('index/cliente/{cliente}/delete', [ClienteController::class, 'destroy'])->name('cliente.destroy'); // elimina en la BD los cambios


Route::get('index/producto', [ProductoController::class, 'show'])->name('producto.show');

Route::post('index/producto/crear', [ProductoController::class, 'store'])->name('producto.store');

Route::get('index/producto/{producto}/edit', [ProductoController::class, 'edit'])->name('producto.edit');

Route::put('index/producto/{producto}/edit/update', [ProductoController::class, 'update'])->name('producto.update');

Route::delete('index/producto/{producto}/delete', [ProductoController::class, 'destroy'])->name('producto.destroy');


Route::get('pedidos', [PedidosController::class, 'index'])->name('pedidos.index');

Route::post('pedidos/store', [PedidosController::class, 'store'])->name('pedidos.store');

Route::post('pedidos/actualizar-estado/{pedido}', [PedidosController::class, 'cambiarEstado'])->name('pedidos.cambiarEstado');

Route::get('index/pedidos/{pedido}/edit', [PedidosController::class, 'edit'])->name('pedidos.edit');

Route::put('index/pedidos/{pedido}/edit/update', [PedidosController::class, 'update'])->name('pedidos.update');

Route::delete('pedidos/{pedido}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');
