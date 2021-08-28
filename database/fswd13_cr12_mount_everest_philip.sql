-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 07:49 AM
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
  `longitude` text DEFAULT NULL,
  `latitude` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `picture`, `location_name`, `price`, `description`, `longitude`, `latitude`) VALUES
(1, '612920b4723ae.jpg', 'AniNite 2021', '20.00', 'Bei der größten, schönsten und besten Anime- und Manga-Convention Österreichs!*Nach einer furchtbaren gefühlt endlosen Pause freut sich das gesamte AniNite-Team dich endlich wieder begrüßen zu dürfen!', '16.312691169191364', '48.11331789876801'),
(2, 'Area52_new.jpg', 'Area 52', '12.00', 'Die Area52 ist Österreichs größte Gaming Lounge und befindet sich im Herzen des 21. Wiener Gemeindebezirks. Nur 5 Gehminuten vom Bahnhof Floridsdorf entfernt kannst du einen ganzen Tag lang in die Welt der Videospiele eintauchen.', '16.400522540545637', '48.25373585169849'),
(3, 'stephansdom.JPG', 'St. Stephen\'s Cathedral', '0.00', 'St. Stephen\'s Cathedral (more commonly known by its German title: Stephansdom) is the mother church of the Roman Catholic Archdiocese of Vienna and the seat of the Archbishop of Vienna, Christoph Cardinal Schönborn, OP.', '16.37350288472043', '48.20857582766164'),
(4, 'travel_chicago_america_new.jpg', 'The Buckingham Hotel', '1432.00', 'Redefine your expectations of the hotel experience with The Buckingham Hotel. Our spacious rooms are tucked away on the 40th floor of the Chicago Stock Exchange Building and offer unparalleled views of the skyline and bustling cityscape. Watch the sunrise over the lake through our picturesque windows.', '-87.63186349455471', '41.87610771074468'),
(8, '6129cdb65a732.jpg', 'Hotel Atlas', '172.00', 'Hotel Atlas is an excellent choice for travelers visiting Munich, offering many helpful amenities designed to enhance your stay. Rooms at Hotel Atlas offer a flat screen TV, a minibar, and a seating area providing exceptional comfort and convenience, and guests can go online with free wifi.', '11.5567021000593', '48.13645167913704'),
(9, '6129cde20902a.jpg', 'Hilton Tokyo', '159.00', 'Our hotel towers over the heart of Shinjuku, Tokyo’s largest entertainment, business, and shopping district. We’re connected to the Tokyo Metro by underground walkway. Stay active with rooftop tennis and our indoor pool, or unwind in our health club\'s sauna and whirlpool.', '139.69119113996717', '35.69292003383195');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
