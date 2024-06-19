-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2024 at 08:18 AM
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
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(4, 102.00, 'paid', 1, 490922475, 'victoria', 'victoria', '2024-04-19 02:28:09'),
(5, 102.00, 'paid', 1, 490922475, 'victoria', 'victoria', '2024-04-19 02:32:30'),
(6, 10.00, 'paid', 1, 490922465, 'cairns', 'cairns', '2024-04-19 03:06:33'),
(7, 10.00, 'paid', 1, 490922435, 'sydney', '185-211 broadway', '2024-04-20 06:36:15'),
(9, 31.00, 'paid', 1, 490922435, 'sydney', 'sydney', '2024-04-21 00:24:35'),
(10, 11.00, 'paid', 1, 490922435, 'sydney', 'sydney', '2024-04-21 00:28:49'),
(11, 12.00, 'paid', 1, 490922435, 'sydney', 'sydney', '2024-04-21 00:30:47'),
(12, 16.00, 'paid', 1, 490922435, 'Sydney', 'sydney', '2024-04-21 00:37:06'),
(13, 99.00, 'paid', 1, 490922435, 'Sydney', '185-211, Broadway, Ultimo', '2024-04-21 00:38:48'),
(14, 149.00, 'paid', 1, 490922435, 'sydney', 'sydney', '2024-04-21 00:41:24'),
(15, 238.00, 'paid', 1, 490922435, 'Sydney', '185-211, Broadway, Ultimo', '2024-04-21 00:43:05'),
(16, 39.00, 'paid', 1, 490922435, 'sydney', '185 - 211, Broadway', '2024-04-21 01:03:09'),
(17, 50.00, 'paid', 1, 490922435, 'Sydney', '185-211, Broadway, Ultimo', '2024-04-21 01:06:05'),
(18, 90.00, 'paid', 1, 490922435, 'sydney', '185 - 211, Broadway', '2024-04-21 01:08:24'),
(19, 17.00, 'paid', 1, 490922435, 'sydney', '185 - 211, Broadway', '2024-04-21 01:29:59'),
(20, 549.00, 'paid', 1, 490922435, 'North Ryde', '29 A Cook Street', '2024-04-22 10:49:20'),
(21, 15.00, 'paid', 1, 490922435, 'sydney', '185,211', '2024-04-22 11:08:53'),
(22, 15.00, 'paid', 1, 490922435, 'North Ryde', '29 A Cook Street', '2024-04-22 11:13:02'),
(23, 153.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-22 11:14:25'),
(24, 16.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-22 11:16:18'),
(25, 48.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-22 11:42:21'),
(26, 114.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-22 11:49:49'),
(27, 164.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-22 11:50:21'),
(28, 534.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-23 15:31:19'),
(29, 534.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-23 15:34:20'),
(30, 178.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 00:38:22'),
(31, 182.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 00:42:17'),
(32, 26.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 00:51:10'),
(33, 30.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 05:32:40'),
(34, 16.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 05:34:25'),
(35, 21.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 05:38:38'),
(36, 21.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-24 05:40:33'),
(37, 10.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-24 07:39:43'),
(38, 21.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-26 03:54:47'),
(39, 21.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-26 03:55:13'),
(40, 21.00, 'paid', 1, 490922435, 'Ultimo', '185 - 211, Broadway', '2024-04-26 03:55:51'),
(41, 305.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-26 22:24:41'),
(42, 216.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-27 00:22:32'),
(43, 216.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-27 00:22:32'),
(44, 216.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-27 00:22:32'),
(45, 216.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-27 00:22:32'),
(46, 26.00, 'paid', 1, 490922435, 'North Ryde', '29A Cookstreet', '2024-04-27 00:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 3, '10', 'Brit Turkey', 'turkey.jpeg', 26.00, 2, 1, '2024-04-19 02:26:16'),
(2, 4, '10', 'Brit Turkey', 'turkey.jpeg', 26.00, 2, 1, '2024-04-19 02:28:09'),
(3, 4, '5', 'Plate', 'Plate.jpeg', 50.00, 1, 1, '2024-04-19 02:28:09'),
(4, 5, '10', 'Brit Turkey', 'turkey.jpeg', 26.00, 2, 1, '2024-04-19 02:32:30'),
(5, 5, '5', 'Plate', 'Plate.jpeg', 50.00, 1, 1, '2024-04-19 02:32:30'),
(6, 6, '22', 'High Protein Bar', 'Raspberry protein bar.jpeg', 10.00, 1, 1, '2024-04-19 03:06:33'),
(7, 7, '19', 'Milk', 'milk.jpeg', 10.00, 1, 1, '2024-04-20 06:36:15'),
(9, 9, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-21 00:24:35'),
(10, 9, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-21 00:24:35'),
(11, 10, '32', 'Crapefruit Drink', 'Crapefuit.jpeg', 11.00, 1, 1, '2024-04-21 00:28:49'),
(12, 11, '32', 'Crapefruit Drink', 'Crapefuit.jpeg', 11.00, 1, 1, '2024-04-21 00:30:47'),
(13, 11, '16', 'Apple', 'apple.jpeg', 1.00, 1, 1, '2024-04-21 00:30:47'),
(14, 12, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-21 00:37:06'),
(15, 13, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-21 00:38:48'),
(16, 13, '4', 'Bowl Set', 'bowls.jpeg', 83.00, 1, 1, '2024-04-21 00:38:48'),
(17, 14, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-21 00:41:24'),
(18, 14, '4', 'Bowl Set', 'bowls.jpeg', 83.00, 1, 1, '2024-04-21 00:41:24'),
(19, 14, '5', 'Plate', 'Plate.jpeg', 50.00, 1, 1, '2024-04-21 00:41:24'),
(20, 15, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-21 00:43:05'),
(21, 15, '4', 'Bowl Set', 'bowls.jpeg', 83.00, 1, 1, '2024-04-21 00:43:05'),
(22, 15, '5', 'Plate', 'Plate.jpeg', 50.00, 1, 1, '2024-04-21 00:43:05'),
(23, 15, '3', 'Vaccum Cleaner', 'VaccumCleaner.jpeg', 89.00, 1, 1, '2024-04-21 00:43:05'),
(24, 16, '7', 'Snake Plant', 'SnakePlant.jpeg', 39.00, 1, 1, '2024-04-21 01:03:09'),
(25, 17, '7', 'Snake Plant', 'SnakePlant.jpeg', 39.00, 1, 1, '2024-04-21 01:06:05'),
(26, 17, '34', 'Creamy Matcha', 'Creamymatcha.jpeg', 11.00, 1, 1, '2024-04-21 01:06:05'),
(27, 18, '7', 'Snake Plant', 'SnakePlant.jpeg', 39.00, 1, 1, '2024-04-21 01:08:24'),
(28, 18, '34', 'Creamy Matcha', 'Creamymatcha.jpeg', 11.00, 1, 1, '2024-04-21 01:08:24'),
(29, 18, '6', 'Cuttlery Set', 'Utensils.jpeg', 40.00, 1, 1, '2024-04-21 01:08:24'),
(30, 19, '24', 'Clean Protein Bar', 'Clean Protein Bar.jpeg', 17.00, 1, 1, '2024-04-21 01:29:59'),
(31, 20, '5', 'Plate', 'Plate.jpeg', 50.00, 5, 1, '2024-04-22 10:49:20'),
(32, 20, '8', 'Pothos Plant', 'Pothos.jpeg', 49.00, 1, 1, '2024-04-22 10:49:20'),
(33, 20, '9', 'Artificial Plant', 'ArtificialPlant.jpeg', 30.00, 7, 1, '2024-04-22 10:49:20'),
(34, 20, '13', 'Chicken & Veg', 'chickenveg.jpeg', 40.00, 1, 1, '2024-04-22 10:49:20'),
(35, 21, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-22 11:08:53'),
(36, 22, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-22 11:13:02'),
(37, 23, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 4, 1, '2024-04-22 11:14:25'),
(38, 23, '3', 'Vaccum Cleaner', 'VaccumCleaner.jpeg', 89.00, 1, 1, '2024-04-22 11:14:25'),
(39, 24, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-22 11:16:18'),
(40, 25, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 3, 1, '2024-04-22 11:42:21'),
(41, 26, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 4, 1, '2024-04-22 11:49:49'),
(42, 26, '5', 'Plate', 'Plate.jpeg', 50.00, 1, 1, '2024-04-22 11:49:49'),
(43, 27, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 4, 1, '2024-04-22 11:50:21'),
(44, 27, '5', 'Plate', 'Plate.jpeg', 50.00, 2, 1, '2024-04-22 11:50:21'),
(45, 29, '3', 'Vaccum Cleaner', 'VaccumCleaner.jpeg', 89.00, 6, 1, '2024-04-23 15:34:20'),
(46, 30, '3', 'Vaccum Cleaner', 'VaccumCleaner.jpeg', 89.00, 2, 1, '2024-04-24 00:38:22'),
(47, 31, '10', 'Brit Turkey', 'turkey.jpeg', 26.00, 7, 1, '2024-04-24 00:42:17'),
(48, 32, '10', 'Brit Turkey', 'turkey.jpeg', 26.00, 1, 1, '2024-04-24 00:51:10'),
(49, 33, '9', 'Artificial Plant', 'ArtificialPlant.jpeg', 30.00, 1, 1, '2024-04-24 05:32:40'),
(50, 34, '1', 'Cleaning Spray', 'CleaningSpray.jpeg', 16.00, 1, 1, '2024-04-24 05:34:25'),
(51, 35, '29', 'Frozen Sausage', 'sausages.jpeg', 21.00, 1, 1, '2024-04-24 05:38:38'),
(52, 36, '29', 'Frozen Sausage', 'sausages.jpeg', 21.00, 1, 1, '2024-04-24 05:40:33'),
(53, 37, '22', 'High Protein Bar', 'Raspberry protein bar.jpeg', 10.00, 1, 1, '2024-04-24 07:39:43'),
(54, 38, '29', 'Frozen Sausage', 'sausages.jpeg', 21.00, 1, 1, '2024-04-26 03:54:47'),
(55, 39, '29', 'Frozen Sausage', 'sausages.jpeg', 21.00, 1, 1, '2024-04-26 03:55:13'),
(56, 40, '29', 'Frozen Sausage', 'sausages.jpeg', 21.00, 1, 1, '2024-04-26 03:55:51'),
(57, 41, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-26 22:24:41'),
(58, 42, '32', 'Crapefruit Drink', 'Crapefuit.jpeg', 11.00, 1, 1, '2024-04-27 00:22:32'),
(59, 43, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-27 00:22:32'),
(60, 44, '5', 'Plate', 'Plate.jpeg', 50.00, 3, 1, '2024-04-27 00:22:32'),
(61, 45, '6', 'Cuttlery Set', 'Utensils.jpeg', 40.00, 1, 1, '2024-04-27 00:22:32'),
(62, 46, '16', 'Apple', 'apple.jpeg', 1.00, 1, 1, '2024-04-27 00:56:50'),
(63, 46, '19', 'Milk', 'milk.jpeg', 10.00, 1, 1, '2024-04-27 00:56:50'),
(64, 46, '24', 'Clean Protein Bar', 'Clean Protein Bar.jpeg', 17.00, 0, 1, '2024-04-27 00:56:50'),
(65, 46, '2', 'Toilet Brush', 'Toiletcleaner.jpeg', 15.00, 1, 1, '2024-04-27 00:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_unit` varchar(15) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `in_stock` int(10) UNSIGNED DEFAULT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_sub_category` varchar(108) NOT NULL,
  `product_description` varchar(108) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_name`, `product_unit`, `product_price`, `in_stock`, `product_category`, `product_sub_category`, `product_description`) VALUES
(1, 'CleaningSpray.jpeg', 'Cleaning Spray', '1 Litre', 16.00, 7, 'Household Goods', 'Cleaning', 'Organic Cleaning Spray'),
(2, 'Toiletcleaner.jpeg', 'Toilet Brush', '0.25 Kg', 15.00, 6, 'Household Goods', 'Cleaning', 'White Cleaning Brush'),
(3, 'VaccumCleaner.jpeg', 'Vaccum Cleaner', '2.5 Kg', 89.00, 0, 'Household Goods', 'Cleaning', 'Awesome Vaccum Cleaner'),
(4, 'bowls.jpeg', 'Bowl Set', '1.5 Kg', 83.00, 8, 'Household Goods', 'Cooking Tools', 'Wooden Bowl Set - 8 Pieces'),
(5, 'Plate.jpeg', 'Plate', '400 g', 50.00, 4, 'Household Goods', 'Cooking Tools', 'Wooden plate'),
(6, 'Utensils.jpeg', 'Cuttlery Set', '0.7 Kg', 40.00, 7, 'Household Goods', 'Cooking Tools', 'Wooden Cuttlery Set - 6 Pieces'),
(7, 'SnakePlant.jpeg', 'Snake Plant', '4.5 Kg', 39.00, 8, 'Household Goods', 'Plants', 'Indoor Snake Plant'),
(8, 'Pothos.jpeg', 'Pothos Plant', '5 Kg', 49.00, 8, 'Household Goods', 'Plants', 'Indoor Pothos Plant'),
(9, 'ArtificialPlant.jpeg', 'Artificial Plant', '4.5 Kg', 30.00, 7, 'Household Goods', 'Plants', 'Green Artificial Plant'),
(10, 'turkey.jpeg', 'Brit Turkey', '370 g', 26.00, 0, 'Pet Food', 'Canned', 'Grain and Soy Free Turkey'),
(11, 'lamb.jpeg', 'Monge Lamb', '370 g', 29.00, 8, 'Pet Food', 'Canned', 'Grain Free Formula Lamb'),
(12, 'duck.jpeg', 'Brit Duck', '370 g', 21.00, 8, 'Pet Food', 'Canned', 'Canned Brit Duck'),
(13, 'chickenveg.jpeg', 'Chicken & Veg', '17 kg', 40.00, 8, 'Pet Food', 'Dry', 'Dog Worker Wagg'),
(14, 'Dry Lamb & Rice.jpeg', 'Lamb & Rice', '15 kg', 40.00, 8, 'Pet Food', 'Dry', 'Rich in Lamb & Rice'),
(15, 'Dried Beef.jpeg', 'Dried Beef', '369 g', 40.00, 8, 'Pet Food', 'Dry', 'Freeze-Dried Raw'),
(16, 'apple.jpeg', 'Apple', '200 g', 1.00, 8, 'Fresh', 'Fruit & Vegetables', 'Fresh Healthy Fruit'),
(17, 'tomato.jpeg', 'Tomato', '200 g', 2.00, 8, 'Fresh', 'Fruit & Vegetables', 'Fresh Vegetable'),
(19, 'milk.jpeg', 'Milk', '2 Litre', 10.99, 8, 'Fresh', 'Dairy Products', 'Fresh Buffalo Milk'),
(20, 'Cheese.jpeg', 'Cheese', '226 g', 8.99, 8, 'Fresh', 'Dairy Products', 'Italian Sharp Cheese'),
(21, 'Yoghurt.jpeg', 'Yoghurt', '227 g', 12.99, 8, 'Fresh', 'Dairy Products', 'Mock Yoghurt'),
(22, 'Raspberry protein bar.jpeg', 'High Protein Bar', '40 g', 10.99, 7, 'Fresh', 'Protein', 'Raspberry Truffle Flavoured '),
(23, 'bult protein bar.jpeg', 'Bult Protein Bar', '23 g', 20.99, 8, 'Fresh', 'Protein', 'Pistachio Flavoured '),
(24, 'Clean Protein Bar.jpeg', 'Clean Protein Bar', '23 g', 17.99, 8, 'Fresh', 'Protein', 'Gluten Free Lemon Flavored'),
(25, 'Beans.jpeg', 'Frozen Beans', '520 g', 17.99, 8, 'Frozen', 'Frozen Plantable', 'Washed and Ready To Eat Beans'),
(26, 'Peas.jpeg', 'Frozen Peas', '520 g', 17.99, 8, 'Frozen', 'Frozen Plantable', 'Washed and Ready To Eat Peas'),
(27, 'corn.jpeg', 'Frozen Corn', '520 g', 17.99, 8, 'Frozen', 'Frozen Plantable', 'Washed and Ready To Eat Corn'),
(28, 'saags.jpeg', 'Frozen Meat', '520 g', 21.99, 8, 'Frozen', 'Frozen Non-Plantable', 'Saags Meat Turkey Breast'),
(29, 'sausages.jpeg', 'Frozen Sausage', '300 g', 21.99, 3, 'Frozen', 'Frozen Non-Plantable', 'Grillo Frozen Sausages'),
(30, 'Pierogies.jpeg', 'Frozen Pierogies', '520 g', 21.99, 8, 'Frozen', 'Frozen Non-Plantable', 'Rich Qulaity Frozen Pierogies'),
(31, 'Limedrink.jpeg', 'Lime Drink', '330 ml', 11.99, 8, 'Beverages', 'No', 'Fresh Lime Drink'),
(32, 'Crapefuit.jpeg', 'Crapefruit Drink', '330 ml', 11.99, 7, 'Beverages', 'No', 'Low Sugar Drink'),
(33, 'Orangedrink.jpeg', 'Orange Drink', '355 ml', 11.99, 8, 'Beverages', 'No', 'Parasol Orange Drink'),
(34, 'Creamymatcha.jpeg', 'Creamy Matcha', '355 ml', 11.99, 8, 'Beverages', 'No', 'Taika Creamy Matcha'),
(35, 'pear.jpeg', 'Pear', '200 g', 1.99, 8, 'Fresh', 'Fruit & Vegetables', 'Fresh Pear Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'info', 'info@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'khush', 'khush@gmail.com', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
