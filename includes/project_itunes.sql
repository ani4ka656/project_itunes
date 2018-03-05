-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time:  5 март 2018 в 21:11
-- Версия на сървъра: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_itunes`
--

-- --------------------------------------------------------

--
-- Структура на таблица `singers`
--

CREATE TABLE `singers` (
  `singer_id` int(11) NOT NULL,
  `singer_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_name` varchar(300) NOT NULL,
  `singer_id` int(11) NOT NULL,
  `date_of_publishing` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `quantity_downloaded_songs` int(255) DEFAULT NULL,
  `user_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users_info`
--

INSERT INTO `users_info` (`user_id`, `user_name`, `quantity_downloaded_songs`, `user_password`) VALUES
(1, 'user1', 0, 1234),
(2, 'user2', 0, 5678);

-- --------------------------------------------------------

--
-- Структура на таблица `users_songs`
--

CREATE TABLE `users_songs` (
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`singer_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `singer_id` (`singer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_songs`
--
ALTER TABLE `users_songs`
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `singer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`singer_id`) REFERENCES `singers` (`singer_id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`user_id`);

--
-- Ограничения за таблица `users_songs`
--
ALTER TABLE `users_songs`
  ADD CONSTRAINT `users_songs_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`),
  ADD CONSTRAINT `users_songs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
