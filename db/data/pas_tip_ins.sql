-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2019 a las 21:21:44
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
-- Estructura de tabla para la tabla `pas_tip_ins`
--

CREATE TABLE `pas_tip_ins` (
  `ide_tip` int(8) NOT NULL,
  `tip_ins` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `est_tip` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pas_tip_ins`
--

INSERT INTO `pas_tip_ins` (`ide_tip`, `tip_ins`, `est_tip`) VALUES
(1, 'Cierre', 1),
(2, 'botones', 1),
(3, 'broches', 1),
(4, 'varillas', 1),
(5, 'bordados', 1),
(6, 'lentejuelas', 1),
(7, 'agujas', 1),
(8, 'hebillas', 1),
(9, 'cintas', 1),
(10, 'apliques', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pas_tip_ins`
--
ALTER TABLE `pas_tip_ins`
  ADD PRIMARY KEY (`ide_tip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pas_tip_ins`
--
ALTER TABLE `pas_tip_ins`
  MODIFY `ide_tip` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
