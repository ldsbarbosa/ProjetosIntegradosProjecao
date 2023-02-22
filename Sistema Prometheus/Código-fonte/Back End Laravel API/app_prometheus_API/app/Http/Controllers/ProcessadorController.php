<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processador;
use App\Http\Requests\StoreProcessadorRequest;
use App\Http\Requests\UpdateProcessadorRequest;
use App\Repositories\ProcessadorRepository;

class ProcessadorController extends Controller
{
    public function __construct(Processador $processador){
        $this->processador = $processador;
    }
    public function index(Request $request)
    {
        $processador_repository = new ProcessadorRepository($this->processador);

        if($request->has('filtro') && $request->filtro != ''){
            $processador_repository->filtro($request->filtro);
        }

        if($request->has('atributos')  && $request->atributos != ''){
            $processador_repository->selectAtributos($request->atributos);
        }

        return response()->json($processador_repository->getResultado(), 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->processador->rules(),$this->processador->feedback());
        $processador = $this->processador->create([
            'nome' => $request->nome,
            'marca' => $request->marca,
            'qtd_nucleos' => $request->qtd_nucleos,
            'qtd_threads' => $request->qtd_threads,
            'preco' => $request->preco
        ]);
        return response()->json($processador, 201);
    }

    public function update(Request $request, $id)
    {
        $metodo = '';
        $processador = $this->processador->find($id);
        if($processador === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }

        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($processador->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$processador->feedback());
            $metodo = 'PATCH';
        }else{
            $request->validate($processador->rules(),$processador->feedback());
            $metodo = 'PUT';
        }
        $processador->fill($request->all());
        $processador->save();
        return response()->json(['msg' => "O processador foi atualizado com sucesso por meio do método $metodo!"], 200);
    }

    public function destroy($id)
    {
        $processador = $this->processador->find($id);
        if($processador === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $processador->delete();
        return response()->json(['msg' => 'A processador de verdadeiro ou falso foi removida com sucesso!'], 200);
    }
}
