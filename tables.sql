/*
   Autor: Re-L 
   date: 2023-10-30
*/

--Verificamos si existe una base de datos con 
--el mismo nombre y la eliminamos. Posteriormente
--creamos la base de datos y selecionamos.

DROP DATABASE IF EXISTS pj;
CREATE DATABASE pj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pj;

--Creamos la tabla "album""
CREATE TABLE albums (
  id_alb INT AUTO_INCREMENT,
  name_a VARCHAR(30) NOT NULL DEFAULT "",
  date_alb DATE NOT NULL,
  punct DECIMAL(3,1) CHECK (punct >= 0 AND punct <= 10),
  test VARCHAR(150) NOT NULL,
  price DECIMAL (5,2) CHECK (price >= 0 AND price <= 1000),
  PRIMARY KEY (id_alb)
);
DESC albums;

--Creamos la tabla  "songs""

CREATE TABLE songs (
  id_song INT AUTO_INCREMENT,
  name_s VARCHAR (150) NOT NULL,
  date_s DATE NOT NULL,
  durtn TIME NOT NULL,
  rptn BIGINT NOT NULL,
  id_alb INT,
  FOREIGN KEY(id_alb) REFERENCES albums(id_alb) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARY KEY(id_song)
);
DESC songs;



--Insert de "albums""
INSERT INTO 
  albums
VALUES (NULL, "YIELD", "2023-12-15", 0.1, "", 9.99);

--Insert de "songs""

INSERT INTO 
  songs
VALUES (NULL, "MFC", "2023-10-31", "00:02:26", 4555, 1);
