-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2020 г., 21:50
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crmtransport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `state_sign_cars` varchar(255) NOT NULL,
  `PTS_cars` varchar(255) NOT NULL,
  `STS_cars` varchar(255) NOT NULL,
  `VIN_cars` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `brand`, `state_sign_cars`, `PTS_cars`, `STS_cars`, `VIN_cars`) VALUES
(1, 'Камаз', 'ООО 777 ФФ 755', '1111111111111', '2222222222222', '3333333333333333333333333'),
(2, 'Маз', 'УУУ 888 ЕЕ 755', '44444444444444444', '5555555555555555555', '666666666666666666666666666'),
(5, 'Камаз', 'АА5544751', '1111111111', '333333333', '444448484888848848'),
(6, 'Камаз', 'СС111АВ773', '111111122222', '3333333334444444', '66666666666666');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `INN` varchar(255) NOT NULL,
  `OGRN` varchar(255) NOT NULL,
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
(1, 'ООО Северсталь', 'ООО Северсталь', '111222333', '111222333', '', '', '', '111', '', '', '', '', '', '', '', '', '', ''),
(2, 'ООО НЛМК', 'ООО НЛМК', '444555666', '444555666', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'ОМК', 'ОМК', '11111111', '222222222', 'Криворожская', 'Криворожская', 'Криворожская', '111111111', '222222222', '333333333', '33333333', '44', 'Седых Антон михайлович', 'Сбербанк', '1111111111', '2222222222', '53156', 'Тестовое добавление компании ОМК'),
(4, 'Телеграм', 'Телеграмм', '111111', '2222222', 'Солнечная', 'Солнечная', 'Солнечная', '1111111', '2222222', '3333333', '44444444', '45', 'Бас', 'Сбербанк', '1111111', '222222222', '3333333', 'просто'),
(5, 'СибирьТранспорт', 'СибирьТранспорт', '111111111', '1111111111', '222222222', '22222222', '22222222', '222222222', '22222222', '22222222', '333333333', '3333', 'Седых Антон михайлович', 'Сбербанк', '11111111', '111111111', '1234321', 'просто');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `place_of_birth` text NOT NULL,
  `passport` text NOT NULL,
  `registration` text NOT NULL,
  `drivers_license` text NOT NULL,
  `phone_1` varchar(255) NOT NULL,
  `phone_2` varchar(255) NOT NULL,
  `phone_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `surname`, `first_name`, `patronymic`, `date_of_birth`, `place_of_birth`, `passport`, `registration`, `drivers_license`, `phone_1`, `phone_2`, `phone_3`) VALUES
(1, 'Акушеров', 'Станислав', 'Давидович', '2020-09-29', '', '1714 380685 выдан ТП в г. Меленки МРО УФМС России по Владимирской области в г. Муроме  25.12.2014. Код подразделения 330-030', 'Владимирская обл., Меленковский р-н, гор. Меленки , ул. 60 лет Октября дом 11, кв. 1', '', '8 996 442 19 48', '', ''),
(45, 'Вершинников', 'Иван', 'Иванович', '2018-05-15', 'Москва', '11122233333', 'Москва', '8888877777799999', '89286997788', '', ''),
(46, 'Иван', 'Сергей', 'Михайлович', '2020-10-07', 'Санкт-Петербург', '445555566666', 'Санкт-Петербург', '555556666444444', '8(925)4798877', '', ''),
(47, 'Кочерыжкин', 'Алексей', 'Светославович', '2020-10-05', 'Череповец', '112223345677', 'Череповец', '9966655448877', '8(925)7879948', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `place_1` varchar(255) NOT NULL,
  `place_2` varchar(255) NOT NULL,
  `date_1` date NOT NULL,
  `date_2` date NOT NULL,
  `freight` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `form_of_payment` varchar(255) NOT NULL,
  `proxy` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `id_cars` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`, `form_of_payment`, `proxy`, `request`, `note`, `id_cars`, `id_customers`) VALUES
(1, 'Питер', 'Москва', '2020-08-04', '2020-08-05', 'груз', '20', '80', '20000', 'с НДС', 'Тестовая запись', '222', 'Тестовое примечанеи', 1, 1),
(17, 'Сантк-Петербург', 'Москва', '2020-09-15', '2020-09-16', 'груз', '20', '80', '40000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `history_car`
--

CREATE TABLE `history_car` (
  `id` int(11) NOT NULL,
  `id_cars` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `id_trailers` int(11) NOT NULL,
  `created_add` date NOT NULL,
  `updated_add` date NOT NULL DEFAULT '2999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history_car`
--

INSERT INTO `history_car` (`id`, `id_cars`, `id_drivers`, `id_trailers`, `created_add`, `updated_add`) VALUES
(3, 1, 1, 1, '2020-10-07', '2999-09-10'),
(4, 2, 47, 3, '2020-10-04', '2999-09-24'),
(5, 5, 45, 2, '2020-10-01', '2999-01-01'),
(6, 6, 46, 4, '2020-09-01', '2999-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `trailers`
--

CREATE TABLE `trailers` (
  `id` int(11) NOT NULL,
  `state_sign_trailer` varchar(255) NOT NULL,
  `PTS_trailer` varchar(255) NOT NULL,
  `STS_trailer` varchar(255) NOT NULL,
  `VIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trailers`
--

INSERT INTO `trailers` (`id`, `state_sign_trailer`, `PTS_trailer`, `STS_trailer`, `VIN`) VALUES
(1, '99999', '111111111111111111', '22222222222222222222', '777777777777777777777777777777'),
(2, '6666', '3333333333333333333', '444444444444444444', '8888888888888888888888888888'),
(3, 'ВМ4340 799', '1111111222222', '3333344444444', '11122333334445555'),
(4, 'ЕМ4480 799', '33333322222', '11111155555555', '33332222221111111111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cars` (`id_cars`),
  ADD KEY `id_customers` (`id_customers`);

--
-- Индексы таблицы `history_car`
--
ALTER TABLE `history_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cars` (`id_cars`),
  ADD KEY `id_drivers` (`id_drivers`),
  ADD KEY `id_trailers` (`id_trailers`);

--
-- Индексы таблицы `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `history_car`
--
ALTER TABLE `history_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`);

--
-- Ограничения внешнего ключа таблицы `history_car`
--
ALTER TABLE `history_car`
  ADD CONSTRAINT `history_car_ibfk_1` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `history_car_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `history_car_ibfk_3` FOREIGN KEY (`id_trailers`) REFERENCES `trailers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
