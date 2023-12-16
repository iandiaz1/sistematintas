-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2023 a las 01:20:34
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
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `fecha_venta` date NOT NULL,
  `comprobante` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `clave` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `subtotal` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `codigo`, `cliente`, `fecha_venta`, `comprobante`, `numero`, `producto`, `clave`, `cantidad`, `precio_compra`, `precio_venta`, `fecha_vencimiento`, `subtotal`, `descuento`, `total`) VALUES
(36, 428924, 'juan', '2023-12-15', 'FACTURA', 2444224, 'Kit Recarga', 7, 43, 533, 342, '2023-12-15', 14706, 50, 7353),
(39, 5353, 'juan', '2023-12-15', 'FACTURA', 422323, 'Cartuchos Remanufacturados', 7, 4, 24, 65, '2023-12-15', 260, 50, 130);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
