-- POVOANDO AGENCIA
INSERT INTO Agencia(nome, salario_montante_total, cidade) VALUES
('Bradesco','0.00','Sobral'),
('Banco do Brasil','0.00','Fortaleza'),
('Itaú','0.00','São Paulo'),
('Itaú','0.00','Rio de Janeiro'),
('Caixa','0.00','Itapipoca'); 
SELECT * FROM Agencia;

-- POVOANDO CLIENTES
INSERT INTO Clientes(cpf, nome_completo, rg, data_nasc, UF, orgao_emissor, logradouro, nome_logradouro, num_casa, bairro, cep, cidade, estado, senha_login) VALUES
('06965136332', 'Emanuel Dêvid Paulino Felix', '20160939584', '2000-07-27', 'CE', 'SSPDS', 'Rua', 'São Miguel', '5', 'São Luiz', '62550000', 'Morrinhos', 'Ceará', '123456'),
('07895734355', 'Wendel Manfrini de Souza', '20005687843', '2000-11-28', 'CE', 'SSPDS', 'Avenida', 'John Sanford', '210', 'Terrenos Velhos', '62049000', 'Sobral', 'Ceará', '123879'),
('07448514962', 'Frank William de Souza', '2015596217', '1990-01-14', 'CE', 'SSPDS', 'Rua', 'Coronel Estanislau Frota', '220', 'Centro', '62687222', 'Sobral', 'Ceará', '456756'),
('87248965231', 'Francisco José dos Santos', '20177685423', '1980-09-27', 'CE', 'SSPDS', 'Rua', 'Coronel Pinto Peixoto', '8', 'Centro', '65789654', 'Fortaleza', 'Ceará', '897545'),
('78934238785', 'Maria Alice Albuquerque', '20054698700', '2001-12-01', 'CE', 'SSPDS', 'Casa', 'Recanto das Flores', '515', 'Santo Afonso', '64870170', 'Marco', 'Ceará', '124795');
SELECT * FROM Clientes;

-- POVOANDO FUNCIONARIOS
INSERT INTO Funcionarios(nome_completo, senha, endereco, cidade, sexo, data_nasc, salario, cargo, agencia_id) VALUES
('Wendel Manfrini','3562253','Rua Almeira Alves 269','Sobral','M','1989-12-07','1000.27','gerente','4'),
('Igor Pierre','263543547','Capaciringa de Arruda 279','Amapá','M','1980-12-07','8640.27','gerente','1'),
('Wendel Manfrini','3562253','Rua Almeira Alves 269','Sobral','M','1989-12-07','1000.27','gerente','1'),
('Igor Pierre','263543547','Capaciringa de Arruda 279','Amapá','M','1980-12-07','8640.27','gerente','3'),
('Emanuel Devid','8568347','Morrinho de Arruda 989','Fortaleza','M','1950-12-07','1869.27','atendente','2');
SELECT * FROM Funcionarios;

-- POVOANDO CONTAS
INSERT INTO Contas(agencia_id, saldo, senha, tipo_conta, conta_conjunta, gerente_matricula) VALUES
('1', '0.00', '1234', 'poupanca', 'N', '1'),
('2', '0.00', '4321', 'corrente', 'N', '2'),
('3', '0.00', '9876', 'especial', 'N', '3'),
('4', '0.00', '6789', 'corrente', 'N', '4'),
('5', '0.00', '1674', 'poupanca', 'S', '1');
SELECT * FROM Contas;


INSERT INTO Contas(agencia_id, saldo, senha, tipo_conta, conta_conjunta, gerente_matricula) VALUES
('2', '0.00', '123456', 'corrente', 'N', '1');

-- POVOANDO POSSUI
INSERT INTO Possui(Clientes_cpf, Contas_num_conta, Contas_agencia_id) VALUES
('06965136332', '1', '1'),
('07448514962', '2', '2'),
('07895734355', '3', '3'),
('78934238785', '4', '4'),
('87248965231', '5', '5');
SELECT * FROM Possui;

INSERT INTO Possui(Clientes_cpf, Contas_num_conta, Contas_agencia_id) VALUES
('06965136332', '14', '5'),
('06965136332', '15', '1'),
('06965136332', '16', '2');

-- LER CONTA CORRENTE. NÃO É POSSÍVEL POVOÁ-LA, POIS EXSITE UM TRIGGER RESPONSÁVEL POR ISSO ASSIM QUE UMA CONTA DO TIPO CORRENTE É CRIADA
SELECT * FROM Corrente;

-- POVOANDO CONTA ESPECIAL
INSERT INTO Especial(limite_credito, Contas_num_conta) VALUES
('2000.00', '3');
SELECT * FROM Especial;

-- POVOANDO CONTA POUPANCA
INSERT INTO Poupanca(taxa_juros, Contas_num_conta) VALUES
('5.0', '1'),
('5.0', '5');
SELECT * FROM Poupanca;

-- POVOANDO DEPENDENTES
INSERT INTO Dependentes(nome_completo, data_nasc, parentesco, funcionarios_matricula) VALUES
('Manfris de Andrade','2015-12-09', 'filho','1'),
('Emanuel Davi Felix','2018-11-24', 'filho','5'),
('Igor Júnior','2019-09-23', 'primo','2'),
('Carlos Souza','2000-09-23', 'filho','2'),
('Maria Eduarda Felix','2022-02-23', 'filha','5');
SELECT * FROM Dependentes;

-- POVOANDO EMAIL
INSERT INTO Emails (Clientes_cpf, email) VALUES
('06965136332', 'emanueldavid150@gmail.com'),
('06965136332', 'emanueldevidfelix@alu.ufc.br'),
('07895734355', 'manfra@hotmail.com'),
('07895734355', 'manfrasouza@gmail.com'),
('07448514962', 'frankwilliam@gmail.com');
SELECT * FROM Emails;

-- POVOANDO TELEFONES
INSERT INTO Telefones(telefone, Clientes_cpf) VALUES
('88996874317','06965136332'),
('88999124261','06965136332'),
('88994277818','07895734355'),
('88997456123','07895734355'),
('86999056755','07448514962');
SELECT * FROM Telefones;

-- POVOANDO TRANSACAO
INSERT INTO Transacao(tipo_transacao, data_hora, valor, Contas_num_conta) VALUES
('depósito', curdate(), '5000.00', '5'),
('transferência', curdate(), '1500.00', '5'),
('saque', curdate(), '1000.00', '5'),
('depósito', curdate(), '10000.00', '2'),
('estorno', curdate(), '1000.00', '2'),
('transferência', curdate(), '2000.00', '2'),
('pagamento', curdate(), '1000.00', '2'),
('depósito', curdate(), '7000.00', '1'),
('depósito', curdate(), '1000.00', '1'),
('saque', curdate(), '3500.00', '1');
SELECT * FROM Transacao;