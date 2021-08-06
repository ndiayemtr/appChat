-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 août 2021 à 15:33
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
-- Base de données : `appchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `outgoing_msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `outgoing_msg_id`, `incoming_msg_id`, `message`) VALUES
(1, 437970859, 62389528, 'hello'),
(2, 437970859, 62389528, 'hello Matar'),
(3, 437970859, 62389528, 'hello Matar Ndiaye'),
(4, 437970859, 62389528, 'hello Matar Ndiaye'),
(5, 437970859, 62389528, 'cool'),
(6, 437970859, 62389528, 'les aaite'),
(7, 437970859, 62389528, 'jjjd'),
(8, 437970859, 62389528, 'hello'),
(9, 860535871, 62389528, 'hoooo'),
(10, 62389528, 860535871, 'coll'),
(11, 62389528, 860535871, 'je pense '),
(12, 437970859, 437970859, 'oooo'),
(13, 62389528, 437970859, 'jjjj'),
(14, 860535871, 437970859, 'hh'),
(15, 62389528, 860535871, 'ndeye lo'),
(16, 62389528, 62389528, 'matar '),
(17, 860535871, 62389528, 'lou bÃ©ss'),
(18, 860535871, 62389528, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk'),
(19, 62389528, 946238313, 'Salam'),
(20, 62389528, 946238313, 'lou bÃ©ss'),
(21, 946238313, 62389528, 'cool et toi'),
(22, 946238313, 62389528, 'magal gui nak'),
(23, 946238313, 62389528, 'c\'est doune'),
(24, 62389528, 946238313, 'Matar'),
(25, 62389528, 946238313, 'diko prÃ©parer bou bakh'),
(26, 62389528, 946238313, 'Matar'),
(27, 62389528, 946238313, 'c\'est Matar');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 62389528, 'Matar', 'Ndiaye', 'ndiayemtr@gmail.com', 'ndiay', '1627637462profil1.jpg', 'Offline now'),
(2, 860535871, 'Fatma', 'Ba', 'ba@gmail.com', 'ndiay', '1627647023profil3.jpg', 'Offline now'),
(3, 437970859, 'Maman', 'Dieng', 'maman@gmail.com', 'ndiay', '1627998660profil2.png', 'Offline now'),
(4, 946238313, 'Medoune', 'Beye', 'beye@example.sn', 'ndiay', '1628255981profil4.png', 'Offline now');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
