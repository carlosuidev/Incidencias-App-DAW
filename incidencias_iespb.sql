DROP DATABASE IF EXISTS `incidencias_iespb`;
CREATE DATABASE `incidencias_iespb`;
USE `incidencias_iespb`;


DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos`(
    `id_departamento` int AUTO_INCREMENT,
    `departamento` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id_departamento`)
);
INSERT INTO `departamentos`(`departamento`) VALUES
('Administrador de Incidencias'),
('SERVICIOS A LA COMUNIDAD'),
('ADMINISTRACIÓN Y GESTIÓN'),
('COMERCIO Y MARKETING'),
('INFORMÁTICA Y COMUNICACIONES'),
('INGLÉS'),
('FORMACIÓN Y ORIENTACIÓN LABORAL'),
('ORIENTACIÓN'),
('ACE'),
('ACTIVIDADES FÍSICAS Y DEPORTIVAS');


DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores`(
    `id_profesor` INT AUTO_INCREMENT,
    `usuario` VARCHAR(32) NOT NULL UNIQUE,
    `nombre` VARCHAR(32) NOT NULL,
    `apellidos` VARCHAR(128) NOT NULL,
    `correo` VARCHAR(128) NOT NULL UNIQUE,
    `pass` VARCHAR(15) NOT NULL,
    `id_departamento` INT NOT NULL,
    PRIMARY KEY (`id_profesor`),
    FOREIGN KEY (`id_departamento`) REFERENCES `departamentos`(`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE
);
INSERT INTO `profesores`(`usuario`, `nombre`, `apellidos`, `correo`, `pass`, `id_departamento`) VALUES
('CTIC', 'CTIC', 'Administrador', 'admin@educa.madrid.org', 'CTICPio2023', 1),
('raulprofe', 'Raúl', 'Blázquez Rubio', 'raul@educa.madrid.org', 'Profesor1', 5),
('maiteprofe', 'María Teresa', 'Blázquez Rubio', 'maite@educa.madrid.org', 'Profesor1', 5),
('juanprofe', 'Juan', 'Martínez Val', 'juan@educa.madrid.org', 'Profesor1', 3),
('javierprofe', 'Javier', 'Sánchez Bosch', 'javier@educa.madrid.org', 'Profesor1', 8);


DROP TABLE IF EXISTS `aulas`;
CREATE TABLE `aulas`(
    `id_aula` INT AUTO_INCREMENT,
    `aula` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id_aula`)
);
INSERT INTO `aulas`(`aula`) VALUES ('DESPACHO JEFATURA'), ('DESPACHO DIRECCIÓN'), ('DEPACHO SECRETARÍA'), ('SALA DE PROFESORES'), ('BIBLIOTECA'), ('SECRETARÍA'), ('CONSERJERÍA'), ('SALÓN DE ACTOS'), ('GIMNASIO'), ('SALA EMPRENDIMIENTO'), ('AULA B.1'), ('AULA B.2'), ('AULA B.3'), ('AULA B.4'), ('AULA B.5'), ('AULA B.7'), ('AULA B.9'), ('AULA B.11'), ('AULA B.13'), ('AULA 1.1'), ('AULA 1.2'), ('AULA 1.3'), ('AULA 1.4'), ('AULA 1.5'), ('AULA 1.6'), ('AULA 1.7'), ('AULA 1.8'), ('AULA 1.9'), ('AULA 1.10'), ('AULA 1.11'), ('AULA 1.12'), ('AULA 1.13'), ('AULA 1.14'), ('AULA 1.15'), ('AULA 1.16'), ('AULA 1.17'), ('AULA 1.18'), ('AULA 1.19'), ('AULA 1.20'), ('AULA 1.21'), ('AULA 1.22'), ('AULA 1.23'), ('AULA 2.1'), ('AULA 2.2'), ('AULA 2.3'), ('AULA 2.4'), ('AULA 2.5'), ('AULA 2.6'), ('AULA 2.7'), ('AULA 2.8'), ('AULA 2.9'), ('AULA 2.11'), ('AULA 2.13'), ('(OTROS)');


DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos`(
    `id_grupo` INT AUTO_INCREMENT,
    `grupo` VARCHAR(42) NOT NULL,
    PRIMARY KEY (`id_grupo`)
);
INSERT INTO `grupos`(`grupo`) VALUES ('1º COMERCIO INTERNACIONAL-DUAL'),('1º ASIR-DUAL'),('1º APD'),('1º AEI'),('1º FPB AF'),('1º CI'),('2º CI-DISTANCIA'),('1º FPB'),('2º FPB'),('1º COM'),('1º COM V'),('2º COM'),('2º COM V'),('1º AFD A'),('1º AFD B'),('2º AFD A'),('2º AFD B'),('1º IS A'),('1º IS V'),('1º IS B'),('2º IS V'),('2º IS A'),('1º GUIA'),('2º GUIA'),('2º EI A'),('2º EI B'),('1º JARD'),('2º JARD'),('ACEPELU'),('ACE MBE'),('1º B EI'),('1º DAW'),('1º DAM'),('2º DAW'),('2º DAM'),('1º SMR'),('2º SMR'),('1º AF'),('2º AF'),('1º ASDI'),('1º AGM'),('2º AGM'),('2º MC A'),('2º MC B'),('1º MC A'),('1º MC B'),('2º APD'),('2º IS B'), ('(OTROS)');


DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos`(
    `id_tipo` INT AUTO_INCREMENT,
    `tipo` VARCHAR(42) NOT NULL,
    PRIMARY KEY (`id_tipo`)
);
INSERT INTO `tipos`(`tipo`) VALUES('Hardware'),('Software'),('Conectividad'),('Recursos EducaMadrid'),('PDI'),('Impresión');


DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias`(
    `id_incidencia` int NOT NULL AUTO_INCREMENT,
    `id_profesor` int NOT NULL,
    `id_grupo` int NOT NULL,
    `asunto` VARCHAR(64),
    `descripcion` VARCHAR(550) NOT NULL,
    `respuesta` VARCHAR(550),
    `estado` VARCHAR(12) NOT NULL,
    `id_tipo` INT NOT NULL,
    `fecha` VARCHAR(10) NOT NULL,
    `id_aula` int NOT NULL,
    PRIMARY KEY (`id_incidencia`),
    FOREIGN KEY (`id_profesor`) REFERENCES `profesores`(`id_profesor`),
    FOREIGN KEY (`id_aula`) REFERENCES `aulas`(`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_grupo`) REFERENCES `grupos`(`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_tipo`) REFERENCES `tipos`(`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
);
INSERT INTO `incidencias`(`id_profesor`, `id_grupo`, `asunto`, `descripcion`, `respuesta`, `estado`, `id_tipo`, `fecha`, `id_aula`)VALUES
(2, 2, 'No funciona el proyector', 'El proyecto de este aula se queda en negro al encenderlo y no puedo conectarlo con el ordenador.', 'Debes presionar el botón de encendido, durante 5 segundos del mando.', 'TERMINADA', 1,'10/10/2022', 8),
(2, 5, 'La impresora no tiene cable para conectarse', 'No hay un cable para la impresora que vaya a la luz.','Debes presionar el botón de encendido, durante 5 segundos el mando.', 'TERMINADA', 3,'20/12/2022', 3),
(2, 1, 'No puedo acceder a educamadrid', 'Cuando intento entrar a educamadrid no reconoce mis creendenciales.','', 'EN PROCESO', 4,'20/12/2022', 1);
