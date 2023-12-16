-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2023 a las 01:20:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematintas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `idreparacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `reparacion` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `clave` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_reparacion` date NOT NULL,
  `costo_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`idreparacion`, `id_cliente`, `id_empleado`, `nombre`, `direccion`, `telefono`, `reparacion`, `estado`, `producto`, `clave`, `cantidad`, `fecha_reparacion`, `costo_final`) VALUES
(57, 44, 128, 'juan', 'calle 1', 242442, 'equipo arreglado', 'Arreglado', 'Kit Recarga', 7, 4, '2023-12-15', 99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`idreparacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `idreparacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
