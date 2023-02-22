<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(LogAcessoMiddleware::class)->apiResource('usuario','App\Http\Controllers\UsuarioController'); // Realizar Cadastro -- Cadastrar o usuário -- Create
Route::middleware(LogAcessoMiddleware::class)->post('login',['App\Http\Controllers\UsuarioController','login']); // Realizar Login -- Autenticar o usuário -- Select

Route::middleware(LogAcessoMiddleware::class)->apiResource('processador','App\Http\Controllers\ProcessadorController'); // Manter Processador -- CRUD de processadores

Route::middleware(LogAcessoMiddleware::class)->apiResource('computador','App\Http\Controllers\ComputadorController'); // Manter Computador (Criar Computador; Associar Computador) -- CRUD de computadores
Route::middleware(LogAcessoMiddleware::class)->apiResource('configuracao','App\Http\Controllers\ConfiguracaoController'); // Manter Computador (Listar Computador) -- CRUD de computadores
// Manter Computador -> Resgatar dados de componentes para auxiliar o CRUD se necessário
Route::middleware(LogAcessoMiddleware::class)->apiResource('fonte_de_energia','App\Http\Controllers\FonteDeEnergiaController');
Route::middleware(LogAcessoMiddleware::class)->apiResource('armazenamento','App\Http\Controllers\ArmazenamentoController');
Route::middleware(LogAcessoMiddleware::class)->apiResource('gabinete','App\Http\Controllers\GabineteController');
Route::middleware(LogAcessoMiddleware::class)->apiResource('memoria_ram','App\Http\Controllers\MemoriaRAMController');
Route::middleware(LogAcessoMiddleware::class)->apiResource('placa_mae','App\Http\Controllers\PlacaMaeController');
