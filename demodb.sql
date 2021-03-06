-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 26 2017 г., 10:25
-- Версия сервера: 5.7.14
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `demodb`
--
CREATE DATABASE IF NOT EXISTS `demodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demodb`;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_description` text NOT NULL,
  `article_news_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_description`, `article_news_id`) VALUES
(1, 'The Best 4K, 1440p, And 1080p Gaming Monitor Black Friday 2017 Deals', 'With 4K on the rise and high refresh rate becoming more common, now is a good to time take a look at gaming monitors. These displays packed with great specs have become more affordable, even moreso with Black Friday sales going on now. So, we took a look at several retailers to find the best deals on PC gaming monitors. Note that some of these items may run out of stock during the course of these sales.', 1),
(2, 'PS4 Pro Discounted To $350 At GameStop And Walmart Right Now For Black Friday 2017', 'Black Friday 2017 is right around the corner, and we\'ve gotten a look at the deals many retailers will offer this year. And while it initially seemed like there wouldn\'t be any deals for Sony\'s 4K-capable PlayStation 4 Pro, GameStop\'s ad has revealed it will be on sale for $350. The deal is available right now.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_date` date NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `news_date`, `news_name`, `news_description`) VALUES
(1, '2017-11-05', 'The Best 4K Monitor', 'The Best 4K, 1440p, And 1080p Gaming Monitor Black Friday 2017 Deals'),
(2, '2017-11-09', 'PS4 Pro', 'PS4 Pro Discounted To $350 At GameStop And Walmart Right Now For Black Friday 2017');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`) VALUES
(1, 'root', '0000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`,`article_news_id`) USING BTREE,
  ADD KEY `article_news_id` (`article_news_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
