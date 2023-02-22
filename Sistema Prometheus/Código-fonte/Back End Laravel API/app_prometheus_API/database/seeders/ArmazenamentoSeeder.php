<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Armazenamento;

class ArmazenamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Armazenamento::create([ //-- Armazenamento 1
            'nome' => 'HD WD Blue 1TB 3.5" Sata III 6GB/s',
            'preco' => 309.9,
            'marca' => 'Western Digital',
            'tipo' => 'HD',
            'capacidade' => 1000
        ]);
        //--------
        Armazenamento::create([ //-- Armazenamento 2
            'nome' => 'SSD GIGABYTE 1TB M.2 2280 PCIE 3.0 X4 NVME',
            'preco' => 949.9,
            'marca' => 'Gigabyte',
            'tipo' => 'SSD',
            'capacidade' => 1000
        ]);
        //--------
        Armazenamento::create([ //-- Armazenamento 3
            'nome' => 'HD WD Blue 2TB 3.5" Sata III 6GB/s',
            'preco' => 439.90,
            'marca' => 'Western Digital',
            'tipo' => 'HD',
            'capacidade' => 2000
        ]);
        //---------
        Armazenamento::create([ //-- Armazenamento 4
            'nome' => 'SSD Lexar NQ100, 960GB, 2.5, Sata III 6GB/s, Leitura 550 MB/s, Gravacao 500MB/s',
            'preco' => 659.99,
            'marca' => 'Lexar',
            'tipo' => 'SSD',
            'capacidade' => 960
        ]);
        //--------
        Armazenamento::create([ //-- Armazenamento 5
            'nome' => 'SSD Lexar NM610 1TB M.2 2280 PCIe',
            'preco' => 574.9,
            'marca' => 'Lexar',
            'tipo' => 'SSD',
            'capacidade' => 1000
        ]);
        //--------
        Armazenamento::create([ //-- Armazenamento 6
            'nome' => 'SSD Pichau Kepler Z, 512GB, M.2 2280, PCIe NVMe, Leitura 3400MB/s, Gravacao 2590MB/s',
            'preco' => 686.31,
            'marca' => 'Pichau',
            'tipo' => 'SSD',
            'capacidade' => 512
        ]);
    }
}
