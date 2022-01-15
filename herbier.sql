-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 jan. 2022 à 14:37
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
-- Base de données : `herbier`
--
CREATE DATABASE IF NOT EXISTS `herbier` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `herbier`;

-- --------------------------------------------------------

--
-- Structure de la table `releve`
--

DROP TABLE IF EXISTS `releve`;
CREATE TABLE IF NOT EXISTS `releve` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `donnee` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `releve`
--

INSERT INTO `releve` (`id`, `date`, `lieu`, `donnee`) VALUES
(1, '2022-01-13', 'La Turballe Z3', '1/3/2/3/4/5/6/7/3'),
(2, '2022-01-11', 'La Rochelle R2', '5/4/5/6/3/4/7/6/5'),
(3, '2022-01-03', 'Roscanvel Z1', '3/4/2/7/6/8/5/6/3'),
(4, '2022-01-04', 'Roscanvel Z2', '1/3/2/5/3/3/2/1/5'),
(5, '2022-01-05', 'Morlaix P1', '5/7/8/9/7/6/8/9/8'),
(6, '2022-01-07', 'Roscanvel Z1', '4/5/6/7/9/7/6/5/4'),
(7, '2022-01-09', 'Camaret', '3/4/5/2/4/6/4/7/2'),
(8, '2022-01-14', 'Marseille S5', '9/9/9/9/9/9/9/9/0'),
(9, '2022-01-15', 'Nice H4', '9/0/0/0/0/0/0/0/0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
