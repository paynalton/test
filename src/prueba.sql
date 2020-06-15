-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2020 a las 23:53:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_xml`
--

CREATE TABLE `archivos_xml` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla maestro de archivos xml';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_xml`
--

CREATE TABLE `contenidos_xml` (
  `id` int(11) NOT NULL,
  `id_archivo` int(5) NOT NULL,
  `de` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `para` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `encabezado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla maestro de contenidos xml';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos_xml`
--
ALTER TABLE `archivos_xml`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenidos_xml`
--
ALTER TABLE `contenidos_xml`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_id_archivo` (`id_archivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos_xml`
--
ALTER TABLE `archivos_xml`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenidos_xml`
--
ALTER TABLE `contenidos_xml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenidos_xml`
--
ALTER TABLE `contenidos_xml`
  ADD CONSTRAINT `fk1_id_archivo` FOREIGN KEY (`id_archivo`) REFERENCES `archivos_xml` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
