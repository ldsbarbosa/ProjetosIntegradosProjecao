<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Computador;

class ComputadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------ 1 PC
        Computador::create([
            'placa_mae_id' => 1,
            'gabinete_id' => 1,
            'processador_id' => 1,
            'fonte_de_energia_id' => 1,
            'armazenamento_id' => 1,
            'gabinete_id' => 1,
            'compatibilidade' => true,
            'preco_montagem' => 450
        ]);
        //------------ 2 PC
        Computador::create([
            'placa_mae_id' => 2,
            'gabinete_id' => 2,
            'processador_id' => 2,
            'fonte_de_energia_id' => 2,
            'armazenamento_id' => 2,
            'gabinete_id' => 2,
            'compatibilidade' => true,
            'preco_montagem' => 500
        ]);
        //------------ 3 PC
        Computador::create([
            'placa_mae_id' => 3,
            'gabinete_id' => 3,
            'processador_id' => 3,
            'fonte_de_energia_id' => 3,
            'armazenamento_id' => 3,
            'gabinete_id' => 3,
            'compatibilidade' => true,
            'preco_montagem' => 400
        ]);
        //-------------- 4 PC -TODO-
        Computador::create([
            'placa_mae_id' => 4,
            'gabinete_id' => 4,
            'processador_id' => 4,
            'fonte_de_energia_id' => 4,
            'armazenamento_id' => 4,
            'gabinete_id' => 4,
            'compatibilidade' => true,
            'preco_montagem' => 1000
        ]);
        //------------ 5 PC
        Computador::create([
            'placa_mae_id' => 4,
            'gabinete_id' => 5,
            'processador_id' => 5,
            'fonte_de_energia_id' => 4,
            'armazenamento_id' => 5,
            'gabinete_id' => 5,
            'compatibilidade' => true,
            'preco_montagem' => 900
        ]);
        //------------ 6 PC
        Computador::create([
            'placa_mae_id' => 5,
            'gabinete_id' => 6,
            'processador_id' => 6,
            'fonte_de_energia_id' => 5,
            'armazenamento_id' => 6,
            'gabinete_id' => 6,
            'compatibilidade' => true,
            'preco_montagem' => 800
        ]);
    }
}
