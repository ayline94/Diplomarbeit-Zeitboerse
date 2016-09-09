-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 09. Sep 2016 um 22:33
-- Server-Version: 5.6.25
-- PHP-Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `zeitboerse01`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebot`
--

CREATE TABLE `angebot` (
  `id` int(11) NOT NULL,
  `titel` varchar(30) DEFAULT NULL,
  `erstelltAm` date DEFAULT NULL,
  `erledigt` varchar(10) DEFAULT NULL,
  `zeitgebrauch` double DEFAULT NULL,
  `mitglieder_id` int(11) DEFAULT NULL,
  `kategorie_id` int(11) DEFAULT NULL,
  `ort_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `angebot`
--

INSERT INTO `angebot` (`id`, `titel`, `erstelltAm`, `erledigt`, `zeitgebrauch`, `mitglieder_id`, `kategorie_id`, `ort_id`) VALUES
(1, 'Rasen mähen', NULL, NULL, NULL, 58, NULL, NULL),
(2, 'Rasen mähen', NULL, NULL, NULL, 58, NULL, NULL),
(3, 'Programmieren beibringen', NULL, NULL, NULL, 59, NULL, NULL),
(4, 'Programmieren beibringen', NULL, NULL, NULL, 59, NULL, NULL),
(5, 'Autoreifen wechseln', NULL, NULL, NULL, 59, NULL, NULL),
(6, 'Fenster putzen', NULL, NULL, NULL, 59, NULL, NULL),
(7, 'Autoreifen wechseln', NULL, NULL, NULL, 59, NULL, NULL),
(8, 'Fenster putzen', NULL, NULL, NULL, 59, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `idkategorie` int(11) NOT NULL,
  `kategorie` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglieder`
--

CREATE TABLE `mitglieder` (
  `id` int(11) NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `email` text NOT NULL,
  `passwort` text NOT NULL,
  `profilbild_pfad` varchar(100) NOT NULL,
  `geburtsdatum` date NOT NULL,
  `strasse` varchar(45) DEFAULT NULL,
  `plz` int(11) NOT NULL,
  `ort_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mitglieder`
--

INSERT INTO `mitglieder` (`id`, `vorname`, `nachname`, `email`, `passwort`, `profilbild_pfad`, `geburtsdatum`, `strasse`, `plz`, `ort_id`) VALUES
(53, 'Jana', 'Labinot', 'jana.heeb@gmail.com', 'b193232745ae4650125f727e5f8e9064', 'uploads/36619285.JPG', '1994-09-07', 'dsfdsf', 9999, 10),
(58, 'Jana 58', 'Hartl', 'jana.heeb@wecando.ch', '060525e58ef32b594244ec25fbcef61d', 'uploads/526549808.jpg', '1994-09-07', 'NeugrÃ¼ttstrasse 1B', 9436, 4),
(59, 'Jana', 'Heeb', 'ayline', '060525e58ef32b594244ec25fbcef61d', 'uploads/106022241.jpg', '1994-09-07', 'NeugrÃ¼ttstrasse 1B', 9436, 17),
(60, 'Brida', 'Carigiet', 'b.carigiet@bluewin.ch', '460e7f20a04e298abeb953e505893566', 'uploads/315197949.jpg', '1994-09-09', 'Strasse 12', 9430, 3),
(61, 'weqrewr', 'weqrewr', 'ayline', '060525e58ef32b594244ec25fbcef61d', 'uploads/1992311551.JPG', '2017-08-20', 'qwerewr', 0, 3),
(62, 'weqrewr', 'weqrewr', 'ayline', '060525e58ef32b594244ec25fbcef61d', 'uploads/1992311551.JPG', '2017-08-20', 'qwerewr', 0, 18),
(77, 'Michelle', 'Roux', '', '060525e58ef32b594244ec25fbcef61d', 'uploads/730787162.JPG', '2016-08-15', '56', 45645, 19),
(78, 'Michelle', 'Roux', '', '060525e58ef32b594244ec25fbcef61d', 'uploads/730787162.JPG', '2016-08-15', '56', 45645, 11),
(79, 'Sabrina', 'Maier', 'test@test.ch', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/402706385.JPG', '2010-05-05', 'Strasse 123', 9430, 5),
(80, 'Ayline', 'MÃ¼ller', 'ayline', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/1192427732.jpg', '2011-09-09', 'Bergstrasse 435', 9047, 6),
(91, 'Jana', 'He5', 'jana.heeb@gmail.ch', '6074c6aa3488f3c2dddff2a7ca821aab', 'uploads/1686657150.png', '2016-09-07', 'r', 9830, 19);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `plz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ort`
--

INSERT INTO `ort` (`id`, `name`, `plz_id`) VALUES
(3, 'St. Margrethen', NULL),
(4, 'Balgach', NULL),
(5, 'Altst&auml;tten', NULL),
(6, 'Berneck', NULL),
(7, 'Au', NULL),
(8, 'Diepoldsau', NULL),
(9, 'Eichberg', NULL),
(10, 'Marbach', NULL),
(11, 'Oberriet (SG)', NULL),
(12, 'Rebstein', NULL),
(13, 'Rheineck', NULL),
(14, 'R&uuml;thi', NULL),
(15, 'Widnau', NULL),
(16, 'L&uuml;chingen', NULL),
(17, 'Kriessern', NULL),
(18, 'Montlingen', NULL),
(19, 'Heerbrugg', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `plz`
--

CREATE TABLE `plz` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `plz`
--

INSERT INTO `plz` (`id`, `name`) VALUES
(1, 9450),
(2, 9434),
(3, 9435),
(4, 9444),
(5, 9453),
(6, 9437);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `angebot`
--
ALTER TABLE `angebot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_angebot_Mitglieder1_idx` (`mitglieder_id`),
  ADD KEY `fk_angebot_kategorie1_idx` (`kategorie_id`),
  ADD KEY `fk_angebot_ort1_idx` (`ort_id`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idkategorie`);

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mitglieder_ort1_idx` (`ort_id`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `plz`
--
ALTER TABLE `plz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `angebot`
--
ALTER TABLE `angebot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idkategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT für Tabelle `ort`
--
ALTER TABLE `ort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `plz`
--
ALTER TABLE `plz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `angebot`
--
ALTER TABLE `angebot`
  ADD CONSTRAINT `fk_angebot_Mitglieder1` FOREIGN KEY (`mitglieder_id`) REFERENCES `mitglieder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_angebot_kategorie1` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`idkategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_angebot_ort1` FOREIGN KEY (`ort_id`) REFERENCES `ort` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD CONSTRAINT `fk_mitglieder_ort1` FOREIGN KEY (`ort_id`) REFERENCES `ort` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
