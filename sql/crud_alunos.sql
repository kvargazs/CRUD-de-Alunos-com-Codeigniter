-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS crud_alunos;

-- Seleciona o banco de dados
USE crud_alunos;

-- Criação da tabela informacoes_alunos
CREATE TABLE IF NOT EXISTS informacoes_alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco TEXT NOT NULL,
    foto VARCHAR(255) DEFAULT NULL
);