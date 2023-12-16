-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2023 a las 01:20:03
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
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `contacto_empresa` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_gastado` int(11) NOT NULL,
  `clave` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompra`, `empresa`, `contacto_empresa`, `direccion`, `producto`, `precio`, `cantidad`, `total_gastado`, `clave`, `fecha_compra`) VALUES
(50, 'Samsung', '525252', 'calle 2', 'Cartuchos Remanufacturados', '7.99', 19, 152, 7, '2023-12-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
