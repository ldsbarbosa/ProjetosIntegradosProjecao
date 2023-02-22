<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prova extends Model
{
    use SoftDeletes;
    //ATRIBUTOS
    protected $fillable = ['banca_id','nome'];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'banca_id' => 'required|exists:bancas,id',
            'nome' => 'required|unique:provas,nome,'.$this->id.'|min:3|max:40'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'O :attribute da prova já existe.',
            'nome.min' => 'O nome requer, no mínimo, 3 caracteres',
            'nome.max' => 'O nome suporta, no máximo, 40 caracteres',
            'banca_id.exists' => 'O id inserido não está cadastrado'
        ];
    }

    //RELACIONAMENTOS
    public function perguntas(){
        return $this->hasMany('App\Models\Pergunta');
    }
    public function banca(){
        return $this->belongsTo('App\Models\Banca');
    }
}
