<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banca;

class BancaSeeder extends Seeder
{
    public function run()
    {
        Banca::create([
            'nome' => 'Sem banca'
        ]);
        //----------------
        Banca::create([
            'nome' => 'Banca não informada'
        ]);
        //----------------
        Banca::create([
            'nome' => 'CESPE CEBRASPE'
        ]);
        //----------------
        Banca::create([
            'nome' => 'CESGRANRIO'
        ]);
        //----------------
        Banca::create([
            'nome' => 'FUNDATEC'
        ]);
        //----------------
    }
}
