-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 fév. 2024 à 14:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `lastname`, `firstname`, `address1`, `address2`, `zip`, `city`, `state`, `message`, `create_at`) VALUES
(1, 13, 'test', 'test', 'test', 'test', '123213', 'test', 'Bourgogne-Franche-Comt&eacute;', 'message de test', '2024-02-21 15:33:46'),
(2, 14, 'gonzalez', 'louis', 'lot 10 accacias', 'amareins', '01090', 'francheleins', 'Auvergne-Rh&ocirc;ne-Alpes', 'Message pour Louis ', '2024-02-21 16:27:21'),
(3, 15, 'pipoune', 'pipoune', 'rue de la gait&eacute;', 'appartement de la joie', '01090', 'grancheleins', 'Bourgogne-Franche-Comt&eacute;', 'Message pour pipoune', '2024-02-21 16:36:01'),
(4, 16, 'sabine', 'sabine', 'bon pour boire du champagne', 'rodderor', '01090', 'frkkr', 'Bretagne', 'message pour sabine', '2024-02-21 16:38:48'),
(5, 17, 'thomas', 'thomas', 'lot du syrul', 'alderon', '02300', 'gtgtlkgtl', 'Centre-Val de Loire', 'message de Thomas', '2024-02-21 16:41:23'),
(6, 18, 'julien', 'julien', 'saint julien', 'bibolo', '7878546', 'st julio bibo', 'Bourgogne-Franche-Comt&eacute;', 'message pour julien chaud&#039;des cheveux &amp; il aime le chocolat. ', '2024-02-21 16:48:38'),
(7, 19, 'gonzalez', 'edouard', 'fdklfjdlkj', 'ljfkjfkl', '1234', 'lkfjdlkfjm', 'Bourgogne-Franche-Comt&eacute;', 'Message pour edouard', '2024-02-22 09:19:55'),
(8, 20, 'fuji', 'fuji', 'route de montagne bleu', 'chalet 14', '06789', 'montmagique', 'Provence Alpes C&ocirc;te d&rs', 'Message de fuji', '2024-02-22 09:42:30'),
(13, 25, 'reg', 'regis', 'aeaze', 'ezezae', '5465465', 'ojopfejzp', 'Bretagne', 'message du register', '2024-02-22 11:34:24'),
(14, 26, 'testregister', 'testregister', 'arorueo', 'jerjpoeriazoriop', '5456866', 'kopjfoikehzfoi', 'Bretagne', '', '2024-02-22 13:54:10'),
(15, 27, 'testtest', 'testtest', 'dede', 'dede', '12132', 'kjfkdl', 'Bourgogne-Franche-Comt&eacute;', '', '2024-02-23 09:13:19'),
(16, 28, 'ded', 'de', 'de', 'de', '223', 'kjelm', 'Bourgogne-Franche-Comt&eacute;', '', '2024-02-23 09:18:08');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `create_at`) VALUES
(1, 'Mon premier article de blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Pro', 'https://media.istockphoto.com/id/925152880/fr/photo/crayons-de-couleur-sur-fond-de-mur-argent-avec-espace-copie.jpg?b=1&s=612x612&w=0&k=20&c=uW-VEL5ffQJMhW8CHLx33CmB1QnIIzt7OSaQC8vqroc=', '2024-02-20 11:26:50'),
(2, 'mon deuxième post', 'Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. ', 'https://media.istockphoto.com/id/980659112/fr/photo/double-exposition-de-lhomme-daffaires-travaillant-avec-nouvel-ordinateur-moderne-montrer.jpg?b=1&s=612x612&w=0&k=20&c=Br69rPHebvwAb_bSlV_r0uWSmN8Ao7XozTVyssnr5b0=', '2024-02-20 11:28:15'),
(3, 'mon troisième post ', 'Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; ', 'https://media.istockphoto.com/id/1499036933/fr/photo/la-carte-du-monde-en-arri%C3%A8re-plan.jpg?b=1&s=612x612&w=0&k=20&c=Qomcq6UcvOfltp47Imr0JGx12UB6nsZwf3-lp9HNOvU=', '2024-02-20 11:29:14'),
(4, 'mon quatrième post', 'Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit', 'https://media.istockphoto.com/id/1149783462/fr/photo/roses-rouges-sur-le-jardin.jpg?b=1&s=612x612&w=0&k=20&c=A1GYpQWuWFnQPuPAFGqzTweklyjBXXzyyx8ytkwLwjg=', '2024-02-20 11:32:02'),
(5, 'mon cinquième post', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', 'https://media.istockphoto.com/id/1220556514/fr/photo/vue-dun-seul-lampadaire-noir-m%C3%A9tallique-debout-au-milieu-dun-parc-public-entour%C3%A9-de-divers.jpg?b=1&s=612x612&w=0&k=20&c=i6oF5k-G4IdM7I_n0ooEOTB4GVBOSY7BBbfOJ4xH2Ys=', '2024-02-20 11:32:42'),
(6, 'Mon sixième post ', 'Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, \r\n    augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. ', 'https://media.istockphoto.com/id/1434930429/fr/photo/m%C3%A9langer-le-poulet-%C3%A0-la-p%C3%A2te-de-chili-avec-des-%C5%93ufs-frits-dans-une-assiette-blanche.jpg?b=1&s=612x612&w=0&k=20&c=g8BpbBgOCILAmLV6Qr_-d6LwZdmXI6uCz5qBvdbIZCM=', '2024-02-21 10:08:17'),
(10, 'mon ème post ', 'concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard', 'https://media.istockphoto.com/id/1221365276/fr/photo/goyave-rose-coup%C3%A9e-en-deux-sur-un-fond-rose.jpg?b=1&s=612x612&w=0&k=20&c=SwHza939tKlGHloTjbVLz7akgA8UNxatc6hJ0GxEzvg=', '2024-02-23 14:25:56'),
(11, 'nouveau post ', 'ollege, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable d', 'https://media.istockphoto.com/id/1437102652/fr/photo/spirale-abstraite-de-rendu-3d.jpg?b=1&s=612x612&w=0&k=20&c=3ggRUj5UDvkHCyHLWUK1lwuLR-Qxq3tfTjES7wqg100=', '2024-02-23 14:26:56'),
(12, 'mon post philo', 'L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la ', 'https://media.istockphoto.com/id/1284511468/fr/photo/lenfant-pr%C3%AAtre-indien-faisant-la-m%C3%A9ditation.jpg?b=1&s=612x612&w=0&k=20&c=oKD-TAm24Q9LAnhYTJz8iVoTaKtu3pSkhOO_ryCcPLc=', '2024-02-23 14:33:32');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'C:\\xampp\\htdocs\\formation_php\\tp3\\assets\\uploads\\avatars\\avatardefault.png',
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT '["ROLE_ADMIN", "ROLE_MEMBER"]',
  `register_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `avatar`, `password`, `roles`, `register_at`) VALUES
(3, 'robert.berto@gmail.com', '', '$2y$10$iKNSg.1HfTsPDWRENyk.XOGzpTYlsIj4OAZtlvl/g1gAYsLKiaRXy', '[]', '2024-02-21 14:06:27'),
(4, 'adam.leboss@gmail.com', '', '$2y$10$pbSpRyzvNt.pcrpDoYhsuOMqCxk2.wlNdMa.ZhNpneA/JDQKDSrE6', '[]', '2024-02-21 14:07:35'),
(5, 'marc.lesoudier@yahoo.fr', '', '$2y$10$l5HvIutrS9yFDPmGafEaK.P6T5ZQRNl4AkJghrHquZnYYoNYatcbe', '[]', '2024-02-21 14:49:53'),
(6, 'cedric.frachisse@yuyuyuy.com', '', '$2y$10$lbFgTqd0g2sYqaSllQiFSuEueJdltmZiydfBkSH3.oywNR1OZAafu', '[]', '2024-02-21 14:50:43'),
(8, 'dede@dlekdlmek.fr', '', '$2y$10$o4.NAqb3H82MNLzB6kcZuuLn3iI1EgLY9uhTQc.TpqKGm/17LJs1i', '[]', '2024-02-21 14:57:25'),
(11, 'dadou.dadou@gmail.com', '', '$2y$10$T5ebo6xR99siF6ycM82Qn.UOvh/HxbHZ0TwWrg5Mz6cUzSEwSXn7a', '[]', '2024-02-21 15:27:21'),
(13, 'test@gmail.com', '', '$2y$10$1C/XxiXtPHX/ti/8jFFIAuWV06PDpQDTAi3sqtedC7wYQtMwRHwTG', '[]', '2024-02-21 15:33:46'),
(14, 'gonzalezlouis1981@gmail.com', '', '$2y$10$Jxtosuazcb3OOO88pK89x.0UZeQetP6/8PA/1B5XTBtzifzWQwP4C', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-21 16:27:21'),
(15, 'pipoune@gmail.com', '', '$2y$10$jDHSo4jR7Ts6LpTPVMQWy.dcWjjU6ULlg0fjpVs1T3m9bgUWZ63pC', '[]', '2024-02-21 16:36:01'),
(16, 'sabine@gmail.com', '', '$2y$10$kK3gEw9/IyUFBpzPTAp65elWjyH8TDlVE1Mk7hra80KJBbdBZe3Pa', '[]', '2024-02-21 16:38:48'),
(17, 'thomas@gmail.com', '', '$2y$10$Q9T1I5bxHMrFF7iKXdwBwOodDfWnGAA2QIw5gVRfj3SNL7PtosZwG', '[]', '2024-02-21 16:41:23'),
(18, 'julien@hotmail.com', '', '$2y$10$SbmizMQ0BAf.EzKT/VYe7.f.skeQ6.FA6HiaR9XhnW9DGgaeD7Cme', '[]', '2024-02-21 16:48:38'),
(19, 'edouard@gmail.com', '', '$2y$10$Rphye.iFq0/H9xNTvgBnEuSka3LN73bfWdM05fbeSb/QOA3ZIaaI6', '[]', '2024-02-22 09:19:55'),
(20, 'fuji@gmail.com', '', '$2y$10$BU0SgIrfd4DkqI8UFOQu1.cCJawMap.BvR7aKJOjlw47BRNkKeoFi', '[\"ROLE_MEMBER\"]', '2024-02-22 09:42:30'),
(25, 'register@gmail.com', '', '$2y$10$Wam1uNQabEAezprjyVw64uxXgVFHO6VyYIsAKZ6TRtwvkkrO4QeYy', '[]', '2024-02-22 11:34:24'),
(26, 'testregister@gmail.com', 'C:\\xampp\\htdocs\\formation_php\\tp3\\assets\\uploads\\avatars\\avatardefault.png', '$2y$10$2C7RFRJ7cgoVTGWml7Lx/uqgpIs3J6158SG9Q6aVpT2R.x23HrhfS', '[]', '2024-02-22 13:54:10'),
(27, 'g@gmail.com', 'C:\\xampp\\htdocs\\formation_php\\tp3\\assets\\uploads\\avatars\\avatardefault.png', '$2y$10$sjLNda3OXLo3kPpMq53Hpe3jD.PUV2Q6N.C7vnN9WGZaHSYcmHWY2', '[\"ROLE_ADMIN\", \"ROLE_MEMBER\"]', '2024-02-23 09:13:19'),
(28, 'gg@gmail.com', 'C:\\xampp\\htdocs\\formation_php\\tp3\\assets\\uploads\\avatars\\avatardefault.png', '$2y$10$DKmd943hlG4VMQuK2AhiMO9o2lel..UjVZe9BQcOOmP9hTSP/LoW.', '[\"ROLE_ADMIN\", \"ROLE_MEMBER\"]', '2024-02-23 09:18:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contact_user` (`user_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
