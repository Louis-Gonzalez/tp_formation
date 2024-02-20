-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 fév. 2024 à 16:51
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
(5, 'mon cinquième post', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', 'https://media.istockphoto.com/id/1220556514/fr/photo/vue-dun-seul-lampadaire-noir-m%C3%A9tallique-debout-au-milieu-dun-parc-public-entour%C3%A9-de-divers.jpg?b=1&s=612x612&w=0&k=20&c=i6oF5k-G4IdM7I_n0ooEOTB4GVBOSY7BBbfOJ4xH2Ys=', '2024-02-20 11:32:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
