<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Processador;

class ProcessadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------
        Processador::create([
            'nome' => 'Processador Intel Core i3-10105F, 3.7Ghz (4.4Ghz Turbo) Cache 6MB, LGA1200',
            'preco' => 589.90,
            'marca' => 'Intel',
            'qtd_threads' => 8,
            'qtd_nucleos' => 4
        ]);
        //--------
        Processador::create([
            'nome' => 'Processador Intel Core i7-11700',
            'preco' => 499.90,
            'marca' => 'Intel',
            'qtd_threads' => 16,
            'qtd_nucleos' => 8
        ]);
        //--------
        Processador::create([
            'nome' => 'Processador Intel Core i5-10400F, 2.9Ghz (4.3Ghz Turbo), Cache 12MB, LGA1200',
            'preco' => 699.90,
            'marca' => 'Intel',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        Processador::create([
            'nome' => 'Processador AMD Ryzen 9 7950X, 4.5GHz (5.7GHz Turbo), Cache 80MB',
            'preco' => 5499.99,
            'marca' => 'AMD',
            'qtd_threads' => 32,
            'qtd_nucleos' => 16
        ]);
        //--------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 9 7900X, 12-Core, 24-Threads, 4.7GHz (5.6GHz Turbo), Cache 76MB, AM5',
            'preco' => 3949.99,
            'marca' => 'AMD',
            'qtd_threads' => 24,
            'qtd_nucleos' => 12
        ]);
        //--------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 7 7700X, 8-Core, 16-Threads, 4.5GHz (5.4GHz Turbo), Cache 40MB, AM5,',
            'preco' => 2699,
            'marca' => 'AMD',
            'qtd_threads' => 16,
            'qtd_nucleos' => 8
        ]);
        //------// Processadores avulsos abaixo
        Processador::create([
            'nome' => 'Processador AMD Ryzen 5 5600, 3.5GHz (4.4GHz Max Turbo), Cache 35MB, AM4, Sem Vídeo',
            'preco' => 1099.99,
            'marca' => 'AMD',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        //------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 5 5600X, 3.7GHz (4.6GHz Max Turbo), Cache 35MB, AM4',
            'preco' => 1199.99,
            'marca' => 'AMD',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        //------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 5 5600G, 3.9GHz (4.4GHz Max Turbo), Cache 19MB, Vídeo Integrado, AM4',
            'preco' => 1786.58,
            'marca' => 'AMD',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        //------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 5 4600G, 3.7GHz (4.2GHz Max Turbo), Cache 11MB, AM4, Vídeo Integrado',
            'preco' => 749.99,
            'marca' => 'AMD',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        //------
        Processador::create([
            'nome' => 'Processador AMD Ryzen 7 5700X, 3.4GHz (4.6GHz Max Turbo), Cache 36MB, AM4, Sem Vídeo',
            'preco' => 1399.99,
            'marca' => 'AMD',
            'qtd_threads' => 12,
            'qtd_nucleos' => 6
        ]);
        //------
        Processador::create([
            'nome' => 'Processador Intel Core i5-10400F, 2.9Ghz (4.3Ghz Turbo), Cache 12MB, LGA1200',
            'preco' => 589.90,
            'marca' => 'Intel',
            'qtd_threads' => 16,
            'qtd_nucleos' => 8
        ]);
        //------
        Processador::create([
            'nome' => 'Processador Intel Core i3-10105, 3.7GHz (4.4GHz Max Turbo), Cache 6MB, LGA 1200, Vídeo Integrado',
            'preco' => 699.99,
            'marca' => 'Intel',
            'qtd_threads' => 8,
            'qtd_nucleos' => 4
        ]);
    }
}
