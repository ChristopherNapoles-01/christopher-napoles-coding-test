-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 04:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fictional_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_04_15_050743_create_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'minima', 'Facilis est rerum deleniti est.', '72.60', '2023-04-15 06:20:53', '2023-04-15 06:20:53'),
(2, 'ea', 'Ex nemo ut soluta nostrum.', '11.92', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(3, 'est', 'Esse dolore tempore velit et dicta aliquid totam.', '1.80', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(4, 'nesciunt', 'Fuga in aut voluptatem quia nemo sit provident.', '95.59', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(5, 'ad', 'Totam voluptas nostrum eum maiores ipsa unde natus.', '38.74', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(6, 'porro', 'Est itaque velit eum magni omnis.', '37.52', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(7, 'sed', 'Vitae aspernatur consequuntur reiciendis.', '17.57', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(8, 'in', 'Quia qui aperiam architecto voluptates laboriosam.', '6.93', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(9, 'voluptatem', 'Autem fugit et officiis qui ab voluptas.', '54.15', '2023-04-15 06:20:54', '2023-04-15 06:20:54'),
(10, 'JBL Earphones', 'Samples', '90.37', '2023-04-15 06:20:54', '2023-04-15 06:24:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
