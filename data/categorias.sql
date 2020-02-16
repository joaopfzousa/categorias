CREATE TABLE categorias (
    id INTEGER PRIMARY KEY, 
    nome varchar(100) NOT NULL,
    descricao varchar(100)
);

insert into categorias(nome, descricao) values ('Zend', 'Zend é uma framework de PHP');
insert into categorias(nome, descricao) values ('Laravel', 'Laravel é uma framework de PHP');
insert into categorias(nome, descricao) values ('SpringBoot', 'SpringBoot é uma framework de Java');
insert into categorias(nome, descricao) values ('Lumen', 'Lumen é uma framework de PHP');
