<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prova;

class ProvaSeeder extends Seeder
{
    public function run()
    {
        $prova = new Prova();
        Prova::create([
            'banca_id' => 3,
            'nome' => 'Petrobras - Analista de Sistemas - Engenharia de Software'
        ]);
        //-------------
        Prova::create([
            'banca_id' => 4,
            'nome' => 'ELETROBRAS - ELETRONUCLEAR - Analista de Sistemas - Aplicação e Segurança de TIC'
        ]);
        //-------------
        Prova::create([
            'banca_id' => 5,
            'nome' => 'AGERGS - Técnico Superior Analista de Sistemas'
        ]);
        //-------------
        Prova::create([
            'banca_id' => 5,
            'nome' => 'Prefeitura de Viamão - RS - Analista de Sistemas'
        ]);
        //-------------
    }
}
