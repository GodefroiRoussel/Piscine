-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Janvier 2017 à 00:02
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `prenom`, `nom`, `email`, `password`) VALUES
(1, 'Lysiane', 'Buisson', 'admin@etu', 'P0q9JtWY74qWQ'),
(4, 'Christophe', 'Fiorio', 'fiorio@lirmm.fr', 'P0q9JtWY74qWQ'),
(5, 'Anne', 'Laurent', 'laurent@lirmm.fr', 'P0q9JtWY74qWQ'),
(6, 'Michelle', 'Cart', 'cart@umontpellier.fr', 'P0q9JtWY74qWQ');

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE `choix` (
  `idEtudiant` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `choix1` int(11) NOT NULL,
  `choix2` int(11) NOT NULL,
  `choix3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `choix`
--

INSERT INTO `choix` (`idEtudiant`, `idGroupe`, `choix1`, `choix2`, `choix3`) VALUES
(1, 1, 4, 1, 3),
(1, 2, 9, 11, 8),
(1, 3, 13, 17, 16),
(1, 4, 19, 20, 21),
(1, 5, 28, 26, 30),
(1, 6, 31, 35, 33),
(1, 7, 37, 41, 42),
(1, 8, 43, 44, 45),
(1, 9, 53, 50, 54),
(1, 10, 57, 56, 60),
(1, 11, 64, 62, 63),
(1, 12, 67, 70, 69),
(2, 1, 1, 2, 3),
(2, 2, 7, 8, 10),
(2, 3, 17, 15, 18),
(2, 4, 22, 21, 23),
(2, 5, 28, 25, 30),
(2, 6, 31, 35, 33),
(2, 7, 41, 39, 40),
(2, 8, 44, 45, 46),
(2, 9, 54, 53, 52),
(2, 10, 58, 56, 59),
(2, 11, 65, 63, 61),
(2, 12, 72, 70, 69),
(3, 1, 1, 2, 3),
(3, 2, 9, 8, 7),
(3, 3, 13, 14, 15),
(3, 4, 21, 20, 19),
(3, 5, 25, 28, 30),
(3, 6, 35, 32, 33),
(3, 7, 40, 37, 42),
(3, 8, 44, 46, 45),
(3, 9, 52, 49, 53),
(3, 10, 58, 57, 56),
(3, 11, 62, 63, 64),
(3, 12, 68, 69, 70),
(5, 1, 1, 3, 2),
(5, 2, 11, 8, 10),
(5, 3, 13, 18, 17),
(5, 4, 24, 21, 23),
(5, 5, 28, 25, 30),
(5, 6, 34, 31, 33),
(5, 7, 40, 39, 41),
(5, 8, 44, 46, 43),
(5, 9, 49, 50, 51),
(5, 10, 56, 59, 57),
(5, 11, 62, 63, 66),
(5, 12, 70, 68, 67),
(11, 1, 1, 2, 3),
(11, 2, 7, 8, 9),
(11, 3, 13, 14, 15),
(11, 4, 19, 20, 21),
(11, 5, 25, 26, 27),
(11, 6, 31, 32, 33),
(11, 7, 37, 38, 39),
(11, 8, 43, 44, 45),
(11, 9, 49, 50, 51),
(11, 10, 55, 56, 57),
(11, 11, 61, 62, 63),
(11, 12, 67, 68, 69),
(13, 1, 4, 3, 5),
(13, 2, 12, 10, 7),
(13, 3, 17, 14, 16),
(13, 4, 24, 21, 23),
(13, 5, 25, 26, 27),
(13, 6, 34, 36, 32),
(13, 7, 38, 39, 40),
(13, 8, 46, 45, 47),
(13, 9, 50, 51, 49),
(13, 10, 58, 60, 57),
(13, 11, 62, 63, 64),
(13, 12, 69, 70, 71),
(14, 1, 4, 1, 3),
(14, 2, 9, 11, 8),
(14, 3, 13, 17, 16),
(14, 4, 19, 20, 21),
(14, 5, 28, 26, 30),
(14, 6, 31, 35, 33),
(14, 7, 37, 41, 42),
(14, 8, 43, 44, 45),
(14, 9, 53, 50, 54),
(14, 10, 57, 56, 60),
(14, 11, 64, 62, 63),
(14, 12, 67, 70, 69),
(15, 1, 1, 2, 3),
(15, 2, 7, 8, 10),
(15, 3, 17, 15, 18),
(15, 4, 22, 21, 23),
(15, 5, 28, 25, 30),
(15, 6, 31, 35, 33),
(15, 7, 41, 39, 40),
(15, 8, 44, 45, 46),
(15, 9, 54, 53, 52),
(15, 10, 58, 56, 59),
(15, 11, 65, 63, 61),
(15, 12, 72, 70, 69),
(16, 1, 1, 2, 3),
(16, 2, 9, 8, 7),
(16, 3, 13, 14, 15),
(16, 4, 21, 20, 19),
(16, 5, 25, 28, 30),
(16, 6, 35, 32, 33),
(16, 7, 40, 37, 42),
(16, 8, 44, 46, 45),
(16, 9, 52, 49, 53),
(16, 10, 58, 57, 56),
(16, 11, 62, 63, 64),
(16, 12, 68, 69, 70),
(17, 1, 1, 3, 2),
(17, 2, 11, 8, 10),
(17, 3, 13, 18, 17),
(17, 4, 24, 21, 23),
(17, 5, 28, 25, 30),
(17, 6, 34, 31, 33),
(17, 7, 40, 39, 41),
(17, 8, 44, 46, 43),
(17, 9, 49, 50, 51),
(17, 10, 56, 59, 57),
(17, 11, 62, 63, 66),
(17, 12, 70, 68, 67),
(18, 1, 1, 2, 3),
(18, 2, 7, 8, 9),
(18, 3, 13, 14, 15),
(18, 4, 19, 20, 21),
(18, 5, 25, 26, 27),
(18, 6, 31, 32, 33),
(18, 7, 37, 38, 39),
(18, 8, 43, 44, 45),
(18, 9, 49, 50, 51),
(18, 10, 55, 56, 57),
(18, 11, 61, 62, 63),
(18, 12, 67, 68, 69),
(19, 1, 4, 3, 5),
(19, 2, 12, 10, 7),
(19, 3, 17, 14, 16),
(19, 4, 24, 21, 23),
(19, 5, 25, 26, 27),
(19, 6, 34, 36, 32),
(19, 7, 38, 39, 40),
(19, 8, 46, 45, 47),
(19, 9, 50, 51, 49),
(19, 10, 58, 60, 57),
(19, 11, 62, 63, 64),
(19, 12, 69, 70, 71);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `nom`) VALUES
(7, 'Eau et Génie Civil'),
(2, 'Génie Biologique et Agroalimentaires'),
(1, 'Informatique et Gestion'),
(3, 'Matériaux'),
(4, 'Mécanique et Interaction'),
(8, 'Mécanique Structures Industrielles'),
(5, 'Microélectronique et Automatique'),
(6, 'Sciences et Technologies de l\'Eau'),
(9, 'Systèmes Embarqués');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `premierTest` tinyint(1) NOT NULL,
  `password` varchar(150) NOT NULL,
  `idPromo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `email`, `nom`, `prenom`, `premierTest`, `password`, `idPromo`) VALUES
(1, 'godefroi.roussel@etu', 'Roussel', 'Godefroi', 0, 'P0q9JtWY74qWQ', 1),
(2, 'toinon.georget@etu', 'Georget', 'Toinon', 0, 'P0q9JtWY74qWQ', 1),
(3, 'chloe.dalger@etu', 'Dalger', 'Chloe', 0, 'P0q9JtWY74qWQ', 1),
(5, 'justin.escalier@etu', 'Escalier', 'Justin', 0, 'P0q9JtWY74qWQ', 1),
(6, 'kevin.hassan@etu.umontpellier.Fr', 'hassan', 'kevin', 1, 'P0q9JtWY74qWQ', 1),
(7, 'yoann.masson@etu.umontpellier.Fr', 'Masson', 'Yoann', 1, 'P0gf91FjCaRBI', 1),
(8, 'kevin.massona@etu.umontpellier.Fr', 'Massona', 'Kevin', 1, 'P0gf91FjCaRBI', 1),
(9, 'aze.aze@etu.umontpellier.Fr', 'aze', 'aze', 1, 'P0gf91FjCaRBI', 2),
(11, 'alexandre.bottero@etu.umontpellier.Fr', 'Bottero', 'Alexandre', 0, 'P05M5YgQp/cWg', 1),
(13, 'boris.larcheveque@etu.umontpellier.Fr', 'Larcheveque', 'Boris', 0, 'P0q9JtWY74qWQ', 2),
(14, 'godefroi.roussel01@etu', 'Roussel', 'Godefroi', 0, 'P0q9JtWY74qWQ', 4),
(15, 'toinon.georget01@etu', 'Georget', 'Toinon', 0, 'P0q9JtWY74qWQ', 4),
(16, 'chloe.dalger01@etu', 'Dalger', 'Chloe', 0, 'P0q9JtWY74qWQ', 4),
(17, 'loris.zirah01@etu', 'Zirah', 'Loris', 0, 'P0q9JtWY74qWQ', 4),
(18, 'justin.escalier01@etu', 'Escalier', 'Justin', 0, 'P0q9JtWY74qWQ', 4),
(19, 'kevin.hassan01@etu.umontpellier.Fr', 'hassan', 'kevin', 0, 'P0q9JtWY74qWQ', 4);

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `descValeurs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fiche`
--

INSERT INTO `fiche` (`id`, `nom`, `descValeurs`) VALUES
(1, 'Réaliste', 'Vos principales valeurs sont la tradition, le sens pratique, le bon sens, le goût du travail bien fait. Vous recherchez les résultats concrets.'),
(2, 'Investigatif', 'Vos principales valeurs sont l\'indépendance, la curiosité d\'esprit, le désir d\'élaborer intellectuellement. Vous avez besoin d\'apprendre et de comprendre.'),
(3, 'Artistique', 'Vos principales valeurs sont la beauté, l\'originalité, l\'indépendance, la sensibilité et l\'imagination. Vous recherchez l\'expression de soi.'),
(4, 'Social', 'Vos principales valeurs sont l\'humanisme, la générosité, l\'altruisme, et vous recherchez le lien social et le contact avec autrui.'),
(5, 'Entrepreneur', 'Vos principales valeurs sont le défi, le statut social, l\'efficacité, la compétition et la réussite. Vous recherchez le pouvoir.'),
(6, 'Conventionnel', 'Vos principales valeurs sont la qualité du travail, la tradition et l\'efficacité. Vous recherchez la sécurité.');

-- --------------------------------------------------------

--
-- Structure de la table `groupeprop`
--

CREATE TABLE `groupeprop` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupeprop`
--

INSERT INTO `groupeprop` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `codePromo` varchar(20) NOT NULL,
  `anneePromo` int(11) NOT NULL,
  `idDep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `promo`
--

INSERT INTO `promo` (`id`, `codePromo`, `anneePromo`, `idDep`) VALUES
(1, 'IG2019', 2019, 1),
(2, 'MI2019', 2019, 4),
(4, 'IG2018', 2018, 1),
(5, 'IG2020', 2020, 1),
(6, 'GBA2012', 2012, 2),
(14, 'EGC2019', 2019, 7),
(16, 'IG2022', 2022, 1);

-- --------------------------------------------------------

--
-- Structure de la table `proposition`
--

CREATE TABLE `proposition` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `idFiche` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `proposition`
--

INSERT INTO `proposition` (`id`, `description`, `idFiche`, `idGroupe`) VALUES
(1, 'Vous aimez avoir des activités à l\'extérieur, travailler en plein air', 1, 1),
(2, 'Vous aimez élargir vos connaissances par l\'étude, pouvoir approfondir un sujet', 2, 1),
(3, 'Vous aimez travailler de façon indépendante, sans méthode ni objectif structuré', 3, 1),
(4, 'Vous aimez travailler avec d\'autres personnes pour les informer', 4, 1),
(5, 'Vous admirez les personnes qui ont du pouvoir ou gagnent beaucoup d\'argent', 5, 1),
(6, 'Vous aimez travailler avec des chiffres', 6, 1),
(7, 'Vous admirez les personnes qui travaillent pour soigner les autres', 4, 2),
(8, 'Vous aimez une organisation claire et bien définie', 6, 2),
(9, 'Vous aimez contribuer à atteindre les objectifs d\'une organisation', 5, 2),
(10, 'Vous aimez le sport, vous dépenser physiquement', 1, 2),
(11, 'Vous aimez étudier les choses, les phénomènes ou les comportements', 2, 2),
(12, 'Vous admirez les personnes qui ont des capacités artistiques', 3, 2),
(13, 'Vous aimez travailler avec d\'autres personnes pour les former, les entraîner', 4, 3),
(14, 'Vous aimez les changements ou les situations imprévues', 3, 3),
(15, 'Vous aimez ne faire qu\'une seule chose à la fois et vous ne vous laissez pas distraire', 6, 3),
(16, 'Vous aimez donner des ordres ou consignes et organiser l\'activité des autres', 5, 3),
(17, 'Vous aimez tirer vos propres conclusions de l\'analyse d\'une situation donnée', 2, 3),
(18, 'Vous aimez conduire des véhicules ou faire fonctionner des machines', 1, 3),
(19, 'Vous aimez fabriquer ou réparer des objets', 1, 4),
(20, 'Vous aimez ne pas savoir précisément ce que vous avez à faire', 3, 4),
(21, 'Vous aimez mettre en oeuvre des "bonnes pratiques" acquises par l\'expérience', 6, 4),
(22, 'Vous aimez faire preuve d\'initiative et prendre des décisions rapides', 5, 4),
(23, 'Vous aimez écouter, dialoguer, essayer de comprendre les autres', 4, 4),
(24, 'Vous aimez vous fier à votre jugement pour décider comment faire les choses', 2, 4),
(25, 'Vous aimez faire plusieurs activités en même temps, ou passer d\'une action à l\'autre', 3, 5),
(26, 'Vous aimez décider de ce qui doit être fait', 5, 5),
(27, 'Vous aimez rencontrer des gens nouveaux', 4, 5),
(28, 'Vous aimez vérifier une conclusion par des tests ou des informations complémentaires', 2, 5),
(29, 'Vous aimez appuyer vos conclusions sur des bases déjà prouvées', 6, 5),
(30, 'Vous aimez bricoler, utiliser des outils tels que tournevis, ciseaux, pinces, etc...', 1, 5),
(31, 'Vous aimez résoudre les problèmes de façon rationnelle, étape par étape', 2, 6),
(32, 'Vous aimez la nature, les plantes, les animaux...', 1, 6),
(33, 'Vous aimez respecter les valeurs que vous vous êtes fixées', 6, 6),
(34, 'Vous aimez faire un travail en commun avec d\'autres', 4, 6),
(35, 'Vous aimez relever des défis', 5, 6),
(36, 'Vous aimez vous fier à votre intuition pour prendre des décisions', 3, 6),
(37, 'Vous aimez convaincre les autres d\'agir d\'une certaine façon', 5, 7),
(38, 'Vous aimez résoudre un problème sans avoir recours à une méthode logique', 3, 7),
(39, 'Vous aimez prendre une décision après une réflexion, si possible logique', 2, 7),
(40, 'Vous aimez suivre attentivement un plan pour atteindre le meilleur résultat possible', 6, 7),
(41, 'Vous aimez écouter les autres et les conseiller sur la façon de résoudre leurs problèmes', 4, 7),
(42, 'Vous aimez trouver une solution concrète, réaliste et simple aux problèmes', 1, 7),
(43, 'Vous aimez concevoir ou améliorer les méthodes de travail', 2, 8),
(44, 'Vous aimez utiliser votre "bon sens"', 1, 8),
(45, 'Vous aimez rendre service, venir en aide à d\'autres personnes', 4, 8),
(46, 'Vous aimez répondre aux objections de vos interlocuteurs pour mieux les convaincre', 5, 8),
(47, 'Vous aimez montrer votre originalité', 3, 8),
(48, 'Vous aimez travailler avec soin pour obtenir un résultat parfait', 6, 8),
(49, 'Vous aimez ou aimeriez animer des activités collectives, associatives...', 4, 9),
(50, 'Vous aimez ou aimeriez étudier la physique, la biologie, ou la technologie', 2, 9),
(51, 'Vous aimez démonter un appareil pour le réparer vous-même', 1, 9),
(52, 'Vous aimez discuter avec un commerçant pour obtenir des réductions de prix', 5, 9),
(53, 'Vous aimez exprimer vos idées, vos points de vue ou vos émotions', 3, 9),
(54, 'Vous aimez rédiger un résumé, une lettre, un compte-rendu', 6, 9),
(55, 'Vous aimez faire face aux situations urgentes ou imprévues', 5, 10),
(56, 'Vous aimez vous occuper de démarches administratives ou d\'ordre juridique', 6, 10),
(57, 'Vous aimez ou aimeriez faire des reportages, écrire des articles, etc...', 4, 10),
(58, 'Vous aimez chercher à comprendre et à expliquer le pourquoi des choses et des êtres', 2, 10),
(59, 'Vous aimez imaginer des solutions qui sortent de l\'ordinaire', 3, 10),
(60, 'Vous aimez ou aimeriez utiliser un objet que vous avez fabriqué vous-même', 1, 10),
(61, 'Vous aimez apprendre aux autres ce que vous savez', 4, 11),
(62, 'Vous aimez collectionner des choses : timbres, cartes postales, pierres, etc...', 1, 11),
(63, 'Vous aimez passer une grande partie de votre temps sur des documents écrits', 6, 11),
(64, 'Vous aimez ou aimeriez vendre des produits ou services', 5, 11),
(65, 'Vous aimez vous servir d\'un microscope ou autre appareil de mesure...', 2, 11),
(66, 'Vous aimez ou aimeriez avoir des loisirs créatifs : peinture, musique...', 3, 11),
(67, 'Vous aimez classer, ordonner des documents ou des objets', 6, 12),
(68, 'Vous aimez conduire une discussion, un débat', 5, 12),
(69, 'Vous aimez échanger des idées avec les autres', 4, 12),
(70, 'Vous aimez que ce que vous faites débouche sur des résultats concrets', 1, 12),
(71, 'Vous aimez ou aimeriez mettre au point et réaliser des expériences scientifiques', 2, 12),
(72, 'Vous aimez étudier ou inventer plusieurs solutions pour répondre à un problème', 3, 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`idEtudiant`,`idGroupe`),
  ADD KEY `fk2_choix` (`idGroupe`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_etudiant` (`idPromo`);

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `groupeprop`
--
ALTER TABLE `groupeprop`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codePromo` (`codePromo`),
  ADD KEY `fk1_promo` (`idDep`);

--
-- Index pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_proposition` (`idFiche`),
  ADD KEY `fk2_proposition` (`idGroupe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `fk1_choix` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2_choix` FOREIGN KEY (`idGroupe`) REFERENCES `groupeprop` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk1_etudiant` FOREIGN KEY (`idPromo`) REFERENCES `promo` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `fk1_promo` FOREIGN KEY (`idDep`) REFERENCES `departement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD CONSTRAINT `fk1_proposition` FOREIGN KEY (`idFiche`) REFERENCES `fiche` (`id`),
  ADD CONSTRAINT `fk2_proposition` FOREIGN KEY (`idGroupe`) REFERENCES `groupeprop` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
