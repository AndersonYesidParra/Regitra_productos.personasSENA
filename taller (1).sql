-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2021 a las 05:02:29
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipocedula` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedula` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departamento` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `tipocedula`, `cedula`, `direccion`, `tipo`, `pais`, `departamento`, `municipio`, `correo`, `telefono`, `sexo`) VALUES
(11, '5', '5', 'contraseñaregistro', '5', '5', 'cliente', '5', '5', '5', '5@gmail.com', '5', 'h'),
(15, '111', '1', 'targetaidentidad', '1', '11', 'empleado', '111', '1', '3', '111@gmail.com', '1', 'h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `ubicacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movimiento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(8000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidadMaxima` int(11) DEFAULT NULL,
  `cantidadMinima` int(11) DEFAULT NULL,
  `fechaCompra` datetime DEFAULT NULL,
  `fechaCaducidad` datetime DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `aplicaIva` bit(1) DEFAULT NULL,
  `pais` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `marca`, `fecha`, `cantidad`, `ubicacion`, `movimiento`, `foto`, `descripcion`, `cantidadMaxima`, `cantidadMinima`, `fechaCompra`, `fechaCaducidad`, `precio`, `iva`, `aplicaIva`, `pais`) VALUES
(17, '1asdf', 'cocacola', '2021-05-27 00:00:00', 21, 'CO', 'Ingresado', NULL, ' asdf', 21, 12, '2021-05-27 00:00:00', '2021-05-14 00:00:00', '123.00', 123, b'1', 'CO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `password`, `correo`) VALUES
(18, 'Anderson', 'Florez', '99', 'yesdi@gmail.com'),
(19, 'PRUEBA', 'PRUEBA', '11', 'prueba@gmail.com'),
(20, 'prueba1', 'prueba1', '2020', 'prueba1@gmail.com'),
(21, '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
