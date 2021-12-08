-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 déc. 2021 à 19:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parisshopping`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Nom` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Prix` float NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `TypeVente` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Nom`, `Description`, `Prix`, `Categorie`, `TypeVente`, `Image`) VALUES
('Manteau Prada', 'Manteau de luxe en fausse fourrure, taille en 36, couleur noire, logo prada blanc. ', 4800, 'Luxe', 'Enchere', 'Image/manteauprada.png'),
('Robe Versace', 'Robe zipee Versace, couleur noire, taille 40, fermeture doree', 2200, 'Luxe', 'Enchere', 'Image/robe.png'),
('Sac Chanel ', 'Classique sac a main Chanel, en cuir matelasse blanc, garniture en metal dore, anse-chaine en metal dore entrelacee de cuir blanc permettant un porte main ou epaule. Doublure interieure en cuir blanc, double. ', 4980, 'Luxe', 'Enchere', 'Image/sacchanel.png'),
('Sac Lady Dior', 'Sac porte a la main. Matiere : cuir noir, coutures cannage, texture matelassee, charms en metal dore pale, fine bandouliere amovible en cuir. ', 3900, 'Luxe', 'Vente immediate', 'Image/sacdior.png'),
('OPYUM Sandales Yves-Saint-Laurent', 'Talon en metal dore, 100% en cuir, hauteur de 11 cm, semelle en cuir, made in Italy. ', 975, 'Luxe', 'Transaction Vendeur-Client', 'Image/talon.png'),
('Bonnet noir ', 'Bonnet noir en cachemire. Tient chaud', 20, 'Regulier', 'Vente immediate', 'Image/bonnet.png'),
('3 paires de chaussettes', '6 chaussettes en coton noires. Taille 37', 15, 'Regulier', 'Transaction Vendeur-Client', 'Image/chaussette.png'),
('Echarpe a carreau', 'Echarpe a carreaux bleu blanche et grise en laine. Parfait pour l\'hiver', 24, 'Regulier', 'Transaction Vendeur-Client', 'Image/echarpe.png'),
('Sac a dos noir ', 'Sac a dos en tissu noir EastPak. Taille unique regular', 37.5, 'Regulier', 'Transaction Vendeur-Client', 'Image/sac.jpg'),
('Sweat a capuche ', 'Sweat a capuche gris. Taille 40. En coton. Avec capuche et col reglable. Tres confortable', 23, 'Regulier', 'Vente immediate', 'Image/sweet.png'),
('Pull Adidas ', 'Pull Adidas Vintage, blanc, sans capuche, d\'occasion, ancien logo \"adidas originals\". ', 59.95, 'Friperie', 'Transaction Vendeur-Client', 'Image/adidas.png'),
('Basket New Balance ', 'Basket en cuir et en plastique, taille 42, blanche, d\'occasion, en tres bon etat. ', 85, 'Friperie', 'Transaction Vendeur-Client', 'Image/basket.png'),
('Chapeau noir', 'Chapeau noir, hiver, avec noeud papillon. ', 32, 'Friperie', 'Vente immediate', 'Image/chapeau.png'),
('Jean droit', 'Jean Levi\'s, droit, taille haute, bleu clair, taille 38, vintage, tres bon état, de 1991. ', 79.9, 'Friperie', 'Transaction Vendeur-Client', 'Image/jean.png'),
('Lunette de soleil', 'Lunettes de soleil, ronde, teintees bleu, en or, Ray-Ban, 2001', 139.95, 'Friperie', 'Vente immediate', 'Image/lunettes.png');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  UNIQUE KEY `pseudo` (`adresse`),
  UNIQUE KEY `mail` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `TypeP` varchar(255) NOT NULL,
  `Numero` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `DateExp` date NOT NULL,
  `Code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `Pseudo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  UNIQUE KEY `Pseudo` (`Pseudo`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
