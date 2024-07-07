-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 03:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolaku`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klub` varchar(255) NOT NULL,
  `Overall` int(11) NOT NULL,
  `speed` int(11) DEFAULT NULL,
  `shooting` int(11) DEFAULT NULL,
  `passing` int(11) DEFAULT NULL,
  `dribbling` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `stamina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `nama`, `klub`, `Overall`, `speed`, `shooting`, `passing`, `dribbling`, `defense`, `stamina`) VALUES
(1, 'Erling Haaland\r\n', 'Manchester City\r\n', 91, 89, 93, 66, 80, 45, 88),
(2, 'Kevin De Bruyne', 'Manchester City', 91, 72, 88, 94, 87, 65, 78),
(3, 'Sam Kerr', 'Chelsea', 90, 85, 88, 74, 90, 42, 85),
(4, 'Mohamed Salah', 'Liverpool', 89, 89, 87, 81, 88, 45, 76),
(5, 'Rúben Dias', 'Manchester city', 89, 62, 39, 66, 69, 89, 87);

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `id` int(11) NOT NULL,
  `Player` varchar(512) DEFAULT NULL,
  `Position` varchar(512) DEFAULT NULL,
  `Club` varchar(512) DEFAULT NULL,
  `Assist` varchar(512) DEFAULT NULL,
  `Goal` int(11) DEFAULT NULL,
  `Apps` int(11) DEFAULT NULL,
  `MinutesPlayed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`id`, `Player`, `Position`, `Club`, `Assist`, `Goal`, `Apps`, `MinutesPlayed`) VALUES
(1, 'Aaron Ramsdale', 'GK', 'Arsenal', '0', 0, 6, 540),
(2, 'David Raya', 'GK', 'Arsenal', '0', 0, 32, 2880),
(3, 'Bukayo Saka', 'Forward', 'Arsenal', '35', 16, 35, 2933),
(4, 'William SALiba', 'Defender', 'Arsenal', '1', 2, 38, 3420),
(5, 'Declan Rice', 'Midfield', 'Arsenal', '8', 7, 38, 3230),
(6, 'Martin Ødegaard', 'Midfield', 'Arsenal', '10', 8, 35, 3098),
(7, 'Gabriel Magalhaes', 'Defender', 'Arsenal', '0', 4, 36, 3044),
(8, 'Leandro Trossard ', 'Defender', 'Arsenal', '1', 12, 34, 1646),
(9, 'Kai Havertz', 'Forward', 'Arsenal', '7', 13, 37, 2639),
(10, 'Oleksandr Zinchenko', 'Defender', 'Arsenal', '2', 1, 27, 1722),
(11, 'Gabriel Jesus', 'Forward', 'Arsenal', '5', 4, 27, 1482),
(12, 'Takehiro Tomiyasu', 'Defender', 'Arsenal', '1', 2, 22, 1143),
(13, 'Eddie Nketiah', 'Forward', 'Arsenal', '2', 5, 27, 1073),
(14, 'Jakub Kiwior', 'Defender', 'Arsenal', '3', 1, 20, 945),
(15, 'Thomas Partey', 'Midfield', 'Arsenal', '0', 0, 14, 788),
(16, 'Jorginho', 'Midfield', 'Arsenal', '2', 0, 24, 919),
(17, 'Emile Smith Rowe', 'Midfield', 'Arsenal', '1', 0, 13, 346),
(18, 'Fabio Vieira', 'Midfield', 'Arsenal', '2', 1, 11, 292),
(19, 'Cedric Soares', 'Defender', 'Arsenal', '0', 0, 3, 59),
(20, 'Reis Nelson', 'Forward', 'Arsenal', '0', 0, 15, 257),
(21, 'Gabriel Martinelli', 'Forward', 'Arsenal', '4', 6, 35, 2029),
(22, 'Emiliano Martínez', 'GK', 'Aston Villa ', '0', 0, 34, 3015),
(23, 'Ollie Watkins', 'Forward', 'Aston Villa ', '5', 14, 37, 3328),
(24, 'Tyrone Mings', 'Defender', 'Aston Villa ', '0', 0, 1, 31),
(25, 'John McGinn', 'Midfield', 'Aston Villa ', '4', 6, 35, 3009),
(26, 'Leon Bailey', 'Forward', 'Aston Villa ', '9', 10, 35, 2072),
(27, 'Matty Cash', 'Defender', 'Aston Villa ', '2', 2, 29, 2142),
(28, 'Calum Chambers', 'Defender', 'Aston Villa ', '1', 0, 5, 159),
(29, 'Morgan Rogers', 'Forward', 'Aston Villa ', '1', 3, 11, 640),
(30, 'Moussa Diaby', 'Forward', 'Aston Villa ', '8', 6, 38, 2184),
(31, 'Lucas Digne', 'Defender', 'Aston Villa ', '3', 1, 33, 2410),
(32, 'Pau Torres', 'Defender', 'Aston Villa ', '0', 2, 29, 2463),
(33, 'Boubacar Kamara', 'Midfield', 'Aston Villa ', '1', 0, 20, 1659),
(34, 'Ezri Konsa', 'Defender', 'Aston Villa ', '0', 1, 35, 3073),
(35, 'Clément Lenglet', 'Defender', 'Aston Villa ', '1', 0, 14, 1155),
(36, 'Álex Moreno', 'Defender', 'Aston Villa ', '0', 2, 21, 1030),
(37, 'Robin Olsen', 'GK', 'Aston Villa ', '0', 0, 5, 405),
(38, 'Jacob Ramsey', 'Midfield', 'Aston Villa ', '1', 1, 16, 850),
(39, 'Nicolo Zaniolo', 'Forward', 'Aston Villa ', '0', 2, 21, 830),
(40, 'Douglas Luiz', 'Midfield', 'Aston Villa ', '5', 9, 35, 3001),
(41, 'Youri Tielemans', 'Midfield', 'Aston Villa ', '6', 2, 32, 1620),
(42, 'Ivan Toney', 'Forward', 'Brentford', '2', 7, 17, 1449),
(43, 'Bryan Mbeumo', 'Forward', 'Brentford', '6', 9, 25, 1959),
(44, 'Mathias Jensen', 'Midfield', 'Brentford', '3', 3, 32, 2217),
(45, 'Rico Henry', 'Defender', 'Brentford', '1', 0, 5, 402),
(46, 'Christian Nørgaard', 'Midfield', 'Brentford', '1', 2, 31, 2513),
(47, 'Kristoffer Ajer', 'Defender', 'Brentford', '1', 2, 28, 1833),
(48, 'Sergio Reguilon', 'Defender', 'Brentford', '4', 0, 16, 1122),
(49, 'Shandon Baptiste', 'Midfield', 'Brentford', '1', 1, 10, 224),
(50, 'Nathan Collins', 'Defender', 'Brentford', '1', 1, 32, 2649),
(51, 'Mikkel Damsgaard', 'Forward', 'Brentford', '2', 0, 23, 833),
(52, 'Josh Dasilva', 'Forward', 'Brentford', '0', 0, 3, 23),
(53, 'Frank Onyeka', 'Midfield', 'Brentford', '2', 1, 26, 1155),
(54, 'Mark Flekken', 'GK', 'Brentford', '1', 0, 37, 3285),
(55, 'Saman Ghoddos', 'Forward', 'Brentford', '0', 1, 19, 729),
(56, 'Kean Lewis-Potter', 'Forward', 'Brentford', '1', 3, 30, 1441),
(57, 'Ben Mee', 'Defender', 'Brentford', '0', 2, 16, 1276),
(58, 'Yoanne Wissa ', 'Forward', 'Brentford', '3', 12, 34, 2508),
(59, 'Ethan Pinnock', 'Defender', 'Brentford', '0', 2, 29, 2521),
(60, 'Kevin Schade', 'Forward', 'Brentford', '1', 2, 11, 331),
(61, 'Thomas Strakosha', 'GK', 'Brentford', '0', 0, 2, 135),
(62, 'Dominic Solanke', 'Forward', 'Bournemouth', '3', 19, 38, 3331),
(63, 'Philip Billing', 'Midfield', 'Bournemouth', '2', 2, 29, 1393),
(64, 'Neto', 'GK', 'Bournemouth', '0', 0, 32, 2880),
(65, 'Ryan Christie', 'Midfield', 'Bournemouth', '5', 0, 37, 2918),
(66, 'Lloyd Kelly', 'Defender', 'Bournemouth', '1', 0, 23, 1557),
(67, 'Max Aarons', 'Defender', 'Bournemouth', '1', 0, 20, 1234),
(68, 'Tyler Adams', 'Midfield', 'Bournemouth', '0', 0, 3, 118),
(69, 'Romain Faivre', 'Midfield', 'Bournemouth', '1', 5, 17, 37),
(70, 'Lewis Cook', 'Midfield', 'Bournemouth', '3', 0, 33, 2792),
(71, 'James Hill', 'Defender', 'Bournemouth', '3', 1, 18, 75),
(72, 'Milos Kerkez', 'Defender', 'Bournemouth', '1', 0, 28, 1975),
(73, 'Justin Kluivert', 'Forward', 'Bournemouth', '1', 7, 32, 1934),
(74, 'Chris Mepham', 'Forward', 'Bournemouth', '1', 0, 10, 613),
(75, 'Dango Ouattara', 'Forward', 'Bournemouth', '2', 1, 30, 1220),
(76, 'Alex Scott', 'Midfield', 'Bournemouth', '1', 1, 23, 1010),
(77, 'Illia Zabarni', 'Defender', 'Bournemouth', '0', 1, 37, 3330),
(78, 'Enes Unal', 'Forward', 'Bournemouth', '2', 2, 16, 320),
(79, 'Antoine Semenyo', 'Forward', 'Bournemouth', '2', 8, 33, 2111),
(80, 'Marcos Senesi', 'Defender', 'Bournemouth', '5', 4, 31, 2247),
(81, 'Luis Sinisterra', 'Forward', 'Bournemouth', '2', 2, 20, 692),
(82, 'Jason Steele', 'GK', 'Brighton', '0', 0, 17, 1530),
(83, 'Lewis Dunk', 'Defender', 'Brighton', '1', 3, 33, 2872),
(84, 'Tariq Lamptey', 'Defender', 'Brighton', '3', 0, 19, 912),
(85, 'Pervis Estupiñán', 'Defender', 'Brighton', '3', 2, 19, 1244),
(86, 'Jan Paul van Hecke', 'Defender', 'Brighton', '0', 0, 28, 2368),
(87, 'Solly March', 'Midfield', 'Brighton', '1', 3, 7, 558),
(88, 'Adam Lallana', 'Midfield', 'Brighton', '1', 0, 25, 846),
(89, 'Ansu Fati', 'Forward', 'Brighton', '0', 2, 19, 513),
(90, 'Pascal Groß', 'Midfield', 'Brighton', '10', 4, 36, 3114),
(91, 'Kaoru Mitoma', 'Forward', 'Brighton', '4', 3, 19, 1488),
(92, 'Evan Ferguson', 'Forward', 'Brighton', '0', 6, 27, 1365),
(93, 'Julio Enciso', 'Forward', 'Brighton', '2', 0, 12, 474),
(94, 'Danny Welbeck', 'Forward', 'Brighton', '1', 5, 29, 1703),
(95, 'Billy Gilmour', 'Midfield', 'Brighton', '1', 0, 30, 2125),
(96, 'Igor Julio', 'Defender', 'Brighton', '0', 0, 24, 1636),
(97, 'Carlos Baleba', 'Midfield', 'Brighton', '0', 0, 27, 1321),
(98, 'Joël Veltman', 'Defender', 'Brighton', '1', 1, 27, 1582),
(99, 'Ivan Ferguson', 'Forward', 'Brighton', '0', 6, 27, 1365),
(100, 'Simon Adingra', 'Forward', 'Brighton', '1', 6, 31, 2230),
(101, 'Facundo Buonanotte', 'Midfield', 'Brighton', '1', 3, 27, 1368),
(102, 'Arijanet Muric', 'GK', 'Burnley', '0', 0, 10, 900),
(103, 'Ameen Al Dakhil', 'Defender', 'Burnley', '0', 1, 13, 1055),
(104, 'Charlie Taylor', 'Defender', 'Burnley', '1', 1, 28, 2332),
(105, 'James Trafford', 'GK', 'Burnley', '0', 0, 28, 2520),
(106, 'Jordan Beyer', 'Defender', 'Burnley', '1', 0, 15, 1238),
(107, 'Josh Brownhill', 'Midfield', 'Burnley', '2', 4, 33, 2251),
(108, 'Jack Cork', 'Defender', 'Burnley', '0', 0, 4, 25),
(109, 'Jóhann Berg Guðmundsson', 'Defender', 'Burnley', '3', 1, 26, 1191),
(110, 'Manuel Benson', 'Forward', 'Burnley', '0', 0, 8, 110),
(111, 'Hannes Delcroix', 'Defender', 'Burnley', '0', 0, 12, 585),
(112, 'Jay Rodriguez', 'Forward', 'Burnley', '1', 2, 21, 813),
(113, 'Lyle Foster', 'Forward', 'Burnley', '3', 5, 24, 1906),
(114, 'Hjalmar Ekdal', 'Defender', 'Burnley', '0', 0, 8, 436),
(115, 'Vitinho', 'Defender', 'Burnley', '2', 0, 32, 2316),
(116, 'Luca Keleosho', 'Forward', 'Burnley', '1', 1, 15, 984),
(117, 'Dara O\'Shea', 'Defender', 'Burnley', '4', 3, 33, 2894),
(118, 'Nathan Redmond', 'Forward', 'Burnley', '0', 0, 12, 132),
(119, 'Zeki Amdouni', 'Forward', 'Burnley', '1', 5, 34, 1971),
(120, 'Sander Berge', 'Midfield', 'Burnley', '2', 1, 37, 3005),
(121, 'Mike Tresor', 'Forward', 'Burnley', '0', 0, 16, 414),
(122, 'Benoit Badiashile', 'Defender', 'Chelsea', '1', 0, 18, 1337),
(123, 'Thiago Silva', 'Defender', 'Chelsea', '1', 3, 31, 2527),
(124, 'Ben Chilwell', 'Defender', 'Chelsea', '1', 0, 13, 752),
(125, 'Reece James', 'Defender', 'Chelsea', '2', 0, 10, 421),
(126, 'Enzo Fernández', 'Midfield', 'Chelsea', '2', 3, 28, 2214),
(127, 'Conor Gallagher', 'Midfield', 'Chelsea', '7', 5, 37, 3135),
(128, 'Raheem Sterling', 'Forward', 'Chelsea', '4', 8, 31, 1981),
(129, 'Christopher Nkunku', 'Forward', 'Chelsea', '0', 3, 11, 438),
(130, 'Nicolas Jackson', 'Forward', 'Chelsea', '5', 14, 35, 2804),
(131, 'Levi Colwill', 'Defender', 'Chelsea', '1', 1, 23, 1798),
(132, 'Marc Cucurella', 'Defender', 'Chelsea', '2', 0, 21, 1784),
(133, 'Cole Palmer', 'Midfield', 'Chelsea', '11', 22, 33, 2614),
(134, 'Trevoh Chalobah', 'Defender', 'Chelsea', '0', 1, 13, 950),
(135, 'Noni Madueke', 'Forward', 'Chelsea', '2', 5, 23, 1053),
(136, 'Carney Chukwuemeka', 'Midfield', 'Chelsea', '1', 1, 9, 223),
(137, 'Romeo Lavia', 'Defender', 'Chelsea', '0', 0, 1, 32),
(138, 'Robert Sánchez', 'GK', 'Chelsea', '0', 0, 16, 1434),
(139, 'Malo Gusto', 'Defender', 'Chelsea', '6', 0, 27, 17755),
(140, 'Mykhailo Mudryk', 'Forward', 'Chelsea', '2', 5, 31, 1578),
(141, 'Djordje Petrovic', 'GK', 'Chelsea', '0', 0, 23, 1986),
(142, 'Remi Matthews ', 'GK', 'Crystal Palace', '0', 0, 1, 3),
(143, 'Sam Johnstone', 'GK', 'Crystal Palace', '0', 0, 20, 1797),
(144, 'Tyrick Mitchell', 'Defender', 'Crystal Palace', '3', 2, 37, 3208),
(145, 'Joachim Andersen', 'Defender', 'Crystal Palace', '3', 2, 38, 3416),
(146, 'Marc Guéhi', 'Defender', 'Crystal Palace', '1', 0, 25, 2022),
(147, 'Nathaniel Clyne', 'Defender', 'Crystal Palace', '0', 0, 19, 1337),
(148, 'Joel Ward', 'Defender', 'Crystal Palace', '1', 0, 26, 1982),
(149, 'Eberechi Eze', 'Forward', 'Crystal Palace', '4', 11, 27, 2065),
(150, 'Michael Olise', 'Forward', 'Crystal Palace', '6', 10, 19, 1227),
(151, 'Jeffrey Schlupp', 'Forward', 'Crystal Palace', '2', 2, 29, 1355),
(152, 'Cheick Doucouré', 'Midfield', 'Crystal Palace', '0', 0, 11, 921),
(153, 'David Ozoh', 'Defender', 'Crystal Palace', '0', 0, 9, 149),
(154, 'James Tomkins', 'Defender', 'Crystal Palace', '0', 0, 4, 8),
(155, 'Daniel Munoz', 'Defender', 'Crystal Palace', '4', 0, 16, 1439),
(156, 'Jordan Ayew', 'Forward', 'Crystal Palace', '7', 4, 35, 2549),
(157, 'Jean-Philippe Mateta', 'Forward', 'Crystal Palace', '5', 16, 35, 2283),
(158, 'Will Hughes', 'Midfield', 'Crystal Palace', '1', 0, 30, 1899),
(159, 'Chris Richards', 'Defender', 'Crystal Palace', '1', 1, 26, 2091),
(160, 'Jairo Riedewald', 'Midfield', 'Crystal Palace', '0', 0, 9, 229),
(161, 'Jesurun Rak-Sakyi', 'Forward', 'Crystal Palace', '0', 0, 6, 132),
(162, 'Jordan Pickford', 'GK', 'Everton', '0', 0, 38, 3420),
(163, 'Séamus Coleman', 'Defender', 'Everton', '0', 0, 12, 662),
(164, 'James Tarkowski', 'Defender', 'Everton', '1', 1, 38, 3419),
(165, 'Ben Godfrey', 'Defender', 'Everton', '0', 0, 15, 1122),
(166, 'Michael Keane', 'Defender', 'Everton', '0', 1, 9, 438),
(167, 'Vitalii Mykolenko', 'Defender', 'Everton', '0', 2, 28, 2471),
(168, 'Idrissa Gueye', 'Midfield', 'Everton', '0', 4, 25, 1892),
(169, 'Amadou Onana', 'Midfield', 'Everton', '0', 2, 30, 2090),
(170, 'Dwight McNeil', 'Forward', 'Everton', '6', 3, 35, 2897),
(171, 'Ashley Young', 'Defender', 'Everton', '0', 0, 31, 2288),
(172, 'Calvert-Lewin', 'Forward', 'Everton', '2', 7, 32, 2185),
(173, 'Youseff Chermiti', 'Forward', 'Everton', '0', 0, 18, 195),
(174, 'Lewis Dobbin', 'Forward', 'Everton', '0', 1, 12, 227),
(175, 'André Gomes', 'Midfield', 'Everton', '0', 1, 12, 503),
(176, 'Arnaut Danjuma', 'Forward', 'Everton', '0', 1, 14, 587),
(177, 'Nathan Patterson', 'Defender', 'Everton', '2', 0, 20, 999),
(178, 'Beto', 'Forward', 'Everton', '0', 3, 30, 939),
(179, 'James Garner', 'Midfield', 'Everton', '2', 1, 37, 3005),
(180, 'Jack Harrison', 'Forward', 'Everton', '3', 3, 29, 2219),
(181, 'Abdoulaye Doucouré', 'Midfield', 'Everton', '2', 7, 32, 2637),
(182, 'Bernd Leno', 'GK', 'Fulham', '0', 0, 38, 3420),
(183, 'Kenny Tete', 'Defender', 'Fulham', '0', 1, 14, 868),
(184, 'Issa Diop', 'Defender', 'Fulham', '0', 0, 18, 1425),
(185, 'Tim Ream', 'Defender', 'Fulham', '0', 1, 18, 1504),
(186, 'Antonee Robinson', 'Defender', 'Fulham', '6', 0, 37, 3270),
(187, 'João Palhinha', 'Midfield', 'Fulham', '1', 4, 33, 2709),
(188, 'Harrison Reed', 'Midfield', 'Fulham', '2', 0, 27, 1324),
(189, 'Andreas Pereira', 'Forward', 'Fulham', '7', 3, 37, 2637),
(190, 'Harry Wilson', 'Forward', 'Fulham', '6', 4, 35, 1614),
(191, 'Willian', 'Forward', 'Fulham', '2', 4, 31, 2054),
(192, 'Adama Traore', 'Forward', 'Fulham', '3', 2, 17, 364),
(193, 'Armando Broja', 'Forward', 'Fulham', '1', 0, 8, 82),
(194, 'Tom Cairney', 'Midfield', 'Fulham', '4', 1, 34, 1475),
(195, 'Sasa Lukic', 'Midfield', 'Fulham', '0', 1, 24, 1119),
(196, 'Fode Ballo-Toure', 'Defender', 'Fulham', '0', 0, 6, 65),
(197, 'Raul Jimenez', 'Forward', 'Fulham', '0', 7, 24, 1402),
(198, 'Bobby De  Cordova-Reid', 'Forward', 'Fulham', '2', 6, 33, 1424),
(199, 'Rodrigo Muniz', 'Forward', 'Fulham', '1', 9, 26, 1597),
(200, 'Tosin Adarabioyo', 'Defender', 'Fulham', '0', 2, 20, 1617),
(201, 'Alex Iwobi', 'Forward', 'Fulham', '2', 5, 30, 2202),
(202, 'Alisson Becker', 'GK', 'Liverpool', '0', 0, 28, 2520),
(203, 'Alexander-Arnold', 'Defender', 'Liverpool', '4', 3, 28, 2160),
(204, 'Virgil van Dijk', 'Defender', 'Liverpool', '2', 2, 36, 3178),
(205, 'Andy Robertson', 'Defender', 'Liverpool', '2', 3, 23, 1691),
(206, 'Ibrahima Konaté', 'Defender', 'Liverpool', '0', 0, 22, 1571),
(207, 'Ryan Gravenberch', 'Midfield', 'Liverpool', '0', 1, 26, 1121),
(208, 'Wataru Endo', 'Midfield', 'Liverpool', '0', 1, 29, 1719),
(209, 'Mohamed Salah', 'Forward', 'Liverpool', '10', 18, 32, 2535),
(210, 'Diogo Jota', 'Forward', 'Liverpool', '3', 10, 21, 1150),
(211, 'Luis Díaz', 'Forward', 'Liverpool', '5', 8, 37, 2646),
(212, 'Darwin Núñez', 'Forward', 'Liverpool', '8', 11, 36, 2046),
(213, 'Harvey Elliott', 'Midfield', 'Liverpool', '6', 3, 34, 1336),
(214, 'Curtis Jones', 'Midfield', 'Liverpool', '1', 1, 23, 1167),
(215, 'Jarell Quansah', 'Defender', 'Liverpool', '0', 2, 17, 1189),
(216, 'Kostas Tsimikas', 'Defender', 'Liverpool', '3', 0, 13, 677),
(217, 'Joël Matip', 'Defender', 'Liverpool', '0', 0, 10, 783),
(218, 'Cody Gakpo', 'Forward', 'Liverpool', '5', 8, 35, 1644),
(219, 'Stefan Bajčetić', 'Midfield', 'Liverpool', '0', 0, 1, 26),
(220, 'Alexis Mac Allister', 'Midfield', 'Liverpool', '5', 5, 33, 2609),
(221, 'Dominik Szobozlai', 'Midfield', 'Liverpool', '2', 3, 33, 2109),
(222, 'James Shea', 'GK', 'Luton Town', '0', 0, 1, 14),
(223, 'Tom Lockyer', 'Defender', 'Luton Town', '1', 1, 14, 1171),
(224, 'Andros Townsend', 'Midfield', 'Luton Town', '3', 1, 27, 1209),
(225, 'Reece Burke', 'Defender', 'Luton Town', '4', 0, 22, 1163),
(226, 'Amari\'i Bell', 'Defender', 'Luton Town', '0', 0, 21, 1722),
(227, 'Pelly-Ruddock Mpanzu', 'Midfield', 'Luton Town', '0', 0, 27, 1093),
(228, 'Marvelous Nakamba', 'Midfield', 'Luton Town', '0', 0, 13, 1134),
(229, 'Jordan Clark', 'Forward', 'Luton Town', '1', 1, 23, 1306),
(230, 'Elijah Adebayo', 'Forward', 'Luton Town', '0', 11, 27, 1418),
(231, 'Carlton Morris', 'Forward', 'Luton Town', '4', 11, 38, 2867),
(232, 'Cauley Woodrow', 'Forward', 'Luton Town', '1', 1, 24, 409),
(233, 'Gabriel Osho', 'Defender', 'Luton Town', '0', 2, 21, 1848),
(234, 'Luke Berry', 'Midfield', 'Luton Town', '1', 2, 17, 311),
(235, 'Ross Barkley', 'Midfield', 'Luton Town', '4', 5, 32, 2622),
(236, 'Issa Kabore', 'Defender', 'Luton Town', '2', 0, 24, 1732),
(237, 'Teden Mengi', 'Defender', 'Luton Town', '0', 1, 30, 2470),
(238, 'Chiedozie Ogbene', 'Forward', 'Luton Town', '1', 4, 30, 1993),
(239, 'Alfie Doughty', 'Forward', 'Luton Town', '8', 2, 37, 2937),
(240, 'Tahith Chong', 'Forward', 'Luton Town', '0', 4, 33, 1986),
(241, 'Thomas Kminski', 'GK', 'Luton Town', '0', 0, 38, 3406),
(242, 'Ederson', 'GK', 'Man City', '0', 0, 33, 2788),
(243, 'Kyle Walker', 'Defender', 'Man City', '4', 0, 32, 2767),
(244, 'Rúben Dias', 'Defender', 'Man City', '0', 0, 30, 2557),
(245, 'Nathan Aké', 'Defender', 'Man City', '2', 2, 29, 2044),
(246, 'Rodri', 'Midfield', 'Man City', '9', 8, 34, 2938),
(247, 'Kevin De Bruyne', 'Midfield', 'Man City', '10', 4, 18, 1227),
(248, 'Bernardo Silva', 'Forward', 'Man City', '9', 6, 33, 2581),
(249, 'Jack Grealish', 'Forward', 'Man City', '1', 3, 20, 1003),
(250, 'Phil Foden', 'Forward', 'Man City', '8', 19, 35, 2865),
(251, 'Erling Haaland', 'Forward', 'Man City', '5', 27, 31, 2556),
(252, 'Julián Álvarez', 'Forward', 'Man City', '9', 11, 36, 2657),
(253, 'John Stones', 'Defender', 'Man City', '0', 1, 16, 1064),
(254, 'Sergio Gómez', 'Defender', 'Man City', '1', 0, 6, 46),
(255, 'Stefan Ortega', 'GK', 'Man City', '0', 0, 9, 632),
(256, 'Manuel Akanji', 'Defender', 'Man City', '0', 2, 30, 2513),
(257, 'Jeremy Doku', 'Forward', 'Man City', '8', 3, 29, 1593),
(258, 'Diogo Dalot', 'Defender', 'Man United', '3', 2, 36, 3137),
(259, 'Raphaël Varane', 'Defender', 'Man United', '0', 1, 22, 1371),
(260, 'Lisandro Martínez', 'Defender', 'Man United', '1', 0, 11, 648),
(261, 'Luke Shaw', 'Defender', 'Man United', '0', 0, 12, 962),
(262, 'Casemiro', 'Midfield', 'Man United', '2', 1, 25, 1985),
(263, 'Christian Eriksen', 'Midfield', 'Man United', '2', 1, 22, 1339),
(264, 'Bruno Fernandes', 'Midfield', 'Man United', '8', 10, 35, 3119),
(265, 'Marcus Rashford', 'Forward', 'Man United', '2', 7, 33, 2278),
(266, 'Anthony Martial', 'Forward', 'Man United', '0', 1, 13, 445),
(267, 'Sofyan Amrabat', 'Defender', 'Man United', '0', 0, 21, 931),
(268, 'Antony', 'Forward', 'Man United', '1', 1, 29, 1323),
(269, 'Andre Onana', 'GK', 'Man United', '0', 0, 38, 3420),
(270, 'Scott McTominay', 'Midfield', 'Man United', '1', 7, 32, 1891),
(271, 'Johny Evans', 'Defender', 'Man United', '1', 0, 23, 1396),
(272, 'Harry Maguire', 'Defender', 'Man United', '2', 2, 22, 1650),
(273, 'Alejandro Garnacho', 'Forward', 'Man United', '4', 7, 36, 2573),
(274, 'Aaron Wan-Bissaka', 'Defender', 'Man United', '2', 0, 22, 1781),
(275, 'Kobbie Mainoo', 'Midfield', 'Man United', '1', 3, 24, 1939),
(276, 'Amad Diallo', 'Forward', 'Man United', '1', 1, 9, 388),
(277, 'Nick Pope', 'GK', 'Newcastle United', '0', 0, 15, 1346),
(278, 'Kieran Trippier', 'Defender', 'Newcastle United', '10', 1, 28, 2240),
(279, 'Fabian Schär', 'Defender', 'Newcastle United', '1', 4, 36, 3054),
(280, 'Sven Botman', 'Defender', 'Newcastle United', '2', 2, 17, 1378),
(281, 'Dan Burn', 'Defender', 'Newcastle United', '2', 2, 33, 2732),
(282, 'Bruno Guimarães', 'Midfield', 'Newcastle United', '8', 7, 37, 3268),
(283, 'Joelinton', 'Midfield', 'Newcastle United', '1', 2, 20, 1282),
(284, 'Miguel Almirón', 'Forward', 'Newcastle United', '1', 3, 33, 1945),
(285, 'Callum Wilson', 'Forward', 'Newcastle United', '1', 9, 20, 985),
(286, 'Alexander Isak', 'Forward', 'Newcastle United', '2', 21, 30, 2265),
(287, 'Joe Willock', 'Forward', 'Newcastle United', '0', 1, 9, 418),
(288, 'Sean Longstaff', 'Midfield', 'Newcastle United', '2', 6, 35, 2746),
(289, 'Sandro Tonalli', 'Midfield', 'Newcastle United', '0', 1, 8, 439),
(290, 'Jamaal Lascelles', 'Defender', 'Newcastle United', '0', 1, 16, 1080),
(291, 'Jacob Murphy', 'Forward', 'Newcastle United', '7', 3, 21, 1193),
(292, 'Emil Krafth', 'Defender', 'Newcastle United', '0', 0, 17, 910),
(293, 'Martin Dúbravka', 'GK', 'Newcastle United', '0', 0, 23, 1984),
(294, 'Anthony Gordon', 'Forward', 'Newcastle United', '10', 11, 35, 2898),
(295, 'Elliot Anderson', 'Midfield', 'Newcastle United', '2', 0, 21, 1022),
(296, 'Matz Sels', 'GK', 'Nottingham Forest', '0', 0, 16, 1440),
(297, 'Murillo', 'Defender', 'Nottingham Forest', '2', 0, 20, 2793),
(298, 'Anthony Elanga', 'Forward', 'Nottingham Forest', '9', 5, 36, 2434),
(299, 'Ryan Yates', 'Midfield', 'Nottingham Forest', '1', 1, 35, 1986),
(300, 'Callum Hudson-Odoi', 'Forward', 'Nottingham Forest', '1', 8, 29, 1854),
(301, 'Chris Wood', 'Forward', 'Nottingham Forest', '1', 14, 31, 1806),
(302, 'Ola Aina', 'Defender', 'Nottingham Forest', '1', 1, 22, 1700),
(303, 'Morgan Gibbs-White', 'Midfield', 'Nottingham Forest', '10', 5, 37, 3160),
(304, 'Neco Williams ', 'Defender', 'Nottingham Forest', '1', 0, 26, 1634),
(305, 'Matt Turner', 'GK', 'Nottingham Forest', '0', 0, 17, 1530),
(306, 'Nicolas Dominguez', 'Midfield', 'Nottingham Forest', '2', 2, 26, 1503),
(307, 'Moussa Niakhate', 'Defender', 'Nottingham Forest', '0', 1, 21, 1457),
(308, 'Harry Toffolo', 'Defender', 'Nottingham Forest', '3', 1, 23, 1455),
(309, 'Willy Boly', 'Defender', 'Nottingham Forest', '1', 2, 20, 1443),
(310, 'Andrew Omobamidele', 'Defender', 'Nottingham Forest', '0', 0, 11, 782),
(311, 'Divock Origi', 'Forward', 'Nottingham Forest', '1', 0, 20, 599),
(312, 'Nuno Tavarez', 'Defender', 'Nottingham Forest', '0', 0, 8, 455),
(313, 'Danilo', 'Midfield', 'Nottingham Forest', '2', 2, 29, 1796),
(314, 'Wes Foderingham', 'GK', 'Sheffield United', '0', 0, 30, 2648),
(315, 'George Baldock', 'Defender', 'Sheffield United', '1', 0, 13, 970),
(316, 'John Egan', 'Defender', 'Sheffield United', '0', 0, 6, 484),
(317, 'Jack Robinson', 'Defender', 'Sheffield United', '1', 1, 34, 2855),
(318, 'Anel Ahmedhodžić', 'Defender', 'Sheffield United', '0', 2, 31, 2649),
(319, 'Max Lowe', 'Defender', 'Sheffield United', '1', 0, 10, 500),
(320, 'James McAtee', 'Midfield', 'Sheffield United', '3', 3, 30, 1827),
(321, 'Oliver Norwood', 'Midfield', 'Sheffield United', '0', 1, 27, 1433),
(322, 'William Osula', 'Forward', 'Sheffield United', '0', 0, 21, 783),
(323, 'Ivo Grbic', 'GK', 'Sheffield United', '0', 0, 9, 772),
(324, 'Oli McBurnie', 'Forward', 'Sheffield United', '3', 6, 21, 1283),
(325, 'Rhian Brewster', 'Forward', 'Sheffield United', '0', 0, 13, 339),
(326, 'Ben Osborn', 'Midfield', 'Sheffield United', '2', 0, 224, 1359),
(327, 'Mason Holgate', 'Defender', 'Sheffield United', '0', 0, 10, 713),
(328, 'Auston Trusty', 'Defender', 'Sheffield United', '0', 0, 32, 2572),
(329, 'Jayden Bogle', 'Defender', 'Sheffield United', '0', 3, 34, 2792),
(330, 'Vinicius Souza', 'Midfield', 'Sheffield United', '0', 1, 36, 2672),
(331, 'Gustavo Hamer', 'Midfield', 'Sheffield United', '6', 4, 36, 2923),
(332, 'James McAtee', 'Midfield', 'Sheffield United', '3', 3, 30, 1827),
(333, 'Cristian Romero', 'Defender', 'Tottenham', '0', 5, 33, 2792),
(334, 'Ben Davies', 'Defender', 'Tottenham', '0', 1, 17, 1085),
(335, 'Timo Werner', 'Forward', 'Tottenham', '3', 2, 13, 814),
(336, 'Emerson Royal', 'Defender', 'Tottenham', '0', 1, 22, 1155),
(337, 'Højbjerg', 'Midfield', 'Tottenham', '0', 0, 36, 1293),
(338, 'Rodrigo Bentancur', 'Forward', 'Tottenham', '1', 1, 23, 1007),
(339, 'Yves Bissouma', 'Midfield', 'Tottenham', '0', 0, 28, 2081),
(340, 'Son Heung-min', 'Forward', 'Tottenham', '10', 17, 35, 2946),
(341, 'Dejan Kulusevski', 'Forward', 'Tottenham', '3', 8, 36, 2763),
(342, 'Richarlison', 'Forward', 'Tottenham', '4', 11, 28, 1492),
(343, 'Lo Celso', 'Midfield', 'Tottenham', '2', 2, 22, 495),
(344, 'Micky van de Ven', 'Defender', 'Tottenham', '0', 3, 27, 2342),
(345, 'James Maddison', 'Forward', 'Tottenham', '9', 4, 28, 2152),
(346, 'Pedro Poro', 'Defender', 'Tottenham', '7', 3, 35, 3092),
(347, 'Oliver Skipp', 'Midfield', 'Tottenham', '0', 0, 21, 694),
(348, 'Guiglielmo Vicario', 'GK', 'Tottenham', '0', 0, 38, 3420),
(349, 'Bryan Gil', 'Midfield', 'Tottenham', '0', 0, 11, 201),
(350, 'Destiny Udogie', 'Defender', 'Tottenham', '3', 2, 28, 2398),
(351, 'Łukasz Fabiański', 'GK', 'West Ham United', '0', 0, 10, 721),
(352, 'Vladimir Coufal', 'Defender', 'West Ham United', '7', 0, 36, 3136),
(353, 'Angelo Ogbonna', 'Defender', 'West Ham United', '0', 0, 11, 633),
(354, 'Kurt Zouma', 'Defender', 'West Ham United', '0', 3, 33, 2838),
(355, 'James Ward-Prowse', 'Midfield', 'West Ham United', '7', 7, 37, 3005),
(356, 'Tomáš Souček', 'Midfield', 'West Ham United', '2', 7, 37, 2874),
(357, 'Lucas Paquetá', 'Midfield', 'West Ham United', '6', 4, 31, 2634),
(358, 'Edson Alvarez', 'Midfield', 'West Ham United', '1', 1, 31, 2383),
(359, 'Michail Antonio', 'Forward', 'West Ham United', '2', 6, 26, 1710),
(360, 'Jarrod Bowen', 'Forward', 'West Ham United', '6', 16, 34, 3020),
(361, 'Emerson', 'Defender', 'West Ham United', '2', 1, 36, 3142),
(362, 'Alphonse Areola', 'GK', 'West Ham United', '0', 0, 31, 2699),
(363, 'Nayef Aguerd', 'Defender', 'West Ham United', '0', 1, 21, 1859),
(364, 'Ben Johnson', 'Defender', 'West Ham United', '0', 0, 14, 538),
(365, 'Kalvin Phillips', 'Midfield', 'West Ham United', '0', 0, 8, 307),
(366, 'Mohammed Kudus', 'Midfield', 'West Ham United', '6', 8, 33, 2483),
(367, 'Danny Ings', 'Forward', 'West Ham United', '0', 1, 20, 390),
(368, 'Maxwel Cornet', 'Forward', 'West Ham United', '0', 1, 7, 110),
(369, 'José Sá', 'GK', 'Wolverhampton', '1', 0, 35, 3038),
(370, 'Nelson Semedo', 'Defender', 'Wolverhampton', '1', 0, 36, 3092),
(371, 'Max Kilman', 'Defender', 'Wolverhampton', '0', 2, 38, 3420),
(372, 'Craig Dawson', 'Defender', 'Wolverhampton', '1', 1, 25, 2211),
(373, 'Rayan Aït-Nouri', 'Defender', 'Wolverhampton', '1', 2, 33, 2344),
(374, 'Matheus Cunha', 'Forward', 'Wolverhampton', '7', 12, 32, 2453),
(375, 'Matt Doherty', 'Defender', 'Wolverhampton', '0', 1, 30, 1142),
(376, 'Joao Gomes', 'Midfield', 'Wolverhampton', '1', 2, 34, 2658),
(377, 'Pablo Sarabia', 'Forward', 'Wolverhampton', '4', 7, 30, 1748),
(378, 'Hwang Hee-chan', 'Forward', 'Wolverhampton', '3', 12, 29, 2124),
(379, 'Santiago Bueno', 'Defender', 'Wolverhampton', '0', 0, 12, 820),
(380, 'Dan Dentley', 'GK', 'Wolverhampton', '0', 0, 5, 764),
(381, 'Toti Gomes', 'Defender', 'Wolverhampton', '3', 5, 35, 2744),
(382, 'Tommy Doyle', 'Midfield', 'Wolverhampton', '0', 0, 26, 1213),
(383, 'Mario Lemina', 'Midfield', 'Wolverhampton', '1', 4, 35, 2974),
(384, 'Boubacar Traore', 'Midfield', 'Wolverhampton', '0', 0, 24, 804),
(385, 'Hugo Bueno', 'Defender', 'Wolverhampton', '0', 0, 22, 730);

-- --------------------------------------------------------

--
-- Table structure for table `team_stats`
--

CREATE TABLE `team_stats` (
  `id` int(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Menang` int(255) NOT NULL,
  `Seri` int(255) NOT NULL,
  `Kalah` int(255) NOT NULL,
  `Gol` int(255) NOT NULL,
  `Kebobolan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_stats`
--

INSERT INTO `team_stats` (`id`, `Nama`, `Menang`, `Seri`, `Kalah`, `Gol`, `Kebobolan`) VALUES
(1, 'Arsenal', 28, 5, 5, 91, 29),
(2, 'Aston Villa', 20, 8, 10, 76, 61),
(3, 'Bournemouth', 13, 9, 16, 54, 67),
(4, 'Brentford', 10, 9, 19, 56, 65),
(5, 'Brighton ', 12, 12, 14, 55, 62),
(6, 'Chelsea', 18, 9, 11, 77, 63),
(7, 'Crystal Palace', 13, 10, 15, 57, 58),
(8, 'Everton', 13, 9, 16, 40, 51),
(9, 'Fulham', 13, 8, 17, 55, 61),
(10, 'Liverpool', 24, 10, 4, 86, 41),
(11, 'Luton Town', 6, 8, 24, 52, 85),
(12, 'Manchester City', 28, 7, 3, 96, 34),
(13, 'Manchester United', 18, 6, 14, 57, 58),
(14, 'Newcastle United', 18, 6, 14, 85, 62),
(15, 'Nottingham Forest', 9, 9, 20, 49, 67),
(16, 'Sheffield United', 3, 7, 28, 35, 104),
(17, 'Tottenham Hotspur', 20, 6, 12, 74, 61),
(18, 'West Ham United', 14, 10, 14, 60, 74),
(19, 'Wolverhampton Wanderers', 13, 7, 18, 50, 65),
(20, 'Burnley', 5, 9, 24, 41, 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_stats`
--
ALTER TABLE `team_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `player_stats`
--
ALTER TABLE `player_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT for table `team_stats`
--
ALTER TABLE `team_stats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
