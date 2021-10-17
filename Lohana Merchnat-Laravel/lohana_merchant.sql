-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 07:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lohana_merchant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$W769MkEVG1f1Sg8cHX/HNOa07Ajc6h.VVaugu3q67WDealbJeLq7q', 'dqjsDZJjlsbmuUBwHZztG2K6dmX6orpYYAlF6u9J0icNdQtSTwqgInOkilru', NULL, '2021-06-30 06:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertise_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertise_id`, `user_id`, `business_name`, `address`, `person_name`, `business_card`, `city`, `state`, `country`, `mobileno`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Test', 'sdfdfd', 'Dummy', 'card_60d02b2e54dd2.jpg', '19', '19', '2', '9558174509', 1, '2021-06-21 00:31:18', '2021-07-06 05:40:03'),
(2, 4, 'test_data', 'dfdfdf', 'test_person', 'card_60d06450861f7.jpg', '13', '13', '2', '9558174509', 1, '2021-06-21 04:35:04', '2021-07-05 05:16:42'),
(3, 4, 'xcxx', 'vxvxv', 'xvxv', 'card_60d069ba7b837.jpg', '14', '14', '2', '9558174509', 1, '2021-06-21 04:58:10', '2021-07-08 07:18:44'),
(4, 4, 'asasas', 'asaaaaaaaaaaaa', 'aas', 'card_60e2da46477a4.png', '11', '11', '2', '8767898765', 1, '2021-07-05 04:39:10', '2021-07-05 05:16:45'),
(5, 4, 'test', 'test', 'test', 'card_60e2e3404f264.jpg', '17', '17', '2', '9558174509', 1, '2021-07-05 05:17:28', '2021-07-05 05:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Accountant', '2021-06-04 11:27:38', '2021-06-04 11:27:38'),
(3, 'Advertising Agency', '2021-06-04 11:30:09', '2021-06-04 11:30:09'),
(4, 'Architects, Astrology & Vastu', '2021-06-04 11:30:35', '2021-06-04 11:30:35'),
(5, 'Autocare', '2021-06-04 11:31:09', '2021-06-04 11:31:09'),
(6, 'Baby Care', '2021-06-04 11:31:22', '2021-06-07 12:02:49'),
(7, 'Banquets', '2021-06-05 10:44:11', '2021-06-07 11:13:54'),
(8, 'Beauty Parlor', '2021-06-07 11:04:41', '2021-06-07 11:04:41'),
(9, 'Caterers', '2021-06-07 11:04:49', '2021-06-07 11:04:49'),
(10, 'Charted Accountant', '2021-06-07 11:04:56', '2021-06-07 11:04:56'),
(11, 'Computer Dealers', '2021-06-07 11:05:05', '2021-06-07 11:05:05'),
(12, 'Contractor', '2021-06-07 11:05:11', '2021-06-07 11:05:11'),
(13, 'Courier', '2021-06-07 11:05:18', '2021-06-07 11:05:18'),
(14, 'Dance Classes', '2021-06-07 11:05:27', '2021-06-07 11:05:27'),
(15, 'Doctors/Hospitals', '2021-06-07 11:05:34', '2021-06-07 11:05:34'),
(16, 'Education', '2021-06-07 11:05:42', '2021-06-07 11:05:42'),
(17, 'Event Organizer', '2021-06-07 11:05:51', '2021-06-07 11:05:51'),
(18, 'Fitness', '2021-06-07 11:06:04', '2021-06-07 11:06:04'),
(19, 'Flower/Florists', '2021-06-07 11:06:16', '2021-06-07 11:06:28'),
(20, 'Graphic Designing/Printing', '2021-06-07 11:06:40', '2021-06-07 11:06:40'),
(21, 'Heath Care & Nutrition', '2021-06-07 11:06:48', '2021-06-07 11:06:48'),
(22, 'Home Décor', '2021-06-07 11:06:59', '2021-06-07 11:06:59'),
(23, 'Home Furnishing', '2021-06-07 11:07:10', '2021-06-07 11:07:10'),
(24, 'Home Improvements', '2021-06-07 11:07:16', '2021-06-07 11:07:16'),
(25, 'Household Items', '2021-06-07 11:07:26', '2021-06-07 11:07:26'),
(26, 'Housekeeping', '2021-06-07 11:07:33', '2021-06-07 11:07:33'),
(27, 'Industrial Products', '2021-06-07 11:07:45', '2021-06-07 11:07:45'),
(28, 'Information Technology', '2021-06-07 11:07:53', '2021-06-07 11:07:53'),
(29, 'Internet', '2021-06-07 11:08:00', '2021-06-07 11:08:00'),
(30, 'Iron/Steel Merchant', '2021-06-07 11:08:08', '2021-06-07 11:08:08'),
(31, 'Jewellery', '2021-06-07 11:10:47', '2021-06-07 11:10:47'),
(32, 'Loans', '2021-06-07 11:10:54', '2021-06-07 11:10:54'),
(33, 'Machinery Tools & parts Supplier', '2021-06-07 11:11:05', '2021-06-07 11:11:05'),
(34, 'Music Classes', '2021-06-07 11:11:12', '2021-06-07 11:11:12'),
(35, 'On Demand Services', '2021-06-07 11:11:19', '2021-06-07 11:11:19'),
(36, 'Packers & Movers', '2021-06-07 11:11:25', '2021-06-07 11:11:25'),
(37, 'Personal Care', '2021-06-07 11:11:33', '2021-06-07 11:11:33'),
(38, 'Pest Control', '2021-06-07 11:11:45', '2021-06-07 11:11:45'),
(39, 'Pet', '2021-06-07 11:11:52', '2021-06-07 11:11:52'),
(40, 'Play School', '2021-06-07 11:12:03', '2021-06-07 11:12:03'),
(41, 'Repairs', '2021-06-07 11:12:12', '2021-06-07 11:12:12'),
(42, 'Restaurant', '2021-06-07 11:12:18', '2021-06-07 11:12:18'),
(43, 'Security Services', '2021-06-07 11:12:25', '2021-06-07 11:12:25'),
(44, 'Sports Coach/Goods', '2021-06-07 11:12:36', '2021-06-07 11:12:36'),
(45, 'Tax Consultant', '2021-06-07 11:12:46', '2021-06-07 11:12:46'),
(46, 'Training Institute', '2021-06-07 11:12:54', '2021-06-07 11:12:54'),
(47, 'Transporters', '2021-06-07 11:13:00', '2021-06-07 11:13:00'),
(48, 'Two/Three/Four Wheeler Dealer', '2021-06-07 11:13:12', '2021-06-07 11:13:12'),
(49, 'Two/Three/Four Wheeler Service', '2021-06-07 11:13:20', '2021-06-07 11:13:20'),
(50, 'Others', '2021-06-07 11:13:25', '2021-06-07 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`, `created_at`, `updated_at`) VALUES
(2, 'Amaravati', 1, '2021-06-04 00:44:42', '2021-06-07 10:48:01'),
(4, 'Itanagar', 3, '2021-06-04 01:38:59', '2021-06-07 10:49:23'),
(5, 'Dispur', 4, '2021-06-05 10:29:23', '2021-06-07 10:49:40'),
(6, 'Patna', 5, '2021-06-05 10:30:17', '2021-06-07 10:49:52'),
(7, 'Raipur', 7, '2021-06-07 10:50:12', '2021-06-07 10:50:12'),
(8, 'Panaji', 8, '2021-06-07 10:50:22', '2021-06-07 10:50:22'),
(9, 'Gandhinagar', 9, '2021-06-07 10:50:32', '2021-06-07 10:50:32'),
(10, 'Chandigarh', 10, '2021-06-07 10:50:41', '2021-06-07 10:50:41'),
(11, 'Shimla', 11, '2021-06-07 10:50:50', '2021-06-07 10:50:50'),
(12, 'Ranchi', 12, '2021-06-07 10:50:59', '2021-06-07 10:50:59'),
(13, 'Bangalore', 13, '2021-06-07 10:51:12', '2021-06-07 10:51:12'),
(14, 'Thiruvananthapuram', 14, '2021-06-07 10:51:20', '2021-06-07 10:51:20'),
(15, 'Bhopal', 15, '2021-06-07 10:51:28', '2021-06-07 10:51:28'),
(16, 'Mumbai', 16, '2021-06-07 10:51:36', '2021-06-07 10:51:36'),
(17, 'Imphal', 17, '2021-06-07 10:51:47', '2021-06-07 10:51:47'),
(18, 'Shillong', 18, '2021-06-07 10:52:05', '2021-06-07 10:52:05'),
(19, 'Aizawl', 19, '2021-06-07 10:52:18', '2021-06-07 10:52:18'),
(20, 'Kohima', 20, '2021-06-07 10:52:29', '2021-06-07 10:52:29'),
(21, 'Bhubaneshwar', 21, '2021-06-07 10:52:41', '2021-06-07 10:52:41'),
(22, 'Chandigarh', 22, '2021-06-07 10:52:54', '2021-06-07 10:52:54'),
(23, 'Jaipur', 23, '2021-06-07 10:53:03', '2021-06-07 10:53:03'),
(24, 'Gangtok', 24, '2021-06-07 10:53:15', '2021-06-07 10:53:15'),
(25, 'Chennai', 25, '2021-06-07 10:53:27', '2021-06-07 10:53:27'),
(26, 'Hyderabad', 26, '2021-06-07 10:53:37', '2021-06-07 10:53:37'),
(27, 'Agartala', 27, '2021-06-07 10:53:45', '2021-06-07 10:53:45'),
(28, 'Dehradun', 28, '2021-06-07 10:53:55', '2021-06-07 10:53:55'),
(29, 'Lucknow', 29, '2021-06-07 10:54:12', '2021-06-07 10:54:12'),
(30, 'Kolkata', 30, '2021-06-07 10:54:20', '2021-06-07 10:54:20'),
(31, 'Port Blair', 31, '2021-06-07 10:54:31', '2021-06-07 10:54:31'),
(32, 'Chandigarh', 32, '2021-06-07 10:54:41', '2021-06-07 10:54:41'),
(33, 'Daman', 33, '2021-06-07 10:54:51', '2021-06-07 10:54:51'),
(34, 'Delhi', 34, '2021-06-07 10:55:00', '2021-06-07 10:55:00'),
(35, 'Srinagar-S*', 35, '2021-06-07 10:55:25', '2021-06-07 10:55:25'),
(36, 'Jammu-W*', 35, '2021-06-07 10:55:35', '2021-06-07 10:55:35'),
(37, 'Leh', 36, '2021-06-07 10:55:43', '2021-06-07 10:55:43'),
(38, 'Kavaratti', 37, '2021-06-07 10:55:52', '2021-06-07 10:55:52'),
(39, 'Puducherry', 38, '2021-06-07 10:56:31', '2021-06-07 10:56:31'),
(40, 'Ahmedabad', 9, '2021-06-07 10:58:03', '2021-06-07 10:58:03'),
(41, 'Surat', 9, '2021-06-07 10:58:13', '2021-06-07 10:58:13'),
(42, 'Vadodara', 9, '2021-06-07 10:58:21', '2021-06-07 10:58:21'),
(43, 'Rajkot', 9, '2021-06-07 10:58:28', '2021-06-07 10:58:28'),
(44, 'Bhavnagar', 9, '2021-06-07 10:58:37', '2021-06-07 10:58:37'),
(45, 'Jamnagar', 9, '2021-06-07 10:58:47', '2021-06-07 10:58:47'),
(46, 'Junagadh', 9, '2021-06-07 10:58:56', '2021-06-07 10:58:56'),
(47, 'Gandhidham', 9, '2021-06-07 10:59:18', '2021-06-07 10:59:18'),
(48, 'Anand', 9, '2021-06-07 10:59:55', '2021-06-07 10:59:55'),
(49, 'Navsari', 9, '2021-06-07 11:00:07', '2021-06-07 11:00:07'),
(50, 'Morbi', 9, '2021-06-07 11:00:14', '2021-06-07 11:00:14'),
(51, 'Nadiad', 9, '2021-06-07 11:00:21', '2021-06-07 11:00:21'),
(52, 'Surendranagar', 9, '2021-06-07 11:00:29', '2021-06-07 11:00:29'),
(53, 'Bharuch', 9, '2021-06-07 11:00:40', '2021-06-07 11:00:40'),
(54, 'Mehsana', 9, '2021-06-07 11:00:55', '2021-06-07 11:00:55'),
(55, 'Bhuj', 9, '2021-06-07 11:01:03', '2021-06-07 11:01:03'),
(56, 'Porbandar', 9, '2021-06-07 11:01:10', '2021-06-07 11:01:10'),
(57, 'Palanpur', 9, '2021-06-07 11:01:20', '2021-06-07 11:01:20'),
(58, 'Valsad', 9, '2021-06-07 11:01:30', '2021-06-07 11:01:30'),
(59, 'Vapi', 9, '2021-06-07 11:01:37', '2021-06-07 11:01:37'),
(60, 'Gondal', 9, '2021-06-07 11:01:45', '2021-06-07 11:01:45'),
(61, 'Veraval', 9, '2021-06-07 11:01:54', '2021-06-07 11:01:54'),
(62, 'Godhara', 9, '2021-06-07 11:02:02', '2021-06-07 11:02:02'),
(63, 'Patan', 9, '2021-06-07 11:02:09', '2021-06-07 11:02:09'),
(64, 'Kalol', 9, '2021-06-07 11:02:26', '2021-06-07 11:02:26'),
(65, 'Dahod', 9, '2021-06-07 11:02:43', '2021-06-07 11:02:43'),
(66, 'Botad', 9, '2021-06-07 11:02:53', '2021-06-07 11:02:53'),
(67, 'Amreli', 9, '2021-06-07 11:03:01', '2021-06-07 11:03:01'),
(68, 'Deesa', 9, '2021-06-07 11:03:09', '2021-06-07 11:03:09'),
(69, 'Jetpur', 9, '2021-06-07 11:03:18', '2021-06-07 11:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `created_at`, `updated_at`) VALUES
(2, 'India', '2021-06-01 11:12:59', '2021-06-02 07:51:13'),
(3, 'Africa', '2021-06-01 12:31:49', '2021-06-01 12:31:49'),
(4, 'Canada', '2021-06-02 03:04:43', '2021-06-02 03:04:43'),
(5, 'Australia', '2021-06-02 03:09:02', '2021-06-02 03:09:02'),
(7, 'USA', '2021-06-27 05:58:13', '2021-06-27 05:58:13');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_31_172413_create_countries_table', 2),
(4, '2021_06_02_075305_create_states_table', 3),
(5, '2021_06_03_123331_create_admins_table', 4),
(6, '2021_06_03_164243_create_cities_table', 5),
(7, '2021_06_04_160032_create_business_categories_table', 6),
(9, '2021_06_09_125705_add_fields_to_users_table', 7),
(10, '2021_06_12_165703_create_registered_business_table', 8),
(11, '2021_06_21_050812_CreateAdvertisementTable', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$oQfIevzGwM4KgqaO5J.rauyMTA3/1KoUPkP4ngCCWmbVZOnZ/Dmw2', '2021-06-04 07:06:48'),
('manalikotadiya123@gmal.com', '$2y$10$nyBpF1Z2ueKR45qszZDgBOhltzinP6A6kwYUIE1xe19ihtT6cfgFe', '2021-06-30 06:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `registered_business`
--

CREATE TABLE `registered_business` (
  `business_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `business_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_establishment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_business` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_business`
--

INSERT INTO `registered_business` (`business_id`, `user_id`, `business_card`, `business_title`, `contact_person`, `address`, `city`, `state`, `country`, `business_category`, `business_type`, `mode_of_payment`, `year_of_establishment`, `specialist_in`, `about_business`, `website`, `email`, `mobileno`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'card_60d8acd4b5a46.jpg', 'test Title', 'Aman', 'rajkot,gujrat', '7', '7', '2', '2', 'office', 'Cash,Cheque', '2', 'Lorem Ipsum dummy content', 'Lorem Ipsum dummy content', 'https://laravel.com/', 'xc111@gmail.com', '9558174509', 1, '2021-06-27 11:22:36', '2021-07-08 07:54:20'),
(2, 4, 'card_60d8ad0bce6cc.png', 'Dummy', 'Dummy person', 'Lorem ipsum Dummy content', '17', '17', '2', '17', 'showroom', 'Cash,Cheque', '2', 'adsdsdsd', 'sdsdsdsd', 'https://laravel.com/', 'vv123@gmail.com', '9558174509', 0, '2021-06-27 11:23:31', '2021-06-29 05:53:56'),
(3, 4, 'card_60db021e1f286.jpg', 'Dummy_text', 'dummy', 'lorem ipsum dummy text', '14', '14', '2', '3', 'office', 'Cash,Cheque,Credit/Debit Card', '3', 'Lorem Ipsum dummy content', 'Lorem Ipsum dummy content', 'https://laravel.com/', 'bnbn@gmail.com', '9558174509', 1, '2021-06-29 05:51:02', '2021-06-29 05:53:38'),
(4, 4, 'card_60db03a3164a6.jpg', 'Dummy', 'test', 'sdfdvxcvc', '20', '20', '2', '16', 'office', 'Cheque,Credit/Debit Card', '3', 'Lorem Ipsum dummy content', 'sfdfdvcxv', 'https://laravel.com/', 'bnbn@gmail.com', '9876543234', 1, '2021-06-29 05:57:31', '2021-06-29 06:47:44'),
(5, 4, 'card_60db04c86d029.png', 'test', 'dummy', 'adddddd', '7', '7', '2', '20', 'office', 'Cheque', '2', 'Lorem Ipsum dummy content', 'xcxsxfdfdfdf', 'https://laravel.com/', 'vv123@gmail.com', '9876543234', 1, '2021-06-29 06:02:24', '2021-06-29 06:47:43'),
(6, 4, 'card_60db067f83f74.png', 'asasa', 'aaaaa', 'xcvvvvvvvvv', '14', '14', '2', '7', 'office', 'Cheque,Credit/Debit Card', '2', 'dvdfvdfvdvdvdv', 'xc vvc', 'https://laravel.com/', 'bnbn@gmail.com', '8767898765', 1, '2021-06-29 06:09:43', '2021-06-29 06:47:43'),
(7, 4, 'card_60db0931ae0e5.png', 'test Title', 'dummy', 'saxdadad', '6', '5', '2', '16', 'office', 'Cash,Cheque', '3', 'Lorem Ipsum dummy content', 'ghghhgh', 'https://laravel.com/', 'xc111@gmail.com', '8767898765', 1, '2021-06-29 06:21:13', '2021-06-29 06:47:42'),
(8, 4, 'card_60db0bfc43f5e.jpg', 'asasa', 'aaaaa', 'dscxvxcvcv', '5', '4', '2', '16', 'office', 'Cheque', '2', 'sdsdsd', 'fdffffffffffffff', 'https://laravel.com/', 'xc111@gmail.com', '9558174509', 0, '2021-06-29 06:33:08', '2021-06-29 06:33:08'),
(9, 4, 'card_60db0e3b610cc.png', 'asasa', 'aaaaa', 'xccxcc', '15', '15', '2', '20', 'hospital', 'Cash,Cheque', '3', 'cxcxcx', 'xcxcxc', 'https://laravel.com/', 'vv123@gmail.com', '9876543234', 0, '2021-06-29 06:42:43', '2021-06-29 06:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `country_id`, `created_at`, `updated_at`) VALUES
(3, 'Arunachal Pradesh', 2, '2021-06-03 11:09:37', '2021-06-07 10:40:43'),
(4, 'Assam', 2, '2021-06-05 05:40:33', '2021-06-07 10:40:53'),
(5, 'Bihar', 2, '2021-06-05 06:24:06', '2021-06-07 10:41:06'),
(7, 'Chhattisgarh', 2, '2021-06-07 10:41:23', '2021-06-07 10:41:23'),
(8, 'Goa', 2, '2021-06-07 10:41:31', '2021-06-07 10:41:31'),
(9, 'Gujarat', 2, '2021-06-07 10:41:38', '2021-06-07 10:41:38'),
(10, 'Haryana', 2, '2021-06-07 10:41:46', '2021-06-07 10:41:46'),
(11, 'Himachal Pradesh', 2, '2021-06-07 10:41:57', '2021-06-07 10:41:57'),
(12, 'Jharkhand', 2, '2021-06-07 10:42:06', '2021-06-07 10:42:06'),
(13, 'Karnataka', 2, '2021-06-07 10:42:12', '2021-06-07 10:42:12'),
(14, 'Kerala', 2, '2021-06-07 10:42:19', '2021-06-07 10:42:19'),
(15, 'Madhya Pradesh', 2, '2021-06-07 10:42:36', '2021-06-07 10:42:36'),
(16, 'Maharashtra', 2, '2021-06-07 10:42:50', '2021-06-07 10:42:50'),
(17, 'Manipur', 2, '2021-06-07 10:43:02', '2021-06-07 10:43:02'),
(18, 'Meghalaya', 2, '2021-06-07 10:43:16', '2021-06-07 10:43:16'),
(19, 'Mizoram', 2, '2021-06-07 10:43:35', '2021-06-07 10:43:35'),
(20, 'Nagaland', 2, '2021-06-07 10:43:42', '2021-06-07 10:43:42'),
(21, 'Odisha', 2, '2021-06-07 10:43:50', '2021-06-07 10:43:50'),
(22, 'Punjab', 2, '2021-06-07 10:43:56', '2021-06-07 10:43:56'),
(23, 'Rajasthan', 2, '2021-06-07 10:44:06', '2021-06-07 10:44:06'),
(24, 'Sikkim', 2, '2021-06-07 10:44:13', '2021-06-07 10:44:13'),
(25, 'Tamil Nadu', 2, '2021-06-07 10:44:21', '2021-06-07 10:44:21'),
(26, 'Telangana', 2, '2021-06-07 10:44:28', '2021-06-07 10:44:28'),
(27, 'Tripura', 2, '2021-06-07 10:44:42', '2021-06-07 10:44:42'),
(28, 'Uttarakhand', 2, '2021-06-07 10:44:46', '2021-06-07 10:44:46'),
(29, 'Uttar Pradesh', 2, '2021-06-07 10:44:54', '2021-06-07 10:44:54'),
(30, 'West Bengal', 2, '2021-06-07 10:45:06', '2021-06-07 10:45:06'),
(31, 'Andaman and Nicobar Islands', 2, '2021-06-07 10:45:20', '2021-06-07 10:45:20'),
(32, 'Chandigarh', 2, '2021-06-07 10:45:27', '2021-06-07 10:45:27'),
(33, 'Dadra and Nagar Haveli and Daman & Diu', 2, '2021-06-07 10:45:51', '2021-06-07 10:45:51'),
(34, 'The Government of NCT of Delhi', 2, '2021-06-07 10:45:59', '2021-06-07 10:45:59'),
(35, 'Jammu & Kashmir', 2, '2021-06-07 10:46:12', '2021-06-07 10:46:12'),
(36, 'Ladakh', 2, '2021-06-07 10:46:19', '2021-06-07 10:46:19'),
(37, 'Lakshadweep', 2, '2021-06-07 10:46:31', '2021-06-07 10:46:31'),
(38, 'Puducherry', 2, '2021-06-07 10:46:36', '2021-06-07 10:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `birthdate`, `mobileno`, `gender`, `email`, `country`, `state`, `city`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'dummy data', '2021-06-06', '9876543234', 'female', 'xc111@gmail.com', '2', '8', '8', '$2y$10$Zg9IFuXqCKvKplQMcB0cAe6o5sTaMvmIxq9hL4iashZhCmKF4GX9m', NULL, '2021-06-11 06:18:54', '2021-06-11 06:18:54'),
(4, 'manali kotadiya', '1997-06-07', '9558174509', 'female', 'manalikotadiya123@gmail.com', '2', '20', '20', '$2y$10$2J9mM8u./J5bP3MCl6gjgeZO3a0psGMbafniUsP4pxAmRQwwlOnpG', 'ePtktGnu0m7XCaY31mygxpDgtoypMSQ5LSlTnfhxzACKk2EDopJCiIBSlw85', '2021-06-19 07:44:47', '2021-06-30 06:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

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
-- Indexes for table `registered_business`
--
ALTER TABLE `registered_business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertise_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registered_business`
--
ALTER TABLE `registered_business`
  MODIFY `business_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
