DROP DATABASE IF EXISTS `incidencias_iespb`;
CREATE DATABASE `incidencias_iespb`;

USE `incidencias_iespb`;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`(
    `id_usuario` int AUTO_INCREMENT,
    `nombre` VARCHAR(32) NOT NULL,
    `apellidos` VARCHAR(128) NOT NULL,
    `correo` VARCHAR(128) NOT NULL,
    `pass` VARCHAR(15) NOT NULL,
    `tipo` VARCHAR(12) NOT NULL
);

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE `aulas`(
    `id_aula` int AUTO_INCREMENT,
    `planta` VARCHAR(12) NOT NULL,
    `aula` VARCHAR(12) NOT NULL
);

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias`(
    `id_incidencia` int NOT NULL,
    `id_usuario` int NOT NULL,
    `asunto` VARCHAR(64) NOT NULL,
    `descripcion` VARCHAR(250) NOT NULL,
    `respuesta` VARCHAR(64),
    `estado` VARCHAR(12) NOT NULL,
    `imagen` blob,
    `fecha` VARCHAR(8) NOT NULL,
    `id_aula` int AUTO_INCREMENT
);

INSERT INTO usuarios VALUES()