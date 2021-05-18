-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 mai 2021 à 18:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `proj`
--

-- --------------------------------------------------------

--
-- Structure de la table `billeterie`
--

DROP TABLE IF EXISTS `billeterie`;
CREATE TABLE IF NOT EXISTS `billeterie` (
  `id_billet` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `cni` varchar(150) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id_billet`),
  KEY `FK_workshop_event` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billeterie`
--

INSERT INTO `billeterie` (`id_billet`, `email`, `cni`, `nombre`, `id_evenement`) VALUES
(1, 'ademboukhris09@gmail.com', '93156', 3, 3),
(2, 'ademboukhris09@gmail.com', '69453', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `citation` varchar(300) NOT NULL,
  `image` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_blog`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `titre`, `citation`, `image`, `date`, `id_utilisateur`) VALUES
(9, 'njhuiehu', 'kkkkkkkkkkk kkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkk kkkkkkkkkk kkkkkkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkkkk', 'apple.png', '2021-05-08', 6),
(10, 'hoyhoy', 'azeaz', 'album2.jpg', '2021-05-17', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `materiel` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `materiel`, `quantite`, `date`, `id_utilisateur`) VALUES
(3, 'llll', 15, '2021-05-28', 6),
(2, 'pppp', 100, '2021-05-15', 6),
(5, 'Assiette', 3, '2021-05-18', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  `produit` varchar(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fkey` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(15) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `titre`, `description`, `date_debut`, `date_fin`, `image`, `id_utilisateur`) VALUES
(2, 'ppp', 'aafeafea', '2021-05-19', '2021-05-20', 'pepper.png', 6),
(3, 'jjjfez', 'fezfez', '2021-05-18', '2021-05-20', 'our-story-1.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_review` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nb_likes` int(11) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `FK_likes_review` (`id_review`),
  KEY `FK_likes_user` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_like`, `id_review`, `id_utilisateur`, `nb_likes`) VALUES
(1, 11, 3, 0),
(2, 12, 3, 0),
(3, 13, 3, 3),
(4, 14, 3, 3),
(8, 18, 3, 6),
(9, 11, 3, 0),
(10, 12, 3, 0),
(11, 19, 3, 16),
(12, 20, 3, 8),
(13, 21, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `id_materiel` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_materiel`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`id_materiel`, `nom`, `description`, `image`, `prix`, `id_utilisateur`) VALUES
(2, 'bbbbbb', 'ooo', 'menu-group-4.jpg', 9, 6),
(4, 'feafr', 'fea', 'icecream.png', 7, 6),
(3, 'a', 'fae', 'cereal.png', 3, 6),
(5, 'Assiette', 'AZEazea', 'materiel3.jpg', 20, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `nb_calories` int(11) NOT NULL,
  `poids` float NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(150) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `nom` (`nom`),
  KEY `FK_prod` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom`, `nb_calories`, `poids`, `description`, `image`, `id_utilisateur`) VALUES
(58, 'llkkkk', 1, 1, 'grzgrzgrgpp ppppp ppppppp', 'donut.png', 6),
(77, 'ananas', 75, 100, 'Fruit exotique, lâ€™ananas a longtemps Ã©tÃ© considÃ©rÃ© comme un bien rare et prÃ©cieux.', 'ananas.png', 1),
(79, 'pomme', 2, 2, 'feanuifheayifgeyagfeyaugfuye fenauifheayihfeiuafhieah febhaifbeiafeyaifeu fenafeafea', 'apple.png', 1),
(80, 'cereal', 250, 100, 'une plante cultivÃ©e principalement pour ses graines utilisÃ©es pour l\'alimentation humaine et animale.', 'cereal.png', 1),
(81, 'chocolat', 200, 100, 'un aliment plus ou moins sucrÃ© produit Ã  partir de la fÃ¨ve de cacao.', 'chocolat.png', 1),
(83, 'cookie', 240, 100, 'Le biscuit est un petit gÃ¢teau sec cuit au four en forme de galette de farine peu levÃ©e, de sucre, de matiÃ¨res grasses et d\'Å“ufs.', 'cookie.png', 1),
(84, 'donut', 350, 100, 'un mets sucrÃ© ou salÃ© fait d\'une pÃ¢te assez fluide, frit dans lhuile..couvert d\'une couche de chocolat ou de noix', 'donut.png', 1),
(85, 'fraise', 60, 100, 'Peu caloriques,elles redonnent des couleurs Ã  nos assiettes et nous apportent une dose de vitamines et dâ€™antioxydants.', 'fraise.png', 1),
(86, 'glace', 380, 100, 'un entremets congelÃ©, voire surgelÃ©, Ã©laborÃ© Ã  partir de la crÃ¨me, elle-mÃªme faite Ã  partir de lait, de sucre, de fruits et d\'arÃ´mes', 'icecream.png', 1),
(87, 'nutella', 400, 100, 'une marque de pÃ¢te Ã  tartiner,Elle est composÃ©e de sucre, d\'huile de palme, de noisettes, de cacao et de lait.', 'nutella.png', 1),
(88, 'oreo', 210, 100, 'une marque dÃ©posÃ©e d\'un biscuit en sandwich, se compose d\'une garniture blanche , coincÃ©e entre deux biscuits', 'oreo.png', 1),
(89, 'piment', 80, 100, ' il sâ€™intÃ¨gre facilement dans toutes les recettes gorgÃ©es de soleil,Peu calorique, il est apprÃ©ciÃ© pour ses vitamines.', 'pepper.png', 1),
(91, 'slouma', 4, 3, 'grzgrz', 'icecream.png', 1),
(93, 'ziedi', 3, 3, 'grzgrz', 'icecream.png', 1),
(95, 'zjjj', 3, 3, 'grzgrz', 'icecream.png', 1),
(96, 'zooo', 3, 3, 'grzgrz', 'icecream.png', 2),
(98, 'zpppp', 3, 3, 'grzgrz', 'icecream.png', 3),
(99, 'sllll', 2, 2, 'hefyzhfeyhfef feuafheiuafhuie jffeiaojfeoiajfieo fejiafje', 'nutella.png', 1),
(100, 'jjjjj', 2, 2, 'jjjjjjjjj fezgrzgr grzgrzgrz rgzgrzgrzgr rgzgrzgrzg', 'oreo.png', 7),
(101, 'iiiiop', 20, 20, 'iiiiiiiiiiiii nrnizjgizurjg grjizogjrziog rgzoughzrog', 'donut.png', 8),
(102, 'chikolara', 4, 4, 'aaaaaaaa aaaaaaaa aaaaaaaaaa aaaaaaaaa', 'cereal.png', 6),
(104, 'jjjjjjiiiiip', 2, 3, 'kokokok', 'tomato.png', 6),
(105, 'mmmm', 2, 2, 'mmmmmmmmmm', 'apple.png', 1),
(106, 'kkkkazaza', 5, 11, 'mmmmmm', 'cake.png', 1),
(108, 'Qsssdf', 3, 3, 'feafeafebabyfe', 'donut.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id_recette` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  `ingredients` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_recette`),
  UNIQUE KEY `nom` (`nom`),
  KEY `FK_recette_prod` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recette`, `nom`, `ingredients`, `description`, `specialite`, `image`, `id_produit`) VALUES
(30, 'Crepe', 'Farine', 'azeaz', 'Franacise', 'recette10.jpg', 58),
(31, 'Cake', 'chocolat', 'azeaz', 'aeazeza', 'recette2.jpg', 58),
(32, 'gaaaaatt', 'frzfezf', 'fezfez', 'gttttt', 'donut.png', 96),
(35, 'ffefefefe', 'bgbgbgbgb', 'bgbgbgbg', 'bgbgbgbgb', 'cake.png', 58);

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `id_reclamation` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `citation` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_reclamation`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`id_reclamation`, `titre`, `citation`, `date`, `id_utilisateur`) VALUES
(7, 'nnnnn', 'eeeeee', '2021-05-23', 1),
(8, 'kkkk', 'ooooo', '2021-05-07', 1),
(9, 'jjjjjj', 'llllll', '2021-05-13', 1),
(10, 'f', 'yuguyg', '2021-05-12', 1),
(11, 'Reclam', 'azdlm', '2021-05-18', 3);

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id_restaurant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `score` int(11) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `localisation` varchar(500) NOT NULL,
  `num_tel` bigint(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_restaurant`),
  UNIQUE KEY `nom` (`nom`),
  KEY `FK_resto_utilsateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`id_restaurant`, `nom`, `description`, `score`, `specialite`, `localisation`, `num_tel`, `image`, `id_utilisateur`) VALUES
(6, 'Ayo', 'azeazea', 4, 'turkish', 'azeazeza', 96456789, 'resto3.jpg', 3),
(10, 'Rue36', 'Not bad', 3, 'Fast food', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6795061.004597433!2d9.560415097160352!3d33.737379101123786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e503b140348cd%3A0x2ea02e87e90a6f15!2sLe%20Parisien!5e0!3m2!1sfr!2stn!4v1621275044096!5m2!1sfr!2stn\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 51423121, 'resto6.jpg', 3),
(12, 'Parisien', 'akazdazk', 4, 'Turkish', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.300431677133!2d10.30319531557171!3d36.73935917882109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd490a78e3d161%3A0x70fe5934e9310c62!2sPizza%20Chrono!5e0!3m2!1sfr!2stn!4v1621088656116!5m2!1sfr!2stn\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 91456321, 'resto1.jpg', 3),
(15, 'Abc', 'azeazea', 4, 'azdas', 'azeazea', 96456789, 'resto6.jpg', 3),
(16, 'Chrono', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 4, 'fast food', 'azeae', 93652513, 'resto5.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  `description` varchar(300) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `FK_reviews_rest` (`id_restaurant`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_review`, `nom`, `description`, `score`, `date`, `id_restaurant`, `id_utilisateur`) VALUES
(4, 'Crrre', 'ruziug', 3, '2021-05-11', 6, 1),
(11, 'Test123', 'eazeazea', 4, '2021-05-16', 6, 3),
(12, 'Test123', 'eazeazea', 4, '2021-05-16', 6, 3),
(13, 'Haozael', 'azelazek', 4, '2021-05-16', 6, 3),
(14, 'Kaput', 'azemÃ¹azem', 3, '2021-05-16', 6, 3),
(18, 'Rue36', 'abc', 5, '2021-05-17', 10, 3),
(19, 'Alds', 'lazldazmdam', 4, '2021-05-18', 12, 3),
(20, 'Adzl', 'azeazeazeaez', 3, '2021-05-17', 12, 3),
(21, 'Olds', 'azdadamdazl', 1, '2021-05-17', 12, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `prenom_utilisateur` varchar(30) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `numero_tel` bigint(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `password`, `email`, `prenom_utilisateur`, `code_postal`, `pays`, `numero_tel`, `type`) VALUES
(1, 'hamma', '213', 'azdazd', 'lolo', 1203, 'tunisie', 69658, 'admin'),
(2, 'aaaa', 'feauhi', 'ademboukhris09@gmail', 'aaa', 2, 'jj', 2, 'admin'),
(3, 'da', 'fea', 'ademboukhris09@gmail.com', 'fea', 456, 'fea', 2, 'fea'),
(5, 'ziadi', 'efeaf', 'grz@gmail.com', 'feafea', 2, 'grzgrz', 2, 'grz'),
(6, 'immm', 'feafe', 'ademboukhris09@gmail.com', 'feafea', 2, 'grzgrz', 556, 'grzgr'),
(7, 'fefrttt', 'dza', 'grz@gmail.com', 'fea', 189, 'fea', 189, 'fea'),
(8, 'hhhh', 'hhhkk', 'oukhris09@gmail.com', 'hhhhh', 4, 'jbbj', 48648, 'feafea'),
(9, 'Khhh', 'feafea', 'ademboukhris09@gmail.com', 'feafea', 1, 'fea', 2, 'geage'),
(10, 'Ljjj', 'ppp', 'ademboukhris09@gmail.com', 'feafea', 1, 'fea', 2, 'geage'),
(11, 'abcd', 'efg', 'ademboukhris09@gmail.com', 'mlk', 5, 'aert', 9568, 'ploi');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billeterie`
--
ALTER TABLE `billeterie`
  ADD CONSTRAINT `FK_workshop_event` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `cle` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_likes_review` FOREIGN KEY (`id_review`) REFERENCES `reviews` (`id_review`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_likes_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_prod` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `FK_recette_prod` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `reclamations_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `FK_resto_utilsateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_rest` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurants` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
