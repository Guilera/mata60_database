/* OTIMIZAÇÃO DE CONSULTAS POR NOME */
/* OTIMIZAÇÃO DE CHAVE ESTRANGEIRA EM JOIN */
ALTER TABLE usuarios ADD INDEX(usuario_id);
ALTER TABLE usuarios ADD INDEX(username);

/* OTIMIZAÇÃO DE CONSULTAS POR NOME */
/* OTIMIZAÇÃO DE CHAVE ESTRANGEIRA EM JOIN */
ALTER TABLE clientes ADD INDEX(nome_completo);
ALTER TABLE clientes ADD INDEX(usuario_id);

/* OTIMIZAÇÃO DE CONSULTAS POR NOME */
/* OTIMIZAÇÃO DE CHAVE ESTRANGEIRA EM JOIN */
ALTER TABLE anunciantes ADD INDEX(nome_fantasia);
ALTER TABLE anunciantes ADD INDEX(usuario_id);

/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE visitas ADD INDEX(visita_id); 
ALTER TABLE visitas ADD INDEX(uf_id); 

/* OTIMIZAÇÃO DE CONSULTAS POR NOME */
/* OTIMIZAÇÃO DE CHAVE ESTRANGEIRA EM JOIN */
ALTER TABLE cidades ADD INDEX(cidade_id);
ALTER TABLE cidades ADD INDEX(nome);

/* OTIMIZAÇÃO DE CONSULTAS POR NOME E TIPO */
/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE pontos_turisticos  ADD INDEX(ponto_turistico_id);
ALTER TABLE pontos_turisticos  ADD INDEX(cidade_id);
ALTER TABLE pontos_turisticos  ADD INDEX(nome);
ALTER TABLE pontos_turisticos  ADD INDEX(tipo);

/* OTIMIZAÇÃO DE CONSULTAS POR NOME, VALOR E TIPO 
/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE hospedagens ADD INDEX(hospedagem_id);
ALTER TABLE hospedagens ADD INDEX(usuario_id);
ALTER TABLE hospedagens ADD INDEX(cidade_id);
ALTER TABLE hospedagens ADD INDEX(nome);
ALTER TABLE hospedagens ADD INDEX(valor_diaria);
ALTER TABLE hospedagens ADD INDEX(tipo);

/* OTIMIZAÇÃO DE DE CONSULTAS POR NOME, VALOR E TIPO */
/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE eventos ADD INDEX(evento_id);
ALTER TABLE eventos ADD INDEX(cidade_id);
ALTER TABLE eventos ADD INDEX(usuario_id);
ALTER TABLE eventos ADD INDEX(nome);
ALTER TABLE eventos ADD INDEX(valor);
ALTER TABLE eventos ADD INDEX(tipo);

/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE comentarios ADD INDEX(comentario_id);

/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE comentarios_evento ADD INDEX(comentario_id);
ALTER TABLE comentarios_evento ADD INDEX(evento_id);

/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE comentarios_pturistico ADD INDEX(comentario_id);
ALTER TABLE comentarios_pturistico ADD INDEX(ponto_turistico_id);

/* OTIMIZAÇÃO DE CHAVES ESTRANGEIRAS EM JOIN */
ALTER TABLE comentarios_hospedagem ADD INDEX(comentario_id);
ALTER TABLE comentarios_hospedagem ADD INDEX(hospedagem_id);
