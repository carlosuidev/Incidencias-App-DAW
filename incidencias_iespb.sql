DROP DATABASE IF EXISTS `incidencias_iespb`;
CREATE DATABASE `incidencias_iespb`;
USE `incidencias_iespb`;

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos`(
    `id_departamento` int AUTO_INCREMENT ON DELETE CASCADE ON UPDATE CASCADE,
    `departamento` VARCHAR(32) NOT NULL,
    CONSTRAINT `PK_departamentos` PRIMARY KEY (`id_departamento`)
);

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores`(
    `id_profesor` int AUTO_INCREMENT ON DELETE CASCADE ON UPDATE CASCADE,
    `usuario` VARCHAR(32) NOT NULL UNIQUE,
    `nombre` VARCHAR(32) NOT NULL,
    `apellidos` VARCHAR(128) NOT NULL,
    `correo` VARCHAR(128) NOT NULL UNIQUE,
    `pass` VARCHAR(15) NOT NULL,
    `id_departamento` INT NOT NULL,
    CONSTRAINT `PK_profesores` PRIMARY KEY (`id_profesor`),
    CONSTRAINT `FK_departamento` FOREIGN KEY (`id_departamento`) REFERENCES departamentos(`id_deparamento`),

);

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE `aulas`(
    `id_aula` int AUTO_INCREMENT ON DELETE CASCADE ON UPDATE CASCADE,
    `aula` VARCHAR(12) NOT NULL,
    CONSTRAINT `PK_aulas` PRIMARY KEY (`id_aula`)
);

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos`(
    `id_grupo` int AUTO_INCREMENT ON DELETE CASCADE ON UPDATE CASCADE,
    `grupo` VARCHAR(32) NOT NULL,
    CONSTRAINT `PK_grupos` PRIMARY KEY (`id_grupo`)
);

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias`(
    `id_incidencia` int NOT NULL AUTO_INCREMENT,
    `id_profesor` int NOT NULL,
    `id_grupo` int NOT NULL,
    `descripcion` VARCHAR(250) NOT NULL,
    `respuesta` VARCHAR(64),
    `estado` VARCHAR(12) NOT NULL,
    `tipo` VARCHAR(24) NOT NULL,
    `fecha` VARCHAR(8) NOT NULL,
    `id_aula` int NOT NULL,
    CONSTRAINT `PK_usuarios` PRIMARY KEY (`id_incidencia`),
    CONSTRAINT `FK_id_profesor` FOREIGN KEY (`id_profesor`) REFERENCES profesores(`id_profesor`),
    CONSTRAINT `FK_id_aula` FOREIGN KEY (`id_aula`) REFERENCES aulas(`id_aula`)
);

INSERT INTO departamentos(`departamento`) VALUES
('Admindistrador de Incidencias'),
('SERVICIOS A LA COMUNIDAD'),
('ADMINISTRACIÓN Y GESTIÓN'),
('COMERCIO Y MARKETING'),
('INFORMÁTICA Y COMUNICACIONES'),
('INGLÉS'),
('FORMACIÓN Y ORIENTACIÓN LABORAL'),
('ORIENTACIÓN'),
('ACE'),
('ACTIVIDADES FÍSICAS Y DEPORTIVAS');


INSERT INTO usuarios(`nombre`, `apellidos`, `correo`, `pass`, `id_departamento`) VALUES
('Carlos', 'Almendros Arellano', 'admin@educa.madrid.org', 'Administrador1', 1),
('Raúl', 'Blázquez Rubio', 'raul@educa.madrid.org', 'Profesor1', 5),
('María Teresa', 'Blázquez Rubio', 'maite@educa.madrid.org', 'Profesor1', 5),
('Laura', 'Blázquez Rubio', 'laura@educa.madrid.org', 'Profesor1', 5),
('Adelaida', 'Blázquez Rubio', 'ade@educa.madrid.org', 'Profesor1', 6),
('Purificación', 'Blázquez Rubio', 'puri@educa.madrid.org', 'Profesor1', 7);

INSERT INTO aulas(`aula`) VALUES
('DESPACHO JEFATURA'),
('DESPACHO DIRECCIÓN'),
('DEPACHO SECRETARÍA'),
('SALA DE PROFESORES'),
('BIBLIOTECA'),
('SECRETARÍA'),
('CONSERJERÍA'),
('SALÓN DE ACTOS'),
('GIMNASIO'),
('SALA EMPRENDIMIENTO'),
('AULA B.1'),
('AULA B.2'),
('AULA B.3'),
('AULA B.4'),
('AULA B.5'),
('AULA B.7'),
('AULA B.9'),
('AULA B.11'),
('AULA B.13'),
('AULA 1.1'),
('AULA 1.2'),
('AULA 1.3'),
('AULA 1.4'),
('AULA 1.5'),
('AULA 1.6'),
('AULA 1.7'),
('AULA 1.8'),
('AULA 1.9'),
('AULA 1.10'),
('AULA 1.11'),
('AULA 1.12'),
('AULA 1.13'),
('AULA 1.14'),
('AULA 1.15'),
('AULA 1.16'),
('AULA 1.17'),
('AULA 1.18'),
('AULA 1.19'),
('AULA 1.20'),
('AULA 1.21'),
('AULA 1.22'),
('AULA 1.23'),
('AULA 2.1'),
('AULA 2.2'),
('AULA 2.3'),
('AULA 2.4'),
('AULA 2.5'),
('AULA 2.6'),
('AULA 2.7'),
('AULA 2.8'),
('AULA 2.9'),
('AULA 2.11'),
('AULA 2.13');

INSERT INTO grupos(`grupo`) VALUES
('1º COMERCIO INTERNACIONAL-DUAL'),
('1º ASIR-DUAL'),
('1º APD'),
('1º AEI'),
('1º FPB AF'),
('1º CI'),
('2º CI-DISTANCIA'),
('1º FPB'),
('2º FPB'),
('1º COM'),
('1º COM V'),
('2º COM'),
('2º COM V'),
('1º AFD A'),
('1º AFD B'),
('2º AFD A'),
('2º AFD B'),
('1º IS A'),
('1º IS V'),
('1º IS B'),
('2º IS V'),
('2º IS A'),
('1º GUIA'),
('2º GUIA'),
('2º EI A'),
('2º EI B'),
('1º JARD'),
('2º JARD'),
('ACEPELU'),
('ACE MBE'),
('1º B EI'),
('1º DAW'),
('1º DAM'),
('2º DAW'),
('2º DAM'),
('1º SMR'),
('2º SMR'),
('1º AF'),
('2º AF'),
('1º ASDI'),
('1º AGM'),
('2º AGM'),
('2º MC A'),
('2º MC B'),
('1º MC A'),
('1º MC B'),
('2º APD'),
('2º IS B');

COMMIT;