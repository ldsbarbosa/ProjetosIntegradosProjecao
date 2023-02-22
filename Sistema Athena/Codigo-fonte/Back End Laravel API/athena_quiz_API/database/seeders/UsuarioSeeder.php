<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nome' => 'Usuário de Teste',
            'senha' => password_hash('adm13579', PASSWORD_DEFAULT),
            'data_de_nascimento' => '1990-07-20',
            'apelido' => 'Apelido de Teste',
            'email' => 'usuario_de_teste@teste_athena.com',
            'CPF' => '48652573069',
            'cidade' => 'Sobradinho'
        ]);
        //-------------
        Usuario::create([
            'nome' => 'Usuário de Teste2',
            'senha' => password_hash('adm13580', PASSWORD_DEFAULT),
            'data_de_nascimento' => '1990-07-21',
            'apelido' => 'Apelido de Teste2',
            'email' => 'usuario_de_teste2@teste_athena.com',
            'CPF' => '38710743065',
            'cidade' => 'Vicente Pires'
        ]);
    }
}
