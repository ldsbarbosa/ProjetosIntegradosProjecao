<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'configuracoes';

    //ATRIBUTOS
    protected $fillable = ['usuario_id','computador_id'];
    
    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'usuario_id' => 'required|exists:usuarios,id',
            'computador_id' => 'required|exists:computadores,id'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'usuario_id.exists' => 'O usuário não existe',
            'computador_id.exists' => 'O computador não existe'
        ];
    }

    //RELACIONAMENTOS
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id');
    }
    public function computador(){
        return $this->belongsTo('App\Models\Computador','computador_id');
    }
}
