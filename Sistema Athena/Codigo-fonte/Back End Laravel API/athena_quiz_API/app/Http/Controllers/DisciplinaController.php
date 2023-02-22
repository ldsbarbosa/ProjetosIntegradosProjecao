<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Http\Requests\StoreDisciplinaRequest;
use App\Http\Requests\UpdateDisciplinaRequest;
use App\Repositories\DisciplinaRepository;

class DisciplinaController extends Controller
{
    public function __construct(Disciplina $disciplina){
        $this->disciplina = $disciplina;
    }

    public function index(Request $request)
    {
        $disciplina_repository = new DisciplinaRepository($this->disciplina);

        /*
        if($request->has('atributos_perguntas')){
            $atributos_perguntas = 'perguntas:id,'.$request->atributos_perguntas;
            $disciplina_repository->selectAtributosTabelaFilha($atributos_perguntas);
        }else{
            $disciplina_repository->selectAtributosTabelaFilha('perguntas');
        }

        if($request->has('filtro')){
            $disciplina_repository->filtro($request->filtro);
        }
        */

        if($request->has('atributos') && $request->atributos != ''){
            $disciplina_repository->selectAtributos($request->atributos);
        }

        return response()->json($disciplina_repository->getResultado(), 200);
    }

    /*
    public function store(Request $request)
    {
        $request->validate($this->disciplina->rules(),$this->disciplina->feedback());

        $disciplina = $this->disciplina->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao
        ]);
        
        return response()->json($disciplina, 201);
    }

    public function show($id)
    {
        $disciplina = $this->disciplina->with('provas')->find($id);
        if($disciplina === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($disciplina, 200);
    }

    public function update(Request $request, $id)
    {
        $disciplina = $this->disciplina->find($id);
        if($disciplina === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($disciplina->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$disciplina->feedback());
        }else{
            $request->validate($disciplina->rules(),$disciplina->feedback());
        }

        $disciplina->fill($request->all());
        $disciplina->save();
        return response()->json($disciplina, 200);
    }

    public function destroy($id)
    {
        $disciplina = $this->disciplina->find($id);
        if($disciplina === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $disciplina->delete();
        return response()->json(['msg' => 'A disciplina foi removida com sucesso!'], 200);
    }
    */
}
