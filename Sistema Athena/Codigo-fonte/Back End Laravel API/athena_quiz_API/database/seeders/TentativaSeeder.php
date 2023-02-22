<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tentativa;

class TentativaSeeder extends Seeder
{
    public function run()
    {
        Tentativa::create([
            'usuario_id' => 1,
            'pergunta_id' => 1,
            'tentativa' => 1
        ]);
        Tentativa::create([
            'usuario_id' => 1,
            'pergunta_id' => 2,
            'tentativa' => 0
        ]);
        Tentativa::create([
            'usuario_id' => 2,
            'pergunta_id' => 1,
            'tentativa' => 0
        ]);
    }
}
