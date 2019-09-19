-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Septembre 2019 à 13:31
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Finesse`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_c` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_p` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_m` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_m`, `message`, `reason`, `id_u`) VALUES
(1, 'J\'aimerai cristiano ronaldo sur une peinture', 'Demande particulière', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_o` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_p` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_p`, `title`, `description`, `price`, `image`) VALUES
(27, 'Textures VERT', 'Experimentations, recherche de nouvelles textures x effets de matiere. Réalisé avec de la paraffine coulée sur papier. Peinture acrylique', '20.00', '/../uploads/1568642535.jpeg'),
(28, 'Textures ROUGE', 'Experimentations, recherche de nouvelles textures x effets de matiere. Réalisé avec de la paraffine coulée sur papier. Peinture acrylique', '20.00', '/../uploads/1568642582.jpeg'),
(29, 'Textures ORANGE', 'Experimentations, recherche de nouvelles textures x effets de matiere. Réalisé avec de la paraffine coulée sur papier. Peinture acrylique', '20.00', '/../uploads/1568642602.jpeg'),
(30, 'Textures BLEU', 'Experimentations, recherche de nouvelles textures x effets de matiere. Réalisé avec de la paraffine coulée sur papier. Peinture acrylique', '20.00', '/../uploads/1568642640.jpeg'),
(31, 'COLORS INTERACTIONS', 'Recherches sur les interactions de couleurs, en restant sur une répétition de motif simples et répétitifs.', '49.99', '/../uploads/1568643784.jpg'),
(32, 'Installations avec lumières calques et peintures', 'Installations réalisée en s\'appuyant sur COLORS INTERACTIONS. Jeu avec les lumières, les transparences, les effets de matière etc. Recherche de l\'hypnotisant', '49.99', '/../uploads/1568644024.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `zipCode` int(5) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `superuser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `pseudo`, `name`, `firstname`, `birthDate`, `password`, `zipCode`, `city`, `number`, `street`, `mail`, `superuser`) VALUES
(1, 'Administrateur', 'Siddique', 'Belal', NULL, '$2y$10$JV4Nn8iBOAuEeheaiQmfquVpEBI2Mh/hPklo/qpzVgrBq01tK/ZDK', 80000, 'Amiens', NULL, 'carnot', 'Belal@live.fr', 1),
(2, 'Inscription', NULL, NULL, NULL, '$2y$10$mn.rrxxxYjhTggLQ9hGXPemu26INy76GTXzriWreflb4.CTrrojl.', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(3, 'Inscription', NULL, NULL, NULL, '$2y$10$ygXL4AeJ3hAoU6f/3iK6P.aWBuoz7whbMOUpkd0Up0rLq7yoZCvlS', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(4, 'Inscription', NULL, NULL, NULL, '$2y$10$YDiwg/q6nd6UldFRkMHlme7iGbN1jKamHVynDO5I1x5iNIft4VD.q', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(5, 'Inscription', NULL, NULL, NULL, '$2y$10$ofqEe9uq3h8CPCzexYTG1.pRN.6HZ.FLOg4AKDotISgg5q3v0akVa', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(6, 'Inscription', NULL, NULL, NULL, '$2y$10$x6al5kpU4vU2HshXOfKOMuH5UW1oPqfLCAnVlm3xDDsAqGT2/LA0q', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(7, 'Inscription', NULL, NULL, NULL, '$2y$10$NnSID9AyCuD8/37eCP7h8OE/SMBFDZrfGw6GKA1/njhMAcIYdDE7i', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(8, 'Inscription', NULL, NULL, NULL, '$2y$10$SnveeJ0j20MYivNctAJ6H.SRtgHfrtB7N4yjxYq4pRkDJt.eEt1S6', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(9, 'Inscription', NULL, NULL, NULL, '$2y$10$qOk1CEUiAwFOs9XMfomyYeKHPsqX9fTJJ8Qy9/TtbPkq.20Y7gOMu', NULL, NULL, NULL, NULL, 'Inscription@live.fr', 0),
(10, 'Beloule', NULL, NULL, NULL, '$2y$10$4M2m91O7feXMuZe1g/fXBe9cVHWwInK4yaYtcSVdvv75KvHFWDZRC', NULL, NULL, NULL, NULL, '05050505@live.fr', 0),
(11, 'Beloule', NULL, NULL, NULL, '$2y$10$MvJ2qpqjT9DfKtL6MCrVeegeadjkgwLUJcOhiuj5Lk8.xF0EcDRjG', NULL, NULL, NULL, NULL, '05050505@live.fr', 0),
(12, 'Pierre', NULL, NULL, NULL, '$2y$10$YQx.Vk6e5PTaRjurVSmCX.6HiWGzew2qo3cwmfspDrTtQW8oJu7JO', NULL, NULL, NULL, NULL, 'okok@live.fr', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `comment_product_FK` (`id_p`),
  ADD KEY `comment_users0_FK` (`id_u`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `message_users_FK` (`id_u`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_o`),
  ADD UNIQUE KEY `orders_product_AK` (`id_p`),
  ADD KEY `orders_users_FK` (`id_u`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_product_FK` FOREIGN KEY (`id_p`) REFERENCES `product` (`id_p`),
  ADD CONSTRAINT `comment_users0_FK` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_users_FK` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product0_FK` FOREIGN KEY (`id_p`) REFERENCES `product` (`id_p`),
  ADD CONSTRAINT `orders_users_FK` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
