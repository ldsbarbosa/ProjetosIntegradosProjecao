/* Criação do Banco de Dados*/
/* Caso o banco de dados não tenha sido criado, não haverá como executar os próximos scripts de banco de dados
dentro do projeto Laravel, que são as Migrations, para criação de tabelas, e as Seeders, para inserção de registros.
Deve ser executado primeiro as migrations, depois as seeders.*/
CREATE DATABASE sistema_prometheus_laravel;
USE sistema_prometheus_laravel;

/* Testando inserção de dados */
/* Usuário */
SELECT * FROM sistema_prometheus_laravel.usuarios;
DESCRIBE sistema_prometheus_laravel.usuarios;

/* Configuração -> M:N Usuários Computadores */
SELECT * FROM sistema_prometheus_laravel.configuracoes;
DESCRIBE sistema_prometheus_laravel.configuracoes;

/* Computador */
SELECT * FROM sistema_prometheus_laravel.computadores;
DESCRIBE sistema_prometheus_laravel.computadores;

SELECT gabinete_id, fonte_de_energia_id, armazenamento_id, placa_mae_id, processador_id, preco_montagem, compatibilidade
FROM computadores
WHERE gabinete_id = 1 AND fonte_de_energia_id = 1 AND armazenamento_id = 1 AND placa_mae_id = 1 AND processador_id = 1 AND compatibilidade = 1;

/* Memória RAM */
SELECT * FROM sistema_prometheus_laravel.memorias_ram;
DESCRIBE sistema_prometheus_laravel.memorias_ram;

/* Quantidade de memórias RAM's por computador, relacionamento M:N */
SELECT * FROM sistema_prometheus_laravel.qtd_pentes_no_computador;
DESCRIBE sistema_prometheus_laravel.qtd_pentes_no_computador;

/* Processador */
SELECT * FROM sistema_prometheus_laravel.processadores;
DESCRIBE sistema_prometheus_laravel.processadores;

/* Gabinete */
SELECT * FROM sistema_prometheus_laravel.gabinetes;
DESCRIBE sistema_prometheus_laravel.gabinetes;

/* Fonte de energia */
SELECT * FROM sistema_prometheus_laravel.fontes_de_energia;
DESCRIBE sistema_prometheus_laravel.fontes_de_energia;

/* Disco rígido (HD) */
SELECT * FROM sistema_prometheus_laravel.discos_rigidos;
DESCRIBE sistema_prometheus_laravel.discos_rigidos;

/* Placa-Mãe (Motherboard) */
SELECT * FROM sistema_prometheus_laravel.placas_mae;
DESCRIBE sistema_prometheus_laravel.placas_mae;

/* Migrations */
SELECT * FROM sistema_prometheus_laravel.migrations;
DESCRIBE sistema_prometheus_laravel.migrations;

/* Log */
SELECT * FROM sistema_prometheus_laravel.log_acessos;
DESCRIBE sistema_prometheus_laravel.migrations;

/* Joins com o computador */
SELECT * FROM sistema_prometheus_laravel.computadores INNER JOIN sistema_prometheus_laravel.placas_mae ON computadores.placa_mae_id = placas_mae.id;
SELECT * FROM sistema_prometheus_laravel.computadores INNER JOIN sistema_prometheus_laravel.processadores ON computadores.processador_id = processadores.id;
SELECT * FROM sistema_prometheus_laravel.computadores INNER JOIN sistema_prometheus_laravel.gabinetes ON computadores.gabinete_id = gabinetes.id;
SELECT * FROM sistema_prometheus_laravel.computadores INNER JOIN sistema_prometheus_laravel.fontes_de_energia ON computadores.fonte_de_energia_id = fontes_de_energia.id;