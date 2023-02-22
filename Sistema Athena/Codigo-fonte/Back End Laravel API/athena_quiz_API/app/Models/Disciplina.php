<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use SoftDeletes;
    //ATRIBUTOS
    protected $fillable = ['nome','descricao'];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'nome' => 'required|unique:bancas,nome,'.$this->id.'|min:3|max:40',
            'descricao' => 'required|unique:bancas,descricao'.$this->id
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'O :attribute da disciplina já existe.',
            'nome.min' => 'O nome requer, no mínimo, 3 caracteres',
            'nome.max' => 'O nome suporta, no máximo, 40 caracteres',
            'descricao.unique' => 'Essa descrição já foi atribuda à alguma disciplina'
        ];
    }
    //RELACIONAMENTOS
    public function perguntas(){
        return $this->hasMany('App\Models\Pergunta');
    }
}
