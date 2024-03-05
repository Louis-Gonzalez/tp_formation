-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 mars 2024 à 21:05
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
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `post_id` int(11) NOT NULL DEFAULT 1,
  `description` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `description`, `create_at`, `update_at`) VALUES
(1, 18, 1, 'Post de Julien, c\'est cool la vie en rose . ', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(2, 14, 1, 'Post de Louis, la méditation : c\'est génial ! ', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(10, 14, 42, 'test transmission data à la base', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(11, 14, 41, 'Oh, les beaux coquillages : ', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(12, 17, 42, 'ajout d\'un post avec un role membre ', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(13, 14, 43, 'L\'eau est trop belle ! Petite merveille du monde. Fait-elle partie des 7 merveilles du mondes ? ', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(14, 14, 43, 'Commentaire à effacer pour le test delete post', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(20, 14, 41, 'J\'essaie les redirections !', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(22, 38, 41, '6846', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(23, 38, 41, '6846', '2024-03-04 20:33:03', '2024-03-04 20:33:03'),
(24, 14, 45, 'test add comment ', '2024-03-04 20:33:03', '2024-03-04 20:33:03');

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `lastname`, `firstname`, `address1`, `address2`, `zip`, `city`, `state`, `message`, `create_at`, `update_at`) VALUES
(1, 13, 'test', 'test', 'test', 'test', '123213', 'test', 'Bourgogne-Franche-Comte', 'message de test', '2024-02-21 15:33:46', '2024-03-04 20:15:08'),
(2, 14, 'gonzalez', 'louis', 'lot 10 accacias', 'amareins', '01090', 'francheleins', 'Auvergne-Rhône-Alpes', 'Message pour Louis ', '2024-02-21 16:27:21', '2024-03-04 20:15:08'),
(3, 15, 'pipoune', 'pipoune', 'rue de la gaité', 'appartement de la joie', '01090', 'grancheleins', 'Bourgogne-Franche-Comte', 'Message pour pipoune', '2024-02-21 16:36:01', '2024-03-04 20:15:08'),
(4, 16, 'sabine', 'sabine', 'bon pour boire du champagne', 'rodderor', '01090', 'frkkr', 'Bretagne', 'message pour sabine', '2024-02-21 16:38:48', '2024-03-04 20:15:08'),
(5, 17, 'thomas', 'thomas', 'lot du syrul', 'alderon', '02300', 'gtgtlkgtl', 'Centre-Val de Loire', 'message de Thomas', '2024-02-21 16:41:23', '2024-03-04 20:15:08'),
(6, 18, 'julien', 'julien', 'saint julien', 'bibolo', '7878546', 'st julio bibo', 'Bourgogne-Franche-Comte', 'message pour julien chaud&#039;des cheveux &amp; il aime le chocolat. ', '2024-02-21 16:48:38', '2024-03-04 20:15:08'),
(7, 19, 'gonzalez', 'edouard', 'fdklfjdlkj', 'ljfkjfkl', '1234', 'lkfjdlkfjm', 'Bourgogne-Franche-Comte', 'Message pour edouard', '2024-02-22 09:19:55', '2024-03-04 20:15:08'),
(8, 20, 'fuji', 'fuji', 'route de montagne bleu', 'chalet 14', '06789', 'montmagique', 'Auvergne-Rhone-Alpes', 'Message de fuji', '2024-02-22 09:42:30', '2024-03-04 20:15:08'),
(13, 25, 'reg', 'regis', 'aeaze', 'ezezae', '5465465', 'ojopfejzp', 'Bretagne', 'message du register', '2024-02-22 11:34:24', '2024-03-04 20:15:08'),
(14, 26, 'testregister', 'testregister', 'ldkljdelkjdlmk', 'jerjpoeriazoriop', '5456866', 'kopjfoikehzfoi', 'Bretagne', '', '2024-02-22 13:54:10', '2024-03-04 20:15:08'),
(15, 27, 'testtest', 'testtest', 'dede', 'dede', '12132', 'kjfkdl', 'Bourgogne-Franche-Comte', '', '2024-02-23 09:13:19', '2024-03-04 20:15:08'),
(16, 28, 'ded', 'de', 'de', 'de', '223', 'kjelm', 'Bourgogne-Franche-Comté', '', '2024-02-23 09:18:08', '2024-03-04 20:15:08'),
(17, 29, 'parent', 'andre', '8963 rue de Staingrad', 'appartement 14b', '54000', 'Nancy', 'Grand Est', '', '2024-02-27 10:40:41', '2024-03-04 20:15:08'),
(19, 31, 'tsetse', 'mouche', 'ruoute de l&#039;insecticide', 'baygon', '45621', 'test', 'Occitanie', '', '2024-02-27 13:57:07', '2024-03-04 20:15:08'),
(20, 32, 'test12', 'test12', 'test12', 'test12', '135455', 'test12', 'Ile-de-France', '', '2024-02-27 14:01:42', '2024-03-04 20:15:08'),
(23, 35, 'hihoied', 'diehio', 'ihdeiohde', 'oiihdeoihdeoi', '54', '654', 'Provence Alpes Cote d Azur', '', '2024-02-27 14:16:43', '2024-03-04 20:15:08'),
(24, 36, 'leboss', 'adam', 'rue du pro', 'appratement 15', '54589', 'kdjekojdoe', 'Auvergne-Rhone-Alpes', '', '2024-02-28 08:51:37', '2024-03-04 20:15:08'),
(25, 37, 'kroco', 'marco', 'rue de la rivi&egrave;re', 'Maison crocodile', '78963', 'aligator', 'Centre-Val de Loire', '', '2024-02-28 08:53:37', '2024-03-04 20:15:08'),
(26, 38, 'dadou', 'dadou', '8963 rue de Staingrad', 'de^ldpe', '12345', 'mksljzpm', 'Bretagne', '', '2024-02-28 09:09:28', '2024-03-04 20:15:08');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 14,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `description`, `image`, `create_at`, `update_at`) VALUES
(1, 14, 'Mon premier article de blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Pro', 'https://media.istockphoto.com/id/925152880/fr/photo/crayons-de-couleur-sur-fond-de-mur-argent-avec-espace-copie.jpg?b=1&s=612x612&w=0&k=20&c=uW-VEL5ffQJMhW8CHLx33CmB1QnIIzt7OSaQC8vqroc=', '2024-02-20 11:26:50', '2024-03-04 14:53:40'),
(2, 14, 'mon deuxième post', 'Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. ', 'https://media.istockphoto.com/id/980659112/fr/photo/double-exposition-de-lhomme-daffaires-travaillant-avec-nouvel-ordinateur-moderne-montrer.jpg?b=1&s=612x612&w=0&k=20&c=Br69rPHebvwAb_bSlV_r0uWSmN8Ao7XozTVyssnr5b0=', '2024-02-20 11:28:15', '2024-03-04 14:53:40'),
(3, 14, 'mon troisième post ', 'Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; ', 'https://media.istockphoto.com/id/1499036933/fr/photo/la-carte-du-monde-en-arri%C3%A8re-plan.jpg?b=1&s=612x612&w=0&k=20&c=Qomcq6UcvOfltp47Imr0JGx12UB6nsZwf3-lp9HNOvU=', '2024-02-20 11:29:14', '2024-03-04 14:53:40'),
(4, 14, 'mon quatrième post', 'Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit', 'https://media.istockphoto.com/id/1149783462/fr/photo/roses-rouges-sur-le-jardin.jpg?b=1&s=612x612&w=0&k=20&c=A1GYpQWuWFnQPuPAFGqzTweklyjBXXzyyx8ytkwLwjg=', '2024-02-20 11:32:02', '2024-03-04 14:53:40'),
(5, 14, 'mon cinquième post', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', 'https://media.istockphoto.com/id/1220556514/fr/photo/vue-dun-seul-lampadaire-noir-m%C3%A9tallique-debout-au-milieu-dun-parc-public-entour%C3%A9-de-divers.jpg?b=1&s=612x612&w=0&k=20&c=i6oF5k-G4IdM7I_n0ooEOTB4GVBOSY7BBbfOJ4xH2Ys=', '2024-02-20 11:32:42', '2024-03-04 14:53:40'),
(6, 14, 'Mon sixième post ', 'Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, \r\n    augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. ', 'https://media.istockphoto.com/id/1434930429/fr/photo/m%C3%A9langer-le-poulet-%C3%A0-la-p%C3%A2te-de-chili-avec-des-%C5%93ufs-frits-dans-une-assiette-blanche.jpg?b=1&s=612x612&w=0&k=20&c=g8BpbBgOCILAmLV6Qr_-d6LwZdmXI6uCz5qBvdbIZCM=', '2024-02-21 10:08:17', '2024-03-04 14:53:40'),
(10, 14, 'mon ème post ', 'concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard', 'https://media.istockphoto.com/id/1221365276/fr/photo/goyave-rose-coup%C3%A9e-en-deux-sur-un-fond-rose.jpg?b=1&s=612x612&w=0&k=20&c=SwHza939tKlGHloTjbVLz7akgA8UNxatc6hJ0GxEzvg=', '2024-02-23 14:25:56', '2024-03-04 14:53:40'),
(12, 14, 'mon post philo', 'L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la ', 'https://media.istockphoto.com/id/1284511468/fr/photo/lenfant-pr%C3%AAtre-indien-faisant-la-m%C3%A9ditation.jpg?b=1&s=612x612&w=0&k=20&c=oKD-TAm24Q9LAnhYTJz8iVoTaKtu3pSkhOO_ryCcPLc=', '2024-02-23 14:33:32', '2024-03-04 14:53:40'),
(13, 14, 'post coquillage ', 'College, en Virginie, s&#039;est int&eacute;ress&eacute; &agrave; un des mots latins les plus obscurs, consectetur, extrait d&#039;un passage du Lorem Ipsum, et en &eacute;tudiant tous les usages de ce mot dans la litt&eacute;rature classique, d&eacute;co', 'https://images.pexels.com/photos/358904/pexels-photo-358904.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-23 14:54:22', '2024-03-04 14:53:40'),
(14, 14, 'new post de reve', 'Allez &agrave; la plage !!! ', 'https://images.pexels.com/photos/457882/pexels-photo-457882.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-23 14:55:50', '2024-03-04 14:53:40'),
(17, 14, 'allez &agrave; la montagne ', 'GO GO GO la montagne, &ccedil;a vous gagne ! ', 'https://media.istockphoto.com/id/1341288649/fr/photo/panorama-75mpix-du-magnifique-mont-ama-dablam-dans-lhimalaya-n%C3%A9pal.jpg?b=1&amp;s=612x612&amp;w=0&amp;k=20&amp;c=YUsrml5DhBkBLwNG-m_vNOm7oeP4DhkMyZ48WM3EmGs=', '2024-02-23 16:04:03', '2024-03-04 14:53:40'),
(24, 14, 'Test update post', 'new description post', 'https://images.pexels.com/photos/368260/pexels-photo-368260.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-23 16:29:12', '2024-03-04 14:53:40'),
(25, 14, 'new add post montage', 'description montagne', 'https://images.pexels.com/photos/568236/pexels-photo-568236.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-23 16:31:29', '2024-03-04 14:53:40'),
(26, 14, 'deck', 'description deck  kfjkljùkljùkmljùm', 'https://images.pexels.com/photos/260024/pexels-photo-260024.jpeg?auto=compress&cs=tinysrgb&w=600', '2024-02-23 16:34:14', '2024-03-04 14:53:40'),
(33, 14, 'arbre ensoleil', 'dedefrffrfrgtgt', 'https://images.pexels.com/photos/36717/amazing-animal-beautiful-beautifull.jpg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-26 09:56:21', '2024-03-04 14:53:40'),
(34, 13, 'new post avec compte test', 'test description compte test', 'https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-26 10:16:35', '2024-03-04 14:53:40'),
(41, 13, 'add test user', 'add description ', 'https://images.pexels.com/photos/358904/pexels-photo-358904.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-26 11:59:16', '2024-03-04 14:53:40'),
(42, 13, 'ciel étoilé', 'obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10', 'https://images.pexels.com/photos/355465/pexels-photo-355465.jpeg?auto=compress&cs=tinysrgb&w=600', '2024-02-26 12:19:41', '2024-03-04 14:53:40'),
(43, 14, 'Magnifique Baie', 'Magnifique panorama de la baie d&#039;une plage de la Californie.', 'https://images.pexels.com/photos/462162/pexels-photo-462162.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-27 16:32:38', '2024-03-04 14:53:40'),
(44, 14, 'Add new pos t', 'Add new post apr&egrave;s modification des class', 'https://images.pexels.com/photos/1658967/pexels-photo-1658967.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-29 14:56:16', '2024-03-04 14:53:40'),
(45, 14, 'La rivière tranquille', 'C\'est une rivière très reposante pour une cure de tranquilité.\r\n\r\nUt sit amet magna. Cras a ligula eu urna dignissim viverra. Nullam tempor leo porta ipsum. Praesent purus. Nullam consequat. Mauris dictum sagittis dui. Vestibulum sollicitudin consectetuer', 'https://images.pexels.com/photos/709552/pexels-photo-709552.jpeg?auto=compress&cs=tinysrgb&w=600', '2024-02-29 14:57:16', '2024-03-04 14:53:40'),
(46, 14, 'dedede', 'dedede', 'https://images.pexels.com/photos/147411/italy-mountains-dawn-daybreak-147411.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', '2024-02-29 17:00:16', '2024-03-04 14:53:40'),
(48, 14, 'elle est trop belle la rivière', 'la forêt, une rivière la vie ! ', 'https://images.pexels.com/photos/131723/pexels-photo-131723.jpeg?auto=compress&cs=tinysrgb&w=600', '2024-03-01 08:49:16', '2024-03-04 14:53:40'),
(49, 14, 'Post home diapo 1', 'ljddjakdjazlùdkz*ù', 'https://images.pexels.com/photos/206359/pexels-photo-206359.jpeg?auto=compress&cs=tinysrgb&w=600', '2024-03-04 16:21:24', '2024-03-04 16:21:24');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'C:\\xampp\\htdocs\\formation_php\\tp3\\assets\\uploads\\avatars\\avatardefault.png',
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT '["ROLE_MEMBER"]',
  `register_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `avatar`, `password`, `roles`, `register_at`, `update_at`) VALUES
(13, 'test@gmail.com', '1709106214.png', '$2y$10$1C/XxiXtPHX/ti/8jFFIAuWV06PDpQDTAi3sqtedC7wYQtMwRHwTG', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-21 15:33:46', '2024-03-04 16:08:48'),
(14, 'gonzalezlouis1981@gmail.com', '1709047350.jpg', '$2y$10$Jxtosuazcb3OOO88pK89x.0UZeQetP6/8PA/1B5XTBtzifzWQwP4C', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-21 16:27:21', '2024-03-04 16:08:48'),
(15, 'pipoune@gmail.com', '1709106198.png', '$2y$10$jDHSo4jR7Ts6LpTPVMQWy.dcWjjU6ULlg0fjpVs1T3m9bgUWZ63pC', '[\"ROLE_MEMBER\"]', '2024-02-21 16:36:01', '2024-03-04 16:08:48'),
(16, 'sabine@gmail.com', '1709106182.png', '$2y$10$kK3gEw9/IyUFBpzPTAp65elWjyH8TDlVE1Mk7hra80KJBbdBZe3Pa', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-21 16:38:48', '2024-03-04 16:08:48'),
(17, 'thomas@gmail.com', '1709106171.png', '$2y$10$Q9T1I5bxHMrFF7iKXdwBwOodDfWnGAA2QIw5gVRfj3SNL7PtosZwG', '[\"ROLE_MEMBER\"]', '2024-02-21 16:41:23', '2024-03-04 16:08:48'),
(18, 'julien@hotmail.com', '1709106136.png', '$2y$10$SbmizMQ0BAf.EzKT/VYe7.f.skeQ6.FA6HiaR9XhnW9DGgaeD7Cme', '[\"ROLE_MEMBER\"]', '2024-02-21 16:48:38', '2024-03-04 16:08:48'),
(19, 'edouard@gmail.com', '1709106123.png', '$2y$10$Rphye.iFq0/H9xNTvgBnEuSka3LN73bfWdM05fbeSb/QOA3ZIaaI6', '[\"ROLE_MEMBER\"]', '2024-02-22 09:19:55', '2024-03-04 16:08:48'),
(20, 'fuji@gmail.com', '1709106159.png', '$2y$10$BU0SgIrfd4DkqI8UFOQu1.cCJawMap.BvR7aKJOjlw47BRNkKeoFi', '[\"ROLE_MEMBER\"]', '2024-02-22 09:42:30', '2024-03-04 16:08:48'),
(25, 'register@gmail.com', '1709106147.png', '$2y$10$Wam1uNQabEAezprjyVw64uxXgVFHO6VyYIsAKZ6TRtwvkkrO4QeYy', '[\"ROLE_MEMBER\"]', '2024-02-22 11:34:24', '2024-03-04 16:08:48'),
(26, 'testregister@gmail.com', '1709106059.png', '$2y$10$2C7RFRJ7cgoVTGWml7Lx/uqgpIs3J6158SG9Q6aVpT2R.x23HrhfS', '[\"ROLE_MEMBER\"]', '2024-02-22 13:54:10', '2024-03-04 16:08:48'),
(27, 'g@gmail.com', '1709106038.png', '$2y$10$sjLNda3OXLo3kPpMq53Hpe3jD.PUV2Q6N.C7vnN9WGZaHSYcmHWY2', '[\"ROLE_MEMBER\"]', '2024-02-23 09:13:19', '2024-03-04 16:08:48'),
(28, 'gg@gmail.com', '1709044410.png', '$2y$10$DKmd943hlG4VMQuK2AhiMO9o2lel..UjVZe9BQcOOmP9hTSP/LoW.', '[\"ROLE_MEMBER\"]', '2024-02-23 09:18:08', '2024-03-04 16:08:48'),
(29, 'andre@gmail.com', '1708676893.png', '$2y$10$561/D5D1/DX72PxUOdoQJOzO.Sx6DMhQqaqzyJZ0TY92QlmyxWo5G', '[\"ROLE_MEMBER\"]', '2024-02-27 10:40:41', '2024-03-04 16:08:48'),
(31, 'mouche@gmail.com', 'croco.jpg', '$2y$10$KMf0w3KBXv3b/cyb0tVUo.9R3hY2Am7M0OzBVFpMx54Cwnx2yi8T2', '[\"ROLE_MEMBER\"]', '2024-02-27 13:57:07', '2024-03-04 16:08:48'),
(32, 'test12@gmail.com', 'croco.jpg', '$2y$10$aw/Fx6b7pgkJHk8USRNKBuIrfAfWP36JANkTSy91LJGaTI6y7.7oa', '[\"ROLE_MEMBER\"]', '2024-02-27 14:01:42', '2024-03-04 16:08:48'),
(35, 'dhejde@cd.com', '1709048227.png', '$2y$10$0hJSH6SjyVquh9q3o26eaOC5k.P9EU/N/gNM0kXoCD9v/4k.UQAhO', '[\"ROLE_MEMBER\"]', '2024-02-27 14:16:43', '2024-03-04 16:08:48'),
(36, 'adam@gmail.com', '1709106697.png', '$2y$10$c.qhl3dgs8cK.AMw5VImauBQ4SYeXQl9Rq8wEP6yE722F/XslKjt.', '[\"ROLE_MEMBER\"]', '2024-02-28 08:51:37', '2024-03-04 16:08:48'),
(37, 'marco@gmail.com', '1709106817.jpg', '$2y$10$54/IhKZx1bEycGtiSj7ojuTCw6/HDGAlc/zbUtK4xoLUT4jb4/r0a', '[\"ROLE_MEMBER\"]', '2024-02-28 08:53:37', '2024-03-04 16:08:48'),
(38, 'dadou@gmail.com', '1709107768.png', '$2y$10$9LwAEevX7hSlixSHNMjlA.ms/5LipITrM3aXis66MxwKc1pSMK7Ua', '[\"ROLE_MEMBER\"]', '2024-02-28 09:09:28', '2024-03-04 16:08:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`user_id`),
  ADD KEY `fk_comment_post` (`post_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
