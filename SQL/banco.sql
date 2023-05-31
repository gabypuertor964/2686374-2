/*Creacion Base de datos Bank*/
CREATE DATABASE bank;

/*Usar Base de datos Bank*/
USE bank;

/*Creacion la tabla tipo Documento*/
CREATE TABLE document_type(
    id_doc_type int primary key AUTO_INCREMENT,
    doc_typ varchar(25) UNIQUE NOT NULL
);

/*Creacion la tabla clientes*/
CREATE TABLE clients(
    client_id int primary key AUTO_INCREMENT,
    names varchar(30) NOT NULL, 
    surnames varchar(30) NOT NULL,
    fk_doc_typ int NOT NULL,
    doc_num varchar(15) UNIQUE NOT NULL,
    date_birth date NOT NULL
);

/*Creacion de la llave foranea a la tabla document_type*/
ALTER TABLE clients ADD fOREIGN KEY(fk_doc_typ) REFERENCES document_type(id_doc_type);

/*Creacion de la tabla tipo de cuenta*/
CREATE TABLE account_type(
    id_account_type int PRIMARY KEY AUTO_INCREMENT,
    account_typ varchar(25) NOT NULL
);

/*Creacion de la tabla cuentas*/
CREATE TABLE account(
    account_id int primary key AUTO_INCREMENT,
    fk_client int NOT NULL,
    fk_account_typ int NOT NULL,
    balance varchar(10) NOT NULL,
    password varchar(255) UNIQUE NOT NULL
);

/*Creacion de la llave foranea a la tabla clients*/
ALTER TABLE account ADD fOREIGN KEY(fk_client) REFERENCES clients(client_id);

/*Creacion de la llave foreanea a la tabla tipo de cuenta*/
ALTER TABLE account ADD fOREIGN KEY(fk_account_typ) REFERENCES account_type(id_account_type);

/*Creacion de la tabla tipo de Transaccion*/
CREATE TABLE transaction_type(
    id_transaction_type INT PRIMARY KEY AUTO_INCREMENT,
    transaction_type varchar(20) NOT NULL UNIQUE
);

/*Creacion de la tabla transacciones*/
CREATE TABLE transactions(
    transaction_id int primary key AUTO_INCREMENT,
    id_account_origin int NOT NULL,
    price varchar(10) NOT NULL,
    id_account_destiny int,

);




