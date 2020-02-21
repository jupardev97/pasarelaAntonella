-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2019 a las 21:22:18
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
-- Estructura de tabla para la tabla `pas_car`
--

CREATE TABLE `pas_car` (
  `ide_car` int(8) NOT NULL,
  `tip_car` enum('administrador','vendedor(a)') COLLATE utf8_spanish2_ci NOT NULL,
  `hor_tra` int(2) DEFAULT NULL,
  `pag_hor` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pas_car`
--

INSERT INTO `pas_car` (`ide_car`, `tip_car`, `hor_tra`, `pag_hor`) VALUES
(1, 'administrador', NULL, NULL),
(2, 'vendedor(a)', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pas_car`
--
ALTER TABLE `pas_car`
  ADD PRIMARY KEY (`ide_car`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pas_car`
--
ALTER TABLE `pas_car`
  MODIFY `ide_car` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
