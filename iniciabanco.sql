USE tbl_seguracadeira;

CREATE TABLE IF NOT EXISTS tbl_cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_Cliente VARCHAR(255) NOT NULL,
    email_Cliente VARCHAR(255) NOT NULL UNIQUE,
    senha_Cliente VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_restaurante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_Restaurante VARCHAR(255) NOT NULL,
    CNPJ INT NOT NULL,
    fone_Restaurante INT NOT NULL,
    resp_Restaurante VARCHAR(255) NOT NULL,
    email_Restaurante VARCHAR(255) NOT NULL UNIQUE,
    endereco_Restaurante VARCHAR(255) NOT NULL,
    tipoCozinha VARCHAR(255) NOT NULL,
    horarioFuncionamento VARCHAR(255) NOT NULL,
    capacidadeTotal INT NOT NULL,
    numFuncionarios INT NOT NULL
);