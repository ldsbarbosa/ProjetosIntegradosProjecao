<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentativa;
use App\Models\Usuario;
use App\Models\Pergunta;
use App\Http\Requests\StoreTentativaRequest;
use App\Http\Requests\UpdateTentativaRequest;
use App\Repositories\TentativaRepository;

class TentativaController extends Controller
{
    public function __construct(Tentativa $tentativa, Usuario $usuario, Pergunta $pergunta){
        $this->tentativa = $tentativa;
    }

    public function index(Request $request)
    // Para um usuário, exibir todas as tentativas
    // Parametros que devem vir no cabeçalho -> filtro_usuario, atributos_usuario, filtro_pergunta, atributos_pergunta
    {
        if($request->has('responder_pergunta') && $request->responder_pergunta == ''){
            $perguntaAleatoria = Pergunta::inRandomOrder()->limit(1)->selectRaw('id,tipo_pergunta')->get()->toArray();
            $perguntaAleatoria = $perguntaAleatoria[0];
            if($perguntaAleatoria['tipo_pergunta'] == "Múltipla Escolha"){
                $perguntaAleatoria2 = Pergunta::where('id','=',$perguntaAleatoria['id'])->with('opcoes:pergunta_id,nome_opcao')->selectRaw('id,enunciado,tipo_pergunta')->get();
                return response()->json($perguntaAleatoria2[0], 200);
            }else{
                $perguntaAleatoria2 = Pergunta::where('id','=',$perguntaAleatoria['id'])->selectRaw('id,enunciado,tipo_pergunta')->get();
                return response()->json($perguntaAleatoria2[0], 200);
            }
        }else{
            return response()->json(["Mensagem" => "Requisição não aceita."], 404);
        }
        // strpos($request->filtro, "id:=") !== false 
        if(!$request->has('atributos') ||
           !$request->has('atributos_usuario') ||
           !$request->has('atributos_pergunta') ||
           !$request->has('filtro_usuario')){
            return response()->json(['erro' => 'Falha na pesquisa. Ausência de atributos e filtro'], 404);
        }

        $tentativa_repository = new TentativaRepository($this->tentativa);

        // Filtrando quais colunas de tentativa vão vir
        if($request->atributos === null){
            return response()->json(['erro' => 'Falha na pesquisa. Os atributos da tentativa devem ser especificados'], 404);
        }else{
            $tentativa_repository->selectAtributos($request->atributos);
        }

        // Filtrando qual é o usuário que vai vir
        if($request->filtro_usuario == null){
            return response()->json(['erro' => 'Falha na pesquisa. O usuário deve ser filtrado pelo seu identificador'], 404);
        }elseif(strpos($request->filtro_usuario, "id:=:") === false){
            return response()->json(['erro' => 'Falha na pesquisa. O filtro não foi passado devidamente.'], 404);
        }else{
            $tentativa_repository->selectAtributosTentativaUsuario($request->filtro_usuario);
        }

        // Filtrando quais colunas de usuario em tentativa vão vir. - Relacionamento tentativa - Usuario
        if($request->atributos_usuario == null){
            return response()->json(['erro' => 'Falha na pesquisa. Os atributos do usuário devem ser especificados'], 404);
        }elseif(strpos($request->atributos_usuario, 'senha') !== false){
            return response()->json(['erro' => 'Falha de SEGURANÇA. Os atributos do usuário não deve retornar SENHA'], 404);
        }else{
            $atributos_usuario = 'usuario:id,'.$request->atributos_usuario;
            $tentativa_repository->selectAtributosTabelaFilha($atributos_usuario);
        }

        // Filtrando quais colunas de pergunta em tentativa vão vir. - Relacionamento tentativa - Pergunta
        if($request->atributos_pergunta == null){
            return response()->json(['erro' => 'Falha na pesquisa. Os atributos da pergunta devem ser especificados'], 404);
        }else{
            $atributos_pergunta = 'pergunta:id,'.$request->atributos_pergunta;
            $tentativa_repository->selectAtributosTabelaFilha($atributos_pergunta);
        }

        return response()->json($tentativa_repository->getResultado(), 200);
    }

    /*
    public function show($id)
    // Exibir uma tentativa tendo, como parametro, seu id
    {
        $tentativa = $this->tentativa->with('pergunta')->find($id);
        if($tentativa === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($tentativa, 200);
    }
    */
    
    public function store(Request $request)
    // Responder Pergunta -- Tentar acertar uma pergunta
    {
        if($request->has('resposta') && $request->resposta != ''){
            $tentativaDoUsuario = 0;
            $perguntaASerRespondida = Pergunta::where('id','=',$request->pergunta_id)->get()->toArray();
            $perguntaASerRespondida = $perguntaASerRespondida[0];
            if($perguntaASerRespondida['resposta'] == $request->resposta){
                $tentativaDoUsuario = 1;
            }
            $request->validate($this->tentativa->rules(),$this->tentativa->feedback());
            $this->tentativa->create([
                'usuario_id' => $request->usuario_id,
                'pergunta_id' => $request->pergunta_id,
                'tentativa' => $tentativaDoUsuario
            ]);
            $resposta = 'Falso';
            if($perguntaASerRespondida['tipo_pergunta'] == 'Verdadeiro ou Falso' && $perguntaASerRespondida['resposta'] == 1){
                $resposta = 'Verdadeiro';
            }if($perguntaASerRespondida['tipo_pergunta'] == 'Múltipla Escolha'){
                switch($perguntaASerRespondida['resposta']){
                    case "10000":
                        $resposta = 'Primeira opção';
                        break;
                    case "01000":
                        $resposta = 'Segunda opção';
                        break;
                    case "00100":
                        $resposta = 'Terceira opção';
                        break;
                    case "00010":
                        $resposta = 'Quarta opção';
                        break;
                    case "00001":
                        $resposta = 'Quinta opção';
                        break;
                }
            }
            if($tentativaDoUsuario == 1){
                return response()->json(['mensagem' => 'Você acertou!', 'pergunta' => $perguntaASerRespondida['enunciado'], 'resposta' => $resposta], 201);
            }
            if($tentativaDoUsuario == 0){
                return response()->json(['mensagem' => 'Infelizmente, você errou. Tente novamente.', 'pergunta' => $perguntaASerRespondida['enunciado'], 'resposta' => $resposta], 201);
            }
        }else{
            return response()->json(['Mensagem' => 'Requisição inadequada'], 404);
        }
    }

    /*
    public function update(Request $request, $id)
    {
        return; // A rota para atualização de tentativa ainda não será usada.
        $tentativa = $this->tentativa->find($id);
        if($tentativa === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($tentativa->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$tentativa->feedback());
        }else{
            $request->validate($tentativa->rules(),$tentativa->feedback());
        }

        $tentativa->fill($request->all());
        $tentativa->save();
        return response()->json($tentativa, 200);
    }
    */

    /*
    public function destroy($id)
    {
        return; // A rota para exclusão de tentativa ainda não será usada.
        $tentativa = $this->tentativa->find($id);
        if($tentativa === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $tentativa->delete();
        return response()->json(['msg' => 'A tentativa foi removida com sucesso!'], 200);
    }
    */
}
