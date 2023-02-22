<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    //ATRIBUTOS
    protected $fillable = [
        'nome',
        'senha',
        'data_de_nascimento',
        'apelido',
        'email',
        'CPF',
        'cidade'];
    
    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'nome' => 'required|unique:usuarios,nome,'.$this->id.'|min:3|max:40',
            'senha' => 'required|min:3|max:40',
            'data_de_nascimento' => 'required|regex:/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/',
            'apelido' => 'required|min:3|max:40',
            'email' => 'required|unique:usuarios,email,'.$this->id.'|min:3|max:40|email',
            'CPF' => 'required|unique:usuarios,CPF,'.$this->id.'|min:14|max:14',
            'cidade' => 'required|min:3|max:40'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O campo :attribute já está cadastrado',
            'min' => 'O campo :attribute deve possuir mais caracteres',
            'max' => 'O campo :attribute deve possuir menos caracteres',
            'data_de_nascimento.regex' => 'O campo de data deve estar no formato 0000-00-00',
            'email.email' => 'O email deve possuir @ e domínio'
        ];
    }
    //RELACIONAMENTOS
    public function tentativas(){
        // Um usuário possui muitas tentativas - Relacionamento 1 usuário para N tentativas
        return $this->hasMany('App\Models\Tentativa');
    }

    public function perguntas(){
        // Muitos usuários se relacionam com muitas perguntas - Relacionamento N usuários para M perguntas
        return $this->belongsToMany('App\Models\Pergunta','tentativas','usuario_id','pergunta_id');
    }
}
