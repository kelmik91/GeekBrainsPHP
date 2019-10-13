-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 13 2019 г., 15:46
-- Версия сервера: 5.5.62
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(10) NOT NULL,
  `inform` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good`
--

INSERT INTO `good` (`id`, `name`, `price`, `inform`) VALUES
(1, 'Товар 1', 10, 'Тут информация по товару 1'),
(2, 'Товар 2', 20, 'Тут информация по товару 2'),
(3, 'Товар 3', 30, 'Тут информация по товару 3'),
(4, 'Товар 4', 40, 'Тут информация по товару 4'),
(5, 'ТОвар5', 50, 'Описание 5го товара'),
(6, 'Название', 123, 'Описание товара'),
(7, '123', 123, '123'),
(8, '321', 312, '123'),
(9, '1233', 333333, '33333333');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `item` varchar(255) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `totalPrice` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `login`, `status`, `item`, `phone`, `totalPrice`) VALUES
(1, 'admin', 'В обработке', '1', 99912345, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notName',
  `age` int(3) NOT NULL DEFAULT '18' COMMENT 'Возраст',
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `is_admin`) VALUES
(1, 'admin', '$2y$10$UKpJyiMnXKUzcLtbu.Mo2eWSLr/AiY3xFHDq4DtL07DRsV383q0uy', 'Саша31', 18, 1),
(2, 'Юзер', '$2y$10$UKpJyiMnXKUzcLtbu.Mo2eWSLr/AiY3xFHDq4DtL07DRsV383q0uy', 'Света', 28, 0),
(15, 'qwe', '$2y$10$UKpJyiMnXKUzcLtbu.Mo2eWSLr/AiY3xFHDq4DtL07DRsV383q0uy', 'notName', 18, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `good`
--
ALTER TABLE `good`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
