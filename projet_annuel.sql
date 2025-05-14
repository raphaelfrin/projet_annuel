-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 mai 2025 à 19:49
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_annuel`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int NOT NULL AUTO_INCREMENT,
  `Nom_entreprise` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habitude`
--

DROP TABLE IF EXISTS `habitude`;
CREATE TABLE IF NOT EXISTS `habitude` (
  `id_habitude` int NOT NULL AUTO_INCREMENT,
  `Nom_habitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `heure` time NOT NULL,
  `Occurence` varchar(50) NOT NULL,
  `actif` tinyint(1) DEFAULT '0',
  `id_utilisateur` int DEFAULT NULL,
  `habitude_entreprise` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_habitude`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `habitude`
--

INSERT INTO `habitude` (`id_habitude`, `Nom_habitude`, `Tag`, `heure`, `Occurence`, `actif`, `id_utilisateur`, `habitude_entreprise`) VALUES
(12, 'manger', 'sa', '20:00:00', 'quotidienne', 0, 1, 1),
(14, 'se laver les dents', 'st', '08:06:00', 'quotidienne', 0, 1, NULL),
(15, 'Bam Bam', 'sx', '22:00:00', 'hebdomadaire', 0, 1, NULL),
(16, 'courir', 'sport', '18:00:00', 'quotidienne', 0, 1, NULL),
(17, 'se coucher', 'st', '23:30:00', 'quotidienne', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int NOT NULL AUTO_INCREMENT,
  `nom_tache` int NOT NULL,
  `date_debut` datetime NOT NULL,
  `Durée` time NOT NULL,
  `tag` varchar(50) NOT NULL,
  `id_utilisateur` int NOT NULL,
  `tache_entreprise` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_tache`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `ddn` date NOT NULL,
  `id_entreprise` int DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `mail` (`mail`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `mail`, `mdp`, `ddn`, `id_entreprise`) VALUES
(1, 'frin', 'raphael', 'raphael.frin@gmail.com', '$2y$10$lEfDKy/CyJqGHz/CqlN3VeY/14tiYo5LtbSkjbCVgJplKXuHkYOv.', '2005-02-21', NULL),
(2, 'Tarata', 'saperlipopete', 'saperlipopete.tarata@gmail.com', '$2y$10$Xfm7Re493cW01ZOAwqBKee/BPgdapKL5oAGz..Ik6rAsjo6BNHeg6', '2009-09-21', NULL),
(3, 'gemeaux', 'fda', 'rap.ff@gmail.com', '$2y$10$tGdXZPtOtoAxZudc4m9LAuVEvSaVoviM2Y2OZymGide9U0MX4NdDS', '2001-06-25', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `habitude`
--
ALTER TABLE `habitude`
  ADD CONSTRAINT `habitude_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateur_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
