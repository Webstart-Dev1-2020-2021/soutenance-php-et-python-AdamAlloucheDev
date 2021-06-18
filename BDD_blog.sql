-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 18 juin 2021 à 15:31
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
(88, 40, 1),
(89, 48, 3);

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
(47, 'Taycan Turbo S : une Porsche spectaculaire sans Flat Six !', '2021-06-07 14:28:58', 'C\'est un évènement. Un sacré nouvel événement chez Porsche ! Une révolution même, qui confirme que la volonté de s\'engager irréversiblement vers une nouvelle ère électrique ne changera ni l\'esprit, ni l\'ADN du constructeur aux 20000 victoires en compétition. La Taycan Turbo S est une vraie Porsche. Dans le ton et la performance. C\'est confirmé. Notre essai va pouvoir en témoigner.', '<p><span style=\"color: #ffffff;\">Les 6 Milliards d\'investissements consentis dans l\'&eacute;lectrification de ses produits sportifs &laquo; z&eacute;ro &eacute;mission &raquo; d\'ici &agrave; 2022, n&lsquo;auront pas &eacute;t&eacute; sans cons&eacute;quence. Une nouvelle page se tourne,&nbsp;<strong>Porsche oublie d&eacute;finitivement le Diesel, conserve ses armes thermiques et historiques et engage une partie de ses ressources &agrave; l\'&eacute;lectrification sportive</strong>. Le Luxembourg aura &eacute;t&eacute; notre terrain de jeu pour les premiers tours de ses 4 roues survolt&eacute;es par 761 ch.</span></p>\r\n<p><span style=\"color: #ffffff;\">Les ann&eacute;es passent mais les temps changent. Irr&eacute;m&eacute;diablement. En 2008, le Diesel a fait son apparition chez Porsche. Une aberration ? Pas vraiment. Cela a sans doute sauv&eacute; la marque d\'un probable d&eacute;p&ocirc;t de bilan. Lorsque Porsche a &eacute;largi sa gamme &agrave; davantage de mod&egrave;les et notamment&nbsp;<strong>les SUV, les motorisations Diesel, mutualis&eacute;es avec Audi et Volkswagen notamment</strong>, lui ont permis de s\'en tirer avantageusement. En dix ans, Porsche a retrouv&eacute; des couleurs financi&egrave;res lui permettant aujourd\'hui de s\'orienter vers plus de noblesse m&eacute;canique et des tendances plus modernes qui se conjuguent d&eacute;sormais au courant &eacute;lectrique.</span></p>', 1, '2021-06-07 14:28:58', '1623068938.jpeg', 3),
(48, 'Volkswagen ID.4 : l’alternative électrique au Tiguan', '2021-06-18 15:26:04', 'Volkswagen poursuit sa transition énergétique avec le deuxième modèle de la gamme ID 100% électrique. Après la compacte ID.3, c\'est au tour de l\'ID.4 de faire son entrée sur le marché avec pour ambition de séduire les familles. Le défi est de taille : monter en gamme et offrir une vraie polyvalence. Mais avec son autonomie de 520 km et son habitacle XXL, l\'ID.4 semble parfaitement à la hauteur.', '<p>Il n\'aura fallu que quelques mois pour que Volkswagen &eacute;toffe sa gamme ID inaugur&eacute;e en septembre 2020 avec le lancement de&nbsp;<span class=\"s1\" style=\"text-decoration-line: underline;\">l\'ID.3</span>. Mais on connait d&eacute;sormais le secret de ce d&eacute;veloppement rapide : une plateforme modulaire commune &agrave; plusieurs mod&egrave;les. L\'ID.4 partage ainsi sa base technique avec l\'ID.3, bien que celle-ci appartienne au segment inf&eacute;rieur. En effet,&nbsp;<strong>nous n\'avons plus affaire &agrave; une berline compacte du format de la&nbsp;</strong><span class=\"s1\" style=\"text-decoration-line: underline;\"><strong>Golf</strong></span><strong>, mais bien &agrave; un SUV d\'un gabarit similaire &agrave; celui du&nbsp;</strong><span class=\"s1\" style=\"text-decoration-line: underline;\"><strong>Tiguan</strong></span><strong>.</strong></p>\r\n<p>En l\'occurrence, avec 4,58 m de long l\'ID.4 mesure 32 cm de plus que sa petite s&oelig;ur (m&ecirc;me si elle est plus vieille), principalement au profit du porte &agrave; faux arri&egrave;re. L\'empattement reste quant &agrave; lui inchang&eacute; &agrave; 2,77 m. Pourtant au premier abord,&nbsp;<strong>l\'ID.4 semble plus compacte qu\'elle ne l\'est r&eacute;ellement.</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Il faut dire que Volkswagen a bien travaill&eacute; les proportions, mais aussi la pr&eacute;sentation de son nouveau mod&egrave;le. L\'absence de moteur thermique permet de contenir la longueur du capot. Les &eacute;normes jantes de 21 pouces remplissent bien les passages de roues et assurent un profil &eacute;quilibr&eacute;. Mais c\'est surtout la ligne de caisse ondul&eacute;e et la teinte bicolore qui accentuent l\'impression d\'une silhouette &eacute;lanc&eacute;e. R&eacute;sultat,&nbsp;<strong>en la d&eacute;couvrant on pense davantage &agrave; un break sur&eacute;lev&eacute; qu\'&agrave; un SUV</strong>. D\'ailleurs, l\'a&eacute;rodynamique est plut&ocirc;t impressionnant avec un Cx de seulement 0,28.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Familial avant tout</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Toujours est-il qu\'en termes d\'habitabilit&eacute;, l\'ID4 confirme clairement son statut de v&eacute;hicule familial.&nbsp;<strong>A l\'avant, la console centrale flottante et l\'absence de tunnel central lib&egrave;rent beaucoup d\'espace</strong>&nbsp;au profit de quelques rangements. En effet, un joystick int&eacute;gr&eacute; &agrave; droite du bloc d\'instrumentation remplace astucieusement l\'habituel levier de vitesses.</p>\r\n<p>A l\'arri&egrave;re aussi l\'accueil est de tr&egrave;s bon niveau, tant en termes d\'espace aux jambes que de la garde au toit. Le dossier de banquette l&eacute;g&egrave;rement inclin&eacute; et l\'assise bien moelleuse assurent aux passagers de voyager confortablement. Le coffre n\'est pour autant pas sacrifi&eacute;.&nbsp;<strong>Son volume variable de 543 &agrave; 1.575 litres se positionne dans la moyenne de la cat&eacute;gorie</strong>. Vraiment pas loin d\'un Tiguan &laquo; classique &raquo; dot&eacute; de 615 litres et m&ecirc;me sup&eacute;rieur &agrave; un Tiguan e-Hybrid !</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Quelle version choisir ?</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Malgr&eacute; tout, l\'autonomie est elle aussi excellente en th&eacute;orie avec la batterie de 77 kWh autorisant un trajet de 520 km en cycle WLTP. Et en pratique aussi ce n\'est pas mal du tout.<strong>&nbsp;Avec une moyenne constat&eacute;e inf&eacute;rieure &agrave; 22 kWh/100 km, on parvient quand m&ecirc;me &agrave; 350 km</strong>. Cela permet largement d\'envisager quelques excursions hors des villes et de se lib&eacute;rer de l\'angoisse de la panne s&egrave;che. M&ecirc;me sans forc&eacute;ment recharger au quotidien. En revanche, cela impose de prendre son mal en patience (6h de charge pour r&eacute;cup&eacute;rer 80% d\'autonomie en 11 kW) ou bien un chargeur de haute puissance. L\'ID.4 autorise jusqu\'&agrave; 125 kW (permettant de r&eacute;cup&eacute;rer 80% de batterie en 40 minutes).</p>\r\n<p>Pour ceux qui opteront pour la batterie 52 kWh annon&ccedil;ant une autonomie th&eacute;orique de 345 km (cycle WLTP), la puissance sera limit&eacute;e &agrave; 148 ch (version Pure) ou 170 ch (version Pro). Mais le poids de la batterie sera r&eacute;duit &agrave; 344 kg, au lieu de 493 kg, ce qui profitera &agrave; l\'autonomie et &agrave; l\'agilit&eacute;. Mais aussi au tarif : &agrave; partir de 39.370 euros, avant d&eacute;duction des 7.000 euros de bonus. Tandis que l<strong>a version 77 kWh (finition 1st Max) d&eacute;marre &agrave; 47.950 euros et ne profite que d\'un bonus de 3.000 euros.</strong></p>\r\n<p>Un bon positionnement face &agrave; un&nbsp;<span class=\"s1\" style=\"text-decoration-line: underline;\">Kia e-Niro</span>&nbsp;de puissance identique (45.000 euros) et toujours coh&eacute;rent face au&nbsp;<span class=\"s1\" style=\"text-decoration-line: underline;\">Hyundai Kona</span>&nbsp;(39.900 euros en version 200 ch). Par contre, un peu difficile &agrave; dig&eacute;rer face &agrave; son cousin le Skoda Enyaq (36.050 euros). Et qui fait r&eacute;fl&eacute;chir face &agrave; un Tiguan affich&eacute; &agrave; partie de 45.359 euros en TDI 150 et 52.250 euros en TDI 200 (finition c&oelig;ur de gamme Elegance).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bilan</strong></p>\r\n<p>&nbsp;</p>\r\n<p>L\'ID.4 est l\'un des v&eacute;hicules &eacute;lectriques familiaux les plus homog&egrave;nes du march&eacute;. Il ne fait aucune impasse, que ce soit sur l\'habitabilit&eacute;, le confort ou l\'autonomie. Seuls quelques d&eacute;fauts de jeunesse r&eacute;sident. Mais globalement il repr&eacute;sente assur&eacute;ment l\'une des meilleures offres de la cat&eacute;gorie. Seul le choix de la batterie peut se poser pour certains. A quoi bon opter pour une version 77 kWh avec des infrastructures si peu d&eacute;velopp&eacute;es ? Autant consommer moins avec 52 kWh, m&ecirc;me si l\'on recharge plus souvent ? Oui c\'est pas faux !</p>', 1, '2021-06-18 15:26:04', 'main_1624022764.jpeg', 3);

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
(69, 40, 'galery_1623843948_12.jpeg'),
(70, 48, 'galery_1624022764_0.jpeg'),
(71, 48, 'galery_1624022764_1.jpeg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `categories_users`
--
ALTER TABLE `categories_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
