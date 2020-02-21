-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2019 a las 21:22:07
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasa_anto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pas_tra`
--

CREATE TABLE `pas_tra` (
  `ced_tra` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `ide_car` int(8) NOT NULL,
  `nom_tra` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `dir_tra` text COLLATE utf8_spanish2_ci NOT NULL,
  `cor_tra` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_tra` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cla_tra` char(32) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pas_tra`
--

INSERT INTO `pas_tra` (`ced_tra`, `ide_car`, `nom_tra`, `dir_tra`, `cor_tra`, `tel_tra`, `cla_tra`) VALUES
('25982901', 1, 'Julian Paredes', 'popita Carrera 4', NULL, NULL, '2338ce5072a81e14df20756816e8d540');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pas_tra`
--
ALTER TABLE `pas_tra`
  ADD PRIMARY KEY (`ced_tra`),
  ADD KEY `fk_pas_tra_pas_car1_idx` (`ide_car`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pas_tra`
--
ALTER TABLE `pas_tra`
  ADD CONSTRAINT `fk_pas_tra_pas_car1` FOREIGN KEY (`ide_car`) REFERENCES `pas_car` (`ide_car`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
