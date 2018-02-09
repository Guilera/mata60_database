--1) SELECIONA TODOS OS PONTOS TURISTICOS QUE POSSUEM A PALAVRA "CHURCH" NA DESCRIÇÃO
SELECT cidades.nome, pontos_turisticos.nome, tipo, descricao 
FROM pontos_turisticos 
JOIN cidades ON cidades.cidade_id = pontos_turisticos.cidade_id 
WHERE descricao LIKE '%church%';	
