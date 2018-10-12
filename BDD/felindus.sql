-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 oct. 2018 à 18:46
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
  `Adresse` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id`, `Nom`, `Prenom`, `Telephone`, `Mail`, `Password`, `Adresse`) VALUES
(1, 'JAROSSET', 'Corentin', '0606060606', 'corentinjarosset@nulos.fr', 'cacafraise', '69 rue des nulos\r\n59000 Lille\r\n(Avec Antoine)'),
(2, 'FLEURY', 'Antoine', '0602010230', 'antoinefleury@nulos.fr', 'ilovetosuckdicks', 'Avec Corentin');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Qte` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `Description` text NOT NULL,
  `IdType` int(11) NOT NULL,
  PRIMARY KEY (`IdProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IdProduit`, `Nom`, `Prix`, `QteStock`, `Description`, `IdType`) VALUES
(1, 'Chaton', 100, 5, 'Chaton tout doux qui aime les câlins', 1),
(2, 'Chaton mignon', 2000, 12, 'Un chaton mignon cher', 1),
(3, 'Chaton moins mignon', 1, 45632, 'des trucs', 1),
(4, 'chien', 500, 100, 'chien', 2),
(5, 'Chien blanc crême brûler', 100000, 1, 'un chien creme bruelr qui  le meme gouts', 2),
(6, 'Cheval sans patte', 1, 123, '', 3);

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
