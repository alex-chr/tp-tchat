-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 mars 2020 à 10:28
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat_mmi`
--

-- --------------------------------------------------------

--
-- Structure de la table `msg_admin`
--

CREATE TABLE `msg_admin` (
  `message` varchar(5000) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `msg_admin`
--

INSERT INTO `msg_admin` (`message`, `user`) VALUES
('message important', 'admin'),
('test message admin', 'admin'),
('test message admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tab_msg`
--

CREATE TABLE `tab_msg` (
  `user` varchar(50) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tab_msg`
--

INSERT INTO `tab_msg` (`user`, `message`) VALUES
('user', 'test 1'),
('admin', 'test admin'),
('user2', 'test user 2'),
('user3', 'test message user3'),
('admin', 'test message admin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `statut` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `password`, `mail`, `statut`) VALUES
('user', 'mdp', 'ui@gmail.com', 'user'),
('admin', 'mdp', 'ok@gmail.com', 'admin'),
('user2', 'mdp', 'ui@gmail.com', 'user'),
('user3', 'mdp', 'ui@gmail.com', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
