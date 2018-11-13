INSERT INTO USUARIOS (nickname,password,email,nombre,apellidos) VALUES ("Mikel","123","mikel@gmail.com","Mikel","Ferreiro Guridi");
INSERT INTO USUARIOS (nickname,password,email,nombre,apellidos) VALUES ("Dani","123","dani@gmail.com","Danieh","Barra");
INSERT INTO USUARIOS (nickname,password,email,nombre,apellidos) VALUES ("Alex","123","alex@gmail.com","Aleee","Ruiz");

INSERT INTO TEMAS(titulo, texto, fecha, id_usuario) VALUES ("Titular titulastico",
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          "2018-11-12",
          1);
INSERT INTO TEMAS(titulo, texto, fecha, id_usuario) VALUES ("Titular titulastroso",
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          "2018-11-12",
          2);
INSERT INTO TEMAS(titulo, texto, fecha, id_usuario) VALUES ("Titular titulante",
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          "2018-11-10",
          3);


INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("La respuesta es: ¡El fantastico Ralph!","2018-11-12",2,1);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("EsTe Tema es trambolico","2018-11-12",3,1);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("PRIMERO! XD","2018-11-12",1,1);

INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("La respuesta es: ¡El increible Hulk!","2018-11-12",2,2);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("EsTe Tema es supercalifragilisticoespialidos","2018-11-12",3,2);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("SEGUNDO! XD","2018-11-12",1,2);

INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("La respuesta esta en tu interior","2018-11-12",2,3);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("2 LOREM IPSUM sit Amehn","2018-11-12",3,3);
INSERT INTO RESPUESTAS( texto, fecha, id_usuario, id_tema) VALUES ("TERCERO! XD","2018-11-12",1,3);


INSERT INTO VALORACIONES(id_usuario,id_tema) VALUES (1,1);
INSERT INTO VALORACIONES(id_usuario,id_tema) VALUES (2,1);
INSERT INTO VALORACIONES(id_usuario,id_tema) VALUES (3,1);

INSERT INTO VALORACIONES(id_usuario,id_tema) VALUES (1,3);
INSERT INTO VALORACIONES(id_usuario,id_tema) VALUES (2,3);