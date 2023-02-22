<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gabinete;

class GabineteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gabinete::create([ //----- Gabinete 1
            'nome' => 'Gabinete Gamer TGT Carbon, Rainbow, Mid Tower, Lateral de Vidro, Preto',
            'preco' => 239.00,
            'marca' => 'TGT',
            'comprimento' => 330,
            'largura' => 180,
            'altura' => 410
        ]);
        //-------
        Gabinete::create([ //----- Gabinete 2
            'nome' => 'Gabinete Acer Predator Orion 5000, Preto',
            'preco' => 399.00,
            'marca' => 'Acer',
            'comprimento' => 469,
            'largura' => 217,
            'altura' => 493
        ]);
        //-------
        Gabinete::create([ //----- Gabinete 3
            'nome' => 'Gabinete Gamer Pichau HX500 Metal Preto',
            'preco' => 249.00,
            'marca' => 'Pichau',
            'comprimento' => 425,
            'largura' => 215,
            'altura' => 480
        ]);
        //----------
        Gabinete::create([ //----- Gabinete 4
            'nome' => 'Gabinete Corsair iCUE 465X RGB Vidro Temp Branco Mid Tower',
            'preco' => 1079.90,
            'marca' => 'Corsair',
            'comprimento' => 467,
            'largura' => 216,
            'altura' => 445
        ]);
        //-------
        Gabinete::create([ //----- Gabinete 5
            'nome' => 'Gabinete Gamer Pichau Gadit 2 RGB, Mid-Tower, Lateral de Vidro Temperado, Com 3 Fans, Preto',
            'preco' => 799.90,
            'marca' => 'Pichau',
            'comprimento' => 420,
            'largura' => 216,
            'altura' => 489
        ]);
        //-------
        Gabinete::create([ //----- Gabinete 6
            'nome' => 'Gabinete Gamer Pichau Apus Black, Mid-Tower, Lateral de Vidro Temperado, Com 3 Fans, Preto,',
            'preco' => 299.00,
            'marca' => 'Pichau',
            'comprimento' => 380,
            'largura' => 200,
            'altura' => 440
        ]);
    }
}
