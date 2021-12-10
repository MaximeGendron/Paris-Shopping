-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 déc. 2021 à 10:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`pseudo`, `mdp`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Prix` float NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `TypeVente` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Proprio` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `Nom`, `Description`, `Prix`, `Categorie`, `TypeVente`, `Image`, `Proprio`) VALUES
(8, 'Manteau Prada', 'Manteau de luxe en fausse fourrure, taille en 36, couleur noire, logo prada blanc. ', 4800, 'Luxe', 'Enchere', 'Image/manteauprada.png', ''),
(11, 'Robe Versace', 'Robe zipee Versace, couleur noire, taille 40, fermeture doree', 2200, 'Luxe', 'Enchere', 'Image/robe.png', ''),
(13, 'Sac Chanel ', 'Classique sac a main Chanel, en cuir matelasse blanc, garniture en metal dore, anse-chaine en metal dore entrelacee de cuir blanc permettant un porte main ou epaule. Doublure interieure en cuir blanc, double. ', 4980, 'Luxe', 'Enchere', 'Image/sacchanel.png', ''),
(14, 'Sac Lady Dior', 'Sac porte a la main. Matiere : cuir noir, coutures cannage, texture matelassee, charms en metal dore pale, fine bandouliere amovible en cuir. ', 3900, 'Luxe', 'Vente immediate', 'Image/sacdior.png', ''),
(9, 'OPYUM Sandales Yves-Saint-Laurent', 'Talon en metal dore, 100% en cuir, hauteur de 11 cm, semelle en cuir, made in Italy. ', 975, 'Luxe', 'Transaction Vendeur-Client', 'Image/talon.png', ''),
(3, 'Bonnet noir ', 'Bonnet noir en cachemire. Tient chaud', 20, 'Regulier', 'Vente immediate', 'Image/bonnet.png', ''),
(1, '3 paires de chaussettes', '6 chaussettes en coton noires. Taille 37', 15, 'Regulier', 'Transaction Vendeur-Client', 'Image/chaussette.png', ''),
(5, 'Echarpe a carreau', 'Echarpe a carreaux bleu blanche et grise en laine. Parfait pour l\'hiver', 24, 'Regulier', 'Transaction Vendeur-Client', 'Image/echarpe.png', ''),
(12, 'Sac a dos noir ', 'Sac a dos en tissu noir EastPak. Taille unique regular', 37.5, 'Regulier', 'Transaction Vendeur-Client', 'Image/sac.jpg', ''),
(15, 'Sweat a capuche ', 'Sweat a capuche gris. Taille 40. En coton. Avec capuche et col reglable. Tres confortable', 23, 'Regulier', 'Vente immediate', 'Image/sweet.png', ''),
(10, 'Pull Adidas ', 'Pull Adidas Vintage, blanc, sans capuche, d\'occasion, ancien logo \"adidas originals\". ', 59.95, 'Friperie', 'Transaction Vendeur-Client', 'Image/adidas.png', ''),
(2, 'Basket New Balance ', 'Basket en cuir et en plastique, taille 42, blanche, d\'occasion, en tres bon etat. ', 85, 'Friperie', 'Transaction Vendeur-Client', 'Image/basket.png', ''),
(4, 'Chapeau noir', 'Chapeau noir, hiver, avec noeud papillon. ', 32, 'Friperie', 'Vente immediate', 'Image/chapeau.png', ''),
(6, 'Jean droit', 'Jean Levi\'s, droit, taille haute, bleu clair, taille 38, vintage, tres bon état, de 1991. ', 79.9, 'Friperie', 'Transaction Vendeur-Client', 'Image/jean.png', ''),
(7, 'Lunette de soleil', 'Lunettes de soleil, ronde, teintees bleu, en or, Ray-Ban, 2001', 139.95, 'Friperie', 'Vente immediate', 'Image/lunettes.png', ''),
(1, 'truc', '', 15, 'Luxe', 'Achat-Immediat', 'efoipoijfe', 'vendeur'),
(15, 'daz', 'Hello toi comment ca va', 186, 'Luxe', 'Achat-Immediat', 'dzadaz', 'vendeur'),
(255, 'machin', 'truc symaps', 500.2, 'Friperie', 'Achat-Immediat', 'Image/8.png', 'vendeur');

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
  `pp` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `pseudo` (`adresse`),
  UNIQUE KEY `mail` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `adresse`, `email`, `mdp`, `pp`, `banniere`) VALUES
('a', 'aa', 'a', 'a', 'a', 'Image/echarpe.png', 'aaa'),
('Gendron', 'Maxime', '5 bis avenue', 'maximegendron16@hotmail.com', 'brunomars16', 'Image/chapeau.png', 'Image/panier.png'),
('Hina', 'Manolo', '5', 'hina.manolo', 'bonjour', '', '');

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
  `Telephone` varchar(255) NOT NULL,
  PRIMARY KEY (`Telephone`)
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
  `Code` int(11) NOT NULL,
  PRIMARY KEY (`Numero`)
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
  PRIMARY KEY (`Pseudo`,`Email`),
  UNIQUE KEY `Pseudo` (`Pseudo`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Pseudo`, `Email`, `MDP`) VALUES
('vendeur', 'vendeur', 'vendeur'),
('dede', 'de', 'dedee'),
('Maxlamenace', 'maximegendron16@hotmail.com', 'yo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
