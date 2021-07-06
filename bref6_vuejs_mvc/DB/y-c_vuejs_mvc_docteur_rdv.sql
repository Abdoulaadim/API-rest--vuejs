-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 juil. 2021 à 10:16
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
-- Base de données : `y-c_vuejs_mvc_docteur_rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

DROP TABLE IF EXISTS `creneau`;
CREATE TABLE IF NOT EXISTS `creneau` (
  `Num_creneau` int(11) NOT NULL,
  `heure` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`Num_creneau`, `heure`) VALUES
(1, '9H-10H'),
(2, '10H-11H'),
(3, '11H-12H'),
(4, '2H-3H'),
(5, '3H-4H'),
(6, '4H-5H');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `Id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) NOT NULL,
  `Motif` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Num_creneau` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_rdv`),
  KEY `Num_creneau` (`Num_creneau`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`Id_rdv`, `reference`, `Motif`, `Date`, `Num_creneau`) VALUES
(130, '60D9A9E2ADA32', 'maladie', '2021-06-28', '1'),
(133, '60DA2D670D437', 'maladie', '2021-06-30', '6'),
(134, '60DA2D670D437', 'kkddk', '2021-06-30', '4');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(300) NOT NULL DEFAULT 'qsdqdqsd',
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `telephone` int(20) NOT NULL,
  `cin` varchar(20) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `reference`, `nom`, `prenom`, `age`, `telephone`, `cin`) VALUES
(51, '60D9A9E2ADA32', 'ahmed', 'brahim', 34, 856839291, 'HH23211'),
(52, '60D9CEFA1394B', 'ahmed', 'mohamed', 34, 454458, 'HH3234'),
(53, '60DA2D670D437', 'Kabira', 'elbardi', 12, 34834347, 'HH3224');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
