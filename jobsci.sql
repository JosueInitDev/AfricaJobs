-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 juil. 2020 à 17:56
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jobsci`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_nom` varchar(20) NOT NULL,
  `ad_mail` varchar(60) NOT NULL,
  `ad_photo` varchar(50) DEFAULT NULL,
  `ad_mdp_1` varchar(100) NOT NULL,
  `ad_mdp_2` varchar(100) NOT NULL,
  `ad_date` varchar(10) NOT NULL,
  `ad_etat` tinyint(1) NOT NULL DEFAULT '0',
  `ad_derniere_co` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_nom`, `ad_mail`, `ad_photo`, `ad_mdp_1`, `ad_mdp_2`, `ad_date`, `ad_etat`, `ad_derniere_co`) VALUES
(1, 'Josué', 'jose.init.dev@gmail.com', '1592681478Josué.png', '$2y$10$KJUykGW4rU6cvXIYLbCkkOC/kOTE4C2xtpm5eWJO2mENXsU2nLtRm', '$2y$10$52Oa1if3Olhig5.INnFzEOT/3ARIRsKkeZhAu.lth1sAlS7IoMINa', '', 1, '20-06-2020');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `cl_id` int(11) NOT NULL,
  `cl_nom` varchar(20) NOT NULL,
  `cl_telephone` varchar(15) DEFAULT NULL,
  `cl_mail` varchar(60) DEFAULT NULL,
  `cl_mdp` varchar(100) NOT NULL,
  `cl_photo` varchar(20) NOT NULL DEFAULT 'user-default.png',
  `cl_type` varchar(10) NOT NULL,
  `cl_cherche_job` tinyint(1) NOT NULL DEFAULT '1',
  `cl_diplome` varchar(15) NOT NULL,
  `cl_niveau` varchar(50) DEFAULT NULL,
  `cl_description` tinytext,
  `cl_cv` varchar(20) DEFAULT NULL,
  `cl_derniere_co` date NOT NULL,
  `cl_date` date NOT NULL,
  `cl_accord_site` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_nom`, `cl_telephone`, `cl_mail`, `cl_mdp`, `cl_photo`, `cl_type`, `cl_cherche_job`, `cl_diplome`, `cl_niveau`, `cl_description`, `cl_cv`, `cl_derniere_co`, `cl_date`, `cl_accord_site`) VALUES
(1, 'client 1', '05054578', NULL, 'sdsgrgqsrgqerg', 'user-default.png', 'employer', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLor', '1595726392.docx', '2020-07-21', '2020-07-21', 1),
(2, 'client 2', '04547896', NULL, 'qsyufgsrguisgu', 'user-default.png', 'employer', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLor', 'Lorem ipsun deduds d', '2020-07-21', '2020-07-21', 1),
(3, 'client 3', '01457859', NULL, 'zhugigerio', 'user-default.png', 'employer', 1, 'avec_diplome', 'BTS', 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.', NULL, '2020-07-21', '2020-07-21', 1),
(4, 'client 4', '03254785', NULL, 'zfsf', 'user-default.png', 'employer', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLor', NULL, '2020-07-21', '2020-07-21', 1),
(5, 'client 5', '554785489', NULL, 'sgssrzfz', 'user-default.png', 'employer', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.', '1595726392.docx', '2020-07-21', '2020-07-21', 1),
(6, 'client 6', '44578548', NULL, 'zsfusgiu', 'user-default.png', 'employer', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLor', NULL, '2020-07-21', '2020-07-21', 1),
(7, 'client 7', '01457895', NULL, 'zfoisfiu', 'user-default.png', 'employeur', 1, 'sans_diplome', NULL, 'Lorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.\r\nLorem ipsun deduds dejise eudjsneu uzoe dziee dieoeke eieoek.', '1595726392.docx', '2020-07-21', '2020-07-21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `en_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `en_nom` varchar(30) NOT NULL,
  `en_photo` varchar(20) DEFAULT NULL,
  `en_description` tinytext,
  `en_pays` varchar(30) NOT NULL,
  `en_ville` varchar(30) NOT NULL,
  `en_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`en_id`, `cl_id`, `en_nom`, `en_photo`, `en_description`, `en_pays`, `en_ville`, `en_date`) VALUES
(1, 1, 'Entreprise', NULL, 'Deyh dei dds eifufizuf eufef\r\nefie fue feufifeie fueiuif', 'Côte d\'Ivoire', 'Abidjan Yopougon', '2020-07-26');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `jb_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `jb_titre` varchar(50) NOT NULL,
  `jb_description` text NOT NULL,
  `jb_photo` varchar(20) NOT NULL DEFAULT 'job-default.jpg',
  `jb_pays` varchar(30) NOT NULL,
  `jb_ville` varchar(30) NOT NULL,
  `jb_type` varchar(15) NOT NULL,
  `jb_categorie` varchar(15) NOT NULL,
  `jb_duree` varchar(10) NOT NULL,
  `jb_niveau` varchar(30) NOT NULL,
  `jb_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`jb_id`, `cl_id`, `jb_titre`, `jb_description`, `jb_photo`, `jb_pays`, `jb_ville`, `jb_type`, `jb_categorie`, `jb_duree`, `jb_niveau`, `jb_date`) VALUES
(1, 1, 'job 1', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'job-default.jpg', '', '', 'sans_diplome', '0', '', '', '2020-07-21'),
(2, 1, 'job 2', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'garagiste.jpg', '', '', 'sans_diplome', '0', '', '', '2020-07-21'),
(3, 1, 'job 3', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'taximan.jpg', 'Côte d\'Ivoire', 'Abidjan, Yopougon', 'sans_diplome', 'Taxi', 'CDI', 'Pas bésoin de diplôme', '2020-07-21'),
(4, 1, 'job 4', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'couturier.jpg', '', '', 'sans_diplome', '0', '', '', '2020-07-21'),
(5, 1, 'job 5', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'taximan.jpg', '', '', 'sans_diplome', '0', '', '', '2020-07-21'),
(6, 1, 'job 6', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'job-default.jpg', '', '', 'sans_diplome', '0', '', '', '2020-07-21'),
(7, 1, 'job 7', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'garagiste.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(8, 1, 'job 7', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'couturier.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(9, 1, 'job 8', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'job-default.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(10, 1, 'job 9', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'taximan.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(11, 1, 'job 10', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'job-default.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(12, 1, 'job 11', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'job-default.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21'),
(13, 1, 'job 12', 'Offrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.\r\nOffrir la possibilité à tous ceux qui du travail d\'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu\'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.', 'garagiste.jpg', '', '', 'avec_diplome', '0', '', '', '2020-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `ms_id` int(11) NOT NULL,
  `ms_sujet` varchar(60) NOT NULL,
  `ms_message` text NOT NULL,
  `ms_auteur_mail` varchar(60) NOT NULL,
  `ms_lu` tinyint(1) NOT NULL DEFAULT '0',
  `ms_auteur_ip` varchar(15) NOT NULL,
  `ms_ip_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `ms_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`ms_id`, `ms_sujet`, `ms_message`, `ms_auteur_mail`, `ms_lu`, `ms_auteur_ip`, `ms_ip_blocked`, `ms_date`) VALUES
(1, 'VUfhsfbeuhfzu', 'VUfhsfbeuhfzu VUfhsfbeuhfzu', 'VUfhsfbeuhfzu', 0, '::1', 0, '2020-07-22'),
(2, 'VUfhsfbeuhfzu', 'VUfhsfbeuhfzu df VUfhsfbeuhfzu VUfhsfbeuhfzu<br />\r\nVUfhsfbeuhfzu VUfhsfbeuhfzu<br />\r\nVUfhsfbeuhfzu', 'jhVUfhsfbeuhfzu', 0, '::1', 0, '2020-07-22');

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

CREATE TABLE `postuler` (
  `po_id` int(11) NOT NULL,
  `jb_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `po_nom` varchar(20) NOT NULL,
  `po_telephone` varchar(20) NOT NULL,
  `po_mail` varchar(60) DEFAULT NULL,
  `po_diplome` varchar(15) NOT NULL,
  `po_niveau` varchar(50) DEFAULT NULL,
  `po_cv` varchar(20) DEFAULT NULL,
  `po_description` tinytext NOT NULL,
  `po_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`po_id`, `jb_id`, `cl_id`, `po_nom`, `po_telephone`, `po_mail`, `po_diplome`, `po_niveau`, `po_cv`, `po_description`, `po_date`) VALUES
(1, 3, 1, 'client', '5054578', '', 'sans_diplome', '', '1595724511.', '', '2020-07-26'),
(2, 2, 1, 'client', '05054578', '', 'avec_diplome', 'fef erze ze', NULL, 'dfer&quot;zffef', '2020-07-26'),
(3, 4, 1, 'client', '22505054578', '', 'avec_diplome', '', NULL, '', '2020-07-26'),
(4, 3, 1, 'client', '05054578', '', 'avec_diplome', '', '', '', '2020-07-26'),
(5, 2, 1, 'client 1', '05054578', 'feeesfe@df', 'sans_diplome', '', NULL, '', '2020-07-26'),
(6, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '', '', '2020-07-26'),
(7, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '', '', '2020-07-26'),
(8, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '', '', '2020-07-26'),
(9, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '1595726056.pdf', '', '2020-07-26'),
(10, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '1595726072.pdf', '', '2020-07-26'),
(11, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '1595726113.pdf', '', '2020-07-26'),
(12, 2, 1, 'client ', '05054578', '', 'avec_diplome', '', '1595726113.pdf', '', '2020-07-26'),
(13, 2, 1, 'client ', '05054578', '', 'avec_diplome', 'fefze ezf', '1595726169.pdf', 'fzr ezrer zerf<br />\r\nzfzef zefze', '2020-07-26'),
(14, 2, 1, 'client', '05054578', '', 'avec_diplome', 'fefefzfzfefez', '1595726392.docx', 'ef efe fzef<br />\r\nezfe zefzefzefze<br />\r\nfzefzefzefz<br />\r\nfzefzefefefe<br />\r\nefefzef eezfeffefe', '2020-07-26'),
(15, 9, 1, 'client gf', '05054578', '', 'sans_diplome', '', NULL, '', '2020-07-26'),
(16, 9, 1, 'client gf', '05054578', '', 'sans_diplome', '', NULL, '', '2020-07-26'),
(17, 1, 1, 'client ', '05054578', '', 'sans_diplome', '', NULL, '', '2020-07-26');

-- --------------------------------------------------------

--
-- Structure de la table `review_comments`
--

CREATE TABLE `review_comments` (
  `rc_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `rc_name` varchar(20) NOT NULL,
  `rc_IP` varchar(20) NOT NULL,
  `rc_comment` tinytext NOT NULL,
  `rc_status` tinyint(1) NOT NULL DEFAULT '1',
  `rc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `review_comments`
--

INSERT INTO `review_comments` (`rc_id`, `cl_id`, `rc_name`, `rc_IP`, `rc_comment`, `rc_status`, `rc_date`) VALUES
(1, 0, 'Jean', ':1', 'Ce site est vraiment génial, je suis devenu mécanicien grâce à ça. J\'ai vu le job, j\'ai contacté la personne, et il m\'a embauché facilement comme ça.', 1, '2020-07-22'),
(2, 0, 'Marcus', ':1', 'Moi j\'ai pas de diplôme, mais j\'ai trouvé un job sur ce site. Pas bésoin d\'avoir des diplomes. Si vous savez faire quelque chose, je vous encourage ce site les amis.', 1, '2020-07-22'),
(3, 0, 'Antoine', ':11', 'J\'ai eu un BTS mais je trouvais pas du boulot. Il m\'a juste suffis de venir voir sur le site, et en 3 jours, j\'ai trouvé un job, un vrai job. Actuellement j\'ai mon salaire, tranquille quoi.', 1, '2020-07-22'),
(4, 0, 'Jean', ':1', 'Ce site est vraiment génial, je suis devenu mécanicien grâce à ça. J\'ai vu le job, j\'ai contacté la personne, et il m\'a embauché facilement comme ça.', 1, '2020-07-22'),
(5, 0, 'Cathérine', ':1', 'Je cherchais quelqu\'un pour conduire mon taxi et je trouvais pas. C\'est sur ce site web que j\'ai pu trouvé quelqu\'un de confiance. J\'ai trouvé quelqu\'un ici aussi pour tenir ma boutique.', 1, '2020-07-22'),
(6, 0, 'Rachelle', ':2', 'J\'avais un diplôme depuis longtemps mais je trouvais pas du travail. Et quand j\'an entendu parler de ce site, je croyais que c\'était faux. Mais quand je pris mon phone pour venir desssus, j\'ai pu trouver un job. Je suis comptable à la SIB maintenant. Trop', 1, '2020-07-22'),
(7, 0, 'Digbé', ':5', 'Moi je cherchais une femme de ménage, mais c\'était pas facile de trouver la bonne femme. Mais quand je suis venu chercher sur ce site, j\'ai très vite trouvé une. C\'est ici aussi que j\'ai trouvé quelqu\'un pour promener mon chien.', 1, '2020-07-22'),
(8, 0, 'Antoine', ':11', 'J\'ai eu un BTS mais je trouvais pas du boulot. Il m\'a juste suffis de venir voir sur le site, et en 3 jours, j\'ai trouvé un job, un vrai job. Actuellement j\'ai mon salaire, tranquille quoi.', 1, '2020-07-22'),
(9, 0, 'Marcus', ':11', 'Moi j\'ai pas de diplôme, mais j\'ai trouvé un job sur ce site. Pas bésoin d\'avoir des diplomes. Si vous savez faire quelque chose, je vous encourage ce site les amis.', 1, '2020-07-22');

-- --------------------------------------------------------

--
-- Structure de la table `views`
--

CREATE TABLE `views` (
  `vw_id` int(11) NOT NULL,
  `vw_element` varchar(20) NOT NULL,
  `vw_elt_id` int(11) NOT NULL,
  `vw_viewer_name` varchar(20) NOT NULL,
  `vw_active` tinyint(1) NOT NULL DEFAULT '1',
  `vw_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `views`
--

INSERT INTO `views` (`vw_id`, `vw_element`, `vw_elt_id`, `vw_viewer_name`, `vw_active`, `vw_date`) VALUES
(1, 'profile (cv)', 1, 'Africa Jobs', 1, '2020-07-26'),
(2, 'offre d\'emploi', 1, 'Africa Jobs', 1, '2020-07-26'),
(3, 'offre d\'emploi', 1, 'Africa Jobs', 1, '2020-07-26');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `vi_id` int(11) NOT NULL,
  `vi_ip` varchar(15) NOT NULL,
  `vi_timestamp` int(11) NOT NULL,
  `vi_mois` tinyint(4) NOT NULL,
  `vi_nbr_mois` tinyint(4) NOT NULL DEFAULT '1',
  `vi_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`en_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jb_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ms_id`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`po_id`);

--
-- Index pour la table `review_comments`
--
ALTER TABLE `review_comments`
  ADD PRIMARY KEY (`rc_id`);

--
-- Index pour la table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`vw_id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`vi_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `postuler`
--
ALTER TABLE `postuler`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `review_comments`
--
ALTER TABLE `review_comments`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `views`
--
ALTER TABLE `views`
  MODIFY `vw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `vi_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
