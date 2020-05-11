-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2020 г., 19:21
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crmTransport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `date_1` date NOT NULL,
  `date_2` date NOT NULL,
  `place_1` varchar(256) NOT NULL,
  `place_2` varchar(256) NOT NULL,
  `freight` varchar(256) NOT NULL,
  `weight` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `form_of_payment` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `proxy` varchar(256) NOT NULL,
  `request` varchar(256) NOT NULL,
  `note` text NOT NULL,
  `id_customers` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `id_cars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `date_1`, `date_2`, `place_1`, `place_2`, `freight`, `weight`, `cost`, `form_of_payment`, `volume`, `proxy`, `request`, `note`, `id_customers`, `id_drivers`, `id_cars`) VALUES
(5, '2019-12-20', '2019-12-22', 'Череповец', 'Москва', 'Готовая продукция', 24, 36000, '', 76, 'Доверенность №243', 'Заявка № 121', '', 1, 1, 1),
(6, '2019-12-23', '2019-12-25', 'Москва', 'Череповец', 'Лом', 23, 44000, '', 76, 'Доверенность №244', 'Заявка №122', '', 2, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD KEY `id_flight` (`id`),
  ADD KEY `id_customer` (`id_customers`),
  ADD KEY `id_driver` (`id_drivers`),
  ADD KEY `id_cars` (`id_cars`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `Customers` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
