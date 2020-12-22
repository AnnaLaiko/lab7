-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2020 г., 20:42
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `car` char(50) NOT NULL,
  `price` int(15) NOT NULL DEFAULT 0,
  `year` year(4) NOT NULL DEFAULT 2020
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `car`, `price`, `year`) VALUES
(1, 19, 'Lada Granta', 200000, 2020),
(2, 1, 'Lada Granta', 1230, 2020),
(3, 19, 'moskvich', 12345, 2001),
(6, 19, 'KIA RIO', 800000, 2008),
(9, 10, 'test', 12345, 2010);

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `Name`, `Experience`) VALUES
(1, 'Petrov', '100'),
(2, 'Sidorov', '80'),
(3, 'Ivanov', '75'),
(4, 'Vladov', '70'),
(5, 'Egorov', '45'),
(6, 'Avend', '40'),
(7, 'Kamberbuctov', '30'),
(8, 'Horoshev', '19');

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` int(10) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `phone_number`) VALUES
(1, '+799954212517134'),
(2, '+799125123512'),
(3, '+79954123512'),
(4, '+7905412351234'),
(5, '+79512351276'),
(6, '+795125712348'),
(7, '+79884751251234'),
(8, '+7915743591234');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `Rank` tinyint(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `Login`, `Password`, `Email`, `FIO`, `Rank`) VALUES
(1, 'test', '202cb962ac59075b964b07152d234b70', 'sdf@mail.ru', 'asdfk', 1),
(2, '123', '202cb962ac59075b964b07152d234b70', 'asdf@mail.ru', 'Ivanov i.i.', 2),
(10, '345', 'd81f9c1be2e08964bf9f24b15f0e4900', '333@mail.ru', '345', 0),
(13, '1235', '202cb962ac59075b964b07152d234b70', '1234@mail.ru123', '123', 0),
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.ru', 'Admin A.S.', 10),
(29, 'testDelete10', '41c08e1945d45df1018d055878e0c813', 'test10@mail.ru', 'Ivanov I.I.', 10),
(30, 'testUpdate1', '41c08e1945d45df1018d055878e0c813', 'sadfj@mail.ru', 'Test FIO', 4),
(32, 'ivanovchik', '10ae3e895957fdb47f4a80532ef8ab57', 'ivanovchik@mail.ru', 'ivanovchik', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `cars` ADD FULLTEXT KEY `car` (`car`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `Login` (`Login`,`Email`,`FIO`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
