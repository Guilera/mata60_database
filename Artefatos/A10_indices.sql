/* ÍNDICES */

ALTER TABLE usuarios ADD INDEX(usuario_id, username);
ALTER TABLE clientes ADD INDEX(usuario_id, nome_completo);
ALTER TABLE anunciantes ADD INDEX(nome_fantasia, usuario_id);
ALTER TABLE visitas ADD INDEX(visita_id, uf_id); 
ALTER TABLE cidades ADD INDEX(cidade_id, nome);
ALTER TABLE pontos_turisticos  ADD INDEX(ponto_turistico_id, cidade_id, nome);
ALTER TABLE hospedagens ADD INDEX(hospedagem_id, valor_diaria, usuario_id, cidade_id, nome);
ALTER TABLE eventos ADD INDEX(evento_id, cidade_id, usuario_id, nome, valor);
ALTER TABLE comentarios ADD INDEX(comentario_id);
ALTER TABLE comentarios_evento ADD INDEX(comentario_id, evento_id);
ALTER TABLE comentarios_pturistico ADD INDEX(comentario_id, ponto_turistico_id));
ALTER TABLE comentarios_hospedagem ADD INDEX(comentario_id, hospedagem_id;
