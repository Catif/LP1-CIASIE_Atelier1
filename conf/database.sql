-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 08 nov. 2022 à 15:26
-- Version du serveur :  10.5.18-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `LP1-CIASIE_Atelier1`
--

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(11) NOT NULL,
  `id_picture` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Galery`
--

CREATE TABLE `Galery` (
  `id` int(11) NOT NULL,
  `title` varchar(55) DEFAULT NULL,
  `tags` varchar(55) DEFAULT NULL,
  `private` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Galery_Tag`
--

CREATE TABLE `Galery_Tag` (
  `id_tag` int(11) NOT NULL,
  `id_galery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Organization`
--

CREATE TABLE `Organization` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Picture`
--

CREATE TABLE `Picture` (
  `id` int(11) NOT NULL,
  `id_galery` int(11) DEFAULT NULL,
  `title` varchar(55) DEFAULT NULL,
  `name_file` varchar(55) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Picture_Tag`
--

CREATE TABLE `Picture_Tag` (
  `id_tag` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Tag`
--

CREATE TABLE `Tag` (
  `id` int(10) NOT NULL,
  `tag` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User_Galery`
--

CREATE TABLE `User_Galery` (
  `id_user` int(11) DEFAULT NULL,
  `id_galery` int(11) DEFAULT NULL,
  `role` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User_Organization`
--

CREATE TABLE `User_Organization` (
  `id_user` int(11) DEFAULT NULL,
  `id_organization` int(11) DEFAULT NULL,
  `role` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_picture` (`id_picture`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Galery`
--
ALTER TABLE `Galery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Galery_Tag`
--
ALTER TABLE `Galery_Tag`
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `Organization`
--
ALTER TABLE `Organization`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `Picture_Tag`
--
ALTER TABLE `Picture_Tag`
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_picture` (`id_picture`);

--
-- Index pour la table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User_Galery`
--
ALTER TABLE `User_Galery`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `User_Organization`
--
ALTER TABLE `User_Organization`
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_orga` (`id_organization`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`id_picture`) REFERENCES `Picture` (`id`);

--
-- Contraintes pour la table `Galery_Tag`
--
ALTER TABLE `Galery_Tag`
  ADD CONSTRAINT `Galery_Tag_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `Galery` (`id`),
  ADD CONSTRAINT `Galery_Tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `Tag` (`id`);

--
-- Contraintes pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `Picture_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `Galery` (`id`);

--
-- Contraintes pour la table `Picture_Tag`
--
ALTER TABLE `Picture_Tag`
  ADD CONSTRAINT `Picture_Tag_ibfk_1` FOREIGN KEY (`id_picture`) REFERENCES `Picture` (`id`),
  ADD CONSTRAINT `Picture_Tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `Tag` (`id`);

--
-- Contraintes pour la table `User_Galery`
--
ALTER TABLE `User_Galery`
  ADD CONSTRAINT `User_Galery_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `Galery` (`id`),
  ADD CONSTRAINT `User_Galery_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `User_Organization`
--
ALTER TABLE `User_Organization`
  ADD CONSTRAINT `fk_id_orga` FOREIGN KEY (`id_organization`) REFERENCES `Organization` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
