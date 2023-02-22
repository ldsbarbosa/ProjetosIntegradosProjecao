<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemoriaRAM;

class MemoriaRAMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------
        MemoriaRAM::create([ //-- Memoria 1
            'nome' => 'Memoria Team Group T-Force Vulcan Pichau, DDR4, 3000Mhz, Vermelha',
            'preco' => 219.99,
            'marca' => 'Team Group',
            'capacidade' => 8
        ]);
        //-----
        MemoriaRAM::create([ //-- Memoria 2
            'nome' => 'Memoria Gamer Predator Orion 5000, DDR4, 3200 MHz',
            'preco' => 219.99,
            'marca' => 'Acer',
            'capacidade' => 8
        ]);
        //-----
        MemoriaRAM::create([ //-- Memoria 3
            'nome' => 'Memoria Team Group T-Force Vulcan Pichau RTB, DDR4, 3000MHz, Branca',
            'preco' => 219.99,
            'marca' => 'Team Group',
            'capacidade' => 8
        ]);
        //------
        MemoriaRAM::create([ //-- Memoria 4 (Tem 2)
            'nome' => 'Memoria Team Group T-Force Delta RGB DDR5, 6000MHz, Preta',
            'preco' => 1231.13,
            'marca' => 'Team Group',
            'capacidade' => 16
        ]);
        //-----
        MemoriaRAM::create([ //-- Memoria 5 32GB (2x16)
            'nome' => 'Memoria Team Group Elite DDR5 4800MHz Preto',
            'preco' => 1599.99,
            'marca' => 'Team Group',
            'capacidade' => 16
        ]);
        //-----
        MemoriaRAM::create([ //-- Memoria 6 16GB (1x16GB)
            'nome' => 'Memoria Adata XPG Lancer, DDR5, 5200MHz, CL38, Preto',
            'preco' => 979.99,
            'marca' => 'ADATA',
            'capacidade' => 16
        ]);
    }
}
