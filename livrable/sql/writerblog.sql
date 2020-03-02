-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 fév. 2020 à 11:22
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `writerblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_type` varchar(6) COLLATE utf8_bin NOT NULL COMMENT 'member OR admin',
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'nickname',
  `profile_picture` text COLLATE utf8_bin NOT NULL COMMENT 'URL of picture',
  `email` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'email used for connection',
  `pwd` text COLLATE utf8_bin NOT NULL COMMENT 'password',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `first_name`, `last_name`, `user_type`, `pseudo`, `profile_picture`, `email`, `pwd`) VALUES
(2, 'Florent', 'Matéos', 'admin', 'Admin_flo.mat', 'public/images/basicProfile.png', 'flomat50@gmail.com', '$2y$10$afGnx/YFCI81XEz1nHEHEuafrf1t6l1Ef9Yl/oobQJaX1U4mpzCxW'),
(3, 'Florent', 'Matéos', 'member', 'misuna', 'public/images/basicProfile.png', 'flomat96@live.fr', '$2y$10$GlOs8NMq5JEvSm/l2YSEo.NxqPRRbAS1nzzbVHPSiEGCm7o91taHm'),
(4, 'Florent', 'Matéos', 'member', 'fdsfsd', 'public/images/basicProfile.png', 'mamouchkalavaud46@gmail.com', '$2y$10$Af/g47iworW1EJnBTZdiI.Xk3Dc0MHsJBqafNm9gOw.LeVSgWhtr.');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'autor of comment',
  `id_post` int(11) NOT NULL COMMENT 'id of commented post',
  `comment_text` text COLLATE utf8_bin NOT NULL COMMENT 'text of comment',
  `comment_date` date NOT NULL COMMENT 'creation date of comment',
  `moderation` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'reported comment',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `autor`, `id_post`, `comment_text`, `comment_date`, `moderation`) VALUES
(5, 'Admin_flo.mat', 1, 'Coucou test', '2020-02-18', 0),
(3, 'Admin_flo.mat', 1, 'cdsgsd', '2020-02-07', 1),
(6, 'Admin_flo.mat', 1, 'Coucou test', '2020-02-19', 0),
(9, 'Admin_flo.mat', 2, 'Coucou test', '2020-02-26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'title of post',
  `content` text COLLATE utf8_bin NOT NULL COMMENT 'content of post',
  `creation_date` date NOT NULL COMMENT 'date of post creation',
  `autor` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `creation_date`, `autor`) VALUES
(1, 'coucou', 'fdsfdsfds', '2020-01-31', 'admin'),
(2, 'nouvelle pag de test', '<p><strong>Voici un petit test<em> coucou</em></strong></p>', '2020-02-25', 'Admin_flo.mat');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
