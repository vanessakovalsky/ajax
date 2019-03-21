-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 mars 2019 à 15:16
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kingoludo`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `id_user` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `uid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(24) NOT NULL,
  `nom_jeu` varchar(256) NOT NULL,
  `editeur` varchar(128) DEFAULT NULL,
  `annee` year(4) DEFAULT NULL,
  `photo` varchar(512) DEFAULT NULL,
  `descriptif` varchar(2048) DEFAULT NULL,
  `categorie` varchar(128) DEFAULT NULL,
  `duree` varchar(128) DEFAULT NULL,
  `nombre_joueur` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom_jeu`, `editeur`, `annee`, `photo`, `descriptif`, `categorie`, `duree`, `nombre_joueur`) VALUES
(1, 'Kingdomino modfiÃ©', '', 0000, NULL, '', 'Familiale', '', ''),
(2, 'test', 'tes', 2012, 'img/test.jpg', 'test', 'gestion', '65min', '2-6'),
(3, ':nom_jeu', ':editeur', 0000, ':photo', ':descriptif', ':categorie', ':duree', ':nombre_joueur'),
(4, ':nom_jeu', ':editeur', 0000, ':photo', ':descriptif', ':categorie', ':duree', ':nombre_joueur'),
(5, 'Les colons de catane', 'fsgsf', 2012, 'img/Penguins.jpg', 'sfgqgsq', 'Gestion', '75min', '2-4'),
(6, 'test', 'fsdfg', 2017, '', 'sfqgfqs gs gqsfg', '', '42', '2'),
(8, 'Les colons de catane', 'Asmodée', 2014, NULL, 'Jeu de gestion', '4', '45', '2-4'),
(9, 'gfsgdfs', 'fgsdgs', 2015, NULL, 'fgsgs', '1', '56', '5'),
(12, 'Jeu test', 'editeur', 2018, 'img/Desert.jpg', 'description test', 'Figurine', '45', '4'),
(13, 'dfsgsq', 'gsdgs', 0000, NULL, 'dfqsgqs', '3', '546', '5');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `login` varchar(256) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `presentation` varchar(2048) NOT NULL,
  `avatar` varchar(1024) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `nom`, `prenom`, `role`, `presentation`, `avatar`, `email`, `password`) VALUES
(1, 'toto', 'Dupont', 'Jean-Bernard', 'membre', 'Moi c\'est toto', '/img/avatar/001.png', 'toto@dupont.com', 'password'),
(2, 'admin', 'Admini', 'Test', 'administrateur', 'Compte admin', '/img/avatar/admin.png', 'admin@test.com', 'motdepasse'),
(3, 'tata', 'Test', 'Aurore', 'Membre', 'C\'est moi dÃ©dÃ©', 'img/avatar/Koala.jpg', 'tata@aurore.com', 'tata'),
(4, 'tata', 'Test', 'Aurore', 'Membre', 'C\'est moi dÃ©dÃ©', 'img/avatar/Koala.jpg', 'tata@aurore.com', 'tata');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id_jeu`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD UNIQUE KEY `id_jeu` (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
