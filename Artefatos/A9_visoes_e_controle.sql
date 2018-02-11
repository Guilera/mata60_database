/* LISTA DE TODOS OS PONTOS TURISTICOS JUNTAMENTE COM A UF E A CIDADE AOS QUAIS CADA UM PERTENCE */
CREATE VIEW pontos_full AS
SELECT ufs.nome AS UF, cidades.nome AS CIDADE, pontos_turisticos.nome AS ATRAÇÃO, tipo AS TIPO
FROM pontos_turisticos 
JOIN cidades ON pontos_turisticos.cidade_id = cidades.cidade_id 
JOIN ufs ON cidades.uf_id = ufs.uf_id;

/* LISTA DE QUANTIDADE DE VISITAS COM ANO, MES, PAIS ORIGEM E UF DESTINO */
CREATE VIEW visitas_full AS
SELECT ano, mes, pais, nome, quantidade
FROM visitas
JOIN ufs ON visitas.uf_id = ufs.uf_id;

/* COMENTARIO DE PONTOS TURISTICOS COM O NOME DO USUARIO, DATA DE CRIAÇÃO E NOME DO PONTO TURISTICO */
CREATE VIEW comentarios_pturistico_full AS
SELECT texto AS "Comment", nome_usuario AS "By", data_criacao AS "At", nome AS "On", pontos_turisticos.ponto_turistico_id
FROM comentarios_pturistico
JOIN comentarios ON comentarios.comentario_id = comentarios_pturistico.comentario_id 
JOIN pontos_turisticos ON comentarios_pturistico.ponto_turistico_id = pontos_turisticos.ponto_turistico_id
JOIN 
	(SELECT usuario_id, nome_completo AS nome_usuario FROM clientes
	UNION 
	SELECT usuario_id, nome_fantasia AS nome_usuario FROM anunciantes) AS usuarios_completo
	ON comentarios_pturistico.usuario_id = usuarios_completo.usuario_id;

/* COMENTARIO DE EVENTOS COM O NOME DO USUARIO, DATA DE CRIAÇÃO E NOME DO EVENTO */
CREATE VIEW comentarios_evento_full AS
SELECT texto AS "Comment", nome_usuario AS "By", data_criacao AS "At", nome AS "On", eventos.evento_id
FROM comentarios_evento
JOIN comentarios ON comentarios.comentario_id = comentarios_evento.comentario_id 
JOIN eventos ON comentarios_evento.evento_id = eventos.evento_id
JOIN 
	(SELECT usuario_id, nome_completo AS nome_usuario FROM clientes
	UNION 
	SELECT usuario_id, nome_fantasia AS nome_usuario FROM anunciantes) AS usuarios_completo
	ON comentarios_evento.usuario_id = usuarios_completo.usuario_id;

/* COMENTARIO DE HOSPEDAGENS COM O NOME DO USUARIO, DATA DE CRIAÇÃO E NOME DA HOSPEDAGEM */
CREATE VIEW comentarios_hospedagem_full AS
SELECT texto AS "Comment", nome_usuario AS "By", data_criacao AS "At", nome AS "On", hospedagens.hospedagem_id
FROM comentarios_hospedagem
JOIN comentarios ON comentarios.comentario_id = comentarios_hospedagem.comentario_id 
JOIN hospedagens ON comentarios_hospedagem.hospedagem_id = hospedagens.hospedagem_id
JOIN 
	(SELECT usuario_id, nome_completo AS nome_usuario FROM clientes
	UNION 
	SELECT usuario_id, nome_fantasia AS nome_usuario FROM anunciantes) AS usuarios_completo
	ON comentarios_hospedagem.usuario_id = usuarios_completo.usuario_id;
	
/* CONTROLE DE ACESSO */
CREATE USER 'admin' IDENTIFIED BY 'admin_turismo';
CREATE USER 'estrangeiro' IDENTIFIED BY 'estrangeiro_turismo';
CREATE USER 'empresa' IDENTIFIED BY 'empresa_turismo';

/* O DBA TEM TOTAL ACESSO NESTE BANCO */
GRANT ALL ON turismo.* TO 'admin';

/* VISUALIZAÇÃO DOS DADOS PÚBLICOS */
GRANT SELECT ON turismo.ufs TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.cidades TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.eventos TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.hospedagens TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.pontos_turisticos TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.comentarios_evento_full TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.comentarios_hospedagem_full TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.comentarios_pturistico_full TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.pontos_full TO 'estrangeiro', 'empresa';
GRANT SELECT ON turismo.visitas_full TO 'estrangeiro', 'empresa';

/* CRIAÇÃO DE COMENTARIOS */
GRANT INSERT ON turismo.comentarios TO 'estrangeiro', 'empresa';
GRANT INSERT ON turismo.comentarios_evento TO 'estrangeiro', 'empresa';
GRANT INSERT ON turismo.comentarios_hospedagem TO 'estrangeiro', 'empresa';
GRANT INSERT ON turismo.comentarios_pturistico TO 'estrangeiro', 'empresa';

/* CRIAÇÃO DE ANUNCIOS */
GRANT INSERT ON turismo.eventos TO 'empresa';
GRANT INSERT ON turismo.hospedagens TO 'empresa';