
CREATE TABLE USUARIOS (
  id_usuario INT AUTO_INCREMENT,
  nickname varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  password varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  email varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  nombre varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  apellidos varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE TEMAS(
  id_tema INT AUTO_INCREMENT,
  titulo varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  texto varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  fecha date NOT NULL,
  etiqueta varchar(25) COLLATE utf8_spanish_ci,
  id_usuario INT NOT NULL,
  PRIMARY KEY (id_tema),
  FOREIGN KEY (id_usuario)
        REFERENCES USUARIOS(id_usuario)
        ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE RESPUESTAS (
  id_respuesta INT AUTO_INCREMENT,
  texto varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  fecha date NOT NULL,
  id_usuario INT NOT NULL,
  id_tema INT NOT NULL,
  PRIMARY KEY (id_respuesta),
  FOREIGN KEY (id_usuario)
        REFERENCES USUARIOS(id_usuario)
        ON DELETE CASCADE,
  FOREIGN KEY (id_tema)
        REFERENCES TEMAS(id_tema)
        ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE TEMAS ADD id_respuesta_elegida INT;
ALTER TABLE TEMAS ADD CONSTRAINT FOREIGN KEY (id_respuesta_elegida) REFERENCES RESPUESTAS(id_respuesta);

CREATE TABLE VALORACIONES (
  id_valoracion INT AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  id_tema INT,
  id_respuesta INT,
  PRIMARY KEY (id_valoracion),
  FOREIGN KEY (id_usuario)
        REFERENCES USUARIOS(id_usuario)
        ON DELETE CASCADE,
  FOREIGN KEY (id_tema)
        REFERENCES TEMAS(id_tema)
        ON DELETE CASCADE,
  FOREIGN KEY (id_respuesta)
        REFERENCES RESPUESTAS(id_respuesta)
        ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE ARCHIVOSADJUNTOS (
  id_archivo INT AUTO_INCREMENT,
  nombre VARCHAR(100),
  src VARCHAR(100),
  id_tema INT,
  id_respuesta INT,
  PRIMARY KEY (id_archivo),
  FOREIGN KEY (id_tema)
        REFERENCES TEMAS(id_tema)
        ON DELETE CASCADE,
  FOREIGN KEY (id_respuesta)
        REFERENCES RESPUESTAS(id_tema)
        ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
