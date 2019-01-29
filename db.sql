-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: murazFinal
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activites`
--

DROP TABLE IF EXISTS `activites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateActivite` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activites_projet_id_foreign` (`projet_id`),
  CONSTRAINT `activites_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activites`
--

LOCK TABLES `activites` WRITE;
/*!40000 ALTER TABLE `activites` DISABLE KEYS */;
/*!40000 ALTER TABLE `activites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associations`
--

DROP TABLE IF EXISTS `associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroPv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomAssociation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeAssociation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `but` text COLLATE utf8mb4_unicode_ci,
  `corpsProffesorale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associations`
--

LOCK TABLES `associations` WRITE;
/*!40000 ALTER TABLE `associations` DISABLE KEYS */;
/*!40000 ALTER TABLE `associations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associe_externes`
--

DROP TABLE IF EXISTS `associe_externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associe_externes` (
  `personne_id` int(10) unsigned NOT NULL,
  `equipe_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`equipe_id`),
  KEY `associe_externes_equipe_id_foreign` (`equipe_id`),
  CONSTRAINT `associe_externes_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `associe_externes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associe_externes`
--

LOCK TABLES `associe_externes` WRITE;
/*!40000 ALTER TABLE `associe_externes` DISABLE KEYS */;
/*!40000 ALTER TABLE `associe_externes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associe_internes`
--

DROP TABLE IF EXISTS `associe_internes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associe_internes` (
  `personne_id` int(10) unsigned NOT NULL,
  `equipe_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`equipe_id`),
  KEY `associe_internes_equipe_id_foreign` (`equipe_id`),
  CONSTRAINT `associe_internes_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `associe_internes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associe_internes`
--

LOCK TABLES `associe_internes` WRITE;
/*!40000 ALTER TABLE `associe_internes` DISABLE KEYS */;
/*!40000 ALTER TABLE `associe_internes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bourses`
--

DROP TABLE IF EXISTS `bourses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bourses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `personne_id` int(10) unsigned NOT NULL,
  `libelletBourse` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bourses_projet_id_foreign` (`projet_id`),
  KEY `bourses_personne_id_foreign` (`personne_id`),
  CONSTRAINT `bourses_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `bourses_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bourses`
--

LOCK TABLES `bourses` WRITE;
/*!40000 ALTER TABLE `bourses` DISABLE KEYS */;
/*!40000 ALTER TABLE `bourses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `co_investigateur_externes`
--

DROP TABLE IF EXISTS `co_investigateur_externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `co_investigateur_externes` (
  `personne_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`projet_id`),
  KEY `co_investigateur_externes_projet_id_foreign` (`projet_id`),
  CONSTRAINT `co_investigateur_externes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`),
  CONSTRAINT `co_investigateur_externes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `co_investigateur_externes`
--

LOCK TABLES `co_investigateur_externes` WRITE;
/*!40000 ALTER TABLE `co_investigateur_externes` DISABLE KEYS */;
/*!40000 ALTER TABLE `co_investigateur_externes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `co_investigateur_internes`
--

DROP TABLE IF EXISTS `co_investigateur_internes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `co_investigateur_internes` (
  `personne_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`projet_id`),
  KEY `co_investigateur_internes_projet_id_foreign` (`projet_id`),
  CONSTRAINT `co_investigateur_internes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `co_investigateur_internes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `co_investigateur_internes`
--

LOCK TABLES `co_investigateur_internes` WRITE;
/*!40000 ALTER TABLE `co_investigateur_internes` DISABLE KEYS */;
INSERT INTO `co_investigateur_internes` VALUES (4,2,NULL,NULL);
/*!40000 ALTER TABLE `co_investigateur_internes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direction_id` int(10) unsigned NOT NULL,
  `nomDepartement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionDepartement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectifDepartement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departements_direction_id_foreign` (`direction_id`),
  CONSTRAINT `departements_direction_id_foreign` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,1,'Departement des Sciences Biomédiadicales','Le Département des Sciences Biomédicales (DSB) est né de l’organisation de la recherche au Centre MURAZ pour prendre en compte les suggestions du Conseil Scientifique International tenu en novembre 2016. Pour rappel, les suggestions qui avaient été faites par le Conseil Scientifique en 2016 étaient entre autre de faire en sorte que tous les plateaux techniques soient regroupés au sein de ce Département. Après plusieurs rencontres et concertations internes à travers le Collège des Chercheurs notamment, il a été convenu de façon consensuelle de sortir l’équipe de Biologie Clinique du Département de Recherche Clinique (DRC) pour la placer dans le DSB avec l’appellation de Laboratoire de Biologie Clinique (LBC).','Si l’on globalise cet ensemble, on peut dire que le champ de recherche du DSB est très large et comprend la recherche fondamentale et translationnelle de laboratoire. Il s’agit d’un regroupement horizontal de tous les laboratoires de recherche qui mènent des projets de recherche en rapport avec les maladies transmissibles comprenant les maladies à transmission vectorielles et les maladies de type bactérien et viral et les maladies non transmissibles. Ces laboratoires ont été créés pour répondre aux besoins prioritaires des populations du Burkina Faso dans le domaine de la recherche et de la biologie médicale. A ce titre, le Département est un organe de coordination de la recherche menée au sein des laboratoires de recherche.',NULL,NULL),(2,1,'Departement de Recherche clinique  ','En 2015 le Centre MURAZ a élaboré un nouvel organigramme scientifique. Dans cette nouvelle organisation, le champ de recherche du Département de Recherche Clinique (DRC), couvre : les essais cliniques, l’analyse décisionnelle médicale et les méthodes et outils de recherche clinique. Le DRC comprend deux (2) équipes de recherche ','L’objectif du DRC est d’obtenir à court terme, une meilleure gestion de ces ressources humaines et une meilleure organisation au quotidien du travail, pour améliorer sa productivité dans les différents domaines que sont la recherche (Grants et articles scientifiques), la formation et l’expertise. Cela permettra également une meilleure implication du Département dans le suivi de l’ensemble des essais cliniques hébergés au Centre MURAZ, à travers la rédaction et la mise en œuvre d’un plan de monitoring pour chacun de ces essais.',NULL,NULL),(3,1,'Departement de Santé Publique','Le DSP couvre un large champ de thématiques de recherches dans une perspective transversale portant sur les maladies transmissibles, non transmissibles et les problèmes globaux de santé communautaire et publique. La force principale du Département est sa diversité, sa transversalité et sa complémentarité. En effet, l’ensemble des chercheurs du Département forme une task-force susceptible de répondre aux questions de recherche, d’expertise et de formation en rapport avec les problèmes prioritaires de santé publique du pays et de la sous-région. La faiblesse du département réside dans l’insuffisance des effectifs au sein de toutes les équipes et le faible financement dans certaines thématiques comme l’accidentologie.','La perspective du Département est de développer et d’opérationnaliser des contrats plans dans les domaines de la santé environnementale, de l’accidentologie, de la santé communautaire, des politiques publiques de santé en matière de financement, d’équité et de prise en charge des groupes spécifiques.',NULL,NULL);
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_chef_departement`
--

DROP TABLE IF EXISTS `detail_chef_departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_chef_departement` (
  `personne_id` int(10) unsigned NOT NULL,
  `departement_id` int(10) unsigned NOT NULL,
  `debutMandat` datetime NOT NULL,
  `finMandat` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`departement_id`),
  KEY `detail_chef_departement_departement_id_foreign` (`departement_id`),
  CONSTRAINT `detail_chef_departement_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  CONSTRAINT `detail_chef_departement_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_chef_departement`
--

LOCK TABLES `detail_chef_departement` WRITE;
/*!40000 ALTER TABLE `detail_chef_departement` DISABLE KEYS */;
INSERT INTO `detail_chef_departement` VALUES (1,1,'2019-01-23 01:03:11',NULL,NULL,NULL);
/*!40000 ALTER TABLE `detail_chef_departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_chef_direction`
--

DROP TABLE IF EXISTS `detail_chef_direction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_chef_direction` (
  `personne_id` int(10) unsigned NOT NULL,
  `direction_id` int(10) unsigned NOT NULL,
  `debutMandat` datetime NOT NULL,
  `finMandat` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`direction_id`),
  KEY `detail_chef_direction_direction_id_foreign` (`direction_id`),
  CONSTRAINT `detail_chef_direction_direction_id_foreign` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`),
  CONSTRAINT `detail_chef_direction_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_chef_direction`
--

LOCK TABLES `detail_chef_direction` WRITE;
/*!40000 ALTER TABLE `detail_chef_direction` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_chef_direction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_chef_equipe`
--

DROP TABLE IF EXISTS `detail_chef_equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_chef_equipe` (
  `personne_id` int(10) unsigned NOT NULL,
  `equipe_id` int(10) unsigned NOT NULL,
  `debutMandat` datetime NOT NULL,
  `finMandat` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`equipe_id`),
  KEY `detail_chef_equipe_equipe_id_foreign` (`equipe_id`),
  CONSTRAINT `detail_chef_equipe_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `detail_chef_equipe_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_chef_equipe`
--

LOCK TABLES `detail_chef_equipe` WRITE;
/*!40000 ALTER TABLE `detail_chef_equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_chef_equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_chef_laboratoire`
--

DROP TABLE IF EXISTS `detail_chef_laboratoire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_chef_laboratoire` (
  `personne_id` int(10) unsigned NOT NULL,
  `laboratoire_id` int(10) unsigned NOT NULL,
  `debutMandat` datetime NOT NULL,
  `finMandat` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`laboratoire_id`),
  KEY `detail_chef_laboratoire_laboratoire_id_foreign` (`laboratoire_id`),
  CONSTRAINT `detail_chef_laboratoire_laboratoire_id_foreign` FOREIGN KEY (`laboratoire_id`) REFERENCES `laboratoires` (`id`),
  CONSTRAINT `detail_chef_laboratoire_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_chef_laboratoire`
--

LOCK TABLES `detail_chef_laboratoire` WRITE;
/*!40000 ALTER TABLE `detail_chef_laboratoire` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_chef_laboratoire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_chef_unite`
--

DROP TABLE IF EXISTS `detail_chef_unite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_chef_unite` (
  `personne_id` int(10) unsigned NOT NULL,
  `unite_id` int(10) unsigned NOT NULL,
  `debutMandat` datetime NOT NULL,
  `finMandat` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`),
  KEY `detail_chef_unite_unite_id_foreign` (`unite_id`),
  CONSTRAINT `detail_chef_unite_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `detail_chef_unite_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unite_de_recherches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_chef_unite`
--

LOCK TABLES `detail_chef_unite` WRITE;
/*!40000 ALTER TABLE `detail_chef_unite` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_chef_unite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_co_auteur`
--

DROP TABLE IF EXISTS `detail_co_auteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_co_auteur` (
  `personne_id` int(10) unsigned NOT NULL,
  `publication_id` int(10) unsigned NOT NULL,
  `ordreDimplication` int(11) NOT NULL,
  `descriptionParticipation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`publication_id`),
  KEY `detail_co_auteur_publication_id_foreign` (`publication_id`),
  CONSTRAINT `detail_co_auteur_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `detail_co_auteur_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_co_auteur`
--

LOCK TABLES `detail_co_auteur` WRITE;
/*!40000 ALTER TABLE `detail_co_auteur` DISABLE KEYS */;
INSERT INTO `detail_co_auteur` VALUES (1,1,1,'il receuillis toutes les informations a Bobo',NULL,NULL),(5,6,2,'Il a gérer les calculs statistique et probabilistes',NULL,NULL),(5,7,2,'Il a réquisitionner les échantillons des souches qui ont permis de mettre en œuvre le systeme',NULL,NULL),(9,3,2,'Il a realisé les prevelements pour l\"etude',NULL,NULL),(11,5,1,'Il a prelever les valeurs',NULL,NULL),(11,8,2,'Il a gerer le recueil des valeurs',NULL,NULL),(36,6,4,'Il a été beaucoup utilie dans la compréhension des souches',NULL,NULL),(44,6,3,'Il a effectué les voyages de recueil d\'indices dans les zones',NULL,NULL),(145,4,1,'Il a realisé les recueil de valuers analysées',NULL,NULL);
/*!40000 ALTER TABLE `detail_co_auteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_diplome_externe`
--

DROP TABLE IF EXISTS `detail_diplome_externe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_diplome_externe` (
  `personne_id` int(10) unsigned NOT NULL,
  `typeDiplome_id` int(10) unsigned NOT NULL,
  `numeroDiplome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDoptention` datetime NOT NULL,
  `mention` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`),
  KEY `detail_diplome_externe_typediplome_id_foreign` (`typeDiplome_id`),
  CONSTRAINT `detail_diplome_externe_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`),
  CONSTRAINT `detail_diplome_externe_typediplome_id_foreign` FOREIGN KEY (`typeDiplome_id`) REFERENCES `type_diplomes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_diplome_externe`
--

LOCK TABLES `detail_diplome_externe` WRITE;
/*!40000 ALTER TABLE `detail_diplome_externe` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_diplome_externe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_diplome_interne`
--

DROP TABLE IF EXISTS `detail_diplome_interne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_diplome_interne` (
  `personne_id` int(10) unsigned NOT NULL,
  `typeDiplome_id` int(10) unsigned NOT NULL,
  `numeroDiplome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDoptention` datetime NOT NULL,
  `mention` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`typeDiplome_id`),
  KEY `detail_diplome_interne_typediplome_id_foreign` (`typeDiplome_id`),
  CONSTRAINT `detail_diplome_interne_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `detail_diplome_interne_typediplome_id_foreign` FOREIGN KEY (`typeDiplome_id`) REFERENCES `type_diplomes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_diplome_interne`
--

LOCK TABLES `detail_diplome_interne` WRITE;
/*!40000 ALTER TABLE `detail_diplome_interne` DISABLE KEYS */;
INSERT INTO `detail_diplome_interne` VALUES (1,1,'BEPC-20155','2018-07-04 00:00:00','',NULL,NULL),(1,2,'BAC-1212','2015-06-10 00:00:00','',NULL,NULL),(2,1,'BEPC-201556','2018-01-01 00:00:00','',NULL,NULL),(204,1,'12125','1995-01-03 00:00:00','',NULL,NULL),(204,2,'14145','1999-01-13 00:00:00','',NULL,NULL),(204,4,'121521','2002-11-05 00:00:00','',NULL,NULL),(204,5,'151512','2004-02-03 00:00:00','',NULL,NULL),(204,6,'PHD-15152','2008-03-02 00:00:00','',NULL,NULL);
/*!40000 ALTER TABLE `detail_diplome_interne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_partenariat_financier`
--

DROP TABLE IF EXISTS `detail_partenariat_financier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_partenariat_financier` (
  `institution_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `volumeProjetFinance` int(11) NOT NULL,
  `anneeFinancementProjet` year(4) NOT NULL,
  PRIMARY KEY (`institution_id`,`projet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_partenariat_financier`
--

LOCK TABLES `detail_partenariat_financier` WRITE;
/*!40000 ALTER TABLE `detail_partenariat_financier` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_partenariat_financier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_partenariat_technique`
--

DROP TABLE IF EXISTS `detail_partenariat_technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_partenariat_technique` (
  `institution_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `descriptionPartenariat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`institution_id`),
  KEY `detail_partenariat_technique_projet_id_foreign` (`projet_id`),
  CONSTRAINT `detail_partenariat_technique_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`),
  CONSTRAINT `detail_partenariat_technique_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_partenariat_technique`
--

LOCK TABLES `detail_partenariat_technique` WRITE;
/*!40000 ALTER TABLE `detail_partenariat_technique` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_partenariat_technique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_statut_projet`
--

DROP TABLE IF EXISTS `detail_statut_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_statut_projet` (
  `statut_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `debutStatut` datetime DEFAULT NULL,
  `finStatut` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`statut_id`,`projet_id`),
  KEY `detail_statut_projet_projet_id_foreign` (`projet_id`),
  CONSTRAINT `detail_statut_projet_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  CONSTRAINT `detail_statut_projet_statut_id_foreign` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_statut_projet`
--

LOCK TABLES `detail_statut_projet` WRITE;
/*!40000 ALTER TABLE `detail_statut_projet` DISABLE KEYS */;
INSERT INTO `detail_statut_projet` VALUES (1,1,'2019-01-24 13:17:05',NULL,NULL,NULL),(1,2,'2019-01-24 13:17:05',NULL,NULL,NULL);
/*!40000 ALTER TABLE `detail_statut_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directions`
--

DROP TABLE IF EXISTS `directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomDirection` varchar(54) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directions`
--

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;
INSERT INTO `directions` VALUES (1,'Direction Scientifique',NULL,NULL);
/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipements_acquis`
--

DROP TABLE IF EXISTS `equipements_acquis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipements_acquis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `typeEquipement` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipements_acquis_projet_id_foreign` (`projet_id`),
  CONSTRAINT `equipements_acquis_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipements_acquis`
--

LOCK TABLES `equipements_acquis` WRITE;
/*!40000 ALTER TABLE `equipements_acquis` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipements_acquis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departement_id` int(10) unsigned NOT NULL,
  `nomEquipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionEquipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectifEquipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipes_departement_id_foreign` (`departement_id`),
  CONSTRAINT `equipes_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES (1,2,'L’équipe des essais cliniques (EEC)','L\'equipe est chargée de la coordination, du monitoring et de la mise en œuvre selon les standards internationaux, de l’ensemble des essais cliniques hébergés au Centre MURAZ.','Vero debitis voluptates nemo. Et ea consequuntur voluptatem ad. Laboriosam aperiam architecto molestiae quos error quia ullam tenetur. Officiis sequi sed reprehenderit explicabo fuga.',NULL,NULL),(2,2,'Equipe médicale','est chargée de l’organisation et de la dispensation des soins offerts à la population dans les cliniques du Centre MURAZ, et de la recherche sur l’analyse décisionnelle médicale, en collaboration avec les chercheurs des différents Centres de Santé du Burkina.','Dolor fugit rerum expedita enim. Autem vitae ipsa non sed.',NULL,NULL),(3,3,'Equipe Politiques et Système de Santé (EPSS)','Voluptas voluptatum enim laboriosam quo. Sapiente earum alias tenetur distinctio animi non repudiandae et. Dolores maiores laudantium rerum. Dolor esse qui dicta voluptatem.','Quisquam deserunt exercitationem et officia eligendi. Magnam sed amet nihil voluptate. Non possimus repellat nesciunt sed quia. Odit beatae quidem velit aliquam enim ea possimus.',NULL,NULL),(4,3,'Equipe Santé Environnementale, Maladies Chroniques et Nutrition (ESEMCN)','Facilis nam quidem repellendus harum id. Ea laboriosam at veritatis. Voluptates illo quaerat quibusdam quod reprehenderit sequi delectus.','Vero sed suscipit officia voluptatem laborum natus. Et nihil optio quo rerum.',NULL,NULL),(5,3,'Equipe Santé de la Mère et de l’Enfant (ESME)','Fugiat exercitationem sint et distinctio quaerat. Quia consequuntur iure necessitatibus voluptatum atque tempore non ipsum. Odio iusto sit at laborum.','Voluptatum quisquam quia enim dolorem eos perspiciatis eos. Porro ut eius rerum. Nisi exercitationem fuga eius iste iure consectetur fugit.',NULL,NULL),(6,3,'Equipe Sociétés et Santé (ESS)','Porro temporibus facere voluptas molestiae repellat. Non qui et eos. Unde ut quae impedit est.','Fugiat enim ut iste aliquam adipisci labore harum aut. Ut molestias quae itaque. Reiciendis omnis vitae qui sint temporibus. Ullam et in quasi nesciunt omnis et quis.',NULL,NULL);
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleEvenement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateFin` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examens`
--

DROP TABLE IF EXISTS `examens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleExamen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examens`
--

LOCK TABLES `examens` WRITE;
/*!40000 ALTER TABLE `examens` DISABLE KEYS */;
/*!40000 ALTER TABLE `examens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences_professionnelles`
--

DROP TABLE IF EXISTS `experiences_professionnelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiences_professionnelles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `societe_id` int(10) unsigned DEFAULT NULL,
  `personne_id` int(10) unsigned NOT NULL,
  `posteOccupe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DebutExperience` datetime DEFAULT NULL,
  `FinExperience` datetime DEFAULT NULL,
  `pays` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_professionnelles_personne_id_foreign` (`personne_id`),
  KEY `experiences_professionnelles_societe_id_foreign` (`societe_id`),
  CONSTRAINT `experiences_professionnelles_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `experiences_professionnelles_societe_id_foreign` FOREIGN KEY (`societe_id`) REFERENCES `societes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences_professionnelles`
--

LOCK TABLES `experiences_professionnelles` WRITE;
/*!40000 ALTER TABLE `experiences_professionnelles` DISABLE KEYS */;
INSERT INTO `experiences_professionnelles` VALUES (1,NULL,204,'Attaché de recherche','J\'ai autre fois été attaché de recherche au CIRDES ou j\'ai traivailler sur les souches de la maladie myopathique','2004-01-06 00:00:00','2006-03-14 00:00:00','Burkina Faso, Bobo Dioulasso','2019-01-28 02:54:12','2019-01-28 02:54:12'),(2,NULL,204,'Chargé de recherche','J\'ai été chargé de recherche au niveau au  Centre de MAtroukou ou j\'ai établi la liste des agents pathogènes du maïs','2005-02-08 00:00:00','2006-02-22 00:00:00','Burkina Faso, Bobo Dioulasso','2019-01-28 02:58:10','2019-01-28 02:58:10');
/*!40000 ALTER TABLE `experiences_professionnelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences_specifiques`
--

DROP TABLE IF EXISTS `experiences_specifiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiences_specifiques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personne_id` int(10) unsigned NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateFinExperience` datetime NOT NULL,
  `pays` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_specifiques_personne_id_foreign` (`personne_id`),
  CONSTRAINT `experiences_specifiques_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences_specifiques`
--

LOCK TABLES `experiences_specifiques` WRITE;
/*!40000 ALTER TABLE `experiences_specifiques` DISABLE KEYS */;
/*!40000 ALTER TABLE `experiences_specifiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formations_academiques`
--

DROP TABLE IF EXISTS `formations_academiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formations_academiques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personne_id` int(10) unsigned NOT NULL,
  `nomFormationAcademique` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateFormationAcademique` datetime NOT NULL,
  `lieuFormationAcademique` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formations_academiques_personne_id_foreign` (`personne_id`),
  CONSTRAINT `formations_academiques_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations_academiques`
--

LOCK TABLES `formations_academiques` WRITE;
/*!40000 ALTER TABLE `formations_academiques` DISABLE KEYS */;
INSERT INTO `formations_academiques` VALUES (1,204,'Cours de d\'angrimologie veserale','2011-12-21 00:00:00','Université Polytechnique de Bobo','2019-01-28 03:00:29','2019-01-28 03:00:29');
/*!40000 ALTER TABLE `formations_academiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formations_en_cours`
--

DROP TABLE IF EXISTS `formations_en_cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formations_en_cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeFormationEnCours_id` int(10) unsigned NOT NULL,
  `libelleFormation` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` datetime NOT NULL,
  `lieuFormation` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personne_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formations_en_cours_typeformationencours_id_foreign` (`typeFormationEnCours_id`),
  KEY `formations_en_cours_personne_id_foreign` (`personne_id`),
  CONSTRAINT `formations_en_cours_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `formations_en_cours_typeformationencours_id_foreign` FOREIGN KEY (`typeFormationEnCours_id`) REFERENCES `type_formation_en_cours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations_en_cours`
--

LOCK TABLES `formations_en_cours` WRITE;
/*!40000 ALTER TABLE `formations_en_cours` DISABLE KEYS */;
/*!40000 ALTER TABLE `formations_en_cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idees_de_projet`
--

DROP TABLE IF EXISTS `idees_de_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idees_de_projet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institutionSouhaite_id` int(10) unsigned DEFAULT NULL,
  `intituleIdee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutionProposeur_id` int(10) unsigned DEFAULT NULL,
  `projet_id` int(10) unsigned DEFAULT NULL,
  `personneinterne_id` int(10) unsigned DEFAULT NULL,
  `personneexterne_id` int(10) unsigned DEFAULT NULL,
  `cheminProtocole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soumis` tinyint(1) NOT NULL DEFAULT '0',
  `dateSoumission` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idees_de_projet_projet_id_foreign` (`projet_id`),
  KEY `idees_de_projet_institutionproposeur_id_foreign` (`institutionProposeur_id`),
  KEY `idees_de_projet_institutionsouhaite_id_foreign` (`institutionSouhaite_id`),
  KEY `idees_de_projet_personneinterne_id_foreign` (`personneinterne_id`),
  KEY `idees_de_projet_personneexterne_id_foreign` (`personneexterne_id`),
  CONSTRAINT `idees_de_projet_institutionproposeur_id_foreign` FOREIGN KEY (`institutionProposeur_id`) REFERENCES `institutions` (`id`),
  CONSTRAINT `idees_de_projet_institutionsouhaite_id_foreign` FOREIGN KEY (`institutionSouhaite_id`) REFERENCES `institutions` (`id`),
  CONSTRAINT `idees_de_projet_personneexterne_id_foreign` FOREIGN KEY (`personneexterne_id`) REFERENCES `personne_externes` (`id`),
  CONSTRAINT `idees_de_projet_personneinterne_id_foreign` FOREIGN KEY (`personneinterne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `idees_de_projet_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idees_de_projet`
--

LOCK TABLES `idees_de_projet` WRITE;
/*!40000 ALTER TABLE `idees_de_projet` DISABLE KEYS */;
/*!40000 ALTER TABLE `idees_de_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evenement_id` int(10) unsigned NOT NULL,
  `cheminImage` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionImage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_evenement_id_foreign` (`evenement_id`),
  CONSTRAINT `images_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infos_examens`
--

DROP TABLE IF EXISTS `infos_examens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infos_examens` (
  `section_id` int(10) unsigned NOT NULL,
  `examen_id` int(10) unsigned NOT NULL,
  `anneeExamen` year(4) NOT NULL,
  `nombreExamen` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `infos_examens_examen_id_foreign` (`examen_id`),
  KEY `infos_examens_section_id_foreign` (`section_id`),
  CONSTRAINT `infos_examens_examen_id_foreign` FOREIGN KEY (`examen_id`) REFERENCES `examens` (`id`),
  CONSTRAINT `infos_examens_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infos_examens`
--

LOCK TABLES `infos_examens` WRITE;
/*!40000 ALTER TABLE `infos_examens` DISABLE KEYS */;
/*!40000 ALTER TABLE `infos_examens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeInstitution_id` int(10) unsigned NOT NULL,
  `nomInstitution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailInstitution` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresseInstitution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paysInstitution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `institutions_typeinstitution_id_foreign` (`typeInstitution_id`),
  CONSTRAINT `institutions_typeinstitution_id_foreign` FOREIGN KEY (`typeInstitution_id`) REFERENCES `type_institutions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,4,'Walter-Jones','bborer@gmail.com','736 Hessel Corner Apt. 559\nSouth Madalynchester, WA 21451','Andorra',NULL,NULL),(2,4,'Beier Inc','misty.rowe@kub.com','614 Lela Crossroad\nRunolfssonview, WY 44557','Saint Pierre and Miquelon',NULL,NULL),(3,4,'Effertz Ltd','mkozey@gmail.com','4076 Ferry Hills\nNorth Sofiaville, VT 68860-3438','Jamaica',NULL,NULL),(4,4,'Harris, Jacobs and Prohaska','howe.doug@krajcik.org','86174 VonRueden Rapids\nCarrollmouth, NC 07218','Myanmar',NULL,NULL),(5,1,'Schmeler LLC','leilani.little@mcclure.com','32746 Fahey Fords Apt. 264\nNew Frankiebury, CO 42196','South Georgia and the South Sandwich Islands',NULL,NULL),(6,1,'Moore Group','muriel.littel@gmail.com','789 Stewart Common Apt. 630\nNorth Angus, NV 19046-9337','Comoros',NULL,NULL),(7,4,'Hessel Inc','pdavis@koepp.com','7053 Melvina Trail\nEast Verliebury, NV 11553-9203','Marshall Islands',NULL,NULL),(8,1,'Bednar, Sawayn and Jenkins','alphonso.waters@yahoo.com','232 Jeremie Throughway Apt. 993\nDougberg, HI 97467','Bahamas',NULL,NULL),(9,4,'Jacobi-Dach','mable14@yahoo.com','582 Abshire Dale\nNew Sageshire, WA 74706','Andorra',NULL,NULL),(10,1,'Witting-Miller','phodkiewicz@breitenberg.com','8533 Paucek Shores Suite 278\nSouth Roslyn, NY 37809','United States Minor Outlying Islands',NULL,NULL),(11,4,'Goyette-Parker','glover.dane@yahoo.com','96939 Gaylord Pine Apt. 333\nNorth Orrinchester, SC 53361','Slovakia (Slovak Republic)',NULL,NULL),(12,3,'Fay, Ziemann and Wintheiser','dblock@rosenbaum.biz','979 Cortney Summit Suite 462\nPort Erwinland, OH 88864','Cuba',NULL,NULL),(13,4,'Gerlach, Pollich and Schaefer','helena69@kreiger.info','6007 Cara Fall Suite 939\nWest Ashtyn, UT 47864','Netherlands',NULL,NULL),(14,1,'Schmeler, Collier and Gibson','georgette.hayes@weimann.net','1466 Huels Parkway\nKubland, SC 91701-1044','Panama',NULL,NULL),(15,2,'Kuhic, Borer and Powlowski','arlene07@strosin.com','127 Leanne Avenue\nWest Kareemshire, MN 98356','Kenya',NULL,NULL),(16,1,'Casper, Konopelski and Pouros','karianne80@oconnell.com','7740 Dickinson Stream\nLake Delphiafurt, ID 56231-8389','Venezuela',NULL,NULL),(17,1,'Ondricka, Gleason and Herzog','runolfsson.bill@yahoo.com','4226 Maurine Gardens\nPort Easterland, ID 90120-5984','Dominica',NULL,NULL),(18,1,'Padberg, Simonis and Welch','hannah.fahey@stehr.com','348 Reichel Fords\nEast Helmermouth, NV 52111-5803','Uruguay',NULL,NULL),(19,4,'Heidenreich, Funk and Hirthe','uspencer@hotmail.com','82150 Mercedes Forges\nNew Percivalburgh, VA 80477','Poland',NULL,NULL),(20,3,'Dickinson Group','gebert@hartmann.com','5182 Dariana Garden Suite 314\nAaliyahland, MS 86094-9681','Dominican Republic',NULL,NULL),(21,3,'Hammes-Muller','lavern28@runolfsdottir.com','26572 Laverna Burgs\nPort Monroeside, VA 13193-5171','Algeria',NULL,NULL),(22,2,'Pollich LLC','noemi31@baumbach.org','39286 Howard Haven Suite 307\nWest Brennaburgh, WI 75524-8028','Ukraine',NULL,NULL),(23,2,'Schaden-Bogisich','weissnat.oran@yahoo.com','250 Ines Glens\nStrosinmouth, DC 70699','Indonesia',NULL,NULL),(24,4,'Herzog-Jacobs','uohara@gmail.com','1725 Gaylord Lock Suite 306\nSchillerview, TN 90255-6801','Mongolia',NULL,NULL),(25,4,'Nader-Klein','juana31@hotmail.com','186 Wiza Park Apt. 828\nNorth Jermeyburgh, KS 67802-9410','Kuwait',NULL,NULL),(26,2,'Kuphal Inc','macy84@gmail.com','71512 Cartwright Prairie Apt. 056\nSouth Kelsiview, SD 07562-9173','Venezuela',NULL,NULL),(27,3,'Zulauf LLC','americo54@roob.biz','42683 Priscilla Falls Suite 369\nEast Lydastad, FL 66313-4576','Qatar',NULL,NULL),(28,2,'Reichel-Mosciski','snader@dare.com','936 Haag Squares\nSouth Paigeville, LA 78170-4072','Macao',NULL,NULL),(29,3,'Ratke-Zboncak','pacocha.mozelle@hotmail.com','75642 Quincy Fords\nRobelview, MO 03361','Haiti',NULL,NULL),(30,4,'Halvorson-Kunze','dsanford@schuster.biz','460 Renner Shores\nNorth Retha, AK 92143-0547','Libyan Arab Jamahiriya',NULL,NULL);
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investigateur_externes`
--

DROP TABLE IF EXISTS `investigateur_externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investigateur_externes` (
  `personne_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`projet_id`),
  KEY `investigateur_externes_projet_id_foreign` (`projet_id`),
  CONSTRAINT `investigateur_externes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`),
  CONSTRAINT `investigateur_externes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investigateur_externes`
--

LOCK TABLES `investigateur_externes` WRITE;
/*!40000 ALTER TABLE `investigateur_externes` DISABLE KEYS */;
/*!40000 ALTER TABLE `investigateur_externes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investigateur_internes`
--

DROP TABLE IF EXISTS `investigateur_internes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investigateur_internes` (
  `personne_id` int(10) unsigned NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`),
  KEY `investigateur_internes_projet_id_foreign` (`projet_id`),
  CONSTRAINT `investigateur_internes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `investigateur_internes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investigateur_internes`
--

LOCK TABLES `investigateur_internes` WRITE;
/*!40000 ALTER TABLE `investigateur_internes` DISABLE KEYS */;
INSERT INTO `investigateur_internes` VALUES (3,2,NULL,NULL),(8,2,NULL,NULL),(38,2,NULL,NULL),(204,2,NULL,NULL);
/*!40000 ALTER TABLE `investigateur_internes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratoires`
--

DROP TABLE IF EXISTS `laboratoires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratoires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departement_id` int(10) unsigned NOT NULL,
  `nomLaboratoire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratoires_departement_id_foreign` (`departement_id`),
  CONSTRAINT `laboratoires_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratoires`
--

LOCK TABLES `laboratoires` WRITE;
/*!40000 ALTER TABLE `laboratoires` DISABLE KEYS */;
INSERT INTO `laboratoires` VALUES (1,1,'Laboratoire de Biologie Clinique',NULL,NULL),(2,1,'Laboratoire de Recherche',NULL,NULL);
/*!40000 ALTER TABLE `laboratoires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langues`
--

DROP TABLE IF EXISTS `langues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `langues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleLangue` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langues`
--

LOCK TABLES `langues` WRITE;
/*!40000 ALTER TABLE `langues` DISABLE KEYS */;
INSERT INTO `langues` VALUES (1,'Bobo',NULL,NULL),(2,'Français',NULL,NULL),(3,'Anglais',NULL,NULL),(4,'Dioula',NULL,NULL),(5,'Mooré',NULL,NULL),(6,'Foulfoudé',NULL,NULL),(7,'Chinois',NULL,NULL),(8,'Espagnol',NULL,NULL),(9,'Italien',NULL,NULL);
/*!40000 ALTER TABLE `langues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2018_11_05_141807_create_activites_table',1),(3,'2018_11_05_142729_create_associations_table',1),(4,'2018_11_05_143940_create_objectifs_table',1),(5,'2018_11_05_144725_create_personne_externes_table',1),(6,'2018_11_05_145525_create_bourses_table',1),(7,'2018_11_05_145639_create_personne_internes_table',1),(8,'2018_11_05_150138_create_departements_table',1),(9,'2018_11_05_150859_create_detail_chef_direction_table',1),(10,'2018_11_05_151318_create_perspectives_table',1),(11,'2018_11_05_151607_create_detail_chef_equipe_table',1),(12,'2018_11_05_151921_create_prestation_de_services_table',1),(13,'2018_11_05_153337_create_detail_chef_unite_table',1),(14,'2018_11_05_153702_create_detail_co_auteur_table',1),(15,'2018_11_05_154546_create_projets_table',1),(16,'2018_11_05_154605_create_detail_diplome_externe_table',1),(17,'2018_11_05_155303_create_detail_diplome_interne_table',1),(18,'2018_11_05_160448_create_detail_statut_projet_table',1),(19,'2018_11_05_161316_create_detail_partenariat_technique_table',1),(20,'2018_11_05_161820_create_directions_table',1),(21,'2018_11_05_161916_create_publications_table',1),(22,'2018_11_05_162031_create_equipes_table',1),(23,'2018_11_05_163305_create_equipements_acquis_table',1),(24,'2018_11_05_163703_create_evenements_table',1),(25,'2018_11_05_163852_create_examens_table',1),(26,'2018_11_05_164226_create_experiences_professionnelles_table',1),(27,'2018_11_05_164900_create_experiences_specifiques_table',1),(28,'2018_11_05_165047_create_formations_academiques_table',1),(29,'2018_11_05_165212_create_references_table',1),(30,'2018_11_05_165239_create_formations_en_cours_table',1),(31,'2018_11_05_165641_create_idees_de_projet_table',1),(32,'2018_11_05_165642_create_resultats_attendus_table',1),(33,'2018_11_05_165642_create_resultats_obtenus_table',1),(34,'2018_11_05_170242_create_sections_table',1),(35,'2018_11_05_170358_create_images_table',1),(36,'2018_11_05_170450_create_societes_table',1),(37,'2018_11_05_170703_create_statuts_table',1),(38,'2018_11_05_170842_create_infos_examens_table',1),(39,'2018_11_05_171131_create_type_diplomes_table',1),(40,'2018_11_05_171211_create_institutions_table',1),(41,'2018_11_05_171540_create_laboratoires_table',1),(42,'2018_11_05_171601_create_type_formation_en_cours_table',1),(43,'2018_11_05_171712_create_langues_table',1),(44,'2018_11_05_171809_create_type_institutions_table',1),(45,'2018_11_05_171944_create_niveau_langue_externe_table',1),(46,'2018_11_05_171952_create_type_publications_table',1),(47,'2018_11_05_172059_create_niveau_langue_interne_table',1),(48,'2018_11_05_172532_create_unite_de_recherches_table',1),(49,'2018_11_05_172713_create_associe_externes_table',1),(50,'2018_11_05_172844_create_associe_internes_table',1),(51,'2018_11_05_173211_create_co_investigateur_externes_table',1),(52,'2018_11_05_173631_create_co_investigateur_internes_table',1),(53,'2018_11_05_173955_create_investigateur_externes_table',1),(54,'2018_11_05_174137_create_investigateur_internes_table',1),(55,'2018_11_05_174326_create_personne_associations_table',1),(56,'2018_11_05_174522_create_qualification_personne_externes_table',1),(57,'2018_11_05_174721_create_qualification_personne_internes_table',1),(58,'2018_11_06_075909_create_detail_chef_laboratoire_table',1),(59,'2018_11_06_080149_create_detail_partenariat_financier_table',1),(60,'2018_11_06_103031_add_constraint_fk_activitesmene',1),(61,'2018_11_06_103112_add_constraint_fk_bourseprojet',1),(62,'2018_11_06_103140_add_constraint_fk_pinternebourse',1),(63,'2018_11_06_105417_add_constraint_fk_directeur_direction',1),(64,'2018_11_06_105731_add_constraint_fk_directeurpinterne',1),(65,'2018_11_06_112250_add_constraint_fk_affectdept',1),(66,'2018_11_06_120151_add_constraint_fk_chefequipeequipe',1),(67,'2018_11_06_120549_add_constraint_fk_chefequipinterne',1),(68,'2018_11_06_121054_add_constraint_fk_chef_unite',1),(69,'2018_11_06_121804_add_constraint_fk_chef_unitepinterne',1),(70,'2018_11_06_122246_add_constraint_fk_co_auteur_publ',1),(71,'2018_11_06_122623_add_constraint_fk_co_auteurpinterne',1),(72,'2018_11_06_122831_add_constraint_fk_diplomepexterne',1),(73,'2018_11_06_123050_add_constraint_fk_diplomepexternetypediplome',1),(74,'2018_11_06_124351_add_constraint_fk_diplomepinterne',1),(75,'2018_11_06_124701_add_constraint_fk_diplomepinternetypediplome',1),(76,'2018_11_06_124920_add_constraint_fk_ptechniqueinst',1),(77,'2018_11_06_125440_add_constraint_fk_ptechniqueprojet',1),(78,'2018_11_06_130106_add_constraint_fk_statutprojetprojet',1),(79,'2018_11_06_130907_add_constraint_fk_statutprojetstatut',1),(80,'2018_11_06_131449_add_constraint_fk_equidept',1),(81,'2018_11_06_131850_add_constraint_fk_equiaquis',1),(82,'2018_11_06_132247_add_constraint_fk_exppro',1),(83,'2018_11_06_132726_add_constraint_fk_expspe',1),(84,'2018_11_06_133116_add_constraint_fk_expprosociete',1),(85,'2018_11_06_133611_add_constraint_fk_formaacaeff',1),(86,'2018_11_06_133928_add_constraint_fk_formcourtyp',1),(87,'2018_11_06_140311_add_constraint_fk_ideeprojet',1),(88,'2018_11_06_140721_add_constraint_fk_ideeprojetpropinst',1),(89,'2018_11_06_141137_add_constraint_fk_ideeprojetfinasouhaiinst',1),(90,'2018_11_06_142028_add_constraint_fk_ideeprojetproposepinterne',1),(91,'2018_11_06_142318_add_constraint_fk_ideeprojetproposepexterne',1),(92,'2018_11_06_142539_add_constraint_fk_imageeve',1),(93,'2018_11_06_142922_add_constraint_fk_sectionexamen',1),(94,'2018_11_06_143210_add_constraint_fk_sectionexamensection',1),(95,'2018_11_06_143946_add_constraint_fk_typage_institution',1),(96,'2018_11_06_144712_add_constraint_fk_affeclabo',1),(97,'2018_11_06_145028_add_constraint_niveaulangext',1),(98,'2018_11_06_150023_add_constraint_niveaulangpexterne',1),(99,'2018_11_06_150418_add_constraint_niveaulanginterne',1),(100,'2018_11_06_151318_add_constraint_niveaulangpinterne',1),(101,'2018_11_06_152115_add_constraint_projetobjectis',1),(102,'2018_11_06_152414_add_constraint_provenance_perso_externe',1),(103,'2018_11_06_153706_add_constraint_formationencourspers',1),(104,'2018_11_06_154304_add_constraint_membr_equipe',1),(105,'2018_11_06_154622_add_constraint_membr_unite_r',1),(106,'2018_11_06_155005_add_constraint_perpectipro',1),(107,'2018_11_06_155348_add_constraint_fk_demandeur_service',1),(108,'2018_11_06_155710_add_constraint_fk_service_rendu',1),(109,'2018_11_06_160012_add_constraint_fk_projet_idee_projet',1),(110,'2018_11_06_160556_add_constraint_fk_projeteffectueequi',1),(111,'2018_11_06_160815_add_constraint_fk_projeteffectueunite',1),(112,'2018_11_06_161411_add_constraint_fk_auteurpubl',1),(113,'2018_11_06_161733_add_constraint_fk_evepubl',1),(114,'2018_11_06_162054_add_constraint_fk_projetpubl',1),(115,'2018_11_06_162353_add_constraint_fk_typagepubl',1),(116,'2018_11_06_162948_add_constraint_fk_personn_reference',1),(117,'2018_11_06_164327_add_constraint_fk_ideepro_resultat_attend',1),(118,'2018_11_06_165110_add_constraint_fk_ideepro_resultat_obtenu',1),(119,'2018_11_06_165844_add_constraint_fk_sectionadd_labo',1),(120,'2018_11_06_170144_add_constraint_fk__unite_recheradd_labo',1),(121,'2018_11_06_170526_add_constraint_fk_associe_externe_equipe',1),(122,'2018_11_06_170840_add_constraint_fk_associe_externepexterne',1),(123,'2018_11_06_171128_add_constraint_fk_associe_interne_equipe',1),(124,'2018_11_06_171442_add_constraint_fk_associe_internepinterne',1),(125,'2018_11_06_171808_add_constraint_fk_associe_detailcl_labo',1),(126,'2018_11_06_172032_add_constraint_fk_associe_detailclpinterne',1),(127,'2018_11_06_172448_add_constraint_fk_coinvestigateur_externepexterne',1),(128,'2018_11_06_172902_add_constraint_fk_coinvestigateur_externeprojet',1),(129,'2018_11_06_173152_add_constraint_fk_coinvestigateur_internepinterne',1),(130,'2018_11_06_173503_add_constraint_fk_coinvestigateur_interneprojet',1),(131,'2018_11_06_173740_add_constraint_fk_investigateur_externepexterne',1),(132,'2018_11_06_173949_add_constraint_fk_investigateur_externeprojet',1),(133,'2018_11_06_174202_add_constraint_fk_investigateur_internepinterne',1),(134,'2018_11_06_174424_add_constraint_fk_investigateur_interneprojet',1),(135,'2018_11_06_174841_add_constraint_fk_passociationassoc',1),(136,'2018_11_06_175246_add_constraint_fk_associationpinterne',1),(137,'2018_11_11_120347_create_qualifications_table',1),(138,'2018_11_11_120653_add_constraint_fk_qualicationsexterne',1),(139,'2018_11_11_120829_add_constraint_fk_qualicationsext',1),(140,'2018_11_11_121002_add_constraint_fk_qualint',1),(141,'2018_11_11_121113_add_constraint_fk_qualpinterne',1),(142,'2018_11_16_185120_create_type_projet_table',1),(143,'2018_11_16_185505_add_contraint_type_projet_table',1),(144,'2019_01_04_163146_create_permission_tables',1),(145,'2019_01_16_210703_create_detail_chef_departement',1),(146,'2019_01_16_210910_add_constraint_fk_chef_depart',1),(147,'2019_01_16_211213_add_constraint_fk_chef_depart_d',1),(148,'2019_01_24_173833_change_column_type_publication',2),(149,'2019_01_28_022449_change_column_intituletype',3),(150,'2019_01_28_184757_add_column_cv_extart_personne_internes',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (1,'App\\User',1),(2,'App\\User',2),(3,'App\\User',204);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(6,'App\\User',2),(3,'App\\User',3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau_langue_externe`
--

DROP TABLE IF EXISTS `niveau_langue_externe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveau_langue_externe` (
  `personne_id` int(10) unsigned NOT NULL,
  `langue_id` int(10) unsigned NOT NULL,
  `niveauLu` int(11) NOT NULL DEFAULT '0',
  `niveauParle` int(11) NOT NULL DEFAULT '0',
  `niveauEcrit` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`langue_id`),
  KEY `niveau_langue_externe_langue_id_foreign` (`langue_id`),
  CONSTRAINT `niveau_langue_externe_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`),
  CONSTRAINT `niveau_langue_externe_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau_langue_externe`
--

LOCK TABLES `niveau_langue_externe` WRITE;
/*!40000 ALTER TABLE `niveau_langue_externe` DISABLE KEYS */;
/*!40000 ALTER TABLE `niveau_langue_externe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau_langue_interne`
--

DROP TABLE IF EXISTS `niveau_langue_interne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveau_langue_interne` (
  `personne_id` int(10) unsigned NOT NULL,
  `langue_id` int(10) unsigned NOT NULL,
  `niveauLu` int(11) NOT NULL DEFAULT '0',
  `niveauParle` int(11) NOT NULL DEFAULT '0',
  `niveauEcrit` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`langue_id`),
  KEY `niveau_langue_interne_langue_id_foreign` (`langue_id`),
  CONSTRAINT `niveau_langue_interne_langue_id_foreign` FOREIGN KEY (`langue_id`) REFERENCES `langues` (`id`),
  CONSTRAINT `niveau_langue_interne_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau_langue_interne`
--

LOCK TABLES `niveau_langue_interne` WRITE;
/*!40000 ALTER TABLE `niveau_langue_interne` DISABLE KEYS */;
INSERT INTO `niveau_langue_interne` VALUES (1,2,2,3,5,NULL,NULL),(1,7,4,5,3,NULL,NULL),(1,8,1,2,3,NULL,NULL),(204,1,3,4,5,NULL,NULL),(204,2,5,5,5,NULL,NULL),(204,3,1,1,1,NULL,NULL),(204,6,1,1,1,NULL,NULL),(204,7,4,4,4,NULL,NULL);
/*!40000 ALTER TABLE `niveau_langue_interne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objectifs`
--

DROP TABLE IF EXISTS `objectifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objectifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `intiule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeObjectif` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objectifs_projet_id_foreign` (`projet_id`),
  CONSTRAINT `objectifs_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objectifs`
--

LOCK TABLES `objectifs` WRITE;
/*!40000 ALTER TABLE `objectifs` DISABLE KEYS */;
INSERT INTO `objectifs` VALUES (1,3,'Titre','Evaluer la sécurité d’emploi et la tolérance de différents schémas de vaccination par l’Ad26.ZEBOV\r\net MVA- BN-Filo administrés par voie intramusculaire (IM) dans le cadre de schémas prime-boost hétérologues\r\nles Jours 1 et 29, les Jours 1 et 57, ou les Jours 1 et 85, chez des adultes sains, y compris des personnes\r\nâgées, et les Jours 1 et 29 ainsi que les Jours 1 et 57 chez des participants vivant avec le VIH, et des enfants\r\nsains dans trois strates d’âge.','principal','2019-01-28 02:40:41','2019-01-28 02:40:41'),(2,3,'Titre','Evaluer les réponses immunitaires à la GP de l’EBOV pour les différents schémas de vaccination\r\npar l’Ad26.ZEBOV et le MVA- BN-Filo en étude.','secondaire','2019-01-28 02:41:03','2019-01-28 02:41:03');
/*!40000 ALTER TABLE `objectifs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'edit projet 1','web','2019-01-23 12:33:58','2019-01-23 12:33:58'),(2,'edit projet 2','web','2019-01-24 12:17:41','2019-01-24 12:17:41'),(3,'edit projet 3','web','2019-01-28 02:39:01','2019-01-28 02:39:01');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne_associations`
--

DROP TABLE IF EXISTS `personne_associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne_associations` (
  `personne_id` int(10) unsigned NOT NULL,
  `association_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`association_id`),
  KEY `personne_associations_association_id_foreign` (`association_id`),
  CONSTRAINT `personne_associations_association_id_foreign` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`),
  CONSTRAINT `personne_associations_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne_associations`
--

LOCK TABLES `personne_associations` WRITE;
/*!40000 ALTER TABLE `personne_associations` DISABLE KEYS */;
/*!40000 ALTER TABLE `personne_associations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne_externes`
--

DROP TABLE IF EXISTS `personne_externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne_externes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) unsigned DEFAULT NULL,
  `posteOccupe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` datetime NOT NULL,
  `lieuNaissance` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motDePasse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personne_externes_email_unique` (`email`),
  UNIQUE KEY `personne_externes_login_unique` (`login`),
  KEY `personne_externes_institution_id_foreign` (`institution_id`),
  CONSTRAINT `personne_externes_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne_externes`
--

LOCK TABLES `personne_externes` WRITE;
/*!40000 ALTER TABLE `personne_externes` DISABLE KEYS */;
/*!40000 ALTER TABLE `personne_externes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne_internes`
--

DROP TABLE IF EXISTS `personne_internes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne_internes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipe_id` int(10) unsigned DEFAULT NULL,
  `unite_id` int(10) unsigned DEFAULT NULL,
  `posteOccupe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` datetime NOT NULL,
  `lieuNaissance` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `cv_extract` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `personne_internes_email_unique` (`email`),
  UNIQUE KEY `personne_internes_login_unique` (`login`),
  KEY `personne_internes_equipe_id_foreign` (`equipe_id`),
  KEY `personne_internes_unite_id_foreign` (`unite_id`),
  CONSTRAINT `personne_internes_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `personne_internes_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unite_de_recherches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne_internes`
--

LOCK TABLES `personne_internes` WRITE;
/*!40000 ALTER TABLE `personne_internes` DISABLE KEYS */;
INSERT INTO `personne_internes` VALUES (1,NULL,NULL,NULL,NULL,'Admin','Admin','1926-11-20 00:00:00','Burkina Faso','Burkinabé','admin@admin.com',NULL,'1548173049.jpeg','2vROgbYN6NsxSU7XEMZAJ9094UT0VimPzrFJnKebw1tHoIhQdLsDgoIzgUQZ','713 Eleazar Parkways\nLake Harrisonburgh, MA 67246','lueilwitz.cortney','$2y$10$ILcifWNNADFAnuJ9Oep8OuXfQKjUG0cbLFj7wB2FNDh9mtx7OSmwe',NULL,'2019-01-22 16:04:09','2019-01-22 15:39:25',1),(2,NULL,3,NULL,NULL,'Sanou','Abou Dramane','1996-02-07 00:00:00','Bobo Dioulasso','Burkina Faso','aboudra1996@gmail.com',NULL,'user.jpg','wMZSzSjyLmX4VGVEPxOyhWup4lnT3J0OEOwUwCxnfiRlzYFexUtdlFu6gB7q','Bobo Dioulasso','AbouOpenSource','$2y$10$lZLjhqM03G4A37EaZ4Kve.v5FdkslaEi.GLGoV9/WrwrFrkn5N8sG','2019-01-23 00:52:37','2019-01-23 00:57:37','2019-01-23 00:57:37',1),(3,NULL,NULL,4,NULL,'Sanou','Dramane','1987-09-08 00:00:00','Bobo Dioulasso','Burkina Faso','directeur@example.com',NULL,'user.jpg','E1gPDb2T5oyg10rI4i9IYFanEryC1slsezt16CezncSAMLU3tRMrOlMyVuWt','Bobo Dioulasso','DramaneInter','$2y$10$tgXBNayeVF6px1uMCMVW..tFQLWFIFPy5PWl79mtpny0fMdblMRce','2019-01-23 16:36:10','2019-01-23 16:38:07','2019-01-23 16:38:07',1),(4,NULL,NULL,4,NULL,'Kreiger','Francisca','1929-05-29 00:00:00','Burkina Faso','Burkinabé','ncruickshank@example.com',NULL,'user.jpg',NULL,'6733 Christian Ports Suite 196\nEast Kimberly, CO 47703','hwehner','$2y$10$hhOaq50qDa9TaQ8ot6BCPO9NbwebEJs.5x49D4GJaIo6bavgj4psC','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:32',1),(5,NULL,NULL,7,NULL,'Hartmann','Joany','1923-07-26 00:00:00','Burkina Faso','Burkinabé','arnold.lynch@example.org',NULL,'user.jpg',NULL,'67056 Marks Cliffs\nLaneyside, MD 38166','nettie36','$2y$10$HGM.wflBZ3WOX9uyY0cXq.jpA5BTavxS0z2MiZ8e9rU1uT./MkuN6','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:32',1),(6,NULL,NULL,2,NULL,'Metz','Merl','1995-08-06 00:00:00','Burkina Faso','Burkinabé','ava48@example.com',NULL,'user.jpg',NULL,'212 Grady Meadows\nCitlallibury, LA 41047-7489','anya.wunsch','$2y$10$7JjaEay0bEVLz3Lc4k85v.d/mRnu9nIBSMjS4CJ.Alu.EMU5lsuCy','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:32',1),(7,NULL,NULL,1,NULL,'Legros','Benton','1970-07-01 00:00:00','Burkina Faso','Burkinabé','horacio.prohaska@example.org',NULL,'user.jpg',NULL,'4498 Gusikowski Plaza Apt. 006\nCorwinmouth, AK 23134','bridie20','$2y$10$puRRD19e97FfQ41JrKXVP.hjvfSpXG1FlhFE5rSObxYurvl199W9e','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:32',1),(8,NULL,NULL,4,NULL,'Parisian','Silas','2011-02-17 00:00:00','Burkina Faso','Burkinabé','cooper.jast@example.org',NULL,'user.jpg',NULL,'8831 Turner Vista\nWest Hayley, DC 65837','ptremblay','$2y$10$U8./STlxix2Y/WIfiaHgRu0h/nmJDGlyu0ga04jbhjYPUm8IaZ6VK','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:32',1),(9,NULL,NULL,8,NULL,'Abernathy','Mattie','2002-11-26 00:00:00','Burkina Faso','Burkinabé','albertha.wilkinson@example.org',NULL,'user.jpg',NULL,'17116 Herzog River\nGerlachtown, LA 09131','oconnell.colt','$2y$10$uAlfCJT65Hyzg1Co95aycO.QmxFkcOCtqfoR4xoroG7fqLo27F7g.','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:33',1),(10,NULL,NULL,5,NULL,'Yundt','Vita','1931-06-04 00:00:00','Burkina Faso','Burkinabé','clemmie.beatty@example.org',NULL,'user.jpg',NULL,'521 Treva Flat Apt. 345\nNew Frankie, MI 19069-4920','udaniel','$2y$10$XbkGZNkaBHegHzcvYtsd.eBFjwrAke.x2i.LD4ZLEMJoGrco/M/N.','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:33',1),(11,NULL,NULL,1,NULL,'Rolfson','Eriberto','1928-05-03 00:00:00','Burkina Faso','Burkinabé','hilda.schaden@example.org',NULL,'user.jpg',NULL,'512 Icie Avenue Suite 790\nSheilabury, FL 90378','qgoldner','$2y$10$I75rvj.v32f0Ckd31Ahk/usiTj7jJFa9nnvjU6xj8ZFXIBvRYftnC','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:33',1),(12,NULL,NULL,8,NULL,'Gusikowski','Luigi','1951-10-14 00:00:00','Burkina Faso','Burkinabé','dmosciski@example.org',NULL,'user.jpg',NULL,'2021 Antonio Vista Apt. 721\nPort Eunicefort, MN 20759-8772','garry45','$2y$10$z0NeQieSseRKBVFTTc39rektA97nuHMtRc13g4IGHSujBbrAPNH8W','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:33',1),(13,NULL,NULL,9,NULL,'Gislason','Alvena','1959-06-11 00:00:00','Burkina Faso','Burkinabé','madelynn.harvey@example.com',NULL,'user.jpg',NULL,'552 Rebeca Falls\nLake Elda, WY 91863-8241','condricka','$2y$10$m6If3h7sTH8WnR89Kr4pz.4Ra5VNYLJARphHJFtErPe77k3TDaGS2','2019-01-24 13:22:55','2019-01-24 13:22:55','2019-01-24 13:22:33',1),(14,NULL,NULL,8,NULL,'Romaguera','Twila','1967-08-21 00:00:00','Burkina Faso','Burkinabé','domenic.bartell@example.com',NULL,'user.jpg',NULL,'852 Jaqueline Locks Suite 538\nLake Lafayettetown, MA 82133','halle61','$2y$10$9mPvOEXRCTw5cPwrs3.9j.swuwD8Vq4Do6xGm9E5S1cUda6mW7ZH.','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:33',1),(15,NULL,NULL,2,NULL,'Gusikowski','Jovani','1933-11-16 00:00:00','Burkina Faso','Burkinabé','mzboncak@example.net',NULL,'user.jpg',NULL,'61550 Devin Tunnel\nWest Magdalena, UT 59147-5860','zbernhard','$2y$10$8Bszj14yDBL.h.TXrZ/CeOzBWxgxyabqSd6ToPEPVJ7eKvarvdhbC','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:33',1),(16,NULL,NULL,6,NULL,'Miller','Tre','1928-02-28 00:00:00','Burkina Faso','Burkinabé','zmarquardt@example.com',NULL,'user.jpg',NULL,'612 Lebsack Gateway Apt. 175\nHomenickchester, NC 37206','windler.kiara','$2y$10$woqsnRjE5oOnH/hxMGipTOPKaChKHAJbbm0KgsFc.P/JnJCwqKR52','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:33',1),(17,NULL,NULL,7,NULL,'Cartwright','Ignacio','1999-09-16 00:00:00','Burkina Faso','Burkinabé','jermain39@example.com',NULL,'user.jpg',NULL,'622 Mosciski Unions\nToyport, SD 41807-1498','gsipes','$2y$10$ckHx36joHyuqEo8zktOPTugMLE5pghPLQiF7OdT2N1J3egrnVb0Ta','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:33',1),(18,NULL,NULL,4,NULL,'Walker','Scottie','2000-04-07 00:00:00','Burkina Faso','Burkinabé','royal11@example.org',NULL,'user.jpg',NULL,'33400 Emilio Vista\nSchummstad, KY 75819-2093','ccasper','$2y$10$cT05sZ9Uo6cRaiG0cA95luUvCNaCW6ihHdmsyNejILLpHuQq27EW2','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(19,NULL,NULL,8,NULL,'Erdman','Alberta','1924-05-08 00:00:00','Burkina Faso','Burkinabé','rmarks@example.com',NULL,'user.jpg',NULL,'2518 Sabryna Lock\nSophieville, UT 02901-7957','rey15','$2y$10$cK9cqTG1jr50WQ6PblZrmOykRV5l77S9y1u8/pOUHXIO/1nVOovym','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(20,NULL,NULL,6,NULL,'Spencer','Cathryn','1990-06-02 00:00:00','Burkina Faso','Burkinabé','kole88@example.org',NULL,'user.jpg',NULL,'8135 Lorine Harbors Apt. 025\nLake Morgan, MD 92904','mozelle77','$2y$10$PiE56n8HYTMfjvvT/YaJcuXZilR5P4drxQaTu41IRVHNWgUhhD3vS','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(21,NULL,NULL,4,NULL,'Langosh','Arch','1993-09-10 00:00:00','Burkina Faso','Burkinabé','itzel83@example.org',NULL,'user.jpg',NULL,'292 Heller Cliffs Suite 060\nEast Alexys, AK 17426-8390','bogan.madie','$2y$10$0DioxSYSsLH.VrHO6hwJBOz1UyVLHucp7jmH52EhDT7aS4m2ujVgi','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(22,NULL,NULL,9,NULL,'Hudson','Aric','2014-05-14 00:00:00','Burkina Faso','Burkinabé','merlin30@example.com',NULL,'user.jpg',NULL,'830 Lueilwitz Lake\nPort Aydenborough, OR 81071-0099','corkery.elyse','$2y$10$3UyAv0Tk7N/4saa56fDJdeviMCA2dSQa/D0tbUIuZY2BR9a1hVj3S','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(23,NULL,NULL,3,NULL,'Wisozk','Katelynn','1963-02-27 00:00:00','Burkina Faso','Burkinabé','charlie42@example.com',NULL,'user.jpg',NULL,'42179 Leann Pines Suite 468\nGaylordburgh, DC 35764','schuster.lacy','$2y$10$2wlzEyFxlfFKY3nvtozg6eLufK2VyOcgI8xQpXdbIydP24/hmaCsG','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(24,NULL,NULL,6,NULL,'Reilly','Natasha','1939-12-14 00:00:00','Burkina Faso','Burkinabé','nstehr@example.net',NULL,'user.jpg',NULL,'4375 Annabell Ville Suite 143\nPort Eve, VA 50065-8968','eabbott','$2y$10$aBFqvs6VYsLakgJojgVs3OeJ4Piy.qLeNQvOxIE3QIqFKn4F5KrZC','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(25,NULL,NULL,1,NULL,'Flatley','Kailee','1949-06-05 00:00:00','Burkina Faso','Burkinabé','schoen.zaria@example.com',NULL,'user.jpg',NULL,'841 Sherman Knolls\nCorkerytown, PA 19994','pwiegand','$2y$10$riyd2qHsm4elFChn9bQTH.PcOianhXNpbm52BxjvOz5nSc.3ZmiTu','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:34',1),(26,NULL,NULL,2,NULL,'Schumm','Mittie','1964-05-05 00:00:00','Burkina Faso','Burkinabé','lang.william@example.net',NULL,'user.jpg',NULL,'984 Otha Rest Apt. 197\nSavionside, CO 59917','samson45','$2y$10$xjUrdqeZ6EH0XECBvtL8n.WSGkkjdVtXaSBQfWH1mhbvhZ7R0yFsC','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(27,NULL,NULL,9,NULL,'Langworth','Kassandra','2012-12-16 00:00:00','Burkina Faso','Burkinabé','keshawn.jones@example.org',NULL,'user.jpg',NULL,'74836 Ernestina Pike Suite 461\nGislasonport, NH 10726','helene25','$2y$10$n2UnMcpPK./vLQADJtIebep4bo3PGp9MTY8yw8Ee2.uNPYTlpFpBu','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(28,NULL,NULL,7,NULL,'Durgan','Lonnie','1959-06-30 00:00:00','Burkina Faso','Burkinabé','jstark@example.net',NULL,'user.jpg',NULL,'552 Mohammad Union\nCeliaburgh, VA 55872-3268','sarah.ziemann','$2y$10$tiNPb2TDyrCqmRG7Aa47ne3dsyT0RhGBXVnN7eGCfIK7Pepl/Hbhi','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(29,NULL,NULL,4,NULL,'Lakin','Mitchell','1982-04-06 00:00:00','Burkina Faso','Burkinabé','lazaro49@example.net',NULL,'user.jpg',NULL,'5232 Thompson Union Suite 928\nAthenachester, CA 05327-8486','tierra46','$2y$10$U.vpXMC5jP/bpTIc7os.xOOmn4PhUB0ZKLgJaix55UQH6n/R26uFG','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(30,NULL,NULL,3,NULL,'Denesik','Winona','1965-10-27 00:00:00','Burkina Faso','Burkinabé','deshawn.crona@example.com',NULL,'user.jpg',NULL,'608 Wyatt Passage\nSouth Devante, ND 31681','qrunte','$2y$10$.Er7lA.RHTzuF1R2v1SqpOad7JLaY1vlVAnu7j7HW/AkBeXkZYxFe','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(31,NULL,NULL,4,NULL,'Rodriguez','Rachelle','1945-11-02 00:00:00','Burkina Faso','Burkinabé','ewill@example.com',NULL,'user.jpg',NULL,'5356 Guillermo Key\nLake Webster, VT 71547-1266','kihn.queenie','$2y$10$AHx7rTg45Sk/G/UrBxeOMeS2PXSnT192dxx2Cfj6rD0wdI37fpGNa','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(32,NULL,NULL,2,NULL,'Cruickshank','Jaron','1973-06-02 00:00:00','Burkina Faso','Burkinabé','ashields@example.net',NULL,'user.jpg',NULL,'45987 Schowalter Avenue\nLake Brigitte, UT 67272','americo21','$2y$10$Wp.alTyZ6ntl/AHLbmEaU.ZZ7QhfJK41ssmjGGVNCcJBDNgjZkDfi','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(33,NULL,NULL,6,NULL,'Leannon','Talia','1992-03-23 00:00:00','Burkina Faso','Burkinabé','miracle.lowe@example.net',NULL,'user.jpg',NULL,'7226 Brannon Terrace\nWinifredmouth, MA 78851','mallie.herzog','$2y$10$av.oYsJN5QlmlcTRBcQPa.L6zheemiJeZ5.0wUyGsrP.O3GZ7INfa','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(34,NULL,NULL,8,NULL,'Erdman','Helene','1984-10-12 00:00:00','Burkina Faso','Burkinabé','sydni94@example.org',NULL,'user.jpg',NULL,'8272 Shawn Walk Suite 602\nWebstershire, CO 33647-8411','tsimonis','$2y$10$DyzH42lo4Z5Tlj9Q8IxTOOOlYK5pyeu7UTFTbG/Rfj3HvyqiFmtC6','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:35',1),(35,NULL,NULL,7,NULL,'Bode','Garry','1994-12-26 00:00:00','Burkina Faso','Burkinabé','rafaela98@example.com',NULL,'user.jpg',NULL,'137 Cordelia Stravenue\nAudiechester, KY 10224-6693','oreinger','$2y$10$PZqHVm.KJe9axmg/lZiiUuc/ln5dzxUkcbPoNMNGRkC2QyNMRx5bq','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:36',1),(36,NULL,NULL,7,NULL,'Cruickshank','Shanie','2005-02-26 00:00:00','Burkina Faso','Burkinabé','qhaag@example.net',NULL,'user.jpg',NULL,'17615 Russel Junctions Suite 126\nWest Justyn, ND 28191','ckshlerin','$2y$10$wc0kkiT.9B/GSsR8lot.tOewMBEiLd3hB2mRuKs.9zY2FTiQW41MK','2019-01-24 13:22:56','2019-01-24 13:22:56','2019-01-24 13:22:36',1),(37,NULL,NULL,2,NULL,'Feest','Eldred','1971-01-27 00:00:00','Burkina Faso','Burkinabé','kshlerin.vita@example.org',NULL,'user.jpg',NULL,'79709 Lemke Views\nPort Oraton, MN 77359-4577','hglover','$2y$10$0vUngUhIzck4J6ltWsBTuezkB7ql0OhPVl3t4US64m6hAZlnsTEty','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(38,NULL,NULL,3,NULL,'Mitchell','Rhett','1993-05-24 00:00:00','Burkina Faso','Burkinabé','vgreenholt@example.org',NULL,'user.jpg',NULL,'30330 Casper Ranch\nFriesenside, OR 92443-2268','lester.labadie','$2y$10$qEx8kL1ZlbasqQgYo5Px.O/JlasrCw.J.OR4dXsmTlwBKO9edd.1e','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(39,NULL,NULL,1,NULL,'McLaughlin','Delaney','1945-02-28 00:00:00','Burkina Faso','Burkinabé','rohan.geovany@example.net',NULL,'user.jpg',NULL,'6871 Filiberto Court Apt. 690\nNorth Jaylenshire, LA 73487','vonrueden.lennie','$2y$10$j.1LQdD7tsv6qw5.3f3PWeC9r7THf0Rae376JHkviX9jELWchYCmC','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(40,NULL,NULL,2,NULL,'Weissnat','Justus','2009-01-08 00:00:00','Burkina Faso','Burkinabé','jaeden.kassulke@example.org',NULL,'user.jpg',NULL,'65400 Sarai Stream Apt. 237\nWest Camilaburgh, MA 16746-0137','lledner','$2y$10$h4A/vGLzABliBBEp1QSix.63aIgzaqIXcOdjmU9waMlyxZ3BrUQMm','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(41,NULL,NULL,9,NULL,'Steuber','Marlee','2000-09-18 00:00:00','Burkina Faso','Burkinabé','jrenner@example.net',NULL,'user.jpg',NULL,'29757 Kris Alley Apt. 065\nLehnerfurt, IN 66329-9573','fmetz','$2y$10$kLy7jaCEA.H64po83GQVHeFBhVc9lgF9G6r3aqZ/wyX9ZjSBuhZyq','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(42,NULL,NULL,8,NULL,'Daugherty','Cornelius','1934-06-23 00:00:00','Burkina Faso','Burkinabé','west.dave@example.org',NULL,'user.jpg',NULL,'6029 Stroman Cliffs\nLake Rosella, MO 95858','murphy.quitzon','$2y$10$eFWoBc4FUJodgScGKJsole.R0DyzR/M2/HED4MCWMWJipRbd1pqPO','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(43,NULL,NULL,7,NULL,'Friesen','Esteban','1967-05-14 00:00:00','Burkina Faso','Burkinabé','daugherty.nat@example.net',NULL,'user.jpg',NULL,'759 Harber Prairie\nEast Brannonville, HI 54276','mason.lubowitz','$2y$10$DdZTms3oHaL..qol29u5t.xBOgOOqu.HrHq0QmyTzPyMyEpR219YC','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:36',1),(44,NULL,NULL,1,NULL,'Rolfson','Kristopher','1996-07-31 00:00:00','Burkina Faso','Burkinabé','brekke.geovanny@example.com',NULL,'user.jpg',NULL,'72186 Torrance Inlet Suite 522\nNorth Brennon, AL 28013','goodwin.charity','$2y$10$mZ7WwQsHO/84TdQWZGbKPefDNuoaBmiKCMgLlN3c7kbUCzubp3Y9W','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(45,NULL,NULL,6,NULL,'Volkman','Vanessa','1945-11-03 00:00:00','Burkina Faso','Burkinabé','wrunolfsdottir@example.net',NULL,'user.jpg',NULL,'613 Ernest Coves Apt. 183\nNew Josianne, CA 28681-9223','fpredovic','$2y$10$H4N6igJ1GMDo5fyCdMbbZuasW566c1wkm/IVoiCu5WcZr/rwgC5Ky','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(46,NULL,NULL,5,NULL,'Kub','Roma','2011-04-12 00:00:00','Burkina Faso','Burkinabé','valentine46@example.org',NULL,'user.jpg',NULL,'89392 Kihn Vista\nEast Kadeport, PA 05900','bmraz','$2y$10$6yAZvtKPSjMguVBXFd515un/7TTnCLYvndCaQkh07P8KKIYvxDO6.','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(47,NULL,NULL,6,NULL,'Gislason','Nikko','1948-01-12 00:00:00','Burkina Faso','Burkinabé','alverta50@example.com',NULL,'user.jpg',NULL,'21720 Klein Harbor\nPort Chaim, CO 57349','michaela.mosciski','$2y$10$68X1zuUiPVjF6yQOZvq0V.GhOPpqTgs1K8ty7Bf61GihwcE.tfKhm','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(48,NULL,NULL,1,NULL,'Swaniawski','Joe','1969-04-22 00:00:00','Burkina Faso','Burkinabé','armando31@example.org',NULL,'user.jpg',NULL,'162 Bradtke Crest\nJohnsport, PA 99985','rolfson.willard','$2y$10$rUhpx7hEr.idTKmCfTkZaeQJ/CwyLY7qX2VRmCD8U8Tdoj97wTC9.','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(49,NULL,NULL,9,NULL,'Mohr','Leola','2015-01-14 00:00:00','Burkina Faso','Burkinabé','gibson.david@example.org',NULL,'user.jpg',NULL,'590 Frederique Mountain Suite 179\nOscarside, NJ 48066-9956','domenick.hammes','$2y$10$tqUNfDQjjPpbxqsHbox3AOLiFfdLvNXCD/05g2.oiJvzLLMEURdla','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(50,NULL,NULL,3,NULL,'Fadel','Freeman','2017-11-20 00:00:00','Burkina Faso','Burkinabé','vernice.buckridge@example.com',NULL,'user.jpg',NULL,'9639 Rempel Mountains\nNorth Timmothyburgh, DC 27726-7743','abernathy.nelle','$2y$10$DZhCmU66yrI0xHlB9urjwend6dczG2PP3iuX6Q08HelfvQPYD3yZq','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(51,NULL,NULL,6,NULL,'Ward','Cheyanne','1951-03-11 00:00:00','Burkina Faso','Burkinabé','dubuque.kaleigh@example.net',NULL,'user.jpg',NULL,'91790 Kris Parkway\nSouth Gillianborough, SC 23120','kuvalis.eldon','$2y$10$0Lki6sKesYniHXgyquQmfeUfhW50LFiVrfgxoV/fYnFarnlFmM4AO','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(52,NULL,NULL,5,NULL,'Cruickshank','Carmen','1923-02-01 00:00:00','Burkina Faso','Burkinabé','kihn.jennyfer@example.com',NULL,'user.jpg',NULL,'59954 Sherman Forge Suite 821\nNew Colleenport, WV 08253-4973','helga22','$2y$10$Nq4ODcHfEb.AtTS7MOcqie0QZ0IXA11Sh1CQKdO8cf5c0PepwHLH2','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:37',1),(53,NULL,NULL,1,NULL,'VonRueden','Maria','1933-05-19 00:00:00','Burkina Faso','Burkinabé','herzog.cloyd@example.com',NULL,'user.jpg',NULL,'7373 Gaetano Spurs Suite 235\nDarbyfurt, VA 42023-4226','njaskolski','$2y$10$zWiteJ4Yrxfo6yUUCVEA.uNC1R5eJFIbIxVrTUHQlQD3EdkM5cGKK','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(54,NULL,NULL,5,NULL,'Wilkinson','Milan','2013-10-17 00:00:00','Burkina Faso','Burkinabé','tiana96@example.com',NULL,'user.jpg',NULL,'9277 Dusty Spur Suite 767\nDemarcoshire, LA 24698-5454','kareem34','$2y$10$IUHVbwNpyV/0RKXBv1wzpeemrqxEW/6wWV12Dsitn7.K3mQdfjH/a','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(55,NULL,NULL,5,NULL,'Mraz','Verla','2003-01-27 00:00:00','Burkina Faso','Burkinabé','torp.eladio@example.net',NULL,'user.jpg',NULL,'53978 Wiegand Port\nEast Tylertown, NY 61351','freda.dooley','$2y$10$0ymoAIaTNhWNWrK7P9Dkquyh1A.NGyYD11I/rD0NKEBpIdUlwawyy','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(56,NULL,NULL,4,NULL,'Kautzer','Delphine','1964-12-29 00:00:00','Burkina Faso','Burkinabé','sipes.bertha@example.com',NULL,'user.jpg',NULL,'571 Rachel Brooks\nAbbottstad, WI 86191','abdiel.purdy','$2y$10$vAFQkhPBe1aL.Z3EP1V6me0M0wqq9wYAxWWm9531GoqUdxdoCC/sO','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(57,NULL,NULL,7,NULL,'Murphy','Sammy','2015-04-05 00:00:00','Burkina Faso','Burkinabé','haag.abel@example.com',NULL,'user.jpg',NULL,'58153 Rosie Unions Suite 434\nElveratown, MS 07532-2296','halie.dare','$2y$10$zBrVSw71FIsaDABnVYaJKO0puBmH7XjtKrTUoWxGR256.gesNO1H2','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(58,NULL,NULL,5,NULL,'Tillman','Pinkie','1956-03-01 00:00:00','Burkina Faso','Burkinabé','wyman.cassidy@example.org',NULL,'user.jpg',NULL,'550 Johnston Village\nEbertborough, KS 08626-2895','burnice.cassin','$2y$10$LPBrCjJtCpYRoMKxwrIrb.3BMV/SCkUBgubTp7yYxdloJMKH2Imuy','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(59,NULL,NULL,5,NULL,'West','Tania','2009-01-25 00:00:00','Burkina Faso','Burkinabé','odicki@example.net',NULL,'user.jpg',NULL,'5273 Stanton Via Apt. 998\nNew Jewel, OK 46821-1777','kris.metz','$2y$10$fV4jgsqOzYbeKKTDi8xCYO2WrPJiZ7IoAHTMg139dkAWl842siOPO','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(60,NULL,NULL,6,NULL,'Simonis','Estelle','1980-08-03 00:00:00','Burkina Faso','Burkinabé','beatty.willis@example.com',NULL,'user.jpg',NULL,'2921 Karelle Centers Apt. 165\nAntonettehaven, DE 65926','keebler.candace','$2y$10$49kQdCDi.A1J75UZUCFepOXuvy2fblSFU2XMrPLfkQp38aF/UnOyO','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:38',1),(61,NULL,NULL,8,NULL,'Pfannerstill','Ruben','2016-10-20 00:00:00','Burkina Faso','Burkinabé','uhowell@example.com',NULL,'user.jpg',NULL,'501 Swift Skyway Apt. 598\nLake Reinholdfort, UT 98626','dawn.nolan','$2y$10$8Z6d8RAhlSPQSPSp9x5OseBpyf2i5IR17lpIFNvZjpL3jOCzenD0O','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:39',1),(62,NULL,NULL,1,NULL,'Thiel','Brannon','1937-11-23 00:00:00','Burkina Faso','Burkinabé','vwilliamson@example.com',NULL,'user.jpg',NULL,'35923 Dejah Course\nLake Peggieside, MN 58121-9022','cara48','$2y$10$QJj/1RcgQrTFkju6cwWThu/NcmTeIx8mIC1uJg0FEWnRvn5DY2U3S','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:39',1),(63,NULL,NULL,6,NULL,'Romaguera','Antwan','1986-05-18 00:00:00','Burkina Faso','Burkinabé','kaycee.zemlak@example.net',NULL,'user.jpg',NULL,'96389 Ward Bridge\nRueckerbury, NH 61144','grayson29','$2y$10$8VyqttJPK1xHoqJUIkK7uOSaGktbaJb0818av639nlWPGqMEbhtG2','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:39',1),(64,NULL,NULL,5,NULL,'Bayer','April','1985-12-16 00:00:00','Burkina Faso','Burkinabé','leonor10@example.net',NULL,'user.jpg',NULL,'72173 Collier Mews Apt. 839\nWest Casey, MT 15998','fmayer','$2y$10$A9kO6NWAjTyOlAk5Md3jKeZWR5KdCltFnPes/91QkYAgtPEOtWbdK','2019-01-24 13:22:57','2019-01-24 13:22:57','2019-01-24 13:22:39',1),(65,NULL,NULL,7,NULL,'Bartell','Angus','1967-11-23 00:00:00','Burkina Faso','Burkinabé','reece.simonis@example.org',NULL,'user.jpg',NULL,'5166 Fadel Lake Apt. 285\nAdelemouth, MD 21866-2661','larry.lehner','$2y$10$wAUJ.JUxK5UBTjeR7IYCj.W.iQzr4bzb62X8m4aP.XD3j914QgO/.','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:39',1),(66,NULL,NULL,9,NULL,'Price','Hayden','1996-09-22 00:00:00','Burkina Faso','Burkinabé','rstroman@example.com',NULL,'user.jpg',NULL,'492 George Stravenue\nRicomouth, MN 12053-0455','abbie.thiel','$2y$10$2wLG3I45ey9HDYe2l3fuKOgsfp.g1Fg3mXzcL76dFQqQHZphYX0g2','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:39',1),(67,NULL,NULL,5,NULL,'Botsford','Valentine','1984-12-13 00:00:00','Burkina Faso','Burkinabé','morar.sandrine@example.net',NULL,'user.jpg',NULL,'2039 Shanny Square Suite 573\nFreddiehaven, KS 70090-7340','fae08','$2y$10$NcjUS5nlHDBbCeN8ftCKEOr0y1EsOtg8KtzE/TLJy.CZUJ4Lzy2V.','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:39',1),(68,NULL,NULL,5,NULL,'McClure','Matt','2012-05-12 00:00:00','Burkina Faso','Burkinabé','monique82@example.org',NULL,'user.jpg',NULL,'73790 Tromp Meadows\nNorth Tatyanafort, TN 82135','damon.turcotte','$2y$10$LmFEn9f2N6VRcmtJ.vIbj.za3tGv5uxXzXovwXqUuObpeEshp86oW','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:39',1),(69,NULL,NULL,5,NULL,'Emmerich','Hiram','2014-06-04 00:00:00','Burkina Faso','Burkinabé','jedidiah69@example.org',NULL,'user.jpg',NULL,'532 Kohler Turnpike\nNew Hellenborough, IA 58396','sheila71','$2y$10$3v0AC32CZeBn42WIh0ynS.FWO2iocViu2dqkrNZrygAnXk3QFMMEi','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:39',1),(70,NULL,NULL,7,NULL,'King','Hester','1961-02-02 00:00:00','Burkina Faso','Burkinabé','willa.spencer@example.org',NULL,'user.jpg',NULL,'55024 Abshire Branch\nKiehnfort, VT 38380-2866','ufarrell','$2y$10$ALzhRB0moBUdUuCelj/v3uPRwN525i.ZonAd27aeaxMaIP72hr6F6','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(71,NULL,NULL,5,NULL,'Ziemann','Cicero','1933-11-09 00:00:00','Burkina Faso','Burkinabé','maggie06@example.com',NULL,'user.jpg',NULL,'64725 Denesik Village Apt. 128\nEast Stonestad, RI 55859-3607','eleanore.gorczany','$2y$10$jPmpsDfYC4bkjMKvM5wg8edKBd/UTP26ufuiIw9bVeBLGchbYp0bS','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(72,NULL,NULL,1,NULL,'Powlowski','Garett','1940-11-20 00:00:00','Burkina Faso','Burkinabé','sofia.wiegand@example.net',NULL,'user.jpg',NULL,'285 Orpha Alley\nEast Nedberg, CO 29080-9534','mfay','$2y$10$YoMICXAlk//fsLeP6OUSkeDYS.oZmlvKMxpvtdZWVLAOAvZZiQyLi','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(73,NULL,NULL,3,NULL,'Greenholt','Ayla','1994-09-20 00:00:00','Burkina Faso','Burkinabé','bradley.morar@example.com',NULL,'user.jpg',NULL,'39011 Feeney Coves Suite 215\nWest Juniusberg, WI 18537-7407','nconnelly','$2y$10$bJL2xYJ0R8065sMMFpmP1.mplfq//vOQwOWSkuouXiYazRsrR7cRa','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(74,NULL,NULL,2,NULL,'Osinski','Krystina','1928-10-25 00:00:00','Burkina Faso','Burkinabé','ward.randy@example.net',NULL,'user.jpg',NULL,'30572 Deckow Haven\nEast Randal, PA 59998-6807','ernser.deion','$2y$10$bxl4EexqIPlbV13DL9DPQeCioDGSBP2dNhi8kF3zbRWWjzNBd8fkm','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(75,NULL,NULL,2,NULL,'Reichert','Ora','1956-12-30 00:00:00','Burkina Faso','Burkinabé','lucas85@example.com',NULL,'user.jpg',NULL,'9756 Beer Glen Suite 741\nLake Merle, VA 72486-4970','judge.fahey','$2y$10$L6GLG9uivQR4nZLJM6nIoO99QDRNpRGEfhOdrzUfIebV2SLalXpyK','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(76,NULL,NULL,9,NULL,'Monahan','Evan','1929-05-10 00:00:00','Burkina Faso','Burkinabé','bwhite@example.net',NULL,'user.jpg',NULL,'520 Ewald Knoll Suite 670\nSouth Holden, VT 32466','hartmann.clovis','$2y$10$9kWGyCC/L7h9KTa7WXKnee7FBW3fH.3l7PxQhNq76NxZ7Zmje7zCa','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(77,NULL,NULL,7,NULL,'Moore','Brook','1960-08-14 00:00:00','Burkina Faso','Burkinabé','carolyne66@example.net',NULL,'user.jpg',NULL,'22830 Muller Ford Suite 038\nPort Horacestad, MN 96209','uledner','$2y$10$pqVUyUX1hVhy8ii/Lr7xCu2EZM2o6f8/UlchdZQBugc0O70WQqIt6','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(78,NULL,NULL,7,NULL,'Lind','Marie','1932-12-17 00:00:00','Burkina Faso','Burkinabé','barrett.satterfield@example.org',NULL,'user.jpg',NULL,'7100 Cole Place\nPort Jasenfurt, WA 87972-2228','reese70','$2y$10$sOOWxJfmTw8s63kNHzUgk.Xsn3chgDmZv3HkwB17zb4ufhM3ZXKfC','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:40',1),(79,NULL,NULL,9,NULL,'Kuphal','Estevan','1998-08-01 00:00:00','Burkina Faso','Burkinabé','gutmann.winfield@example.org',NULL,'user.jpg',NULL,'2762 Janice Trail Suite 193\nMandymouth, SC 82845','edythe.casper','$2y$10$9SlN3TaiDndlz4e8lRlex.F.TixcaJ9g9y6FkGEWd43CWqWEnFse.','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(80,NULL,NULL,6,NULL,'Abshire','Mustafa','1952-10-21 00:00:00','Burkina Faso','Burkinabé','wconroy@example.org',NULL,'user.jpg',NULL,'90583 Johnpaul Point Suite 595\nNew Litzyton, WY 88473-1174','demetris.wiegand','$2y$10$j0XOy7eBTxBil8RS3dCV9el2Pr/r08SmDavOOo54Iu2nI3klrCziW','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(81,NULL,NULL,9,NULL,'Johnson','Leann','1976-01-30 00:00:00','Burkina Faso','Burkinabé','jacobson.karen@example.org',NULL,'user.jpg',NULL,'51197 Elinor Union Suite 307\nOdellshire, UT 87309-0202','andreanne75','$2y$10$N2cbjDjLegK27LsirC9FYes//q1xQD9Apb02yEqUlTngp5kyESJY.','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(82,NULL,NULL,5,NULL,'Dicki','Lacy','1936-09-04 00:00:00','Burkina Faso','Burkinabé','hartmann.teagan@example.net',NULL,'user.jpg',NULL,'73435 O\'Connell Land\nGrahamstad, RI 08035-5213','amani04','$2y$10$2ajCQ7YF2yVgggOZ0JjuWu8uFJR8aD/xNTU.oAsyq3bMgOwqCjmMa','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(83,NULL,NULL,1,NULL,'Doyle','Mervin','2015-08-03 00:00:00','Burkina Faso','Burkinabé','spencer.daugherty@example.com',NULL,'user.jpg',NULL,'311 Randi Drive\nMckenziefurt, OK 28436-2645','zhagenes','$2y$10$P4CkmNzmx3JKWoh0kjv8ae3YfLLSSnv7QRnzTgZjHk1gsx6AQqBHi','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(84,NULL,NULL,8,NULL,'Quigley','Santa','1957-09-28 00:00:00','Burkina Faso','Burkinabé','howe.vinnie@example.net',NULL,'user.jpg',NULL,'178 Juvenal Terrace Apt. 093\nKeelingstad, LA 78040-5486','corkery.wanda','$2y$10$scjFeMXpgZCtw9WJ0Gn85OHn9xxdUNC3Vhbv9QOURwl6cpfBtiYIK','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(85,NULL,NULL,4,NULL,'Lowe','Bernadine','1978-09-06 00:00:00','Burkina Faso','Burkinabé','mmorissette@example.net',NULL,'user.jpg',NULL,'33616 Adalberto Cove Suite 471\nEast Margarettmouth, PA 02813-6653','kelsie01','$2y$10$Kb5awhrkScimC8e0oeaCOuvST4qC78idF6Pq6hF2kl4GFqigUY0jC','2019-01-24 13:22:58','2019-01-24 13:22:58','2019-01-24 13:22:41',1),(86,NULL,NULL,6,NULL,'Hill','Gisselle','1967-05-27 00:00:00','Burkina Faso','Burkinabé','hagenes.bella@example.net',NULL,'user.jpg',NULL,'782 Schmitt Mall Apt. 240\nSouth Randallmouth, KS 64794-0082','swehner','$2y$10$YuFiYQdfJDzQpVRX30zA8.IyhrxRqUEMgZuRDEodBEyM/F.s7ify6','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:41',1),(87,NULL,NULL,6,NULL,'Glover','Jaylan','1929-06-05 00:00:00','Burkina Faso','Burkinabé','goodwin.erling@example.org',NULL,'user.jpg',NULL,'252 Conrad Squares\nDanielaburgh, PA 32118','maxie.ratke','$2y$10$tLk.1k0rK1t29eNlSdySLeYbUBd1G.49w.F5StQG7Q2Tec2uJzdAO','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:41',1),(88,NULL,NULL,4,NULL,'Kerluke','Price','2009-02-25 00:00:00','Burkina Faso','Burkinabé','cristopher.lakin@example.com',NULL,'user.jpg',NULL,'3675 Carlos Causeway\nNorth Kathleenland, IA 03116','martine91','$2y$10$Tih8Miy07P39TWhPKuuN5OIVr3h93CfVDz8bnJKb1WxlDtznZp8rq','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(89,NULL,NULL,5,NULL,'Yost','Cyril','1996-04-08 00:00:00','Burkina Faso','Burkinabé','umorissette@example.net',NULL,'user.jpg',NULL,'118 Prosacco Plaza\nLake Lulubury, MI 80182-5454','graham.ressie','$2y$10$kbgNaQpIrA8vc91TAol4ae/k8goaUwWIdze22hWTaQ9oco1l1/2kW','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(90,NULL,NULL,7,NULL,'Terry','Fidel','1987-11-17 00:00:00','Burkina Faso','Burkinabé','arath@example.com',NULL,'user.jpg',NULL,'93690 Julie Square Suite 235\nDenesikmouth, MS 91773-7133','burdette.towne','$2y$10$qPq5SxcIYNPqK4C49rtYb.yzlINDsMlUza6QpKd3Hm2eb0KKe0ssC','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(91,NULL,NULL,9,NULL,'Stroman','Janelle','1926-12-05 00:00:00','Burkina Faso','Burkinabé','hintz.adrien@example.org',NULL,'user.jpg',NULL,'26498 Alessandro Well Suite 499\nNorth Cale, NJ 79276','choppe','$2y$10$1xvV5LONCmXjP.UUGpBomuH.zTnSF9vFk5SwrqZX9h76Xt9VVgkku','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(92,NULL,NULL,5,NULL,'Romaguera','Orpha','1992-03-27 00:00:00','Burkina Faso','Burkinabé','ghammes@example.com',NULL,'user.jpg',NULL,'93269 Keagan Street\nNorth Nedra, OK 98803','shaina48','$2y$10$ZnrKlbgFMW7tqh2uBE0rruRa/XPqx33jdPKc3YkILqCanwG/EEpwu','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(93,NULL,NULL,3,NULL,'Marquardt','Evalyn','1941-12-30 00:00:00','Burkina Faso','Burkinabé','wmedhurst@example.com',NULL,'user.jpg',NULL,'6219 Kayla Manors Apt. 151\nJaedenstad, NC 70378','sprosacco','$2y$10$WuRCa4gvYIHp/pfuUuY2BO1Q9kfOc5gUkgKNkLaRPaAxsI4SyDYDy','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(94,NULL,NULL,8,NULL,'Pfeffer','Harvey','1976-06-21 00:00:00','Burkina Faso','Burkinabé','cole.kody@example.net',NULL,'user.jpg',NULL,'69545 Barney Fall\nTurcottemouth, MI 14883-5227','mireya29','$2y$10$/UWP21glywQc1r2hi2jMcOboQmFytAbagnV/JJshQeZ0XB6HayZ/G','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(95,NULL,NULL,3,NULL,'White','Milan','1926-03-29 00:00:00','Burkina Faso','Burkinabé','myrtle09@example.com',NULL,'user.jpg',NULL,'8362 Lauryn Expressway\nCotymouth, CT 06715','lcummerata','$2y$10$OvXSVPIo/auySubzmzVkT.z5d4RLyRa1lcQYQNwEpQbjRitBKw1oG','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(96,NULL,NULL,8,NULL,'Davis','Alisa','1975-01-20 00:00:00','Burkina Faso','Burkinabé','doyle64@example.net',NULL,'user.jpg',NULL,'9711 Prosacco Camp Apt. 403\nWest Gusport, AZ 57410','max.weimann','$2y$10$tdvZ5BwE1sGdGD0z0EsDb.O9JO1XDSpoYmK3UbdSaXkBdI0M2lrQ2','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:42',1),(97,NULL,NULL,9,NULL,'Rutherford','Maurice','1979-11-21 00:00:00','Burkina Faso','Burkinabé','ila.ratke@example.org',NULL,'user.jpg',NULL,'997 Pat Mission\nMaceymouth, LA 09099','qthiel','$2y$10$q8JzIgSH0m6THNeGSeufY.fJjT2T3rVSSLvHmf/Ub57h1ugLMekQu','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(98,NULL,NULL,4,NULL,'Rice','Kaylee','1949-02-03 00:00:00','Burkina Faso','Burkinabé','tess.pouros@example.org',NULL,'user.jpg',NULL,'4797 Wuckert Village Suite 646\nBentontown, AL 79767','amaggio','$2y$10$8D4ANzzFnWY7uHZ.y13d8Ompw4PH084DkYNvAwA1BMnuKDUMxjCv.','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(99,NULL,NULL,9,NULL,'Bahringer','Bridie','1927-04-09 00:00:00','Burkina Faso','Burkinabé','eschiller@example.org',NULL,'user.jpg',NULL,'246 O\'Keefe Walks Apt. 983\nNorth Johanmouth, GA 61218-0970','morissette.aylin','$2y$10$3lDPdRDNF/GI/ZF4sz/j2eCniezauWC6/UhW1XRxEONG.EOkES4La','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(100,NULL,NULL,7,NULL,'Wiegand','Shannon','1937-03-08 00:00:00','Burkina Faso','Burkinabé','jessie.steuber@example.org',NULL,'user.jpg',NULL,'4113 Cleta Keys Suite 784\nVerdamouth, OR 47308','alexander.larkin','$2y$10$JtvAyhC7fcvjygz7jpHS6OC6fENS6QnMAVOmTPgEANz8G6xO9kayO','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(101,NULL,NULL,1,NULL,'Koelpin','Freida','1965-06-25 00:00:00','Burkina Faso','Burkinabé','olarkin@example.net',NULL,'user.jpg',NULL,'79977 Turcotte Overpass\nPort Orlandoland, OK 73552-0824','gorczany.guido','$2y$10$CTm464dH7I8qZDQYu0/aGOaXNCpO51VmFQEy5HP8FVRkk1vHQ5amS','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(102,NULL,NULL,7,NULL,'Runte','Theodora','1928-01-21 00:00:00','Burkina Faso','Burkinabé','penelope.reinger@example.org',NULL,'user.jpg',NULL,'899 Doug View\nKaseyfurt, MD 60203','harber.aubree','$2y$10$qjhhkn7VE376t15vj37Csuqpj2Pc9eVTb.322HS7rzcYK/YWT/OZu','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(103,NULL,NULL,5,NULL,'King','Sandrine','1947-05-09 00:00:00','Burkina Faso','Burkinabé','krowe@example.org',NULL,'user.jpg',NULL,'5950 Alyce Streets Apt. 188\nNorth Marilou, UT 96398','macy86','$2y$10$mLQFFJ635SEjU3N7WFZwQuZ/45rMHjKzb/fyj7KVMM/ePlNGjSaRS','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(104,NULL,NULL,1,NULL,'Rippin','Hollie','2011-01-17 00:00:00','Burkina Faso','Burkinabé','macie.lindgren@example.org',NULL,'user.jpg',NULL,'30249 Konopelski Pine Apt. 919\nNew Edward, HI 76364-4013','zbatz','$2y$10$9B/kDVieh.1AaXs5KERHB.VKAXxRNe/UvdkvsQxnLTYTSYEd97PYG','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:43',1),(105,NULL,NULL,7,NULL,'Bernier','Aryanna','1971-03-10 00:00:00','Burkina Faso','Burkinabé','sally.dare@example.net',NULL,'user.jpg',NULL,'888 Iliana Ridge\nEast Mozelle, ND 85131','kunde.jonatan','$2y$10$9aU3KwBsYgqitI9XNgYou.UguEMEhFs/aJBXs3TJS7u2w4UA1IqVy','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:44',1),(106,NULL,NULL,8,NULL,'Bode','Xzavier','2012-10-15 00:00:00','Burkina Faso','Burkinabé','mckenna45@example.net',NULL,'user.jpg',NULL,'226 Rosenbaum Fords\nLake Ezra, PA 16504','priscilla63','$2y$10$cE1MDVm6vl1ipHr5fK8GrO9KUD.hhsX5KGVTLBRcpBqPqBXLu1Rw6','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:44',1),(107,NULL,NULL,2,NULL,'Frami','Lauretta','1945-07-02 00:00:00','Burkina Faso','Burkinabé','grunolfsson@example.com',NULL,'user.jpg',NULL,'92968 Hills Club\nJeffberg, WV 11486','addison33','$2y$10$BNVDpy6W06icdj8CXbFbhesjeM3KooE25UqNbRB5AAhJd9/VDZXeK','2019-01-24 13:22:59','2019-01-24 13:22:59','2019-01-24 13:22:44',1),(108,NULL,NULL,5,NULL,'Zulauf','Kristopher','2005-06-10 00:00:00','Burkina Faso','Burkinabé','alden75@example.org',NULL,'user.jpg',NULL,'183 Vito Fall Suite 395\nNew Luther, VT 15738','oconner.kali','$2y$10$C/sw3ZErHvLV3sG/QPDtI.ezhSNGqzhYv95OsEQiYJyR5Jybxi14e','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(109,NULL,NULL,2,NULL,'Runte','Magdalen','1958-03-30 00:00:00','Burkina Faso','Burkinabé','conn.darrel@example.org',NULL,'user.jpg',NULL,'975 Jovani Loaf Apt. 374\nMariashire, UT 37665-0725','xdurgan','$2y$10$B7malXmmSf0Jj1DE75aGU.RQZwyicu2ZxcxaBOn/9IsNenu9UOJl2','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(110,NULL,NULL,4,NULL,'Wisoky','Jackeline','1954-01-29 00:00:00','Burkina Faso','Burkinabé','retha37@example.com',NULL,'user.jpg',NULL,'559 Buckridge Mall Suite 004\nDoramouth, NY 41735-0830','zackery29','$2y$10$h6800.39x9W/jyz7n5kdyejGDb138XPxMhfITNjUaiU4CKGxewsoa','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(111,NULL,NULL,1,NULL,'Weber','Reinhold','1964-09-13 00:00:00','Burkina Faso','Burkinabé','wkerluke@example.org',NULL,'user.jpg',NULL,'3188 Nikolaus Cove Suite 036\nMrazshire, UT 91740-1068','destin.legros','$2y$10$Qb9jshm8YFBJ2.ttBEkFs.LAqNNS2Kx8sd/LQgAgjAwCgo0MyTZbe','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(112,NULL,NULL,7,NULL,'Marks','Marcus','2007-02-27 00:00:00','Burkina Faso','Burkinabé','noe89@example.com',NULL,'user.jpg',NULL,'2361 Von Court\nEffertzport, ID 50862','jgutmann','$2y$10$xRlfJoOqqtmHD4fM8q1NUuE92Et.jEf.ZqRnp978/pf27NKTGekxK','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(113,NULL,NULL,5,NULL,'Harber','Santos','1982-10-14 00:00:00','Burkina Faso','Burkinabé','qmetz@example.net',NULL,'user.jpg',NULL,'66816 Bogisich Ridge\nWest Susana, WY 01177-8920','asha09','$2y$10$oyWeFevY94tVXJtVhyvPNe5tvzB2pXao7aAhI/yZhUOZl.iJuxcdO','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:44',1),(114,NULL,NULL,9,NULL,'Cormier','Nina','1997-12-25 00:00:00','Burkina Faso','Burkinabé','tara.bergnaum@example.org',NULL,'user.jpg',NULL,'654 Hailey Locks\nPort Kileyshire, VT 82466','greg95','$2y$10$/D0ir.8yvkSxoaUzn1saeOO2BbinfHxf39ts.oIBa8M8vjevdpk6W','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(115,NULL,NULL,7,NULL,'Willms','Orlo','1979-08-18 00:00:00','Burkina Faso','Burkinabé','joy41@example.org',NULL,'user.jpg',NULL,'1962 Laurel Island\nPrudencehaven, TN 07703','corrine.sanford','$2y$10$8oRELGlM.C6gxlFLsXLlue0h9676KZH.kMsTo4rT1Vxn9c/okiIv.','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(116,NULL,NULL,1,NULL,'Hoeger','Alexys','1952-12-17 00:00:00','Burkina Faso','Burkinabé','rebeca.west@example.org',NULL,'user.jpg',NULL,'21049 Predovic Lock\nMoenport, NH 13828-1916','dianna.fahey','$2y$10$lU7ZGDm6.P51BWuloxICTu8uiVz1tOIiYqaspDdemmIrM8jNL6GfS','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(117,NULL,NULL,1,NULL,'Feeney','Margret','1996-01-25 00:00:00','Burkina Faso','Burkinabé','ljenkins@example.com',NULL,'user.jpg',NULL,'22281 O\'Keefe Common\nReillyland, MO 13116-2901','brakus.bill','$2y$10$TbJX1tK3akf7OLvjK6wOXuXIR1MGhL1JnZDgfjBpisZ9s3rpsZT3W','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(118,NULL,NULL,8,NULL,'Quigley','Josh','1923-12-06 00:00:00','Burkina Faso','Burkinabé','tlarkin@example.net',NULL,'user.jpg',NULL,'369 Schimmel Springs\nKarsonfort, NJ 89495','qkautzer','$2y$10$ZUJsU7Qf4s3Qa6HL2g2cGOUI0dooVlYDqm33lwaF0qPoJOBAdOIP6','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(119,NULL,NULL,1,NULL,'Tromp','Jevon','1971-03-09 00:00:00','Burkina Faso','Burkinabé','mireya94@example.org',NULL,'user.jpg',NULL,'1880 Bechtelar Ridges\nIgnacioburgh, MN 25325-0555','dejon21','$2y$10$lQqLRhkmsGw6iIkGiPIsz.X0sI7kbYslGyAS4Ru1jxrsN5FBS.Q7y','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(120,NULL,NULL,7,NULL,'Murazik','Donny','1934-01-20 00:00:00','Burkina Faso','Burkinabé','xlangosh@example.com',NULL,'user.jpg',NULL,'9323 Wintheiser Island Suite 659\nPfefferview, ID 24500','jean.waelchi','$2y$10$GZJeP009jJbSqXELcG.znuBXGAAlJZW1I4urLLxU.9GgWQzX8/a62','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(121,NULL,NULL,9,NULL,'Reichert','Alysson','1969-04-11 00:00:00','Burkina Faso','Burkinabé','ella.wiegand@example.com',NULL,'user.jpg',NULL,'1235 Marcelina Place Apt. 018\nAbigaleview, AL 69397','lreinger','$2y$10$Lrl7tujeVUJgBNbyNwtZz.fr/D3hI/kYoTVBib3or7/doFAzeO/TK','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(122,NULL,NULL,5,NULL,'West','Santiago','1973-06-10 00:00:00','Burkina Faso','Burkinabé','kbrakus@example.org',NULL,'user.jpg',NULL,'55260 Mraz Station Suite 757\nPort Rachaelhaven, NM 50834','king.abel','$2y$10$L.apFVjlYOIH4zv1i7KI0OUCS0TyDH3SE2ZMMGfQVrydUL8QX6iAu','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:45',1),(123,NULL,NULL,9,NULL,'Tremblay','Bonnie','2018-05-19 00:00:00','Burkina Faso','Burkinabé','emory.russel@example.com',NULL,'user.jpg',NULL,'8174 Batz Ford\nWest Chetview, OR 37190-4421','hoeger.jovani','$2y$10$w7FQo..cXHAL5n3.ksUkle4Ym8tnpEM5YSDG76qpHodOf4anyEypK','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(124,NULL,NULL,5,NULL,'Braun','William','2004-05-21 00:00:00','Burkina Faso','Burkinabé','skutch@example.net',NULL,'user.jpg',NULL,'538 Goodwin Locks Suite 125\nAdeliabury, WY 35796-7553','linnie47','$2y$10$ggUnn7cuqKmHR92.MCUUfOWNtSqyRjHfXDd8COisMNcteeD7uf6au','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(125,NULL,NULL,6,NULL,'Schiller','Charles','2010-01-08 00:00:00','Burkina Faso','Burkinabé','devante.kutch@example.com',NULL,'user.jpg',NULL,'6310 Alessia Knolls Suite 118\nWest Lula, SC 00220-4471','hans.bernier','$2y$10$m7gaNp3v/u.YDCXwR4i7TufgM/zI8o6qw9ioyjzIRHTF8y3qI5eRy','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(126,NULL,NULL,5,NULL,'Jones','Zola','2018-12-27 00:00:00','Burkina Faso','Burkinabé','kfritsch@example.net',NULL,'user.jpg',NULL,'599 Kailyn Causeway\nJacobsonton, WI 81138','ottis.langworth','$2y$10$fOPMBgJzSwCttPDOqbxoDuHrF7vQv06wSl6R9yvUR/hiDC.HkZZvS','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(127,NULL,NULL,1,NULL,'Kreiger','Mikayla','1968-01-14 00:00:00','Burkina Faso','Burkinabé','lonzo69@example.org',NULL,'user.jpg',NULL,'37762 Jarred Tunnel\nSouth Grovershire, WI 56466-7346','kenyon56','$2y$10$exnDXwxvgVhiXUDbCfV18Opw4XCURW5dI//KSag2Jss4CX1x9cNqy','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(128,NULL,NULL,7,NULL,'Kuhlman','Jerod','1989-12-06 00:00:00','Burkina Faso','Burkinabé','jamison.vonrueden@example.com',NULL,'user.jpg',NULL,'214 Zemlak Common Apt. 122\nLake Loganmouth, MS 20495-6903','ava.weimann','$2y$10$ZX9mLa5VL3/mah87OdBfTu8qojdZ1wwfgXkUro72HPsTvetuuSGmG','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(129,NULL,NULL,2,NULL,'Zboncak','Kristin','1974-01-09 00:00:00','Burkina Faso','Burkinabé','darlene56@example.net',NULL,'user.jpg',NULL,'5586 Nader Rest\nStrosinville, GA 23987','hane.cleora','$2y$10$WnOOfBS86wql2iHI3WmDHeWa439gUgYK/0VD0kR9GqakW961QpdlC','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(130,NULL,NULL,5,NULL,'Pfeffer','Keyshawn','1949-05-17 00:00:00','Burkina Faso','Burkinabé','price.halie@example.org',NULL,'user.jpg',NULL,'859 Spencer Crossroad\nColemouth, LA 34318','amy.hudson','$2y$10$nlvrotBFor5CuFY473pgbu5iHhbPLMbhTHXvB5ngqzEiibtmjyDYq','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:46',1),(131,NULL,NULL,5,NULL,'Schmidt','Tanya','2018-07-07 00:00:00','Burkina Faso','Burkinabé','aida.kshlerin@example.org',NULL,'user.jpg',NULL,'66999 Kreiger Route Suite 031\nAlizastad, MO 03472','nickolas.herzog','$2y$10$tYHrzdVINY6vVS8wdBf4n.yzn/6F16HhR49lm.1wqhWiLamxunPMi','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:47',1),(132,NULL,NULL,5,NULL,'Gaylord','Samanta','1922-03-03 00:00:00','Burkina Faso','Burkinabé','hkutch@example.com',NULL,'user.jpg',NULL,'2794 Prohaska Corners Apt. 525\nNew Guidoside, PA 33670','fdeckow','$2y$10$oI95yvTzNwkh2oqO3AEpKe7vrm.8aXo1HPq2WqfdeOsOamUxcvOYO','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:47',1),(133,NULL,NULL,9,NULL,'Windler','Ottilie','1926-04-26 00:00:00','Burkina Faso','Burkinabé','kunze.patricia@example.org',NULL,'user.jpg',NULL,'2881 Damian Heights\nSouth Nathanchester, NC 63871-5709','skihn','$2y$10$TzWAOQYtYA2MW915BIZlbux.UfkQPOYKqBWkd/FwMVzS0jUZ5oY6i','2019-01-24 13:23:00','2019-01-24 13:23:00','2019-01-24 13:22:47',1),(134,NULL,NULL,6,NULL,'Kunde','Lillie','1988-07-05 00:00:00','Burkina Faso','Burkinabé','myrtie.quitzon@example.org',NULL,'user.jpg',NULL,'78203 Ondricka Court\nEast Shirleyberg, CT 75303-0255','glover.jermaine','$2y$10$Esz5irW1cfvdBBoUddcBnO7vicsCDCVB2gXE6FRs6LRHzlEwMPg56','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(135,NULL,NULL,2,NULL,'Schumm','Monserrat','1970-03-21 00:00:00','Burkina Faso','Burkinabé','bledner@example.com',NULL,'user.jpg',NULL,'714 Cicero Wells\nEast Delilahton, OR 11348-4637','romaguera.jessika','$2y$10$NV1yhgylBakujvLm6wtS/eG2Xld0jb.fKf3MbIF3nxpgNkYD6IiHC','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(136,NULL,NULL,3,NULL,'Goodwin','Lea','2006-07-30 00:00:00','Burkina Faso','Burkinabé','kbergstrom@example.com',NULL,'user.jpg',NULL,'4569 Amy Point\nShanahanburgh, MD 01582','stanton.jovan','$2y$10$UT0igwrkPOVk6aKzUY.c5eoFs8hYptkY7FSRK6qjA1IOY63RY/r72','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(137,NULL,NULL,3,NULL,'Bahringer','Valentine','1960-02-26 00:00:00','Burkina Faso','Burkinabé','sauer@example.com',NULL,'user.jpg',NULL,'8507 O\'Keefe Extension\nKirlinville, MT 78356','rowan.greenholt','$2y$10$elLnXkQLKqFgrzGkfjrwhuBhezDPAQzRThhfHS7Vk32F6pboPwqz6','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(138,NULL,NULL,4,NULL,'Greenholt','Leila','2001-09-28 00:00:00','Burkina Faso','Burkinabé','ara.okon@example.net',NULL,'user.jpg',NULL,'67322 Sipes Mission Apt. 654\nWest Dustinburgh, DE 43067','dgutkowski','$2y$10$o3UvxX4bnRUbLNxNI6k59uo7Jo4gPZuaPtrJ4is.vZcXDZUQ5YKrq','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(139,NULL,NULL,6,NULL,'Hills','Shanny','1996-11-06 00:00:00','Burkina Faso','Burkinabé','kraig.boyer@example.org',NULL,'user.jpg',NULL,'608 Luettgen Isle Apt. 542\nSouth Ledastad, OH 62560','ruecker.diana','$2y$10$cRMFkkKUrRXZ5OiWEGv6we3rXRZK03wdRaYimaO1TeqeAFgbq6n9i','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:47',1),(140,NULL,NULL,6,NULL,'Brown','Dorris','1927-07-27 00:00:00','Burkina Faso','Burkinabé','adams.zakary@example.org',NULL,'user.jpg',NULL,'50374 Sipes Way Apt. 865\nSwiftfort, IA 17390-1116','ocartwright','$2y$10$R5C70CGSpccABjIJOxxy5OYjUSZN4Y060LAXN184xvbila/wvD6wi','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(141,NULL,NULL,5,NULL,'Roberts','Kelli','1934-06-24 00:00:00','Burkina Faso','Burkinabé','spencer.kailey@example.com',NULL,'user.jpg',NULL,'408 Johanna Bypass Apt. 813\nAdamsview, MI 86618-3578','wlabadie','$2y$10$rdS4h1yCfeCMsnZRUWK05ORJ/QPeOdM4mB7Zw8r6u7mVn93Fw/4x2','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(142,NULL,NULL,1,NULL,'Russel','Reinhold','1989-09-27 00:00:00','Burkina Faso','Burkinabé','nhowe@example.net',NULL,'user.jpg',NULL,'766 Fritsch Walk\nNew Reginald, GA 31136','joel.senger','$2y$10$xLHHSsOWgYfdN2.UqQbyU.byRTIlvdNh9effkpwdK23TeTyfi8JlW','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(143,NULL,NULL,7,NULL,'Kautzer','Dayana','2018-09-24 00:00:00','Burkina Faso','Burkinabé','benjamin91@example.com',NULL,'user.jpg',NULL,'1171 Orin Light Suite 947\nNorth Valentinberg, NV 38689','mia44','$2y$10$f1ti5I7G86FxCpPBEHqGJOg/lyqSIfRG12o/OymQP9XPaear2dDw6','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(144,NULL,NULL,7,NULL,'Legros','Clyde','1980-11-26 00:00:00','Burkina Faso','Burkinabé','stewart13@example.com',NULL,'user.jpg',NULL,'675 Rowe Highway\nWest Raegan, MA 28228','kelsi.kulas','$2y$10$a/UW44mJU8c0bTXnbkGS2eRyoKS8mcm7w3EXnDtRClFzL5XLfcKOy','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(145,NULL,NULL,7,NULL,'Pouros','Abraham','1999-01-17 00:00:00','Burkina Faso','Burkinabé','homenick.edwin@example.com',NULL,'user.jpg',NULL,'1009 Swaniawski Meadows Suite 713\nEast Brandi, MD 89224-7837','oberbrunner.arlo','$2y$10$C5y3u7FbqJIhD0h9kIHAXOYzFbw22bASdW.06/IdtpiOR2jHrnTgS','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(146,NULL,NULL,8,NULL,'Gutkowski','Lillie','1966-11-08 00:00:00','Burkina Faso','Burkinabé','heathcote.gilda@example.net',NULL,'user.jpg',NULL,'675 Tre Coves\nStephanychester, MI 15720','curt.murray','$2y$10$7IM1oWZK2mc/qlQzibsv0ek9UqvkZuFS69tS8nQOxWLKts5lBbhVC','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(147,NULL,NULL,4,NULL,'Treutel','Will','1979-07-13 00:00:00','Burkina Faso','Burkinabé','orval.blick@example.com',NULL,'user.jpg',NULL,'880 Jerde Green Apt. 627\nAleneshire, NC 37257','dulce20','$2y$10$zONoGIG2YpJGlRp.3glhdOwxVvsy7IYX2KEi4ij/3K.oH18RmX346','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(148,NULL,NULL,4,NULL,'Schultz','Ramiro','1988-06-10 00:00:00','Burkina Faso','Burkinabé','genesis55@example.org',NULL,'user.jpg',NULL,'98630 Schamberger Point Apt. 443\nLake Dahlia, KY 27192','gutkowski.viviane','$2y$10$qSvWDvjxvpg93Jn5Ub8JIuQP8g5Q1fFw576e1HSqKa/lci.2TVBZK','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:48',1),(149,NULL,NULL,5,NULL,'Daugherty','Muriel','2012-08-22 00:00:00','Burkina Faso','Burkinabé','hallie41@example.net',NULL,'user.jpg',NULL,'9490 General Field Apt. 342\nMaxietown, ME 69729','stiedemann.morgan','$2y$10$azbg0os9IdI5ks.lFhvYz.CRmoVYuSvfGk2MpSTDq5Fw1NT/0nu8q','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(150,NULL,NULL,2,NULL,'Kessler','Celestine','1919-06-28 00:00:00','Burkina Faso','Burkinabé','kitty36@example.org',NULL,'user.jpg',NULL,'4874 Johnathan Junctions\nStrackeville, AK 17047-1444','xwitting','$2y$10$GbSScVQTR1E8B3Cd9amQn.jwl5jxW5ifxSRaRw5xJRFsuRZiakE.y','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(151,NULL,NULL,3,NULL,'Mertz','Zakary','1960-12-01 00:00:00','Burkina Faso','Burkinabé','wunsch.kyle@example.net',NULL,'user.jpg',NULL,'4629 Langworth Inlet Suite 611\nEnosfurt, MD 65663','brielle.glover','$2y$10$jaXxBYZvLvqbgfamSOQn8ufLsvcoKX2SoqiBWPl.8224/CSV4OReC','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(152,NULL,NULL,4,NULL,'Gorczany','Dave','2002-03-17 00:00:00','Burkina Faso','Burkinabé','baby34@example.net',NULL,'user.jpg',NULL,'91324 Coy Street Suite 626\nWest Kirsten, WY 99549','bkoelpin','$2y$10$rECVs6XjmzPcXZR70xTwaOeBxdQAX83x6Nlql2N2Lq6IJ8AiAs9lq','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(153,NULL,NULL,6,NULL,'Runte','Edwina','1952-02-26 00:00:00','Burkina Faso','Burkinabé','sprosacco@example.net',NULL,'user.jpg',NULL,'531 Von Passage Apt. 002\nNew Heidi, AZ 43255-0776','wava.murray','$2y$10$pVLZR23i5Ze2DYgsLi0.1eMYQRZALgxGtaFR5wufdyJIb/Fq7VsOi','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(154,NULL,NULL,7,NULL,'Stracke','Nels','1940-07-04 00:00:00','Burkina Faso','Burkinabé','jon.rogahn@example.net',NULL,'user.jpg',NULL,'49912 McKenzie Square\nLake Dillon, HI 92097-9498','reed.hauck','$2y$10$coC16D5UAd2JSH56snmRW.kXxqoPfOMa65fOg6o/1N/8WEa7Pxtte','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(155,NULL,NULL,5,NULL,'Strosin','Onie','1932-08-02 00:00:00','Burkina Faso','Burkinabé','waelchi.leonie@example.com',NULL,'user.jpg',NULL,'57301 Strosin Crescent\nLake Eliezer, NY 62502','shea82','$2y$10$sSoWxuMZ4zb1ZVldFwQiHOUVVyURtn4Z7eLhuiDt2zgftL8mtnLcO','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(156,NULL,NULL,9,NULL,'Conn','April','1921-07-13 00:00:00','Burkina Faso','Burkinabé','cfisher@example.net',NULL,'user.jpg',NULL,'12282 Pouros Burg Suite 567\nKleinshire, MT 01139-8309','robel.jazmyne','$2y$10$UqxDUvqEF0COxvk3yrrx8uH1v4sDH87gLt5mq/hCgP1T2vZZbLO4m','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:49',1),(157,NULL,NULL,3,NULL,'Wunsch','Amie','1953-02-05 00:00:00','Burkina Faso','Burkinabé','michele30@example.com',NULL,'user.jpg',NULL,'698 Hane Pass Suite 338\nPort Lavernchester, MT 85773-8256','greenholt.marilou','$2y$10$adVcHraHBz/WDEuLUV3OWedi/hyB.qhtcXnUxqWA2XocgfGs5tMeG','2019-01-24 13:23:01','2019-01-24 13:23:01','2019-01-24 13:22:50',1),(158,NULL,NULL,3,NULL,'Hand','Alanna','1944-07-16 00:00:00','Burkina Faso','Burkinabé','bferry@example.com',NULL,'user.jpg',NULL,'354 Lempi Rue\nAlbertafurt, VT 97840-3126','felicia66','$2y$10$jMFFtthNXlFV1mTpRLpEhOG7QzVWDsIl2IxM5Eo3Tb9S54o52jpfW','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(159,NULL,NULL,3,NULL,'Wuckert','Dexter','1966-10-01 00:00:00','Burkina Faso','Burkinabé','clint96@example.com',NULL,'user.jpg',NULL,'350 Reva Trail Suite 029\nShieldsside, HI 57088-1844','tcorwin','$2y$10$hHPPqLWgtwtyl1H72QGx5O8p4LEgJK4LDSnAtYrjBjf8EpJ0j9pfO','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(160,NULL,NULL,5,NULL,'Kiehn','Madelyn','2017-03-29 00:00:00','Burkina Faso','Burkinabé','iorn@example.com',NULL,'user.jpg',NULL,'47851 Santino Flats Apt. 061\nJakeburgh, NH 82302-8842','pansy.zieme','$2y$10$vsP.0f0MxWwck6dXcUHpTeJqA5mut3Nj4ZhqBk09CqO1j6uin/FRK','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(161,NULL,NULL,6,NULL,'Kuhlman','Kaelyn','2003-10-23 00:00:00','Burkina Faso','Burkinabé','eleanore.hilpert@example.org',NULL,'user.jpg',NULL,'99201 Garett Burgs\nPort Adolfoview, SC 00304-1322','jemmerich','$2y$10$SgFgsF.mUsWDPGZHwm9DguQRmBWTd5oUGGOhPvMMFcrCYoCv4mPlW','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(162,NULL,NULL,5,NULL,'Hyatt','Bessie','1937-09-14 00:00:00','Burkina Faso','Burkinabé','pbartell@example.com',NULL,'user.jpg',NULL,'4822 Moore Cove Suite 599\nArmstrongstad, AL 71804-5743','schoen.arlo','$2y$10$ye.KEoCbX1HbzNYq7Z8P2.5lmTvS9dtLrt71WwVH6hgg7JXKkQw66','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(163,NULL,NULL,3,NULL,'Leannon','Donavon','1934-01-25 00:00:00','Burkina Faso','Burkinabé','adah27@example.com',NULL,'user.jpg',NULL,'57434 Mueller Centers Apt. 934\nStokesport, MD 66445','jodie.sawayn','$2y$10$d8FJxidXl53vFUExbkPVw./K7fYZu1YobRccfckLrSG/Pujm63276','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(164,NULL,NULL,6,NULL,'O\'Keefe','Kayleigh','1955-10-27 00:00:00','Burkina Faso','Burkinabé','myron66@example.net',NULL,'user.jpg',NULL,'70721 Russell Brook\nWest Asa, IA 29469-0944','pfeffer.dave','$2y$10$NY55UHlAYAGCqn7zL3QxBeOQDKz/tavubuTo920lhGlm7Xt6v06.S','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(165,NULL,NULL,5,NULL,'Schulist','Kirsten','2012-10-22 00:00:00','Burkina Faso','Burkinabé','blockman@example.com',NULL,'user.jpg',NULL,'30360 Taylor Row Apt. 083\nBernierborough, NC 68981-9563','creola.bahringer','$2y$10$pHWhS0KgW4KWK7u3E/iCY.ou5JIiBcLVK9yEA2gnctTqlkuQkbXq.','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:50',1),(166,NULL,NULL,4,NULL,'Schulist','Houston','1936-02-16 00:00:00','Burkina Faso','Burkinabé','zmueller@example.net',NULL,'user.jpg',NULL,'38050 Kemmer Trace\nPansyside, DE 40105-2130','hardy73','$2y$10$nSeFYQNBqYYArmUN0L54RexNQQft/u4FM9yYRQqPkFVm2OuNad6mq','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(167,NULL,NULL,1,NULL,'Stiedemann','Johnathan','2016-03-27 00:00:00','Burkina Faso','Burkinabé','jana.zieme@example.org',NULL,'user.jpg',NULL,'3109 Haylee Ranch\nWest Eunicestad, AZ 24931','patricia.heidenreich','$2y$10$0.TOBEYF75PUTCEjO4ehLuJ4wSR0J.QrBVOQT4tre.kQpjuDdswTm','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(168,NULL,NULL,1,NULL,'Quigley','Dallin','2006-06-18 00:00:00','Burkina Faso','Burkinabé','dmiller@example.net',NULL,'user.jpg',NULL,'891 Dortha Village\nSouth Tierraton, AZ 32572-6752','rosalyn.cormier','$2y$10$cNPlMnyBpSjufb6uoVQSpuCc3XRsIQf52SlHGXIVnN6cqcQHvUGE2','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(169,NULL,NULL,8,NULL,'Waters','Wayne','1965-03-24 00:00:00','Burkina Faso','Burkinabé','elliott.bins@example.com',NULL,'user.jpg',NULL,'11337 Heidi Green Apt. 289\nCristview, LA 67518-4884','brisa.hettinger','$2y$10$Lq3mlorYVRMxRYY4EZTFFuP7aNra6XbQybwAZq7cGvtu221E4p9Mm','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(170,NULL,NULL,3,NULL,'Carter','Kristofer','1970-06-10 00:00:00','Burkina Faso','Burkinabé','kennith30@example.org',NULL,'user.jpg',NULL,'806 Von Rue Suite 431\nJacobsonburgh, MO 47892','emelia99','$2y$10$nx0DIZU.1CuolmGnEwD5I.1PK4BQWsVX2qI02ARRMfdqbq.ChBkj2','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(171,NULL,NULL,8,NULL,'Gislason','Rahul','2006-02-05 00:00:00','Burkina Faso','Burkinabé','zemlak.reagan@example.net',NULL,'user.jpg',NULL,'32133 Bartoletti Road\nLake Danielle, WV 68524','londricka','$2y$10$48Ohpw2iO9jeptjDVAtLwuEUINYbnNpvNSmyRfnKtTS.VmFvjqPB2','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(172,NULL,NULL,9,NULL,'Crona','Saige','1963-12-10 00:00:00','Burkina Faso','Burkinabé','brunolfsson@example.com',NULL,'user.jpg',NULL,'599 Velma Points\nEast Leopold, IN 83257-4245','nolan.shea','$2y$10$2YS0GH1Zc4C0ETgOh8k8J.ETWw.VuDtUFaGZF85b.mr3nGyAE45Ci','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(173,NULL,NULL,5,NULL,'Bailey','Angel','1946-08-19 00:00:00','Burkina Faso','Burkinabé','herman.camren@example.org',NULL,'user.jpg',NULL,'5056 Garrison Gateway Apt. 138\nJacobiport, OK 26068-5426','alice.mills','$2y$10$8zpvBPyt3uPndPn27zjAoejQgwqTK92qsrVgjm0xLGBeO/M4sJX3.','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(174,NULL,NULL,4,NULL,'Krajcik','Catherine','1970-09-28 00:00:00','Burkina Faso','Burkinabé','wkris@example.net',NULL,'user.jpg',NULL,'14393 Garry Court Suite 941\nHilmastad, CT 42896-9714','nstoltenberg','$2y$10$KaWVxYDoW1tc6urWQz/QB.Zzv8w2O6DAoty990aiO6IbD9KQTl6n.','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:51',1),(175,NULL,NULL,2,NULL,'Lockman','Yolanda','2002-01-09 00:00:00','Burkina Faso','Burkinabé','garnet32@example.com',NULL,'user.jpg',NULL,'54561 Beer Extension\nLake Rupertland, WY 25911','grady.gay','$2y$10$imNyUfpC0G85Fo30.Q5yKu42KBgK1Ag7vZI1txQE7gO9DLgQDnrvW','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:52',1),(176,NULL,NULL,7,NULL,'Will','Hettie','1987-07-10 00:00:00','Burkina Faso','Burkinabé','lharber@example.com',NULL,'user.jpg',NULL,'438 Johns Garden\nMorissetteton, NJ 89672','brooklyn.ortiz','$2y$10$wOBpVilwzqDmLA1.RYBIPOb.9ErqMTddNkdMlpDQUSBZq4lsiWB3W','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:52',1),(177,NULL,NULL,4,NULL,'Schroeder','Fanny','1973-10-27 00:00:00','Burkina Faso','Burkinabé','russel.mozell@example.net',NULL,'user.jpg',NULL,'231 Aurore Pine Suite 944\nBlandaburgh, AZ 80621','makenzie.padberg','$2y$10$N/QDdvMWD1TRU8nJ.NQ/d.4a7uMG6Tgo3ZnFXIaA/ymPZPQRMCeTe','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:52',1),(178,NULL,NULL,9,NULL,'Medhurst','Marina','2013-10-23 00:00:00','Burkina Faso','Burkinabé','virginie48@example.com',NULL,'user.jpg',NULL,'37186 Miracle Mills\nSouth Ariannaborough, NH 01863-7246','ojones','$2y$10$S5OVxiTM7hA17j3T9VlvI.Yd1GDn.JnbdLOrPWetMACFkswYzfNGe','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:52',1),(179,NULL,NULL,5,NULL,'Nienow','Mike','1968-04-15 00:00:00','Burkina Faso','Burkinabé','worn@example.org',NULL,'user.jpg',NULL,'71517 Minnie Stravenue\nStromanmouth, IL 00055','katherine47','$2y$10$zM48E9knKxOaYhDqpIRxU.mJH7CGZeeKTOWkEGEieHl8RocHdUUou','2019-01-24 13:23:02','2019-01-24 13:23:02','2019-01-24 13:22:52',1),(180,NULL,NULL,6,NULL,'Hyatt','Rubye','1919-12-04 00:00:00','Burkina Faso','Burkinabé','bhaley@example.org',NULL,'user.jpg',NULL,'5528 Keeling Port\nMariettahaven, MD 11319','lea64','$2y$10$VqqaCqYkJ3RjByaR70/snevhFYs7xsKvTQBPNJT34jkaeYA4HoZ4O','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:52',1),(181,NULL,NULL,1,NULL,'Wilkinson','Marguerite','1934-04-28 00:00:00','Burkina Faso','Burkinabé','vabbott@example.com',NULL,'user.jpg',NULL,'643 White Fields Apt. 957\nKarleyhaven, NC 69164-8624','vlegros','$2y$10$J0l.i2lwOV0F.I7ZslkrMuseHnLI4T2VBdzaeAXCWBbX0KED5qQSW','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:52',1),(182,NULL,NULL,6,NULL,'Nicolas','Leda','1949-06-29 00:00:00','Burkina Faso','Burkinabé','zthompson@example.org',NULL,'user.jpg',NULL,'3406 Schamberger Valleys Suite 168\nNorth Rosariomouth, UT 12989-6425','xfeil','$2y$10$0AvuSawEUk/TJUljU3mYZeWi97Je6RTWmljtAx2SmGxDz.VEkEuZq','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:52',1),(183,NULL,NULL,4,NULL,'Kling','Chanelle','2017-04-15 00:00:00','Burkina Faso','Burkinabé','runolfsdottir.shanie@example.org',NULL,'user.jpg',NULL,'58959 Kenyatta Island Apt. 991\nVernside, CT 82433-3031','rhayes','$2y$10$aLbjATNLTJ9lXzb.RwKxe.BUW2uUMOJtH3W5ldYGfRrh9PNYcTleu','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:52',1),(184,NULL,NULL,6,NULL,'Romaguera','Jeffrey','1964-03-09 00:00:00','Burkina Faso','Burkinabé','okuneva.arturo@example.net',NULL,'user.jpg',NULL,'2832 Russel Dale\nSouth Brandiview, MI 59729-6897','murphy.lavon','$2y$10$yFCZKUGAjE6bKfUiE1f7l.amwh6y0e.1S11qxzyZ9MSDlB/PLV2Um','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(185,NULL,NULL,9,NULL,'Walsh','Arthur','1956-10-29 00:00:00','Burkina Faso','Burkinabé','torey.reinger@example.com',NULL,'user.jpg',NULL,'1810 Thiel Heights\nHammesfurt, LA 58118','holden.wiegand','$2y$10$sDcC0qxCBvu6.Lng4Z4Jpe1iG4M6g4.kUipHEL0npMM0Ue61cUEgy','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(186,NULL,NULL,7,NULL,'Huels','Hipolito','1942-09-26 00:00:00','Burkina Faso','Burkinabé','leannon.bobbie@example.org',NULL,'user.jpg',NULL,'5743 Elbert Club Suite 126\nNew Lonnieton, GA 59553','kyler27','$2y$10$0a4m7p6Il.aNamoYr3fsJO15GOdm9tgD45ES7ELGQQNnPRD.48e5a','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(187,NULL,NULL,6,NULL,'Donnelly','Jeramie','2000-07-26 00:00:00','Burkina Faso','Burkinabé','kozey.ramon@example.net',NULL,'user.jpg',NULL,'98179 Scarlett Motorway Suite 035\nMelodyside, AK 65506-1554','grady.jody','$2y$10$QRHoJf0YTsM87fKCU.O8juQ2GM2STWDHcDdPAYN.nNqduB/z1L4o.','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(188,NULL,NULL,4,NULL,'Hackett','Torrance','2004-08-08 00:00:00','Burkina Faso','Burkinabé','mustafa.abshire@example.net',NULL,'user.jpg',NULL,'2935 Schneider Parkways Apt. 525\nEast Dejaview, MT 78981','imayer','$2y$10$5AlMfgW/Oacbt2pICxBFO.WFUVpLGqsgh8nxg5rQQdSjlhv4tsG42','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(189,NULL,NULL,1,NULL,'Stiedemann','Treva','1947-06-04 00:00:00','Burkina Faso','Burkinabé','darrion.king@example.org',NULL,'user.jpg',NULL,'2730 Rau Street\nKyleighhaven, MA 32304','rjakubowski','$2y$10$ZyyhfZrcDnb168iuBwBiVuOw1VPNsc25sG1U0ti2ea9UvJDTm9CJy','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(190,NULL,NULL,7,NULL,'Auer','Susanna','1992-03-24 00:00:00','Burkina Faso','Burkinabé','trey18@example.org',NULL,'user.jpg',NULL,'737 Otilia Bypass Suite 201\nMertzland, KS 48514','ned40','$2y$10$ISMVQ7sblKPWcGSLhNpcAOeYIL0kxhtjGYC3HZdGX5ehvPA3/ThdK','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(191,NULL,NULL,6,NULL,'Casper','Hermann','1997-07-28 00:00:00','Burkina Faso','Burkinabé','hailee59@example.net',NULL,'user.jpg',NULL,'8809 Cristian Cliffs\nMaggioville, MD 18972-2471','emard.aubree','$2y$10$aJdrr3p2BW1XJnLlmwaQBOOFZ3rdt89POevEDmAMxzOGQLraxpm5S','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:53',1),(192,NULL,NULL,2,NULL,'Hamill','Jess','1957-10-01 00:00:00','Burkina Faso','Burkinabé','eldred80@example.com',NULL,'user.jpg',NULL,'73393 Ferry Station\nValentinehaven, ID 92094-3147','denesik.hallie','$2y$10$U62xVYIvMpEvB94PKp6vqOXmzZ9e1h4e7IB/1UNOGq.TcScv1lp9u','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(193,NULL,NULL,3,NULL,'Kutch','Trent','1985-02-26 00:00:00','Burkina Faso','Burkinabé','maggio.clarabelle@example.com',NULL,'user.jpg',NULL,'17300 Magnolia Meadow Suite 310\nHarberhaven, MT 95739-8495','gerson.rosenbaum','$2y$10$gDW48KsN4DodYRUFHmvMsutD0qgAcjQu5JeYW0a2hli0nKLUkDD2a','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(194,NULL,NULL,9,NULL,'Rogahn','Bernardo','2001-02-26 00:00:00','Burkina Faso','Burkinabé','lacey.boyer@example.org',NULL,'user.jpg',NULL,'4540 Medhurst Locks\nJohnpaulstad, NJ 67040-3615','pquitzon','$2y$10$e2FbDako7HxF80OwuylZsOc8He4XAbzB7m0fQC6HzvNI.shywZa3i','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(195,NULL,NULL,4,NULL,'Schiller','Kenya','1951-03-29 00:00:00','Burkina Faso','Burkinabé','rolfson.kelton@example.com',NULL,'user.jpg',NULL,'9125 Schamberger Extension Apt. 437\nBoehmfort, MI 97083-4103','qmurphy','$2y$10$GlTu0bMB0W9zJ0RVuMrYrOFRH4hpqo5eGXeGjGBOw7zO9LwPi4n7a','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(196,NULL,NULL,4,NULL,'Krajcik','Garry','1966-11-27 00:00:00','Burkina Faso','Burkinabé','buckridge.shanelle@example.com',NULL,'user.jpg',NULL,'40292 Pouros River Suite 744\nFeeneybury, CO 49396','domenica.bogisich','$2y$10$p11ZW.3xjHRyU34N1vt2supPE2OwJH.N2N589wBh25AWhWTM9xZM2','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(197,NULL,NULL,7,NULL,'Brown','Gino','1998-06-03 00:00:00','Burkina Faso','Burkinabé','elsa45@example.org',NULL,'user.jpg',NULL,'91126 Gislason Rue Suite 908\nSouth Darrylfort, SD 37282','ruecker.coy','$2y$10$co5TNa3F9s9Mo1Hw0Nol/.O6DPAsj030.Gsy8UrnnQGsetRFSI27.','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(198,NULL,NULL,2,NULL,'Tromp','Jordyn','1952-08-09 00:00:00','Burkina Faso','Burkinabé','rhaag@example.com',NULL,'user.jpg',NULL,'51279 Satterfield Via Apt. 816\nSouth Berta, TN 39183','elmore86','$2y$10$RguC.PbyOXSC4XytS8GmseJQAnovjGWU89r0/ldjAu4R/TmmXCeMq','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(199,NULL,NULL,6,NULL,'Reinger','Zetta','1998-09-09 00:00:00','Burkina Faso','Burkinabé','pascale77@example.org',NULL,'user.jpg',NULL,'42136 Jason Union Apt. 236\nWillshire, KS 52307','schaden.bernhard','$2y$10$ybPkSYgP8sI7qFfuqiWZhOUHTTbqz38BlQH0VwJP12ylkSZNae1kO','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(200,NULL,NULL,3,NULL,'Kirlin','Osvaldo','1982-03-05 00:00:00','Burkina Faso','Burkinabé','plangosh@example.net',NULL,'user.jpg',NULL,'98136 Haven Fork\nLake Sonyaland, LA 91276-9211','runolfsdottir.dayna','$2y$10$4dzwu6SFx128jkcldPkmwe9.zrjvxNcDa3sQLGXTEk3u.AvxzUgEW','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:54',1),(201,NULL,NULL,4,NULL,'Gaylord','Mitchell','1948-03-10 00:00:00','Burkina Faso','Burkinabé','uterry@example.net',NULL,'user.jpg',NULL,'247 Senger Gateway\nSouth Isabelland, OR 14723','maurine.bauch','$2y$10$9AT2ZEeRAmvZpg/36fwssOx8CFl9xlRtb9BGvplD70vlDzj4Wy6.2','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:55',1),(202,NULL,NULL,7,NULL,'Aufderhar','Jerod','1926-03-05 00:00:00','Burkina Faso','Burkinabé','ronaldo42@example.com',NULL,'user.jpg',NULL,'4820 Ruecker Tunnel\nAdellabury, WV 45999-2964','apfeffer','$2y$10$Of1TKeZioabcJiLE2NgKbuXv7pzmrZ7Cg.kfyFVATBVRdLYV6UlXq','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:55',1),(203,NULL,NULL,1,NULL,'Schroeder','Raven','1983-04-27 00:00:00','Burkina Faso','Burkinabé','silas.ferry@example.com',NULL,'user.jpg',NULL,'67826 Jacobi Highway\nSouth Mario, AK 36366-1435','marley.hoeger','$2y$10$BS7l4KHBcMTQFMeeG313lOkWuaWUNszWIFpjo/hKDTz/M/SqwNSKu','2019-01-24 13:23:03','2019-01-24 13:23:03','2019-01-24 13:22:55',1),(204,NULL,NULL,1,NULL,'Coulibaly','Cheick Rachid','1995-02-07 00:00:00','Bobo Dioulasso','Burkina Faso','chercheur@example.com',NULL,'user.jpg','Nszz07obAUZ7D6E1PBClKb4b3j6VCOj84IKQnmwl7w8rnzdXiBfdx8BVkOUj','Bobo Dioulasso','Checkionio','$2y$10$HfTF45iCPb1bhPKYq/oauuMHWIEMm97H7.6AmNGCaS4IMl21Kl2.a','2019-01-24 13:49:42','2019-01-24 13:50:30','2019-01-24 13:50:30',1);
/*!40000 ALTER TABLE `personne_internes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perspectives`
--

DROP TABLE IF EXISTS `perspectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perspectives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perspectives_projet_id_foreign` (`projet_id`),
  CONSTRAINT `perspectives_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perspectives`
--

LOCK TABLES `perspectives` WRITE;
/*!40000 ALTER TABLE `perspectives` DISABLE KEYS */;
/*!40000 ALTER TABLE `perspectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestation_de_services`
--

DROP TABLE IF EXISTS `prestation_de_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestation_de_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) unsigned NOT NULL,
  `equipe_id` int(10) unsigned NOT NULL,
  `nomDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typePrestation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestation_de_services_institution_id_foreign` (`institution_id`),
  KEY `prestation_de_services_equipe_id_foreign` (`equipe_id`),
  CONSTRAINT `prestation_de_services_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `prestation_de_services_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestation_de_services`
--

LOCK TABLES `prestation_de_services` WRITE;
/*!40000 ALTER TABLE `prestation_de_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestation_de_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codeMuraz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite_id` int(10) unsigned DEFAULT NULL,
  `equipe_id` int(10) unsigned DEFAULT NULL,
  `ideeDeProjet_id` int(10) unsigned DEFAULT NULL,
  `intitule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dureeProjet` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumeProjet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `budgetProjet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteDeMiseEnOeuvre` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contexteProjet` text COLLATE utf8mb4_unicode_ci,
  `nombreEmploi` int(11) NOT NULL DEFAULT '0',
  `fraisIndirectverseCM` double(8,2) DEFAULT NULL,
  `evolution` int(11) NOT NULL DEFAULT '0',
  `typeProjet_id` int(10) unsigned NOT NULL,
  `questionDeRecherche` text COLLATE utf8mb4_unicode_ci,
  `resumeDesMethodeEtude` text COLLATE utf8mb4_unicode_ci,
  `beneficeNational` text COLLATE utf8mb4_unicode_ci,
  `beneficeInstitutionnel` text COLLATE utf8mb4_unicode_ci,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projets_ideedeprojet_id_foreign` (`ideeDeProjet_id`),
  KEY `projets_equipe_id_foreign` (`equipe_id`),
  KEY `projets_unite_id_foreign` (`unite_id`),
  KEY `projets_typeprojet_id_foreign` (`typeProjet_id`),
  CONSTRAINT `projets_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  CONSTRAINT `projets_ideedeprojet_id_foreign` FOREIGN KEY (`ideeDeProjet_id`) REFERENCES `idees_de_projet` (`id`),
  CONSTRAINT `projets_typeprojet_id_foreign` FOREIGN KEY (`typeProjet_id`) REFERENCES `type_projets` (`id`),
  CONSTRAINT `projets_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unite_de_recherches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projets`
--

LOCK TABLES `projets` WRITE;
/*!40000 ALTER TABLE `projets` DISABLE KEYS */;
INSERT INTO `projets` VALUES (1,'PT-12',1,1,NULL,'Etude sur les enfants de rue face au SIDA','12','Il s\'agit d\'une étude qui sera menée par les agents du Centre de Calcul et des agents de la santé publiques','12 millions d\'euros','Banfaro','Il s\'est deroule dans un contexte d\'expansion de mesurer des SDF',0,NULL,0,1,'Comment surpasser ce problème?','Etude transversale et denombrable','National','Permettre a plusiseurs agents de soutenir leur thèse',0,'2019-01-23 12:33:58','2019-01-23 12:33:58'),(2,'PS-12',1,NULL,NULL,'Evaluation de l’effet larvicide des extraits de Vernonia cinerea Less (Asteraceae) sur les larves de Anopheles gambiae s.s de l’IRSS/DRO Bobo Dioulasso, Burkina Faso.','24','Résumé des méthodes d’étude (design, population d’étude, échantillonnage, etc):\r\nAu Burkina Faso, malgré les efforts importants consacrés à la lutte contre les maladies infectieuses, le pays a été durement\r\ntouché ces deux dernières années par des épidémies de dengue. La propagation de la résistance aux insecticides chez le\r\nvecteur Aedes aegypti a mis à l\'épreuve les approches de santé publique classiques pour lutter contre ces maladies. Différentes\r\nsouches de Wolbachia introduites chez Ae. aegypti ont des propriétés différentes; wAu est un inhibiteur de la transmission de la\r\ndengue extrêmement efficace, mais n\'induit pas d\'incompatibilité cytoplasmique, le principal mécanisme utilisé par Wolbachia\r\npour se propager à travers les populations. Nous étudierons la possibilité que Wolbachia confère une protection contre les\r\nchampignons pathogènes du Metarhizium chez Ae. aegypti, et donc évaluer si les champignons pourraient être utilisés pour\r\ndiffuser cette souche de Wolbachia à travers les populations. Nous allons également introduire Wolbachia dans un background','1500 euros','Bobo Dioulasso','Les moustiques sont des vecteurs responsables de la transmission de diverses maladies telles que le paludisme, la filariose, la\r\nfièvre jaune, la dengue et d’autres infections (Pugazhvendan and Elumali, 2013). En 2015 selon l’OMS on a enregistré 212\r\nmillions de cas de paludisme dans le monde et 429 000 décès associés (WHO, 2016). Beaucoup d’approches ont été\r\ndéveloppées pour contrôler les moustiques, dans lesquels le contrôle des moustiques au stade larvaire est considéré comme\r\nun moyen efficace dans la gestion intégrée des vecteurs (Rutledge et al., 2003). Les méthodes actuelles de lutte contre les\r\nmoustiques reposent sur des insecticides synthétiques qui sont la première ligne d’action en raison de leur action rapide.\r\nMalheureusement, la plupart de ces produits chimiques deviennent de plus en plus inefficaces contre les moustiques et ont des\r\neffets néfastes pour l’homme, les animaux et l’environnement du fait de leur accumulation dans le milieu naturel (Namountougou\r\net al., 2012). Dans un tel contexte de nouveaux outils de recherche sont nécessaires tels que les insecticides biologiques\r\nfacilement dégradables. Vernonia cinerea Less appartenant à la famille des Astéracées est une plante annuelle largement\r\nrépandue en Inde et dans la partie Ouest du Burkina Faso. Notre étude vise à évaluer l’effet des extraits de Vernonia cinerea\r\nLess sur les larves du stade 3 et 4 de Anopheles gambiae s.s.',0,NULL,0,1,'Wolbachia pourrait conférer une protection contre les champignons pathogènes du\r\nMetarhizium chez Ae. Aegypti.','Les lyophilisats des extraits seront utilisées pour préparer les solutions stock. La préparation des solutions des extraits sera faite\r\nselon les instructions et protocoles pour les bio essais de l’IRD-LIN, 2006 (IRD-LIN, 2006). Les solutions tests seront préparées\r\na 100mg/L, 10mg/L, 1mg/L, 0,1mg/L, 0,01 mg/L etc.\r\nLes larves de moustiques seront constituées d’espèces de Anopheles gambiae ss provenant de l’insectarium de l’IRSS/DRO\r\nBobo Dioulasso. Des tests expérimentaux seront effectués au laboratoire sur les larves L3 et L4 de Anopheles gambiae ss.\r\nLe bio essai pour l’activité larvicide sera effectué en utilisant le protocole de l’OMS. La lecture sera faite après chaque 2 4 h et\r\n48h. Trente (30) larves stade fin L3 début L4 seront prélevées puis déposées dans chaque gobelet. Le même nombre de larves\r\nsera placé dans un bac témoin contenant 100 ml.\r\nLors de la lecture des tests, si la mortalité des témoins est comprise entre 0 et 5% le test est validé. Lorsque celle-ci est comprise\r\nentre 5 et 20 %, le test est validé après correction grâce à la formule d’Abbott qui donne une mortalité corrigée : Mc = ((%\r\nmortalitéTraités-% mortalitéTémoins)/(100-% mortalitéTemoins))x 100 .\r\nLorsque cette mortalité est supérieure à 20 % le test n’est pas validé et doit être recommencé. Le logiciel Probit analysis sera\r\nutilisé pour déterminer de LC50 et LC90.','Non definis','Non definis',0,'2019-01-24 12:17:41','2019-01-24 12:17:41'),(3,'EBOVAC2',6,NULL,NULL,'Etude de Phase II, randomisée à l\'insu des observateurs, contre placebo, des finée à évaluer la sécurité d\'emploi, la tolérance et l’immunogénicité de trois schémas primeboost des candidats-vaccisn propylactiques Ad26.ZEBOV et MVA-BN-Filo contre Ebola chez des adultes sains, comprenant des personnes âgées, des sujets infectés par le VIH et des enfants sains dans trois strates d\'age en AFrique','24','néant','5075000','Centre MURAZ et CNRFP','Le virus Ebola appartient à la famille des Filoviridae et provoque la maladie à virus Ebola, qui peut induire une\r\nfièvre sévère chez les humains et chez les primates non humains (PNH). Les taux de létalité de la maladie à virus\r\nEbola ont varié de 25% à 90% (moyenne: 50%), selon l’Organisation Mondiale de la Santé (OMS). Le gouverneur\r\ndes Etats-Unis (US) estime que ces virus sont hautement prioritaires et les définit comme des agents de\r\n« catégorie A », en raison du taux élevé de mortalité des personnes infectées.',0,NULL,0,1,'La présente étude a été conçue pour fournir des informations descriptives sur la sécurité d’emploi et\r\nl’immunogénicité sans comparaison formelle entre les traitements, aucune hypothèse statistique n’est prévu','L’étude durera 18 mois et elle comporte 3 phases :\r\nLa sélection : pendant cette phase le médecin de l’étude vérifiera l’éligibilité des participants. Cette phase sera\r\nfaite dans les 8 semaines précédant la date à laquelle les participants recevront le vaccin à l’étude.\r\nLa phase de vaccination et suivi postérieur au rappel : Les participants recevront 2 vaccinations au cours de\r\nl’étude. La première vaccination aura lieu le Jour 1. La 2ème vaccination, ou vaccination de rappel, le Jour 29, 57\r\nou 85 chez des adultes sains y compris des personnes âgées, les Jours 29 et 57 chez les enfants sains dans trois\r\ngroupes d’âge.\r\nSuivi à long terme : les participants ayant reçu le vaccin actif au cours de cette étude devront se soumettre au\r\nsuivi à long terme au Jour 180 et au Jour 360 après la vaccination.\r\nTous les sujets recevront une vaccination, conformément à la randomisation, le Jour 1 (Groupes 1 à 3) et le Jour\r\n29 (Groupe 1), le Jour 57 (Groupe 2) ou le Jour 85 (Groupe 3) aux doses suivantes :\r\nAd26.ZEBOV : 5x1010 pv, en flacons à usage unique (0,5 ml extractible)\r\nMVA-BN-Filo : 1x108 U Inf (titre nominal ; le volume de remplissage est de 1,9 x108 U Inf par dose, plage : 1,27-\r\n2,67x108 U Inf, en flacons à usage unique (0,5 ml extractible) ;\r\nPlacebo : 0.9 % saline (0.5 mL extractable).','Néant','Néant',0,'2019-01-28 02:39:01','2019-01-28 02:39:01');
/*!40000 ALTER TABLE `projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typePublication_id` int(10) unsigned NOT NULL,
  `evenement_id` int(10) unsigned DEFAULT NULL,
  `projet_id` int(10) unsigned DEFAULT NULL,
  `personne_id` int(10) unsigned DEFAULT NULL,
  `libellePublication` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datePublication` datetime NOT NULL,
  `sourcePublication` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publications_personne_id_foreign` (`personne_id`),
  KEY `publications_evenement_id_foreign` (`evenement_id`),
  KEY `publications_projet_id_foreign` (`projet_id`),
  KEY `publications_typepublication_id_foreign` (`typePublication_id`),
  CONSTRAINT `publications_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`),
  CONSTRAINT `publications_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `publications_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  CONSTRAINT `publications_typepublication_id_foreign` FOREIGN KEY (`typePublication_id`) REFERENCES `type_publications` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
INSERT INTO `publications` VALUES (1,1,NULL,1,2,'Resultat sur les valeurs recueillies sur FHV','Il s\'agit des informations nécessaires pour mettre en place une étude transversale','2019-01-09 00:00:00','www.pubmed.com',NULL,'2019-01-23 13:31:16','2019-01-23 13:31:16'),(2,1,NULL,2,204,'Caractérisation des souches de bactéries sporulant isolées à partir de culture contaminées de Lowenstein Jensen chez des patients tuberculeux à Bobo-Dioulasso','Etude permettant de montrer les differentes races de souches','2019-01-08 00:00:00','www.pubmed.com','publications/publication-1548352972.pdf','2019-01-24 18:02:52','2019-01-24 18:02:52'),(3,1,NULL,NULL,204,'Evaluation de la prévalence de l’hépatite B chez des femmes présentant des lésions précancéreuses du col de l’utérus dans la région des Hauts Bassins, Burkina Faso','Etude s\'est passé a Bobo Dioulasso','2018-05-11 00:00:00','www.pubmed.com',NULL,'2019-01-25 00:41:17','2019-01-25 00:41:17'),(4,1,NULL,NULL,204,'Libelle','Descrition','2018-12-11 00:00:00','www.pubmed.com',NULL,'2019-01-25 15:28:58','2019-01-25 15:28:58'),(5,1,NULL,NULL,204,'L\'Etude de la predominance du SIDA Au Burkina Faso','Il s\'agit des resultats obtenus sur l\'etude trois','2019-01-02 00:00:00','www.pubmed.com',NULL,'2019-01-25 16:55:37','2019-01-25 16:55:37'),(6,2,NULL,NULL,204,'Analysis of the Knowledge, Attitudes and Practices of Populations in Four Villages of the Boucle du Mouhoun Region (Burkina Faso) Regarding Tænia solium Life Cycle.','this is on analyse on diseases value in BF','2017-11-13 00:00:00','https://doi.org/10.4236/health.2018.101008','publications/publication-1548592024.odt','2019-01-27 12:27:04','2019-01-27 12:27:04'),(7,1,NULL,NULL,204,'Ouiminga A and Laurent Caignault. Simplified Dynabeads Method Using Light Microscopy for Enumerating TCD4+ Lymphocytes in Resource-Limited Settings. Ann Clin Lab Res.','Une étude de mise place de un système paramétrique','2017-11-15 00:00:00','www.pubmed.com','publications/publication-1548593273.docx','2019-01-27 12:47:53','2019-01-27 12:47:53'),(8,1,NULL,NULL,204,'Etude de mise en place des souces','Une dscription','2019-01-07 00:00:00','www.pubmed.com',NULL,'2019-01-28 15:24:17','2019-01-28 15:24:17');
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification_personne_externes`
--

DROP TABLE IF EXISTS `qualification_personne_externes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification_personne_externes` (
  `personne_id` int(10) unsigned NOT NULL,
  `qualification_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`),
  KEY `qualification_personne_externes_qualification_id_foreign` (`qualification_id`),
  CONSTRAINT `qualification_personne_externes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_externes` (`id`),
  CONSTRAINT `qualification_personne_externes_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification_personne_externes`
--

LOCK TABLES `qualification_personne_externes` WRITE;
/*!40000 ALTER TABLE `qualification_personne_externes` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualification_personne_externes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification_personne_internes`
--

DROP TABLE IF EXISTS `qualification_personne_internes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification_personne_internes` (
  `personne_id` int(10) unsigned NOT NULL,
  `qualification_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`qualification_id`),
  KEY `qualification_personne_internes_qualification_id_foreign` (`qualification_id`),
  CONSTRAINT `qualification_personne_internes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`),
  CONSTRAINT `qualification_personne_internes_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification_personne_internes`
--

LOCK TABLES `qualification_personne_internes` WRITE;
/*!40000 ALTER TABLE `qualification_personne_internes` DISABLE KEYS */;
INSERT INTO `qualification_personne_internes` VALUES (1,1,NULL,NULL),(1,3,NULL,NULL),(1,4,NULL,NULL),(204,1,NULL,NULL),(204,2,NULL,NULL);
/*!40000 ALTER TABLE `qualification_personne_internes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomQualification` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionQualification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeQualification` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
INSERT INTO `qualifications` VALUES (1,'Biologiste ','Equipe Médicale','Principale',NULL,NULL),(2,'Entomologiste','Equipe Médicale','Secondaire',NULL,NULL),(3,'TBM','Equipe Médicale','Principale',NULL,NULL),(4,'Phramaciens','','Secondaire',NULL,NULL);
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `references`
--

DROP TABLE IF EXISTS `references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `references` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personne_id` int(10) unsigned NOT NULL,
  `nomReference` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomReference` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailReference` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephoneReference` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `references_personne_id_foreign` (`personne_id`),
  CONSTRAINT `references_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personne_internes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `references`
--

LOCK TABLES `references` WRITE;
/*!40000 ALTER TABLE `references` DISABLE KEYS */;
/*!40000 ALTER TABLE `references` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultats_attendus`
--

DROP TABLE IF EXISTS `resultats_attendus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultats_attendus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ideeDeProjet_id` int(10) unsigned NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisation` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resultats_attendus_ideedeprojet_id_foreign` (`ideeDeProjet_id`),
  CONSTRAINT `resultats_attendus_ideedeprojet_id_foreign` FOREIGN KEY (`ideeDeProjet_id`) REFERENCES `idees_de_projet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultats_attendus`
--

LOCK TABLES `resultats_attendus` WRITE;
/*!40000 ALTER TABLE `resultats_attendus` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultats_attendus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultats_obtenus`
--

DROP TABLE IF EXISTS `resultats_obtenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultats_obtenus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projet_id` int(10) unsigned NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRealisation` datetime NOT NULL,
  `detailResutltat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resultats_obtenus_projet_id_foreign` (`projet_id`),
  CONSTRAINT `resultats_obtenus_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultats_obtenus`
--

LOCK TABLES `resultats_obtenus` WRITE;
/*!40000 ALTER TABLE `resultats_obtenus` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultats_obtenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2019-01-23 00:56:36','2019-01-23 00:56:36'),(2,'chefUnite','web','2019-01-23 00:56:37','2019-01-23 00:56:37'),(3,'chefDiretion','web','2019-01-23 00:56:37','2019-01-23 00:56:37'),(4,'chefLaboratoire','web','2019-01-23 00:56:37','2019-01-23 00:56:37'),(5,'chefSection','web','2019-01-23 00:56:37','2019-01-23 00:56:37'),(6,'chefDepartement','web','2019-01-23 00:56:37','2019-01-23 00:56:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laboratoire_id` int(10) unsigned NOT NULL,
  `nomSection` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_laboratoire_id_foreign` (`laboratoire_id`),
  CONSTRAINT `sections_laboratoire_id_foreign` FOREIGN KEY (`laboratoire_id`) REFERENCES `laboratoires` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,1,'Section Hematologie',NULL,NULL),(2,1,'Section Biochimie',NULL,NULL),(3,1,'Section Sérologie-Immunologie',NULL,NULL),(4,1,'Section Bactériologie',NULL,NULL),(5,1,'Section Parasitologie',NULL,NULL),(6,1,'Section Virologie',NULL,NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societes`
--

DROP TABLE IF EXISTS `societes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomSociete` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresseSociete` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailSociete` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societes`
--

LOCK TABLES `societes` WRITE;
/*!40000 ALTER TABLE `societes` DISABLE KEYS */;
/*!40000 ALTER TABLE `societes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuts`
--

DROP TABLE IF EXISTS `statuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleStatut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionStatut` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuts`
--

LOCK TABLES `statuts` WRITE;
/*!40000 ALTER TABLE `statuts` DISABLE KEYS */;
INSERT INTO `statuts` VALUES (1,'Soumis ','Fugiat vel repellendus omnis sit. Modi ut adipisci asperiores consectetur repellat ex voluptatem. Veniam qui itaque voluptatem ipsa consequuntur.',NULL,NULL),(2,'Accepté et non Financé','Voluptate nihil porro sit repudiandae. Laborum voluptatem hic quia tempora officiis minima. Rem delectus corporis dolorem qui distinctio in delectus libero.',NULL,NULL),(3,'Accepté et Financé','Nostrum recusandae aut officia. Nemo magnam autem dicta et dolore. Perferendis doloribus deserunt reiciendis consequatur eum ipsa. Saepe ea ut laboriosam ipsum saepe voluptatem similique.',NULL,NULL),(4,'En cours','Ducimus consequatur rerum autem. Est veniam soluta mollitia fugiat inventore accusantium laborum. Atque tempore nisi possimus alias incidunt.',NULL,NULL),(5,'En pause','Non pariatur culpa ut voluptatum omnis. Ex quasi qui et commodi tenetur reiciendis excepturi. Et assumenda et adipisci ipsam et dolores. Repudiandae dolorem architecto voluptates magnam dolor cumque.',NULL,NULL),(6,'Terminé','Libero in sit minima maxime. Quaerat labore provident omnis in rerum. Ea minus rem expedita in ex. Iusto optio nihil modi qui.',NULL,NULL);
/*!40000 ALTER TABLE `statuts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_diplomes`
--

DROP TABLE IF EXISTS `type_diplomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_diplomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleDiplome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveauDiplome` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_diplomes`
--

LOCK TABLES `type_diplomes` WRITE;
/*!40000 ALTER TABLE `type_diplomes` DISABLE KEYS */;
INSERT INTO `type_diplomes` VALUES (1,'BEPC',1,NULL,NULL),(2,'BAC',2,NULL,NULL),(3,'Doctorat',3,NULL,NULL),(4,'MASTER 1',4,NULL,NULL),(5,'MASTER 2',5,NULL,NULL),(6,'PHD',6,NULL,NULL);
/*!40000 ALTER TABLE `type_diplomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_formation_en_cours`
--

DROP TABLE IF EXISTS `type_formation_en_cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_formation_en_cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleTypeFormation` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_formation_en_cours`
--

LOCK TABLES `type_formation_en_cours` WRITE;
/*!40000 ALTER TABLE `type_formation_en_cours` DISABLE KEYS */;
INSERT INTO `type_formation_en_cours` VALUES (1,'Certifiante',NULL,NULL),(2,'Diplomante',NULL,NULL),(3,'Courte',NULL,NULL);
/*!40000 ALTER TABLE `type_formation_en_cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_institutions`
--

DROP TABLE IF EXISTS `type_institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_institutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_institutions`
--

LOCK TABLES `type_institutions` WRITE;
/*!40000 ALTER TABLE `type_institutions` DISABLE KEYS */;
INSERT INTO `type_institutions` VALUES (1,'Université',NULL,NULL),(2,'Institut de Recherche',NULL,NULL),(3,'ONG',NULL,NULL),(4,'Gouvernement',NULL,NULL);
/*!40000 ALTER TABLE `type_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_projets`
--

DROP TABLE IF EXISTS `type_projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_projets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intitule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_projets`
--

LOCK TABLES `type_projets` WRITE;
/*!40000 ALTER TABLE `type_projets` DISABLE KEYS */;
INSERT INTO `type_projets` VALUES (1,'Projet de Recherche ','A decrire',NULL,NULL),(2,'Projet de renforcement de capacité','A decrire ',NULL,NULL),(3,'Projet D\'Expertise','A decrire',NULL,NULL);
/*!40000 ALTER TABLE `type_projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_publications`
--

DROP TABLE IF EXISTS `type_publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_publications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionType` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_publications`
--

LOCK TABLES `type_publications` WRITE;
/*!40000 ALTER TABLE `type_publications` DISABLE KEYS */;
INSERT INTO `type_publications` VALUES (1,'Article','Minus et qui aperiam similique qui. Nihil eveniet natus qui.',NULL,NULL,2),(2,'Communication Orale','Cupiditate perferendis excepturi porro quisquam consectetur. Doloribus quos dolores sint voluptas in repudiandae ut. Laboriosam quo sed voluptatem dolor quis aut repellendus dolore.',NULL,NULL,2),(3,'Poster','Sit magni voluptas quia atque. Sunt et eum nihil dolore molestiae occaecati et. Voluptatem quis et qui maxime.',NULL,NULL,2),(4,'Livre','Quo rerum voluptatem officiis quis. Dolores ipsam debitis iusto. Rem dignissimos quidem et deserunt temporibus dolorem et. Et molestias tenetur qui fuga fugiat.',NULL,NULL,5);
/*!40000 ALTER TABLE `type_publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unite_de_recherches`
--

DROP TABLE IF EXISTS `unite_de_recherches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unite_de_recherches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laboratoire_id` int(10) unsigned NOT NULL,
  `nomUnite` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unite_de_recherches_laboratoire_id_foreign` (`laboratoire_id`),
  CONSTRAINT `unite_de_recherches_laboratoire_id_foreign` FOREIGN KEY (`laboratoire_id`) REFERENCES `laboratoires` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unite_de_recherches`
--

LOCK TABLES `unite_de_recherches` WRITE;
/*!40000 ALTER TABLE `unite_de_recherches` DISABLE KEYS */;
INSERT INTO `unite_de_recherches` VALUES (1,2,'Parasitologie-Entomologie',NULL,NULL),(2,2,'Bactériologie',NULL,NULL),(3,2,'Mycobacteriologie',NULL,NULL),(4,2,'Virologie',NULL,NULL),(5,2,'LNR-FHV',NULL,NULL),(6,2,'Biologie Moléculaire',NULL,NULL),(7,2,'Immunologie',NULL,NULL),(8,2,'Nutrition-Toxicologie',NULL,NULL),(9,2,'Pharmacognosie',NULL,NULL);
/*!40000 ALTER TABLE `unite_de_recherches` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-28 23:58:42
