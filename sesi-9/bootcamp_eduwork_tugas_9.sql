-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2026 at 06:08 PM
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
-- Database: `bootcamp_eduwork_tugas_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES
(1, 'Flannel Check Shirt', 'Soft flannel shirt with check pattern', 199000, 'Shirt', 'products/flannel-check-shirt.jpg'),
(2, 'Oversized Street Shirt', 'Trendy oversized streetwear shirt', 209000, 'Shirt', 'products/trendy-oversized-streetwear-shirt.jpg'),
(3, 'Cargo Pants', 'Durable cargo pants with multiple pockets', 269000, 'Pants', 'https://images.unsplash.com/photo-1506629905607-45c16f7f2c77'),
(4, 'Slim Fit Shorts', 'Comfortable slim fit shorts', 159000, 'Pants', 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b'),
(5, 'High Top Sneakers', 'Stylish high top sneakers', 429000, 'Shoes', 'products/stylish-high-top-sneakers.jpg'),
(6, 'Casual Sandals', 'Comfortable everyday sandals', 139000, 'Shoes', 'products/comfortable-everyday-sandals.jpg'),
(7, 'Leather Boots', 'Premium leather boots for outdoor style', 559000, 'Shoes', 'https://images.unsplash.com/photo-1520639888713-7851133b1ed0'),
(8, 'Winter Coat', 'Warm winter coat for cold weather', 599000, 'Outerwear', 'https://images.unsplash.com/photo-1548126032-079a0fb0099d'),
(9, 'Casual Blazer', 'Smart casual blazer for daily wear', 449000, 'Outerwear', 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35'),
(10, 'Floral Summer Dress', 'Light floral dress for summer', 299000, 'Dress', 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d'),
(11, 'Bodycon Dress', 'Elegant bodycon dress', 389000, 'Dress', 'https://images.unsplash.com/photo-1568252542512-9fe8fe9c87bb'),
(12, 'Sport Smart Watch', 'Modern smartwatch with sport features', 699000, 'Accessories', 'https://images.unsplash.com/photo-1546868871-7041f2a55e12'),
(13, 'Casual Sunglasses', 'UV protection sunglasses', 149000, 'Accessories', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083'),
(14, 'Mini Backpack', 'Compact and stylish backpack', 249000, 'Accessories', 'https://images.unsplash.com/photo-1514477917009-389c76a86b68'),
(15, 'Knitted Scarf', 'Warm knitted scarf', 99000, 'Others', 'https://images.unsplash.com/photo-1601924928376-7d3c6a6c3d62'),
(16, 'Bucket Hat', 'Trendy bucket hat for casual look', 89000, 'Others', 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b'),
(17, 'Canvas Sneakers', 'Comfortable canvas sneakers', 259000, 'Shoes', 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77'),
(18, 'Denim Shorts', 'Classic denim shorts', 179000, 'Pants', 'https://images.unsplash.com/photo-1560243563-062bfc001d68'),
(19, 'Zip Hoodie', 'Comfortable zip hoodie', 309000, 'Outerwear', 'https://images.unsplash.com/photo-1556821840-3a63f95609a7'),
(20, 'Formal Silk Shirt', 'Premium silk formal shirt', 349000, 'Shirt', 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c'),
(21, 'Buku PHP', 'Buku yang bagus', 50000, 'Others', 'products/buku-php.jpg'),
(22, 'Buku Laravel', 'Buku Laravel versi 5', 80000, 'Others', 'product_69dd2fc3ddc619.87215591.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `status`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pending', 1297000, 6, '2026-04-13 15:01:18', '2026-04-13 15:01:18'),
(2, 'pending', 866000, 7, '2026-04-13 16:40:31', '2026-04-13 16:40:31'),
(3, 'pending', 2428000, 8, '2026-04-13 17:38:34', '2026-04-13 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` int NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `total_price` int UNSIGNED NOT NULL,
  `product_id` int DEFAULT NULL,
  `transaction_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `quantity`, `total_price`, `product_id`, `transaction_id`, `created_at`) VALUES
(1, 1, 269000, 3, 1, '2026-04-13 15:01:18'),
(2, 1, 429000, 5, 1, '2026-04-13 15:01:18'),
(3, 1, 599000, 8, 1, '2026-04-13 15:01:18'),
(4, 1, 199000, 1, 2, '2026-04-13 16:40:31'),
(5, 1, 209000, 2, 2, '2026-04-13 16:40:31'),
(6, 1, 299000, 10, 2, '2026-04-13 16:40:31'),
(7, 1, 159000, 4, 2, '2026-04-13 16:40:31'),
(8, 8, 1592000, 1, 3, '2026-04-13 17:38:34'),
(9, 4, 836000, 2, 3, '2026-04-13 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Andi Pratama', 'andi.pratama@email.com', '', ''),
(2, 'Siti Rahma', 'siti.rahma@email.com', '', ''),
(3, 'Budi Santoso', 'budi.santoso@email.com', '', ''),
(4, 'Dewi Lestari', 'dewi.lestari@email.com', '', ''),
(5, 'Rizky Saputra', 'rizky.saputra@email.com', '', ''),
(6, 'Aloha', 'aloha@email.com', '0888981231238', 'Jalan jalan'),
(7, 'Afatar', 'afatar@email.com', '0888981231238', 'Jalan jalan'),
(8, 'Ali', 'ali@email.com', '0888981231238', 'Jalan jalan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction` (`transaction_id`),
  ADD KEY `fk_product` (`product_id`);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
