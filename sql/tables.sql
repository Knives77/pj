/*
   Autor: Re-L Mayer 
   date: 2023-10-30
   v: Knives
*/

/*
Verificamos si existe una base de datos con 
el mismo nombre y la eliminamos. Posteriormente
creamos la base de datos y selecionamos.
*/

DROP DATABASE IF EXISTS pj;
CREATE DATABASE pj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
SET NAMES "utf8mb4";
USE pj;

/*Creamos la tabla "album"*/
CREATE TABLE albums (
  id_alb INT AUTO_INCREMENT,
  alb_cov VARCHAR(200) NOT NULL,
  name_a VARCHAR(30) NOT NULL,
  date_alb DATE NOT NULL,
  totl_trck INT NOT NULL,
  gen_alb VARCHAR (100) NOT NULL,
  punct DECIMAL(3,1) CHECK (punct >= 0 AND punct <= 10),
  price DECIMAL (5,2) CHECK (price >= 0 AND price <= 1000),
  note VARCHAR(1000) NOT NULL,
  PRIMARY KEY (id_alb)
);

DESC albums;

/*Creamos la tabla  "songs" */
CREATE TABLE songs (
  id_song INT AUTO_INCREMENT,
  id_alb INT,
  name_s VARCHAR (60) NOT NULL,
  date_s DATE NOT NULL,
  durtn TIME NOT NULL,
  tims_plyd INT NOT NULL,
  price_s DECIMAL (3,2) CHECK (price_s >= 0 AND price_s <= 5),
  letra VARCHAR (200) NOT NULL,
  FOREIGN KEY(id_alb) REFERENCES albums(id_alb) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARY KEY(id_song)
);
DESC songs;

/*Creamos la tabla "users" */
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

/*Creamos la tabla "sales" */
CREATE TABLE sales (
  id_sale INT AUTO_INCREMENT,
  id_usr INT,
  date_sale DATE NOT NULL,
  ttl_sale DECIMAL(6,2) CHECK (ttl_sale >= 0 AND ttl_sale <= 5500),
  payment_type VARCHAR(50),
  PRIMARY KEY(id_sale),
  FOREIGN KEY(id_usr) REFERENCES users(id_usr) ON UPDATE CASCADE ON DELETE CASCADE
);
DESC sales;

/*Creamos la tabla "album_sales" */
CREATE TABLE album_sales (
  id_sale INT,
  id_alb INT,
  PRIMARY KEY (id_sale, id_alb),
  FOREIGN KEY (id_sale) REFERENCES sales(id_sale),
  FOREIGN KEY (id_alb) REFERENCES albums(id_alb)
);
DESC album_sales;

/*Creamos la tabla "song_sales" */
CREATE TABLE song_sales (
  id_sale INT,
  id_song INT,
  PRIMARY KEY (id_sale, id_song),
  FOREIGN KEY (id_sale) REFERENCES sales(id_sale),
  FOREIGN KEY (id_song) REFERENCES songs(id_song)
);
DESC song_sales;

/*Insert de "albums" */
INSERT INTO 
  albums
VALUES 
/*Yield*/
(NULL, "./img/uploads/Yield.jpg",'YIELD',"1998-02-03", 
12, "Grunge, Rock Alternativo", 9.5, 700.03, 
"El quinto álbum de estudio de Pearl Jam, 'Yield', continúa la
evolución musical de la banda, fusionando elementos grunge con 
una mayor diversidad de estilos. Destaca por su enfoque lírico 
y musical maduro."),
/*Ten*/
(NULL,"./img/uploads/Ten.jpg","Ten", "1991-08-27", 11, "Grunge, Rock Alternativo", 10.0,
800.99, "Uno de los álbumes más influyentes de los años 90."),
/*Vs.*/
(NULL, './img/uploads/Vs..jpg','Vs.', '1993-10-19', 12, 'Rock Alternativo, Grunge', 9.3,  300.39, 
'Un álbum icónico que marcó una época y dejó una huella indeleble en 
la historia del rock. Cada pista es una obra maestra. ¡Imprescindible 
para cualquier amante de la música!'),
/*Lightning Bolt*/
(NULL, './img/uploads/LightningBolt.jpg','Lightning Bolt',  '2013-10-15', 12, 'Rock Alternativo, Grunge', 9.7,
100.10, 'Este álbum demuestra que Pearl Jam sigue siendo una fuerza 
en el mundo del rock. Con un sonido fresco y letras impactantes, 
"Lightning Bolt" es una joya. ¡No te lo pierdas!');

/*Insert de "songs" */
INSERT INTO 
  songs
VALUES
/*Yield*/
(NULL, 1, "All Those Yesterdays", "1998-02-03", "00:07:40", 23, 5.00, "***"),
(NULL, 1, "Do the Evolution", "1998-02-03", "00:03:51", 548, 5.00,"***"),
(NULL, 1, "Faithful", "1998-02-03", "00:04:19", 102, 5.00,"***"),
(NULL, 1, "Brain of J.", "1998-02-03", "00:03:00", 131,5.00, "***"),
(NULL, 1, "No Way", "1998-02-03", "00:04:19", 12, 5.00, "***"),
/*Ten*/  
(NULL, 2, "Jeremy", "1991-08-27", "00:05:18", 556, 5.00, "***"),
(NULL, 2, "Black", "1991-08-27", "00:05:42", 590, 5.00, "***"),
(NULL, 2, "Alive", "1991-08-27", "00:05:40", 807, 5.00, "***"),
(NULL, 2, "Even Flow", "1991-08-27", "00:04:55", 875, 5.00, "***"),
(NULL, 2, "Deep", "1991-08-27", "00:04:18", 207, 5.00, "***"),
/*Vs.*/
(NULL, 3, "Daughter", "1993-10-19", "00:03:55", 542, 5.00, "***"),
(NULL, 3, "Rearviewmirror", "1993-10-19", "00:04:44", 464, 5.00, "***"),
(NULL, 3, "Go", "1993-10-19", "00:02:51", 340, 5.00, "***"),
(NULL, 3, "Leash", "1993-10-19", "00:02:53", 132, 5.00, "***"),
(NULL, 3, "Indifference", "1993-10-19", "00:05:02", 165, 5.00, "***"),
/*Lightning Bolt*/
(NULL, 4, "Sirens", "2013-10-15", "00:05:36", 74, 5.00, "***"),
(NULL, 4, "Infallible", "2013-10-15", "00:05:22", 22, 5.00, "***"),
(NULL, 4, "My Father's Son", "2013-10-15", "00:03:42", 13, 5.00, "***"),
(NULL, 4, "Sleeping By Myself", "2013-10-15", "00:01:52", 22, 5.00, "***"),
(NULL, 4, "Swallowed Whole", "2013-10-15", "00:03:51", 15, 5.00, "***");

/*Insert de "users" */
INSERT INTO 
  users 
VALUES 
(NULL, "Knives", "77", "_", 130, "Mujer", "street", 9999, 76700, "colony", "municipaly", "state","123-456-7890", "a@a.com", "**********"),
(NULL, 'Juan', 'García', 'López', 30, 'Hombre', 'Calle de la Rosa', 1234, 12345, 'Colonia Central', 'Ciudad de México', 'Ciudad de México', '555-123-4567', 'juan@example.com', 'P@ssw0rd1'),
(NULL, 'María', 'Martínez', 'González', 25, 'Mujer', 'Avenida del Sol', 567, 54321, 'Colonia del Valle', 'Monterrey', 'Nuevo León', '555-987-6543', 'maria@example.com', 'M#9q2Bz!'),
(NULL, 'Carlos', 'Ramírez', 'Pérez', 40, 'Hombre', 'Calle del Bosque', 987, 67890, 'Colonia Obrera', 'Guadalajara', 'Jalisco', '555-234-7890', 'carlos@example.com', 'Cp^5&F@z'),
(NULL, 'Laura', 'López', 'Hernández', 28, 'Mujer', 'Avenida de la Playa', 654, 98765, 'Colonia Marina', 'Cancún', 'Quintana Roo', '555-876-5432', 'laura@example.com', 'L$8a!rW2'),
(NULL, 'Pedro', 'Sánchez', 'Torres', 35, 'Hombre', 'Calle del Sol', 5678, 43210, 'Colonia del Carmen', 'Puebla', 'Puebla', '555-432-1098', 'pedro@example.com', 'P@7K!aX3'),
(NULL, 'Ana', 'Gómez', 'Díaz', 29, 'Mujer', 'Avenida de las Flores', 4321, 87654, 'Colonia Primavera', 'Mérida', 'Yucatán', '555-789-0123', 'ana@example.com', 'A#9sD*1y'),
(NULL, 'Javier', 'Fernández', 'Rodríguez', 45, 'Hombre', 'Calle de la Luna', 2345, 56789, 'Colonia Noche Buena', 'Tijuana', 'Baja California', '555-321-9876', 'javier@example.com', 'J$2mT#1!'),
(NULL, 'Luis', 'Hernández', 'García', 27, 'Hombre', 'Calle de los Pinos', 6543, 21435, 'Colonia Bosque Real', 'Cuernavaca', 'Morelos', '555-456-1234', 'luis@example.com', 'L*p5I@V!7'),
(NULL, 'Sofía', 'Díaz', 'Pérez', 33, 'Mujer', 'Avenida de los Naranjos', 3456, 54321, 'Colonia Naranjal', 'Merida', 'Yucatán', '555-567-8901', 'sofia@example.com', 'S&7A*dFp!');

/*Insert de "sales" */
INSERT INTO sales 
 VALUES 
(NULL, 1, "2023-10-31", 5500.00, "Tarjeta de credito"),
(NULL, 3, '2023-02-20', 75.25, 'Efectivo'),
(NULL, 7, '2023-03-10', 120.75, 'Transferencia bancaria'),
(NULL, 2, '2023-04-05', 50.00, 'PayPal'),
(NULL, 5, '2023-05-12', 85.99, 'Efectivo'),
(NULL, 9, '2023-06-18', 220.45, 'Tarjeta de débito'),
(NULL, 4, '2023-07-30', 75.75, 'Efectivo'),
(NULL, 6, '2023-08-22', 150.60, 'Transferencia bancaria'),
(NULL, 10, '2023-09-14', 300.00, 'PayPal'),
(NULL, 8, '2023-10-01', 199.99, 'Tarjeta de crédito'),
(NULL, 1, '2023-11-11', 110.00, 'Efectivo'),
(NULL, 3, '2023-12-25', 175.25, 'Transferencia bancaria'),
(NULL, 2, '2024-01-05', 55.50, 'PayPal'),
(NULL, 5, '2024-02-29', 89.99, 'Tarjeta de débito'),
(NULL, 9, '2024-03-15', 205.25, 'Efectivo');

/*Insert de "album_sales" */
INSERT INTO album_sales 
  VALUES
(3, 1),
(8, 3),
(10, 2),
(6, 4),
(1, 1),
(5, 2),
(14, 3),
(2, 1),
(7, 4),
(12, 2);

/*Insert de "song_sales" */
INSERT INTO song_sales 
  VALUES
(7, 4),
(11, 7),
(6, 1),
(9, 5),
(3, 7),
(5, 9),
(14, 3),
(12, 15),
(2, 20),
(13, 6),
(8, 10),
(15, 17),
(4, 12),
(1, 2),
(10, 8);
