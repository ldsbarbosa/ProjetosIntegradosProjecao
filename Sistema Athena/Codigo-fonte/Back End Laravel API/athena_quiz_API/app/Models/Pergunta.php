<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pergunta extends Model
{
    use SoftDeletes;
    protected $fillable = ['prova_id','disciplina_id','enunciado','tipo_pergunta','resposta'];

    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'prova_id' => 'required|exists:provas,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'enunciado' => 'required|min:10',
            'tipo_pergunta' => [
                'required',
                'regex:"(^\bVerdadeiro ou Falso\b$)|(^\bMúltipla Escolha\b$)"'
            ],
            'resposta' => 'required|min:1|max:10'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'prova_id.exists' => 'A prova não existe',
            'disciplina_id.exists' => 'A disciplina não existe',
            'tipo_pergunta.regex' => 'Tipos de pergunta: Verdadeiro ou Falso; Múltipla Escolha;',
            'resposta.min' => 'A resposta deve ter, no mínimo, 1 caracter',
            'resposta.max' => 'A resposta deve ter, no mínimo, 10 caracter'
        ];
    }
    //RELACIONAMENTOS
    public function opcoes(){
        // Uma pergunta possui muitas opções - Relacionamento 1 pergunta para N opções
        return $this->hasMany('App\Models\Opcao');
    }

    public function tentativas(){
        // Uma pergunta possui muitas tentativas - Relacionamento 1 pergunta para N tentativas
        return $this->hasMany('App\Models\Tentativa');
    }

    public function prova(){
        // Uma pergunta pertence à uma prova - Relacionamento 1 prova para N perguntas
        return $this->belongsTo('App\Models\Prova');
    }
    public function disciplina(){
        // Uma pergunta pertence à uma disciplina - Relacionamento 1 disciplina para N perguntas
        return $this->belongsTo('App\Models\Disciplina');
    }

    public function usuarios(){
        // Muitas perguntas se relacionam com muitos usuários - Relacionamento N perguntas para M usuários
        return $this->belongsToMany('App\Models\Usuario','tentativas','pergunta_id','usuario_id');
    }
}
