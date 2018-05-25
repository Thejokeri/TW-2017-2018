-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2018 a las 19:14:01
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ftm19971718`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `discografica` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `formato` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`nombre`, `fecha`, `discografica`, `formato`, `precio`, `imagen`) VALUES
('Alive 1997', '2001-10-01', 'Virgin Records', 'CD, LP', '25,00€', ''),
('Alive 2007', '2007-11-19', 'Virgin Records', 'CD', '29,50€', ''),
('Daft Club', '2003-12-01', 'Virgin', 'CD, LP', '19,50€', ''),
('Discovery', '2001-03-03', 'Virgin', 'CD, CS, LP', '19,50€', ''),
('Homework', '1997-01-20', 'Virgin', 'CD, disco de vinilo, digital', '19,50€', ''),
('Human After All', '2005-03-14', 'Virgin', 'CD, 2LP', '19,50€', ''),
('Human After All Remixes', '2006-03-29', 'Toshiba-EMI', 'CD', '9,95€', ''),
('Musique Vol.1 1993-1995', '2006-03-29', 'Virgin Records', 'CD, DVD', '9,50€', ''),
('Random Access Memories', '2013-05-21', 'Columbia Records', 'CD, LP, descarga digital', '29,50€', ''),
('Tron: Legacy', '2010-12-06', 'Walt Disney Records', 'CD, Digital, disco de vinilo', '19,50€', ''),
('Tron: Legacy Reconfigured', '2011-04-05', 'Walt Disney Records', 'CD', '19,50€', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`nombre`,`fecha`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
