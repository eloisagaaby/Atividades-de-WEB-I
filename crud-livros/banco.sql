CREATE DATABASE sistema_ifpe;

USE sistema_ifpe;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    data_publicacao DATE NOT NULL,
    editora VARCHAR(100) NOT NULL
);
