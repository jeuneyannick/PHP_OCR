--
-- Hôte : localhost
-- Généré le :  sam. 04 août 2018 à 12:43
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`, `date_chat`) VALUES
(1, 'Armand', 'Salut ', '2018-08-04 13:37:26'),
(2, 'Yannick ', 'Est-ce que ça fonctionne bien ?', '2018-08-04 13:42:27'),
(3, 'Armand ', 'Impeccable !', '2018-08-04 13:42:39'),
(4, 'Armand', 'Très bien !!', '2018-08-04 13:43:35'),
(5, 'Guillaume', 'Allez on arrête alors !! ', '2018-08-04 13:50:50'),
(6, 'Yannick', 'Juste un dernier test pour voir ', '2018-08-04 14:28:34'),
(7, 'Armand ', 'Oui bon ça va !! Allez', '2018-08-04 14:34:06'),
(8, 'Yannick', 'Il me faut quand 10 posts dont on continue encore un peu', '2018-08-04 14:40:17'),
(9, 'Armand', 'Tu fais chier !!', '2018-08-04 14:40:28'),
(10, 'Guillaume ', 'Ouais tu gaves !!', '2018-08-04 14:40:44'),
(11, 'Yannick ', 'Bah voila c\'est bon j\'en ai 10 mtn !!', '2018-08-04 14:41:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
