-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Ned 08. čen 2025, 07:17
-- Verze serveru: 8.4.3
-- Verze PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `webr6`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `r6_team`
--

CREATE TABLE `r6_team` (
  `team_id` int NOT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `coach` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `ranking` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `r6_team`
--

INSERT INTO `r6_team` (`team_id`, `team_name`, `coach`, `nationality`, `ranking`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Team BDS', 'Elemzje', 'France', 1, 0, 0, NULL),
(2, 'G2 Esports', 'Shas', 'Germany', 2, 0, 0, NULL),
(3, 'Wolves Esports', 'Spark', 'Europe', 3, 0, 0, NULL),
(4, 'Virtus.pro', 'Krasno', 'Russia', 4, 0, 0, NULL),
(5, 'KOI', 'Txmpe', 'Spain', 5, 0, 0, NULL),
(6, 'MNM Gaming', 'LeonGids', 'UK', 6, 0, 0, NULL),
(7, 'Natus Vincere (NAVI)', 'Saves', 'Ukraine', 7, 0, 0, NULL),
(8, 'Spacestation Gaming (SSG)', 'Lycan', 'USA', 8, 0, 0, NULL),
(9, 'DarkZero Esports (DZ)', 'Panbazou', 'USA', 9, 0, 0, NULL),
(10, 'Oxygen Esports', 'FoxA', 'USA', 10, 0, 0, NULL),
(11, 'M80', 'Rb', 'USA', 11, 0, 0, NULL),
(12, 'Soniqs', 'Supr', 'USA', 12, 0, 0, NULL),
(13, 'w7m esports', 'Rdking', 'Brazil', 13, 0, 0, NULL),
(14, 'Team Liquid', 'Paluh', 'Brazil', 14, 0, 0, NULL),
(15, 'FaZe Clan', 'Cyber', 'Brazil', 15, 0, 0, NULL),
(16, 'Los + oNe', 'Novys', 'Brazil', 16, 0, 0, NULL),
(17, 'FURIA Esports', 'Miracle', 'Brazil', 17, 0, 0, NULL),
(18, 'FURY', 'Derpeh', 'Australia', 18, 0, 0, NULL),
(19, 'Elevate', 'HysteRiX', 'Southeast Asia', 19, 0, 0, NULL),
(20, 'Dplus', 'EnvyTaylor', 'South Korea', 20, 0, 0, NULL),
(21, 'SCARZ', 'Gatorada', 'Japan', 21, 0, 0, NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `r6_team`
--
ALTER TABLE `r6_team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `r6_team`
--
ALTER TABLE `r6_team`
  MODIFY `team_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
