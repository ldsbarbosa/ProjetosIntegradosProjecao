<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    //TABELA
    protected $table = 'log_acessos';
    
    //ATRIBUTOS
    protected $fillable = [
        'log'
    ];
}
