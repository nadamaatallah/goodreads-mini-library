-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 12:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `email`, `date_inscription`) VALUES
(1, 'Dupont', 'Marie', 'marie.dupont@mail.com', '2026-01-10'),
(2, 'Martin', 'Ali', 'ali.martin@mail.com', '2026-02-05'),
(3, 'Bernard', 'Sarah', 'sarah.bernard@mail.com', '2026-02-18'),
(4, 'Leroy', 'Yasmine', 'yasmine.leroy@mail.com', '2026-03-02'),
(5, 'Moreau', 'Lucas', 'lucas.moreau@mail.com', '2026-03-15'),
(6, 'Petit', 'Nour', 'nour.petit@mail.com', '2026-03-20'),
(7, 'Garcia', 'Inès', 'ines.garcia@mail.com', '2026-03-25'),
(8, 'Benali', 'Youssef', 'youssef.benali@mail.com', '2026-03-28'),
(9, 'Robert', 'Clara', 'clara.robert@mail.com', '2026-04-01'),
(10, 'Nguyen', 'Lina', 'lina.nguyen@mail.com', '2026-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `nationalite`) VALUES
(1, 'Hugo', 'Victor', 'Française'),
(2, 'Camus', 'Albert', 'Française'),
(3, 'Dostoïevski', 'Fiodor', 'Russe'),
(4, 'Kafka', 'Franz', 'Tchèque'),
(5, 'Tolstoï', 'Léon', 'Russe'),
(6, 'Nietzsche', 'Friedrich', 'Allemande'),
(7, 'Platon', '', 'Grecque'),
(8, 'Sartre', 'Jean-Paul', 'Française'),
(9, 'Descartes', 'René', 'Française'),
(10, 'Rousseau', 'Jean-Jacques', 'Française'),
(11, 'Aristote', '', 'Grecque'),
(12, 'Kant', 'Immanuel', 'Allemande'),
(13, 'Hegel', 'Georg Wilhelm Friedrich', 'Allemande'),
(14, 'Heidegger', 'Martin', 'Allemande'),
(15, 'Simone de Beauvoir', '', 'Française'),
(16, 'Sénèque', '', 'Romaine'),
(17, 'Épicure', '', 'Grecque'),
(18, 'Montaigne', 'Michel de', 'Française'),
(19, 'Pascal', 'Blaise', 'Française'),
(20, 'Voltaire', '', 'Française');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour_prevue` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `id_adherent` int(11) DEFAULT NULL,
  `id_livre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `date_emprunt`, `date_retour_prevue`, `date_retour`, `id_adherent`, `id_livre`) VALUES
(1, '2026-04-01', '2026-04-15', NULL, 1, 5),
(2, '2026-04-03', '2026-04-17', '2026-04-10', 2, 3),
(3, '2026-04-05', '2026-04-19', NULL, 3, 13),
(4, '2026-04-06', '2026-04-20', NULL, 4, 19),
(5, '2026-04-08', '2026-04-22', '2026-04-18', 5, 1),
(6, '2026-04-09', '2026-04-23', NULL, 6, 8),
(7, '2026-04-10', '2026-04-24', NULL, 2, 15),
(8, '2026-04-11', '2026-04-25', '2026-04-16', 1, 9),
(9, '2026-04-12', '2026-04-26', NULL, 7, 23),
(10, '2026-04-12', '2026-04-26', NULL, 8, 25),
(11, '2026-04-13', '2026-04-27', '2026-04-20', 9, 31),
(12, '2026-04-13', '2026-04-27', NULL, 10, 41),
(13, '2026-04-14', '2026-04-28', NULL, 3, 39),
(14, '2026-04-14', '2026-04-28', NULL, 4, 35),
(15, '2026-04-15', '2026-04-29', '2026-04-21', 5, 29),
(16, '2026-04-15', '2026-04-29', NULL, 6, 33);

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `annee_publication` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `couverture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `genre`, `annee_publication`, `stock`, `id_auteur`, `couverture`) VALUES
(1, 'Les Misérables', 'Roman', 1862, 5, 1, 'images/covers/les-miserables.jpg'),
(2, 'Notre-Dame de Paris', 'Roman', 1831, 3, 1, 'images/covers/notre-dame-de-paris.jpg'),
(3, 'L\'Étranger', 'Roman philosophique', 1942, 4, 2, 'images/covers/etranger.jpg'),
(4, 'La Peste', 'Roman philosophique', 1947, 2, 2, 'images/covers/peste.jpg'),
(5, 'Crime et Châtiment', 'Roman philosophique', 1866, 5, 3, 'images/covers/crime-et-chatiment.jpg'),
(6, 'Les Frères Karamazov', 'Roman philosophique', 1880, 3, 3, 'images/covers/freres-karamazov.jpg'),
(7, 'L\'Idiot', 'Roman', 1869, 2, 3, 'images/covers/idiot.jpg'),
(8, 'Le Procès', 'Roman philosophique', 1925, 4, 4, 'images/covers/proces.jpg'),
(9, 'La Métamorphose', 'Nouvelle', 1915, 6, 4, 'images/covers/metamorphose.jpg'),
(10, 'Le Château', 'Roman', 1926, 2, 4, 'images/covers/chateau.jpg'),
(11, 'Guerre et Paix', 'Roman', 1869, 3, 5, 'images/covers/guerre-et-paix.jpg'),
(12, 'Anna Karénine', 'Roman', 1877, 3, 5, 'images/covers/anna-karenine.jpg'),
(13, 'Ainsi parlait Zarathoustra', 'Philosophie', 1883, 4, 6, 'images/covers/ainsi-parlait-zarathoustra.jpg'),
(14, 'Par-delà le bien et le mal', 'Philosophie', 1886, 2, 6, 'images/covers/par-dela-le-bien-et-le-mal.jpg'),
(15, 'La République', 'Philosophie', -380, 2, 7, 'images/covers/la-republique.jpg'),
(16, 'Le Banquet', 'Philosophie', -385, 2, 7, 'images/covers/le-banquet.jpg'),
(17, 'L\'Être et le Néant', 'Philosophie', 1943, 2, 8, 'images/covers/etre-et-le-neant.jpg'),
(18, 'Huis Clos', 'Théâtre philosophique', 1944, 3, 8, 'images/covers/huis-clos.jpg'),
(19, 'Discours de la méthode', 'Philosophie', 1637, 4, 9, 'images/covers/discours-de-la-methode.jpg'),
(20, 'Méditations métaphysiques', 'Philosophie', 1641, 2, 9, 'images/covers/meditations-metaphysiques.jpg'),
(21, 'Du contrat social', 'Philosophie politique', 1762, 3, 10, 'images/covers/du-contrat-social.jpg'),
(22, 'Émile ou De l\'éducation', 'Philosophie', 1762, 2, 10, 'images/covers/emile-ou-de-leducation.jpg'),
(23, 'Éthique à Nicomaque', 'Philosophie', -340, 3, 11, 'images/covers/ethique-a-nicomaque.jpg'),
(24, 'La Politique', 'Philosophie politique', -330, 2, 11, 'images/covers/la-politique.jpg'),
(25, 'Critique de la raison pure', 'Philosophie', 1781, 4, 12, 'images/covers/critique-de-la-raison-pure.jpg'),
(26, 'Critique de la raison pratique', 'Philosophie', 1788, 2, 12, 'images/covers/critique-de-la-raison-pratique.jpg'),
(27, 'Phénoménologie de l\'esprit', 'Philosophie', 1807, 2, 13, 'images/covers/phenomenologie-de-lesprit.jpg'),
(28, 'Principes de la philosophie du droit', 'Philosophie politique', 1820, 2, 13, 'images/covers/principes-de-la-philosophie-du-droit.jpg'),
(29, 'Être et Temps', 'Philosophie', 1927, 3, 14, 'images/covers/etre-et-temps.jpg'),
(30, 'Chemins qui ne mènent nulle part', 'Philosophie', 1950, 2, 14, 'images/covers/chemins-qui-ne-menent-nulle-part.jpg'),
(31, 'Le Deuxième Sexe', 'Philosophie', 1949, 4, 15, 'images/covers/le-deuxieme-sexe.jpg'),
(32, 'Pour une morale de l\'ambiguïté', 'Philosophie', 1947, 2, 15, 'images/covers/pour-une-morale-de-lambiguite.jpg'),
(33, 'De la brièveté de la vie', 'Philosophie', 49, 3, 16, 'images/covers/de-la-brievete-de-la-vie.jpg'),
(34, 'Lettres à Lucilius', 'Philosophie', 64, 3, 16, 'images/covers/lettres-a-lucilius.jpg'),
(35, 'Lettre à Ménécée', 'Philosophie', -300, 3, 17, 'images/covers/lettre-a-menecee.jpg'),
(36, 'Maximes capitales', 'Philosophie', -300, 2, 17, 'images/covers/maximes-capitales.jpg'),
(37, 'Essais', 'Philosophie', 1580, 5, 18, 'images/covers/essais.jpg'),
(38, 'Apologie de Raymond Sebond', 'Philosophie', 1580, 2, 18, 'images/covers/apologie-de-raymond-sebond.jpg'),
(39, 'Pensées', 'Philosophie', 1670, 4, 19, 'images/covers/pensees.jpg'),
(40, 'Les Provinciales', 'Philosophie religieuse', 1656, 2, 19, 'images/covers/les-provinciales.jpg'),
(41, 'Candide', 'Roman philosophique', 1759, 5, 20, 'images/covers/candide.jpg'),
(42, 'Traité sur la tolérance', 'Philosophie', 1763, 3, 20, 'images/covers/traite-sur-la-tolerance.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`);

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `id_auteur` (`id_auteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
