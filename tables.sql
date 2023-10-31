/*
   Autor: Knives
   date: 2023-10-30
*/

--Verificamos si existe una base de datos con 
--el mismo nombre y la eliminamos. Posteriormente
--creamos la base de datos y selecionamos.

DROP DATABASE IF EXISTS pj;
CREATE DATABASE pj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pj;

--Creamos la tabla "album"
CREATE TABLE album (
  id_alb INT AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL DEFAULT "",
  date_alb DATE NOT NULL,
  punct DECIMAL(3,1) CHECK (punct >= 0 AND punct <= 10),
  test VARCHAR(150) NOT NULL,
  price DECIMAL (5,2) CHECK (price >= 0 AND price <= 1000),
  PRIMARY KEY (id_alb)
);
DESC album;

INSERT INTO 
  album  
VALUES (NULL, "YIELD", "2023-12-15", 0.1, "", 9.99);
