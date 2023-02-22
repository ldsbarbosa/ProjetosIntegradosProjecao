<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opcao;

class OpcaoSeeder extends Seeder
{
    public function run()
    {
        //------------------------
        Opcao::create([
            'pergunta_id' => 7,
            'nome_opcao' => '1F'
        ]);
        Opcao::create([
            'pergunta_id' => 7,
            'nome_opcao' => 'F'
        ]);
        Opcao::create([
            'pergunta_id' => 7,
            'nome_opcao' => 'FF'
        ]);
        Opcao::create([
            'pergunta_id' => 7,
            'nome_opcao' => '16'
        ]);
        Opcao::create([
            'pergunta_id' => 7,
            'nome_opcao' => '1C'
        ]);
        //------------------------
        Opcao::create([
            'pergunta_id' => 8,
            'nome_opcao' => 'Hipervisor do tipo 1'
        ]);
        Opcao::create([
            'pergunta_id' => 8,
            'nome_opcao' => 'Hipervisor do tipo 2'
        ]);
        Opcao::create([
            'pergunta_id' => 8,
            'nome_opcao' => 'Hipervisor do tipo 3'
        ]);
        Opcao::create([
            'pergunta_id' => 8,
            'nome_opcao' => 'Paravirtualização'
        ]);
        Opcao::create([
            'pergunta_id' => 8,
            'nome_opcao' => 'Conteinerização'
        ]);
        //------------------------
        Opcao::create([
            'pergunta_id' => 9,
            'nome_opcao' => 'Todos os alunos da turma de matemática estudaram para a prova'
        ]);
        Opcao::create([
            'pergunta_id' => 9,
            'nome_opcao' => 'Existe aluno da turma de matemática que estudou para a prova'
        ]);
        Opcao::create([
            'pergunta_id' => 9,
            'nome_opcao' => 'Nenhum aluno da turma de matemática estudou para a prova'
        ]);
        Opcao::create([
            'pergunta_id' => 9,
            'nome_opcao' => 'Existe aluno que estudou para a prova de matemática'
        ]);
        Opcao::create([
            'pergunta_id' => 9,
            'nome_opcao' => 'Todos os alunos da turma de matemática não estudaram para a prova'
        ]);
        //------------------------
        Opcao::create([
            'pergunta_id' => 10,
            'nome_opcao' => 'Patrícia gosta de matemática ou é professora'
        ]);
        Opcao::create([
            'pergunta_id' => 10,
            'nome_opcao' => 'Se Patrícia é professora, então gosta de matemática'
        ]);
        Opcao::create([
            'pergunta_id' => 10,
            'nome_opcao' => 'Patrícia não é professora ou não gosta de matemática'
        ]);
        Opcao::create([
            'pergunta_id' => 10,
            'nome_opcao' => 'Patrícia não é professora se, e somente se, não gosta de matemática'
        ]);
        Opcao::create([
            'pergunta_id' => 10,
            'nome_opcao' => 'Se Patrícia não é professora, então gosta de matemática'
        ]);
        //------------------------
        Opcao::create([
            'pergunta_id' => 11,
            'nome_opcao' => 'EDoS'
        ]);
        Opcao::create([
            'pergunta_id' => 11,
            'nome_opcao' => 'DDoS'
        ]);
        Opcao::create([
            'pergunta_id' => 11,
            'nome_opcao' => 'DRDoS'
        ]);
        Opcao::create([
            'pergunta_id' => 11,
            'nome_opcao' => 'MDoS'
        ]);
        Opcao::create([
            'pergunta_id' => 11,
            'nome_opcao' => 'BDoS'
        ]);
        //------------------------
        Opcao::create([
            'pergunta_id' => 12,
            'nome_opcao' => 'SP-800-12'
        ]);
        Opcao::create([
            'pergunta_id' => 12,
            'nome_opcao' => 'SP-800-30'
        ]);
        Opcao::create([
            'pergunta_id' => 12,
            'nome_opcao' => 'SP-800-34'
        ]);
        Opcao::create([
            'pergunta_id' => 12,
            'nome_opcao' => 'SP-800-42'
        ]);
        Opcao::create([
            'pergunta_id' => 12,
            'nome_opcao' => 'SP-800-61'
        ]);
        //------------------------
    }
}
