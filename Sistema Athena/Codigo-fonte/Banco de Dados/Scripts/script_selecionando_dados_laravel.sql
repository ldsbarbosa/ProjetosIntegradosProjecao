/* Criação do banco de dados */
/* Caso o banco de dados não tenha sido criado, não haverá como executar os próximos scripts de banco de dados
dentro do projeto Laravel, que são as Migrations, para criação de tabelas, e as Seeders, para inserção de registros.
Deve ser executado primeiro as migrations, depois as seeders.*/
CREATE DATABASE sistema_athena_laravel;
USE sistema_athena_laravel;

/* Testando inserção de dados */
/* Usuário */
SELECT * FROM sistema_athena_laravel.usuarios;
DESCRIBE sistema_athena_laravel.usuarios;

/* Tentativa */
SELECT * FROM sistema_athena_laravel.tentativas;
DESCRIBE sistema_athena_laravel.tentativas;

/* Pergunta */
SELECT * FROM sistema_athena_laravel.perguntas;
DESCRIBE sistema_athena_laravel.perguntas;

/* Banca */
SELECT * FROM sistema_athena_laravel.bancas;
DESCRIBE sistema_athena_laravel.bancas;

/* Disciplina */
SELECT * FROM sistema_athena_laravel.disciplinas;
DESCRIBE sistema_athena_laravel.disciplinas;

/* Opção */
SELECT * FROM sistema_athena_laravel.opcoes;
DESCRIBE sistema_athena_laravel.opcoes;


/* Prova */
SELECT * FROM sistema_athena_laravel.provas;
DESCRIBE sistema_athena_laravel.provas;

/* Alguns relacionamentos */
select enunciado, disciplinas.nome from sistema_athena_laravel.perguntas INNER JOIN sistema_athena_laravel.disciplinas ON perguntas.disciplina_id=disciplinas.id;
select enunciado, provas.nome from sistema_athena_laravel.perguntas INNER JOIN sistema_athena_laravel.provas ON perguntas.prova_id=provas.id;

/* Migrations */
SELECT * FROM sistema_athena_laravel.migrations;

/* Log */
SELECT * FROM sistema_athena_laravel.log_acessos;
