-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 15 2023 г., 12:00
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `paintings`
--

CREATE TABLE `paintings` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `name` varchar(45) NOT NULL,
  `id_hall` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `paintings`
--

INSERT INTO `paintings` (`id`, `img_path`, `name`, `id_hall`, `description`, `year`) VALUES
(1, 'dance.jpg', 'Анри Матисс', 1, 'Танец', 1910),
(2, 'girl_with_earring', 'Ян Вермеер', 2, 'Девушка с жемчужной сережкой', 1665),
(3, 'gladiator\'s_battle.png', 'Жан-Леон Жером', 3, 'Бой гладиаторов', 1872),
(4, 'mars_and_venera.png', 'Луи Жан-Франсуа Лагрене', 4, 'Марс и Венера, аллегория мира', 1770),
(5, 'sleepers.png', 'Жан Дезире Гюстав Курбе', 5, 'Спящие', 1866),
(6, 'two_sisters.png', 'Пьер Огюст Ренуар', 2, 'Две сестры', 1881),
(7, 'black_square.png', 'Каземир Северинович Малевич', 3, 'Чёрный квадрат', 1915),
(8, 'court.png', 'Иероним Босх', 1, 'Страшный суд (триптих)', 1504),
(9, 'maddona.png', 'Рафаэль Санти', 4, 'Сикстинская мадонна', 1513),
(10, 'monaliza.png', 'Леонардо да Винчи', 1, 'Мона Лиза', 1503),
(11, 'morning_execution.png', 'Василий Иванович Суриков', 2, 'Утро стрелецкой казни', 1881),
(12, 'scream.png', 'Эдвард Мунк', 1, 'Крик', 1893),
(13, 'secret_party.png', 'Леонардо да Винчи', 1, 'Тайная вечеря', 1495),
(14, 'spring.png', 'Сандро Боттичелли', 5, 'Весна', 1482),
(15, 'stealing.png', 'Рембрандт Харменс ван Рейн', 4, 'Похищение Европы', 1632),
(16, 'sunflowers.png', 'Винсент ван Гог', 2, 'Подсолнухи', 1888),
(17, 'triumth_galatei.png', 'Рафаэль Санти', 4, 'Триумф Галатеи', 1512),
(18, 'two_girls.png', 'Пьер Огюст Ренуар', 3, 'Две девушки за пианино', 1892),
(19, 'wave.png', 'Адольф Вильям Бугро', 2, 'Волна', 1896),
(20, 'who_we_are.png', 'Поль Гоген', 4, 'Откуда мы пришли? Кто мы? Куда мы идём?', 1898);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `paintings`
--
ALTER TABLE `paintings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hall` (`id_hall`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `paintings`
--
ALTER TABLE `paintings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `paintings`
--
ALTER TABLE `paintings`
  ADD CONSTRAINT `paintings_ibfk_1` FOREIGN KEY (`id_hall`) REFERENCES `halls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
