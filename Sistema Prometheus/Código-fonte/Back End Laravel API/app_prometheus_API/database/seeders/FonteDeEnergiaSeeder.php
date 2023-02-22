<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FonteDeEnergia;

class FonteDeEnergiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------- Fonte 1
        FonteDeEnergia::create([
            'nome' => 'Fonte Corsair VS500, 500W, 80 Plus White',
            'preco' => 279.99,
            'marca' => 'Corsair',
            'potencia' => 500
        ]);
        //------------  Fonte 2
        FonteDeEnergia::create([
            'nome' => '750 W MWE Bronze series (PFC ativo), 80 PLUS Bronze, ATX 12V V2.5 BIVOLT',
            'preco' => 584.91,
            'marca' => 'Cooler Master',
            'potencia' => 750
        ]);
        //------------ Fonte 3
        FonteDeEnergia::create([
            'nome' => 'Fonte Pichau Gaming Nidus 500W Bronze 80 Plus',
            'preco' => 459.90,
            'marca' => 'Pichau',
            'potencia' => 500
        ]);
        //------------ Fonte 4
        FonteDeEnergia::create([
            'nome' => 'Fonte Corsair CX-M Series CX750M, 750W, Semi Modular, 80 Plus Bronze',
            'preco' => 579.99,
            'marca' => 'Corsair',
            'potencia' => 750
        ]);
        //------------ Fonte 5
        FonteDeEnergia::create([
            'nome' => 'Fonte Corsair CV 750, 750W, 80 Plus Bronze, Preto',
            'preco' => 694.81,
            'marca' => 'Corsair',
            'potencia' => 750
        ]);
    }
}
