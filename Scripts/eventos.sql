LOAD DATA LOCAL INFILE '../Scripts/eventos.csv' IGNORE
INTO TABLE eventos
FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n' IGNORE 1 LINES
(nome,tipo,descricao,data_hora,valor,logradouro,bairro,numero,usuario_id,cidade_id);
