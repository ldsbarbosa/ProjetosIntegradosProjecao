<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tentativa extends Model
{
    use SoftDeletes;
    protected $fillable = ['usuario_id','pergunta_id','tentativa'];
    
    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'usuario_id' => 'required|exists:usuarios,id',
            'pergunta_id' => 'required|exists:perguntas,id'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'usuario_id.exists' => 'O usuário não existe',
            'pergunta_id.exists' => 'A pergunta não existe'
        ];
    }

    //RELACIONAMENTOS
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id');
    }
    public function pergunta(){
        return $this->belongsTo('App\Models\Pergunta','pergunta_id');
    }
}
