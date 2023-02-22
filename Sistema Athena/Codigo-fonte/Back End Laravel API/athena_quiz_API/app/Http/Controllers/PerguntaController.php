<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Opcao;
use App\Http\Requests\StorePerguntaRequest;
use App\Http\Requests\UpdatePerguntaRequest;
use App\Repositories\PerguntaRepository;

class PerguntaController extends Controller
{
    public function __construct(Pergunta $pergunta){
        $this->pergunta = $pergunta;
    }

    public function index(Request $request)
    {
        $pergunta_repository = new PerguntaRepository($this->pergunta);

        // Relacionamento Pergunta - Disciplina
        if($request->has('atributos_disciplina') && $request->atributos_disciplina != ''){
            $atributos_disciplina = 'disciplina:id,'.$request->atributos_disciplina;
            $pergunta_repository->selectAtributosTabelaFilha($atributos_disciplina);
        }elseif($request->has('atributos_disciplina')){
            $pergunta_repository->selectAtributosTabelaFilha('disciplina');
        }

        // Relacionamento Pergunta - Prova
        if($request->has('atributos_prova') && $request->atributos_prova != ''){
            $atributos_prova = 'prova:id,'.$request->atributos_prova;
            $pergunta_repository->selectAtributosTabelaFilha($atributos_prova);
        }elseif($request->has('atributos_prova')){
            $pergunta_repository->selectAtributosTabelaFilha('prova');
        }

        // Relacionamento Pergunta - Usuarios
        if($request->has('atributos_usuarios') && $request->atributos_usuarios != ''){
            $atributos_usuarios = 'usuarios:id,'.$request->atributos_usuarios;
            $pergunta_repository->selectAtributosTabelaFilha($atributos_usuarios);
        }elseif($request->has('atributos_usuarios')){
            $pergunta_repository->selectAtributosTabelaFilha('usuarios');
        }

        // Relacionamento Pergunta - Opcao
        if($request->has('atributos_opcoes') && $request->atributos_opcoes != ''){
            $atributos_opcoes = 'opcoes:id,'.$request->atributos_opcoes;
            $pergunta_repository->selectAtributosTabelaFilha($atributos_opcoes);
        }elseif($request->has('atributos_opcoes')){
            $pergunta_repository->selectAtributosTabelaFilha('opcoes');
        }

        if($request->has('filtro') && $request->filtro != ''){
            $pergunta_repository->filtro($request->filtro);
        }

        if($request->has('atributos')  && $request->atributos != ''){
            $pergunta_repository->selectAtributos($request->atributos);
        }

        return response()->json($pergunta_repository->getResultado(), 200);
    }

    public function store(Request $request)
    {
        $padraoRegEx = "/--/";
        if($request->tipo_pergunta == 'Múltipla Escolha'){
            if(!$request->has('nome_opcao')){
                return response()->json(["Mensagem" => "Para perguntas de múltipla escolha, devem haver 5 opções."], 400);
            }
            if(preg_match_all($padraoRegEx, $request->nome_opcao) != 4){
                return response()->json(["Mensagem" => "As opções, que são 5, devem vir divididas por dois traços seguidos quatro vezes."], 400);
            }
            $opcoesDaPergunta = preg_split($padraoRegEx, $request->nome_opcao);
            foreach ($opcoesDaPergunta as $opcao) {
                if(empty($opcao)){
                    return response()->json(["Mensagem" => "As 5 opções do vetor devem estar preenchidas."], 400);
                }
            }
            $request->validate($this->pergunta->rules(),$this->pergunta->feedback());
            $pergunta = $this->pergunta->create([
                'prova_id' => $request->prova_id,
                'disciplina_id' => $request->disciplina_id,
                'enunciado' => $request->enunciado,
                'tipo_pergunta' => $request->tipo_pergunta,
                'resposta' => $request->resposta
            ]);
            $perguntaModificada = Pergunta::where('enunciado','=',$request->enunciado)->where('prova_id','=',$request->prova_id)->limit(1)->get();
            $perguntaModificada = $perguntaModificada->map(function ($p) {
                return $p->only(['id']);
            });
            $perguntaID = $perguntaModificada->toArray()[0]['id'];
            foreach ($opcoesDaPergunta as $opcao) {
                Opcao::create([
                    'pergunta_id' => $perguntaID,
                    'nome_opcao' => $opcao,
                ]);
            }
            return response()->json($pergunta, 201);
        }if($request->tipo_pergunta == 'Verdadeiro ou Falso'){
            $request->validate($this->pergunta->rules(),$this->pergunta->feedback());
            $pergunta = $this->pergunta->create([
                'prova_id' => $request->prova_id,
                'disciplina_id' => $request->disciplina_id,
                'enunciado' => $request->enunciado,
                'tipo_pergunta' => $request->tipo_pergunta,
                'resposta' => $request->resposta
            ]);
            return response()->json($pergunta, 201);
        }
    }

    /*
    public function show($id)
    {
        $pergunta = $this->pergunta->with('pergunta')->find($id);
        if($pergunta === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($pergunta, 200);
    }
    */

    public function update(Request $request, $id)
    {
        $padraoRegEx = "/--/";
        $pergunta = $this->pergunta->find($id);
        if($pergunta === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }

        if($request->tipo_pergunta == 'Múltipla Escolha'){
            if($request->method() === 'PATCH'){
                $regrasConformeInsercao = array();
                foreach($pergunta->rules() as $input => $regra){
                    if(array_key_exists($input, $request->all())){
                        $regrasConformeInsercao[$input] = $regra;
                    }
                }
                $request->validate($regrasConformeInsercao,$pergunta->feedback());
                if($request->has('nome_opcao')){
                    $opcoesDaPergunta = preg_split($padraoRegEx, $request->nome_opcao);
                    foreach ($opcoesDaPergunta as $opcao) {
                    if(empty($opcao)){
                        return response()->json(["Mensagem" => "As 5 opções do vetor devem estar preenchidas."], 400);
                    }
                }
                }
            }else{
                if(!$request->has('nome_opcao')){
                    return response()->json(["Mensagem" => "Para perguntas de múltipla escolha, devem haver 5 opções."], 400);
                }
                if(preg_match_all($padraoRegEx, $request->nome_opcao) != 4){
                    return response()->json(["Mensagem" => "As opções, que são 5, devem vir divididas por dois traços seguidos quatro vezes."], 400);
                }
                $opcoesDaPergunta = preg_split($padraoRegEx, $request->nome_opcao);
                foreach ($opcoesDaPergunta as $opcao) {
                    if(empty($opcao)){
                        return response()->json(["Mensagem" => "As 5 opções do vetor devem estar preenchidas."], 400);
                    }
                }
                $request->validate($pergunta->rules(),$pergunta->feedback());
            }
            $pergunta->fill($request->all());
            $pergunta->save();
            if(!$request->has('nome_opcao')){
                return response()->json(["Mensagem" => "Somente a pergunta de múltipla escolha foi atualizada. Suas opções permanecem íntegras."], 200);
            }else{
                $perguntaModificada = Pergunta::where('id','=',$id)->with('opcoes')->get();
            
                $perguntaModificada = $perguntaModificada->map(function ($p) {
                    return $p->only(['id','opcoes']);
                });
                $perguntaOpcoes = $perguntaModificada->toArray()[0]['opcoes'];
                $perguntaOpcoes = $perguntaOpcoes->map(function ($p) {
                    return $p->only(['id','pergunta_id','nome_opcao']);
                });
                $perguntaOpcoes = $perguntaOpcoes->toArray();

                $contador = 0;
                foreach ($perguntaOpcoes as $chave => $opcao) {
                    Opcao::where('id', '=', $perguntaOpcoes[$chave]['id'])->update([
                        'nome_opcao' => $opcoesDaPergunta[$contador],
                    ]);
                    $contador++;
                }
                return response()->json(['msg' => 'A pergunta de múltipla escolha foi atualizada com sucesso!'], 200);
            }
        }

        if($request->tipo_pergunta == 'Verdadeiro ou Falso'){
            if($request->method() === 'PATCH'){
                $regrasConformeInsercao = array();
                foreach($pergunta->rules() as $input => $regra){
                    if(array_key_exists($input, $request->all())){
                        $regrasConformeInsercao[$input] = $regra;
                    }
                }
                $request->validate($regrasConformeInsercao,$pergunta->feedback());
            }else{
                $request->validate($pergunta->rules(),$pergunta->feedback());
            }
            $pergunta->fill($request->all());
            $pergunta->save();
            return response()->json(['msg' => 'A pergunta de verdadeiro ou falso foi atualizada com sucesso!'], 200);
        }
    }

    public function destroy($id)
    {
        $pergunta = $this->pergunta->find($id);
        if($pergunta === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $tipoDaPergunta = $this->pergunta->where('id', '=', $id)->get()->toArray()[0]['tipo_pergunta'];
        $perguntaID = $this->pergunta->where('id', '=', $id)->get()->toArray()[0]['id'];
        if($tipoDaPergunta == 'Múltipla Escolha'){
            $opcoesDaPergunta = Opcao::where('pergunta_id','=',$perguntaID)->get()->toArray();
            foreach ($opcoesDaPergunta as $opcao) {
                Opcao::where('id', '=', $opcao['id'])->delete();
            }
            $pergunta->delete();
            return response()->json(['msg' => 'A pergunta de múltipla escolha foi removida com sucesso, justamente com suas opções!'], 200);
        }
        if($tipoDaPergunta == 'Verdadeiro ou Falso'){
            $pergunta->delete();
            return response()->json(['msg' => 'A pergunta de verdadeiro ou falso foi removida com sucesso!'], 200);
        }
    }
}
