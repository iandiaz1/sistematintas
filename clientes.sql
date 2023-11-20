-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 21:38:05
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `costo_revision` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_recibo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_user`, `nombre`, `email`, `telefono`, `direccion`, `marca`, `modelo`, `color`, `descripcion`, `costo_revision`, `estado`, `fecha_recibo`) VALUES
(35, 128, 'ian', 'ian@gmail.com', '11111', 'calle 123', 'Impresora Samsung', '2012', 'azul', 'cable roto', '44', 'Cancelado', '2023-11-16'),
(37, 128, 'juan perez', 'juan@gmail.com', '1123131', 'calle 123', 'Impresora Samsung', '2010', 'verde', 'repuesto de tinta', '77', 'Arreglado', '2023-11-16'),
(40, 137, 'juan', 'juan@hotmail.com', '2313414', 'calle 22', 'Impresora LG', '2019', 'azul', 'Cable roto', '66', 'Arreglado', '2023-11-16'),
(41, 138, 'pedro', 'pedro@gmail.com', '2331414', 'calle 22', 'Impresora Samsung', '2010', 'azul', 'Repuesto de Tinta', '79', 'Arreglado', '2023-11-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
