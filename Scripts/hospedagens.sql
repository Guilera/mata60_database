LOAD DATA LOCAL INFILE '../Scripts/hospedagens.csv' IGNORE
INTO TABLE hospedagens
FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n' IGNORE 1 LINES 
(nome,tipo,descricao,valor_diaria,logradouro,bairro,numero,cidade_id,usuario_id);
