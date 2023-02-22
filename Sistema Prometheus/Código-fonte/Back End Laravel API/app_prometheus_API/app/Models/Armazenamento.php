<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Biblioteca a ser investigada
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Armazenamento extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'armazenamentos';
    
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
            'nome' => 'required|unique:armazenamentos,nome,'.$this->id.'|min:3',
            'preco' => 'required|numeric|min:3',
            'marca' => 'required|min:3',
            'capacidade' => 'required|numeric' // Em Gigabytes
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
        return $this->hasMany('App\Models\Computador','armazenamento_id');
    }
}
