CREATE DATABASE sistema_ifpe;

USE sistema_ifpe;

CREATE TABLE medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL
);

CREATE TABLE paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    tipo_sanguineo VARCHAR(5) NOT NULL
);

CREATE TABLE consulta (
    id_medico INT NOT NULL,
    id_paciente INT NOT NULL,
    data_hora TIMESTAMP NOT NULL,
    observacoes TEXT,

    PRIMARY KEY (id_medico, id_paciente, data_hora),

    FOREIGN KEY (id_medico) REFERENCES medico(id),
    FOREIGN KEY (id_paciente) REFERENCES paciente(id)
);