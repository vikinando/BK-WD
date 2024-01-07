-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 05:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dokter','pasien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `role`) VALUES
(7, 'kampoengbola6@gmail.com', '$2y$10$FM.1ovaRdUQihqECbmPBkeExBhZaWuJmz44Y19nhaKP.4MNo.7yHm', 'pasien'),
(8, 'admin@email.com', '$2y$10$FM.1ovaRdUQihqECbmPBkeExBhZaWuJmz44Y19nhaKP.4MNo.7yHm', 'admin'),
(9, 'safiardemak@kalijaga.com', '$2y$10$.f0SAjUUGuKSvxn2yeiiHOKA5kNDzmcztk8kTzXPe2k7c8MKJZKZu', 'pasien'),
(15, 'hafizhdhiya@gmail.com', '$2y$10$bXreufIY1TJWYLE9J/r.PO2O0PtTvS4g72CNByp8CjIzgIJg0HmmO', 'pasien'),
(16, 'qwerty@yahoo.com', '123456', 'admin'),
(39, 'qweqwewqe@12dqw', '$2y$10$Xzox9v43ZtT0apOGbVcj/evdY6r.WGgfUwyaah3G41dgb0MoRid1m', 'pasien'),
(40, 'dokter@gmail.com', '$2y$10$lnVvNKQ43dtofc1wY3gnXenl2cZFDjVUFI.zwb85ABnkZYZVIOARS', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
