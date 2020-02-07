-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 07 feb 2020 om 15:51
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Manege`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Bezoekers`
--

CREATE TABLE `Bezoekers` (
  `ID` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `telefoon` varchar(11) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Bezoekers`
--

INSERT INTO `Bezoekers` (`ID`, `naam`, `telefoon`, `adres`) VALUES
(21, 'Peter', '06-88337744', 'Bovenlangs 44'),
(24, 'Harry', '06-88325464', 'Merelpantsoen 22'),
(25, 'Mario', '06-99212333', 'Barneveldlaan 554'),
(26, 'Anton', '0612341122', 'Ellingtonstraat 25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Paarden`
--

CREATE TABLE `Paarden` (
  `ID` int(11) NOT NULL,
  `ras` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Paarden`
--

INSERT INTO `Paarden` (`ID`, `ras`, `naam`) VALUES
(3, 'Engelse', 'Krik'),
(4, 'Halfinger', 'Best'),
(5, 'Fjord', 'Test'),
(6, 'Fries', 'Jacky');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Rassen`
--

CREATE TABLE `Rassen` (
  `ID` int(11) NOT NULL,
  `ras` text NOT NULL,
  `naam` text NOT NULL,
  `schoft` float NOT NULL,
  `soort` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Rassen`
--

INSERT INTO `Rassen` (`ID`, `ras`, `naam`, `schoft`, `soort`) VALUES
(14, 'Arabier', 'Fred', 1.5, 'Paard'),
(15, 'Ardenner', 'Mono', 1.6, 'Paard'),
(16, 'Mustang', 'Ford', 1.4, 'Pony'),
(17, 'Fries', 'Leo', 1.7, 'Paard'),
(18, 'Halfinger', 'Kees', 1.43, 'Pony'),
(19, 'Engelse', 'Levi', 1.8, 'Paard'),
(20, 'New Forest', 'Hemp', 1.32, 'Pony'),
(21, 'Shetlander', 'Mini', 0.98, 'Pony'),
(22, 'Ijslander', 'Frost', 1.36, 'Pony'),
(23, 'Fjord', 'Alma', 1.3, 'Pony'),
(24, 'Tinker', 'Brain', 1.68, 'Paard'),
(27, 'daVinci', 'Teun', 3, 'Paard');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reserveringen`
--

CREATE TABLE `Reserveringen` (
  `ID` int(11) NOT NULL,
  `bezoeker` text DEFAULT NULL,
  `paard` text DEFAULT NULL,
  `datum` date NOT NULL,
  `start` int(11) DEFAULT NULL,
  `eind` int(11) DEFAULT NULL,
  `duur` int(11) DEFAULT NULL,
  `prijs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Reserveringen`
--

INSERT INTO `Reserveringen` (`ID`, `bezoeker`, `paard`, `datum`, `start`, `eind`, `duur`, `prijs`) VALUES
(21, 'Mario', 'Mono', '2020-05-02', 10, 20, 10, 550);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Bezoekers`
--
ALTER TABLE `Bezoekers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Paarden`
--
ALTER TABLE `Paarden`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Rassen`
--
ALTER TABLE `Rassen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Reserveringen`
--
ALTER TABLE `Reserveringen`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Bezoekers`
--
ALTER TABLE `Bezoekers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT voor een tabel `Paarden`
--
ALTER TABLE `Paarden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `Rassen`
--
ALTER TABLE `Rassen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT voor een tabel `Reserveringen`
--
ALTER TABLE `Reserveringen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
