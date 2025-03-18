select * from tb_usuario;

select * from tb_categoria;

select * from tb_empresa;

select * from tb_conta;

select * from tb_movimento;

select * from tb_usuario;


select nome_usuario, nome_empresa, email_usuario
from tb_empresa
inner join tb_usuario
on tb_empresa.id_usuario = tb_usuario.id_usuario;

select nome_usuario, tipo_movimento, saldo_conta, email_usuario
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario
inner join tb_conta
on tb_movimento.id_conta = tb_conta.id_conta;

select nome_usuario, nome_empresa, nome_categoria, tipo_movimento, banco_conta, saldo_conta
from tb_movimento
inner join tb_usuario
on tb_movimento.id_usuario = tb_usuario.id_usuario
inner join tb_empresa
on tb_movimento.id_empresa = tb_empresa.id_empresa
inner join tb_categoria
on tb_movimento.id_categoria = tb_categoria.id_categoria
inner join tb_conta
on tb_movimento.id_conta = tb_conta.id_conta;

select nome_categoria
from tb_categoria
where id_usuario = 1;