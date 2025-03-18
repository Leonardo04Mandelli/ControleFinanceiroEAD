-- USUÁRIO
insert into tb_usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
values ('Leonardo Mandelli', 'leonardomandelli04@gmail.com', '53991873967', 'senha123', '2002-02-09');

insert into tb_usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
values ('Ana Júlia', 'anajulia@gmail.com', '53991644787', 'senha321', '2002-07-15');

insert into tb_usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
values ('Vitor Baiano', 'vitbaiano@gmail.com', '53991229087', 'password123', '2003-04-07');

insert into tb_usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
values ('Natalia Kaony', 'natkaony@gmail.com', '53992384563', 'password321', '2002-08-10');

insert into tb_usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
values ('Emanuela Oliveira', 'manu123@gmail.com', '53992309775', '123password', '2001-02-01');

-- CATEGORIA 
insert into tb_categoria (nome_categoria, id_usuario)
values ('Alimentação', 1);

insert into tb_categoria (nome_categoria, id_usuario)
values ('Viagens', 2);

insert into tb_categoria (nome_categoria, id_usuario)
values ('Games', 3);

insert into tb_categoria (nome_categoria, id_usuario)
values ('Estudos', 4);

insert into tb_categoria (nome_categoria, id_usuario)
values ('Vestimentos', 7);


-- EMPRESA
insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values ('Prato Feito', '53995773129', 'Rua China, 125 - Jardim Pizza', 1);

insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values ('Decolar', '53987445872', 'Rua Sosia Lima, 766 - Barré Cardoso', 2);

insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values ('MoreGames', '53992667891', 'Rua Henrique Cardoso, 999 - Jardim Farreto', 3);

insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values ('EMBRAPII', '53910620228', 'Rua Bélgica Lopes, 127', 4);

insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values ('C&A', '53999571992', 'Rua Jania, 911', 7);



-- CONTA
insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values ('Bradesco', '4433', '443344', 4500.00, 1);

insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values ('Itaú', '6677', '667766', 7890.00, 2);

insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values ('Caixa', '1122', '112211', 10500.75, 3);

insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values ('Banco Brasil', '2198', '219821', 4200.90, 4);

insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values ('Santander', '3333', '333333', 7700.00, 7);


-- MOVIMENTO
insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, 
id_usuario, id_conta, id_categoria, id_empresa)
values ('1', '2021-11-11', 65.50, 'alguns bugs ainda persistem', 1, 1, 1, 1);

insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, 
id_usuario, id_conta, id_categoria, id_empresa)
values ('2', '2024-12-12', 44.00, '', 2, 2, 2, 2);

insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, 
id_usuario, id_conta, id_categoria, id_empresa)
values ('1', '2024-12-30', 75.00, 'muito bom acesso', 3, 3, 3, 3);

insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, 
id_usuario, id_conta, id_categoria, id_empresa)
values ('2', '2024-12-22', 55.80, 'salvaram meu negócio', 4, 4, 4, 4);

insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, 
id_usuario, id_conta, id_categoria, id_empresa)
values ('2', '2024-11-10', 75.00, '', 7, 5, 5, 5);