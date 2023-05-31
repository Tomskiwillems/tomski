-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mei 2023 om 10:19
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

CREATE DATABASE `tomski`;
USE `tomski`;

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
-- Tabelstructuur voor tabel `formfields`
--

CREATE TABLE `formfields` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `label` int(11) NOT NULL,
  `placeholder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `formfields`
--

INSERT INTO `formfields` (`id`, `name`, `type`, `label`, `placeholder`) VALUES
(1, 'email', 'email', 17, 21),
(2, 'password', 'password', 18, 22),
(3, 'password', 'newpassword', 18, 22),
(4, 'name', 'text', 16, 20),
(5, 'message', 'textarea', 19, 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `name`) VALUES
(1, 0, 24),
(2, 0, 25),
(3, 0, 26),
(4, 0, 27),
(5, 0, 28),
(6, 0, 29),
(7, 2, 30),
(8, 2, 31),
(9, 2, 32),
(10, 3, 30),
(11, 3, 33),
(12, 3, 34),
(13, 3, 35),
(14, 4, 30),
(15, 4, 36),
(16, 4, 37),
(17, 5, 30),
(18, 5, 38),
(19, 5, 39),
(20, 5, 40);

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `page_formfields`
--

CREATE TABLE `page_formfields` (
  `page_id` int(11) NOT NULL,
  `formfield_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `page_formfields`
--

INSERT INTO `page_formfields` (`page_id`, `formfield_id`) VALUES
(6, 4),
(6, 1),
(6, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `text_1` text NOT NULL,
  `text_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `text`
--

INSERT INTO `text` (`id`, `text_1`, `text_2`) VALUES
(1, '<p>Welcome to the site of Tom Willems. Here you find a lot of information about what Tom does and what he has made.</p>', '<p>Welcome op de site van Tom Willems. Hier vind je allerlei informatie over wat Tom doet en wat hij gemaakt heeft.</p>'),
(2, '<p>General text for software development.</p>', '<p>Algemene tekst voor software ontwikkeling.</p>'),
(3, '<p>General text for music.</p>', '<p>Algemene tekst voor muziek.</p>'),
(4, '<p>General text for humor.</p>', '<p>Algemene tekst voor humor.</p>'),
(5, '<p>General text for games.</p>', '<p>Algemene tekst voor spellen.</p>'),
(6, '<p>If you would like to ask me a question or contact me for any other reason, please fill in the form below.</p>', '<p>Als je mij een vraag wilt stellen of om een andere reden contact met mij wilt opnemen, vul dan het onderstaande formulier in.</p>'),
(7, '<p>You are succesfully logged in.</p>', '<p>U bent succesvol ingelogd.</p>'),
(8, '<p>Password is incorrect.</p>', '<p>Wachtwoord is onjuist.</p>'),
(9, '<p>There is no user registered with that email adress</p>', '<p>Er is geen gebruiker geregistreerd met dat e-mailadres.</p>'),
(10, '<p>You are successfully registered.</p>', '<p>U bent succesvol geregistreerd.</p>'),
(11, '<p>This email adress is already registered.</p>', '<p>Dit e-mailadres is al geregistreerd.</p>'),
(12, '<p>You are successfully logged out.</p>', '<p>U bent succesvol uitgelogd.</p>'),
(13, '<p>Invalid e-mail format.</p>', '<p>Ongeldig e-mailadres.</p>'),
(14, '<p>Passwords do not match.</p>', '<p>Wachtwoorden zijn niet identiek.</p>'),
(15, '<p>Passwords need to contain at least 8 characters with at least 1 uppercase, 1 lowercase and 1 number.</p>', '<p>Wachtwoorden moeten bestaan uit minimaal 8 karakters, waarvan minstens 1 hoofdletter, 1 kleine letter en 1 cijfer.</p>'),
(16, 'Name', 'Naam'),
(17, 'Email', 'E-mail'),
(18, 'Password', 'Wachtwoord'),
(19, 'Message', 'Bericht'),
(20, 'Enter your name', 'Vul uw naam in'),
(21, 'Enter your email', 'Vul uw e-mail in'),
(22, 'Enter your password', 'Vul uw wachtwoord in'),
(23, 'Enter your message', 'Vul uw bericht in'),
(24, 'Home', 'Home'),
(25, 'Software Development', 'Software Ontwikkeling'),
(26, 'Music', 'Muziek'),
(27, 'Humor', 'Humor'),
(28, 'Games', 'Spellen'),
(29, 'Contact', 'Contact'),
(30, 'General', 'Algemeen'),
(31, 'Educom', 'Educom'),
(32, 'Tomski.nl', 'Tomski.nl'),
(33, 'GunZ of Boston', 'GunZ of Boston'),
(34, 'My Songs', 'Mijn Liedjes'),
(35, 'Mijn Muziek', 'My Music'),
(36, 'Stand-up Comedy', 'Stand-up Comedy'),
(37, 'Cartoons', 'Striptekeningen'),
(38, 'Pokémon Tomski', 'Pokémon Tomski'),
(39, 'Tom vs Giel', 'Tom vs Giel'),
(40, 'Escaperoom', 'Escaperoom');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `formfields`
--
ALTER TABLE `formfields`
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
-- Indexen voor tabel `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `formfields`
--
ALTER TABLE `formfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
