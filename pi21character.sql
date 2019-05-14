-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 31 2018 г., 22:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pi21character`
--

-- --------------------------------------------------------

--
-- Структура таблицы `character`
--

CREATE TABLE IF NOT EXISTS `character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `national` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `character`
--

INSERT INTO `character` (`id`, `id_user`, `name`, `age`, `sex`, `national`) VALUES
(1, 1, 'Azmak', 20, 'male', 'big nazi'),
(2, 1, 'Farida', 25, 'male', 'big nazi'),
(3, 2, 'Artem', 28, 'male', 'big nazi'),
(4, 2, 'Lana', 19, 'male', 'big nazi'),
(5, 1, 'Cotya', 3, 'female', 'bashkir');

-- --------------------------------------------------------

--
-- Структура таблицы `character_item`
--

CREATE TABLE IF NOT EXISTS `character_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_character` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=257 ;

--
-- Дамп данных таблицы `character_item`
--

INSERT INTO `character_item` (`id`, `id_character`, `id_item`) VALUES
(251, 5, 42),
(250, 5, 28),
(253, 5, 4),
(254, 5, 45),
(246, 5, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `type`, `picture_url`) VALUES
(1, 'BuddismCiV_ReligionIcon', 'religion', 'img\\BuddismCiV_ReligionIcon.png'),
(2, 'CatholicismCiV_ReligionIcon', 'religion', 'img\\CatholicismCiV_ReligionIcon.png'),
(3, 'ConfucianismCiV_ReligionIcon', 'religion', 'img\\ConfucianismCiV_ReligionIcon.png'),
(4, 'EasternOrthodoxyCiV_ReligionIcon', 'religion', 'img\\EasternOrthodoxyCiV_ReligionIcon.png'),
(14, 'str_male', 'sex', 'img\\str_male.png'),
(15, 'int_male', 'sex', 'img\\int_male.png'),
(16, 'int', 'sex', 'img\\int.png'),
(17, 'int_fem', 'sex', 'img\\int_fem.png'),
(18, 'str_fem', 'sex', 'img\\str_fem.png'),
(5, 'HinduismCiV_ReligionIcon', 'religion', 'img\\HinduismCiV_ReligionIcon.png'),
(6, 'IslamCiV_ReligionIcon', 'religion', 'img\\IslamCiV_ReligionIcon.png'),
(7, 'JudaismCiV_ReligionIcon', 'religion', 'img\\JudaismCiV_ReligionIcon.png'),
(8, 'ProtestantismCiV_ReligionIcon', 'religion', 'img\\ProtestantismCiV_ReligionIcon.png'),
(9, 'ShintoCiV_ReligionIcon', 'religion', 'img\\ShintoCiV_ReligionIcon.png'),
(11, 'TaoismCiV_ReligionIcon', 'religion', 'img\\TaoismCiV_ReligionIcon.png'),
(12, 'TengriismCiV_ReligionIcon', 'religion', 'img\\TengriismCiV_ReligionIcon.png'),
(13, 'ZoroastrianismCiV_ReligionIcon', 'religion', 'img\\ZoroastrianismCiV_ReligionIcon.png'),
(19, 'prim', 'politic', 'img\\prim.png'),
(33, 'g_bigen', 'gender', 'img\\g_bigen.png'),
(32, 'g_fliud', 'gender', 'img\\g_fliud.png'),
(31, 'g_queer', 'gender', 'img\\g_queer.png'),
(30, 'g_a', 'gender', 'img\\g_a.png'),
(20, 'agorism', 'politic', 'img\\agorism.png'),
(21, 'cap', 'politic', 'img\\cap.png'),
(22, 'pac', 'politic', 'img\\pac.png'),
(23, 'ind', 'politic', 'img\\ind.png'),
(24, 'transgum', 'politic', 'img\\transgum.png'),
(25, 'comm', 'politic', 'img\\comm.png'),
(26, 'mutual', 'politic', 'img\\mutual.png'),
(27, 'ego', 'politic', 'img\\ego.png'),
(28, 'fem', 'politic', 'img\\fem.png'),
(29, 'qweer', 'politic', 'img\\qweer.png'),
(34, 'g_alternative', 'gender', 'img\\g_alternative.png'),
(35, 'American_Reclamation_Corporation_(CivBE)', 'nazi', 'img\\American_Reclamation_Corporation_(CivBE).png'),
(36, 'Pan-Asian_Cooperative_(CivBE)', 'nazi', 'img\\Pan-Asian_Cooperative_(CivBE).png'),
(37, 'People''s_African_Union_(CivBE)', 'nazi', 'img\\People''s_African_Union_(CivBE).png'),
(38, 'Kavithan_Protectorate_(CivBE)', 'nazi', 'img\\Kavithan_Protectorate_(CivBE).png'),
(39, 'Brasilia_(CivBE)', 'nazi', 'img\\Brasilia_(CivBE).png'),
(40, 'Franco-Iberia_(CivBE)', 'nazi', 'img\\Franco-Iberia_(CivBE).png'),
(41, 'Polystralia_(CivBE)', 'nazi', 'img\\Polystralia_(CivBE).png'),
(42, 'Slavic_Federation_(CivBE)', 'nazi', 'img\\Slavic_Federation_(CivBE).png'),
(43, 'rainbow', 'orintation', 'img\\rainbow.png'),
(44, 'pan', 'orintation', 'img\\pan.png'),
(45, 'bi', 'orintation', 'img\\bi.png'),
(46, 'poly', 'orintation', 'img\\poly.png'),
(47, 'asex', 'orintation', 'img\\asex.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `nickname`, `token`) VALUES
(1, 'vasya', '123456', 'super nagibator 99', '6c5dcc9063573cb68dca88580c7ea4c0'),
(2, 'petya', '654321', 'anti nagibator 97', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
