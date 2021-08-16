-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 août 2021 à 07:03
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSociale` char(32) NOT NULL,
  `typeSociete` char(25) DEFAULT NULL,
  `activite` char(25) DEFAULT NULL,
  `adresse` char(255) DEFAULT NULL,
  `telephoneClient` char(15) DEFAULT NULL,
  `nature` char(25) DEFAULT NULL,
  `CA` decimal(10,0) DEFAULT NULL,
  `effectif` int(11) DEFAULT NULL,
  `commentComm` text,
  `idContact` int(11) DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `raisonSociale`, `typeSociete`, `activite`, `adresse`, `telephoneClient`, `nature`, `CA`, `effectif`, `commentComm`, `idContact`) VALUES
(1, 'il était un petit navire', 'public', 'fruit', '55 av sgt bob', '01.02.03.04.05', 'nouveau', '46262', 56, 'bon client', NULL),
(2, 'La maison Fournier', 'privé', 'boulanger', '75 av maraicher', '02.03.04.05.06', '', '666116', 65, 'top', NULL),
(3, 'Soleillans', '', '', '', '03.04.05.04.05', '', '506', 65, '', NULL),
(4, 'Fromagerie d\'Auxon', '', '', '', '04.05.06.07.08', '', '45', 45, '', NULL),
(5, 'invitation à la ferme', '', '', '', '02.06.08.09.07', '', '54', 445, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

DROP TABLE IF EXISTS `collaborateur`;
CREATE TABLE IF NOT EXISTS `collaborateur` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nomCollabo` char(32) NOT NULL,
  `prenomCollabo` char(32) NOT NULL,
  `contrat` char(32) DEFAULT NULL,
  `qualification` char(20) NOT NULL,
  `salaireBrut` decimal(10,0) DEFAULT NULL,
  `dateDebutContrat` date DEFAULT NULL,
  `dateFinContrat` date DEFAULT NULL,
  `photo` char(255) NOT NULL,
  `mdp` char(255) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`matricule`, `nomCollabo`, `prenomCollabo`, `contrat`, `qualification`, `salaireBrut`, `dateDebutContrat`, `dateFinContrat`, `photo`, `mdp`) VALUES
(1, 'rovere', 'alex', 'cdi', 'administrateur', NULL, NULL, NULL, '', '$2y$10$Eu4WLSFKurFqvT6XFPRPcOe6fU4OiRs99OX5v715of8BerGcgMxPC'),
(2, 'bob', 'eponge', NULL, 'utilisateur', NULL, NULL, NULL, '', '$2y$10$Eu4WLSFKurFqvT6XFPRPcOe6fU4OiRs99OX5v715of8BerGcgMxPC');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `nomContact` char(32) NOT NULL,
  `prenomContact` char(32) NOT NULL,
  `telContact` char(15) NOT NULL,
  `photo` char(255) NOT NULL,
  `fonctionContact` char(25) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nomContact`, `prenomContact`, `telContact`, `photo`, `fonctionContact`, `idClient`) VALUES
(1, 'nom', 'prenom', 'telephone', 'photo', NULL, NULL),
(2, 'aze', 'ea', 'aez', 'aez', NULL, NULL),
(3, 'za', 'zea', 'eza', 'eaz', NULL, NULL),
(4, 'marley', 'bob', '06206066', 'rasta', NULL, NULL),
(5, 'marley', 'bob', '06060606606', 'rasta', NULL, NULL),
(6, 'eza', 'aez', 'aez', 'aez', NULL, NULL),
(7, 'aez', 'aez', 'eaz', 'aez', NULL, NULL),
(8, 'marley', 'jean', '06646', '26126', NULL, 1),
(9, 'azeaaz', 'aezaze', 'aez', 'aze', NULL, 1),
(10, 'azeaaz', 'aezaze', 'aez', 'aze', NULL, 1),
(11, 'azeaaz', 'aezaze', 'aez', 'aze', NULL, 1),
(12, 'fzeaez', 'azeaez', 'aezeaz', 'eazza', NULL, 1),
(13, 'eazea', 'eeae', 'aze', 'azeaae', NULL, 2),
(14, 'eazea', 'eeae', 'aze', 'azeaae', NULL, 2),
(15, 'eazea', 'eeae', 'aze', 'azeaae', NULL, 2),
(16, 'eazea', 'eeae', 'aze', 'azeaae', NULL, 2),
(17, 'eazea', 'eeae', 'aze', 'azeaae', NULL, 2),
(18, 'aezeaea', 'eee', 'zeazeee', 'eaee', NULL, 2),
(19, 'aezeaea', 'eee', 'zeazeee', 'eaee', NULL, 2),
(20, 'qds', 'qsdqsd', 'qdsqs', 'qdsdq', NULL, 1),
(21, 'azezaeaea', 'aezee', 'azeza', 'aze', NULL, 1),
(22, 'arzarzarz', 'rrrzarara', 'rzarrar', 'rrarz', NULL, 1),
(23, 'eaaezzaeaz', 'ezeae', 'aezeae', 'azeae', NULL, 4),
(24, 'marley', 'bob', '0600606', '626262', NULL, 14),
(25, 'ze', 'aez', 'aez', 'eaz', NULL, 1),
(26, '', '', '', '', NULL, 1),
(27, '', '', '', '', NULL, 1),
(28, '', '', '', '', NULL, 1),
(29, '', '', '', '', NULL, 1),
(30, '', '', '', '', NULL, 1),
(31, '', '', '', '', NULL, 1),
(32, '', '', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `idDoc` int(11) NOT NULL AUTO_INCREMENT,
  `titre` char(255) DEFAULT NULL,
  `resume` char(255) DEFAULT NULL,
  `dateEdition` date DEFAULT NULL,
  `idContact` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDoc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`idDoc`, `titre`, `resume`, `dateEdition`, `idContact`) VALUES
(1, 'DEVIS', '1500€', NULL, 1),
(2, 'DEVIS', '1500€', NULL, 22),
(3, 'DEVIS', '1500€', NULL, 25),
(4, 'DEVIS', '1500€', NULL, 8),
(5, 'DEVIS2', '1500€', NULL, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
