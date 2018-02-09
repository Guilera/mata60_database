DROP DATABASE turismo;
CREATE DATABASE turismo;
USE turismo;

CREATE TABLE usuarios (
	usuario_id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL UNIQUE,
	senha VARCHAR(12) NOT NULL
);

CREATE TABLE clientes (
	nome_completo VARCHAR(255) NOT NULL,
	pais VARCHAR(255) NOT NULL,
	data_nasc DATE NOT NULL,
	usuario_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

CREATE TABLE anunciantes (
	nome_fantasia VARCHAR(255) NOT NULL,
	cnpj  VARCHAR(255) NOT NULL,
	tipo_de_servico VARCHAR(255) NOT NULL,
	homepage VARCHAR(255) NOT NULL,
	telefone VARCHAR(255) NOT NULL,
	usuario_id INT NOT NULL,

	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

CREATE TABLE ufs (
	uf_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE visitas (
	visita_id INT PRIMARY KEY AUTO_INCREMENT,
	pais VARCHAR(255) NOT NULL,
	uf_id INT NOT NULL,
	ano INT NOT NULL,
	mes VARCHAR(255) NOT NULL,
	quantidade INT NOT NULL,

   FOREIGN KEY (uf_id) REFERENCES ufs(uf_id),
   UNIQUE(pais, uf_id, ano, mes)
);

CREATE TABLE cidades (
	cidade_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	uf_id INT NOT NULL,

   FOREIGN KEY (uf_id) REFERENCES ufs(uf_id)
);

UPDATE TABLE pontos_turisticos (
	ponto_turistico_id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	tipo VARCHAR(255) NOT NULL,
	descricao VARCHAR(255),
	logradouro VARCHAR(255),
	bairro VARCHAR(255),
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
	data_criacao TIMESTAMP DEFAULT NOW(),
	texto VARCHAR(255) NOT NULL
);

CREATE TABLE comentarios_evento (
	comentario_id INT NOT NULL,
	usuario_id INT NOT NULL,
	evento_id INT NOT NULL,
	
	FOREIGN KEY (comentario_id) REFERENCES comentarios(comentario_id),
	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (evento_id) REFERENCES eventos(evento_id)	
);

CREATE TABLE comentarios_pturistico (
	comentario_id INT NOT NULL,
	usuario_id INT NOT NULL,
	ponto_turistico_id INT NOT NULL,
	
	FOREIGN KEY (comentario_id) REFERENCES comentarios(comentario_id),
	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (ponto_turistico_id) REFERENCES pontos_turisticos(ponto_turistico_id)
);

CREATE TABLE comentarios_hospedagem (
	comentario_id INT NOT NULL,
	usuario_id INT NOT NULL,
	hospedagem_id INT NOT NULL,
	
	FOREIGN KEY (comentario_id) REFERENCES comentarios(comentario_id),
	FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
	FOREIGN KEY (hospedagem_id) REFERENCES hospedagens(hospedagem_id)
);


/* ALGUMAS OPÇÕES DE VIEWS

CREATE VIEW zodiaco AS SELECT nome_completo, DATE_FORMAT(data_nasc, '%d/%m/%Y') AS nascimento, pais,  
	CASE
		WHEN (MONTH(data_nasc)=1 AND DAYOFMONTH(data_nasc)>=20) OR (MONTH(data_nasc) = 2 AND DAYOFMONTH(data_nasc)<=18) THEN 'Aquario'
		WHEN (MONTH(data_nasc)=2 AND DAYOFMONTH(data_nasc)>=19) OR (MONTH(data_nasc)=3 AND DAYOFMONTH(data_nasc)<=20) THEN 'Peixes'
		WHEN (MONTH(data_nasc)=3 AND DAYOFMONTH(data_nasc)>=21) OR (MONTH(data_nasc)=4 AND DAYOFMONTH(data_nasc)<=19) THEN 'Aries'
		WHEN (MONTH(data_nasc)=4 AND DAYOFMONTH(data_nasc)>=20) OR (MONTH(data_nasc)=5 AND DAYOFMONTH(data_nasc)<=20) THEN 'Touro'
		WHEN (MONTH(data_nasc)=5 AND DAYOFMONTH(data_nasc)>=21) OR (MONTH(data_nasc)=6 AND DAYOFMONTH(data_nasc)<=20) THEN 'Gemeos'
		WHEN (MONTH(data_nasc)=6 AND DAYOFMONTH(data_nasc)>=21) OR (MONTH(data_nasc)=7 AND DAYOFMONTH(data_nasc)<=22) THEN 'Cancer'
		WHEN (MONTH(data_nasc)=7 AND DAYOFMONTH(data_nasc)>=23) OR (MONTH(data_nasc)=8 AND DAYOFMONTH(data_nasc)<=22) THEN 'Leao'
		WHEN (MONTH(data_nasc)=8 AND DAYOFMONTH(data_nasc)>=23) OR (MONTH(data_nasc)=9 AND DAYOFMONTH(data_nasc)<=22) THEN 'Virgem'
		WHEN (MONTH(data_nasc)=9 AND DAYOFMONTH(data_nasc)>=23) OR (MONTH(data_nasc)=10 AND DAYOFMONTH(data_nasc)<=22) THEN 'Libra'
		WHEN (MONTH(data_nasc)=10 AND DAYOFMONTH(data_nasc)>=23) OR (MONTH(data_nasc)=11 AND DAYOFMONTH(data_nasc)<=21) THEN 'Escorpiao'
		WHEN (MONTH(data_nasc)=11 AND DAYOFMONTH(data_nasc)>=22) OR (MONTH(data_nasc)=12 AND DAYOFMONTH(data_nasc)<=21) THEN 'Sagitario'
		WHEN (MONTH(data_nasc)=12 AND DAYOFMONTH(data_nasc)>=22) OR (MONTH(data_nasc)=1 AND DAYOFMONTH(data_nasc)<=19) THEN 'Capricornio'
	END AS signo
FROM clientes;

CREATE VIEW pontos_full AS SELECT ufs.nome AS UF, cidades.nome AS CIDADE, pontos_turisticos.nome AS ATRAÇÃO, tipo AS TIPO
FROM pontos_turisticos 
JOIN cidades ON pontos_turisticos.cidade_id = cidades.cidade_id 
JOIN ufs ON cidades.uf_id = ufs.uf_id; */
