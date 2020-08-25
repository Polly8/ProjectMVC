-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2020 г., 12:48
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `text`, `date`, `id_user`) VALUES
(77, 'hello\r\n', '2020-08-23 18:34:18', 17),
(79, '12', '2020-08-23 18:38:13', 17),
(80, 'wrrr', '2020-08-23 18:39:03', 17),
(91, 'dwfe', '2020-08-24 00:34:33', 17),
(92, '1223', '2020-08-24 00:35:14', 17),
(93, '1223', '2020-08-24 00:49:54', 17),
(94, 'dwfeffw', '2020-08-25 07:43:39', 45),
(95, 'efewfewf', '2020-08-25 07:43:42', 45),
(96, 'ewgwtrg', '2020-08-25 08:02:51', 16),
(97, 'ewgwtrg', '2020-08-25 08:03:41', 16),
(98, 'ewgwtrg', '2020-08-25 08:03:45', 16),
(99, 'degre', '2020-08-25 08:03:49', 16),
(100, 'efwfgt', '2020-08-25 08:05:08', 16),
(101, 'grht', '2020-08-25 08:05:11', 16),
(102, 'grht', '2020-08-25 08:08:31', 16),
(103, 'dsdgrhtjthg', '2020-08-25 08:08:33', 16),
(104, 'dsdgrhtjthg', '2020-08-25 08:12:02', 16),
(105, 'fegresghd', '2020-08-25 08:12:05', 16),
(106, 'sfdghgfhjkj.lkj', '2020-08-25 08:13:13', 16),
(107, '123', '2020-08-25 08:14:22', 16),
(108, '123', '2020-08-25 09:19:10', 16),
(109, 'sfdghgfhjkj.lkj', '2020-08-25 09:19:42', 16),
(110, 'wdefgrtwegr', '2020-08-25 09:19:53', 16),
(111, 'wdefgrtwegr', '2020-08-25 09:26:56', 16),
(112, 'wdefgrtwegr', '2020-08-25 09:27:21', 16),
(113, 'wdefgrtwegr', '2020-08-25 09:28:10', 16),
(114, 'wdefgrtwegr', '2020-08-25 09:28:29', 16),
(115, 'wdefgrtwegr', '2020-08-25 09:28:36', 16),
(116, 'fgrhgd', '2020-08-25 09:28:43', 16),
(117, 'fgrhgd', '2020-08-25 09:28:48', 16),
(118, 'fgrhgd', '2020-08-25 09:28:54', 16),
(119, 'fgrhgd', '2020-08-25 09:29:18', 16),
(120, 'fgrhgd', '2020-08-25 09:29:22', 16),
(121, '1223', '2020-08-25 09:29:31', 16),
(122, 'qwrte', '2020-08-25 09:29:38', 16),
(123, 'e34', '2020-08-25 09:29:49', 16),
(133, 'ewerht', '2020-08-25 09:41:39', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Без имени',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `register_date`) VALUES
(14, 'Кевин', '453453466', 'fc8ad0377604df3511816f67f8467d3bc02574c7', '2020-08-22 00:58:11'),
(15, 'Кевин', 'gryeyt5y5ru', 'fc8ad0377604df3511816f67f8467d3bc02574c7', '2020-08-22 00:58:46'),
(16, 'Кевин', 'yo', 'f004188c7aadfa706bf1eea6fbaf7e545398fcec', '2020-08-22 01:20:56'),
(17, 'admin', 'admin@admin.ru', 'e39174050cf5173183db60123640d7c63bdc755f', '2020-08-22 21:44:31'),
(44, 'Alan', 'wlaker@mail.ru', '4775c1cafd9e10f20b1e77d7836294a2962b68a3', '2020-08-25 07:35:04'),
(45, 'Александр', 'yory', 'b4d5cbeee24e9c4e3713f460658bfdd9395e9630', '2020-08-25 07:42:47'),
(46, 'Yjk', 'fdgyht@fdgh.ru', 'b4d5cbeee24e9c4e3713f460658bfdd9395e9630', '2020-08-25 07:56:01'),
(47, 'fin', 'yofeger4553', 'ece18539e55480675c493d1ddde5f6d5a5099849', '2020-08-25 08:02:17'),
(48, 'Сергей', 'dfegrhtgfdsa', '6f1671a31eda62014fe9e8a599cdc07574f31bf3', '2020-08-25 08:04:18'),
(49, 'Abk', 'yodwefw', '6f1671a31eda62014fe9e8a599cdc07574f31bf3', '2020-08-25 08:12:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
