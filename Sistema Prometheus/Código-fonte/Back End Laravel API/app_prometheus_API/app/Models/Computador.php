<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'computadores';

    //ATRIBUTOS
    protected $fillable = [
        'gabinete_id',
        'fonte_de_energia_id',
        'placa_mae_id',
        'processador_id',
        'armazenamento_id',
        'preco_montagem',
        'compatibilidade'
    ];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'gabinete_id' => 'required|exists:gabinetes,id',
            'fonte_de_energia_id' => 'required|exists:fontes_de_energia,id',
            'placa_mae_id' => 'required|exists:placas_mae,id',
            'processador_id' => 'required|exists:processadores,id',
            'armazenamento_id' => 'required|exists:armazenamentos,id',
            'preco_montagem' => 'required|numeric',
            'compatibilidade' => 'required|boolean'
        ];
    }
    
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O campo :attribute já está cadastrado',
            'min' => 'O campo :attribute deve possuir mais caracteres',
            'numeric' => 'O campo :attribute deve ser numérico',
            'exists' => 'O dado inserido no campo :attribute não está cadastrado no sistema',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso'
        ];
    }

    //RELACIONAMENTOS
    //Um para muitos
    public function processador(){
        return $this->belongsTo('App\Models\Processador', 'processador_id');
    }
    public function armazenamento(){
        return $this->belongsTo('App\Models\Armazenamento', 'armazenamento_id');
    }
    public function gabinete(){
        return $this->belongsTo('App\Models\Gabinete', 'gabinete_id');
    }
    public function fonte_de_energia(){
        return $this->belongsTo('App\Models\FonteDeEnergia', 'fonte_de_energia_id');
    }
    public function placa_mae(){
        return $this->belongsTo('App\Models\PlacaMae', 'placa_mae_id');
    }
    
    public function qtd_pentes_no_computador(){
        return $this->hasMany('App\Models\QtdPentesNoComputador', 'computador_id');
    }
    public function configuracoes(){
        return $this->hasMany('App\Models\Configuracao', 'computador_id');
    }
    
    //Muitos para Muitos
    public function usuarios(){
        // Muitos computadores se relacionam com muitos usuários - Relacionamento N computadores para M usuários
        return $this->belongsToMany('App\Models\Usuario','configuracoes','computador_id','usuario_id')->using(Configuracao::class);
    }
    public function memorias_ram(){
        // Muitos computadores se relacionam com muitas memórias RAM - Relacionamento N computadores para M memórias RAM
        return $this->belongsToMany('App\Models\MemoriaRAM','qtd_pentes_no_computador','computador_id','memoria_ram_id');
    }
}
