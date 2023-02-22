<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlacaMae;

class PlacaMaeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--------
        PlacaMae::create([
            'nome' => 'Placa Mae Biostar H510MHP, DDR4, Socket LGA1200, M-ATX, Chipset Intel H510',
            'preco' => 509.90,
            'marca' => 'Biostar',
            'qtd_slots_memoria' => 2
        ]);
        //------
        PlacaMae::create([
            'nome' => 'Placa Mae Intel B560 Predator com RGB',
            'preco' => 499.90,
            'marca' => 'Intel',
            'qtd_slots_memoria' => 4
        ]);
        //------
        PlacaMae::create([
            'nome' => 'Placa Mae Pichau H510M, DDR4, Socket LGA1200, Chipset Intel H510',
            'preco' => 499.90,
            'marca' => 'Pichau',
            'qtd_slots_memoria' => 2
        ]);
        //--------
        PlacaMae::create([
            'nome' => 'Placa Mae ASRock X670E Steel Legend, DDR5, Socket AM5, ATX, Chipset AMD X670, X670E STEEL LEGEND',
            'preco' => 2799.00,
            'marca' => 'AsRock',
            'qtd_slots_memoria' => 4
        ]);
        //--------
        PlacaMae::create([
            'nome' => 'Placa Mae ASRock X670E PRO RS, DDR5, Socket AM5, ATX, Chipset AMD X670, X670E PRO RS',
            'preco' => 2699.00,
            'marca' => 'AsRock',
            'qtd_slots_memoria' => 4
        ]);
    }
}
