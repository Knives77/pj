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

/* Verificar si el usuario existe*/
SELECT user FROM mysql.user WHERE user = 'admin_test';
/*Si el usuario existe, eliminarlo*/
DROP USER IF EXISTS 'admin_test'@'localhost';
/*Crear usuario porbdefecto*/
CREATE USER 'admin_test'@'localhost' IDENTIFIED BY 'admin_test_psswd';
GRANT ALL PRIVILEGES ON *.* TO 'admin_test'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

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
  punct DECIMAL(3,1) NOT NULL CHECK (punct >= 0 AND punct <= 10),
  price DECIMAL (5,2) NOT NULL CHECK (price >= 0 AND price <= 1000),
  note VARCHAR(1000) NOT NULL,
  PRIMARY KEY (id_alb)
);

DESC albums;

/*Creamos la tabla  "songs" */
CREATE TABLE songs (
  id_song INT AUTO_INCREMENT,
  id_alb INT NOT NULL,
  name_s VARCHAR (60) NOT NULL,
  date_s DATE NOT NULL,
  durtn TIME NOT NULL,
  tims_plyd INT(3) NOT NULL,
  price_s DECIMAL (3,2) NOT NULL CHECK (price_s >= 0 AND price_s <= 5),
  format_s VARCHAR(10) NOT NULL,
  lyrics VARCHAR (1000) NOT NULL,
  FOREIGN KEY(id_alb) REFERENCES albums(id_alb), /* ON UPDATE CASCADE ON DELETE CASCADE,*/
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
  id_usr INT NOT NULL,
  keyword VARCHAR(70) NOT NULL,
  date_sale DATE NOT NULL,
  mode_sale VARCHAR (10) NOT NULL CHECK (mode_sale = 'Tienda' OR mode_sale = 'Línea'),
  ttl_sale DECIMAL(7,2) NOT NULL CHECK (ttl_sale >= 0 AND ttl_sale <= 10500),
  payment_type VARCHAR(50) NOT NULL,
  warranty_months INT(2) NOT NULL CHECK (warranty_months >= 0 AND warranty_months <= 24),
  various_prdct BOOLEAN NOT NULL,
  PRIMARY KEY(id_sale),
  FOREIGN KEY(id_usr) REFERENCES users(id_usr) /* ON UPDATE CASCADE ON DELETE CASCADE*/
);
DESC sales;

/*Creamos la tabla "album_sales" */
CREATE TABLE album_sales (
  id_album_sale INT AUTO_INCREMENT,
  id_sale INT NOT NULL,
  id_alb INT NOT NULL,
  PRIMARY KEY(id_album_sale),
  FOREIGN KEY (id_sale) REFERENCES sales(id_sale), /* ON UPDATE CASCADE ON DELETE CASCADE,*/
  FOREIGN KEY (id_alb) REFERENCES albums(id_alb) /* ON UPDATE CASCADE ON DELETE CASCADE */
);
DESC album_sales;


/*Creamos la tabla "song_sales" */
CREATE TABLE song_sales (
  id_song_sale INT AUTO_INCREMENT,
  id_sale INT NOT NULL,
  id_song INT NOT NULL,
  PRIMARY KEY(id_song_sale),
  FOREIGN KEY (id_sale) REFERENCES sales(id_sale), /* ON UPDATE CASCADE ON DELETE CASCADE,*/
  FOREIGN KEY (id_song) REFERENCES songs(id_song) /* ON UPDATE CASCADE ON DELETE CASCADE*/
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
"Lightning Bolt" es una joya. ¡No te lo pierdas!'),
-- "Vitalogy"
(NULL, './img/uploads/Vitalogy.jpg', 'Vitalogy', '1994-12-06', 14, 'Grunge, Rock Alternativo', 9.0,  450.75, 'El tercer álbum de estudio de Pearl Jam con un sonido experimental y letras profundas.'),
-- "No Code"
(NULL, './img/uploads/NoCode.jpg', 'No Code', '1996-08-27', 13, 'Rock Alternativo', 8.5,  200.50, 'Un álbum que marca un cambio en la dirección musical de Pearl Jam con un enfoque más ecléctico.'),
-- "Binaural"
(NULL, './img/uploads/Binaural.jpg', 'Binaural', '2000-05-16', 12, 'Rock Alternativo', 8.8,  250.99, 'Un álbum que presenta un enfoque más experimental y una producción distintiva.'),
-- "Riot Act"
(NULL, './img/uploads/RiotAct.jpg', 'Riot Act', '2002-11-12', 15, 'Rock Alternativo', 8.2,  180.00, 'Con letras reflexivas y una mezcla de estilos, "Riot Act" es un testimonio del continuo crecimiento artístico de Pearl Jam.'),
-- "Pearl Jam"
(NULL, './img/uploads/PearlJam.jpg', 'Pearl Jam', '2006-05-02', 13, 'Rock Alternativo', 9.0,  300.00, 'El álbum homónimo de Pearl Jam que muestra su versatilidad y madurez musical.'),
-- "Backspacer"
(NULL, './img/uploads/Backspacer.jpg', 'Backspacer', '2009-09-20', 11, 'Rock Alternativo', 8.7,  150.25, 'Un álbum más enérgico que marca un regreso a las raíces más rockeras de la banda.'),
-- "Gigaton"
(NULL, './img/uploads/Gigaton.jpg', 'Gigaton', '2020-03-27', 12, 'Rock Alternativo', 9.2,  120.50, 'El último álbum de estudio de Pearl Jam, marcando un regreso con un sonido poderoso y letras reflexivas.'),
-- "Lost Dogs"
(NULL, './img/uploads/LostDogs.jpg', 'Lost Dogs', '2003-11-11', 7, 'Rock Alternativo', 9.4,  250.00, 'Una colección de canciones inéditas y lados B que ofrece una visión más completa del repertorio de Pearl Jam.');

/*Insert de "songs" */
INSERT INTO 
  songs
VALUES
/*Yield*/
(NULL, 1, "All Those Yesterdays", "1998-02-03", "00:07:40", 23, 5.00, "flac", "***"),
(NULL, 1, "Given to Fly", "1998-02-03", "00:04:01", 45, 3.50, "mp3", "****"),
(NULL, 1, "Wishlist", "1998-02-03", "00:03:26", 36, 2.75, "wav", "*****"),
(NULL, 1, "Do the Evolution", "1998-02-03", "00:03:54", 50, 4.25, "flac", "****"),
(NULL, 1, "Brain of J.", "1998-02-03", "00:02:59", 30, 2.00, "mp3", "***"),
(NULL, 1, "Faithfull", "1998-02-03", "00:04:18", 28, 3.25, "wav", "****"),
(NULL, 1, "No Way", "1998-02-03", "00:04:19", 18, 2.90, "flac", "***"),
(NULL, 1, "In Hiding", "1998-02-03", "00:05:00", 22, 4.00, "mp3", "*****"),
(NULL, 1, "Push Me, Pull Me", "1998-02-03", "00:07:04", 15, 5.0, "wav", "****"),
(NULL, 1, "All Those Yesterdays (Reprise)", "1998-02-03", "00:02:05", 10, 1.75, "flac", "**"),
(NULL, 1, "Red Dot", "1998-02-03", "00:03:45", 12, 2.25, "mp3", "****"),
(NULL, 1, "Smile", "1998-02-03", "00:04:14", 20, 3.75, "wav", "*****"),
/*Ten*/
(NULL, 2, "Once", "1991-08-27", "00:03:51", 42, 2.75, "mp3", "****"),
(NULL, 2, "Even Flow", "1991-08-27", "00:04:53", 58, 3.50, "wav", "*****"),
(NULL, 2, "Alive", "1991-08-27", "00:05:41", 70, 4.25, "flac", "****"),
(NULL, 2, "Why Go", "1991-08-27", "00:03:19", 35, 3.00, "mp3", "***"),
(NULL, 2, "Black", "1991-08-27", "00:05:44", 48, 4.50, "wav", "*****"),
(NULL, 2, "Jeremy", "1991-08-27", "00:05:18", 62, 4.75, "flac", "*****"),
(NULL, 2, "Oceans", "1991-08-27", "00:02:42", 28, 2.25, "mp3", "***"),
(NULL, 2, "Porch", "1991-08-27", "00:03:30", 45, 3.75, "wav", "****"),
(NULL, 2, "Garden", "1991-08-27", "00:04:58", 50, 4.00, "flac", "****"),
(NULL, 2, "Deep", "1991-08-27", "00:04:18", 32, 3.25, "mp3", "****"),
(NULL, 2, "Release", "1991-08-27", "00:04:51", 38, 4.00, "wav", "*****"),
/*Vs.*/
(NULL, 3, "Go", "1993-10-19", "00:03:13", 40, 3.25, "mp3", "****"),
(NULL, 3, "Animal", "1993-10-19", "00:02:49", 55, 2.75, "wav", "*****"),
(NULL, 3, "Daughter", "1993-10-19", "00:03:55", 45, 4.50, "flac", "****"),
(NULL, 3, "Glorified G", "1993-10-19", "00:03:26", 30, 3.00, "mp3", "***"),
(NULL, 3, "Dissident", "1993-10-19", "00:03:35", 42, 3.75, "wav", "****"),
(NULL, 3, "W.M.A.", "1993-10-19", "00:05:59", 28, 4.25, "flac", "***"),
(NULL, 3, "Blood", "1993-10-19", "00:02:50", 38, 2.50, "mp3", "*****"),
(NULL, 3, "Rearviewmirror", "1993-10-19", "00:04:44", 60, 5.00, "wav", "*****"),
(NULL, 3, "Rats", "1993-10-19", "00:04:15", 25, 3.25, "flac", "****"),
(NULL, 3, "Elderly Woman Behind the Counter in a Small Town", "1993-10-19", "00:03:15", 48, 3.50, "mp3", "*****"),
(NULL, 3, "Leash", "1993-10-19", "00:03:09", 18, 2.75, "wav", "****"),
(NULL, 3, "Indifference", "1993-10-19", "00:05:03", 35, 4.75, "flac", "****"),
/*LightningBolt*/
(NULL, 4, 'Sirens', '2013-10-15', '00:05:41', 100, 1.99, 'MP3', '*** Sirens...'),
(NULL, 4, 'Mind Your Manners', '2013-07-11', '00:02:38', 85, 0.99, 'MP3', '*** Mind Your Manners...'),
(NULL, 4, 'Lightning Bolt', '2013-09-18', '00:04:13', 120, 1.49, 'MP3', '*** Lightning Bolt...'),
(NULL, 4, 'Future Days', '2013-10-15', '00:04:22', 90, 1.29, 'MP3', '*** Future Days...'),
(NULL, 4, 'Yellow Moon', '2013-10-10', '00:03:52', 110, 1.79, 'MP3', '*** Yellow Moon...'),
(NULL, 4, 'Pendulum', '2013-10-11', '00:03:44', 105, 1.69, 'MP3', '*** Pendulum...'),
(NULL, 4, 'Infallible', '2013-10-14', '00:05:22', 95, 2.29, 'MP3', '*** Infallible...'),
(NULL, 4, 'My Father''s Son', '2013-10-09', '00:03:07', 80, 0.89, 'MP3', '*** My Father''s Son...'),
(NULL, 4, 'Swallowed Whole', '2013-10-12', '00:03:51', 115, 1.59, 'MP3', '*** Swallowed Whole...'),
(NULL, 4, 'Let the Records Play', '2013-10-13', '00:03:44', 100, 1.29, 'MP3', '*** Let the Records Play...'),
(NULL, 4, 'Sleeping by Myself', '2013-10-16', '00:03:04', 85, 0.99, 'MP3', '*** Sleeping by Myself...'),
/*Vitalogy*/
(NULL, 5, "Last Exit", "1994-12-06", "00:02:54", 42, 2.75, "mp3", "****"),
(NULL, 5, "Spin the Black Circle", "1994-12-06", "00:02:48", 38, 2.50, "wav", "****"),
(NULL, 5, "Not for You", "1994-12-06", "00:05:52", 50, 4.25, "flac", "*****"),
(NULL, 5, "Tremor Christ", "1994-12-06", "00:04:12", 30, 3.00, "mp3", "***"),
(NULL, 5, "Nothingman", "1994-12-06", "00:04:34", 48, 4.50, "wav", "*****"),
(NULL, 5, "Whipping", "1994-12-06", "00:02:35", 62, 4.75, "flac", "*****"),
(NULL, 5, "Pry, To", "1994-12-06", "00:01:03", 20, 1.50, "mp3", "**"),
(NULL, 5, "Corduroy", "1994-12-06", "00:04:36", 45, 3.75, "wav", "****"),
(NULL, 5, "Bugs", "1994-12-06", "00:02:45", 28, 2.25, "flac", "***"),
(NULL, 5, "Satan's Bed", "1994-12-06", "00:03:31", 32, 2.75, "mp3", "****"),
(NULL, 5, "Better Man", "1994-12-06", "00:04:28", 40, 3.50, "wav", "*****"),
(NULL, 5, "Immortality", "1994-12-06", "00:05:28", 50, 4.25, "mp3", "****"),
(NULL, 5, "Hey Foxymophandlemama, That's Me (Bonus Track)", "1994-12-06", "00:07:47", 60, 5.00, "wav", "*****"),
(NULL, 5, "Stupid Mop (Hidden Track)", "1994-12-06", "00:05:47", 45, 4.00, "flac", "****"),
-- "No Code"
(NULL, 6, "Sometimes", "1996-08-27", "00:03:52", 42, 3.25, "mp3", "****"),
(NULL, 6, "Hail, Hail", "1996-08-27", "00:03:41", 38, 2.75, "wav", "****"),
(NULL, 6, "Who You Are", "1996-08-27", "00:03:50", 50, 4.25, "flac", "*****"),
(NULL, 6, "In My Tree", "1996-08-27", "00:03:59", 30, 3.00, "mp3", "***"),
(NULL, 6, "Smile", "1996-08-27", "00:03:52", 48, 4.50, "wav", "*****"),
(NULL, 6, "Off He Goes", "1996-08-27", "00:05:59", 62, 4.75, "flac", "*****"),
(NULL, 6, "Habit", "1996-08-27", "00:03:35", 20, 1.50, "mp3", "**"),
(NULL, 6, "Red Mosquito", "1996-08-27", "00:04:03", 45, 3.75, "wav", "****"),
(NULL, 6, "Lukin", "1996-08-27", "00:01:02", 28, 2.25, "flac", "***"),
(NULL, 6, "Present Tense", "1996-08-27", "00:05:46", 32, 2.75, "mp3", "****"),
(NULL, 6, "Mankind", "1996-08-27", "00:02:59", 40, 3.50, "wav", "*****"),
(NULL, 6, "I'm Open", "1996-08-27", "00:02:57", 25, 2.00, "flac", "***"),
(NULL, 6, "Around the Bend", "1996-08-27", "00:04:35", 50, 4.25, "mp3", "****"),
-- "Binaural"
(NULL, 7, "Breakerfall", "2000-05-16", "00:02:19", 42, 3.25, "mp3", "****"),
(NULL, 7, "Gods' Dice", "2000-05-16", "00:02:26", 38, 2.75, "wav", "****"),
(NULL, 7, "Evacuation", "2000-05-16", "00:03:17", 50, 4.25, "flac", "*****"),
(NULL, 7, "Light Years", "2000-05-16", "00:05:07", 30, 3.00, "mp3", "***"),
(NULL, 7, "Nothing as It Seems", "2000-05-16", "00:05:23", 48, 4.50, "wav", "*****"),
(NULL, 7, "Thin Air", "2000-05-16", "00:03:32", 62, 4.75, "flac", "*****"),
(NULL, 7, "Insignificance", "2000-05-16", "00:04:29", 20, 1.50, "mp3", "**"),
(NULL, 7, "Of the Girl", "2000-05-16", "00:05:07", 45, 3.75, "wav", "****"),
(NULL, 7, "Grievance", "2000-05-16", "00:03:14", 28, 2.25, "flac", "***"),
(NULL, 7, "Rival", "2000-05-16", "00:03:36", 32, 2.75, "mp3", "****"),
(NULL, 7, "Sleight of Hand", "2000-05-16", "00:04:48", 40, 3.50, "wav", "*****"),
(NULL, 7, "Soon Forget", "2000-05-16", "00:01:46", 30, 2.50, "flac", "****"),
-- "Riot Act"
(NULL, 8, "Can't Keep", "2002-11-12", "00:03:37", 42, 3.25, "mp3", "****"),
(NULL, 8, "Save You", "2002-11-12", "00:03:49", 38, 2.75, "wav", "****"),
(NULL, 8, "Love Boat Captain", "2002-11-12", "00:04:36", 50, 4.25, "flac", "*****"),
(NULL, 8, "Cropduster", "2002-11-12", "00:04:18", 30, 3.00, "mp3", "***"),
(NULL, 8, "Ghost", "2002-11-12", "00:03:52", 48, 4.50, "wav", "*****"),
(NULL, 8, "I Am Mine", "2002-11-12", "00:03:35", 62, 4.75, "flac", "*****"),
(NULL, 8, "Thumbing My Way", "2002-11-12", "00:04:09", 20, 1.50, "mp3", "**"),
(NULL, 8, "You Are", "2002-11-12", "00:04:30", 45, 3.75, "wav", "****"),
(NULL, 8, "Get Right", "2002-11-12", "00:02:45", 28, 2.25, "flac", "***"),
(NULL, 8, "Green Disease", "2002-11-12", "00:02:41", 32, 2.75, "mp3", "****"),
(NULL, 8, "Help Help", "2002-11-12", "00:03:35", 40, 3.50, "wav", "*****"),
(NULL, 8, "Bu$hleaguer", "2002-11-12", "00:03:59", 25, 2.00, "flac", "***"),
(NULL, 8, "1/2 Full", "2002-11-12", "00:04:11", 50, 4.25, "mp3", "****"),
(NULL, 8, "Arc", "2002-11-12", "00:00:58", 30, 2.50, "wav", "****"),
(NULL, 8, "All or None", "2002-11-12", "00:04:38", 38, 2.75, "flac", "****"),
-- "PearlJam"
(NULL, 9, "Life Wasted", "2006-05-02", "00:03:54", 42, 3.25, "mp3", "****"),
(NULL, 9, "World Wide Suicide", "2006-05-02", "00:03:29", 38, 2.75, "wav", "****"),
(NULL, 9, "Comatose", "2006-05-02", "00:04:19", 50, 4.25, "flac", "*****"),
(NULL, 9, "Marker in the Sand", "2006-05-02", "00:04:23", 30, 3.00, "mp3", "***"),
(NULL, 9, "Parachutes", "2006-05-02", "00:03:35", 48, 4.50, "wav", "*****"),
(NULL, 9, "Unemployable", "2006-05-02", "00:03:04", 62, 4.75, "flac", "*****"),
(NULL, 9, "Big Wave", "2006-05-02", "00:02:58", 20, 1.50, "mp3", "**"),
(NULL, 9, "Gone", "2006-05-02", "00:04:09", 45, 3.75, "wav", "****"),
(NULL, 9, "Wasted Reprise", "2006-05-02", "00:00:53", 28, 2.25, "flac", "***"),
(NULL, 9, "Army Reserve", "2006-05-02", "00:03:44", 32, 2.75, "mp3", "****"),
(NULL, 9, "Come Back", "2006-05-02", "00:05:29", 40, 3.50, "wav", "*****"),
(NULL, 9, "Inside Job", "2006-05-02", "00:07:02", 25, 2.00, "flac", "***"),
(NULL, 9, "Severed Hand", "2006-05-02", "00:04:31", 38, 3.25, "mp3", "****"),
-- "Backspacer"
(NULL, 10, "Gonna See My Friend", "2009-09-20", "00:02:47", 42, 3.25, "mp3", "****"),
(NULL, 10, "Got Some", "2009-09-20", "00:03:01", 38, 2.75, "wav", "****"),
(NULL, 10, "The Fixer", "2009-09-20", "00:02:57", 50, 4.25, "flac", "*****"),
(NULL, 10, "Johnny Guitar", "2009-09-20", "00:02:49", 30, 3.00, "mp3", "***"),
(NULL, 10, "Just Breathe", "2009-09-20", "00:03:35", 48, 4.50, "wav", "*****"),
(NULL, 10, "Amongst the Waves", "2009-09-20", "00:03:58", 62, 4.75, "flac", "*****"),
(NULL, 10, "Unthought Known", "2009-09-20", "00:04:09", 20, 1.50, "mp3", "**"),
(NULL, 10, "Supersonic", "2009-09-20", "00:02:39", 45, 3.75, "wav", "****"),
(NULL, 10, "Speed of Sound", "2009-09-20", "00:03:34", 28, 2.25, "flac", "***"),
(NULL, 10, "Force of Nature", "2009-09-20", "00:04:02", 32, 2.75, "mp3", "****"),
(NULL, 10, "The End", "2009-09-20", "00:02:57", 40, 3.50, "wav", "*****"),
-- "Gigaton"
(NULL, 11, "Who Ever Said", "2020-03-27", "00:05:11", 42, 3.25, "mp3", "****"),
(NULL, 11, "Superblood Wolfmoon", "2020-03-27", "00:03:50", 38, 2.75, "wav", "****"),
(NULL, 11, "Dance of the Clairvoyants", "2020-03-27", "00:04:25", 50, 4.25, "flac", "*****"),
(NULL, 11, "Quick Escape", "2020-03-27", "00:04:47", 30, 3.00, "mp3", "***"),
(NULL, 11, "Alright", "2020-03-27", "00:03:44", 48, 4.50, "wav", "*****"),
(NULL, 11, "Seven O'Clock", "2020-03-27", "00:06:14", 62, 4.75, "flac", "*****"),
(NULL, 11, "Never Destination", "2020-03-27", "00:04:17", 20, 1.50, "mp3", "**"),
(NULL, 11, "Take the Long Way", "2020-03-27", "00:03:42", 45, 3.75, "wav", "****"),
(NULL, 11, "Buckle Up", "2020-03-27", "00:03:38", 28, 2.25, "flac", "***"),
(NULL, 11, "Come Then Goes", "2020-03-27", "00:05:02", 32, 2.75, "mp3", "****"),
(NULL, 11, "Retrograde", "2020-03-27", "00:05:23", 40, 3.50, "wav", "*****"),
(NULL, 11, "River Cross", "2020-03-27", "00:05:53", 25, 2.00, "flac", "***"),
-- "Lost Dogs"
(NULL, 12, "Alone", "2003-11-11", "00:03:11", 42, 3.25, "mp3", "****"),
(NULL, 12, "Fatal", "2003-11-11", "00:03:39", 38, 2.75, "wav", "****"),
(NULL, 12, "Strangest Tribe", "2003-11-11", "00:03:50", 50, 4.25, "flac", "*****"),
(NULL, 12, "Sad", "2003-11-11", "00:03:36", 30, 3.00, "mp3", "***"),
(NULL, 12, "Yellow Ledbetter", "2003-11-11", "00:05:00", 48, 4.50, "wav", "*****"),
(NULL, 12, "Footsteps", "2003-11-11", "00:03:50", 62, 4.75, "flac", "*****"),
(NULL, 12, "U", "2003-11-11", "00:02:52", 32, 4.75, "flac", "*****"),
(NULL, 12, "Last Kiss", "2003-11-11", "00:03:17", 20, 1.50, "mp3", "**");

/*Insert de "users" */
INSERT INTO 
  users 
VALUES 

(NULL, 'Juan', 'García', 'López', 30, 'Hombre', 'Calle de la Rosa', 1234, 12345, 'Colonia Central', 'Ciudad de México', 'Ciudad de México', '555-123-4567', 'juan@example.com', 'P@ssw0rd1'),
(NULL, 'María', 'Martínez', 'Gómez', 25, 'Mujer', 'Avenida del Sol', 5678, 54321, 'Colonia Norte', 'Guadalajara', 'Jalisco', '555-987-6543', 'maria@example.com', 'SecureP@ss'),
(NULL, 'Pedro', 'Ramírez', 'Sánchez', 35, 'Hombre', 'Calle del Bosque', 4321, 98765, 'Colonia Sur', 'Monterrey', 'Nuevo León', '555-321-6789', 'pedro@example.com', 'StrongP@ss'),
(NULL, 'Ana', 'Hernández', 'Pérez', 28, 'Mujer', 'Paseo de la Luna', 8765, 67890, 'Colonia Este', 'Puebla', 'Puebla', '555-876-5432', 'ana@example.com', 'Pass123!'),
(NULL, 'Carlos', 'Díaz', 'Fernández', 40, 'Hombre', 'Avenida de las Estrellas', 9876, 34567, 'Colonia Oeste', 'Tijuana', 'Baja California', '555-234-5678', 'carlos@example.com', 'C@rlosPwd'),
(NULL, 'Laura', 'Gómez', 'Martínez', 22, 'Mujer', 'Calle del Mar', 6543, 78901, 'Colonia Playa', 'Cancún', 'Quintana Roo', '555-765-4321', 'laura@example.com', 'L@uraPass'),
(NULL, 'Javier', 'López', 'Ramírez', 33, 'Hombre', 'Paseo del Sol', 2345, 89012, 'Colonia Vista', 'Veracruz', 'Veracruz', '555-456-7890', 'javier@example.com', 'J@vier123'),
(NULL, 'Sofía', 'Fernández', 'Gutiérrez', 26, 'Mujer', 'Calle de las Flores', 7890, 56789, 'Colonia Jardín', 'Mérida', 'Yucatán', '555-890-1234', 'sofia@example.com', 'FlowerSofia'),
(NULL, 'Martín', 'Martínez', 'García', 37, 'Hombre', 'Avenida del Bosque', 3456, 23456, 'Colonia Bosque', 'Hermosillo', 'Sonora', '555-678-9012', 'martin@example.com', 'M@rtinPwd'),
(NULL, 'Elena', 'Gutiérrez', 'López', 29, 'Mujer', 'Calle del Río', 5678, 45678, 'Colonia Río', 'Querétaro', 'Querétaro', '555-901-2345', 'elena@example.com', 'RiverElena'),
(NULL, 'Francisco', 'García', 'Hernández', 31, 'Hombre', 'Calle de los Pinos', 8765, 78901, 'Colonia Pinos', 'Aguascalientes', 'Aguascalientes', '555-123-9876', 'francisco@example.com', 'FrancP@ss'),
(NULL, 'Carmen', 'Hernández', 'Martínez', 27, 'Mujer', 'Avenida de la Montaña', 4321, 89012, 'Colonia Montaña', 'Chihuahua', 'Chihuahua', '555-234-8765', 'carmen@example.com', 'MontañaC@rmen'),
(NULL, 'Ricardo', 'Martínez', 'Gómez', 34, 'Hombre', 'Calle del Valle', 9876, 54321, 'Colonia Valle', 'Saltillo', 'Coahuila', '555-987-6543', 'ricardo@example.com', 'ValleyRich1'),
(NULL, 'Isabel', 'Sánchez', 'Díaz', 23, 'Mujer', 'Avenida de las Flores', 5432, 67890, 'Colonia Flores', 'Toluca', 'Estado de México', '555-876-5432', 'isabel@example.com', 'FlowerGirl23'),
(NULL, 'Fernando', 'López', 'Ramírez', 39, 'Hombre', 'Paseo del Monte', 6789, 43210, 'Colonia Monte', 'Morelia', 'Michoacán', '555-234-5678', 'fernando@example.com', 'MonteFer39'),
(NULL, 'Luisa', 'Gómez', 'Hernández', 24, 'Mujer', 'Calle de la Luna', 7654, 54321, 'Colonia Luna', 'Torreón', 'Coahuila', '555-987-6543', 'luisa@example.com', 'LunaLuisa24'),
(NULL, 'Gabriel', 'Ramírez', 'Sánchez', 36, 'Hombre', 'Avenida de la Estrella', 8765, 23456, 'Colonia Estrella', 'Culiacán', 'Sinaloa', '555-321-6789', 'gabriel@example.com', 'StarGabe36'),
(NULL, 'Raquel', 'Fernández', 'Martínez', 28, 'Mujer', 'Calle de la Montaña', 3210, 78901, 'Colonia Montaña', 'Acapulco', 'Guerrero', '555-876-5432', 'raquel@example.com', 'MountainRaquel'),
(NULL, 'Arturo', 'Martínez', 'López', 32, 'Hombre', 'Paseo del Mar', 2345, 89012, 'Colonia Mar', 'Mexicali', 'Baja California', '555-234-5678', 'arturo@example.com', 'SeaArturo32'),
(NULL, 'Silvia', 'Gutiérrez', 'Ramírez', 25, 'Mujer', 'Calle del Jardín', 8765, 45678, 'Colonia Jardín', 'León', 'Guanajuato', '555-678-9012', 'silvia@example.com', 'GardenSilvia25'),
(NULL, 'Adrián', 'Ramírez', 'Gómez', 37, 'Hombre', 'Avenida de la Playa', 5432, 56789, 'Colonia Playa', 'Cuernavaca', 'Morelos', '555-901-2345', 'adrian@example.com', 'BeachAdrian37'),
(NULL, 'Eva', 'Gómez', 'Sánchez', 29, 'Mujer', 'Calle de la Primavera', 7654, 67890, 'Colonia Primavera', 'Pachuca', 'Hidalgo', '555-234-8765', 'eva@example.com', 'SpringEva29'),
(NULL, 'Hugo', 'López', 'Martínez', 33, 'Hombre', 'Paseo del Bosque', 4321, 78901, 'Colonia Bosque', 'Ciudad Juárez', 'Chihuahua', '555-876-5432', 'hugo@example.com', 'ForestHugo33'),
(NULL, 'Mónica', 'Hernández', 'Fernández', 26, 'Mujer', 'Avenida de las Aves', 9876, 89012, 'Colonia Aves', 'Xalapa', 'Veracruz', '555-321-6789', 'monica@example.com', 'BirdMonica26'),
(NULL, 'Alberto', 'Sánchez', 'Ramírez', 30, 'Hombre', 'Calle de los Ríos', 5432, 90123, 'Colonia Ríos', 'San Luis Potosí', 'San Luis Potosí', '555-678-9012', 'alberto@example.com', 'RiverAlberto30'),
(NULL, 'Verónica', 'López', 'Martínez', 28, 'Mujer', 'Paseo del Sol', 8765, 23456, 'Colonia Sol', 'Celaya', 'Guanajuato', '555-901-2345', 'veronica@example.com', 'SunVeronica28'),
(NULL, 'Roberto', 'Fernández', 'Sánchez', 34, 'Hombre', 'Calle del Cielo', 4321, 56789, 'Colonia Cielo', 'Tepic', 'Nayarit', '555-234-8765', 'roberto@example.com', 'SkyRoberto34'),
(NULL, 'Cecilia', 'Ramírez', 'Hernández', 27, 'Mujer', 'Avenida del Viento', 9876, 67890, 'Colonia Viento', 'Matamoros', 'Tamaulipas', '555-876-5432', 'cecilia@example.com', 'WindCecilia27'),
(NULL, 'Luis', 'Hernández', 'Gómez', 31, 'Hombre', 'Avenida de las Palmeras', 1234, 34567, 'Colonia Palmeras', 'Oaxaca', 'Oaxaca', '555-345-6789', 'luis@example.com', 'PalmerLuis31'),
(NULL, 'Rosa', 'Martínez', 'López', 29, 'Mujer', 'Calle de las Mariposas', 5678, 67890, 'Colonia Mariposas', 'Playa del Carmen', 'Quintana Roo', '555-789-0123', 'rosa@example.com', 'ButterflyRosa29'),
(NULL, 'Alejandro', 'Gómez', 'Fernández', 28, 'Hombre', 'Calle de los Girasoles', 4567, 89012, 'Colonia Girasoles', 'Puerto Vallarta', 'Jalisco', '555-234-5678', 'alejandro@example.com', 'SunflowerAlejandro28'),
(NULL, 'Daniela', 'Fernández', 'Sánchez', 24, 'Mujer', 'Avenida de la Esperanza', 6789, 12345, 'Colonia Esperanza', 'Cabo San Lucas', 'Baja California Sur', '555-789-0123', 'daniela@example.com', 'HopeDaniela24'),
(NULL, 'Roberto', 'Sánchez', 'Ramírez', 32, 'Hombre', 'Calle de la Playa', 8901, 23456, 'Colonia Playa', 'Tulum', 'Quintana Roo', '555-012-3456', 'roberto@example.com', 'BeachRoberto32'),
(NULL, 'Laura', 'Martínez', 'Hernández', 26, 'Mujer', 'Paseo de la Esperanza', 5432, 45678, 'Colonia Esperanza', 'Aguascalientes', 'Aguascalientes', '555-456-7890', 'laura@example.com', 'HopeLaura26'),
(NULL, 'Jorge', 'Hernández', 'López', 35, 'Hombre', 'Avenida del Río', 6789, 56789, 'Colonia Río', 'Merida', 'Yucatán', '555-789-0123', 'jorge@example.com', 'RiverJorge35'),
(NULL, 'Marina', 'López', 'Ramírez', 29, 'Mujer', 'Calle de la Luna', 8901, 67890, 'Colonia Luna', 'Monclova', 'Coahuila', '555-012-3456', 'marina@example.com', 'MoonMarina29'),
(NULL, 'Héctor', 'Ramírez', 'Martínez', 33, 'Hombre', 'Paseo de las Estrellas', 2345, 78901, 'Colonia Estrellas', 'Tuxtla Gutiérrez', 'Chiapas', '555-234-5678', 'hector@example.com', 'StarHector33'),
(NULL, 'Isabel', 'Martínez', 'Hernández', 27, 'Mujer', 'Avenida de las Mariposas', 8765, 89012, 'Colonia Mariposas', 'Campeche', 'Campeche', '555-345-6789', 'isabel@example.com', 'ButterflyIsabel27'),
(NULL, 'Ricardo', 'Gutiérrez', 'López', 31, 'Hombre', 'Calle de la Montaña', 4321, 90123, 'Colonia Montaña', 'Chetumal', 'Quintana Roo', '555-789-0123', 'ricardo@example.com', 'MountainRicardo31'),
(NULL, 'Carolina', 'Hernández', 'Sánchez', 25, 'Mujer', 'Paseo de las Palmeras', 9876, 54321, 'Colonia Palmeras', 'Tapachula', 'Chiapas', '555-012-3456', 'carolina@example.com', 'PalmsCarolina25'),
(NULL, 'Gustavo', 'Sánchez', 'Fernández', 36, 'Hombre', 'Avenida del Bosque', 5432, 65432, 'Colonia Bosque', 'Culiacán', 'Sinaloa', '555-234-5678', 'gustavo@example.com', 'ForestGustavo36'),
(NULL, 'Valeria', 'Fernández', 'Gómez', 28, 'Mujer', 'Calle de los Ríos', 8765, 76543, 'Colonia Ríos', 'Reynosa', 'Tamaulipas', '555-345-6789', 'valeria@example.com', 'RiverValeria28'),
(NULL, 'Miguel', 'López', 'Hernández', 30, 'Hombre', 'Paseo de las Flores', 9876, 87654, 'Colonia Flores', 'Ensenada', 'Baja California', '555-012-3456', 'miguel@example.com', 'FlowerMiguel30'),
(NULL, 'Cecilia', 'Ramírez', 'Fernández', 26, 'Mujer', 'Avenida de la Playa', 5432, 98765, 'Colonia Playa', 'Nuevo Laredo', 'Tamaulipas', '555-234-5678', 'cecilia@example.com', 'BeachCecilia26'),
(NULL, 'Javier', 'Martínez', 'López', 34, 'Hombre', 'Calle de la Esperanza', 8765, 10987, 'Colonia Esperanza', 'Tepic', 'Nayarit', '555-345-6789', 'javier@example.com', 'HopeJavier34'),
(NULL, 'Sara', 'Gómez', 'Ramírez', 27, 'Mujer', 'Paseo de la Montaña', 1234, 9876, 'Colonia Montaña', 'Mexicali', 'Baja California', '555-012-3456', 'sara@example.com', 'MountainSara27'),
(NULL, 'Daniel', 'Hernández', 'Fernández', 33, 'Hombre', 'Avenida de las Aves', 5678, 8765, 'Colonia Aves', 'Ciudad Obregón', 'Sonora', '555-234-5678', 'daniel@example.com', 'BirdDaniel33'),
(NULL, 'Mariana', 'Martínez', 'López', 29, 'Mujer', 'Calle de las Palmeras', 9876, 5432, 'Colonia Palmeras', 'Tampico', 'Tamaulipas', '555-345-6789', 'mariana@example.com', 'PalmsMariana29'),
(NULL, 'Alejandro', 'Fernández', 'Ramírez', 35, 'Hombre', 'Paseo de la Luna', 8765, 6789, 'Colonia Luna', 'Playa del Carmen', 'Quintana Roo', '555-012-3456', 'alejandro@example.com', 'MoonAlejandro35'),
(NULL, 'Monica', 'Ramírez', 'Gómez', 28, 'Mujer', 'Avenida de la Estrella', 1234, 8901, 'Colonia Estrella', 'Tijuana', 'Baja California', '555-234-5678', 'monica@example.com', 'StarMonica28'),
(NULL, 'Hugo', 'López', 'Martínez', 32, 'Hombre', 'Calle de la Playa', 5678, 5432, 'Colonia Playa', 'Puerto Vallarta', 'Jalisco', '555-345-6789', 'hugo@example.com', 'BeachHugo32'),
(NULL, 'Rosa', 'Martínez', 'Fernández', 26, 'Mujer', 'Paseo de las Flores', 8765, 6789, 'Colonia Flores', 'Oaxaca', 'Oaxaca', '555-012-3456', 'rosa@example.com', 'FlowerRosa26'),
(NULL, 'Javier', 'Gutiérrez', 'Ramírez', 29, 'Hombre', 'Avenida de la Montaña', 2345, 5432, 'Colonia Montaña', 'Querétaro', 'Querétaro', '555-234-5678', 'javier@example.com', 'MountainJavier29'),
(NULL, 'Lucía', 'Hernández', 'López', 27, 'Mujer', 'Calle de los Pinos', 8765, 6543, 'Colonia Pinos', 'León', 'Guanajuato', '555-345-6789', 'lucia@example.com', 'PineLucia27'),
(NULL, 'Andrés', 'López', 'Ramírez', 33, 'Hombre', 'Paseo del Bosque', 1234, 7654, 'Colonia Bosque', 'Matamoros', 'Tamaulipas', '555-012-3456', 'andres@example.com', 'ForestAndres33'),
(NULL, 'Ana', 'García', 'López', 29, 'Mujer', 'Calle de los Alamos', 5678, 1234, 'Colonia Alamos', 'Ciudad Juárez', 'Chihuahua', '555-123-4567', 'ana@example.com', 'AlamosAna29'),
(NULL, 'Luis', 'Hernández', 'Gómez', 34, 'Hombre', 'Avenida de los Pinos', 8765, 5678, 'Colonia Pinos', 'Guadalajara', 'Jalisco', '555-234-5678', 'luis@example.com', 'PinosLuis34'),
(NULL, 'Karla', 'Ramírez', 'Martínez', 26, 'Mujer', 'Paseo de las Flores', 2345, 6789, 'Colonia Flores', 'Monterrey', 'Nuevo León', '555-345-6789', 'karla@example.com', 'FloresKarla26'),
(NULL, 'Javier', 'Martínez', 'Sánchez', 31, 'Hombre', 'Calle de la Montaña', 7890, 7890, 'Colonia Montaña', 'Cancún', 'Quintana Roo', '555-456-7890', 'javier@example.com', 'MontañaJavier31'),
(NULL, 'Paula', 'Sánchez', 'Ramírez', 28, 'Mujer', 'Avenida del Río', 5432, 8901, 'Colonia Río', 'Toluca', 'Estado de México', '555-567-8901', 'paula@example.com', 'RioPaula28'),
(NULL, 'Eduardo', 'López', 'Fernández', 35, 'Hombre', 'Paseo del Sol', 8765, 9012, 'Colonia Sol', 'Hermosillo', 'Sonora', '555-678-9012', 'eduardo@example.com', 'SolEduardo35'),
(NULL, 'Carmen', 'Ramírez', 'Gómez', 27, 'Mujer', 'Calle de las Mariposas', 2345, 1234, 'Colonia Mariposas', 'Veracruz', 'Veracruz', '555-789-0123', 'carmen@example.com', 'MariposasCarmen27'),
(NULL, 'Héctor', 'Gómez', 'Ramírez', 32, 'Hombre', 'Avenida de las Estrellas', 5678, 5678, 'Colonia Estrellas', 'Tijuana', 'Baja California', '555-890-1234', 'hector@example.com', 'EstrellasHector32'),
(NULL, 'Sofía', 'Martínez', 'López', 29, 'Mujer', 'Paseo de la Luna', 9876, 6789, 'Colonia Luna', 'Culiacán', 'Sinaloa', '555-901-2345', 'sofia@example.com', 'LunaSofia29'),
(NULL, 'Raúl', 'Fernández', 'Hernández', 36, 'Hombre', 'Calle de las Palmeras', 1234, 7890, 'Colonia Palmeras', 'Puebla', 'Puebla', '555-234-5678', 'raul@example.com', 'PalmerasRaul36'),
(NULL, 'Mariana', 'Hernández', 'Ramírez', 28, 'Mujer', 'Avenida del Bosque', 5678, 9012, 'Colonia Bosque', 'Mexicali', 'Baja California', '555-345-6789', 'mariana@example.com', 'BosqueMariana28'),
(NULL, 'José', 'Martínez', 'Fernández', 33, 'Hombre', 'Paseo de las Flores', 9876, 2345, 'Colonia Flores', 'León', 'Guanajuato', '555-456-7890', 'jose@example.com', 'FloresJose33'),
(NULL, 'Laura', 'Fernández', 'López', 25, 'Mujer', 'Calle de los Pinos', 2345, 6789, 'Colonia Pinos', 'Querétaro', 'Querétaro', '555-567-8901', 'laura@example.com', 'PinosLaura25'),
(NULL, 'Martín', 'Ramírez', 'Gómez', 30, 'Hombre', 'Avenida de las Aves', 8765, 1234, 'Colonia Aves', 'Chihuahua', 'Chihuahua', '555-789-0123', 'martin@example.com', 'AvesMartin30'),
(NULL, 'Valeria', 'Gómez', 'Ramírez', 26, 'Mujer', 'Paseo de la Playa', 2345, 5678, 'Colonia Playa', 'Ciudad Juárez', 'Chihuahua', '555-890-1234', 'valeria@example.com', 'PlayaValeria26'),
(NULL, 'Juan', 'López', 'Martínez', 31, 'Hombre', 'Calle de la Montaña', 5678, 9012, 'Colonia Montaña', 'Celaya', 'Guanajuato', '555-901-2345', 'juan@example.com', 'MontañaJuan31'),
(NULL, 'Elena', 'Martínez', 'Fernández', 27, 'Mujer', 'Avenida de la Luna', 8765, 3456, 'Colonia Luna', 'Xalapa', 'Veracruz', '555-012-3456', 'elena@example.com', 'LunaElena27'),
(NULL, 'Antonio', 'Fernández', 'López', 34, 'Hombre', 'Paseo de las Estrellas', 2345, 6789, 'Colonia Estrellas', 'Saltillo', 'Coahuila', '555-234-5678', 'antonio@example.com', 'EstrellasAntonio34'),
(NULL, 'Sara', 'López', 'Gómez', 28, 'Mujer', 'Calle de las Palmeras', 5678, 1234, 'Colonia Palmeras', 'Matamoros', 'Tamaulipas', '555-345-6789', 'sara@example.com', 'PalmerasSara28'),
(NULL, 'David', 'Gómez', 'Martínez', 32, 'Hombre', 'Avenida del Bosque', 9012, 5678, 'Colonia Bosque', 'Acapulco', 'Guerrero', '555-456-7890', 'david@example.com', 'BosqueDavid32'),
(NULL, 'Cecilia', 'Martínez', 'Ramírez', 26, 'Mujer', 'Paseo de las Flores', 3456, 9012, 'Colonia Flores', 'Nuevo Laredo', 'Tamaulipas', '555-567-8901', 'cecilia@example.com', 'FloresCecilia26'),
(NULL, 'Adrián', 'López', 'Hernández', 30, 'Hombre', 'Calle de los Pinos', 9012, 3456, 'Colonia Pinos', 'Ciudad Obregón', 'Sonora', '555-789-0123', 'adrian@example.com', 'PinosAdrian30'),
(NULL, 'Mónica', 'Hernández', 'Fernández', 27, 'Mujer', 'Avenida de la Playa', 5678, 7890, 'Colonia Playa', 'Pachuca', 'Hidalgo', '555-890-1234', 'monica@example.com', 'PlayaMonica27'),
(NULL, 'Hugo', 'Fernández', 'Ramírez', 33, 'Hombre', 'Paseo de la Montaña', 1234, 9012, 'Colonia Montaña', 'Ciudad Victoria', 'Tamaulipas', '555-012-3456', 'hugo@example.com', 'MontañaHugo33'),
(NULL, 'Rocío', 'Ramírez', 'Gómez', 29, 'Mujer', 'Calle de las Estrellas', 7890, 5678, 'Colonia Estrellas', 'Aguascalientes', 'Aguascalientes', '555-234-5678', 'rocio@example.com', 'EstrellasRocio29');

/*Insert de "sales" */
INSERT INTO sales 
 VALUES 
  (NULL, 1, 'Aventura Estelar', '2023-01-01', 'Tienda', 100.50, 'Tarjeta', 12, 1),
  (NULL, 45, 'Sinfonía Nocturna', '2023-01-02', 'Línea', 75.20, 'Efectivo', 6, 0),
  (NULL, 34, 'Ecos del Bosque', '2023-01-03', 'Tienda', 200.75, 'Transferencia', 18, 1),
  (NULL, 11, 'Máscaras y Miradas', '2023-01-04', 'Línea', 150.30, 'PayPal', 24, 0),
  (NULL, 67, 'Amanecer Cálido', '2023-01-05', 'Tienda', 120.00, 'Tarjeta', 10, 1),
  (NULL, 9, 'Reflejos en el Agua', '2023-01-06', 'Línea', 90.80, 'Efectivo', 8, 0),
  (NULL, 23, 'Vuelo de Mariposas', '2023-01-07', 'Tienda', 180.25, 'Transferencia', 12, 1),
  (NULL, 9, 'Caminos Olvidados', '2023-01-08', 'Línea', 220.50, 'PayPal', 24, 0),
  (NULL, 9, 'Sombras del Pasado', '2023-01-09', 'Tienda', 300.75, 'Tarjeta', 15, 1),
  (NULL, 80, 'Melodía Efímera', '2023-01-10', 'Línea', 50.20, 'Efectivo', 6, 0),
  (NULL, 1, 'Luz de Luna', '2023-01-11', 'Tienda', 150.50, 'Transferencia', 18, 1),
  (NULL, 23, 'Enigma Subacuático', '2023-01-12', 'Línea', 80.30, 'PayPal', 24, 0),
  (NULL, 78, 'Sueños Inquebrantables', '2023-01-13', 'Tienda', 120.75, 'Tarjeta', 12, 1),
  (NULL, 56, 'El Umbral Secreto', '2023-01-14', 'Línea', 160.20, 'Efectivo', 6, 0);

/*Insert de "album_sales" */
INSERT INTO album_sales 
  VALUES
(NULL, 1, 10),
(NULL, 3, 2),
(NULL, 5, 12),
(NULL, 7, 10),
(NULL, 9, 12),
(NULL, 11, 2),
(NULL, 13, 4),
(NULL, 2, 8),
(NULL, 4, 7),
(NULL, 6, 5),
(NULL, 8, 3),
(NULL, 10, 1),
(NULL, 12, 9),
(NULL, 12, 9),
(NULL, 14, 1);

/*Insert de "song_sales" */
INSERT INTO song_sales 
  VALUES
(NULL, 1, 1),
(NULL, 3, 5),
(NULL, 5, 9),
(NULL, 7, 13),
(NULL, 9, 17),
(NULL, 11, 21),
(NULL, 13, 25),
(NULL, 2, 3),
(NULL, 4, 7),
(NULL, 6, 11),
(NULL, 8, 15),
(NULL, 10, 19),
(NULL, 12, 23),
(NULL, 14, 27),
(NULL, 13, 29);
