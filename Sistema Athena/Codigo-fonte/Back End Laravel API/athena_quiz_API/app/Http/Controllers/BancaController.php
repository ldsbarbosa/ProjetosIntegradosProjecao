<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banca;
use App\Http\Requests\StoreBancaRequest;
use App\Http\Requests\UpdateBancaRequest;
use App\Repositories\BancaRepository;

class BancaController extends Controller
{
    public function __construct(Banca $banca){
        $this->banca = $banca;
    }

    public function index(Request $request)
    {
        $banca_repository = new BancaRepository($this->banca);

        if($request->has('atributos_provas')){
            $atributos_provas = 'provas:id,'.$request->atributos_provas;
            $banca_repository->selectAtributosTabelaFilha($atributos_provas);
        }else{
            $banca_repository->selectAtributosTabelaFilha('provas');
        }

        if($request->has('filtro')){
            $banca_repository->filtro($request->filtro);
        }

        if($request->has('atributos')){
            $banca_repository->selectAtributos($request->atributos);
        }

        return response()->json($banca_repository->getResultado(), 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->banca->rules(),$this->banca->feedback());

        $banca = $this->banca->create([
            'nome' => $request->nome
        ]);
        
        return response()->json($banca, 201);
    }

    public function show($id)
    {
        $banca = $this->banca->with('provas')->find($id);
        if($banca === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($banca, 200);
    }

    public function update(Request $request, $id)
    {
        $banca = $this->banca->find($id);
        if($banca === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($banca->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$banca->feedback());
        }else{
            $request->validate($banca->rules(),$banca->feedback());
        }

        $banca->fill($request->all());
        $banca->save();
        return response()->json($banca, 200);
    }

    public function destroy($id)
    {
        $banca = $this->banca->find($id);
        if($banca === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $banca->delete();
        return response()->json(['msg' => 'A banca foi removida com sucesso!'], 200);
    }
}
