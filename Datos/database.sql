-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 17-08-2012 a las 00:43:05
-- Versión del servidor: 5.0.21
-- Versión de PHP: 5.1.4
-- 
-- Base de datos: `PruebaL`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `persona` (
  `Dni` varchar(10) NOT NULL,
  `Nombre` varchar(50)  NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(50)  NOT NULL,
  `Telefono` varchar(10)  NOT NULL,
  `Estado_civil` varchar(10)  NOT NULL,
  `NombrePais` varchar(50) NOT NULL,
  PRIMARY KEY  (`Dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `pais` (
  `Nombre` varchar(50)  NOT NULL,
  `Poblacion` int(10) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Lenguaje` varchar(50) NOT NULL,
  PRIMARY KEY  (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 


ALTER TABLE `persona` ADD KEY `nombrePais` (`NombrePais`);

ALTER TABLE `persona`
ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`NombrePais`) REFERENCES `pais` (`Nombre`);