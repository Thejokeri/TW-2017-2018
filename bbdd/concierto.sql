-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2018 a las 11:31:21
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
-- Estructura de tabla para la tabla `concierto`
--

CREATE TABLE `concierto` (
  `fecha` date NOT NULL,
  `pais` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `textodescriptivo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `concierto`
--

INSERT INTO `concierto` (`fecha`, `pais`, `ciudad`, `lugar`, `nombre`, `textodescriptivo`) VALUES
('1997-01-17', 'Reino Unido', 'Manchester', 'The Academy', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-18', 'Reino Unido', 'Hanley, Stoke on Trent', 'The Stage Door', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-20', 'Reino Unido', 'Brighton', 'The Escape', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-22', 'Reino Unido', 'London', 'The End', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-24', 'Reino Unido', 'Glasgow', 'The Arches Theatre (Slam Event)', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-25', 'Reino Unido', 'Leeds', 'Showbox', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-14','España','Barcelona','Zeleste','Daftendirektour','Texto descriptivo'),
('2006-06-30', 'Francia', 'Belfort', 'Eurockéennes Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-07-14', 'España', 'Barcelona', 'Summercase Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-11-04', 'Argentina', 'Buenos Aires', 'Bue Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-30', 'Alemania', 'Berlín', 'Velodrom', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-04', 'Holanda', 'Amsterdam', 'Heineken Music Hall', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-27', 'Estados Unidos', 'Berkeley, CA', 'Greek Theatre', 'Alive 2006/2007', 'Texto descriptivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`fecha`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
