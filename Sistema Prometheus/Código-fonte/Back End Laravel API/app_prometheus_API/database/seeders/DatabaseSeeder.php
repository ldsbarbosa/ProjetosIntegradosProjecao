<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(UsuarioSeeder::class);
        $this->call(GabineteSeeder::class);
        $this->call(FonteDeEnergiaSeeder::class);
        $this->call(ArmazenamentoSeeder::class);
        $this->call(PlacaMaeSeeder::class);
        $this->call(ProcessadorSeeder::class);
        $this->call(MemoriaRAMSeeder::class);
        $this->call(ComputadorSeeder::class);
        $this->call(ConfiguracaoSeeder::class);
        $this->call(QtdPentesNoComputadorSeeder::class);
        // Comando a ser rodado: php artisan db:seed
    }
}
