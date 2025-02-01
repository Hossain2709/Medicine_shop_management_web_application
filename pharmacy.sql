-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 09:41 AM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayurvedic_products`
--

CREATE TABLE `ayurvedic_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(3,1) DEFAULT 0.0,
  `rating_count` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock_quantity` int(11) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ayurvedic_products`
--

INSERT INTO `ayurvedic_products` (`product_id`, `name`, `brand`, `category`, `price`, `rating`, `rating_count`, `image_url`, `created_at`, `stock_quantity`, `description`) VALUES
(1, 'Herbal Liver Detox', 'Himalaya', 'Herbal Supplements', 19.99, 4.8, 245, NULL, '2025-01-13 13:18:28', 100, NULL),
(2, 'Amla Juice', 'Patanjali', 'Ayurvedic Medicines', 7.99, 4.2, 187, NULL, '2025-01-13 13:18:28', 150, NULL),
(3, 'Ayurvedic Skin Cream', 'Baidyanath', 'Skin Care Products', 15.99, 4.7, 312, NULL, '2025-01-13 13:18:28', 80, NULL),
(4, 'Herbal Hair Oil', 'Dabur', 'Hair Care Products', 9.99, 4.1, 156, NULL, '2025-01-13 13:18:28', 120, NULL),
(5, 'Ashwagandha Tablets', 'Himalaya', 'Herbal Supplements', 24.99, 4.6, 278, NULL, '2025-01-13 13:18:28', 90, NULL),
(6, 'Neem Face Wash', 'Patanjali', 'Skin Care Products', 5.99, 4.3, 423, NULL, '2025-01-13 13:18:28', 200, NULL),
(7, 'Brahmi Oil', 'Baidyanath', 'Hair Care Products', 12.99, 4.4, 167, NULL, '2025-01-13 13:18:28', 75, NULL),
(8, 'Lavender Essential Oil', 'Dabur', 'Essential Oils', 14.99, 4.5, 198, NULL, '2025-01-13 13:18:28', 60, NULL),
(9, 'Triphala Tablets', 'Himalaya', 'Ayurvedic Medicines', 17.99, 4.8, 345, NULL, '2025-01-13 13:18:28', 110, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Net_Price` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `Name`, `Net_Price`, `Quantity`, `Price`) VALUES
(0, 6, 3, 'DayQuil', 9.49, 1, 9.49),
(0, 6, 2, 'Naproxen', 7.99, 1, 7.99);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `rating_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `name`, `brand`, `description`, `price`, `rating`, `rating_count`) VALUES
(1, 'Thermometer', 'Omron', 'Digital thermometer for precise temperature measurement', 15.99, 4.50, 120),
(2, 'Blood Pressure Monitor', 'Withings', 'Automated BP monitoring with advanced features', 99.99, 4.70, 250),
(3, 'Glucose Meter', 'Accu-Chek', 'Portable blood glucose meter for diabetic patients', 35.50, 4.30, 180),
(4, 'Pulse Oximeter', 'Wellue', 'Finger pulse oximeter for measuring oxygen levels', 25.75, 4.60, 220),
(5, 'Nebulizer', 'Philips', 'Portable nebulizer for respiratory treatments', 60.00, 1.00, 150),
(6, 'Stethoscope', '3M Littmann', 'High-quality stethoscope for professional use', 120.00, 4.80, 300),
(7, 'Inhaler', 'Ventolin', 'Portable inhaler for asthma treatment', 14.99, 4.50, 200),
(8, 'Digital Thermometer', 'Braun', 'Fast digital thermometer with accurate readings', 19.50, 4.20, 130),
(9, 'Hot Water Bottle', 'Homedics', 'Soft fabric-covered hot water bottle for pain relief', 12.95, 4.00, 110),
(10, 'CPAP Machine', 'ResMed', 'CPAP machine for sleep apnea treatment', 350.00, 4.70, 90),
(11, 'Therapeutic Massager', 'Naipo', 'Neck and back massager with heating function', 49.99, 2.00, 200),
(12, 'TENS Unit', 'Omron', 'Transcutaneous electrical nerve stimulation device', 79.99, 4.30, 150),
(13, 'Electrocardiogram Monitor', 'KardiaMobile', 'Portable ECG monitor for heart health', 99.95, 4.70, 140),
(14, 'Ear Thermometer', 'Exergen', 'Non-contact infrared ear thermometer', 40.00, 4.40, 180),
(15, 'Sphygmomanometer', 'Omron', 'Manual blood pressure cuff for accurate readings', 25.00, 4.30, 220),
(16, 'First Aid Kit', 'Red Cross', 'Comprehensive first aid kit for emergency use', 35.00, 4.50, 300),
(17, 'Sleep Apnea Device', 'Philips Respironics', 'Sleep apnea treatment device for improved breathing', 299.99, 4.80, 100),
(18, 'Smart Glucose Meter', 'Dexcom', 'Continuous glucose monitoring system for diabetics', 300.00, 4.90, 80),
(19, 'Fertility Monitor', 'Clearblue', 'Advanced fertility monitoring system', 110.00, 3.00, 70),
(20, 'Vitamin Dispenser', 'Medisure', 'Automated vitamin and pill dispenser', 50.00, 4.40, 130);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` enum('Pending','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `address`, `phone`, `payment_method`, `status`, `order_date`) VALUES
(1, 6, 64.92, 'nadim', '01679524138', 'Cash on Delivery', 'Pending', '2025-01-25 10:06:24'),
(2, 6, 27.47, 'gazipur', '01679524138', 'Cash on Delivery', 'Pending', '2025-01-25 10:08:01'),
(3, 6, 43.95, 'Dhaka', '01679524138', 'Cash on Delivery', 'Pending', '2025-01-25 10:51:51'),
(4, 6, 38.96, 'Cumilla', '01679524138', 'Cash on Delivery', 'Pending', '2025-01-25 11:26:51'),
(5, 6, 51.03, 'Dhaka, BD', '01679524138', 'Cash on Delivery', 'Pending', '2025-01-25 16:01:42'),
(6, 6, 30.56, 'Kuril, Dhaka, Bangladesh', '1234456', 'Cash on Delivery', 'Pending', '2025-01-25 16:04:09'),
(7, 6, 31.76, 'Channa, Gazipur', '1234456', 'Cash on Delivery', 'Pending', '2025-01-25 16:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `price`) VALUES
(1, 1, 2, 7.99),
(2, 1, 1, 6.99),
(3, 1, 1, 6.99),
(4, 1, 2, 7.99),
(5, 1, 2, 7.99),
(6, 1, 3, 9.49),
(7, 1, 3, 9.49),
(8, 1, 2, 7.99),
(9, 2, 2, 7.99),
(10, 2, 3, 9.49),
(11, 2, 4, 9.99),
(12, 3, 3, 9.49),
(13, 3, 4, 9.99),
(14, 3, 1, 6.99),
(15, 3, 2, 7.99),
(16, 3, 3, 9.49),
(17, 4, 3, 9.49),
(18, 4, 4, 9.99),
(19, 4, 3, 9.49),
(20, 4, 4, 9.99),
(21, 5, 5, 8.29),
(22, 5, 1, 6.99),
(23, 5, 3, 9.49),
(24, 5, 6, 5.49),
(25, 5, 10, 5.79),
(26, 5, 4, 9.99),
(27, 5, 9, 4.99),
(28, 6, 3, 9.49),
(29, 6, 5, 8.29),
(30, 6, 8, 6.99),
(31, 6, 10, 5.79),
(32, 7, 1, 6.99),
(33, 7, 3, 9.49),
(34, 7, 8, 6.99),
(35, 7, 5, 8.29);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires_at`, `created_at`) VALUES
(9, 'niyazmahmud213@gmail.com', '46c95f2a2edd90a63b1a95b384dab66acbb11c7e0f1d74aedc4ef2695f4b57d5', '2025-01-14 16:41:51', '2025-01-14 14:41:51'),
(10, 'niyazmahmud213@gmail.com', '220bcfb24a03ce68792c1091fd0e2ac7940b650b376080075b3e8d71e63326c3', '2025-01-14 16:42:55', '2025-01-14 14:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_care`
--

CREATE TABLE `personal_care` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(3,1) DEFAULT 0.0,
  `rating_count` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_care`
--

INSERT INTO `personal_care` (`product_id`, `name`, `category`, `brand`, `price`, `rating`, `rating_count`, `image_url`, `created_at`) VALUES
(1, 'Moisturizing Skin Lotion', 'Skin Care', 'Nivea', 15.99, 5.0, 245, 'lotion.jpg', '2025-01-13 12:57:24'),
(2, 'Shaving Razor Kit', 'Shaving & Grooming', 'Gillette', 22.99, 4.0, 187, 'razor.jpg', '2025-01-13 12:57:24'),
(3, 'Electric Toothbrush', 'Oral Care', 'Oral-B', 49.99, 5.0, 312, 'toothbrush.jpg', '2025-01-13 12:57:24'),
(4, 'Hair Shampoo', 'Hair Care', 'Dove', 10.99, 4.0, 156, 'shampoo.jpg', '2025-01-13 12:57:24'),
(5, 'Body Wash', 'Bath & Body', 'Dove', 8.99, 4.5, 178, 'bodywash.jpg', '2025-01-13 12:57:24'),
(6, 'Face Cream', 'Skin Care', 'Nivea', 19.99, 4.2, 203, 'facecream.jpg', '2025-01-13 12:57:24'),
(7, 'Hair Conditioner', 'Hair Care', 'Dove', 11.99, 4.3, 145, 'conditioner.jpg', '2025-01-13 12:57:24'),
(8, 'Dental Floss', 'Oral Care', 'Oral-B', 5.99, 4.8, 89, 'floss.jpg', '2025-01-13 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prescription_image_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `name`, `description`, `price`) VALUES
(1, 'Pain Relief', 'Paracetamol', 'Bottle contains 100 tablets of 500mg each', 6.99),
(2, 'Pain Relief', 'Naproxen', 'Bottle contains 30 tablets of 250mg each', 7.99),
(3, 'Cold & Flu', 'DayQuil', 'Bottle contains 24 liquid doses of 10ml each', 9.49),
(4, 'Cold & Flu', 'NyQuil', 'Bottle contains 24 liquid doses of 10ml each', 9.99),
(5, 'Allergy Relief', 'Zyrtec', 'Pack contains 30 tablets of 10mg each', 8.29),
(6, 'Allergy Relief', 'Benadryl', 'Bottle contains 50 tablets of 25mg each', 5.49),
(7, 'Digestive Health', 'Pepto Bismol', 'Bottle contains 16oz of liquid solution', 7.99),
(8, 'Digestive Health', 'Tums', 'Bottle contains 120 tablets of 500mg each', 6.99),
(9, 'First Aid', 'Band-Aids', 'Box contains 50 assorted bandages', 4.99),
(10, 'First Aid', 'Hydrocortisone Cream', 'Tube contains 30g of 1% hydrocortisone cream', 5.79),
(11, 'Pain Relief', 'Aspirin', 'Pain reliever', 5.00),
(12, 'Pain Relief', 'Paracetamol', 'Fever and pain relief', 3.00),
(13, 'Pain Relief', 'Aspirin', 'Pain reliever', 5.00),
(14, 'Pain Relief', 'Paracetamol', 'Fever and pain relief', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE `supplements` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(3,1) DEFAULT 0.0,
  `rating_count` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock_quantity` int(11) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplements`
--

INSERT INTO `supplements` (`product_id`, `name`, `brand`, `category`, `price`, `rating`, `rating_count`, `image_url`, `created_at`, `stock_quantity`, `description`) VALUES
(1, 'Vitamin C 1000mg', 'Nature\'s Bounty', 'Vitamins', 19.99, 4.8, 245, NULL, '2025-01-13 13:14:41', 100, NULL),
(2, 'Whey Protein 2kg', 'Optimum Nutrition', 'Protein', 49.99, 4.2, 187, NULL, '2025-01-13 13:14:41', 50, NULL),
(3, 'Herbal Detox', 'Herbalife', 'Herbal Supplements', 29.99, 4.7, 312, NULL, '2025-01-13 13:14:41', 75, NULL),
(4, 'Amino Acids BCAA', 'Garden of Life', 'Amino Acids', 39.99, 4.1, 156, NULL, '2025-01-13 13:14:41', 60, NULL),
(5, 'Magnesium Tablets', 'Nature\'s Bounty', 'Minerals', 15.99, 4.5, 198, NULL, '2025-01-13 13:14:41', 120, NULL),
(6, 'Pre-Workout Formula', 'Optimum Nutrition', 'Protein', 34.99, 4.3, 223, NULL, '2025-01-13 13:14:41', 45, NULL),
(7, 'Green Tea Extract', 'Herbalife', 'Herbal Supplements', 24.99, 4.6, 167, NULL, '2025-01-13 13:14:41', 90, NULL),
(8, 'Multivitamin Complex', 'Garden of Life', 'Vitamins', 29.99, 4.4, 289, NULL, '2025-01-13 13:14:41', 150, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`) VALUES
(1, 'MD NURE ALAM NADIM', 'nadim@gmail.com', '12345678', ''),
(2, 'Nure Saba', 'saba@gmail.com', '12345678', ''),
(3, 'FARZANA AFRIN', 'farzana@gmail.com', '12345678', ''),
(4, 'Abrar Anan', 'abrar@gmail.com', '12345678', ''),
(5, 'MD NURE ALAM NADIM', 'alam@gmail.com', '12345678', ''),
(6, 'MD NURE ALAM', 'nur@gmail.com', '12345678', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayurvedic_products`
--
ALTER TABLE `ayurvedic_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_care`
--
ALTER TABLE `personal_care`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplements`
--
ALTER TABLE `supplements`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `ayurvedic_products`
--
ALTER TABLE `ayurvedic_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_care`
--
ALTER TABLE `personal_care`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
