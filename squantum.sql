-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 26 2016 г., 12:39
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `squantum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` tinyint(3) NOT NULL,
  `city_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'Москва'),
(2, 'Санкт Петербург'),
(3, 'Анапа'),
(4, 'Белгород'),
(5, 'Великий Новгород'),
(6, 'Волгоград'),
(7, 'Волгодонск'),
(8, 'Воронеж'),
(9, 'Железногорск'),
(10, 'Жуковка'),
(11, 'Задонск'),
(12, 'Зеленогорск'),
(13, 'Зеленоград'),
(14, 'Ивангород'),
(15, 'Калуга'),
(16, 'Камышин'),
(17, 'Киров'),
(18, 'Колпино'),
(19, 'Макаров');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) NOT NULL,
  `username` varchar(128) NOT NULL,
  `id_city` tinyint(3) NOT NULL,
  `phone` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `id_city`, `phone`) VALUES
(3, 'Исакжанов Рустам', 2, '7909579588'),
(5, 'Исакжанов Булат', 1, '89111579933'),
(20, 'Горенко Артур Бернаннович', 17, '79652345789'),
(43, 'Петренко Иосиф', 6, '79786445573');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
