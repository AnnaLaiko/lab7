-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 04 2020 г., 23:27
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
(1, 'test', '202cb962ac59075b964b07152d234b70', 'test@mail.ru', 'test', 1),
(2, '123', '202cb962ac59075b964b07152d234b70', '123@mail.ru', '123', 0),
(10, '345', 'd81f9c1be2e08964bf9f24b15f0e4900', '333@mail.ru', '345', 0),
(11, '&lt;div&gt;????&lt;/div&gt;', '202cb962ac59075b964b07152d234b70', '213@mail.ru', '123124', 0),
(12, '<div></div>', '202cb962ac59075b964b07152d234b70', '12345@mail.ru', 'asdg', 0),
(13, '1235', '202cb962ac59075b964b07152d234b70', '1234@mail.ru123', '123', 0),
(15, '321', '202cb962ac59075b964b07152d234b70', '321@mail.ru', '&lt;a type=&quot;button&quot; class=&quot;btn btn-dark btn-lg btn-block font-weight-bold&quot; href=&quot;register.php&quot; style=&quot;margin-top:2.5vh&quot;&gt;??????????????????&lt;/a&gt;', 0),
(16, 'test1', '098f6bcd4621d373cade4e832627b4f6', 'test1@mail.ru', 'test1', 0),
(17, '12344', '6c14da109e294d1e8155be8aa4b1ce8e', '12344@mail.ru', '123', 0),
(18, '111', '698d51a19d8a121ce581499d7b701668', '111@mail.ru', '111', 0),
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.ru', 'Admin A.S.', 10),
(22, 'asdf', '4bf79629ef8bb2588c005aa194e5f0b3', '123456@mail.ru', 'asdf', 2),
(23, 'Doka2', '41c08e1945d45df1018d055878e0c813', 'doka@Mail.ru', 'Pudge', 3),
(24, 'doka3', '41c08e1945d45df1018d055878e0c813', 'doka3@Mail.ru', 'asdf', 4);

--
-- Индексы сохранённых таблиц
--

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

--
-- AUTO_INCREMENT для сохранённых таблиц
--

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
