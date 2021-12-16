# freento
Задача на PHP
Вывод данных осуществлен на страницу браузера.
Ссылка на SQL в данный момент перестала работать, как и сам ресурс.
Поэтому прилагаю код скрипта.

CREATE TABLE Player (
  id int PRIMARY KEY,
  name VARCHAR (20) NOT NULL,
  city VARCHAR (20) NULL
);

CREATE TABLE Tournament (
  id int PRIMARY KEY,
  name VARCHAR (20) NOT NULL,
  start_date DATE NULL
);

CREATE TABLE Player_Tournament (
  Tournament_id int (10) NOT NULL,
  Player_id int (10) NOT NULL,
  PRIMARY KEY (Tournament_id, Player_id)
);

INSERT INTO Player (id, name) values (1, 'Player 1');
INSERT INTO Player (id, name) values (2, 'Player 2');
INSERT INTO Player (id, name) values (3, 'Player 3');
INSERT INTO Player (id, name) values (4, 'Player 4');
INSERT INTO Player (id, name) values (5, 'Player 5');

INSERT INTO Tournament (id, name) values (1, 'Tournament A');
INSERT INTO Tournament (id, name) values (2, 'Tournament B');
INSERT INTO Tournament (id, name) values (3, 'Tournament C');

INSERT INTO Player_Tournament (Tournament_id, Player_id) values (1, 1);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (1, 2);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (2, 1);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (2, 2);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (2, 3);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (3, 3);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (3, 4);
INSERT INTO Player_Tournament (Tournament_id, Player_id) values (3, 5);

SELECT 
  Tournament.name,
  Player.name
FROM 
  Player_Tournament
INNER JOIN 
  Tournament
ON 
  Player_Tournament.Tournament_id = Tournament.id
INNER JOIN 
  Player
ON 
  Player_Tournament.Player_id = Player.id
