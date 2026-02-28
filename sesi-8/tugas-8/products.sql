-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2026 at 08:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootcamp_eduwork_tugas_8`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `is_best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `subcategory`, `stock`, `image`, `is_best_seller`, `created_at`, `updated_at`) VALUES
(1, 'Flannel Check Shirt', 'Soft flannel shirt with check pattern', 199000, 'Shirt', 'Flannel', 14, 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf', 0, '2026-02-28 06:53:17', '2026-02-28 06:53:17'),
(2, 'Oversized Street Shirt', 'Trendy oversized streetwear shirt', 209000, 'Shirt', 'Oversized Shirt', 11, 'https://images.unsplash.com/photo-1621072156002-e2fccdc0b176', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(3, 'Cargo Pants', 'Durable cargo pants with multiple pockets', 269000, 'Pants', 'Cargo', 17, 'https://images.unsplash.com/photo-1506629905607-45c16f7f2c77', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(4, 'Slim Fit Shorts', 'Comfortable slim fit shorts', 159000, 'Pants', 'Shorts', 22, 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(5, 'High Top Sneakers', 'Stylish high top sneakers', 429000, 'Shoes', 'Sneakers', 9, 'https://images.unsplash.com/photo-1600269452121-4f2416e55c28', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(6, 'Casual Sandals', 'Comfortable everyday sandals', 139000, 'Shoes', 'Sandals', 20, 'https://images.unsplash.com/photo-1624006389438-c03488175975', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(7, 'Leather Boots', 'Premium leather boots for outdoor style', 559000, 'Shoes', 'Boots', 6, 'https://images.unsplash.com/photo-1520639888713-7851133b1ed0', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(8, 'Winter Coat', 'Warm winter coat for cold weather', 599000, 'Outerwear', 'Coat', 8, 'https://images.unsplash.com/photo-1548126032-079a0fb0099d', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(9, 'Casual Blazer', 'Smart casual blazer for daily wear', 449000, 'Outerwear', 'Blazer', 10, 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(10, 'Floral Summer Dress', 'Light floral dress for summer', 299000, 'Dress', 'Summer Dress', 13, 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(11, 'Bodycon Dress', 'Elegant bodycon dress', 389000, 'Dress', 'Formal Dress', 7, 'https://images.unsplash.com/photo-1568252542512-9fe8fe9c87bb', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(12, 'Sport Smart Watch', 'Modern smartwatch with sport features', 699000, 'Accessories', 'Watch', 5, 'https://images.unsplash.com/photo-1546868871-7041f2a55e12', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(13, 'Casual Sunglasses', 'UV protection sunglasses', 149000, 'Accessories', 'Sunglasses', 28, 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(14, 'Mini Backpack', 'Compact and stylish backpack', 249000, 'Accessories', 'Bag', 16, 'https://images.unsplash.com/photo-1514477917009-389c76a86b68', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(15, 'Knitted Scarf', 'Warm knitted scarf', 99000, 'Others', 'Scarf', 24, 'https://images.unsplash.com/photo-1601924928376-7d3c6a6c3d62', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(16, 'Bucket Hat', 'Trendy bucket hat for casual look', 89000, 'Others', 'Hat', 19, 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(17, 'Canvas Sneakers', 'Comfortable canvas sneakers', 259000, 'Shoes', 'Sneakers', 15, 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(18, 'Denim Shorts', 'Classic denim shorts', 179000, 'Pants', 'Shorts', 21, 'https://images.unsplash.com/photo-1560243563-062bfc001d68', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(19, 'Zip Hoodie', 'Comfortable zip hoodie', 309000, 'Outerwear', 'Hoodie', 18, 'https://images.unsplash.com/photo-1556821840-3a63f95609a7', 1, '2026-02-28 06:54:24', '2026-02-28 06:54:24'),
(20, 'Formal Silk Shirt', 'Premium silk formal shirt', 349000, 'Shirt', 'Formal Shirt', 9, 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c', 0, '2026-02-28 06:54:24', '2026-02-28 06:54:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
