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
('06965136332', 'Emanuel Dêvid Paulino Felix', '20160939584', '2000-07-27', 'CE', 'SSPDS', 'Rua', 'São Miguel', '5', 'São Luiz', '62550000', 'Morrinhos', 'Ceará', '1234'),
('07895734355', 'Wendel Manfrini de Souza', '20005687843', '2000-11-28', 'CE', 'SSPDS', 'Avenida', 'John Sanford', '210', 'Terrenos Velhos', '62049000', 'Sobral', 'Ceará', '1234'),
('07448514962', 'Frank William de Souza', '2015596217', '1990-01-14', 'CE', 'SSPDS', 'Rua', 'Coronel Estanislau Frota', '220', 'Centro', '62687222', 'Sobral', 'Ceará', '1234'),
('87248965231', 'Francisco José dos Santos', '20177685423', '1980-09-27', 'CE', 'SSPDS', 'Rua', 'Coronel Pinto Peixoto', '8', 'Centro', '65789654', 'Fortaleza', 'Ceará', '1234'),
('78934238785', 'Maria Alice Albuquerque', '20054698700', '2001-12-01', 'CE', 'SSPDS', 'Casa', 'Recanto das Flores', '515', 'Santo Afonso', '64870170', 'Marco', 'Ceará', '1234');
SELECT * FROM Clientes;

-- POVOANDO FUNCIONARIOS
INSERT INTO Funcionarios(nome_completo, senha, endereco, cidade, sexo, data_nasc, salario, cargo, agencia_id) VALUES
('Wendel Manfrini','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','3000.00','gerente','1'),
('Igor Pierre','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','3000.00','gerente','2'),
('Neymar Jr','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','4000.00','gerente','3'),
('Fernando Rodrigues','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','8650.00','gerente','4'),
('Emanuel Devid','1234','Morrinho de Arruda 989','Fortaleza','M','1950-12-07','1869.27','gerente','5'),
('André Souza','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','0','caixa','1'),
('Eumar Felix','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','0','caixa','2'),
('Ana Cláudia','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','1000.27','caixa','3'),
('Caio Ítalo','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','0.27','caixa','4'),
('Emily Dávila','1234','Morrinho de Arruda 989','Fortaleza','M','1950-12-07','0.27','caixa','5'),
('José Rodrigues','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','3000.00','atendente','1'),
('Maria José dos Santos','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','3000.00','atendente','2'),
('Alfonso Paulo Coelho','1234','Rua Almeira Alves 269','Sobral','M','1989-12-07','4000.00','atendente','3'),
('Fernanda de Souza','1234','Capaciringa de Arruda 279','Amapá','M','1980-12-07','8650.00','atendente','4'),
('Carlos Rodrigo dos Santos','1234','Morrinho de Arruda 989','Fortaleza','M','1950-12-07','1869.27','atendente','5');
SELECT * FROM Funcionarios where cargo = 'gerente';

-- POVOANDO CONTAS
INSERT INTO Contas(agencia_id, saldo, senha, tipo_conta, conta_conjunta, gerente_matricula) VALUES
('1', '0.00', '1234', 'poupanca', 'N', '6'),
('2', '0.00', '4321', 'corrente', 'N', '7'),
('3', '0.00', '9876', 'especial', 'N', '8'),
('4', '0.00', '6789', 'corrente', 'S', '9'),
('5', '0.00', '1674', 'poupanca', 'S', '10'),
('1', '0.00', '1234', 'poupanca', 'N', '6'),
('2', '0.00', '4321', 'corrente', 'N', '7'),
('3', '0.00', '9876', 'especial', 'N', '8'),
('4', '0.00', '6789', 'corrente', 'N', '9'),
('5', '0.00', '1674', 'poupanca', 'S', '10');
SELECT * FROM Contas;

-- POVOANDO POSSUI
INSERT INTO Possui(Clientes_cpf, Contas_num_conta, Contas_agencia_id) VALUES
('06965136332', '11', '1'),
('07448514962', '12', '2'),
('07895734355', '13', '3'),
('78934238785', '14', '4'),
('87248965231', '15', '5'),
('06965136332', '16', '1'),
('06965136332', '17', '2'),
('06965136332', '20', '5'), 
('07448514962', '18', '3'),
('78934238785', '19', '4');
SELECT * FROM Possui;

-- LER CONTA CORRENTE. NÃO É POSSÍVEL POVOÁ-LA, POIS EXSITE UM TRIGGER RESPONSÁVEL POR ISSO ASSIM QUE UMA CONTA DO TIPO CORRENTE É CRIADA
SELECT * FROM Corrente;

-- LER CONTA ESPECIAL. NÃO É POSSÍVEL POVOÁ-LA, POIS EXSITE UM TRIGGER RESPONSÁVEL POR ISSO ASSIM QUE UMA CONTA DO TIPO ESPECIAL É CRIADA-- 
SELECT * FROM Especial;

--  LER CONTA POUPANCA. NÃO É POSSÍVEL POVOÁ-LA, POIS EXSITE UM TRIGGER RESPONSÁVEL POR ISSO ASSIM QUE UMA CONTA DO TIPO POUPANCA É CRIADA
SELECT * FROM Poupanca;

-- POVOANDO DEPENDENTES
INSERT INTO Dependentes(nome_completo, data_nasc, parentesco, funcionarios_matricula) VALUES
('Manfris de Andrade','2015-12-09', 'filho','6'),
('Emanuel Davi Felix','2018-11-24', 'filho','10'),
('Igor Júnior Pierre','2019-09-23', 'filho','7'),
('Carlos Souza','2000-09-23', 'primo','11'),
('Maria das Dores','2022-02-23', 'mãe','19'),
('José Maria de Andrade','2015-12-09', 'pai','18'),
('José Davi Silva','2018-11-24', 'filho','8'),
('Hugo Pierre','2019-09-23', 'irmão','7'),
('Gabriel Barbosa','2000-09-23', 'primo','8'),
('Maria Joaquina','2022-02-23', 'filha','8');
SELECT * FROM Dependentes;

-- POVOANDO EMAIL
INSERT INTO Emails (Clientes_cpf, email) VALUES
('06965136332', 'emanueldavid150@gmail.com'),
('06965136332', 'emanueldevidfelix@alu.ufc.br'),
('07895734355', 'manfra@hotmail.com'),
('07895734355', 'manfrasouza@gmail.com'),
('07448514962', 'frankwilliam@gmail.com'),
('87248965231', 'francisco@gmail.com'),
('07448514962', 'frank@gmail.com'),
('78934238785', 'maria@gmail.com');
SELECT * FROM Emails;

-- POVOANDO TELEFONES
INSERT INTO Telefones(telefone, Clientes_cpf) VALUES
('88996874317','06965136332'),
('88999124261','06965136332'),
('88994277818','07895734355'),
('88997456123','07895734355'),
('86999056755','07448514962'),
('88997456123','87248965231'),
('86999056755','78934238785');
SELECT * FROM Telefones;

-- POVOANDO TRANSACAO
INSERT INTO Transacao(tipo_transacao, data_hora, valor, Contas_num_conta) VALUES
('depósito', sysdate(), '5000.00', '11'),
('transferência', sysdate(), '1500.00', '11'),
('saque', sysdate(), '1000.00', '11'),
('depósito', sysdate(), '10000.00', '12'),
('estorno', sysdate(), '1000.00', '12'),
('transferência', sysdate(), '2000.00', '12'),
('pagamento', sysdate(), '1000.00', '12'),
('depósito', sysdate(), '7000.00', '17'),
('depósito', sysdate(), '1000.00', '17'),
('saque', sysdate(), '3500.00', '17'),
('depósito', sysdate(), '20000.00', '15'),
('estorno', sysdate(), '1555.00', '15'),
('transferência', sysdate(), '4000.00', '15'),
('pagamento', sysdate(), '1000.00', '15'),
('depósito', sysdate(), '10000.00', '14'),
('estorno', sysdate(), '1000.00', '14'),
('transferência', sysdate(), '3000.00', '14'),
('pagamento', sysdate(), '1500.00', '14');
SELECT * FROM Transacao;