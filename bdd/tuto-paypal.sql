-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 août 2021 à 07:06
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
-- Base de données : `tuto-paypal`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210630071236', '2021-06-30 07:12:43', 2611);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_id` int(11) DEFAULT NULL,
  `stripe_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_stripe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last4_stripe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_charge_stripe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_stripe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F52993989D86650F` (`user_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `IDX_2530ADE68D9F6D38` (`order_id`),
  KEY `IDX_2530ADE64584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `prix`) VALUES
(1, 'test', '15');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `status`, `stripe_id`) VALUES
(1, 'paid', 'cs_test_a1fpyb6iHp7IZuapwRRqxdwbnuF73aKmoO3G3O87wKQRg4lsBM9Li05t2u'),
(2, 'pending', 'cs_test_a16foLWC6ftEdc3QSMUnfvecQVWoeXTCL2KCWgVGQw1hAbPm294u4c7hCI'),
(3, 'pending', 'cs_test_a1AhLSi96QklmfiYk4lekCKQLWHSZIatoHT0dAZkVPc29xXaPXQyTUmOi4'),
(4, 'pending', 'cs_test_a1y4HHC6oGCfGIwvjIKienLsnTt1SYmEIdmpQAj5lAuMXIBQt9i8qsctfz'),
(5, 'pending', 'cs_test_a1beW4IYtJXF1pZe1eqpXAsMPU7zdm60UdTNtCgQ8buKNsWeL6KgYskIkj'),
(6, 'pending', 'cs_test_a1k9VxepbCspLVq8ZxKGj8QDZ0QkyfbFvj6BfLd10EZF6ZhcMqOx4YHngK'),
(7, 'pending', 'cs_test_a1eFrD5YqobPJW0E680YaXn9bAT2esr607Yd5hxUOxcvDKCq0dMx0SrafX'),
(8, 'pending', 'cs_test_a1h0dlbcjOtgf7eLerPOgPUNxSL8WZDU0PhvbRoprdydMYvAPTs2db8395'),
(9, 'pending', 'cs_test_a1nfPVtLyMcPHhECh3OUOKl0cf8STMNaKKU53SxhjMtGzIzY0gxZwYUTxb'),
(10, 'pending', 'cs_test_a1XCnSmUMKRd1zjIyAATiYoeXQyLpCCo5MblElH7LLxSVM18tZ8oknyqRD'),
(11, 'pending', 'cs_test_a1qiSOZto9xnaju6iJkmXIan8BhDtacqtxxLF15jGx3y0AFj3YgLNDvTGa'),
(12, 'pending', 'cs_test_a1NopA6HVGacIYmzjGWpe2G5EasJ9vRyAPqEtDtOmLGjXKfyJyx3O3VFYd'),
(13, 'pending', 'cs_test_a1oFRIUhxkRw62foong5dGnuFslQwSwc5wLcRNVRlt8gfwsKmanS9a91We'),
(14, 'pending', 'cs_test_a1f7yT4jMJm35J1ttL5mKa2Up7tOkW38ncN3Zmp3vnUij7bQMnCbphbHN4'),
(15, 'pending', 'cs_test_a1wNiNOJID7VZVov6np3I6HoWdHMUMysO1MPOh6l5RJVjSm14nkVT0j4QH'),
(16, 'pending', 'cs_test_a1N2hbiqYQoD0QZkHdMjs6Paj7fAYDP45paCT7A8xOrVb3HwdefSJnK3k4'),
(17, 'pending', 'cs_test_a1PBPGydyfg2WTGCuuJkFSPbGYWVrIdnzmhirhh58T8hGC70cHt2EiPMID'),
(18, 'pending', 'cs_test_a13SYP1vTIaADwnZsTz9aQFvaDahqOqIRBJocptbt7NFyBz1XCeuqBNRVd'),
(19, 'pending', 'cs_test_a1PpCxuGqhI5WKDgxBjuaeXq1Czdm0iKtrpjELWlZbp6PxKctCfIgXYac2'),
(20, 'pending', 'cs_test_a112Q3fJntmTw1FxJdH0XJUk2wLnPnoHEEu3jMhvBIuTEGifCf4baI5az5'),
(21, 'pending', 'cs_test_a1kVZfPMVBexVx3jfqJWwPJtRKR7hXVYrLJOkF2N2clwdmJJkYPvYPtbVe'),
(22, 'pending', 'cs_test_a1oFplXYuyKYN4C23eLoV6BBNc4MbVdweYgE6lkWFq2mX6ABJjSO8Dka5X'),
(23, 'pending', 'cs_test_a1euyOyuC3hu3B6SeLtv4olcskTQwPVrR3H8UaY5gure0ywqzbnZfrEA3N'),
(24, 'pending', 'cs_test_a1Q1mt9ymlec8xEo7JZkf0U8S1yYfs4kcUmpPvyCc9LS80nu0VY7k00Wpi'),
(25, 'pending', 'cs_test_a1dYPRuV5gCtiYnb2VzAQ6r4YXXTZSF7xULNG6WFhkzWPLxus7vtLLEwNu'),
(26, 'paid', 'cs_test_a1oel6J94jUZAFkNLnnDXD3AeNFvMjWxJP9HatSQj64GUz0F82yBzKzInD'),
(27, 'pending', 'cs_test_a1kYjzRz5Pucc0RcQoBgk2XV5HSmoXHXhuPljMFnBIdVZZJWROnPswTx0U'),
(28, 'pending', 'cs_test_a1X6pP4vaN6rLbizxIMyCm0T3PdIbQRjDG9GjQzjBxP3rJETI6iPcVQd8o'),
(29, 'pending', 'cs_test_a1Wq2w65sGFxDsRtN0ojQqLDSbkGjXq3bHcg7MxGRrwGlp7f6gXZNpi6x5'),
(30, 'pending', 'cs_test_a1myfBwvalDAZwFKFa4sWTrN4Mj9wbwjENGYaN9kJjBxVdfxT8cjMwJkSZ'),
(31, 'paid', 'cs_test_a1EH72QXz3Q39mePrBc6yg2qqZqdpDjM0v9TwtHtA3kQUcCmb8bh2iYKp4'),
(32, 'pending', 'cs_test_a1KUIZXLipodp8pfTDvswKCbgywivnmwgZqgYzfuvbqKjQVdoz9SWgsqgc'),
(33, 'pending', 'cs_test_a1xYltp2hfYnVcWtoToo2ShU4ZquIoAUR0Q41UvTb7HDZcOZfkTUZs9m3H'),
(34, 'pending', 'cs_test_a14m5Ih01XgJpNT0HaoVGvfcEN2HGiYqwxok3r3xRfn1xZLNZjZ5559PSq'),
(35, 'pending', 'cs_test_a1e0Jg8qG6EOrZypnJQRZ0uKCKj04USLQcOdtyJyrIueXXHmTHiCLgdeCq'),
(36, 'pending', 'cs_test_a1wOtttEUrfoZ9daNCVfQWCsrkGUm297avVCSiUbI9PXZyvRvGKrNuYqVj');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F52993989D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `FK_2530ADE64584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2530ADE68D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
