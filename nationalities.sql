-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Ned 08. čen 2025, 07:16
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
-- Struktura tabulky `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int NOT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `country_code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `nationalities`
--

INSERT INTO `nationalities` (`id`, `nationality`, `country_code`) VALUES
(1, 'Afghan', 'AF'),
(2, 'Albanian', 'AL'),
(3, 'Algerian', 'DZ'),
(4, 'American', 'US'),
(5, 'Andorran', 'AD'),
(6, 'Angolan', 'AO'),
(7, 'Antiguan and Barbudan', 'AG'),
(8, 'Argentine', 'AR'),
(9, 'Armenian', 'AM'),
(10, 'Australian', 'AU'),
(11, 'Austrian', 'AT'),
(12, 'Azerbaijani', 'AZ'),
(13, 'Bahamian', 'BS'),
(14, 'Bahraini', 'BH'),
(15, 'Bangladeshi', 'BD'),
(16, 'Barbadian', 'BB'),
(17, 'Belarusian', 'BY'),
(18, 'Belgian', 'BE'),
(19, 'Belizean', 'BZ'),
(20, 'Beninese', 'BJ'),
(21, 'Bhutanese', 'BT'),
(22, 'Bolivian', 'BO'),
(23, 'Bosnian', 'BA'),
(24, 'Botswanan', 'BW'),
(25, 'Brazilian', 'BR'),
(26, 'British', 'GB'),
(27, 'Bruneian', 'BN'),
(28, 'Bulgarian', 'BG'),
(29, 'Burkinabé', 'BF'),
(30, 'Burmese', 'MM'),
(31, 'Burundian', 'BI'),
(32, 'Cabo Verdean', 'CV'),
(33, 'Cambodian', 'KH'),
(34, 'Cameroonian', 'CM'),
(35, 'Canadian', 'CA'),
(36, 'Central African', 'CF'),
(37, 'Chadian', 'TD'),
(38, 'Chilean', 'CL'),
(39, 'Chinese', 'CN'),
(40, 'Colombian', 'CO'),
(41, 'Comoran', 'KM'),
(42, 'Congolese (Congo-Brazzaville)', 'CG'),
(43, 'Congolese (Congo-Kinshasa)', 'CD'),
(44, 'Costa Rican', 'CR'),
(45, 'Croatian', 'HR'),
(46, 'Cuban', 'CU'),
(47, 'Cypriot', 'CY'),
(48, 'Czech', 'CZ'),
(49, 'Danish', 'DK'),
(50, 'Djiboutian', 'DJ'),
(51, 'Dominican', 'DO'),
(52, 'Dutch', 'NL'),
(53, 'East Timorese', 'TL'),
(54, 'Ecuadorean', 'EC'),
(55, 'Egyptian', 'EG'),
(56, 'Salvadoran', 'SV'),
(57, 'Equatorial Guinean', 'GQ'),
(58, 'Eritrean', 'ER'),
(59, 'Estonian', 'EE'),
(60, 'Eswatini', 'SZ'),
(61, 'Ethiopian', 'ET'),
(62, 'Fijian', 'FJ'),
(63, 'Finnish', 'FI'),
(64, 'French', 'FR'),
(65, 'Gabonese', 'GA'),
(66, 'Gambian', 'GM'),
(67, 'Georgian', 'GE'),
(68, 'German', 'DE'),
(69, 'Ghanaian', 'GH'),
(70, 'Greek', 'GR'),
(71, 'Grenadian', 'GD'),
(72, 'Guatemalan', 'GT'),
(73, 'Guinean', 'GN'),
(74, 'Bissau-Guinean', 'GW'),
(75, 'Guyanese', 'GY'),
(76, 'Haitian', 'HT'),
(77, 'Honduran', 'HN'),
(78, 'Hungarian', 'HU'),
(79, 'Icelandic', 'IS'),
(80, 'Indian', 'IN'),
(81, 'Indonesian', 'ID'),
(82, 'Iranian', 'IR'),
(83, 'Iraqi', 'IQ'),
(84, 'Irish', 'IE'),
(85, 'Israeli', 'IL'),
(86, 'Italian', 'IT'),
(87, 'Ivorian', 'CI'),
(88, 'Jamaican', 'JM'),
(89, 'Japanese', 'JP'),
(90, 'Jordanian', 'JO'),
(91, 'Kazakh', 'KZ'),
(92, 'Kenyan', 'KE'),
(93, 'Kiribati', 'KI'),
(94, 'Kuwaiti', 'KW'),
(95, 'Kyrgyz', 'KG'),
(96, 'Lao', 'LA'),
(97, 'Latvian', 'LV'),
(98, 'Lebanese', 'LB'),
(99, 'Liberian', 'LR'),
(100, 'Libyan', 'LY'),
(101, 'Liechtensteiner', 'LI'),
(102, 'Lithuanian', 'LT'),
(103, 'Luxembourgish', 'LU'),
(104, 'Malagasy', 'MG'),
(105, 'Malawian', 'MW'),
(106, 'Malaysian', 'MY'),
(107, 'Maldivian', 'MV'),
(108, 'Malian', 'ML'),
(109, 'Maltese', 'MT'),
(110, 'Marshallese', 'MH'),
(111, 'Mauritanian', 'MR'),
(112, 'Mauritian', 'MU'),
(113, 'Mexican', 'MX'),
(114, 'Micronesian', 'FM'),
(115, 'Moldovan', 'MD'),
(116, 'Monégasque', 'MC'),
(117, 'Mongolian', 'MN'),
(118, 'Montenegrin', 'ME'),
(119, 'Moroccan', 'MA'),
(120, 'Mozambican', 'MZ'),
(121, 'Namibian', 'NA'),
(122, 'Nauruan', 'NR'),
(123, 'Nepalese', 'NP'),
(124, 'New Zealander', 'NZ'),
(125, 'Nicaraguan', 'NI'),
(126, 'Nigerien', 'NE'),
(127, 'Nigerian', 'NG'),
(128, 'North Korean', 'KP'),
(129, 'North Macedonian', 'MK'),
(130, 'Norwegian', 'NO'),
(131, 'Omani', 'OM'),
(132, 'Pakistani', 'PK'),
(133, 'Palauan', 'PW'),
(134, 'Palestinian', 'PS'),
(135, 'Panamanian', 'PA'),
(136, 'Papua New Guinean', 'PG'),
(137, 'Paraguayan', 'PY'),
(138, 'Peruvian', 'PE'),
(139, 'Philippine', 'PH'),
(140, 'Polish', 'PL'),
(141, 'Portuguese', 'PT'),
(142, 'Qatari', 'QA'),
(143, 'Romanian', 'RO'),
(144, 'Russian', 'RU'),
(145, 'Rwandan', 'RW'),
(146, 'Kittitian and Nevisian', 'KN'),
(147, 'Saint Lucian', 'LC'),
(148, 'Saint Vincentian', 'VC'),
(149, 'Samoan', 'WS'),
(150, 'San Marinese', 'SM'),
(151, 'Sao Tomean', 'ST'),
(152, 'Saudi', 'SA'),
(153, 'Senegalese', 'SN'),
(154, 'Serbian', 'RS'),
(155, 'Seychellois', 'SC'),
(156, 'Sierra Leonean', 'SL'),
(157, 'Singaporean', 'SG'),
(158, 'Slovak', 'SK'),
(159, 'Slovenian', 'SI'),
(160, 'Solomon Islander', 'SB'),
(161, 'Somali', 'SO'),
(162, 'South African', 'ZA'),
(163, 'South Korean', 'KR'),
(164, 'South Sudanese', 'SS'),
(165, 'Spanish', 'ES'),
(166, 'Sri Lankan', 'LK'),
(167, 'Sudanese', 'SD'),
(168, 'Surinamese', 'SR'),
(169, 'Swedish', 'SE'),
(170, 'Swiss', 'CH'),
(171, 'Syrian', 'SY'),
(172, 'Taiwanese', 'TW'),
(173, 'Tajik', 'TJ'),
(174, 'Tanzanian', 'TZ'),
(175, 'Thai', 'TH'),
(176, 'Togolese', 'TG'),
(177, 'Tongan', 'TO'),
(178, 'Trinidadian and Tobagonian', 'TT'),
(179, 'Tunisian', 'TN'),
(180, 'Turkish', 'TR'),
(181, 'Turkmen', 'TM'),
(182, 'Tuvaluan', 'TV'),
(183, 'Ugandan', 'UG'),
(184, 'Ukrainian', 'UA'),
(185, 'Emirati', 'AE'),
(186, 'Uruguayan', 'UY'),
(187, 'Uzbek', 'UZ'),
(188, 'Vanuatuan', 'VU'),
(189, 'Vatican', 'VA'),
(190, 'Venezuelan', 'VE'),
(191, 'Vietnamese', 'VN'),
(192, 'Yemeni', 'YE'),
(193, 'Zambian', 'ZM'),
(194, 'Zimbabwean', 'ZW');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
