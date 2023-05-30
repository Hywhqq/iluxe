-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2023 г., 15:42
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hi-tech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `text` varchar(2555) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `text`, `img`) VALUES
(12, 'Какой выбрать телефон?', 'Какой смартфон до 15000 рублей выбрать?', 'Хороший недорогой телефон Xiaomi Если у кого и искать классные недорогие смартфоны, то у Xiaomi. Вернее, даже не у самой Xiaomi, а у её суббренда Redmi, который перенял от материнской компании принцип создания топовых устройств за совсем небольшие деньги. Конечно, время от времени и у неё случаются просчёты, коим был, например, Redmi Note 11. Но в этом году компания учла все недостатки предыдущей модели и провела работу над ошибками. В результате получилась просто суперская линейка Redmi Note 12-го поколения.  Если вы ищете просто недорогой, но качественный аппарат, вам за Redmi Note 12. Это самая простая модель в линейке, но её можно назвать одним из самых сбалансированных предложений на рынке по сочетанию цены и предлагаемых возможностей.', 'img/1681129511rn12_4g-750x422.webp'),
(13, 'Горячая ванна убивает?', 'Почему нельзя принимать слишком горячую ванну', 'Что может быть лучше, чем лечь в теплую ванну после тяжелого рабочего дня? Если включить спокойную музыку и приглушить свет, можно запросто войти в медитативное состояние и выйти из ванной комнаты полностью свежим — после такой терапии, сон гарантированно будет крепким. Некоторые из нас любят, когда вода в ванной горячая, потому что она лучше смывает грязь и быстрее расслабляет напряженные мышцы. К тому же, горячая ванна считается эффективным способом сжигания калорий. Но этим ни в коем случае нельзя излишне увлекаться, потому что долгое пребывание в горячей воде может стать причиной возникновения серьезных проблем со здоровьем, травм и даже смерти. В рамках данной статьи мы разберемся, какой температуры должна быть вода в ванной и чем опасен отдых в горячей воде.', 'img/1681129563hot_tub_1-1-750x496.webp'),
(14, 'Кофе еще полезнее?', 'Ученые обнаружили еще одну пользу кофе', 'Кофе улучшает микрофлору кишечника В ходе предыдущих исследований ученые обнаружили, что у людей, которые регулярно потребляют кофе, в микрофлоре кишечника содержится больше бактерий, обладающих противовоспалительными свойствами. Однако оставалось много неясностей в этих изменениях микробиома. Поэтому Учеными из Медицинского колледжа Бэйлора было проведено дополнительное исследование для получения более точных результатов. В исследовании приняли участие 612 человек, все они обладали здоровой толстой кишкой. Потребление кофе авторы работы оценивали при помощи опросников, кроме того они уделяли внимание качеству рациона, используя для этого индекс здорового питания (HEI). Среднее потребление кофеина среди людей, которые пили мало кофе, составляло 39 мг, а среди тех, кто пил его много — 139 мг.', 'img/1681130012Polza_kofe-750x422.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reviews` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`name`, `mail`, `reviews`) VALUES
('123', '123@mail.ru', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Ravil Sharafutdinov', 'sharaf.rav@gmail.com', '5cc32e366c87c4cb49e4309b75f57d64', 1),
(2, 'admin', 'admin@mail.ru', '0192023a7bbd73250516f069df18b500', 2),
(3, 'Максим', 'maks@mail.ru', '8618c5afb4ab0c3bc2ac3406e539f9ad', 1),
(4, 'User User', 'user@mail.ru', '6ad14ba9986e3615423dfca256d04e3f', 1),
(5, 'Максим', 'mezhekov1592@yandex.ru', 'dab3154e4772e23503a16647d525b8a2', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
