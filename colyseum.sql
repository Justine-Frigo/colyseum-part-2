-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 19 juin 2024 à 10:17
-- Version du serveur : 11.3.2-MariaDB
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `colyseum`
--
CREATE DATABASE IF NOT EXISTS `colyseum` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `colyseum`;

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `clientId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `clientId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25);

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `cardNumber` int(10) UNSIGNED NOT NULL,
  `cardTypesId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `cardNumber`, `cardTypesId`) VALUES
(1, 2627, 3),
(2, 2022, 3),
(3, 2608, 3),
(4, 2377, 1),
(5, 1869, 4),
(6, 2403, 4),
(7, 1263, 3),
(8, 2198, 1),
(9, 2927, 2),
(10, 2775, 2),
(11, 7125, 2),
(12, 8563, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cardtypes`
--

CREATE TABLE `cardtypes` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `type` varchar(45) NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `cardtypes`
--

INSERT INTO `cardtypes` (`id`, `type`, `discount`) VALUES
(1, 'Fidélité', 20),
(2, 'Famille Nombreuse', 30),
(3, 'Etudiant', 40),
(4, 'Employé', 50);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `birthDate` date NOT NULL,
  `card` tinyint(1) NOT NULL,
  `cardNumber` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber`) VALUES
(1, 'Brennan', 'Guinevere', '1994-02-05', 1, 2627),
(2, 'Dean', 'Ori', '1973-11-23', 0, NULL),
(3, 'Sharpe', 'Nora', '1983-03-10', 0, NULL),
(4, 'Hampton', 'Wade', '2000-03-05', 1, 2022),
(5, 'Monteiro', 'Nicolas', '1979-11-04', 0, NULL),
(6, 'Klein', 'Hilary', '1972-12-16', 0, NULL),
(7, 'Tyler', 'Lawrence', '1996-05-13', 0, NULL),
(8, 'Dudley', 'Tanya', '1966-12-28', 0, NULL),
(9, 'Terrell', 'Kim', '1997-07-27', 1, 2608),
(10, 'Mclaughlin', 'Laura', '1977-02-16', 0, NULL),
(11, 'Lewis', 'Linda', '1983-07-18', 0, NULL),
(12, 'Ware', 'Gemma', '1969-10-17', 1, 2377),
(13, 'Roth', 'Jolie', '1981-02-24', 0, NULL),
(14, 'Michael', 'Harriet', '1961-11-27', 1, 1869),
(15, 'Simpson', 'Paloma', '1998-01-07', 0, NULL),
(16, 'Cote', 'Fulton', '1967-11-01', 1, 2403),
(17, 'Wheeler', 'Echo', '1965-10-10', 0, NULL),
(18, 'Snider', 'Desiree', '1996-07-28', 0, NULL),
(19, 'Vaughan', 'Vanna', '1992-09-13', 1, 1263),
(20, 'Barnes', 'Preston', '1988-12-20', 1, 2198),
(21, 'Padilla', 'Britanney', '2015-04-03', 1, 2927),
(22, 'Perry', 'Gabriel', '1994-04-09', 1, 2775),
(23, 'Mccormick', 'Hyatt', '1968-05-02', 0, NULL),
(24, 'Stark', 'Keiko', '1985-04-08', 0, NULL),
(25, 'London', 'Sean', '1975-02-02', 0, NULL),
(29, 'Moore', 'Alicia', '1979-09-08', 0, NULL),
(31, 'Ciccone', 'Louise', '1958-08-16', 1, 7125);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `genre` varchar(45) NOT NULL,
  `showTypesId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`, `showTypesId`) VALUES
(1, 'Variété et chanson française', 1),
(2, 'Variété internationale', 1),
(3, 'Pop/Rock', 1),
(4, 'Musique électronique', 1),
(5, 'Folk', 1),
(6, 'Rap', 1),
(7, 'Hip Hop', 1),
(8, 'Slam', 1),
(9, 'Reggae', 1),
(10, 'Clubbing', 1),
(11, 'RnB', 1),
(12, 'Soul', 1),
(13, 'Funk', 1),
(14, 'Jazz', 1),
(15, 'Blues', 1),
(16, 'Country', 1),
(17, 'Gospel', 1),
(18, 'Musique du monde', 1),
(19, 'Classique', 1),
(20, 'Opéra', 1),
(21, 'Autres', 1),
(22, 'Drame', 2),
(23, 'Comédie', 2),
(24, 'Comtemporain', 2),
(25, 'Monologue', 2),
(26, 'One Man / Woman Show', 3),
(27, 'Café-Théâtre', 3),
(28, 'Stand Up', 3),
(29, 'Autres', 3),
(30, 'Comtemporaine', 4),
(31, 'Classique', 4),
(32, 'Urbaine', 4);

-- --------------------------------------------------------

--
-- Structure de la table `shows`
--

CREATE TABLE `shows` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL,
  `performer` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `showTypesId` smallint(5) UNSIGNED NOT NULL,
  `firstGenresId` smallint(5) UNSIGNED NOT NULL,
  `secondGenreId` smallint(5) UNSIGNED NOT NULL,
  `duration` time NOT NULL,
  `startTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `shows`
--

INSERT INTO `shows` (`id`, `title`, `performer`, `date`, `showTypesId`, `firstGenresId`, `secondGenreId`, `duration`, `startTime`) VALUES
(1, 'Vestibulum accumsan', 'Osborn', '2017-01-01', 1, 4, 3, '02:00:00', '21:00:00'),
(2, 'Venenatis lacus', 'Dale', '2017-01-05', 1, 1, 8, '02:00:00', '20:00:00'),
(3, 'Sem egestas', 'Juarez', '2017-02-01', 1, 8, 21, '02:00:00', '20:00:00'),
(4, 'Nec urna', 'Tate', '2018-05-02', 1, 3, 21, '02:00:00', '20:00:00'),
(5, 'Neque et', 'Hays', '2016-12-24', 1, 6, 15, '02:00:00', '20:00:00'),
(6, 'Convallis convallis', 'Boone', '2019-12-18', 1, 9, 21, '02:00:00', '20:00:00'),
(7, 'Cursus. Nunc', 'Prince', '2020-05-02', 1, 6, 10, '02:00:00', '20:00:00'),
(8, 'Ornare lectus', 'Butler', '2016-12-25', 1, 10, 9, '02:00:00', '20:00:00'),
(9, 'I love techno', 'David Guetta', '2019-09-20', 1, 4, 10, '03:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `showtypes`
--

CREATE TABLE `showtypes` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `showtypes`
--

INSERT INTO `showtypes` (`id`, `type`) VALUES
(1, 'Concert'),
(2, 'Théâtre'),
(3, 'Humour'),
(4, 'Danse');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `bookingsId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `price`, `bookingsId`) VALUES
(1, 40, 1),
(2, 40, 1),
(3, 40, 1),
(4, 40, 1),
(5, 40, 1),
(6, 40, 2),
(7, 40, 2),
(8, 40, 2),
(9, 40, 2),
(10, 40, 2),
(11, 40, 3),
(12, 40, 3),
(13, 40, 3),
(14, 40, 4),
(15, 40, 5),
(16, 40, 6),
(17, 40, 6),
(18, 40, 6),
(19, 40, 6),
(20, 40, 6),
(21, 40, 7),
(22, 40, 7),
(23, 40, 8),
(24, 40, 9),
(25, 40, 9),
(26, 40, 9),
(27, 40, 9),
(28, 40, 9),
(29, 40, 9),
(30, 40, 9),
(31, 40, 10),
(32, 40, 10),
(33, 40, 10),
(34, 40, 10),
(35, 40, 11),
(36, 40, 11),
(37, 40, 11),
(38, 40, 11),
(39, 40, 11),
(40, 40, 11),
(41, 40, 12),
(42, 40, 12),
(43, 40, 12),
(44, 40, 12),
(45, 40, 12),
(46, 40, 12),
(47, 40, 12),
(48, 40, 12),
(49, 40, 12),
(50, 40, 12),
(51, 40, 13),
(52, 40, 13),
(53, 40, 13),
(54, 40, 13),
(55, 40, 13),
(56, 40, 13),
(57, 40, 13),
(58, 40, 13),
(59, 40, 13),
(60, 40, 13),
(61, 40, 14),
(62, 40, 14),
(63, 40, 14),
(64, 40, 15),
(65, 40, 15),
(66, 40, 15),
(67, 40, 15),
(68, 40, 16),
(69, 40, 17),
(70, 40, 17),
(71, 40, 17),
(72, 40, 17),
(73, 40, 17),
(74, 40, 18),
(75, 40, 18),
(76, 40, 18),
(77, 40, 18),
(78, 40, 19),
(79, 40, 19),
(80, 40, 19),
(81, 40, 19),
(82, 40, 20),
(83, 40, 20),
(84, 40, 20),
(85, 40, 21),
(86, 40, 21),
(87, 40, 21),
(88, 40, 21),
(89, 40, 22),
(90, 40, 22),
(91, 40, 22),
(92, 40, 23),
(93, 40, 23),
(94, 40, 23),
(95, 40, 24),
(96, 40, 24),
(97, 40, 24),
(98, 40, 25),
(99, 40, 25),
(100, 40, 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cardtypes`
--
ALTER TABLE `cardtypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `showtypes`
--
ALTER TABLE `showtypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cardtypes`
--
ALTER TABLE `cardtypes`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `showtypes`
--
ALTER TABLE `showtypes`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
