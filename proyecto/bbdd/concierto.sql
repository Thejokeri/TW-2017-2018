-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2018 a las 13:41:29
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
-- Estructura de tabla para la tabla `paisconcierto`
--

CREATE TABLE `concierto` (
  `fecha` date NOT NULL,
  `pais` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `textodescriptivo` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paisconcierto`
--

INSERT INTO `concierto` (`fecha`, `pais`, `ciudad`, `lugar`, `nombre`, `textodescriptivo`) VALUES
('1997-01-17', 'Reino Unido', 'Manchester', 'The Academy', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-18', 'Reino Unido', 'Hanley, Stoke on Trent', 'The Stage Door', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-20', 'Reino Unido', 'Brighton', 'The Escape', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-22', 'Reino Unido', 'London', 'The End', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-24', 'Reino Unido', 'Glasgow', 'The Arches Theatre (Slam Event)', 'Daftendirektour', 'Texto descriptivo'),
('1997-01-25', 'Reino Unido', 'Leeds', 'Showbox', 'Daftendirektour', 'Texto descriptivo'),	
('1997-02-11', 'Estados Unidos', 'Chicago', 'Roller State Rink', 'Daftendirektour', 'Texto descriptivo'),
('1997-03-02', 'Reino Unido', 'London', 'The Bunker Club', 'Daftendirektour', 'Texto descriptivo'),	
('1997-04-12', 'Reino Unido', 'Manchester', 'Academy', 'Daftendirektour', 'Texto descriptivo'),
('1997-05-15', 'France', 'Paris', 'Rex Club', 'Daftendirektour', 'Texto descriptivo'),	
('1997-06-14', 'Suecia', 'Hultsfred', 'Hultsfred Festival', 'Daftendirektour', 'Texto descriptivo'),
('1997-06-22', 'Alemania', 'Eichenring', 'Germany	Hurricane Festival', 'Daftendirektour', 'Texto descriptivo'),
('1997-06-27', 'Dinamimarca', 'Roskilde', 'Denmark	Roskilde Festival', 'Daftendirektour', 'Texto descriptivo'),	
('1997-07-02', 'Noruega', 'Kristiansand', 'The Quart Festival', 'Daftendirektour', 'Texto descriptivo'),
('1997-07-04', 'Belgica', 'Torhout', 'Rock Torhout', 'Daftendirektour', 'Texto descriptivo'),	
('1997-07-05', 'Belgica', 'Werchter', 'Rock Werchter', 'Daftendirektour', 'Texto descriptivo'),	
('1997-07-12', 'Reino Unido', 'Balado', 'Slam Music Tent (T In the Park Festival)', 'Daftendirektour', 'Texto descriptivo'),
('1997-08-09', 'Francia', 'Montpellier', 'Dome Boréal', 'Daftendirektour', 'Texto descriptivo'),	
('1997-08-16', 'Reino Unido', 'Leeds', 'V97 Festival', 'Daftendirektour', 'Texto descriptivo'),	
('1997-08-17', 'Reino Unido', 'Chelmsford', 'V97 Festival', 'Daftendirektour', 'Texto descriptivo'),	
('1997-10-02', 'Paises Bajos', 'Amsterdam', 'Paradiso', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-03', 'Francia', 'Lille', 'L Aéronef', 'Daftendirektour', 'Texto descriptivo'),	
('1997-10-04', 'Belgica', 'Bruselas', 'Ancienne Belgique', 'Daftendirektour', 'Texto descriptivo'),	
('1997-10-06', 'Alemania', 'Saarbrücken', 'Garage', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-08', 'Alemania', 'Dortmund', 'Soundgarden', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-09', 'Alemania', 'Hamburg', 'Große Freiheit 36', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-11', 'Alemania', 'Berlin', 'Huxleys Neue Welt', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-12', 'Alemania', 'Stuttgart', 'LKA Longhorn', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-13', 'Alemania', 'Strasbourg', 'La Laiterie', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-17', 'Francia', 'Paris', 'Lelysée Montmartre', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-18', 'Francia', 'Nancy', 'Zénith de Nancy', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-20', 'Francia', 'Rouen', 'Exo 7', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-21', 'Francia', 'Rennes', 'La Liberté', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-24', 'Francia', 'Southampton', 'Southampton Guildhall', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-26', 'Irlanda', 'Dublin', 'Red Box', 'Daftendirektour', 'Texto descriptivo'),	
('1997-10-28', 'Reino Unido', 'Newcastle upon Tyne', 'Mayfair Ballroom', 'Daftendirektour', 'Texto descriptivo'),		
('1997-10-30', 'Reino Unido', 'Leeds', 'Town and Country Club', 'Daftendirektour', 'Texto descriptivo'),
('1997-10-31', 'Reino Unido', 'Glasgow', 'Barrowland Ballroom', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-01', 'Reino Unido', 'Manchester', 'Academy', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-03', 'Reino Unido', 'Cambridge', 'Corn Exchange', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-05', 'Reino Unido', 'London', 'Astoria Theater', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-06', 'Reino Unido', 'London', 'Astoria Theater', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-08', 'Reino Unido', 'Birmingham', 'Que Club', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-09', 'Reino Unido', 'Nottingham', 'Rock City', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-10', 'Reino Unido', 'Brighton', 'Escape Club', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-12', 'Francia', 'Brest', 'Petite Salle de Penfeld', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-14', 'España', 'Madrid', 'Aqualung', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-15', 'España', 'Barcelona', 'Zeleste', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-17', 'Francia', 'Bordeaux', 'Espace Medoquine', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-18', 'Francia', 'Toulouse', 'Salle Des Fetes', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-20', 'Francia', 'Marseille', 'Le Dome', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-21', 'Suiza', 'Geneva', 'Palladium', 'Daftendirektour', 'Texto descriptivo'),	
('1997-11-22', 'Francia', 'Lyon', 'Transbordeur', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-24', 'Italia', 'Milan', 'Rolling Stone Club', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-25', 'Italia', 'Florencia', 'Tenax', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-26', 'Italia', 'Roma', 'Frontiera', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-29', 'Suiza', 'Zürich', 'Jail', 'Daftendirektour', 'Texto descriptivo'),
('1997-11-30', 'Suiza', 'Vienna', 'Libro Music Hall', 'Daftendirektour', 'Texto descriptivo'),
('1997-12-01', 'Alemania', 'Munich', 'Kraftwerk', 'Daftendirektour', 'Texto descriptivo'),	
('1997-12-03', 'Alemania', 'Hanover', 'Capitol', 'Daftendirektour', 'Texto descriptivo'),
('1997-12-04', 'Alemania', 'Mannheim', 'MS Connexion', 'Daftendirektour', 'Texto descriptivo'),
('1997-12-12', 'Estados Unidos', 'Los Angeles', 'Mayan Theater', 'Daftendirektour', 'Texto descriptivo'),
('2007-07-04','Holanda', 'Amsterdam', 'Heineken Music Hall', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-07-14','España', 'Barcelona', 'Summercase Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-06-30','Francia', 'Belfort', 'Eurockéennes Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-27','Estados Unidos', 'Berkeley, CA', 'Greek Theatre', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-30','Alemania', 'Berlín', 'Velodrom', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-20','Australia', 'Brisbane', 'River Stage', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-08-09','Estados Unidos', 'Brooklyn, NY', 'KeySpan Park', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-11-04','Argentina', 'Buenos Aires', 'Bue Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-08-13','Japón', 'Chiba City', 'Summer Sonic Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-08-03','Estados Unidos', 'Chicago, IL', 'Lollapalooza Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-10-31','México', 'Ciudad de México', 'Palacio de los Deportes', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-08-28','Irlanda', 'Dublín', 'Marlay Park', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-29','Alemania', 'Düsseldorf', 'Philipshalle', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-06','Luxemburgo', 'Esch-sur-Alzette', 'Rockhal', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-23','Turquía', 'Estanbul', 'Turkcell Kuruçeşme Arena', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-11-04','México', 'Guadalajara, Jalisco', 'Auditorio Telmex', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-08-19','Bélgica', 'Hasselt', 'Pukkelpop Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-04-29','Estados Unidos', 'Indio, CA', 'Coachella Valley Music y Arts Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-10','Reino Unido', 'Inverness', 'RockNess Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-06','Japón', 'Kobe', 'World Memorial Hall (世界の記念館)', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-10-27','Estados Unidos', 'Las Vegas, NV', 'Vegoose Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-17','Reino Unido', 'Leeds', 'O2 Wireless Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-16','Reino Unido', 'Londres', 'O2 Wireless Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-21','Estados Unidos', 'Los Angeles, CA', 'Memorial Sports Arena', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-07-15','España', 'Madrid', 'Summercase Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-13','Australia', 'Melbourne', 'Sidney Myer Music Bowl', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-14','Australia', 'Melbourne', 'Sidney Myer Music Bowl', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-08','Japón', 'Chiba City', 'Makuhari Messe (幕張メッセ)', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-09','Japón', 'Chiba City', 'Makuhari Messe (幕張メッセ)', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-11-11','Estados Unidos', 'Miami, FL', 'Bang! Music Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-08-05','Canada', 'Mississauga, ON', 'Arrow Hall', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-11-02','México', 'Monterrey, Nuevo León', 'Arena Monterrey', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-08-07','Canada', 'Montreal, QC', 'Centre Bell', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-31','Estados Unidos', 'Morrison, CO', 'Red Rocks Amphitheatre', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-08','Irlanda', 'Naas', 'Oxegen Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-26','Francia', 'Nîmes', 'Arènes de Nîmes', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-08-12','Japón', 'Osaka', 'Summer Sonic Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-06-14','Francia', 'Paris', 'Palais Omnisports Bercy', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-16','Australia', 'Perth', 'The Esplanade', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-10-27','Brasil', 'Rio de Janeiro', 'TIM Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-11-02','Chile', 'Santiago de Chile', 'Sue Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-10-29','Brasil', 'São Paulo', 'TIM Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-29','Estados Unidos', 'Seattle, WA', 'WaMu Theater', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-12-22','Australia', 'Sidney', 'Showground Main Arena', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-07-26','Reino Unido', 'Stratford-upon-Avon', 'Global Gathering Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2007-07-12','Italia', 'Turin', 'Traffic Free Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-09-09','Polonia', 'Varsovia', 'Summer of Music Festival', 'Alive 2006/2007', 'Texto descriptivo'),
('2006-08-08','Portugal', 'Zambujeira do Mar', 'Sudoeste Festival', 'Alive 2006/2007', 'Texto descriptivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paisconcierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`fecha`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
