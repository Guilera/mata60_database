DROP DATABASE turismo;
CREATE DATABASE turismo;
USE turismo;

CREATE TABLE usuarios (
	usuario_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE clientes (
	nome_completo VARCHAR(255) NOT NULL,
	pais VARCHAR(255) NOT NULL,
	data_nasc DATE NOT NULL,
	usuario_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

CREATE TABLE anunciantes (
	razao_social VARCHAR(255) NOT NULL,
	cnpj  VARCHAR(255) NOT NULL,
	tipo_de_servico VARCHAR(255) NOT NULL,
	homepage VARCHAR(255) NOT NULL,
	telefone VARCHAR(255) NOT NULL,
	usuario_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

CREATE TABLE ufs (
	uf_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL
);

CREATE TABLE visitas (
	visita_id INT PRIMARY KEY AUTO_INCREMENT,
	pais_origem VARCHAR(255) NOT NULL,
	continente_origem VARCHAR(255) NOT NULL,
	quantidade INT NOT NULL,
	mes VARCHAR(255) NOT NULL,
	ano INT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	uf_id INT NOT NULL,

   FOREIGN KEY (uf_id) REFERENCES ufs(uf_id)
);

CREATE TABLE cidades (
	cidade_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	uf_id INT NOT NULL,

   FOREIGN KEY (uf_id) REFERENCES ufs(uf_id)
);

CREATE TABLE pontos_turisticos (
	ponto_turistico_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	tipo VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	logradouro VARCHAR(255) NOT NULL,
	bairro VARCHAR(255) NOT NULL,
	cidade_id INT NOT NULL,
	
	FOREIGN KEY (cidade_id) REFERENCES cidades(cidade_id)
);

CREATE TABLE hospedagens (
	hospedagem_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	tipo VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	valor_diaria decimal(6, 2) NOT NULL,
	logradouro VARCHAR(255) NOT NULL,
	bairro VARCHAR(255) NOT NULL,
	numero INT NOT NULL,
	usuario_id INT NOT NULL,
	cidade_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (cidade_id) REFERENCES cidades(cidade_id)
);

CREATE TABLE eventos (
	evento_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	tipo VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	data_hora DATETIME NOT NULL,
	valor decimal(6, 2) NOT NULL,
	logradouro VARCHAR(255) NOT NULL,
	bairro VARCHAR(255) NOT NULL,
	numero INT NOT NULL,
	usuario_id INT NOT NULL,
	cidade_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (cidade_id) REFERENCES cidades(cidade_id)
);

CREATE TABLE comentarios (
	comentario_id INT PRIMARY KEY AUTO_INCREMENT,
	time_stamp DATETIME NOT NULL,
	texto VARCHAR(255) NOT NULL,
	usuario_id INT NOT NULL,
	evento_id INT NOT NULL,
	ponto_turistico_id INT NOT NULL,
	hospedagem_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (evento_id) REFERENCES eventos(evento_id),
	FOREIGN KEY (ponto_turistico_id) REFERENCES pontos_turisticos(ponto_turistico_id),
	FOREIGN KEY (hospedagem_id) REFERENCES hospedagens(hospedagem_id)
);
