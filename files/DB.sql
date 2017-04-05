CREATE TABLE profesor (
	cedula           NUMBER PRIMARY KEY,
	nombre           VARCHAR(20)  NOT NULL,
	fecha_nacimiento            DATE NOT NULL,
    lugar_nacimiento VARCHAR(20) NOT NULL,
    titulo VARCHAR(20) NOT NULL,
    departamento VARCHAR(20) NOT NULL
) ENGINE = InnoDB;


