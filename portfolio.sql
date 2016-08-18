-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Août 2016 à 08:32
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(1023) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_user_3` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `content`, `date`, `status`, `id_user`) VALUES
(1, 'test', '2016-07-20 08:01:32', 1, 1),
(2, 'test test', '2016-07-20 08:05:14', 1, 1),
(3, 'test test test', '2016-07-20 08:05:48', 1, 1),
(4, 'Ã§a marche', '2016-07-20 08:20:00', 1, 1),
(5, 'c''est cool !', '2016-07-20 08:20:09', 1, 1),
(6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2016-07-20 08:20:42', 1, 1),
(7, 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', '2016-07-20 08:34:11', 1, 1),
(8, 'spam SPAM SPAM spam', '2016-07-20 12:37:55', 0, 2),
(9, 'non rien', '2016-07-20 12:40:57', 1, 1),
(10, 'spam', '2016-07-20 13:03:23', 0, 2),
(11, 'spam', '2016-07-20 13:03:27', 0, 2),
(12, 'spam', '2016-07-20 13:03:31', 0, 2),
(13, 'spam', '2016-07-20 13:03:37', 0, 2),
(14, 'bye', '2016-07-20 13:03:57', 1, 1),
(15, 'test ajax', '2016-07-27 12:12:13', 1, 1),
(16, 'test prÃ©liminaire', '2016-07-27 12:13:23', 1, 1),
(17, 'test 1', '2016-07-27 12:14:15', 1, 1),
(18, 'test ajax', '2016-07-27 12:16:46', 1, 1),
(19, 'encore', '2016-07-27 12:17:00', 1, 1),
(20, 'test scroll', '2016-07-27 12:34:03', 1, 1),
(21, 'encore', '2016-07-27 12:34:41', 1, 1),
(22, 'test scroll 2', '2016-07-27 12:35:35', 1, 1),
(23, 'test', '2016-07-27 12:37:47', 1, 1),
(24, 'test test', '2016-07-27 12:38:10', 1, 1),
(25, 'nouveau test', '2016-07-27 12:43:51', 1, 1),
(26, 'test', '2016-07-27 12:44:03', 1, 1),
(27, 'test', '2016-07-27 12:44:39', 1, 1),
(28, 'test', '2016-07-27 12:44:43', 1, 1),
(29, 'test', '2016-07-27 12:44:48', 1, 1),
(30, 'test', '2016-07-27 12:44:51', 1, 1),
(31, 'est', '2016-07-27 12:44:56', 1, 1),
(32, 'test', '2016-07-27 12:45:00', 1, 1),
(33, 'encore une fois', '2016-07-27 12:45:48', 1, 1),
(34, 'et encore', '2016-07-27 12:45:54', 1, 1),
(35, 'on approche', '2016-07-27 12:50:45', 1, 1),
(36, 'et maintenant', '2016-07-27 12:52:19', 1, 1),
(37, 'non...', '2016-07-27 12:52:23', 1, 1),
(38, 'et maintenant ?', '2016-07-27 12:53:25', 1, 1),
(39, 'ajustons', '2016-07-27 12:54:49', 1, 1),
(40, 'alors ?', '2016-07-27 12:54:59', 1, 1),
(41, 'overkill', '2016-07-27 12:55:20', 1, 1),
(42, 'ah ?', '2016-07-27 12:56:15', 1, 1),
(43, 'et maintenant', '2016-07-27 12:57:44', 1, 1),
(44, 'voyons', '2016-07-27 12:57:51', 1, 1),
(45, 'alors', '2016-07-27 12:58:55', 1, 1),
(46, 'non...', '2016-07-27 12:58:58', 1, 1),
(47, 'alors', '2016-07-27 13:06:03', 1, 1),
(48, 'pas vraiment', '2016-07-27 13:06:12', 1, 1),
(49, 'test', '2016-07-27 13:10:22', 1, 1),
(50, 'encore', '2016-07-27 13:10:36', 1, 1),
(51, 'ajout', '2016-07-27 13:12:26', 1, 1),
(52, 'nouveau test', '2016-07-27 13:14:32', 1, 1),
(53, 'attends', '2016-07-27 13:14:58', 1, 1),
(54, 'et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes et si je mets un trÃ¨s long texte qui part sur plusieurs lignes ', '2016-07-27 13:15:53', 1, 1),
(55, 'puis un court', '2016-07-27 13:16:10', 1, 1),
(56, 'test', '2016-07-27 13:17:34', 1, 1),
(57, 'pas tout Ã  fait', '2016-07-27 13:17:51', 1, 1),
(58, 'on ajuste...', '2016-07-27 13:18:29', 1, 1),
(59, 'et on teste...', '2016-07-27 13:18:37', 1, 1),
(60, 'et on teste', '2016-07-27 13:23:24', 1, 1),
(61, 'toujours en test', '2016-07-27 13:25:07', 1, 1),
(62, 'test', '2016-07-27 13:25:39', 1, 1),
(63, 'et maintenant', '2016-07-27 13:29:15', 1, 1),
(64, 'nouveau test', '2016-07-27 13:32:38', 1, 1),
(65, 'encore un test', '2016-07-27 13:34:16', 1, 1),
(66, 'et un autre', '2016-07-27 13:36:20', 1, 1),
(67, 'lÃ  Ã§a marche', '2016-07-27 13:36:26', 1, 1),
(68, 'et lÃ ', '2016-07-27 13:37:31', 1, 1),
(69, 'pas tout Ã  fait', '2016-07-27 13:37:40', 1, 1),
(70, 'on remet Ã§a', '2016-07-27 13:43:15', 1, 1),
(71, 'et donc', '2016-07-27 13:44:13', 1, 1),
(72, 'voyons', '2016-07-27 13:47:32', 1, 1),
(73, 'test', '2016-07-27 13:48:47', 1, 1),
(74, 'encore', '2016-07-27 13:52:00', 1, 1),
(75, 'toujours', '2016-07-27 13:53:12', 1, 1),
(76, 'alors', '2016-07-27 13:54:24', 1, 1),
(77, 'et', '2016-07-27 13:54:43', 1, 1),
(78, 'maintenant', '2016-07-27 13:55:51', 1, 1),
(79, 'Ã§a devrait marcher', '2016-07-27 14:17:42', 1, 1),
(80, 'ou pas...', '2016-07-27 14:18:15', 1, 1),
(81, 'donc', '2016-07-27 14:19:10', 1, 1),
(82, 'nouveau test', '2016-07-27 14:19:47', 1, 1),
(83, 'test 2', '2016-07-27 14:19:59', 1, 1),
(84, 'testons sans scroll interne', '2016-07-27 14:22:57', 1, 1),
(85, 'Ã  un moment il risque de ne plus suivre', '2016-07-27 14:23:11', 1, 1),
(86, 'donc en fait le problÃ¨me n''a pas Ã©tÃ© rÃ©glÃ©', '2016-07-27 14:23:25', 1, 1),
(87, '$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top', '2016-07-27 14:23:33', 1, 1),
(88, 'oui mais le focus aide', '2016-07-27 14:23:49', 1, 1),
(89, 'du coup si on fait comme Ã§a onva peut-Ãªtre s''y retrouver', '2016-07-27 14:24:24', 1, 1),
(90, 'oui Ã§a pourrait marcher', '2016-07-27 14:24:33', 1, 1),
(91, '$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top$(''.chat_item_box:last'').position().top', '2016-07-27 14:24:39', 1, 1),
(92, 'a', '2016-07-27 14:24:43', 1, 1),
(93, 'good enough...', '2016-07-27 14:30:48', 1, 1),
(94, 'wait what', '2016-07-27 14:30:54', 1, 1),
(95, 'lÃ  Ã§a marche', '2016-07-27 14:31:03', 1, 1),
(96, 'parce que', '2016-07-27 14:31:17', 1, 1),
(97, 'ah attends', '2016-07-27 14:31:29', 1, 1),
(98, 'ok mais alors', '2016-07-27 14:31:42', 1, 1),
(99, 'ok...', '2016-07-27 14:31:52', 1, 1),
(100, 'c''est pas grave', '2016-07-27 14:32:00', 1, 1),
(101, 'ah si je vois', '2016-07-27 14:32:07', 1, 1),
(102, 'test transfert', '2016-07-27 14:33:56', 1, 1),
(103, 'oui ok Ã§a s''affiche', '2016-07-27 14:34:06', 1, 1),
(104, 'dernier test', '2016-07-27 14:39:06', 1, 1),
(105, 'bien Ã§a fera l''affaire', '2016-07-27 14:39:22', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(127) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `id_sender` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sender` (`id_sender`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `title`, `content`, `date`, `status`, `id_sender`) VALUES
(1, '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 1234567', 'test longueur entete', '2016-07-26 07:50:20', 1, 1),
(2, 'Test formulaire avec des mots', 'Bonjour,\r\n\r\nVoici un message pour vous permettre d''ajuster le CSS. J''espÃ¨re qu''il vous sera utile.\r\n\r\nCordialement,\r\n\r\nTest Contact', '2016-07-26 08:14:20', 1, 2),
(3, 'Test des corrections formulaires ajax', 'Bonjour, je vÃ©rifie que la reprise des erreurs en js marche correctement merci.', '2016-07-28 08:50:44', 0, 3),
(4, 'Nouveau test ajax', 'Apparemment la redirection ne se faisait pas, voyons si Ã§a marche mieux maintenant.', '2016-07-28 09:04:35', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sender`
--

DROP TABLE IF EXISTS `sender`;
CREATE TABLE IF NOT EXISTS `sender` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `email` varchar(63) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `society` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sender`
--

INSERT INTO `sender` (`id`, `name`, `email`, `tel`, `society`) VALUES
(1, '123456789 123456789 123456789 123456789 123456789 123456789 123', 'treslongprenom.treslongnom@longdomaine.com', '', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 1234567'),
(2, 'M. Test Contact', 'test.contact@test.com', '060606060606', 'SociÃ©tÃ© Test & Tests Inc'),
(3, 'Test js', 'abc@a.bc', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `status`, `admin`) VALUES
(1, 'Gael', '$2y$08$tkbfjDnaDdl0bFuRKGEgkO5jqnphE4Jp9I6el8n0IKzaBc/NSqyrS', 1, 1),
(2, 'spam', '$2y$08$OEUC9fufCteTfrMbQ0m0BeKpSfoXtW0zFRh3Sm.xhfbdsM5kk3ZZm', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `work`
--

DROP TABLE IF EXISTS `work`;
CREATE TABLE IF NOT EXISTS `work` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(127) NOT NULL,
  `description` varchar(511) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `work`
--

INSERT INTO `work` (`id`, `title`, `description`, `image`, `url`) VALUES
(1, 'MorphÃ©e', 'Projet de site de e-commerce rÃ©alisÃ© Ã  la 3W Academy', 'http://localhost/my-site/sites/developpement/php/projet_reve/public/images/Capture.png', 'http://localhost/my-site/sites/developpement/php/projet_reve/'),
(2, 'Red Wolf', 'IntÃ©gration de la page principale d''un site dÃ©diÃ© Ã  la moto rÃ©alisÃ©e Ã  la 3W Academy', 'http://localhost/my-site/sites/integration/red_wolf/Capture.png', 'http://localhost/my-site/sites/integration/red_wolf/'),
(3, 'Cuisine Addict', 'Structure d''un blog dÃ©diÃ© Ã  la cuisine rÃ©alisÃ©e Ã  la 3W Academy.', 'http://localhost/my-site/sites/developpement/php/blog/Capture.png', 'http://localhost/my-site/sites/developpement/php/blog/');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `sender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
