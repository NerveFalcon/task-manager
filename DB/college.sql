-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 22 2021 г., 11:24
-- Версия сервера: 5.7.24
-- Версия PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `college`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rank`
--

CREATE TABLE `rank` (
  `id_head` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Ожидается'),
(2, 'В работе'),
(3, 'На проверке'),
(4, 'Выполнена'),
(5, 'Черновик');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `file_way` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `id_from`, `title`, `text`, `deadline`, `file_way`, `id_status`) VALUES
(1, 1, 'tittle1', 'teteteteette', '2021-11-01', 'fileWay1', 1),
(2, 1, 'tittle1', '5', '2021-11-01', 'fileWay1', 5),
(3, 2, 'tittle2', '10', '2021-11-02', 'fileWay2', 5),
(4, 3, 'tittle3', '15', '2021-11-03', 'fileWay3', 5),
(5, 4, 'tittle4', '20', '2021-11-04', 'fileWay4', 5),
(6, 5, 'tittle5', '25', '2021-11-05', 'fileWay5', 5),
(7, 6, 'tittle6', '30', '2021-11-06', 'fileWay6', 5),
(8, 7, 'tittle7', '35', '2021-11-07', 'fileWay7', 5),
(9, 8, 'tittle8', '40', '2021-11-08', 'fileWay8', 5),
(10, 9, 'tittle9', '45', '2021-11-09', 'fileWay9', 5),
(11, 10, 'tittle10', '50', '2021-11-10', 'fileWay10', 5),
(12, 11, 'tittle11', '55', '2021-11-11', 'fileWay11', 5),
(13, 12, 'tittle12', '60', '2021-11-12', 'fileWay12', 5),
(14, 13, 'tittle13', '65', '2021-11-13', 'fileWay13', 5),
(15, 14, 'tittle14', '70', '2021-11-14', 'fileWay14', 5),
(16, 15, 'tittle15', '75', '2021-11-15', 'fileWay15', 5),
(17, 16, 'tittle16', '80', '2021-11-16', 'fileWay16', 5),
(18, 17, 'tittle17', '85', '2021-11-17', 'fileWay17', 5),
(19, 18, 'tittle18', '90', '2021-11-18', 'fileWay18', 5),
(20, 19, 'tittle19', '95', '2021-11-19', 'fileWay19', 5),
(21, 20, 'tittle20', '100', '2021-11-20', 'fileWay20', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `fio`) VALUES
(1, '111@gmail.com', '111', '1 1ов 1ович'),
(2, '111@gmail.com', '111', '1 1ов 1ович'),
(3, '111@gmail.com', '111', '1 1ов 1ович'),
(4, '222@gmail.com', '222', '2 2ов 2ович'),
(5, '333@gmail.com', '333', '3 3ов 3ович'),
(6, '444@gmail.com', '444', '4 4ов 4ович'),
(7, '555@gmail.com', '555', '5 5ов 5ович'),
(8, '666@gmail.com', '666', '6 6ов 6ович'),
(9, '777@gmail.com', '777', '7 7ов 7ович'),
(10, '888@gmail.com', '888', '8 8ов 8ович'),
(11, '999@gmail.com', '999', '9 9ов 9ович'),
(12, '101010@gmail.com', '101010', '10 10ов 10ович'),
(13, '111@gmail.com', '111', '1 1ов 1ович'),
(14, '222@gmail.com', '222', '2 2ов 2ович'),
(15, '333@gmail.com', '333', '3 3ов 3ович'),
(16, '444@gmail.com', '444', '4 4ов 4ович'),
(17, '555@gmail.com', '555', '5 5ов 5ович'),
(18, '666@gmail.com', '666', '6 6ов 6ович'),
(19, '777@gmail.com', '777', '7 7ов 7ович'),
(20, '888@gmail.com', '888', '8 8ов 8ович'),
(21, '999@gmail.com', '999', '9 9ов 9ович'),
(22, '101010@gmail.com', '101010', '10 10ов 10ович');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id_task` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id_task`, `id`) VALUES
(3, 1),
(4, 1),
(6, 1),
(10, 1),
(12, 1),
(14, 1),
(15, 1),
(20, 1),
(3, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(14, 2),
(18, 2),
(20, 2),
(5, 3),
(8, 3),
(9, 3),
(11, 3),
(14, 3),
(20, 3),
(1, 4),
(5, 4),
(6, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(18, 4),
(20, 4),
(21, 4),
(3, 5),
(5, 5),
(6, 5),
(8, 5),
(15, 5),
(18, 5),
(19, 5),
(20, 5),
(5, 6),
(6, 6),
(12, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(1, 7),
(3, 7),
(7, 7),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(1, 8),
(4, 8),
(6, 8),
(7, 8),
(8, 8),
(11, 8),
(18, 8),
(3, 9),
(6, 9),
(7, 9),
(9, 9),
(11, 9),
(12, 9),
(20, 9),
(2, 10),
(6, 10),
(7, 10),
(11, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(20, 10),
(1, 11),
(2, 11),
(4, 11),
(8, 11),
(9, 11),
(12, 11),
(16, 11),
(18, 11),
(20, 11),
(21, 11),
(1, 12),
(2, 12),
(6, 12),
(12, 12),
(2, 13),
(5, 13),
(10, 13),
(12, 13),
(15, 13),
(20, 13),
(21, 13),
(1, 14),
(3, 14),
(6, 14),
(11, 14),
(12, 14),
(16, 14),
(18, 14),
(19, 14),
(3, 15),
(4, 15),
(7, 15),
(8, 15),
(12, 15),
(21, 15),
(4, 16),
(6, 16),
(13, 16),
(15, 16),
(17, 16),
(18, 16),
(19, 16),
(21, 16),
(8, 17),
(16, 17),
(1, 18),
(8, 18),
(11, 18),
(12, 18),
(13, 18),
(15, 18),
(21, 18),
(1, 19),
(2, 19),
(5, 19),
(6, 19),
(19, 19),
(21, 19),
(3, 20),
(4, 20),
(7, 20),
(8, 20),
(14, 20),
(15, 20),
(17, 20),
(18, 20),
(21, 20),
(2, 21),
(8, 21),
(10, 21),
(20, 21),
(2, 22),
(4, 22),
(5, 22),
(6, 22),
(11, 22),
(14, 22),
(15, 22),
(18, 22),
(19, 22),
(20, 22);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_from` (`id_from`),
  ADD KEY `id_task` (`id_task`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rank`
--
ALTER TABLE `rank`
  ADD KEY `id_head` (`id_head`),
  ADD KEY `id_sub` (`id_sub`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_from` (`id_from`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD UNIQUE KEY `id_task` (`id_task`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id`) REFERENCES `posts` (`id`);

--
-- Ограничения внешнего ключа таблицы `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_head`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_sub`) REFERENCES `posts` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);

--
-- Ограничения внешнего ключа таблицы `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `workers_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
