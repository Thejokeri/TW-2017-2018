-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2018 a las 12:57:48
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
-- Estructura de tabla para la tabla `canciones_album`
--

CREATE TABLE `canciones` (
  `posicion` int(2) NOT NULL,
  `nombre` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_album` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canciones_album`
--

INSERT INTO `canciones` (`posicion`, `nombre`, `nombre_album`, `duracion`) VALUES
(1, '«Daftendirekt»', 'Homework','2:44'),
(1, '«Derezzed»', 'Tron: Legacy Reconfigured','4:22'),
(1, '«Give Life Back to Music»', 'Random Access Memories','4:34'),
(1, '«Human After All»', 'Human After All','5:19'),
(1, '«Musique» (Lado B de Da Funk, 1995)', 'Musique Vol.1 1993-1995','6:53'),
(1, '«One More Time»', 'Discovery', '5:20'),
(1, '«Ouverture»', 'Daft Club', '2:40'),
(1, '«Overture»', 'Tron: Legacy', '2:28'),
(1, '«Robot Rock / Oh Yeah»', 'Alive 2007', '6:27'),
(1, '«Robot Rock» (Soulwax Remix)', 'Human After All Remixes', '6:31'),
(1, 'Alive 1997', 'Alive 1997', '45:33'),
(2, '«Aerodynamic»', 'Discovery', '3:27'),
(2, '«Aerodynamic» (Daft Punk Remix)', 'Daft Club', '6:10'),
(2, '«Da Funk» (de Homework, 1996)', 'Musique Vol.1 1993-1995', '5:28'),
(2, '«Fall»', 'Tron: Legacy Reconfigured', '3:55'),
(2, '«Human After All» (SebastiAn Remix)', 'Human After All Remixes', '4:48'),
(2, '«The Game of Love»', 'Random Access Memories', '5:21'),
(2, '«The Grid»', 'Tron: Legacy', '1:37'),
(2, '«The Prime Time of Your Life»', 'Human After All', '4:23'),
(2, '«Touch It / Technologic» («Touch It», de Busta Rhymes)', 'Alive 2007', '5:29'),
(2, '«WDPK 83.7 FM»', 'Homework', '0:28'),
(3, '«Around the World» (Edición Radio, de Homework, 1996)', 'Musique Vol.1 1993-1995', '3:59'),
(3, '«Digital Love»', 'Discovery', '4:58'),
(3, '«Giorgio by Moroder»', 'Random Access Memories', '9:04'),
(3, '«Harder, Better, Faster, Stronger» (The Neptunes Remix)', 'Daft Club', '5:11'),
(3, '«Revolution 909»', 'Homework', '5:26'),
(3, '«Robot Rock»', 'Human After All', '4:47'),
(3, '«Technologic» (Peaches No Logic Remix)', 'Human After All Remixes', '4:38'),
(3, '«Television Rules The Nation / Crescendolls»', 'Alive 2007', '4:50'),
(3, '«The Grid»', 'Tron: Legacy Reconfigured', '4:27'),
(3, '«The Son of Flynn»', 'Tron: Legacy', '1:35'),
(4, '«Adagio for Tron»', 'Tron: Legacy Reconfigured', '5:34'),
(4, '«Brainwasher» (Erol Alkan\'s Horrorhouse dub)', 'Human After All Remixes', '6:05'),
(4, '«Da Funk»', 'Homework', '5:28'),
(4, '«Face to Face» (Cosmo Vitelli Remix)', 'Daft Club', '4:55'),
(4, '«Harder, Better, Faster, Stronger»', 'Discovery', '3:45'),
(4, '«Recognizer»', 'Tron: Legacy', '2:38'),
(4, '«Revolution 909» (de Homework, 1996)', 'Musique Vol.1 1993-1995', '5:27'),
(4, '«Steam Machine»', 'Human After All', '5:22'),
(4, '«Too Long / Steam Machine»', 'Alive 2007', '7:01'),
(4, '«Within»', 'Random Access Memories', '3:48'),
(5, '«Alive» (de Homework, 1996)', 'Musique Vol.1 1993-1995', '5:15'),
(5, '«Armory»', 'Tron: Legacy', '2:03'),
(5, '«Around the World / Harder, Better, Faster, Stronger»', 'Alive 2007', '5:42'),
(5, '«Crescendolls»', 'Discovery', '3:31'),
(5, '«Instant Crush»', 'Random Access Memories', '5:37'),
(5, '«Make Love»', 'Human After All', '4:48'),
(5, '«Phoenix»', 'Homework', '4:55'),
(5, '«Phoenix» (Basement Jaxx Remix)', 'Daft Club', '7:53'),
(5, '«Prime Time of Your Life» (Para One Remix)', 'Human After All Remixes', '3:52'),
(5, '«The Son of Flynn»', 'Tron: Legacy Reconfigured', '4:35'),
(6, '«Arena»', 'Tron: Legacy', '1:33'),
(6, '«Burnin\' / Too Long»', 'Alive 2007', '7:12'),
(6, '«C.L.U.»', 'Tron: Legacy Reconfigured', '4:51'),
(6, '«Digital Love» (Boris Dlugosch2​ Remix)', 'Daft Club', '7:30'),
(6, '«Fresh»', 'Homework', '4:03'),
(6, '«Human After All» («Guy-Man After All» Justice Remix)', 'Human After All Remixes', '4:01'),
(6, '«Lose Yourself to Dance»', 'Random Access Memories', '5:53'),
(6, '«Nightvision»', 'Discovery', '1:44'),
(6, '«Rollin\' & Scratchin\'» (de Homework, 1996)', 'Musique Vol.1 1993-1995', '7:28'),
(6, '«The Brainwasher»', 'Human After All', '4:08'),
(7, '«Around the World»', 'Homework', '7:07'),
(7, '«Face to Face / Short Circuit»', 'Alive 2007', '4:56'),
(7, '«Harder, Better, Faster, Stronger» (Jess & Crabbe Remix)', 'Daft Club', '6:01'),
(7, '«On/Off»', 'Human After All', '0:19'),
(7, '«One More Time» (Edición Short Radio, de Discovery, 2001)', 'Musique Vol.1 1993-1995', '3:56'),
(7, '«Rinzler»', 'Tron: Legacy', '2:18'),
(7, '«Superheroes»', 'Discovery', '3:57'),
(7, '«Technologic» (Digitalism\'s Highway to Paris Remix)', 'Human After All Remixes', '6:01'),
(7, '«The Son of Flynn»', 'Tron: Legacy Reconfigured', '6:32'),
(7, '«Touch»', 'Random Access Memories', '8:18'),
(8, '«End of Line»', 'Tron: Legacy Reconfigured', '5:40'),
(8, '«Face to Face» (Demon Remix)', 'Daft Club', '6:59'),
(8, '«Get Lucky»', 'Random Access Memories', '6:08'),
(8, '«Harder, Better, Faster, Stronger» (de Discovery, 2001)', 'Musique Vol.1 1993-1995', '3:45'),
(8, '«High Life»', 'Discovery', '3:22'),
(8, '«Human After All» (Alter Ego Remix)', 'Human After All Remixes', '9:26'),
(8, '«One More Time / Aerodynamic»', 'Alive 2007', '6:10'),
(8, '«Rollin\' & Scratchin\'»', 'Homework', '7:26'),
(8, '«Television Rules the Nation»', 'Human After All', '4:47'),
(8, '«The Game Has Changed»', 'Tron: Legacy', '3:25'),
(9, '«Aerodynamic Beats / Forget About the World»', 'Alive 2007', '3:31'),
(9, '«Beyond»', 'Random Access Memories', '4:50'),
(9, '«Crescendolls» (Laidback Luke Remix)', 'Daft Club', '5:25'),
(9, '«Outlands»', 'Tron: Legacy', '2:42'),
(9, '«Rinzler»', 'Tron: Legacy Reconfigured', '6:52'),
(9, '«Something About Us»', 'Discovery', '3:51'),
(9, '«Something About Us» (de Discovery, 2001)', 'Musique Vol.1 1993-1995', '3:51'),
(9, '«Teachers»', 'Homework', '2:52'),
(9, '«Technologic»', 'Human After All', '4:44'),
(9, '«Technologic» (Vitalic Remix)', 'Human After All Remixes', '5:27'),
(10, '«Adagio for Tron»', 'Tron: Legacy', '4:11'),
(10, '«Aerodynamic» (Slum Village Remix)', 'Daft Club', '3:37'),
(10, '«Emotion»', 'Human After All', '6:57'),
(10, '«ENCOM, Part II»', 'Tron: Legacy Reconfigured', '4:52'),
(10, '«High Fidelity»', 'Homework', '6:00'),
(10, '«Motherboard»', 'Random Access Memories', '5:41'),
(10, '«Prime Time of Your Life/Brainwasher/Rollin\' & Scratchin\'/Alive»', 'Alive 2007', '10:22'),
(10, '«Robot Rock» (Daft Punk Maximum Overdrive mix)', 'Human After All Remixes', '5:54'),
(10, '«Robot Rock» (de Human After All, 2005)', 'Musique Vol.1 1993-1995', '4:47'),
(10, '«Voyager»', 'Discovery', '3:47'),
(11, '«Da Funk / Daftendirekt»', 'Alive 2007', '6:37'),
(11, '«End of Line»', 'Tron: Legacy Reconfigured', '5:18'),
(11, '«Fragments of Time»', 'Random Access Memories', '4:39'),
(11, '«Nocturne»', 'Tron: Legacy', '1:42'),
(11, '«Rock\'n Roll»', 'Homework', '7:32'),
(11, '«Technologic» (Edición Radio, de Human After All, 2005)', 'Musique Vol.1 1993-1995', '2:46'),
(11, '«Too Long» (Gonzales Version)', 'Daft Club', '3:13'),
(11, '«Veridis Quo»', 'Discovery', '5:44'),
(12, '«Aerodynamite»', 'Daft Club', '7:48'),
(12, '«Arena»', 'Tron: Legacy Reconfigured', '6:07'),
(12, '«Doin\' It Right»', 'Random Access Memories', '4:11'),
(12, '«End of Line»', 'Tron: Legacy', '2:36'),
(12, '«Human After All» (de Human After All, 2005)', 'Musique Vol.1 1993-1995', '5:19'),
(12, '«Oh Yeah»', 'Homework', '2:00'),
(12, '«Short Circuit»', 'Discovery', '3:26'),
(12, '«Superheroes / Human After All / Rock\'n Roll»', 'Alive 2007', '5:40'),
(13, '«Burnin\'»', 'Homework', '6:53'),
(13, '«Contact»', 'Random Access Memories', '6:21'),
(13, '«Derezzed»', 'Tron: Legacy', '1:44'),
(13, '«Derezzed» (Avicii)', 'Tron: Legacy Reconfigured', '5:04'),
(13, '«Face to Face»', 'Discovery', '3:58'),
(13, '«Mothership Reconnection (Daft Punk Remix)»', 'Musique Vol.1 1993-1995', '4:14'),
(13, '«One More Time» (Romanthony\'s Unplugged)', 'Daft Club', '3:40'),
(14, '«Chord Memory (Daft Punk Remix)»', 'Musique Vol.1 1993-1995', '6:55'),
(14, '«Fall»', 'Tron: Legacy', '1:23'),
(14, '«Horizon» (Japón)', 'Random Access Memories', '4:24'),
(14, '«Indo Silver Club»', 'Homework', '4:32'),
(14, '«Solar Sailer»', 'Tron: Legacy Reconfigured', '4:32'),
(14, '«Something About Us» (Love Theme from Interstella 5555)', 'Daft Club', '2:13'),
(14, '«Too Long»', 'Discovery', '10:00'),
(15, '«Alive»', 'Homework', '5:15'),
(15, '«Forget About The World (Daft Punk Remix)»', 'Musique Vol.1 1993-1995', '5:45'),
(15, '«Get Lucky» (Daft Punk Remix)', 'Random Access Memories', '10:33'),
(15, '«Solar Sailer»', 'Tron: Legacy', '2:42'),
(15, '«Tron Legacy (End Titles)»', 'Tron: Legacy Reconfigured', '5:04'),
(15, '«Voyager» (Dominique Torti\'s Wild Style Edit)', 'Daft Club', '6:32'),
(16, '«Funk Ad»', 'Homework', '0:50'),
(16, '«Rectifier»', 'Tron: Legacy', '2:14'),
(17, '«Disc Wars»', 'Tron: Legacy', '4:11'),
(18, '«C.L.U.»', 'Tron: Legacy', '4:39'),
(19, '«Arrival»', 'Tron: Legacy', '2:00'),
(20, '«Flynn Lives»', 'Tron: Legacy', '3:22'),
(21, '«Tron Legacy (End Titles)»', 'Tron: Legacy', '3:18'),
(22, '«Finale»', 'Tron: Legacy', '4:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones_album`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`posicion`,`nombre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
