<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QtdPentesNoComputador;

class QtdPentesNoComputadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-------
        QtdPentesNoComputador::create([
            'computador_id' => 1,
            'memoria_ram_id' => 1
        ]);
        //------
        QtdPentesNoComputador::create([
            'computador_id' => 2,
            'memoria_ram_id' => 2
        ]);
        QtdPentesNoComputador::create([
            'computador_id' => 2,
            'memoria_ram_id' => 2
        ]);
        //------
        QtdPentesNoComputador::create([
            'computador_id' => 3,
            'memoria_ram_id' => 3
        ]);
        QtdPentesNoComputador::create([
            'computador_id' => 3,
            'memoria_ram_id' => 3
        ]);
        //------
        QtdPentesNoComputador::create([
            'computador_id' => 4,
            'memoria_ram_id' => 4
        ]);
        QtdPentesNoComputador::create([
            'computador_id' => 4,
            'memoria_ram_id' => 4
        ]);
        //------
        QtdPentesNoComputador::create([
            'computador_id' => 5,
            'memoria_ram_id' => 5
        ]);
        QtdPentesNoComputador::create([
            'computador_id' => 5,
            'memoria_ram_id' => 5
        ]);
        //------
        QtdPentesNoComputador::create([
            'computador_id' => 6,
            'memoria_ram_id' => 6
        ]);
    }
}
