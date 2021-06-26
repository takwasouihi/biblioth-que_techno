-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 mai 2021 à 02:26
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id_animal` int(30) NOT NULL AUTO_INCREMENT,
  `type_animal` varchar(30) NOT NULL,
  PRIMARY KEY (`id_animal`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id_animal`, `type_animal`) VALUES
(39, 'Saison');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(26, 'Roman historique'),
(25, ' Roman'),
(23, 'fiction'),
(24, 'Drame'),
(27, 'Thriller'),
(28, 'Roman Ã  Ã©nigme'),
(29, 'bibliographie');

-- --------------------------------------------------------

--
-- Structure de la table `cathegorie`
--

DROP TABLE IF EXISTS `cathegorie`;
CREATE TABLE IF NOT EXISTS `cathegorie` (
  `id_cath` int(30) NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) NOT NULL,
  `type_animal` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cath`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cathegorie`
--

INSERT INTO `cathegorie` (`id_cath`, `designation`, `type_animal`) VALUES
(35, 'Raison', 'lion'),
(36, 'Roman', 'actualité');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `sujet` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `idforum` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idc`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idc`, `comment`, `sujet`, `email`, `idforum`, `date`) VALUES
(17, 'salut', 'mahdi ben omrane', 'nathebenmami567@gmail.com', 53, '2021-05-08 03:05:57'),
(18, 'azertyuio', 'Ali', 'ahmed.benmami@esprit.tn', 53, '2021-05-08 03:06:15'),
(22, 'zeazer', 'mahdi ben omrane', 'sqdqjfoi@gmail.com', 61, '2021-05-10 23:08:26'),
(20, 'salut', 'Ali', 'sqdqjfoi@gmail.com', 55, '2021-05-08 03:53:14');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `Id` varchar(10) NOT NULL,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tel` bigint(11) NOT NULL,
  `naiss` date NOT NULL,
  `classe` enum('1','2','3','4','5') NOT NULL,
  `sexe` enum('femme','homme','autre') NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `pic` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`Id`, `Nom`, `Prenom`, `Email`, `tel`, `naiss`, `classe`, `sexe`, `mdp`, `pic`) VALUES
('191JFT4357', 'Ayari', 'Abir', 'abir.ayari@esprit.tn', 55622768, '1999-03-08', '2', 'autre', '191JFT4357', 'pp.jpg'),
('191JMT4534', 'Boussema', 'Ahmed', 'ahmed.boussema@esprit.tn', 25841200, '2000-07-15', '1', 'homme', '123', '123530920_987689491731617_3429270153394338395_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dateS` date NOT NULL,
  `endroit` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`ID`, `reference`, `titre`, `dateS`, `endroit`, `description`, `stock`, `image`, `prix`, `note`) VALUES
(24, ' 04', 'READING', '2021-05-15', ' Biblio', '  READING DAY', 40, '8.jpg', 13, NULL),
(32, ' 66', 'SUMMERBOOK', '2021-05-01', ' ESPRIT', 'SUMMER FESTIVAL', 120, '13.jpg', 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `idForum` int(11) NOT NULL AUTO_INCREMENT,
  `nomForum` varchar(60) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `typpe` varchar(60) NOT NULL,
  PRIMARY KEY (`idForum`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`idForum`, `nomForum`, `contenu`, `date_creation`, `typpe`) VALUES
(44, 'Ali', 'Salut Salut', '2021-05-06 15:43:24', 'Autres'),
(46, 'test', 'sjdfosfd', '2021-05-06 15:47:30', 'Autres'),
(47, 'dzfesq', 'abc', '2021-05-06 21:49:18', 'Autres'),
(62, 'Salutj', 'Sabrine', '2021-05-11 00:35:18', 'Livres'),
(52, 'Said', 'Said', '2021-05-08 02:51:08', 'Livres'),
(53, 'Ali', 'salut', '2021-05-08 02:52:01', 'Examens'),
(54, 'Ali', 'Yacine', '2021-05-08 02:53:36', 'Examens'),
(55, 'AZERTYUIOP', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisÃ©e Ã  titre provisoire pour calibrer une mise en page, le texte dÃ©finitif venant remplacer le faux-texte dÃ¨s qu\'il est prÃªt ou que la mise en page est achevÃ©e. GÃ©nÃ©ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum', '2021-05-08 03:48:50', 'Examens'),
(59, 'Ali', 'Yacine', '2021-05-08 23:58:10', 'Livres');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dateS` date NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`ID`, `reference`, `titre`, `dateS`, `nomAuteur`, `categorie`, `description`, `stock`, `image`, `prix`, `note`) VALUES
(3, '  Rf2554', '  Le pelerin  ', '2021-04-06', '  Paulo Coelho', ' Roman', ' Santiago, un jeune berger andalou, part Ã  la recherche d\'un trÃ©sor enfoui au pied des Pyramides.\r\n\r\nLorsqu\'il rencontre l\'Alchimiste dans le dÃ©sert, celui-ci lui apprend Ã  Ã©couter son cÅ“ur, Ã  lire les signes du destin et, par-dessus tout, Ã  aller au bout de son rÃªve.', 10, '1.jpg', 25, NULL),
(5, 'Rf4522', 'Le Zahir', '2021-04-01', 'Paulo Coelho', 'fiction', ' Un Ã©crivain cÃ©lÃ¨bre remet en cause tous les principes qui ont gouvernÃ© sa vie lorsque sa femme disparaÃ®t sans laisser de traces. Au fil dâ€™un pÃ©riple qui le conduira de Paris jusquâ€™en Asie centrale, il traverse la steppe, son dÃ©sert, sa magie et ses lÃ©gendes pour retrouver celle qui donne plus que jamais un sens Ã  sa vie. ', 50, '4.jpg', 40, 5),
(6, 'Rf6548', 'Le PÃ¨lerin de Compostelle', '2021-04-21', 'Paulo Coelho', 'Drame', ' A cette Ã©poque, ma quÃªte spirituelle Ã©tait liÃ©e Ã  lâ€™idÃ©e quâ€™il existait des secrets, des chemins mystÃ©rieuxâ€¦ Je croyais que ce qui est difficile et compliquÃ© mÃ¨ne toujours Ã  la comprÃ©hension du mystÃ¨re et de la vieâ€¦ ', 5, '8.jpg', 40, 0),
(7, 'Rf8754', 'Brida', '2021-04-04', 'Paulo Coelho', 'Thriller', ' Brida, une jeune Irlandaise Ã  la recherche de la Connaissance, s\'intÃ©resse depuis toujours aux diffÃ©rents aspects de la magie, mais elle aspire Ã  quelque chose de plus. Sa quÃªte l\'amÃ¨ne Ã  rencontrer des personnes d\'une grande sagesse, qui lui font dÃ©couvrir le monde spirituel ', 2, '3.jpg', 80, 5),
(8, 'Rf9586', 'AdultÃ¨re', '2021-04-21', 'Paulo Coelho', 'Roman Ã  Ã©nigme', ' Linda a 31 ans et, aux yeux de tous, une vie parfaite : elle a un mari aimant, des enfants bien Ã©levÃ©s, un mÃ©tier gratifiant de journaliste et habite dans une magnifique propriÃ©tÃ© Ã  GenÃ¨ve', 40, '9.jpg', 20, NULL),
(9, 'Rf12522', 'Aleph', '2021-04-20', 'Paulo Coelho', 'fiction', ' DÃ©cider. Changer. Se rÃ©inventer. Agir. ExpÃ©rimenter. RÃ©ussir. Oser. RÃªver. Gagner. DÃ©couvrir. Exiger. S\'engager.\r\nPenser. Croire. Grandir. Appartenir. S\'Ã©veiller.', 4, '6.jpg', 40, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_livre` int(11) NOT NULL,
  `id_client` varchar(200) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_livre` (`id_livre`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`ID`, `id_livre`, `id_client`, `note`) VALUES
(51, 7, '191JFT4357', 5),
(52, 5, 'DESKTOP-6320O01', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

DROP TABLE IF EXISTS `ouvrages`;
CREATE TABLE IF NOT EXISTS `ouvrages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `name`) VALUES
(32, 'Croix Rouge'),
(26, 'Roman historique'),
(25, ' Roman'),
(23, 'fiction'),
(24, 'Drame'),
(27, 'Thriller'),
(28, 'Roman Ã  Ã©nigme'),
(29, 'bibliographie'),
(33, 'Rush william');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `Idparticipant` int(200) NOT NULL AUTO_INCREMENT,
  `Idevenement` int(200) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`Idparticipant`)
) ENGINE=MyISAM AUTO_INCREMENT=25841201 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`Idparticipant`, `Idevenement`, `nom`, `prenom`, `email`) VALUES
(555, 3556, 'Bous', 'Ahmed', 'ahmed.boussema@esprit.tn'),
(25841200, 6669999, 'Ayari', 'Abir', 'ahmed.boussema@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `Sujet` enum('Produit','Site','Service') NOT NULL,
  `Idr` int(11) NOT NULL AUTO_INCREMENT,
  `Id` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`Idr`),
  KEY `rec_fk` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`Sujet`, `Idr`, `Id`, `comment`, `status`) VALUES
('Produit', 24, '191JFT4357', 'qq', 0),
('Service', 25, '191JFT4357', 'aaaaa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `revues`
--

DROP TABLE IF EXISTS `revues`;
CREATE TABLE IF NOT EXISTS `revues` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dateS` date NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `revues`
--

INSERT INTO `revues` (`ID`, `reference`, `titre`, `dateS`, `nomAuteur`, `categorie`, `description`, `stock`, `image`, `prix`, `note`) VALUES
(5, 'AQZWERTY18', 'Science de la vie', '2021-04-01', 'Rush ', 'fiction', 'Sur le plan matériel, un livre est un volume de pages reliées, présentant un ou des textes sous une page de titre commune. Sa forme induit une organisation linéaire (pagination, chapitres, etc.). ', 50, '1.JPG', 40, 5),
(3, 'Candi97', 'Fusion', '2021-04-06', 'William', ' Roman', ' Un livre comporte généralement des outils favorisant l\'accès à son contenu : table des matières, sommaire, index. Il existe une grande variété de livres selon le genre, les destinataires, ainsi que selon le mode de fabrication et les formats, ou selon les usages.', 10, '2.JPG', 25, 20),
(4, 'azerty237', 'Hacking', '2021-04-28', 'Christian', 'Roman historique', ' Sauf exception, tel le livre d\'artiste, un livre est publié en plusieurs exemplaires par un éditeur, comme en témoignent les éléments d\'identification qu\'il comporte obligatoirement.', 0, '3.JPG', 50, 10),
(6, 'qwerty98', 'Univers Paralleles', '2021-04-21', 'Daumier', 'Drame', 'Œuvre de l\'esprit conçue par un auteur, le livre sert d\'interface avec un lecteur. Objet culturel lié à l\'histoire humaine, il permet de transmettre du sens selon une forme matérielle particulière au-delà de l\'espace et du temps. Pour le lecteur, « un livre est une extension de la mémoire et de l\'imagination ', 5, '4.JPG', 40, 0),
(7, 'mazerati19', 'Univers Caché', '2021-04-04', 'Alias', 'honoure', 'Le livre est défini par Littré comme une « réunion de plusieurs feuilles servant de support à un texte manuscrit ou imprimé ». Dans son Nouveau Dictionnaire universel (édition de 1870), Maurice Lachâtre ', 2, '5.JPG', 80, 5),
(8, 'Rf9586', 'Prendre le controle', '2021-04-21', 'Franck', 'Magazine piratage', ' Linda a 31 ans et, aux yeux de tous, une vie parfaite : elle a un mari aimant, des enfants bien Ã©levÃ©s, un mÃ©tier gratifiant de journaliste et habite dans une magnifique propriÃ©tÃ© Ã  GenÃ¨ve', 40, '6.JPG', 20, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `rec_fk` FOREIGN KEY (`Id`) REFERENCES `etudiants` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
