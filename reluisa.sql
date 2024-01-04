create database reluisa;


create table usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    tipo_usuario VARCHAR(255),
    nome_usuario VARCHAR(255),
    email_usuario VARCHAR(255),
    senha_usuario VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY, 
    cod_produto INT UNIQUE, 
    categoria VARCHAR(255)
);
create table mercadoria (
    cod_produto int fk,

)


