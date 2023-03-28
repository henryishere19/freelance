-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2023 at 03:34 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Intuitive_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `accolades`
--

CREATE TABLE `accolades` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` text,
  `dropbox_img` text,
  `dropbox_title` text,
  `status` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accolades`
--

INSERT INTO `accolades` (`id`, `title`, `priority`, `description`, `dropbox_img`, `dropbox_title`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Accolades that reflect our clients’ trust in us', 1, 'asdsdas', NULL, NULL, 'active', '2022-11-23 04:23:34', '2022-11-23 11:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `accolades_details`
--

CREATE TABLE `accolades_details` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accolades_details`
--

INSERT INTO `accolades_details` (`id`, `acc_id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main-Logo.png', 'Add 1', '2022-11-12 06:00:28', '2022-11-12 06:00:28'),
(2, 1, 'woman-working-from-home-on-phone-og.jpg', 'Add 2', '2022-11-12 06:00:28', '2022-11-12 06:00:28'),
(3, 1, 'remote-collaboration-mistakes.png', 'Add 3', '2022-11-12 06:00:28', '2022-11-12 06:00:28'),
(8, 5, 'Main-Logo.png', 'sssssss', '2022-11-12 06:04:03', '2022-11-12 06:04:03'),
(5, 2, 'woman-working-from-home-on-phone-og.jpg', 'Add 2', '2022-11-12 06:00:54', '2022-11-12 06:00:54'),
(6, 3, 'download (4).jpg', 'Add 2', '2022-11-12 06:01:34', '2022-11-12 06:01:34'),
(7, 4, 'Main-Logo.png', 'Add 4Add 4', '2022-11-12 06:01:53', '2022-11-12 06:01:53'),
(9, 5, 'remote-collaboration-mistakes.png', 'ddddddddd', '2022-11-12 06:04:03', '2022-11-12 06:04:03'),
(11, 7, '5.gif', 'sssssssssss', '2022-11-19 09:14:52', '2022-11-19 09:14:52'),
(12, 8, '5.gif', 'gfddddgdfg', '2022-11-20 09:19:48', '2022-11-20 09:19:48'),
(13, 8, '4.gif', 'dfgggggggggggg', '2022-11-20 09:19:48', '2022-11-20 09:19:48'),
(14, 8, '3.gif', 'gdfffffffff', '2022-11-20 09:19:48', '2022-11-20 09:19:48'),
(15, 9, '3.gif', 'Top-10 fast growth 150 IT companies in the Americas, CRN’s 2022', '2022-11-23 04:23:34', '2022-11-23 04:23:34'),
(16, 9, '4.gif', 'America’s fastest growing private companies, INC 5000’s 2022', '2022-11-23 04:23:34', '2022-11-23 04:23:34'),
(17, 9, '5.gif', '400+ highly experienced professionals', '2022-11-23 04:23:34', '2022-11-23 04:23:34'),
(18, 9, '6.gif', '98% customer retention since inception', '2022-11-23 04:23:34', '2022-11-23 04:23:34'),
(19, 9, '2.gif', '100+ enterprise customers across BFSI, HCLS, Manufacturing, Retail, and ISV verticals', '2022-11-23 04:23:34', '2022-11-23 04:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_type` enum('Home','Work') DEFAULT NULL,
  `address` text,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_access_tokens`
--

CREATE TABLE `api_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_with` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `delivery_charges` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `title`, `city_id`, `postal_code`, `latitude`, `longitude`, `delivery_charges`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Satellite', 1, 380015, NULL, NULL, '0.00', 'inactive', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'Bopal', 1, 380058, NULL, NULL, '0.00', 'inactive', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, 'Gota', 1, 380081, NULL, NULL, '0.00', 'inactive', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, 'Science City', 1, 380060, NULL, NULL, '0.00', 'inactive', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `priority`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brand 1', 'default/demo/brands/brand-1.jpg', 1, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 1', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'Brand 2', 'default/demo/brands/brand-2.jpg', 2, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 2', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, 'Brand 3', 'default/demo/brands/brand-3.jpg', 3, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 3', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, 'Brand 4', 'default/demo/brands/brand-4.jpg', 4, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 4', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(5, 'Brand 5', 'default/demo/brands/brand-5.jpg', 5, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 5', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(6, 'Brand 6', 'default/demo/brands/brand-6.jpg', 6, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 6', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, 'Brand 7', 'default/demo/brands/brand-7.jpg', 7, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 7', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, 'Brand 8', 'default/demo/brands/brand-8.jpg', 8, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 8', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, 'Brand 9', 'default/demo/brands/brand-9.jpg', 9, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 9', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(10, 'Brand 10', 'default/demo/brands/brand-10.jpg', 10, 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 10', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `casestudy`
--

CREATE TABLE `casestudy` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_for` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casestudy`
--

INSERT INTO `casestudy` (`id`, `title`, `page_for`, `description`, `file`, `image`, `link`, `type`, `created_at`, `updated_at`) VALUES
(7, 'Approaching Realtime: Ingestion to Consumption with BigQuery and Looker', 'undefined', NULL, NULL, 'uploads/2022/12/c663d96bbe119c59a67596643bb12f58.png', 'undefined', 'undefined', '2022-12-02 20:07:56', '2023-03-27 17:34:40'),
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'cloud-security-and-grc', NULL, NULL, 'uploads/2022/12/037e30c2224a3209cc3fcd1b4d24a4f1.png', '', 'cusomlink', '2022-12-07 05:08:40', '2022-12-07 05:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `module`, `priority`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'product', 1, 'default/demo/categories/category-1.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, NULL, 'product', 2, 'default/demo/categories/category-2.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, NULL, 'product', 3, 'default/demo/categories/category-3.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, NULL, 'product', 4, 'default/demo/categories/category-4.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(5, NULL, 'product', 5, 'default/demo/categories/category-5.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(6, NULL, 'product', 6, 'default/demo/categories/category-6.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, NULL, 'product', 7, 'default/demo/categories/category-7.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, NULL, 'product', 8, 'default/demo/categories/category-8.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, NULL, 'product', 9, 'default/demo/categories/category-9.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(10, NULL, 'product', 10, 'default/demo/categories/category-10.png', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(12, NULL, 'Blog', 6, 'uploads/2022/11/248c4c880aa0d8b72c6dcf1944efca96.jpg', 'active', '2022-11-20 17:51:27', '2022-11-20 18:13:56'),
(13, NULL, 'Blog', 6, 'uploads/2022/11/c73a81674c7c816d08616c4523f37ac0.jpg', 'active', '2022-11-20 17:52:16', '2022-11-20 17:52:16'),
(14, NULL, 'Blog', 6, 'uploads/2022/11/83cffcdb7c1508b8f90cb46732a5a215.jpg', 'active', '2022-11-20 17:53:40', '2022-11-20 17:53:40'),
(15, NULL, 'Blog', 6, 'uploads/2022/11/aea3bcf10743b0956386adec9d6a04b3.jpg', 'active', '2022-11-20 17:57:52', '2022-11-20 17:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories_translations`
--

CREATE TABLE `categories_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `locale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_translations`
--

INSERT INTO `categories_translations` (`id`, `cat_id`, `title`, `description`, `locale`) VALUES
(1, 1, 'Category 1', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 1', 'en'),
(2, 2, 'Category 2', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 2', 'en'),
(3, 3, 'Category 3', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 3', 'en'),
(4, 4, 'Category 4', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 4', 'en'),
(5, 5, 'Category 5', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 5', 'en'),
(6, 6, 'Category 6', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 6', 'en'),
(7, 7, 'Category 7', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 7', 'en'),
(8, 8, 'Category 8', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 8', 'en'),
(9, 9, 'Category 9', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 9', 'en'),
(10, 10, 'Category 10', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 10', 'en'),
(12, 12, NULL, NULL, 'en'),
(13, 13, 'tfbvcvcb', 'vcbvbc', 'en'),
(14, 14, 'sda', 'sdacvbbbbbbbbbbbbbbbbbbbbbbbbb', 'en'),
(15, 15, 'new', 'BlogBlogBlog', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `state_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 12, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'Mumbai', 22, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, 'Delhi', 10, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, 'Bangalore', 17, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(5, 'Hyderabad', 36, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(6, 'Chennai', 35, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, 'Kolkata', 41, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `page` varchar(250) DEFAULT NULL,
  `priority` varchar(250) DEFAULT NULL,
  `description` longtext,
  `status` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `title`, `page`, `priority`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'We’re the trusted partners for Fortune 500 enterprises', 'home', '7', 'dasdasdasd', 'inactive', '2022-11-23 04:45:54', '2022-11-29 21:30:38'),
(13, '', NULL, NULL, '', NULL, '2023-02-04 19:19:15', '2023-02-04 19:19:15'),
(14, '', NULL, NULL, '', NULL, '2023-02-05 18:27:24', '2023-02-05 18:27:24'),
(16, '', NULL, NULL, '', NULL, '2023-02-06 16:51:02', '2023-02-06 16:51:02'),
(17, '', NULL, NULL, '', NULL, '2023-02-06 16:59:46', '2023-02-06 16:59:46'),
(19, '', NULL, NULL, '', NULL, '2023-03-14 21:36:08', '2023-03-14 21:36:08'),
(22, '', NULL, NULL, '', NULL, '2023-03-15 00:46:46', '2023-03-15 00:46:46'),
(28, 'Collaborate. Innovate. Elevate.', 'home', '1', 'We believe that innovation comes from a true meeting of the minds. That’s why we partner with the best technology platforms to create differentiated solutions that work for you.', 'active', '2023-03-16 14:45:22', '2023-03-16 14:58:30'),
(27, 'Work + Play = A Happy Team', 'home', '555', 'Work + Play = A Happy Team', 'active', '2023-03-15 14:16:09', '2023-03-15 14:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `created_at`, `updated_at`, `message`) VALUES
(10, 'dsaddsdsfsdad', NULL, 'superAdmin@mail.com', '7698265123', '2023-02-05 18:34:48', '2023-02-05 18:34:48', 'ddasdf'),
(11, 'Darshan', NULL, 'darshankavathiya007@gmail.com', '9537577772', '2023-03-09 19:03:18', '2023-03-09 19:03:18', 'Test'),
(12, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-09 19:11:34', '2023-03-09 19:11:34', 'Testing!'),
(13, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-09 19:12:14', '2023-03-09 19:12:14', 'Testing!'),
(14, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-09 19:14:10', '2023-03-09 19:14:10', 'Testing!'),
(15, 'dsa', NULL, 'goriyanirrav223@gmail.com', '07698265143', '2023-03-09 19:14:34', '2023-03-09 19:14:34', 'sad'),
(16, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-09 19:14:49', '2023-03-09 19:14:49', 'Testing!'),
(17, 'dsa', NULL, 'goriyanirrav223@gmail.com', '07698265143', '2023-03-09 19:15:16', '2023-03-09 19:15:16', 'sad'),
(18, 'dsa', NULL, 'goriyanirrav223@gmail.com', '07698265143', '2023-03-09 19:15:34', '2023-03-09 19:15:34', 'sad'),
(19, 'yash', NULL, 'tech@thepoised.in', '7043034687', '2023-03-09 19:15:41', '2023-03-09 19:15:41', 'Testing!'),
(20, 'Nirav Goriya', NULL, 'goriyanirrav223@gmail.com', '07698265143', '2023-03-09 19:15:47', '2023-03-09 19:15:47', 'sda'),
(21, 'Nirav Goriya', NULL, 'goriyanirrav223@gmail.com', '07698265143', '2023-03-09 19:16:25', '2023-03-09 19:16:25', 'sda'),
(22, 'yash', NULL, 'tech@thepoised.in', '7043034687', '2023-03-09 19:16:34', '2023-03-09 19:16:34', 'Testing!'),
(23, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-09 19:22:24', '2023-03-09 19:22:24', 'Testing!'),
(24, 'test', NULL, 'sushant.sharma@accorian.com', '8954333322', '2023-03-15 14:52:34', '2023-03-15 14:52:34', 'test'),
(25, 'dsa', NULL, 'goriyani@gmail.com', '9687545214', '2023-03-15 22:38:40', '2023-03-15 22:38:40', 'dsa'),
(26, 'Darshan', NULL, 'darshankavathiya007@gmial.com', '9537577772', '2023-03-15 23:12:56', '2023-03-15 23:12:56', 'Testy'),
(27, 'Darshan', NULL, 'darshankavathiya007@gmail.com', '9537577772', '2023-03-15 23:14:34', '2023-03-15 23:14:34', 'Test'),
(28, 'test', NULL, 'sushant2@accorian.com', '9865446777', '2023-03-16 21:07:26', '2023-03-16 21:07:26', 'test'),
(29, 'dKFYWuSk', NULL, 'yMwNxpAe@burpcollaborator.net', '513-974-8198', '2023-03-17 18:19:24', '2023-03-17 18:19:24', '911669'),
(30, 'RichardDiZ', NULL, 'wj1ra@course-fitness.com', '88399919258', '2023-03-18 10:52:11', '2023-03-18 10:52:11', '冠天下娛樂城，as8899.com，世界盃，世足盃，2022世界盃，2022世足盃 \r\n \r\n \r\nhttps://xn--ghq10gw1gvobv8a5z0d.com/'),
(31, 'Roberttum', NULL, 'zxysrg@course-fitness.com', '83414299474', '2023-03-18 14:32:45', '2023-03-18 14:32:45', '2022卡達世界盃 \r\n \r\nhttps://as-sports.net/'),
(32, 'tonyazl2', NULL, 'aidaqp3@kenta1210.hideo85.infospace.fun', '81679144382', '2023-03-18 15:58:51', '2023-03-18 15:58:51', 'Young Heaven - Naked Teens & Young Porn Pictures\r\nhttp://valleyview.asian.adablog69.com/?baylee \r\n purple porn hand josb free porn movies oline dred porn bridgett lee porn porn eskimo karma rosenberg'),
(33, 'gj4', NULL, 'dz2@hiroyuki6410.itsuki42.excitemail.fun', '88926156597', '2023-03-18 17:45:02', '2023-03-18 17:45:02', 'Hot photo galleries blogs and pictures\r\nhttp://black.asian-gay-porn.tiktok-pornhub.com/?post-juliette \r\n free titty porn videos porn star shave pubic tits big porn tit retro porn tube 70 s bbs 3d porn'),
(34, 'Jay Thadeshwar', NULL, 'thadeshwarjay@gmail.com', '+919768886779', '2023-03-18 20:06:50', '2023-03-18 20:06:50', 'Hi'),
(35, 'leticiamh18', NULL, 'rw4@masaaki66.mailguard.space', '89549856577', '2023-03-18 20:17:57', '2023-03-18 20:17:57', 'Hot galleries, thousands new daily.\r\nhttp://unnderageporn.hotblognetwork.com/?post-joy \r\n\r\n porn star to be female porn cameo porn in marrakech dault porn downloads free gay male uncut porn'),
(36, 'monabx18', NULL, 'joshua@katsu12.excitemail.fun', '81452331676', '2023-03-18 20:31:24', '2023-03-18 20:31:24', 'Sexy pictures each day\r\nhttp://themature-funnycouplephotography.tubered69.com/?kaliyah\r\n\r\n sex machine porn free hot young teen porn video galleries scandal porn tube porn video sharing paris huge ass jamaican porn'),
(37, 'sochi.cat  Cen', NULL, 'sochifms@yandex.ru', '83336764456', '2023-03-18 20:53:05', '2023-03-18 20:53:05', 'Веб-студия SOCHI.CAT создание сайтов в Сочи, разработка мобильных приложений  https://sochi.cat   <a href=https://sochi.cat>Создание сайтов в Сочи</a>  заказать сайтов в Сочи - цена сайта от 4 тыс руб.'),
(38, 'RichardChers', NULL, 'megagggj@gmail.com', '82933236567', '2023-03-18 22:10:33', '2023-03-18 22:10:33', '<a href=https://tor.blacksprut-official.com>blacksprut сайт оригинал</a>'),
(39, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 22:55:45', '2023-03-18 22:55:45', 'Testing!'),
(40, 'yash rami', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 23:21:33', '2023-03-18 23:21:33', 'Testing!'),
(41, 'test', NULL, 'yash@gmail.com', '7043034687', '2023-03-18 23:23:00', '2023-03-18 23:23:00', 'Testing!'),
(42, 'yash', NULL, 'yash@gmail.com', '7043034687', '2023-03-18 23:35:05', '2023-03-18 23:35:05', 'Testing!'),
(43, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 23:36:18', '2023-03-18 23:36:18', 'Testing!'),
(44, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 23:45:32', '2023-03-18 23:45:32', 'Testing!'),
(45, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 23:51:11', '2023-03-18 23:51:11', 'Testing!'),
(46, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-18 23:58:16', '2023-03-18 23:58:16', 'Testing!'),
(47, 'enriqueyo11', NULL, 'patbv7@norio44.gcpmail1.site', '87258963924', '2023-03-19 00:01:23', '2023-03-19 00:01:23', 'New hot project galleries, daily updates\r\nhttp://xxxvideosporn.danexxx.com/?post-ashlee \r\n\r\n little val porn free solo male porn ethnic cocoa porn vintage legends of porn xhampster ebony booty porn tube'),
(48, 'Aveli', NULL, 'nq2i71pi@hotmail.com', '82375789489', '2023-03-19 02:49:51', '2023-03-19 02:49:51', 'Hi, this is Irina. I am sending you my intimate photos as I promised. https://tinyurl.com/2les7nod'),
(49, 'AaronTam', NULL, 'catch@crew.zaols.com', '84164789862', '2023-03-19 03:15:38', '2023-03-19 03:15:38', '<a href=https://webmaster.gg>Free Strong Password Generator</a>'),
(50, 'Steveser', NULL, 'l7e9y@course-fitness.com', '81461491494', '2023-03-19 05:41:15', '2023-03-19 05:41:15', '水微晶玻尿酸 - 八千代 \r\n \r\n \r\nhttps://yachiyo.com.tw/hyadermissmile-injection/'),
(51, 'arleneqx4', NULL, 'fq3@haruki46.gcpmail1.site', '81714468143', '2023-03-19 08:55:09', '2023-03-19 08:55:09', 'Dirty Porn Photos, daily updated galleries\r\nhttp://nakedeyeshadow8.sexjanet.com/?post-stephanie \r\n\r\n satr celeb porn free old black porn thin porn clip fantasy porn dirty vintage porn starlist'),
(52, 'TobiasPlove', NULL, 'dkq9r@course-fitness.com', '88846858875', '2023-03-19 14:14:09', '2023-03-19 14:14:09', 'KUBET ทางเข้า、KU หวย、หาเงินออนไลน์ \r\n \r\n \r\nhttps://9jthai.net'),
(53, 'MartinSkack', NULL, 'ynk6u9@course-fitness.com', '85356229341', '2023-03-19 14:17:53', '2023-03-19 14:17:53', '冠天下娛樂 \r\n \r\n \r\n \r\nhttps://xn--ghq10gmvi.com/'),
(54, 'hollyim69', NULL, 'melba@katsu6610.michio33.excitemail.fun', '82379645474', '2023-03-19 15:18:29', '2023-03-19 15:18:29', 'Daily updated super sexy photo galleries\r\nhttp://gratefreepornmaumee.gigixo.com/?abbey \r\n magic wang porn stories rebecca pualine porn how to hide internet porn porn retro bisexual porn immoral'),
(55, 'RobertQuets', NULL, 'vhmu@course-fitness.com', '82737365686', '2023-03-19 16:07:17', '2023-03-19 16:07:17', 'phim sex、trác kim hoa、9j casino \r\n \r\n \r\nhttps://9jvn.com'),
(56, 'alfredats60', NULL, 'cu5@kenshin7310.shiro13.mailvista.site', '89897851843', '2023-03-19 16:45:15', '2023-03-19 16:45:15', 'Free Porn Pictures and Best HD Sex Photos\r\nhttp://blonde.porn.allproblog.com/?post-diana \r\n\r\n massive cock porn tube funny adult games animal porn british melissa walker porn corsetted porn what kinds of porn are there'),
(57, 'Aveli', NULL, 'lk6fcz2b@icloud.com', '84424167879', '2023-03-19 18:27:47', '2023-03-19 18:27:47', 'Hi, this is Jeniffer. I am sending you my intimate photos as I promised. https://tinyurl.com/2fgbjww5'),
(58, 'Jamesres', NULL, 'creagene2022@gmail.com', '84812486886', '2023-03-19 20:23:52', '2023-03-19 20:23:52', 'best leather cardholder handmade video  https://www.youtube.com/watch?v=0vHaO6-b2DY&t'),
(59, 'harryfm11', NULL, 'rs1@kaede10.gcpmail1.site', '85757261311', '2023-03-19 20:45:10', '2023-03-19 20:45:10', 'Hot galleries, thousands new daily.\r\nhttp://ebonycookbook.jsutandy.com/?post-lydia \r\n\r\n largest cock in porn history bleach porn cartoon image flab porn bella twins porn pakistani sex porn'),
(60, 'latishafz1', NULL, 'michellenq3@rokuro4410.naoki64.flooz.site', '86678843352', '2023-03-19 22:11:00', '2023-03-19 22:11:00', 'Hot new pictures each day\r\nhttp://greatpornsexmerlin.energysexy.com/?kamryn \r\n gay porn subscribe free black porn ebony green sweater porn watching porn in here trick email vidz porn movies'),
(61, 'JamesPag', NULL, 'a.lb.e.r.tha.nshin.49@gmail.com', '83532817741', '2023-03-19 22:21:55', '2023-03-19 22:21:55', 'Mjfejdjwdjiwdhwsuf hohaufheodajidhowaf hwidjidjqiohfuehooiPQKWODJQIJ IWJDOKDOWJDIjefiwjreir jwqifjweifewifeefjrghr jfejfekwlfjrghwjwajkdjwfew intuitive.cloud'),
(62, 'KevinSkade', NULL, '4wifl4@course-fitness.com', '84895474933', '2023-03-20 02:33:59', '2023-03-20 02:33:59', 'https://94forfun.com \r\n \r\n \r\n英雄聯盟世界大賽、線上電競投注'),
(63, 'stevenhs11', NULL, 'rn18@ayumu8510.kenta93.excitemail.fun', '89198615394', '2023-03-20 02:49:13', '2023-03-20 02:49:13', 'New sexy website is available on the web\r\nhttp://jetsporn.belarmiporn.energysexy.com/?post-baylee \r\n\r\n 70s french porn dr tube porn porn yu dads on boys porn how doi get into porn industry'),
(64, 'IsidroExped', NULL, 'okurtrolkonkurteu123@gmail.com', '89954124652', '2023-03-20 03:27:56', '2023-03-20 03:27:56', 'Something amazing https://u.to/vRh5Hg'),
(65, 'jl4', NULL, 'fu2@masashi7310.ryoichi39.mailvista.site', '86861838435', '2023-03-20 04:43:00', '2023-03-20 04:43:00', 'New hot project galleries, daily updates\r\nhttp://reddcoin.miyuhot.com/?post-jewel \r\n russian double porn porn red hair boy toys animals hot and porn sites women in control porn porn megadownloads'),
(66, 'Davidvet', NULL, 'phsi@course-fitness.com', '81871795632', '2023-03-20 04:45:11', '2023-03-20 04:45:11', 'ขนมใส่กัญชา、กัญชา แนะนำ、กฏหมาย กัญชา \r\n \r\n \r\n \r\n \r\nhttps://kubet.party'),
(67, 'JamesGutty', NULL, 'fbyagd@course-fitness.com', '84988529148', '2023-03-20 05:15:33', '2023-03-20 05:15:33', 'สูตรบาคาร่า ใช้ได้จริง、คาสิโนสด、บาคาร่า \r\n \r\n \r\n \r\nhttps://ku77bet.org'),
(68, 'Fake', NULL, 'as@sd', 'Fakeasasas', '2023-03-20 05:17:13', '2023-03-20 05:17:13', 'fake'),
(69, 'MichaelHolla', NULL, 'bssww@course-fitness.com', '83635674348', '2023-03-20 05:46:08', '2023-03-20 05:46:08', '冠天下娛樂城 \r\n \r\n \r\n \r\nhttps://xn--ghq10gw1gvobv8a5z0d.com/'),
(70, 'myrtlemz69', NULL, 'terryed18@yoshito18.mailvista.site', '87977369865', '2023-03-20 07:56:53', '2023-03-20 07:56:53', 'Dirty Porn Photos, daily updated galleries\r\nhttp://talkingrockmommysfacesporn.miaxxx.com/?kendal \r\n nerd porn torrent andrea anderson porn clips bbw porn moves coed college room porn barley legal black porn stars'),
(71, 'XScfQxkHBW', NULL, 'callvisvetlana@list.ru', '86362287875', '2023-03-20 08:28:28', '2023-03-20 08:28:28', 'Не теряй время, бери в свои руки жизнь https://senler.ru/a/29xpm/gohx/759368335&XwDXfoqsJse https://google.com intuitive.cloud'),
(72, 'sCIjgCpnNI', NULL, 'mitaxebandilis@gmail.com', '83671977282', '2023-03-20 09:12:34', '2023-03-20 09:12:34', 'Wow this cool man https://forms.gle/kj9VRxJCoeBqmXib9 https://mail.ru intuitive.cloud'),
(73, 're69', NULL, 'ez3@fumio38.drkoop.site', '85657321449', '2023-03-20 12:02:06', '2023-03-20 12:02:06', 'Hot sexy porn projects, daily updates\r\nhttp://jillian.i.am.carla1.miaxxx.com/?post-marisol \r\n asain girl porn milf categories porn pics ashlyn rae pure 18 porn videos illegle porn search free tall and small porn'),
(74, 'rami', NULL, 'ramiyash97@gmail.com', '7043034687', '2023-03-20 12:59:40', '2023-03-20 12:59:40', 'Testing!'),
(75, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 13:07:10', '2023-03-20 13:07:10', 'Testing!'),
(76, 'darshan kavathiya patel', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 13:11:49', '2023-03-20 13:11:49', 'Testing!'),
(77, 'jenish vanpariya patel jenish vanpariya patel', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 13:14:15', '2023-03-20 13:14:15', 'Testing!'),
(78, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 14:34:48', '2023-03-20 14:34:48', 'Testing!'),
(79, 'yash', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 14:40:14', '2023-03-20 14:40:14', 'Testing!'),
(80, 'test', NULL, 'yashthepoised@gmail.com', '7043034687', '2023-03-20 14:43:01', '2023-03-20 14:43:01', 'Testing!'),
(81, 'leighgd3', NULL, 'jeanji69@yuji3910.rokuro40.excitemail.fun', '88935463547', '2023-03-20 17:33:57', '2023-03-20 17:33:57', 'Free Porn Galleries - Hot Sex Pictures\r\nhttp://pornaddicttestgrano.lexixxx.com/?susana \r\n ilegal junior porn tube free amateur porn from the club my friends mom porn pictures girls watching porn group escort porn'),
(82, 'Jameshop', NULL, 'k.e.ithy2arterberryrl@gmail.com', '83632379531', '2023-03-20 20:43:38', '2023-03-20 20:43:38', 'rescue remedy cats  <a href=  > https://www.legitedulacchapleau.ca/tramca.html </a>  top health care  <a href= https://www.jotform.com/230734918608058 > https://www.jotform.com/230734918608058 </a>  remedies for tmj'),
(83, 'cameron marston', NULL, 'cameron.marston@ukg.com', '9782902525', '2023-03-20 21:59:50', '2023-03-20 21:59:50', 'Trying to get more information on the HRIS system that Intuitive Cloud is using'),
(84, 'Divya Krishna', NULL, 'divya.krishna@itp-inc.com', '8137666695', '2023-03-21 01:49:49', '2023-03-21 01:49:49', 'I would like to chat with you about career at intuitive'),
(85, 'Lurlene Mazure', NULL, 'mazure.lurlene@gmail.com', '446 6380', '2023-03-21 01:54:40', '2023-03-21 01:54:40', 'I have made a simple video for you!\r\ncheck it out! ---> https://www.youtube.com/shorts/4ISoB5vgqiE'),
(86, 'Tim', NULL, 'danibr3@hotmail.com', '732 895-7863', '2023-03-21 02:46:51', '2023-03-21 02:46:51', 'Test #3'),
(87, 'eugeniaya18', NULL, 'manuelvm18@akio5910.kaede38.webvan.site', '84832572662', '2023-03-21 04:46:55', '2023-03-21 04:46:55', 'Sexy photo galleries, daily updated pics\r\nhttp://nastysexmemes.bestsexyblog.com/?post-destini \r\n\r\n credit card numbers for porn mature porn pictures alma magma porn clips melanie jayne porn top ten all time porn stars'),
(88, 'antoniowm3', NULL, 'justinedy11@hotaka12.mailguard.space', '89632543632', '2023-03-21 04:58:13', '2023-03-21 04:58:13', 'Girls of Desire: All babes in one place, crazy, art\r\nhttp://youtubeofrporn.gigixo.com/?post-reilly \r\n\r\n hillbilly homemade porn free porn videos amateur long memphis monroe pigtails porn yam porn tube free fat porn mpovies'),
(89, 'StevenGoath', NULL, 'xlehy@course-fitness.com', '87882266913', '2023-03-21 05:38:33', '2023-03-21 05:38:33', '冠天下 \r\n \r\n \r\nhttps://xn--ghq10gmvi961at1bmail479e.com/'),
(90, 'Edmundunwic', NULL, 'yp8k@course-fitness.com', '87399199523', '2023-03-21 06:30:33', '2023-03-21 06:30:33', '冠天下娛樂城，as8899.com，世界盃，世足盃，2022世界盃，2022世足盃 \r\n \r\n \r\nhttps://xn--ghq10gw1gvobv8a5z0d.com/'),
(91, 'WalterAlumn', NULL, 'gangiret98@gmail.com', '82275551624', '2023-03-21 08:12:07', '2023-03-21 08:12:07', 'best cardholder video here  https://youtu.be/wNXH0FoPGqg'),
(92, 'NicholasCen', NULL, 'zelatcol@gmail.com', '82448828664', '2023-03-21 09:22:05', '2023-03-21 09:22:05', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(93, 'CraigHoose', NULL, 'ih8kb@course-fitness.com', '85792164267', '2023-03-21 09:50:05', '2023-03-21 09:50:05', '天下娛樂城，as8899.com，世界盃，世足盃，2022世界盃，2022世足盃 \r\n \r\nhttps://xn--ghq10gmvi961at1b479e.com/'),
(94, 'Aveli', NULL, 'ng319avb@icloud.com', '84721572355', '2023-03-21 10:55:10', '2023-03-21 10:55:10', 'Hi, this is Irina. I am sending you my intimate photos as I promised. https://tinyurl.com/2ld5qk76'),
(95, 'Tommyhem', NULL, 'relopter@avio.alc-nnov.ru', '81886294941', '2023-03-21 17:03:18', '2023-03-21 17:03:18', 'ÐºÐ¾Ð¶Ð°Ð½Ñ‹Ðµ Ð¿ÑƒÑ„Ñ‹ \r\n<a href=https://mebelpodarok.ru/>https://mebelpodarok.ru/</a>'),
(96, 'moniquero4', NULL, 'michealqz60@kunio93.gcpmail1.site', '81857465249', '2023-03-21 20:27:30', '2023-03-21 20:27:30', 'Sexy photo galleries, daily updated pics\r\nhttp://chinese.porn.bloglag.com/?post-summer \r\n\r\n statue liberty porn indian satalite porn tv channel compatition porn tube porn hot sex free save as target latino porn'),
(97, 'terrencenv69', NULL, 'oliviaaq7@kenta1210.hideo85.infospace.fun', '89684485149', '2023-03-21 23:32:59', '2023-03-21 23:32:59', 'Young Heaven - Naked Teens & Young Porn Pictures\r\nhttp://pornsitcoms.bendon.alypics.com/?dakota \r\n big black butts porn not porn pics home webcam porn porn videos with dirty talk why husbands view porn'),
(98, 'lupegw3', NULL, 'am60@daisuke83.drkoop.site', '83815676979', '2023-03-22 01:44:57', '2023-03-22 01:44:57', 'Hot galleries, thousands new daily.\r\nhttp://charaporn.hotnatalia.com/?post-makenna \r\n\r\n ass cuming porn vids dree porn sites full movies at porn hub dress up porn video free block porn'),
(99, 'Williamhoima', NULL, 'b9z7u@course-fitness.com', '89389961466', '2023-03-22 02:43:48', '2023-03-22 02:43:48', 'HOYA娛樂城 \r\n \r\nhttps://xn--hoya-8h5gx1jhq2b.tw/'),
(100, 'buyinstagrambof', NULL, 'catch@hide.toobeo.com', '85737535861', '2023-03-22 02:51:11', '2023-03-22 02:51:11', '<a href=https://www.boostmyinsta.net/buy-instagram-followers>free instagram likes</a>'),
(101, 'JasonCen', NULL, 'zelatcol@gmail.com', '86613944192', '2023-03-22 08:52:53', '2023-03-22 08:52:53', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(102, 'liliantm60', NULL, 'ladonna@susumo71.infoseekmail.online', '83889563255', '2023-03-22 17:40:44', '2023-03-22 17:40:44', 'Hot photo galleries blogs and pictures\r\nhttp://freeclipartdesigns.bestpornstaractress.adablog69.com/?adeline\r\n\r\n vintage porn video movies janis porn star top list porn stars micah jones porn nubile porn video'),
(103, 'joanndg16', NULL, 'ricardodm6@masato96.gcpmail1.site', '82677371254', '2023-03-22 18:46:21', '2023-03-22 18:46:21', 'Dirty Porn Photos, daily updated galleries\r\nhttp://monsterporn.colfax.alexysexy.com/?keeley \r\n long dong silver porn tubes happy hour porn porn masturbation porn tsunade sexy cartoon porn teen lesbeian porn'),
(104, 'DannyDaw', NULL, 'fevgen708@gmail.com', '89361872731', '2023-03-22 19:01:51', '2023-03-22 19:01:51', '<a href=https://https://www.etsy.com/shop/Fayniykit> Ukrainian Fashion clothes and accessories, Wedding Veils. Blazer with imitation rhinestone corset in a special limited edition</a>'),
(105, 'Francismar', NULL, 'valentinellington@wwjmp.com', '81552937538', '2023-03-22 19:34:36', '2023-03-22 19:34:36', '</a><a href=https://accounts.binance.com/en/register?ref=25293193>Irascible gains in a excluding later with minimal investment. Looking to score $27,000 in 7 days, $250 looks like a diminutive amount.</a></a>'),
(106, 'valerient60', NULL, 'os3@itsuki3410.riku34.mailscan.site', '89222552479', '2023-03-22 22:00:48', '2023-03-22 22:00:48', 'Enjoy our scandal amateur galleries that looks incredibly dirty\r\nhttp://porngalz.instakink.com/?post-madeleine \r\n\r\n star fox porn pics naylin palin porn skinny black porn lesbian porn gallerys ameratur sex porn tube'),
(107, 'deannavq3', NULL, 'erikadn16@haruki61.mailscan.site', '83478635626', '2023-03-22 22:06:08', '2023-03-22 22:06:08', 'Hot sexy porn projects, daily updates\r\nhttp://funny.porn.instakink.com/?post-amina \r\n\r\n fat gays pool porn free gay porn passes free porn view trailer indian porn vieos german girls porn'),
(108, 'terrancewc3', NULL, 'lp6@eiji95.flooz.site', '82946951391', '2023-03-23 00:05:44', '2023-03-23 00:05:44', 'Big Ass Photos - Free Huge Butt Porn, Big Booty Pics\r\nhttp://pornbotteen.hotblognetwork.com/?post-joselyn \r\n\r\n porn sax photo galary ebony fever porn lesbian minors fucking porn t v porn chanels 3d porn jap free animation'),
(109, 'Kennygic', NULL, 'f5vano@course-fitness.com', '89784462772', '2023-03-23 00:10:45', '2023-03-23 00:10:45', '雙波長亞歷山大除毛雷射 - 八千代 \r\n \r\n \r\nhttps://yachiyo.com.tw/alexandrite-laser/'),
(110, 'RandyNic', NULL, 'po.k.rasser.e.g.ap.enza.@gmail.com', '81533747481', '2023-03-23 05:23:33', '2023-03-23 05:23:33', 'Осуществляем seo продвижение сайтов в ТОП10 поисковиков, все подробности тут: <a href=https://seo-line-1.ru/>https://seo-line-1.ru/</a>'),
(111, 'FfgfNobBioma', NULL, 'paintingstonebasementwalls258@gmail.com', '86399798799', '2023-03-23 09:10:10', '2023-03-23 09:10:10', '<a href=https://www.mollyopratt.online>https://www.mollyopratt.online</a> hilton lake taupo deals hilton hotels montebello california hilton parish council dorset'),
(112, 'Brycemaift', NULL, 'gkeiu@course-fitness.com', '88481297748', '2023-03-23 10:04:45', '2023-03-23 10:04:45', '第一借錢網-借錢,小額借款,小額借錢 \r\n \r\n \r\nhttps://168cash.com.tw/'),
(113, 'asdfghjkl', NULL, 'bnmjhgbn@gmail.com', 'asdfghghjs', '2023-03-23 11:37:14', '2023-03-23 11:37:14', 'kdmx sfrfnk3de'),
(114, 'Sakshi', NULL, 'sakshi@intuitive.cloud', 'asdfghjkkkkl', '2023-03-23 11:41:17', '2023-03-23 11:41:17', 'Hey there'),
(115, 'susanave3', NULL, 'matthewaq5@rokuro4410.naoki64.flooz.site', '87478477332', '2023-03-23 14:40:09', '2023-03-23 14:40:09', 'Hardcore Galleries with hot Hardcore photos\r\nhttp://big.ass.hotnatalia.com/?devin \r\n free porn african upload your own porn pic free porn photos gallery porn tube samples mom sonr porn movie'),
(116, 'ud60', NULL, 'lq16@itsuki4010.akira91.infoseekmail.online', '89652345549', '2023-03-23 15:41:33', '2023-03-23 15:41:33', 'New sexy website is available on the web\r\nhttp://jacked.kid-interractial.porn.celebrityamateur.com/?post-patricia \r\n free black and white gay porn free porn rocco sigfrid russia grannyfree porn fuck porn hardcore porn awrds'),
(117, 'fsdf', NULL, 'nirav@gmail.com', '7698265143', '2023-03-23 15:46:21', '2023-03-23 15:46:21', 'dfssd'),
(118, 'fsdf', NULL, 'nirav@gmail.com', '7698265143', '2023-03-23 15:49:15', '2023-03-23 15:49:15', 'dfssd'),
(119, 'Darshan', NULL, 'darshankavathiya007@gmail.com', '9537577772', '2023-03-23 15:59:50', '2023-03-23 15:59:50', 'Test Hubspto'),
(120, 'Darshan', NULL, 'dsbyufdsufd@gmail.com', '78912331561', '2023-03-23 16:03:00', '2023-03-23 16:03:00', 'Test'),
(121, 'dfghjkl', NULL, 'fghnm@g.com', 'fghjrtyujkrtyuio', '2023-03-23 17:02:58', '2023-03-23 17:02:58', 'gyijy78il,'),
(122, 'sUJpMvzYyM', NULL, 'callvisvetlana@list.ru', '88524175333', '2023-03-23 17:26:58', '2023-03-23 17:26:58', 'Счастье в простом, ты только двигайся вперед https://senler.ru/a/29xpm/gohx/759368335&XGeljIfxOzG https://google.com intuitive.cloud'),
(123, 'fsdf', NULL, 'nirav@gmail.com', '7698265143', '2023-03-23 17:30:31', '2023-03-23 17:30:31', 'dfssd'),
(124, 'Kevin', NULL, 'kevin.torres@intuitive.cloud', '425-502-2366', '2023-03-23 21:11:52', '2023-03-23 21:11:52', 'Hello - I\'d like to learn more.'),
(125, 'Jay Modh', NULL, 'jaymodh@gmail.com', '2019937799', '2023-03-23 21:12:07', '2023-03-23 21:12:07', 'Test'),
(126, 'Fidelsnota', NULL, 'niplzv@course-fitness.com', '89899283784', '2023-03-24 00:06:14', '2023-03-24 00:06:14', '冠天下 \r\n \r\n \r\nhttps://xn--ghq10gmvi961at1bmail479e.com/'),
(127, 'SammyPeelt', NULL, 'rfobs@course-fitness.com', '88473769431', '2023-03-24 03:35:38', '2023-03-24 03:35:38', '冠天下 \r\n \r\n \r\nhttps://xn--ghq10gmvi961at1bmail479e.com/'),
(128, 'KeithFix', NULL, 'cnlyd@course-fitness.com', '83651269687', '2023-03-24 04:18:00', '2023-03-24 04:18:00', 'thời trang、trà sữa、Du lịch \r\n \r\n \r\n \r\nhttps://saocoitintuc.com'),
(129, 'Kevin Torres', NULL, 'kevin.torres@intuitive.cloud', '425-502-2366', '2023-03-24 10:29:13', '2023-03-24 10:29:13', 'Hello'),
(130, 'Howardpsync', NULL, '2p1uo@course-fitness.com', '83264615267', '2023-03-24 12:58:34', '2023-03-24 12:58:34', '品空間 - Goûter Space \r\n \r\n \r\nhttps://gouterspace.com/'),
(131, 'Jared', NULL, 'jared.cooper@intuitive.cloud', '9492903190', '2023-03-24 21:03:08', '2023-03-24 21:03:08', 'test'),
(132, 'Pritam Dodeja', NULL, 'pritam.dodeja@intuitive.cloud', '+12013214751', '2023-03-24 21:03:34', '2023-03-24 21:03:34', 'Please reach out to me!'),
(133, 'EddieFek', NULL, 'f92at@course-fitness.com', '89654994756', '2023-03-24 22:13:09', '2023-03-24 22:13:09', '世界棒球經典賽即將開跑！9J娛樂城限時活動優惠 \r\n \r\n \r\nhttps://tx9j.tw/'),
(134, 'StephenCen', NULL, 'zelatcol@gmail.com', '86557773425', '2023-03-25 05:42:07', '2023-03-25 05:42:07', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(135, 'dasdsa', NULL, 'nirav@hmail.com', '+91 7698265143', '2023-03-25 16:35:40', '2023-03-25 16:35:40', ''),
(136, 'yashrami', NULL, 'yashthepoised@gmail.com', '+91 7043034687', '2023-03-25 16:42:27', '2023-03-25 16:42:27', ''),
(137, 'yashrami', NULL, 'yashthepoised@gmail.com', '+91 7043034687', '2023-03-25 17:27:03', '2023-03-25 17:27:03', ''),
(138, 'test', 'test', 'yashthepoised@gmail.com', '+91 7043034687', '2023-03-25 18:13:45', '2023-03-25 18:13:45', ''),
(139, 'Wilton', 'Hayner', 'seosubmitter@mail.com', '0664 335 31 09', '2023-03-25 19:34:08', '2023-03-25 19:34:08', ''),
(140, 'KennethHob', 'KennethHob', 'k.e.i.t.hy2arterberryrl@gmail.com', '89379577312', '2023-03-25 23:38:40', '2023-03-25 23:38:40', ''),
(141, 'ScottZen', 'ScottZen', 'smit24direct@yandex.ru', '83526738769', '2023-03-26 07:59:31', '2023-03-26 07:59:31', ''),
(142, 'Williamsorgo', 'Williamsorgo', 'ufutkin@yandex.ru', '86894638893', '2023-03-26 09:03:57', '2023-03-26 09:03:57', ''),
(143, 'Gubanjinanorb', 'Gubanjinanorb', 'k.k.a.shh.urr.ley@gmail.com', '87958921274', '2023-03-26 22:02:38', '2023-03-26 22:02:38', ''),
(144, 'WalterAlumn', 'WalterAlumn', 'gangiret98@gmail.com', '88717827965', '2023-03-27 01:01:45', '2023-03-27 01:01:45', ''),
(145, 'Jessica', 'Morey', 'morey.jessica@yahoo.com', '464 3143', '2023-03-27 02:40:43', '2023-03-27 02:40:43', ''),
(146, 'Robertedirm', 'Robertedirm', 'dariuszmolers@op.pl', '84361144285', '2023-03-27 09:35:07', '2023-03-27 09:35:07', ''),
(147, 'Andrewsheed', 'Andrewsheed', 'k.e.i.t.h.y2arterberryrl@gmail.com', '85583329145', '2023-03-27 12:26:30', '2023-03-27 12:26:30', ''),
(148, 'Toni4Thoug', 'Toni4Thoug', 'tonikas@mailside.site', '86674939118', '2023-03-27 16:55:08', '2023-03-27 16:55:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `iso_code` varchar(255) DEFAULT NULL,
  `calling_code` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `iso_code`, `calling_code`, `currency`, `currency_code`, `currency_symbol`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IN', '+91', 'Rupees', 'INR', '₹', NULL, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'United States of America', 'US', '+1', 'Dollars', 'USD', '$', NULL, 'inactive', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device_detail`
--

CREATE TABLE `device_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `device_type` enum('Android','iOS') NOT NULL DEFAULT 'Android',
  `notification_type` enum('Android','iOS','Flutter') NOT NULL DEFAULT 'Flutter',
  `token` text,
  `uuid` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os_version` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easier`
--

CREATE TABLE `easier` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `image_second` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `easier`
--

INSERT INTO `easier` (`id`, `title`, `image`, `description`, `priority`, `image_second`, `status`, `created_at`, `updated_at`) VALUES
(4, '30+ Annual Holidays', 'Perks-to-make-1.svg', NULL, 1, 'Perks-to-make-1.gif', 'active', '2023-03-14 20:55:38', '2023-03-14 20:55:38'),
(5, 'Monthly Team Dinner/ Event', 'Perks-to-make-2.svg', NULL, 2, 'Perks-to-make-2.gif', 'active', '2023-03-14 21:54:35', '2023-03-14 21:54:35'),
(6, '$500 Referral Bonus', 'Perks-to-make-3.svg', NULL, 3, 'Perks-to-make-3.gif', 'active', '2023-03-14 21:55:03', '2023-03-14 21:55:03'),
(7, '100% Paid Training on Technical Subjects', 'Perks-to-make-4.svg', NULL, 4, 'Perks-to-make-4.gif', 'active', '2023-03-14 21:55:32', '2023-03-14 21:55:32'),
(8, 'Sponsorship for Events/ Conferences', 'Perks-to-make-5.svg', NULL, 5, 'Perks-to-make-5.gif', 'active', '2023-03-14 21:56:18', '2023-03-14 21:56:18'),
(9, 'Annual Team Picnic', 'Perks-to-make-6.svg', NULL, 6, 'Perks-to-make-6.gif', 'active', '2023-03-14 21:56:49', '2023-03-14 21:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `topic` int(11) DEFAULT NULL,
  `description` text,
  `priority` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq_topics`
--

CREATE TABLE `faq_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intuitive`
--

CREATE TABLE `intuitive` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `image_second` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intuitive`
--

INSERT INTO `intuitive` (`id`, `title`, `image`, `description`, `priority`, `image_second`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Top-10 fast growth 150 IT companies in the Americas, CRN’s 2022', 'makes-intuitive-1.svg', NULL, 1, 'makes-intuitive-1.gif', 'active', '2023-03-09 19:30:34', '2023-03-09 19:59:41'),
(5, 'America’s fastest growing private companies, INC 5000’s 2022', 'makes-intuitive-2.svg', NULL, 2, 'makes-intuitive-2.gif', 'active', '2023-03-09 19:47:06', '2023-03-09 19:59:53'),
(6, '400+ highly experienced professionals', 'makes-intuitive-3.svg', NULL, 3, 'makes-intuitive-3.gif', 'active', '2023-03-09 20:00:34', '2023-03-09 20:00:34'),
(7, '98% customer retention since inception', 'makes-intuitive-4.svg', NULL, 4, 'makes-intuitive-4.gif', 'active', '2023-03-09 20:01:00', '2023-03-09 20:01:00'),
(8, '100+ enterprise customers across BFSI, HCLS, Manufacturing, Retail, and ISV verticals', 'makes-intuitive-5.svg', NULL, 5, 'makes-intuitive-5.gif', 'active', '2023-03-09 20:01:27', '2023-03-09 20:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `id` int(250) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdinlink` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`id`, `title`, `designation`, `priority`, `linkdinlink`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jay Modh', 'Founder & CEO', '1', 'https://www.linkedin.com/in/jaymodh/', 'uploads/2023/03/16c4d3c6f3bbfbd6732ef5dd52f93302.png', 'active', '2022-12-20 19:44:31', '2023-03-26 12:48:41'),
(2, 'Indraneel Shah', 'Managing Partner & CSO', '2', 'https://www.linkedin.com/in/indraneel-shah-92701a3/', 'uploads/2023/03/7c1b0930acf29925c6c69ea174a35d42.png', 'active', '2022-12-23 19:08:02', '2023-03-26 12:48:54'),
(3, 'Mir Ali', 'Global CTO', '3', 'https://www.linkedin.com/in/mir-navazish-ali/', 'uploads/2023/03/3eebcb0dd9300ec68f1c045449c5d94c.png', 'active', '2023-02-04 18:11:57', '2023-03-26 12:49:07'),
(4, 'Troy Wyatt', 'Global CTO', '4', 'https://www.linkedin.com/in/intuitivedataops/', 'uploads/2023/03/886d9f50e3402c93578ad20c0328ae74.png', 'active', '2023-02-05 18:27:33', '2023-03-26 12:49:22'),
(5, 'Steve DeMaria', 'VP, Sales (Global)', '5', 'https://www.linkedin.com/in/steven-demaria-605002a/', 'uploads/2023/03/12ef0dbc166bfde9e5a33972199bf571.png', 'active', '2023-02-06 16:52:36', '2023-03-26 12:49:42'),
(6, 'Tim Murphy', 'Sales Leader – Cloud & SDx', '6', 'https://www.linkedin.com/in/tim-murphy-4696092/', 'uploads/2023/03/96b55953164754e3e9d1d80fd66b3a0d.png', 'active', '2023-03-09 13:25:50', '2023-03-26 12:49:55'),
(7, 'Eric Chicha', 'VP, Sales (EMEA)', '7', 'https://www.linkedin.com/in/eric-chicha-535525/', 'uploads/2023/03/edd8e8c1c3bbe4e75776bf35b280c283.png', 'active', '2023-03-09 17:23:56', '2023-03-26 12:50:08'),
(8, 'Kajal Kakka', 'Operations Leader', '8', 'https://www.linkedin.com/in/kajal-kakka/', 'uploads/2023/03/baac88c3c8db9f811b3c563b0315def0.png', 'active', '2023-03-09 17:24:42', '2023-03-26 12:50:21'),
(9, 'Divya Krishna', 'Director - Talent Acquisition & HR', '9', 'https://www.linkedin.com/in/divya-krishna-t-783074140/', 'uploads/2023/03/7a29618bc5d392fe078dc5d717ef71f3.png', 'active', '2023-03-09 17:25:51', '2023-03-26 12:50:45'),
(10, 'Shreni Thakkar', 'Sales Leader – Cloud & SDx', '10', 'https://www.linkedin.com/in/shrenithakkar/', 'uploads/2023/03/8b571e6d16a918b83178cb8d818b7bdd.png', 'active', '2023-03-09 17:26:32', '2023-03-26 12:51:00'),
(11, 'Swapnil Badkur', 'Head of Program Management', '11', 'https://www.linkedin.com/in/swapnil-b-8496b920/', 'uploads/2023/03/0144e38f2415dd4f5cff12525e60d52b.png', 'active', '2023-03-09 17:27:08', '2023-03-26 12:51:41'),
(12, 'Aakriti Gupta', 'Director - Talent Acquisition & HR', '12', 'https://www.linkedin.com/in/aakriti-gupta-recruiter/', 'uploads/2023/03/933c46895cca14d1375d49b2c00453cf.png', 'active', '2023-03-18 15:14:18', '2023-03-27 16:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `lifeatinstetive`
--

CREATE TABLE `lifeatinstetive` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lifeatinstetive`
--

INSERT INTO `lifeatinstetive` (`id`, `title`, `priority`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'An Inspiring Workplace', 1, 'Join a diverse set of colleagues who are passionate about technology and always striving to be on top of their game.', 'active', '2023-02-05 17:21:59', '2023-03-12 21:12:41'),
(2, 'Achieve your Potential', 2, 'We don’t just hire you! We invest in developing your talents with training and mentorship while challenging you with meaningful work that ensures you can make an impact and build your skills.', 'active', '2023-02-05 18:26:54', '2023-03-12 21:13:03'),
(3, 'Work on the Next Big Thing', 3, 'We are not just followers, we are the creators! You will always find yourself working on one of its kind projects that create real impact.', 'active', '2023-03-12 21:13:10', '2023-03-12 21:13:21'),
(4, 'Don’t just Work, THRIVE', 4, 'While you might start as a junior, we know that’s not what you should be known for. Start young, fail fast and climb the growth ladder faster than anyone. No questions asked.', 'active', '2023-03-12 21:13:31', '2023-03-12 21:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `mail_subscribe`
--

CREATE TABLE `mail_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_subscribe`
--

INSERT INTO `mail_subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(36, 'nirav.goriya@codefencers.com', '2022-12-06', '2022-12-06 19:24:21'),
(38, 'ERCNAuZp@burpcollaborator.net', '2023-03-14', '2023-03-14 15:49:50'),
(39, 'nrd8bftpcb373lfh0i3dc1os9i2ot5q0uummrg86x@burpcollaborator.net', '2023-03-14', '2023-03-14 15:50:12'),
(40, 'yqAAalvF@burpcollaborator.net', '2023-03-14', '2023-03-14 16:07:42'),
(41, 'PNnXhszZ@burpcollaborator.net+(select*from(select(sleep(20)))a)+', '2023-03-14', '2023-03-14 16:13:01'),
(42, 'dmwrNYuw@burpcollaborator.net0ec7r3co5w', '2023-03-14', '2023-03-14 16:18:14'),
(43, 'GIghEJhw@burpcollaborator.net+(select*from(select(sleep(20)))a)+', '2023-03-14', '2023-03-14 16:24:23'),
(44, 'ijna3plz4lvhvv7rssvn4bg21suylfiam4ewjq0gp@burpcollaborator.net', '2023-03-14', '2023-03-14 16:31:08'),
(45, 'wswscyu8du4q44g0114wdkpba137uorjvdn5sz9py@burpcollaborator.net', '2023-03-14', '2023-03-14 16:35:29'),
(46, 'v00yk22clycuc8o495c0loxfi5bb2szn3hv903ht6@burpcollaborator.net', '2023-03-14', '2023-03-14 16:36:33'),
(47, 'kt60d8vie4505eha2b56euqlbb4hvystwnoft9azz@burpcollaborator.net', '2023-03-14', '2023-03-14 16:39:05'),
(48, 'qva9fcxmg8747ije4f7agyspdf6lx2uxyrqjvdc31@burpcollaborator.net', '2023-03-14', '2023-03-14 16:39:34'),
(49, 'z6cjqe8orai6ikugfhicr03rohhn845z9t1l6fn5c@burpcollaborator.net', '2023-03-14', '2023-03-14 16:42:49'),
(50, 'iJSprmfM@burpcollaborator.net', '2023-03-14', '2023-03-14 16:42:55'),
(51, 'GCfrqpWd@burpcollaborator.net', '2023-03-14', '2023-03-14 16:46:34'),
(52, 'wtPCGyAC@burpcollaborator.net', '2023-03-14', '2023-03-14 16:47:07'),
(53, 'ooDUwFOT@burpcollaborator.net', '2023-03-14', '2023-03-14 16:47:26'),
(54, 'ty76189rivvt1a2d5eahqu55rnktba85cz4r9lqbf@burpcollaborator.net', '2023-03-14', '2023-03-14 21:58:12'),
(55, 'jVuwOPLx@burpcollaborator.net', '2023-03-14', '2023-03-14 21:58:13'),
(56, 'HBJAjyZq@burpcollaborator.net', '2023-03-14', '2023-03-14 22:48:42'),
(57, 'bcexBlTA@burpcollaborator.netwpilkdjy6k', '2023-03-14', '2023-03-14 22:49:48'),
(58, 'el3f435noh5uqa2sm9gt8w5yxp3irbf3ar2es2h@oastify.com', '2023-03-14', '2023-03-14 23:08:00'),
(59, 'NpXMBNOI@burpcollaborator.net', '2023-03-14', '2023-03-14 23:08:43'),
(60, 'yTUldyIW@burpcollaborator.net', '2023-03-14', '2023-03-14 23:09:28'),
(61, 'cfKUHqgx@burpcollaborator.net', '2023-03-14', '2023-03-14 23:10:02'),
(62, 'zSNtUwJV@burpcollaborator.net', '2023-03-14', '2023-03-14 23:10:41'),
(63, 'QWtUyZSR@burpcollaborator.net', '2023-03-14', '2023-03-14 23:11:24'),
(64, 'qROlxvcm@burpcollaborator.net', '2023-03-14', '2023-03-14 23:12:04'),
(65, 'wgkSpsMg@burpcollaborator.net', '2023-03-14', '2023-03-14 23:12:44'),
(66, 'AKELcEmi@burpcollaborator.net', '2023-03-14', '2023-03-14 23:13:26'),
(67, 'iBjGyOEg@burpcollaborator.net', '2023-03-14', '2023-03-14 23:14:07'),
(68, 'FbbAVqlq@burpcollaborator.net', '2023-03-14', '2023-03-14 23:14:54'),
(69, 'XUQjVzUp@burpcollaborator.net', '2023-03-14', '2023-03-14 23:15:30'),
(70, 'sjsRKNQC@burpcollaborator.net', '2023-03-14', '2023-03-14 23:16:14'),
(71, 'gJrPFTmc@burpcollaborator.net', '2023-03-14', '2023-03-14 23:16:52'),
(72, 'lAQeWund@burpcollaborator.net', '2023-03-14', '2023-03-14 23:17:32'),
(73, 'CKAYpbGo@burpcollaborator.net', '2023-03-14', '2023-03-14 23:18:15'),
(74, 'qZscjYvr@burpcollaborator.net', '2023-03-14', '2023-03-14 23:18:53'),
(75, 'HBpcGFTY@burpcollaborator.net', '2023-03-14', '2023-03-14 23:19:39'),
(76, 'emIYBloE@burpcollaborator.net', '2023-03-14', '2023-03-14 23:20:19'),
(77, 'YpEWvRCO@burpcollaborator.net', '2023-03-14', '2023-03-14 23:20:59'),
(78, 'dIbpHiZW@burpcollaborator.net', '2023-03-14', '2023-03-14 23:21:43'),
(79, 'gWTCUfda@burpcollaborator.net', '2023-03-14', '2023-03-14 23:22:22'),
(80, 'axFklKHD@burpcollaborator.net', '2023-03-14', '2023-03-14 23:22:51'),
(81, 'blBhQcDF@burpcollaborator.net', '2023-03-14', '2023-03-14 23:23:28'),
(82, 'QvgvcLQD@burpcollaborator.net', '2023-03-14', '2023-03-14 23:23:59'),
(83, 'XeBRroih@burpcollaborator.net', '2023-03-14', '2023-03-14 23:24:31'),
(84, 'GDHtBSxc@burpcollaborator.net', '2023-03-14', '2023-03-14 23:25:07'),
(85, 'uhl61b825wsx70yu0wy58bzhe379yqvlzfr7w1dr2@burpcollaborator.net', '2023-03-14', '2023-03-14 23:35:36'),
(86, 'qZozmLnr@burpcollaborator.net', '2023-03-14', '2023-03-14 23:37:02'),
(87, 'i49bozvqskfluolinkltvzm51ruxlei9m3evjp0fp@burpcollaborator.net', '2023-03-14', '2023-03-14 23:37:42'),
(88, 'OKJgQpqb@burpcollaborator.net', '2023-03-14', '2023-03-14 23:40:38'),
(89, 'veygyo5f29pa4dv7x9vi5owubg4mv3sywsoktea4z@burpcollaborator.net', '2023-03-14', '2023-03-14 23:41:26'),
(90, 'UOypRCVL@burpcollaborator.net', '2023-03-14', '2023-03-14 23:44:21'),
(91, 'imlb6bd2awxxc03u5w35db4hj3c93q0l4fw711ir7@burpcollaborator.net', '2023-03-14', '2023-03-14 23:44:58'),
(92, 'tre9b4ivfp2qht8nap8yi49aowh28j5e98106unkc@burpcollaborator.net', '2023-03-14', '2023-03-14 23:46:06'),
(93, 'AexMaBmw@burpcollaborator.net', '2023-03-14', '2023-03-14 23:46:33'),
(94, 'hk9u4zbq8kvlao1i3k1tbz25hrax1ey923uvzpgf5@burpcollaborator.net', '2023-03-14', '2023-03-14 23:46:47'),
(95, 'aftbYPeL@burpcollaborator.net', '2023-03-14', '2023-03-14 23:47:12'),
(96, 'z9eot40vxpkqztqnspqy04ra6wz2qjner8j0ou5ku@burpcollaborator.net', '2023-03-14', '2023-03-14 23:47:24'),
(97, 'ntMLzKxz@burpcollaborator.net', '2023-03-14', '2023-03-14 23:47:48'),
(98, 'thyj1o8f59sa7dy709yi8ozueg7my3vyzsrkwed42@burpcollaborator.net', '2023-03-14', '2023-03-14 23:47:57'),
(99, 'ckyUYzLu@burpcollaborator.net', '2023-03-14', '2023-03-14 23:48:57'),
(100, 'NdrkxsOT@burpcollaborator.net', '2023-03-14', '2023-03-14 23:49:54'),
(101, 'lhez148v5psq7tyn0pyy84zaew72yjvez8r0wudk2@burpcollaborator.net', '2023-03-14', '2023-03-14 23:50:22'),
(102, 'ir6ybwinfh2ihl8fah8qiw92oohu8b56901s6mncc@burpcollaborator.net', '2023-03-14', '2023-03-14 23:50:48'),
(103, 'w68cqyxpujhkwnnhpjnsxyo43qwwndk8o2gulo2er@burpcollaborator.net', '2023-03-14', '2023-03-14 23:51:17'),
(104, 'tpib98gzdt0ufx6r8t62g87em0f66n3i7cz44yloa@burpcollaborator.net', '2023-03-14', '2023-03-14 23:51:46'),
(105, 'iv84fympjj6klnchejcsmyd4sqlwcd98d25uaoreg@burpcollaborator.net', '2023-03-14', '2023-03-14 23:52:47'),
(106, 'RnshCdfO@burpcollaborator.net', '2023-03-14', '2023-03-14 23:53:16'),
(107, 'akwCzXxN@burpcollaborator.net', '2023-03-14', '2023-03-14 23:53:33'),
(108, 'xwGKSlgu@burpcollaborator.net', '2023-03-14', '2023-03-14 23:53:53'),
(109, 'KgxbLSOV@burpcollaborator.net', '2023-03-14', '2023-03-14 23:54:14'),
(110, 'SfsCcXdz@burpcollaborator.net', '2023-03-14', '2023-03-14 23:54:59'),
(111, 'gksg4ib983v4a711331cbi2ohaag1xys2muez8gy5@burpcollaborator.net', '2023-03-14', '2023-03-14 23:58:19'),
(112, 'dxZjHUIo@burpcollaborator.net', '2023-03-14', '2023-03-14 23:58:21'),
(113, 'xan1ud14yylz02rwtyr71dsj750brsonshk9p36tv@burpcollaborator.net', '2023-03-14', '2023-03-15 00:00:53'),
(114, 'ZuhUGHWw@burpcollaborator.net', '2023-03-14', '2023-03-15 00:00:54'),
(116, 'qXBWwuXP@burpcollaborator.net', '2023-03-17', '2023-03-17 17:17:15'),
(117, 'yd9nz9vzdcumkv2031ppnret5jypp6j2b4duanrdg@burpcollaborator.net', '2023-03-17', '2023-03-17 17:17:32'),
(118, 'CayfqKbc@burpcollaborator.net', '2023-03-17', '2023-03-17 17:21:48'),
(119, 'XysUEsLz@burpcollaborator.net', '2023-03-17', '2023-03-17 17:22:08'),
(120, 'bCUOnAUS@burpcollaborator.net', '2023-03-17', '2023-03-17 17:22:31'),
(121, 'UoOqsblE@burpcollaborator.net', '2023-03-17', '2023-03-17 18:22:48'),
(122, 'RGZYbPpC@burpcollaborator.net', '2023-03-17', '2023-03-17 18:26:56'),
(123, 'IgajxtEn@burpcollaborator.net', '2023-03-17', '2023-03-17 18:30:01'),
(124, 'SYRpsddu@burpcollaborator.net', '2023-03-17', '2023-03-17 18:30:44'),
(125, 'thadeshwarjay@gmail.com', '2023-03-18', '2023-03-18 20:05:19'),
(137, 'jaymodh@gmail.co', '2023-03-19', '2023-03-19 20:03:35'),
(138, 'jaymodh@gmail.com', '2023-03-19', '2023-03-19 20:03:41'),
(139, 'priyamodi22@gmail.com', '2023-03-19', '2023-03-19 20:03:55'),
(140, 'jm@intuitive.vc', '2023-03-19', '2023-03-19 20:05:24'),
(141, 'is@intuitive.vc', '2023-03-19', '2023-03-19 20:05:49'),
(145, 'yashthepoised@gmail.com', '2023-03-20', '2023-03-20 12:44:16'),
(146, 'sdfghjnbvc@jjn', '2023-03-23', '2023-03-23 11:39:41'),
(147, 'sakshi.zalavadia@intuitive.cloud', '2023-03-23', '2023-03-23 11:40:04'),
(148, 'sakshizalavadia2002@gmail.com', '2023-03-23', '2023-03-23 11:43:43'),
(149, 'kevin.torres@intuitive.cloud', '2023-03-23', '2023-03-24 03:46:25'),
(150, 'brijeshvadaliya1@gmail.com', '2023-03-24', '2023-03-24 19:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `reation` varchar(255) DEFAULT NULL,
  `reation_id` int(11) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `reation`, `reation_id`, `media`, `size`, `created_at`, `updated_at`) VALUES
(1, 'download (4).jpg', 'Product', 22, 'uploads/2022/11/6ba75eb1f74daa2b1f87702ddddeaf4e.jpg', NULL, '2022-11-13 10:29:23', '2022-11-13 10:29:23'),
(2, 'remote_working_lifestyle_jobs.jpeg', 'Product', 22, 'uploads/2022/11/ae1c626ee5ffcf0148cf04018aaea471.jpg', NULL, '2022-11-13 10:29:28', '2022-11-13 10:29:28'),
(3, 'Main-Logo.png', 'Product', 22, 'uploads/2022/11/b20016beb2b38fe8e16f3d6f23f46ff5.png', NULL, '2022-11-13 10:30:01', '2022-11-13 10:30:01'),
(4, 'remote-worker-in-coffee-shop_og.jpg', 'Product', 22, 'uploads/2022/11/6d9f4ef090f3f7135f57cd46062db0c9.jpg', NULL, '2022-11-13 10:30:08', '2022-11-13 10:30:08'),
(5, 'woman-working-from-home-on-phone-og.jpg', 'Product', 22, 'uploads/2022/11/5c5a00e95ec1bca35b4de1eaa89b398d.jpg', NULL, '2022-11-13 10:30:22', '2022-11-13 10:30:22'),
(6, 'remote-collaboration-mistakes.png', 'Product', 22, 'uploads/2022/11/232c1f3cbe1fbca3156d6c73cac4ed3c.png', NULL, '2022-11-13 10:30:27', '2022-11-13 10:30:27'),
(7, 'woman-working-from-home-on-phone-og.jpg', 'Product', 1, 'uploads/2022/11/4f896fb864b7eb359c8b11ed7deedbed.jpg', NULL, '2022-11-13 10:49:58', '2022-11-13 10:49:58'),
(8, 'Main-Logo.png', 'Product', 1, 'uploads/2022/11/7ccdddec7af6f5884f923f7f188f8428.png', NULL, '2022-11-13 10:55:49', '2022-11-13 10:55:49'),
(9, 'Main-Logo.png', 'Product', 2, 'uploads/2022/11/6407463698657d3ead08580f219f424b.png', NULL, '2022-11-13 11:03:18', '2022-11-13 11:03:18'),
(10, 'remote-collaboration-mistakes.png', 'Product', 3, 'uploads/2022/11/40c2cafda645265a3cacf85206f8daca.png', NULL, '2022-11-13 11:04:06', '2022-11-13 11:04:06'),
(11, 'remote_working_lifestyle_jobs.jpeg', 'Product', 2, 'uploads/2022/11/8cac5cc9a3bf9159079d5145bfb525fa.jpg', NULL, '2022-11-13 11:04:31', '2022-11-13 11:04:31'),
(12, 'logo-8.png', 'Product', 1, 'uploads/2022/11/91b69c85d15321939f8527cf5702ddca.png', NULL, '2022-11-23 04:29:11', '2022-11-23 04:29:11'),
(13, 'logo-7.png', 'Product', 1, 'uploads/2022/11/5df2af00266479566a5ab73c499d910a.png', NULL, '2022-11-23 04:29:16', '2022-11-23 04:29:16'),
(14, 'logo-6.png', 'Product', 1, 'uploads/2022/11/c00b47b36ccd72b0c256a70115b568da.png', NULL, '2022-11-23 04:29:21', '2022-11-23 04:29:21'),
(15, 'logo-5.png', 'Product', 1, 'uploads/2022/11/1861b9f8c2a8d1ac93436e2280de45af.png', NULL, '2022-11-23 04:29:25', '2022-11-23 04:29:25'),
(16, 'logo-8.png', 'Product', 6, 'uploads/2022/11/c04923e63966ecf1268f867819a678c2.png', NULL, '2022-11-23 05:15:49', '2022-11-23 05:15:49'),
(17, 'logo-7.png', 'Product', 6, 'uploads/2022/11/e01d3b8195abc8f99ac798f5f1818806.png', NULL, '2022-11-23 05:53:59', '2022-11-23 05:53:59'),
(18, 'logo-6.png', 'Product', 6, 'uploads/2022/11/35e8c9480da4836f875029ba2870fac1.png', NULL, '2022-11-23 05:54:03', '2022-11-23 05:54:03'),
(19, 'logo-5.png', 'Product', 6, 'uploads/2022/11/716a8d4623e49eaeaf61f680783ebebf.png', NULL, '2022-11-23 05:54:07', '2022-11-23 05:54:07'),
(20, 'logo-4 (1).png', 'Product', 6, 'uploads/2022/11/7537cc1b454bc5892b95f4155b4f9d4c.png', NULL, '2022-11-23 05:54:11', '2022-11-23 05:54:11'),
(21, 'logo-1.png', 'Product', 7, 'uploads/2022/11/78f8d160f2a580e6dde0adeb58f4ea58.png', NULL, '2022-11-24 04:47:12', '2022-11-24 04:47:12'),
(22, 'logo-2.png', 'Product', 7, 'uploads/2022/11/31ce47cdf4f34f917321dca177a79300.png', NULL, '2022-11-24 04:47:22', '2022-11-24 04:47:22'),
(23, 'logo-3.png', 'Product', 7, 'uploads/2022/11/bcd0e94c0ccab501fece24118a3f0ad7.png', NULL, '2022-11-24 04:47:29', '2022-11-24 04:47:29'),
(24, 'logo-4.png', 'Product', 7, 'uploads/2022/11/35c89b9217d392397f3452e57e090036.png', NULL, '2022-11-24 04:47:36', '2022-11-24 04:47:36'),
(25, 'logo-5.png', 'Product', 7, 'uploads/2022/11/b62db554cfe9f9680e64a437ff0e39d5.png', NULL, '2022-11-24 04:47:43', '2022-11-24 04:47:43'),
(26, 'logo-6.png', 'Product', 7, 'uploads/2022/11/54d0fdb130bb96ac1fe35403df592c77.png', NULL, '2022-11-24 04:47:51', '2022-11-24 04:47:51'),
(27, 'logo-7.png', 'Product', 7, 'uploads/2022/11/6cdaa571570ff3ce65e1a9301000f266.png', NULL, '2022-11-24 04:47:57', '2022-11-24 04:47:57'),
(28, 'logo-8.png', 'Product', 7, 'uploads/2022/11/bd6a32893c19f6549e0f6f441807a6cc.png', NULL, '2022-11-24 04:48:02', '2022-11-24 04:48:02'),
(29, 'logo-9.png', 'Product', 7, 'uploads/2022/11/c082f2b63ccb7d3e1493dbfa779c7f31.png', NULL, '2022-11-24 04:48:07', '2022-11-24 04:48:07'),
(30, 'logo-10.png', 'Product', 7, 'uploads/2022/11/fefd96c70a79ca0b4bbbeb1d20c3c034.png', NULL, '2022-11-24 04:48:11', '2022-11-24 04:48:11'),
(31, 'logo-11.png', 'Product', 7, 'uploads/2022/11/24d93ca91e591f0510d94fb4d39504fa.png', NULL, '2022-11-24 04:55:31', '2022-11-24 04:55:31'),
(32, 'logo-12.png', 'Product', 7, 'uploads/2022/11/b9602d47456520c5f1e6a793c2d5bb29.png', NULL, '2022-11-24 05:13:25', '2022-11-24 05:13:25'),
(33, 'logo-13.png', 'Product', 7, 'uploads/2022/11/60776a731ca66cebfdc580e889a86dfc.png', NULL, '2022-11-24 05:13:30', '2022-11-24 05:13:30'),
(34, 'logo-14.png', 'Product', 7, 'uploads/2022/11/1170de7cf06b1ab23d0639e12eb1ec4f.png', NULL, '2022-11-24 05:13:38', '2022-11-24 05:13:38'),
(35, 'logo-15.png', 'Product', 7, 'uploads/2022/11/1387d90e471dd1a7cc72023b8833dd14.png', NULL, '2022-11-24 05:13:43', '2022-11-24 05:13:43'),
(36, 'logo-16.png', 'Product', 7, 'uploads/2022/11/635d335e2a64d64bff525f83a11d5a17.png', NULL, '2022-11-24 05:13:48', '2022-11-24 05:13:48'),
(37, 'logo-17.png', 'Product', 7, 'uploads/2022/11/cafc493140cda61dd0b0f8b66f810a1f.png', NULL, '2022-11-24 05:13:52', '2022-11-24 05:13:52'),
(38, 'logo-18.png', 'Product', 7, 'uploads/2022/11/1a1fdc245c725908b70d89f5d007686c.png', NULL, '2022-11-24 05:13:57', '2022-11-24 05:13:57'),
(39, 'logo-19.png', 'Product', 7, 'uploads/2022/11/07e86a5eb93ce18a63039fe367b3ce73.png', NULL, '2022-11-24 05:14:02', '2022-11-24 05:14:02'),
(40, 'logo-20.png', 'Product', 7, 'uploads/2022/11/fb812d57d3276888b2bc067be6d29c61.png', NULL, '2022-11-24 05:14:07', '2022-11-24 05:14:07'),
(41, 'beautiful-asian-woman-smiling-customer-service-talking-headset-world-map-communication-business-concept-elements-117596081.jpg', 'Product', 2, 'uploads/2023/02/47029ee2521007c1d0af57cafce89edc.jpg', NULL, '2023-02-04 18:47:38', '2023-02-04 18:47:38'),
(42, 'Slider-3.jpg', 'Product', 15, 'uploads/2023/02/d57915f69aedd77e988730f3962caeaf.jpg', NULL, '2023-02-05 18:29:35', '2023-02-05 18:29:35'),
(43, 'Slider-2.jpg', 'Product', 15, 'uploads/2023/02/6d9c3000335705a7341a187e49af8be3.jpg', NULL, '2023-02-05 18:29:44', '2023-02-05 18:29:44'),
(44, 'Slider-1.jpg', 'Product', 15, 'uploads/2023/02/09d6bb441147d9c00d50598b81d34676.jpg', NULL, '2023-02-05 18:29:52', '2023-02-05 18:29:52'),
(45, 'Collaborate-16.png', 'Product', 7, 'uploads/2023/03/841992be8225d05f361fb6bd9fce9806.png', NULL, '2023-03-09 20:27:17', '2023-03-09 20:27:17'),
(46, 'Collaborate-29.png', 'Product', 7, 'uploads/2023/03/b9cb39607cdadfc3879e50062f937a50.png', NULL, '2023-03-09 20:27:24', '2023-03-09 20:27:24'),
(47, 'Collaborate-31.png', 'Product', 7, 'uploads/2023/03/a28f731251c0ce2896b234a7ca7e640f.png', NULL, '2023-03-09 20:27:29', '2023-03-09 20:27:29'),
(48, 'Collaborate-30.png', 'Product', 7, 'uploads/2023/03/f62cfc393d05d5e42e317790d916db77.png', NULL, '2023-03-09 20:27:32', '2023-03-09 20:27:32'),
(49, 'Collaborate-5.png', 'Product', 7, 'uploads/2023/03/312eef63287b810d72eeef18dc1d7d3d.png', NULL, '2023-03-09 20:27:37', '2023-03-09 20:27:37'),
(50, 'Collaborate-24.png', 'Product', 7, 'uploads/2023/03/153f92e89c1c957da33c411054ca7966.png', NULL, '2023-03-09 20:27:43', '2023-03-09 20:27:43'),
(51, 'Collaborate-6.png', 'Product', 7, 'uploads/2023/03/3df615ad974bf703ba0044aebbb30c2d.png', NULL, '2023-03-09 20:27:48', '2023-03-09 20:27:48'),
(52, 'Collaborate-23.png', 'Product', 7, 'uploads/2023/03/7ebb64e79c0c348cf8145138cf557a51.png', NULL, '2023-03-09 20:32:01', '2023-03-09 20:32:01'),
(53, 'Collaborate-24.png', 'Product', 7, 'uploads/2023/03/e4ca6434925a3e9aee0342c174590660.png', NULL, '2023-03-09 20:32:07', '2023-03-09 20:32:07'),
(54, 'Collaborate-25.png', 'Product', 7, 'uploads/2023/03/43e23b97afe0990ee9dce4503d4dd678.png', NULL, '2023-03-09 20:32:12', '2023-03-09 20:32:12'),
(55, 'Collaborate-26.png', 'Product', 7, 'uploads/2023/03/aca0bc57dfd34aebe7096c581d3ab670.png', NULL, '2023-03-09 20:32:18', '2023-03-09 20:32:18'),
(56, 'Collaborate-27.png', 'Product', 7, 'uploads/2023/03/0d20523614be15b31b2b729115cd95f8.png', NULL, '2023-03-09 20:32:23', '2023-03-09 20:32:23'),
(57, '5fd48aff-2ed7-411d-9095-425ab7296006.jpg', 'Product', 18, 'uploads/2023/03/60e0c757bf1cc2fcd9bc4cbc69a5dcf5.jpg', NULL, '2023-03-14 20:46:11', '2023-03-14 20:46:11'),
(58, 'a99564c1-22e5-44b5-a7e0-135f1e56db0c.jpg', 'Product', 18, 'uploads/2023/03/db05a0fd89b8263b251603fb1ecc38ef.jpg', NULL, '2023-03-14 20:46:16', '2023-03-14 20:46:16'),
(59, 'IMG_2057.jpg', 'Product', 18, 'uploads/2023/03/4dcc065f642495b567f107e6b868b9b3.jpg', NULL, '2023-03-14 20:46:20', '2023-03-14 20:46:20'),
(60, 'IMG_2121.jpg', 'Product', 18, 'uploads/2023/03/52a55365a0cbb8f1243d3ab469080577.jpg', NULL, '2023-03-14 20:46:26', '2023-03-14 20:46:26'),
(61, 'IMG_2144.jpg', 'Product', 18, 'uploads/2023/03/fb6f71d7caeced78083ac85bf53434cc.jpg', NULL, '2023-03-14 20:46:37', '2023-03-14 20:46:37'),
(62, 'IMG_3330.jpg', 'Product', 18, 'uploads/2023/03/c16c7be43ea580adde6c477b2c504ce6.jpg', NULL, '2023-03-14 20:46:44', '2023-03-14 20:46:44'),
(63, 'IMG_4376.jpg', 'Product', 18, 'uploads/2023/03/a5647ff5d1f2dbd3a6de1198d9c25d9c.jpg', NULL, '2023-03-14 20:49:30', '2023-03-14 20:49:30'),
(64, 'IMG_4541.jpg', 'Product', 18, 'uploads/2023/03/14dbead55f8e9c6f6c36aedf0c372cba.jpg', NULL, '2023-03-14 20:50:51', '2023-03-14 20:50:51'),
(65, 'IMG_4595.jpg', 'Product', 18, 'uploads/2023/03/774c6f33dab4ebf9ca85bb1bd1b5ee78.jpg', NULL, '2023-03-14 20:50:58', '2023-03-14 20:50:58'),
(66, 'IMG_9843.jpg', 'Product', 18, 'uploads/2023/03/e1023ba55e5366447103e3ffb019d6fe.jpg', NULL, '2023-03-14 20:51:04', '2023-03-14 20:51:04'),
(67, 'Slider-1.jpg', 'Product', 20, 'uploads/2023/03/5ea781e5151b1ff23ada406246e2014b.jpg', NULL, '2023-03-14 21:50:50', '2023-03-14 21:50:50'),
(68, 'Slider-2.jpg', 'Product', 20, 'uploads/2023/03/bec07988a6a06c9d6fcdda1d221fde73.jpg', NULL, '2023-03-14 21:50:57', '2023-03-14 21:50:57'),
(69, 'Slider-3.jpg', 'Product', 20, 'uploads/2023/03/fba69c4eb4168fca28770ab1e92da9d2.jpg', NULL, '2023-03-14 21:51:03', '2023-03-14 21:51:03'),
(70, 'Slider-4.jpg', 'Product', 20, 'uploads/2023/03/ba83a24ad9625ae5245a449a3201c420.jpg', NULL, '2023-03-14 21:51:14', '2023-03-14 21:51:14'),
(71, 'Slider-5.jpg', 'Product', 20, 'uploads/2023/03/7a2bb3d5d4b9a394671b64d3e4f4258a.jpg', NULL, '2023-03-14 21:51:20', '2023-03-14 21:51:20'),
(72, 'Slider-6.jpg', 'Product', 20, 'uploads/2023/03/c47368ba1a634b4a5a50c70f5bc1c671.jpg', NULL, '2023-03-14 21:51:27', '2023-03-14 21:51:27'),
(73, 'Collaborate-1.png', 'Product', 21, 'uploads/2023/03/fd9146d6c434af59370fc1d735b5079c.png', NULL, '2023-03-15 00:45:36', '2023-03-15 00:45:36'),
(74, 'Collaborate-2.png', 'Product', 21, 'uploads/2023/03/1d5a35afc2d337056850cc557c0847e7.png', NULL, '2023-03-15 00:45:43', '2023-03-15 00:45:43'),
(75, 'Collaborate-3.png', 'Product', 21, 'uploads/2023/03/226b77b895cbf176e04a117db737bade.png', NULL, '2023-03-15 00:45:48', '2023-03-15 00:45:48'),
(76, 'Collaborate-4.png', 'Product', 21, 'uploads/2023/03/a0a6a551e088376d0adc7bd0637d2952.png', NULL, '2023-03-15 00:45:56', '2023-03-15 00:45:56'),
(77, 'Collaborate-5.png', 'Product', 21, 'uploads/2023/03/0a12b26352be66cd7e73c3ce30d2fbf9.png', NULL, '2023-03-15 00:46:08', '2023-03-15 00:46:08'),
(78, 'Collaborate-1.png', 'Product', 23, 'uploads/2023/03/ce2d3359ec2bc2fed1737ab392977e48.png', NULL, '2023-03-15 01:11:08', '2023-03-15 01:11:08'),
(79, 'Collaborate-25.png', 'Product', 23, 'uploads/2023/03/f326dc65b8864a3ae686efc02c314862.png', NULL, '2023-03-15 01:11:28', '2023-03-15 01:11:28'),
(80, 'Collaborate-3.png', 'Product', 23, 'uploads/2023/03/f043a43967a70af82f0919f174dc5ad0.png', NULL, '2023-03-15 01:11:38', '2023-03-15 01:11:38'),
(81, 'Collaborate-4.png', 'Product', 23, 'uploads/2023/03/07e7956450ec1a5abff63d1585605b69.png', NULL, '2023-03-15 01:11:46', '2023-03-15 01:11:46'),
(82, 'Collaborate-28.png', 'Product', 23, 'uploads/2023/03/095afb6faca079859cb4524e2106aeb0.png', NULL, '2023-03-15 01:11:58', '2023-03-15 01:11:58'),
(83, 'Collaborate-18.png', 'Product', 23, 'uploads/2023/03/47ddfb299445afdf5dbcdeebabd46d1a.png', NULL, '2023-03-15 01:12:08', '2023-03-15 01:12:08'),
(84, 'Collaborate-19.png', 'Product', 23, 'uploads/2023/03/2cf340523b84db4500f81b0226377321.png', NULL, '2023-03-15 01:12:15', '2023-03-15 01:12:15'),
(85, 'Collaborate-20.png', 'Product', 23, 'uploads/2023/03/3d8c99aa24edafe98639015dea600c01.png', NULL, '2023-03-15 01:12:22', '2023-03-15 01:12:22'),
(86, 'Collaborate-21.png', 'Product', 23, 'uploads/2023/03/a93131070802d2484931d78ddf553f6c.png', NULL, '2023-03-15 01:12:34', '2023-03-15 01:12:34'),
(87, 'Collaborate-22.png', 'Product', 23, 'uploads/2023/03/f07c2100450aac6a56a217c842134508.png', NULL, '2023-03-15 01:12:40', '2023-03-15 01:12:40'),
(88, 'Collaborate-23.png', 'Product', 23, 'uploads/2023/03/6866fdf0fc7c516f0d9a96b55711f506.png', NULL, '2023-03-15 01:12:48', '2023-03-15 01:12:48'),
(89, 'Collaborate-9.png', 'Product', 23, 'uploads/2023/03/8eb24a1a41c210035f353ed44cda0cb5.png', NULL, '2023-03-15 01:13:11', '2023-03-15 01:13:11'),
(90, 'Collaborate-10.png', 'Product', 23, 'uploads/2023/03/c7b248c2dbfb7625d31b6fd69e9e601b.png', NULL, '2023-03-15 01:13:22', '2023-03-15 01:13:22'),
(91, 'Collaborate-11.png', 'Product', 23, 'uploads/2023/03/4b27001977c7170766f5b29334f835b3.png', NULL, '2023-03-15 01:13:33', '2023-03-15 01:13:33'),
(92, 'Collaborate-12.png', 'Product', 23, 'uploads/2023/03/e9f03cde83941d715e8be7096a331778.png', NULL, '2023-03-15 01:13:42', '2023-03-15 01:13:42'),
(93, 'Collaborate-8.png', 'Product', 23, 'uploads/2023/03/c9a5c20a8abe9261692b8a8405da8d3b.png', NULL, '2023-03-15 01:13:53', '2023-03-15 01:13:53'),
(94, 'Collaborate-7.png', 'Product', 23, 'uploads/2023/03/a3cbd801e8c35c609827950f9c9c5e2a.png', NULL, '2023-03-15 01:14:00', '2023-03-15 01:14:00'),
(95, 'Collaborate-13.png', 'Product', 23, 'uploads/2023/03/0804cb92830bed142c2f4ec0d7e7b87e.png', NULL, '2023-03-15 01:14:11', '2023-03-15 01:14:11'),
(96, 'Collaborate-14.png', 'Product', 23, 'uploads/2023/03/24fa9aef3f0bab5e4c074e6ebee4e3a7.png', NULL, '2023-03-15 01:14:20', '2023-03-15 01:14:20'),
(97, 'Collaborate-26.png', 'Product', 23, 'uploads/2023/03/2c90b50372c9cc184ef6e6779d404822.png', NULL, '2023-03-15 01:14:33', '2023-03-15 01:14:33'),
(98, 'Collaborate-16.png', 'Product', 23, 'uploads/2023/03/df7057637627f8e58e5929c2bf4b0135.png', NULL, '2023-03-15 01:14:48', '2023-03-15 01:14:48'),
(99, 'Collaborate-29.png', 'Product', 23, 'uploads/2023/03/4715ffbf12532e6a85315dee66059d27.png', NULL, '2023-03-15 01:14:59', '2023-03-15 01:14:59'),
(100, 'Collaborate-31.png', 'Product', 23, 'uploads/2023/03/09307d40c44a9572264ac078e92f7ec7.png', NULL, '2023-03-15 01:15:16', '2023-03-15 01:15:16'),
(101, 'Collaborate-5.png', 'Product', 23, 'uploads/2023/03/3ea671fade4809f7d247a07a1001e08a.png', NULL, '2023-03-15 01:15:25', '2023-03-15 01:15:25'),
(102, 'Collaborate-24.png', 'Product', 23, 'uploads/2023/03/d51a959c83e1d1cd1992c6caa4541b89.png', NULL, '2023-03-15 01:15:38', '2023-03-15 01:15:38'),
(103, 'Collaborate-6.png', 'Product', 23, 'uploads/2023/03/43adc8e213cf34b9968d0e13b510c152.png', NULL, '2023-03-15 01:15:47', '2023-03-15 01:15:47'),
(104, 'Collaborate-27.png', 'Product', 23, 'uploads/2023/03/35175471a5b1d28a0e69e292543c9eec.png', NULL, '2023-03-15 01:15:58', '2023-03-15 01:15:58'),
(105, 'Collaborate-30.png', 'Product', 23, 'uploads/2023/03/9754715292cc290c97f8fb0f1ce103ab.png', NULL, '2023-03-15 01:16:08', '2023-03-15 01:16:08'),
(106, 'Collaborate-1.png', 'Product', 24, 'uploads/2023/03/a186e94bef184ce3e7167c29d4121284.png', NULL, '2023-03-15 01:20:42', '2023-03-15 01:20:42'),
(107, 'Collaborate-25.png', 'Product', 24, 'uploads/2023/03/ecffdb61dce9594097a28367fe222d0b.png', NULL, '2023-03-15 01:21:00', '2023-03-15 01:21:00'),
(108, 'Collaborate-3.png', 'Product', 24, 'uploads/2023/03/8a1820e408ad25a401858ba8eb6e014e.png', NULL, '2023-03-15 01:21:09', '2023-03-15 01:21:09'),
(109, 'Collaborate-4.png', 'Product', 24, 'uploads/2023/03/94d0a9c7c1193b0b02d529cd100a0a6c.png', NULL, '2023-03-15 01:21:17', '2023-03-15 01:21:17'),
(110, 'Collaborate-28.png', 'Product', 24, 'uploads/2023/03/dd55813e3d08865d748bbfb0d15f4950.png', NULL, '2023-03-15 01:21:28', '2023-03-15 01:21:28'),
(111, 'Collaborate-18.png', 'Product', 24, 'uploads/2023/03/3928b064e0be52586381c03db43475a1.png', NULL, '2023-03-15 01:21:34', '2023-03-15 01:21:34'),
(112, 'Collaborate-19.png', 'Product', 24, 'uploads/2023/03/96246bf89f59f2ee4139574dc0512d1b.png', NULL, '2023-03-15 01:21:42', '2023-03-15 01:21:42'),
(113, 'Collaborate-20.png', 'Product', 24, 'uploads/2023/03/c3e005a45d66301d4581a99e8762d444.png', NULL, '2023-03-15 01:21:48', '2023-03-15 01:21:48'),
(114, 'Collaborate-21.png', 'Product', 24, 'uploads/2023/03/1633df33ae7dc1db9a213cf58708ae8d.png', NULL, '2023-03-15 01:21:55', '2023-03-15 01:21:55'),
(115, 'Collaborate-22.png', 'Product', 24, 'uploads/2023/03/025ef3f2403d9958501182b51929cf3e.png', NULL, '2023-03-15 01:22:04', '2023-03-15 01:22:04'),
(116, 'Collaborate-23.png', 'Product', 24, 'uploads/2023/03/847a8de1322a1df7cb9d9873783f7b3f.png', NULL, '2023-03-15 01:22:13', '2023-03-15 01:22:13'),
(117, 'Collaborate-9.png', 'Product', 24, 'uploads/2023/03/5ce3c8eb78f10dac6510a549e69b809f.png', NULL, '2023-03-15 01:22:25', '2023-03-15 01:22:25'),
(118, 'Collaborate-10.png', 'Product', 24, 'uploads/2023/03/26ab58526adc1def5c977f23ae894e9b.png', NULL, '2023-03-15 01:22:33', '2023-03-15 01:22:33'),
(119, 'Collaborate-11.png', 'Product', 24, 'uploads/2023/03/6d75fe79e00d4033417219fe50b45434.png', NULL, '2023-03-15 01:22:42', '2023-03-15 01:22:42'),
(120, 'Collaborate-12.png', 'Product', 24, 'uploads/2023/03/b21553101ac1e19e736515b076ea60a9.png', NULL, '2023-03-15 01:22:50', '2023-03-15 01:22:50'),
(121, 'Collaborate-8.png', 'Product', 24, 'uploads/2023/03/4ec65c95c380efd27d0bf6b00ca678c8.png', NULL, '2023-03-15 01:22:59', '2023-03-15 01:22:59'),
(122, 'Collaborate-7.png', 'Product', 24, 'uploads/2023/03/d7d1aeabefda89868a533f4d43ccde92.png', NULL, '2023-03-15 01:23:07', '2023-03-15 01:23:07'),
(123, 'Collaborate-13.png', 'Product', 24, 'uploads/2023/03/b40114a97bc0a38bbfd58d553678f37f.png', NULL, '2023-03-15 01:23:18', '2023-03-15 01:23:18'),
(124, 'Collaborate-14.png', 'Product', 24, 'uploads/2023/03/3e889899bda3efc4be893c4f71b5f414.png', NULL, '2023-03-15 01:23:25', '2023-03-15 01:23:25'),
(125, 'Collaborate-26.png', 'Product', 24, 'uploads/2023/03/682887c700fbaeec618f7302e0ba6bd3.png', NULL, '2023-03-15 01:23:40', '2023-03-15 01:23:40'),
(126, 'Collaborate-16.png', 'Product', 24, 'uploads/2023/03/9bb51d781ddd8684fba0611effa74def.png', NULL, '2023-03-15 01:23:49', '2023-03-15 01:23:49'),
(127, 'Collaborate-29.png', 'Product', 24, 'uploads/2023/03/a9d34da8075c0e029fe1d9ca71d3e3bb.png', NULL, '2023-03-15 01:23:59', '2023-03-15 01:23:59'),
(128, 'Collaborate-31.png', 'Product', 24, 'uploads/2023/03/a0daad53fdb10e3f76cc1d2456f42fb0.png', NULL, '2023-03-15 01:24:08', '2023-03-15 01:24:08'),
(129, 'Collaborate-5.png', 'Product', 24, 'uploads/2023/03/7dc18572ea022c7626fae889c8449d2b.png', NULL, '2023-03-15 01:24:22', '2023-03-15 01:24:22'),
(130, 'Collaborate-24.png', 'Product', 24, 'uploads/2023/03/e2d37c8211e91794375f74725981edb9.png', NULL, '2023-03-15 01:24:37', '2023-03-15 01:24:37'),
(131, 'Collaborate-6.png', 'Product', 24, 'uploads/2023/03/bf83779f55d985d42ce58804ed84c21c.png', NULL, '2023-03-15 01:24:44', '2023-03-15 01:24:44'),
(132, 'Collaborate-27.png', 'Product', 24, 'uploads/2023/03/0b6c9869e6ac2d34e2b896669c1ae926.png', NULL, '2023-03-15 01:24:55', '2023-03-15 01:24:55'),
(133, 'Collaborate-30.png', 'Product', 24, 'uploads/2023/03/e1331609e13c44471dd6cd1c80106196.png', NULL, '2023-03-15 01:25:01', '2023-03-15 01:25:01'),
(134, '1.png', 'Product', 25, 'uploads/2023/03/ab66a7f41bc521b2026c0d5ddf03a32d.png', NULL, '2023-03-15 14:06:45', '2023-03-15 14:06:45'),
(135, '2.png', 'Product', 25, 'uploads/2023/03/4af2d506ff721c1904ac2672371ce321.png', NULL, '2023-03-15 14:06:57', '2023-03-15 14:06:57'),
(136, '3.png', 'Product', 25, 'uploads/2023/03/1bba2fac5f5cec27c3b690562c2fd0d7.png', NULL, '2023-03-15 14:07:08', '2023-03-15 14:07:08'),
(137, '4.png', 'Product', 25, 'uploads/2023/03/c9133235c72112d91ce922440135b558.png', NULL, '2023-03-15 14:07:20', '2023-03-15 14:07:20'),
(138, '5.png', 'Product', 25, 'uploads/2023/03/6d0e3b3b43153d1fd580f11558dd3e62.png', NULL, '2023-03-15 14:07:30', '2023-03-15 14:07:30'),
(139, '6.png', 'Product', 25, 'uploads/2023/03/a85cbefab71d86ad896cf6986befe855.png', NULL, '2023-03-15 14:07:41', '2023-03-15 14:07:41'),
(140, '7.png', 'Product', 25, 'uploads/2023/03/7fb41c888ebcd321c4fc68a58863de73.png', NULL, '2023-03-15 14:07:50', '2023-03-15 14:07:50'),
(141, '8.png', 'Product', 25, 'uploads/2023/03/bfe5628a0948b7c8e8547b8ee8fba5b8.png', NULL, '2023-03-15 14:07:58', '2023-03-15 14:07:58'),
(142, '1.png', 'Product', 26, 'uploads/2023/03/81de248bcb7e45bad7804f4cdfcc250a.png', NULL, '2023-03-15 14:09:26', '2023-03-15 14:09:26'),
(143, '2.png', 'Product', 26, 'uploads/2023/03/891e320fdb1ae2859acc5b51494d2c4f.png', NULL, '2023-03-15 14:09:35', '2023-03-15 14:09:35'),
(144, '4.png', 'Product', 26, 'uploads/2023/03/6f00acfe99fad63269e2be9f7348cc18.png', NULL, '2023-03-15 14:09:52', '2023-03-15 14:09:52'),
(145, '5.png', 'Product', 26, 'uploads/2023/03/94c6252c9bb8371c66b243d06bc623b8.png', NULL, '2023-03-15 14:10:10', '2023-03-15 14:10:10'),
(146, '6.png', 'Product', 26, 'uploads/2023/03/35305946c5a90cb55bd60243593bcbf1.png', NULL, '2023-03-15 14:10:21', '2023-03-15 14:10:21'),
(147, '7.png', 'Product', 26, 'uploads/2023/03/8ee91bf2efd8a28b90a5a05eba785a94.png', NULL, '2023-03-15 14:10:40', '2023-03-15 14:10:40'),
(148, '8.png', 'Product', 26, 'uploads/2023/03/f7a9db75c2fd7aebd8a82758485326fc.png', NULL, '2023-03-15 14:10:51', '2023-03-15 14:10:51'),
(149, '9.png', 'Product', 26, 'uploads/2023/03/846ee8890b67756832c80340591bce38.png', NULL, '2023-03-15 14:11:01', '2023-03-15 14:11:01'),
(150, '9.png', 'Product', 26, 'uploads/2023/03/551f6fbc790729f561887495718de2bf.png', NULL, '2023-03-15 14:11:04', '2023-03-15 14:11:04'),
(151, '11.png', 'Product', 26, 'uploads/2023/03/1fc139649d7987d497b007cb9b4539c2.png', NULL, '2023-03-15 14:11:15', '2023-03-15 14:11:15'),
(152, '12.png', 'Product', 26, 'uploads/2023/03/47a2cd973d49247a9a920bd1f59072d6.png', NULL, '2023-03-15 14:11:26', '2023-03-15 14:11:26'),
(153, '13.png', 'Product', 26, 'uploads/2023/03/53a3fa15ae87a0492e0612f4c438ed56.png', NULL, '2023-03-15 14:11:37', '2023-03-15 14:11:37'),
(154, '1.png', 'Product', 27, 'uploads/2023/03/4159116c6358d14976994e673df617f5.png', NULL, '2023-03-15 14:16:45', '2023-03-15 14:16:45'),
(155, '2.png', 'Product', 27, 'uploads/2023/03/f880fc37a4f25df6c1174d38b3d2b7c4.png', NULL, '2023-03-15 14:16:57', '2023-03-15 14:16:57'),
(156, '4.png', 'Product', 27, 'uploads/2023/03/6fd16faf4b02a55a110179df104ccd0a.png', NULL, '2023-03-15 14:17:07', '2023-03-15 14:17:07'),
(157, '5.png', 'Product', 27, 'uploads/2023/03/3a730c75f8129fcaa3bddf612199a672.png', NULL, '2023-03-15 14:17:18', '2023-03-15 14:17:18'),
(158, '6.png', 'Product', 27, 'uploads/2023/03/6eb132390acc4529a63539b7b6768828.png', NULL, '2023-03-15 14:17:27', '2023-03-15 14:17:27'),
(159, '7.png', 'Product', 27, 'uploads/2023/03/89b64474cc3c8b572c600a813f959bdb.png', NULL, '2023-03-15 14:17:38', '2023-03-15 14:17:38'),
(160, '8.png', 'Product', 27, 'uploads/2023/03/877f52475ad4a1a686f1b6e495c4f3e2.png', NULL, '2023-03-15 14:17:46', '2023-03-15 14:17:46'),
(161, '9.png', 'Product', 27, 'uploads/2023/03/06f8c2404f1b0ec4f429915ed1a50085.png', NULL, '2023-03-15 14:17:58', '2023-03-15 14:17:58'),
(162, '11.png', 'Product', 27, 'uploads/2023/03/c9318daff6049b55b6b5b129ba63fc31.png', NULL, '2023-03-15 14:18:14', '2023-03-15 14:18:14'),
(163, '12.png', 'Product', 27, 'uploads/2023/03/cc511bcc8fadc322eb7255865d95cfad.png', NULL, '2023-03-15 14:18:22', '2023-03-15 14:18:22'),
(164, '13.png', 'Product', 27, 'uploads/2023/03/7232d060c3c1d55a462db91b765a4cb2.png', NULL, '2023-03-15 14:18:34', '2023-03-15 14:18:34'),
(165, 'Collaborate-35.jpg', 'Product', 23, 'uploads/2023/03/6b729ab241402316811aa39cf591e26f.jpg', NULL, '2023-03-15 23:18:41', '2023-03-15 23:18:41'),
(166, 'Collaborate-1.png', 'Product', 28, 'uploads/2023/03/f4cee349600a281cbfff3736cdc8ab4a.png', NULL, '2023-03-16 14:45:56', '2023-03-16 14:45:56'),
(167, 'Collaborate-25.png', 'Product', 28, 'uploads/2023/03/0b44219a78287db800a3df30a414f330.png', NULL, '2023-03-16 14:49:03', '2023-03-16 14:49:03'),
(168, 'Collaborate-3.png', 'Product', 28, 'uploads/2023/03/95c32ee6a8ba6bcc937a54a9cf778ecd.png', NULL, '2023-03-16 14:49:41', '2023-03-16 14:49:41'),
(169, 'Collaborate-4.png', 'Product', 28, 'uploads/2023/03/bee5da5bae9bf94e49350204932ca71c.png', NULL, '2023-03-16 14:49:47', '2023-03-16 14:49:47'),
(170, 'Collaborate-28.png', 'Product', 28, 'uploads/2023/03/91160b40b0d9c6ce2b3c5f0b5f77a4f6.png', NULL, '2023-03-16 14:49:53', '2023-03-16 14:49:53'),
(171, 'Collaborate-18.png', 'Product', 28, 'uploads/2023/03/7533addcb7e9019bcb84b2e31f0b9309.png', NULL, '2023-03-16 14:55:04', '2023-03-16 14:55:04'),
(172, 'Collaborate-19.png', 'Product', 28, 'uploads/2023/03/abcbcd37a343e5055dee287fa1d65869.png', NULL, '2023-03-16 14:55:16', '2023-03-16 14:55:16'),
(173, 'Collaborate-20.png', 'Product', 28, 'uploads/2023/03/2d36e053933d2e9b559505d873fb13c6.png', NULL, '2023-03-16 14:55:26', '2023-03-16 14:55:26'),
(174, 'Collaborate-21.png', 'Product', 28, 'uploads/2023/03/ad9a6517af4326a2b9430d939dcfe86b.png', NULL, '2023-03-16 14:55:36', '2023-03-16 14:55:36'),
(175, 'Collaborate-22.png', 'Product', 28, 'uploads/2023/03/450d3d8e8d1a22ec216818fbaba4dccf.png', NULL, '2023-03-16 14:55:44', '2023-03-16 14:55:44'),
(176, 'Collaborate-23.png', 'Product', 28, 'uploads/2023/03/c750fb5d1d8f8b19d2d3bba27f94d6cc.png', NULL, '2023-03-16 14:55:52', '2023-03-16 14:55:52'),
(177, 'Collaborate-9.png', 'Product', 28, 'uploads/2023/03/2d3409c8d5536a63cdcf6dde9493ccb5.png', NULL, '2023-03-16 14:56:01', '2023-03-16 14:56:01'),
(178, 'Collaborate-10.png', 'Product', 28, 'uploads/2023/03/42bfef35bf8eb43d76987cc235c3fdc6.png', NULL, '2023-03-16 14:56:07', '2023-03-16 14:56:07'),
(179, 'Collaborate-11.png', 'Product', 28, 'uploads/2023/03/68b52bc417b10504a6dad3e64a4a7665.png', NULL, '2023-03-16 14:56:19', '2023-03-16 14:56:19'),
(180, 'Collaborate-12.png', 'Product', 28, 'uploads/2023/03/6d221250d0954a472f01f5e13d177107.png', NULL, '2023-03-16 14:56:24', '2023-03-16 14:56:24'),
(181, 'Collaborate-8.png', 'Product', 28, 'uploads/2023/03/8e6e7939cb7f0380b7385c4898106920.png', NULL, '2023-03-16 14:56:33', '2023-03-16 14:56:33'),
(182, 'Collaborate-7.png', 'Product', 28, 'uploads/2023/03/9bac8d2941efa84f0ed0b1ff634a04c6.png', NULL, '2023-03-16 14:56:37', '2023-03-16 14:56:37'),
(183, 'Collaborate-13.png', 'Product', 28, 'uploads/2023/03/cf13891820ef10d82e39bb5ed77a9b5f.png', NULL, '2023-03-16 14:56:46', '2023-03-16 14:56:46'),
(184, 'Collaborate-14.png', 'Product', 28, 'uploads/2023/03/179e70574278ab1927ed29039ff69cf5.png', NULL, '2023-03-16 14:56:51', '2023-03-16 14:56:51'),
(185, 'Collaborate-26.png', 'Product', 28, 'uploads/2023/03/b81a910e92d81e553a38ecf78a0038c6.png', NULL, '2023-03-16 14:57:06', '2023-03-16 14:57:06'),
(186, 'Collaborate-16.png', 'Product', 28, 'uploads/2023/03/c2135b5a6f98577ea47f12bab6d59ba1.png', NULL, '2023-03-16 14:57:14', '2023-03-16 14:57:14'),
(187, 'Collaborate-29.png', 'Product', 28, 'uploads/2023/03/9ee9dee672579db4bad6af610a0e663c.png', NULL, '2023-03-16 14:57:22', '2023-03-16 14:57:22'),
(188, 'Collaborate-31.png', 'Product', 28, 'uploads/2023/03/bf4e8779fd34de146ac8fcd415ce83c6.png', NULL, '2023-03-16 14:57:29', '2023-03-16 14:57:29'),
(189, 'Collaborate-5.png', 'Product', 28, 'uploads/2023/03/0adb93092b4eb38ecae93079089adb0e.png', NULL, '2023-03-16 14:57:37', '2023-03-16 14:57:37'),
(190, 'Collaborate-24.png', 'Product', 28, 'uploads/2023/03/ad760eedbb266c660e83ab6a4bec9d59.png', NULL, '2023-03-16 14:57:46', '2023-03-16 14:57:46'),
(191, 'Collaborate-6.png', 'Product', 28, 'uploads/2023/03/9508ef6425d83d2e30c32d6f5fb17e99.png', NULL, '2023-03-16 14:57:53', '2023-03-16 14:57:53'),
(192, 'Collaborate-27.png', 'Product', 28, 'uploads/2023/03/961a64f605665d910b054781236c0966.png', NULL, '2023-03-16 14:57:59', '2023-03-16 14:57:59'),
(193, 'Collaborate-30.png', 'Product', 28, 'uploads/2023/03/28f96fff42198294c7288dbf8f70108c.png', NULL, '2023-03-16 14:58:07', '2023-03-16 14:58:07'),
(194, 'Collaborate-35.png', 'Product', 28, 'uploads/2023/03/5439ac6e4297d3f640c3ce0d334674a4.png', NULL, '2023-03-16 14:58:23', '2023-03-16 14:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000001_create_user_info_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_10_12_000001_create_setting_table', 1),
(11, '2019_10_12_000003_create_payment_methods_table', 1),
(12, '2019_12_04_124020_create_device_detail_table', 1),
(13, '2020_06_08_055606_create_faq_topics_table', 1),
(14, '2020_06_08_055606_create_faqs_table', 1),
(15, '2020_06_08_055606_create_posts_table', 1),
(16, '2020_06_15_113350_create_otp_verifications_table', 1),
(17, '2020_06_16_060756_create_countries_table', 1),
(18, '2020_06_16_060810_create_states_table', 1),
(19, '2020_06_16_060833_create_cities_table', 1),
(20, '2020_06_16_060834_create_areas_table', 1),
(21, '2020_06_16_060835_create_slider_table', 1),
(22, '2020_06_22_060210_create_offers_table', 1),
(23, '2020_08_14_055941_create_addresses_table', 1),
(24, '2020_08_19_101309_create_media_table', 1),
(25, '2020_08_19_101309_create_products_table', 1),
(26, '2020_08_19_101309_create_recently_viewed_items_table', 1),
(27, '2020_08_19_101309_create_wishlist_table', 1),
(28, '2020_08_21_072248_create_carts_table', 1),
(29, '2020_08_21_072248_create_favorites_table', 1),
(30, '2020_08_21_072248_create_product_attributes_table', 1),
(31, '2020_08_21_072248_create_product_categories_table', 1),
(32, '2020_08_21_072248_create_product_variations_table', 1),
(33, '2020_08_21_072248_create_wallet_history_table', 1),
(34, '2020_08_21_072248_create_wallets_table', 1),
(35, '2020_08_27_063917_create_categories_table', 1),
(36, '2020_08_27_103505_create_brands_table', 1),
(37, '2020_08_27_103505_create_reviews_table', 1),
(38, '2020_09_01_091843_create_modules_table', 1),
(39, '2020_09_01_091843_create_orders_table', 1),
(40, '2020_09_19_113350_create_notifications_table', 1),
(41, '2020_11_19_001641_create_coupons_table', 1),
(42, '2021_02_13_012510_create_variations_table', 1),
(43, '2021_02_16_011610_create_variation_groups_table', 1),
(44, '2022_03_11_152953_create_api_access_tokens_table', 1),
(45, '2022_03_11_152953_create_subscription_plan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `is_sent` int(11) DEFAULT '0',
  `is_read` int(11) DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `extra` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_order_id` varchar(255) DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `item_count` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) DEFAULT NULL,
  `item_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `delivery_charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grand_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_tracking_id` varchar(255) DEFAULT NULL,
  `payment_status` enum('Pending','Received','Refund') NOT NULL DEFAULT 'Pending',
  `order_notes` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(21) DEFAULT NULL,
  `status` enum('Temporary','New','Accepted','Rejected','Preparing','Scheduled','Dispatched','Out-For-Delivery','Delivered','Completed','Canceled','Failed','Refund') NOT NULL DEFAULT 'Temporary',
  `goods_received` enum('Yes','No') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `expire_at` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `phone_number`, `email`, `code`, `expire_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NkQBG+XMmPC0IQ==', NULL, '965256', NULL, 'pending', '2023-03-17 19:29:49', '2023-03-17 19:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `description`, `slug`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COD', 'Pay with cash upon delivery.', 'cod', NULL, NULL, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'Online Razorpay', 'Pay via Razorpay you can pay with your credit card if you don’t have a PayPal account.', 'razorpay', NULL, NULL, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `priority`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our Innovation Portfolio', 49, 'Data and AI/ML:', 'active', '2023-03-05 08:46:57', '2023-03-05 08:46:57'),
(11, 'Voice/Contact Center:', 64, 'Voice/Contact Center:', 'active', '2023-03-15 23:12:01', '2023-03-15 23:12:01'),
(12, 'IoT/Supply Chain Tracking', 33, 'IoT/Supply Chain Tracking', 'active', '2023-03-15 23:13:14', '2023-03-15 23:13:14'),
(15, 'Cybersecurity, Enterprise Risk Management & AppSecOps/DevSecOps:', 68, 'Cybersecurity, Enterprise Risk Management & AppSecOps/DevSecOps:', 'active', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(17, 'Our Innovation Portfolio', 45, 'Data and AI/ML:', 'active', '2023-03-17 17:01:17', '2023-03-17 17:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_detail`
--

CREATE TABLE `portfolio_detail` (
  `id` int(11) NOT NULL,
  `port_id` int(11) DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_detail`
--

INSERT INTO `portfolio_detail` (`id`, `port_id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 2, 'icon-3.png', 'Name', 'Comprehensive Cyber Risk Quantification Management (Inside-Out and Outside-in)', '2023-03-05 08:48:22', '2023-03-05 08:48:22'),
(4, 2, 'icon-3.png', 'John', 'Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.', '2023-03-05 08:48:22', '2023-03-05 08:48:22'),
(5, 2, 'icon-3.png', 'Danwer', 'AppSecOps Platform', '2023-03-05 08:48:22', '2023-03-05 08:48:22'),
(6, 3, 'icon-3.png', 'Founder\'s', '#1 Voice & Video Analytics, Agent Coaching with iRPA including Platform for Enterprises', '2023-03-05 08:49:22', '2023-03-05 08:49:22'),
(7, 4, 'icon-11.png', 'Vision', '#1 Real-time AI & iRPA enabled Supply Chain Tracking Solution (GSM, GPS, BLE, WiFi) with coverage across 168 Countries (Land, Ocean & Air)', '2023-03-05 08:50:06', '2023-03-05 08:50:06'),
(8, 5, 'icon-12 (1).png', 'Founder\'s Vision', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-12 09:27:57', '2023-03-12 09:27:57'),
(9, 5, 'icon-1.png', 'John', 'MLOps & Model Development Factory', '2023-03-12 09:27:57', '2023-03-12 09:27:57'),
(10, 5, 'icon-2.png', 'Brilliant', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-12 09:27:57', '2023-03-12 09:27:57'),
(11, 6, 'icon-3 (1).png', 'Founder John', 'Comprehensive Cyber Risk Quantification Management (Inside-Out and Outside-in)', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(12, 6, 'icon-4.png', 'Founder\'s V', 'Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(13, 6, 'icon-5.png', 'Founder\'s c', 'AppSecOps Platform', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(14, 6, 'icon-6.png', 'Founder\'s a', 'AllOps & DevSecOps-as-a-Service Platform', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(15, 6, 'icon-7.png', 'Founder\'s b', 'Enterprise Risk Management (Cyber, Infra, App Data, Privacy)', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(16, 6, 'icon-8.png', 'Founder\'s d', 'AppDev & DevSecOps Code Compliance Platform', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(17, 6, 'icon-9.png', 'Founder\'s g', 'Identity-first cloud infrastructure security platform with an easy-to-deploy SaaS solution', '2023-03-12 09:39:57', '2023-03-12 09:39:57'),
(18, 7, 'icon-10.png', 'Founder\'s Vision', '#1 Voice & Video Analytics, Agent Coaching with iRPA including Platform for Enterprises', '2023-03-12 09:41:37', '2023-03-12 09:41:37'),
(19, 8, 'icon-12.png', 'Founder\'s Visio', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-15 21:28:22', '2023-03-15 21:28:22'),
(20, 8, 'icon-1.png', 'Founder\'s Visi', 'MLOps & Model Development Factory', '2023-03-15 21:28:22', '2023-03-15 21:28:22'),
(21, 8, 'icon-2.png', 'Founder\'s Vis', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-15 21:28:22', '2023-03-15 21:28:22'),
(22, 9, 'icon-12.png', 'https://devrev.ai/', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-15 21:51:39', '2023-03-15 21:51:39'),
(23, 9, 'icon-1.png', 'https://andromeda360.ai/', 'MLOps & Model Development Factory', '2023-03-15 21:51:39', '2023-03-15 21:51:39'),
(24, 9, 'icon-2.png', 'https://www.arcion.io/', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-15 21:51:39', '2023-03-15 21:51:39'),
(25, 10, 'icon-3.png', 'https://www.safe.security/', 'Comprehensive Cyber Risk Quantification Management (Inside-Out and Outside-in)', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(26, 10, 'icon-4.png', 'https://www.endorlabs.com/', 'Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(27, 10, 'icon-5.png', 'https://www.armorcode.com/', 'AppSecOps Platform', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(28, 10, 'icon-6.png', 'https://www.kaiburr.com/', 'AllOps & DevSecOps-as-a-Service Platform', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(29, 10, 'icon-7.png', 'https://www.optimeyes.ai/', 'Enterprise Risk Management (Cyber, Infra, App Data, Privacy)', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(30, 10, 'icon-8.png', '#', 'AppDev & DevSecOps Code Compliance Platform', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(31, 10, 'icon-9.png', 'https://ermetic.com/', 'Identity-first cloud infrastructure security platform with an easy-to-deploy SaaS solution', '2023-03-15 23:10:27', '2023-03-15 23:10:27'),
(32, 11, 'icon-10.png', 'https://www.uniphore.com/', '#1 Voice & Video Analytics, Agent Coaching with iRPA including Platform for Enterprises', '2023-03-15 23:12:01', '2023-03-15 23:12:01'),
(33, 12, 'icon-11.png', 'https://www.roambee.com/', '#1 Real-time AI & iRPA enabled Supply Chain Tracking Solution (GSM, GPS, BLE, WiFi) with coverage across 168 Countries (Land, Ocean & Air)', '2023-03-15 23:13:14', '2023-03-15 23:13:14'),
(34, 13, 'icon-12.png', 'https://devrev.ai/', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-16 19:11:19', '2023-03-16 19:11:19'),
(35, 13, 'icon-1.png', 'https://andromeda360.ai/', 'MLOps & Model Development Factory', '2023-03-16 19:11:19', '2023-03-16 19:11:19'),
(36, 13, 'icon-2.png', 'https://www.arcion.io/', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-16 19:11:19', '2023-03-16 19:11:19'),
(37, 13, 'tessel.png', 'https://www.tessel.tech/', 'Building beautiful apps and websites carefully crafted to your requirments', '2023-03-16 19:11:19', '2023-03-16 19:11:19'),
(38, 14, 'icon-3.png', 'https://www.safe.security/', 'Comprehensive Cyber Risk Quantification Management (Inside-Out and Outside-in)', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(39, 14, 'icon-4.png', 'https://www.endorlabs.com/', 'Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(40, 14, 'icon-5.png', 'https://www.armorcode.com/', 'AppSecOps Platform', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(41, 14, 'icon-6.png', 'https://www.kaiburr.com/', 'AllOps & DevSecOps-as-a-Service Platform', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(42, 14, 'icon-7.png', 'https://www.optimeyes.ai/', 'Enterprise Risk Management (Cyber, Infra, App Data, Privacy)', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(43, 14, 'icon-8.png', 'https://nucleaus.com/', 'AppDev & DevSecOps Code Compliance Platform', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(44, 14, 'icon-9.png', 'https://ermetic.com/', 'Identity-first cloud infrastructure security platform with an easy-to-deploy SaaS solution', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(45, 14, 'Dasera Logo White-01.png', 'https://www.dasera.com/', 'Comprehensive data security platform analyzing every interaction', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(46, 14, 'Asset 17_2x.png', 'https://www.lightbeam.ai/', 'Automate data security and privacy compliance controls', '2023-03-16 19:27:16', '2023-03-16 19:27:16'),
(47, 15, 'icon-3.png', 'https://www.safe.security/', 'Comprehensive Cyber Risk Quantification Management (Inside-Out and Outside-in)', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(48, 15, 'icon-4.png', 'https://www.endorlabs.com/', 'Dependency lifecycle management that makes it way easier for teams to select, secure, and maintain OSS.', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(49, 15, 'icon-5.png', 'https://www.armorcode.com/', 'AppSecOps Platform', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(50, 15, 'icon-6.png', 'https://www.kaiburr.com/', 'AllOps & DevSecOps-as-a-Service Platform', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(51, 15, 'icon-7.png', 'https://www.optimeyes.ai/', 'Enterprise Risk Management (Cyber, Infra, App Data, Privacy)', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(52, 15, 'icon-8.png', 'https://nucleaus.com/', 'AppDev & DevSecOps Code Compliance Platform', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(53, 15, 'icon-9.png', 'https://ermetic.com/', 'Identity-first cloud infrastructure security platform with an easy-to-deploy SaaS solution', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(54, 15, 'Dasera Logo White-01.png', 'https://www.dasera.com/', 'Comprehensive data security platform analyzing every interaction', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(55, 15, 'Asset 17_2x.png', 'https://www.lightbeam.ai/', 'Automate data security and privacy compliance controls', '2023-03-16 19:40:23', '2023-03-16 19:40:23'),
(56, 16, 'icon-12.png', 'https://devrev.ai/', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-17 16:45:37', '2023-03-17 16:45:37'),
(57, 16, 'icon-1.png', 'https://andromeda360.ai/', 'MLOps & Model Development Factory', '2023-03-17 16:45:37', '2023-03-17 16:45:37'),
(58, 16, 'icon-2.png', 'https://www.arcion.io/', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-17 16:45:37', '2023-03-17 16:45:37'),
(59, 16, 'tessel.png', 'https://tessell.com', 'Building beautiful apps and websites carefully crafted to your requirments', '2023-03-17 16:45:37', '2023-03-17 16:45:37'),
(60, 17, 'icon-12.png', 'https://devrev.ai/', 'Developer CRM (Category Creator Startup by Industry Veterans)', '2023-03-17 17:01:17', '2023-03-17 17:01:17'),
(61, 17, 'icon-1.png', 'https://andromeda360.ai/', 'MLOps & Model Development Factory', '2023-03-17 17:01:17', '2023-03-17 17:01:17'),
(62, 17, 'icon-2.png', 'https://www.arcion.io/', 'World’s 1st Cloud CDC. & Heterogeneous Data Replication & Migration Platform', '2023-03-17 17:01:17', '2023-03-17 17:01:17'),
(63, 17, 'icon-13.png', 'https://tessell.com', 'Building beautiful apps and websites carefully crafted to your requirments', '2023-03-17 17:01:17', '2023-03-17 17:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(250) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `post_date` varchar(255) DEFAULT NULL,
  `short_description` longtext,
  `description` longblob,
  `status` enum('draft','active','inactive') NOT NULL DEFAULT 'active',
  `post_type` varchar(255) NOT NULL DEFAULT 'blog',
  `post_meta` varchar(255) DEFAULT NULL,
  `post_seo_title` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `post_seo_keywords` varchar(255) DEFAULT NULL,
  `post_seo_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(22, NULL, 'VMC on AWS – Use Cases', 'vmc-on-aws-use-cases', 'uploads/2023/03/4bd478ffd32fc34d16a6a6d9e4d07b73.png', 'uploads/2023/03/4e7762f73a38b9aed5b55b852696856d.png', NULL, 'Bharath Babbur', '2020-05-17', 'If you are reading this blog, means you are having thoughts of considering moving your…', 0x3c703e496620796f75206172652072656164696e67207468697320626c6f672c206d65616e7320796f752061726520686176696e672074686f7567687473206f6620636f6e7369646572696e67206d6f76696e6720796f75722049542c2066756c6c79206f72207061727469616c6c7920696e746f20636c6f75642e20416c6f6e672077697468207468697320796f752061726520616c736f207468696e6b696e672061626f757420746865206566666f72747320726571756972656420746f2072652d73747275637475726520616e646f722072652d64657369676e20796f7572206170706c69636174696f6e20666f722074686520636c6f756420616e642061206c6f74206f66206f74686572207175657374696f6e732e2042757420696620796f752061726520612063757272656e7420564d776172652053686f702c207468656e20796f752061726520646566696e6974656c7920696e746572657374656420696e20756e6465727374616e64696e6720686f7720266c6471756f3b564d43206f6e204157532077696c6c2066697420796f757220726571756972656d656e7426726471756f3b2e204920686f706520746f2068656c7020796f7520756e6465727374616e642074686520564d43206f6e204157532062657474657220746f2068656c7020796f7520616e6420796f757220656e7465727072697365206f7267616e697a6174696f6e20616e64206265636f6d652061206272696467652066726f6d20796f7572204f6e2d5072656d20746f2074686520636c6f75642e3c2f703e0d0a3c703e3c753e3c7374726f6e673e3c656d3e564d43206f6e20415753204f766572766965773c2f656d3e3c2f7374726f6e673e3c2f753e3c2f703e0d0a3c703e4920616d20717569746520737572652c20796f752068617665207374617274656420796f7572206c6561726e696e672061626f757420564d43204f6e204157532066726f6d2074686520696e7465726e65742c206275742066726f6d206d7920736964652061207665727920686967682d6c6576656c206578706c616e6174696f6e20697320617320666f6c6c6f77732e3c2f703e0d0a3c703e54686973206973206120636f6c6c61626f726174696f6e206265747765656e20564d7761726520616e64204157532c2077686572652074686520564d7761726520737461636b206f662076537068657265207643656e7465722c2069732070726f766964656420696e206120636c6f7564696669656420776179206d616e6167696e672045535869732072756e6e696e67206f6e204157532042617265204d6574616c20536572766572732c207573696e6720656974686572204c6f63616c20444153206f6e207468652073657276657273206f72207468652045425320746f20776f726b2077697468207653414e20616e64204e535820666f7220796f7572206e6574776f726b696e67206e656564732c2062757420616c6c206f66207468697320636f6e7461696e65642077697468696e2061205650432061726561206f66204157532e20546865206d61696e74656e616e6365206f662074686520266c6471756f3b6d616e6167656d656e7420737461636b26726471756f3b20697320646f6e6520627920564d7761726520616e642041575320616e642077652061726520696e20636f6e74726f6c206f66206f6e6c792074686520776f726b6c6f616420636c757374657220616e64206365727461696e20636f6d706f6e656e7473206f6620746865204e5358206465706c6f796d656e742e3c2f703e0d0a3c703e54686520456e7469726520736f6c7574696f6e20697320737562736372697074696f6e20626173656420616e64206173206d656e74696f6e656420564d7761726520697320726573706f6e7369626c6520746f206d616e61676520697420616e64206b6565702069742075706772616465642e205468697320616c736f20636f6d6573207769746820456c61737469632044525320616e64206f7468657220737570657220666561747572657320776869636820492077696c6c2074616c6b2061626f757420696e20746865206c617465722062697473206f662074686520626c6f672e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635353934312e706e672220616c743d22222077696474683d2236373722206865696768743d2234363322202f3e3c2f703e0d0a3c703e266e6273703b3c2f703e0d0a3c703e3c753e3c7374726f6e673e3c656d3e55534520434153455320666f7220564d43206f6e204157533c2f656d3e3c2f7374726f6e673e3c2f753e3c2f703e0d0a3c703e4865726520492077696c6c206c6973742074686520746f702075736520636173657320666f7220564d43206f6e2041575320746861742077652068617665206964656e7469666965642e3c2f703e0d0a3c756c3e0d0a3c6c693e55736520636173652023203120266e646173683b204469736173746572205265636f766572792061732061205365727669636520284452616153293c2f6c693e0d0a3c6c693e55736520636173652023203220266e646173683b204275727374696e6720696e746f20436c6f75643c2f6c693e0d0a3c6c693e55736520636173652023203320266e646173683b204461746163656e74657220457869743c2f6c693e0d0a3c6c693e55736520636173652023203420266e646173683b204170706c69636174696f6e20446576656c6f706d656e743c2f6c693e0d0a3c6c693e55736520636173652023203520266e646173683b2044617461204c6f63616c6974793c2f6c693e0d0a3c6c693e55736520636173652023203620266e646173683b204c6963656e73696e673c2f6c693e0d0a3c2f756c3e0d0a3c703e4c65742075732067657420696e746f20626974206f662064657461696c7320696e746f2065616368206f6620746865207573652063617365733c2f703e0d0a3c703e3c656d3e3c7374726f6e673e55736520636173652023203120266e646173683b204469736173746572205265636f766572792061732061205365727669636520284452616153293c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c703e54686973206973206f6e65206f6620746865206269676765737420726561736f6e7320564d43206f6e20415753206973207574696c697a656420666f722e20496620796f7520617265206120636f6d706c65746520564d776172652073686f70207468656e2069747320696d7065726174697665207468617420796f752077696c6c206861766520612044522053697465207769746820564d776172652061732077656c6c2c206a757374206c79696e6720696e20736f6d65206461746163656e74657220756e2d7574696c697a65642074696c6c20746865726520697320616e204452206578657263697365206f722061637475616c20445220726571756972656d656e7420616e64206f6e6365207468697320697320646f6e652069747320616761696e207265736f75726365207468617420697320756e2d7574696c697a656420616e64206265636f6d65732061206465616420696e766573746d656e7420776974686f757420616e79207574696c697a6174696f6e2c20616c6f6e67207769746820636f737420666f7220506879736963616c20736572766572732c206e6574776f726b2065717569706d656e742c207261636b2073706163652c20485641432c20656c6563747269636974792c206574632e3c2f703e0d0a3c703e564d43206f6e2041575320616c6c6f777320612033206e6f6465206f7220612031206e6f6465205344444320746f206265206b6570742c20776865726520746865204d6f737420637269746963616c20776f726b6c6f61647320617265207265706c69636174656420696e746f20616e6420616c736f207574696c697a657320456c6173746963204452532c2077686963682077696c6c206f6e2d64656d616e6420616464206d6f726520686f737473207768656e207468652044522068617070656e7320616e64207468656e207265636c61696d732074686520686f73747320706f737420726571756972656d656e7420616e642063686172676573206f6e6c7920666f72207468652061637475616c73207573656420616e6420666f72207468652074696d6520757365642e205768696368206d616b657320686176696e6720612044522053697465206d6f72652065636f6e6f6d6963616c3c2f703e0d0a3c703e416c736f2c2073696e6365206974206973206120564d77617265207643656e7465722c207574696c697a6174696f6e206f6620746865206f6e2d7072656d2053524d2077696c6c206265207665727920656173792e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635363036382e6a70672220616c743d2222202f3e3c2f703e0d0a3c703e3c656d3e3c7374726f6e673e55736520636173652023203220266e646173683b204275727374696e6720696e746f20436c6f75643c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c703e496e206d7920657870657269656e63652c20492068617665207365656e2074686174206d6f7374206f6620746865206d617475726520656e7465727072697365206f7267616e697a6174696f6e20686176652061206c6f74206f662070726f626c656d7320616368696576696e6720616e20616363757261746520436170616369747920706c616e6e696e672e205765206d657373207468617420757020616e6420776520646f206e6f7420686176652073756666696369656e74207265736f757263657320746f20686f757365206f757220776f726b6c6f61647320616e64207468656e20737461727420776f726b696e67206f6e207468652070726f637572656d656e742070726f6365737320616464696e672061206c6f74206f662064656c61797320616e6420756e6e656365737361727920657870656e646974757265732e3c2f703e0d0a3c703e416e6f7468657220736974756174696f6e207768657265206d65726765727320616e64206163717569736974696f6e73206172652068617070656e696e67206672657175656e746c792c20616e64206361706163697479207465616d2063616e6e6f7420657374696d617465207468652066757475726520726571756972656d656e74732e3c2f703e0d0a3c703e496e7374656164206f6620627579696e6720616e2065787472612073746f72616765206172726179206f72206d6f726520706879736963616c20736572766572732c2077652063616e20776f726b20776974682061637475616c7320627574206e6f7420627579207468617420657874726120266c6471756f3b6a7573742d696e2d636173652063617061636974792e26726471756f3b2057652063616e206c657665726167652074686520656c6173746963697479206f662074686520636c6f756420746f207370696e207570204553586920686f737473207768656e207765206e656564207468656d207065726d616e656e746c79266d646173683b6f72206a7573742074656d706f726172696c7920756e74696c207765206861766520707572636861736564207468617420686172647761726520666f72206f757220646174612063656e7465722e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635363132382e6a70672220616c743d22222077696474683d2237323522206865696768743d2235363822202f3e3c2f703e0d0a3c703e3c656d3e3c7374726f6e673e55736520636173652023203320266e646173683b204461746163656e74657220457869743c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c703e266e6273703b3c2f703e0d0a3c7020636c6173733d226d742d33223e596f75206d6179206e6f7420686176652061206c6172676520495420706879736963616c20666f6f747072696e7420616e6420617265206a75737420626f726564206f66206d616e6167696e672074686520747261646974696f6e616c206461746163656e74657220616e6420706c616e6e696e6720746f206d6f766520696e746f2061207075626c696320636c6f756420646f6d61696e20746f2067657420726964206f662074686f736520657870656e7365732e2042757420666f72207468617420796f752077696c6c206861766520746f20726564657369676e20616e642072652d61726368697465637420796f7572206170706c69636174696f6e2c207468696e6b2061626f757420746865206e6f6e2d6578706972696e67206c6963656e73657320696e20746865206e6561722066757475726520616c6f6e67207769746820746865206162696c69747920666f7220796f7572206c6567616379206461746120746f20626520636f6d70617469626c65207769746820746865206c617465737420636c6f756420746563682e3c2f703e0d0a3c7020636c6173733d226d742d33223e53617920616674657220616c6c2074686520616e616c79736973202c20796f752066696e6420415753206973206120676f6f642064657374696e6174696f6e2c2062757420796f75206172652072756e6e696e672073686f7274206f662074696d65206f6e20796f7572204461746163656e746572206c656173652c20564d43206f6e20415753206d6179206f6363757220617320612073746f702067617020736f6c7574696f6e20746f20627269646765207468652074696d6520726571756972656d656e7420666f7220746865206d616a6f72206368616e676520746861742077696c6c206f6363757220617320646973637573736564206561726c6965722e3c2f703e0d0a3c7020636c6173733d226d742d33223e536f2077652063616e206d6f766520696e746f2074686520564d43206f6e204157532c206578697420746865206461746163656e7465722c207768696c65207374696c6c206c657665726167696e6720746865204c6963656e7365732074686174207374696c6c2068617665207368656c66206c6966652c207573696e6720746869732074696d65206f6e2074686520564d4320746f2072652d64657369676e20616e642072652d61726368697465637420796f7572206170706c69636174696f6e732c20646563696465207768696368206f6620796f75722077656220736572766572732077696c6c2062652070617274206f6620746865206175746f2d7363616c696e672067726f757073206163726f737320617661696c6162696c697479207a6f6e657320696e204157532c206578706c6f7265204175726f726120666f7220796f757220444220726571756972656d656e7473206574632e20416c6c20746869732069732065617379207768656e20796f7520686176652061205650432070656572696e67206265747765656e20796f7572204e6174697665204157532056504320616e6420564d43204f6e20415753205650432e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c656d3e3c7374726f6e673e55736520636173652023203420266e646173683b204170706c69636174696f6e20446576656c6f706d656e743c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c7020636c6173733d226d742d33223e496e206d7920657870657269656e636520492068617665207365656e2074686520706879736963616c20736572766572207265736f757263657320616c6c6f636174656420666f7220746865205465737420616e642044657620726567696f6e73206a757374206c79696e6720746865726520776974686f757420616e79207375627374616e7469616c2075736520696e206265747765656e2070726f6a656374732e2057652063616e20706c616e20736d61727420616e642070757420746865205465737420616e642044657620726567696f6e7320696e2074686520564d43206f6e204157532077686963682063616e207363616c65206f757420617320726571756972656420616e64207363616c6520696e2075706f6e20636f6d706c6574696f6e206f662070726f6a65637473207265647563696e6720746865206f766572616c6c20636f7374206f662074686520696e6672617374727563747572652c20616e6420616c736f20647572696e672074686520646576656c6f706d656e742c20696620746865206170706c69636174696f6e207465616d73206861766520746f2075736520616e7920415753207365727669636573206c696b6520526f7574652035332c204e4c42732c2044617461626173652073657276696365732c207468697320697320656173696c792061636869657665642e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635363139392e6a70672220616c743d22222077696474683d2237373222206865696768743d2234373822202f3e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c656d3e3c7374726f6e673e55736520636173652023203520266e646173683b2044617461204c6f63616c6974793c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c7020636c6173733d226d742d33223e49662074686520646576656c6f706d656e74207465616d73206861766520616c7265616479206265656e207573696e67206365727461696e204157532053657276696365732066696e64696e67207468656d2061732076616c756520616464732c207370656369616c6c79207365727669636573206c696b652044422c20524453206f7220616e79206f746865722073657276696365732c20746f20776869636820746865206f6e2d7072656d206170706c69636174696f6e73206172652073656e73697469766520746f77617264732062656361757365206f6620746865206e6574776f726b206c6174656e6379206265747765656e20746865206f6e2d7072656d20616e64204157532c2062757420686176652074686520726571756972656d656e7473206f6620636f6e74696e75696e67206f6e2074686520564d7761726520706c6174666f726d2e2057652063616e206c6576657261676520564d43206f6e2041575320746f206b65657020746865206170706c69636174696f6e206f6e20636c6f73652070726f78696d69747920746f20746865204157532073657276696365732e3c2f703e0d0a3c7020636c6173733d226d742d33223e564d43204f6e204157532063616e2062652063686f73656e20746f206265206f6e207468652073616d6520617661696c6162696c697479207a6f6e6520617320796f7572204e617469766520415753207a6f6e6520616e6420746861742063616e2064726173746963616c6c792072656475636520746865205475726e2061726f756e642074696d65206f6e20746865206e6574776f726b696e67207573696e672074686520415753206e6574776f726b696e67206261636b626f6e65202c20636f6d706172656420746f20746865206f6e2d7072656d2057414e20636f6e6e656374696f6e207769746820686967686572206c6174656e63792e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635363234322e6a70672220616c743d2222202f3e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c656d3e3c7374726f6e673e55736520436173652023203620266e646173683b204c6963656e73696e673c2f7374726f6e673e3c2f656d3e3c2f703e0d0a3c7020636c6173733d226d742d33223e266e6273703b3c2f703e0d0a3c7020636c6173733d226d742d33223e417320446973637573736564206561726c69657220696e2074686520626c6f672c20696620796f752061726520696e2074686520626567696e6e696e67206f66206f7220696e206d6964646c65206f6620796f7572206c6963656e7365206c696665206379636c652c207468656e206974206d6179206265636f6d6520612073686f7773746f70706572206f722070726f686962697420796f7572206d6f76656d656e7420696e746f20616e79206f74686572207075626c696320636c6f75642e204275742073696e636520564d43206f6e2041575320686173207468652073616d652045535869206173206f6e2d7072656d20616c6f6e672077697468206f7065726174696f6e616c20636f6e73697374656e63792c20746865206c6963656e7365732063616e20626520656173696c7920706f72746564206265747765656e20746865207468656d2e3c2f703e0d0a3c7020636c6173733d226d742d33223e416c736f20696620616e79206c6963656e7365206973206120486f7374206261736564206c6963656e73652c207468656e206d6f76696e6720696e746f20616e79207075626c696320636c6f75642077696c6c20696e74726f64756365207368617265642074656e616e63792062656361757365206f6620776869636820796f752077696c6c206e6f742062652061626c6520746f206c6963656e73652074686520656e7469726520686f73742f732c20616e64206d6179206e65656420746f207075726368617365206c6963656e73657320616761696e2c2077686963682063616e2062652061766f69646564207573696e6720564d43204f6e204157532e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635363237372e6a70672220616c743d22222077696474683d2234343122206865696768743d2234333022202f3e3c2f703e0d0a3c7020636c6173733d226d742d33223e3c753e3c7374726f6e673e3c656d3e496e206f6e652073656e74656e636520266e646173683b20266c6471756f3b4974732042657374206f6620626f746820776f726c64732e26726471756f3b3c2f656d3e3c2f7374726f6e673e3c2f753e3c2f703e, 'active', 'blog', NULL, 'VMC on AWS – Use Cases', 'VMC on AWS – Use Cases', 'undefined', NULL, '2023-03-12 09:35:38', '2023-03-17 18:48:38'),
(24, NULL, 'VMware vRNI Architecture Explained', 'vmware-vrni-architecture-explained', 'uploads/2023/03/de18ee6287e1a78ee3325ffa7fe1652d.png', 'uploads/2023/03/f75555ccd9851818aaa0107327c3f7f1.png', NULL, 'Bharath Babbur', '2021-10-11', 'VMware vRealize Network Insight popularly knows a vRNI (a.k.a varni) is a very powerful tool…', 0x3c703e564d7761726520765265616c697a65204e6574776f726b20496e736967687420706f70756c61726c79206b6e6f777320612076524e492028612e6b2e61207661726e69292069732061207665727920706f77657266756c20746f6f6c20746861742070726f766964657320696e74656c6c6967656e7420736572766963657320666f7220736f6674776172652d646566696e6564206e6574776f726b696e6720656e7669726f6e6d656e74732028657370656369616c6c79204e5358292e2049742070726f7669646573206d616e6167656d656e7420666f72207669727475616c697a6564206e6574776f726b7320286f6e6c7920666f722053444e206e6574776f726b73292e204261736564206f6e2076697375616c697a6174696f6e20616e6420616e616c79736973206361706162696c6974696573206f6620706879736963616c20616e64207669727475616c206e6574776f726b732070726f766964656420627920564d776172652076524e492c20564d776172652076524e492063616e206f7074696d697a6520746865206e6574776f726b20706572666f726d616e636520746f20616368696576652074686520626573742073657276696365206465706c6f796d656e74206566666563742e3c2f703e0d0a3c703e5468652076524e49206861732032206d61696e20636f6d706f6e656e74732074686174206d616b6520757020746865206465706c6f796d656e743a3c2f703e0d0a3c6f6c3e0d0a3c6c693e54686520506c6174666f726d204170706c69616e63653c2f6c693e0d0a3c6c693e5468652050726f7879205c20436f6c6c6563746f7220564d3c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e3c753e54686520506c6174666f726d20564d3a3c2f753e3c2f68333e0d0a3c703e54686520506c6174666f726d20564d206861732033206d61696e20706172747320776869636820776f726b20696e2074616e64656d20746f20706572666f726d20616e616c79746963732c2070726f766964657320736561726368206162696c697469657320616e64207468652055492e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37312e6a7067222077696474683d22353030707822202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e266e6273703b3c2f703e0d0a3c683320636c6173733d226d742d34223e55492c2052455354204150492c2073656172636820656e67696e653c2f68333e0d0a3c756c3e0d0a3c6c693e5549206f6e20746f70206f66205245535420415049202870726976617465293c2f6c693e0d0a3c6c693e53656172636820656e67696e6520266e646173683b53444443206d6f64656c732061776172656e65737320266e646173683b436f6d62696e657320636f6e66696775726174696f6e2c20666c6f77732c20706572666f726d616e636520646174613c2f6c693e0d0a3c6c693e466c6f7720616e616c797469637320636f6d706f6e656e747320286869676820706572666f726d616e63652920266e646173683b41636365737320666c6f7773206174206c61726765207363616c6520266e646173683b416e616c797a6520666c6f77732c2072756c65732c206d6963726f2d7365676d656e746174696f6e206772617068733c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d34223e53746f7261676520616e642073656172636820656e67696e653c2f68333e0d0a3c756c3e0d0a3c6c693e53746f72657320636f6e66696775726174696f6e732c206368616e6765732c20706572666f726d616e63652073746174733c2f6c693e0d0a3c6c693e496e646578657320636f6e66696775726174696f6e732c206576656e74733c2f6c693e0d0a3c6c693e537570706f727473206461746120726574656e74696f6e20706f6c6963793c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d34223e416e616c797469637320677269643c2f68333e0d0a3c756c3e0d0a3c6c693e53746f726520646174612066726f6d2070726f787920564d733c2f6c693e0d0a3c6c693e50726f63657373657320696e207265616c2074696d652c2062617463683c2f6c693e0d0a3c6c693e56584c414e73206772617068732c2070617468732c204d5455206576656e74733c2f6c693e0d0a3c2f756c3e0d0a3c68333e3c753e5468652050726f7879205c20436f6c6c6563746f7220564d3a3c2f753e3c2f68333e0d0a3c703e3c753e5468652050726f787920564d206d756c7469706c6520636f6d706f6e656e7473206c696b65204f66666c696e65204d6573736167652053746f72652c20466c6f772070726f636573736f722c2070726f787920736572766963652c20706f7374677265732044423c2f753e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c753e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37322e6a706722206865696768743d22353030707822202f3e3c2f753e3c2f703e0d0a3c68333e3c753e50726f78793c2f753e3c2f68333e0d0a3c703e436f6c6c6563747320646174612066726f6d206461746120736f7572636573207573696e6720617070726f7072696174652070726f746f636f6c2873292e20526563656976657320495046495820284e6574466c6f772920646174612066726f6d20455358206f6e20706f7274205544503a32303535205365637572656c79207061697273207769746820706c6174666f726d206265666f72652075706c6f6164696e672064617461206f722067657474696e6720696e737472756374696f6e732052656475636573202f20626174636865732064617461207369676e69666963616e746c79206265666f72652075706c6f61643c2f703e0d0a3c68333e3c753e4f66666c696e65206d6573736167652073746f72653c2f753e3c2f68333e0d0a3c703e50726f78792063616e2073746f726520757020746f20332064617973206f66206461746120616674657220646973636f6e6e656374696e672066726f6d20706c6174666f726d205265737472696374656420746f2031354742206f66206469736b20737061636520476f6f6420666f722066657720686f75727320746f2064617973206f66206461746120646570656e64696e67206f6e2073697a65206f6620656e7669726f6e6d656e743c2f703e0d0a3c68333e3c753e466c6f772070726f636573736f7220286869676820706572666f726d616e6365293c2f753e3c2f68333e0d0a3c703e50726f6365737365732072617720666c6f77207265636f7264732066696c657320286e6663617064292c2067656e65726174657320352d7475706c65732c20342d7475706c65732c20616e64206167677265676174652073746174697374696373204170706c7920616c676f726974686d732c206865757269737469637320746f20737469746368207265636f7264732c206465647570732c2061766f6964206e65676174697665207363656e6172696f732028706f7274207363616e2c202668656c6c69703b293c2f703e0d0a3c68333e3c753e436f6c6c6563746f722070726f636573733c2f753e3c2f68333e0d0a3c703e4f6e6c792077617920746f2075706c6f616420646174612c207265636569766520696e737472756374696f6e732066726f6d20706c6174666f726d20506c6174666f726d206e6f7420617661696c61626c65207468656e2053746f726520696e206f66666c696e65206d6573736167652073746f72652048617320737065636966696320616461707465727320666f72206461746120736f75726365732c206765742064617461206d657373616765732066726f6d207468656d20526563656976657320646174612066726f6d20466c6f772050726f636573736f72204164617074657273206d61792075736520506f73746772657320746f206b65657020736f6d652073746174653c2f703e0d0a3c683320636c6173733d226d792d34223e496e20746869732073656374696f6e204c657420757320466f637573206f6e207468652076524e4920776f726b696e672077697468204e53582d5420746f20616964206e6574776f726b206d6f6e69746f72696e6720666f72207468697320626c6f672e3c2f68333e0d0a3c703e4669727374206f6620616c6c2c2077686174206973206120466c6f773f3c2f703e0d0a3c703e496e2073696d706c65207465726d732c2061206e6574776f726b20666c6f77206973206120736572696573206f6620636f6d6d756e69636174696f6e73206265747765656e2074776f20656e64706f696e74732e204265796f6e64207468657365206368617261637465726973746963732c20686f77657665722c2074686520646566696e6974696f6e206f66206120666c6f77206d6179206e6f7420626520746f74616c6c7920636c65617220666f722065766572796f6e652e205768656e207574696c697a656420696e2074686520636f6e74657874206f66204e6574466c6f77206f72204950464958207265636f7264732c206d6f73742070656f706c652063616e2061677265652074686174207765207479706963616c6c7920646566696e65206120666c6f772062792069747320352d7475706c6520617474726962757465732028736f7572636520616e642064657374696e6174696f6e2049502c20736f7572636520616e642064657374696e6174696f6e20706f727420616e64207468652070726f746f636f6c206669656c64292e2042757420697420697320616c736f20636f6d6d6f6e20746f2075736520656974686572206120342d7475706c652c2064726f7070696e67207468652070726f746f636f6c206669656c642c206f72206576656e206120322d7475706c652c207573696e67206f6e6c7920746865204950206164647265737365732e20546865206c6174746572206861732074686520616476616e74616765207468617420697420646f657320776f726b20666f7220495020667261676d656e74732061732077656c6c2e3c2f703e0d0a3c703e53696d706c792c207061636b657473206d616b6520612073657373696f6e20616e642073657373696f6e73206d616b65206120666c6f773c2f703e0d0a3c68333e4c657420757320666972737420756e6465727374616e6420686f772074686520466c6f777320746f2067656e657261746520666c6f77732066726f6d2076445320616e64204e56445320616e6420686f7720697420697320636f6c6c65637465642062792076524e4920466f72207644533a3c2f68333e0d0a3c703e46697273742c207765206e65656420746f20656e61626c6520746865204e6574666c6f77206f6e207468652076445320746f2073656e6420697420746f2076524e492070726f7879205c20436f6c6c6563746f7220564d3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37332e6a7067222077696474683d2232373022206865696768743d2231393222202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37342e6a7067222077696474683d2233323622206865696768743d2231393322202f3e3c2f703e0d0a3c683320636c6173733d226d742d34223e466f72204e5644533a3c2f68333e0d0a3c703e54686520737465707320617320666f72204e76445320697320746f20656e61626c65204446572049504649582066726f6d2076524e492c206265636175736520537769746368204950464958206973206e6f7420737570706f727465643c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37352e6a706722202f3e3c2f703e0d0a3c68333e4e6f77206c6574732073656520686f772076524e492070726f63657373657320466c6f77732066726f6d20626f74682076445320616e64204e5644533c2f68333e0d0a3c7461626c65207374796c653d22626f726465722d636f6c6c617073653a20636f6c6c617073653b2077696474683a20313030253b20626f726465722d636f6c6f723a20233030303030303b20626f726465722d7374796c653a20736f6c69643b2220626f726465723d2231222063656c6c70616464696e673d223135223e0d0a3c74626f64793e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e3c7374726f6e673e7644533c2f7374726f6e673e3c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e3c7374726f6e673e4e5644533c2f7374726f6e673e3c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e47656e65726174657320612035205475706c6520466c6f773c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e47656e6572617465732035205475706c6520466c6f773c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e76524e492044726f70732074686520536f7572636520706f72742062697420616e6420636f6e76657274732074686520666c6f7720696e746f2034205475706c653c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e5468657265206973206e6f206269742061727261792064726f702074686174206f6363757273206f7220666c6f772063756d756c6174696f6e3c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e76524e49207468656e2063756d756c6174657320616c6c2074686520666c6f777320636170747572656420776974682073696d696c6172206269742061727261797320696e746f206f6e6520666c6f7720736f206566666563746976656c79206966203220564d73206172652074616c6b696e6720746f2065616368206f74686572207468652077686f6c65206461792c20697473206a757374206f6e6520666c6f773c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e556e6c696b6520696e20764453207468657265206973206f6e6c79206f6e6520666c6f772067656e65726174656420617420736f7572636520666f72206561636820636f6d6d756e69636174696f6e2e204e56445320646f6573206e6f74206361707475726520646966666572656e742054435020466c61677320617320646966666572656e7420466c6f77733c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e5468652076524e4920757365732074686520266c6471756f3b53594e26726471756f3b20616e6420266c6471756f3b41434b26726471756f3b20666c6167206461746120746f206964656e74696679207768696368206973207468652073657276657220616e6420636c69656e7420696e207468617420636f6d6d756e69636174696f6e2c20736f2077652077696c6c20736565206d756c7469706c6520666c6f777320696e20612073696e676c65207061636b657420636170747572653c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e5468657265206973206120756e69717565206964656e74696669657220776869636820737065636966696564207468652073657276657220616e6420636c69656e7420666f722074686520636f6d6d756e69636174696f6e2c20736f2076524e49206973206e6f7420646570656e64656e74206f6e2054435020466c61677320666f72207468617420696e666f726d6174696f6e2c20736f20466c6f77732067656e65726174656420617265206c65737320617420736f757263653c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e537570706f7274204e6574666c6f772076392043464c4f57207265636f726473206261736564206f6e20436973636f207374616e6461726420646566696e656420756e646572203a2068747470733a2f2f7777772e696574662e6f72672f7266632f726663333935342e7478743c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e537570706f727420616e64207072696d6172696c7920776f726b732077697468204e6574666c6f77207631302049504649582c20616e64207374616e646172647320646566696e656420756e646572203a2068747470733a2f2f7777772e69616e612e6f72672f61737369676e6d656e74732f69706669782f69706669782e7868746d6c3c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37362e6a706722202f3e3c2f74643e0d0a3c7464207374796c653d2277696474683a2034372e373436253b223e3c696d67207374796c653d22666c6f61743a206c6566743b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37372e6a706722202f3e3c2f74643e0d0a3c2f74723e0d0a3c2f74626f64793e0d0a3c2f7461626c653e0d0a3c683320636c6173733d226d742d34223e446966666572656e742041726368697465637475726520746861742076524e492063616e206265206465706c6f79656420696e3a3c2f68333e0d0a3c703e46415173206f6e206461746120726574656e74696f6e20696e2076524e493a3c2f703e0d0a3c703e526566206c696e6b3a2068747470733a2f2f646f63732e766d776172652e636f6d2f656e2f564d776172652d765265616c697a652d4e6574776f726b2d496e73696768742f352e332f636f6d2e76726e692e6661712e646f632f475549442d42454531443743342d303532432d343644332d384531312d3441313530333043354538452e68746d6c3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d37382e6a706722202f3e3c2f703e0d0a3c703e4b6579207468696e67732061626f757420706c6174666f726d20564d20746f206b65657020696e204d696e64207768696c652064657369676e696e6720612076524e493a3c2f703e0d0a3c6f6c3e0d0a3c6c693e54686520506c6174666f726d204e6f64657320617265206e6f74206120484120436c75737465722c20692e6520746865205072696d617279206e6f646520697320746865204b65792c20696620746865207072696d617279204e6f646520676f657320646f776e2c207468652076524e49206973206e6f206c6f6e67657220617661696c61626c652074696c6c20697420697320726573746f7265642e3c2f6c693e0d0a3c6c693e546865205072696d617279204e6f6465206d616e6167657320746865204c6f616420616e642064697374726962757465732074686520776f726b20746f206f7468657220506c6174666f726d206e6f64657320696e2074686520636c75737465723c2f6c693e0d0a3c6c693e76524e4920706c6174666f726d20564d26727371756f3b732073697474696e67204c6f61642042616c616e636572206973206e6f74206120737570706f727465642064657369676e20756e666f7274756e6174656c792e3c2f6c693e0d0a3c2f6f6c3e0d0a3c683320636c6173733d226d742d34223e46415173206f6e206461746120726574656e74696f6e20696e2076524e493a3c2f68333e0d0a3c703e3c7374726f6e673e526566206c696e6b3a3c2f7374726f6e673e266e6273703b68747470733a2f2f646f63732e766d776172652e636f6d2f656e2f564d776172652d765265616c697a652d4e6574776f726b2d496e73696768742f352e332f636f6d2e76726e692e6661712e646f632f475549442d42454531443743342d303532432d343644332d384531312d3441313530333043354538452e68746d6c3c2f703e0d0a3c6f6c3e0d0a3c6c6920636c6173733d226d742d33223e57686174206973207468652064656661756c7420726574656e74696f6e20706572696f643f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20333020646179732e2049742063616e20626520696e637265617365642066726f6d205549207769746820456e7465727072697365204c6963656e73652e204e6f74653a205768656e20696e6372656173696e67206d616b65207375726520746f20666f6c6c6f77206469736b2067756964656c696e65732e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e486f7720646174612069732068616e646c6564206f6e2050726f78793f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20416c6c2064617461206f6e2070726f787920697320636f6e76657274656420746f2053444d202853656c662044657363726962696e67204d65737361676529206265666f72652073656e64696e6720697420746f20706c6174666f726d20696e636c7564696e6720666c6f7720646174612e20497420696e636c7564657320616c6c20636f6e6669672c20696e76656e746f727920616e64206d657472696320646174612066726f6d20616e79206461746120736f757263652e20496620706c6174666f726d206973206e6f7420726561636861626c65206f722053444d2075706c6f616420746f204b61666b61207175657565206661696c73207468656e207468657920617265207772697474656e206f6e206469736b206f6e2070726f787920766d2028756e646572202f7661722f424c4f425f53544f5245292e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e5768656e2077696c6c206461746120737461727420746f207075726765206f6e2050726f78793f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20466f72206e6f6e2d666c6f7720646174613a205468657265206973203130474220737061636520616c6c6f636174656420746f2073746f72652053444d73206f6e206469736b2028424c4f425f53544f5245292e205768656e20746869732073746f72652066696c6c732c20636f6c6c6563746f72207374617274732064656c6574696e67206f6c6465722053444d7320616e642061646473206e65772053444d7320746f20746865206469736b2e20497420646570656e6473206f6e207468652073697a65206f6620646174612067617468657265642066726f6d20616c6c206461746120736f757263657320686f7720717569636b6c792074686973206c696d69742069732062726561636865642e3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e466f7220666c6f7720646174613a20546865726520697320313520474220737061636520616c6c6f636174656420746f2073746f72652072617720666c6f77732028756e646572202f7661722f666c6f77732f7664732f6e6663617064292e20417320736f6f6e206173207468697320737061636520697320636f6e73756d656420666c6f772070726f636573736f72207374617274732064656c6574696e67206f6c64657220666c6f772066696c65732e20417420696e636f6d696e672072617720666c6f77732072617465206f66207e324d2f6d696e20697420776f756c642074616b65207e31306872732074696c6c20726f746174696f6e20737461727420746f206f636375722e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e5768617420697320746865207075726765206c6f6769633f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e204f6c646573742053444d73206765742064656c657465642066697273742e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e5768656e2077696c6c206e657720646174612073746f70206265696e672070726f63657373656420696e2050726f78793f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e204e657665722c206173206c6f6e67206173207365727669636573206172652072756e6e696e672070726f7065726c792e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e417373756d696e6720646973636f6e6e656374206265747765656e20506c6174666f726d20616e642050726f787920616e64204e6f20707572676520636f6e646974696f6e206d65742c20776f756c6420616c6c2064617461206265207265636f6e63696c6564206f6e20506c6174666f726d206f6e2072652d636f6e6e6563743f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20416c6c20646174612073746f726564206f6e206469736b2077696c6c2062652073656e7420746f20706c6174666f726d2e2049742073686f756c64206265207265636f6e63696c656420636f6d706c6574656c79206578636570742069662064617461206c6f737320636f6e646974696f6e73206578697374206f6e20706c6174666f726d20286d6f726520696e666f2062656c6f77292e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e57686174206172652074686520636f6e646974696f6e73207768656e2064617461206c6f73732063616e206f63637572206f6e20506c6174666f726d3f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20506c6174666f726d2073746172747320746f2064726f702053444d73207468617420617265206f6e204b61666b6120717565756520666f72206d6f7265207468616e203668727320283138687273206966206974206973206120332d6e6f646520636c7573746572292e20416e6f7468657220706f73736962696c69747920697320696620746865207175657565206973207361747572617465642e2049742063616e2068617070656e207768656e207468657265206973204c6167206275696c7420757020696e2073797374656d20616e6420696e636f6d696e672064617461207261746520697320686967682e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e57696c6c206c61746573742053444d206265207075626c6973686564206669727374206f72206561726c69657374206f6e6520696e2074686174206f726465723f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e204f6c646573742053444d73206172652073656e742066697273742e205468657265206973206f6e65206b6e6f776e20697373756520756e74696c2076332e392077686963682077696c6c20726573756c7420696e20736f6d652064617461206c6f73732e20436f6e746163742047535320666f72206d6f726520696e666f726d6174696f6e2e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e497320646174612073746f726564206f6e206469736b20696e2050726f787920616e64207468656e2070757368656420746f20506c6174666f726d207768656e207468657265206973206e6f20636f6d6d756e69636174696f6e2070726f626c656d3f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e204966207468657265206973206e6f20636f6d6d756e69636174696f6e2069737375652c207468656e2053444d7320617265206e6f742073746f726564206f6e206469736b2e2049742069732073656e7420746f20706c6174666f726d2066726f6d206d656d6f727920697473656c662e205768656e657665722070726f787920726563656976657320746861742074686572652077617320612070726f626c656d20696e2073656e64696e672053444d207468656e206f6e6c792069742069732073746f726564206f6e206469736b2e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e496e206576656e74206f6620616e7920697373756520686f772070726f7879206c6561726e20776869636820776173206c6173742070726f63657373656420666c6f772066696c653f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e20466c6f772d70726f636573736f72206d61696e7461696e7320626f6f6b6d61726b20696e204442206f6e20776869636820776173206c6173742070726f636573736564206e66636170642066696c652e3c2f6c693e0d0a3c6c6920636c6173733d226d742d33223e5768617420697320746865206d61782073697a65206f662053444d20746861742063616e2062652070726f63657373656420776974686f757420616e792069737375653f20486f772063616e2075736572206c6561726e2061626f75742074686973206272656163683f3c627220636c6173733d22642d6e6f6e6520642d6d642d626c6f636b22202f3e412e2054686572652069732031354d42206c696d6974206f6e2053444d2073697a652e205374617274696e672076332e3920616e206576656e7420697320726169736564207768656e6576657220706c6174666f726d2064726f7073206c617267652053444d2e3c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e486f7720746f204261636b2d7570207468652076524e4920696e20796f757220656e74657270726973652064657369676e3a3c2f68333e0d0a3c703e53696d706c6520416e7377657220697320266c6471756f3b416e7920564d2062617365642026616d703b20564d77617265207265616479206261636b757020736f6c7574696f6e2063616e206265207573656426726471756f3b20526566206c696e6b3a2068747470733a2f2f6b622e766d776172652e636f6d2f732f61727469636c652f35353832393c2f703e, 'active', 'blog', NULL, 'VMware vRNI Architecture Explained', NULL, 'undefined', NULL, '2023-03-12 16:34:33', '2023-03-17 18:47:47');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(25, NULL, 'Wi-Fi 6: Giving AC the AX(e)', 'wi-fi-6-giving-ac-the-ax-e-', 'uploads/2023/03/cad9ef5e65b80c352e3a1a1561501538.png', 'uploads/2023/03/ce04c219dd697090c8db8a576ed84693.png', NULL, 'Brandon Webb', '2020-09-08', 'Wi-Fi 6, also known as 802.11ax, is the newest Wi-Fi standard developed by the IEEE.…', 0x3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f776966692d7369782e6a706722202f3e3c2f703e0d0a3c703e57692d466920362c20616c736f206b6e6f776e206173203830322e313161782c20697320746865206e65776573742057692d4669207374616e6461726420646576656c6f7065642062792074686520494545452e2041582077617320646576656c6f706564207769746820686967682064656e73697479206465706c6f796d656e747320696e206d696e642c20737563682061733a3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f41582d7069632d7369782e706e6722202f3e3c2f703e0d0a3c703e54686973206e6578742067656e65726174696f6e206f6620776972656c65737320646f65736e26727371756f3b74206a7573742061646472657373207061696e20706f696e7473206173736f6369617465642077697468207665727920686967682d64656e7369747920285648442920656e7669726f6e6d656e74732e20496d70726f76656d656e7420696e207468726f75676870757420616e642072656c696162696c697479206d65616e73207468617420657665727920757365206361736520616e64206170706c69636174696f6e2063616e207365652061646465642062656e6566697473206279206d616b696e6720746865207377697463683a3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f41582d7069632d7369782d74776f2e6a706722202f3e3c2f703e0d0a3c703e3830322e3131617820646f6573206d6f7265207468616e2073696d706c79206275696c642075706f6e2074686520746563686e6f6c6f6769657320616e64207374616e6461726473206f6620697473207072656465636573736f72732e20496e73746561642c20415820726570726573656e7473206120706172616469676d20736869667420616e642072657468696e6b7320686f7720574c414e26727371756f3b732073686f756c642062656861766520616e642077686174206665617475726573206e65656420746f206265207072696f726974697a65642e2050726576696f7573206e6574776f726b732077657265206275696c74206f6e20696e63726561736564207468656f7265746963616c207065616b2073706565642e20574c414e26727371756f3b73206f662074686520667574757265206e65656420746f206265206275696c7420666f7220636170616369747920616e6420656666696369656e63792e3c2f703e0d0a3c703e57692d46692036206163636f6d706c697368657320746865736520656e68616e63656d656e747320627920636f6d62696e696e67206d756c7469706c6520746563686e6f6c6f6769657320746f20616368696576652062657474657220726573756c74733a3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f4261636b77617264732d436f6d7061746962696c6974792d7369782e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e497420636f6d62696e6573203567687a20616e6420322e3467687a20746563686e6f6c6f676965732e205468697320616c6c6f7773206261636b7761726420636f6d7061746962696c697479207769746820626f7468203830322e3131616320616e64203830322e31316e2e20496e206164646974696f6e2c204158206272696e67732074686520696d70726f76656d656e747320746f2074686520322e342047687a20737061636520666f72207468652066697273742074696d6520696e20796561727320286d617962652074686520322e342062616e642069736e26727371756f3b742064656164292e204e6f74206f6e6c792077696c6c207468652063757272656e7420737065637472756d732062656e656669742c206275742066757475726520697465726174696f6e732077696c6c20737570706f727420362047687a2061732077656c6c2e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f486967682d456666696369656e63792d7369782e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e54686520696e64757374727920686173207265636f676e697a65642074686174207768696c6520696e63726561736564207468726f756768707574206d6179206372656174652062757a7a20697426727371756f3b73206869676820656666696369656e637920746861742077696c6c2072756c6520746865206461792e204158206d616b657320757365206f662061206e657720746563686e6f6c6f67792063616c6c6564204f7274686f676f6e616c204672657175656e6379204469766973696f6e204d756c7469706c65204163636573732c20776869636820616c6c6f777320666f72207375626368616e6e656c207574696c697a6174696f6e2c20616e6420736f6c76657320612070726f626c656d207468617420706c6167756564203830322e3131616326727371756f3b7320757365206f66204d552d4d494d4f2e205468697320616c6c6f7773206d756c7469706c6520636c69656e74732c20757020746f203734207065722061636365737320706f696e742c20746f20636f6e6e656374206174207468652073616d652074696d652e2054686973206973206163636f6d706c697368656420627920627265616b696e6720646f776e207468652057692d4669206368616e6e656c20696e746f20696e646976696475616c20756e6974732063757474696e6720646f776e206f6e20636f6e67657374696f6e20616e6420696d70726f76696e67206368616e6e656c20706572666f726d616e63652e204e6f74206f6e6c7920746861742c2062757420636c69656e74732077696c6c206e6f772062652061626c6520746f207472616e736d6974206f6e2061206d6f72652064657465726d696e697374696320626173697320726174686572207468616e20636f6e7374616e746c7920636f6d706574696e6720666f722070726563696f7573206169722d74696d652e20416c6c20646576696365732077696c6c20706c6179206e69636520616e6420646174612077696c6c20666c6f7720776974682066657765722072657472616e736d697373696f6e7320616e64206c65737320636f73746c7920636f6e74726f6c20616e64206d616e6167656d656e74206f766572686561642e2049742077696c6c206a75737420776f726b2e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f496e637265617365642d5468726f7567687075742d7369782e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e5768696c6520656666696369656e63792077617320746865207072696d617279206d6f7469766174696f6e20626568696e6420746865206e6577207374616e646172642c2074686f7365206c6f6f6b696e6720666f7220696e637265617365642073706565642077696c6c206e6f74206265206469736170706f696e7465642e2054686520757365206f6620313032342051414d206d6f64756c6174696f6e20616c6f6e652063616e20696e63726561736520746865207468726f75676870757420757020746f20343025207573696e6720612073696e676c652073747265616d2e20436f6d62696e6520746861742077697468206f7468657220696d70726f76656d656e747320616e6420757020746f2038207370617469616c2073747265616d7320696e206869676820656e642061636365737320706f696e74732c20697426727371756f3b73206e6f20737572707269736520746861742041582063616e20737570706f7274206120746f74616c206361706163697479206f6620313420476270732028756e6465722074686520726967687420636f6e646974696f6e7320616e6420656e6420636c69656e7473206f6620636f75727365292e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f426174746572792d4c6966652d7369782e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e4576656e20796f757220646576696365732062617474657279206c6966652077696c6c2073656520696d70726f76656d656e7473207769746820746865206e6577207374616e646172642c2061732054617267657420576169742054696d652028545754292077696c6c20616c6c6f7720636c69656e747320746f20266c6471756f3b736c65657026726471756f3b20616e6420636f6e736572766520656e6572677920666f72206d756368206c6f6e67657220706572696f6473206f662074696d652028757020746f207365766572616c20686f757273292e205468697320697320657370656369616c6c792076616c7561626c6520746f20496f5420646576696365732074686174206f6e6c79206e65656420746f2073656e6420646174612061742073657420696e74657276616c732e20506c75732c20746865204158207374616e6461726420696e74726f647563657320612032304d487a2d6f6e6c7920636c69656e74206f7074696f6e2c2077686963682077696c6c20616c6c6f7720636869706d616b65727320746f2070726f64756365206d6f726520636f73742065666665637469766520496f5420756e6974732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f41582d7069632d7369782d74687265652e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e54686973206973206e6f7420616e2065786861757374697665206c69737420627920616e79206d65616e7320616e64206b65657020696e206d696e64207468617420696e206f7264657220746f206163686965766520616c6c207468652062656e65666974732c20697426727371756f3b73206e656365737361727920746f207570677261646520746f20636c69656e742064657669636573207468617420737570706f727420746865206e6577207374616e646172642e2043757272656e746c79206d616a6f72206368697073657420616e6420646576696365206d616e75666163747572657273206861766520616c72656164792072656c656173656420415820726164696f7320746861742061726520776f726b696e672074686569722077617920696e746f20736d61727470686f6e65732c207461626c6574732c20616e64206c6170746f70732e20426f74682053616d73756e6720616e64204170706c652072656c65617365642070726f647563747320696e20323031392074686174206d65657420746865206e6577207374616e646172642c207768696c6520696e64757374727920616e616c79737473206172652070726564696374696e67206f76657220612062696c6c696f6e206e65772063686970736574732077696c6c206265207368697070656420616e6e75616c6c7920627920323032322e20427574206173207468657365206e6577206465766963657320717569636b6c79206d616b652074686569722077617920696e746f20746865206d61726b65742c20697420697320696d706f7274616e742074686174206e6574776f726b732061726520657175697070656420746f20737570706f72742074686973206e657720776176652e20496620796f7526727371756f3b726520696e746572657374656420696e2070726f766964696e6720796f757220627573696e65737320776974682074686520726573696c69656e637920616e6420706572666f726d616e636520796f7572206e6574776f726b206e656564732c207468656e20776520617420496e7475697469766520776f756c64206c6f766520746f20737065616b207769746820796f752061626f757420686f772077652063616e206769766520796f7572206f6c6420574c414e2074686520266c6471756f3b415828652926726471756f3b3c2f703e, 'active', 'blog', NULL, 'Wi-Fi 6: Giving AC the AX(e)', NULL, 'undefined', NULL, '2023-03-12 17:42:04', '2023-03-17 18:47:06'),
(26, NULL, 'Implementing Database-as-a-Service with vRealize Automation', 'implementing-database-as-a-service-with-vrealize-automation', 'uploads/2023/03/fa3f2d7cebf5ab1abeeb462b7602b041.png', 'uploads/2023/03/81320cb50e8ac3a3bf58ae4feebc3aff.png', NULL, 'Vishwajit Shah', '2021-01-08', 'Overview This blog demonstrates an automated service model of delivering Database as a Service. VMware…', 0x3c68333e4f766572766965773c2f68333e0d0a3c703e5468697320626c6f672064656d6f6e7374726174657320616e206175746f6d617465642073657276696365206d6f64656c206f662064656c69766572696e67204461746162617365206173206120536572766963652e20564d7761726520765265616c697a65204175746f6d6174696f6e20697320616e20456e7465727072697365205072697661746520436c6f756420536f6c7574696f6e20746861742064656c697665727320612073696d706c6966696564207365637572656420706f7274616c20746f20736572766520696e667261737472756374757265206f6e2d64656d616e6420657373656e7469616c732e2049542061646d696e6973747261746f727320616e6420646576656c6f706572732063616e2072617069646c792070726f766973696f6e207669727475616c206d616368696e65732c20736572766572732c20616e64206465736b746f7073207573696e672050726f746f74797065204d616368696e6520426c75657072696e74732c20726571756573747320766172696f75732049542073657276696365732c20616e64206d616e616765206170706c69636174696f6e73207468726f75676820637573746f6d617279205365727669636520436174616c6f6720746f2070726f76696465206120636f686572656e74207573657220657870657269656e6365206f766572205072697661746520616e64205075626c69632c206f722048796272696420436c6f756420656e7669726f6e6d656e742e3c2f703e0d0a3c703e546865206d616a6f72206368616c6c656e676520666f722049542061646d696e20746f2070726f76696465206e756d65726f757320766172696f757320636f70696573206f662072656c6174696f6e616c206461746162617365207365727665727320666f722070726f64756374696f6e2c2074657374696e672c20646576656c6f706d656e7420697320636f6e73697374656e746c79206120636f6d706c6578206f7065726174696f6e207468617420696e766f6c7665732074686520636f6d62696e6564206566666f727473206f66206d616e79207465616d7320616e6420746865206372656174696f6e206f6620637573746f6d697a6564207363726970747320746861742072657175697265642070726f66657373696f6e616c20646576656c6f706d656e7420736b696c6c732e3c2f703e0d0a3c703e546865206162696c69747920746f2073776966746c7920696d706c656d656e74206d756c7469706c6520696e7374616e636573206f66204f7261636c652f53514c20536572766572206461746162617365732063616e20726564756365207468652074696d6520746f206372656174652c20746573742c2064656c697665722c20616e64206465706c6f79206e6577206170706c69636174696f6e732e20765265616c697a65204175746f6d6174696f6e20646f657320616363656c657261746520746865206465706c6f796d656e747320616e64206d616e6167656d656e74206f66206170706c69636174696f6e7320616e6420636f6d707574652073657276696365732c207468657265627920696d70726f76696e6720627573696e657373206167696c69747920616e64206f7065726174696f6e616c20656666696369656e63792e3c2f703e0d0a3c703e3c753e3c656d3e53616d706c65206469616772616d206f6620765265616c697a65204175746f6d6174696f6e20536f66747761726520436f6d706f6e656e74732050726f6365737320666c6f773c2f656d3e3c2f753e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e467572746865722c2077652077696c6c206469736375737320612070726f63657373206f6620426c75657072696e74206372656174696f6e2c20637573746f6d697a6174696f6e2c20564d2054656d706c6174652c2053637269707420746f20496e7374616c6c5c436f6e666967757265204f7261636c65204461746162617365203139632042696e617269657320706f7374206e657720564d2070726f766973696f6e696e67206f6e204c696e7578204f5320706c6174666f726d20776869636820696e686572697473206368616e676520696e204f7261636c65205349442028556e69717565205365637572697479204964656e746966696572292c204f7261636c65204442204c6f67696e2050617373776f72642c2073706563696679696e67204f7261636c65205347412f50474120736861726564206d656d6f7279207374727563747572657320616e64206f7468657220726571756972656d656e7473206f66204461792032206f7065726174696f6e7320617320616464696e67206164646974696f6e616c2073746f726167652c20757365722061646d696e697374726174696f6e2c2072656e616d696e67207468652070726f766973696f6e656420564d26727371756f3b732c206574632e3c2f703e0d0a3c703e57652077696c6c2062652061626c6520746f2061636869657665206f757220707572706f7365207573696e6720765265616c697a6520536f66747761726520436f6d706f6e656e747320746f207374616e64617264697a652074686520636f6e66696775726174696f6e2070726f7065727469657320616e64207573696e6720616374696f6e207363726970747320746f20737065636966792065786163746c7920686f7720636f6d706f6e656e74732061726520696e7374616c6c65642c20636f6e666967757265642c20756e696e7374616c6c65642c206f72207570646174656420647572696e67206465706c6f796d656e74207363616c65206f7065726174696f6e732c206566666f72746c6573736c792077652063616e207265777269746520746865736520616374696f6e207363726970747320617420616e792074696d6520616e64207075626c697368206c69766520746f2070757368206368616e67657320746f2070726f766973696f6e20736f66747761726520636f6d706f6e656e74732e20546f20737570706f727420536f66747761726520636f6d706f6e656e74732c206974206973206d616e6461746f727920746f20696e7374616c6c20746865206775657374206167656e7420616e6420536f66747761726520626f6f747374726170206167656e74206f6e20796f7572207265666572656e6365206d616368696e6573206265666f726520796f752077616e74656420746f20636f6e76657274207468656d20696e746f2061206d616368696e652074656d706c61746520666f7220636c6f6e696e67206f722074616b65206120736e617073686f742e3c2f703e0d0a3c703e765265616c697a652041646d696e6973747261746f722063616e2064657369676e20616374696f6e207363726970747320746f2062652067656e6572696320616e64207265757361626c6520627920646566696e696e6720616e6420636f6e73756d696e67206e616d6520616e642076616c75652070616972732063616c6c656420736f6674776172652070726f7065727469657320616e642070617373696e67207468656d20617320706172616d657465727320746f2074686520616374696f6e20736372697074732e20496620796f757220736f6674776172652070726f7065727469657320686176652076616c75657320746861742061726520756e6b6e6f776e206f72206e65656420746f20626520646566696e656420696e20746865206675747572652c20796f752063616e206569746865722072657175697265206f7220616c6c6f77206f7468657220426c75657072696e7420417263686974656374732c20656e642d757365727320746f2070726f766964652074686520617070726f7072696174652076616c7565732e3c2f703e0d0a3c703e496620697420726571756972656420746f207370656369667920612076616c75652066726f6d20616e6f7468657220636f6d706f6e656e7420696e206120626c75657072696e742c20666f72206578616d706c652c207468652049502061646472657373206f662061206d616368696e652c20796f752063616e2062696e6420796f757220736f6674776172652070726f706572747920746f2074686174206d616368696e6526727371756f3b7320495020616464726573732070726f70657274792e2054686520736f6674776172652070726f7065727469657320706172616d65746572697a6520616374696f6e207363726970747320616e64206d616b65207468656d20636f6d70726568656e7369766520616e64207472616e73666f726d61626c6520736f20796f752063616e207574696c697a6520736f66747761726520636f6d706f6e656e747320696e20646966666572656e7420656e7669726f6e6d656e747320776974686f757420616c746572696e672074686520736372697074732e3c2f703e0d0a3c703e496e207468697320696e7374616e63652c207765206172652065786869626974696e6720616e204f7261636c65206461746162617365206465706c6f796d656e742061732044426161532c20776520686176652070726570617265642061204c696e7578207265666572656e6365206d616368696e652c2075736564206120636c6f6e6520626c75657072696e7420666f722070726f766973696f6e696e67206120636f6d706c65746520616e6420696e646570656e64656e74207669727475616c206d616368696e65206261736564206f6e2061207643656e74657220536572766572207669727475616c206d616368696e652074656d706c6174652e20496620796f752077616e7420796f75722074656d706c6174657320746f20737570706f727420536f66747761726520636f6d706f6e656e74732c207468652073696e676c652073637269707420746f20696e7374616c6c20746865204a6176612052756e74696d6520456e7669726f6e6d656e742c20696e7374616c6c20746865206775657374206167656e7420616e6420736f66747761726520626f6f747374726170206167656e74206f6e20796f7572207265666572656e6365206d616368696e652e3c2f703e0d0a3c703e5765206861766520736b69707065642073616d706c65207374657073206f6620696e7374616c6c696e672067756573742c20626f6f747374726170206167656e74732c20616e64206f7468657220726571756972656420736f667477617265206f6e2061207265666572656e63652054656d706c617465204d616368696e652e3c2f703e0d0a3c68333e3c7374726f6e673e5468652062617369632064657461696c73206f662074686520656e7669726f6e6d656e74207573656420746f20706572666f726d20746869732064656d6f6e7374726174696f6e2e3c2f7374726f6e673e3c2f68333e0d0a3c6f6c3e0d0a3c6c693e765265616c697a65204175746f6d6174696f6e20372e362028456e74657270726973652045646974696f6e293c2f6c693e0d0a3c6c693e4f7261636c652031396320536574757020496d616765733c2f6c693e0d0a3c6c693e52656468617420372e36204f7065726174696e672053797374656d205b5573656420436f6d70757465205265736f7572636573206f6e207265666572656e6365206d616368696e6520764350553a20323b204d656d6f72793a31364742204844442d313a20323047422026616d703b204844442d32203a383047425d3c2f6c693e0d0a3c6c693e437573746f6d2053637269707420746f20496e7374616c6c2f436f6e666967757265204f7261636c65203139632042696e61726965732028436f6e74656e7420637265617465642077697468207468652068656c70206f6620446576656c6f70657273293c2f6c693e0d0a3c6c693e7643656e7465722053657276657220362e353c2f6c693e0d0a3c6c693e33204e6f6465204553586920362e35205365727665723c2f6c693e0d0a3c6c693e5368617265642053746f7261676520746f20686f737420436c6f6e65642f54656d706c61746520564d26727371756f3b732c20616c6c6f6361746520617661696c61626c6520636f6d70757465207265736f757263657320746f2070726f766973696f6e20564d26727371756f3b732e3c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e3c753e3c7374726f6e673e4f766572766965772050726f636573733c2f7374726f6e673e3c2f753e3c2f68333e0d0a3c6f6c3e0d0a3c6c693e437265617465206120564d2077697468207468652064657369726564204c696e7578204f5320616e6420696e7374616c6c20766d2d746f6f6c732c20757064617465206e656365737361727920757067726164657320616e6420706174636865732e3c2f6c693e0d0a3c6c693e456e737572652074686174207468652062656c6f7720636f6d6d616e64732061726520617661696c61626c652c20646570656e64696e67206f6e20746865204c696e757820526564686174204f532073797374656d2e2028776765743b206375726c3b20707974686f6e3b2079756d206f72206170742d676574293c2f6c693e0d0a3c6c693e4e6574776f726b20636f6e6e65637469766974792072657175697265642066726f6d20746865205669727475616c204d616368696e653c2f6c693e0d0a3c6c693e765265616c697a65204175746f6d6174696f6e204775657374204167656e742073686f756c6420626520696e7374616c6c6564206f6e20616c6c20564d7320796f752077616e7420746f266e6273703b3c7374726f6e673e496e7374616c6c2c20636f6e6669677572652c2053746172742c205570646174652c20556e696e7374616c6c3c2f7374726f6e673e266e6273703b74686520736f667477617265207573696e672076524120536f66747761726520436f6d706f6e656e74732e3c2f6c693e0d0a3c6c693e506f7374204775657374204167656e742028616b612074686520477567656e742920696e7374616c6c6174696f6e20564d26727371756f3b732c20437265617465206120536e617073686f74206f662074686520564d2026616d703b2053687574646f776e2074686520477565737420564d2e3c2f6c693e0d0a3c6c693e4b65657020616e204f7261636c652044422053657475702046696c6573206f6e2064657369676e61746564206c6f636174696f6e20696e7369646520564d20746f2073706563696679206b69636b737461727420706f737420564d2070726f766973696f6e696e673c2f6c693e0d0a3c6c693e43726561746520612074656d706c617465206f662074686520564d2e20284e6f74653a20466f72204c696e6b656420436c6f6e65732c206372656174652061206e657720736e617073686f7420616e642070726f76696465206120564d204e616d652026616d703b20466f722046756c6c20436c6f6e6520796f752063616e206a75737420636f6e7665727420746865206d616368696e65206469726563746c7920746f207468652054656d706c6174652e3c2f6c693e0d0a3c6c693e437265617465206120426c75657072696e742066726f6d207573696e6720564d20636c6f6e652054656d706c6174652e3c2f6c693e0d0a3c6c693e44657369676e20536f66747761726520436f6d706f6e656e74732c20536f6674776172652061726368697465637420617574686f727320736f66747761726520636f6d706f6e656e747320666f722075736520696e2074686520626c75657072696e742064657369676e65722e3c2f6c693e0d0a3c6c693e417474616368206372656174656420536f66747761726520436f6d706f6e656e747320746f204d616368696e6520426c75657072696e742e202667743b205075626c697368202667743b2052657175657374204974656d2066726f6d20436174616c6f6720746f2070726f766973696f6e20564d2e3c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e3c753e3c7374726f6e673e23204c65742075732066696e64206f757420686f7720746f2061636869657665204f7261636c652044422070726f766973696f6e696e673c2f7374726f6e673e3c2f753e3c2f68333e0d0a3c68333e3c753e3c7374726f6e673e412e20537465707320666f72204372656174696f6e206f66204d616368696e6520426c75657072696e743c2f7374726f6e673e3c2f753e3c2f68333e0d0a3c703e4669672e3141204c6f6720696e20746f2074686520765265616c697a65204175746f6d6174696f6e20636f6e736f6c6520617320612075736572207769746820736f6674776172652061726368697465637420616e6420696e667261737472756374757265206172636869746563742070726976696c656765732c2053656c65637420426c75657072696e74732054616220756e6465722044657369676e2e20285468652062656c6f772073637265656e73686f742074616b656e2066726f6d20746865206578697374696e6720426c75657072696e742073616d706c65293c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d6f6e652e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e314220426c75657072696e742044657369676e2043616e7661733c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d74776f2e676966222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e322053656c656374204e6577202667743b2052657669657720616e6420456469742047656e6572616c2053657474696e67732062656c6f77207468652044657369676e2043616e7661732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d74687265652e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e332053656c656374203c7374726f6e673e4275696c6420496e666f726d6174696f6e266e6273703b3c2f7374726f6e673e73657474696e677320666f7220612076537068657265206d616368696e6520636f6d706f6e656e74202667743b20456469742053657474696e67732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d666f75722e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e342053656c656374266e6273703b3c7374726f6e673e4d616368696e65205265736f7572636573266e6273703b3c2f7374726f6e673e2667743b2073706563696679204350552c206d656d6f72792c20616e642073746f726167652073657474696e677320666f7220612076537068657265206d616368696e652e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d666976652e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e352053656c656374266e6273703b3c7374726f6e673e53746f726167652e3c2f7374726f6e673e266e6273703b284368616e6765206f72204164642073746f7261676520766f6c756d652073657474696e67732c20696e636c756465206f6e65206f72206d6f72652073746f72616765207265736572766174696f6e20706f6c69636965732c20746f20746865206d616368696e6520636f6d706f6e656e7420746f20636f6e74726f6c2073746f726167652073706163652e293c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666976652d7369782e6a7067222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e36266e6273703b3c7374726f6e673e53656c6563743c2f7374726f6e673e266e6273703b4e6574776f726b20616e6420737065636966792074686520636f6d706f6e656e742066726f6d207468652064726f702d646f776e206d656e752e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d392e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e372053656c6563742053656375726974792c206e6f20637573746f6d2073657474696e6773207370656369666965642e20486f77657665722c2073657474696e67732063616e20626520636f6e6669677572656420666f7220612076537068657265206d616368696e6520636f6d706f6e656e74206261736564206f6e204e53582073657474696e677320746861742061726520636f6e66696775726564206f75747369646520765265616c697a65204175746f6d6174696f6e2e204669672e322053656c656374204e6577202667743b2052657669657720616e6420456469742047656e6572616c2053657474696e67732062656c6f77207468652044657369676e2043616e7661732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31302e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e382053656c656374266e6273703b3c7374726f6e673e50726f706572746965732c3c2f7374726f6e673e266e6273703b6e6f2076616c75657320746f2061646420756e646572266e6273703b3c7374726f6e673e50726f70657274792047726f7570733c2f7374726f6e673e3c2f703e0d0a3c703e3c7374726f6e673e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31312e706e67222077696474683d223130302522202f3e3c2f7374726f6e673e3c2f703e0d0a3c703e4669672e392053656c656374266e6273703b3c7374726f6e673e437573746f6d2050726f706572746965733c2f7374726f6e673e266e6273703b6e65787420746f2050726f70657274792047726f757073756e646572266e6273703b3c7374726f6e673e50726f706572746965732c3c2f7374726f6e673e266e6273703b61646465642062656c6f7720677565737420637573746f6d2070726f70657274792076616c7565733c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e7475746976652d31322e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e313020526576696577207468652046696e616c2053657474696e672c2053656c656374266e6273703b3c7374726f6e673e46696e6973683c2f7374726f6e673e2e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31332e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c68333e3c753e422e20537465707320666f72204372656174696f6e206f6620536f66747761726520436f6d706f6e656e74733c2f753e3c2f68333e0d0a3c703e4669672e3131204e6176696761746520746f20536f66747761726520436f6d706f6e656e747320756e6465722044657369676e20616e642053656c656374204e65773c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31342e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e31322050726f7669646520617070726f707269617465206e616d652c20656e746572204465736372697074696f6e2c206b656570266e6273703b3c7374726f6e673e436f6e7461696e65723c2f7374726f6e673e266e6273703b6173204d616368696e652e20496620746865206d616368696e6520697320676f696e6720746f20676574206465706c6f79656420696e20746865207643656e7465722e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31352e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e313320437265617465642070726f7065727469657320666f722050726f6772616d20476c6f62616c20417265612028504741292c2053797374656d20476c6f62616c20417265612028534741292c204f7261636c65204461746162617365204c6f67696e2050617373776f72642c2053494420266e646173683b20546f205370656369667920756e697175652044617461626173652053797374656d204964656e7469666965722e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31362e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e313420446576656c6f70656420426173682053637269707420746f20696e7374616c6c204f7261636c652044422042696e61726965732c20616e64206372656174696e6720616e204f7261636c6520646174616261736520686f6d65206469726563746f72792c204e65656420746f206174746163682f70617374652073637269707420617420746865266e6273703b3c7374726f6e673e436f6e6669677572653c2f7374726f6e673e266e6273703b53746167653c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31372e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e31352052657669657720666f7220526561647920746f20436f6d706c6574652e202667743b2053656c6563742046696e6973682e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31382e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e3136204174746163682074686520536f66747761726520436f6d706f6e656e7420746f204d616368696e6520426c75657072696e742e2053656c6563742046696e6973683c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d31392e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e3137204e6176696761746520746f20436174616c6f673c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32302e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e3138204f7261636c6520446174616261736520426c75657072696e742053656c65637420526571756573742e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32312e706e6722202f3e3c2f703e0d0a3c703e4669672e313920456e7465722074686520646573697265642076616c75657320696e204465736372697074696f6e2c20526561736f6e20666f7220726571756573742c204465706c6f796d656e74732028204e756d626572206f6620636f7069657329206665696c64732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32322e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e3230204e6578742053656c656374206f7220486967686c6967687420286d616368696e653a205265646861745f372e375f3139635f6f7261636c652920616e642072657669657720746865206e756d626572206f6620696e7374616e63657320616e6420636f6d707574652064657461696c732e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32332e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e32312053656c6563742053746f7261676520616e642072657669657720746865206164646564204469736b733c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32342e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e4669672e3232204e6578742053656c656374206f7220486967686c6967687420284f7261636c6544423139635f31292e20496e20746869732073656374696f6e2c20776520776f756c64206e65656420746f20616464207468652076616c75657320646570656e64696e67206f6e207468652054656d706c6174652f5265666572656e6365204d616368696e65207265736f757263652e20496620796f75206861766520564d204d656d6f72792069732031362047422c20656e73757265207468617420796f75206b656570206120627566666572206f66203320746f20342047422066726f6d207468652061637475616c20616c6c6f63617465642031364742206f6620564d204d656d6f7279207468656e2061737369676e20746865205347412026616d703b205047412076616c7565732c20696e636c7564696e672074686573652074776f20706172616d6574657273207468652076616c7565732073686f756c64206e6f7420657863656564206d6f7265207468616e203130474220266d646173683b2031324742206174207468652074696d65206f662072657175657374696e67204f7261636c6520446174616261736520426c75657072696e742066726f6d20436174616c6f672e3c2f703e0d0a3c683320636c6173733d226d622d33223e4578616d706c65205265666572656e63652031293c2f68333e0d0a3c703e504741203d203531323c2f703e0d0a3c703e534741203d20323034383c2f703e0d0a3c703e50617373776f7264203d2050617373776f72643132333c2f703e0d0a3c703e444220736964203d20434154434832323c2f703e0d0a3c683320636c6173733d226d622d33223e4578616d706c65205265666572656e63652032293c2f68333e0d0a3c703e504741203d20323034383c2f703e0d0a3c703e534741203d20383139323c2f703e0d0a3c703e50617373776f7264203d2050617373776f72643132333c2f703e0d0a3c703e444220736964203d20434154434832363c2f703e0d0a3c703e284e6f74653a20496620796f752063686f6f736520746f20656e74657220324742206f7220313047422c20796f75206e65656420746f20656e7465722074686520636f72726573706f6e64696e672076616c75657320696e204d422061732032303438202f2031303234302e20496e636f72726563742f696e76616c6964205347412026616d703b205047412076616c75657320726573756c7420696e206661696c6564206d616368696e65206465706c6f796d656e747320293c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f696e747569746976652d32352e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e53756d6d6172793c2f7374726f6e673e266e6273703b5468617420656e647320776974682074686520626c6f6720636f6e74656e742c2074686520636f6e66696775726174696f6e2073637269707420697320636f6e666964656e7469616c20616e6420496e747569746976652070726f70726965746172792068656e63652063616e6e6f7420626520646973636c6f7365642e2054686520626173682073637269707420646566696e6573206b657920706172616d65746572732c206f626a656374697665732c20657865637574696f6e2c20636f6e7369646572696e67206775657374204f532c20616e64204f7261636c6520446174616261736520726571756972656d656e74732e204920686f706520746869732077696c6c2062652075736566756c20746f2067657420616e206f76657276696577206f662044426161532070726f766973696f6e696e67207769746820765265616c697a65204175746f6d6174696f6e20536f66747761726520436f6d706f6e656e74732e3c2f703e0d0a3c68333e526571756972656d656e743a3c2f68333e0d0a3c703e54686520496e7465726e616c207573657273207765726520616363657373696e6720637269746963616c206170706c69636174696f6e73206261736564206f6e2053415020424f2f44532c616e64206f746865722057696e646f7773206261736564206167656e747320696e7374616c6c6564206f6e204e6f726d616c2057696e646f777320426f78657320656e61626c65642077697468205465726d696e616c2053657276696365732e205468652041636365737320776173207072696d6172696c7920766961207468652052656d6f7465204465736b746f702050726f746f636f6c202852445029206f6e20706f727420333338392c207768696368206973207665727920636f6d6d6f6e6c79207573656420706f727420616e64206c6961626c6520746f207365637572697479207468726561747320616e64206578706f737572652e20536f2c2074686520437573746f6d65722077616e74656420746f2070757420696e20706c6163652061206d6f72652073656375726520616e6420726f6275737420736f6c7574696f6e2c20776869636820776f756c64206e6f742075736520746865206e6f726d616c2052445020706f7274732c616e64207468657265627920736f6c76652074686520706f74656e7469616c207365637572697479206973737565732074686174206d61792061726973652e3c2f703e0d0a3c68333e4c696d69746174696f6e20616e6420636f6e73696465726174696f6e733a3c2f68333e0d0a3c6f6c3e0d0a3c6c693e437573746f6d6572206973206120564d776172652073686f703c2f6c693e0d0a3c6c693e4e65656473206120726f627573742c20686967686c7920617661696c61626c652c2073696d706c6520736f6c7574696f6e2e3c2f6c693e0d0a3c6c693e4f6e2d5072656d20534444432069732072756e6e696e67206f6e206c65676163792076657273696f6e206f6620765370686572652c20736f206c61746573742056444920736f6c7574696f6e206465706c6f796d656e74206e6f7420706f737369626c653c2f6c693e0d0a3c6c693e437573746f6d6572206861732070726573656e6365206f6e204e6174697665204157533c2f6c693e0d0a3c6c693e546865726520617265206c696d697465642075736572732077686f20776f756c64206265207573696e67207468652056444920536f6c7574696f6e20287570746f20612031303020557365727329207769746820646564696361746564206465736b746f70733c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e536f6c7574696f6e3a3c2f68333e0d0a3c703e496e747569746976652063616d652075702077697468206120736f6c7574696f6e20746f206465706c6f7920564d7761726520486f72697a6f6e20564449206f6e20746865204e6174697665204157532c207573696e67207468652057696e646f77732045433220696e7374616e63657320666f722074686520636f6e6e656374696f6e207365727665727320616e64207468652057696e646f7773204465736b746f70732c20776974686f757420696e746567726174696e67206974207769746820746865207643656e746572206f72207573696e6720564d776172652044796e616d696320456e7669726f6e6d656e74204d616e616765722028466f726d65726c79204b6e6f776e20617320564d77617265205573657220456e7669726f6e6d656e74204d616e616765722920616e6420556e69666965642041636365737320476174657761792028554147293c2f703e0d0a3c683320636c6173733d226d622d33223e4c6f676963616c2044657369676e204469616772616d3a3c2f68333e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f67732f4c6f676963616c2d44657369676e2e6a7067222077696474683d2235302522202f3e3c2f703e0d0a3c68333e44657369676e204578706c616e6174696f6e3a3c2f68333e0d0a3c703e436f6e7369646572696e6720746865206c696d69746174696f6e206f662074686520765370686572652076657273696f6e2072756e6e696e67206f6e20746865206f6e2d7072656d20736974652c207765206465636964656420746f2075736520746865204e6174697665204157532c20776869636820776f756c6420616c6c6f7720757320746f2075736520616e64206465706c6f7920746865206c617465737420486f72697a6f6e20636f6d706f6e656e74732076657273696f6e73206f6e20746865206c61746573742057696e646f7773204f532076657273696f6e2061732077656c6c20616e64206162696c69747920746f2074616b6520616476616e7461676573206f66206e61746976656c7920617661696c61626c65204869676820417661696c6162696c697479206275696c7420696e746f204157532c206164646974696f6e616c6c7920776520776f756c6420626520636c6f73657220746f20746865204170706c69636174696f6e20696e2063617365206f6620612044522061732074686520415753206973207468652044522053697465206f662074686520637269746963616c206170706c69636174696f6e732061732077656c6c2e3c2f703e0d0a3c703e53696e63652077652063616e6e6f74206465706c6f7920616e7920564d77617265206170706c69616e636573206c696b65207643656e74657220616e6420486f72697a6f6e206f6e20746865204e6174697665204157532c20616c736f20636f6e7369646572696e672074686520637573746f6d657220776173207573696e6720646564696361746564206465736b746f707320616e6420776520646f206e6f7420686176652074686520726571756972656d656e74206f662055414720616e642044454d20616c6f6e6720776974682074686520696e746567726174696f6e20746f207643656e74657220746f2064796e616d6963616c6c792063726561746520616e6420616c6c6f63617465206465736b746f70732c20776520636f756c6420676f20696e746f2041575320776974686f757420616e79206973737565733c2f703e0d0a3c703e5765206465706c6f796564207468652050726f6420486f72697a6f6e20636f6d706f6e656e74206f6620636f6e6e656374696f6e207365727665727320696e2048412050616972207769746820646564696361746564206465736b746f707320626568696e6420697420696e207468652041575320456173742d312050726f64205650432c20776869636820776f756c6420686169722070696e206261636b20746f206f6e2d7072656d20416374697665204469726563746f72792028414429207365727669636520666f722041757468656e7469636174696f6e20616e6420776f756c6420656e7469746c6520757365727320746f2061757468656e74696361746520696e746f20746865204465736b746f707320616e6420636f6e6e656374696f6e20736572766572732e2054686520757365727320776f756c6420746865207573652074686520646564696361746564206465736b746f70732073747265616d6564207573696e6720424c41535420616e642050434f49502050726f746f636f6c7320746f2074686520486f72697a6f6e20636c69656e74732c207768696368206861766520616c6c207468652072657175697265642077696e646f7773206261736564206170706c69636174696f6e205c206167656e747320696e7374616c6c6564206f6e2069742c20776869636820776f756c6420636f6e6e656374206261636b20746f20746865206170706c69636174696f6e7320616e6420446174616261736573206261636b206f6e2d7072656d2e2053696e636520746865206e6574776f726b20636f6e6e6563746976697479206265747765656e20746865206f6e2d7072656d207369746520616e642074686520415753205650432077617320676f6f642c20776520776572652061626c6520746f2073747265616d20746865206465736b746f707320776974686f757420616e79206d616a6f72206c6174656e6379206973737565732e3c2f703e0d0a3c703e466f722074686520445220746865206f6e2d7072656d20637269746963616c206170706c69636174696f6e20696e2063617365206f662061207369746520646f776e20736974756174696f6e20776f756c64206661696c6f76657220746f2074686520456173742d322044522056504320636f6e66696775726564206f6e204157532c20736f20746f206d61696e7461696e20746865206c6f63616c697479206f662074686520486f72697a6f6e2c2077652063616e206661696c6f76657220746f20612073696d696c6172207365747570206f6e2074686520456173742d32205650432c207573696e67206120736570617261746520636f6e6e656374696f6e207365727665722055524c2e3c2f703e, 'active', 'blog', NULL, 'Implementing Database-as-a-Service with vRealize Automation', NULL, 'undefined', NULL, '2023-03-12 18:02:29', '2023-03-17 18:46:18');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(27, NULL, 'Cloud Migration Strategies with AWS Cloud', 'cloud-migration-strategies-with-aws-cloud', 'uploads/2023/03/ca09a87bb67b7268ce2ab36d0a465468.png', 'uploads/2023/03/29e6c89e0936de443ad7a35c817db3c1.png', NULL, 'Piyush Jalan', '2022-06-29', 'Migrating existing apps and IT assets to the Amazon Web Services (AWS) Cloud can help…', 0x3c703e4d6967726174696e67206578697374696e67206170707320616e642049542061737365747320746f2074686520416d617a6f6e2057656220536572766963657320284157532920436c6f75642063616e2068656c7020616e206f7267616e697a6174696f6e20656e68616e63652069747320627573696e6573732070726f636564757265732e204f7267616e697a6174696f6e73206275696c64206e657720736b696c6c732c2070726f6365737365732c20746f6f6c732c20616e6420636170616369746965732061732074686579206d69677261746520746f2041575320696e20616e20697465726174697665206d616e6e65722e204d6967726174696e6720746f20415753206d61792068656c702075736572732073617665206d6f6e65792c20696e6372656173656420666c65786962696c6974792c206c6561726e206e657720736b696c6c73206661737465722c2064656c697665722072656c6961626c6520616e6420676c6f62616c6c792061636365737369626c6520736572766963657320746f20746865697220637573746f6d6572732e3c2f703e0d0a3c703e54686520666f756e646174696f6e20666f722065666665637469766520636c6f75642061646f7074696f6e20697320612077656c6c2d616c69676e6564206d6967726174696f6e20737472617465677920737570706f72746564206279206120627573696e657373206361736520616e6420612077656c6c2d74686f756768742d6f7574206d6967726174696f6e20706c616e2e204120636c6f7564206d6967726174696f6e207374726174656779206973206120706c616e20666f72206120627573696e65737320746f207472616e7366657220697473206461746120616e64206170706c69636174696f6e732066726f6d206f6e2d7072656d6973657320746f20636c6f7564206172636869746563747572652e2041732c206e6f7420616c6c20776f726b6c6f6164732062656e656669742066726f6d20636c6f75642d626173656420696e6672617374727563747572652c20697426727371756f3b7320637269746963616c20746f207465737420746865206d6f73742065666665637469766520737472617465677920746f207072696f72697469736520616e64206d6f76652061707073207072696f7220746f206d6967726174696f6e2e3c2f703e0d0a3c68333e3c7374726f6e673e566172696f757320417070726f616368657320746f20436c6f7564204d6967726174696f6e3c2f7374726f6e673e3c2f68333e0d0a3c703e54686520666f6c6c6f77696e6720617265207468652073697820776964656c792075736564206d6967726174696f6e20617070726f61636865732c20636f6c6c6563746976656c79206b6e6f776e20617320746865266e6273703b266c6471756f3b736978205226727371756f3b73206f66206d6967726174696f6e26726471756f3b3a3c2f703e0d0a3c6f6c3e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e652d686f73743c2f6c693e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e652d706c6174666f726d3c2f6c693e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e652d666163746f723c2f6c693e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e652d70757263686173653c2f6c693e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e65746972653c2f6c693e0d0a3c6c693e3c7374726f6e673e523c2f7374726f6e673e657461696e3c2f6c693e0d0a3c2f6f6c3e0d0a3c703e5468657365206d6967726174696f6e20617070726f61636865732064657465726d696e652074686520656e7669726f6e6d656e742c20696e746572646570656e64656e636965732c20746563686e6963616c20646966666963756c74696573206f66206d6967726174696e672c20616e6420686f7720656163682070726f6772616d6d65206f7220636f6c6c656374696f6e206f662070726f6772616d6d65732077696c6c206265206d6f7665642e2054686520636f6d706c6578697479206f66206578697374696e67206170706c69636174696f6e206d6967726174696f6e2076617269657320646570656e64696e67206f6e20617370656374732073756368206173206172636869746563747572652c2063757272656e74206c6963656e63652061677265656d656e74732c20616e6420627573696e657373206e656564732e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f626c6f672d666f75722e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c68333e266c7371756f3b52652d686f737426727371756f3b206f7220266c7371756f3b4c69667420616e6420536869667426727371756f3b3c2f68333e0d0a3c703e546f206d65657420636f72706f72617465206f626a656374697665732c206c617267652d7363616c65206c6567616379206d6967726174696f6e73206e6563657373697461746520717569636b20616374696f6e2e20546865206772656174206d616a6f72697479206f6620746865736520617070732068617665206265656e2072652d686f73746564206f6e206e657720736572766572732e20447572696e67207468652070726f63657373206f66206d6967726174696f6e20736f6d6520636c69656e74732063686f6f7365206d616e75616c206465706c6f796d656e74206f66206c65676163792073797374656d7320746f20746865206e657720636c6f756420706c6174666f726d2e20466f72206661737465722072657475726e206f6e20696e766573746d656e742c20796f75206d6f766520616e206964656e746963616c20636c6f6e65206f6620796f75722070726573656e7420656e7669726f6e6d656e7420776974686f7574206d616b696e6720616e79207369676e69666963616e74206d6f64696669636174696f6e732e205265686f7374696e6720697320696465616c20666f7220636f6d70616e6965732077697468206120636f6e7365727661746976652063756c74757265206f72206e6f206c6f6e672d7465726d20676f616c20666f72206c657665726167696e67206d6f6465726e20636c6f7564206361706162696c69746965732e3c2f703e0d0a3c703e3c656d3e266c6471756f3b4745204f696c2026616d703b2047617320646973636f766572656420746861742072652d686f7374696e67206d6179207361766520757020746f20333025206f662069747320636f737473206576656e206966206e6f20636c6f756420696d70726f76656d656e7473207765726520696d706c656d656e74656426726471756f3b2e20536f757263653a2068747470733a2f2f6177732e616d617a6f6e2e636f6d2f736f6c7574696f6e732f636173652d737475646965732f67652d6f696c2d6761732f3c2f656d3e3c2f703e0d0a3c68333e266c7371756f3b52652d706c6174666f726d26727371756f3b206f7220266c7371756f3b4c6966742c2074696e6b65722c20616e6420736869667426727371756f3b3c2f68333e0d0a3c703e5265706c6174666f726d696e6720656e7461696c73206120666577206d6f726520747765616b7320746f20796f7572206c616e64736361706520696e206f7264657220746f206d616b6520697420636c6f75642d72656164792e2054686520626173696320617263686974656374757265206f6620617070732072656d61696e7320756e6368616e6765642e20466f72206578616d706c652c2068756e6472656473206f66206f6e2d7072656d697365732077656220736572766572732077657265206d6967726174656420746f20415753206279206120676c6f62616c206d6564696120636f6d70616e792e204974206d696772617465642066726f6d205765624c6f67696320746f2041706163686520546f6d6361742c20616e206f70656e2d736f75726365207265706c6163656d656e742e20537769746368696e6720746f204157532073617665642074686520676c6f62616c206d6564696120636f6d70616e79206d696c6c696f6e73206f6620646f6c6c61727320696e206c6963656e63696e6720657870656e7365732c20616c736f20696e6372656173656420736176696e677320616e64206167696c6974792e205468697320697320616e20657863656c6c656e7420746563686e6971756520666f7220636f6e736572766174697665206669726d73206c6f6f6b696e6720746f2063726561746520636c6f7564207472757374207768696c65206761696e696e672062656e6566697473207375636820617320696d70726f7665642073797374656d20706572666f726d616e63652e3c2f703e0d0a3c68333e266c7371756f3b52652d666163746f7226727371756f3b206f7220266c7371756f3b52652d61726368697465637426727371756f3b3c2f68333e0d0a3c703e546865207465726d20266c6471756f3b7265666163746f72696e6726726471756f3b2072656665727320746f207468652070726f63657373206f6620636f6d706c6574656c7920726564657369676e696e6720796f757220617070732e2054686973206973206672657175656e746c79206d6f74697661746564206279206120627573696e65737320726571756972656d656e7420746f2075736520636c6f7564206665617475726573207468617420617265206e6f742061636365737369626c6520696e20796f75722063757272656e7420656e7669726f6e6d656e742c207375636820617320636c6f7564206175746f2d7363616c696e67206f72207365727665726c65737320636f6d707574696e672e20546869732069732064726976656e206279206120636f6d70656c6c696e6720627573696e657373206e65656420746f206164642066656174757265732c2073697a652c206f7220706572666f726d616e636520746f20746865206170706c69636174696f6e207468617420776f756c6420626520646966666963756c7420746f2066756c66696c20696e20697473206578697374696e672073746174652e205468697320697320746865206d6f737420657870656e7369766520617070726f6163682c20627574207375697461626c6520616e6420656666656374697665207768656e207468657265206973206120676f6f642070726f647563742d6d61726b6574206669742e3c2f703e0d0a3c68333e266c7371756f3b52652d707572636861736526727371756f3b3c2f68333e0d0a3c703e54686973206f6674656e20656e7461696c73206d6967726174696e6720796f7572206170707320746f2061206e657720636c6f75642d6e6174697665206f66666572696e672c20737563682061732061205361615320706c6174666f726d2e204d616b696e6720746865207377697463682066726f6d2070657270657475616c206c6963656e63657320746f20536f6674776172652d61732d612d536572766963652e204275742c20676976696e67207570206f6c6420636f646520616e6420747261696e696e6720796f7572207465616d206f6e20746865206e657720706c6174666f726d2061726520646966666963756c74207461736b732e204275742c20696620796f7526727371756f3b7265206d6967726174696e672066726f6d206120686967686c7920637573746f6d69736564206c656761637920656e7669726f6e6d656e742c20726570757263686173696e672063616e20626520746865206d6f737420636f73742d65666665637469766520736f6c7574696f6e2e3c2f703e0d0a3c703e466f72206578616d706c652c266e6273703b3c656d3e266c6471756f3b4368616e67652066726f6d206120637573746f6d65722072656c6174696f6e73686970206d616e6167656d656e74202843524d292073797374656d20746f2053616c6573666f7263652e636f6d2c20616e2048522073797374656d20746f20576f726b6461792c206f72206120636f6e74656e74206d616e6167656d656e742073797374656d2028434d532920746f2044727570616c2e26726471756f3b3c2f656d3e3c2f703e0d0a3c68333e266c7371756f3b52657469726526727371756f3b3c2f68333e0d0a3c703e52656d6f766520616e79206e6f206c6f6e676572207265717569726564206170706c69636174696f6e73206f7220616674657220636865636b696e6720796f7572206170706c69636174696f6e20706f7274666f6c696f20666f7220636c6f75642072656164696e6573732c20796f75206d696768742066696e64207468617420736f6d65206170707320617265206e6f206c6f6e6765722066756e6374696f6e616c2e205475726e696e67206f6666207375636820617070732077696c6c2073617665206d6f6e657920616e6420706f74656e7469616c6c7920737472656e677468656e20796f757220627573696e657373206361736520666f72206170706c69636174696f6e7320746861742061726520726561647920666f72207472616e736665722e3c2f703e0d0a3c68333e266c7371756f3b52657461696e26727371756f3b206f7220266c7371756f3b52652d766973697426727371756f3b3c2f68333e0d0a3c703e436c6f75642061646f7074696f6e206973206e6f74207965742065636f6e6f6d6963616c6c7920766961626c6520666f7220736f6d6520627573696e65737365732e204b656570206170707320746861742061726520637269746963616c20746f2074686520627573696e657373206275742077696c6c20726571756972652061206c6f74206f6620776f726b206265666f7265206d6967726174696f6e2e20596f75206d61792072657475726e20746f207468697320617070726f61636820616e792074696d6520616e64206576616c7561746520616c6c20746865206170706c69636174696f6e73206c617465722e20596f752063616e20616c7761797320706c616e20746f2072657475726e20746f20636c6f756420636f6d707574696e67206c6174657220666f7220737563682063617465676f7279206170707320616e64206f6e6c79206d6f76652077686174206973206e656365737361727920666f7220796f757220636f6d70616e7926727371756f3b73206f7065726174696f6e7320696e207468652070726573656e74207363656e6172696f2e3c2f703e0d0a3c703e596f75206e6f206c6f6e676572206861766520746f20626520636f6e6365726e65642061626f75742074686520657870656e73657320616e6420636f6e646974696f6e73206f66206d61696e7461696e696e6720706879736963616c207365727665727320696e2074686520636c6f75642e20546865207365727665727320617265206d616e6167656420627920612074686972642d706172747920646174612063656e7472652c2077686963682069732067656e6572616c6c79206f6e206120737562736372697074696f6e20626173697320746f2061766f6964206361706974616c20657870656e73652e20427920686f7374696e6720796f757220637269746963616c206461746120616e6420617070732063656e7472616c6c792c2074686520636c6f75642070726f766964657320686967686572207365637572697479207468616e20646174612063656e747265732e204d6f737420636c6f75642070726f76696465727320616c736f20726573747269637420756e617574686f726973656420747261666669632066726f6d20616363657373696e6720796f757220646174612062792072656c656173696e67206672657175656e742073656375726974792075706772616465732c20616c6c6f77696e6720796f7520746f20666f637573206f6e2077686174206d61747465727320746f20796f757220627573696e65737320696e7374656164206f6620776f727279696e672061626f757420736563757269747920636f6e6365726e732e3c2f703e0d0a3c703e54686520617070726f6163686573207374617465642061626f76652061726520736f6d6520706f70756c6172206d6967726174696f6e207461637469637320746861742077696c6c20677569646520796f757220627573696e65737320706c616e2c2061732077656c6c2061732061207375676765737465642077617920746f207374727563747572696e6720616e642067726f77696e6720796f757220636c6f7564207465616d7320617320636f6e666964656e636520616e6420636170616369747920696e6372656173652e3c2f703e, 'active', 'blog', NULL, 'Cloud Migration Strategies with AWS Cloud', NULL, 'undefined', NULL, '2023-03-12 18:55:37', '2023-03-17 18:43:25'),
(28, NULL, 'DevOps — Infrastructure Provisioning Automation using Terraform', 'devops-infrastructure-provisioning-automation-using-terraform', 'uploads/2023/03/33e4381612628a34609dd46b8c8c8736.png', 'uploads/2023/03/c7eb671a8871daf9c23292394920745f.png', NULL, 'Raj Shivage', '2022-07-06', 'Terraform is an open-source Infrastructure as Code (IaC) software tool created by HashiCorp. It allows…', 0x3c703e5465727261666f726d20697320616e206f70656e2d736f7572636520496e66726173747275637475726520617320436f646520284961432920736f66747761726520746f6f6c2063726561746564206279204861736869436f72702e20497420616c6c6f777320746f206275696c642c2075706461746520616e642064656c65746520696e66726173747275637475726520736166656c792c20656666696369656e746c792c20616e6420696e20612072657065617461626c65206d616e6e65722e2057697468205465727261666f726d2c2077652063616e20646566696e65207265736f7572636520636f6e66696775726174696f6e7320696e207468652066696c652873292c2077686963682077652063616e2076657273696f6e2c20726575736520616e642073686172652077697468206f74686572732e3c2f703e0d0a3c703e5573696e67205465727261666f726d2c2077652063616e20646566696e65207265736f757263657320616e6420696e66726173747275637475726520696e2068756d616e2d7265616461626c652c206465636c6172617469766520636f6e66696775726174696f6e2066696c657320616e64206d616e6167652074686520696e66726173747275637475726526727371756f3b73206c6966656379636c652e3c2f703e0d0a3c703e4578616d706c65205465727261666f726d2066696c6520666f722070726f766973696f6e696e6720616e2045433220696e7374616e636520696e2041575320696e207468652075732d656173742d3120726567696f6e2e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383038322e6a70672220616c743d22222077696474683d223132353022206865696768743d2233363022202f3e3c2f703e0d0a3c68333e5465727261666f726d20686173207365766572616c20616476616e7461676573206f766572206d616e75616c6c79206465706c6f79696e6720616e64206d616e6167696e6720696e6672617374727563747572652e3c2f68333e0d0a3c756c3e0d0a3c6c693e5468652068756d616e2d7265616461626c6520636f6e66696775726174696f6e206c616e6775616765206973206561737920746f206c6561726e2e3c2f6c693e0d0a3c6c693e546865206465636c6172617469766520636f6e66696775726174696f6e206c616e67756167652068656c707320796f7520777269746520696e66726173747275637475726520636f646520717569636b6c792e3c2f6c693e0d0a3c6c693e5465727261666f726d26727371756f3b7320737461746520616c6c6f777320796f7520746f20747261636b206368616e676573206d61646520746f207265736f757263657320616e6420736166656c79207570646174652074686520636c6f7564207265736f75726365732e3c2f6c693e0d0a3c6c693e596f752063616e20636f6d6d697420796f757220636f6e66696775726174696f6e7320746f2076657273696f6e20636f6e74726f6c20616e6420636f6c6c61626f726174652077697468206f7468657273206f6e20696e667261737472756374757265206465706c6f796d656e74732e3c2f6c693e0d0a3c6c693e5465727261666f726d2063616e206d616e61676520696e667261737472756374757265206f6e206d756c7469706c6520636c6f756420706c6174666f726d732e20497420737570706f72747320616c6c206d616a6f7220636c6f756420706c6174666f726d7320652e672e204157532c204743502c20616e6420417a7572652e3c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383138372e706e672220616c743d22222077696474683d223130323422206865696768743d2233373122202f3e3c2f703e0d0a3c703e4e6f77206c657426727371756f3b73206469766520696e746f2061637475616c20636f646520616e6420696e667261737472756374757265206465706c6f796d656e74207573696e67205465727261666f726d2e3c2f703e0d0a3c703e4669727374207468696e672066697273742c206c657426727371756f3b7320696e7374616c6c205465727261666f726d2e3c2f703e0d0a3c68333e496e7374616c6c205465727261666f726d3c2f68333e0d0a3c703e4920616d2061206269672066616e206f66204c696e75782e20536f204920616d207573696e6720416d617a6f6e204c696e7578203220696d61676520666f72206d792045433220696e7374616e63652e204c657426727371756f3b732073656520746865205465727261666f726d20696e7374616c6c6174696f6e206f6e20416d617a6f6e204c696e757820322e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383234372e6a70672220616c743d22222077696474683d223132343922206865696768743d2233353822202f3e3c2f703e0d0a3c703e4e6f7720776520686176652061207375636365737366756c20696e7374616c6c6174696f6e206f66205465727261666f726d2e204c657426727371756f3b73206275696c6420616e64206465706c6f792074686520696e6672617374727563747572652e3c2f703e0d0a3c703e466f7220696e7374616c6c6174696f6e206f6e206f74686572204f5365732c20796f752066696e64207468652070726f63656475726520686572653c2f703e0d0a3c703e3c6120636c6173733d22636c69636b2d6d652220687265663d2268747470733a2f2f6c6561726e2e6861736869636f72702e636f6d2f7475746f7269616c732f7465727261666f726d2f696e7374616c6c2d636c693f696e3d7465727261666f726d2f6177732d6765742d73746172746564223e68747470733a2f2f6c6561726e2e6861736869636f72702e636f6d2f7475746f7269616c732f7465727261666f726d2f696e7374616c6c2d636c693f696e3d7465727261666f726d2f6177732d6765742d737461727465643c2f613e3c2f703e0d0a3c68333e4465706c6f7920496e6672617374727563747572653c2f68333e0d0a3c703e4e6f772c206c657426727371756f3b73206275696c6420616e64206465706c6f7920736f6d657468696e67206f6e207468652041575320636c6f75642e20492077696c6c2070726f766973696f6e20616e2045433220696e7374616e6365206f6e20416d617a6f6e205765622053657276696365732028415753292e2045433220696e7374616e636520287669727475616c206d616368696e657329206973206120636f6d7075746520636f6d706f6e656e74206f66204157532e3c2f703e0d0a3c703e507265726571756973697465733c2f703e0d0a3c756c3e0d0a3c6c693e546865205465727261666f726d20434c492028312e322e302b2920696e7374616c6c65642e205765206861766520616c726561647920696e7374616c6c6564206974206f6e207468652045433220696e7374616e63652e3c2f6c693e0d0a3c6c693e5468652041575320434c4920697320696e7374616c6c6564206f6e204543322e2054686520696e7374616c6c6174696f6e20737465707320796f752066696e642068657265203c6120636c6173733d22636c69636b2d6d652220687265663d2268747470733a2f2f646f63732e6177732e616d617a6f6e2e636f6d2f636c692f6c61746573742f7573657267756964652f67657474696e672d737461727465642d696e7374616c6c2e68746d6c223e68747470733a2f2f646f63732e6177732e616d617a6f6e2e636f6d2f636c692f6c61746573742f7573657267756964652f67657474696e672d737461727465642d696e7374616c6c2e68746d6c3c2f613e3c2f6c693e0d0a3c6c693e415753206163636f756e7420616e64206173736f6369617465642063726564656e7469616c73207468617420616c6c6f7720796f7520746f20637265617465207265736f75726365732e3c2f6c693e0d0a3c2f756c3e0d0a3c703e546f2075736520796f75722049414d2063726564656e7469616c7320746f2061757468656e74696361746520746865205465727261666f726d204157532070726f76696465722c2073657420746865204157535f4143434553535f4b45595f494420616e64204157535f5345435245545f4143434553535f4b4559656e7669726f6e6d656e74207661726961626c65732e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383432342e6a70672220616c743d22222077696474683d223132353122206865696768743d22373022202f3e3c2f703e0d0a3c703e54686520736574206f662066696c6573207573656420746f20646573637269626520696e66726173747275637475726520696e205465727261666f726d206973206b6e6f776e2061732061205465727261666f726d20636f6e66696775726174696f6e2e20492077696c6c207772697465206f757220666972737420636f6e66696775726174696f6e2066696c6520746f20646566696e6520612073696e676c65204157532045433220696e7374616e63652e2045616368205465727261666f726d20636f6e66696775726174696f6e206d75737420626520696e2069747320776f726b696e67206469726563746f72792e204372656174652061206469726563746f727920666f7220796f757220636f6e66696775726174696f6e2e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383435352e6a70672220616c743d22222077696474683d223132353022206865696768743d2231323222202f3e3c2f703e0d0a3c703e4f70656e206d61696e2e746620696e205649206f7220616e79206f74686572207465787420656469746f722c20706173746520746865206c696e65732062656c6f772c20616e642073617665207468652066696c652e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383438392e6a70672220616c743d22222077696474683d223132343622206865696768743d2233343422202f3e3c2f703e0d0a3c703e4974206973206f7572206669727374205465727261666f726d20636f6e66696775726174696f6e2066696c652e203f3f3f3f3c2f703e0d0a3c68333e496e697469616c697a6520746865206469726563746f72793c2f68333e0d0a3c703e546865206e6578742073746570206973207765206861766520746f20696e697469616c697a6520746865206469726563746f72792e205768656e207765206372656174652061206e657720636f6e66696775726174696f6e2066696c65206f7220636865636b206f757420616e206578697374696e6720636f6e66696775726174696f6e2066726f6d2076657273696f6e20636f6e74726f6c2c207765206861766520746f20696e697469616c697a6520746865206469726563746f72792077697468207465727261666f726d20696e69742e3c2f703e0d0a3c703e5465727261666f726d20696e697420646f776e6c6f61647320616e6420696e7374616c6c73207468652070726f76696465727320646566696e656420696e2074686520636f6e66696775726174696f6e2c20776869636820696e2074686973206361736520697320746865206177732070726f76696465722e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383535382e6a70672220616c743d22222077696474683d223132353022206865696768743d2233323622202f3e3c2f703e0d0a3c703e5465727261666f726d20646f776e6c6f61647320746865204157532070726f766964657220616e6420696e7374616c6c7320697420696e20612068696464656e207375626469726563746f7279206f66206f75722063757272656e7420776f726b696e67206469726563746f72792c206e616d6564202e7465727261666f726d2e20546865207465727261666f726d20696e697420636f6d6d616e64207072696e7473206f75742077686963682076657273696f6e206f66207468652070726f76696465722077617320696e7374616c6c65642e205465727261666f726d20616c736f20637265617465732061206c6f636b2066696c65206e616d6564202e7465727261666f726d2e6c6f636b2e68636c20776869636820737065636966696573207468652065786163742070726f76696465722076657273696f6e7320757365642c20736f207468617420796f752063616e20636f6e74726f6c207768656e20796f752077616e7420746f20757064617465207468652070726f766964657273207573656420666f7220796f75722070726f6a6563742e3c2f703e0d0a3c68333e43726561746520496e6672617374727563747572653c2f68333e0d0a3c703e546865207465727261666f726d20706c616e20636f6d6d616e64206372656174657320616e20657865637574696f6e20706c616e2c20776869636820616c6c6f77732070726576696577696e67206f6620746865206368616e6765732074686174205465727261666f726d20706c616e7320746f206d616b6520746f2074686520696e6672617374727563747572652e20497420697320616c77617973206120676f6f64206964656120746f207072657669657720746865206368616e676573205465727261666f726d2077696c6c206d616b6520746f2074686520696e66726173747275637475726520746f2061766f696420756e6e6563657373617279206368616e67657320746f2074686520696e6672617374727563747572652e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383634392e6a70672220616c743d22222077696474683d223132353022206865696768743d2232313622202f3e3c2f703e0d0a3c703e4e6f77206c657426727371756f3b73206170706c792074686520636f6e66696775726174696f6e207769746820746865207465727261666f726d206170706c7920636f6d6d616e642e20546865207465727261666f726d206170706c7920636f6d6d616e642063726561746573207265736f757263657320646566696e656420696e2074686520636f6e66696775726174696f6e2066696c652e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383638332e6a70672220616c743d22222077696474683d223132353122206865696768743d2233313422202f3e3c2f703e0d0a3c703e5479706520266c6471756f3b79657326726471756f3b20746f20617070726f766520746865206368616e6765732e205465727261666f726d207374617274732070726f766973696f6e696e672045433220696e7374616e63652873292e204f6e63652070726f766973696f6e696e6720697320636f6d706c6574652c2069742077696c6c20646973706c617920686f77206d616e79207265736f757263657320776572652061646465642c206368616e6765642c206f722064657374726f7965642e20496e206d792063617365206f7574707574207761733c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383734392e6a70672220616c743d22222077696474683d223132343922206865696768743d22353522202f3e3c2f703e0d0a3c703e5468617426727371756f3b7320656173792e20576520686176652063726561746564206f7572206669727374207265736f75726365207573696e67205465727261666f726d2e20487572726179213c2f703e0d0a3c68333e55706461746520496e6672617374727563747572653c2f68333e0d0a3c703e4e6f772c206c657426727371756f3b73206d6f6469667920746865207265736f757263652e205570646174652074686520636f6e66696775726174696f6e2066696c6520616e64206d6f6469667920746865207265736f757263652e20497426727371756f3b7320717569746520656173792077697468205465727261666f726d203a292e3c2f703e0d0a3c703e45646974206d61696e2e74662066696c6520616e64206d6f6469667920696e7374616e6365207461672e2049206368616e67656420746865207461672066726f6d20266c6471756f3b54657374496e7374616e636526726471756f3b20746f20266c6471756f3b44656d6f496e7374616e636526726471756f3b2e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383831392e6a70672220616c743d22222077696474683d223132343722206865696768743d2233343222202f3e3c2f703e0d0a3c703e4e6f772065786563757465207465727261666f726d20706c616e20636f6d6d616e6420616e64207072657669657720746865206368616e6765732e20496620796f7520617265206f6b61792077697468206368616e6765732c2065786563757465207465727261666f726d206170706c7920746f2075706461746520746865207461672e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383836382e6a70672220616c743d22222077696474683d223132353022206865696768743d2231373122202f3e3c2f703e0d0a3c703e4e6f772077652063616e206c6f6720696e20746f206f757220415753206163636f756e7420616e64207665726966792069662074686520746167206973206d6f6469666965642e205468617426727371756f3b73206772656174213c2f703e0d0a3c68333e44657374726f7920496e6672617374727563747572653c2f68333e0d0a3c703e4e6f77206c657426727371756f3b732073656520686f7720746f2072656d6f76652f64656c65746520746865207265736f75726365732e2055736520266c6471756f3b7465727261666f726d2064657374726f7926726471756f3b20636f6d6d616e6420616e64205465727261666f726d2077696c6c2074616b652063617265206f662064656c6574696e6720616c6c20746865207265736f757263657320646566696e656420696e2074686520636f6e66696775726174696f6e2066696c652e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383634383932342e6a70672220616c743d22222077696474683d223132353122206865696768743d2233353722202f3e3c2f703e0d0a3c703e486170707920426c6f6767696e6720616e64204861707079204c6561726e696e67213c2f703e, 'active', 'blog', NULL, 'DevOps — Infrastructure Provisioning Automation using Terraform', NULL, 'undefined', NULL, '2023-03-12 19:05:07', '2023-03-17 18:45:07'),
(30, NULL, 'VMware Horizon VDI on AWS', 'vmware-horizon-vdi-on-aws', 'uploads/2023/03/4521ecb9d1eaeb5573eb6f1bf3d2e5b5.png', 'uploads/2023/03/b2fb7c00e38a6ab5d852ac0928996284.png', NULL, 'Bharath Babbur', '2022-10-27', 'Intuitive was approached by a Large Integrated Health Management company to solve a security issue.', 0x3c703e496e747569746976652077617320617070726f61636865642062792061204c6172676520496e7465677261746564204865616c7468204d616e6167656d656e7420636f6d70616e7920746f20736f6c76652061207365637572697479206973737565206f6e2074686569722063757272656e7420656e7669726f6e6d656e742077686963682069732063757272656e746c79207573696e6720746865206e6f726d616c2052656d6f7465204465736b746f702050726f746f636f6c20285244502920746f2061636365737320746865697220627573696e65737320637269746963616c206170706c69636174696f6e20686f73746564206f6e20612057696e646f777320706c6174666f726d2e205468697320426c6f672074616c6b732061626f75742074686520736f6c7574696f6e20696e2064657461696c2e3c2f703e0d0a3c68333e526571756972656d656e743a3c2f68333e0d0a3c703e54686520496e7465726e616c207573657273207765726520616363657373696e6720637269746963616c206170706c69636174696f6e73206261736564206f6e2053415020424f2f44532c20616e64206f746865722057696e646f7773206261736564206167656e747320696e7374616c6c6564206f6e204e6f726d616c2057696e646f777320426f78657320656e61626c65642077697468205465726d696e616c2053657276696365732e205468652041636365737320776173207072696d6172696c7920766961207468652052656d6f7465204465736b746f702050726f746f636f6c202852445029206f6e20706f727420333338392c207768696368206973207665727920636f6d6d6f6e6c79207573656420706f727420616e64206c6961626c6520746f207365637572697479207468726561747320616e64206578706f737572652e20536f2c2074686520437573746f6d65722077616e74656420746f2070757420696e20706c6163652061206d6f72652073656375726520616e6420726f6275737420736f6c7574696f6e2c20776869636820776f756c64206e6f742075736520746865206e6f726d616c2052445020706f7274732c20616e64207468657265627920736f6c76652074686520706f74656e7469616c207365637572697479206973737565732074686174206d61792061726973652e3c2f703e0d0a3c68333e4c696d69746174696f6e20616e6420636f6e73696465726174696f6e733a3c2f68333e0d0a3c6f6c3e0d0a3c6c693e437573746f6d6572206973206120564d776172652073686f703c2f6c693e0d0a3c6c693e4e65656473206120726f627573742c20686967686c7920617661696c61626c652c2073696d706c6520736f6c7574696f6e2e3c2f6c693e0d0a3c6c693e4f6e2d5072656d20534444432069732072756e6e696e67206f6e206c65676163792076657273696f6e206f6620765370686572652c20736f206c61746573742056444920736f6c7574696f6e206465706c6f796d656e74206e6f7420706f737369626c653c2f6c693e0d0a3c6c693e437573746f6d6572206861732070726573656e6365206f6e204e6174697665204157533c2f6c693e0d0a3c6c693e546865726520617265206c696d697465642075736572732077686f20776f756c64206265207573696e67207468652056444920536f6c7574696f6e20287570746f20612031303020557365727329207769746820646564696361746564206465736b746f70733c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e536f6c7574696f6e3a3c2f68333e0d0a3c703e496e747569746976652063616d652075702077697468206120736f6c7574696f6e20746f206465706c6f7920564d7761726520486f72697a6f6e20564449206f6e20746865204e6174697665204157532c207573696e67207468652057696e646f77732045433220696e7374616e63657320666f722074686520636f6e6e656374696f6e207365727665727320616e64207468652057696e646f7773204465736b746f70732c20776974686f757420696e746567726174696e67206974207769746820746865207643656e746572206f72207573696e6720564d776172652044796e616d696320456e7669726f6e6d656e74204d616e616765722028466f726d65726c79204b6e6f776e20617320564d77617265205573657220456e7669726f6e6d656e74204d616e616765722920616e6420556e69666965642041636365737320476174657761792028554147293c2f703e0d0a3c683320636c6173733d226d622d33223e4c6f676963616c2044657369676e204469616772616d3a3c2f68333e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635313438322e6a70672220616c743d22222077696474683d2235302522202f3e3c2f703e0d0a3c68333e44657369676e204578706c616e6174696f6e3a3c2f68333e0d0a3c703e436f6e7369646572696e6720746865206c696d69746174696f6e206f662074686520765370686572652076657273696f6e2072756e6e696e67206f6e20746865206f6e2d7072656d20736974652c207765206465636964656420746f2075736520746865204e6174697665204157532c20776869636820776f756c6420616c6c6f7720757320746f2075736520616e64206465706c6f7920746865206c617465737420486f72697a6f6e20636f6d706f6e656e74732076657273696f6e73206f6e20746865206c61746573742057696e646f7773204f532076657273696f6e2061732077656c6c20616e64206162696c69747920746f2074616b6520616476616e7461676573206f66206e61746976656c7920617661696c61626c65204869676820417661696c6162696c697479206275696c7420696e746f204157532c206164646974696f6e616c6c7920776520776f756c6420626520636c6f73657220746f20746865204170706c69636174696f6e20696e2063617365206f6620612044522061732074686520415753206973207468652044522053697465206f662074686520637269746963616c206170706c69636174696f6e732061732077656c6c2e3c2f703e0d0a3c703e53696e63652077652063616e6e6f74206465706c6f7920616e7920564d77617265206170706c69616e636573206c696b65207643656e74657220616e6420486f72697a6f6e206f6e20746865204e6174697665204157532c20616c736f20636f6e7369646572696e672074686520637573746f6d657220776173207573696e6720646564696361746564206465736b746f707320616e6420776520646f206e6f7420686176652074686520726571756972656d656e74206f662055414720616e642044454d20616c6f6e6720776974682074686520696e746567726174696f6e20746f207643656e74657220746f2064796e616d6963616c6c792063726561746520616e6420616c6c6f63617465206465736b746f70732c20776520636f756c6420676f20696e746f2041575320776974686f757420616e79206973737565733c2f703e0d0a3c703e5765206465706c6f796564207468652050726f6420486f72697a6f6e20636f6d706f6e656e74206f6620636f6e6e656374696f6e207365727665727320696e2048412050616972207769746820646564696361746564206465736b746f707320626568696e6420697420696e207468652041575320456173742d312050726f64205650432c20776869636820776f756c6420686169722070696e206261636b20746f206f6e2d7072656d20416374697665204469726563746f72792028414429207365727669636520666f722041757468656e7469636174696f6e20616e6420776f756c6420656e7469746c6520757365727320746f2061757468656e74696361746520696e746f20746865204465736b746f707320616e6420636f6e6e656374696f6e20736572766572732e2054686520757365727320776f756c6420746865207573652074686520646564696361746564206465736b746f70732073747265616d6564207573696e6720424c41535420616e642050434f49502050726f746f636f6c7320746f2074686520486f72697a6f6e20636c69656e74732c207768696368206861766520616c6c207468652072657175697265642077696e646f7773206261736564206170706c69636174696f6e205c206167656e747320696e7374616c6c6564206f6e2069742c20776869636820776f756c6420636f6e6e656374206261636b20746f20746865206170706c69636174696f6e7320616e6420446174616261736573206261636b206f6e2d7072656d2e2053696e636520746865206e6574776f726b20636f6e6e6563746976697479206265747765656e20746865206f6e2d7072656d207369746520616e642074686520415753205650432077617320676f6f642c20776520776572652061626c6520746f2073747265616d20746865206465736b746f707320776974686f757420616e79206d616a6f72206c6174656e6379206973737565732e3c2f703e0d0a3c703e466f722074686520445220746865206f6e2d7072656d20637269746963616c206170706c69636174696f6e20696e2063617365206f662061207369746520646f776e20736974756174696f6e20776f756c64206661696c6f76657220746f2074686520456173742d322044522056504320636f6e66696775726564206f6e204157532c20736f20746f206d61696e7461696e20746865206c6f63616c697479206f662074686520486f72697a6f6e2c2077652063616e206661696c6f76657220746f20612073696d696c6172207365747570206f6e2074686520456173742d32205650432c207573696e67206120736570617261746520636f6e6e656374696f6e207365727665722055524c2e3c2f703e, 'active', 'blog', NULL, 'VMware Horizon VDI on AWS', NULL, 'undefined', NULL, '2023-03-12 19:57:35', '2023-03-17 18:44:44'),
(31, NULL, 'Cloud Migration Phases & Guide', 'cloud-migration-phases-guide', 'uploads/2023/03/25b98a5dc723b08987ecc032fd5f277e.png', 'uploads/2023/03/6f160de31dc79c2e5e8442ba38f25873.png', NULL, 'Piyush Jalan', '2023-02-08', 'Many businesses now consider moving to the public cloud to be a requirement. And, for…', 0x3c703e4d616e7920627573696e6573736573206e6f7720636f6e7369646572206d6f76696e6720746f20746865207075626c696320636c6f756420746f206265206120726571756972656d656e742e20416e642c20666f7220616e7920636c6f7564206d6967726174696f6e207061746820746f206265207375636365737366756c2c20616e20656666656374697665206d6967726174696f6e20706c616e20697320657373656e7469616c2e204d6f76696e6720746f20746865207075626c696320636c6f756420686173207365766572616c20616476616e74616765732c20696e636c7564696e67207363616c6162696c6974792c2072656c696162696c6974792c2073656375726974792c20656e68616e63656420616e616c79746963732c20616e64206469736173746572207265636f766572792e20546865206d6f737420636f6d6d6f6e20616476616e74616765206f66207075626c696320636c6f75642061646f7074696f6e2c20686f77657665722c20697320636f737420736176696e677320616e64206120666c657869626c652070726963696e67207374727563747572652c20776869636820656e7469636573206f7267616e69736174696f6e7320746f20757365207075626c696320636c6f75642073657276696365732e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635313732382e706e672220616c743d2222202f3e3c2f703e0d0a3c703e4d6967726174696e672063757272656e7420776f726b6c6f61647320746f20746865207075626c696320636c6f75642c20706172746963756c61726c792074686f736520776974682061206c6172676520616d6f756e74206f6620646174612c20697320776964656c792070657263656976656420617320686172642c2074696d652d636f6e73756d696e672c20616e642068617a6172646f75732e20486f77657665722c20776974682070726f706572207072657061726174696f6e2c20627573696e65737320495420636f6d70616e696573206d617920717569636b6c79206275696c6420657863656c6c656e74206d6967726174696f6e2070726f6365647572657320746f206578706564697465206d6967726174696f6e7320616e6420726564756365207269736b2e20467572746865726d6f72652c206d6967726174696f6e20746563686e6f6c6f67792069732072617069646c7920656d657267696e6720746f20736572766520746865206f7267616e69736174696f6e2e20546f20656e7375726520746865206d6967726174696f6e2070726f63657373206973207375636365737366756c2c20616e7920636c6f7564206d6967726174696f6e2070726f6a656374206d7573742062652062726f6b656e20646f776e20696e746f207068617365732e205468657365206172652074686520646966666572656e74207068617365732074686174206e65656420746f2062652074616b656e20696e746f206163636f756e743a3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637383635313735392e706e672220616c743d22222077696474683d223130323422206865696768743d2235303622202f3e3c2f703e0d0a3c683320636c6173733d226d742d33223e417373657373206f7220446973636f766572792050686173653c2f68333e0d0a3c703e43686f6f736520796f7572206d6967726174696f6e207465616d2066697273742e20546865206170707320746861742077696c6c206265206d696772617465642073686f756c64206265206964656e746966696564207768656e20796f75206861766520617373656d626c656420796f7572207465616d206f6620696e7465726e616c207374616b65686f6c646572732e205069636b696e67207768696368206170707320746f206d69677261746520666972737420746f2074686520636c6f7564206973206120676f6f6420706c61636520746f2073746172742e2046696e64696e67206170706c69636174696f6e20646570656e64656e636965732c20636c6f75642072656164696e6573732c206170706c69636174696f6e2073657276696365206c6576656c2061677265656d656e74732c20706879736963616c206f72207669727475616c20696e6672617374727563747572652c20616e64206f7468657220666163746f727320617265206f6e6c79206120666577206f6620746865206e756d65726f757320666163746f727320746861742077696c6c20696e666c75656e6365207072696f726974792e3c2f703e0d0a3c756c20636c6173733d226c6973742d6170706c69636174696f6e223e0d0a3c6c693e44657465726d696e652074686520636170616369747920616e64207265736f7572636573207468617420796f7572206170706c69636174696f6e206e656564733c2f6c693e0d0a3c6c693e4c69737420616c6c20746865206170706c69636174696f6e7320746861742061726520757020666f7220636c6f7564206d6967726174696f6e3c2f6c693e0d0a3c6c693e4964656e7469667920657373656e7469616c207374616b65686f6c6465727320746f20696e636c756465206561726c7920696e207468652070726f636573733c2f6c693e0d0a3c6c693e4964656e7469667920746865206170707320746861742061726520636c6f75642072656164793c2f6c693e0d0a3c6c693e4964656e7469667920746865206e6574776f726b20636f6e66696775726174696f6e7320616e6420696e746572646570656e64656e63696573206265747765656e206170706c69636174696f6e732e3c2f6c693e0d0a3c6c693e50726f7669646520736563757269747920616e64206c6567616c20636f6d706c69616e63652073706563696669636174696f6e733c2f6c693e0d0a3c6c693e56657269667920534c4120616e64206869676820617661696c6162696c697479207374616e64617264733c2f6c693e0d0a3c6c693e4578616d696e652074686520746f6f6c7320616e64206c6963656e7365733c2f6c693e0d0a3c6c693e46696e616e6369616c204576616c756174696f6e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e506c616e6e696e6720616e642044657369676e2050686173653c2f68333e0d0a3c703e54686520706c616e6e696e6720616e642064657369676e2070686173652069732074686520666f756e646174696f6e206f6620616e7920636c6f7564206d6967726174696f6e206566666f72742e205468652073756363657373206f6620746865206d6967726174696f6e2070726f6a65637420646570656e6473206f6e2063686f6f73696e672074686520617070726f707269617465206d6967726174696f6e20737472617465677920617420746869732070686173652c2077686963682068617320746865206d6f737420696e666c75656e6365206f6e2074686520656e74697265206d6967726174696f6e2070726f636573732e204120636f73742d65666665637469766520636c6f75642070726f76696465722c2073657276696365206d6f64656c2c20746f6f6c732c206175746f6d6174696f6e2c20616e642061207472757374776f72746879206e6574776f726b20636f6e6e656374697669747920736f6c7574696f6e206d7573742062652073656c656374656420696e2074686520706c616e6e696e6720616e642064657369676e20706861736520746f206d69677261746520776f726b6c6f61647320746f2074686520636c6f75642e3c2f703e0d0a3c756c20636c6173733d226c6973742d6170706c69636174696f6e223e0d0a3c6c693e5069636b206120737472617465677920666f722065616368206170706c69636174696f6e3a2068747470733a2f2f7777772e696e747569746976652e636c6f75642f636c6f75642d6d6967726174696f6e2d737472617465676965732d776974682d6177732d636c6f75642f3c2f6c693e0d0a3c6c693e506c616e20616e642064657369676e2074686520636c6f756420696e66726173747275637475726520696e636c7564696e67207365727669636573206c696b65206e6574776f726b696e672c2073656375726974792c2073746f72616765206574632e3c2f6c693e0d0a3c6c693e437265617465206d6967726174696f6e20706c616e20666f7220626f7468206170707320616e6420746865697220646174613c2f6c693e0d0a3c6c693e437269746963616c20616e642073656e7369746976652064617461206d6967726174696f6e20706c616e3c2f6c693e0d0a3c6c693e4879627269642064617461206d6967726174696f6e2073747261746567793c2f6c693e0d0a3c6c693e436f6e736964657220646174612050726f74656374696f6e2c206d616b65207375726520616c6c206461746120697320656e637279707465643c2f6c693e0d0a3c6c693e506c616e20666f722053697a6520616e642074797065206f6620646174612074686174206e6565647320746f206265206d696772617465643c2f6c693e0d0a3c6c693e436f6e73696465722053656375726564204e6574776f726b20636f6e6e65637469766974792077697468207265737472696374696f6e7320696e2074686520626567696e6e696e673c2f6c693e0d0a3c6c693e5650432073656375726974792067726f75707320496e626f756e6420616e64206f7574626f756e6420706f727473207265737472696374696f6e3c2f6c693e0d0a3c6c693e417070726f707269617465204964656e7469747920616e6420616363657373206d616e6167656d656e7420706f6c69636965733c2f6c693e0d0a3c6c693e4d6f6e69746f72696e67206f66206e6574776f726b20616e6420636c6f75642073657276696365733c2f6c693e0d0a3c6c693e456e73757265207468617420616c6c207075626c696320636c6f756420636f6d706c69616e636520706f6c69636965732061726520666f6c6c6f7765643c2f6c693e0d0a3c6c693e506c616e207468652074696d6520726571756972656420666f72206170706c69636174696f6e206375746f7665723c2f6c693e0d0a3c2f756c3e0d0a3c68333e4d6967726174696f6e2050686173653c2f68333e0d0a3c703e496620796f7526727371756f3b766520646f6e65206120636f6d70726568656e73697665206576616c756174696f6e20616e6420706c616e6e696e672c20796f7572206d6967726174696f6e2070726f6a6563742073686f756c64206265206f6e207061746820666f7220737563636573732e20486176696e672061206d6967726174696f6e20736f6c7574696f6e207468617420616c6c6f777320796f7520746f2072657665727420746f20746865206f6e2d7072656d69736573207365747570206d617920616c736f2062652071756974652062656e6566696369616c206174207468697320706572696f642e20497420656c696d696e61746573207269736b2066726f6d20746865206d6967726174696f6e2070726f6365737320627920616c6c6f77696e6720796f7520746f2072657475726e20746f2c20616c7465722c20616e642072657065617420746865206d6967726174696f6e206465706c6f796d656e742e2054686520696d706c656d656e746174696f6e206f6620436f6d707574652c2053746f726167652c2044617461626173652c204170706c69636174696f6e2c205365637572697479206672616d65776f726b732c204e6574776f726b2c206c6f61642062616c616e63696e6720616e64206f74686572206261736520617263686974656374757265206c6576656c20636f6e66696775726174696f6e73206973207265717569726564206261736564206f6e207468652066696e616c6973656420636c6f7564206172636869746563747572652026616d703b2064657369676e2e3c2f703e0d0a3c756c20636c6173733d226c6973742d6170706c69636174696f6e223e0d0a3c6c693e576f726b6c6f6164206d6967726174696f6e20284d696772617465206163636f7264696e6720746f2074686520706c616e2063726561746564293c2f6c693e0d0a3c6c693e44617461206d6967726174696f6e20284d696772617465206163636f7264696e6720746f2074686520706c616e2063726561746564293c2f6c693e0d0a3c6c693e56616c69646174696f6e20616e64206375746f7665723c2f6c693e0d0a3c6c693e4d6f6e69746f72696e6720746f6f6c7320696e746567726174696f6e3c2f6c693e0d0a3c6c693e4170706c7920746865206c6573736f6e206c6561726e65643c2f6c693e0d0a3c2f756c3e0d0a3c68333e4f7065726174696f6e7320616e64204f7074696d69736174696f6e2050686173653c2f68333e0d0a3c703e546865206e657874207068617365206166746572206d6967726174696f6e206973206f7074696d69736174696f6e20616e64206f7065726174696f6e2e20497426727371756f3b73206372756369616c20746f20636865636b207468617420746865206d6967726174656420636c6f756420656e7669726f6e6d656e74206973207361666520616e64206f7074696d616c2e20496e206164646974696f6e20746f206d6f6e69746f72696e6720616e64206f7074696d69736174696f6e2c20697426727371756f3b7320637269746963616c20746f20656e73757265207468617420746865206e657720636c6f756420656e7669726f6e6d656e7420636f6d706c696573207769746820616c6c20627573696e65737320616e6420726567696f6e616c20726567756c61746f727920726571756972656d656e74732e20466f7220696e7374616e63652c20796f752068617665206d6f72652066726565646f6d20746f2070726f766973696f6e20616e64206d6f64696679207468652073697a6520616e642074797065206f6620616e20696e7374616e636520696e2074686520636c6f7564206261736564206f6e2061637475616c2064656d616e642e20417320796f7520636f6e74696e756520746f206f7074696d697a652c206b65657020616e20657965206f757420666f722070726f647563742075706772616465732066726f6d20796f757220636c6f75642076656e646f7220616e6420646f6e26727371756f3b74206265206865736974616e7420746f20747279206e6577207468696e67732e3c2f703e0d0a3c756c20636c6173733d226c6973742d6170706c69636174696f6e223e0d0a3c6c693e456d706f77657220495420746f207375636365737366756c6c79206d616e616765206f6e676f696e67206f7065726174696f6e733c2f6c693e0d0a3c6c693e56616c69646174696f6e20616e642074657374696e67206f6620616c6c20736563757269747920746f6f6c732c206672616d65776f726b2c20616e642049414d20706f6c69636965732061726520636f6e666967757265642c20616e642070726976696c6567657320617265206772616e7465642061732070657220726f6c65732c20746f2061766f696420616e792073656375726974792062726561636865733c2f6c693e0d0a3c6c693e547261636b20616c6c2075736573206f6620636c6f7564207265736f757263657320616e6420656e61626c652062696c6c696e6720616e616c7973697320284d6f6e69746f7220636c6f756420636f737473293c2f6c693e0d0a3c6c693e496d706c656d656e74207363616c696e67206f72206275727374696e6720746f20696d70726f7665207573657220657870657269656e63653c2f6c693e0d0a3c2f756c3e0d0a3c703e5765622d626173656420617070732c206d6963726f73657276696365732c206269672064617461206c616b6573207573656420666f7220616e616c797469637320616e642072657365617263682c20636f6e7461696e6572732c2067656e6572616c20627573696e657373206170706c69636174696f6e732c20616e6420496e7465726e6574206f66205468696e6773206172652074686520746f70207461726765747320666f72207075626c696320636c6f7564206d6967726174696f6e2c206163636f7264696e6720746f2063757272656e7420696e6475737472792072657365617263682e3c2f703e, 'active', 'blog', NULL, 'Cloud Migration Phases & Guide', NULL, 'undefined', NULL, '2023-03-12 20:05:47', '2023-03-17 18:44:10');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(35, NULL, 'Cloud well-architected review', 'cloud-well-architected-review', 'uploads/2023/03/944a3a28c2e49d67388e37d08da39628.png', 'uploads/2023/03/c1491c2273844ace78c52312e8fa5970.png', NULL, 'Khushi Carpenter, Manan Goradiya', '2022-07-05', 'This article will aid you to align your architectural decisions to cloud best practices...', 0x3c68333e434c4f55442057454c4c2d4152434849544543544544205245564945573c2f68333e0d0a3c703e3c656d3e22466f722073797374656d73207468617420617265206275696c7420746f206c6173742c205468652057656c6c2d4172636869746563746564204672616d65776f726b206973206120626c6173742e223c2f656d3e3c2f703e0d0a3c703e546869732061727469636c652077696c6c2061696420796f7520746f20616c69676e20796f7572206172636869746563747572616c206465636973696f6e7320746f20636c6f75642062657374207072616374696365732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e574859204f505420464f5220434c4f55442057454c4c204152434849544543544544205245564945573a3c2f68333e0d0a3c703e436c6f75642057656c6c2d41726368697465637465642072657669657720656e61626c657320796f7520746f206c6561726e2061626f7574207468652062656e656669747320616e6420647261776261636b73206f66206465636973696f6e7320796f75206d616b65207768656e20646576656c6f70696e67207468652073797374656d73206f6e2074686520636c6f75642e205468652077656c6c2d6172636869746563746564206672616d65776f726b20707265706172657320796f75206f6e2074686520626573742070726163746963657320746f2064657369676e2026616d703b206f7065726174652072656c6961626c652c207365637572652c20636f73742d6f7074696d697a65642c20616e64207375737461696e61626c6520636c6f756420656e7669726f6e6d656e74732e20497420616c736f2070726f7669646573206120726f61646d617020746f20636f6e7374616e746c7920636f6d7061726520746865206172636869746563747572657320746f2074686520626573742070726163746963657320616e642070696e706f696e74732074686520617265617320666f7220726566696e656d656e742077697468207468652068656c70206f6620766172696f75732057656c6c2d417263686974656374656420746f6f6c7320617661696c61626c652066726f6d20646966666572656e7420636c6f75642070726f7669646572732061732077656c6c2061732074686972642d706172747920746f6f6c732e3c2f703e0d0a3c703e546865207265766965772070726f63657373206973206e6f742061207363727574696e697a696e67206d656368616e69736d2c2072617468657220697420666f6375736573206d6f7265206f6e20746865206172636869746563747572616c2063686f6963657320796f75206d616b652e20497426727371756f3b73206d6f7265206c696b6520686176696e67206120646f742d7065726665637420617070726f6163682074686174206c6561647320746f776172647320746865206a6f75726e6579206f6620657863656c6c656e63652e2048656e63652c2074686520707572706f7365206f66207468652072657669657720697320746f20756e636f76657220616e792076756c6e65726162696c697469657320696e207468652061726368697465637475726520616e6420737567676573742073756767657374696f6e7320666f72206f7074696d697a6174696f6e2e3c2f703e0d0a3c68333e50494c4c415253204f462057454c4c2d4152434849544543544544204652414d45574f524b3a3c2f68333e0d0a3c703e3c7374726f6e673e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6173736574732f696d672f626c6f672d696e6e65722f57454c4c2d41524348495445435445442d5245564945572d312e706e67222077696474683d22353030707822202f3e3c2f7374726f6e673e3c2f703e0d0a3c703e3c7374726f6e673e4f7065726174696f6e616c20457863656c6c656e63653a266e6273703b3c2f7374726f6e673e546869732070696c6c61722069732061626f7574206d616b696e672073757265207468652073797374656d20626f756e636573206261636b2066726f6d20616e79206869636375707320616e6420616c776179732068617320656e6f75676820706f77657220746f206b65657020757020776974682077686174206973206e65656465642e20497427732061626f7574206120736d6172742064657369676e20746861742063616e2068616e646c652070726f626c656d732c20612066617374207265636f7665727920746861742068617070656e73206175746f6d61746963616c6c792c20616e642074686520706f77657220746f2066697820697473656c66213c2f703e0d0a3c703e3c7374726f6e673e53656375726974793a3c2f7374726f6e673e266e6273703b5468652061696d206f6620746869732070696c6c617220697320746f2073656375726520696e666f726d6174696f6e2c2073797374656d732c20616e6420617373657473207768696c65207374696c6c206d61696e7461696e696e672074686520627573696e65737365732070726f647563746976697479207468726f7567682070726f706572207269736b206d616e6167656d656e742e205468697320696e766f6c76657320666f6c6c6f77696e67206365727461696e2067756964656c696e657320737563682061732065737461626c697368696e67206120736f6c6964206964656e7469747920626173652c206775617264696e6720646174612c20616e64206d61696e7461696e696e6720736563757265206e6574776f726b2064657369676e732e3c2f703e0d0a3c703e3c7374726f6e673e52656c696162696c6974793a3c2f7374726f6e673e266e6273703b54686520656d706861736973206f6620746869732070696c6c6172206973206f6e207468652073797374656d277320726573696c69656e636520616e6420697473206361706162696c69747920746f207265636f7665722066726f6d206661696c75726573207768696c6520616c736f20616371756972696e6720746865206e656365737361727920636f6d707574696e67207265736f75726365732061732072657175697265642e205468697320656e636f6d70617373657320636f6e63657074732073756368206173206372656174696e672061206661696c7572652d726573697374616e742064657369676e2c206175746f6d6174696e67207265636f76657279206d656368616e69736d732c20616e6420696e636f72706f726174696e672073656c662d6865616c696e672066656174757265732e3c2f703e0d0a3c703e3c7374726f6e673e506572666f726d616e636520456666696369656e63793a3c2f7374726f6e673e266e6273703b54686520656d706861736973206f6620746869732070696c6c6172206973206f6e206d616b696e6720746865206d6f73742065666665637469766520757365206f6620636f6d707574696e67207265736f757263657320746f206d6565742073797374656d20726571756972656d656e747320616e642061766f696420616e7920756e6e656365737361727920776173746167652e205468697320696e766f6c766573206164686572696e6720746f207072696e6369706c6573207375636820617320656d706c6f79696e67206175746f2d7363616c696e6720746f206d616e616765207265736f75726365732064796e616d6963616c6c792c207573696e6720636f73742d656666696369656e742073746f72616765206f7074696f6e7320666f7220646174612073746f726167652c20616e64206f7074696d697a696e6720636f6d707574696e6720776f726b6c6f61647320746f20726564756365206c6174656e63792e3c2f703e0d0a3c703e3c7374726f6e673e436f7374204f7074696d697a6174696f6e3a3c2f7374726f6e673e266e6273703b546869732070696c6c617220666f6375736573206f6e207265647563696e67206f72206d696e696d697a696e6720616e7920756e6e656365737361727920657870656e736573206173736f6369617465642077697468206f7065726174696e6720616e64207574696c697a696e672073797374656d732e205468697320656e636f6d706173736573207072696e6369706c65732073756368206173207574696c697a696e67206d616e6167656420736572766963657320746f206465637265617365206f7065726174696f6e616c2062757264656e2c206d6178696d697a696e67207265736f75726365207574696c697a6174696f6e2c20616e64206d6f6e69746f72696e6720757361676520746f206964656e7469667920636f73742d736176696e67206f70706f7274756e69746965732e3c2f703e0d0a3c703e3c656d3e2254686520666976652070696c6c617273206f66207468652077656c6c206172636869746563746564206672616d652c2057696c6c206b65657020796f75722073797374656d732072756e6e696e6720616e642072656475636520616e7920626c616d652e223c2f656d3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5245564945572050524f434553533a3c2f68333e0d0a3c703e5468652070726f6365647572657320746861742063616e20626520657865637574656420746f20706572666f726d20612077656c6c2d617263686974656374656420726576696577206f6620796f7572206f7267616e697a6174696f6e277320636c6f756420696e66726173747275637475726520696e636c7564653a3c2f703e0d0a3c6f6c3e0d0a3c6c693e3c753e446566696e65207468652073636f7065206f6620746865207265766965773a3c2f753e266e6273703b4964656e746966792074686520746172676574656420676f616c7320616e64206172656173206f6620656d70686173697320666f7220746865207265766965772e20466f7220696e7374616e63652c206f6e65206f626a65637469766520636f756c6420626520746f20636f6e737472756374206120726f6275737420616e6420736563757265206172636869746563747572616c2064657369676e2e3c2f6c693e0d0a3c6c693e3c753e47617468657220696e666f726d6174696f6e3a3c2f753e266e6273703b4761746865722072656c6576616e74206461746120616e6420696e666f726d6174696f6e2c207375636820617320617263686974656374757265206469616772616d732e3c2f6c693e0d0a3c6c693e3c753e4576616c7561746520746865206172636869746563747572653a3c2f753e266e6273703b526576696577207468652064657369676e20616e64206f7065726174696f6e616c2061737065637473206f662074686520636c6f756420736f6c7574696f6e20616761696e73742074686520666976652070696c6c617273206f6620636c6f756420636f6d707574696e672e3c2f6c693e0d0a3c6c693e3c753e4964656e7469667920617265617320666f7220696d70726f76656d656e743a3c2f753e266e6273703b446973636f76657220616e7920706f74656e7469616c206172636869746563747572616c20666c61777320616e642070726f766964652073756767657374696f6e7320666f7220656e68616e63656d656e742e3c2f6c693e0d0a3c6c693e3c753e446576656c6f70206120706c616e20666f7220696d706c656d656e746174696f6e3a3c2f753e266e6273703b437265617465206120706c616e20666f72206361727279696e67206f7574207468652073756767657374656420696d70726f76656d656e74732066726f6d20746865206576616c756174696f6e20666f722074686520756c74696d617465206465706c6f796d656e742e3c2f6c693e0d0a3c2f6f6c3e0d0a3c68313e3c7374726f6e673e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d222e2e2f2e2e2f2e2e2f6173736574732f696d672f626c6f672d696e6e65722f57454c4c2d41524348495445435445442d5245564945572d322e706e67222077696474683d22353030707822206865696768743d22353030707822202f3e3c2f7374726f6e673e3c2f68313e0d0a3c683320636c6173733d226d742d6c672d34223e434f4e434c5553494f4e3a3c2f68333e0d0a3c703e4120436c6f75642057656c6c2d41726368697465637465642052657669657720697320616e20657373656e7469616c20746f6f6c20666f72206f7267616e697a6174696f6e73207468617420617265206c6f6f6b696e6720746f206d6178696d697a65207468652062656e6566697473206f6620636c6f756420746563686e6f6c6f6779207768696c65206d696e696d697a696e67207269736b732e20546865207265766965772070726f7669646573206120636f6d70726568656e73697665206173736573736d656e74206f6620796f757220636c6f756420696e6672617374727563747572652026616d703b20736572766963657320616e642070726f7669646573207265636f6d6d656e646174696f6e73206f6e20686f7720746f20696d70726f76652074686569722064657369676e2026616d703b206465706c6f796d656e742e20427920636f6e64756374696e6720612057656c6c2d4172636869746563746564207265766965772c206f7267616e697a6174696f6e732063616e20656e73757265207468617420746865697220636c6f756420696e6672617374727563747572652026616d703b20736572766963657320617265207365637572652c2072656c6961626c652c20656666696369656e742c206f7065726174696f6e616c6c7920657863656c6c656e742c20616e6420636f73742d6566666563746976652e3c2f703e, 'active', 'blog', NULL, 'Cloud well-architected review', NULL, 'undefined', NULL, '2023-03-14 16:04:02', '2023-03-20 17:32:51'),
(37, NULL, 'Terraform - Revolutionizing Infrastructure Management', 'terraform-revolutionizing-infrastructure-management', 'uploads/2023/03/9dc5ad961cb8a327c6a777b22b274d80.png', 'uploads/2023/03/7380e6471dfef27571be29acbb1178c5.png', NULL, 'Omshree Butani', '2022-08-11', 'This blog will take you on an intriguing voyage to Terraform...', 0x3c68333e266c6471756f3b436f646520596f75722057617920746f2042657474657220496e667261737472756374757265204d616e6167656d656e742077697468205465727261666f726d26726471756f3b3c2f68333e0d0a3c703e5468697320626c6f672077696c6c2074616b6520796f75206f6e20616e20696e7472696775696e6720766f7961676520746f205465727261666f726d2e205465727261666f726d20737570706f727465642041575320616e64204469676974616c204f6365616e206174207468652074696d65206f662069747320696e74726f64756374696f6e20696e204a756c7920323031342e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e57686174206973205465727261666f726d3f3c2f68333e0d0a3c703e5465727261666f726d206973207573656420746f206175746f6d6174652026616d703b206d616e61676520796f757220696e6672617374727563747572652c20706c6174666f726d2c20616e6420736572766963657320746861742072756e206f6e207468617420706c6174666f726d2e205465727261666f726d206973206120706f77657266756c206f70656e736f757263652049614320746f6f6c206f666665726564206279204861736869436f72702c20776869636820757365732061206465636c6172617469766520617070726f61636820746f2063726561746520696e6672617374727563747572652e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e50726f626c656d73206265666f7265205465727261666f726d3c2f68333e0d0a3c703e4265666f72652074686520616476656e74206f66205465727261666f726d2c20696e667261737472756374757265206d616e6167656d656e7420776173206120746564696f75732c2074696d652d636f6e73756d696e672c20616e64206572726f722d70726f6e652070726f6365737320746861742072656c696564206f6e206d616e75616c2073637269707473206f7220636f6e66696775726174696f6e2066696c65732e204974206c656420746f20696e636f6e73697374656e63696573206163726f737320646966666572656e7420656e7669726f6e6d656e74732c206d616b696e6720697420646966666963756c7420746f20747261636b206368616e6765732c206c61636b696e672076657273696f6e20636f6e74726f6c20616e64206f6674656e20726573756c74696e6720696e20646570656e64656e6379206973737565732061732076617269656420636f6d706f6e656e74732072656c696564206f6e2065616368206f746865722e20417320696e667261737472756374757265206772657720616e6420626563616d6520636f6d706c65782c206d616e75616c206d616e6167656d656e7420626563616d6520696e6372656173696e676c7920646966666963756c7420746f206d61696e7461696e2026616d703b207363616c652c20726573756c74696e6720696e206672657175656e74206572726f727320616e6420736c6f77206465706c6f796d656e74732e205465727261666f726d2070726f7669646573206120736f6c7574696f6e206279206175746f6d6174696e6720696e667261737472756374757265206d616e6167656d656e7420616e6420656e61626c696e6720757365727320746f20646566696e6520696e66726173747275637475726520617320636f64652c207468657265627920656c696d696e6174696e67206d616e79206f66207468652070726f626c656d73206173736f6369617465642077697468206d616e75616c20696e667261737472756374757265206d616e6167656d656e742e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5768617420697320496e667261737472756374757265206173206120436f64653f3c2f68333e0d0a3c703e496e66726173747275637475726520617320436f6465202849614329206973206120736f66747761726520656e67696e656572696e67207072616374696365207468617420656e61626c657320746865206d616e6167656d656e74206f6620495420696e667261737472756374757265207573696e6720636f64652e2049614320616c6c6f777320796f7520746f20646566696e6520616e642070726f766973696f6e20696e667261737472756374757265207265736f75726365732c207375636820617320736572766572732c206e6574776f726b732c20616e642073746f726167652c207573696e6720636f646520696e7374656164206f66206d616e75616c2070726f6365737365732e20427920646f696e6720736f2c2069742070726f766964657320612077617920746f206175746f6d61746520746865206372656174696f6e2c206d6f64696669636174696f6e2c20616e642064656c6574696f6e206f6620696e667261737472756374757265207265736f75726365732e204974207374616e64617264697a657320696e667261737472756374757265206465706c6f796d656e7473206163726f737320646966666572656e7420656e7669726f6e6d656e74732e2049614320746f6f6c7320616c6c6f7720796f7520746f20777269746520636f646520746861742064657363726962657320796f757220696e66726173747275637475726520696e2061206465636c61726174697665207761792c20656e61626c696e6720796f7520746f20747261636b206368616e6765732c20726575736520636f64652c20616e64207465737420796f757220696e667261737472756374757265206265666f7265206465706c6f79696e672069742e205468697320617070726f61636820746f20696e667261737472756374757265206d616e6167656d656e74206f6666657273207365766572616c2062656e65666974732c20696e636c7564696e67206661737465722074696d652d746f2d6d61726b65742c20696d70726f766564206167696c6974792c20616e6420626574746572207363616c6162696c6974792e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e486f7720646f6573205465727261666f726d20576f726b3f3c2f68333e0d0a3c703e546f206372656174652026616d703b206d616e616765207265736f7572636573206f6e20636c6f756420706c6174666f726d7320616e64206f746865722073657276696365732c205465727261666f726d206c6576657261676573206170706c69636174696f6e2070726f6772616d6d696e6720696e7465726661636573202841504973292e2050726f76696465727320656e61626c65205465727261666f726d20746f20696e746567726174652077697468207669727475616c6c7920616e7920706c6174666f726d206f72207365727669636520746861742068617320616e2061636365737369626c65204150492e205465727261666f726d20686173206f766572203130302070726f76696465727320616e642031303030207265736f75726365732e3c2f703e0d0a3c703e5468657265206172652074687265652073746167657320746f20746865205465727261666f726d20776f726b666c6f773c2f703e0d0a3c6f6c3e0d0a3c6c693e54686520577269746520737461676520646566696e657320696e66726173747275637475726520696e20636f6e66696775726174696f6e2066696c65732e3c2f6c693e0d0a3c6c693e54686520506c616e2073746167652072657669657720746865206368616e6765732074686174205465727261666f726d2077696c6c206d616b6520746f20796f757220696e6672617374727563747572652e3c2f6c693e0d0a3c6c693e496e20746865204170706c79207374616765205465727261666f726d2070726f766973696f6e7320796f757220696e66726173747275637475726520616e642075706461746573207468652073746174652066696c652e3c2f6c693e0d0a3c2f6f6c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f5465727261666f726d2e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5445525241464f524d20494e204a555354203420434f4d4d414e4453213c2f68333e0d0a3c703e505245524551554953495445533c2f703e0d0a3c756c3e0d0a3c6c693e446f776e6c6f6164205465727261666f726d20616e6420696e7374616c6c206974206f6e20796f7572206465766963652e20546170206865726520746f20646f776e6c6f6164205465727261666f726d2e3c2f6c693e0d0a3c6c693e53657420757020616e20415753206163636f756e742077697468206173736f6369617465642063726564656e7469616c7320746f20616c6c6f77206372656174696f6e206f66207265736f75726365732e3c2f6c693e0d0a3c6c693e496e7374616c6c2041575320434c49206f6e20796f7572206465766963652e20546170206865726520746f20646f776e6c6f61642041575320434c492e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e5445525241464f524d20494e49543a3c2f68333e0d0a3c703e596f752073686f756c642072756e20746865205465727261666f726d20696e697420636f6d6d616e642061667465722077726974696e6720796f7572205465727261666f726d20636f6465206f7220636c6f6e696e67206578697374696e67205465727261666f726d20636f64652e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e3c656d3e5768617420446f657320746865205465727261666f726d20496e697420436f6d6d616e6420446f3f3c2f656d3e3c2f68333e0d0a3c703e5465727261666f726d20696e697420706572666f726d7320666f6c6c6f77696e6720737465707320746f20707265706172652074686520776f726b696e67206469726563746f727920666f72205465727261666f726d207573653a3c2f703e0d0a3c756c3e0d0a3c6c693e4261636b656e6420496e697469616c697a6174696f6e3c2f6c693e0d0a3c6c693e506c7567696e20496e7374616c6c6174696f6e3c2f6c693e0d0a3c6c693e4368696c64204d6f64756c6520496e7374616c6c6174696f6e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e5445525241464f524d20504c414e3a3c2f68333e0d0a3c703e546865266e6273703b3c656d3e5465727261666f726d20706c616e3c2f656d3e266e6273703b636f6d6d616e6420646f6573207468726565207468696e67733a3c2f703e0d0a3c756c3e0d0a3c6c693e4d61696e7461696e7320746865207374617465206f6620616e79206578697374696e672072656d6f746520696e6672617374727563747572652062792072656164696e67206974732063757272656e742073746174652e3c2f6c693e0d0a3c6c693e416e616c797a652074686520646966666572656e636573206265747765656e207468652063757272656e7420636f6e66696775726174696f6e20616e6420746865207072696f722073746174652e3c2f6c693e0d0a3c6c693e4120736572696573206f66206368616e676573206172652070726f706f73656420746f206d616b65207468652072656d6f746520696e66726173747275637475726520636f6e73697374656e7420776974682063757272656e7420636f6e66696775726174696f6e2e3c2f6c693e0d0a3c2f756c3e0d0a3c703e54686520677265656e202b2073796d626f6c20696e64696361746573206120266c7371756f3b63726561746526727371756f3b20616374696f6e2e20266c7371756f3b4368616e67657326727371756f3b2061726520696e6469636174656420627920612079656c6c6f77207e2c20616e6420266c7371756f3b64656c6574696f6e7326727371756f3b2061726520696e646963617465642062792061202d207369676e2e3c2f703e0d0a3c703e3c656d3e5445525241464f524d204150504c593c2f656d3e3c2f703e0d0a3c703e416374696f6e732073756767657374656420696e2061205465727261666f726d20706c616e206172652065786563757465642062792074686520266c7371756f3b6170706c7926727371756f3b20636f6d6d616e642e204974206973207573656420746f206465706c6f7920796f757220696e6672617374727563747572652e204e6f726d616c6c79205465727261666f726d20696e697420616e6420706c616e20676574206578656375746564206265666f7265207573696e67205465727261666f726d206170706c792e3c2f703e0d0a3c703e5768617420446f657320746865205465727261666f726d204170706c7920436f6d6d616e6420446f3f3c2f703e0d0a3c703e496620746865206170706c7920636f6d6d616e6420697320657865637574656420776974686f757420616e79206f7074696f6e732c2061205465727261666f726d20706c616e20636f6d6d616e642077696c6c2062652065786563757465642066697273742c20666f6c6c6f7765642062792061207265717565737420666f7220746865207573657220746f2061677265652074686520706c616e6e656420616374696f6e73206265666f726520746865206d6f64696669636174696f6e7320617265206d6164652e3c2f703e0d0a3c703e3c656d3e5445525241464f524d2044455354524f593c2f656d3e3c2f703e0d0a3c703e546865205465727261666f726d2064657374726f7920636f6d6d616e6420656e647320746865206d616e6167656d656e74206f6620746865207265736f757263657320696e20796f75722063757272656e74205465727261666f726d2070726f6a6563742062792064656c6574696e672074686520696e667261737472756374757265207265736f75726365732073746f72656420696e207468652073746174652066696c652e205465727261666f726d20636865636b7320746865206461746120696e207468652073746174652066696c6520616761696e737420636c6f75642070726f76696465722041504973206265666f726520657865637574696e67207468652064657374726f7920636f6d6d616e6420746f20656e73757265206974732061636375726163792e20546f20646563696465207768696368207265736f75726365732073686f756c642062652072656d6f7665642066697273742c20697420696e7465726e616c6c7920636f6e73747275637473206120646570656e64656e63792067726170682e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5573652043617365733c2f68333e0d0a3c6f6c3e0d0a3c6c693e53747265616d6c696e696e6720496e6672617374727563747572652050726f766973696f6e696e673c2f6c693e0d0a3c6c693e5265647563696e6720436f73742026616d703b20436f6d706c65786974793c2f6c693e0d0a3c6c693e456e68616e63696e672053656375726974792026616d703b20436f6d706c69616e63653c2f6c693e0d0a3c6c693e416363656c65726174696e67204170706c69636174696f6e204465706c6f796d656e743c2f6c693e0d0a3c6c693e496d70726f76696e6720496e667261737472756374757265205669736962696c6974793c2f6c693e0d0a3c2f6f6c3e0d0a3c683320636c6173733d226d742d6c672d34223e416c7465726e6174697665733c2f68333e0d0a3c703e5465727261666f726d206973206120706f70756c617220746f6f6c20666f7220696e66726173747275637475726520617320636f6465202849614329206275742074686572652061726520616c736f207365766572616c20616c7465726e61746976657320617661696c61626c652e204865726520617265206120666577206e6f7461626c6520616c7465726e61746976657320746f205465727261666f726d3a3c2f703e0d0a3c6f6c3e0d0a3c6c693e41575320436c6f7564466f726d6174696f6e3c2f6c693e0d0a3c6c693e416e7369626c653c2f6c693e0d0a3c6c693e436865663c2f6c693e0d0a3c6c693e53616c74537461636b3c2f6c693e0d0a3c6c693e50756c756d693c2f6c693e0d0a3c6c693e56616772616e743c2f6c693e0d0a3c6c693e4b756265726e657465733c2f6c693e0d0a3c6c693e446f636b657220436f6d706f73653c2f6c693e0d0a3c6c693e4157532053414d3c2f6c693e0d0a3c6c693e5365727665726c657373204672616d65776f726b3c2f6c693e0d0a3c2f6f6c3e0d0a3c683320636c6173733d226d742d6c672d34223e436f6e636c7573696f6e3c2f68333e0d0a3c703e496e20436f6e636c7573696f6e205465727261666f726d20697320616e20696e66726173747275637475726520617320636f646520746f6f6c2074686174207265766f6c7574696f6e697a657320696e667261737472756374757265206d616e6167656d656e742e20497420616c6c6f777320666173746572206465706c6f796d656e74732c20626574746572207363616c6162696c6974792c20616e642072656475636564206572726f72732e20497473206d756c74692d636c6f756420737570706f727420616e64206f70656e736f75726365206e6174757265206d616b657320697420706f70756c617220616d6f6e6720646576656c6f7065727320616e6420696e667261737472756374757265207465616d732e204974206973206120706f77657266756c20746f6f6c20666f7220616368696576696e6720696e667261737472756374757265206d616e6167656d656e7420676f616c732e3c2f703e, 'active', 'blog', NULL, 'Terraform - Revolutionizing Infrastructure Management', NULL, 'undefined', NULL, '2023-03-14 19:21:18', '2023-03-17 18:35:39'),
(38, NULL, 'Why Containers are more popular than Virtual Machine?', 'why-containers-are-more-popular-than-virtual-machine-', 'uploads/2023/03/6a9e49c1b90a9c9e76f438451ba6fff3.png', 'uploads/2023/03/c1ac876636807bb89644c6534041a8dc.png', NULL, 'Jay Sheth, Het Desai, Dhruvesh Sheladiya', '2022-10-27', 'Virtualization is quite an old concept. It began in the 1960s to logically divide the system resources...', 0x3c68333e5669727475616c697a6174696f6e3c2f68333e0d0a3c703e5669727475616c697a6174696f6e20697320717569746520616e206f6c6420636f6e636570742e20497420626567616e20696e2074686520313936307320746f206c6f676963616c6c7920646976696465207468652073797374656d207265736f75726365732070726f7669646564206279206d61696e6672616d6520636f6d70757465727320696e746f20696e646976696475616c206170706c69636174696f6e732e204265696e6720616e206f6c6420746563686e6f6c6f67792c206974206973207374696c6c20612072656c6576616e742070617274206f6620636c6f756420636f6d707574696e672e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e4c657420757320737461727420776974682077686174207669727475616c697a6174696f6e2069732e3c2f68333e0d0a3c703e5669727475616c697a6174696f6e207573657320736f66747761726520746f2063726561746520616e206162737472616374206c61796572206f76657220686172647761726520616c6c6f77696e6720686172647761726520656c656d656e747320737563682061732073746f726167652c20636f6d707574696e672c20616e64206d656d6f727920746f2067657420646973747269627574656420616d6f6e67206d756c7469706c65207669727475616c206d616368696e65732028564d292e204561636820564d2068617320697473207365706172617465206f7065726174696e672073797374656d20284f53292c20616374696e67206c696b6520616e20696e646976696475616c206d616368696e65206576656e2074686f756768206974207368617265732074686520756e6465726c79696e672068617264776172652077697468206d756c7469706c65206f7468657220564d732e3c2f703e0d0a3c703e546865206162737472616374696f6e206c6179657220776520646973637573736564206561726c6965722069732061207069656365206f6620736f667477617265206b6e6f776e20617320612048797065727669736f722e2049742069732061206372756369616c20636f6d706f6e656e7420696e20746865207669727475616c697a6174696f6e2070726f636573732077686963682073657276657320617320616e20696e74657266616365206265747765656e2074686520564d20616e642074686520756e6465726c79696e6720706879736963616c2068617264776172652e20497420656e7375726573207468617420564d7320646f206e6f7420696e746572727570742065616368206f746865722e204974207374616e6473206f6e20746f70206f66206120686f7374206f72206120706879736963616c207365727665722e20546865206d61696e207461736b206f6620612068797065727669736f7220697320746f20706f6f6c207265736f75726365732066726f6d2074686520706879736963616c2073657276657220616e6420616c6c6f63617465207468656d20746f20646966666572656e74207669727475616c20656e7669726f6e6d656e74732e3c2f703e0d0a3c703e5468657265206172652074776f207479706573206f662068797065727669736f7273202d3c2f703e0d0a3c703e3c7374726f6e673e547970652031206f7220266c6471756f3b62617265206d6574616c26726471756f3b2068797065727669736f72733c2f7374726f6e673e266e6273703b41205479706520312068797065727669736f722072756e73206469726563746c79206f6e2074686520706879736963616c206861726477617265206f662074686520756e6465726c79696e67206d616368696e652c20696e746572616374696e67207769746820697473204350552c206d656d6f72792c20616e6420706879736963616c2073746f726167652e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d312e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e547970652031206f7220266c6471756f3b62617265206d6574616c26726471756f3b2068797065727669736f72733c2f7374726f6e673e266e6273703b41205479706520322068797065727669736f7220646f6573206e6f742072756e206469726563746c79206f6e2074686520756e6465726c79696e672068617264776172652e20496e73746561642c2069742072756e7320617320616e206170706c69636174696f6e20696e20616e204f532e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d322e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5669727475616c204d616368696e653c2f68333e0d0a3c703e4e6f77207468617420796f75206b6e6f772077686174207669727475616c697a6174696f6e20616e642068797065727669736f72206172652c2077652063616e206d6f7665206f6e20746f20564d732e3c2f703e0d0a3c703e41207669727475616c204d616368696e65206f7220564d206973206e6f20646966666572656e74207468616e206120706879736963616c20646576696365206c696b6520796f7572206465736b746f70206f72206c6170746f702e204120564d20616e64206120706879736963616c206465766963652061726520626f7468206d616465206f662061204350552c206d656d6f72792c20616e64206469736b2e204120706879736963616c20646576696365206973206120706879736963616c207468696e672077686572656173206120564d20697320612062756e6368206f66206c696e6573206f6620636f64652c20746861742072756e73206f6e20612048797065727669736f722e3c2f703e0d0a3c703e564d73206372656174652061207669727475616c20656e7669726f6e6d656e7420746861742073696d756c61746573206120706879736963616c20636f6d70757465722e205468657920636f6d7072697365206f6620736f6d6520636f6e66696775726174696f6e2066696c65732c207468652073746f7261676520666f7220746865207669727475616c20686172642064726976652c20616e6420736f6d6520736e617073686f7473206f662074686520564d207468617420707265736572766520697473207374617465206174206120706172746963756c61722074696d652e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d332e6a70656722202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e576861742061726520436f6e7461696e6572733f3c2f68333e0d0a3c703e436f6e7461696e6572732061726520736f66747761726520636f6d706f6e656e74732074686174207061636b616765206170706c69636174696f6e20636f64652c20616c6f6e6720776974682072657175697265642065786563757461626c65732073756368206173206c69627261726965732c20646570656e64656e636965732c2062696e61727920636f6465732c20616e6420636f6e66696775726174696f6e2066696c65732c207573696e67206f7065726174696e672073797374656d207669727475616c697a6174696f6e20696e2061207374616e64617264697a6564206d616e6e65722e20436f6e7461696e6572732063616e2072756e206f6e20766172696f757320706c6174666f726d732c20696e636c7564696e67206465736b746f70732c20747261646974696f6e616c20495420656e7669726f6e6d656e74732c20616e6420636c6f756420696e667261737472756374757265732e3c2f703e0d0a3c703e436f6e7461696e65727320617265206c696768747765696768742c20706f727461626c652c20616e642073776966742062656361757365207468657920646f206e6f7420696e636c756465206f7065726174696e672073797374656d20696d616765732c206c696b65207669727475616c206d616368696e65732e204173206120726573756c742c20746865792068617665206c657373206f7665726865616420616e642063616e206c657665726167652074686520666561747572657320616e64207265736f7572636573206f662074686520686f7374206f7065726174696e672073797374656d2c206d616b696e67207468656d20686967686c7920706f727461626c6520616e64206561737920746f206465706c6f793c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d342e6a70656722202f3e3c2f703e0d0a3c703e54686520636f6e7461696e6572206973206c696b65206120747261646974696f6e616c20495420656e7669726f6e6d656e742e2049742068617320686172647761726520616e6420616e206f7065726174696e672073797374656d2e20486f77657665722c20697420616c736f20686173206120636f6e7461696e657220656e67696e65206f6e20746f70206f66207468652068617264776172652e2054686520636f6e7461696e657220656e67696e6520736f667477617265207061636b6167657320746865206c696272617269657320616e6420646570656e64656e636965732077697468696e2074686520636f6e7461696e657220746f20656e61626c6520746865207365616d6c657373206d6f76656d656e74206f66206120636f6e7461696e65722c2066726f6d206f6e65206d616368696e6520746f20616e6f746865722e3c2f703e0d0a3c703e436f6e7461696e65727320617265206761696e696e67206d6f726520617474656e74696f6e2c20706172746963756c61726c7920696e20636c6f756420656e7669726f6e6d656e74732e205365766572616c206f7267616e697a6174696f6e732061726520636f6e74656d706c6174696e67207468656d2061732061207375627374697475746520666f7220564d732c20617320612067656e6572616c2d707572706f736520636f6d707574696e6720706c6174666f726d20666f72207468656972206170706c69636174696f6e7320616e6420776f726b6c6f6164732e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d352e6a706567222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e446966666572656e6365206265747765656e20636f6e7461696e65727320616e64207669727475616c206d616368696e65732028564d73293c2f68333e0d0a3c703e436f6e7461696e65727320616e64207669727475616c206d616368696e6573206172652074776f2064697374696e637420617070726f616368657320746f207669727475616c697a696e6720636f6d707574696e67207265736f75726365732e20564d73207669727475616c697a6520616c6c20636f6d706f6e656e747320646f776e20746f20746865206861726477617265206c6576656c2c2067656e65726174696e67206d756c7469706c6520696e7374616e636573206f66206f7065726174696e672073797374656d73206f6e20612073696e676c6520706879736963616c207365727665722e20496e20636f6e74726173742c20636f6e7461696e657273207669727475616c697a6520736f6c656c792074686520736f667477617265206c61796572732061626f766520746865206f7065726174696e672073797374656d2c20666f726d696e67206c69676874776569676874207061636b61676573207468617420696e636f72706f7261746520616c6c2074686520646570656e64656e63696573206e656564656420666f72206120736f667477617265206170706c69636174696f6e2e20436f6e7461696e6572732063616e206f706572617465206d6f726520776f726b6c6f616473206f6e20612073696e676c65206f7065726174696e672073797374656d20696e7374616e6365207468616e20564d732c206d616b696e67207468656d206661737465722c206d6f726520666c657869626c652c20616e64206d6f726520706f727461626c652e3c2f703e0d0a3c703e436f6d706172656420746f20564d732c20636f6e7461696e65727320617265206d6f7265206167696c6520616e6420706f727461626c652e20564d732072656c79206f6e20612068797065727669736f722c20616e20656d756c6174696e6720736f6674776172652c20746861742073697473206265747765656e2074686520686172647761726520616e6420746865207669727475616c206d616368696e652c20746f20656e61626c65207669727475616c697a6174696f6e206279206d616e6167696e67207468652073686172696e67206f6620706879736963616c207265736f757263657320696e746f207669727475616c206d616368696e65732e2045616368207669727475616c206d616368696e65206f70657261746573206f6e20697473206775657374206f7065726174696e672073797374656d2e204f6e20746865206f746865722068616e642c20636f6e7461696e6572732072756e206f6e20746f70206f66206120706879736963616c2073657276657220616e642069747320686f7374206f7065726174696e672073797374656d2c20616c6c6f77696e6720666f722067726561746572206167696c69747920616e6420706f72746162696c6974792e3c2f703e0d0a3c703e426f746820636f6e7461696e65727320616e6420564d732072656c79206f6e20616e206f7065726174696e672073797374656d2074686174206e6563657373697461746573206d61696e74656e616e636520666f7220666978696e67206275677320616e64206170706c79696e6720706174636865732e20486f77657665722c20636f6e7461696e65727320646f206e6f7420656e636f6d7061737320616e204f53206b65726e656c2c20696e73746561642c2074686579206c65766572616765207265736f75726365732070726f76696465642062792074686520756e6465726c79696e6720686f7374204f532c206d616b696e67207468656d206e6f7461626c7920736d616c6c65722c206167696c652c20616e64206d6f726520706f727461626c65207468616e20564d732e20436f6e7461696e657273206f6e6c79207265717569726520746865206170706c69636174696f6e20636f646520746f20626520696e636c756465642c207768657468657220697420697320612073696e676c65206d6f6e6f6c6974686963206170706c69636174696f6e206f72206d6963726f73657276696365732e205468657920617265207061636b6167656420696e206f6e65206f72206d6f726520636f6e7461696e65727320746f20706572666f726d206120627573696e6573732066756e6374696f6e2e205768696c6520564d732063616e2074616b65206d696e7574657320746f207370696e2075702c20636f6e7461696e6572732063616e20737461727420757020696e206d696c6c697365636f6e64732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e557365204361736573206f6620436f6e7461696e6572733c2f68333e0d0a3c703e3c7374726f6e673e312e20496e6372656173656420646576656c6f70657226727371756f3b732070726f6475637469766974793c2f7374726f6e673e266e6273703b5768696c652074657374696e6720616e206561726c792076657273696f6e206f6620616e206170706c69636174696f6e2c206120646576656c6f7065722063616e2072756e2069742066726f6d20746865697220504320776974686f757420686f7374696e67206974206f6e20746865206d61696e204f53206f72206372656174696e6720612074657374696e6720656e7669726f6e6d656e742e20467572746865726d6f72652c20636f6e7461696e65727320656c696d696e6174652070726f626c656d73207769746820656e7669726f6e6d656e742073657474696e67732c2068616e646c65207363616c6162696c697479206368616c6c656e6765732c20616e642073696d706c696679206f7065726174696f6e732e204265636175736520636f6e7461696e65727320736f6c7665206e756d65726f7573206368616c6c656e6765732c20646576656c6f706572732063616e20636f6e63656e7472617465206f6e20646576656c6f706d656e7420726174686572207468616e206465616c696e672077697468206f7065726174696f6e732e3c6272202f3e496e20746865736520436f6e66696775726174696f6e2066696c65732c2074686520636f6465206f6620746865206170706c69636174696f6e2c20646570656e64656e636965732c20616e64207468652072756e74696d6520656e67696e6520617265207061636b6167656420616c6c20746f67657468657220696e206120726f62757374206d616e6e6572206b6e6f776e206173206120636f6e7461696e657220746861742063616e2072756e206f6e20616e7920656e7669726f6e6d656e7420696e646570656e64656e746c792e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d362e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e322e20537570706f7274696e6720636f6e74696e756f7573206f7065726174696f6e732077697468206c6974746c6520746f206e6f20646f776e74696d653c2f7374726f6e673e266e6273703b496e20746f6461792773206469676974616c2065636f6e6f6d792c20646f776e74696d65206d65616e73206d756368206d6f7265207468616e206120627269656620706f776572206f757461676520666f72206d69642d73697a656420627573696e65737365732e20437573746f6d6572732077696c6c20676f20656c7365776865726520696620746865792063616e277420726561636820796f75206265636175736520796f75722073797374656d20697320646f776e2e204265636175736520636f6e7461696e6572206172636869746563747572652070726f76696465732061207374616e64617264697a6564206d656368616e69736d20746f20646976696465206170706c69636174696f6e20696e746f20696e646570656e64656e7420636f6e7461696e6572732c20636f6e7461696e657220617263686974656374757265206973206e61747572616c6c7920616476616e746167656f757320696e20636f6e74696e756f7573206f7065726174696f6e732e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d372e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e332e20266c6471756f3b4c6966742026616d703b20736869667426726471756f3b206578697374696e67206170706c69636174696f6e7320696e746f206d6f6465726e20636c6f756420617263686974656374757265733c2f7374726f6e673e266e6273703b546865206c6966742026616d703b20736869667420617070726f61636820696e766f6c766573206372656174696e6720696e646976696475616c20636f6e7461696e65727320666f72206561636820746965722c20776869636820686173206120636f646520666f72206120737065636966696320746965722c20616c6f6e67207769746820746865697220636f6e66696775726174696f6e2064657461696c732c20616e64206e65636573736172792072756e74696d65206c696272617269657320616e6420646570656e64656e636965732e204f6e63652074686520636f6e7461696e6572732061726520636f6e6669677572656420746f20776f726b20746f6765746865722c207468657920617265206465706c6f7961626c65206f6e207075626c69632c20707269766174652c206f722068796272696420636c6f756420656e7669726f6e6d656e74732e2057697468206c6966742026616d703b2073686966742c206f7267616e697a6174696f6e732063616e206c65766572616765207468652062656e6566697473206f66206e657720746563686e6f6c6f676965732062792072652d7061636b6167696e6720746865206170706c69636174696f6e20696e7374656164206f66206368616e67696e672069742e3c2f703e0d0a3c703e57686572652074686520747261646974696f6e616c20617263686974656374757265206973206a757374206c696674656420616e64207368696674656420746f206d6f6465726e20696e6672617374727563747572652c206974207573657320636f6e7461696e65727320776974686f757420616e79206368616e67657320696e20746865206578697374696e6720636f646520616e6420636f6e66696775726174696f6e732e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d382e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e342e20436f6e7461696e6572732063616e2072756e206f6e20496f5420646576696365733a3c2f7374726f6e673e266e6273703b5573696e6720636f6e7461696e65727320737569747320696e7374616c6c696e672026616d703b207570646174696e67206170706c69636174696f6e73206f6e20496f5420646576696365732e2054686174206973206265636175736520636f6e7461696e65727320656e636f6d7061737320616c6c2074686520726571756972656420736f66747761726520666f7220746865206170706c69636174696f6e7320746f2066756e6374696f6e2c206d616b696e67207468656d20656173696c79207472616e73706f727461626c6520616e64206c696768747765696768742c20776869636820697320706172746963756c61726c792062656e6566696369616c20666f72206465766963657320686176696e672072657374726963746564207265736f75726365732e3c2f703e0d0a3c703e3c7374726f6e673e352e20477265617420666f72204d6963726f2d73657276696365206172636869746563747572653c2f7374726f6e673e266e6273703b436f6e7461696e65727320737570706f7274206d6963726f7365727669636520617263686974656374757265732c20616c6c6f77696e6720666f72206d6f72652070726563697365206465706c6f796d656e7420616e64207363616c696e67206f66206170706c69636174696f6e20636f6d706f6e656e74732e20546865792061726520707265666572726564206f766572207363616c696e6720757020616e20656e74697265206d6f6e6f6c6974686963206170706c69636174696f6e2073696d706c792062656361757365206f6e6520636f6d706f6e656e74206973207374727567676c696e67207769746820746865206c6f61642e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d392e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e362e2048796272696420616e64206d756c74692d636c6f756420636f6d70617469626c653a3c2f7374726f6e673e266e6273703b436f6e7461696e6572732070726f7669646520666c65786962696c69747920696e20617070206465706c6f796d656e742c20616c6c6f77696e6720666f7220746865206372656174696f6e206f66206120756e696669656420656e7669726f6e6d656e7420746861742063616e2072756e206f6e2d7072656d6973657320616e64206163726f7373206d756c7469706c6520636c6f756420706c6174666f726d732e2054686973206d616b657320697420706f737369626c6520746f206f7074696d697a6520636f73747320616e6420656e68616e6365206f7065726174696f6e616c20656666696369656e6379206279206c657665726167696e67206578697374696e6720696e66726173747275637475726520616e64207574696c697a696e67207468652062656e6566697473206f6620646966666572656e7420636c6f75642070726f76696465727320776974682074686520776f726b6c6f61642e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436f6e7461696e65722d31302e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e446973616476616e7461676573206f6620436f6e7461696e6572733c2f68333e0d0a3c6f6c3e0d0a3c6c693e52756e6e696e67206d616c6963696f757320616e6420726f6775652070726f63657373657320696e20636f6e7461696e6572732e20436f6e7461696e657273206861766520612073686f7274206c6966657370616e2c20736f206974206265636f6d65732068617264657220746f206d6f6e69746f72207468656d206f72206964656e7469667920616e79206d616c6963696f75732070726f636573732e3c2f6c693e0d0a3c6c693e496620616e2061747461636b657220737563636565647320696e20616363657373696e6720746865206b65726e656c2066726f6d206120636f6e7461696e65722c20616c6c20636f6e7461696e65727320617474616368656420746f2069742077696c6c2062652061666665637465642e204173206120726573756c742c20564d732069736f6c617465206170706c69636174696f6e7320626574746572207468616e20636f6e7461696e6572732e204265636175736520636f6e7461696e65727320736861726520746865206b65726e656c206f6620746865204f532c20696620746865206b65726e656c206265636f6d65732076756c6e657261626c652c20616c6c2074686520636f6e7461696e6572732077696c6c206265636f6d652076756c6e657261626c652e3c2f6c693e0d0a3c2f6f6c3e, 'active', 'blog', NULL, 'Why Containers are more popular than Virtual Machine?', NULL, 'undefined', NULL, '2023-03-14 19:34:15', '2023-03-17 18:33:11');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(39, NULL, 'Disaster Recovery Using Infrastructure as a Code', 'disaster-recovery-using-infrastructure-as-a-code', 'uploads/2023/03/eb768fe1c2fab13527b1d23c6eb4c0bd.png', 'uploads/2023/03/945019a4cc7d20c6aa7ed913ced8668b.png', NULL, 'Sakshi Zalavadia, Devangi Goswami, Shrey Shah', '2022-12-29', 'Consider a scenario, a major disaster occurs at a large financial services organization...', 0x3c68333e576879206973204469736173746572205265636f76657279206e65656465643f3c2f68333e0d0a3c703e436f6e73696465722061207363656e6172696f2c2061206d616a6f72206469736173746572206f63637572732061742061206c617267652066696e616e6369616c207365727669636573206f7267616e697a6174696f6e2c20616e642061207369676e69666963616e742063796265722d61747461636b2072656e6465727320616c6c2074686569722049542073797374656d7320696e6f70657261626c652e20546869732061747461636b20726573756c747320696e2064617461206c6f73732c2073797374656d206661696c757265732c20616e64206e6574776f726b206f7574616765732c20616c6c206f66207768696368206861766520616e20696d70616374206f6e2074686520636f6d70616e792773206162696c69747920746f20636f6e6475637420627573696e65737320616e642070726f7669646520736572766963657320746f2069747320637573746f6d6572732e20546869732069732077686572652061204469736173746572205265636f76657279202844522920706c616e20636f6d657320696e2068616e64792e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e57686174206973204469736173746572205265636f766572793f3c2f68333e0d0a3c703e4120646973617374657220697320616e20756e666f72657365656e2069737375652074686174206361757365732061206e6574776f726b206f75746167652c20636f6e67657374696f6e2c20616e64206f746865722069737375657320696e20616e2049542073797374656d2e204469736173746572207265636f76657279206973207468652070726f63657373206f66206272696e67696e6720616c6c2074686520495420696e6672617374727563747572652c206173736574732c20616e6420766974616c2073797374656d7320746f207468656972206e6f726d616c2066756e6374696f6e696e672073746174652061667465722061206e61747572616c206f72206d616e2d6d6164652064697361737465722e20546865206c6f6e6765722069742074616b657320746f20726573746f726520637269746963616c2073797374656d7320616e64206173736574732c207468652067726561746572207468652066696e616e6369616c20696d706163742077696c6c2062652e2041204452207374726174656779206f666665727320696d706f7274616e7420616476616e746167657320616e6420656e61626c6573206f7267616e697a6174696f6e7320746f20726561637420717569636b6c7920746f206469737275707469766520696e636964656e74732e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f42656e65666974732d6f662d44697361737465722d5265636f766572792e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e547261646974696f6e616c204469736173746572205265636f76657279206d6574686f64733a3c2f68333e0d0a3c703e536f6d6520627573696e65737365732061726520636f6d70656c6c656420746f2061646f707420747261646974696f6e616c206469736173746572207265636f7665727920746f206d656574206365727461696e20636f6d706c69616e636520616e6420736563757269747920726571756972656d656e74732e20436f6d6d6f6e20747261646974696f6e616c204452206d6574686f647320696e636c7564653a3c2f703e0d0a3c6f6c3e0d0a3c6c693e4d616e75616c2070726f636564757265733a20546869732070726f63656475726520696e636c75646573206d616e75616c206461746120696e7075742c206d616e75616c207265636f6e63696c696174696f6e2c20616e64206f74686572206d616e75616c2070726f6365647572657320746861742063616e206265207573656420746f20726573756d6520726567756c617220627573696e65737320616374697669746965732e3c2f6c693e0d0a3c6c693e4261636b757020616e6420526573746f72653a20497420696e766f6c7665732073797374656d61746963616c6c79206261636b696e6720757020696d706f7274616e74206461746120616e642073797374656d7320616e64207468656e20726573746f72696e67207468656d20696e2063617365206f6620612064697361737465722e204974206d616b6573206120636f7079206f6620746865206461746120616e642073746f726573206974207365637572656c7920696e2074686520636c6f7564206f72206f6e2d7072656d697365732e3c2f6c693e0d0a3c2f6f6c3e0d0a3c703e536f6d65206f7468657220747261646974696f6e616c204452206d6574686f647320617265207669727475616c697a6174696f6e2c20686f7420736974652c20636f6c6420736974652c206574632e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e4c696d69746174696f6e73206f6620747261646974696f6e616c204469736173746572205265636f76657279206d6574686f64733a3c2f68333e0d0a3c703e547261646974696f6e616c2044522063616e20626520636f6d706c657820746f20696d706c656d656e7420616e64206d61696e7461696e2c20726571756972696e672061207369676e69666963616e7420696e766573746d656e7420696e20686172647761726520616e6420736f6674776172652c20746875732c20696e6372656173696e672074686520636f73742e2049742063616e20616c736f20726573756c7420696e2064617461206c6f73732c20657370656369616c6c79206966207468657265206973206120676170206265747765656e206261636b757073206f7220696620746865206261636b757073207468656d73656c76657320617265206c6f7374206f722064616d6167656420647572696e6720612064697361737465722e2049742063616e206576656e2074616b65206c6f6e67657220746f207265636f7665722066726f6d20612064697361737465722e20546869732063616e206c65616420746f207369676e69666963616e7420646f776e74696d6520616e642063616e20696d7061637420616e206f7267616e697a6174696f6e2773206162696c69747920746f20636f6e74696e7565206f7065726174696e672e20476976656e20746865206c696d69746174696f6e73206f6620747261646974696f6e616c204452206d6574686f64732c206d616e79206f7267616e697a6174696f6e7320617265207368696674696e6720746865697220666f63757320746f206d6f726520666c657869626c652c206661737465722c20616e6420636f73742d656666656374697665206469736173746572207265636f76657279206d6574686f64732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e4175746f6d61746564204469736173746572205265636f766572793a3c2f68333e0d0a3c703e4175746f6d61746564206469736173746572207265636f76657279206973206f6e652073756368206d6f6465726e206469736173746572207265636f76657279206d6574686f6420746861742070726f7669646573206120717569636b20616e6420666c657869626c6520736f6c7574696f6e2e204175746f6d6174656420445220736f6c7574696f6e73206175746f6d617465206b6579206469736173746572207265636f766572792070726f63657373657320737563682061732064617461207265706c69636174696f6e2c206661696c6f7665722c20616e64207265636f766572792c207265647563696e67207468652074696d652026616d703b206566666f727420726571756972656420746f207265636f7665722066726f6d20612064697361737465722e204175746f6d6174656420445220736f6c7574696f6e732063616e20616c736f2070726f76696465206f7267616e697a6174696f6e732077697468207265616c2d74696d65206d6f6e69746f72696e672026616d703b207265706f7274696e672c20616c6c6f77696e67207468656d20746f2064657465637420616e6420726573706f6e6420746f20706f74656e7469616c2064697361737465727320717569636b6c792e2054686973206d6574686f64206f66206175746f6d61746564206469736173746572207265636f766572792063616e20626520616368696576656420627920496e667261737472756374757265206173206120436f64652028496143292e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e496e74726f647563696e6720496e667261737472756374757265206173206120436f64652028496143293a3c2f68333e0d0a3c703e496143206973206120746563686e6971756520666f72206d616e6167696e6720696e6672617374727563747572652c20696e636c7564696e6720736572766572732c206e6574776f726b732c20616e642073746f726167652c206279207573696e6720636f646520616e64206175746f6d617465642070726f636564757265732e205573696e6720746869732073747261746567792c20627573696e6573736573206d6179206d616e61676520746865697220696e66726173747275637475726520696e2061206d6f7265206175746f6d617465642c206566666563746976652c20616e64207363616c61626c65207761792e204961432070726f76696465732062656e656669747320737563682061732073706565642c2076657273696f6e20636f6e74726f6c2c20656666696369656e63792c20636f6c6c61626f726174696f6e2c20616e64206d6f72652e3c2f703e0d0a3c703e506f70756c617220746f6f6c7320666f722049614320617265205465727261666f726d2c20416e7369626c652c204368656620616e64205075707065742e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f6175746f6d6174696e672d64697361737465722d7265636f766572792e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e526f61646d6170206f66204469736173746572205265636f76657279207573696e67204961433a3c2f68333e0d0a3c6f6c3e0d0a3c6c693e446566696e6520796f7572207265636f76657279206f626a65637469766573202d20446566696e696e6720796f7572207265636f7665727920676f616c7320697320746865206669727374207374657020746f7761726473206175746f6d6174696e67206469736173746572207265636f766572792e205468697320696e636c756465732073657474696e6720796f7572207265636f766572792074696d65206f626a65637469766573202852544f732920616e64207265636f7665727920706f696e74206f626a65637469766573202852504f73292c206964656e74696679696e6720796f757220766974616c2073797374656d7320616e6420646174612c20616e6420646f63756d656e74696e6720796f75722044522070726f6365737365732026616d703b2070726f636564757265732e3c2f6c693e0d0a3c6c693e41737365737320796f75722063757272656e7420696e667261737472756374757265202d20546865206e657874207374657020697320746f206576616c7561746520796f75722063757272656e7420696e66726173747275637475726520616e64206964656e7469667920616e792067617073206f722076756c6e65726162696c69746965732074686174206d757374206265206164647265737365642e204964656e74696679696e6720637269746963616c20646570656e64656e6369657320616e6420656e737572696e67207468617420616c6c2073797374656d7320616e642064617461206172652061646571756174656c792070726f74656374656420616e64206261636b65642075702061726520616c6c2070617274206f6620746869732e3c2f6c693e0d0a3c6c693e446576656c6f7020616e204175746f6d6174656420445220706c616e207573696e6720496143202d204f6e636520796f752068617665206964656e74696669656420796f7572207265636f76657279206f626a6563746976657320616e6420617373657373656420796f757220696e6672617374727563747572652c20746865206e657874207374657020697320746f2063726561746520616e204961432074656d706c617465207468617420646573637269626573207468652064657369726564207374617465206f6620796f757220696e6672617374727563747572652c20696e636c7564696e6720796f757220736572766572732c2073746f726167652c206e6574776f726b696e672c20616e64206f74686572207265736f75726365732e3c2f6c693e0d0a3c6c693e496d706c656d656e74206175746f6d61746564206261636b75707320616e64206661696c6f766572202d20546865206175746f6d61746564206261636b757020696e766f6c766573207573696e672049614320746f6f6c7320746f2063726561746520736e617073686f7473206f72206261636b757073206f6620796f757220696e667261737472756374757265206f7220696e746567726174696e672077697468206261636b757020616e64207265636f7665727920746f6f6c7320746861742063616e206175746f6d61746520746865206261636b75702070726f636573732e204175746f6d61746564206661696c6f76657220696e766f6c7665732073657474696e672075702061207365636f6e6461727920656e7669726f6e6d656e7420746861742063616e2074616b65206f76657220696e20746865206576656e74206f66206120646973617374657220616e64207573696e672049614320746f6f6c7320746f206175746f6d61746520746865206661696c6f7665722070726f636573732e3c2f6c693e0d0a3c6c693e5465737420616e6420726566696e6520796f757220445220706c616e202d20546865206e657874207374657020697320746f207465737420616e6420726566696e6520796f7572204961432074656d706c61746520616e64206175746f6d61746564206261636b75702026616d703b206661696c6f7665722070726f6365737365732e205468697320696e636c7564657320706572666f726d696e6720726567756c617220445220746573747320746f20656e73757265207468617420796f75722070726f636573736573206172652066756e6374696f6e696e672061732065787065637465642c2061732077656c6c20617320726566696e696e6720796f757220706c616e206173206e656564656420746f206164647265737320616e7920697373756573206f72206761707320646973636f766572656420647572696e672074657374696e672e3c2f6c693e0d0a3c6c693e4d6f6e69746f7220616e64206d61696e7461696e20796f757220445220706c616e202d2046696e616c6c792c20746f206b65657020796f75722044522073747261746567792063757272656e7420616e64206566666563746976652c2069742773206372756369616c20746f20726567756c61726c792072657669657720616e64206d61696e7461696e2069742e205468697320696e766f6c76657320726567756c61726c7920616e616c797a696e6720616e6420696d70726f76696e6720796f75722044522070726f6365737365732026616d703b2070726f6365647572657320696e206164646974696f6e20746f206368616e67696e6720796f7572204961432074656d706c61746520617320796f757220696e667261737472756374757265206368616e6765732e205573696e672076657273696f6e20636f6e74726f6c20666f722074686520445220706c616e20656e7375726573207468617420616c6c206368616e676573206d61646520746f2074686520706c616e2061726520747261636b656420616e6420646f63756d656e7465642e2049742068656c707320746f206d61696e7461696e2074686520696e74656772697479206f662074686520706c616e20616e6420656e7375726573207468617420616c6c207374616b65686f6c6465727320617265206177617265206f6620616e79206d6f64696669636174696f6e73206d61646520746f2074686520706c616e2e3c2f6c693e0d0a3c2f6f6c3e0d0a3c683320636c6173733d226d742d6c672d34223e436f6e636c7573696f6e3a3c2f68333e0d0a3c703e4c6f6f6b696e6720617420746865207365766572616c2062656e6566697473206f66204961432073756368206173206465637265617365642074696d652026616d703b206566666f727420726571756972656420746f207265636f7665722066726f6d2064697372757074697665206576656e74732068656c707320746f20717569636b6c792070726f766973696f6e206e6577207265736f7572636573206175746f6d61746963616c6c7920696e20746865206576656e74206f662061206661696c7572652e204961432063616e2068656c70206f7267616e697a6174696f6e7320746f20656e7375726520636f6e73697374656e637920616e642072656c696162696c69747920696e207468656972207265636f766572792070726f6365737365732e204961432077696c6c206365727461696e6c7920636f6e74696e756520746f206761696e2070726f6d696e656e63652061732061206469736173746572207265636f76657279206d6574686f6420696e20746865206675747572652e20546865207573616765206f662049614320666f72206469736173746572207265636f7665727920697320657870616e64696e6720617320627573696e6573736573206d69677261746520746865697220495420696e667261737472756374757265206d6f7265206672657175656e746c7920746f2074686520636c6f756420616e6420757365204465764f707320746563686e69717565732e2046757475726520646576656c6f706d656e747320696e204961432d626173656420445220746f6f6c7320616e6420746563686e6f6c6f676965732073686f756c64206d616b65206974206576656e2073696d706c657220666f7220627573696e657373657320746f206275696c6420646570656e6461626c6520616e6420726573696c69656e7420495420696e6672617374727563747572652e3c2f703e, 'active', 'blog', NULL, 'Disaster Recovery Using Infrastructure as a Code', NULL, 'undefined', NULL, '2023-03-14 19:44:06', '2023-03-17 18:32:28'),
(40, NULL, 'Transforming Cloud Economics: The Evolution of FinOps Management', 'transforming-cloud-economics-the-evolution-of-finops-management', 'uploads/2023/03/652745ffa3589ce566f280a44eec60b7.png', 'uploads/2023/03/e4411d52a8349ec2fb78897bbfacb082.png', NULL, 'Omshree, Nishita', '2023-01-05', 'If it looks like FinOps is about saving money, Reconsider. FinOps is about generating Revenue…', 0x3c703e266c6471756f3b4966206974206c6f6f6b73206c696b652046696e4f70732069732061626f757420736176696e67206d6f6e65792c205265636f6e73696465722e2046696e4f70732069732061626f75742067656e65726174696e6720526576656e75652e26726471756f3b3c2f703e0d0a3c703e46696e4f7073206272696e67732066696e616e6369616c206163636f756e746162696c69747920746f20666c756374756174696e6720636c6f75642d7370656e6420776974682061207065727370656374697665206d6f64656c206f6620616374696f6e732c2062657374207072616374696365732c20616e6420612063756c74757265207468617420656d706f776572732064697374726962757465642070726f64756374207465616d2c2066696e616e6365207465616d2c20616e6420627573696e657373207465616d7320746f206d616b65206465636973696f6e73207468617420647269766520627573696e6573732076616c75652e3c2f703e0d0a3c703e5468697320707261637469636520656d70686173697a656420636f6c6c61626f726174696f6e20616e64207472616e73706172656e7420696e666f726d6174696f6e2073686172696e67206261736564206f6e20636f6d6d6f6e20756e6465727374616e64696e672e204164646974696f6e616c6c792c20697420686f6c647320696e646976696475616c73206163636f756e7461626c6520666f72206f7074696d697a696e67207468656972206669726d26727371756f3b7320436c6f75642026616d703b20436f7374205574696c697a6174696f6e2e3c2f703e0d0a3c68333e54686520646966666963756c7469657320706f73656420627920436c6f756420436f6d707574696e673a3c2f68333e0d0a3c703e436c6f756420536572766963652050726f766964657320284353507329206f6666657220636f6d706c65782062696c6c696e67207374727563747572657320616e6420636f7374206d6f64656c732c2077686963682063616e206d616b6520697420646966666963756c7420746f2061636375726174656c7920657374696d6174652074686520636f7374206f662072756e6e696e67206120776f726b6c6f6164206261736564206f6e207468652061637475616c20636c6f7564207265736f75726365207574696c697a6174696f6e2e204f76657270726f766973696f6e696e67207265736f757263657320697320616e6f7468657220636f6d6d6f6e206368616c6c656e6765206661636564206279204954206465706172746d656e7473207768656e20706c616e6e696e6720776f726b6c6f616473206d6f6e74687320696e20616476616e636520616e642072756e6e696e67207468656d20726f756e642d7468652d636c6f636b2e20456d706c6f79656573206d61792063697263756d76656e742049542070726f746f636f6c7320746f206761696e20696e7374616e742061636365737320746f206e6577206170706c69636174696f6e732c2077686963682063616e20726573756c7420696e2064617461206578706f737572652e3c2f703e0d0a3c703e46696e4f707320656d657267656420696e2032303139206173206120736f6c7574696f6e20746f206164647265737320746865206368616c6c656e676573206361757365642062792074686520636c6f75642c3c2f703e0d0a3c703e46696e4f7073206973206120706f72746d616e74656175206f6620266c6471756f3b46696e616e636526726471756f3b20616e6420266c6471756f3b4465764f707326726471756f3b2c20737472657373696e672074686520636f6d6d756e69636174696f6e7320616e6420636f6c6c61626f726174696f6e206265747765656e20627573696e65737320616e6420656e67696e656572696e67207465616d732e3c2f703e0d0a3c703e546f6461792c2046696e4f70732069732061207374616e6461726420707261637469636520696e2074686520636c6f756420696e6475737472792c207768657265617320696e697469616c6c792c2069742077617320766965776564207365636f6e6461727920726573706f6e736962696c6974792e204c657426727371756f3b732064656c766520696e746f207468652066756e64616d656e74616c207072696e6369706c6573206f6620436c6f75642046696e4f70732e3c2f703e0d0a3c68333e436f7265205072696e6369706c65733a3c2f68333e0d0a3c6f6c3e0d0a3c6c693e46696e4f7073207072696f726974697a6573207465616d20636f6c6c61626f726174696f6e20616e642063616e2061696420796f7572206f7267616e697a6174696f6e20696e206275696c64696e672061207374726f6e67206672616d65776f726b20616e642063756c7475726520666f7220636c6f75642066696e616e6369616c206d616e6167656d656e742070726f636564757265732e3c2f6c693e0d0a3c6c693e497420656e61626c6573206465636973696f6e2d6d616b696e6720746f20656e68616e63652074686520627573696e6573732076616c7565206f6620636c6f756420636f6e73756d7074696f6e2e3c2f6c693e0d0a3c6c693e436f7374207265706f727473206e65656420746f2062652061636365737369626c652070726f6d70746c7920746f2068656c70207465616d7320666f7265636173742026616d703b20747261636b20636c6f7564207574696c697a6174696f6e2061636375726174656c792e204d6f72656f7665722c20616e6f6d616c7920646574656374696f6e20616c736f206e6565647320746f20626520696e20706c61636520746f20656e73757265206120717569636b20666565646261636b206c6f6f702e3c2f6c693e0d0a3c6c693e5468652046696e4f7073207465616d2073686f756c64206d616e61676520636c6f75642073747261746567792c2073657420636f73742d656666696369656e6379206578706563746174696f6e732c2063726561746520636f73742d636f6e74726f6c2067756172647261696c732c2063726561746520627564676574732c20616e64206f7074696d697a65206f7267616e697a6174696f6e616c20636f7374732e3c2f6c693e0d0a3c6c693e436c6f756420636f7374732063616e2062652072656475636564206279206d6f6e69746f72696e67207265736f7572636520657870656e64697475726520616e6420696d706c656d656e74696e67206d656173757265732073756368206173207265736f7572636520726967687473697a696e672c2070757263686173696e6720726573657276656420696e7374616e6365732c20616e64207465726d696e6174696e6720756e75736564207265736f75726365732c206574632e3c2f6c693e0d0a3c6c693e46696e4f707320747261636b732067726f75702d6c6576656c20657870656e73657320616e6420686173207669736962696c69747920696e746f207370656e64696e6720746f206f7074696d697a6520636f7374732e3c2f6c693e0d0a3c2f6f6c3e0d0a3c68333e5068617365733a3c2f68333e0d0a3c703e496e666f726d2c204f7074696d697a652c20616e64204f7065726174652c207468652074687265652069746572617469766520706861736573206f662046696e4f70732073657420626173656c696e65732c206f7074696d697a652072617465732026616d703b207573616765207061747465726e732c20616e64206d6f7665206f7065726174696f6e7320746f77617264732074686520696465616c2062616c616e6365206f6620636f73742d6566666563746976656e6573732026616d703b20627573696e6573732076616c75652e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f5468652d45766f6c7574696f6e2d6f662d46696e4f70732d4d616e6167656d656e742d312e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c68333e506572736f6e61733a3c2f68333e0d0a3c756c3e0d0a3c6c693e46696e4f70732070726163746974696f6e65727320656e61626c6520646174612d64726976656e206465636973696f6e7320746f20656e68616e636520636c6f756420757361676520616e6420696d70726f766520627573696e6573732076616c75652e3c2f6c693e0d0a3c6c693e457865637574697665732061726520636f6e6365726e65642077697468206163636f756e746162696c6974792c207472616e73706172656e63792c20706572666f726d616e63652c20616e6420657870656e6469747572652e3c2f6c693e0d0a3c6c693e427573696e6573732f2050726f64756374204f776e6572732065787065646974652070726f647563742067726f7774682079656172206f76657220796561722062792064656c69766572696e672070726f6475637469766520616e6420636f73742d656666696369656e7420736f6c7574696f6e732e3c2f6c693e0d0a3c6c693e46696e616e6365207465616d206d656d6265727320776f726b20776974682046696e4f70732070726163746974696f6e65727320746f20636f6d70726568656e6420686973746f726963616c2062696c6c696e67206461746120746f20646576656c6f702070726563697365206d6f64656c7320666f7220706c616e6e696e6720616e6420627564676574696e672e205468657365206d6f64656c7320617265207573656420666f722066696e616e6369616c206163636f756e74696e672c2073686f77206261636b20616c6c6f636174696f6e2c20616e6420666f726563617374696e672e3c2f6c693e0d0a3c6c693e456e67696e656572696e6720616e64204f7065726174696f6e73207465616d206d656d626572732061726520726573706f6e7369626c6520666f7220646576656c6f70696e672026616d703b20737570706f7274696e6720746865206f7267616e697a6174696f6e27732073657276696365732c207573696e6720636f73742061732061206d657472696320746f20747261636b20616e64206d6f6e69746f7220706572666f726d616e63652e205468657920616c736f2074616b6520696e746f206163636f756e7420726967687473697a696e672c20636f6e7461696e657220636f7374732c206c6f636174696e6720756e7574696c697a65642073746f726167652026616d703b20636f6d707574652c20616e64207265636f676e697a696e6720657870656e64697475726520616e6f6d616c6965732e3c2f6c693e0d0a3c6c693e5468652070726f637572656d656e74207465616d20636f6c6c61626f726174657320776974682046696e4f707320746f20656e7375726520746861742070726963657320616e64207465726d73206172652066756c66696c6c656420616e64207374616e64617264697a65642070726f637572656d656e742070726f636564757265732e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e4d617475726974793a3c2f68333e0d0a3c703e436f6e7369646572696e672046696e4f707320697320616e206974657261746976652070726f636573732c20616e7920676976656e2070726f636573732c2066756e6374696f6e616c2061637469766974792c206361706162696c6974792c206f7220646f6d61696e2077696c6c206d6174757265206f7665722074696d652e20546865206d6f7374207375636365737366756c20656e7465727072697365732061646f7074206120637261776c266e646173683b77616c6b266e646173683b72756e20737472617465677920616e6420696d70726f766520736c696768746c792077697468206561636820697465726174696f6e2e3c2f703e0d0a3c703e496620796f7520617265206e657720746f2046696e4f70732070726163746963652c2066697273742073746172742077697468206120637261776c20617070726f61636820696e20656163682070686173652c20646f6e26727371756f3b742074727920746f20646f2065766572797468696e67206174206f6e63652e20496e766f6c7665206173206d616e792070656f706c6520617320706f737369626c65206561726c7920696e207468652070726f6365737320736f20746865792063616e206c6561726e20616c6f6e677369646520796f752e204f6e636520796f7520686176652065737461626c6973686564206120736f6c696420666f756e646174696f6e2c20697427732074696d6520746f2070726f677265737320746f2061202767726f772075702720617070726f6163682c20776865726520796f752063616e206c6561726e2066726f6d207468652070726f6365737320616e642073656172636820666f72206f70706f7274756e697469657320746f20726566696e65206974207768696c65206d6f76696e6720666f72776172642e20416674657220796f752068617665206761696e6564206d6f726520657870657269656e636520616e64206265636f6d65206d6f72652070726f66696369656e742c20796f752063616e207472616e736974696f6e20746f20612072756e20617070726f6163682e3c2f703e0d0a3c703e4e6f7420657665727920636f6d70616e79206e6565647320746f20626520636f6d706c6574656c79206d617475726520696e207468652046696e4f70732070726163746963652e20417320616e206f7267616e697a6174696f6e2c20796f752073686f756c64207072696f726974697a6520746865206361706162696c6974696573207769746820746865206d6f73742076616c756520616e6420666f637573206f6e206d61747572696e672074686f73652e205468657265206973206e6f2070726f626c656d20696e20686176696e67206120637261776c206c6576656c206f66206d617475726974792069662069742068617320746865206361706162696c697479206f662073657276696e6720796f757220636f6d70616e792077656c6c2e20546865206d6f737420637269746963616c2061737065637420697320746f2070726f7669646520796f7572207465616d732077697468206772616e756c6172207669736962696c69747920696e746f20746865207370656e64696e672e3c2f703e0d0a3c703e546f20626567696e20776974682c20697420697320657373656e7469616c20746f2066756c6c79206c6f616420616e6420656c657661746520766172696f75732061737065637473207375636820617320636f737420666163746f72696e672c20637573746f6d2072617465732c2066696c6c696e6720616c6c6f636174696f6e20676170732c2064697374726962757465642073686172656420636f7374732c20616e642072656d617070696e6720657870656e73657320746f2066697420796f7572206f7267616e697a6174696f6e616c207374727563747572652e20416c74686f7567682074686973206d69676874207365656d206c696b652061206461756e74696e67207461736b2c207374617274696e67207769746820736d616c6c20696e6372656d656e74616c2077696e732063616e2068656c70206b65657020746865206d6f6d656e74756d20676f696e6720666f7220796f7572207465616d20617320796f752070726f677265737320616e64206d61747572652e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f5468652d45766f6c7574696f6e2d6f662d46696e4f70732d4d616e6167656d656e742d322e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c68333e446f6d61696e3a3c2f68333e0d0a3c756c3e0d0a3c6c693e54686520646f6d61696e206f6620756e6465727374616e64696e6720636c6f756420757361676520616e6420636f7374207065727461696e7320746f2074686520616c6c6f636174696f6e206f6620636f73747320616e642075736167652077697468696e20746865206f7267616e697a6174696f6e2e205468697320616c6c6f777320666f72207468652067656e65726174696f6e206f66206461746120746f20666163696c697461746520706572666f726d616e636520747261636b696e6720616e642062656e63686d61726b696e672e3c2f6c693e0d0a3c6c693e496e2074686520506572666f726d616e636520547261636b696e672026616d703b2042656e63686d61726b696e6720646f6d61696e2c206f7267616e697a6174696f6e732075736520686973746f726963616c20696e666f726d6174696f6e20746f20666f7265636173742c20637265617465206275646765742c20616e64206d656173757265204b50497320616e6420706572666f726d616e636520696e64696361746f727320746f2061636869657665206f7267616e697a6174696f6e616c20676f616c732e3c2f6c693e0d0a3c6c693e546865207265616c2d74696d65206465636973696f6e2d6d616b696e6720646f6d61696e20656e68616e636573207374616b65686f6c64657220656e61626c656d656e74206279206375726174696e67206461746120696e207374616b65686f6c6465722d737065636966696320636f6e74657874732c20636f6e74696e756f75736c7920656e68616e63696e67206465636973696f6e2076656c6f636974792c20616e6420616c69676e696e67206f7267616e697a6174696f6e616c2070726f636573736573207769746820636c6f7564207265616c69746965732e3c2f6c693e0d0a3c6c693e5468652052617465204f7074696d697a6174696f6e20646f6d61696e206f6666657273207370656369666963206361706162696c697469657320746f2073696d706c69667920636c6f756420736572766963652070757263686173696e6720616e64206173737572657320746861742070726963696e67206d6f64656c732c207075726368617365206f7074696f6e732c20616e6420636f6d6d6974746564207573652061726520696e20616c69676e6d656e74207769746820746865206f626a656374697665732e3c2f6c693e0d0a3c6c693e546865205573616765204f7074696d697a6174696f6e20646f6d61696e2061696d7320746f20616c69676e207468652061637475616c2064656d616e64206f6620776f726b6c6f616473206f7065726174696e6720617420616e7920676976656e2074696d6520746f207468652072756e6e696e6720636c6f7564207265736f75726365732e205468697320696e636c756465732070726564696374697665207265736f7572636520726967687473697a696e672c20776f726b6c6f6164206d616e6167656d656e7420746f206d6174636820776f726b6c6f61647320776974682074686520636f7272656374206e756d626572206f66207363616c696e67207265736f75726365732c207475726e696e67207265736f7572636573206f6666207768656e206e6f7420696e207573652c20616e64206f7468657220617070726f61636865732e3c2f6c693e0d0a3c6c693e546865204f7267616e697a6174696f6e616c20616c69676e6d656e7420646f6d61696e20697320726573706f6e7369626c6520666f72206d616e6167696e6720636c6f756420757361676520616e6420696e746567726174696e672046696e4f7073206361706162696c69746965732077697468206578697374696e67206d616e6167656d656e742070726f636564757265732c206f7267616e697a6174696f6e616c20756e6974732c20616e6420746563686e6f6c6f67792e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e46696e4f707320546f6f6c733a3c2f68333e0d0a3c703e536f66747761726520697320657373656e7469616c20666f722046696e4f7073206f7267616e697a6174696f6e7320746f20636f6d70726568656e6420636c6f756420636f7374732c207472616e736c61746520636f6d706c65782062696c6c696e67732c206d61696e7461696e207265706f7274732026616d703b20616c657274732c20616e64206d616b65206465636973696f6e7320746861742063616e206f7074696d697a6520636c6f756420636f7374732e2054686972642d70617274792076656e646f7273206f6666657220766172696f75732046696e4f707320746f6f6c732c20696e206164646974696f6e20746f2074686f7365206e617469766520746f20737065636966696320636c6f75642070726f7669646572732e20546865736520746f6f6c73206172652064657369676e656420666f722063726f73732d6469736369706c696e6172792046696e4f7073207465616d206d656d626572732c20696e636c7564696e672066696e616e63652c20616e616c797369732c207265706f7274696e672c20616e6420656e67696e656572696e672e3c2f703e0d0a3c703e46696e4f707320746f6f6c732070726f7669646520612072616e6765206f662066656174757265732073756368206173206772616e756c617220746167732c207265706f7274696e672c20627564676574696e672c2064657461696c6564207669657773206f6620636c6f75642075736167652c20706572666f726d616e6365206d6574726963732c20636f7374206578706c6f726174696f6e2c20616e64206d756368206d6f72652e3c2f703e0d0a3c703e546865206d6f737420706f70756c61722046696e4f707320746f6f6c732061726520617320666f6c6c6f77733a3c2f703e0d0a3c756c3e0d0a3c6c693e41707074696f3c2f6c693e0d0a3c6c693e44656e736966793c2f6c693e0d0a3c6c693e6e4f70733c2f6c693e0d0a3c6c693e46696e6f75743c2f6c693e0d0a3c6c693e436c6f7564436865636b723c2f6c693e0d0a3c6c693e4861726e6573733c2f6c693e0d0a3c6c693e436c6f75645a65726f3c2f6c693e0d0a3c2f756c3e0d0a3c68333e436f6e636c7573696f6e3a3c2f68333e0d0a3c703e4f7267616e697a6174696f6e732063616e20656e68616e6365207468656972207669736962696c69747920696e746f20636c6f7564207370656e64696e6720616e64206d6178696d697a65207468652062656e6566697473206f6620636c6f756420636f6d707574696e67207768696c65206d696e696d697a696e6720636f7374732062792061646f7074696e6720436c6f75642046696e4f70732062657374207072616374696365732e2054686520436c6f75642046696e4f7073207072616374696365732073756368206173206d6f6e69746f72696e672c206e616c797369732c20616e64206f7074696d697a6174696f6e2073686f756c6420626520616e206f6e676f696e672070726f63657373207769746820726567756c6172207265766965777320616e642061646a7573746d656e747320746f20656e7375726520636f737420656666696369656e637920616e642076616c756520666f72206d6f6e65792e2045737461626c697368696e6720612063756c74757265206f6620636f73742d61776172656e6573732c20636f6c6c61626f726174696f6e2c20616e64206163636f756e746162696c697479206163726f737320616c6c207465616d7320696e766f6c76656420696e20636c6f7564206f7065726174696f6e73206973206b657920746f207375636365737366756c20436c6f75642046696e4f70732e20496e2073756d6d6172792c20436c6f75642046696e4f7073206973206120637269746963616c20636f6d706f6e656e74206f6620616e79207375636365737366756c20636c6f75642073747261746567792c20616e64206f7267616e697a6174696f6e732074686174207072696f726974697a6520697420617265206c696b656c7920746f20736565207369676e69666963616e742062656e656669747320696e207465726d73206f6620636f737420736176696e67732c20706572666f726d616e63652c20616e64206167696c6974792e3c2f703e, 'active', 'blog', NULL, 'Transforming Cloud Economics: The Evolution of FinOps Management', 'Transforming Cloud Economics: The Evolution of FinOps Management', 'undefined', NULL, '2023-03-14 19:52:37', '2023-03-17 18:37:11');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(41, NULL, 'Cloud Observability and Monitoring: Ensuring Optimal Performance and Reliability', 'cloud-observability-and-monitoring-ensuring-optimal-performance-and-reliability', 'uploads/2023/03/3db96209bd893412083a90c97755f76a.png', 'uploads/2023/03/a8479c6c19ce113c205f7575c5bc9bdf.png', NULL, 'Muskan Rawat, Dinky Lakhani, Janvi Thakkar, Shaily shah', '2023-03-06', 'Aggregating the internal state data of your system and wondering what to do with it? Well, that’s where Cloud Observability and Monitoring comes to your rescue…', 0x3c703e4167677265676174696e672074686520696e7465726e616c2073746174652064617461206f6620796f75722073797374656d20616e6420776f6e646572696e67207768617420746f20646f20776974682069743f2057656c6c2c207468617426727371756f3b7320776865726520436c6f7564204f62736572766162696c69747920616e64204d6f6e69746f72696e6720636f6d657320746f20796f7572207265736375652e20596f75206d6967687420776f6e646572207768617420266c7371756f3b436c6f7564204f62736572766162696c69747920616e64204d6f6e69746f72696e6726727371756f3b206172653f20486f7720646f207468657920626f7468206469666665723f2057686174206973207468656972207369676e69666963616e63653f205768617420617265207468652070696c6c617273206f66204f62736572766162696c6974793f205768617420617265207468652042657374205072616374696365732074686174206f6e65206e6565647320746f20666f6c6c6f773f3c2f703e0d0a3c703e42656c6f772c207765206861766520616e737765726564207468652061626f7665207175657374696f6e732e2052656164206f6e20746f2066696e64206f757420616e64206164647265737320796f757220637572696f7369746965732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e546865206368616c6c656e676573206f662074686520636c6f75643a3c2f68333e0d0a3c703e44756520746f20696e747269636174652062696c6c696e67207374727563747572657320616e6420636f7374206d6f64656c73206f66666572656420627920436c6f75642053657276696365732050726f7669646573202843535073292c2069742063616e206265206368616c6c656e67696e6720746f206d616b652061207265616c697374696320636f73742d657374696d617465206f662072756e6e696e67206120737065636966696320776f726b6c6f6164206261736564206f6e207468652061637475616c20636c6f7564207265736f75726365207574696c697a6174696f6e2e204f76657270726f766973696f6e696e67206f66207265736f757263657320697320616e6f7468657220636f6d6d6f6e206368616c6c656e67652074686174204954206465706172746d656e7420666163657320627920706c616e6e696e67206d6f6e74687320696e20616476616e636520616e6420657865637574696e6720776f726b6c6f61647320726f756e642d7468652d636c6f636b2e20456d706c6f796565732074656e6420746f2061766f696420495420617070726f76616c20746f206163717569726520696e7374616e742061636365737320746f206e6577206170706c69636174696f6e7320627920646f6467696e672070726f746f636f6c732077686963682063616e207468656e206c65616420746f2064617461206578706f737572652e3c2f703e0d0a3c703e546f206f766572636f6d65207468657365206368616c6c656e676573206f662074686520636c6f75642c2046696e4f70732063616d6520696e746f206578697374656e636520696e20323031392e266e6273703b3c656d3e46696e4f7073206973206120706f72746d616e74656175206f6620266c6471756f3b46696e616e636526726471756f3b20616e6420266c6471756f3b4465764f707326726471756f3b2c20737472657373696e672074686520636f6d6d756e69636174696f6e7320616e6420636f6c6c61626f726174696f6e206265747765656e20627573696e65737320616e6420656e67696e656572696e67207465616d732e3c2f656d3e266e6273703b5b5265666572656e63653a2046696e4f707320466f756e646174696f6e202d20576861742069732046696e4f70733f5d3c2f703e0d0a3c703e496e207468652063757272656e74207363656e6172696f2c2046696e4f7073206973206120726567756c617220657865726369736520696e2074686520636c6f756420696e647573747279207768657265617320696e697469616c6c792069742077617320636f6e73696465726564206173206120736964652d776f726b2e204c657426727371756f3b7320756e6465727374616e642074686520636f7265207072696e6369706c6573206f6620436c6f75642046696e4f70732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e436c6f7564204f62736572766162696c6974793c2f68333e0d0a3c703e436c6f7564204f62736572766162696c6974792072656665727320746f20746865206162696c697479206f6620612073797374656d20746f206173736573732069747320696e7465726e616c207374617465206261736564206f6e2074686520646174612069742070726f64756365732e20546865204f7065726174696f6e73207465616d2063616e206465746563742061626e6f726d616c69746965732026616d703b2069737375657320616e642074726f75626c6573686f6f74207468656d20616674657220616e20696e2d646570746820616e616c79736973206f6620746865206865616c746820616e642073746174757320696e666f726d6174696f6e206f66207468652073797374656d26727371756f3b73207265736f75726365732e3c2f703e0d0a3c703e436c6f7564204f62736572766162696c69747920746f6f6c7320756e6465727374616e64207468652072656c6174696f6e7368697073206265747765656e2073797374656d73206163726f7373206120636f6d70616e7926727371756f3b7320646976657273696669656420616e64206d756c74692d74696572656420696e66726173747275637475726520636f6d70726973696e67206f6620636c6f756420656e7669726f6e6d656e74732c206f6e2d7072656d69736573206170706c69636174696f6e732c20616e642074686972642d706172747920736f6674776172652e205768656e6576657220746865206f62736572766162696c69747920746f6f6c206465746563747320616e2061626e6f726d616c6974792c2069742070696e677320746865207465616d20616e642070726f7669646573207468656d207769746820746865206e656365737361727920696e73696768747320746f2074726f75626c6573686f6f7420616e64207265736f6c7665207468652069737375652072617069646c792e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e4b657920436f6d706f6e656e7473206f6620436c6f7564204f62736572766162696c6974793a3c2f68333e0d0a3c703e5468657265206172652074687265652070696c6c617273206f6620636c6f7564206f62736572766162696c697479202d204d6574726963732c204c6f67732c20616e64205472616365732e204c657420757320756e6465727374616e642065616368206f66207468652070696c6c6172732e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f436c6f75642d4f62736572766162696c6974792d616e642d4d6f6e69746f72696e672e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e3c7374726f6e673e312e204d6574726963733a3c2f7374726f6e673e4d6574726963732061726520696e74656e64656420746f2070726f76696465206f6273657276657273207769746820696e666f726d6174696f6e2061626f757420612070617274206f722073797374656d2773206865616c746820616e64206f7065726174696f6e2e3c2f703e0d0a3c703e3c7374726f6e673e322e204c6f67733a3c2f7374726f6e673e546865206c6f6720646174612070726f766964657320696e666f726d6174696f6e2061626f7574206469736372657465206576656e74732074686174206f636375727265642077697468696e206120636f6d706f6e656e742e204c6f67206461746120697320757375616c6c79206c6172676572207468616e206d657472696320646174612e3c2f703e0d0a3c703e3c7374726f6e673e332e266e6273703b3c2f7374726f6e673e3c7374726f6e673e5472616365733a3c2f7374726f6e673e54726163652069732061206b65792070696c6c6172206f6620636c6f7564206f62736572766162696c6974792c2070726f766964696e672075736572732077697468207265616c2d74696d65206d6f6e69746f72696e6720616e6420646562756767696e6720746f6f6c732e20547261636520656e7375726573206f7074696d616c20706572666f726d616e6365206279206964656e74696679696e6720616e642061646472657373696e6720616e79206170706c69636174696f6e2069737375657320717569636b6c792e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e486f772063616e206f62736572766162696c6974792068656c70206964656e7469667920616e6420646961676e6f736520697373756573203a3c2f68333e0d0a3c703e4f62736572766162696c697479206973206120746f6f6c20746861742068656c7073206964656e746966792070726f626c656d73206265666f726520746865792073746172742c20616c6c6f77696e6720646576656c6f7065727320746f20707265656d70746976656c792066697820706f74656e7469616c206973737565732e20546865726520617265206120666577206d6574686f647320746861742063616e2062652068656c7066756c207768656e20697420636f6d657320746f206f62736572766162696c6974793a3c2f703e0d0a3c703e3c7374726f6e673e312e204c6f6767696e672026616d703b204d6f6e69746f72696e673a3c2f7374726f6e673e4c6f6767696e672026616d703b204d6f6e69746f72696e672063616e2068656c7020646574656374206572726f7273206f72207370696b657320696e20706572666f726d616e63652e20496e2074686973207761792c2074686520726f6f74206361757365206f6620612070726f626c656d2063616e206265206964656e7469666965642e3c2f703e0d0a3c703e3c7374726f6e673e322e2054726163696e673a3c2f7374726f6e673e54726163696e672063616e206964656e7469667920626f74746c656e65636b7320616e64206572726f727320696e20612073797374656d20627920747261636b696e672072657175657374732061732074686579206d6f7665207468726f7567682069742e3c2f703e0d0a3c703e3c7374726f6e673e332e204d6574726963732026616d703b20416c657274696e673a3c2f7374726f6e673e546865736520746f6f6c7320617265207573656420746f206d6f6e69746f722074686520706572666f726d616e6365206f6620612073797374656d2e204d65747269637320616c6c6f7720666f722074686520636f6c6c656374696f6e206f662064617461206f6e2074686520706572666f726d616e6365206f6620612073797374656d2e20416c657274696e672063616e207468656e206265207573656420746f206e6f746966792061646d696e6973747261746f7273206f72206f7468657220706572736f6e6e656c206f6620616e79206368616e67657320696e207468652073797374656d277320706572666f726d616e63652e3c2f703e0d0a3c703e3c7374726f6e673e342e2044697374726962757465642054726163696e673a3c2f7374726f6e673e3a2044697374726962757465642054726163696e672063616e206265207573656420746f206d6f6e69746f722074686520706572666f726d616e6365206f662064697374726962757465642073797374656d732e20506572666f726d616e6365206973737565732c2073756368206173206c6174656e637920616e64207468726f7567687075742c2063616e206265206964656e7469666965642026616d703b20646961676e6f736564207468726f75676820746869732070726f636573732e3c2f703e0d0a3c703e3c7374726f6e673e352e204170706c69636174696f6e20506572666f726d616e6365204d6f6e69746f72696e673a3c2f7374726f6e673e546869732069732075736566756c20696e206d6f6e69746f72696e672074686520706572666f726d616e6365206f6620696e646976696475616c20736572766963657320616e642074686520656e746972652073797374656d20617320612077686f6c652e205573696e67207468697320617070726f6163682063616e20636f6e7472696275746520746f20746865206964656e74696669636174696f6e2026616d703b20646961676e6f736973206f6620706572666f726d616e63652c207363616c6162696c6974792c20616e6420617661696c6162696c697479206973737565732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e436c6f7564204d6f6e69746f72696e673c2f68333e0d0a3c703e4d6f6e69746f72696e672072656665727320746f20746865206167677265676174696f6e20616e6420616e616c79736973206f66206461746120636f6c6c65637465642066726f6d207468652073797374656d2e204f6674656e2c20746865204465764f7073207465616d20637265617465732064617368626f61726473207573696e6720706172746963756c6172206d65747269637320746f206d6f6e69746f722e204d6f6e69746f72696e672063616e206f6e6c792068656c70206966206f6e65206b6e6f7773207768696368206d657472696320746f20747261636b2e20556e747261636b6564206461746120636f756c64206578706f736520697373756573207468617420676f20756e6f627365727665642e2054686520646966666572656e6365206265747765656e204f62736572766162696c69747920616e64204d6f6e69746f72696e67206c69657320696e2074686520666163742074686174204f62736572766162696c69747920636f6c6c6563747320616c6c20646174612070726f6475636564206279207468652073797374656d2c207768696c65204d6f6e69746f72696e6720636f6c6c656374732026616d703b20616e616c797a657320612070726564657465726d696e656420736574206f6620646174612066726f6d207468652073797374656d3c2f703e0d0a3c703e4865726520617265206120666577207479706573206f6620436c6f7564204d6f6e69746f72696e673c2f703e0d0a3c703e3c7374726f6e673e312e2057656273697465204d6f6e69746f72696e673a3c2f7374726f6e673e57656273697465204d6f6e69746f72696e6720697320636f6e6365726e65642077697468207768657468657220656e642075736572732063616e20696e746572616374207769746820746865207765627369746520617070726f7072696174656c792e3c2f703e0d0a3c703e3c7374726f6e673e322e205669727475616c204d616368696e65204d6f6e69746f72696e673a3c2f7374726f6e673e547261636b2074686520706572666f726d616e6365206f66207669727475616c206d616368696e65732c20696e636c7564696e6720746865697220617661696c6162696c69747920616e64206865616c7468207374617475732e3c2f703e0d0a3c703e3c7374726f6e673e332e204461746162617365204d6f6e69746f72696e673a3c2f7374726f6e673e4974206d6f6e69746f72732071756572696573206f6e207468652064617461626173652c206163636573732072657175657374732c206461746120696e746567726974792c20616e6420616e7920636f6e6e656374696f6e732074686174207265666c656374207265616c2d74696d6520646174612075736167652e3c2f703e0d0a3c703e3c7374726f6e673e342e205669727475616c204e6574776f726b204d6f6e69746f72696e673a3c2f7374726f6e673e4974206973207072696d6172696c79207573656420696e207265616c2d74696d6520746f20747261636b2074686520706572666f726d616e6365206f6620726f75746572732c206669726577616c6c732c20616e64206c6f61642062616c616e636572732e3c2f703e0d0a3c703e3c7374726f6e673e352e20436c6f75642073746f72616765206d6f6e69746f72696e673a3c2f7374726f6e673e4974206973207573656420746f20747261636b2075736572732c206461746162617365732c2070726f6365737365732c206578697374696e672073746f726167652c20616e6420706572666f726d616e6365206d6574726963732e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e496d706f7274616e6365206f6620436c6f7564204f62736572766162696c69747920616e64204d6f6e69746f72696e6720666f7220436c6f756420496e6672617374727563747572653c2f68333e0d0a3c703e436c6f7564204f62736572766162696c69747920616e64204d6f6e69746f72696e6720706c61792061206372756369616c20726f6c6520696e206172656173206265736964657320616e616c797a696e6720616e64206d697469676174696e67206b6e6f776e2026616d703b20756e6b6e6f776e206973737565732e2054686579206172653a3c2f703e0d0a3c756c3e0d0a3c6c693e4465746563747320747269636b792070726f626c656d732e3c2f6c693e0d0a3c6c693e54726f75626c6573686f6f74206f7074696d616c6c79206279207265647563696e67204d5454522c204d5454492c20616e64204d5454412e3c2f6c693e0d0a3c6c693e496d70726f76657320656e642d7573657220657870657269656e63652e3c2f6c693e0d0a3c6c693e4f7074696d697a657320636f73742e3c2f6c693e0d0a3c6c693e45766f6c7665732077697468206175746f6d6174696f6e2e3c2f6c693e0d0a3c6c693e53617665732074696d652e3c2f6c693e0d0a3c6c693e426f6f73747320646576656c6f7065722070726f6475637469766974792e3c2f6c693e0d0a3c6c693e4f7074696d616c207265736f75726365207574696c697a6174696f6e2e3c2f6c693e0d0a3c6c693e446574656374206c6174656e6379206973737565732e3c2f6c693e0d0a3c6c693e48656c7073206d616b6520696e666f726d6564206465636973696f6e733c2f6c693e0d0a3c6c693e50726f7669646573207265616c2d74696d65206d6f6e69746f72696e672026616d703b20616c657274696e672e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e426573742050726163746963657320666f7220436c6f7564204f62736572766162696c69747920616e64204d6f6e69746f72696e673c2f68333e0d0a3c703e436c6f7564206f62736572766162696c69747920616e64204d6f6e69746f72696e6720706c617973206120766974616c20726f6c6520696e20646574656374696e6720616e64207265736f6c76696e672069737375657320696e2074686520636c6f75642073797374656d2e20546f20656e737572652065666665637469766520636c6f7564206f62736572766162696c69747920616e64206d6f6e69746f72696e672c20697420697320696d706f7274616e7420746f20666f6c6c6f772062657374207072616374696365732e3c2f703e0d0a3c756c3e0d0a3c6c693e3c7374726f6e673e53657420636c65617220676f616c7320616e64206d6574726963733a3c2f7374726f6e673e537461727420776974682073657474696e6720636c65617220676f616c7320616e64206d65747269637320746f206d656173757265207468652073756363657373206f66206d6f6e69746f72696e672070726f6365737365732c20696e636c7564696e67206964656e74696679696e67206b657920706572666f726d616e636520696e64696361746f727320284b5049732920616e6420646566696e696e672061636365707461626c65207468726573686f6c647320666f722065616368206d65747269632e3c2f6c693e0d0a3c6c693e3c7374726f6e673e53656c65637420726967687420746f6f6c733a3c2f7374726f6e673e53656c656374696e672074686520726967687420746f6f6c7320666f72206d6f6e69746f72696e6720616e64206f62736572766162696c6974792c2073756368206173206c6f6767696e672c2074726163696e672c20616e64206d65747269637320636f6c6c656374696f6e20746f6f6c7320697320657175616c6c7920657373656e7469616c2e20456e737572652074686174207468652063686f73656e20746f6f6c732061726520636f6d70617469626c6520776974682074686520636c6f756420656e7669726f6e6d656e7420616e642070726f76696465207265616c2d74696d6520616c6572747320666f7220616e7920706f74656e7469616c206973737565732e3c2f6c693e0d0a3c6c693e3c7374726f6e673e496e766f6c7665205374616b65686f6c646572733a3c2f7374726f6e673e496e766f6c76696e67207374616b65686f6c646572732c2065737461626c697368696e6720636c65617220636f6d6d756e69636174696f6e206368616e6e656c732c2064656c69766572696e672072656c6576616e7420747261696e696e672c20616e6420696e746567726174696e6720666565646261636b20746f20636f6e74696e756f75736c7920696d70726f766520746865206d6f6e69746f72696e672070726f6365737320697320637269746963616c2e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e5469707320666f72207363616c696e67206f62736572766162696c69747920616e64206d6f6e69746f72696e6720617320796f757220696e6672617374727563747572652067726f77733a3c2f68333e0d0a3c703e5768656e20697420636f6d657320746f207363616c696e67206f62736572766162696c69747920616e64206d6f6e69746f72696e6720617320796f757220696e6672617374727563747572652067726f77732c20746865726520617265206120666577207469707320796f752063616e206b65657020696e206d696e642e3c2f703e0d0a3c6f6c3e0d0a3c6c693e3c7374726f6e673e53746172742077697468206120736f6c696420666f756e646174696f6e3a3c2f7374726f6e673e456e73757265207468617420796f752068617665206120726f62757374206d6f6e69746f72696e6720696e66726173747275637475726520696e20706c616365206265666f726520796f75207374617274207363616c696e672e3c2f6c693e0d0a3c6c693e3c7374726f6e673e496e7665737420696e206f62736572766162696c6974793a3c2f7374726f6e673e4f62736572766162696c69747920616c6c6f777320796f7520746f206d6f6e69746f7220796f757220696e66726173747275637475726520616e64206170706c69636174696f6e732066726f6d206120757365722070657273706563746976652e3c2f6c693e0d0a3c6c693e3c7374726f6e673e4175746f6d6174652065766572797468696e673a3c2f7374726f6e673e4175746f6d6174696f6e20616c6c6f777320796f7520746f207363616c6520796f7572206d6f6e69746f72696e6720616e64206f62736572766162696c697479207769746820796f757220696e6672617374727563747572652e3c2f6c693e0d0a3c6c693e3c7374726f6e673e4b6565702069742073696d706c653a3c2f7374726f6e673e5768656e20697420636f6d657320746f206d6f6e69746f72696e6720616e64206f62736572766162696c6974792c206f6674656e2c206c657373206973206d6f72652e2041766f696420616464696e6720756e6e656365737361727920636f6d706c657869747920616e6420737469636b20746f20746865206261736963732e3c2f6c693e0d0a3c2f6f6c3e0d0a3c683320636c6173733d226d742d6c672d34223e436f6e636c7573696f6e3c2f68333e0d0a3c703e496e20746f646179277320666173742d7061636564206469676974616c20776f726c642c20776865726520627573696e65737365732072656c792068656176696c79206f6e20636c6f756420696e6672617374727563747572652c20656e737572696e67207468652072656c696162696c69747920616e6420706572666f726d616e6365206f6620636c6f75642073797374656d7320697320637269746963616c2e205468657265666f72652c20697420697320657373656e7469616c20746f20696e7665737420696e20746f6f6c7320616e6420746563686e6f6c6f67696573207468617420656e61626c652065666665637469766520636c6f7564206d6f6e69746f72696e6720616e64206f62736572766162696c6974792e2054686520696d706f7274616e6365206f6620636c6f7564206d6f6e69746f72696e6720616e64206f62736572766162696c6974792063616e6e6f74206265206f766572656d70686173697a65642e2042792061646f7074696e672062657374207072616374696365732c206f7267616e697a6174696f6e732063616e2070726f6163746976656c792064657465637420616e642061646472657373206973737565732c206c656164696e6720746f20696d70726f76656420757074696d652c20656e68616e636564207573657220657870657269656e63652c20616e642062657474657220627573696e657373206f7574636f6d65732e3c2f703e, 'active', 'blog', NULL, 'Cloud Observability and Monitoring: Ensuring Optimal Performance and Reliability', NULL, 'undefined', NULL, '2023-03-14 20:03:02', '2023-03-17 18:34:04'),
(43, NULL, 'Disaster Recovery (DR): WHY and HOW?', 'disaster-recovery-dr-why-and-how-', 'uploads/2023/03/cea6e04df9bbfe963598f61b1f459c01.png', 'uploads/2023/03/b874a01b4bc0618575959cdc439ec318.png', NULL, 'Piyush Jalan', '2023-03-13', 'Disaster Recovery (DR) in Cloud Computing involves the use of cloud solutions to ensure the continuity and reliability of business operations in the event of a disaster...', 0x3c68333e4469736173746572205265636f7665727920284452293a2057485920616e6420484f573f3c2f68333e0d0a3c703e3c7374726f6e673e443c2f7374726f6e673e69736173746572205265636f76657279202844522920696e20436c6f756420436f6d707574696e6720696e766f6c7665732074686520757365206f6620636c6f756420736f6c7574696f6e7320746f20656e737572652074686520636f6e74696e7569747920616e642072656c696162696c697479206f6620627573696e657373206f7065726174696f6e7320696e20746865206576656e74206f6620612064697361737465722e20497420656e7375726573207468617420627573696e65737365732063616e20717569636b6c79207265636f76657220746865697220637269746963616c2049542073797374656d7320616e6420646174612c206d696e696d697a696e672064697372757074696f6e20746f207468656972206f7065726174696f6e732e204279206c657665726167696e6720636c6f7564207265736f75726365732c20636f6d70616e6965732063616e20637265617465206120636f6d70726568656e73697665204469736173746572205265636f76657279202844522920706c616e207468617420697320636f7374206566666563746976652c207363616c61626c6520616e6420666c657869626c652e20467572746865726d6f72652c2077697468204469736173746572205265636f7665727920436c6f756420436f6d707574696e672c20636f6d70616e6965732063616e2062656e656669742066726f6d206c6f77206c6174656e63792c20696d70726f76656420706572666f726d616e636520616e6420696e637265617365642073656375726974792e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f30312e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c68333e5748592044523f3c2f68333e0d0a3c703e53696e636520646f776e74696d65206d6967687420726573756c7420696e206c6f73736573206f66206d696c6c696f6e73206f6620646f6c6c617273206f7220706f737369626c792074686520636c6f73757265206f662074686520636f6d70616e7920617320612077686f6c652c20627573696e6573736573206172652067726f77696e67206c65737320746f6c6572616e74206f662069742e205468697320697320746865206d61696e20666163746f722064726976696e67206669726d7320746f20696e637265617365207468656972207265736f7572636520616c6c6f636174696f6e20696e20616e206566666f727420746f2061747461696e20612068696768206c6576656c206f6620627573696e65737320636f6e74696e756974792e3c2f703e0d0a3c703e41206469736173746572207265636f7665727920706c616e2067756172616e74656573207468617420796f757220627573696e65737326727371756f3b7320696e6672617374727563747572652c20696e636c7564696e672069747320617070732c2077696c6c20616c776179732062652061636365737369626c652c206576656e20696e20746865206576656e74206f6620612063616c616d6974792e2041206469736173746572207265636f7665727920706c616e206d617920616c736f20626f6f737420796f757220636f6d70616e7926727371756f3b7320637265646962696c697479206265636175736520796f752063616e20656e73757265207468617420796f757220636c69656e74732077696c6c20636f6e74696e756520746f206765742073657276696365732e20596f752077696c6c2068617665206120636f6d706574697469766520616476616e74616765206173206120726573756c742e3c2f703e0d0a3c68333e484f5720746f20616368696576652044523f3c2f68333e0d0a3c703e5768656e206120646973617374657220737472696b65732c2074686520656d657267656e6379207465616d26727371756f3b7320696e697469616c20666f6375732073686f756c64206265206f6e20646f696e67206120726170696420616e616c79736973206f662074686520736974756174696f6e20746f2064657465726d696e6520776861742068617264776172652c20736f6674776172652c20646174612c206f722073797374656d7320776572652064616d6167656420616e642c206173206120726573756c742c20746f2064657465726d696e65207768696368207068617365206f6620746865207265636f7665727920706c616e2073686f756c642062652063617272696564206f75742e3c2f703e0d0a3c703e41667465722074686520636f6e74696e67656e6379206973206f7665722c2074686520706c616e26727371756f3b7320696d706c656d656e746174696f6e206d75737420626520726576696577656420616761696e20746f206964656e7469667920697473207765616b6e657373657320616e6420737472656e6774687320616e6420696d706c656d656e7420746865207265717569726564206d6f64696669636174696f6e732e20546865206469736173746572207265636f7665727920706c616e2073686f756c64206265206576616c756174656420616e642072657669736564206f6e206120726567756c61722062617369732c206576656e206966207468657265206973206e6f20636174617374726f7068652c20746f206d616b65206974206265747465722e204b65657020696e206d696e642074686174207269736b7320616e6420627573696e6573736573206368616e676520726567756c61726c792c206d616b696e6720616e79207374726174656779206f62736f6c657465206966206974206973206e6f742075706461746564206672657175656e746c7920656e6f7567682e3c2f703e0d0a3c703e596f75206d757374206265206177617265206f66207468652074696d65206e656564656420746f20726573746f726520646174612066726f6d20796f7572206261636b75702073696e6365206576657279206d696e757465207468617420616e206170706c69636174696f6e20697320756e617661696c61626c652063616e206e656761746976656c7920696d7061637420636f6d70616e792c2066696e616e6365732c20616e64207468652072657075746174696f6e206f6620616e206f7267616e697a6174696f6e2e2054776f207465726d696e6f6c6f67696573207468617420617265206672657175656e746c79207573656420696e2074686520736563746f7220666f7220646973617374657220706c616e6e696e67206172653a3c2f703e0d0a3c703e3c656d3e5265636f7665727920506f696e74204f626a656374697665202852504f293a2052504f206973207468652074696d652d6261736564206173736573736d656e74206f662074686520746f6c657261626c65206c6576656c206f662064617461206c6f73732e3c2f656d3e3c2f703e0d0a3c703e3c656d3e5265636f766572792054696d65204f626a656374697665202852544f293a2054686973207465726d2072656665727320746f2074686520616d6f756e74206f662074696d65206e656564656420746f207265636f766572206120627573696e6573732070726f6365737320746f20697473207072652d64697361737465722073746174652e3c2f656d3e3c2f703e0d0a3c703e3c656d3e3c7374726f6e673e4e4f54453a3c2f7374726f6e673e266e6273703b4f7267616e697a6174696f6e73206d617920706c616e20636c6f75642d626173656420736f6c7574696f6e7320746f206f666665722073797374656d207265636f7665727920736572766963657320746861742061726520626f74682074696d656c7920616e6420636f73742d6566666563746976652c20646570656e64696e67206f6e2052504f2c2077697468696e2074686520706172616d6574657273207365742062792052544f2e3c2f656d3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c656d3e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f30322e706e67222077696474683d2235302522202f3e3c2f656d3e3c2f703e0d0a3c703e3c656d3e546865206469736173746572207265636f76657279206f7074696f6e7320746861742041575320636c6f75642070726f7669646573206d61792062652067656e6572616c6c79206469766964656420696e746f266e6273703b3c7374726f6e673e666f75722063617465676f726965732c3c2f7374726f6e673e266e6273703b72616e67696e672066726f6d2073696d706c65206261636b7570206d6574686f64732077697468206c6974746c6520636f737420616e6420636f6d706c657869747920746f206d6f726520696e7472696361746520706c616e73207574696c697a696e67206d616e792061637469766520526567696f6e732e20416e20616374697665207369746520686f7374732074686520776f726b6c6f616420616e6420736572766573207472616666696320696e206163746976652f7061737369766520736368656d65732e20466f72207265686162696c69746174696f6e2c2074686520706173736976652073697465206973207574696c697a65642e20556e74696c2061206661696c6f766572206576656e7420697320696e697469617465642c2074686520706173736976652073697465206973206e6f74206163746976656c792073657276696e6720747261666669632e2052656d656d626572207468617420746865266e6273703b3c7374726f6e673e6461746120706c616e6520616e642074686520636f6e74726f6c20706c616e653c2f7374726f6e673e266e6273703b61726520686f7720736572766963657320617265206f6674656e2073706c69742075702077697468696e20415753207768656e207069636b696e6720796f757220617070726f61636820616e642074686520415753207265736f757263657320746f20616368696576652069742e205265616c2d74696d6520736572766963652064656c69766572792069732074686520726573706f6e736962696c697479206f6620746865206461746120706c616e652c207768696c6520656e7669726f6e6d656e7420636f6e66696775726174696f6e20697320646f6e652076696120636f6e74726f6c20706c616e65732e204f6e6c79206461746120706c616e6520616374697669746965732073686f756c6420626520757365642061732070617274206f6620796f7572206661696c6f766572206f7065726174696f6e20666f72206f7074696d616c20726573696c69656e63652e2054686520726561736f6e20666f7220746869732069732c2064617461206169726372616674206672657175656e746c792068617665206772656174657220617661696c6162696c6974792064657369676e20676f616c73207468616e20636f6e74726f6c20706c616e65732e3c2f656d3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c656d3e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f30332e706e67222077696474683d2235302522202f3e3c2f656d3e3c2f703e0d0a3c703e3c656d3e5769746820616476616e63656d656e747320696e20746563686e6f6c6f67792c206469736173746572207265636f7665727920706c616e73206368616e67652e20506879736963616c6c79206d6f76696e67207461706573206f7220636f7079696e67206461746120746f206120646966666572656e74206c6f636174696f6e206d61792062652070617274206f6620616e206f6e2d73697465206469736173746572207265636f766572792073747261746567792e20466f7220796f7572206f7267616e697a6174696f6e20746f20616368696576652069747320445220676f616c73206f6e204157532c20796f75206d757374207265617373657373207468652066696e616e6369616c206566666563742c207269736b2c20616e6420636f7374206f6620796f7572206669726d26727371756f3b73207072696f72206469736173746572207265636f76657279206d6574686f64732e3c2f656d3e3c2f703e0d0a3c703e3c656d3e496d706c656d656e74696e67206120686967686c7920617661696c61626c6520776f726b6c6f616420696e206d616e7920417661696c6162696c697479205a6f6e657320696e7369646520612073696e676c652041575320526567696f6e2068656c70732070726f7465637420616761696e7374206e61747572616c20616e6420746563686e6f6c6f676963616c2064697361737465727320666f722061206469736173746572206576656e74206261736564206f6e2064697372757074696f6e206f72206c6f7373206f66206f6e6520706879736963616c20646174612063656e7465722e205468652064616e676572206f662068756d616e2068617a617264732c207375636820617320616e206572726f72206f7220616e20696c6c6567616c206265686176696f722074686174206d69676874206c65616420746f2064617461206c6f73732c2063616e206265207265647563656420627920636f6e74696e756f75736c79206261636b696e67207570206461746120696e7369646520746869732073696e676c6520526567696f6e2e204561636820417661696c6162696c697479205a6f6e6520696e20616e2041575320526567696f6e2069732073657061726174652066726f6d206661756c747320696e20746865206f74686572207a6f6e657320616e64206973206d616465207570206f662061206e756d626572206f66207468656d2e204f6e65206f72206d6f72652064697374696e637420706879736963616c20646174612063656e74657273206d616b65207570206561636820617661696c6162696c697479207a6f6e6520696e207475726e2e20596f752063616e2064697669646520776f726b6c6f61647320616d6f6e67207365766572616c207a6f6e657320696e207468652073616d6520526567696f6e20746f206265747465722069736f6c6174652070726f626c656d6174696320736974756174696f6e7320616e642061636869657665206869676820617661696c6162696c6974792e3c2f656d3e3c2f703e0d0a3c68333e46696e616c2074686f75676874733c2f68333e0d0a3c703e437573746f6d65727320617265206163636f756e7461626c6520666f7220746865206163636573736962696c697479206f6620746865697220636c6f75642d626173656420617070732e204974206973206372756369616c20746f206964656e74696679206120636174617374726f70686520616e642065737461626c6973682061206469736173746572207265636f7665727920706c616e20746861742074616b657320696e746f206163636f756e7420626f7468207468697320646566696e6974696f6e20616e642074686520706f74656e7469616c2065666665637473206f6e20627573696e657373206f7574636f6d65732e2053656c6563742074686520626573742061726368697465637475726520746f206d6974696761746520616761696e737420636174617374726f70686573206166746572206372656174696e672052544f20616e642052504f206261736564206f6e20696d7061637420616e616c7973657320616e64207269736b206173736573736d656e74732e204d616b65207375726520636174617374726f70686520646574656374696f6e206973206665617369626c6520616e6420717569636b3b20697426727371756f3b7320637269746963616c20746f20756e6465727374616e64207768656e20676f616c732061726520696e2064616e6765722e204265206361726566756c20746f20637265617465206120706c616e20616e642074657374206974206265666f726520696d706c656d656e74696e672069742e20556e76616c696461746564206469736173746572207265636f7665727920706c616e732072756e207468652064616e676572206f66206e6f74206265696e6720696d706c656d656e746564206f77696e6720746f206c61636b206f66207472757374206f72206661696c696e6720746f2061636869657665206469736173746572207265636f7665727920676f616c732e3c2f703e0d0a3c68333e4e6578742073746570733c2f68333e0d0a3c703e415753204261636b7570732c20436c6f7564456e647572652c20415753204452532c204175746f6d61746564206261636b757020736f6c7574696f6e73206574632e206172652066657720445220736f6c7574696f6e2070726f76696465642062792041575320436c6f75642e204926727371756f3b6c6c2062652074616c6b696e672061626f7574206465657020746563686e6963616c6c7920666f72266e6273703b3c7374726f6e673e4157532044525320616e6420436c6f7564456e647572653c2f7374726f6e673e266e6273703b696e206d79206e6578742077726974652d75702e3c2f703e0d0a3c703e537461792074756e6564213c2f703e0d0a3c703e506c65617365206665656c206672656520746f2077726974652040266e6273703b3c7374726f6e673e7069797573682e6a616c616e40696e747569746976652e636c6f75643c2f7374726f6e673e266e6273703b666f7220616e792071756572696573206f6e20445220616e64204243502067756964652e3c2f703e0d0a3c703e5468616e6b73213c2f703e, 'active', 'blog', NULL, 'Disaster Recovery (DR): WHY and HOW?', NULL, 'undefined', NULL, '2023-03-14 20:21:00', '2023-03-17 18:18:37');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(44, NULL, 'Query AWS Cloud Trail Events', 'query-aws-cloud-trail-events', 'uploads/2023/03/484214f86d2c7abd35865c22b74e0828.png', 'uploads/2023/03/8c023b94871f3fe9323bb21757c6e6f0.png', NULL, 'Bhuvaneswari Subramani', NULL, 'This post will provide you with a comprehensive understanding of how to store CloudTrail logs in an AWS CloudTrail Lake and leverage SQL…', 0x3c703e5468697320706f73742077696c6c2070726f7669646520796f752077697468206120636f6d70726568656e7369766520756e6465727374616e64696e67206f6620686f7720746f2073746f726520436c6f7564547261696c206c6f677320696e20616e2041575320436c6f7564547261696c204c616b6520616e64206c657665726167652053514c207175657269657320746f20616e616c797a652074686520436c6f7564547261696c206576656e74732074686174206172652073746f72656420696e20746865206c616b652e3c2f703e0d0a3c703e41575320697320612062696720636f6e7461696e657220686f7573696e672068756765206c697374206f66207661726965642073657276696365732e205768656e20796f752063726561746520616e20415753204163636f756e742c20746865726520617265206d756c7469706c65207761797320696e20776869636820796f7520776f756c64206372656174652c207570646174652c2064656c657465206f72206163636573732074686520415753207265736f757263657320266e646173683b2041575320436f6e736f6c652c204157532053444b2026616d703b2041575320434c492e3c2f703e0d0a3c703e57656c6c2c20756c74696d6174656c792065616368206f66207468657365206576656e747320617265206569746865722055736572206163746976697479206f72204150492063616c6c732e204e6f77206d6f6e69746f72696e673c7374726f6e673e266e6273703b57686f2064696420776861742c2077686572652026616d703b207768656e266e6273703b3c2f7374726f6e673e69732063616c6c65643c7374726f6e673e266e6273703b4163636f756e74204d6f6e69746f72696e67266e6273703b3c2f7374726f6e673e616e642041575320436c6f7564547261696c206973203c753e707572706f7365206275696c7420666f72207468617420696e20323031332e203c2f753e53696e6365207468656e2c20436c6f7564547261696c20686173206265656e207468652073696e676c6520736f75726365206f6620747275746820746f20747261636b207573657220616374697669747920616e64204150492075736167652e3c2f703e0d0a3c703e4c617465722041575320436c6f7564547261696c204c616b6520776173266e6273703b3c753e6c61756e6368656420696e20323032323c2f753e266e6273703b746f206167677265676174652c20696d6d757461626c792073746f72652c20616e6420717565727920796f7572206163746976697479206c6f677320666f72206175646974696e672c20736563757269747920696e7665737469676174696f6e2c20616e64206f7065726174696f6e616c2074726f75626c6573686f6f74696e672069732073696d706c69666965642e3c2f703e0d0a3c703e496e206f6e652070726f647563742c20436c6f7564547261696c204c616b6520636f6c6c656374732c2073746f7265732c206f7074696d697a65732c20616e642071756572696573206163746976697479206c6f67732e204173206120726573756c74206f6620636f6d62696e696e6720746865736520666561747572657320696e746f206f6e6520656e7669726f6e6d656e742c20436c6f7564547261696c204c616b6520656c696d696e6174657320746865206e65656420666f72207365706172617465206461746120706970656c696e6573206163726f7373207465616d7320616e642070726f64756374732e3c2f703e0d0a3c703e526563656e746c792c2041575320436c6f7564547261696c204c616b652068617320616c736f3c753e266e6273703b657874656e64656420737570706f727420666f72206e6f6e2d617773206576656e7420736f7572636520696e746567726174696f6e3c2f753e3c2f703e0d0a3c703e497272657370656374697665206f6620746865206461746120736f757263652c207468652073756363657373206f662074686520736572766963657320646570656e6473206f6e20686f772074686520646174612069732073746f72656420616e6420686f77207365616d6c6573736c792069742063616e206265207574696c69736564206f722061636365737365642e205468697320626c6f6720706f737420666f637573206f6e2074776f20696d706f7274616e742066656174757265732c2073746f72696e6720616e64207175657279696e672066726f6d20436c6f7564547261696c204c616b652e3c2f703e0d0a3c703e536f206c657427732064697665206465657020696e746f2074686520737465707320746f2073746f72652074686520436c6f7564547261696c206c6f677320696e206120436c6f7564547261696c204c616b6520616e642072756e2053514c2071756572696573206f6e20796f757220436c6f7564547261696c206576656e74732073746f72656420696e2041575320436c6f7564547261696c204c616b653c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e5461626c65206f6620436f6e74656e74733c2f68333e0d0a3c756c3e0d0a3c6c693e43726561746520436c6f7564547261696c3c2f6c693e0d0a3c6c693e43726561746520436c6f7564547261696c204c616b653c2f6c693e0d0a3c6c693e4372656174652051756572793c2f6c693e0d0a3c6c693e52756e2051756572793c2f6c693e0d0a3c6c693e56616c69646174652051756572793c2f6c693e0d0a3c6c693e436c65616e75703c2f6c693e0d0a3c6c693e4c6561726e696e67205265666572656e63653c2f6c693e0d0a3c6c693e436f6e636c7573696f6e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e43726561746520436c6f7564547261696c3c2f68333e0d0a3c756c3e0d0a3c6c693e5369676e20696e20746f2074686520415753204d616e6167656d656e7420436f6e736f6c6520616e64206f70656e2074686520436c6f7564547261696c20636f6e736f6c65206174266e6273703b68747470733a2f2f636f6e736f6c652e6177732e616d617a6f6e2e636f6d2f636c6f7564747261696c2f2e3c2f6c693e0d0a3c6c693e437265617465206120436c6f7564547261696c2c206e616d65643c7374726f6e673e266e6273703b636c6f7564747261696c2d64656d6f3c2f7374726f6e673e266e6273703b696e20796f757220726567696f6e206f66206578706c6f726174696f6e2c20616e64207361766520696e20616e205333206275636b6574206e616d6564266e6273703b3c7374726f6e673e6177732d636c6f7564747261696c2d6c6f67732d64656d6f2d3332313332313c2f7374726f6e673e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e43726561746520436c6f7564547261696c204c616b653c2f68333e0d0a3c756c3e0d0a3c6c693e53746179206f6e20436c6f7564547261696c20636f6e736f6c652c206e6176696761746520746f20436c6f7564547261696c204c616b6520616e6420636c69636b204576656e74206461746120736f75726320616e642063726561746520616e206576656e7420646174612073746f72653c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d312e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e3c7374726f6e673e436f6e666967757265266e6273703b3c2f7374726f6e673e43726561746520616e206576656e7420646174612073746f7265206e616d656420636c6f7564747261696c2d6576656e742d64732d64656d6f3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d322e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e3c7374726f6e673e43686f6f7365206576656e74733c2f7374726f6e673e266e6273703b4d616b65207375726520796f752073656c656374206174206c65617374206f6e65206576656e7420736f7572636520284d616e6167656d656e74202f20446174612920656c736520796f752077696c6c206265206e6f7469666965642077697468207468652062656c6f77206d657373616765207768696c65206d6f76696e6720746f20746865206e6578742073637265656e3c2f6c693e0d0a3c2f756c3e0d0a3c703e53656c656374206174206c65617374206f6e65206f66206d616e6167656d656e74206576656e7473206f722064617461206576656e74732e20496e207468652062656c6f77206578616d706c652c206f6e6c79206d616e6167656d656e74206576656e742069732073656c656374656420616e6420636f7079696e67206578697374696e6720747261696c206576656e74732066726f6d20737065636966696564205333206275636b65742e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d332e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e52657669657720616e64206372656174653c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d342e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e4f6e6365207375636365737366756c6c7920637265617465642c20796f752077696c6c20736565207468652062656c6f7720636f6e6669726d6174696f6e3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d352e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e4372656174652051756572793c2f68333e0d0a3c703e43726561746520717565727920746f2072756e20616761696e7374207468652061626f7665206576656e7420646174612073746f726520636c6f7564747261696c2d6576656e742d64732d64656d6f20476f206261636b20746f204576656e7420646174612073746f72652073637265656e20616e642073656c6563742052756e2071756572793c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d362e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e5175657269657320696e20436c6f7564547261696c2061726520617574686f72656420696e2053514c2e20596f752063616e206275696c642061207175657279206f6e2074686520436c6f7564547261696c204c616b6520456469746f72207461622062792077726974696e672074686520717565727920696e2053514c2066726f6d20736372617463682c206f72206279206f70656e696e672061207361766564206f722073616d706c6520717565727920616e642065646974696e672069742e3c2f703e0d0a3c703e466972737420796f75206d61792072756e206f6e65206f66207468652073616d706c65207175657269657320746f206765742061206665656c206f6620717565727920666f726d617420616e6420726573756c742c206c61746572206672616d6520796f7572206f776e20717565727920616e6420657865637574652e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e53616d706c652051756572793a3c2f68333e0d0a3c703e52756e207468652073616d706c652071756572792066696e6420746865206e756d626572206f66204150492063616c6c732067726f75706564206279206576656e74206e616d6520616e64206576656e7420736f757263652077697468696e207468652070617374207765656b2e3c2f703e0d0a3c703e546865266e6273703b3c7374726f6e673e517565727920726573756c747320746162266e6273703b3c2f7374726f6e673e666f7220616e2061637469766520717565727920646973706c61797320726f7773206f6620726573756c7473206261736564206f6e20612071756572792e20596f752063616e2066696c74657220726573756c747320627920656e746572696e6720616c6c206f722070617274206f6620616e206576656e74206669656c642076616c75652e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d372e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e4f6e207468653c7374726f6e673e266e6273703b436f6d6d616e64206f7574707574207461622c3c2f7374726f6e673e266e6273703b796f752063616e20726576696577206d657461646174612061626f7574207468652071756572792072756e2c207375636820617320746865206576656e7420646174612073746f72652049442c2072756e2074696d652c206e756d626572206f6620726573756c7473207363616e6e65642c20616e64207468652073756363657373206f72206661696c757265206f66207468652071756572792e20517565727920726573756c747320736176656420746f20616e20416d617a6f6e205333206275636b65742077696c6c20616c736f20686176652061206c696e6b20746f20746865205333206275636b657420696e20746865206d657461646174612e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d382e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e437573746f6d20517565727920313a3c2f68333e0d0a3c703e546f206c697374207468652045433220696e7374616e63652072656c61746564206576656e747320696e636c7564696e6720746865206576656e7454696d652c206576656e744e616d6520616e642049504164647265737320776865726520746865206576656e7420686173206f726967696e617465642066726f6d2074686520737065636966696564206461746520616e642074696d652028736179206c61737420352064617973293c2f703e0d0a3c703e53454c454354266e6273703b3c6272202f3e266e6273703b20266e6273703b20757365724964656e746974792e7072696e636970616c69642c20757365724964656e746974792e757365724e616d652c206576656e744e616d652c206576656e7454696d652c20736f757263654950416464726573733c2f703e0d0a3c703e46524f4d266e6273703b3c6272202f3e266e6273703b20266e6273703b206576656e745f646174615f73746f72655f49443c2f703e0d0a3c703e574845524520757365724964656e746974792e7072696e636970616c6964204953204e4f54204e554c4c266e6273703b3c2f703e0d0a3c703e414e44266e6273703b3c6272202f3e266e6273703b20266e6273703b206576656e7454696d65202667743b2027797979792d6d6d2d64642068683a6d6d3a737327266e6273703b3c2f703e0d0a3c703e414e44266e6273703b3c6272202f3e266e6273703b20266e6273703b206576656e74536f757263653d276563322e616d617a6f6e6177732e636f6d273c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d392e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e5b4e6f74653a207265706c616365206576656e745f646174615f73746f72655f4944207769746820796f7572206576656e7420646174612073746f726520696420616e6420646174652026616d703b2074696d652e5d3c2f703e0d0a3c703e496e3c7374726f6e673e266e6273703b536176653c2f7374726f6e673e266e6273703b71756572792c20656e7465722061206e616d6520616e64206465736372697074696f6e20666f72207468652071756572792e2043686f6f7365205361766520717565727920746f207361766520796f7572206368616e67657320617320746865206e65772071756572792e20546f2064697363617264206368616e67657320746f20612071756572792c2063686f6f73653c7374726f6e673e266e6273703b43616e63656c3c2f7374726f6e673e2c206f7220636c6f736520746865266e6273703b3c7374726f6e673e536176652071756572793c2f7374726f6e673e266e6273703b77696e646f773c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d31302e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e54727920697420796f757273656c663c2f68333e0d0a3c683320636c6173733d226d742d6c672d34223e437573746f6d20517565727920323c2f68333e0d0a3c703e546f206c69737420746865205465726d696e61746564206f722053746f707065642045433220696e7374616e63657320776865726520746865206576656e7420686173206f726967696e617465642066726f6d2074686520737065636966696564206461746520616e642074696d652028736179206c61737420352064617973293c2f703e0d0a3c703e53454c454354266e6273703b3c6272202f3e266e6273703b20266e6273703b20757365724964656e746974792e7072696e636970616c69642c20757365724964656e746974792e757365724e616d652c206576656e744e616d652c206576656e7454696d652c20736f757263654950416464726573733c2f703e0d0a3c703e46524f4d3c6272202f3e266e6273703b20266e6273703b2064353662663063312d666565352d343636372d393836642d6230643965363034386534623c2f703e0d0a3c703e5748455245266e6273703b3c6272202f3e266e6273703b20266e6273703b20757365724964656e746974792e7072696e636970616c6964204953204e4f54204e554c4c266e6273703b3c2f703e0d0a3c703e414e44266e6273703b3c6272202f3e266e6273703b20266e6273703b206576656e7454696d65202667743b2027323032332d30322d30312030303a30303a3030273c2f703e0d0a3c703e414e44266e6273703b3c6272202f3e266e6273703b20266e6273703b206576656e744e616d653d275465726d696e617465496e7374616e63657327204f52206576656e744e616d653d2753746f70496e7374616e636573273c2f703e0d0a3c683320636c6173733d226d742d6c672d34223e52756e2051756572793c2f68333e0d0a3c703e4865726520796f7520676f207769746820737465707320746f2072756e2061207175657279207573696e6720436c6f7564547261696c204c616b653c2f703e0d0a3c756c3e0d0a3c6c693e5369676e20696e20746f2074686520415753204d616e6167656d656e7420436f6e736f6c6520616e64206f70656e2074686520436c6f7564547261696c20636f6e736f6c65206174266e6273703b68747470733a2f2f636f6e736f6c652e6177732e616d617a6f6e2e636f6d2f636c6f7564747261696c2f2e3c2f6c693e0d0a3c6c693e46726f6d20746865206e617669676174696f6e2070616e652c206f70656e20746865204c616b65207375626d656e752c207468656e2063686f6f73652051756572792e3c2f6c693e0d0a3c6c693e4f6e207468652053617665642071756572696573206f722053616d706c65207175657269657320746162732c2063686f6f7365206120717565727920746f2072756e2062792063686f6f73696e67207468652076616c756520696e207468652051756572792053514c20636f6c756d6e2e3c2f6c693e0d0a3c6c693e4f6e2074686520456469746f72207461622c20666f72204576656e7420646174612073746f72652c2063686f6f736520616e206576656e7420646174612073746f72652066726f6d207468652064726f702d646f776e206c6973742e3c2f6c693e0d0a3c6c693e284f7074696f6e616c29204f6e2074686520456469746f72207461622c2063686f6f7365205361766520726573756c747320746f20533320746f20736176652074686520717565727920726573756c747320746f20616e205333206275636b65742e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e517565727920726573756c74732063616e20626520736176656420696e205333206275636b65743c2f68333e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d31312e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c703e4b657920706f696e747320746f2072656d656d626572207768696c6520736176696e6720717565727920726573756c747320746f2053333c2f703e0d0a3c756c3e0d0a3c6c693e436c6f7564547261696c2064656c69766572732074686520717565727920726573756c747320746f20746865205333206275636b657420696e20636f6d7072657373656420677a697020666f726d61743c2f6c693e0d0a3c6c693e4f6e20617665726167652c20616674657220746865207175657279207363616e20636f6d706c6574657320796f752063616e206578706563742061206c6174656e6379206f662036206d696e7574657320666f72206576657279204742206f6620646174612064656c69766572656420746f20746865205333206275636b65743c2f6c693e0d0a3c6c693e5175657269657320746861742072756e20666f72206c6f6e676572207468616e206f6e6520686f7572206d696768742074696d65206f75742e205061727469616c20726573756c74732077696c6c206e6f7420626520736176656420696e746f2053332c2068656e63652066696e652074756e6520796f757220717565727920746f206c696d6974207468652064617461207363616e20746f20636f6d706c6574652077697468696e20616e20686f75723c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e56616c69646174652051756572793c2f68333e0d0a3c703e496620796f752077616e7420746f2064657465726d696e6520776865746865722074686520717565727920726573756c74732068617665206265656e206d6f6469666965642c2064656c657465642c206f7220756e6368616e67656420616674657220436c6f7564547261696c2064656c697665726564207468656d2c20796f752063616e2075736520436c6f7564547261696c20717565727920726573756c747320696e746567726974792076616c69646174696f6e2e3c2f703e0d0a3c756c3e0d0a3c6c693e5369676e20696e20746f2074686520415753204d616e6167656d656e7420436f6e736f6c6520616e64206f70656e2074686520436c6f7564547261696c20636f6e736f6c65206174266e6273703b68747470733a2f2f636f6e736f6c652e6177732e616d617a6f6e2e636f6d2f636c6f7564747261696c2f3c2f6c693e0d0a3c6c693e46726f6d20746865206e617669676174696f6e2070616e652c206f70656e2074686520547269616c73207375626d656e752c207468656e2063686f6f73652074686520747261696c20616e6420636c69636b2044656c65746520627574746f6e3c2f6c693e0d0a3c6c693e596f752077696c6c2072656365697665207468652062656c6f772070726f6d70743c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d31322e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e436c69636b2044656c65746520746f2064656c6574652074686520747261696c20616e64207468656e2070726f6365656420746f2064656c657465205333206275636b65742061732064657461696c65642062656c6f772e3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e44656c65746520636c6f7564747261696c205333206275636b65743a3c2f68333e0d0a3c756c3e0d0a3c6c693e476f20746f20416d617a6f6e20533320636f6e736f6c652c2073656c6563742074686520726164696f20627574746f6e206265666f7265206177732d636c6f7564747261696c2d6c6f67732d64656d6f2d333231333231206275636b657420616e6420636c69636b2044656c65746520627574746f6e2e3c2f6c693e0d0a3c6c693e596f75206d69676874207365652074686520666f6c6c6f77696e67206572726f7220696620746865206275636b657420636f6e7461696e7320636c6f7564747261696c206576656e74733c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f415753436c6f7564547261696c4576656e74732d31332e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e7065726d616e656e746c792064656c65746520616c6c206f626a6563747320616e642064656c65746520746865206275636b65743c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e44656c657465206576656e742073746f726520646174613a3c2f68333e0d0a3c756c3e0d0a3c6c693e436c69636b206f6e20746865204576656e7420646174612073746f7265732074616220696e20746865204c616b6520636f6e736f6c652e3c2f6c693e0d0a3c6c693e53656c65637420746865206576656e7420646174612073746f72652066726f6d20746865206c6973742028636c6f7564747261696c2d6576656e742d64732d64656d6f292e3c2f6c693e0d0a3c6c693e46726f6d2074686520616374696f6e73206d656e752c2073656c65637420266c6471756f3b4368616e6765207465726d696e6174696f6e2070726f74656374696f6e26726471756f3b2e3c2f6c693e0d0a3c6c693e46726f6d20746865206368616e6765207465726d696e6174696f6e2070726f74656374696f6e20706f702d75702073656c6563742044697361626c656420616e6420636c69636b20266c6471756f3b5361766526726471756f3b2e3c2f6c693e0d0a3c6c693e46726f6d2074686520416374696f6e73206d656e752073656c6563742044656c6574652c20636f6e6669726d207468617420796f752077616e7420746f2064656c65746520697420627920656e746572696e6720746865206e616d65206f662074686520646174612073746f72652e205468656e20636c69636b20266c6471756f3b44656c65746526726471756f3b2e20546869732077696c6c20706c61636520796f7572206576656e7420646174612073746f726520696e207468652070656e64696e672064656c6574696f6e2073746174652e3c2f6c693e0d0a3c6c693e546869732077696c6c2064697361626c652074686520646174612073746f726520616e6420696e20736576656e20646179732069742077696c6c2062652064656c65746564207065726d616e656e746c792e3c2f6c693e0d0a3c6c693e496620796f75206665656c2c20796f7520686176652064656c65746564206279206d697374616b6520647572696e6720746869732074696d652c20796f752063616e20726573746f72652069742066726f6d20416374696f6e73206d656e752e20284920776173206a75737420637572696f757320696620746865206576656e7420646174612073746f72652069732067657474696e6720696e746f2070656e64696e672064656c6574696f6e2073746174652c207468656e2069742073686f756c6420626520726573746f7261626c6520746f6f293c2f6c693e0d0a3c6c693e4164646974696f6e616c6c792c2064656c65746520746865205333206275636b6574206966207468697320686173206265656e206372656174656420746f2073746f72652074686520717565727920726573756c747320696e20746869732064656d6f2e206578616d706c653a206177732d636c6f7564747261696c2d6c616b652d71756572792d726573756c74732d2d3c2f6c693e0d0a3c2f756c3e0d0a3c683320636c6173733d226d742d6c672d34223e4c6561726e696e67205265666572656e63653c2f68333e0d0a3c756c3e0d0a3c6c693e3c753e41575320436c6f7564547261696c20757365722067756964653c2f753e3c2f6c693e0d0a3c6c693e3c753e41575320436c6f7564547261696c2070726963696e673c2f753e3c2f6c693e0d0a3c2f756c3e, 'active', 'blog', NULL, 'Query AWS Cloud Trail Events', NULL, 'undefined', NULL, '2023-03-14 20:30:08', '2023-03-17 18:15:56');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(45, NULL, 'Deploying a ReactJS Web Application to AWS Elastic Beanstalk with Azure DevOps Pipeline', 'deploying-a-reactjs-web-application-to-aws-elastic-beanstalk-with-azure-devops-pipeline', 'uploads/2023/03/682ee77feaf844e315cb67f3f255bd97.png', 'uploads/2023/03/54449c13aeba96e1c0ea7389e4715d03.png', NULL, 'Balaji Ramulapalli', '2023-03-15', 'This post demonstrates how to create a simple Azure DevOps project, repository, and pipeline to deploy an ReactJS Web application...', 0x3c68323e537465702d62792d537465702047756964653a204465706c6f79696e6720612052656163744a5320576562204170706c69636174696f6e20746f2041575320456c6173746963204265616e7374616c6b207769746820417a757265204465764f707320506970656c696e653c2f68323e0d0a3c703e5468697320706f73742064656d6f6e7374726174657320686f7720746f2063726561746520612073696d706c6520417a757265204465764f70732070726f6a6563742c207265706f7369746f72792c20616e6420706970656c696e6520746f206465706c6f7920616e2052656163744a5320576562206170706c69636174696f6e20746f2041575320456c6173746963204265616e7374616c6b207573696e6720417a757265204465764f70732e3c2f703e0d0a3c68333e5461626c65206f6620436f6e74656e74733c2f68333e0d0a3c756c3e0d0a3c6c693e48696768206c6576656c206172636869746563747572653c2f6c693e0d0a3c6c693e5072652d726571756973697465733c2f6c693e0d0a3c6c693e417a757265204465764f707320436f6e74696e756f757320496e746567726174696f6e20284349292070726f636573733c2f6c693e0d0a3c6c693e415753206465706c6f796d656e74206372656174696f6e3c2f6c693e0d0a3c6c693e417a757265204465764f707320436f6e74696e756f7573204465706c6f796d656e7420284344292070726f636573733c2f6c693e0d0a3c6c693e436c65616e75703c2f6c693e0d0a3c6c693e4c6561726e696e67205265666572656e63653c2f6c693e0d0a3c6c693e436f6e636c7573696f6e3c2f6c693e0d0a3c2f756c3e0d0a3c703e54686520666f6c6c6f77696e672073637265656e73686f742073686f7773206120686967682d6c6576656c20617263686974656374757265206469616772616d206f662074686520706970656c696e653a3c2f703e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d312e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c703e496e207468697320706f73742c2077652061726520676f696e6720746f206465706c6f792052656163744a53204170706c69636174696f6e207573696e6720417a757265204465764f707320616e642041575320456c6173746963204265616e7374616c6b2e3c2f703e0d0a3c68333e5072652d726571756973697465733a3c2f68333e0d0a3c756c3e0d0a3c6c693e5369676e20696e20617320616e2049414d207573657220696e20415753204163636f756e74203a204f70656e2074686520415753204d616e6167656d656e7420436f6e736f6c652061742068747470733a2f2f636f6e736f6c652e6177732e616d617a6f6e2e636f6d2f20416c7465726e61746976656c792c206f70656e20612062726f7773657220616e6420656e7465722074686520666f6c6c6f77696e67207369676e2d696e2055524c2c207265706c6163696e67206163636f756e745f616c6961735f6f725f6964207769746820746865206163636f756e7420616c696173206f722031322d6469676974206163636f756e742049442070726f766964656420627920796f75722061646d696e6973747261746f723a2068747470733a2f2f6163636f756e745f616c6961735f6f725f69642e7369676e696e2e6177732e616d617a6f6e2e636f6d2f636f6e736f6c652f3c2f6c693e0d0a3c6c693e415753206163636f756e74202841646d696e6973747261746f722041636365737320666f6c6c6f77206c656173742070726976696c656765207072696e636970616c20616e6420637265617465207370656369666963207065726d697373696f6e732920415753206163636f756e7420746f2063726561746520746865207265736f7572636573206c696b65204157532049414d2c20416d617a6f6e2053332c2041575320456c6173746963204265616e7374616c6b2c20416d617a6f6e20436c6f7564576174636820616e6420416d617a6f6e204543322e3c2f6c693e0d0a3c6c693e3c7374726f6e673e415753207365727669636520726f6c653c2f7374726f6e673e266e6273703b697320726571756972656420746f20637265617465207468652061626f766520415753207365727669636573203a2041207365727669636520726f6c6520697320616e2049414d20726f6c6520746861742061207365727669636520617373756d657320746f20706572666f726d20616374696f6e73206f6e20796f757220626568616c662e20416e2049414d2061646d696e6973747261746f722063616e206372656174652c206d6f646966792c20616e642064656c6574652061207365727669636520726f6c652066726f6d2077697468696e2049414d2e20466f72206d6f726520696e666f726d6174696f6e2c20736565204372656174696e67206120726f6c6520746f2064656c6567617465207065726d697373696f6e7320746f20616e20415753207365727669636520696e207468652049414d20557365722047756964652e3c2f6c693e0d0a3c6c693e5369676e2075702077697468206120706572736f6e616c204d6963726f736f6674206163636f756e74203a2053656c65637420746865207369676e2d7570206c696e6b20666f7220417a757265204465764f70732e205369676e20696e20746f20796f7572206f7267616e697a6174696f6e20617420616e792074696d652c202868747470733a2f2f6465762e617a7572652e636f6d2f7b796f75726f7267616e697a6174696f6e7d292e3c2f6c693e0d0a3c6c693e417a757265204465764f7073206163636f756e7420666f72206372656174696e6720746865207265736f7572636573206c696b6520417a757265204465764f7073205365727669636520636f6e6e656374696f6e2c20417a757265204275696c6420706970656c696e652c20417a7572652052656c6561736520506970656c696e6520616e6420417a757265205265706f2e3c2f6c693e0d0a3c6c693e436f6e7472696275746f7273207065726d697373696f6e7320697320726571756972656420666f72206465764f707320656e67696e65657220746f206275696c6420746865204349434420506970656c696e652e3c2f6c693e0d0a3c6c693e506c656173652072656665722062656c6f77206c696e6b7320666f722074797065206f66207065726d697373696f6e7320616e6420686f7720746f206164642074686520757365727320616e642061737369676e207065726d697373696f6e7320746f2074686520757365727320696e20617a757265206465766f707320706f7274616c2e2068747470733a2f2f6c6561726e2e6d6963726f736f66742e636f6d2f656e2d75732f617a7572652f6465766f70732f6f7267616e697a6174696f6e732f73656375726974792f61626f75742d7065726d697373696f6e733f766965773d617a7572652d6465766f707326616d703b746162733d707265766965772d706167652068747470733a2f2f6c6561726e2e6d6963726f736f66742e636f6d2f656e2d75732f617a7572652f6465766f70732f706970656c696e65732f706f6c69636965732f7365742d7065726d697373696f6e733f766965773d617a7572652d6465766f70733c2f6c693e0d0a3c2f756c3e0d0a3c68333e417a757265204465764f707320436f6e74696e756f757320496e746567726174696f6e20284349292070726f636573733a3c2f68333e0d0a3c703e417a757265205265706f204372656174696f6e3a3c2f703e0d0a3c756c3e0d0a3c6c693e4372656174652074686520417a757265207265706f2061732062656c6f77206d656e74696f6e65642073746570732e3c2f6c693e0d0a3c6c693e43726561746520616e20417a757265204465764f70732050726f6a6563742c20636c6f6e652070726f6a656374207265706f2c20616e6420707573682052656163744a5320776562206170706c69636174696f6e2e3c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d322e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e4275696c6420506970656c696e6520284349293c2f6c693e0d0a3c6c693e436c69636b2074686520706970656c696e6520616e6420636c69636b207468652063726561746520706970656c696e6520627574746f6e2e3c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d332e6a7067222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e53656c6563742074686520417a757265205265706f7320676974206f7074696f6e20616e642073656c6563742074686520616c72656164792063726561746564207265706f7369746f72792e3c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d342e6a7067222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e53656c656374204e6f64654a532077697468205265616374207468656e20746865204175746f2d67656e6572617465642059414d4c20436f64652073686f7765642075702e20666f72206e6f772c2049206a757374207361766520616e642072756e20746869732e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d352e6a7067222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e557064617465207468652064656661756c742079616d6c2066696c6520776974682062656c6f7720636f646520746f2067656e6572617465207468652061727469666163742e3c2f6c693e0d0a3c6c693e5361766520746865206275696c6420706970656c696e652c206275696c6420706970656c696e652077696c6c20626520747269676765726564206175746f6d61746963616c6c792e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d362e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e436c69636b20746865207075626c69736865642074616220746f2073656520746865206172746966616374732e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d372e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c68333e415753206465706c6f796d656e74206372656174696f6e3c2f68333e0d0a3c756c3e0d0a3c6c693e436f6e666967757265204465706c6f796d656e7420456e7669726f6e6d656e7420696e2041575320456c6173746963204265616e7374616c6b3c2f6c693e0d0a3c6c693e4c6f67696e20696e746f207468652041575320636f6e736f6c6520616e642073656172636820666f722041575320456c6173746963204265616e7374616c6b20696e2073657276696365732e20436c69636b2074686520637265617465206170706c69636174696f6e20627574746f6e20746f20747269676765722074686520656e7669726f6e6d656e742e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b2070616464696e672d6c6566743a20343070783b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d382e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e5570646174652074686520656e7669726f6e6d656e74616c20636f6e66696775726174696f6e732061732062656c6f77206d656e74696f6e2e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d392e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e53656c65637420746865206170706c69636174696f6e20747970652e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b2070616464696e672d6c6566743a20343070783b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31302e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b2070616464696e672d6c6566743a20343070783b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31312e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31322e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31332e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31342e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31352e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e436c69636b20746865207361766520627574746f6e20746f206372656174652074686520656e7669726f6e6d656e742e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31362e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e456e7669726f6e6d656e742063726561746564207375636365737366756c6c792e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e417a757265204465764f707320436f6e74696e756f7573204465706c6f796d656e7420284344292070726f636573733c2f68333e0d0a3c756c3e0d0a3c6c693e45737461626c69736820636f6e6e656374696f6e206265747765656e2041777320456c6173746963204265616e7374616c6b20746f20417a757265204465764f70733c2f6c693e0d0a3c6c693e437265617465207468652049414d207573657220616e64206772616e7420746865207265717569726564206163636573732028416d617a6f6e205333206275636b6574206163636573732920415753207365727669636573202667743b2073656c6563742049414d202667743b207573657273202667743b2061646475736572202667743b2063726561746520616363657373206b65793c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31372e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e437265617465207365727669636520636f6e6e656374696f6e20696e20417a757265204465766f707320706f7274616c2e3c2f6c693e0d0a3c6c693e4c6f67696e20417a757265204465766f707320706f7274616c202667743b2050726f6a6563742053657474696e6773202667743b205365727669636520636f6e6e656374696f6e73202667743b20636c69636b2074686520266c6471756f3b4e6577207365727669636520636f6e6e656374696f6e26726471756f3b202667743b2073656c65637420266c6471756f3b41575326726471756f3b3c2f6c693e0d0a3c6c693e5468656e20616464204163636573734b65792049442026616d703b2053656372657420416363657373204b657920776869636820697320646566696e65642061626f76653c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31382e706e67222077696474683d2235302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e4372656174652052656c6561736520506970656c696e6520284344293c2f6c693e0d0a3c6c693e53656c656374207468652072656c656173657320756e64657220706970656c696e65732e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d31392e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e416464207468652061727469666163742061732062656c6f77206d656e74696f6e65642e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32302e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e41646420616d617a6f6e2073332075706c6f6164207461736b20666f722075706c6f6164696e67207468652061727469666163747320696e746f207333206275636b65742e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32312e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32322e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e4164642041575320456c6173746963204265616e7374616c6b20617070206465706c6f79207461736b20666f72206465706c6f79696e67207468652077656261707020696e20456c6173746963204265616e7374616c6b2e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32332e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32342e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e5361766520616e64206372656174652072656c6561736520746f2074726967676572207468652072656c6561736520706970656c696e652e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32352e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e52656c6561736520706970656c696e65206465706c6f79696e672074686520776562206170706c69636174696f6e20696e20456c6173746963204265616e7374616c6b2e3c2f6c693e0d0a3c2f756c3e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32362e706e67222077696474683d223130302522202f3e3c2f703e0d0a3c756c3e0d0a3c6c693e576562206170706c69636174696f6e206465706c6f796564207375636365737366756c6c7920696e2041575320456c6173746963204265616e7374616c6b2e3c2f6c693e0d0a3c2f756c3e0d0a3c703e3c696d67207374796c653d22646973706c61793a20626c6f636b3b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b22207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75642f6173736574732f696d672f626c6f672d696e6e65722f52656163744a532d32372e706e67222077696474683d2238302522202f3e3c2f703e0d0a3c68333e436c65616e75703c2f68333e0d0a3c68343e44656c65746520417a757265205265706f3a3c2f68343e0d0a3c756c3e0d0a3c6c693e4c6f6720696e20746f266e6273703b3c753e417a757265204465764f70733c2f753e266e6273703b616e64206f70656e20796f75722070726f6a6563742e3c2f6c693e0d0a3c6c693e53656c656374266e6273703b3c7374726f6e673e5265706f732c2046696c65732e3c2f7374726f6e673e266e6273703b3c2f6c693e0d0a3c6c693e46726f6d20746865207265706f2064726f702d646f776e2c2073656c656374266e6273703b3c7374726f6e673e4d616e616765207265706f7369746f726965732e3c2f7374726f6e673e266e6273703b3c2f6c693e0d0a3c6c693e53656c65637420746865206e616d65206f6620746865207265706f7369746f72792066726f6d20746865203c7374726f6e673e5265706f7369746f726965733c2f7374726f6e673e206c6973742c2063686f6f736520746865202e2e2e206d656e752c20616e64207468656e2063686f6f7365203c7374726f6e673e44656c657465207265706f7369746f72792e3c2f7374726f6e673e3c2f6c693e0d0a3c6c693e436f6e6669726d207468652064656c6574696f6e206f6620746865207265706f7369746f727920627920747970696e6720746865207265706f2773206e616d6520616e642073656c656374696e67203c7374726f6e673e44656c6574652e3c2f7374726f6e673e3c2f6c693e0d0a3c2f756c3e0d0a3c68343e44656c65746520417a757265204275696c6420506970656c696e653a3c2f68343e0d0a3c756c3e0d0a3c6c693e4c6f6720696e20746f266e6273703b3c753e417a757265204465764f70733c2f753e266e6273703b616e64206f70656e20796f75722070726f6a6563742e3c2f6c693e0d0a3c6c693e4f6e20746865206c6566742073696465206d656e7520756e64657220506970656c696e65732c20636c69636b206f6e203c7374726f6e673e506970656c696e653c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e436c69636b206f6e203c7374726f6e673e4d6f7265204f7074696f6e733c2f7374726f6e673e20616761696e73742074686520417a757265204465764f707320506970656c696e6520796f752077616e7420746f2064656c6574652e3c2f6c693e0d0a3c6c693e436c69636b206f6e203c7374726f6e673e44656c6574653c2f7374726f6e673e2e2050726f7669646520746865206e616d65206f662074686520706970656c696e6520746f20636f6e6669726d20697420616e64207468656e20636c69636b206f6e203c7374726f6e673e44656c6574653c2f7374726f6e673e2e3c2f6c693e0d0a3c2f756c3e0d0a3c68343e44656c65746520417a7572652052656c6561736520506970656c696e653a3c2f68343e0d0a3c756c3e0d0a3c6c693e4c6f6720696e20746f20417a757265204465764f707320616e64206f70656e20796f75722070726f6a6563742e3c2f6c693e0d0a3c6c693e4f6e20746865206c6566742073696465206d656e7520756e64657220506970656c696e65732c20636c69636b206f6e203c7374726f6e673e52656c65617365733c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e436c69636b206f6e204d6f7265204f7074696f6e7320616761696e73742074686520417a757265204465764f70732052656c656173657320796f752077616e7420746f2064656c6574652e20436c69636b206f6e203c7374726f6e673e44656c6574653c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e50726f7669646520746865206e616d65206f662074686520706970656c696e6520746f20636f6e6669726d20697420616e64207468656e20636c69636b206f6e203c7374726f6e673e44656c6574653c2f7374726f6e673e2e3c2f6c693e0d0a3c2f756c3e0d0a3c68343e44656c65746520415753204465706c6f796d656e7420456e7669726f6e6d656e74202820456c6173746963204265616e7374616c6b293a3c2f68343e0d0a3c756c3e0d0a3c6c693e44656c65746520616c6c206170706c69636174696f6e2076657273696f6e732e3c2f6c693e0d0a3c6c693e4f70656e20746865266e6273703b3c753e456c6173746963204265616e7374616c6b20636f6e736f6c653c2f753e2c20616e6420696e20746865266e6273703b3c7374726f6e673e526567696f6e733c2f7374726f6e673e6c6973742c2073656c65637420796f75722041575320526567696f6e2e3c2f6c693e0d0a3c6c693e496e20746865206e617669676174696f6e2070616e652c2063686f6f7365266e6273703b3c7374726f6e673e4170706c69636174696f6e732c3c2f7374726f6e673e266e6273703b616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e67657474696e672d737461727465642d6170703c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e496e20746865206e617669676174696f6e2070616e652c2066696e6420796f7572206170706c69636174696f6e2773206e616d6520616e642063686f6f7365266e6273703b3c7374726f6e673e4170706c69636174696f6e2076657273696f6e733c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e4f6e20746865266e6273703b3c7374726f6e673e4170706c69636174696f6e2076657273696f6e733c2f7374726f6e673e20706167652c2073656c65637420616c6c206170706c69636174696f6e2076657273696f6e73207468617420796f752077616e7420746f2064656c6574652e3c2f6c693e0d0a3c6c693e43686f6f7365266e6273703b3c7374726f6e673e416374696f6e732c3c2f7374726f6e673e266e6273703b616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e44656c6574652e3c2f7374726f6e673e3c2f6c693e0d0a3c6c693e5475726e206f6e266e6273703b3c7374726f6e673e44656c6574652076657273696f6e732066726f6d20416d617a6f6e2053333c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e43686f6f7365266e6273703b3c7374726f6e673e44656c6574653c2f7374726f6e673e2c20616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e446f6e653c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e5465726d696e6174652074686520656e7669726f6e6d656e742e3c2f6c693e0d0a3c6c693e496e20746865206e617669676174696f6e2070616e652c2063686f6f7365266e6273703b3c7374726f6e673e67657474696e672d737461727465642d6170702c3c2f7374726f6e673e266e6273703b616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e47657474696e67537461727465644170702d656e763c2f7374726f6e673e20696e2074686520656e7669726f6e6d656e74206c6973742e3c2f6c693e0d0a3c6c693e43686f6f7365266e6273703b3c7374726f6e673e416374696f6e732c3c2f7374726f6e673e266e6273703b616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e5465726d696e61746520456e7669726f6e6d656e743c2f7374726f6e673e2e3c6272202f3e436f6e6669726d207468617420796f752077616e7420746f207465726d696e6174652047657474696e67537461727465644170702d656e7620627920747970696e672074686520656e7669726f6e6d656e74206e616d652c20616e64207468656e2063686f6f7365266e6273703b3c7374726f6e673e5465726d696e6174653c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e44656c657465207468652067657474696e672d737461727465642d617070206170706c69636174696f6e2e3c2f6c693e0d0a3c6c693e496e20746865206e617669676174696f6e2070616e652c2063686f6f736520746865203c7374726f6e67207374796c653d22666f6e742d66616d696c793a202d6170706c652d73797374656d2c20426c696e6b4d616353797374656d466f6e742c20275365676f65205549272c20526f626f746f2c204f787967656e2c205562756e74752c2043616e746172656c6c2c20274f70656e2053616e73272c202748656c766574696361204e657565272c2073616e732d73657269663b223e67657474696e672d737461727465642d6170703c2f7374726f6e673e2e3c2f6c693e0d0a3c6c693e43686f6f7365203c7374726f6e673e416374696f6e733c2f7374726f6e673e2c20616e64207468656e2063686f6f7365203c7374726f6e673e44656c657465206170706c69636174696f6e2e3c2f7374726f6e673e3c2f6c693e0d0a3c6c693e436f6e6669726d207468617420796f752077616e7420746f2064656c657465203c7374726f6e673e67657474696e672d737461727465642d6170703c2f7374726f6e673e20627920747970696e6720746865206170706c69636174696f6e206e616d652c20616e64207468656e2063686f6f7365203c7374726f6e673e44656c6574653c2f7374726f6e673e2e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e3c7374726f6e673e4c6561726e696e67205265666572656e63653c2f7374726f6e673e3c2f68333e0d0a3c756c3e0d0a3c6c693e3c6120687265663d2268747470733a2f2f646f63732e6177732e616d617a6f6e2e636f6d2f656c61737469636265616e7374616c6b2f6c61746573742f64672f47657474696e67537461727465642e68746d6c223e68747470733a2f2f646f63732e6177732e616d617a6f6e2e636f6d2f656c61737469636265616e7374616c6b2f6c61746573742f64672f47657474696e67537461727465642e68746d6c3c2f613e3c2f6c693e0d0a3c6c693e3c6120687265663d2268747470733a2f2f7777772e617a7572656465766f70736c6162732e636f6d2f6c6162732f76737473657874656e642f617a7572656465766f707370726f6a656374646f746e65742f223e68747470733a2f2f7777772e617a7572656465766f70736c6162732e636f6d2f6c6162732f76737473657874656e642f617a7572656465766f707370726f6a656374646f746e65742f3c2f613e3c2f6c693e0d0a3c2f756c3e0d0a3c68333e3c7374726f6e673e436f6e636c7573696f6e3c2f7374726f6e673e3c2f68333e0d0a3c703e417a757265204465764f70732069732074686520726967687420736f6c7574696f6e20696620796f752077616e7420746f206275696c6420456173792043492f434420706970656c696e652c206974206973206561737920746f20636f6e66696775726520616e64206561737920746f20696e74656772617465207769746820616e79206f7468657220636c6f75642073657276696365206a75737420776520696e746567726174652077697468204157532e3c2f703e0d0a3c703e456c6173746963204265616e7374616c6b2069732074686520726967687420736f6c7574696f6e20696620796f752077616e7420746f206465706c6f7920776562206170707320717569636b6c7920776974686f757420776f727279696e672061626f757420616e7920756e6465726c79696e6720696e6672617374727563747572652e3c2f703e0d0a3c703e266e6273703b3c2f703e, 'active', 'blog', NULL, 'Deploying a ReactJS Web Application to AWS Elastic Beanstalk with Azure DevOps Pipeline', 'Deploying a ReactJS Web Application to AWS Elastic Beanstalk with Azure DevOps Pipeline', 'undefined', NULL, '2023-03-15 12:37:19', '2023-03-17 23:29:32'),
(50, NULL, 'Business opportunities & challenges posed by rapid advances in Machine Learning', 'business-opportunities-challenges-posed-by-rapid-advances-in-machine-learning', 'uploads/2023/03/1f3d86bfad54a633a247fd01a366395d.jpg', 'uploads/2023/03/c14ac20ed871687e38e53c38091561b6.jpg', NULL, 'Pritam Dodeja', NULL, 'It seems that with each passing day, some new advance is celebrated in the mainstream media about what Machine Learning can now do...', 0x3c68333e4d616e6167696e6720726f7574696e6520726170696420616476616e63657320696e204d616368696e65204c6561726e696e673c2f68333e0d0a3c703e4974207365656d732074686174207769746820656163682070617373696e67206461792c20736f6d65206e657720616476616e63652069732063656c6562726174656420696e20746865206d61696e73747265616d206d656469612061626f75742077686174204d616368696e65204c6561726e696e672063616e206e6f7720646f2e266e6273703b204576656e206265666f72652074686520696e6b20686173206472696564206f6e207468652070726573732072656c656173652c20746865206e6578742062657374207468696e672069732072656c65617365642e266e6273703b204974206973206e61747572616c20746f20657870657269656e6365206120266c6471756f3b66656172206f66206d697373696e67206f757426726471756f3b206d6f6d656e742c20746f20676574206c6f737420696e2074686520687970652e266e6273703b20486f77657665722c20746f2066756c6c792074616b6520616476616e74616765206f6620746865206f70706f7274756e697469657320616e64207375726d6f756e7420746865206368616c6c656e67657320706f7365642062792074686520657261206f66204172746966696369616c20496e74656c6c6967656e63652c20696e206f7572206f70696e696f6e2c2069742069732074686520266c6471756f3b6669727374207072696e6369706c657326726471756f3b20626173656420617070726f61636820746861742077696c6c20646966666572656e746961746520746865207375636365737366756c206f7267616e697a6174696f6e73206f6620746865206675747572652e3c2f703e0d0a3c68333e436f7265205072696e6369706c65733a3c2f68333e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e312e20596f75722064617461206973206e6f77206d6f72652076616c7561626c65207468616e20697420776173206265666f7265206173206d6f726520696e73696768747320617265206e6f7720726561636861626c652e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e322e266e6273703b5468652076616c75652070726f706f736974696f6e206f6620796f7572206f7267616e697a6174696f6e2063616e20626520616d706c696669656420627920746865206170706c69636174696f6e206f66206d616368696e65206c6561726e696e67206f6e6c792069663a3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20383070783b223e612e266e6273703b596f757220646174612069732077656c6c206f7267616e697a656420616e6420676f7665726e65642e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20383070783b223e622e20427573696e657373206361736573206861766520646972656374206c696e65206f6620736967687420696e746f206f7574636f6d657320746861742063616e20626520656e61626c6564206279204d616368696e65204c6561726e696e672e266e6273703b20596f7520617265206e6f742067657474696e67206c6f737420696e207468652068797065206379636c652e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20383070783b223e632e20596f75206170706c7920736f756e6420656e67696e656572696e67207072696e6369706c657320746f206275696c64206f7574204d616368696e65204c6561726e696e67206361706162696c6974696573207573696e6720626573742070726163746963657320626f72726f7765642066726f6d20612076617269657479206f66206d6f7265206d6174757265206469736369706c696e65732e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e332e20596f7572206f7267616e697a6174696f6e616c2063756c74757265206e6565647320746f20726563616c6962726174652061726f756e6420746865206e657720706172616469676d207768657265766572206170706c696361626c652e3c2f703e0d0a3c70207374796c653d2270616464696e672d6c6566743a20343070783b223e342e2048756d616e206372656174697669747920616e64206578706572746973652077696c6c20636f6e74696e756520746f20626520686967686c792076616c7561626c6520616e6420736f756768742061667465722e266e6273703b2054686572652077696c6c2062652070726f647563746976697479206761696e73206174206576657279206c6576656c206f66206b6e6f776c656467652e3c2f703e0d0a3c68333e446174613a20416e20417070726563696174696e672041737365743c2f68333e0d0a3c703e4974207573656420746f206265207468617420627573696e657373207472616e73616374696f6e7320776f756c64206f636375722c20636170747572656420696e20736f6d652073797374656d2c206d6f76656420746f20616e6f746865722073797374656d2c20616e616c797a65642062792068756d616e732c20736f6d6520696e736967687420646572697665642c20616e6420616e20616374696f6e2074616b656e20696e20726573706f6e73652e266e6273703b204e6f77207468652073617920616374697669746965732c20776974682062657474657220616c676f726974686d732c2063616e20626520706572666f726d656420617320746865207472616e73616374696f6e7320617265206f6363757272696e672e266e6273703b20496e20736f6d652063617365732c20746865792061726520696e666f726d696e67207468652074797065206f66207472616e73616374696f6e20746861742073686f756c64206f6363757220696e2074686520666972737420706c6163652e3c2f703e0d0a3c703e54686520726561736f6e20666f722074686973206973206d616e69666f6c643b20646174612070726f63657373696e67206361706162696c69746965732068617665206d6174757265642067726561746c792064756520746f2074686520616476656e74206f6620636c6f75642e266e6273703b204d616368696e65204c6561726e696e6720616c676f726974686d732063616e20656173696c792066697420696e746f2074686f736520646174612070726f63657373696e6720706970656c696e657320616e642070726f76696465207265616c2d74696d6520616374696f6e61626c6520696e7369676874732e266e6273703b20486f77657665722c2074686520696e73696768747320746865792063616e2070726f7669646520617265206c696d6974656420627920746865207175616c697479206f662064617461207468617420746865792063616e20626520747261696e6564206f6e2e266e6273703b204461746120476f7665726e616e636520697320726571756972656420666f722068696768207175616c69747920696e7075747320696e746f204d616368696e65204c6561726e696e6720616c676f726974686d732e266e6273703b2054686520656e726963686d656e74206f662074686973206461746120696e746f2068696768657220666964656c697479207369676e616c732069732061206a6f696e7420726573706f6e736962696c697479206f662068756d616e20656e67696e656572732061732077656c6c206173206e657572616c206e6574776f726b7320746861742063616e2073706f74207061747465726e7320746861742068756d616e732063616e6e6f742e266e6273703b204966207468652064617461207175616c697479206973206c61636b696e672c207468656e2074686520696e7369676874732070726f647563656420617265206e6f206c6f6e676572206170706c696361626c6520696e20746865207265616c20776f726c642e266e6273703b2049662074686572652069736e26727371756f3b7420656e6f756768206461746120746f20747261696e2074686520616c676f726974686d2c207468656e2074686520696e73696768747320617265206e6f742072656c6961626c652e266e6273703b2054686520726561736f6e20666f7220746869732069732074686174204d616368696e65204c6561726e696e6720616c676f726974686d7320617265206a7573742066616e6379206d617468656d61746963616c2066756e6374696f6e732074686174207072656469637420667574757265206f7574636f6d657320627920696e746572706f6c6174696e67206f6e20746865206461746120746865792068617665206265656e20747261696e6564206f6e2e266e6273703b205468697320616c736f206d65616e7320746861742070726f74656374696e6720796f7572206f7267616e697a6174696f6e732064617461206265636f6d6573206576656e206d6f72652076616c7561626c652c206173206120636f6d70657469746f722c20776974682061636365737320746f20796f757220646174612c2063616e20637265617465207468652070726f64756374207468617420796f7572205226616d703b44207465616d20776f756c64206861766520637265617465642e3c2f703e0d0a3c68333e416d706c696679696e67207468652056616c75652050726f706f736974696f6e206f66204f7267616e697a6174696f6e733c2f68333e0d0a3c703e5768657468657220666f722070726f666974206f72206e6f742c2065616368206f7267616e697a6174696f6e207365727665732061206d697373696f6e2c20776869636820696e20736f6d6520666f726d2070726f76696465732061207365727669636520746f20736f63696574792e266e6273703b205468697320696e766f6c76657320736f6d652076616c75652067656e65726174696e6720616374697669747920776865726520746865726520697320612063726561746f7220616e6420612072656365697665722e266e6273703b204f6e6520636f6d6d6f6e2077617920746f20757365204d616368696e65204c6561726e696e6720697320746f20756e6465727374616e642074686520637573746f6d6572206265747465722e266e6273703b2054686572652061726520612076617269657479206f66204d616368696e65204c6561726e696e6720616c676f726974686d7320746861742063616e2073706f74207061747465726e7320696e2075736572206265686176696f727320746861742063616e2068656c702077697468206372656174696e6720746865207269676874206f66666572696e677320666f72207468617420637573746f6d65722e3c2f703e0d0a3c703e416e6f7468657220636f6d6d6f6e207061747465726e20697320696e74656c6c6967656e74206175746f6d6174696f6e2c20746f2072656d6f7665207468652064727564676572792066726f6d20776f726b20627920686176696e67204d616368696e65204c6561726e696e6720616c676f726974686d732063726561746520616e642070726f6365737320646f63756d656e74732061732070617274206f66206120627573696e6573732070726f636573732e266e6273703b204e6f7720616c676f726974686d732063616e20756e6465727374616e642073706f6b656e206c616e67756167652c207472616e736c61746520697420746f20616e6f74686572206c616e67756167652e266e6273703b20416c676f726974686d732063616e2073656520696d6167657320616e64206d616b652073656e7365206f66207468656d2c2074616b6520616374696f6e73206261736564206f6e207468656d2e3c2f703e0d0a3c703e486f77657665722c20746865206b657920746f20737563636573732077696c6c20616c7761797320636f6d6520646f776e20746f206669727374207072696e6369706c65733a204172652077652c20617320616e206f7267616e697a6174696f6e2c20756e6465727374616e64696e67206f757220637573746f6d65722077656c6c2c206372656174696e6720746865207269676874207479706573206f662070726f647563747320616e642073657276696365732c206f66666572696e67207468656d2061742070726963657320746861742061726520636f6d70657469746976652c20616e64206172652077652061626c6520746f207375737461696e61626c7920646f20746869732e266e6273703b2041206b6e6f776c65646765206f662074686520646f6d61696e20616e6420746865207269676874206170706c69636174696f6e206f662074686174206b6e6f776c656467652077696c6c207374696c6c206265206120636f72652068756d616e2061637469766974792c206275742074686520616374697669746965732062656c6f7720746869732063616e20626520696e74656c6c6967656e746c79206175746f6d6174656420746f20647269766520656666696369656e636965732c20616e6420657870616e6420746865207265616368206f662070726f647563747320616e642073657276696365732e3c2f703e0d0a3c703e546f20696d706c656d656e74207468657365204d616368696e65204c6561726e696e6720616c676f726974686d73206174207363616c6520697320616e20456e67696e656572696e67206368616c6c656e6765207468617420696e766f6c766573206d616e7920646966666572656e7420617370656374732e266e6273703b20456e67696e656572696e672064617461207175616c6974792c20656e72696368696e67206665617475726573207769746820646f6d61696e206b6e6f776c6564676520746861742068656c707320746865206d6f64656c7320746f206c6561726e2066617374657220616e64206265747465722c2066696e64696e6720746865206265737420736574206f6620706172616d657465727320666f72206120706172746963756c617220646f6d61696e2c20747261696e696e6720746865206d6f64656c732c20766572696679696e67207468657920776f726b20617320696e74656e646564206f6e20756e7365656e20646174612c206d6f6e69746f72696e67207468656d206f6e20616e206f6e676f696e672062617369732061732074686520627573696e657373206c616e647363617065206368616e6765732e266e6273703b20446f696e6720746869732077656c6c207265717569726573207269676f72206163726f7373206d756c7469706c6520636f6d706c6578206469736369706c696e65732e3c2f703e0d0a3c68333e53747261746567793a20576861742043756c7475726526727371756f3b7320686176696e6720666f7220627265616b666173743c2f68333e0d0a3c703e4a75737420617320697420697320696d706f7274616e7420746f20737562737469747574652074686520456e67696e656572696e67206379636c6520666f72207468652068797065206379636c652c20697420697320696d706f7274616e7420746f2063726561746520616e206f7267616e697a6174696f6e616c2063756c747572652077686572652074686520636f6e63657074206f66206661696c696e6720646f65736e26727371756f3b742065786973742e266e6273703b204f6e6c79206c6561726e696e67206578697374732e266e6273703b20466f726d756c6174696e6720612063756c7475726520746861742074616b65732063616c63756c61746564207269736b7320696e204d616368696e65204c6561726e696e672070726f6a656374732c2074686174206c6f6f6b73206174206461746120617320612070726563696f75732061737365742c20616e64206f6e65207468617420617070726563696174657320686f7720636f6d706c657820616e64206e6577207468697320616c6c206973206b657920746f20616368696576696e6720646966666572656e74696174656420627573696e657373206f7574636f6d65732e266e6273703b2049662070726f6a656374732c20627920646566696e6974696f6e2c206d75737420616c7761797320737563636565642c207468656e206f7267616e697a6174696f6e7320646f206e6f7420646f20646966666963756c742070726f6a656374733b207468657920646f207468652073616665206f6e65732e3c2f703e0d0a3c703e427573696e65737320616e6420646f6d61696e206b6e6f776c656467652073686170696e672074686520627573696e65737320636173657320616e6420636f6e74696e67656e637920706c616e732c20636f75706c656420776974682050726f64756374204d616e616765727320616e6420456e67696e656572696e67207265736f7572636573207468617420666f726d756c61746520616e64207472616e736c617465207468652070726f626c656d7320696e746f206f6e657320746861742063616e20626520736f6c766564206279204d616368696e65204c6561726e696e672077696c6c20626520637269746963616c20696e206372656174696e6720612063756c74757265207768657265204d616368696e65204c6561726e696e6720697320706f737369626c652e3c2f703e0d0a3c703e4372656174696e67206120636f6d6d756e697479206f662070726163746974696f6e6572732074686174207370616e2074686520656e7469726520627573696e657373206c616e6473636170652077696c6c20616363656c657261746520746865206170706c69636174696f6e206f66206c6573736f6e73206c6561726e656420696e206f6e652070617274206f6620746865206f7267616e697a6174696f6e20746f20746865206f746865722e266e6273703b20536f6d65204d616368696e65204c6561726e696e6720616c676f726974686d7320646f207468697320696e7465726e616c6c7920616e64206170706c79696e6720697420617420746865206f7267616e697a6174696f6e616c20616e642063756c747572616c206c6576656c2077696c6c207265736861706520746865207479706573206f6620627573696e657373207573652063617365732074686174206172652070757273756564207669612070726f6772616d7320616e642070726f6a656374732e266e6273703b20546f207468696e6b206269672c20627574206163742077697468207269676f7220616e64206469736369706c696e652077696c6c206265206b65792e3c2f703e0d0a3c68333e48756d616e20437265617469766974793a2057696c6c20616c7761797320626520686967686c792076616c7565643c2f68333e0d0a3c703e54686572652069732061206c6f74206f66206372656174697669747920726571756972656420696e20746865206372656174696f6e20616e64206170706c69636174696f6e206f66204d616368696e65204c6561726e696e672e266e6273703b20416e6420736f2c20697420697320616c736f207769746820627573696e6573732070726f626c656d732e266e6273703b204974206973207468652068756d616e7320746861742063757272656e746c79206b6e6f772074686520627573696e65737320646f6d61696e2074686520626573742c20616e642063616e20636f6d652075702077697468206e6f76656c206170706c69636174696f6e206f662073797374656d7320746f20736f6c76652068756d616e2070726f626c656d732e266e6273703b205468617420637265617469766974792077696c6c206e65656420746f206265206e7572747572656420696e206f7267616e697a6174696f6e7320616e642069742063616e206c65616420746f207468652070726f647563747320616e64207365727669636573206f6620746865206675747572652e266e6273703b204d616368696e65204c6561726e696e672077696c6c2072656475636520746865206472756467657279207468726f75676820696e74656c6c6967656e74206175746f6d6174696f6e2c206275742069742077696c6c206e6f74207265706c61636520696e74656c6c6967656e636520616c746f67657468657220696e2074686520666f726573656561626c65206675747572652e3c2f703e0d0a3c68333e436f6e636c7573696f6e3c2f68333e0d0a3c703e4d616368696e65204c6561726e696e672077696c6c206472616d61746963616c6c79207472616e73666f726d20696e6475737472696573207468726f75676820696e74656c6c6967656e74206175746f6d6174696f6e20616e64206175676d656e74696e672068756d616e20696e74656c6c6967656e63652e266e6273703b2041732061206469736369706c696e652c20697420697320796f756e672c20686f77657665722c206974206861732074686520706f74656e7469616c20746f2068656c70206f7267616e697a6174696f6e7320756e6465727374616e6420637573746f6d657273206265747465722c20637265617465206d6f726520636f6d70656c6c696e672070726f64756374732c2072656475636520746865207761737461676520696e2070726f647563696e672074686f73652070726f64756374732c20616e642064726976652070726f6669746162696c6974792c20656666696369656e63792c20616e64206566666563746976656e6573732e266e6273703b2054686520706f74656e7469616c2063616e206f6e6c79206265207265616c697a6564206966206f6c642066617368696f6e656420656e67696e656572696e67206170706c69656420746f20746865206c617465737420616476616e63657320697320636f6d62696e65642077697468206f7267616e697a6174696f6e616c20616e642063756c747572616c207472616e73666f726d6174696f6e2e3c2f703e0d0a3c703e54686572652061726520706c656e7479206f6620696e64757374727920737065636966696320616e6420696e6475737472792061676e6f737469632075736520636173657320706f737369626c6520746f64617920746f2068656c7020616363656c657261746520796f7572204d616368696e65204c6561726e696e67206a6f75726e65792e266e6273703b204c657426727371756f3b732074616c6b2061626f757420686f772077652063616e207365706172617465207468652077686561742066726f6d2074686520636861666620666f7220796f752e3c2f703e, 'active', 'blog', NULL, 'Business opportunities & challenges posed by rapid advances in Machine Learning', NULL, 'undefined', NULL, '2023-03-20 16:32:05', '2023-03-20 20:14:19'),
(51, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'draft', 'blog', NULL, NULL, NULL, NULL, NULL, '2023-03-24 20:09:59', '2023-03-24 20:09:59'),
(52, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'draft', 'blog', NULL, NULL, NULL, NULL, NULL, '2023-03-25 16:32:03', '2023-03-25 16:32:03');
INSERT INTO `posts` (`id`, `category`, `title`, `slug`, `image`, `banner_image`, `author_id`, `author`, `post_date`, `short_description`, `description`, `status`, `post_type`, `post_meta`, `post_seo_title`, `page_title`, `post_seo_keywords`, `post_seo_description`, `created_at`, `updated_at`) VALUES
(53, NULL, 'Enhancing Network Security using ENIs', 'enhancing-network-security-using-enis', 'uploads/2023/03/de6dddcb4e5ae67577efad7163e88ccf.png', 'uploads/2023/03/f0f06d5677458fdf24b0333220af9755.png', NULL, 'Axat Shah', NULL, 'Network security is an ever-growing concern for businesses looking to manage their network infrastructure in today\'s digital landscape. While cloud computing has made it easier than.....', 0x3c703e4e6574776f726b20736563757269747920697320616e20657665722d67726f77696e6720636f6e6365726e20666f7220627573696e6573736573206c6f6f6b696e6720746f206d616e616765207468656972206e6574776f726b20696e66726173747275637475726520696e20746f6461792773206469676974616c206c616e6473636170652e205768696c6520636c6f756420636f6d707574696e6720686173206d61646520697420656173696572207468616e206576657220746f206d616e616765206e6574776f726b20696e6672617374727563747572652c20697420616c736f2070726573656e747320756e69717565206368616c6c656e676573206c696b652070726573657276696e67206365727461696e206e6574776f726b20706172616d6574657273206c696b6520495020616464726573732c204d414320616464726573732c204365727469666963617465732c204c6963656e7365732c206574632e2e2e20496e207468697320626c6f672c2077652077696c6c206469736375737320686f7720456c6173746963204e6574776f726b20496e74657266616365732028454e4973292063616e2068656c70206f7267616e697a6174696f6e73207072657365727665206365727461696e206e6574776f726b20706172616d657465727320616e6420686f7720697420646966666572732066726f6d20747261646974696f6e616c206d6574686f64732e3c2f703e0d0a3c703e3c7374726f6e673e4368616c6c656e676573206f662050726573657276696e67204e6574776f726b20506172616d657465727320696e20436c6f756420456e7669726f6e6d656e74733c2f7374726f6e673e3c2f703e0d0a3c703e4d41432061646472657373657320616e64206365727469666963617465732061726520637269746963616c206e6574776f726b20706172616d657465727320666f72206964656e74696679696e6720616e642061757468656e7469636174696e67206e6574776f726b20646576696365732e2041204d41432061646472657373206973206120756e69717565206964656e7469666965722061737369676e656420746f2065616368206e6574776f726b20696e7465726661636520636f6e74726f6c6c657220284e49432920666f7220636f6d6d756e69636174696f6e206f6e2061206e6574776f726b2e204f6e20746865206f746865722068616e642c2063657274696669636174657320617265206469676974616c20646f63756d656e7473207573656420746f2076657269667920746865206964656e74697479206f66206e6574776f726b206465766963657320616e642073656375726520636f6d6d756e69636174696f6e206265747765656e207468656d2e2050726573657276696e67204d41432061646472657373657320616e64206365727469666963617465732063616e2068656c70206f7267616e697a6174696f6e73206d61696e7461696e20612073656375726520616e6420726f62757374206e6574776f726b20696e66726173747275637475726520726573696c69656e7420746f20637962657220746872656174732e3c2f703e0d0a3c703e3c7374726f6e673e547261646974696f6e616c204d6574686f647320767320454e49733c2f7374726f6e673e3c2f703e0d0a3c703e496e20747261646974696f6e616c206e6574776f726b20656e7669726f6e6d656e74732c206e6574776f726b2061646d696e6973747261746f7273206d616e61676520746865736520706172616d6574657273206d616e75616c6c792c20616e642074686520646576696365732061726520706879736963616c6c7920636f6e6669677572656420746f20656e737572652074686569722070657273697374656e63652e20496e20636c6f756420656e7669726f6e6d656e74732c2074686520636c6f756420736572766963652070726f76696465722028435350292061737369676e73204d41432061646472657373657320746f20696e7374616e636573207768656e206c61756e6368656420616e642070726f76696465732063657274696669636174657320666f722073656375726520636f6d6d756e69636174696f6e206265747765656e20696e7374616e6365732e20486f77657665722c20696e20636c6f756420656e7669726f6e6d656e74732c207468657365206e6574776f726b20706172616d657465727320617265206e6f742070657273697374656e742c20616e642074686579206d6179206368616e6765207768656e20616e20696e7374616e63652069732073746f70706564206f72207265737461727465642c2063617573696e672070726f626c656d7320666f7220627573696e6573736573207468617420726571756972652070657273697374656e74206e6574776f726b20706172616d657465727320666f7220736563757269747920726561736f6e732e205468697320697320776865726520456c6173746963204e6574776f726b20496e74657266616365732028454e49732920636f6d6520696e202d207468657920617265207669727475616c206e6574776f726b20696e746572666163657320746861742063616e20626520617474616368656420616e642064657461636865642066726f6d2045433220696e7374616e63657320696e2074686520636c6f75642c2070726f766964696e672061206d6f72652073656375726520616e64207363616c61626c652077617920746f207072657365727665206e6574776f726b20706172616d65746572732e20427920617474616368696e6720616e20454e4920746f20616e2045433220696e7374616e63652c20627573696e65737365732063616e207072657365727665204d41432061646472657373657320616e6420636572746966696361746573206576656e207768656e20616e20696e7374616e63652069732073746f70706564206f72207265737461727465642c20656e737572696e6720636f6e73697374656e7420616e642070657273697374656e74206e6574776f726b20706172616d65746572732e3c2f703e0d0a3c703e3c696d67207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637393839343430382e6a70672220616c743d2222202f3e3c2f703e0d0a3c703e266e6273703b3c7374726f6e673e50726573657276696e67204e6574776f726b20506172616d6574657273207769746820454e49733a205468652050726f636573733c2f7374726f6e673e3c2f703e0d0a3c703e5468652070726f63657373206f662070726573657276696e67206e6574776f726b20706172616d6574657273207769746820454e4973206973207374726169676874666f72776172642e2046697273742c2074686520454e49206973206372656174656420616e6420636f6e666967757265642077697468207468652064657369726564206e6574776f726b20706172616d65746572732c20737563682061732061207370656369666963204d4143206164647265737320616e642063657274696669636174652e205468656e2c2074686520454e4920697320617474616368656420746f20616e2045433220696e7374616e63652c20616c6c6f77696e672074686520696e7374616e636520746f20636f6d6d756e69636174652077697468206f7468657220696e7374616e63657320696e207468652073616d65206e6574776f726b207768696c652070726573657276696e6720746865206e6574776f726b20706172616d65746572732e3c2f703e0d0a3c703e3c696d67207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637393839343432342e6a70672220616c743d2222202f3e3c2f703e0d0a3c703e266e6273703b3c7374726f6e673e52617069642053657276696365205265636f76657279207769746820454e49733c2f7374726f6e673e3c2f703e0d0a3c703e546869732069732075736566756c20696e20746865206576656e74206f662061206661696c757265206f7220696e667261737472756374757265206368616e67652e205768656e2074686520696e7374616e636520676f657320646f776e206f72206e6565647320746f206265207265706c616365642c20697473206e6574776f726b20696e746572666163652063616e20626520617474616368656420746f20746865207265706c6163656d656e7420696e7374616e636520636f6e6669677572656420666f72207468652073616d6520726f6c6520746f2072617069646c79207265636f7665722074686520736572766963652e20426563617573652074686520696e74657266616365206d61696e7461696e7320616c6c206f6620697473206e6574776f726b20706172616d65746572732c206e6574776f726b207472616666696320626567696e7320746f20666c6f7720746f20746865207374616e64627920696e7374616e636520617320736f6f6e20617320796f752061747461636820746865206e6574776f726b20696e7465726661636520746f20746865207265706c6163656d656e7420696e7374616e63652e20557365727320657870657269656e63652061206272696566206c6f7373206f6620636f6e6e6563746976697479206265747765656e207768656e2074686520696e7374616e6365206661696c732f73746f707320616e64207768656e20746865206e6574776f726b20696e7465726661636520697320617474616368656420746f20746865206e657720696e7374616e63652e205374696c6c2c206e6f206368616e67657320746f2074686520726f757465207461626c65206f7220796f757220444e5320736572766572206172652072657175697265642e3c2f703e0d0a3c703e3c696d67207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637393839343435362e6a70672220616c743d2222202f3e3c2f703e0d0a3c703e3c7374726f6e673e436f6e636c7573696f6e3a20454e497320666f72204175746f6d61746564204e6574776f726b20506172616d65746572204d616e6167656d656e7420696e2074686520436c6f75643c2f7374726f6e673e3c2f703e0d0a3c703e496e20636f6e636c7573696f6e2c20454e49732070726f766964652061206d6f7265206175746f6d617465642077617920746f206d616e61676520616e64207072657365727665206e6574776f726b20706172616d65746572732c207265647563696e6720746865206e65656420666f72206d616e75616c20636f6e66696775726174696f6e20616e642061646d696e697374726174696f6e2e20546869732063616e206d616b652069742065617369657220746f206d616e616765206e6574776f726b20696e6672617374727563747572652c20657370656369616c6c7920696e20636c6f756420656e7669726f6e6d656e747320776865726520696e7374616e636573206d6179206265206c61756e63686564206f72207465726d696e61746564206672657175656e746c792e2054686973206d616b657320454e4920612076616c7561626c6520746f6f6c20666f7220627573696e6573736573207468617420726571756972652070657273697374656e74206e6574776f726b20706172616d657465727320696e20746865697220636c6f756420696e6672617374727563747572652e3c2f703e0d0a3c703e3c696d67207372633d2268747470733a2f2f7777772e696e747569746976652e636c6f75646d656469612f313637393839333936322e6a70672220616c743d22222077696474683d2238302522202f3e3c2f703e, 'active', 'blog', NULL, 'Enhancing Network Security using ENIs', 'Enhancing Network Security using ENIs', 'undefined', NULL, '2023-03-27 12:09:18', '2023-03-27 12:22:41'),
(54, NULL, 'Network Security and Firewall', 'network-security-and-firewall', 'uploads/2023/03/13ad69a8dfbe539113adeea5e34554b1.png', 'uploads/2023/03/c3a33aad0efbc40e59753a675a8b4197.png', NULL, 'Harsh Viradia', NULL, 'Network Security faces a wide range of challenges in the modern technology landscape. There are some real-time challenges like evolving threats, advanced....', 0x3c703e4e6574776f726b205365637572697479206661636573206120776964652072616e6765206f66206368616c6c656e67657320696e20746865206d6f6465726e20746563686e6f6c6f6779206c616e6473636170652e2054686572652061726520736f6d65207265616c2d74696d65206368616c6c656e676573206c696b652065766f6c76696e6720746872656174732c20616476616e6365642070657273697374656e7420746872656174732c20696e736964657220746872656174732c20636c6f75642073656375726974792e3c2f703e0d0a3c703e3c7374726f6e673e546872656174732026616d703b204d697469676174696f6e20546563686e69717565733c2f7374726f6e673e3c2f703e0d0a3c703e5468652065766f6c76696e67207468726561742069732061206d616a6f72206368616c6c656e676520666f72206e6574776f726b207365637572697479206265636175736520736f706869737469636174656420637962657220746872656174732061726520636f6e7374616e746c7920656d657267696e672e20417320746865207468726561742065766f6c7665732c206e6574776f726b2073656375726974792070726f66657373696f6e616c73206d7573742062652061626c6520746f206964656e7469667920616e6420726573706f6e6420746f207468657365207468726561747320696e207265616c2d74696d6520746f2070726f7465637420746865206e6574776f726b2e2054687265617420696e74656c6c6967656e636520616e64204265686176696f7220616e616c797a657320746563686e69717565732063616e206d69746967617465207468657365206368616c6c656e6765732e2054687265617420696e74656c6c6967656e636520636f6c6c65637473206461746120616e6420616e616c797a65732074686f736520646174612066726f6d20612076617269657479206f6620736f75726365732c20696e636c7564696e67207365637572697479206c6f67732c207468726561742066656564732c20616e64206f7468657220736563757269747920746f6f6c7320736f206e6574776f726b2073656375726974792070726f66657373696f6e616c732063616e206761696e20612062657474657220756e6465727374616e64696e67206f66207468652074687265617420616e6420726573706f6e6420746f2074687265617473206566666563746976656c792e204265686176696f7220616e616c79736973206d6f6e69746f727320746865207472616666696320616e642075736572206265686176696f7220746f206964656e7469667920756e757375616c206f7220737573706963696f75732061637469766974792e20427920616e616c797a696e6720616c6c206265686176696f72207061747465726e732073656375726974792070726f66657373696f6e616c732063616e206964656e7469667920706f74656e7469616c207468726561747320616e6420726573706f6e6420746f207468726561747320736f20746865792063616e6e6f742063617573652064616d61676520746f20746865206e6574776f726b2e3c2f703e0d0a3c703e3c7374726f6e673e416476616e6365642050657273697374656e7420546872656174732841505473293a2043617573652026616d703b204d697469676174696f6e3c2f7374726f6e673e3c2f703e0d0a3c703e416476616e6365642050657273697374656e7420546872656174732841505473292075736520616476616e63656420746563686e697175657320746f206761696e2061636365737320746f2061206e6574776f726b20616e642072656d61696e20756e646574656374656420666f7220616e20657874656e64656420706572696f642e204974277320646966666963756c7420746f2064657465637420616e6420636175736573207369676e69666963616e742064616d61676520746f20746865206e6574776f726b2e20496e74727573696f6e20446574656374696f6e20616e642050726576656e74696f6e2053797374656d7320284944505329206d6f6e69746f722077686f6c65206e6574776f726b207472616666696320616e64206964656e7469667920706f74656e7469616c207365637572697479207468726561747320696e636c7564696e6720415054732e20494450532063616e206964656e7469667920736f6d65206b6e6f776e204150547320616e6420626c6f636b207468656d20616e642064657465637420756e757375616c207061747465726e73206f66206265686176696f722074686174206d617920626520696e6469636174697665206f6620616e204150542e20467572746865722c206e6574776f726b207365676d656e746174696f6e206469766964657320746865206e6574776f726b20696e746f20736d616c6c657220616e6420736563757265207365676d656e74732077697468207374726963742061636365737320636f6e74726f6c20616e64206d6f6e69746f72696e6720746869732077696c6c2068656c7020746f206c696d69742074686520696d70616374206f6620616e2041505420616e642070726576656e74206c61746572616c206d6f76656d656e74206163726f737320746865206e6574776f726b2e3c2f703e0d0a3c703e3c7374726f6e673e436c6f75642053656375726974793c2f7374726f6e673e3c2f703e0d0a3c703e54686520697373756573206173736f636961746564207769746820636c6f756420636f6d707574696e672061726520656e6f726d6f757320666f72206e6574776f726b207370656369616c697374732e20436c6f75642073656375726974792069732061206a6f696e74206f626c69676174696f6e206265747765656e2074686520636c6f756420736572766963652070726f766964657220616e642074686520636c69656e7420616e6420656e7461696c732070726f74656374696e6720746865206e6574776f726b2c20646174612c20616e64206170706c69636174696f6e7320746861742061726520686f75736564206f6e2074686520636c6f756420706c6174666f726d2e2041747461636b6572732063616e206e6f7720656e7465722073797374656d73207468726f756768207669727475616c20636f6d7075746572732c20636f6e7461696e6572732c20616e642041504973207468616e6b7320746f20636c6f756420636f6d707574696e672e204173206120726573756c742c20746865206c696b656c69686f6f64206f6620616e2061747461636b206f6e20746865206e6574776f726b20737572666163652077696c6c20726973652077697468206d6f726520636c6f756420736572766963652070726f7669646572732c20646174612063656e746572732c20616e642067656f67726170686963206c6f636174696f6e732e204f7267616e697a6174696f6e732077696c6c2066696e64206974206368616c6c656e67696e6720746f206f627461696e207669736962696c69747920696e746f20746865697220696e667261737472756374757265206173206120726573756c742c206d616b696e67206974206d6f7265206368616c6c656e67696e6720746f2073706f742073656375726974792069737375657320616e642074616b6520617070726f70726961746520616374696f6e2e20546865726520617265206e756d65726f75732070726f6475637473206c696b6520436c6f75642053656375726974792042726f6b65722c207768696368206f6666657273207669736962696c69747920616e6420636f6e74726f6c206f76657220636c6f7564206170707320616e6420646174612c2074686174206d6179206265207573656420746f2068616e646c6520616c6c206f6620746865736520636f6e6365726e732e2054686520736563757269747920706f7374757265206f6620636c6f756420696e6672617374727563747572652077696c6c206265206576616c756174656420616e64206d616e61676564207468726f75676820636c6f756420736563757269747920706f7374757265206d616e6167656d656e742e2049742077696c6c2070696e706f696e742076756c6e65726162696c697469657320616e64206d6973636f6e66696775726174696f6e7320696e20746865697220636c6f75642061726368697465637475726520616e64206f666665722073756767657374696f6e732e2049414d20636f6e74726f6c732061636365737320746f20636c6f7564207265736f757263657320616e64206461746120736f2074686174206f6e6c7920696e646976696475616c73207769746820617574686f72697a6174696f6e2063616e2061636365737320646174612e205468726f75676820656d706c6f79696e6720746865736520746563686e6f6c6f676965732c2073656375726974792070726f66657373696f6e616c732063616e206d6f7265206566666563746976656c792073616665677561726420636c6f756420696e66726173747275637475726520616e6420646174612e20436c6f75642073656375726974792067656e6572616c6c792070726573656e74732061206875676520697373756520666f72206e6574776f726b2073656375726974792e3c2f703e0d0a3c703e3c7374726f6e673e4669726577616c6c3a3c2f7374726f6e673e3c2f703e0d0a3c703e3c7374726f6e673e3c696d67207372633d222e2e2f2e2e2f2e2e2f6d656469612f313637393839343732372e6a70672220616c743d22222077696474683d2238302522202f3e3c2f7374726f6e673e3c2f703e0d0a3c703e43617074696f6e3a20576f726b696e67206469616772616d206f66204669726577616c6c3c2f703e0d0a3c703e4265747765656e20612074727573746564206e6574776f726b20616e6420616e20756e72656c6961626c65206e6574776f726b2c20737563682061732074686520696e7465726e65742c2061206669726577616c6c20736572766573206173206120626172726965722e204669726577616c6c732c20686f77657665722c20656e636f756e746572207365766572616c207265616c2d74696d65206f62737461636c6573207375636820696d70726f7665642065766173696f6e20737472617465676965732c20656e63727970746564206e6574776f726b20747261666669632c207363616c6162696c6974792c206170706c69636174696f6e2d6c6576656c2061737361756c742c206574632e2064756520746f2074686520636f6e74696e75616c6c792067726f77696e672064616e67657220616e6420726973696e6720736f706869737469636174696f6e206f662061747461636b732e3c2f703e0d0a3c703e41747461636b65727320616c7761797320646576656c6f70206e6577207468726561747320616e64207374726174656769657320746f206765742061726f756e64206669726577616c6c7320616e64206578706c6f697420736563757269747920686f6c657320746f20616363657373206e6574776f726b732e20466f7220696e7374616e63652c20746865206669726577616c6c206d617920696e636c75646520612072756c6520746f2073746f7020736f6d65206b6e6f776e206d616c77617265206f7220766972757365732c20627574206974277320706f737369626c65207468617420697420776f6e27742073746f702061207a65726f2d646179206578706c6f6974206f7220746861742061206e65772074797065206f66206d616c776172652069736e2774206d656e74696f6e656420696e207468652072756c652c206d616b696e6720697420696d706f737369626c6520746f207265636f676e697a6520697420617320612064616e6765722e2041747461636b65727320617474656d707420746f20656e7465722061206e6574776f726b20627920666f637573696e67206f6e20746865736520676170732e204469737472696275746564206e6574776f726b7320656e68616e6365207468652061747461636b207375726661636520666f7220706f737369626c6520746872656174732073696e63652075736572732063616e2061636365737320746865206e6574776f726b2066726f6d206d616e79206c6f636174696f6e732e2042656361757365206f6620746869732c206669726577616c6c206d6f6e69746f72696e67206f66206e6574776f726b2074726166666963206973206368616c6c656e67696e672e204d6f6465726e206669726577616c6c732c20696e74727573696f6e20646574656374696f6e20616e642070726576656e74696f6e2073797374656d73202849445053292c2074687265617420696e74656c6c6967656e63652c20616e64206d616368696e65206c6561726e696e672077696c6c20616c6c20656e61626c6520746865206669726577616c6c20737461792063757272656e74207769746820746865206e65776573742064616e67657220616e6420676976652070726f74656374696f6e20616761696e737420626f7468206e657720616e64206f6c642061747461636b7320746f20736f6c766520746865736520646966666963756c746965732e3c2f703e0d0a3c703e3c7374726f6e673e416476616e6365642045766173696f6e20546563686e6971756573202841455473293c2f7374726f6e673e3c2f703e0d0a3c703e4861636b657273206465706c6f7920416476616e6365642045766173696f6e20546563686e69717565732028414554732920746f2063697263756d76656e7420746865206e6574776f726b2e20414554732066756e6374696f6e6564206279206578706c6f6974696e6720666c61777320696e206e6574776f726b2070726f746f636f6c732c20616c6c6f77696e672061747461636b65727320746f2064656c69766572206d616c6963696f757320636f6d6d756e69636174696f6e732e205468697320697320686f772061747461636b65727320676574207468726f75676820746865206669726577616c6c20616e6420696e746f20746865206e6574776f726b2e20546865726520617265207365766572616c20617070726f616368657320746f20746869732070726f626c656d2c20737563682061732073616e64626f78696e672c20646f74732070657220696e63682c20616e6420736f206f6e2e2053616e64626f78696e672069732061206d6574686f64206f662070726576656e74696e6720414554732e2053616e64626f78696e67206973207468652070726f63657373206f662072756e6e696e6720706f74656e7469616c6c79206861726d66756c20636f646520696e2061207669727475616c20656e7669726f6e6d656e7420746f20616e616c797a65206265686176696f7220616e6420646574656374206d616c6963696f7573206265686176696f722e20466f72206578616d706c652c2074686973206669726577616c6c206465746563747320414554732074686174206d61792063697263756d76656e74207479706963616c2073656375726974792070726f636564757265732e20445049207363616e732065616368207061636b6574206f66206e6574776f726b20747261666669632c207061796c6f61642c20616e642068656164657220696e666f726d6174696f6e20746f206964656e74696679207269736b732e2041206669726577616c6c2063616e206465746563742041455473207468617420617265206d6173717565726164696e672061732067656e75696e6520747261666669632061742074686973206c6576656c206f66206578616d696e6174696f6e2e3c2f703e0d0a3c703e3c7374726f6e673e456e6372797074656420747261666669633c2f7374726f6e673e3c2f703e0d0a3c703e456e6372797074656420747261666669632070726573656e74732061206368616c6c656e67696e6720697373756520666f72206e6574776f726b206669726577616c6c732073696e636520656e6372797074696f6e206164647320616e20657874726120646567726565206f6620736563757269747920616e6420697320736f6d6574696d657320757365642062792061747461636b65727320746f20636f6e6365616c20756e77616e746564206265686176696f722e204f6e65206f6620746865206d6f737420646966666963756c742061737065637473206f6620656e6372797074696e6720636f6d6d756e69636174696f6e2069732074686174206e6f206f6e652063616e20736565207768617420746865207472616666696320696e636c7564657320696e20706c61696e20746578742e204173206120726573756c742c206578697374696e67206669726577616c6c20746563686e6f6c6f676965732073756368206173204944505320616e6420696e74727573696f6e20646574656374696f6e206d617920626520756e61626c6520746f2064657465637420746872656174732068696464656e2077697468696e20656e6372797074656420646174612e2053656375726520536f636b657473204c61796572202853534c292f5472616e73706f7274204c617965722053656375726974792028544c53292064656372797074696f6e206973206f6e65206d6574686f6420666f7220616e616c797a696e6720656e6372797074656420747261666669632e205468697320656e7461696c7320696e74657263657074696e6720656e63727970746564207472616666696320616e642064656372797074696e6720697420696e207265616c2074696d6520696e206f7264657220746f20617373657373207472616666696320636f6e74656e742e2054686973206669726577616c6c2773206d616368696e65206c6561726e696e6720616c676f726974686d7320616e64206265686176696f7220616e616c797369732063616e2064657465637420706f737369626c65207468726561747320776974686f75742064656372797074696e672074686520636f6d6d756e69636174696f6e2e3c2f703e0d0a3c703e3c7374726f6e673e5363616c6162696c6974793c2f7374726f6e673e3c2f703e0d0a3c703e5363616c6162696c6974792069732061206d616a6f7220646966666963756c747920666f72206e6574776f726b206669726577616c6c732c20706172746963756c61726c7920696e206c6172676520656e7465727072697365732077697468207369676e69666963616e74206e6574776f726b207472616666696320766f6c756d65732e205768656e207472616666696320766f6c756d6520696e637265617365732c20746865206669726577616c6c206d7573742062652061626c6520746f207363616c6520776974686f757420636f6d70726f6d6973696e6720706572666f726d616e6365206f722073656375726974792e20546865207479706963616c206669726577616c6c206d617920626520696e63617061626c65206f662068616e646c696e67206869676820766f6c756d6573206f6620747261666669632e204669726577616c6c732063616e206265636f6d65206f76657262757264656e65642c20726573756c74696e6720696e2064656372656173656420706572666f726d616e63652c20696e63726561736564206c6174656e63792c20616e64206576656e20646f776e74696d652e20496e207468697320636173652c20646973747269627574656420747261666669632063616e2062652062656e6566696369616c2e205365766572616c206669726577616c6c7320696e20646966666572656e7420706c616365732077696c6c206c657373656e206e6574776f726b2074726166666963207374726573732e20466f72207363616c6162696c69747920616e6420666c65786962696c6974792c20746865207365636f6e6420616c7465726e6174697665206973206120636c6f75642d6261736564206669726577616c6c2e20426563617573652061206669726577616c6c2069732061207669727475616c20696e7374616e636520696e2074686520636c6f75642c2069742063616e20626520717569636b6c79207363616c656420757020616e6420646f776e20776974686f757420746865206e65656420666f722065787472612068617264776172652e3c2f703e0d0a3c703e3c7374726f6e673e4170706c69636174696f6e2d6c6576656c2061747461636b733c2f7374726f6e673e3c2f703e0d0a3c703e4e6574776f726b206669726577616c6c732066616365207369676e69666963616e74206368616c6c656e6765732066726f6d206170706c69636174696f6e2d6c6576656c2061747461636b732e2053514c20696e6a656374696f6e2c2063726f73732d7369746520736372697074696e672c20616e6420627566666572206f766572666c6f772061747461636b7320617265206578616d706c6573206f66206170706c69636174696f6e2d6c6576656c2061747461636b732e2054686573652061747461636b732061726520646966666963756c7420746f2064657465637420666f72206e6574776f726b206669726577616c6c7320626563617573652074686579206672657175656e746c79206578706c6f697420756e69717565207765616b6e657373657320696e20696e646976696475616c2070726f6772616d73206f72206170706c69636174696f6e2070726f746f636f6c732e204f6e6520746563686e6971756520746f20616e616c797a696e6720616e6420696e7370656374696e67206170706c69636174696f6e2d6c6576656c207472616666696320616e642070726576656e74696e67206170706c69636174696f6e2d6c6576656c2061737361756c747320697320746f20757365206d6f6465726e206669726577616c6c732e20266e6273703b44454550205041434b455420494e5350454354494f4e20284450492920697320616e6f74686572206d6574686f6420666f7220696e7370656374696e67206170706c69636174696f6e2d6c6576656c20636f6d6d756e69636174696f6e20696e207265616c2074696d652e2054686973206d6574686f64206578616d696e65732065616368207061636b6574206f6620636f6d6d756e69636174696f6e2c206964656e74696679696e67206170706c69636174696f6e2070726f746f636f6c7320616e6420646574656374696e672074687265617473206f72206972726567756c617269746965732e204f6e65206d6574686f6420666f722070726576656e74696e67206170706c69636174696f6e2d6c6576656c2061747461636b7320697320746f2075736520616e206170706c69636174696f6e206669726577616c6c2e204170706c69636174696f6e2d6c6576656c206669726577616c6c732070726576656e74206170706c69636174696f6e2d6c6576656c2061747461636b7320627920636f6d62696e696e67207369676e61747572652d626173656420646574656374696f6e2c206265686176696f7220616e616c797369732c20616e6420747261666669632073686170696e672e3c2f703e0d0a3c703e3c7374726f6e673e436f6e636c7573696f6e3c2f7374726f6e673e3c2f703e0d0a3c703e416c6c2074686573652073747261746567696573206172652075736566756c20666f722070726576656e74696e672061747461636b6572732066726f6d206761696e696e67206e6574776f726b206163636573732c206275742061747461636b6572732061726520636f6e7374616e746c79206372656174696e67206e657720746563686e69717565732c207468657265666f7265206669726577616c6c73206d7573742065766f6c766520746f2073746179207570207769746820746865206c61746573742064616e67657220616e642070726f7669646520656666656374697665206e6574776f726b2070726f74656374696f6e2e3c2f703e, 'active', 'blog', NULL, 'Network Security and Firewall', 'Network Security and Firewall', 'undefined', NULL, '2023-03-27 12:23:18', '2023-03-27 12:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `pressrelease`
--

CREATE TABLE `pressrelease` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pressrelease`
--

INSERT INTO `pressrelease` (`id`, `title`, `description`, `priority`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'one', 'one', 1, 'https://www.cioreview.com/intuitive-technology-partners', 'uploads/2023/03/84dd782f3ae96ff588e675355ae19432.png', 'active', '2023-03-10 07:57:21', '2023-03-10 07:57:21'),
(4, 'two', 'two', 2, 'https://www.crn.com/news/channel-programs/2022-fast-growth-150-the-top-25-solution-providers/17?itc=refresh', 'uploads/2023/03/96322fc95305cc561febba13fea5dfe6.png', 'active', '2023-03-10 07:58:01', '2023-03-10 07:58:01'),
(5, 'three', 'three', 3, 'https://www.inc.com/profile/intuitive-technology-partners', 'uploads/2023/03/9804b41e6556818dd475f2125efeb3cb.png', 'active', '2023-03-10 07:59:03', '2023-03-10 07:59:03'),
(6, 'four', 'four', 4, 'https://www.businesswire.com/news/home/20221011005367/en/Safe-Security-and-Intuitive.Cloud-Announce-a-Partnership-to-Offer-a-New-Cyber-Risk-Quantification-Offering', 'uploads/2023/03/9745aadf597843f44e60e7c3a4b58dd1.png', 'active', '2023-03-17 19:28:47', '2023-03-18 02:28:47'),
(7, 'five', 'five', 5, 'https://www.crn.com/rankings-and-lists/fast-growth-2021-details.htm?c=20', 'uploads/2023/03/9f9adc2e708c9660931f5352c99400ae.png', 'active', '2023-03-10 08:00:06', '2023-03-10 08:00:06'),
(8, 'six', 'six', 6, 'https://www.linkedin.com/feed/update/urn:li:activity:7004229130787393536', 'uploads/2023/03/a7c5b0a6568572baad42388e0986c2a1.png', 'active', '2023-03-17 19:28:58', '2023-03-18 02:28:58'),
(9, 'seven', 'seven', 7, 'https://www.prnewswire.com/news-releases/devrev-intuitive-team-to-advance-customer-centricity-301708823.html', 'uploads/2023/03/1b212eef3156b9a77eaa2dc0b27f45af.png', 'active', '2023-03-16 13:16:34', '2023-03-16 20:16:34'),
(10, 'eight', 'eight', 8, 'https://www.endorlabs.com/blog/endor-labs-and-intuitive-partner-to-help-enterprises-leverage-open-source-software-most-securely-and-effectively?utm_content=233317202&utm_medium=social&utm_source=linkedin&hss_channel=lcp-74949406', 'uploads/2023/03/b641505013d2fc66063b7b6d0720b994.png', 'active', '2023-03-16 13:16:55', '2023-03-16 20:16:55'),
(11, 'nine', 'nine', 9, 'https://www.linkedin.com/posts/intuitive-cloud_microsoft-azure-intuitive-activity-6991475225418698753-aquC?utm_source=share&utm_medium=member_desktop', 'uploads/2023/03/eb5f5c0bb05bde575506a116b581411c.jpg', 'active', '2023-03-10 08:03:01', '2023-03-10 08:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `offer_price` decimal(10,2) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `type` enum('simple','variable') NOT NULL DEFAULT 'simple',
  `rating` varchar(255) DEFAULT NULL,
  `total_rating` int(11) DEFAULT NULL,
  `status` enum('active','inactive','draft') NOT NULL DEFAULT 'draft',
  `seo_meta` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `post_extra` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `owner_id`, `slug`, `category_id`, `brand_id`, `priority`, `image`, `quantity`, `price`, `offer_price`, `sku`, `type`, `rating`, `total_rating`, `status`, `seo_meta`, `seo_title`, `seo_keywords`, `seo_description`, `post_extra`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 3, NULL, NULL, 'default/demo/products/product-5.jpg', NULL, '3316.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, NULL, NULL, 9, NULL, NULL, 'default/demo/products/product-7.jpg', NULL, '6835.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, NULL, NULL, 1, NULL, NULL, 'default/demo/products/product-1.jpg', NULL, '7836.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, NULL, NULL, 10, NULL, NULL, 'default/demo/products/product-9.jpg', NULL, '3681.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(5, NULL, NULL, 10, NULL, NULL, 'default/demo/products/product-3.jpg', NULL, '1353.00', NULL, NULL, 'simple', NULL, NULL, 'inactive', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-20 19:57:08'),
(6, NULL, NULL, 2, NULL, NULL, 'default/demo/products/product-4.jpg', NULL, '4382.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, NULL, NULL, 6, NULL, NULL, 'default/demo/products/product-6.jpg', NULL, '5558.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, NULL, NULL, 4, NULL, NULL, 'default/demo/products/product-4.jpg', NULL, '6602.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, NULL, NULL, 8, NULL, NULL, 'default/demo/products/product-1.jpg', NULL, '6898.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(10, NULL, NULL, 10, NULL, NULL, 'default/demo/products/product-7.jpg', NULL, '2436.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(11, NULL, NULL, 4, NULL, NULL, 'default/demo/products/product-4.jpg', NULL, '4934.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(12, NULL, NULL, 7, NULL, NULL, 'default/demo/products/product-5.jpg', NULL, '5314.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(13, NULL, NULL, 9, NULL, NULL, 'default/demo/products/product-3.jpg', NULL, '9533.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(14, NULL, NULL, 6, NULL, NULL, 'default/demo/products/product-3.jpg', NULL, '6539.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(15, NULL, NULL, 2, NULL, NULL, 'default/demo/products/product-9.jpg', NULL, '5694.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(16, NULL, NULL, 1, NULL, NULL, 'default/demo/products/product-1.jpg', NULL, '8642.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(17, NULL, NULL, 3, NULL, NULL, 'default/demo/products/product-5.jpg', NULL, '2764.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(18, NULL, NULL, 10, NULL, NULL, 'default/demo/products/product-6.jpg', NULL, '2174.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(19, NULL, NULL, 1, NULL, NULL, 'default/demo/products/product-3.jpg', NULL, '1753.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(20, NULL, NULL, 4, NULL, NULL, 'default/demo/products/product-7.jpg', NULL, '9371.00', NULL, NULL, 'simple', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(21, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-11-13 04:44:15', '2022-11-13 04:44:15'),
(22, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-11-13 10:28:47', '2022-11-13 10:28:47'),
(23, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-11-20 16:25:13', '2022-11-20 16:25:13'),
(24, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-11-20 16:26:55', '2022-11-20 16:26:55'),
(25, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-11-20 16:48:46', '2022-11-20 16:48:46'),
(26, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-12-19 17:55:52', '2022-12-19 17:55:52'),
(27, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-12-19 18:07:02', '2022-12-19 18:07:02'),
(28, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 'simple', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, '2022-12-20 18:45:45', '2022-12-20 18:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `products_translations`
--

CREATE TABLE `products_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `locale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_translations`
--

INSERT INTO `products_translations` (`id`, `product_id`, `title`, `description`, `locale`) VALUES
(1, 1, 'Product 1', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 1', 'en'),
(2, 2, 'Product 2', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 2', 'en'),
(3, 3, 'Product 3', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 3', 'en'),
(4, 4, 'Product 4', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 4', 'en'),
(5, 5, 'Product 5', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 5', 'en'),
(6, 6, 'Product 6', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 6', 'en'),
(7, 7, 'Product 7', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 7', 'en'),
(8, 8, 'Product 8', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 8', 'en'),
(9, 9, 'Product 9', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 9', 'en'),
(10, 10, 'Product 10', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 10', 'en'),
(11, 11, 'Product 11', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 11', 'en'),
(12, 12, 'Product 12', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 12', 'en'),
(13, 13, 'Product 13', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 13', 'en'),
(14, 14, 'Product 14', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 14', 'en'),
(15, 15, 'Product 15', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 15', 'en'),
(16, 16, 'Product 16', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 16', 'en'),
(17, 17, 'Product 17', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 17', 'en'),
(18, 18, 'Product 18', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 18', 'en'),
(19, 19, 'Product 19', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 19', 'en'),
(20, 20, 'Product 20', 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s 20', 'en'),
(21, 21, '', '', 'en'),
(22, 22, '', '', 'en'),
(23, 23, '', '', 'en'),
(24, 24, '', '', 'en'),
(25, 25, '', '', 'en'),
(26, 26, '', '', 'en'),
(27, 27, '', '', 'en'),
(28, 28, '', '', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `variation_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_items`
--

CREATE TABLE `recently_viewed_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `relation_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `page` varchar(250) DEFAULT NULL,
  `description` text,
  `video` varchar(250) DEFAULT NULL,
  `mobile_video` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `image_second` varchar(250) DEFAULT NULL,
  `link` text,
  `status` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `title`, `page`, `description`, `video`, `mobile_video`, `priority`, `image`, `image_second`, `link`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Helping businesses fly cloud-first', 'home', '<p>Intuitive is a global cloud innovation company that partners with the world&rsquo;s leading enterprises to deliver high-impact, end-to-end solutions and drive extraordinary business outcomes.</p>\r\n<p>We are a globally recognized partner of choice for cloud engineering solutions. Our goal is to accelerate change with differentiated, customized and scalable technology solutions.</p>', 'Intuitive video.mp4', '1669740923Video 1-1 final (1).mp4', 1, NULL, NULL, NULL, 'active', '2022-11-22 09:09:38', '2022-11-29 16:55:23'),
(23, 'We’re a globally recognized cloud innovation partner in more than 40 countries', 'home', NULL, NULL, NULL, 2, 'uploads/2023/03/a5779b891693b9c9910d48a2d67384fe.png', NULL, NULL, 'active', '2023-03-22 18:02:15', '2023-03-22 18:02:15'),
(9, 'We are extraordinary because of our people', 'home', '<p>At Intuitive.Cloud, our people are at the core of our success story. We believe in a people-first culture that encourages all &ldquo;Intuiti-ans&rdquo; to be their best selves&mdash;all it takes to break barriers and create exceptional outcomes.</p>', NULL, NULL, 7, 'uploads/2023/03/5f0622cea5dcb315349b289a3a122080.png', NULL, 'https://www.intuitive.cloud/careers', 'active', '2022-11-21 19:48:10', '2023-03-22 18:24:18'),
(15, 'test', 'home', NULL, 'Video 1-1 final.mp4', NULL, 888, NULL, NULL, 'ewrefsd', 'inactive', '2022-12-05 18:12:49', '2022-12-05 18:12:49'),
(16, 'Helping businesses with next-gen cloud solutions', 'other', '<p>Intuitive is a global cloud innovation company that partners with the world&rsquo;s leading enterprises to deliver high-impact, end-to-end solutions and drive extraordinary business outcomes.</p>\r\n<p>We are a globally recognized partner of choice for cloud engineering solutions. Our goal is to accelerate change with differentiated, customized and scalable technology solutions.</p>', NULL, NULL, 3, NULL, NULL, NULL, 'active', '2023-02-03 17:58:57', '2023-02-03 18:03:30'),
(17, 'teststsv', 'undefined', NULL, NULL, NULL, 2, 'uploads/2023/02/fbe9148a0add450441559cbbbf74183a.png', NULL, NULL, 'active', '2023-02-03 19:25:40', '2023-02-03 19:25:40'),
(18, 'hgfsdfsd', 'undefined', NULL, NULL, NULL, 5, 'uploads/2023/02/b519d3d633ecc22c922b65cd373ad5f7.jpg', NULL, NULL, 'active', '2023-02-03 19:26:28', '2023-02-03 19:26:28'),
(19, 'gnjhgdfsd', NULL, NULL, NULL, NULL, 5, 'uploads/2023/02/09eb030da9f626929c1f875dd6bca324.png', NULL, NULL, 'active', '2023-02-03 19:27:50', '2023-02-03 19:27:50'),
(24, 'We are extraordinary because of our people', 'other', '<p>At Intuitive.Cloud, our people are at the core of our success story. We believe in a people-first culture that encourages all &ldquo;Intuiti-ans&rdquo; to be their best selves&mdash;all it takes to break barriers and create exceptional outcomes.</p>', NULL, NULL, 999, 'uploads/2023/03/c14553e35c040934755eb9401b53d029.png', NULL, 'https://www.intuitive.cloud/careers', 'active', '2023-03-22 18:20:39', '2023-03-23 14:29:39'),
(21, 'Ready to Partner with Intuitive to Deliver Excellence?', 'home', NULL, NULL, NULL, 1010, NULL, NULL, 'https://www.intuitive.cloud/contact-us', 'active', '2023-02-04 14:23:10', '2023-03-22 16:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imapact_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_title_main` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `innovation_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_migration` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `maincontentdescription` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_banner` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `innovation` longtext COLLATE utf8mb4_unicode_ci,
  `migration` longtext COLLATE utf8mb4_unicode_ci,
  `impact` longtext COLLATE utf8mb4_unicode_ci,
  `double_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `double_description` longtext COLLATE utf8mb4_unicode_ci,
  `double_value` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','draft') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `image`, `title`, `imapact_title`, `content_title`, `content_title_main`, `home_page_title`, `innovation_title`, `priority`, `title_migration`, `description`, `maincontentdescription`, `slug`, `banner_image`, `content_image`, `mobile_banner`, `content`, `innovation`, `migration`, `impact`, `double_title`, `double_description`, `double_value`, `meta_title`, `page_title`, `meta_description`, `seo_keywords`, `status`, `created_at`, `updated_at`) VALUES
(2, 'niravg.svg', 'Accelerate development & secure your software supply chain through innovation', 'Our differentiators unlock value for you', 'We deliver high-impact business outcomes at speed in three simple phases', 'Leading Cloud DevSecOps with Innovation', 'Cloud Native, AppSecOps, DevSecOps', 'DevSecOps innovations that set us apart', NULL, 'The positive impact of partnering with Intuitive for DevSecOps', '<div class=\"banner-text\">\r\n<p class=\"mt-4\">Improve the quality of your applications, reduce time-to-market, and increase overall efficiency.</p>\r\n</div>', '<p>At Intuitive, we lead with continuous innovation to create 360-degree value with cloud DevSecOps. From the moment you sign on with us, you can kick back and relax as we overrun all challenges to your DevSecOps cycles head-on. In three phases, we set the stage for scalable and sustainable new growth that is customized to you.</p>\r\n<p>We deliver and create proven, data-driven strategies with a host of customer-centric tools that have hundreds of different applications for your enterprise. Be it transitioning to the cloud for the first time, or upscaling to a wholly integrated cloud solution, we spare no effort in reinventing your business.</p>', 'cloud-native', 'uploads/2023/03/b8e86842108d334d43b588ae58fe8f0d.png', 'uploads/2023/03/6589f0977455c49503c3930e3121cac7.png', 'niravg.gif', '[{\"title\":\"Discovery\",\"description\":\"In the discovery phase, we conduct value stream and pipeline mapping to analyze, design, and manage the flow. This includes a toolchain assessment to understand if your current tools are optimal for your enterprise objectives. Finally, we assess your processes and people to derive the optimal arrangement of all your resources and requirements.\",\"image\":\"DevSecOps-1.svg\",\"image2\":\"DevSecOps-1.gif\"},{\"title\":\"Improvement Planning\",\"description\":\"We apply our comprehensive maturity model to determine the current readiness levels of your business processes for upscaling your enterprise. We run CI\\/CD processes to build automation and start factoring in code quality and built-in security compliance and risk assessment. We also develop the DevSecOps policy definitions that will become the core of our automation. This is followed by integration of vulnerability and issue resolution and selection of tools you need.\",\"image\":\"DevSecOps-2.svg\",\"image2\":\"DevSecOps-2.gif\"},{\"title\":\"Implementation\",\"description\":\"We build and deliver the implementation plan which includes the efforts, cost and time. When you give us the nod, we begin architecture and design on your future state pipeline. We configure various DevSecOps tools for maximum agility, elasticity and security. Once everything is in place, we initiate adoption workshops (Ops\\/Dev\\/Sec\\/Infra) to also help upskill your people for using new Cloud processes.\",\"image\":\"DevSecOps-3.svg\",\"image2\":\"DevSecOps-3.gif\"}]', '[{\"title\":\"DevSecOps microservices\",\"description\":\"An intelligent service for every conceivable business scenario\",\"image\":\"DevSecOps-1.svg\",\"image2\":\"DevSecOps-1.gif\"},{\"title\":\"API-based security testing and guardrails\",\"description\":\"Never go wrong, unsecured, or untested with automation\",\"image\":\"DevSecOps-2.svg\",\"image2\":\"DevSecOps-2.gif\"},{\"title\":\"Security policy as code\",\"description\":\"We fuse your enterprise security policies to your DevSecOps for seamless implementation\",\"image\":\"DevSecOps-3.svg\",\"image2\":\"DevSecOps-3.gif\"},{\"title\":\"Compliance policy as code and audit reports\",\"description\":\"Integrated compliance and audit that leaves no stone unturned\",\"image\":\"DevSecOps-4.svg\",\"image2\":\"DevSecOps-4.gif\"},{\"title\":\"Comprehensive risk rating dashboard\",\"description\":\"Never be in the dark with continuous risk evaluation\",\"image\":\"DevSecOps-5.svg\",\"image2\":\"DevSecOps-5.gif\"},{\"title\":\"Auto discovery of current pipelines\",\"description\":\"We start by determining the scope and state of your current pipelines\",\"image\":\"DevSecOps-6.svg\",\"image2\":\"DevSecOps-6.gif\"},{\"title\":\"State of DevSecOps vulnerabilities\",\"description\":\"We continuously evaluate current and potential vulnerabilities throughout the cycles\",\"image\":\"DevSecOps-7.svg\",\"image2\":\"DevSecOps-7.gif\"},{\"title\":\"High compatibility tool integration\",\"description\":\"Migration and integration made easy and seamless with our latest tools\",\"image\":\"DevSecOps-8.svg\",\"image2\":\"DevSecOps-8.gif\"}]', '[{\"title\":\"Rapid, cost-effective software delivery\",\"description\":\"When software is developed in a non-DevSecOps environment, security issues can cause significant time delays and incur hefty expenses. We help you integrate DevSecOps into your software delivery process, ensuring security and code development happen simultaneously, resulting in secure and streamlined software delivery. Our integrated approach eliminates the need for duplicative reviews and rebuilds, giving you the peace of mind that your code is secure from the get-go.\"},{\"title\":\"Solidifying security from the start\",\"description\":\"The consequences of a security breach can be dire, ranging from massive financial losses to irreparable damage to a company\'s reputation. By integrating security at every step of the development cycle, DevSecOps teams catch potential threats early and address them swiftly. You don\'t need to be in a fire-fighting mode when a vulnerability is discovered at the last minute.\"},{\"title\":\"Modern development that is automation compatible\",\"description\":\"Gone are the days of manual security checks that slow down the development process. With CI\\/CD pipelines, automated testing can be seamlessly integrated into the software development cycle to ensure that security is baked into the product from the very start.\"}]', '[{\"description\":\"Validate application pipelines and assign a DevSecOps score based on the current level of DevSecOps maturity via our discovery engine\",\"image\":\"DevSecOps-7.svg\",\"image2\":\"DevSecOps-7.gif\"},{\"description\":\"Draw workflow templates available as APIs for security scans, thresholds, stage gates and approvals easily\",\"image\":\"The-Intuitive-4.svg\",\"image2\":\"The-Intuitive-4.gif\"},{\"description\":\"Minimal time taken for integration with the customer CI\\/CD pipeline and changes, if any\",\"image\":\"The-Intuitive-3.svg\",\"image2\":\"The-Intuitive-3.gif\"},{\"description\":\"Access a dashboard to view all vulnerabilities and perform remediation\",\"image\":\"The-Intuitive-2.svg\",\"image2\":\"The-Intuitive-2.gif\"},{\"description\":\"Policy engine enables DevSecOps teams to perform active governance with automated tool configurations monitoring and auto-remediation\",\"image\":\"The-Intuitive-1.svg\",\"image2\":\"The-Intuitive-1.gif\"},{\"description\":\"Meet all regulatory compliance requirements (For e.g. PCI, GDPR, HITRUST) with the policy engine\",\"image\":\"DevSecOps-8.svg\",\"image2\":\"DevSecOps-8.gif\"},{\"description\":\"Utilize 350 KPIs and 600 best practices from planning to release\",\"image\":\"DevSecOps-6.svg\",\"image2\":\"DevSecOps-6.gif\"},{\"description\":\"Reduce security scanning costs by monitoring usage and substituting open-source tooling where possible\",\"image\":\"DevSecOps-5.svg\",\"image2\":\"DevSecOps-5.gif\"}]', 'The Intuitive DevSecOps Impact', NULL, '[{\"title\":\"Enjoy zero ambiguity on maturity, risk, and vulnerability with intensive data-driven dashboards\",\"image1\":\"1678648719The-Intuitive-1.svg\",\"image2\":\"1678648719The-Intuitive-1.gif\",\"description\":\"Enjoy zero ambiguity on maturity, risk, and vulnerability with intensive data-driven dashboards\"},{\"title\":\"Accelerate implementation effortlessly with simplified automated pipelines and microservices\",\"image1\":\"1678648719The-Intuitive-2.svg\",\"image2\":\"1678648719The-Intuitive-2.gif\",\"description\":\"Accelerate implementation effortlessly with simplified automated pipelines and microservices\"},{\"title\":\"Ace your DevSecOps compliances with automated audits and continuous validation\",\"image1\":\"1678648719The-Intuitive-3.svg\",\"image2\":\"1678648719The-Intuitive-3.gif\",\"description\":\"Ace your DevSecOps compliances with automated audits and continuous validation\"},{\"title\":\"Access cost-optimized tools with high availability for accessible self-service\",\"image1\":\"1678648719The-Intuitive-4.svg\",\"image2\":\"1678648719The-Intuitive-4.gif\",\"description\":\"Access cost-optimized tools with high availability for accessible self-service\"}]', 'DevSecOps Cloud Services for Secure Microservices', 'DevSecOps Cloud Services for Secure Microservices', NULL, NULL, 'active', '2023-03-12 18:41:46', '2023-03-27 13:48:03'),
(3, 'Intuitive-Superpowers-2.svg', 'DataOps: Team velocity from ideation to production', 'Our differentiators unlock value for you', 'DataOps Centers of Excellence', 'Data value delivered to the business at moment of need', 'DataOps', 'DataOps Lifecycle', NULL, 'Our knowledge impact for DataOps services', '<p>The goal of DataOps is to deliver value faster by creating predictable delivery and change management of data, data models and related artifacts. DataOps uses technology to automate the design, deployment, and management of data delivery with appropriate levels of governance, and it uses metadata to improve the usability and value of data in a dynamic environment.</p>', '<p>We take raw data from our clients and turn it into a meaningful result. We work with our users throughout the process to ensure that the analysis is relevant. We are committed to providing clean, in-depth datasets.</p>\r\n<p>Once we finish our initial analysis, we perform multiple quality checks. These tests are included in the price of the analysis package. After testing, we deliver the results to our client along with a certification of the process.</p>\r\n<p>Our goal is to provide clients high-quality visual analytics. No matter the discipline or type of data, we pride ourselves on providing professional results.</p>', 'data-ops', 'uploads/2023/03/da0260b0bdf46084a08c5b8e275c5224.png', NULL, 'Intuitive-Superpowers-2.gif', '[{\"title\":\"Data Governance\",\"description\":\"Data Governance\",\"image\":\"DataOps-Centers-1.svg\",\"image2\":\"DataOps-Centers-1.gif\"},{\"title\":\"Data Architecture\",\"description\":\"Data Architecture\",\"image\":\"DataOps-Centers-2.svg\",\"image2\":\"DataOps-Centers-2.gif\"},{\"title\":\"Data as a Service\",\"description\":\"Data as a Service\",\"image\":\"DataOps-Centers-3.svg\",\"image2\":\"DataOps-Centers-3.gif\"},{\"title\":\"Cognitive Services\",\"description\":\"Cognitive Services\",\"image\":\"DataOps-Centers-4.svg\",\"image2\":\"DataOps-Centers-4.gif\"},{\"title\":\"Data Engineering\",\"description\":\"Data Engineering\",\"image\":\"DataOps-Centers-5.svg\",\"image2\":\"DataOps-Centers-5.gif\"},{\"title\":\"Data Science\",\"description\":\"Data Science\",\"image\":\"DataOps-Centers-6.svg\",\"image2\":\"DataOps-Centers-6.gif\"},{\"title\":\"Data Supply Chain\",\"description\":\"Data Supply Chain\",\"image\":\"DataOps-Centers-7.svg\",\"image2\":\"DataOps-Centers-7.gif\"},{\"title\":\"Advanced Analytics\",\"description\":\"Advanced Analytics\",\"image\":\"DataOps-Centers-8.svg\",\"image2\":\"DataOps-Centers-8.gif\"}]', '[{\"title\":\"Business Requirements\",\"description\":\"Needs and objectives that solve problems, improve decision-making, or align with the overall business strategy.\",\"image\":\"DataOps-Lifecycle-1.svg\",\"image2\":\"DataOps-Lifecycle-1.gif\"},{\"title\":\"Ideation\",\"description\":\"Ideation is the process of creating new ideas to solve problems or create new products\\/services.\",\"image\":\"DataOps-Lifecycle-2.svg\",\"image2\":\"DataOps-Lifecycle-2.gif\"},{\"title\":\"Use Case Definition\",\"description\":\"A scenario for achieving a specific goal or objective in a business system or process.\",\"image\":\"DataOps-Lifecycle-3.svg\",\"image2\":\"DataOps-Lifecycle-3.gif\"},{\"title\":\"Valuation\",\"description\":\"Prioritizing use cases involves ranking the most valuable scenarios a product or system improve business value\",\"image\":\"DataOps-Lifecycle-4.svg\",\"image2\":\"DataOps-Lifecycle-4.gif\"},{\"title\":\"Backlog\",\"description\":\"Organize, prioritize, and track the work that needs to be done by the DataOps team to optimize and streamline the entire data lifecycle\",\"image\":\"DataOps-Lifecycle-5.svg\",\"image2\":\"DataOps-Lifecycle-5.gif\"},{\"title\":\"Blueprint\",\"description\":\"Templates for deploying and configuring cloud resources and services.\",\"image\":\"DataOps-Lifecycle-6.svg\",\"image2\":\"DataOps-Lifecycle-6.gif\"},{\"title\":\"Orchestrate\",\"description\":\"Developing, testing, refining a user-friendly and reliable data solution that meets business requirements.\",\"image\":\"DataOps-Lifecycle-7.svg\",\"image2\":\"DataOps-Lifecycle-7.gif\"},{\"title\":\"Deliver\",\"description\":\"Practices to streamline development, testing, deployment, and maintenance of data systems and apps.\",\"image\":\"DataOps-Lifecycle-8.svg\",\"image2\":\"DataOps-Centers-8.gif\"},{\"title\":\"Operate\",\"description\":\"Managing and optimizing application deployment, monitoring, and maintenance in production.\",\"image\":\"DataOps-Lifecycle-9.svg\",\"image2\":\"DataOps-Lifecycle-9.gif\"},{\"title\":\"Business Value\",\"description\":\"Turn raw data into meaningful insights that can inform strategic decision-making and drive business growth.\",\"image\":\"DataOps-Lifecycle-10.svg\",\"image2\":\"DataOps-Lifecycle-10.gif\"}]', '[{\"title\":\"Maximize value of your data assets\",\"description\":\"Maximize your return on investment by harnessing the full potential of your data through the collection, analysis, and management of information from various sources, resulting in valuable insights.\"},{\"title\":\"Improve customer experiences\",\"description\":\"Businesses can improve customer experiences, foster loyalty, and achieve better outcomes by leveraging customer data to gain insights into purchasing behaviors, automate inventory management, and target their audience more effectively.\"},{\"title\":\"Make more informed business decisions\",\"description\":\"Obtain a comprehensive perspective of your data that can aid you in making informed decisions and identifying the next course of action for your organization.\"}]', '[{\"description\":\"Maximize scalability, performance, and availability, while also leveraging the benefits of the cloud\",\"image\":\"DevSecOps-2.svg\",\"image2\":\"DevSecOps-2.gif\"},{\"description\":\"Maximize your business success with our expertise, proven frameworks, and strategic partnerships\",\"image\":\"DevSecOps-1.svg\",\"image2\":\"DevSecOps-1.gif\"},{\"description\":\"Full range of cloud services designed to address all the accompanying hurdles and roadblocks, from security and availability to performance, compliance, integration, and visibility\",\"image\":\"DevSecOps-3.svg\",\"image2\":\"DevSecOps-3.gif\"}]', 'The Intuitive DataOps Impact', NULL, '[{\"title\":\"Enjoy maximum future-proof compatibility across your cloud infrastructure and tools as we are accredited industry-wide\",\"image1\":\"1678651301The-Intuitive-1.svg\",\"image2\":\"1678651301The-Intuitive-1.gif\",\"description\":\"Enjoy maximum future-proof compatibility across your cloud infrastructure and tools as we are accredited industry-wide\"},{\"title\":\"Deploy at record speed with support from our extensive team of professionals and streamlined transformation processes\",\"image1\":\"1678651301The-Intuitive-2.svg\",\"image2\":\"1678651301The-Intuitive-2.gif\",\"description\":\"Deploy at record speed with support from our extensive team of professionals and streamlined transformation processes\"},{\"title\":\"Process large amounts of real-time data, transform and publish across your enterprise in a secure scalable self-service environment\",\"image1\":\"1678651301The-Intuitive-3.svg\",\"image2\":\"1678651301The-Intuitive-3.gif\",\"description\":\"Process large amounts of real-time data, transform and publish across your enterprise in a secure scalable self-service environment\"},{\"title\":\"Utilize data orchestration and real-time analytics via automated pipelines without disrupting services for your internal users or external customers\",\"image1\":\"1678651301The-Intuitive-4.svg\",\"image2\":\"1678651301The-Intuitive-4.gif\",\"description\":\"Utilize data orchestration and real-time analytics via automated pipelines without disrupting services for your internal users or external customers\"}]', 'DataOps Solutions and Services | Best DataOps Company', 'DataOps Solutions and Services | Best DataOps Company', 'Partner with Intuitive for top-notch solutions and services, including DataOps as a service. Streamline your data operations and accelerate business outcomes.', NULL, 'active', '2023-03-12 18:44:39', '2023-03-23 19:14:07'),
(4, 'Intuitive-Superpowers-3.svg', 'Enable infrastructure as a strategic catalyst for digital transformation', 'The Intuitive Cloud Engineering Impact', 'The business value of our Cloud Infrastructure Engineering', 'Build with purpose for flexibility and scalability', 'Cloud Infrastructure Engineering', 'We help you achieve this in 5 strategic methods', NULL, 'We help you achieve this in 5 strategic methods', '<p>Reduce the time and costs associated with maintaining and upgrading traditional IT environments with cloud-based infrastructure.</p>', '<p>Imagine having a team of experts handling your cloud infrastructure engineering, ensuring that you have access to the most innovative and cutting-edge technology. Our team is dedicated to ensuring that your infrastructure is optimized for performance and reliability, so you can focus on running your business. A study by IBM found that businesses can reduce infrastructure costs by up to 50% by moving to the cloud.</p>\r\n<p>Our cloud infrastructure engineering services cover all aspects of infrastructure management, including the design, deployment, and maintenance of your infrastructure. With our ongoing support, you can be confident that your infrastructure is secure, scalable, and up-to-date with the latest industry standards.</p>', 'cloud-infrastructure-engineering', 'uploads/2023/03/608b75cea9446cb99bd8f4d8b9697ef1.png', 'uploads/2023/03/02f2b0985d553045abda49db53bde609.png', 'Intuitive-Superpowers-3.gif', '[{\"title\":\"Accessibility anywhere, with any device\",\"description\":\"Our innovative solutions provide improved accessibility and mobility, allowing your team to stay connected and collaborate in real-time. With secure access to your data and applications, you can stay up-to-date with the latest information and stay productive even when you\'re on the go.\",\"image\":\"The-Intuitive-Cloud-3.svg\",\"image2\":\"The-Intuitive-Cloud-3.gif\"},{\"title\":\"Ability to get rid of most or all hardware and software\",\"description\":\"Say goodbye to server maintenance, network switches, and backup generators, and hello to a streamlined infrastructure that is managed by your cloud provider. Not only does this help reduce costs, but it also frees up your IT team to focus on more critical tasks.\",\"image\":\"The-Intuitive-Cloud-4.gif\",\"image2\":\"The-Intuitive-Cloud-4.svg\"},{\"title\":\"Quick application deployment\",\"description\":\"Rapidly deploy applications to meet the ever-changing needs of your business. No longer do you need to wait for additional hardware or for IT staff to set up servers. With a range of services that support different cloud infrastructure technologies, you can easily and quickly choose the one that meets your needs.\",\"image\":\"The-Intuitive-Cloud-2.svg\",\"image2\":\"The-Intuitive-Cloud-2.gif\"}]', '[{\"title\":\"Enterprise Scale Cloud Migration\",\"description\":\"Our dedicated experts make the process of transferring data from one environment to another as seamless, reliable, safe and secure as possible.\",\"image\":\"info-icon-1.svg\",\"image2\":\"info-icon-1.gif\"},{\"title\":\"Landing Zone Setup for Security, Governance and Control\",\"description\":\"Easily navigate the complex landscape of regulatory compliance and security with necessary tools and guidance to build a secure, compliant and efficient infrastructure.\",\"image\":\"info-icon-2.svg\",\"image2\":\"info-icon-2.gif\"},{\"title\":\"Enterprise DR Design and Implementation\",\"description\":\"Highly skilled architects with extensive experience in DR design and implementation work together to help organizations minimize downtime and recover quickly and without interruption.\",\"image\":\"info-icon-3.svg\",\"image2\":\"info-icon-3.gif\"},{\"title\":\"Well Architected Review\",\"description\":\"Our team of experts work with you to review your existing architecture, identify any areas of improvement, and provide recommendations on how to optimize your architecture for better performance, scalability, and cost efficiency.\",\"image\":\"info-icon-4.svg\",\"image2\":\"info-icon-4.gif\"},{\"title\":\"Cloud Operations\",\"description\":\"We provide organizations with a safe and efficient method to operate in the cloud, thus allowing organizations to restructure their business, upgrade and transfer their applications, and drive innovation.\",\"image\":\"security-1.svg\",\"image2\":\"security-1.gif\"}]', '[{\"title\":\"Enterprise Scale Cloud Migration\",\"description\":\"Our dedicated experts make the process of transferring data from one environment to another as seamless, reliable, safe and secure as possible.\"},{\"title\":\"Landing Zone Setup for Security, Governance and Control\",\"description\":\"Easily navigate the complex landscape of regulatory compliance and security with necessary tools and guidance to build a secure, compliant and efficient infrastructure.\"},{\"title\":\"Enterprise DR Design and Implementation\",\"description\":\"Highly skilled architects with extensive experience in DR design and implementation work together to help organizations minimize downtime and recover quickly and without interruption.\"},{\"title\":\"Well Architected Review\",\"description\":\"Our team of experts work with you to review your existing architecture, identify any areas of improvement, and provide recommendations on how to optimize your architecture for better performance, scalability, and cost efficiency.\"},{\"title\":\"Cloud Operations\",\"description\":\"We provide organizations with a safe and efficient method to operate in the cloud, thus allowing organizations to restructure their business, upgrade and transfer their applications, and drive innovation.\"}]', '[{\"description\":\"Migrate workloads efficiently by mapping existing capabilities of the legacy system to the target environment\",\"image\":\"info-icon-1.svg\",\"image2\":\"info-icon-1.gif\"},{\"description\":\"Wide range of services from system analysis, data protection, data backup, data recovery to database management\",\"image\":\"info-icon-2.svg\",\"image2\":\"info-icon-2.gif\"},{\"description\":\"12+ years of experience in providing solutions to the public sector, private enterprises and government agencies\",\"image\":\"info-icon-3.svg\",\"image2\":\"info-icon-3.gif\"},{\"description\":\"Solutions designed to help organizations with regulatory compliance, cybersecurity, governance and risk management\",\"image\":\"info-icon-4.svg\",\"image2\":\"info-icon-4.gif\"}]', 'The Intuitive Cloud Engineering Impact', NULL, '[{\"title\":\"Migrate workloads efficiently by mapping existing capabilities of the legacy system to the target environment\",\"image1\":\"1678654018info-icon-1.svg\",\"image2\":\"1678654018info-icon-1.gif\",\"description\":\"Migrate workloads efficiently by mapping existing capabilities of the legacy system to the target environment\"},{\"title\":\"Wide range of services from system analysis, data protection, data backup, data recovery to database management\",\"image1\":\"1678654018info-icon-2.svg\",\"image2\":\"1678654018info-icon-2.gif\",\"description\":\"Wide range of services from system analysis, data protection, data backup, data recovery to database management\"},{\"title\":\"12+ years of experience in providing solutions to the public sector, private enterprises and government agencies\",\"image1\":\"1678654018info-icon-3.svg\",\"image2\":\"1678654018info-icon-3.gif\",\"description\":\"12+ years of experience in providing solutions to the public sector, private enterprises and government agencies\"},{\"title\":\"Solutions designed to help organizations with regulatory compliance, cybersecurity, governance and risk management\",\"image1\":\"1678654018info-icon-4.svg\",\"image2\":\"1678654018info-icon-4.gif\",\"description\":\"Solutions designed to help organizations with regulatory compliance, cybersecurity, governance and risk management\"}]', 'Cloud Infrastructure Engineering Services | Intuitive Cloud', 'Cloud Infrastructure Engineering Services | Intuitive Cloud', 'Get cloud infrastructure engineering services from our Intuitive, a top cloud engineering company. We provide cloud migration, engineering, and strategy services.', NULL, 'active', '2023-03-12 19:35:54', '2023-03-22 19:09:54'),
(5, 'Intuitive-Superpowers-4.svg', 'Cloud security from the get-go', 'Our differentiators unlock value for you', 'We help you achieve this in 7 simple steps', 'Responsive infrastructure that\'s a breeze to secure', 'Cyber Security & GRC', 'Security solutions that set us apart', NULL, 'The positive impact of our Cloud Security & GRC services', '<p>Talk to us today to find out how we enable integrated cloud security with a shift-left and continuous security approach.</p>', '<p>We offer an end-to-end range of services to help you secure your infrastructure and applications on the cloud. From vulnerability assessment and penetration testing to proactive threat detection and application protection, we&rsquo;ve got your back 24/7. We specialize in zero-trust cloud security solutions that are built to scale as your business grows while still providing comprehensive agility, responsiveness and coverage.</p>\r\n<p>We don\'t stop at just protecting your data. We integrate cybersecurity at all levels to protect your enterprise from data leaks, unauthorized access and other potential threats.</p>', 'cloud-security-and-grc', 'uploads/2023/03/939280b98cfc45910fe73511c7569272.png', NULL, 'Intuitive-Superpowers-4.gif', '[{\"title\":\"Security Architecture Review\",\"description\":\"A complete overview and possible overhaul of cloud accounts configuration and security layers for organizations\' security systems and processes to protect against unauthorized access, usage, modification of information, or critical assets.\",\"image\":\"security-1.svg\",\"image2\":\"security-1.gif\"},{\"title\":\"Governance, Risk, and Compliance Assessment\",\"description\":\"We perform comprehensive assessments in evaluating your organization\\u2019s Governance, Risk management, and Compliance processes. It involves an in-depth analysis of internal controls, policies, and the effectiveness of the procedures in meeting compliance and regulatory requirements.\",\"image\":\"security-2.svg\",\"image2\":\"security-2.gif\"},{\"title\":\"Identity and Privilege Access Management (IAM, PIM and PAM)\",\"description\":\"Designing a well-defined identity architecture and strategy covering the business and technical requirements outlining the Governance framework of IAM. This includes policies and procedures for Identity provisioning, access requests, password management and privilege identities management thus addressing the organization\\u2019s regulatory compliance requirements such as GDPR, HIPAA and SOX.\",\"image\":\"security-3.svg\",\"image2\":\"security-3.gif\"},{\"title\":\"Data Security, Privacy, Strategy and Services\",\"description\":\"We help protect critical data on-prem, public\\/hybrid cloud. Consulting and managed security services to standardize and automate data security by assessing your data authorization, authentication, encryption methods, and backup processes and analyzing the maturity, safeguarding privacy, maintaining confidentiality as well as identifying the risks, gaps, and improvement areas.\",\"image\":\"security-4.svg\",\"image2\":\"security-4.gif\"},{\"title\":\"Application Security\",\"description\":\"Well-defined Application Security Strategy including Secure Development Lifecycle (SDLC) that encompasses a secure software development lifecycle. Conducting code and security reviews of your applications, identifying and mitigating vulnerabilities, strong application access controls, and input and output encoding in turn address vulnerabilities and prevent injection attacks and application-level attacks.\",\"image\":\"The-Intuitive-Cloud-1.svg\",\"image2\":\"The-Intuitive-Cloud-1.gif\"},{\"title\":\"Network and Infrastructure Security\",\"description\":\"We help develop a comprehensive security strategy to secure an organization\\u2019s cloud and\\/or on-premises infrastructure to protect your organization\\u2019s critical assets, data and intellectual property, IT systems from cyber threats.\",\"image\":\"The-Intuitive-Cloud-2.svg\",\"image2\":\"The-Intuitive-Cloud-2.gif\"},{\"title\":\"Security operations\",\"description\":\"For seamless security management, we set up user-friendly tools, alerts, and effective monitoring processes. This also includes continuous cyber risk quantification, vulnerability assessment and penetration testing.\",\"image\":\"The-Intuitive-Cloud-3.svg\",\"image2\":\"The-Intuitive-Cloud-3.gif\"}]', '[{\"title\":\"Cloud Cybersecurity Services\",\"description\":\"Our Cloud Cybersecurity services provide comprehensive protection for your cloud network. From risk quantification to zero-trust security strategies and infrastructure security architecture, we offer a range of services to help secure your digital assets. Our security assessment and penetration testing services help identify vulnerabilities, while our regulatory compliance assessment ensures that your organization is meeting industry standards.\",\"image\":\"security-1.svg\",\"image2\":\"security-1.gif\"},{\"title\":\"Advanced Cloud Security Implementation Support for SASE with ZTNA\",\"description\":\"Our team offers a comprehensive approach to SASE architecture adoption, including planning, design, implementation and migration with secure edge solutions, and Zero-Trust Network Access (ZTNA) adoption. Upgrade your traditional security solutions to cloud-based SASE solutions for improved security and flexibility.\",\"image\":\"security-2.svg\",\"image2\":\"security-2.gif\"},{\"title\":\"Cloud Managed Solution Services\",\"description\":\"Our Cloud Managed Solution Support services offer seamless network and security support, centralized security management, and robust cloud security baselining to ensure uninterrupted cloud operations for your business.\",\"image\":\"security-3.svg\",\"image2\":\"security-3.gif\"},{\"title\":\"Cloud Digital Identity and Security Solutions (IAM, CIEM)\",\"description\":\"Our solutions are designed to assess and modernize your digital landscape, providing you with efficient, scalable, and vendor-agnostic options. This will help you accelerate implementation, automate processes, and maximize your investment to ensure a secure digital identity with Intuitive.\",\"image\":\"security-4.svg\",\"image2\":\"security-4.gif\"}]', '[{\"title\":\"24\\u00d77 Visibility\",\"description\":\"Our cloud security solutions provide continuous monitoring of your cloud-based assets and applications, ensuring that you have real-time insight into your risk posture and can quickly take action to protect your business. With 24x7 monitoring, you can be sure that your security is always up-to-date and that you are protected against the latest threats.\"},{\"title\":\"Advanced Threat Detection\",\"description\":\"Cloud security offers advanced threat detection and protection against cyber threats. In fact, a recent report by McAfee found that organizations using cloud security experience 50% fewer security incidents and resolve security incidents 33% faster than those who do not.\"},{\"title\":\"Regulatory Compliance\",\"description\":\"87% of global IT decision-makers said that a lack of compliance automation was a challenge for their organizations in maintaining compliance in the cloud. With cloud security solutions, organizations can leverage enhanced infrastructure and managed security services to ensure compliance with industry-specific and regulatory standards. This can provide peace of mind to both businesses and their clients, and protect sensitive data from potential breaches or attacks.\"}]', '[{\"description\":\"Safety first. Security is a key factor to re-factor, re-platform, redesign and re-code tools and services, as required\",\"image\":\"The-Intuitive-Cloud-4.svg\",\"image2\":\"The-Intuitive-Cloud-4.gif\"},{\"description\":\"Create an organizational culture shift and test both people and processes for security vulnerabilities\",\"image\":\"The-Intuitive-Cloud-3.svg\",\"image2\":\"The-Intuitive-Cloud-3.gif\"},{\"description\":\"Stay continuously secure across every aspect of your enterprise with automation, InfraSec, container and microservice security, serverless run-time protection, code security, and release management\",\"image\":\"The-Intuitive-Cloud-2.svg\",\"image2\":\"The-Intuitive-Cloud-2.gif\"},{\"description\":\"With incident response readiness, taskforce, cyber recovery and data management services\",\"image\":\"The-Intuitive-Cloud-1.svg\",\"image2\":\"The-Intuitive-Cloud-1.gif\"}]', 'The Intuitive Cloud InfoSecurity Impact', NULL, '[{\"title\":\"Maximize audit efficiency with a centralized set of policies and procedures that maps general, privacy, and health compliance standards, including ISO 27001, NIST CSF, SOC-2, PCI-DSS, CMMC, GDPR, CCPA, NIST PF, ISO 27701, HIPAA, and HITRUST\",\"image1\":\"1678654929The-Intuitive-Cloud-1.svg\",\"image2\":\"1678654929The-Intuitive-Cloud-1.gif\",\"description\":\"Maximize audit efficiency with a centralized set of policies and procedures that maps general, privacy, and health compliance standards, including ISO 27001, NIST CSF, SOC-2, PCI-DSS, CMMC, GDPR, CCPA, NIST PF, ISO 27701, HIPAA, and HITRUST\"},{\"title\":\"Enjoy end-to-end network security with continuous testing and scanning. Go the extra mile, run phishing and social engineering tests to future-proof your enterprise\",\"image1\":\"1678654929The-Intuitive-Cloud-2.svg\",\"image2\":\"1678654929The-Intuitive-Cloud-2.gif\",\"description\":\"Enjoy end-to-end network security with continuous testing and scanning. Go the extra mile, run phishing and social engineering tests to future-proof your enterprise\"},{\"title\":\"Depend on industry-leading assessment controls (NIST SP800-144, Cloud Controls Matrix, CIS controls and benchmarks) when you sign up with us\",\"image1\":\"1678654929The-Intuitive-Cloud-3.svg\",\"image2\":\"1678654929The-Intuitive-Cloud-3.gif\",\"description\":\"Depend on industry-leading assessment controls (NIST SP800-144, Cloud Controls Matrix, CIS controls and benchmarks) when you sign up with us\"},{\"title\":\"Understand your security posture and focus budget and resources based on real-time data and comprehensive dashboards\",\"image1\":\"1678654929The-Intuitive-Cloud-4.svg\",\"image2\":\"1678654929The-Intuitive-Cloud-4.gif\",\"description\":\"Understand your security posture and focus budget and resources based on real-time data and comprehensive dashboards\"}]', 'Cloud Security Services | Managed Cloud Services | Intuitive', 'Cloud Security Services | Managed Cloud Services | Intuitive', 'Protect your business with our cloud security solutions and services. Our cloud security solutions provide reliable protection for your organization.', NULL, 'active', '2023-03-12 20:47:40', '2023-03-22 19:14:01'),
(6, 'Intuitive-Superpowers-5.svg', 'Hybrid Cloud, SDDC, SD-WAN, SDN', NULL, 'SDDC, SD-WAN, SDN innovations that set us apart', 'Outcome driven, customer focused SD-WAN, SDDC and SDN solution', 'Hybrid Cloud, SDDC, SD-WAN, SDN', NULL, NULL, 'Our differentiators unlock value for you', '<p>Say goodbye to the complexities of traditional data center management and hello to an agile, cost-effective, and efficient IT environment.</p>', '<p>Maximize the control and minimize the risk with your own in-house SD-WAN infrastructure, integrated with the power of Software-Defined Networking (SDN) and Software-Defined Data Center (SDDC) services. Our deployment process is engineered to provide the highest impact outcomes with rapid delivery and at significantly lower costs.</p>\r\n<p>A WAN powered by the cloud is an essential requirement for every globally aspiring enterprise. Our SD-WAN infrastructure, backed by SDN and SDDC services, is custom engineered for your unique needs, resulting in significant savings of approximately 15-20% compared to carrier-made implementations. It also provides superior privacy and complete authority for the data flowing through your WAN. By integrating SDN and SDDC services, our solution helps to optimize your network and infrastructure, while providing enhanced security, scalability, and flexibility.</p>', 'hybrid-cloud', 'uploads/2023/03/5d721aa095205c4c244d8e9812c065fe.png', 'uploads/2023/03/4586ab7a6681bdf21093af22b1d035bb.png', 'Intuitive-Superpowers-5.gif', '[{\"title\":\"Software Defined Infrastructure (Computing)\",\"description\":\"Infrastructure defined on VMware vSphere and VMware Cloud Foundation\",\"image\":\"SDDC-1.svg\",\"image2\":\"SDDC-1.gif\"},{\"title\":\"Software Defined Networks using NSX-T\",\"description\":\"Accelerate the deployment and delivery of your applications economically while improving agility and flexibility\",\"image\":\"SDDC-2.svg\",\"image2\":\"SDDC-2.gif\"},{\"title\":\"Infrastructure Services (Data Center Virtualization)\",\"description\":\"Access a simulated, cloud and collocated virtual\\/cloud data center\",\"image\":\"SDDC-3.svg\",\"image2\":\"SDDC-3.gif\"},{\"title\":\"Storage Consulting\",\"description\":\"Create a software defined storage unit using vSAN for your business\",\"image\":\"SDDC-4.svg\",\"image2\":\"SDDC-4.gif\"},{\"title\":\"Global Deployment\",\"description\":\"Take your business international with resource availability across 70+ countries\",\"image\":\"SDDC-5.svg\",\"image2\":\"SDDC-5.gif\"},{\"title\":\"Managed Services\",\"description\":\"Make your business agile and consistent in an economic and strategic way\",\"image\":\"SDDC-6.svg\",\"image2\":\"SDDC-6.gif\"},{\"title\":\"Cloud Advisory Services\",\"description\":\"Enhance your business by developing a roadmap that is customized according to your work and infrastructure\",\"image\":\"SDDC-7.svg\",\"image2\":\"SDDC-7.gif\"},{\"title\":\"Cloud Migration Services\",\"description\":\"Accelerate your journey to cloud to maximize performance\",\"image\":\"SDDC-8.svg\",\"image2\":\"SDDC-8.gif\"},{\"title\":\"Cloud Managed Services\",\"description\":\"Control your monitoring and reporting requirements, test performance, and handle backup and recovery\",\"image\":\"SDDC-9.svg\",\"image2\":\"SDDC-9.gif\"}]', NULL, '[{\"title\":\"Elasticity at the core\",\"description\":\"Launch does not mean the end of development! Access integrated and elastic engineering services anytime.\"},{\"title\":\"100% ownership and accountability\",\"description\":\"We mitigate and resolve any software and hardware failure scenarios without fail.\"},{\"title\":\"Strategically aligned\",\"description\":\"Compatible with multiple vendors for product development, enhancement, lifecycle management and deployment, we provide seamless enterprise solutions.\"},{\"title\":\"Automated troubleshooting\",\"description\":\"While our continuous circuit maintenance prevents faults, we triage and follow up incident tickets with service providers for you.\"}]', NULL, 'The Intuitive Hybrid Cloud Impact', NULL, '[{\"title\":\"24\\/7 support and operations post-delivery for a seamless transition\",\"image1\":\"1678687212the-Intuitive-1.svg\",\"image2\":\"1678687212the-Intuitive-1.gif\",\"description\":\"24\\/7 support and operations post-delivery for a seamless transition\"},{\"title\":\"Trained professionals delivering SDN, SD-WAN and SDDC specific consulting and technology solutions\",\"image1\":\"1678687212the-Intuitive-2.svg\",\"image2\":\"1678687212the-Intuitive-2.gif\",\"description\":\"Trained professionals delivering SDN, SD-WAN and SDDC specific consulting and technology solutions\"},{\"title\":\"Instant troubleshooting in case of interruptions to minimize disruption to business\",\"image1\":\"1678687212the-Intuitive-3.svg\",\"image2\":\"1678687212the-Intuitive-3.gif\",\"description\":\"Instant troubleshooting in case of interruptions to minimize disruption to business\"},{\"title\":\"360-degree responsibility of your entire IT operations\",\"image1\":\"1678687212the-Intuitive-4.svg\",\"image2\":\"1678687212the-Intuitive-4.gif\",\"description\":\"360-degree responsibility of your entire IT operations\"}]', 'Hybird Cloud Solutions | Best SD-WAN and SDN Solutions', 'Hybird Cloud Solutions | Best SD-WAN and SDN Solutions', 'Get the best SD-WAN, SDDC and SDN solutions from Intuitive. We are your reliable partners for al SD-WAN and Hybrid WAN solutions and providers for your network infrastructure needs.', NULL, 'active', '2023-03-13 05:18:39', '2023-03-20 20:12:47');
INSERT INTO `service` (`id`, `image`, `title`, `imapact_title`, `content_title`, `content_title_main`, `home_page_title`, `innovation_title`, `priority`, `title_migration`, `description`, `maincontentdescription`, `slug`, `banner_image`, `content_image`, `mobile_banner`, `content`, `innovation`, `migration`, `impact`, `double_title`, `double_description`, `double_value`, `meta_title`, `page_title`, `meta_description`, `seo_keywords`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Intuitive-Superpowers-6.svg', 'Help your teams do their best work by adopting Microsoft Enterprise Solutions', 'The Intuitive Digital Workspace Impact', 'We help you achieve this in 5 simple steps', 'Strengthen efficiency and collaboration at your organization with ease', 'Digital Workspace', 'Cloud SaaS migration innovations that set us apart', NULL, 'The positive impact of enabling Digital Workspace with Intuitive', '<p>Accelerate agility and foster business innovation for your workspace with our Digital Workspace solutions!</p>', '<p>We help you synchronize your operations with cloud SaaS to supercharge your enterprise productivity!</p>\r\n<p>Digital Workplace systems have revolutionized the way businesses operate, making it possible for employees to work from anywhere, at any time. This location independence has proven to be beneficial for companies, increasing productivity and allowing for a more flexible work-life balance for employees.</p>\r\n<p>Implementing a digital workplace system can be a daunting task for businesses, especially for those who are new to the technology. That\'s where Intuitive comes in. We offer a wide range of services to help you with managing and administering your enterprise servers with more secure and ease of administration solutions. From Domain controllers, Active directory federation servers, Microsoft 365, Intune, Microsoft Defender adoption, Exchange Server Migration and Identity Migration as a Service.</p>\r\n<p>We bring the might of intelligent cloud to ensure high-impact outcomes for you. We help plan your migration strategy, document the current environment and build a new environment, migrate your data securely and provide post-migration support.</p>', 'digital-workspace', 'uploads/2023/03/7558bdb1ef36e03e49c772dfec7f3c9d.png', NULL, 'Intuitive-Superpowers-6.gif', '[{\"title\":\"Discovery\",\"description\":\"We assess everything from readiness to security and compliance. We understand your identity and all aspects of inventory of current technology for emails, IM, storage and much more with a prerequisite checklist, best practices and detailed scope of work.\",\"image\":\"Cloud-SaaS-1.svg\",\"image2\":\"Cloud-SaaS-2.svg\"},{\"title\":\"Plan\",\"description\":\"We help you decide on the right solution, and we set the groundwork for migration. We discuss your machine and application dependencies and create migration runbooks. All prerequisites are taken care of.\",\"image\":\"Intuitive-Digital-1.svg\",\"image2\":\"Intuitive-Digital-2.gif\"},{\"title\":\"Migrate\",\"description\":\"The process begins with detailed checklist which involves from server installation, security and compliance from on-premises end and Microsoft 365 tenant enrollment to establish a unified work environment and completing the domain verification to start generating user accounts for cloud solutions.\",\"image\":\"Cloud-SaaS-8.svg\",\"image2\":\"Intuitive-Digital-1.svg\"},{\"title\":\"Manage\",\"description\":\"After the basics are in place, we implement all security standards, set the scale of your operations, and optimize. Here we start handing over the operations to you and provide debriefs to your team.\",\"image\":\"Cloud-SaaS-7.svg\",\"image2\":\"Cloud-SaaS-6.svg\"},{\"title\":\"Adopt\",\"description\":\"To ensure a smooth transition, we conduct enablement sessions for your in-house global administrators and brief your non-technical team members.\",\"image\":\"Cloud-SaaS-7.svg\",\"image2\":\"Cloud-SaaS-8.svg\"}]', '[{\"title\":\"Seamless Office 365 adoption\",\"description\":\"Seamless Office 365 adoption\",\"image\":\"Cloud-SaaS-1.svg\",\"image2\":\"Cloud-SaaS-1.gif\"},{\"title\":\"Quick Intune adoption\",\"description\":\"Quick Intune adoption\",\"image\":\"Cloud-SaaS-2.svg\",\"image2\":\"Cloud-SaaS-2.gif\"},{\"title\":\"Complete deployment and strategy support\",\"description\":\"Complete deployment and strategy support\",\"image\":\"Cloud-SaaS-3.svg\",\"image2\":\"Cloud-SaaS-3.gif\"},{\"title\":\"Exchange Server Migration as a Service\",\"description\":\"Exchange Server Migration as a Service\",\"image\":\"Cloud-SaaS-4.svg\",\"image2\":\"Cloud-SaaS-4.gif\"},{\"title\":\"Identity Migration as a Service\",\"description\":\"Identity Migration as a Service\",\"image\":\"Cloud-SaaS-5.svg\",\"image2\":\"Cloud-SaaS-5.gif\"},{\"title\":\"Infrastructure server migration like domain controllers, ADFS, etc\",\"description\":\"Infrastructure server migration like domain controllers, ADFS, etc\",\"image\":\"Cloud-SaaS-6.svg\",\"image2\":\"Cloud-SaaS-7.gif\"},{\"title\":\"Cloud Software as a Service\",\"description\":\"Cloud Software as a Service\",\"image\":\"Cloud-SaaS-7.svg\",\"image2\":\"Cloud-SaaS-7.gif\"},{\"title\":\"Co-management implementation\",\"description\":\"Co-management implementation\",\"image\":\"Cloud-SaaS-8.svg\",\"image2\":\"Cloud-SaaS-8.gif\"}]', '[{\"title\":\"Unlock business productivity\",\"description\":\"At the heart of every successful business is a streamlined and efficient operation. The digital workplace provides just that, removing roadblocks and streamlining processes to increase overall productivity. Powerful instant messaging tools, such as those offered by Microsoft, can also significantly impact productivity by allowing for quick and effective decision-making. Upgrade to a digital workplace and see the results for yourself!\"},{\"title\":\"Cost reduction leading to maximum savings\",\"description\":\"By empowering employees with digital workspace, companies can unlock new levels of efficiency and cost savings that were previously not possible. Whether it\'s through automation, increased collaboration, or better use of technology, the benefits of digital workspace are real and tangible.\"},{\"title\":\"Increased employee satisfaction and retention\",\"description\":\"With the rise of remote work, the digital workplace has become a critical aspect of the employee experience. Organizations with digital workplaces have reported a staggering 87% increase in employee retention, which is a testament to the positive impact of digital work environments on employee satisfaction and well-being.\"}]', '[{\"description\":\"Intelligent cloud SaaS\",\"image\":\"Intuitive-Digital-1.svg\",\"image2\":\"Intuitive-Digital-1.gif\"},{\"description\":\"Seamless end-to-end migration handled by our team\",\"image\":\"Intuitive-Digital-2.svg\",\"image2\":\"Intuitive-Digital-3.gif\"},{\"description\":\"End-to-end migration support\",\"image\":\"Intuitive-Digital-3.svg\",\"image2\":\"Intuitive-Digital-3.gif\"},{\"description\":\"All Microsoft recommendation configurations\",\"image\":\"Intuitive-Digital-4.svg\",\"image2\":\"Intuitive-Digital-4.gif\"}]', 'Our differentiators unlock value for you', NULL, '[{\"title\":\"Highly skilled team of MCP, MCSA, M365CE engineers\",\"image1\":\"1678688336Our-differentiators-1.svg\",\"image2\":\"1678688336Our-differentiators-1.gif\",\"description\":\"Highly skilled team of MCP, MCSA, M365CE engineers\"},{\"title\":\"Complementary cloud transformation advisory and design services\",\"image1\":\"1678688336Our-differentiators-2.svg\",\"image2\":\"1678688336Our-differentiators-2.gif\",\"description\":\"Complementary cloud transformation advisory and design services\"},{\"title\":\"Vulnerability analysis and remediation on your existing Microsoft infrastructure\",\"image1\":\"1678688336Our-differentiators-3.svg\",\"image2\":\"1678688336Our-differentiators-3.gif\",\"description\":\"Vulnerability analysis and remediation on your existing Microsoft infrastructure\"},{\"title\":\"Integrated security features and optimal end-to-end configuration\",\"image1\":\"1678688336Our-differentiators-4.svg\",\"image2\":\"1678688336Our-differentiators-4.gif\",\"description\":\"Integrated security features and optimal end-to-end configuration\"}]', 'Digital Workspace Solutions and Service | Intuitive Cloud', 'Digital Workspace Solutions and Service | Intuitive Cloud', 'Intutive provides the best and secure solutions and services for your workspace needs, including Microsoft 365 digital workplace solutions. Contact us today!', NULL, 'active', '2023-03-13 06:02:41', '2023-03-22 19:01:44'),
(8, 'operation.svg', 'Optimize your cloud spend with strategic FinOps Services', NULL, NULL, 'Sustainable FinOps to maximize the benefits of cloud investments', 'Cloud FinOps', 'FinOps offerings that make a difference', NULL, 'The positive impact of partnering with Intuitive for FinOps', '<p>Manage and optimize cloud spend to get the most value from your cloud investments</p>', '<p>Our FinOps team will work with you to establish a sustainable FinOps organization to optimize your cloud spending on an on-going basis. By implementing best practices for FinOps, customers can be confident that they are not overpaying for cloud services and that their infrastructure is optimized for high performance and reliability.</p>\r\n<p>Additionally, our FinOps services can provide continuous support for cost management and financial accountability, allowing you to focus on achieving your business goals and gain a competitive edge in today\'s cloud-driven marketplace.</p>', 'cloud-finops', 'uploads/2023/03/bff12af1cc81c9e20aef94390e734381.png', 'uploads/2023/03/416d7b931a96a8040319d34bc4f369d5.png', 'operation.gif', NULL, '[{\"title\":\"FinOps Assessment\",\"description\":\"<ul>\\r\\n                <li>Organizational Assessment<\\/li>\\r\\n                <li>FinOps Tool Setup<\\/li>\\r\\n                <li>Areas of Optimization &amp; Potential Cost Savings Identification<\\/li>\\r\\n                <li>FinOps Roadmap creation<\\/li>\\r\\n              <\\/ul>\",\"image\":\"Footer-Logo (1).png\",\"image2\":\"Footer-Logo (1).png\"},{\"title\":\"Cost Optimization & Consulting\",\"description\":\"<ul>\\r\\n                <li>Commitment Management<\\/li>\\r\\n                <li>Implement Cost Allocation<\\/li>\\r\\n                <li>Data Analytics and Forecasting<\\/li>\\r\\n                <li>Cost Anomaly Detection<\\/li>\\r\\n                <li>Remediation<\\/li>\\r\\n              <\\/ul>\",\"image\":\"Footer-Logo (1).png\",\"image2\":\"Footer-Logo (1).png\"},{\"title\":\"FinOps Culture\",\"description\":\"<ul>\\r\\n                <li>Vocabulary Alignment<\\/li>\\r\\n                <li>FinOps Adoption<\\/li>\\r\\n                <li>Collaboration<\\/li>\\r\\n                <li>Accountability<\\/li>\\r\\n              <\\/ul>\",\"image\":\"Footer-Logo (1).png\",\"image2\":\"Footer-Logo (1).png\"},{\"title\":\"Continuous Managed Services\",\"description\":\"<ul>\\r\\n                <li>Commitment Management<\\/li>\\r\\n                <li>Customized Reporting<\\/li>\\r\\n                <li>Proactive Monitoring and Alerting<\\/li>\\r\\n                <li>Elastic Engineering Services<\\/li>\\r\\n              <\\/ul>\",\"image\":\"Footer-Logo (1).png\",\"image2\":\"Footer-Logo (1).png\"}]', '[{\"title\":\"Get immediate results from low-risk high-yield\",\"description\":\"In 3 months or less, we will have identified the immediate savings that can be achieved, be they commitment-based discount, usage optimization, waste identification, or unused resources. In our experience, the exercise could result in 10 to 30% savings.\"},{\"title\":\"Be set for the long run\",\"description\":\"We are dedicated to assisting your organization in implementing a successful FinOps practice. Our first step will be to evaluate your current position and collaborate with you to develop a customized roadmap for fostering a FinOps culture that is suitable for your company. Our ultimate objective is to empower you to operate independently and achieve success on your own terms.\"},{\"title\":\"Flexible managed services\",\"description\":\"We can step in and take in-charge of any FinOps capability, for instance, commitment-based discount management, real-time reporting or anomaly detection. We also provide on-demand access to our experts to help you fine-tune your FinOps journey. By entrusting us, you can focus on growing your business.\"}]', NULL, NULL, NULL, NULL, 'Cloud FinOps Solution and Services | FinOps Managed Services', 'Cloud FinOps Solution and Services | FinOps Managed Services', 'Get reliable Cloud FinOps solutions and services, including FinOps managed services and FinOps assessment from Intuitive,Cloud. Streamline your cloud financial operations.', NULL, 'active', '2023-03-14 13:22:15', '2023-03-27 13:47:14'),
(9, 'ai.svg', 'Transform data into your sustainable competitive advantage', 'Scale & Optimize Data', 'Our differentiators unlock value for you', 'AI & ML solutions that meet you where you are in your journey', 'AI & ML', 'Engineering Excellence', NULL, 'AI & ML Lifecycle', '<p>Create differentiated customer experiences and efficiencies with engineered and integrated AI and ML solutions.</p>', '<p>Achieve your competitive advantage no matter where you are in your AI &amp; ML journey.</p>\r\n<p>Whether you are trying to understand your customers better, or to optimize business operations, we have AI &amp; ML powered solutions across sectors, and on the cloud of your choice.</p>\r\n<p>Our AI &amp; ML team will work with you to identify business opportunities, frame them into solvable problems, and implement the solutions in an operationally sustainable manner.</p>\r\n<p>We bring domain knowledge, engineering discipline, business analysis and change management to the table to turn bold visions into reality.</p>', 'ai-ml-solutions', 'uploads/2023/03/cf9ea409b200459ab4a7a76c70cb837b.png', NULL, 'ai.gif', '[{\"title\":\"Flexible Operating Models\",\"description\":\"Based on our assessment of your needs and maturity, we propose integrated business solutions underpinned by our world-class engineering services paired with business analysis and change management professionals who know what it takes to weave the power of machine learning into the fabric of business.\",\"image\":\"arrow-button.png\",\"image2\":\"arrow-button-1.png\"},{\"title\":\"Engineering Excellence\",\"description\":\"We apply engineering rigor to our AI & ML projects and apply lessons learned across a variety of clouds, frameworks, and sectors to accelerate your journey.\",\"image\":\"Azure_Logo.png\",\"image2\":\"Collaborate-1.png\"},{\"title\":\"Scale & Optimize Data\",\"description\":\"We realize the organizational and technical challenges to extract value from data silos at scale and apply a multi-faceted approach to integrate data silos with little to no disruption. \\r\\nWe partner alongside you to create an environment where Machine Learning is possible.\",\"image\":\"Collaborate-2.png\",\"image2\":\"Collaborate-3.png\"}]', '[{\"title\":\"Engineering Excellence\",\"description\":\"Engineering Excellence\",\"image\":\"Collaborate-9.png\",\"image2\":\"Collaborate-9.png\"},{\"title\":\"Engineering Excellence\",\"description\":\"Engineering Excellence\",\"image\":\"Collaborate-10.png\",\"image2\":\"Collaborate-9.png\"}]', '[{\"title\":\"AI & ML assessment\",\"description\":\"<ul>\\r\\n<li>Perform an Analytics Assessment<\\/li>\\r\\n<li>Launch a ML Maturity Assessment<\\/li>\\r\\n<li>Deliver an ML Roadmap, including sector specific business opportunities<\\/li>\\r\\n<\\/ul>\"},{\"title\":\"Build and scale capabilities\",\"description\":\"<ul>\\r\\n<li>Build out organizational capabilities and technical infrastructure for ML<\\/li>\\r\\n<li>Create pilots and proof of concepts for developing organizational capacity for ML<\\/li>\\r\\n<li>Integrate and tune industry specific models for immediate ROI<\\/li>\\r\\n<\\/ul>\"},{\"title\":\"Accelerate the pace of Innovation\",\"description\":\"<ul>\\r\\n<li>Implement sophisticated MLOps for repeatable and predictable outcomes<\\/li>\\r\\n<li>Scale ML initiatives in speed and diversity through model and feature engineering services<\\/li>\\r\\n<li>Operationalize models at scale and integrate into existing Service Management capabilities<\\/li>\\r\\n<\\/ul>\"},{\"title\":\"Push the boundaries of what is possible\",\"description\":\"<ul>\\r\\n<li>Achieve fully integrated automation to maximize creative work<\\/li>\\r\\n<li>Enable automated model creation, testing, and evaluation to solve the most challenging and novel use-cases<\\/li>\\r\\n<li>Accelerate synergies between business outcomes and IT capabilities<\\/li>\\r\\n<\\/ul>\"}]', '[{\"description\":\"Scale & Optimize Data\",\"image\":\"Collaborate-12.png\",\"image2\":\"Collaborate-13.png\"}]', 'Flexible Operating Models', NULL, '[{\"title\":\"Flexible Operating Models\",\"image1\":\"1678885310Collaborate-14.png\",\"image2\":\"1678885310Collaborate-18.png\",\"description\":\"Flexible Operating Models\"}]', 'AI & ML Solutions | Intuitive Cloud', 'AI & ML Solutions | Intuitive Cloud', 'Explore Intuitive\'s AI & ML solutions that help businesses leverage the power of machine learning and artificial intelligence. Get in touch with us today!', NULL, 'active', '2023-03-15 19:33:49', '2023-03-25 17:05:08'),
(10, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', '2023-03-18 22:26:56', '2023-03-18 22:26:56'),
(11, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', '2023-03-24 18:52:09', '2023-03-24 18:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `service_user`
--

CREATE TABLE `service_user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `service` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Intutive Clouds', 'active', '2022-11-11 12:04:59', '2022-11-23 10:48:34'),
(2, 'contact_no', '9537577772', 'active', '2022-11-11 12:04:59', '2022-11-23 10:48:34'),
(3, 'site_email', 'sales@intuitive.cloud', 'active', '2022-11-11 12:04:59', '2022-12-08 10:06:34'),
(4, 'site_short_name', 'Intutive Clouds', 'active', '2022-11-11 12:04:59', '2022-11-23 10:48:34'),
(5, 'app_version', '1.0.0', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(6, 'copy_rights_credit_line', 'Demo', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, 'copy_rights_year', '2020-2021', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, 'google_map_api_key', '111', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, 'moderation_queue', 'on', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(10, 'fcm_server_key', 'AAAAUot9YAc:APA91bF7IpPFZNq_3_FbXCTV67pbAyRgIaOm1wnnJK1', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(11, 'address', 'Intuitive Technology Partners Inc. 33 Wood Ave. S, STE 600 Iselin, NJ, 08830-2717, USA', 'active', '2022-11-11 12:04:59', '2022-11-23 06:08:37'),
(12, 'logo', 'uploads/2023/03/7b25c40d203ad5aa8b2bd44e6a12cdb3.png', 'active', '2022-11-11 12:04:59', '2023-03-20 14:39:27'),
(13, 'is_encrypt_decrypt', '1', 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `device` enum('Web','Mobile') DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `device`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Blog', NULL, 'Listing', 'active', '2022-11-21 18:41:28', '2023-03-12 09:16:03'),
(3, 'Home Slider', NULL, 'Home', 'active', '2022-11-22 05:01:32', '2022-11-22 05:01:32'),
(4, 'dsaddsad', NULL, 'Home', 'active', '2022-12-01 18:06:27', '2022-12-01 18:09:03'),
(6, 'Work + Play = A Happy Team', NULL, 'Category', 'active', '2022-12-07 16:53:55', '2022-12-07 16:58:29'),
(7, 'Listen to stories of our team', NULL, 'lifeatpage2', 'active', '2022-12-07 17:14:12', '2022-12-07 17:14:12'),
(9, 'Portfolio', NULL, 'Portfolio', 'active', '2023-03-12 09:22:31', '2023-03-12 09:22:31'),
(10, 'Press Release', NULL, 'PressRealease', 'active', '2023-03-12 11:00:25', '2023-03-12 11:00:25'),
(11, 'Contact us', NULL, 'Contactus', 'active', '2023-03-12 11:07:05', '2023-03-12 11:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(250) DEFAULT NULL,
  `mobie_image` varchar(250) DEFAULT NULL,
  `video_mobile` varchar(250) DEFAULT NULL,
  `is_clickable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `redirect_to` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `description` longtext,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slider_id`, `priority`, `title`, `tagline`, `image`, `video`, `mobie_image`, `video_mobile`, `is_clickable`, `redirect_to`, `button_text`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'We’re all about purposeful innovation and unlocking', NULL, '', 'Banner-1.mp4', '', 'Banner-1.mp4', 'Yes', NULL, NULL, 'We’re all about purposeful innovation and unlockingWe’re all about purposeful innovation and unlocking', 'active', '2022-11-20 11:17:36', '2022-11-20 15:53:13'),
(2, 1, 2, 'Main Project', NULL, 'uploads/2022/11/793ad7d2e7916d9029ac87c876b88359.jpg', '', 'uploads/2022/11/96511441f1c79b8ff96efa747cc24453.jpg', '', 'No', NULL, NULL, 'Main ProjectMain ProjectMain ProjectMain Project', 'active', '2022-11-20 15:58:00', '2022-11-20 15:58:00'),
(3, 2, 1, 'Minds at Intuitive inspiring our present & future', NULL, 'uploads/2023/03/37efb9e6c921248d35ea299fe08fbd6b.png', '', 'uploads/2023/03/9de2a4fe71fcf290a34b20bb9b2430dd.png', '', 'No', 'dfs', NULL, 'BlogBlog', 'active', '2022-11-21 18:42:25', '2023-03-12 09:15:53'),
(4, 3, 1, 'Unlock the potential of your data for a competitive advantage', NULL, 'uploads/2023/03/6cead4e40a492e278cec2ae0db96688c.png', '', 'uploads/2023/03/9f7776bd19dad123d97cf73c1e296836.png', '', 'No', 'https://www.intuitive.cloud/service/data-ops', 'Explore more!', 'DataOps', 'active', '2022-11-22 05:16:19', '2023-03-25 14:59:26'),
(5, 3, 2, 'Accelerate development & secure your software supply chain through innovation', NULL, 'uploads/2023/03/6be23b6ceea5b7104e19d4c31f44f858.png', '', 'uploads/2023/03/c7193e890ad76075c2e2d3c65d911b6b.png', '', 'No', 'https://www.intuitive.cloud/service/cloud-native', 'Understand how!', 'Cloud Native, AppSecOps, DevSecOps', 'active', '2022-11-22 05:44:02', '2023-03-25 15:00:01'),
(6, 3, 3, 'Experience excellence in digital workspace', NULL, 'uploads/2023/03/d0fd380d377d23a9353bc16227eede78.png', '', 'uploads/2023/03/3ac4e5b5820bf2caf18e0ea6f2a2345c.png', '', 'No', 'https://www.intuitive.cloud/service/digital-workspace', 'Get started today!', 'Digital Workspace (M365)', 'active', '2022-11-23 05:02:54', '2023-03-25 17:41:12'),
(8, 4, 6, 'sad', NULL, '', 'Banner-1.mp4', '', 'Intuitive video.mp4', 'Yes', 'sdaa', NULL, 'dsffffffffff', 'active', '2022-12-01 18:14:58', '2022-12-01 18:14:58'),
(9, 4, 6, 'sda', NULL, '', 'Intuitive video.mp4', '', 'Banner-1.mp4', 'Yes', 'sda', NULL, 'sda', 'active', '2022-12-01 18:15:37', '2022-12-01 18:15:37'),
(10, 4, 1, 'zxzzz', NULL, '', 'Banner-1.mp4', '', 'Banner-1.mp4', 'Yes', 'xzzzzzzz', NULL, 'xzzzzzzzz', 'active', '2022-12-01 18:22:54', '2022-12-01 18:22:54'),
(11, 6, 7, 'test', NULL, 'uploads/2022/12/13e38b4a3405143b4bc738eb88183498.png', '', 'uploads/2022/12/be290104a65963bb63b9c650c720e8de.png', '', 'No', NULL, NULL, NULL, 'active', '2022-12-07 17:00:28', '2022-12-07 17:00:28'),
(12, 6, 88, 'slide2', NULL, 'uploads/2022/12/8a097cb04e2bb7b069656078cc5d3a80.png', '', 'uploads/2022/12/9e10c326eca6affde92b432466efa5dd.png', '', 'No', NULL, NULL, NULL, 'active', '2022-12-07 17:02:26', '2022-12-07 17:02:26'),
(13, 6, 545, 'slide3', NULL, 'uploads/2022/12/a70d9f3f6b59f838c8d5f5439d0ee970.png', '', 'uploads/2022/12/91a064879dac27d413856cee93f0e9d9.png', '', 'No', NULL, NULL, NULL, 'active', '2022-12-07 17:03:05', '2022-12-07 17:03:05'),
(14, 6, 895, 'sllide4', NULL, 'uploads/2022/12/231477a368b3b9fb381064cef9b3e3d9.png', '', 'uploads/2022/12/ed2b2b4d95ff989d0c99b7588cf66255.png', '', 'No', NULL, NULL, NULL, 'active', '2022-12-07 17:04:05', '2022-12-07 17:04:05'),
(15, 7, 253, 'Arthur Bell, Sr Linux Engineer,North Carolina', NULL, 'uploads/2022/12/69b309698a9434cf87a89b397f9dc71d.png', '', 'uploads/2022/12/10791e60113372d9857837f6af18fc63.png', '', 'No', NULL, NULL, 'I have been working at Intuitive for a little over a year and a half. The company is sound, well run and the people are first rate. I would recommend Intuitive as an employer to anyone looking to further their career in Information Technology.', 'active', '2022-12-07 17:16:14', '2022-12-07 17:16:14'),
(16, 7, 5646, 'David Foster, Sales Leader, New York', NULL, 'uploads/2022/12/5117017bfec23982f7100d085f747616.png', '', 'uploads/2022/12/f655590f167cfe08bdb55666db467a88.png', '', 'No', NULL, NULL, 'I joined Intuitive in October 2020 having known some of the Intuitive team over the previous years. Since joining,I have found an organization that excels in putting people in a position where they can grow and mature within their skills, roles andresponsibilities.Justcompleting my two-year anniversary and I amalreadylookingforward to the next two years and the two years after that\"', 'active', '2022-12-07 17:20:58', '2022-12-07 17:20:58'),
(17, 9, 6, 'Partnering with extraordinary entrepreneurs offering extraordinary products and services', NULL, 'uploads/2023/03/0f93f35db9746efe2f35315736dc77d0.png', '', 'uploads/2023/03/949f2e8f77beb43ab3f671b1bf3c876d.png', '', 'No', NULL, NULL, NULL, 'active', '2023-03-12 09:23:15', '2023-03-12 09:23:15'),
(18, 10, 69, 'Intuitive in the news', NULL, 'uploads/2023/03/45196cacdebce7c29c48c78e8540c5be.png', '', 'uploads/2023/03/457c7e9d1606d9dd0b54423b977b7133.png', '', 'No', NULL, NULL, 'Read news and announcements about our partnerships,\r\nimportant updates, new services, and more.', 'active', '2023-03-12 11:01:27', '2023-03-12 11:01:27'),
(19, 11, 85, 'We are just a few clicks away. Get in touch today', NULL, 'uploads/2023/03/cf5d739b4e3d0004611e1f1b5ac1a330.png', '', 'uploads/2023/03/76ee7fbe5f8abc11f0d2fe567468ec64.png', '', 'No', NULL, NULL, NULL, 'active', '2023-03-12 11:07:47', '2023-03-12 11:07:47'),
(20, 3, 4, 'Build a solid digital foundation, both on-prem and cloud', NULL, 'uploads/2023/03/1d5ef5e3357dec9edfd6824f35004477.png', '', 'uploads/2023/03/b0f299d8d9c35380a5e1e591b8a5dd14.png', '', 'No', 'https://www.intuitive.cloud/service/hybrid-cloud', 'Speak to our experts now!', 'Hybrid Cloud, SDDC, SD-WAN, SDN', 'active', '2023-03-14 21:05:18', '2023-03-25 15:00:46'),
(21, 3, 5, 'Reduce business risks with cloud-agnostic security strategies', NULL, 'uploads/2023/03/998944d8680d95a3083319123cb03668.png', '', 'uploads/2023/03/8be2b66e5c934b2d992c2430c5b7939f.png', '', 'No', 'https://www.intuitive.cloud/service/cloud-security-and-grc', 'Get in touch today!', 'Cyber Security and GRC', 'active', '2023-03-14 21:05:58', '2023-03-25 15:01:17'),
(22, 3, 6, 'Simplify the complexities of cloud adoption for enterprises', NULL, 'uploads/2023/03/8de39a314b08abbf962cafca1975892f.png', '', 'uploads/2023/03/5a2ce5b0f772a11cbd43e81159e0872d.png', '', 'No', 'https://www.intuitive.cloud/service/cloud-infrastructure-engineering', 'Get started today!', 'Cloud Infrastructure Engineering', 'active', '2023-03-14 21:06:33', '2023-03-25 15:01:41'),
(23, 3, 7, 'Get the best value for your cloud spend', NULL, 'uploads/2023/03/01f3121e23fcad043fadc211901ab00d.png', '', 'uploads/2023/03/30cb54954a14ed253f761c7116608ee7.png', '', 'No', 'https://www.intuitive.cloud/service/cloud-finops', 'Explore more!', 'Cloud FinOps', 'active', '2023-03-15 16:54:04', '2023-03-25 15:01:59'),
(24, 3, 8, 'Accelerate your organization\'s digital transformation with AI & ML services', NULL, 'uploads/2023/03/49eec29b202b89d51b5b1597bab15398.png', '', 'uploads/2023/03/88f4bcc6857eb4b6387ab4335807d1c0.png', '', 'No', 'https://www.intuitive.cloud/service/ai-ml-solutions', 'Start today!', 'AI & ML', 'active', '2023-03-16 19:48:03', '2023-03-25 15:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andaman and Nicobar Islands', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(2, 'Andhra Pradesh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, 'Arunachal Pradesh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(4, 'Assam', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(5, 'Bihar', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(6, 'Chandigarh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(7, 'Chhattisgarh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, 'Dadra and Nagar Haveli', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, 'Daman and Diu', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(10, 'Delhi', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(11, 'Goa', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(12, 'Gujarat', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(13, 'Haryana', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(14, 'Himachal Pradesh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(15, 'Jammu and Kashmir', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(16, 'Jharkhand', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(17, 'Karnataka', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(18, 'Kenmore', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(19, 'Kerala', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(20, 'dasds', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(21, 'Madhya Pradesh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(22, 'Maharashtra', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(23, 'Manipur', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(24, 'Meghalaya', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(25, 'Mizoram', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(26, 'Nagaland', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(27, 'Narora', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(28, 'Natwar', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(29, 'Odisha', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(30, 'Paschim Medinipur', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(31, 'Pondicherry', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(32, 'Punjab', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(33, 'Rajasthan', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(34, 'Sikkim', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(35, 'Tamil Nadu', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(36, 'Telangana', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(37, 'Tripura', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(38, 'Uttar Pradesh', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(39, 'Uttarakhand', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(40, 'Vaishali', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(41, 'West Bengal', 1, 'active', '2022-11-11 12:04:59', '2022-11-11 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `days` int(11) NOT NULL DEFAULT '30',
  `comments` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_benefits`
--

CREATE TABLE `subscription_plan_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Customer',
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `added_by_id` varchar(255) DEFAULT NULL,
  `is_subscribed` enum('Yes','No') NOT NULL DEFAULT 'No',
  `noti_via_nitification` tinyint(4) NOT NULL DEFAULT '1',
  `noti_via_email` tinyint(4) NOT NULL DEFAULT '1',
  `show_order_notification` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('active','inactive','pending','blocked') NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country_code`, `phone_number`, `profile_image`, `password`, `user_type`, `gender`, `dob`, `email_verified_at`, `mobile_verified_at`, `added_by_id`, `is_subscribed`, `noti_via_nitification`, `noti_via_email`, `show_order_notification`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'fARCSKe5y63pew==', 'fARCSKe5y63pey+SA+YI4sdnaA==', '+91', 'PkMBGeDOlvC3LQ==', '', '$2y$10$.SJ3qcWDBgMKracuyFWmGuPyKAII9pa2WlMU5pb0gx1AQ/Z9Ahzuu', 'superAdmin', NULL, NULL, '2022-11-11 12:04:59', NULL, NULL, 'No', 1, 1, 1, 'active', NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(3, 'XBBcR7SBj4TodAKaAecF', 'exlXXrSWxaH5JV/HIugJrc1kK/PHig==', '+91', 'N0IGGuDJlve2LQ==', '', '$2y$10$6cV.otGGMzmAQaGH3FqG3.l8N/GoN9C3J.wqyR5oW1yYgA7oEBlOa', 'Customer', NULL, NULL, '2022-11-11 12:04:59', NULL, NULL, 'No', 1, 1, 1, 'active', NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(8, 'XBBcR7SBj4TodAKaAecF', 'fBBcR7SB76PvcQqZB+EHqdZ7K/PHig==', '+91', 'N0IGGuDJlve2LA==', '', '$2y$10$6cV.otGGMzmAQaGH3FqG3.l8N/GoN9C3J.wqyR5oW1yYgA7oEBlOa', 'Developer', NULL, NULL, '2022-11-11 12:04:59', NULL, NULL, 'No', 1, 1, 1, 'active', NULL, '2022-11-11 12:04:59', '2022-11-11 12:04:59'),
(9, 'fB5fVLTYzqfydBieDg==', 'fB5fVLTJ76HjdgCNC+4K4sdnaA==', '+91', 'NkQBG+XMmPC0IQ==', NULL, '$2y$10$8KmWjxi7p3xMvZOWZjocOezDk.AbrLpgDf16kDpZOGbASGZppIZ4C', 'Customer', NULL, NULL, NULL, NULL, NULL, 'No', 1, 1, 1, 'pending', NULL, '2023-03-17 19:29:49', '2023-03-17 19:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variation_groups`
--

CREATE TABLE `variation_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variation_group_translations`
--

CREATE TABLE `variation_group_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `variation_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `locale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variation_translations`
--

CREATE TABLE `variation_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `locale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` enum('Credit','Debit') DEFAULT NULL,
  `status` enum('Pending','Completed','Failed') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `title`, `content`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022', 'Crossed the 100-client milestone', 1, 'active', '2023-03-09 14:06:03', '2023-03-09 18:36:00'),
(3, '2022', 'Built a powerhouse team with 400+ workforce', 2, 'active', '2023-03-09 14:09:37', '2023-03-09 18:36:11'),
(4, '2022', 'Got featured by INC 500 as one of the Fastest Growing Private Companies in America', 3, 'active', '2023-03-09 16:28:14', '2023-03-09 18:02:24'),
(5, '2022', 'Recognized by CRN’s Fast Growth 150 List for a second year in a row with #10', 4, 'active', '2023-03-09 18:03:03', '2023-03-09 18:36:33'),
(6, '2021', 'Recognized on the CRN Fast Growth 150 List', 5, 'active', '2023-03-09 18:04:35', '2023-03-09 18:36:38'),
(7, '2021', 'Accelerated growth with 200 people team', 6, 'active', '2023-03-09 18:05:31', '2023-03-09 18:36:44'),
(8, '2020', 'Started Operations in Canada', 7, 'active', '2023-03-09 18:05:57', '2023-03-09 18:36:51'),
(9, '2019', 'Scaled new heights with a 100+ people practice', 8, 'active', '2023-03-09 18:06:19', '2023-03-09 18:36:57'),
(10, '2019', 'Led the way in data and AI/ML innovation with the launch of our services', 9, 'active', '2023-03-09 18:06:46', '2023-03-09 18:37:36'),
(11, '2019', 'Expanded our reach with launch operations in Spain', 10, 'active', '2023-03-09 18:07:19', '2023-03-09 18:37:41'),
(12, '2018', 'Took a leap of innovation with the incorporation of the Intuitive Innovation Arm', 11, 'active', '2023-03-09 18:07:44', '2023-03-09 18:37:46'),
(13, '2017', 'Made our mark in Europe with commencement of operations', 12, 'active', '2023-03-09 18:08:08', '2023-03-09 18:37:52'),
(14, '2016', 'Commencement of our Cybersecurity Division', 13, 'active', '2023-03-09 18:08:35', '2023-03-09 18:37:58'),
(15, '2015', 'Launched our Public Cloud Offering Division to pave the way for the future of Cloud Computing', 14, 'active', '2023-03-09 18:09:08', '2023-03-09 18:38:03'),
(16, '2014', 'Launched our SD-WAN, SDN, and Private Cloud Division to revolutionize networking', 15, 'active', '2023-03-09 18:09:46', '2023-03-09 18:38:08'),
(17, '2014', 'Started a new office in the land of diversity, India', 16, 'active', '2023-03-09 18:10:16', '2023-03-09 18:38:14'),
(18, '2014', 'Dipped our toes in the Arabian Gulf with an office in Dubai', 17, 'active', '2023-03-09 18:10:36', '2023-03-09 18:38:20'),
(19, '2013', 'Launched our SDDC Division', 18, 'active', '2023-03-09 18:11:07', '2023-03-09 18:38:29'),
(20, '2012', 'Started operations for Intuitive.Cloud with a small team of 6', 19, 'active', '2023-03-09 18:12:29', '2023-03-09 18:38:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accolades`
--
ALTER TABLE `accolades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accolades_details`
--
ALTER TABLE `accolades_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_access_tokens`
--
ALTER TABLE `api_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_item_id_foreign` (`item_id`);

--
-- Indexes for table `casestudy`
--
ALTER TABLE `casestudy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_translations`
--
ALTER TABLE `categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_translations_cat_id_locale_unique` (`cat_id`,`locale`),
  ADD KEY `categories_translations_locale_index` (`locale`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_detail`
--
ALTER TABLE `device_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `easier`
--
ALTER TABLE `easier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_topics`
--
ALTER TABLE `faq_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intuitive`
--
ALTER TABLE `intuitive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lifeatinstetive`
--
ALTER TABLE `lifeatinstetive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_subscribe`
--
ALTER TABLE `mail_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_detail`
--
ALTER TABLE `portfolio_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pressrelease`
--
ALTER TABLE `pressrelease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `products_translations_locale_index` (`locale`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_product_id_foreign` (`product_id`);

--
-- Indexes for table `recently_viewed_items`
--
ALTER TABLE `recently_viewed_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_user`
--
ALTER TABLE `service_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan_benefits`
--
ALTER TABLE `subscription_plan_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_groups`
--
ALTER TABLE `variation_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_group_translations`
--
ALTER TABLE `variation_group_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `variation_group_translations_variation_group_id_locale_unique` (`variation_group_id`,`locale`),
  ADD KEY `variation_group_translations_locale_index` (`locale`);

--
-- Indexes for table `variation_translations`
--
ALTER TABLE `variation_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `variation_translations_variation_id_locale_unique` (`variation_id`,`locale`),
  ADD KEY `variation_translations_locale_index` (`locale`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accolades`
--
ALTER TABLE `accolades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `accolades_details`
--
ALTER TABLE `accolades_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_access_tokens`
--
ALTER TABLE `api_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casestudy`
--
ALTER TABLE `casestudy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories_translations`
--
ALTER TABLE `categories_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_detail`
--
ALTER TABLE `device_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `easier`
--
ALTER TABLE `easier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_topics`
--
ALTER TABLE `faq_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intuitive`
--
ALTER TABLE `intuitive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leader`
--
ALTER TABLE `leader`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lifeatinstetive`
--
ALTER TABLE `lifeatinstetive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail_subscribe`
--
ALTER TABLE `mail_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portfolio_detail`
--
ALTER TABLE `portfolio_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pressrelease`
--
ALTER TABLE `pressrelease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recently_viewed_items`
--
ALTER TABLE `recently_viewed_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_user`
--
ALTER TABLE `service_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plan_benefits`
--
ALTER TABLE `subscription_plan_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variation_groups`
--
ALTER TABLE `variation_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variation_group_translations`
--
ALTER TABLE `variation_group_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variation_translations`
--
ALTER TABLE `variation_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories_translations`
--
ALTER TABLE `categories_translations`
  ADD CONSTRAINT `categories_translations_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_translations`
--
ALTER TABLE `products_translations`
  ADD CONSTRAINT `products_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variation_group_translations`
--
ALTER TABLE `variation_group_translations`
  ADD CONSTRAINT `variation_group_translations_variation_group_id_foreign` FOREIGN KEY (`variation_group_id`) REFERENCES `variation_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variation_translations`
--
ALTER TABLE `variation_translations`
  ADD CONSTRAINT `variation_translations_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
