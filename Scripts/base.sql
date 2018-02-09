--DADOS EXTRAIDOS DA BASE: CHEGADAS DE 2016 (VISITAS INTERNACIONAIS DO MINISTERIO DO TURISMO) 
LOAD DATA LOCAL INFILE 'Base/chegadas_2016_ufs.csv' IGNORE
INTO TABLE ufs
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (nome, uf_id);

--DADOS EXTRAIDOS DA BASE: CHEGADAS DE 2016 (VISITAS INTERNACIONAIS DO MINISTERIO DO TURISMO) 
LOAD DATA LOCAL INFILE 'Base/chegadas_2016_visitas.csv' IGNORE
INTO TABLE visitas
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES 
(pais, uf_id, ano, mes, quantidade);

--DADOS EXTRAIDOS DA BASE: CATEGORIZAÇÃO (MAPA DO TURISMO DO MINISTERIO DO TURISMO)
LOAD DATA LOCAL INFILE 'Base/cidades.csv' IGNORE
INTO TABLE cidades
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES 
(nome, uf_id);

--DADOS EXTRAIDOS DO SITE TRIPADVISOR (ATRAÇÕES COM MAIORES CLASSIFICAÇÕES)
LOAD DATA LOCAL INFILE 'Base/pontos_turisticos.csv' IGNORE
INTO TABLE pontos_turisticos
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES 
(nome, tipo, descricao, logradouro, bairro, cidade_id);
