-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 mei 2023 om 16:50
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomski`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `content` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `tree_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `elements`
--

INSERT INTO `elements` (`id`, `type`, `content`, `class`, `tree_order`) VALUES
(1, 'MenuList', 'page_id', 'submenu', 10),
(2, 'Header', 'page_id', 'subheader', 11),
(3, 'Text', '1', 'hometext', 10),
(4, 'Text', '2', 'generaltext', 12),
(5, 'Text', '3', 'generaltext', 12),
(6, 'Text', '4', 'generaltext', 12),
(7, 'Text', '5', 'generaltext', 12),
(8, 'Text', '6', 'contacttext', 10),
(9, 'Form', 'page_id', 'contactform', 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name_EN` varchar(45) NOT NULL,
  `name_NL` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `name_EN`, `name_NL`) VALUES
(1, 0, 'Home', 'Home'),
(2, 0, 'Software Development', 'Software Ontwikkeling'),
(3, 0, 'Music', 'Muziek'),
(4, 0, 'Humor', 'Humor'),
(5, 0, 'Games', 'Spellen'),
(6, 0, 'Contact', 'Contact'),
(7, 2, 'General', 'Algemeen'),
(8, 2, 'Educom', 'Educom'),
(9, 2, 'Tomski.nl', 'Tomski.nl'),
(10, 3, 'General', 'Algemeen'),
(11, 3, 'GunZ of Boston', 'GunZ of Boston'),
(12, 3, 'My Songs', 'Mijn Liedjes'),
(13, 3, 'My Music', 'Mijn Muziek'),
(14, 4, 'General', 'Algemeen'),
(15, 4, 'Stand-up Comedy', 'Stand-up Comedy'),
(16, 4, 'Cartoons', 'Striptekeningen'),
(17, 5, 'General', 'Algemeen'),
(18, 5, 'Pokémon Tomski', 'Pokémon Tomski'),
(19, 5, 'Tom vs Giel', 'Tom vs Giel'),
(20, 5, 'Escaperoom', 'Escaperoom');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `page_elements`
--

CREATE TABLE `page_elements` (
  `page_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `page_elements`
--

INSERT INTO `page_elements` (`page_id`, `element_id`) VALUES
(1, 3),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(4, 2),
(4, 6),
(5, 1),
(5, 2),
(5, 7),
(6, 8),
(6, 9);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `page_elements`
--
ALTER TABLE `page_elements`
  ADD KEY `element_id` (`element_id`),
  ADD KEY `page_id` (`page_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `page_elements`
--
ALTER TABLE `page_elements`
  ADD CONSTRAINT `page_elements_ibfk_1` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `page_elements_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
