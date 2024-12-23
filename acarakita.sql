-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql311.hstn.me
-- Generation Time: Dec 23, 2024 at 11:24 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mseet_37972897_acarakita`
--
CREATE DATABASE IF NOT EXISTS `mseet_37972897_acarakita` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mseet_37972897_acarakita`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `category`, `location`, `description`, `date`, `price`, `created_at`) VALUES
(1, 'Tech Summit 2024', 'Conference', 'Jakarta Convention Center, Jakarta', 'Tech Summit 2024 adalah konferensi tahunan yang mengumpulkan para profesional teknologi dari seluruh dunia. Acara ini mencakup diskusi panel, workshop, dan presentasi tentang tren terbaru dalam AI, blockchain, dan teknologi cloud.', '2024-02-15', 500000, '2024-12-23 16:12:57'),
(2, 'Music Fest Live', 'Concert', 'Gelora Bung Karno, Jakarta', 'Music Fest Live adalah konser musik outdoor terbesar di Indonesia, menghadirkan artis internasional dan lokal. Pengunjung dapat menikmati berbagai genre musik mulai dari pop, rock, hingga EDM dalam satu malam yang spektakuler.', '2024-03-10', 750000, '2024-12-23 16:12:57'),
(3, 'Art & Design Expo', 'Exhibition', 'Artotel Thamrin, Jakarta', 'Art & Design Expo adalah pameran seni tahunan yang menampilkan karya seni kontemporer dari seniman Indonesia. Selain itu, acara ini juga mencakup diskusi interaktif dan workshop kreatif untuk pengunjung.', '2024-04-20', 250000, '2024-12-23 16:12:57'),
(4, 'Startup Weekend', 'Workshop', 'CoHive Plaza, Surabaya', 'Startup Weekend adalah program intensif tiga hari untuk membantu calon pengusaha membangun ide bisnis mereka. Peserta akan mendapatkan bimbingan dari mentor, sesi networking, dan kesempatan untuk mempresentasikan ide mereka kepada investor.', '2024-05-12', 300000, '2024-12-23 16:12:57'),
(5, 'Culinary Festival 2024', 'Festival', 'Taman Impian Jaya Ancol, Jakarta', 'Culinary Festival 2024 adalah acara kuliner terbesar di Jakarta yang menghadirkan berbagai macam hidangan dari seluruh Indonesia dan mancanegara. Nikmati makanan lezat, demo masak, dan kompetisi kuliner seru.', '2024-06-18', 200000, '2024-12-23 16:12:57'),
(6, 'Health & Wellness Expo', 'Expo', 'Santika Hotel, Bandung', 'Health & Wellness Expo adalah acara yang didedikasikan untuk kesehatan dan kesejahteraan. Acara ini menawarkan seminar kesehatan, sesi yoga, dan stan produk kesehatan yang membantu pengunjung hidup lebih sehat.', '2024-07-25', 150000, '2024-12-23 16:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `payment_method` enum('Transfer','E-Wallet') NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `chair_number` int(11) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `event_id`, `name`, `payment_method`, `quantity`, `total_price`, `chair_number`, `ip_address`, `browser`, `created_at`) VALUES
(1, 1, 3, 'prabowo', 'Transfer', 2, 500000, 23, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:15:42'),
(2, 1, 1, 'Joshua Palti Sinaga', 'E-Wallet', 2, 500000, 3, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:16:11'),
(3, 1, 1, 'Feri Irwanto', 'Transfer', 4, 1000000, 12, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:16:21'),
(4, 1, 1, 'Apridian Samina mina E E', 'Transfer', 4, 1000000, 4, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:16:48'),
(5, 1, 2, 'Irma Amelia Novianto', 'Transfer', 5, 1250000, 52, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:17:50'),
(6, 1, 2, 'Andre Pargim', 'Transfer', 2, 500000, 5, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:18:42'),
(7, 1, 4, 'Fufufafa', 'Transfer', 2, 500000, 125, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:21:27'),
(8, 1, 4, 'Shintya Banjar Agung', 'Transfer', 1, 250000, 1, '103.175.229.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '2024-12-23 16:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'zoee', 'zoee@gmail.com', '$2y$10$la1vpjIpxwBb8d.snf9rB.Zxuo0jf06fw1jFAsu7skpBY4C.CbGBi', '2024-12-23 16:07:27'),
(2, 'joe', 'joe@gmail.com', '$2y$10$Xi0bx4hYQkOUtfmfnn34vOWnhUnJWZN8uUyJ9kyPfGoAXoty4KFG6', '2024-12-23 16:10:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
