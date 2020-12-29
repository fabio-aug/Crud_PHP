create database crudweb2;
use crudweb2;

create table pessoa(
	nome varchar(200),
    cpf varchar(14) primary key
);

select * from pessoa;

create table empresa(
	nome varchar(200),
    tipofd varchar(10),
    cnpj varchar(18) primary key
);

select * from empresa;

create table conta(
	saldo float,
    numero serial primary key,
    cpf varchar(14) not null,
    cnpj varchar(18),
    foreign key fk_cpfPessoa (cpf) references pessoa(cpf) on delete cascade,
    foreign key fk_cnpjEmpresa (cnpj) references empresa(cnpj) on delete set null
);

select * from conta;
