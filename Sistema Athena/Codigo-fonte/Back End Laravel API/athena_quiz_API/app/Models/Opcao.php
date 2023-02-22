<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opcao extends Model
{
    use SoftDeletes;
    //NOME DA ENTIDADE/TABELA
    protected $table = 'opcoes';

    //ATRIBUTOS
    protected $fillable = ['pergunta_id','nome_opcao'];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'pergunta_id' => 'required|exists:perguntas,id',
            'nome_opcao' => 'required'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'pergunta_id.exists' => 'A pergunta não existe'
        ];
    }
    //RELACIONAMENTOS
    public function pergunta(){
        return $this->belongsTo('App\Models\Pergunta');
    }
}
