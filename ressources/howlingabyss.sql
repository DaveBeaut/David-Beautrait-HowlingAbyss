-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 19:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `howlingabyss`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE `acheter` (
  `idpartie` int(11) NOT NULL,
  `idequipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acheter`
--

INSERT INTO `acheter` (`idpartie`, `idequipement`) VALUES
(178, 243),
(178, 244),
(178, 245),
(178, 246),
(178, 247),
(178, 248),
(179, 249),
(179, 250),
(179, 251),
(179, 252),
(179, 253),
(179, 254),
(180, 255),
(180, 256),
(180, 257),
(180, 258),
(180, 259),
(180, 260),
(181, 261),
(181, 262),
(181, 263),
(181, 264),
(182, 265),
(182, 266),
(182, 267),
(182, 268),
(182, 269),
(182, 270),
(183, 271),
(183, 272),
(183, 273),
(184, 274),
(184, 275),
(184, 276),
(185, 277),
(185, 278),
(185, 279),
(185, 280),
(185, 281),
(186, 282),
(186, 283),
(186, 284),
(187, 285),
(187, 286),
(187, 287),
(187, 288);

-- --------------------------------------------------------

--
-- Structure de la table `champions`
--

CREATE TABLE `champions` (
  `idchampion` int(11) NOT NULL,
  `nomchampion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `champions`
--

INSERT INTO `champions` (`idchampion`, `nomchampion`) VALUES
(189, 'Aatrox'),
(190, 'Ahri'),
(191, 'Anivia'),
(192, 'Azir'),
(193, 'Amumu'),
(194, 'Zac'),
(195, 'Zoe'),
(196, 'Zeri'),
(197, 'Ziggs'),
(198, 'Zed');

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `idequipement` int(11) NOT NULL,
  `nomequipement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`idequipement`, `nomequipement`) VALUES
(243, 'Boots'),
(244, 'Faerie Charm'),
(245, 'Rejuvenation Bead'),
(246, 'Rejuvenation Bead'),
(247, 'Blasting Wand'),
(248, 'Cloth Armor'),
(249, 'Cloak of Agility'),
(250, 'Blasting Wand'),
(251, 'Cloak of Agility'),
(252, 'Blasting Wand'),
(253, 'Cloak of Agility'),
(254, 'Cloth Armor'),
(255, 'Ruby Crystal'),
(256, 'Cloak of Agility'),
(257, 'Blasting Wand'),
(258, 'Sapphire Crystal'),
(259, 'Emberknife'),
(260, 'Long Sword'),
(261, 'Emberknife'),
(262, 'Pickaxe'),
(263, 'Long Sword'),
(264, 'Muramana'),
(265, 'Null-Magic Mantle'),
(266, 'Emberknife'),
(267, 'Last Whisper'),
(268, 'Structure Bounty'),
(269, 'Glacial Buckler'),
(270, 'Broken Stopwatch'),
(271, 'Rejuvenation Bead'),
(272, 'Long Sword'),
(273, 'Ruby Crystal'),
(274, 'Maw of Malmortius'),
(275, 'Pickaxe'),
(276, 'Lord Dominik\'s Regards'),
(277, 'Ruby Crystal'),
(278, 'Perfectly Timed Stopwatch'),
(279, 'Ruby Crystal'),
(280, 'Sheen'),
(281, 'Cloak of Agility'),
(282, 'Amplifying Tome'),
(283, 'Chain Vest'),
(284, 'Blasting Wand'),
(285, 'Blasting Wand'),
(286, 'Cloth Armor'),
(287, 'Glacial Buckler'),
(288, 'Boots of Swiftness');

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `idpartie` int(11) NOT NULL,
  `idchampion` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `datepartie` datetime NOT NULL,
  `resultatpartie` enum('victory','defeat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`idpartie`, `idchampion`, `idutilisateur`, `datepartie`, `resultatpartie`) VALUES
(178, 189, 11, '2023-04-21 19:38:05', 'defeat'),
(179, 190, 11, '2023-04-21 19:38:18', 'victory'),
(180, 191, 11, '2023-04-21 19:38:31', 'defeat'),
(181, 192, 11, '2023-04-21 19:38:49', 'victory'),
(182, 193, 11, '2023-04-21 19:39:14', 'defeat'),
(183, 194, 2, '2023-04-21 19:40:02', 'victory'),
(184, 195, 2, '2023-04-21 19:40:22', 'victory'),
(185, 196, 2, '2023-04-21 19:40:38', 'defeat'),
(186, 197, 2, '2023-04-21 19:40:55', 'defeat'),
(187, 198, 2, '2023-04-21 19:41:09', 'victory');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idutilisateur` int(11) NOT NULL,
  `comptelol` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idutilisateur`, `comptelol`, `email`, `motdepasse`) VALUES
(2, 'Bobleponge', 'test@test.fr', '$2y$10$ZFcm0aqCp2EZh6s6bvvIRu/De4ThG24IdGca7hS0cDu3yMPxYrfda'),
(3, 'ZacharyZcf', 'david.beautrait@gmail.com', '$2y$10$wQd0ItLsX/q91TVI6wpiU.EOVP3oPEUlvQzvdERv0AjC5z4W7k71W'),
(11, 'Patrickletoile2mer', 'test2@test.fr', '$2y$10$yy3LyS5xFZv9wzHqiGrEQuXZQkw8KDtW.bam4Kp1qAQ9GVMdOA3ai');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD PRIMARY KEY (`idpartie`,`idequipement`),
  ADD KEY `idequipement` (`idequipement`);

--
-- Index pour la table `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`idchampion`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`idequipement`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`idpartie`),
  ADD KEY `idchampion` (`idchampion`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idutilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `champions`
--
ALTER TABLE `champions`
  MODIFY `idchampion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `idequipement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `idpartie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD CONSTRAINT `acheter_ibfk_1` FOREIGN KEY (`idpartie`) REFERENCES `parties` (`idpartie`),
  ADD CONSTRAINT `acheter_ibfk_2` FOREIGN KEY (`idequipement`) REFERENCES `equipements` (`idequipement`);

--
-- Contraintes pour la table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_ibfk_1` FOREIGN KEY (`idchampion`) REFERENCES `champions` (`idchampion`),
  ADD CONSTRAINT `parties_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateurs` (`idutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
