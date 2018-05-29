-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2018 a las 18:11:58
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
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `posicion` int(2) NOT NULL,
  `nombre` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_album` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`posicion`, `nombre`, `nombre_album`, `duracion`) VALUES
(1, '«Daftendirekt»', 'Homework', '2:44'),
(1, '«Derezzed»', 'Tron:_Legacy_Reconfigured', '4:22'),
(1, '«Give Life Back to Music»', 'Random_Access_Memories', '4:34'),
(1, '«Human After All»', 'Human_After_All', '5:19'),
(1, '«Musique»', 'Musique_Vol.1_1993-1995', '6:53'),
(1, '«One More Time»', 'Discovery', '5:20'),
(1, '«Ouverture»', 'Daft_Club', '2:40'),
(1, '«Overture»', 'Tron:_Legacy', '2:28'),
(1, '«Robot Rock / Oh Yeah»', 'Alive_2007', '6:27'),
(1, '«Robot Rock» (Soulwax Remix)', 'Human_After_All_Remixes', '6:31'),
(1, 'Alive 1997', 'Alive_1997', '45:33'),
(2, '«Aerodynamic»', 'Discovery', '3:27'),
(2, '«Aerodynamic»', 'Daft_Club', '6:10'),
(2, '«Da Funk»', 'Musique_Vol.1_1993-1995', '5:28'),
(2, '«Fall»', 'Tron:_Legacy_Reconfigured', '3:55'),
(2, '«Human After All»', 'Human_After_All_Remixes', '4:48'),
(2, '«The Game of Love»', 'Random_Access_Memories', '5:21'),
(2, '«The Grid»', 'Tron:_Legacy', '1:37'),
(2, '«The Prime Time of Your Life»', 'Human_After_All', '4:23'),
(2, '«Touch It / Technologic»', 'Alive_2007', '5:29'),
(2, '«WDPK 83.7 FM»', 'Homework', '0:28'),
(3, '«Around the World»', 'Musique_Vol.1_1993-1995', '3:59'),
(3, '«Digital Love»', 'Discovery', '4:58'),
(3, '«Giorgio by Moroder»', 'Random_Access_Memories', '9:04'),
(3, '«Harder, Better, Faster, Stronger»', 'Daft_Club', '5:11'),
(3, '«Revolution 909»', 'Homework', '5:26'),
(3, '«Robot Rock»', 'Human_After_All', '4:47'),
(3, '«Technologic»', 'Human_After_All_Remixes', '4:38'),
(3, '«Television Rules The Nation / Crescendolls»', 'Alive_2007', '4:50'),
(3, '«The Grid»', 'Tron:_Legacy_Reconfigured', '4:27'),
(3, '«The Son of Flynn»', 'Tron:_Legacy', '1:35'),
(4, '«Adagio for Tron»', 'Tron:_Legacy_Reconfigured', '5:34'),
(4, '«Brainwasher»', 'Human_After_All_Remixes', '6:05'),
(4, '«Da Funk»', 'Homework', '5:28'),
(4, '«Face to Face»', 'Daft_Club', '4:55'),
(4, '«Harder, Better, Faster, Stronger»', 'Discovery', '3:45'),
(4, '«Recognizer»', 'Tron:_Legacy', '2:38'),
(4, '«Revolution 909»', 'Musique_Vol.1_1993-1995', '5:27'),
(4, '«Steam Machine»', 'Human_After_All', '5:22'),
(4, '«Too Long / Steam Machine»', 'Alive_2007', '7:01'),
(4, '«Within»', 'Random_Access_Memories', '3:48'),
(5, '«Alive»', 'Musique_Vol.1_1993-1995', '5:15'),
(5, '«Armory»', 'Tron:_Legacy', '2:03'),
(5, '«Around the World / Harder, Better, Faster, Stronger»', 'Alive_2007', '5:42'),
(5, '«Crescendolls»', 'Discovery', '3:31'),
(5, '«Instant Crush»', 'Random_Access_Memories', '5:37'),
(5, '«Make Love»', 'Human_After_All', '4:48'),
(5, '«Phoenix»', 'Homework', '4:55'),
(5, '«Phoenix»', 'Daft_Club', '7:53'),
(5, '«Prime Time of Your Life»', 'Human_After_All_Remixes', '3:52'),
(5, '«The Son of Flynn»', 'Tron:_Legacy_Reconfigured', '4:35'),
(6, '«Arena»', 'Tron:_Legacy', '1:33'),
(6, '«Burnin / Too Long»', 'Alive_2007', '7:12'),
(6, '«C.L.U.»', 'Tron:_Legacy_Reconfigured', '4:51'),
(6, '«Digital Love»', 'Daft_Club', '7:30'),
(6, '«Fresh»', 'Homework', '4:03'),
(6, '«Human After All»', 'Human_After_All_Remixes', '4:01'),
(6, '«Lose Yourself to Dance»', 'Random_Access_Memories', '5:53'),
(6, '«Nightvision»', 'Discovery', '1:44'),
(6, '«Rollin & Scratchin»', 'Musique_Vol.1_1993-1995', '7:28'),
(6, '«The Brainwasher»', 'Human_After_All', '4:08'),
(7, '«Around the World»', 'Homework', '7:07'),
(7, '«Face to Face / Short Circuit»', 'Alive_2007', '4:56'),
(7, '«Harder, Better, Faster, Stronger»', 'Daft_Club', '6:01'),
(7, '«On/Off»', 'Human_After_All', '0:19'),
(7, '«One More Time»', 'Musique_Vol.1_1993-1995', '3:56'),
(7, '«Rinzler»', 'Tron:_Legacy', '2:18'),
(7, '«Superheroes»', 'Discovery', '3:57'),
(7, '«Technologic»', 'Human_After_All_Remixes', '6:01'),
(7, '«The Son of Flynn»', 'Tron:_Legacy_Reconfigured', '6:32'),
(7, '«Touch»', 'Random_Access_Memories', '8:18'),
(8, '«End of Line»', 'Tron:_Legacy_Reconfigured', '5:40'),
(8, '«Face to Face»', 'Daft_Club', '6:59'),
(8, '«Get Lucky»', 'Random_Access_Memories', '6:08'),
(8, '«Harder, Better, Faster, Stronger»', 'Musique_Vol.1_1993-1995', '3:45'),
(8, '«High Life»', 'Discovery', '3:22'),
(8, '«Human After All»', 'Human_After_All_Remixes', '9:26'),
(8, '«One More Time / Aerodynamic»', 'Alive_2007', '6:10'),
(8, '«Rollin & Scratchin»', 'Homework', '7:26'),
(8, '«Television Rules the Nation»', 'Human_After_All', '4:47'),
(8, '«The Game Has Changed»', 'Tron:_Legacy', '3:25'),
(9, '«Aerodynamic Beats / Forget About the World»', 'Alive_2007', '3:31'),
(9, '«Beyond»', 'Random_Access_Memories', '4:50'),
(9, '«Crescendolls» (Laidback Luke Remix)', 'Daft_Club', '5:25'),
(9, '«Outlands»', 'Tron:_Legacy', '2:42'),
(9, '«Rinzler»', 'Tron:_Legacy_Reconfigured', '6:52'),
(9, '«Something About Us»', 'Discovery', '3:51'),
(9, '«Something About Us»', 'Musique_Vol.1_1993-1995', '3:51'),
(9, '«Teachers»', 'Homework', '2:52'),
(9, '«Technologic»', 'Human_After_All', '4:44'),
(9, '«Technologic»', 'Human_After_All_Remixes', '5:27'),
(10, '«Adagio for Tron»', 'Tron:_Legacy', '4:11'),
(10, '«Aerodynamic»', 'Daft_Club', '3:37'),
(10, '«Emotion»', 'Human_After_All', '6:57'),
(10, '«ENCOM, Part II»', 'Tron:_Legacy_Reconfigured', '4:52'),
(10, '«High Fidelity»', 'Homework', '6:00'),
(10, '«Motherboard»', 'Random_Access_Memories', '5:41'),
(10, '«Prime Time of Your Life/Brainwasher/Rollin\' & Scratchin\'/Alive»', 'Alive_2007', '10:22'),
(10, '«Robot Rock»', 'Human_After_All_Remixes', '5:54'),
(10, '«Robot Rock»', 'Musique_Vol.1_1993-1995', '4:47'),
(10, '«Voyager»', 'Discovery', '3:47'),
(11, '«Da Funk / Daftendirekt»', 'Alive_2007', '6:37'),
(11, '«End of Line»', 'Tron:_Legacy_Reconfigured', '5:18'),
(11, '«Fragments of Time»', 'Random_Access_Memories', '4:39'),
(11, '«Nocturne»', 'Tron:_Legacy', '1:42'),
(11, '«Rock n Roll»', 'Homework', '7:32'),
(11, '«Technologic»', 'Musique_Vol.1_1993-1995', '2:46'),
(11, '«Too Long»', 'Daft_Club', '3:13'),
(11, '«Veridis Quo»', 'Discovery', '5:44'),
(12, '«Aerodynamite»', 'Daft_Club', '7:48'),
(12, '«Arena»', 'Tron:_Legacy_Reconfigured', '6:07'),
(12, '«Doin It Right»', 'Random_Access_Memories', '4:11'),
(12, '«End of Line»', 'Tron:_Legacy', '2:36'),
(12, '«Human After All»', 'Musique_Vol.1_1993-1995', '5:19'),
(12, '«Oh Yeah»', 'Homework', '2:00'),
(12, '«Short Circuit»', 'Discovery', '3:26'),
(12, '«Superheroes / Human After All / Rock n Roll»', 'Alive_2007', '5:40'),
(13, '«Burnin»', 'Homework', '6:53'),
(13, '«Contact»', 'Random_Access_Memories', '6:21'),
(13, '«Derezzed»', 'Tron:_Legacy', '1:44'),
(13, '«Derezzed»', 'Tron:_Legacy_Reconfigured', '5:04'),
(13, '«Face to Face»', 'Discovery', '3:58'),
(13, '«Mothership Reconnection»', 'Musique_Vol.1_1993-1995', '4:14'),
(13, '«One More Time»', 'Daft_Club', '3:40'),
(14, '«Chord Memory»', 'Musique_Vol.1_1993-1995', '6:55'),
(14, '«Fall»', 'Tron:_Legacy', '1:23'),
(14, '«Horizon»', 'Random_Access_Memories', '4:24'),
(14, '«Indo Silver Club»', 'Homework', '4:32'),
(14, '«Solar Sailer»', 'Tron:_Legacy_Reconfigured', '4:32'),
(14, '«Something About Us»', 'Daft_Club', '2:13'),
(14, '«Too Long»', 'Discovery', '10:00'),
(15, '«Alive»', 'Homework', '5:15'),
(15, '«Forget About The World»', 'Musique_Vol.1_1993-1995', '5:45'),
(15, '«Get Lucky»', 'Random_Access_Memories', '10:33'),
(15, '«Solar Sailer»', 'Tron:_Legacy', '2:42'),
(15, '«Tron Legacy»', 'Tron:_Legacy_Reconfigured', '5:04'),
(15, '«Voyager»', 'Daft_Club', '6:32'),
(16, '«Funk Ad»', 'Homework', '0:50'),
(16, '«Rectifier»', 'Tron:_Legacy', '2:14'),
(17, '«Disc Wars»', 'Tron:_Legacy', '4:11'),
(18, '«C.L.U.»', 'Tron:_Legacy', '4:39'),
(19, '«Arrival»', 'Tron:_Legacy', '2:00'),
(20, '«Flynn Lives»', 'Tron:_Legacy', '3:22'),
(21, '«Tron Legacy»', 'Tron:_Legacy', '3:18'),
(22, '«Finale»', 'Tron:_Legacy', '4:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
