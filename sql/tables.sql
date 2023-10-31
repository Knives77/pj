/*
   Autor: Re-L Mayer 
   date: 2023-10-30
<<<<<<< HEAD
   v: Proyecto meh
=======
   v: Knives
>>>>>>> v_knives
*/

--Verificamos si existe una base de datos con 
--el mismo nombre y la eliminamos. Posteriormente
--creamos la base de datos y selecionamos.

DROP DATABASE IF EXISTS pj;
CREATE DATABASE pj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pj;

--Creamos la tabla "album"
CREATE TABLE albums (
  id_alb INT AUTO_INCREMENT,
  name_a VARCHAR(30) NOT NULL DEFAULT "",
  alb_cov VARCHAR(200) NOT NULL,
  v_knives
  date_alb DATE NOT NULL,
  totl_trck INT NOT NULL,
  gen_alb VARCHAR (100) NOT NULL,
  punct DECIMAL(3,1) CHECK (punct >= 0 AND punct <= 10),
  test VARCHAR(150) NOT NULL,
  price DECIMAL (5,2) CHECK (price >= 0 AND price <= 1000),
  note VARCHAR (150) NOT NULL,
  PRIMARY KEY (id_alb)
);
DESC albums;

--Creamos la tabla  "songs" 
CREATE TABLE songs (
  id_song INT AUTO_INCREMENT,
  id_alb INT,
  name_s VARCHAR (60) NOT NULL,
  date_s DATE NOT NULL,
  durtn TIME NOT NULL,
  rptn BIGINT NOT NULL,
  price_s DECIMAL (3,2) CHECK (price_s >= 0 AND price_s <= 5),
  letra VARCHAR (100) NOT NULL,
  FOREIGN KEY(id_alb) REFERENCES albums(id_alb) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARY KEY(id_song)
);
DESC songs;

--Creamos la tabla "users" 
CREATE TABLE users (
  id_usr INT NOT NULL AUTO_INCREMENT,
  name_usr VARCHAR(60) NOT NULL,
  ap_p_usr VARCHAR(60) NOT NULL,
  ap_m_usr VARCHAR(60) NOT NULL,
  age INT(3) NOT NULL CHECK (age >= 0 AND age <= 130),
  gen VARCHAR(6) NOT NULL CHECK (gen = 'Hombre' OR gen = 'Mujer'),
  street VARCHAR (50) NOT NULL,
  num_house INT(4) NOT NULL ,
  code_post int (5) NOT NULL CHECK (code_post >= 0 AND code_post <= 99999),
  colony VARCHAR (50) NOT NULL,
  munic VARCHAR (50) NOT NULL,
  state VARCHAR (50) NOT NULL,
  phone_n VARCHAR(15) NOT NULL,
  email VARCHAR(100) NOT NULL,
  psswd VARCHAR(70) NOT NULL,
  PRIMARY KEY(id_usr)
);
DESC users;

--Creamos la tabla "sales" 
CREATE TABLE sales (
  id_sale INT AUTO_INCREMENT,
  date_sale DATE NOT NULL,
  id_usr INT,
  ttl_sale DECIMAL(6,2) CHECK (ttl_sale >= 0 AND ttl_sale <= 5500),
  PRIMARY KEY(id_sale),
  FOREIGN KEY(id_usr) REFERENCES users(id_usr) ON UPDATE CASCADE ON DELETE CASCADE
);
DESC sales;

--Insert de "albums" 
INSERT INTO 
  albums
VALUES (NULL, "YIELD","../img/Yield.jpg","2023-12-15", 12, "grunge",0.1, "", 9.99, "Mi introducción");

--Insert de "songs" 
INSERT INTO 
  songs
VALUES (NULL, 1, "MFC", "2023-10-31", "00:02:26", 4555, 5, "***");

--Insert de "users" 
INSERT INTO 
  users 
VALUES (NULL, "Knives", "77", "_", 130, "Mujer", "street", 
        9999, 76700, "colony", "municipaly", "state","123-456-7890", 
       "a@a.com", "***");

