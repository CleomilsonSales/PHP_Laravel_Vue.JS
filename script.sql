create database sg;
use sg;

select * from migrations;

describe produtos;
describe filiais;
describe produto_filiais;
describe fornecedores;
describe site_contatos;
describe motivo_contatos;
describe log_acessos;


select * from motivo_contatos;

select * from site_contatos;

select * from log_acessos;

select * from users;
describe users;
insert into users (name, email, password)values('Cleomilson','cleomilsonsales@hotmail.com','1234');

select * from fornecedores;
select * from produtos;
select * from unidades;

select * from produto_detalhes;