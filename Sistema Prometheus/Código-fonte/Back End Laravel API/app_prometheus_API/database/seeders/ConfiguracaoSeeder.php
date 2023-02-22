<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuracao;

class ConfiguracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuracao::create([
            'usuario_id' => 1,
            'computador_id' => 1,
        ]);
        Configuracao::create([
            'usuario_id' => 1,
            'computador_id' => 2,
        ]);
        Configuracao::create([
            'usuario_id' => 1,
            'computador_id' => 4,
        ]);
        //-------
        Configuracao::create([
            'usuario_id' => 2,
            'computador_id' => 1,
        ]);
        Configuracao::create([
            'usuario_id' => 2,
            'computador_id' => 3,
        ]);
        Configuracao::create([
            'usuario_id' => 2,
            'computador_id' => 5,
        ]);
    }
}
