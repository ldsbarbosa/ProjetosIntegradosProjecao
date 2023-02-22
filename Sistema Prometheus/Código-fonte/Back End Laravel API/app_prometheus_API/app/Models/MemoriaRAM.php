<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MemoriaRAM extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'memorias_ram';
    //ATRIBUTOS
    protected $fillable = [
        'nome',
        'preco',
        'marca',
        'capacidade'
    ];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'nome' => 'required|unique:memorias_ram,nome,'.$this->id.'|min:3',
            'preco' => 'required|numeric|min:3',
            'marca' => 'required|min:3',
            'capacidade' => 'required|numeric'
        ];
    }
    
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O campo :attribute já está cadastrado',
            'min' => 'O campo :attribute deve possuir mais caracteres',
            'numeric' => 'O campo :attribute deve ser numérico'
        ];
    }

    //RELACIONAMENTOS
    public function qtdpentesnocomputador(){
        // Um usuário possui muitas tentativas - Relacionamento 1 usuário para N configurações de computadores
        return $this->hasMany('App\Models\QtdPentesNoComputador','memoria_ram_id');
    }
    public function computadores(){
        // Muitos usuários se relacionam com muitos computadores - Relacionamento N usuários para M computadores
        return $this->belongsToMany('App\Models\Computador','qtd_pentes_no_computador','memoria_ram_id','computador_id');
    }
}
