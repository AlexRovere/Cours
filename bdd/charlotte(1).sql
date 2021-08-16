-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 août 2021 à 07:04
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
-- Base de données : `charlotte`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `slug`) VALUES
(16, 'nihil', 'unde et hic et quia consequatur culpa repellendus eum suscipit', 'sit-expedita-unde-soluta-eos-et'),
(17, 'expedita', 'est labore expedita doloremque sunt aut maiores accusantium earum possimus', 'earum-libero-voluptates-aperiam-eum'),
(18, 'et', 'sint dignissimos qui possimus voluptatem beatae molestias non autem exercitationem', 'et-voluptatem-accusantium-rerum-qui-enim-molestiae-neque'),
(19, 'eum', 'consequatur architecto consequatur rerum inventore placeat magni cum velit minima', 'fugiat-et-non-optio'),
(20, 'veniam', 'eos et quo possimus inventore voluptatibus distinctio est nihil nostrum', 'unde-repudiandae-qui-in-sit-sapiente-consequatur-aliquid');

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
('DoctrineMigrations\\Version20210614141504', '2021-06-14 14:15:16', 2590),
('DoctrineMigrations\\Version20210630132909', '2021-06-30 14:40:52', 244);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `online` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8D12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `preview`, `content`, `created_at`, `updated_at`, `online`, `slug`, `file`) VALUES
(24, 16, 'ut expedita modi', 'Quae et sapiente dolorem culpa ad debitis tempora ullam. Tempore exercitationem quo enim.', 'Nulla et quia sit qui unde tempore expedita. In commodi ut minus neque ratione id ullam. Modi ea odit consequatur libero aut eaque dolorum dolore. Dolorum blanditiis nostrum nihil mollitia qui quo atque. Sed dolorem occaecati facilis sequi. Error quis eum voluptatem error.', '2021-03-02 00:20:14', '2021-06-15 04:54:00', 0, 'qui-dolore-tempore', 'placeholder.jpg'),
(25, 16, 'exercitationem nobis eum', 'Sed accusantium corrupti quaerat debitis cupiditate ad nulla. Ut et blanditiis officiis est ad.', 'Dolor libero et iure quibusdam. Soluta vel placeat asperiores qui dolores autem. Hic veniam occaecati fuga beatae excepturi deleniti autem minima. Laudantium tempora ratione quasi adipisci sunt. Voluptas adipisci alias aspernatur culpa mollitia. Expedita exercitationem quos consequatur.', '2021-02-04 23:42:55', '2021-02-24 23:16:59', 1, 'voluptatem-aut', 'placeholder.jpg'),
(26, 17, 'nesciunt adipisci perferendis', 'Corporis illum eum sit adipisci. Fugiat cumque a numquam a qui.', 'Natus reiciendis natus et explicabo adipisci. Repellat exercitationem placeat similique velit. Autem dolor nihil praesentium similique quibusdam. Recusandae rerum sapiente temporibus nobis ut.', '2021-04-27 14:52:01', '2021-02-28 20:17:03', 0, 'eligendi-recusandae-et', 'placeholder.jpg'),
(27, 17, 'molestias repudiandae distinctio', 'Ullam nesciunt rerum distinctio officiis. Quasi commodi vitae voluptatem molestiae.', 'Dolor totam necessitatibus minus possimus similique quis eius. In autem fugit ea doloribus enim ipsam ut quaerat. Nulla et voluptatum harum et. Qui dolorum sed ad. Reprehenderit blanditiis atque sit iusto est natus. Velit officiis cumque velit suscipit eum et voluptatem.', '2021-03-19 09:09:21', '2021-04-13 03:18:09', 0, 'animi-consequuntur-dolorum-non-sed', 'placeholder.jpg'),
(28, 18, 'minima harum itaque', 'Aut quas ea quas ullam. Quis iure ipsum suscipit veritatis. Non ut facere necessitatibus corporis.', 'Qui id nihil velit illum et et dolor. Velit molestiae id omnis minus. Quidem voluptatum unde aliquam sunt voluptas provident commodi est. Ut qui rerum earum illo et incidunt. Et ipsam consequuntur dignissimos officia qui et quia et. Asperiores ducimus totam officia. Accusamus deserunt ex est itaque odio porro quos.', '2021-01-17 15:48:42', '2021-02-09 09:03:13', 1, 'perspiciatis-nobis-molestiae-pariatur', 'placeholder.jpg'),
(29, 18, 'soluta vitae voluptas', 'Possimus quae soluta asperiores et id eum. Sit quasi quasi vitae similique distinctio molestiae.', 'Quidem aut id dignissimos tenetur sit earum. Consequatur velit cupiditate qui delectus illum est. Non sunt consequatur quam unde delectus enim. Quod omnis porro qui quia exercitationem sit.', '2021-02-12 09:59:48', '2021-03-22 01:19:52', 1, 'nihil-asperiores-quas', 'placeholder.jpg'),
(30, 19, 'rerum nisi quisquam', 'Illum sunt repudiandae facere qui non eius neque et. Rerum ex ratione molestias repudiandae.', 'Rerum esse temporibus nobis commodi. Similique illo saepe rerum culpa doloribus. Enim ut placeat consequatur officia. In nisi alias sed quaerat voluptatibus ratione nostrum. Corporis earum laborum laboriosam saepe ipsum repudiandae. Vitae voluptas nemo magnam laboriosam eaque placeat. Provident animi dolores aut earum qui.', '2021-01-19 14:12:51', '2021-04-03 16:02:02', 1, 'voluptas-quidem-est-eum', 'placeholder.jpg'),
(31, 19, 'sed laboriosam consequatur', 'Qui voluptate velit non fuga ea sit ut cum. Consectetur id error assumenda doloremque.', 'Totam et ut pariatur autem eaque autem aut. Veritatis officiis voluptatem sed voluptas. Sed id totam beatae expedita sequi molestiae. Eum ut voluptatem non ipsum. Aliquam quas animi deserunt reprehenderit vel et tempora. Ab magnam tempora aliquam rem libero. Sed voluptate ipsa minima. Ut est sint voluptatum et autem eaque accusamus similique.', '2021-04-23 05:14:41', '2021-03-06 08:32:34', 1, 'id-cum-sit-voluptas', 'placeholder.jpg'),
(32, 20, 'sint consequatur corporis', 'Occaecati est in explicabo suscipit. Ratione dolorem ratione qui.', 'Accusamus explicabo delectus veniam earum laborum qui. Ipsum excepturi sapiente quis. Ut repellendus corporis deserunt tempora voluptas. Occaecati nulla expedita occaecati vero omnis eos est. Nihil eligendi magnam commodi in corrupti accusamus optio. Eos voluptates non vero. Qui accusamus corrupti est in optio.', '2021-06-18 11:12:22', '2021-05-30 12:03:30', 0, 'corrupti-rerum-consequuntur', 'placeholder.jpg'),
(33, 20, 'culpa deleniti ex', 'Molestiae modi libero et sequi ut. Voluptatem enim saepe officiis aut eum aut.', 'Officiis cumque ipsa voluptate saepe pariatur fugiat reprehenderit. Unde voluptate in aut est illo mollitia. Fugiat expedita accusantium libero magni. Et est fuga molestiae harum nemo. Temporibus id expedita doloribus voluptatem amet odio exercitationem. Tempora vitae a quis perferendis assumenda velit. Atque dolores temporibus rerum vitae.', '2021-01-22 01:52:44', '2021-02-24 16:21:35', 1, 'rerum-nam-accusantium-et', 'placeholder.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` longtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gumroad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `online` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `preview`, `price`, `pdf`, `gumroad`, `created_at`, `updated_at`, `online`, `slug`, `file`) VALUES
(23, 16, 'minima quas deleniti', 'Porro ipsum quidem qui quo. Cumque nesciunt ut omnis rerum tempore perspiciatis voluptates quis. Ea dolorem sit nesciunt qui qui pariatur.', NULL, 745, 'placeholder.jpg', NULL, '2021-06-22 05:53:38', '2021-03-12 03:20:17', 0, 'id-tempore-non-possimus-cum-porro-voluptas', 'placeholder.jpg'),
(24, 16, 'nisi sapiente voluptates', 'Eum sunt omnis dolore asperiores nostrum mollitia nisi. Et ut voluptas voluptas nesciunt sit sunt. Et atque enim sint et animi ratione vero in.', NULL, 3603, 'placeholder.jpg', NULL, '2021-02-24 14:54:19', '2021-05-27 04:21:05', 0, 'illum-magnam-illum-expedita-corporis-delectus-et-qui', 'placeholder.jpg'),
(25, 17, 'voluptatem quod ea', 'Aut cupiditate quia quo reiciendis. Officiis debitis voluptatem aperiam qui tenetur. Iste non id odio. Nam quod quidem repudiandae.', NULL, 1433, 'placeholder.jpg', NULL, '2021-03-20 21:06:41', '2021-04-11 21:08:05', 0, 'voluptas-vel-ea-est-et-suscipit-possimus-fuga', 'placeholder.jpg'),
(26, 17, 'recusandae voluptatem consequuntur', 'Atque at quas a dolorum expedita ut. Neque et aut omnis et suscipit voluptatem. Et vitae similique dicta quis neque quisquam eos.', NULL, 2998, 'placeholder.jpg', NULL, '2021-03-15 18:12:35', '2021-02-04 00:27:39', 1, 'iure-earum-enim-quia', 'placeholder.jpg'),
(27, 18, 'aut officiis eligendi', 'Quo distinctio voluptatem fugit odit dolor laborum non. Quia veniam dolores ut cum ullam perspiciatis repudiandae. Eum itaque qui quod alias repellendus et.', NULL, 7642, 'placeholder.jpg', NULL, '2021-06-07 07:28:47', '2021-04-24 18:27:07', 0, 'dolor-aut-voluptas-placeat-blanditiis-nesciunt-soluta-in', 'placeholder.jpg'),
(28, 18, 'repudiandae ut sed', 'Qui id non omnis sit. Atque alias dolores sapiente dolorem. Hic tenetur minus consectetur quia beatae soluta. Quas amet porro tempore et aut nobis asperiores.', NULL, 9876, 'placeholder.jpg', NULL, '2021-03-10 14:56:50', '2021-05-30 03:34:11', 1, 'voluptatem-ut-consequatur-quia-ut-et-quasi', 'placeholder.jpg'),
(29, 19, 'quaerat non quam', 'Qui esse quam optio eos. Quam iste sed quis. Voluptas sed tempore autem minus molestiae dolor. Amet in libero neque est in minima eligendi accusamus.', NULL, 2874, 'placeholder.jpg', NULL, '2021-03-28 02:48:17', '2021-04-02 05:00:17', 1, 'incidunt-aut-aliquam-voluptas-perferendis-animi-possimus-aut-ut', 'placeholder.jpg'),
(30, 19, 'dolorum nulla consectetur', 'Eum officiis itaque facere culpa. Aut occaecati mollitia quaerat. Ut itaque doloribus earum odio. Architecto qui dicta enim.', NULL, 585, 'placeholder.jpg', NULL, '2021-03-11 19:43:51', '2021-06-05 02:13:21', 0, 'earum-non-soluta-et-eos-quaerat', 'placeholder.jpg'),
(31, 20, 'corrupti maxime dicta', 'Quibusdam corporis nihil aliquid suscipit blanditiis voluptatem facilis. Possimus nam quaerat in nihil inventore ratione et.', NULL, 4106, 'placeholder.jpg', NULL, '2021-06-20 20:41:17', '2021-04-26 14:54:03', 0, 'natus-a-fugit-neque-expedita-beatae', 'placeholder.jpg'),
(32, 20, 'sit rerum aperiam', 'Est officiis quisquam aut labore. Rerum dolores molestiae tempore ea. Voluptatibus assumenda nam et distinctio. Qui et voluptate optio sit ipsa non in. Cum impedit laboriosam eos rem.', NULL, 6125, 'placeholder.jpg', NULL, '2021-04-04 01:44:39', '2021-01-26 03:01:36', 1, 'sint-vitae-iste-consectetur-animi-recusandae', 'placeholder.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `status`, `stripe_id`, `email`) VALUES
(1, 'pending', 'cs_test_a1Nn7wd9B3G6g2tz5Xd3y0kW31hLytt9esj8zN3p0uj94fQGEzKPEFgPiQ', NULL),
(2, 'paid', 'cs_test_a1rb9TRdwpT8krkHeJTNgGAeWCDDvFwCihTM64if5QazdM77eykaPrLkzM', NULL),
(3, 'paid', 'cs_test_a1pEMgYZ62iSbv8vclL6EknuCCJdU4r938cqZS4tKdTE7RAD1HbflUbCqV', NULL),
(4, 'paid', 'cs_test_a1MDTI4P1S1Md4VNhZL0ZNlDSCVYNjIep2DCEiN7o8jVCe0DueTLxfEWFz', NULL),
(5, 'pending', 'cs_test_a1KZW3UodwGEvXvgAKzIfmqdu1AjFSyxGfnC7Zhs31Uvk7FtAtI1L6ps2H', NULL),
(6, 'pending', 'cs_test_a1t20H44QPmq9d15jFQFeRbnGbgk12o6UzHjwCUAdRSpb2xVbk7kyphUBi', NULL),
(7, 'pending', 'cs_test_a1bygPREWH5LjfscqfDs1obQAcsVLu3UGKI1q8hOJIm1MJ5sKRgVCHBm0r', NULL),
(8, 'pending', 'cs_test_a1MIMQ7XZ9GGTp5bjDZsuVZZmw7D7opI6yHOCvkkY5b0sC4qDqg0ggBLiA', NULL),
(9, 'pending', 'cs_test_a1JKaP9iCEwfoxyvWCn2tVN1bEVrVTslKqcB39k9GLx7MnPNN7jkWg2dI8', NULL),
(10, 'paid', 'cs_test_a1RuA16xaDiKMTRxRIElntPfwIhBmCzSCbQRzcz8ONNHuAFlStGp2MqXLl', NULL),
(11, 'pending', 'cs_test_a1jykFdlssVNy5gXzNXRuSYmWnyv2I5zwicjsvYqoLmUdffHntIkLV7buO', NULL),
(12, 'paid', 'cs_test_a1YMazl1XCZWuTPs4zkX7Uh0gxgAYlNeDSoEGm6zO7rM6KNIkxGbb06YoP', NULL),
(13, 'paid', 'cs_test_a1kmVZ0fjSGcWX7x1pMgh6o5AbUcjYTbzsdZFFmf05Zw7GutxXHbYwr9BW', 'hello'),
(14, 'paid', 'cs_test_a1wEg5a8Usc7OMgn9CTmfCayf2IApopSASPOJXg52Ayx1GLn1aD5Ld08q2', NULL),
(15, 'paid', 'cs_test_a1Jq0xxcdWid9ctjxmps5VmUHbXUpCiVYrAir6Cf5PpuRv8N97oEf4CxVF', 'cus_JmGGbPOli82EeC'),
(16, 'paid', 'cs_test_a1yxLPkt17jaQfQgsL7abR0goAbKN42jZGbJsUaMaInfnCzDY9UTeZayQt', NULL),
(17, 'pending', 'cs_test_a1wn14rE6omzr2PhrgS9tXRSmPRur65880ivYlvFOPwL06Pv0depUBZGaz', NULL),
(18, 'pending', 'cs_test_a15JDUsUfQ1J9FwfGJBJyV3aZKLmsIgo0IpyDcLBFGr706EiuCG8KeSG2G', NULL),
(19, 'paid', 'cs_test_a1sP8HIH3t7Fi4rFyyBRFENirt8Ex9uYg9Z5WNAeiNvw2etg3fN2WzIypK', NULL),
(20, 'pending', 'cs_test_a1HLooD46Q3oT4tG0TTgQJ3xgJZbNU7Lylpj9NJUEHpitW0p1FcCHEFhCy', NULL),
(21, 'paid', 'cs_test_a1uXi3in19SEJrAbiJODFuvNrvdjiJjcHEh5ewPiElBN9CyGs48WRctiUR', 'bonjour'),
(22, 'paid', 'cs_test_a1nrXtgpbGjiwNnrCzRtFSmFjGE7qtDEuk1gwJma1EQaioKtfSgmuCcGi8', NULL),
(23, 'pending', 'cs_test_a1wd5a5OqdXdKO4bUJGyhqeEViG7pnvJhGCpupYG12ZgEx1Tq0AYKI4aUF', NULL),
(24, 'paid', 'cs_test_a1hV7rCbgktexezlC90Bz5Rqh24LxCBsm54LemgaQ1EPU6JfyZ3xcDiRTy', 'user@test.com'),
(25, 'pending', 'cs_test_a1gx7NBN0ryhQcL9xZrMiy48HYJLKceM21qxvejTW4gRq14ryttGBaZtsz', NULL),
(26, 'pending', 'cs_test_a1Uv1ANVYVlndoBNrjskHZOA84t6RDD1MeaVbjWLMYVVlM3wi9pGfIqP7I', NULL),
(27, 'pending', 'cs_test_a1wiaXaVCJmlwZXdb3wJu1wmpR9fukiYbBPNKbve7yQ2V4RlZIdyrcb519', NULL),
(28, 'paid', 'cs_test_a1Zy1fzpaoKanBK2kzVZDtsMI5YeaThfjwVtI8jEhP7hpsHGd66nPSxhYq', 'user@test.com'),
(29, 'paid', 'cs_test_a1nKYsu9v9TrJhvrpW6iLtZNYFxf6w4uhOFyTdmHU8EiNAKC3nyFiDac3T', 'wormz91@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`) VALUES
(3, 'user@test.com', '[\"ADMIN\"]', '$2y$13$aM.h8BA0fmfsjpY1CnOlfuHmxZgJAkJhHlzoOW0jEM2PFniUVBDsu', 'Georges', 'Perret');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
