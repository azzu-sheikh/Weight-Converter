-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 02:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weight_converter`
--

-- --------------------------------------------------------

--
-- Table structure for table `weight_conversion`
--

CREATE TABLE `weight_conversion` (
  `id` int(11) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `from_weight` varchar(20) NOT NULL,
  `to_weight` varchar(20) NOT NULL,
  `converted_amount` decimal(10,2) NOT NULL,
  `test_case_type` varchar(50) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weight_conversion`
--

INSERT INTO `weight_conversion` (`id`, `amount`, `from_weight`, `to_weight`, `converted_amount`, `test_case_type`, `comment`) VALUES
(1, '100.00', 'kg', 'kg', 100.00, 'Weak and Strong Normal', 'Valid input'),
(2, '2.20', 'lb', 'kg', 1.00, 'Weak Normal', 'Valid input'),
(3, '5000.00', 'g', 'g', 5000.00, 'Weak and Strong Normal', 'Valid input'),
(4, '1.00', 'kg', 'kg', 1.00, 'Weak and Strong Normal', 'Valid input'),
(5, '0.00', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(6, '10.00', 'kg', 'kg', 10.00, 'Weak and Strong Normal', 'Valid input'),
(7, '0.00', 'kg', 'kg', 0.00, 'Weak and Strong Normal', 'Valid input'),
(8, '5.00', 'kg', 'kg', 5.00, 'Weak and Strong Normal', 'Valid input'),
(9, '10.00', 'kg', 'kg', 10.00, 'Weak and Strong Normal', 'Valid input'),
(10, '0.50', 'kg', 'kg', 0.50, 'Weak and Strong Normal', 'Valid input'),
(11, '1.00', 'kg', 'kg', 1.00, 'Weak and Strong Normal', 'Valid input'),
(12, '0.71', 'kg', 'kg', 0.71, 'Weak and Strong Normal', 'Valid input'),
(13, '2.20', 'lb', 'kg', 1.00, 'Weak and Strong Normal', 'Valid input'),
(14, '0.00', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(15, '-1.00', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(16, '5.00', 'kg', 'lb', 11.02, 'Weak and Strong Normal', 'Valid input'),
(17, '5.00', 'unknown', 'unknown', 0.00, 'Strong Robust', 'Invalid unit input'),
(18, '0.00', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(19, 'text', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(20, '1.00', 'kg', 'kg', 1.00, 'Weak and Strong Normal', 'Valid input'),
(21, '0', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(22, '1000000', 'unknown', 'kg', 0.00, 'Strong Robust', 'Invalid unit input'),
(23, '500', 'lb', 'kg', 226.80, 'Weak and Strong Normal', 'Valid input'),
(24, '2.00', 'kg', 'lb', 4.41, 'Weak and Strong Normal', 'Valid input'),
(25, '0', 'lb', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(26, '0', 'kg', 'lb', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(27, '0', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(28, '1000000', 'kg', 'kg', 1000000.00, 'Weak and Strong Robust', 'Valid input'),
(29, '1000', 'lb', 'kg', 453.59, 'Weak and Strong Normal', 'Valid input'),
(30, '5000', 'lb', 'kg', 2267.96, 'Weak and Strong Normal', 'Valid input'),
(31, '100', 'lb', 'kg', 45.36, 'Weak and Strong Normal', 'Valid input'),
(32, '2.00', 'kg', 'kg', 2.00, 'Weak and Strong Normal', 'Valid input'),
(33, '1.00', 'lb', 'kg', 0.45, 'Weak and Strong Normal', 'Valid input'),
(34, '11', 'lb', 'kg', 4.99, 'Weak and Strong Normal', 'Valid input'),
(35, '10', 'unknown', 'unknown', 0.00, 'Strong Robust', 'Invalid unit input'),
(36, 'text', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(37, '5.00', 'kg', 'lb', 11.02, 'Weak and Strong Normal', 'Valid input'),
(38, '-1.00', 'kg', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid amount input'),
(39, '20', 'lb', 'kg', 9.07, 'Weak and Strong Normal', 'Valid input'),
(40, '10', 'unknown', 'kg', 0.00, 'Weak and Strong Robust', 'Invalid unit input');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weight_conversion`
--
ALTER TABLE `weight_conversion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weight_conversion`
--
ALTER TABLE `weight_conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
