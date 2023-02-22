<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Repositories\UsuarioRepository;

class UsuarioController extends Controller
{
    public function __construct(Usuario $usuario){
        $this->usuario = $usuario;
    }

    /*
    public function index(Request $request) // Realizar Login
    {
        $usuario_repository = new UsuarioRepository($this->usuario);
        if(!$request->has('email') &&! $request->has('senha')){
            return response()->json(['Mensagem' => 'Insira um e-mail e uma senha'], 404);
        }
        if($request->email === null || $request->senha === null){
            return response()->json(['Mensagem' => 'O e-mail ou a senha estão vazios'], 404);
        }
        $query = 'senha:=:'.$request->senha.';email:=:'.$request->email;
        $usuario_repository->filtro($query);
        $usuario_repository->selectAtributos('nome, email');

        return response()->json($usuario_repository->getResultado(), 200);
    }
    */

    public function store(Request $request)  // Realizar Cadastro
    {
        $usuario_repository = new UsuarioRepository($this->usuario);
        if(strlen($request->CPF) != 14){
            return response()->json(["Mensagem" => "Um CPF deve possuir 14 caracteres."], 400);
        }
        if(!$usuario_repository->CPFeValido($request->CPF)){
            return response()->json(["Mensagem" => "O CPF é inválido"], 400);
        }
        $CPFSemDigito = $usuario_repository->CPFsemCaracterEspecial($request->CPF);
        if(strlen($CPFSemDigito) != 11){
            return response()->json(["Mensagem" => "Um CPF, sem pontos e traço, deve possuir 11 caracteres"], 400);
        }

        $request->validate($this->usuario->rules(),$this->usuario->feedback());

        $this->usuario->create([
            'nome' => $request->nome,
            'senha' => password_hash($request->senha, PASSWORD_DEFAULT),
            'data_de_nascimento' => $request->data_de_nascimento,
            'apelido' => $request->apelido,
            'email' => $request->email,
            'CPF' => $CPFSemDigito,
            'cidade' => $request->cidade
        ]);
        
        return response()->json(["Mensagem" => "O usuário foi cadastrado com sucesso!"], 201);
    }

    public function login(Request $request){ // Realizar Login
        $usuario_repository = new UsuarioRepository($this->usuario);
        if(!$request->has('email') &&! $request->has('senha')){
            return response()->json(['Mensagem' => 'Insira um e-mail e uma senha',
            'erro' => true], 404);
        }
        if($request->email === null || $request->senha === null){
            return response()->json(['Mensagem' => 'O e-mail ou a senha estão vazios',
            'erro' => true], 404);
        }
        if($usuario_repository->senhaCadastradaNoBanco($this->usuario, $request)){
            return response()->json(['Mensagem' => 'A autenticação não foi possível. Senha invalida.',
            'erro' => true], 404);
        }
        $query = 'email:=:'.$request->email;
        $usuario_repository->filtro($query);
        $usuario_repository->selectAtributos('id, nome, email');

        if($usuario_repository->getResultado() == null || $usuario_repository->getResultado()->toArray() == []){
            return response()->json(['Mensagem' => 'A autenticação não foi possível. Usuário não encontrado no sistema.',
            'erro' => true], 404);
        }
        $resposta = $usuario_repository->getResultado()->toArray()[0];
        $resposta['erro'] = false;
        $resposta = (object) $resposta;
        return response()->json($resposta, 200);
    }

    /*
    public function show($id)
    {
        $usuario = $this->usuario->with('perguntas')->find($id);
        if($usuario === null){
            return response()->json(['erro' => 'Falha na seleção(Operação SELECT).'], 404);
        }
        return response()->json($usuario, 200);
    }
    */

    /*
    public function update(Request $request, $id)
    {
        return; // A rota para atualização de usuário ainda não será usada.
        $usuario = $this->usuario->find($id);
        if($usuario === null){
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }
        if($request->method() === 'PATCH'){
            $regrasConformeInsercao = array();
            foreach($usuario->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$usuario->feedback());
        }else{
            $request->validate($usuario->rules(),$usuario->feedback());
        }

        $usuario->fill($request->all());
        $usuario->save();
        return response()->json($usuario, 200);
    }*/
    
    /*
    public function destroy($id)
    {
        return; // A rota para exclusão de usuário ainda não será usada.
        $usuario = $this->usuario->find($id);
        if($usuario === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $usuario->delete();
        return response()->json(['msg' => 'O usuario foi removido com sucesso!'], 200);
    }*/
}
