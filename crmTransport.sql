-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2020 г., 09:18
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
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `state_sign_cars` varchar(255) NOT NULL,
  `PTS_cars` varchar(255) NOT NULL,
  `STS_cars` varchar(255) NOT NULL,
  `VIN_cars` varchar(255) NOT NULL,
  `year_cars` varchar(255) NOT NULL,
  `attached_trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `state_sign_cars`, `PTS_cars`, `STS_cars`, `VIN_cars`, `year_cars`, `attached_trailer`) VALUES
(1, 'О777ПО 399 799', '4455668877', '888877776666', '111112222233334444', '1994', 'ПА 4339 ВА 799'),
(2, 'А 178 ВТ 799', '333222111', '222223333311111', '1111155555444446666', '2018', 'ОО 5569 ВВ 799');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `INN` int(11) NOT NULL,
  `OGRN` int(11) NOT NULL,
  `actual_address` varchar(255) DEFAULT NULL,
  `legal_address` varchar(255) NOT NULL,
  `mailing_address` varchar(255) NOT NULL,
  `KPP` varchar(255) NOT NULL,
  `OKPO_code` varchar(255) NOT NULL,
  `OKFC_code` varchar(255) NOT NULL,
  `OKOPF_code` varchar(255) NOT NULL,
  `OKVED_main_code` varchar(255) NOT NULL,
  `CEO` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `payment_account` varchar(255) NOT NULL,
  `correspondent_account` varchar(255) NOT NULL,
  `BIK` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `short_name`, `INN`, `OGRN`, `actual_address`, `legal_address`, `mailing_address`, `KPP`, `OKPO_code`, `OKFC_code`, `OKOPF_code`, `OKVED_main_code`, `CEO`, `bank`, `payment_account`, `correspondent_account`, `BIK`, `note`) VALUES
(1, 'ООО Северсталь', 'ООО Северсталь', 111222333, 111222333, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'ООО НЛМК', 'ООО НЛМК', 444555666, 444555666, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `surname`, `first_name`, `patronymic`) VALUES
(1, 'Иванов', 'Иван', 'Иванович'),
(2, 'Акушеров', 'Станислав', 'Давидович');

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
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
