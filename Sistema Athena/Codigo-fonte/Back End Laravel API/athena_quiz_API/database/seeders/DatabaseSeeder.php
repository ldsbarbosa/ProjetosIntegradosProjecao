<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(UsuarioSeeder::class);
        $this->call(BancaSeeder::class);
        $this->call(DisciplinaSeeder::class);
        $this->call(ProvaSeeder::class);
        $this->call(PerguntaSeeder::class);
        $this->call(OpcaoSeeder::class);
        $this->call(TentativaSeeder::class);
        // Comando a ser rodado: php artisan db:seed
    }
}
