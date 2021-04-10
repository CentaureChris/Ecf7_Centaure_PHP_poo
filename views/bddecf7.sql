-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 10 avr. 2021 à 19:26
-- Version du serveur :  5.7.32
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `bddecf7`
--

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `id_console` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `marque` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` double(10,2) NOT NULL,
  `capacité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`id_console`, `image`, `marque`, `type`, `modele`, `quantite`, `prix`, `capacité`) VALUES
(3, 'ps4.jpg', 1, 1, 'play 4 slim', 10, 249.95, 500),
(8, 'sony-ps5.jpeg', 1, 1, 'playstation 5 Blue-Ray', 20, 499.99, 1000),
(9, 'xboxSeriesX.jpeg', 2, 1, 'XboxSeries X', 10, 399.95, 750),
(13, 'wii.jpeg', 3, 1, 'wii', 23, 129.99, 200),
(15, 'xboxss.jpeg', 2, 1, 'xbox series S', 22, 299.99, 512),
(16, 'nds.jpeg', 3, 2, 'DS lite', 27, 100.00, 32),
(17, 'PSP-Go.jpeg', 1, 2, 'psp', 22, 149.95, 100),
(18, 'ps4-pro.png', 1, 1, 'ps4 pro', 29, 350.99, 1000),
(19, 'ps5de.jpeg', 1, 1, 'playstation 5 Digital edition', 37, 399.99, 825),
(20, 'switch.jpeg', 3, 2, 'switch', 38, 264.99, 32);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id_console`),
  ADD KEY `fk_type` (`type`),
  ADD KEY `fk_marque` (`marque`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `console`
--
ALTER TABLE `console`
  ADD CONSTRAINT `fk_marque` FOREIGN KEY (`marque`) REFERENCES `marque` (`id_marque`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
