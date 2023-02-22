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
// 127.0.0.1/api/login -
Route::middleware(LogAcessoMiddleware::class)->post('login',['App\Http\Controllers\UsuarioController','login']); // Realizar Login -- Autenticar o usuário -- Select

Route::middleware(LogAcessoMiddleware::class)->apiResource('tentativa','App\Http\Controllers\TentativaController'); // Responder Pergunta -- Ler uma tentativa, várias tentativas ou tentar
Route::middleware(LogAcessoMiddleware::class)->apiResource('pergunta','App\Http\Controllers\PerguntaController'); // Manter Pergunta -- CRUD de perguntas
Route::middleware(LogAcessoMiddleware::class)->apiResource('prova','App\Http\Controllers\ProvaController'); // Manter Pergunta -> Resgatar dados de provas para auxiliar o CRUD
Route::middleware(LogAcessoMiddleware::class)->apiResource('disciplina','App\Http\Controllers\DisciplinaController'); // Manter Pergunta -> Resgatar dados de provas para auxiliar o CRUD