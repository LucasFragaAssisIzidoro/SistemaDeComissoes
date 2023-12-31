create database reluisa;


create table usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    tipo_usuario VARCHAR(255),
    nome_usuario VARCHAR(255),
    email_usuario VARCHAR(255),
    senha_usuario VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
create table  fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(255),
    email_fornecedor VARCHAR(255) NULL,
    telefone_fornecedor VARCHAR(255) NULL
);
create table vendedoras (
    id_vendedora INT AUTO_INCREMENT PRIMARY KEY,
    nome_vendedora VARCHAR(255),
    email_vendedora VARCHAR(255) NULL,
    telefone_vendedora VARCHAR(255) NOT NULL,
    endereco_vendedora VARCHAR(255) NOT NULL,
    data_inicio_vinculo TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_fim_vinculo TIMESTAMP NULL
);
CREATE TABLE mercadorias (
    id_mercadoria INT AUTO_INCREMENT PRIMARY KEY,
    cod_mercadoria VARCHAR(255),
    categoria_mercadoria VARCHAR(255)
);

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    id_mercadoria INT,
    id_fornecedor INT,
    quantidade_produto INT,
    cor_produto VARCHAR(255),
    tamanho_produto VARCHAR(255),
    FOREIGN KEY (id_mercadoria) REFERENCES mercadorias(id_mercadoria),
    FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id_fornecedor)
);




