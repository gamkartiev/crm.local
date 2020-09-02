-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 02 2020 г., 19:32
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
  `state_sign_cars` varchar(255) NOT NULL,
  `PTS_cars` varchar(255) NOT NULL,
  `STS_cars` varchar(255) NOT NULL,
  `VIN_cars` varchar(255) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `id_trailers` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL DEFAULT '9999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `state_sign_cars`, `PTS_cars`, `STS_cars`, `VIN_cars`, `id_drivers`, `id_trailers`, `date_start`, `date_end`) VALUES
(1, 'ООО 777 ФФ 755', '1111111111111', '2222222222222', '3333333333333333333333333', 2, 2, '2020-08-04', '9999-01-01'),
(2, 'УУУ 888 ЕЕ 755', '44444444444444444', '5555555555555555555', '666666666666666666666666666', 4, 1, '2020-08-04', '9999-01-01'),
(5, 'ААА4445544ЫЫ751', '1111111111', '333333333', '444448484888848848', 2, 1, '2020-09-02', '9999-01-01');

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
(2, 'ООО НЛМК', 'ООО НЛМК', 444555666, 444555666, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'ОМК', 'ОМК', 11111111, 222222222, 'Криворожская', 'Криворожская', 'Криворожская', '111111111', '222222222', '333333333', '33333333', '44', 'Седых Антон михайлович', 'Сбербанк', '1111111111', '2222222222', '53156', 'Тестовое добавление компании ОМК');

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
(2, 'Акушеров', 'Станислав', 'Давидович'),
(3, 'Иванов', 'Иван', 'Иванович'),
(4, 'Петров', 'Петр', 'Петрович');

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
(6, 'Питер', 'Москва', '2020-08-18', '2020-08-20', 'лом', '20', '80', '40000', 'С НДС', 'Примечание без №', 'Примечание без №', 'Примечание без №', 2, 1),
(7, 'Мытищи', 'Выкса', '2020-08-29', '2020-08-29', 'Лом', '20', '80', '26400', 'без НДС', 'Доверенность №1', 'Заявка 3', 'Нет примечания.', 1, 2),
(8, 'Нижний Новгород', 'Череповец', '2020-08-31', '2020-09-01', 'гп', '20', '80', '25000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 1, 1),
(9, 'Череповец', 'Санкт-Петербург', '2020-09-02', '2020-09-03', 'ГП', '22', '76', '23000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 1, 1),
(10, 'Сантк-Петербург', 'Череповец', '2020-09-04', '2020-09-06', 'лом', '24', '80', '36000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 1, 1),
(11, 'Москва', 'Череповец', '2020-09-02', '2020-09-03', 'Лом', '24', '76', '43000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 1, 1),
(12, 'ыыы', '1', '2020-09-02', '2020-09-03', 'груз', '20', '81', '43000', 'с НДС', 'Доверенность №', 'Заявка №', 'Без примечания', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `trailer`
--

CREATE TABLE `trailer` (
  `id` int(11) NOT NULL,
  `state_sign_trailer` varchar(255) NOT NULL,
  `PTS_trailer` varchar(255) NOT NULL,
  `STS_trailer` varchar(255) NOT NULL,
  `VIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trailer`
--

INSERT INTO `trailer` (`id`, `state_sign_trailer`, `PTS_trailer`, `STS_trailer`, `VIN`) VALUES
(1, '99999', '111111111111111111', '22222222222222222222', '777777777777777777777777777777'),
(2, '6666', '3333333333333333333', '444444444444444444', '8888888888888888888888888888');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trailer` (`id_trailers`),
  ADD KEY `id_drivers` (`id_drivers`),
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
-- Индексы таблицы `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`id_trailers`) REFERENCES `trailer` (`id`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`);

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
