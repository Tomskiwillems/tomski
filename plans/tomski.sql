-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 jul 2023 om 16:21
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
-- Tabelstructuur voor tabel `container_elements`
--

CREATE TABLE `container_elements` (
  `page_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `tree_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `container_elements`
--

INSERT INTO `container_elements` (`page_id`, `container_id`, `element_id`, `tree_order`) VALUES
(0, 0, 1, 2),
(0, 0, 2, 3),
(0, 0, 3, 4),
(0, 0, 4, 5),
(0, 0, 23, 1),
(0, 1, 6, 1),
(0, 1, 7, 2),
(0, 4, 10, 1),
(0, 23, 24, 1),
(1, 3, 11, 1),
(1, 3, 14, 2),
(2, 3, 5, 3),
(2, 3, 11, 1),
(2, 3, 12, 2),
(2, 5, 13, 1),
(2, 5, 15, 2),
(3, 3, 5, 3),
(3, 3, 11, 1),
(3, 3, 12, 2),
(3, 5, 13, 1),
(3, 5, 16, 2),
(4, 3, 5, 3),
(4, 3, 11, 1),
(4, 3, 12, 2),
(4, 5, 13, 1),
(4, 5, 17, 2),
(5, 3, 5, 3),
(5, 3, 11, 1),
(5, 3, 12, 2),
(5, 5, 13, 1),
(5, 5, 18, 2),
(6, 3, 11, 1),
(6, 3, 19, 2),
(6, 3, 20, 3),
(7, 3, 5, 3),
(7, 3, 11, 1),
(7, 3, 12, 2),
(7, 5, 13, 1),
(7, 5, 15, 2),
(8, 3, 5, 3),
(8, 3, 11, 1),
(8, 3, 12, 2),
(8, 5, 13, 1),
(8, 5, 15, 2),
(9, 3, 5, 3),
(9, 3, 11, 1),
(9, 3, 12, 2),
(9, 5, 13, 1),
(9, 5, 21, 3),
(9, 5, 22, 2),
(10, 3, 5, 3),
(10, 3, 11, 1),
(10, 3, 12, 2),
(10, 5, 13, 1),
(10, 5, 15, 2),
(11, 3, 5, 3),
(11, 3, 11, 1),
(11, 3, 12, 2),
(11, 5, 13, 1),
(11, 5, 15, 2),
(12, 3, 5, 3),
(12, 3, 11, 1),
(12, 3, 12, 2),
(12, 5, 13, 1),
(12, 5, 15, 2),
(13, 3, 5, 3),
(13, 3, 11, 1),
(13, 3, 12, 2),
(13, 5, 13, 1),
(13, 5, 15, 2),
(14, 3, 5, 3),
(14, 3, 11, 1),
(14, 3, 12, 2),
(14, 5, 13, 1),
(14, 5, 15, 2),
(15, 3, 5, 3),
(15, 3, 11, 1),
(15, 3, 12, 2),
(15, 5, 13, 1),
(15, 5, 15, 2),
(16, 3, 5, 3),
(16, 3, 11, 1),
(16, 3, 12, 2),
(16, 5, 13, 1),
(16, 5, 15, 2),
(17, 3, 5, 3),
(17, 3, 11, 1),
(17, 3, 12, 2),
(17, 5, 13, 1),
(17, 5, 15, 2),
(18, 3, 5, 3),
(18, 3, 11, 1),
(18, 3, 12, 2),
(18, 5, 13, 1),
(18, 5, 15, 2),
(19, 3, 5, 3),
(19, 3, 11, 1),
(19, 3, 12, 2),
(19, 5, 13, 1),
(19, 5, 15, 2),
(20, 3, 5, 3),
(20, 3, 11, 1),
(20, 3, 12, 2),
(20, 5, 13, 1),
(20, 5, 15, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `elements`
--

INSERT INTO `elements` (`id`, `type`, `class`) VALUES
(1, 'Container', 'mainmenu'),
(2, 'Message', 'messages'),
(3, 'Container', 'pagecontent'),
(4, 'Footer', 'footer'),
(5, 'Container', 'subpagecontent'),
(6, 'MenuList', 'mainmenulist'),
(7, 'LanguageDropdown', 'mainmenudropdown'),
(10, 'Text', 'footertext'),
(11, 'Heading', 'mainheading'),
(12, 'MenuList', 'submenulist'),
(13, 'Heading', 'subheading'),
(14, 'Text', 'hometext'),
(15, 'Text', 'generaltext'),
(16, 'Text', 'generaltext'),
(17, 'Text', 'generaltext'),
(18, 'Text', 'generaltext'),
(19, 'Text', 'contacttext'),
(20, 'Form', 'contactform'),
(21, 'FileExplorer', 'file-explorer'),
(22, 'Text', 'tomski.nl-text'),
(23, 'Header', 'header'),
(24, 'Text', 'headertext');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `element_text`
--

CREATE TABLE `element_text` (
  `element_id` int(11) NOT NULL,
  `text_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `element_text`
--

INSERT INTO `element_text` (`element_id`, `text_id`) VALUES
(10, 42),
(14, 1),
(15, 43),
(16, 43),
(17, 43),
(18, 43),
(19, 6),
(22, 44),
(24, 32);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `files`
--

INSERT INTO `files` (`id`, `folder_id`, `name`) VALUES
(1, 1, 'index.php'),
(2, 4, 'AjaxController.php'),
(3, 4, 'BaseController.php'),
(4, 4, 'MainController.php'),
(5, 4, 'PageController.php'),
(6, 5, 'Crud.php'),
(7, 6, 'ElementFactory.php'),
(8, 6, 'FormFieldFactory.php'),
(9, 7, 'iAjaxFunction.php'),
(10, 7, 'iContainerElement.php'),
(11, 7, 'iController.php'),
(12, 7, 'iElement.php'),
(13, 7, 'iFormField.php'),
(14, 7, 'iFormValidate.php'),
(15, 7, 'iMultipleChoice.php'),
(16, 7, 'iValidate.php'),
(17, 8, 'PageModel.php'),
(18, 8, 'ValidateModel.php'),
(19, 9, 'Tools.php'),
(20, 12, 'javascript.js'),
(21, 13, 'stylesheet.css'),
(22, 14, 'BaseDatamodel.php'),
(23, 14, 'ElementDatamodel.php'),
(24, 14, 'FileDatamodel.php'),
(25, 14, 'FormDatamodel.php'),
(26, 14, 'OptionDatamodel.php'),
(27, 14, 'PageDatamodel.php'),
(28, 14, 'TextDatamodel.php'),
(29, 14, 'UserDatamodel.php'),
(30, 15, 'BaseAjaxFunction.php'),
(31, 15, 'NewPage.php'),
(32, 16, 'BaseValidate.php'),
(33, 16, 'ValidateContact.php'),
(34, 16, 'ValidateFormFields.php'),
(35, 16, 'ValidateLogin.php'),
(36, 16, 'ValidateRegister.php'),
(37, 17, 'BaseElement.php'),
(38, 17, 'BaseListElement.php'),
(39, 17, 'ContainerElement.php'),
(40, 17, 'DropdownElement.php'),
(41, 17, 'FileExplorerElement.php'),
(42, 17, 'FooterElement.php'),
(43, 17, 'FormElement.php'),
(44, 17, 'HeaderElement.php'),
(45, 17, 'HtmlDocument.php'),
(46, 17, 'LanguageDropdownElement.php'),
(47, 17, 'LinkListElement.php'),
(48, 17, 'MenuListElement.php'),
(49, 17, 'MessageElement.php'),
(50, 17, 'SelectedDropdownElement.php'),
(51, 17, 'TextElement.php'),
(52, 18, 'BaseField.php'),
(53, 18, 'BaseInputField.php'),
(54, 18, 'BaseMultipleChoiceField.php'),
(55, 18, 'CheckboxField.php'),
(56, 18, 'DropdownField.php'),
(57, 18, 'EmailField.php'),
(58, 18, 'NewPasswordField.php'),
(59, 18, 'PasswordField.php'),
(60, 18, 'TextareaField.php'),
(61, 18, 'TextField.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `folders`
--

INSERT INTO `folders` (`id`, `parent`, `name`) VALUES
(1, 0, 'tomski'),
(2, 1, '_src'),
(3, 1, 'assets'),
(4, 2, 'controllers'),
(5, 2, 'data_access'),
(6, 2, 'factories'),
(7, 2, 'interfaces'),
(8, 2, 'models'),
(9, 2, 'tools'),
(10, 2, 'views'),
(11, 3, 'images'),
(12, 3, 'scripts'),
(13, 3, 'stylesheets'),
(14, 5, 'datamodels'),
(15, 8, 'ajaxfunctions'),
(16, 8, 'validates'),
(17, 10, 'elements'),
(18, 10, 'formfields');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `formfields`
--

CREATE TABLE `formfields` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `label` int(11) NOT NULL,
  `placeholder` int(11) NOT NULL,
  `optional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `formfields`
--

INSERT INTO `formfields` (`id`, `name`, `type`, `label`, `placeholder`, `optional`) VALUES
(1, 'email', 'Email', 17, 21, 0),
(2, 'password', 'Password', 18, 22, 0),
(3, 'password', 'NewPassword', 18, 22, 0),
(4, 'name', 'Text', 16, 20, 0),
(5, 'message', 'Textarea', 19, 23, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `form_formfields`
--

CREATE TABLE `form_formfields` (
  `form_id` int(11) NOT NULL,
  `formfield_id` int(11) NOT NULL,
  `tree_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `form_formfields`
--

INSERT INTO `form_formfields` (`form_id`, `formfield_id`, `tree_order`) VALUES
(20, 1, 2),
(20, 4, 1),
(20, 5, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `languages`
--

CREATE TABLE `languages` (
  `id` varchar(2) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
('EN', 'English'),
('NL', 'Nederlands');

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
-- Tabelstructuur voor tabel `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `text_EN` text NOT NULL,
  `text_NL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `text`
--

INSERT INTO `text` (`id`, `text_EN`, `text_NL`) VALUES
(1, '<p>Welcome to the site of Tom Willems. Here you find a lot of information about what Tom does and what he has made.</p>', '<p>Welkom op de site van Tom Willems. Hier vind je allerlei informatie over wat Tom doet en wat hij gemaakt heeft.</p>'),
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
(35, 'My Music', 'Mijn Muziek'),
(36, 'Stand-up Comedy', 'Stand-up Comedy'),
(37, 'Cartoons', 'Striptekeningen'),
(38, 'Pokémon Tomski', 'Pokémon Tomski'),
(39, 'Tom vs Giel', 'Tom vs Giel'),
(40, 'Escaperoom', 'Escaperoom'),
(42, '<p>&copy; 2023 Tom Willems</p>', '<p>&copy; 2023 Tom Willems</p>'),
(43, '<p>This page is under construction.</p>', '<p>Deze pagina is onder constructie.</p>'),
(44, '<p>If you\'re interested in how this site is built or what my current process with programming is, you can browse the maps and files of this site.</p>', '<p>Als je benieuwd bent hoe deze site is opgebouwd of hoe ver ik ben met programmeren, je kunt de mappen en bestanden van deze site bekijken.</p>'),
(45, '<p>Thank you for your message. We will contact you as soon as possible.</p>', '<p>Bedankt voor uw bericht! Er wordt zo spoedig mogelijk contact met u opgenomen.</p>');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `container_elements`
--
ALTER TABLE `container_elements`
  ADD PRIMARY KEY (`page_id`,`container_id`,`element_id`),
  ADD KEY `container_id` (`container_id`),
  ADD KEY `element_id` (`element_id`);

--
-- Indexen voor tabel `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `element_text`
--
ALTER TABLE `element_text`
  ADD PRIMARY KEY (`element_id`,`text_id`),
  ADD KEY `text_id` (`text_id`);

--
-- Indexen voor tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexen voor tabel `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `formfields`
--
ALTER TABLE `formfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `form_formfields`
--
ALTER TABLE `form_formfields`
  ADD PRIMARY KEY (`form_id`,`formfield_id`),
  ADD KEY `formfield_id` (`formfield_id`);

--
-- Indexen voor tabel `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT voor een tabel `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `container_elements`
--
ALTER TABLE `container_elements`
  ADD CONSTRAINT `container_elements_ibfk_1` FOREIGN KEY (`container_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `container_elements_ibfk_2` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `container_elements_ibfk_3` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Beperkingen voor tabel `element_text`
--
ALTER TABLE `element_text`
  ADD CONSTRAINT `element_text_ibfk_1` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `element_text_ibfk_2` FOREIGN KEY (`text_id`) REFERENCES `text` (`id`);

--
-- Beperkingen voor tabel `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`);

--
-- Beperkingen voor tabel `form_formfields`
--
ALTER TABLE `form_formfields`
  ADD CONSTRAINT `form_formfields_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `form_formfields_ibfk_2` FOREIGN KEY (`formfield_id`) REFERENCES `formfields` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
