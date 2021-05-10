-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 10 mai 2021 à 05:58
-- Version du serveur :  8.0.23
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `contenu_article` text,
  `date_creation_article` varchar(45) DEFAULT NULL,
  `date_publication_article` varchar(45) DEFAULT NULL,
  `categorie_id_categorie` int NOT NULL,
  `statut_id_statut` int NOT NULL,
  `titre_article` varchar(255) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `fk_article_categorie_idx` (`categorie_id_categorie`),
  KEY `fk_article_statut1_idx` (`statut_id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_has_tag`
--

DROP TABLE IF EXISTS `article_has_tag`;
CREATE TABLE IF NOT EXISTS `article_has_tag` (
  `article_id_article` int NOT NULL,
  `tag_id_tag` int NOT NULL,
  PRIMARY KEY (`article_id_article`,`tag_id_tag`),
  KEY `fk_article_has_tag_tag1_idx` (`tag_id_tag`),
  KEY `fk_article_has_tag_article1_idx` (`article_id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(45) DEFAULT NULL,
  `description_categorie` text,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int NOT NULL AUTO_INCREMENT,
  `statut_article` enum('Brouillin','Publié','Corbeille') DEFAULT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `nom_tag` varchar(45) DEFAULT NULL,
  `description_tag` text,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_categorie` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `fk_article_statut1` FOREIGN KEY (`statut_id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD CONSTRAINT `fk_article_has_tag_article1` FOREIGN KEY (`article_id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `fk_article_has_tag_tag1` FOREIGN KEY (`tag_id_tag`) REFERENCES `tag` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
