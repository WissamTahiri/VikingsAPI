-- phpMyAdmin SQL Dump
-- Base de données : `vikings`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Structure de la table `weapon`
-- --------------------------------------------------------

CREATE TABLE `weapon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `damage` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Données de la table `weapon`
--

INSERT INTO `weapon` (`type`, `damage`) VALUES
('sword', 150),
('axe', 200),
('bow', 80),
('spear', 120);

-- --------------------------------------------------------
-- Structure de la table `viking`
-- --------------------------------------------------------

CREATE TABLE `viking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `attack` int NOT NULL,
  `defense` int NOT NULL,
  `health` int NOT NULL,
  `weaponId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_viking_weapon` FOREIGN KEY (`weaponId`) REFERENCES `weapon` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Données de la table `viking`
--

INSERT INTO `viking` (`name`, `attack`, `defense`, `health`, `weaponId`) VALUES
('Ragnar', 200, 150, 300, 1),
('Floki', 150, 80, 350, NULL),
('Lagertha', 300, 200, 200, 2),
('Björn', 350, 200, 100, NULL);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
