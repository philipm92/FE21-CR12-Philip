-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 03:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr12_mount_everest_philip`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr12_mount_everest_philip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fswd13_cr12_mount_everest_philip`;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) UNSIGNED NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `location_name` varchar(100) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `description` text DEFAULT 'Lorem ipsum dolor sit amet.',
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `picture`, `location_name`, `price`, `description`, `longitude`, `latitude`) VALUES
(1, 'ANiNite21_new.jpg', 'AniNite 2021', '25.00', 'Bei der größten, schönsten und besten Anime- und Manga-Convention Österreichs!*\r\nNach einer furchtbaren gefühlt endlosen Pause freut sich das gesamte AniNite-Team dich endlich wieder begrüßen zu dürfen!', 16.3126, 48.1134),
(2, 'Area52_new.jpg', 'Area 52', '12.00', 'Die Area52 ist Österreichs größte Gaming Lounge und befindet sich im Herzen des 21. Wiener Gemeindebezirks. Nur 5 Gehminuten vom Bahnhof Floridsdorf entfernt kannst du einen ganzen Tag lang in die Welt der Videospiele eintauchen.', 16.4011, 48.2549),
(3, 'stephansdom.JPG', 'St. Stephen\'s Cathedral', '0.00', 'St. Stephen\'s Cathedral (more commonly known by its German title: Stephansdom) is the mother church of the Roman Catholic Archdiocese of Vienna and the seat of the Archbishop of Vienna, Christoph Cardinal Schönborn, OP.', 16.3735, 48.2086),
(4, 'travel_chicago_america_new.jpg', 'The Buckingham Hotel', '1432.00', 'Redefine your expectations of the hotel experience with The Buckingham Hotel. Our spacious rooms are tucked away on the 40th floor of the Chicago Stock Exchange Building and offer unparalleled views of the skyline and bustling cityscape. Watch the sunrise over the lake through our picturesque windows.', -87.6318, 41.8762);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
