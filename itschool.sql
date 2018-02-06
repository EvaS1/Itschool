-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Février 2018 à 15:55
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `itschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(2, 'sweat');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage` int(25) NOT NULL,
  `nomImage` varchar(30) COLLATE utf8_bin NOT NULL,
  `idProduit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `nomImage`, `idProduit`) VALUES
(20, 'listing-2.jpg', 2),
(26, 'Detail-1.jpg', 1),
(27, 'Detail-2.jpg', 1),
(28, 'Detail-3.jpg', 1),
(41, 'listing-3.jpg', 3),
(42, 'listing-4.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(25) NOT NULL,
  `nomProduit` varchar(25) COLLATE utf8_bin NOT NULL,
  `descriptionProduit` varchar(300) COLLATE utf8_bin NOT NULL,
  `caracteristiquesProduit` varchar(300) COLLATE utf8_bin NOT NULL,
  `prixProduit` decimal(10,2) NOT NULL,
  `idCategorie` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `descriptionProduit`, `caracteristiquesProduit`, `prixProduit`, `idCategorie`) VALUES
(1, 'Paris', 'Sweat unisexe chaud et épais, d’une qualité irréprochable tant sur la qualité du molleton que sur la finition.', '65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).', '17.30', 2),
(2, 'Angers', 'Le modèle Angers est un sweat à capuche simple et de bonne qualité.', '65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).', '18.00', 2),
(3, 'Lyon', 'Le sweat unisexe col rond idéal pour les petites tailles et pour ceux qui recherchent un modèle simple, bien coupé et de bonne qualité.', '65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).', '18.70', 2),
(4, 'Nancy', '100% coton ! Le modèle Nancy est un sweat tricolore en coton (molleton non gratté) de bonne qualité avec de très belles finitions.', '65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).', '15.00', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `clé étrangère5` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `clé étrangère4` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `clé étrangère5` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `clé étrangère4` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
