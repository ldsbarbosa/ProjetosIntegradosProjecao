<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
    public function run()
    {
        Disciplina::create([
            'nome' => 'Disciplina não informada',
            'descricao' => 'Não há descrição'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Engenharia de Software',
            'descricao' => 'Engenharia de software é uma área da engenharia e da computação voltada à especificação, desenvolvimento, manutenção e criação de software, com a aplicação de tecnologias e práticas de gerência de projetos e outras disciplinas, visando organização, produtividade e qualidade.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Rede de Computadores',
            'descricao' => 'Rede de computadores, na informática e na telecomunicação, é um conjunto de dois ou mais dispositivos eletrônicos de computação (ou módulos processadores ou nós da rede) interligados por um sistema de comunicação digital (ou link de dados), guiados por um conjunto de regras (protocolo de rede) para compartilhar entre si informação, serviços e, recursos físicos e lógicos.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Arquitetura de Computadores',
            'descricao' => 'A arquitetura de computadores é a forma como os diversos componentes de um computador são organizados, determina aspectos relacionados à qualidade, ao desempenho e à aplicação para a qual o dispositivo vai ser orientado.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Programação/Desenvolvimento',
            'descricao' => 'A programação de computadores é o processo de realizar uma computação específica (ou, mais geralmente, realizar um resultado de computação específico), geralmente projetando e construindo um programa de computador executável.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Banco de Dados',
            'descricao' => 'Bancos de dados são conjuntos de arquivos relacionados entre si, com registros sobre pessoas, lugares ou informações em geral. São coleções organizadas de dados que se relacionam de forma a criar algum sentido (informação).'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Desing para Web',
            'descricao' => 'Design para web é uma extensão da prática do design gráfico, onde o foco do projeto é a criação de web sites e documentos disponíveis no ambiente da World Wide Web.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Lógica Computacional',
            'descricao' => 'Lógica computacional é o uso da lógica para realizar ou raciocinar sobre a computação, tendo uma relação semelhante com a ciência da computação e a engenharia, assim como a lógica matemática com a matemática. Seria sinônimo de: Lógica na ciência da computação.'
        ]);
        //----------------
        Disciplina::create([
            'nome' => 'Algoritmos e Lógica de Programação',
            'descricao' => 'Algoritmo é uma sequência finita de ações executáveis que visam obter uma solução para um determinado tipo de problema. Já a lógica de programação é um paradigma de programação que faz uso da lógica matemática, portanto implementando um algoritmo dentro desse paradigma.'
        ]);
        //----------------
    }
}
