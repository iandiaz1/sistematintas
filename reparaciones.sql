-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 21:37:47
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
  `fecha_reparacion` date NOT NULL,
  `costo_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`idreparacion`, `id_cliente`, `id_empleado`, `nombre`, `direccion`, `telefono`, `reparacion`, `estado`, `producto`, `fecha_reparacion`, `costo_final`) VALUES
(27, 35, 128, 'ian', 'calle 123', 11111, 'Impresora arreglada', 'Arreglado', 'Cartuchos Remanufacturados', '2023-11-16', 99),
(28, 37, 128, 'juan perez', 'calle 123', 1123131, 'reparado', 'Arreglado', 'Cartuchos Remanufacturados', '2023-11-16', 100),
(29, 35, 128, 'ian', 'calle 123', 11111, 'arreglado', 'Cancelado', 'Cartuchos Remanufacturados', '2023-11-16', 44),
(31, 37, 128, 'juan perez', 'calle 123', 1123131, 'arreglado', 'Arreglado', 'Kit Recarga', '2023-11-16', 77),
(32, 41, 138, 'pedro', 'calle 22', 2331414, 'Repuestos Agregados', 'Arreglado', 'Kit Recarga', '2023-11-16', 110),
(33, 40, 139, 'juan', 'calle 22', 2313414, 'Solucionado', 'Arreglado', 'Kit Recarga', '2023-11-16', 200),
(34, 40, 139, 'juan', 'calle 22', 2313414, 'Solucionado', 'Arreglado', 'Kit Recarga', '2023-11-16', 200);

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
  MODIFY `idreparacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
