/* SELECIONA TODOS OS USUARIOS DISCRIMINANDO O SEU TIPO */
SELECT usuario_id, nome_completo, "Cliente" FROM clientes 
UNION 
SELECT usuario_id, nome_fantasia, "Anunciante" FROM anunciantes;

/* SELECIONA TODOS OS COMENTARIOS QUE POSSUEM UMA HASHTAG(#alfanumerico) NO TEXTO */
SELECT * FROM comentarios WHERE texto REGEXP '#[[:alnum:]]';

/* SELECIONA TODOS OS PONTOS TURISTICOS QUE POSSUEM A PALAVRA "CHURCH" NA DESCRIÇÃO */
SELECT cidades.nome, pontos_turisticos.nome, tipo, descricao 
FROM pontos_turisticos 
JOIN cidades ON cidades.cidade_id = pontos_turisticos.cidade_id 
WHERE descricao LIKE '%church%';

/* SELECIONA OS 10 USUARIOS MAIS ATIVOS */
SELECT nome_completo AS nome, COUNT(*) AS qnt_comentarios
FROM clientes
LEFT JOIN comentarios_pturistico ON clientes.usuario_id = comentarios_pturistico.usuario_id
INNER JOIN comentarios ON comentarios_pturistico.comentario_id = comentarios.comentario_id
GROUP BY nome_completo
ORDER BY qnt_comentarios DESC LiMIT 10;

/* SOMA TOTAL DE VISITAS REGISTRADAS */
SELECT SUM(quantidade) AS 'Quantidade Total de Visitas' from visitas;

/* MÉDIA MENSAL DE VISITAS */
SELECT ano, mes, AVG(quantidade) AS Media 
FROM visitas 
GROUP BY ano, mes 
ORDER BY STR_TO_DATE(CONCAT(mes, ' 1, 2016'),'%M %d,%Y');

/* SELECIONA O PAIS COM A MAIOR E COM A MENOR QUANTIDADE DE VISITANTES */
SELECT pais, SUM(quantidade) AS qnt from visitas GROUP BY pais
HAVING qnt = (SELECT MAX(qnt) FROM (SELECT SUM(quantidade) AS qnt from visitas GROUP BY pais) AS s1)
OR qnt = (SELECT MIN(qnt) FROM (SELECT SUM(quantidade) AS qnt from visitas GROUP BY pais) AS s2);
