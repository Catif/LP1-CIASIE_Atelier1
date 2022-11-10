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

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_picture` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galery`
--

CREATE TABLE `galery` (
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

CREATE TABLE `galery_tag` (
  `id_tag` int(11) NOT NULL,
  `id_galery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
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

CREATE TABLE `picture_tag` (
  `id_tag` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL,
  `tag` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User_Galery`
--

CREATE TABLE `user_galery` (
  `id_user` int(11) DEFAULT NULL,
  `id_galery` int(11) DEFAULT NULL,
  `role` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User_Organization`
--

CREATE TABLE `user_organization` (
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
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_picture` (`id_picture`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Galery_Tag`
--
ALTER TABLE `galery_tag`
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `Picture_Tag`
--
ALTER TABLE `picture_tag`
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_picture` (`id_picture`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User_Galery`
--
ALTER TABLE `user_galery`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_galery` (`id_galery`);

--
-- Index pour la table `User_Organization`
--
ALTER TABLE `user_organization`
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_orga` (`id_organization`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT pour la table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT pour la table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`);

--
-- Contraintes pour la table `Galery_Tag`
--
ALTER TABLE `galery_tag`
  ADD CONSTRAINT `Galery_Tag_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `galery` (`id`),
  ADD CONSTRAINT `Galery_Tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `Picture_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `galery` (`id`);

--
-- Contraintes pour la table `Picture_Tag`
--
ALTER TABLE `picture_tag`
  ADD CONSTRAINT `Picture_Tag_ibfk_1` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `Picture_Tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `User_Galery`
--
ALTER TABLE `user_galery`
  ADD CONSTRAINT `User_Galery_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `galery` (`id`),
  ADD CONSTRAINT `User_Galery_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `User_Organization`
--
ALTER TABLE `user_organization`
  ADD CONSTRAINT `fk_id_orga` FOREIGN KEY (`id_organization`) REFERENCES `organization` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
