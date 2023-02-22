<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Http\Requests\StoreProvaRequest;
use App\Http\Requests\UpdateProvaRequest;
use App\Repositories\ProvaRepository;

class ProvaController extends Controller
{
    public function __construct(Prova $prova){
        $this->prova = $prova;
    }

    public function index(Request $request)
    {
        $prova_repository = new ProvaRepository($this->prova);

        /*
        // Relacionamento Prova - Banca
        if($request->has('atributos_banca')){
            $atributos_banca = 'bancas:id,'.$request->atributos_banca;
            $prova_repository->selectAtributosTabelaFilha($atributos_banca);
        }else{
            $prova_repository->selectAtributosTabelaFilha('banca');
        }

        // Relacionamento Prova - Pergunta
        if($request->has('atributos_perguntas')){
            $atributos_perguntas = 'perguntas:id,'.$request->atributos_perguntas;
            $prova_repository->selectAtributosTabelaFilha($atributos_perguntas);
        }else{
            $prova_repository->selectAtributosTabelaFilha('perguntas');
        }

        if($request->has('filtro')){
            $prova_repository->filtro($request->filtro);
        }
        */

        if($request->has('atributos') && $request->atributos != ''){
            $prova_repository->selectAtributos($request->atributos);
        }

        return response()->json($prova_repository->getResultado(), 200);
    }

    /*
    public function store(Request $request)
    {
        $request->validate($this->prova->rules(),$this->prova->feedback());

        $prova = $this->prova->create([
            'banca_id' => $request->banca_id,
            'nome' => $request->nome
        ]);
        
        return response()->json($prova, 201);
    }

    public function show($id)
    {
        $prova = $this->prova->with('banca')->find($id);
        if($prova === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($prova, 200);
    }

    public function update(Request $request, $id)
    {
        $prova = $this->prova->find($id);
        if($prova === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($prova->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$prova->feedback());
        }else{
            $request->validate($prova->rules(),$prova->feedback());
        }

        $prova->fill($request->all());
        $prova->save();
        return response()->json($prova, 200);
    }

    public function destroy($id)
    {
        $prova = $this->prova->find($id);
        if($prova === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $prova->delete();
        return response()->json(['msg' => 'A prova foi removida com sucesso!'], 200);
    }
    */
}
