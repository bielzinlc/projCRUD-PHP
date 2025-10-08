CREATE DATABASE agenda;
USE agenda;

CREATE TABLE Cliente 
( 
 id_cliente INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(n) NOT NULL,  
 telefone VARCHAR(n) NOT NULL,  
 data_agendada VARCHAR(n) NOT NULL,  
 idAdmin INT,  
 UNIQUE (telefone)
); 

CREATE TABLE Admin 
( 
 id_admin INT PRIMARY KEY NOT NULL AUTO_INCREMENT,  
 usuario VARCHAR(n) NOT NULL,  
 senha INT NOT NULL,  
 UNIQUE (id_admin: PK,usuario)
); 

ALTER TABLE Cliente ADD FOREIGN KEY(idAdmin) REFERENCES Admin (idAdmin)
