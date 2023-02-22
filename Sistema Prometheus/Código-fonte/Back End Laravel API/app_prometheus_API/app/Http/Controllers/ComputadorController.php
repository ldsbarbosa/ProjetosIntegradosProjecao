<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computador;
use App\Http\Requests\StoreComputadorRequest;
use App\Http\Requests\UpdateComputadorRequest;
use App\Models\Configuracao;
use App\Models\MemoriaRAM;
use App\Models\PlacaMae;
use App\Models\QtdPentesNoComputador;
use App\Models\Usuario;
use App\Repositories\ComputadorRepository;


class ComputadorController extends Controller
{
    public function __construct(Computador $computador){
        $this->computador = $computador;
    }

    public function index(Request $request)
    {
        $computador_repository = new ComputadorRepository($this->computador);

        // Relacionamento Computador - Gabinete
        if($request->has('atributos_gabinete') && $request->atributos_gabinete != ''){
            $atributos_gabinete = 'gabinete:id,'.$request->atributos_gabinete;
            $computador_repository->selectAtributosTabelaFilha($atributos_gabinete);
        }elseif($request->has('atributos_gabinete')){
            $computador_repository->selectAtributosTabelaFilha('gabinete');
        }

        // Relacionamento Computador - Placa Mãe
        if($request->has('atributos_placa_mae') && $request->atributos_placa_mae != ''){
            $atributos_placa_mae = 'placa_mae:id,'.$request->atributos_placa_mae;
            $computador_repository->selectAtributosTabelaFilha($atributos_placa_mae);
        }elseif($request->has('atributos_placa_mae')){
            $computador_repository->selectAtributosTabelaFilha('placa_mae');
        }

        // Relacionamento Computador - Processador
        if($request->has('atributos_processador') && $request->atributos_processador != ''){
            $atributos_processador = 'processador:id,'.$request->atributos_processador;
            $computador_repository->selectAtributosTabelaFilha($atributos_processador);
        }elseif($request->has('atributos_processador')){
            $computador_repository->selectAtributosTabelaFilha('processador');
        }

        // Relacionamento Computador - Fonte de Energia
        if($request->has('atributos_fonte_de_energia') && $request->atributos_fonte_de_energia != ''){
            $atributos_fonte_de_energia = 'fonte_de_energia:id,'.$request->atributos_fonte_de_energia;
            $computador_repository->selectAtributosTabelaFilha($atributos_fonte_de_energia);
        }elseif($request->has('atributos_fonte_de_energia')){
            $computador_repository->selectAtributosTabelaFilha('fonte_de_energia');
        }

        // Relacionamento Computador - Armazenamento
        if($request->has('atributos_armazenamento') && $request->atributos_armazenamento != ''){
            $atributos_armazenamento = 'armazenamento:id,'.$request->atributos_armazenamento;
            $computador_repository->selectAtributosTabelaFilha($atributos_armazenamento);
        }elseif($request->has('atributos_armazenamento')){
            $computador_repository->selectAtributosTabelaFilha('armazenamento');
        }

        // Relacionamento Computador - Memorias RAM
        if($request->has('atributos_memorias_ram') && $request->atributos_memorias_ram != ''){
            $atributos_memorias_ram = 'memorias_ram:id,'.$request->atributos_memorias_ram;
            $computador_repository->selectAtributosTabelaFilha($atributos_memorias_ram);
        }elseif($request->has('atributos_memorias_ram')){
            $computador_repository->selectAtributosTabelaFilha('memorias_ram');
        }

        // Relacionamento Computador - Quantidade de Memorias RAM
        if($request->has('atributos_qtd_pentes_no_computador') && $request->atributos_qtd_pentes_no_computador != ''){
            $atributos_qtd_pentes_no_computador = 'qtd_pentes_no_computador:id,'.$request->atributos_qtd_pentes_no_computador;
            $computador_repository->selectAtributosTabelaFilha($atributos_qtd_pentes_no_computador);
        }elseif($request->has('atributos_qtd_pentes_no_computador')){
            $computador_repository->selectAtributosTabelaFilha('qtd_pentes_no_computador');
        }

        // Relacionamento Computador - Usuarios
        if($request->has('atributos_usuarios') && $request->atributos_usuarios != ''){
            $atributos_usuarios = 'usuarios:id,'.$request->atributos_usuarios;
            $computador_repository->selectAtributosTabelaFilha($atributos_usuarios);
        }elseif($request->has('atributos_usuarios')){
            $computador_repository->selectAtributosTabelaFilha('usuarios');
        }

        if($request->has('filtro') && $request->filtro != ''){
            $computador_repository->filtro($request->filtro);
        }
        if($request->has('filtro_usuario') && $request->filtro_usuario != ''){
            $computador_repository->filtroUsuario($request->filtro_usuario);
        }

        if($request->has('atributos')  && $request->atributos != ''){
            $computador_repository->selectAtributos($request->atributos);
        }
        
        return response()->json($computador_repository->getResultado(), 200);
    }

    public function store(Request $request)
    {
        if(!$request->has('memoria_ram_id') || !($request->memoria_ram_id != '')){
            return response()->json(["Mensagem" => "Insira o identificador desejado da memória RAM"], 404);
        }
        if(!$request->has('qtd_memoria_ram') || !($request->qtd_memoria_ram != '')){
            return response()->json(["Mensagem" => "Insira a quantidade de pentes desejadas da memória RAM"], 404);
        }
        if(!$request->has('usuario_id') || !($request->usuario_id != '')){
            return response()->json(["Mensagem" => "Insira o identificador desejado da memória RAM"], 404);
        }
        $memoriaRAMinserida = MemoriaRAM::where('id',$request->memoria_ram_id)->get()->toArray();
        if($memoriaRAMinserida == []){
            return response()->json(["Mensagem" => "Não foi encontrado essa memória RAM para esse identificador"], 404);
        }
        if($request->qtd_memoria_ram < 1){
            return response()->json(["Mensagem" => "Deve ser inserido, ao menos, uma memória RAM"], 404);
        }
        $placa_mae_slots_memoria = PlacaMae::where('id',$request->placa_mae_id)->get()->toArray()[0]['qtd_slots_memoria'];
        if($request->qtd_memoria_ram > $placa_mae_slots_memoria){
            return response()->json(["Mensagem" => "A quantidade de memórias RAM excede o limite aceito pela placa mãe"], 404);
        }
        $usuarioIDinserido = Usuario::where('id',$request->usuario_id)->get();
        if($usuarioIDinserido == []){
            return response()->json(["Mensagem" => "Não foi encontrado esse usuário para esse identificador"], 404);
        }
        
        $request->validate($this->computador->rules(),$this->computador->feedback());
        $computador = $this->computador->firstOrCreate([
            'gabinete_id' => $request->gabinete_id,
            'fonte_de_energia_id' => $request->fonte_de_energia_id,
            'armazenamento_id' => $request->armazenamento_id,
            'placa_mae_id' => $request->placa_mae_id,
            'processador_id' => $request->gabinete_id,            
            'preco_montagem' => $request->preco_montagem,
            'compatibilidade' => $request->compatibilidade
        ]);
        $este_computador_id = Computador::where('gabinete_id',$request->gabinete_id)
        ->where('fonte_de_energia_id',$request->fonte_de_energia_id)
        ->where('armazenamento_id',$request->armazenamento_id)
        ->where('placa_mae_id',$request->placa_mae_id)
        ->where('processador_id',$request->processador_id)
        ->where('preco_montagem',$request->preco_montagem)
        ->where('compatibilidade',$request->compatibilidade)->first()->toArray()['id'];

        Configuracao::firstOrCreate([
            'computador_id' => $este_computador_id,
            'usuario_id' => $request->usuario_id
        ]);
        
        for($i = 1; $i <= $request->qtd_memoria_ram; $i++){
            QtdPentesNoComputador::create([
                'computador_id' => $este_computador_id,
                'memoria_ram_id' => $request->memoria_ram_id
            ]);
        }

        return response()->json($computador, 201);
    }

    public function update(Request $request, $id)
    {
        $metodo = $request->method() ;

        $computador = $this->computador->find($id); //Achando o computador
        if($computador === null){ //Verificando existência do computador
            return response()->json(['erro' => 'Falha na modificação(Operação UPDATE).'], 404);
        }

        if($metodo === 'PATCH'){

            if($request->has('memoria_ram_id')){
                if(!$request->has('memoria_ram_id') || !($request->memoria_ram_id != '')){
                    return response()->json(["Mensagem" => "Insira o identificador desejado da memória RAM"], 404);
                }
                $memoriaRAMinserida = MemoriaRAM::where('id',$request->memoria_ram_id)->get()->toArray();
                if($memoriaRAMinserida == []){
                    return response()->json(["Mensagem" => "Não foi encontrado essa memória RAM para esse identificador"], 404);
                }

                QtdPentesNoComputador::where('computador_id',$id)->update([
                    'memoria_ram_id' => $request->memoria_ram_id
                ]);
            }

            if($request->has('qtd_memoria_ram')){
                if(!$request->has('qtd_memoria_ram') || !($request->qtd_memoria_ram != '')){
                    return response()->json(["Mensagem" => "Insira a quantidade de pentes desejadas da memória RAM"], 404);
                }
                if($request->qtd_memoria_ram < 1){
                    return response()->json(["Mensagem" => "Deve ser inserido, ao menos, uma memória RAM"], 404);
                }
                $placa_mae_slots_memoria = $computador->placa_mae()->get()->toArray()[0]['qtd_slots_memoria'];
                if($request->qtd_memoria_ram > $placa_mae_slots_memoria){
                    return response()->json(["Mensagem" => "A quantidade de memórias RAM excede o limite aceito pela placa mãe"], 404);
                }

                if($request->qtd_memoria_ram > QtdPentesNoComputador::where('computador_id',$id)->count()){
                    QtdPentesNoComputador::create([
                        'computador_id' => $id,
                        'memoria_ram_id' => $request->memoria_ram_id
                    ]);
                }
                if($request->qtd_memoria_ram < QtdPentesNoComputador::where('computador_id',$id)->count()){
                    $qtd_memorias_deletadas = $request->qtd_memoria_ram -  QtdPentesNoComputador::where('computador_id',$id)->count();
                    QtdPentesNoComputador::where('computador_id',$id)->limit($qtd_memorias_deletadas)->delete();
                }
            }
            $regrasConformeInsercao = array();
            foreach($computador->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasConformeInsercao[$input] = $regra;
                }
            }
            $request->validate($regrasConformeInsercao,$computador->feedback());
        }
        elseif($metodo === 'PUT'){

            if(!$request->has('memoria_ram_id') || !($request->memoria_ram_id != '')){
                return response()->json(["Mensagem" => "Insira o identificador desejado da memória RAM"], 404);
            }
            $memoriaRAMinserida = MemoriaRAM::where('id',$request->memoria_ram_id)->get()->toArray();
            if($memoriaRAMinserida == []){
                return response()->json(["Mensagem" => "Não foi encontrado essa memória RAM para esse identificador"], 404);
            }
            if(!$request->has('qtd_memoria_ram') || !($request->qtd_memoria_ram != '')){
                return response()->json(["Mensagem" => "Insira a quantidade de pentes desejadas da memória RAM"], 404);
            }
            if($request->qtd_memoria_ram < 1){
                return response()->json(["Mensagem" => "Deve ser inserido, ao menos, uma memória RAM"], 404);
            }
            $placa_mae_slots_memoria = PlacaMae::where('id',$request->placa_mae_id)->get()->toArray()[0]['qtd_slots_memoria'];
            if($request->qtd_memoria_ram > $placa_mae_slots_memoria){
                return response()->json(["Mensagem" => "A quantidade de memórias RAM excede o limite aceito pela placa mãe"], 404);
            }

            
            if($request->qtd_memoria_ram > QtdPentesNoComputador::where('computador_id',$id)->count()){
                QtdPentesNoComputador::create([
                    'computador_id' => $id,
                    'memoria_ram_id' => $request->memoria_ram_id
                ]);
            }
            if($request->qtd_memoria_ram < QtdPentesNoComputador::where('computador_id',$id)->count()){
                $qtd_memorias_deletadas = QtdPentesNoComputador::where('computador_id',$id)->count() - $request->qtd_memoria_ram;
                QtdPentesNoComputador::where('computador_id',$id)->limit($qtd_memorias_deletadas)->delete();
            }
            QtdPentesNoComputador::where('computador_id',$id)->update([
                'memoria_ram_id' => $request->memoria_ram_id
            ]);

            $request->validate($computador->rules(),$computador->feedback());
        }
        $computador->fill($request->all());
        $computador->save();
        
        return response()->json(['msg' => "O computador foi atualizado com sucesso por meio do método $metodo!"], 200);
    }

    public function destroy($id)
    {
        $computador = $this->computador->find($id);
        if($computador === null){
            return response()->json(['erro' => 'Falha na exclusão(Operação DELETE).'], 404);
        }
        $computador->delete();
        QtdPentesNoComputador::where('computador_id',$id)->delete();
        Configuracao::where('computador_id',$id)->delete();
        return response()->json(['msg' => 'O computador foi removido com sucesso!'], 200);
    }
}
