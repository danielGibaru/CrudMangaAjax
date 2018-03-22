-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 22 Mars 2018 à 16:57
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mymangalist`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(5, 'Shonen'),
(6, 'Shojo'),
(7, 'Ecchi'),
(8, 'Seinen');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mangaka` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `IDG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `manga`
--

INSERT INTO `manga` (`id`, `nom`, `mangaka`, `img`, `IDG`) VALUES
(3, 'Dragon Ball', 'Akira Toriyama', 'db.png', 5),
(4, 'Assassination Classroom', 'Yūsei Matsui', 'ac.png', 5),
(5, 'Fruits Basket', 'Natsuki Takaya', NULL, 6),
(6, 'Gewalt', 'Kōji Kōno', NULL, 8),
(12, 'NArup', 'da^k', '', 8),
(14, 'a', 'a', '', 8),
(15, 'zsdef', 'zdefgt', '', 8),
(19, 'zsdefzdaefr', 'zdefgt', '', 8);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDG` (`IDG`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`IDG`) REFERENCES `genre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
