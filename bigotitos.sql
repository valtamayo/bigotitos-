-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2025 a las 17:16:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bigotitos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bigotes`
--

CREATE TABLE `bigotes` (
  `id_mascota` int(11) NOT NULL,
  `nombre_mascota` varchar(100) NOT NULL,
  `tipo_animal` text NOT NULL,
  `raza` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `nombre_dueno` varchar(100) NOT NULL,
  `telefono_dueno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bigotes`
--

INSERT INTO `bigotes` (`id_mascota`, `nombre_mascota`, `tipo_animal`, `raza`, `edad`, `nombre_dueno`, `telefono_dueno`) VALUES
(123, 'kira', 'Perro', 'doberman', 10, 'valentina', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bigotes`
--
ALTER TABLE `bigotes`
  ADD PRIMARY KEY (`id_mascota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
