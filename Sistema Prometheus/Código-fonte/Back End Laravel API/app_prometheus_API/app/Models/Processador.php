<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Processador extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'processadores';

    //ATRIBUTOS
    protected $fillable = [
        'nome',
        'preco',
        'marca',
        'qtd_nucleos',
        'qtd_threads'
    ];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'nome' => 'required|unique:processadores,nome,'.$this->id.'|min:3',
            'preco' => 'required|numeric|min:3',
            'marca' => 'required|min:3',
            'qtd_nucleos' => 'required|numeric',
            'qtd_threads' => 'required|numeric'
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
    public function computadores(){
        return $this->hasMany('App\Models\Computador','disco_rigido_id');
    }
}
