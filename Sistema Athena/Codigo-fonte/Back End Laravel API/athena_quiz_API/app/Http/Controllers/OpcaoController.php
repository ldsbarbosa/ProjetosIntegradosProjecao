<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opcao;
use App\Http\Requests\StoreOpcaoRequest;
use App\Http\Requests\UpdateOpcaoRequest;
use App\Repositories\OpcaoRepository;

class OpcaoController extends Controller
{
    public function __construct(Opcao $opcao){
        $this->opcao = $opcao;
    }

    public function index(Request $request)
    {
        $opcao_repository = new OpcaoRepository($this->opcao);

        /*
        if($request->has('atributos_pergunta')){
            $atributos_pergunta = 'perguntas:id,'.$request->atributos_pergunta;
            $opcao_repository->selectAtributosTabelaFilha($atributos_pergunta);
        }else{
            $opcao_repository->selectAtributosTabelaFilha('pergunta');
        }
        */
        if($request->has('filtro') && $request->filtro != ''){
            $opcao_repository->filtro($request->filtro);
        }

        if($request->has('atributos')  && $request->atributos != ''){
            $opcao_repository->selectAtributos($request->atributos);
        }

        return response()->json($opcao_repository->getResultado(), 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->opcao->rules(),$this->opcao->feedback());

        $opcao = $this->opcao->create([
            'pergunta_id' => $request->pergunta_id,
            'nome_opcao' => $request->nome_opcao
        ]);
        
        return response()->json($opcao, 201);
    }

    /*
    public function show($id)
    {
        $opcao = $this->opcao->with('pergunta')->find($id);
        if($opcao === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($opcao, 200);
    }
    */

    public function update(Request $request, $id)
    {
        $opcao = $this->opcao->find($id);
        if($opcao === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($opcao->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$opcao->feedback());
        }else{
            $request->validate($opcao->rules(),$opcao->feedback());
        }

        $opcao->fill($request->all());
        $opcao->save();
        return response()->json($opcao, 200);
    }

    public function destroy($id)
    {
        $opcao = $this->opcao->find($id);
        if($opcao === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $opcao->delete();
        return response()->json(['msg' => 'A opcao foi removida com sucesso!'], 200);
    }
}
