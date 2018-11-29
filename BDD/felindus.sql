-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 29 nov. 2018 à 18:11
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `felindus`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Adresse` text,
  `Admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id`, `Nom`, `Prenom`, `Telephone`, `Mail`, `Password`, `Adresse`, `Admin`) VALUES
(1, 'JAROSSET', 'Corentin', '0606060606', 'corentinjarosset@nulos.fr', '041097', '69 rue des nulos\r\n59000 Lille\r\n(Avec Antoine)', NULL),
(2, 'FLEURY', 'Antoine', '0602010230', 'antoinefleury@nulos.fr', '180997', 'Avec Corentin', NULL),
(18, 'tr', 'tr', '01215487', 'tr@tr.fr', 'tr', NULL, NULL),
(17, 'Malbranque', 'Louis', '614014164', 'loui@truc.fr', 'tr', NULL, NULL),
(15, 'truc', 'truc', '0512458457', 'truc@truc.fr', 'truc', NULL, NULL),
(16, 'Christiaens', 'Mathilde', '750889070', 'mathildechristiaens@hotmail.fr', 'tr', NULL, 1),
(19, 'profeseur', 'techweb', '0606060606', 'professeurs@gmail.com', 'prof', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdProduit` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Qte` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id`, `IdProduit`, `Nom`, `Qte`, `IdClient`) VALUES
(32, 4, 'chien', 2, 1),
(33, 2, 'Chaton mignon', 1, 1),
(34, 2, 'Chaton mignon', 5, 1),
(35, 4, 'chien', 3, 1),
(36, 6, 'Cheval sans patte', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IdProduit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `QteStock` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IdType` int(11) NOT NULL,
  PRIMARY KEY (`IdProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IdProduit`, `Nom`, `Prix`, `QteStock`, `Photo`, `Description`, `IdType`) VALUES
(1, 'Chaton', 100, 10, 'chatonmignon.jpg', 'Chaton tout doux qui aime les câlins', 1),
(2, 'Chaton mignon', 2000, 5, 'kitten2.jpg', 'Un chaton mignon cher', 1),
(3, 'Chaton moins mignon', 1, 45632, 'chatonmoche.jpg', 'des trucs', 1),
(4, 'chien', 500, 92, 'chien.jpg', 'chien', 2),
(5, 'Chien blanc crême brûler', 100000, 0, 'chienlanccrème.jpg', 'un chien creme bruelr qui  le meme gouts', 2),
(6, 'Cheval sans patte', 1, 113, 'chevalsanspatte.jpg', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `IdType` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`IdType`, `Nom`) VALUES
(1, 'Chat'),
(2, 'Chien'),
(3, 'Cheval');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
