-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 07:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egamesdb`
--

CREATE DATABASE IF NOT EXISTS `egamesdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `egamesdb`;
-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `monthly_subscription` decimal(10,0) NOT NULL,
  `platform` varchar(30) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `category`, `creator`, `monthly_subscription`, `platform`, `filename`) VALUES
(1, 'FIFA 21', 'Sports ', 'EA sports ', 20, 'PS4,XB1,NS,PC', 'game1.jpg'),
(2, 'League Of Legends  ', 'MOBA', 'Riot Games', 20, 'PC', 'game2.jpg'),
(3, 'Super Mario Odyssey ', 'Platformer ', 'Nintendo', 20, 'NS', 'game3.jpg'),
(4, 'Spider-Man ', 'Action-Adventure', 'Insomniac', 20, 'PS4', 'game4.jpg'),
(5, 'Fortnite ', 'Battle Royale ', 'Epic games', 20, 'PS4,XB1,NS,PC', 'game5.jpg'),
(6, 'Mount & Blade: Warband', 'Multiplayer', 'TaleWorlds Entertainment',20,'PS4,XB1,NS,PC', 'game7.png'),
(7, 'Medieval Dynasty', 'Single Player', 'Render Cube',20,'PS4,XB1,NS,PC', 'game8.png'),
(8, 'Subnautica', 'Single Player', 'Unknown Worlds Entertainment', 20,'PS4,XB1,NS,PC','game9.png'),
(9, 'Grounded', 'Multiplayer', 'Obsidian Entertainment',20,'PS4,XB1,NS,PC', 'game10.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
