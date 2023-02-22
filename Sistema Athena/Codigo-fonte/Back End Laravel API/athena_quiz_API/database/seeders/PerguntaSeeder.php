<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pergunta;
//['prova_id','disciplina_id','enunciado','tipo_pergunta','resposta'];
class PerguntaSeeder extends Seeder
{
    public function run()
    {
        $pergunta = new Pergunta();
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'O conceito de sprint tem sua origem no RUP a partir da execução das fases, cada uma delas com seu marco; cada ciclo no RUP tinha uma sprint considerada, assim como um projeto curto.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '0'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'No Scrum, todo o trabalho necessário para atingir a meta do produto está embutido nas sprints, inclusive as daily scrums e as sprint retrospective.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '1'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'Ferramentas automatizadas para armazenamento de requisitos, gerenciamento de mudanças e gerenciamento de rastreabilidade são indicadas para apoio ao processo de gerenciamento de requisitos.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '1'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'Histórias de usuário são ferramentas para a definição de escopo de produtos de software voltadas a fornecer uma análise detalhada sobre a atividade do usuário e a viabilizar a retenção de conhecimento em longo prazo.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '0'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'Os critérios de aceitação descrevem um conjunto mínimo de requisitos que precisam ser atendidos para que valha a pena implementar uma solução específica.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '1'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 2,
            'enunciado' => 'Uma das limitações da prototipação relacionada ao design da solução ocorre quando as partes interessadas se concentram mais nas especificações do design do que nos requisitos e os desenvolvedores acreditam que é necessário fornecer ao usuário uma interface fielmente precisa ao protótipo, mesmo que existam tecnologias e abordagens de interface mais interessantes.',
            'tipo_pergunta' => 'Verdadeiro ou Falso',
            'resposta' => '1'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 3,
            'disciplina_id' => 8,
            'enunciado' => 'Considerando os números binários 1010 e 1100, qual o resultado da soma entre eles em representação hexadecimal?',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '00010'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 3,
            'disciplina_id' => 4,
            'enunciado' => 'Existe uma abordagem de virtualização que prevê um único programa executando em modo privilegiado e não depende de um Sistema Operacional para sua implementação. Trata-se da abordagem conhecida como:',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '10000'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 4,
            'disciplina_id' => 8,
            'enunciado' => 'A negação da sentença “Existe aluno da turma de matemática que não estudou para a prova” é:',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '10000'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 4,
            'disciplina_id' => 8,
            'enunciado' => 'Sabendo que é verdadeira a proposição “Patrícia é professora e gosta de matemática”, podemos dizer que é falso que:',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '00100'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 3,
            'enunciado' => 'Um ataque de negação de serviço com grande potencial de sucesso utiliza uma botnet formada por inúmeros bots espalhados em diferentes redes ao redor do mundo. Em vez de atacarem a vítima diretamente, esses bots se disfarçam como a vítima do ataque e produzem um fluxo de dados, tipicamente de solicitação de serviço, para outros nós de rede que não estão comprometidos pela entidade hostil. Por acreditarem que a solicitação foi enviada pela vítima, tais nós de rede produzem um fluxo de dados de resposta destinado à vítima. Esse ataque de negação de serviço é conhecido como:',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '10000'
        ]);
        //---------------
        Pergunta::create([
            'prova_id' => 1,
            'disciplina_id' => 3,
            'enunciado' => 'Risco é a possibilidade de alguma coisa adversa acontecer. O processo de gerenciamento de risco se resume em determinar controles de segurança que reduzam os riscos a níveis aceitáveis. O risco residual deve ser aceito e devem ser instituídos controles que garantam o tratamento dos eventuais incidentes de segurança. O documento do NIST (National Institute of Standards and Technology) que provê um guia para o tratamento de incidentes de segurança de computadores de forma eficiente e efetiva é o:',
            'tipo_pergunta' => 'Múltipla Escolha',
            'resposta' => '00100'
        ]);
    }
}
