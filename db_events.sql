-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2023 г., 09:17
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_events`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_event` date NOT NULL DEFAULT current_timestamp(),
  `aadress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `date_event`, `aadress`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Saksamaa kultuuriõhtu', 'saksamaa_kultuurikas.jpg', '2023-02-14', 'Mähe Vaba Aja Keskus, Mugula tee 17a, 11913 Tallinn, Eesti', 'Sellel korral räägime kultuuriõhtul Saksamaast ning valmistame maitsvaid südamekujulisi küpsiseid', '2023-01-04', '2023-01-04'),
(2, 'Sõbrapäeva üritustenädal', 'Sobrapaev.jpg', '2023-02-15', 'Tallinn', 'Sõbrapäeva nädalal on tegemist kuhjaga - leia endale sobivaimad üritused meie valikust', '2023-01-04', '2023-01-04'),
(3, 'Teeme koos tsirkust', 'tsirkus.jpg', '2023-03-29', 'Nõmme kultuurikeskus, Turu plats 2, Tallinn', 'Hea tuju meister Alex, seebimulliprintsess Katarina ja nutikas koer Ginny, kutsuvad kõiki endaga koos 2020 aasta parimat tsirkuseshowd tegema!\r\nKavas on erilised seebimullitrikid, žongleeerimine, mustkunstimaagia ja koerte vabastiil.\r\nTegevusse kaasatakse ka publik ning lapsed saavad mitmeid trikke ise proovida.\r\n', '2023-01-04', '2023-01-04'),
(4, 'Kirbuturg Pirita Vaba Aja Keskuses', 'Kirbuturg.jpg', '2023-03-14', 'Pirita Vaba Aja Keskus, Loodussõbralik ja popp taaskasutus', 'Varakevadine Kirbuturg Pirita Vaba Aja Keskuses toimub 14. märtsil kell 10.30-13.30.\r\nKirbuturule ootame kauplema kasutatud riiete, jalatsite, lastekaupade, mänguasjade, omavalmistatud käsitöö, raamatute, kodukaupade, aiasaaduste, vanavara ja muu seisma jäänud kila kolaga.\r\n', '2023-01-04', '2023-04-25'),
(5, 'Näitus Minu vaba riik', 'naitus.jpg', '2023-04-14', 'Pirita tee 56e, Tallinn', 'Eesti Vabariigi 100. sünnipäeva näitus Eesti Ajaloomuuseumis ootab kõiki külla Maarjamäe lossi alates 15. veebruarist 2018. Avasta aja lugu!\r\n', '2023-01-04', '2012-01-04'),
(6, 'KUMU sünnipäev', 'kumu.png', '2023-05-15', 'Kumu kunstimuuseum A. Weizenbergi 34, 10127 Tallinn, Eesti', 'Kumu kunstimuuseum tähistab 15.–16. veebruaril oma 14. sünnipäeva! Kumu sõpru ootavad sel nädalavahetusel erikeeltes näitusetutvustused, kunstiraamatu- ja disainimüük, loomingulised töötoad jpm.\r\n', '2023-01-04', '2023-04-21'),
(7, 'sdfgsdfgsdfg', '28a6e4f4c3499068658a3e8c5121e9b5.png', '2023-04-05', 'sdfgsdfg', 'sdgdsfgsdfg', '2023-04-12', '2021-04-14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
