<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
// Esta migration segue as recomendações da primeira migration de exemplo do Laravel dedicada à usuários de um sistema.
/*
Comandos a serem usados no terminal:
php artisan migrate -> Executar as migrações
php artisan migrate:fresh -> Desfazer as migrações
php artisan migrate:refresh -> Primeiramente, desfazer as migrações. Após, executar migrações.

*/
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('senha', 100);
            $table->date('data_de_nascimento');
            $table->string('apelido', 50);
            $table->string('email', 100)->unique();
            $table->string('CPF', 11)->unique();
            $table->string('cidade', 100);
            $table->timestamps(); // Coluna sugerida pelo Laravel - Data de criação e data de atualização (Portanto, inclui data_de_cadastro nativamente)
            $table->softDeletes(); // Exclusão lógica ao invés de exclusão física
            //$table->timestamp('email_verified_at')->nullable();       // Coluna sugerida pelo Laravel - Data de verificação do e-mail
            //$table->rememberToken();                                  // Coluna sugerida pelo Laravel - Controle de segurança para caso o usuário selecione que deseja que sua sessão seja lembrada
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
