-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 mai 2021 à 11:30
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
-- Base de données : `surletas_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `userNameAdmin` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `emailAdmin` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `mdpAdmin` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `belongs`
--

DROP TABLE IF EXISTS `belongs`;
CREATE TABLE IF NOT EXISTS `belongs` (
  `idDeveloper` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  PRIMARY KEY (`idDeveloper`,`idCat`),
  KEY `I_FK_BELONGS_DEVELOPER` (`idDeveloper`),
  KEY `I_FK_BELONGS_CATEGORIE` (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `nameCat` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nameCat`) VALUES
(1, 'Programming/Coding'),
(2, 'Data Science & Analysis'),
(3, 'Databases'),
(4, 'Social Media App'),
(5, 'Software Testing'),
(6, 'Mobile App Development'),
(7, 'Email Template Development'),
(8, 'CMS Development'),
(9, 'eCommerce CMS Development'),
(10, 'ERP/CRM Development'),
(11, 'Website Development'),
(12, 'Game Development');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `lastNameClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `firstNameClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `phoneClient` int(11) DEFAULT NULL,
  `adressClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `countryClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cityClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `emailClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `mdpClient` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `dateClient` date DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `lastNameClient`, `firstNameClient`, `phoneClient`, `adressClient`, `countryClient`, `cityClient`, `emailClient`, `mdpClient`, `dateClient`) VALUES
(5, 'damri', 'loubna', 627208446, '14 Rue Fernand Pelloutier Appart B44, immeuble B2', 'France', 'Choisy-le-Roi', 'loubnadamri155@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-05-05'),
(6, 'damri', 'loubna', 627208446, '14 Rue Fernand Pelloutier Appart B44, immeuble B2', 'France', 'Choisy-le-Roi', 'loubnadamri111@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-05-05'),
(7, 'damri', 'loubna', 627208446, '14 Rue Fernand Pelloutier Appart B44, immeuble B2', 'France', 'Choisy-le-Roi', 'loubnadamri1112@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `delivredtask`
--

DROP TABLE IF EXISTS `delivredtask`;
CREATE TABLE IF NOT EXISTS `delivredtask` (
  `idDelivredTask` int(11) NOT NULL AUTO_INCREMENT,
  `idTask` int(11) DEFAULT NULL,
  `text` char(255) COLLATE utf8_bin DEFAULT NULL,
  `taskDocRelase` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idDelivredTask`),
  KEY `I_FK_DELIVREDTASK_TASK` (`idTask`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `developer`
--

DROP TABLE IF EXISTS `developer`;
CREATE TABLE IF NOT EXISTS `developer` (
  `idDeveloper` int(11) NOT NULL AUTO_INCREMENT,
  `lastNameDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `firstNameDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `phoneDeveloper` int(11) DEFAULT NULL,
  `adressDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `countryDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cityDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `emailDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `mdpDeveloper` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idDeveloper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `idTask` int(11) NOT NULL AUTO_INCREMENT,
  `docTask` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `nameTask` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `topicTask` char(255) COLLATE utf8_bin DEFAULT NULL,
  `idCat` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idDeveloper` int(11) DEFAULT NULL,
  `statusTask` varchar(128) COLLATE utf8_bin DEFAULT 'En attente',
  `dateTask` date DEFAULT NULL,
  `validTask` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `priceTask` int(11) DEFAULT NULL,
  `timeTask` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTask`),
  KEY `I_FK_TASK_ADMIN` (`idAdmin`),
  KEY `I_FK_TASK_CLIENT` (`idClient`),
  KEY `I_FK_TASK_CATEGORIE` (`idCat`),
  KEY `I_FK_TASK_DEVELOPER` (`idDeveloper`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`idTask`, `docTask`, `nameTask`, `topicTask`, `idCat`, `idClient`, `idDeveloper`, `statusTask`, `dateTask`, `validTask`, `priceTask`, `timeTask`, `idAdmin`) VALUES
(1, '', 'dsbh', 'dfnb', 1, 5, NULL, 'En attente', '2021-05-05', NULL, NULL, NULL, NULL),
(2, '', 'test01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed diam tempor eros vulputate dignissim. Nunc in turpis ut arcu semper eleifend. Morbi mi ante, mollis ut laoreet ac.', 2, 7, NULL, 'En attente', '2021-05-05', NULL, NULL, NULL, NULL),
(3, '', 'cvn ', 'g,v,', 10, 7, NULL, 'En attente', '2021-05-05', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
