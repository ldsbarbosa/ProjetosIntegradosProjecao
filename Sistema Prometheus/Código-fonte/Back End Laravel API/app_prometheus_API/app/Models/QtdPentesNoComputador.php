<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QtdPentesNoComputador extends Model
{
    use SoftDeletes;
    
    //TABELA
    protected $table = 'qtd_pentes_no_computador';

    //ATRIBUTOS
    protected $fillable = ['memoria_ram_id','computador_id'];
    
    //REGRAS PARA INSERÇÃO DE NOVOS REGISTROS
    public function rules(){
        return [
            'memoria_ram_id' => 'required|exists:memorias_ram,id',
            'computador_id' => 'required|exists:computadores,id'
        ];
    }
    //FEEDBACK CASO NÃO OBEDEÇA ÀS REGRAS
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'memoria_ram_id.exists' => 'A memória RAM não existe',
            'computador_id.exists' => 'O computador não existe'
        ];
    }

    //RELACIONAMENTOS
    public function memoriaRAM(){
        return $this->belongsTo('App\Models\Usuario','memoria_ram_id');
    }
    public function computador(){
        return $this->belongsTo('App\Models\Computador','computador_id');
    }
}
