create database icatalogo;

use icatalogo;

create table tbl_produto(
    id int primary key auto_increment,
    peso decimal(10,2) not null,
    descricao varchar(255) not null,
    quantidade int not null,
    cor varchar(100) not null,
    tamanho varchar(100),
    valor decimal(10,2) not null,
    desconto int,
    imagem varchar(500)
);

# deleta a tabela tbl_produto
drop table tbl_produto;

# deleta o produto na tabela de produtos com o id ?
delete from tbl_produto where id = ?;
/******************************************************************************************************************************************/

create table tbl_administrador (
    id int primary key auto_increment,
    nome varchar(255) not null,
    usuario varchar(255) not null,
    senha varchar(255) not null
);

insert into tbl_administrador (notbl_produto_ibfk_1me, usuario, senha) values ("Helena","Helena","4321");
insert into tbl_administrador (nome, usuario, senha) values ("Ciclano da Silva","ciclano","654321");
select * from tbl_administrador;
/******************************************************************************************************************************************/

create table tbl_categoria (
    id int primary key auto_increment,
    descricao varchar(255) not null
);
insert into tbl_categoria (descricao) values ("Tenis");
select * from tbl_categoria;
# deleta o produto na tabela de produtos com o id ?
delete from tbl_categoria where id = 2;

select * from tbl_produto;

alter table tbl_produto
add column categoria_id int,
add foreign key (categoria_id) references tbl_categoria(id);

#limpar a tabela de produtos
truncate tbl_produto;

select * from tbl_produto p
inner join tbl_categoria c on p.categoria_id = c.id 
order by p.id desc;

SELECT p.*, c.descricao as categoria FROM tbl_produto p
INNER JOIN tbl_categoria c ON p.categoria_id = c.id
WHERE p.descricao LIKE '%?%'
OR c.descricao LIKE '%?%'
ORDER BY p.id DESC;
