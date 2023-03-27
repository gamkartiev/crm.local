-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2023 г., 18:47
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

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
  `brand` varchar(255) NOT NULL,
  `PTS_cars` varchar(255) NOT NULL,
  `STS_cars` varchar(255) NOT NULL,
  `VIN_cars` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `state_sign_cars`, `brand`, `PTS_cars`, `STS_cars`, `VIN_cars`) VALUES
(1, 'ООО 777 ФФ 755', 'Камаз', '11111111111112', '2222222222222', '77777777777'),
(2, 'УУУ 888 ЕЕ 755', 'Маз', '444444444444444441', '5555555555555555555', '666666666666666666666666666'),
(6, 'СС 111 АВ 773', 'Камаз', '1111111222223311111', '3333333334444444', '66666666666666'),
(9, '11223344', 'Маз', '223311ааафффааа', '33ываывмсывпы', '33333333333333333'),
(10, 'Е123УХ21', 'Камаз', '321', '123', '321'),
(11, '123', 'Маз', '321', '123', '321');

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
(1, 'ООО Северсталь', 'ООО Северсталь', '66111222333', '111222333', '', '', '', '111', '', '', '', '', '', '', '', '', '', ''),
(2, 'ООО НЛМК', 'ООО НЛМК', '444555666', '444555666', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'ОМК', 'ОМК', '11111111', '222222222', 'Криворожская', 'Криворожская', 'Криворожская', '111111111', '222222222', '333333333', '33333333', '44', 'Седых Антон михайлович', 'Сбербанк', '1111111111', '2222222222', '53156', 'Тестовое добавление компании ОМК'),
(5, 'СибирьТранспорт', 'СибирьТранспорт', '111111111', '1111111111', '222222222', '22222222', '22222222', '222222222', '22222222', '22222222', '333333333', '3333', 'Седых Антон михайлович', 'Сбербанк', '11111111', '111111111', '1234321', 'просто');

-- --------------------------------------------------------

--
-- Структура таблицы `daily_allowance`
--

CREATE TABLE `daily_allowance` (
  `id` int(11) NOT NULL,
  `daily_allowance` int(11) NOT NULL DEFAULT 0,
  `start_daily_allowance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `daily_allowance`
--

INSERT INTO `daily_allowance` (`id`, `daily_allowance`, `start_daily_allowance`) VALUES
(2, 700, '2022-02-12'),
(3, 700, '2022-02-12'),
(4, 600, '2022-02-12'),
(5, 700, '2022-02-13'),
(6, 800, '2022-02-13'),
(7, 900, '2022-03-26'),
(8, 600, '2022-02-13'),
(9, 740, '2022-02-18'),
(10, 720, '2022-02-18'),
(11, 720, '2022-02-18');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT current_timestamp(),
  `place_of_birth` text DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `registration` text DEFAULT NULL,
  `drivers_license` text DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `phone_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `driver`, `date_of_birth`, `place_of_birth`, `passport`, `registration`, `drivers_license`, `phone_1`, `phone_2`, `phone_3`) VALUES
(1, 'Акушеров Станислав Давидович', '2020-01-01', '', '1714 380685 выдан ТП в г. Меленки МРО УФМС России по Владимирской области в г. Муроме  25.12.2014. Код подразделения 330-030', 'Владимирская обл., Меленковский р-н, гор. Меленки , ул. 60 лет Октября дом 11, кв. 1', '', '8 996 442 19 48', '', ''),
(2, 'отсутствует', '1900-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Вершинников Иван Иванович', '2018-05-15', 'Москва', '11122233333', 'Москва', '8888877777799999', '89286997788', '', ''),
(46, 'Иванов Сергей Михайлович', '2020-10-07', 'Санкт-Петербург', '445555566666', 'Санкт-Петербург', '555556666444444', '8(925)4798877', '', ''),
(47, 'Кочерыжкин Алексей Святославович', '2020-10-05', 'Череповец', '112223345677', 'Череповец', '9966655448877', '8(925)7879948', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers_premium`
--

CREATE TABLE `drivers_premium` (
  `id` int(11) NOT NULL,
  `total_premium` int(11) NOT NULL COMMENT 'Пороговая сумма для премии',
  `premium` int(11) NOT NULL COMMENT 'Процент премиальных от ЗП',
  `start_premium` date NOT NULL COMMENT 'Дата начала настроек'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers_premium`
--

INSERT INTO `drivers_premium` (`id`, `total_premium`, `premium`, `start_premium`) VALUES
(1, 70000, 5, '0000-00-00'),
(2, 75000, 5, '0000-00-00'),
(3, 76000, 6, '0000-00-00'),
(4, 76000, 6, '0000-00-00'),
(5, 80000, 7, '2022-02-20');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers_work_shedule`
--

CREATE TABLE `drivers_work_shedule` (
  `id` int(11) NOT NULL,
  `id_cars` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `start` date NOT NULL,
  `the_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers_work_shedule`
--

INSERT INTO `drivers_work_shedule` (`id`, `id_cars`, `id_drivers`, `start`, `the_end`) VALUES
(1, 1, 1, '2022-01-20', NULL),
(21, 1, 47, '2022-01-20', '0000-00-00'),
(22, 1, 1, '2022-01-20', '0000-00-00'),
(32, 6, 46, '2022-02-04', '0000-00-00'),
(33, 9, 47, '2022-02-10', '0000-00-00'),
(49, 10, 47, '2022-02-04', '0000-00-00'),
(69, 11, 47, '2022-01-21', '2022-03-28'),
(94, 11, 45, '2022-01-21', '2022-03-28'),
(95, 11, 46, '2022-01-21', '2022-03-28'),
(96, 11, 1, '2022-01-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `fines`
--

CREATE TABLE `fines` (
  `id` int(11) NOT NULL,
  `id_drivers` int(255) NOT NULL,
  `decree` varchar(255) NOT NULL COMMENT 'Постановление',
  `date_of_violation` date NOT NULL COMMENT 'дата нарушения',
  `time_of_violation` time NOT NULL COMMENT 'время нарушения',
  `id_cars` int(255) NOT NULL COMMENT 'машина',
  `hold_date` date NOT NULL COMMENT 'месяц, год удержания',
  `withheld` int(11) NOT NULL COMMENT 'удержано с водителя',
  `to_pay` int(11) NOT NULL COMMENT 'к оплате сумма',
  `due_date` date NOT NULL COMMENT 'срок оплаты',
  `after_the_due_date` int(11) NOT NULL COMMENT 'сумма после срока оплаты',
  `date_of_application` date NOT NULL COMMENT 'дата сформ-я заявки',
  `note` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fines`
--

INSERT INTO `fines` (`id`, `id_drivers`, `decree`, `date_of_violation`, `time_of_violation`, `id_cars`, `hold_date`, `withheld`, `to_pay`, `due_date`, `after_the_due_date`, `date_of_application`, `note`, `id_status`) VALUES
(3, 47, '1222888484511 от 02.01.2022', '2022-01-03', '15:00:00', 2, '2022-01-09', 250, 250, '2022-01-23', 500, '2022-01-03', 'просто', 2),
(4, 45, '1222888484512 от 02.01.2022', '2022-01-03', '12:00:00', 6, '2022-01-09', 250, 250, '2022-01-23', 500, '2022-01-03', '---', 2),
(5, 45, '1222888484513 от 02.01.2022', '2022-01-09', '12:00:00', 2, '2022-01-09', 250, 250, '2022-01-18', 500, '2022-01-09', '---', 2),
(7, 46, '1222888484500 от 02.01.2022', '2022-02-20', '12:00:00', 2, '2022-02-09', 250, 250, '2022-03-20', 700, '2022-02-20', '---', 2),
(8, 1, '1222888484511 от 02.01.2022', '2023-02-09', '12:00:00', 10, '2023-02-01', 250, 250, '2023-02-24', 500, '2023-03-24', '---', 2),
(9, 1, '1222888484512 от 02.01.2022', '2023-02-01', '12:00:00', 10, '2023-02-10', 250, 250, '2023-03-24', 500, '2023-03-24', '---', 2),
(10, 1, '1222888484513 от 02.01.2022', '2023-02-15', '12:00:00', 10, '2023-02-23', 250, 250, '2023-03-25', 500, '2023-03-24', '---', 1),
(11, 1, '1222888484500 от 02.01.2022', '2023-02-17', '12:00:00', 10, '2023-03-22', 250, 250, '2023-03-27', 500, '2023-03-27', '---', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `fines_status`
--

CREATE TABLE `fines_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fines_status`
--

INSERT INTO `fines_status` (`id`, `status`) VALUES
(1, 'Оплачено'),
(2, 'Не оплачено');

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
  `id_cars` int(255) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `proxy` varchar(255) NOT NULL COMMENT 'Номер доверенности',
  `request` varchar(255) NOT NULL COMMENT 'Заявка',
  `note` text NOT NULL,
  `id_drivers` int(255) NOT NULL,
  `drivers_payment` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`, `form_of_payment`, `id_cars`, `id_customers`, `proxy`, `request`, `note`, `id_drivers`, `drivers_payment`) VALUES
(63, 'Череповец', 'Москва', '2023-02-06', '2023-02-07', 'груз', '20', '76', '40000', 'с НДС', 6, 1, '3', '6', '--', 46, 3000),
(64, 'Сантк-Петербург', 'Москва', '2023-02-01', '2023-02-03', 'груз', '20', '76', '40000', 'с НДС', 2, 5, '1', '1', '--', 47, 2000),
(65, 'Москва', 'Санкт-Петербург', '2023-02-03', '2023-02-05', 'груз', '20', '76', '40000', 'с НДС', 2, 5, '1', '1', '--', 47, 2000),
(69, 'Москва', 'Санкт-Петербург', '2023-02-01', '2023-02-03', 'груз', '20', '76', '33000', 'с НДС', 10, 3, '1', '1', '--', 1, 2000),
(72, 'Москва', 'Череповец', '2023-02-04', '2023-02-05', 'груз', '20', '76', '', 'с НДС', 6, 1, '1', '1', '--', 46, 2000),
(73, 'Сантк-Петербург', 'Москва', '2023-02-03', '2023-02-06', 'груз', '20', '76', '50000', 'с НДС', 10, 3, '1', '1', '--', 1, 2000),
(74, 'Москва', 'Санкт-Петербург', '2023-01-10', '2023-01-13', 'груз', '20', '76', '50000', 'с НДС', 10, 2, '1', '1', '--', 1, 2000),
(75, 'Москва', 'Санкт-Петербург', '2023-01-10', '2023-01-13', 'груз', '20', '76', '33000', 'с НДС', 2, 3, '1', '1', '--', 47, 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `prr_drivers`
--

CREATE TABLE `prr_drivers` (
  `id` int(11) NOT NULL,
  `month_and_years` date NOT NULL,
  `drivers` int(11) NOT NULL,
  `1` int(11) NOT NULL DEFAULT 0,
  `2` int(11) NOT NULL DEFAULT 0,
  `3` int(11) NOT NULL DEFAULT 0,
  `4` int(11) NOT NULL DEFAULT 0,
  `5` int(11) NOT NULL DEFAULT 0,
  `6` int(11) NOT NULL DEFAULT 0,
  `7` int(11) NOT NULL DEFAULT 0,
  `8` int(11) NOT NULL DEFAULT 0,
  `9` int(11) NOT NULL DEFAULT 0,
  `10` int(11) NOT NULL DEFAULT 0,
  `11` int(11) NOT NULL DEFAULT 0,
  `12` int(11) NOT NULL DEFAULT 0,
  `13` int(11) NOT NULL DEFAULT 0,
  `14` int(11) NOT NULL DEFAULT 0,
  `15` int(11) NOT NULL DEFAULT 0,
  `16` int(11) NOT NULL DEFAULT 0,
  `17` int(11) NOT NULL DEFAULT 0,
  `18` int(11) NOT NULL DEFAULT 0,
  `19` int(11) NOT NULL DEFAULT 0,
  `20` int(11) NOT NULL DEFAULT 0,
  `21` int(11) NOT NULL DEFAULT 0,
  `22` int(11) NOT NULL DEFAULT 0,
  `23` int(11) NOT NULL DEFAULT 0,
  `24` int(11) NOT NULL DEFAULT 0,
  `25` int(11) NOT NULL DEFAULT 0,
  `26` int(11) NOT NULL DEFAULT 0,
  `27` int(11) NOT NULL DEFAULT 0,
  `28` int(11) NOT NULL DEFAULT 0,
  `29` int(11) NOT NULL DEFAULT 0,
  `30` int(11) NOT NULL DEFAULT 0,
  `31` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prr_drivers`
--

INSERT INTO `prr_drivers` (`id`, `month_and_years`, `drivers`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`) VALUES
(6, '2023-01-01', 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '2022-01-01', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '2023-02-01', 46, 700, 700, 700, 700, 100, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, '2023-01-01', 1, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, '2023-01-01', 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, '2023-01-01', 1, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '2023-01-01', 1, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, '2023-01-01', 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, '2023-02-01', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, '2023-02-01', 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `trailers`
--

CREATE TABLE `trailers` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `state_sign_trailer` varchar(255) NOT NULL,
  `PTS_trailer` varchar(255) NOT NULL,
  `STS_trailer` varchar(255) NOT NULL,
  `VIN_trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trailers`
--

INSERT INTO `trailers` (`id`, `brand`, `state_sign_trailer`, `PTS_trailer`, `STS_trailer`, `VIN_trailer`) VALUES
(1, 'Тонар', '99999', '111111111111111111', '22222222222222222222', '777777777777777777777777777777'),
(3, 'Тонар', 'ВМ4340 799', '1111111222222', '3333344444444', '11122333334445555'),
(4, 'Тонар', 'ЕМ4480 799', '33333322222', '11111155555555', '33332222221111111111');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `working_days_drivers`
--

CREATE TABLE `working_days_drivers` (
  `id` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `event` text NOT NULL,
  `start` date NOT NULL,
  `the_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `working_days_drivers`
--

INSERT INTO `working_days_drivers` (`id`, `id_drivers`, `event`, `start`, `the_end`) VALUES
(1, 1, 'выходной', '2022-03-01', '2022-03-20'),
(4, 46, 'Выходной', '2022-04-05', '2022-04-05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `daily_allowance`
--
ALTER TABLE `daily_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `drivers_premium`
--
ALTER TABLE `drivers_premium`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drivers_work_shedule`
--
ALTER TABLE `drivers_work_shedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cars` (`id_cars`),
  ADD KEY `id_drivers` (`id_drivers`);

--
-- Индексы таблицы `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers` (`id_drivers`),
  ADD KEY `car` (`id_cars`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `fines_status`
--
ALTER TABLE `fines_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_ibfk_1` (`id_customers`),
  ADD KEY `id_drivers` (`id_drivers`),
  ADD KEY `id_cars` (`id_cars`);

--
-- Индексы таблицы `prr_drivers`
--
ALTER TABLE `prr_drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers` (`drivers`);

--
-- Индексы таблицы `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `working_days_drivers`
--
ALTER TABLE `working_days_drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_drivers` (`id_drivers`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `daily_allowance`
--
ALTER TABLE `daily_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `drivers_premium`
--
ALTER TABLE `drivers_premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `drivers_work_shedule`
--
ALTER TABLE `drivers_work_shedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `fines_status`
--
ALTER TABLE `fines_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `prr_drivers`
--
ALTER TABLE `prr_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `working_days_drivers`
--
ALTER TABLE `working_days_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `drivers_work_shedule`
--
ALTER TABLE `drivers_work_shedule`
  ADD CONSTRAINT `drivers_work_shedule_ibfk_1` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `drivers_work_shedule_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`);

--
-- Ограничения внешнего ключа таблицы `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `fines_ibfk_2` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `fines_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `fines_status` (`id`);

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`id_cars`) REFERENCES `cars` (`id`);

--
-- Ограничения внешнего ключа таблицы `prr_drivers`
--
ALTER TABLE `prr_drivers`
  ADD CONSTRAINT `prr_drivers_ibfk_1` FOREIGN KEY (`drivers`) REFERENCES `drivers` (`id`);

--
-- Ограничения внешнего ключа таблицы `working_days_drivers`
--
ALTER TABLE `working_days_drivers`
  ADD CONSTRAINT `working_days_drivers_ibfk_1` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
