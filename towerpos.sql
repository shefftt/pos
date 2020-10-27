-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 10:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `towerpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectable` int(11) NOT NULL DEFAULT '0',
  `initial_balance` int(11) NOT NULL DEFAULT '0',
  `account_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type`, `selectable`, `initial_balance`, `account_no`, `created_at`, `updated_at`) VALUES
(1, 'الخزنه', '', 1, 0, 0, NULL, NULL),
(2, 'البنك', '', 2, 0, 0, NULL, NULL),
(3, 'اجل', '', 3, 0, 0, NULL, NULL),
(4, 'الموردين', '', 0, 0, 0, NULL, NULL),
(5, 'العملاء', '', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sub_id`, `created_at`, `updated_at`) VALUES
(1, 'المنتجات الاوليه', 0, NULL, NULL),
(2, 'الماكولات', 1, '2020-09-28 06:09:41', '2020-09-28 06:09:41'),
(3, 'ملابس', 0, '2020-09-28 07:04:46', '2020-09-28 07:04:46'),
(4, 'التصنيف الجديد', 0, '2020-09-28 07:08:57', '2020-09-28 07:08:57'),
(5, 'التنصيف الاجد', 0, '2020-09-28 07:10:30', '2020-09-28 07:10:30'),
(6, 'متجر خمرى', 3, '2020-09-28 07:12:34', '2020-09-28 07:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'السر على اراهيم', '0915903708', 'جبره', 1, '2020-10-08 17:14:08', '2020-10-21 15:27:44'),
(2, 'محمد احمد محمد احمد', '123456', 'لايوجد عنوان', 1, '2020-10-09 07:11:37', '2020-10-09 07:11:37'),
(3, 'محمد احمد محمد احمد', '123456', 'لايوجد عنوان', 1, '2020-10-09 07:12:23', '2020-10-09 07:12:23'),
(4, 'عرض اختبار', '2455588', 'العنوان الصح', 1, '2020-10-09 07:29:09', '2020-10-09 07:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_balance` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الكهرباء', 1, '2020-10-21 05:34:33', '2020-10-21 05:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_27_123937_create_products_table', 2),
(5, '2020_09_27_124253_create_stocks_table', 2),
(6, '2020_09_27_124818_create_customers_table', 3),
(7, '2020_09_27_172608_create_categories_table', 4),
(8, '2020_09_29_124944_create_purchase_invoice_h_table', 5),
(9, '2020_09_29_130314_create_purchase_invoice_d_table', 5),
(10, '2020_09_29_140745_create_suppliers_table', 5),
(11, '2020_09_29_141941_create_sales_invoice_h_table', 6),
(12, '2020_09_29_143625_create_sales_invoice_d_table', 6),
(13, '2020_10_05_130822_create_accounts_table', 6),
(14, '2020_10_05_134717_create_transactions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'كاش', 1, '2020-10-23 23:34:26', '2020-10-23 21:34:26'),
(2, 'شبكه', 1, '2020-10-23 23:30:16', '2020-10-23 21:30:16'),
(3, 'اجل', 1, '2020-10-23 22:06:23', '2020-10-23 22:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product.jpg',
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `purchase_price` int(11) NOT NULL DEFAULT '0',
  `sale_price` int(11) NOT NULL DEFAULT '0',
  `stock_id` int(11) NOT NULL DEFAULT '0',
  `qyt` int(11) NOT NULL DEFAULT '0',
  `barcode` int(11) NOT NULL DEFAULT '0',
  `vat` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `category_id`, `status`, `purchase_price`, `sale_price`, `stock_id`, `qyt`, `barcode`, `vat`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'اسم المنتج', 'product.jpg', '1', 0, 1500, 1000, 1, 120, 10, 0, 1, '2020-09-26 22:00:00', '2020-10-21 21:17:38'),
(2, 'المنتج الاول', 'product.jpg', '1', 0, 150, 120, 1, 120, 20, 1, 1, '2020-09-27 16:00:00', '2020-10-08 18:04:40'),
(3, 'المنتج الاول', 'product.jpg', '1', 0, 150, 120, 1, 120, 30, 20, 1, '2020-09-27 16:00:47', '2020-10-22 07:49:36'),
(4, 'المنج الجميل الشديد العجيب', 'product.jpg', '1', 0, 0, 120, 1, 0, 40, 17, 1, '2020-09-27 16:19:10', '2020-10-24 17:18:34'),
(5, 'منقه بالشطه', 'product.jpg', '2', 1, 1000, 1200, 1, 150, 40, 15, 1, '2020-10-21 20:56:40', '2020-10-21 20:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_d`
--

CREATE TABLE `purchase_invoice_d` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `qyt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `vat` int(11) NOT NULL DEFAULT '0',
  `sub_vat` int(11) NOT NULL DEFAULT '0',
  `current_qyt` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoice_d`
--

INSERT INTO `purchase_invoice_d` (`id`, `product_id`, `qyt`, `sub_total`, `price`, `invoice_id`, `vat`, `sub_vat`, `current_qyt`, `created_at`, `updated_at`) VALUES
(1, 1, '20', 1000.00, '50', 1, 0, 0, 0, '2020-09-28 22:00:00', '2020-09-28 22:00:00'),
(2, 2, '4850', 15422.00, '5452', 1, 0, 0, 0, '2020-09-28 22:00:00', '2020-09-28 22:00:00'),
(3, 1, '1', 1000.00, '1000', 25, 0, 0, 0, '2020-10-07 21:34:36', '2020-10-07 21:34:36'),
(4, 1, '2', 2000.00, '1000', 26, 0, 0, 0, '2020-10-07 21:35:43', '2020-10-07 21:35:43'),
(5, 2, '2', 240.00, '120', 26, 0, 0, 0, '2020-10-07 21:35:43', '2020-10-07 21:35:43'),
(6, 3, '1', 120.00, '120', 26, 0, 0, 0, '2020-10-07 21:35:43', '2020-10-07 21:35:43'),
(7, 4, '1', 120.00, '120', 26, 0, 0, 0, '2020-10-07 21:35:43', '2020-10-07 21:35:43'),
(8, 1, '1', 1000.00, '1000', 27, 0, 0, 0, '2020-10-07 21:46:26', '2020-10-07 21:46:26'),
(9, 2, '3', 360.00, '120', 27, 0, 0, 0, '2020-10-07 21:46:26', '2020-10-07 21:46:26'),
(10, 1, '2', 2000.00, '1000', 28, 0, 0, 0, '2020-10-07 21:47:28', '2020-10-07 21:47:28'),
(11, 2, '10', 1200.00, '120', 28, 0, 0, 0, '2020-10-07 21:47:28', '2020-10-07 21:47:28'),
(12, 1, '2', 2000.00, '1000', 29, 0, 0, 0, '2020-10-07 21:48:27', '2020-10-07 21:48:27'),
(13, 2, '10', 1200.00, '120', 29, 0, 0, 0, '2020-10-07 21:48:27', '2020-10-07 21:48:27'),
(14, 1, '1', 1000.00, '1000', 30, 0, 0, 0, '2020-10-07 22:08:45', '2020-10-07 22:08:45'),
(15, 2, '1', 120.00, '120', 30, 0, 0, 0, '2020-10-07 22:08:45', '2020-10-07 22:08:45'),
(16, 3, '1', 120.00, '120', 30, 0, 0, 0, '2020-10-07 22:08:45', '2020-10-07 22:08:45'),
(17, 1, '1', 1000.00, '1000', 31, 0, 0, 0, '2020-10-07 22:09:05', '2020-10-07 22:09:05'),
(18, 2, '1', 120.00, '120', 31, 0, 0, 0, '2020-10-07 22:09:05', '2020-10-07 22:09:05'),
(19, 3, '1', 120.00, '120', 31, 0, 0, 0, '2020-10-07 22:09:05', '2020-10-07 22:09:05'),
(20, 1, '1', 1000.00, '1000', 32, 0, 0, 0, '2020-10-07 22:09:16', '2020-10-07 22:09:16'),
(21, 2, '1', 120.00, '120', 32, 0, 0, 0, '2020-10-07 22:09:16', '2020-10-07 22:09:16'),
(22, 3, '1', 120.00, '120', 32, 0, 0, 0, '2020-10-07 22:09:16', '2020-10-07 22:09:16'),
(23, 1, '1', 1000.00, '1000', 33, 0, 0, 0, '2020-10-07 22:30:41', '2020-10-07 22:30:41'),
(24, 2, '1', 120.00, '120', 33, 0, 0, 0, '2020-10-07 22:30:41', '2020-10-07 22:30:41'),
(25, 1, '1', 1000.00, '1000', 34, 0, 0, 0, '2020-10-07 22:31:29', '2020-10-07 22:31:29'),
(26, 2, '1', 120.00, '120', 34, 0, 0, 0, '2020-10-07 22:31:30', '2020-10-07 22:31:30'),
(27, 1, '1', 1000.00, '1000', 35, 0, 0, 0, '2020-10-07 22:32:12', '2020-10-07 22:32:12'),
(28, 2, '1', 120.00, '120', 35, 0, 0, 0, '2020-10-07 22:32:12', '2020-10-07 22:32:12'),
(29, 1, '1', 1000.00, '1000', 36, 0, 0, 0, '2020-10-07 22:33:49', '2020-10-07 22:33:49'),
(30, 2, '1', 120.00, '120', 36, 0, 0, 0, '2020-10-07 22:33:49', '2020-10-07 22:33:49'),
(31, 1, '1', 1000.00, '1000', 37, 0, 0, 0, '2020-10-07 22:34:32', '2020-10-07 22:34:32'),
(32, 2, '1', 120.00, '120', 37, 0, 0, 0, '2020-10-07 22:34:32', '2020-10-07 22:34:32'),
(33, 1, '1', 1000.00, '1000', 38, 0, 0, 0, '2020-10-07 22:37:49', '2020-10-07 22:37:49'),
(34, 2, '1', 120.00, '120', 38, 0, 0, 0, '2020-10-07 22:37:49', '2020-10-07 22:37:49'),
(35, 1, '1', 1000.00, '1000', 39, 0, 0, 0, '2020-10-07 22:39:15', '2020-10-07 22:39:15'),
(36, 2, '1', 120.00, '120', 39, 0, 0, 0, '2020-10-07 22:39:15', '2020-10-07 22:39:15'),
(37, 1, '2', 2000.00, '1000', 40, 0, 0, 0, '2020-10-08 05:12:43', '2020-10-08 05:12:43'),
(38, 2, '1', 120.00, '120', 40, 0, 0, 0, '2020-10-08 05:12:43', '2020-10-08 05:12:43'),
(39, 1, '1', 1000.00, '1000', 41, 0, 0, 0, '2020-10-08 18:20:52', '2020-10-08 18:20:52'),
(40, 1, '1', 1000.00, '1000', 42, 0, 0, 0, '2020-10-08 18:21:47', '2020-10-08 18:21:47'),
(41, 1, '2', 2000.00, '1000', 43, 0, 0, 0, '2020-10-21 09:05:49', '2020-10-21 09:05:49'),
(42, 2, '3', 360.00, '120', 43, 0, 0, 0, '2020-10-21 09:05:49', '2020-10-21 09:05:49'),
(43, 3, '2', 240.00, '120', 44, 0, 0, 0, '2020-10-21 09:17:06', '2020-10-21 09:17:06'),
(44, 2, '7', 840.00, '120', 44, 0, 0, 0, '2020-10-21 09:17:06', '2020-10-21 09:17:06'),
(45, 1, '1', 1000.00, '1000', 45, 0, 0, 0, '2020-10-22 19:28:51', '2020-10-22 19:28:51'),
(46, 3, '1', 120.00, '120', 45, 0, 0, 0, '2020-10-22 19:28:52', '2020-10-22 19:28:52'),
(47, 4, '1', 120.00, '120', 45, 0, 0, 0, '2020-10-22 19:28:52', '2020-10-22 19:28:52'),
(48, 1, '1', 1000.00, '1000', 46, 0, 0, 0, '2020-10-22 19:31:39', '2020-10-22 19:31:39'),
(49, 2, '1', 120.00, '120', 46, 0, 0, 0, '2020-10-22 19:31:39', '2020-10-22 19:31:39'),
(50, 3, '3', 360.00, '120', 46, 0, 0, 0, '2020-10-22 19:31:39', '2020-10-22 19:31:39'),
(51, 1, '26', 26000.00, '1000', 47, 0, 0, 26, '2020-10-22 19:34:46', '2020-10-22 19:34:46'),
(52, 2, '2', 240.00, '120', 47, 0, 0, 2, '2020-10-22 19:34:46', '2020-10-22 19:34:46'),
(53, 3, '1', 120.00, '120', 47, 0, 0, 1, '2020-10-22 19:34:46', '2020-10-22 19:34:46'),
(54, 2, '1', 120.00, '120', 48, 0, 0, 1, '2020-10-22 19:58:01', '2020-10-22 19:58:01'),
(55, 1, '1', 1000.00, '1000', 48, 0, 0, 1, '2020-10-22 19:58:01', '2020-10-22 19:58:01'),
(56, 1, '10', 10000.00, '1000', 49, 0, 0, 10, '2020-10-23 17:36:14', '2020-10-23 17:36:14'),
(57, 2, '9', 1080.00, '120', 49, 0, 0, 9, '2020-10-23 17:36:15', '2020-10-23 17:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_h`
--

CREATE TABLE `purchase_invoice_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoice_h`
--

INSERT INTO `purchase_invoice_h` (`id`, `supplier_id`, `total`, `stock_id`, `payment_method_id`, `invoice_number`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '450200', 1, 0, 0, 1, '2020-09-28 22:00:00', '2020-09-28 22:00:00'),
(2, 1, '7240', 1, 0, 0, 1, '2020-10-06 09:50:06', '2020-10-06 09:50:06'),
(3, 2, '7240', 1, 0, 0, 1, '2020-10-06 09:50:14', '2020-10-06 09:50:14'),
(4, 2, '7240', 1, 0, 0, 1, '2020-10-06 09:50:17', '2020-10-06 09:50:17'),
(5, 2, '19320', 1, 0, 0, 1, '2020-10-06 10:16:05', '2020-10-06 10:16:05'),
(6, 2, '19320', 1, 0, 0, 1, '2020-10-06 10:16:30', '2020-10-06 10:16:30'),
(7, 2, '1240', 1, 1, 0, 1, '2020-10-07 21:13:01', '2020-10-07 21:13:01'),
(8, 2, '1240', 1, 1, 0, 1, '2020-10-07 21:14:17', '2020-10-07 21:14:17'),
(9, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:22:01', '2020-10-07 21:22:01'),
(10, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:22:12', '2020-10-07 21:22:12'),
(11, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:22:33', '2020-10-07 21:22:33'),
(12, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:23:21', '2020-10-07 21:23:21'),
(13, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:23:37', '2020-10-07 21:23:37'),
(14, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:23:49', '2020-10-07 21:23:49'),
(15, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:27:33', '2020-10-07 21:27:33'),
(16, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:28:01', '2020-10-07 21:28:01'),
(17, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:28:24', '2020-10-07 21:28:24'),
(18, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:29:19', '2020-10-07 21:29:19'),
(19, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:30:39', '2020-10-07 21:30:39'),
(20, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:31:08', '2020-10-07 21:31:08'),
(21, 1, '1240', 2, 1, 0, 1, '2020-10-07 21:31:33', '2020-10-07 21:31:33'),
(22, 2, '1000', 1, 1, 0, 1, '2020-10-07 21:32:01', '2020-10-07 21:32:01'),
(23, 2, '1000', 1, 1, 0, 1, '2020-10-07 21:33:54', '2020-10-07 21:33:54'),
(24, 2, '1000', 1, 1, 0, 1, '2020-10-07 21:34:15', '2020-10-07 21:34:15'),
(25, 2, '1000', 1, 1, 0, 1, '2020-10-07 21:34:36', '2020-10-07 21:34:36'),
(26, 2, '2480', 1, 1, 0, 1, '2020-10-07 21:35:43', '2020-10-07 21:35:43'),
(27, 2, '1360', 1, 1, 0, 1, '2020-10-07 21:46:26', '2020-10-07 21:46:26'),
(28, 1, '3200', 2, 1, 0, 1, '2020-10-07 21:47:27', '2020-10-07 21:47:27'),
(29, 1, '3200', 2, 1, 0, 1, '2020-10-07 21:48:27', '2020-10-07 21:48:27'),
(30, 2, '1240', 2, 2, 0, 1, '2020-10-07 22:08:45', '2020-10-07 22:08:45'),
(31, 2, '1240', 2, 1, 0, 1, '2020-10-07 22:09:05', '2020-10-07 22:09:05'),
(32, 2, '1240', 2, 1, 0, 1, '2020-10-07 22:09:16', '2020-10-07 22:09:16'),
(33, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:30:41', '2020-10-07 22:30:41'),
(34, 1, '1120', 1, 2, 0, 1, '2020-10-07 22:31:29', '2020-10-07 22:31:29'),
(35, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:32:12', '2020-10-07 22:32:12'),
(36, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:33:49', '2020-10-07 22:33:49'),
(37, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:34:32', '2020-10-07 22:34:32'),
(38, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:37:49', '2020-10-07 22:37:49'),
(39, 1, '1120', 1, 1, 0, 1, '2020-10-07 22:39:15', '2020-10-07 22:39:15'),
(40, 2, '2120', 1, 1, 0, 1, '2020-10-08 05:12:43', '2020-10-08 05:12:43'),
(41, 1, '1000', 1, 1, 0, 1, '2020-10-08 18:20:52', '2020-10-08 18:20:52'),
(42, 1, '1000', 1, 1, 0, 1, '2020-10-08 18:21:47', '2020-10-08 18:21:47'),
(43, 2, '2360', 1, 1, 0, 1, '2020-10-21 09:05:49', '2020-10-21 09:05:49'),
(44, 2, '1080', 2, 2, 120, 1, '2020-10-21 09:17:06', '2020-10-21 09:17:06'),
(45, 2, '1240', 2, 1, 12345, 1, '2020-10-22 19:28:51', '2020-10-22 19:28:51'),
(46, 2, '1480', 1, 1, 1200, 1, '2020-10-22 19:31:39', '2020-10-22 19:31:39'),
(47, 2, '26360', 1, 1, 123456, 1, '2020-10-22 19:34:46', '2020-10-22 19:34:46'),
(48, 2, '1120', 1, 1, 0, 1, '2020-10-22 19:58:01', '2020-10-22 19:58:01'),
(49, 2, '11080', 1, 3, 120322, 1, '2020-10-23 17:36:14', '2020-10-23 17:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_d`
--

CREATE TABLE `sales_invoice_d` (
  `id` bigint(20) NOT NULL,
  `price` float NOT NULL,
  `qyt` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vat` int(11) NOT NULL DEFAULT '0',
  `sub_vat` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_invoice_d`
--

INSERT INTO `sales_invoice_d` (`id`, `price`, `qyt`, `sub_total`, `invoice_id`, `product_id`, `vat`, `sub_vat`, `created_at`, `updated_at`) VALUES
(1, 1000, 1, 1000, 3, 1, 0, 0, '2020-10-09 07:49:19', '2020-10-09 07:49:19'),
(2, 1000, 1, 1000, 4, 1, 0, 0, '2020-10-09 07:50:40', '2020-10-09 07:50:40'),
(3, 1000, 10, 10000, 5, 1, 0, 0, '2020-10-09 08:04:51', '2020-10-09 08:04:51'),
(4, 120, 10, 1200, 5, 2, 0, 0, '2020-10-09 08:04:51', '2020-10-09 08:04:51'),
(5, 120, 10, 1200, 5, 3, 0, 0, '2020-10-09 08:04:51', '2020-10-09 08:04:51'),
(6, 120, 12, 1440, 5, 4, 0, 0, '2020-10-09 08:04:51', '2020-10-09 08:04:51'),
(7, 1000, 2, 2000, 6, 1, 0, 0, '2020-10-09 08:08:42', '2020-10-09 08:08:42'),
(8, 120, 1, 120, 6, 3, 0, 0, '2020-10-09 08:08:42', '2020-10-09 08:08:42'),
(9, 120, 1, 120, 6, 2, 0, 0, '2020-10-09 08:08:42', '2020-10-09 08:08:42'),
(10, 120, 14, 1680, 7, 4, 0, 0, '2020-10-09 08:15:48', '2020-10-09 08:15:48'),
(11, 1000, 1, 1000, 8, 1, 0, 0, '2020-10-09 08:16:13', '2020-10-09 08:16:13'),
(12, 1000, 10, 10000, 9, 1, 0, 0, '2020-10-17 07:24:52', '2020-10-17 07:24:52'),
(13, 120, 5, 600, 9, 2, 0, 0, '2020-10-17 07:24:52', '2020-10-17 07:24:52'),
(14, 120, 1, 120, 10, 2, 0, 0, '2020-10-21 15:01:24', '2020-10-21 15:01:24'),
(15, 120, 9, 1080, 10, 3, 0, 0, '2020-10-21 15:01:24', '2020-10-21 15:01:24'),
(16, 120, 1, 120, 11, 2, 0, 0, '2020-10-21 15:05:38', '2020-10-21 15:05:38'),
(17, 120, 8, 960, 11, 3, 0, 0, '2020-10-21 15:05:39', '2020-10-21 15:05:39'),
(18, 1000, 1, 1000, 12, 1, 0, 0, '2020-10-21 15:21:30', '2020-10-21 15:21:30'),
(19, 120, 3, 360, 12, 2, 0, 0, '2020-10-21 15:21:30', '2020-10-21 15:21:30'),
(20, 120, 4, 480, 12, 3, 0, 0, '2020-10-21 15:21:30', '2020-10-21 15:21:30'),
(21, 1000, 1, 1000, 13, 1, 0, 0, '2020-10-21 16:23:58', '2020-10-21 16:23:58'),
(22, 120, 1, 120, 13, 2, 0, 0, '2020-10-21 16:23:58', '2020-10-21 16:23:58'),
(23, 120, 6, 720, 13, 3, 0, 0, '2020-10-21 16:23:58', '2020-10-21 16:23:58'),
(24, 1000, 8, 8000, 14, 1, 0, 0, '2020-10-22 19:36:59', '2020-10-22 19:36:59'),
(25, 120, 10, 1200, 14, 2, 1, 10, '2020-10-22 19:36:59', '2020-10-22 19:36:59'),
(26, 120, 15, 1800, 14, 3, 20, 300, '2020-10-22 19:36:59', '2020-10-22 19:36:59'),
(27, 120, 1, 120, 15, 2, 1, 1, '2020-10-24 17:30:12', '2020-10-24 17:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_h`
--

CREATE TABLE `sales_invoice_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoice_h`
--

INSERT INTO `sales_invoice_h` (`id`, `customer_id`, `total`, `payment_method_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, '1000', 1, 1, '2020-10-09 07:47:44', '2020-10-09 07:47:44'),
(2, 0, '1000', 1, 1, '2020-10-09 07:48:30', '2020-10-09 07:48:30'),
(3, 0, '1000', 1, 1, '2020-10-09 07:49:19', '2020-10-09 07:49:19'),
(4, 0, '1000', 1, 1, '2020-10-09 07:50:40', '2020-10-09 07:50:40'),
(5, 2, '13840', 1, 1, '2020-10-09 08:04:50', '2020-10-09 08:04:50'),
(6, 0, '2240', 1, 1, '2020-10-09 08:08:42', '2020-10-09 08:08:42'),
(7, 0, '1680', 1, 1, '2020-10-09 08:15:48', '2020-10-09 08:15:48'),
(8, 0, '1000', 1, 1, '2020-10-09 08:16:13', '2020-10-09 08:16:13'),
(9, 2, '10600', 3, 1, '2020-10-17 07:24:52', '2020-10-17 07:24:52'),
(10, 0, '1200', 1, 1, '2020-10-21 15:01:24', '2020-10-21 15:01:24'),
(11, 0, '2280', 1, 1, '2020-10-21 15:05:38', '2020-10-21 15:05:38'),
(12, 0, '1840', 1, 1, '2020-10-21 15:21:29', '2020-10-21 15:21:29'),
(13, 2, '1840', 2, 1, '2020-10-21 16:23:58', '2020-10-21 16:23:58'),
(14, 0, '11000', 1, 1, '2020-10-22 19:36:59', '2020-10-22 19:36:59'),
(15, 0, '120', 1, 1, '2020-10-24 17:30:12', '2020-10-24 17:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'المخزن الافتراضى', 1, NULL, NULL),
(2, 'المخزن الكبير', 1, NULL, NULL),
(3, 'الاسم العادى', 1, '2020-10-23 21:45:55', '2020-10-23 21:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `balance` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`, `status`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'ابراهيم حمدي', '5255', 'العنوان الذى يحب', 1, 1120, '2020-09-29 13:24:46', '2020-10-08 19:45:04'),
(2, 'حسام الدين محمد', '09156585255', 'الحله الجديده', 1, 13560, '2020-09-29 13:37:02', '2020-10-23 17:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `transactionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `from`, `to`, `transactionable_type`, `transactionable_id`, `created_at`, `updated_at`) VALUES
(1, '1120', 1, 4, 'App\\model\\purchase_invoice_h', 38, '2020-10-07 22:37:49', '2020-10-07 22:37:49'),
(2, '1120', 1, 4, 'App\\model\\purchase_invoice_h', 39, '2020-10-07 22:39:15', '2020-10-07 22:39:15'),
(3, '2120', 1, 4, 'App\\model\\purchase_invoice_h', 40, '2020-10-08 05:12:44', '2020-10-08 05:12:44'),
(4, '1000', 1, 4, 'App\\model\\purchase_invoice_h', 41, '2020-10-08 18:20:52', '2020-10-08 18:20:52'),
(5, '1000', 1, 4, 'App\\model\\purchase_invoice_h', 42, '2020-10-08 18:21:47', '2020-10-08 18:21:47'),
(6, '1000', 1, 4, 'App\\Model\\sales_invoice_h', 4, '2020-10-09 07:50:40', '2020-10-09 07:50:40'),
(7, '13840', 1, 4, 'App\\Model\\sales_invoice_h', 5, '2020-10-09 08:04:51', '2020-10-09 08:04:51'),
(8, '2240', 1, 4, 'App\\Model\\sales_invoice_h', 6, '2020-10-09 08:08:42', '2020-10-09 08:08:42'),
(9, '1680', 1, 4, 'App\\Model\\sales_invoice_h', 7, '2020-10-09 08:15:48', '2020-10-09 08:15:48'),
(10, '1000', 1, 4, 'App\\Model\\sales_invoice_h', 8, '2020-10-09 08:16:13', '2020-10-09 08:16:13'),
(11, '2360', 1, 4, 'App\\model\\purchase_invoice_h', 43, '2020-10-21 09:05:49', '2020-10-21 09:05:49'),
(12, '1200', 1, 4, 'App\\Model\\sales_invoice_h', 10, '2020-10-21 15:01:24', '2020-10-21 15:01:24'),
(13, '2280', 1, 4, 'App\\Model\\sales_invoice_h', 11, '2020-10-21 15:05:39', '2020-10-21 15:05:39'),
(14, '1840', 1, 4, 'App\\Model\\sales_invoice_h', 12, '2020-10-21 15:21:30', '2020-10-21 15:21:30'),
(15, '1240', 1, 4, 'App\\model\\purchase_invoice_h', 45, '2020-10-22 19:28:52', '2020-10-22 19:28:52'),
(16, '1480', 1, 4, 'App\\model\\purchase_invoice_h', 46, '2020-10-22 19:31:39', '2020-10-22 19:31:39'),
(17, '26360', 1, 4, 'App\\model\\purchase_invoice_h', 47, '2020-10-22 19:34:46', '2020-10-22 19:34:46'),
(18, '11000', 1, 4, 'App\\Model\\sales_invoice_h', 14, '2020-10-22 19:36:59', '2020-10-22 19:36:59'),
(19, '1120', 1, 4, 'App\\model\\purchase_invoice_h', 48, '2020-10-22 19:58:01', '2020-10-22 19:58:01'),
(20, '120', 1, 4, 'App\\Model\\sales_invoice_h', 15, '2020-10-24 17:30:12', '2020-10-24 17:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'وحده', '2020-10-25 08:57:51', '2020-10-25 08:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ahmed hmed', 'ahmed7med@gmail.com', NULL, '$2y$10$3ItmAdiD/3I8sF9qu.50y./VpxOoWI8sZw3czkkqj6HoD7sscyqlu', NULL, 1, NULL, '2020-10-21 05:38:30'),
(2, 'حمد يوسف', 'hmed@panda180.com', NULL, '$2y$10$W2CtP1tgedNhVQsx2TWTnuglHlDIJk7exLHMNrWwv40Dye9cM8Enu', NULL, 1, '2020-10-21 05:38:19', '2020-10-21 05:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoice_d`
--
ALTER TABLE `purchase_invoice_d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoice_h`
--
ALTER TABLE `purchase_invoice_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoice_d`
--
ALTER TABLE `sales_invoice_d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoice_h`
--
ALTER TABLE `sales_invoice_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_invoice_d`
--
ALTER TABLE `purchase_invoice_d`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `purchase_invoice_h`
--
ALTER TABLE `purchase_invoice_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales_invoice_d`
--
ALTER TABLE `sales_invoice_d`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sales_invoice_h`
--
ALTER TABLE `sales_invoice_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
