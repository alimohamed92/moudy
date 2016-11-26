-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Janvier 2016 à 01:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `entbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idcommentaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `date` datetime DEFAULT NULL,
  `idsujet` int(10) unsigned NOT NULL,
  `idPersonnel` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcommentaire`),
  KEY `fk_commentaire_sujet1_idx` (`idsujet`),
  KEY `fk_commentaire_Personnel1_idx` (`idPersonnel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `commentaire` text,
  `idMatiere` int(10) unsigned DEFAULT NULL,
  `Enseignant_idEnseignant` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idCours`),
  KEY `fk_Cours_Matiere1_idx` (`idMatiere`),
  KEY `fk_Cours_Enseignant1_idx` (`Enseignant_idEnseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`idCours`, `nom`, `url`, `commentaire`, `idMatiere`, `Enseignant_idEnseignant`) VALUES
(1, 'Analyse1', 'C:\\wamp\\www\\CodeIgniter\\application\\data\\cours/PFE 2.pdf', 'Bonjour ceci est le premier cours du semestre, bon courage! ', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `idFaculte` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idDepartement`),
  KEY `fk_Departement_Faculte1_idx` (`idFaculte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `nom`, `idFaculte`) VALUES
(1, 'Maths Infos', 1);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `idEnseignant` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) DEFAULT NULL,
  `specialite` varchar(45) DEFAULT NULL,
  `idDepartement` int(10) unsigned NOT NULL,
  `idPersonnel` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEnseignant`),
  KEY `fk_Enseignant_Departement1_idx` (`idDepartement`),
  KEY `fk_Enseignant_Personnel1_idx` (`idPersonnel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`idEnseignant`, `grade`, `specialite`, `idDepartement`, `idPersonnel`) VALUES
(2, 'PE', 'Informatique', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant_matiere`
--

CREATE TABLE IF NOT EXISTS `enseignant_matiere` (
  `idMatiere` int(10) unsigned NOT NULL,
  `idEnseignant` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMatiere`,`idEnseignant`),
  KEY `fk_Matiere_has_Enseignant_Enseignant1_idx` (`idEnseignant`),
  KEY `fk_Matiere_has_Enseignant_Matiere1_idx` (`idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtudiant` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cne` varchar(45) DEFAULT NULL,
  `semestre` int(10) unsigned NOT NULL,
  `annee_bac` year(4) NOT NULL,
  `moyenne_bac` float DEFAULT NULL,
  `ecole_provenance` varchar(45) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `idPersonnel` int(10) unsigned NOT NULL,
  `idOption` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEtudiant`),
  UNIQUE KEY `cne_UNIQUE` (`cne`),
  KEY `fk_Etudiant_Personnel1_idx` (`idPersonnel`),
  KEY `fk_Etudiant_Option1_idx` (`idOption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `cne`, `semestre`, `annee_bac`, `moyenne_bac`, `ecole_provenance`, `date_inscription`, `idPersonnel`, `idOption`) VALUES
(1, '1111031192', 1, 2015, 14, 'test', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

CREATE TABLE IF NOT EXISTS `faculte` (
  `idFaculte` int(10) unsigned NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFaculte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faculte`
--

INSERT INTO `faculte` (`idFaculte`, `nom`, `adresse`) VALUES
(1, 'Faculté des sciences ', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `idFaculte` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFiliere`),
  KEY `fk_Filiere_Faculte1_idx` (`idFaculte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nom`, `idFaculte`) VALUES
(1, 'Mathématiques Informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `idFonction` int(10) unsigned NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idFonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`idFonction`, `nom`) VALUES
(1, 'Admin simple'),
(2, 'ensignant'),
(3, 'etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `coef` float DEFAULT NULL,
  `idModule` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMatiere`),
  KEY `fk_Matiere_Module1_idx` (`idModule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nom`, `coef`, `idModule`) VALUES
(1, 'Analyse1', 1, 1),
(2, 'Algèbre1', 1, 2),
(3, 'Mécanique 1', 1, 3),
(4, 'Thermodynamique', 1, 3),
(5, 'Langue et communication', 1, 4),
(6, 'Informatique 1', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `idModule` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `coef` float DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `idOption` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idModule`),
  KEY `fk_Module_Option1_idx` (`idOption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`idModule`, `nom`, `coef`, `semestre`, `idOption`) VALUES
(1, 'Module Analyse 1', 3, 1, 3),
(2, 'Module Algèbre 1', 3, 1, 3),
(3, 'Physique 1', 2, 1, 3),
(4, 'LC et Informatique 1', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note` float NOT NULL,
  `idMatiere` int(10) unsigned NOT NULL,
  `idEtudiant` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMatiere`,`idEtudiant`),
  KEY `fk_Note_Etudiant1_idx` (`idEtudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note`, `idMatiere`, `idEtudiant`) VALUES
(17, 1, 1),
(15, 2, 1),
(15, 3, 1),
(16, 4, 1),
(14, 5, 1),
(17, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `idOption` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `idSpecialite` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idOption`),
  KEY `fk_Option_Specialite1_idx` (`idSpecialite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `option`
--

INSERT INTO `option` (`idOption`, `nom`, `idSpecialite`) VALUES
(1, 'BDW', 1),
(2, 'RI', 1),
(3, 'PO Mathématiques Informatique', 3);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `idPersonnel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `cin` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `mp` varchar(255) DEFAULT NULL,
  `idFonction` int(10) unsigned DEFAULT NULL,
  `idFaculte` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idPersonnel`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Personnel_Fonction1_idx` (`idFonction`),
  KEY `fk_Personnel_Faculte1_idx` (`idFaculte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`idPersonnel`, `nom`, `prenom`, `cin`, `adresse`, `email`, `tel`, `dateNaissance`, `login`, `mp`, `idFonction`, `idFaculte`) VALUES
(1, 'Mohamed Affizou', 'Ali', '125864', 'Cité univ villejean', 'alimohamedaffizou@gmail.com ', '0751392774', '2015-07-08', 'ali', '$2y$10$581ytAHdFv2kM6KJvRHnU.HWXDi1coYgWUCZNUB27CBhwMEwtQTge', 3, 1),
(2, 'Enseignant', 'PreEnseignant', '15469321', 'Beaulieu 35700', 'enseignant@yahoo.fr', '0769857423', '2015-12-02', 'test', 'test', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `idPlaning` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `idPersonnel` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idPlaning`),
  KEY `fk_Planning_Personnel1_idx` (`idPersonnel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `idSous_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idCategorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idSous_categorie`),
  KEY `fk_Sous_categorie_Categorie1_idx` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpecialite` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `idFiliere` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idSpecialite`),
  KEY `fk_Specialite_Filiere1_idx` (`idFiliere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`idSpecialite`, `nom`, `idFiliere`) VALUES
(1, 'SMI', 1),
(2, 'SMA', 1),
(3, 'TCs Mathématiques Informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `idsujet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idSous_categorie` int(10) unsigned NOT NULL,
  `Personnel_idPersonnel` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idsujet`),
  KEY `fk_sujet_Sous_categorie1_idx` (`idSous_categorie`),
  KEY `fk_sujet_Personnel1_idx` (`Personnel_idPersonnel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_Personnel1` FOREIGN KEY (`idPersonnel`) REFERENCES `personnel` (`idPersonnel`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentaire_sujet1` FOREIGN KEY (`idsujet`) REFERENCES `sujet` (`idsujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_Cours_Enseignant1` FOREIGN KEY (`Enseignant_idEnseignant`) REFERENCES `enseignant` (`idEnseignant`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cours_Matiere1` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `fk_Departement_Faculte1` FOREIGN KEY (`idFaculte`) REFERENCES `faculte` (`idFaculte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `fk_Enseignant_Departement1` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enseignant_Personnel1` FOREIGN KEY (`idPersonnel`) REFERENCES `personnel` (`idPersonnel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseignant_matiere`
--
ALTER TABLE `enseignant_matiere`
  ADD CONSTRAINT `fk_Matiere_has_Enseignant_Enseignant1` FOREIGN KEY (`idEnseignant`) REFERENCES `enseignant` (`idEnseignant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matiere_has_Enseignant_Matiere1` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_Etudiant_Option1` FOREIGN KEY (`idOption`) REFERENCES `option` (`idOption`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Etudiant_Personnel1` FOREIGN KEY (`idPersonnel`) REFERENCES `personnel` (`idPersonnel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `fk_Filiere_Faculte1` FOREIGN KEY (`idFaculte`) REFERENCES `faculte` (`idFaculte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_Matiere_Module1` FOREIGN KEY (`idModule`) REFERENCES `module` (`idModule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_Module_Option1` FOREIGN KEY (`idOption`) REFERENCES `option` (`idOption`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Note_Etudiant1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Note_Matiere1` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `fk_Option_Specialite1` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `fk_Personnel_Faculte1` FOREIGN KEY (`idFaculte`) REFERENCES `faculte` (`idFaculte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Personnel_Fonction1` FOREIGN KEY (`idFonction`) REFERENCES `fonction` (`idFonction`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `fk_Planning_Personnel1` FOREIGN KEY (`idPersonnel`) REFERENCES `personnel` (`idPersonnel`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `fk_Sous_categorie_Categorie1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `fk_Specialite_Filiere1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fk_sujet_Personnel1` FOREIGN KEY (`Personnel_idPersonnel`) REFERENCES `personnel` (`idPersonnel`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sujet_Sous_categorie1` FOREIGN KEY (`idSous_categorie`) REFERENCES `sous_categorie` (`idSous_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
