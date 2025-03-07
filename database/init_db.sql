-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 23 fév. 2025 à 15:04
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `init_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` blob NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_ville` int DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `users_villes_FK` (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `id_ville` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `capitale` BOOLEAN NOT NULL DEFAULT TRUE,
  `nationalite` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertion villes
INSERT INTO villes (nom, pays, capitale, nationalite) VALUES
('Paris', 'France', TRUE, 'Français'),
('Londres', 'Royaume-Uni', TRUE, 'Britannique'),
('Berlin', 'Allemagne', TRUE, 'Allemand'),
('Madrid', 'Espagne', TRUE, 'Espagnol'),
('Rome', 'Italie', TRUE, 'Italien'),
('Bruxelles', 'Belgique', TRUE, 'Belge'),
('Lisbonne', 'Portugal', TRUE, 'Portugais'),
('Amsterdam', 'Pays-Bas', TRUE, 'Néerlandais'),
('Athènes', 'Grèce', TRUE, 'Grec'),
('Vienne', 'Autriche', TRUE, 'Autrichien');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_villes_FK` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
