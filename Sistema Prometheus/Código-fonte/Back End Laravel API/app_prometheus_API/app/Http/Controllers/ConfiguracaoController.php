<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use App\Http\Requests\StoreConfiguracaoRequest;
use App\Http\Requests\UpdateConfiguracaoRequest;
use App\Repositories\ConfiguracaoRepository;

class ConfiguracaoController extends Controller
{
    public function __construct(Configuracao $configuracao){
        $this->configuracao = $configuracao;
    }
    /*
    public function index(Request $request) 
    {
        $configuracao_repository = new ConfiguracaoRepository($this->configuracao);
    }

    public function show()
    {
        //
    }
    */
    public function store(Request $request) // Associar Computador -> Listará somente os computadores associados à um usuário
    {
        $request->validate($this->configuracao->rules(),$this->configuracao->feedback());
        $configuracao = $this->configuracao->create([
            'usuario_id' => $request->usuario_id,
            'computador_id' => $request->computador_id,
        ]);
        return response()->json($configuracao, 201);
    }

    /*
    public function show(Configuracao $configuracao)
    {
        //
    }

    public function update(UpdateConfiguracaoRequest $request, Configuracao $configuracao)
    {
        //
    }

    public function destroy(Configuracao $configuracao)
    {
        //
    }
    */
}
