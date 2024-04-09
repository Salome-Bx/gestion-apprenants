-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 avr. 2024 à 14:43
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simp_gestion_apprenants`
--

-- --------------------------------------------------------

--
-- Structure de la table `simp_course`
--

DROP TABLE IF EXISTS `simp_course`;
CREATE TABLE IF NOT EXISTS `simp_course` (
  `Id_Course` int NOT NULL AUTO_INCREMENT,
  `Name_Course` varchar(255) NOT NULL,
  `HourStart_Course` time NOT NULL,
  `HourEnd_Course` time NOT NULL,
  `Date_Course` date NOT NULL,
  `Code_Course` int NOT NULL,
  `Id_Grade` int NOT NULL,
  PRIMARY KEY (`Id_Course`),
  KEY `Simp_Course_Simp_Grade_FK` (`Id_Grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `simp_grade`
--

DROP TABLE IF EXISTS `simp_grade`;
CREATE TABLE IF NOT EXISTS `simp_grade` (
  `Id_Grade` int NOT NULL AUTO_INCREMENT,
  `Name_Grade` varchar(255) NOT NULL,
  `Student_Number_Grade` int NOT NULL,
  `DateStart_Grade` date NOT NULL,
  `DateEnd_Grade` date NOT NULL,
  PRIMARY KEY (`Id_Grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `simp_role`
--

DROP TABLE IF EXISTS `simp_role`;
CREATE TABLE IF NOT EXISTS `simp_role` (
  `Id_Role` int NOT NULL AUTO_INCREMENT,
  `Name_Role` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `simp_role`
--

INSERT INTO `simp_role` (`Id_Role`, `Name_Role`) VALUES
(1, 'Apprenant'),
(2, 'Formateur'),
(3, 'Responsable Pédagogique'),
(4, 'Campus Manager'),
(5, 'Délégués');

-- --------------------------------------------------------

--
-- Structure de la table `simp_user`
--

DROP TABLE IF EXISTS `simp_user`;
CREATE TABLE IF NOT EXISTS `simp_user` (
  `Id_User` int NOT NULL AUTO_INCREMENT,
  `LastName_User` varchar(255) NOT NULL,
  `FirstName_User` varchar(255) NOT NULL,
  `Password_User` varchar(255) NOT NULL,
  `Activated_User` tinyint NOT NULL,
  `Email_User` varchar(255) NOT NULL,
  `Id_Role` int DEFAULT NULL,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `Simp_User_AK` (`Email_User`),
  KEY `Simp_User_Simp_Role_FK` (`Id_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `simp_user`
--

INSERT INTO `simp_user` (`Id_User`, `LastName_User`, `FirstName_User`, `Password_User`, `Activated_User`, `Email_User`, `Id_Role`) VALUES
(1, 'Burteaux', 'Salomé', '', 1, 'salome.burteaux.simplon@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `userhasclass`
--

DROP TABLE IF EXISTS `userhasclass`;
CREATE TABLE IF NOT EXISTS `userhasclass` (
  `Id_Grade` int NOT NULL,
  `Id_User` int NOT NULL,
  PRIMARY KEY (`Id_Grade`,`Id_User`),
  KEY `UserHasClass_Simp_User0_FK` (`Id_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userhascourse`
--

DROP TABLE IF EXISTS `userhascourse`;
CREATE TABLE IF NOT EXISTS `userhascourse` (
  `Id_Course` int NOT NULL,
  `Id_User` int NOT NULL,
  `IsLate` tinyint NOT NULL,
  `IsAbsent` tinyint NOT NULL,
  PRIMARY KEY (`Id_Course`,`Id_User`),
  KEY `UserHasCourse_Simp_User0_FK` (`Id_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `simp_course`
--
ALTER TABLE `simp_course`
  ADD CONSTRAINT `Simp_Course_Simp_Grade_FK` FOREIGN KEY (`Id_Grade`) REFERENCES `simp_grade` (`Id_Grade`);

--
-- Contraintes pour la table `simp_user`
--
ALTER TABLE `simp_user`
  ADD CONSTRAINT `Simp_User_Simp_Role_FK` FOREIGN KEY (`Id_Role`) REFERENCES `simp_role` (`Id_Role`);

--
-- Contraintes pour la table `userhasclass`
--
ALTER TABLE `userhasclass`
  ADD CONSTRAINT `UserHasClass_Simp_Grade_FK` FOREIGN KEY (`Id_Grade`) REFERENCES `simp_grade` (`Id_Grade`),
  ADD CONSTRAINT `UserHasClass_Simp_User0_FK` FOREIGN KEY (`Id_User`) REFERENCES `simp_user` (`Id_User`);

--
-- Contraintes pour la table `userhascourse`
--
ALTER TABLE `userhascourse`
  ADD CONSTRAINT `UserHasCourse_Simp_Course_FK` FOREIGN KEY (`Id_Course`) REFERENCES `simp_course` (`Id_Course`),
  ADD CONSTRAINT `UserHasCourse_Simp_User0_FK` FOREIGN KEY (`Id_User`) REFERENCES `simp_user` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
