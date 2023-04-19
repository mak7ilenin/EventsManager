-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 15 2023 г., 07:39
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

INSERT INTO `events` (`id`, `title`, `image`, `date_event`,  `aadress`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Saksamaa kultuuriõhtu', 'saksamaa_kultuurikas.jpg', '2023-02-14',  'Mähe Vaba Aja Keskus, Mugula tee 17a, 11913 Tallinn, Eesti', 'Sellel korral räägime kultuuriõhtul Saksamaast ning valmistame maitsvaid südamekujulisi küpsiseid', '2023-01-04', '2023-01-04'),
(2, 'Sõbrapäeva üritustenädal', 'Sobrapaev.jpg', '2023-02-15', 'Tallinn', 'Sõbrapäeva nädalal on tegemist kuhjaga - leia endale sobivaimad üritused meie valikust', '2023-01-04', '2023-01-04'),
(3, 'Teeme koos tsirkust', 'tsirkus.jpg', '2023-03-29', 'Nõmme kultuurikeskus, Turu plats 2, Tallinn', 'Hea tuju meister Alex, seebimulliprintsess Katarina ja nutikas koer Ginny, kutsuvad kõiki endaga koos 2020 aasta parimat tsirkuseshowd tegema!\r\nKavas on erilised seebimullitrikid, žongleeerimine, mustkunstimaagia ja koerte vabastiil.\r\nTegevusse kaasatakse ka publik ning lapsed saavad mitmeid trikke ise proovida.\r\n', '2023-01-04', '2023-01-04'),
(4, 'Kirbuturg Pirita Vaba Aja Keskuses', 'Kirbuturg.jpg', '2023-03-14', 'Pirita Vaba Aja Keskus, Loodussõbralik ja popp taaskasutus', 'Varakevadine Kirbuturg Pirita Vaba Aja Keskuses toimub 14. märtsil kell 10.30-13.30.\r\nKirbuturule ootame kauplema kasutatud riiete, jalatsite, lastekaupade, mänguasjade, omavalmistatud käsitöö, raamatute, kodukaupade, aiasaaduste, vanavara ja muu seisma jäänud kila kolaga.\r\n', '2023-01-04', '2023-01-04'),
(5, 'Näitus Minu vaba riik', 'naitus.jpg', '2023-04-14', 'Pirita tee 56e, Tallinn', 'Eesti Vabariigi 100. sünnipäeva näitus Eesti Ajaloomuuseumis ootab kõiki külla Maarjamäe lossi alates 15. veebruarist 2018. Avasta aja lugu!\r\n', '2023-01-04', '2023-01-04'),
(6, 'KUMU sünnipäev', 'kumu.png', '2023-05-15', 'Kumu kunstimuuseum A. Weizenbergi 34, 10127 Tallinn, Eesti', 'Kumu kunstimuuseum tähistab 15.–16. veebruaril oma 14. sünnipäeva! Kumu sõpru ootavad sel nädalavahetusel erikeeltes näitusetutvustused, kunstiraamatu- ja disainimüük, loomingulised töötoad jpm.\r\n', '2023-01-04', '2023-01-04');

-- --------------------------------------------------------

--
-- Структура таблицы `register_events`
--

CREATE TABLE `register_events` (
  `id` int(11) NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_members` int(4) NOT NULL,
  `events_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('user','admin','manager') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin@events.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'admin', 'admin', '2023-01-04', '2023-01-04'),
(2, 'manager@events.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'manager', 'manager', '2023-01-04', '2023-01-04'),
(3, 'user@events.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'user', 'user', '2023-01-04', '2022-01-05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register_events`
--
ALTER TABLE `register_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id` (`events_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `register_events`
--
ALTER TABLE `register_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `register_events`
--
ALTER TABLE `register_events`
  ADD CONSTRAINT `register_events_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
