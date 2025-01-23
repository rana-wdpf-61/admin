-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 08:08 PM
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
-- Database: `production_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_adjustment_type`
--

CREATE TABLE `core_adjustment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `factor` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_categories`
--

CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_categories`
--

INSERT INTO `core_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fashun Cloth', '2024-11-22 00:30:23', '2024-11-22 00:30:23'),
(2, 'Shoes', '2024-11-22 00:38:39', '2024-11-22 00:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `core_customars`
--

CREATE TABLE `core_customars` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_customars`
--

INSERT INTO `core_customars` (`id`, `name`, `phone`, `email`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Shafiq', '0123654789', 'iam.ryanrana', 'Dhaka', '3.png', '2024-11-20 18:02:45', '2024-11-20 18:02:45'),
(2, 'AYNUL BARI ', '0236985211', 'aynul.bari0@gmail.com', 'Rajshahi', 'abc-gmail-com.jpg', '2024-11-20 18:06:08', '2024-11-20 18:06:08'),
(3, 'Rashed khan', '23659898', 'rashedkhan@gmail.com', 'Dhanmondi, Dhaka', '', '2024-11-20 18:10:44', '2024-11-20 18:10:44'),
(4, 'Faruk', '1236547889', 'iam.ryanrana', 'Naogaon', '', '2024-11-20 18:15:34', '2024-11-20 18:15:34'),
(5, 'Karim Khan', '01318172994', 'bari@gmail.com', 'Dhaka', '', '2024-11-21 16:56:13', '2024-11-21 16:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `core_manufacturers`
--

CREATE TABLE `core_manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_manufacturers`
--

INSERT INTO `core_manufacturers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Rahman', '01318172994', 'rahman@gmail.com', 'Dhaka', '2024-11-20 23:31:52', '2024-11-20 23:31:52'),
(2, 'Karim', '0123654778', 'karim@gmail.com', 'Rajshahi', '2024-11-20 23:34:26', '2024-11-20 23:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(11) NOT NULL,
  `customar_id` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `uom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `customar_id`, `order_total`, `discount`, `shipping_address`, `paid_amount`, `status_id`, `order_date`, `delivery_date`, `vat`, `created_at`, `updated_at`, `uom_id`) VALUES
(1, 2024, 12121, 12, 'ASDFDS', 20000, 0, '2024-11-26', '2024-11-26', 121, '2024-11-26 23:02:11', '2024-11-26 23:02:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `uom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `created_at`, `updated_at`, `uom_id`) VALUES
(1, 1, 1, 6, 1000, 10, '2024-11-27 15:21:18', '2024-11-27 15:21:18', 1),
(2, 0, 2, 6, 500, 121, '2024-11-29 00:07:20', '2024-11-29 00:07:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_payments`
--

CREATE TABLE `core_payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `barcode` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `star` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `is_feature` varchar(50) DEFAULT NULL,
  `is_brand` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `price`, `offer_price`, `categorie_id`, `uom_id`, `barcode`, `sku`, `manufacturer_id`, `star`, `photo`, `description`, `weight`, `size`, `is_feature`, `is_brand`, `created_at`, `updated_at`) VALUES
(1, 'Formal Black coat', 50000, 0, 0, 0, 101, 1, 1, '5', '02.png', 'sfdsfsdf', 3, '0', '', '', '2024-11-19 16:38:30', '2024-11-19 16:38:30'),
(2, 'Laptop', 1500, 50, 1, 4, 5, 523, 2, '5', '04.png', '', 3, '1111', 'xvxcv', '', '2024-11-19 18:55:10', '2024-11-19 18:55:10'),
(3, 'Table', 500, 1212, 1, 8, 8, 12, 3, '5', '03.png', 'dfgdsfgsdfg', 3, '1111', 'xvxcv', 'xcvxcvxc', '2024-11-25 17:20:22', '2024-11-25 17:20:22'),
(4, 'Watch', 1500, 100, 0, 250, 105, 10001, 0, '5', '07.png', 'This watch is good', 0, '2', 'Good', 'Rolex', '2024-11-25 18:50:56', '2024-11-25 18:50:56'),
(13, 'Laptop', 30, 0, 2, 0, 102, 12, 2, '5', '', ',m,m,', 3, '0', '', ' selected', '2024-11-30 17:11:04', '2024-11-30 17:11:04'),
(14, 'Laptop', 0, 0, 2, 0, 0, 0, 1, '', '', '', 0, '0', 'Yes', 'No', '2024-11-30 17:19:28', '2024-11-30 17:19:28'),
(15, '', 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '0', '', 'No', '2024-11-30 17:23:15', '2024-11-30 17:23:15'),
(16, 'Laptop', 100000, 0, 1, 1, 102, 12, 1, '5', '', 'hjhj', 3, 'XL', 'Yes', 'Yes', '2024-12-01 21:50:36', '2024-12-01 21:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shipping_address` varchar(150) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `supplier_id`, `status_id`, `order_total`, `paid_amount`, `discount`, `vat`, `delivery_date`, `date`, `shipping_address`, `description`, `created_at`, `updated_at`, `products_id`) VALUES
(1, 1, 1, 121, 2, 12, 121, '0000-00-00', '2024-11-23', 'fgfgf', 'fgfgfgf', '2024-11-23 18:11:03', '2024-11-23 18:11:03', 2),
(3, 1, 1, 12121, 1212, 1212, 12121, '0000-00-00', '2024-11-27', 'jhjhjh', 'kjkjkkj', '2024-11-27 23:27:34', '2024-11-27 23:27:34', 2),
(5, 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '2024-12-06 00:17:29', '2024-12-06 00:17:29', 0),
(6, 1, 1, 4725, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '2024-12-06 14:30:15', '2024-12-06 14:30:15', 0),
(7, 1, 1, 103950, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '2024-12-06 14:33:16', '2024-12-06 14:33:16', 0),
(8, 2, 1, 99750, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '2024-12-06 21:04:37', '2024-12-06 21:04:37', 0),
(9, 4, 1, 14700, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '2024-12-07 19:32:15', '2024-12-07 19:32:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases_details`
--

CREATE TABLE `core_purchases_details` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `vat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchases_details`
--

INSERT INTO `core_purchases_details` (`id`, `purchases_id`, `product_id`, `qty`, `price`, `discount`, `created_at`, `updated_at`, `vat`) VALUES
(1, 1, 1, 6, 1500, 120, '2024-11-22 23:29:43', '2024-11-22 23:29:43', 0),
(2, 0, 3, 5, 1000, 500, '2024-12-06 14:30:15', '2024-12-06 14:30:15', 0),
(3, 0, 4, 10, 10000, 1000, '2024-12-06 14:33:16', '2024-12-06 14:33:16', 0),
(4, 0, 13, 5, 20000, 5000, '2024-12-06 21:04:37', '2024-12-06 21:04:37', 0),
(5, 0, 3, 10, 1500, 1000, '2024-12-07 19:32:15', '2024-12-07 19:32:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-01 22:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 00:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-06 22:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 00:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 00:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2024-11-22 01:08:54', '2024-11-22 01:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `core_stock`
--

CREATE TABLE `core_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `uom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock`
--

INSERT INTO `core_stock` (`id`, `product_id`, `transaction_type_id`, `warehouse_id`, `qty`, `remark`, `created_at`, `updated_at`, `uom_id`) VALUES
(2, 3, 3, 0, 5, '', '2024-12-06 14:30:15', '2024-12-06 14:30:15', 0),
(3, 4, 3, 0, 10, '', '2024-12-06 14:33:16', '2024-12-06 14:33:16', 0),
(4, 13, 3, 0, 5, '', '2024-12-06 21:04:37', '2024-12-06 21:04:37', 0),
(5, 3, 3, 0, 10, '', '2024-12-07 19:32:16', '2024-12-07 19:32:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment`
--

CREATE TABLE `core_stock_adjustment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adjustment_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_details`
--

CREATE TABLE `core_stock_adjustment_details` (
  `id` int(11) NOT NULL,
  `stock_adjustment_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustment_details`
--

INSERT INTO `core_stock_adjustment_details` (`id`, `stock_adjustment_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5454, 45454, '2024-11-24 19:41:05', '2024-11-24 19:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `phone`, `email`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'AYNUL BARI ', '0123569888', 'aynul.bari0@gmail.com', '', '', '2024-11-19 19:37:33', '2024-11-19 19:37:33'),
(2, 'AYNUL', '01318172994', 'aynul.bari0@gmail.com', 'Rajshahi', '', '2024-11-19 19:40:54', '2024-11-19 19:40:54'),
(3, 'AYNUL', '01318172994', 'aynul.bari0@gmail.com', 'Khulna', '', '2024-11-19 21:35:21', '2024-11-19 21:35:21'),
(4, 'Karim', '01318172994', 'bari@gmail.com', 'Dhaka', '', '2024-11-19 22:42:49', '2024-11-19 22:42:49'),
(5, 'Rahman', '2154548787', 'aynul.bari0@gmail.com', 'Rajshahi', '', '2024-11-19 22:43:13', '2024-11-19 22:43:13'),
(6, 'Rasel', '8787878787', 'aynul.bari0@gmail.com', 'Rangpur', '', '2024-11-19 22:43:27', '2024-11-19 22:43:27'),
(7, 'Kader', '989895656', 'superadmin@productify.com', 'Badda Dhaka', '', '2024-11-19 22:43:55', '2024-11-19 22:43:55'),
(8, 'Shohan', '32656989', 'shohan@gmail.com', 'Rajshahi', '', '2024-11-20 15:21:43', '2024-11-20 15:21:43'),
(9, 'Rahman', '01318172994', 'iam.ryanrana', 'Dhaka', '', '2024-11-21 16:21:20', '2024-11-21 16:21:20'),
(10, 'Sajib', '01318172994', 'rana.net1995gmail.com', 'Rajshahi', '', '2024-11-21 16:43:54', '2024-11-21 16:43:54'),
(14, 'Kader', '1414141414', 'bari@gmail.com', '', 'towhid1-outlook-com-jpg.jpg', '2024-11-29 17:20:31', '2024-11-29 17:20:31'),
(15, 'Rahman', '1417585858', 'iam.ryanrana', 'jhkjkhjk', 'towhid1-outlook-com-jpg.jpg', '2024-11-29 17:22:14', '2024-11-29 17:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_type`
--

CREATE TABLE `core_transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `factor` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_uom`
--

INSERT INTO `core_uom` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'gm', '2024-11-22 01:16:46', '2024-11-22 01:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-28 23:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-03 23:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-14 22:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-03 23:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-03 23:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-03 23:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-03 23:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-14 22:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-03 23:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 01:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 00:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 01:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', ''),
(214, 'AYNUL BARI ', 0, '', '', '', '0000-00-00 00:00:00', '04.png', '', 0, '01774520752', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(215, 'Manager', 0, '', 'superadmin@productify.com', '', '0000-00-00 00:00:00', '', '', 0, '01774520752', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouse`
--

CREATE TABLE `core_warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_warehouse`
--

INSERT INTO `core_warehouse` (`id`, `name`, `phone`, `location`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Ashok house', '014785236', 'Dhaka', 'Dhanmondi,Dhaka.', '2024-12-06 21:13:40', '2024-12-06 21:13:40'),
(3, 'Totul Enter Prise', '012369854', 'Rajshahi', 'Shaheb Bazar, Rajshahi.', '2024-12-06 21:37:02', '2024-12-06 21:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_adjustment_type`
--
ALTER TABLE `core_adjustment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_categories`
--
ALTER TABLE `core_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_customars`
--
ALTER TABLE `core_customars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_order_details`
--
ALTER TABLE `core_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_payments`
--
ALTER TABLE `core_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_products`
--
ALTER TABLE `core_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases_details`
--
ALTER TABLE `core_purchases_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_roles`
--
ALTER TABLE `core_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_status`
--
ALTER TABLE `core_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock`
--
ALTER TABLE `core_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment`
--
ALTER TABLE `core_stock_adjustment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transaction_type`
--
ALTER TABLE `core_transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_uom`
--
ALTER TABLE `core_uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_warehouse`
--
ALTER TABLE `core_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_adjustment_type`
--
ALTER TABLE `core_adjustment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_categories`
--
ALTER TABLE `core_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_customars`
--
ALTER TABLE `core_customars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_payments`
--
ALTER TABLE `core_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_purchases_details`
--
ALTER TABLE `core_purchases_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_stock`
--
ALTER TABLE `core_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_stock_adjustment`
--
ALTER TABLE `core_stock_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `core_transaction_type`
--
ALTER TABLE `core_transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_uom`
--
ALTER TABLE `core_uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `core_warehouse`
--
ALTER TABLE `core_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
