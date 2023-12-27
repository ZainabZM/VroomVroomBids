-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 nov. 2023 à 11:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bocal_vroomvroombids`
--

-- --------------------------------------------------------

--
-- Structure de la table `bids`
--

DROP TABLE IF EXISTS `bids`;
CREATE TABLE IF NOT EXISTS `bids` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`post_id`),
  KEY `constraint_post` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `post_id`, `price`, `date`) VALUES
(1, 1, 1, '2000.00', '2023-11-14 14:04:41'),
(2, 1, 1, '2000.00', '2023-11-14 14:05:49'),
(5, 1, 1, '2000.00', '2023-11-15 12:06:49'),
(6, 1, 1, '1500.00', '2023-11-15 12:06:54');

-- --------------------------------------------------------

--
-- Structure de la table `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `years` date NOT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `min_price` decimal(10,2) NOT NULL,
  `date_end` date NOT NULL,
  `winner_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `model`, `brand`, `power`, `years`, `descriptions`, `min_price`, `date_end`, `winner_id`) VALUES
(1, 'Trans Sport SE', 'GM Pontiac', '89kw', '1989-11-03', 'Sous le (petit) capot, GM met les petits moteurs dans les grands avec des moteurs V6 de 3.1 l de 120 équidés, un 3.4 l de 180 ch et 3.8 l de 165 ch. L’Europe n’est pas oubliée avec un 4 cylindres de 2.3 l 16 soupapes de 148 ch en boîte automatique ou manu', '11000.00', '2023-11-15', 0),
(7, '206', 'Peugeot', '60', '2005-07-24', 'La Peugeot 206 est une citadine polyvalente produite par le constructeur automobile français Peugeot de septembre 1998 à 2013. Elle succède à la Peugeot 205 dont la production a cessé en 1999. ', '3000.00', '2023-12-13', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sales_number` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `sales_number`) VALUES
(1, 'toto', 'toto', 'toto@gmail.com', '$2y$10$3uqp7UThaAaxjxhfOQRyb.kAnfIODTvbakzteBvDgvM0mxTRVbwGq', 0),
(2, 'lala', 'lala', 'lala@gmail.com', '$2y$10$1GFeftXbYMSjouK2tBisuuh/xKHJ4omp1uw/ZnmwWKIjUpwSsoosC', 0),
(3, 'Louis-Adrien', 'Debey', 'louisadriendebey@gmail.com', '$2y$10$TELa4uIYJYBdqgPWnRpJVOik3eRbUTBbgsm6zPUaBz8tg4WZzh1um', 0),
(4, 'Wealth', 'Johan', 'johanwealth@gmail.com', '$2y$10$gXfgI/gJzn7xA0peLI2Mp./5P0WgizMWRlXYudh/TmYsVRF62URyG', 0),
(5, 'James', 'Adam', 'jamesadam@gmail.com', '$2y$10$dmKxYMw1WkzHBhojV5rv.u58qz0sm8TKV38wz4KCTg2IY9N4EmfCq', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `constraint_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `constraint_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
