-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 20 juin 2021 à 17:20
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img`) VALUES
(1, 'Actus', 'Découvrez les dernières actus du monde de l\'électrique !', '1623167134.jpeg'),
(2, 'Sport Auto', 'Les actus de la compétition automobile électrique !', '1623168864.jpeg'),
(3, 'Essais', 'Retrouvez les derniers essais de nos pilotes journalistes !', '1623169082.jpeg'),
(4, 'Conseils', 'Les meilleur conseils pour vos autos électriques !', '1623168920.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `categories_posts`
--

CREATE TABLE `categories_posts` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `post_id`, `category_id`) VALUES
(21, 44, 3),
(37, 47, 1),
(88, 40, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories_users`
--

CREATE TABLE `categories_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories_users`
--

INSERT INTO `categories_users` (`id`, `user_id`, `category_id`) VALUES
(1, 10, 1),
(2, 10, 2),
(3, 7, 3),
(4, 7, 4),
(5, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `date`, `summary`, `content`, `is_published`, `created_at`, `img`, `user_id`) VALUES
(40, 'Audi A6 e-tron Concept (2021), la Tesla Model S d\'Audi ?', '2021-05-13 16:15:33', 'Dévoilée au salon de Shanghai 2021 (il y a bien un salon automobile ouvert actuellement en Chine !), l\'A6 e-tron Concept préfigure l\'arrivée d\'une nouvelle berline électrique de luxe chez Audi à côté de la récente e-tron GT. Son format semble parfait pour la jeter aux basques de la Tesla Model S.', '<p>Audi poss&egrave;de d&eacute;j&agrave; une berline &eacute;lectrique dans sa gamme, la tr&egrave;s sportive e-tron GT qui poss&egrave;de les m&ecirc;mes &eacute;l&eacute;ments techniques de base que la Porsche Taycan. Mais la marque aux anneaux pr&eacute;pare l\'arriv&eacute;e d\'une seconde berline &agrave; z&eacute;ro &eacute;missions dans sa gamme. Pour battre la toute nouvelle Mercedes EQS, incarnant le tr&egrave;s grand luxe au-dessus de la Classe S ? Pas tout &agrave; fait. L\'A6 e-tron Concept annonce semble-t-il un mod&egrave;le au positionnement moins &eacute;litiste que celui de la tr&egrave;s grosse Mercedes, mais aussi moins sportif que celui de la s&oelig;ur GT e-tron. Inaugurant la toute nouvelle plateforme &eacute;lectrique PPE d\'Audi r&eacute;serv&eacute;e aux gros mod&egrave;les &eacute;lectriques, l\'A6 e-tron Concept affiche des proportions de berline fa&ccedil;on &laquo; fastback &raquo;. Sa silhouette para&icirc;t plus trapue que celle de l\'A7 Sportback, mais beaucoup moins athl&eacute;tique que celle de la GT e-tron. Notez la signature lumineuse LED &agrave; l\'arri&egrave;re qui court sur toute la largeur de l\'auto, int&eacute;grant les quatre anneaux d\'Audi pour la premi&egrave;re fois. 800 volts, aussi Comme la Taycan et la GT e-tron dot&eacute;es de la plateforme J1, la plateforme PPE d\'Audi fonctionnera sur une tension &agrave; 800 volts qui permettra de faciliter le fonctionnement des syst&egrave;mes de charge rapide. Cette plateforme servira &agrave; la version de s&eacute;rie de l\'A6 e-tron Concept, mais aussi &agrave; un prochain SUV 100% &eacute;lectrique (rempla&ccedil;ant de l\'e-tron ?) et &agrave; des mod&egrave;les futurs de Porsche.</p>', 1, '2021-05-13 16:15:33', 'main_1623764447.jpeg', 3),
(44, 'Tesla Model S P100D ', '2021-06-02 13:01:08', 'incroyable', '<p>test test test test</p>', 1, '2021-06-02 13:01:08', '1622631668.jpeg', 3),
(47, 'Taycan Turbo S : une Porsche spectaculaire sans Flat Six !', '2021-06-07 14:28:58', 'C\'est un évènement. Un sacré nouvel événement chez Porsche ! Une révolution même, qui confirme que la volonté de s\'engager irréversiblement vers une nouvelle ère électrique ne changera ni l\'esprit, ni l\'ADN du constructeur aux 20000 victoires en compétition. La Taycan Turbo S est une vraie Porsche. Dans le ton et la performance. C\'est confirmé. Notre essai va pouvoir en témoigner.', '<p><span style=\"color: #ffffff;\">Les 6 Milliards d\'investissements consentis dans l\'&eacute;lectrification de ses produits sportifs &laquo; z&eacute;ro &eacute;mission &raquo; d\'ici &agrave; 2022, n&lsquo;auront pas &eacute;t&eacute; sans cons&eacute;quence. Une nouvelle page se tourne,&nbsp;<strong>Porsche oublie d&eacute;finitivement le Diesel, conserve ses armes thermiques et historiques et engage une partie de ses ressources &agrave; l\'&eacute;lectrification sportive</strong>. Le Luxembourg aura &eacute;t&eacute; notre terrain de jeu pour les premiers tours de ses 4 roues survolt&eacute;es par 761 ch.</span></p>\r\n<p><span style=\"color: #ffffff;\">Les ann&eacute;es passent mais les temps changent. Irr&eacute;m&eacute;diablement. En 2008, le Diesel a fait son apparition chez Porsche. Une aberration ? Pas vraiment. Cela a sans doute sauv&eacute; la marque d\'un probable d&eacute;p&ocirc;t de bilan. Lorsque Porsche a &eacute;largi sa gamme &agrave; davantage de mod&egrave;les et notamment&nbsp;<strong>les SUV, les motorisations Diesel, mutualis&eacute;es avec Audi et Volkswagen notamment</strong>, lui ont permis de s\'en tirer avantageusement. En dix ans, Porsche a retrouv&eacute; des couleurs financi&egrave;res lui permettant aujourd\'hui de s\'orienter vers plus de noblesse m&eacute;canique et des tendances plus modernes qui se conjuguent d&eacute;sormais au courant &eacute;lectrique.</span></p>', 1, '2021-06-07 14:28:58', '1623068938.jpeg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(3, 40, 3, 'hnbdfd', '2021-06-16 11:47:06'),
(4, 40, 3, 'nfhgbdvx', '2021-06-16 11:47:12'),
(5, 40, 3, 'jyhrdgfs', '2021-06-16 11:47:16');

-- --------------------------------------------------------

--
-- Structure de la table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `file_name`) VALUES
(68, 40, 'galery_1623843948_11.jpeg'),
(69, 40, 'galery_1623843948_12.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `bio` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `bio`, `created_at`, `is_admin`) VALUES
(3, 'Adams', 'Adam', 'Allouche', 'adam.allouche97@gmail.com', '$2y$10$mCugS5Ivq3n.dRjqSw.iT.WBUUEVJavEaxPA3TlMJbMxEX2s0ywcy', 'Je suis le créateur de ce site.', '2021-03-30 18:38:03', 1),
(4, 'dav', 'david', 'Allouche', 'david.allouche@gmail.com', '$2y$10$5M.oZaMNnrDDP/wMTQ8EC.k6l5CKQ19lwxUgaitaNSSvwVuzevfxi', NULL, '2021-03-31 13:57:43', 2),
(5, 'nerlight', 'nerli', 'Allouche', 'arie.atlan@gmail.com', '$2y$10$u2p.cDJdX2BPmAbZyGsN4uFFbK.91WJ3G.WMJf0I/nAjS7QB.R3Sq', NULL, '2021-04-01 12:06:58', 2),
(7, 'ilanux', 'ilana', 'lafond', 'ilana@gmail.com', '$2y$10$tvpRRe9SBsfj9szULFswOuyBopb4OgL2Gpdf4GG1wgL61AHkCyzci', NULL, '2021-04-12 13:26:15', 2),
(8, 'petronas', 'toto', 'wolf', 'totowolf@gmail.com', '$2y$10$XfHoHiytmxrcLJUnX92FxORn30kBsn6Wz2Kv2toaaFv1WUWDZ9RKy', 'azerty', '2021-04-19 11:51:50', 2),
(10, 'Alfi', 'Albert', 'Fitoussi', 'alfi@gmail.com', '$2y$10$90OKfir0ffNkpgh6C7fp2OuT87mGRprbNaM25vTXygGiJ2ewhqmQC', 'Je fais des sandwich archi bons !', '2021-04-19 18:04:58', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `categories_users`
--
ALTER TABLE `categories_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key category id` (`category_id`),
  ADD KEY `foreign key user id link` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories_posts`
--
ALTER TABLE `categories_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `categories_users`
--
ALTER TABLE `categories_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `category_id_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_id_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categories_users`
--
ALTER TABLE `categories_users`
  ADD CONSTRAINT `foreign key category id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign key user id link` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `foreign key user id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `foreign key post id comments` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign key user id comments` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `foreign key post id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
