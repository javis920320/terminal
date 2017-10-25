-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2016 a las 03:11:36
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `terminal_pasto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_infractor`
--

CREATE TABLE IF NOT EXISTS `datos_infractor` (
  `nombre` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cedula` int(50) NOT NULL,
  `empresa` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `No_interno` int(10) NOT NULL,
  `orden_infraccion` int(20) NOT NULL,
  `fecha_infra` date NOT NULL,
  `cod_auxiliar` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nombre_fun` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `datos_infractor`
--

INSERT INTO `datos_infractor` (`nombre`, `cedula`, `empresa`, `cargo`, `placa`, `No_interno`, `orden_infraccion`, `fecha_infra`, `cod_auxiliar`, `nombre_fun`, `estado`) VALUES
('javier lopez', 185298221, 'coperativa  americana', 'conductor', 'pla4545', 223, 21221, '2016-02-11', 't6', 'jose sanchez', 'pendiente'),
('juan perez', 2147483647, 'trasipiales', 'conductor', 'asd4561', 10001, 12, '2016-01-12', 't5', 'carlitos  el  sapito', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `nombre_user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_user` int(50) NOT NULL,
  `password` int(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
