-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 10:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_system`
--
CREATE DATABASE billing_system;
-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` longtext COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` longtext COLLATE utf8mb4_unicode_ci,
  `street_number` longtext COLLATE utf8mb4_unicode_ci,
  `tva_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` longtext COLLATE utf8mb4_unicode_ci,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_tone` enum('Tu','Vous') COLLATE utf8mb4_unicode_ci DEFAULT 'Tu',
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `postal_code`, `phone_number`, `street`, `street_number`, `tva_number`, `document_number`, `work_address`, `language`, `language_tone`, `municipality`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 'Pierrot', 'Choupay', 'choupay@gmail.com', 'lhr', '+92123132121', 'Avenue Due Gulf', '15', 'TVA BE06 88987 310 651', '1002', '[{\"id\":\"1\",\"street\":\"Avenue Reine 2\",\"street_number\":\"1234\",\"municipality\":\"Biblot 2\",\"postal_code\":\"111\",\"document_no\":\"1001\"},{\"id\":\"2\",\"street\":\"Avenue Reine 1\",\"street_number\":\"13\",\"municipality\":\"Biblot 1\",\"postal_code\":\"2113\",\"document_no\":\"1002\"}]', 'FR', 'Tu', 'Reine', 1, '2020-07-04 02:15:31', '2020-07-04 02:16:17'),
(17, 'cl', 'Client 1', 'client@gmail.com', '900', '+9219800000', 'Gali number 2 isalamabad', '3330', 'TVA BE06 88987 310 651', '1004', '[{\"id\":\"1\",\"street\":\"work 1 Gulshan eRavi\",\"street_number\":\"3800\",\"municipality\":\"work 1 city\",\"postal_code\":\"2300\",\"document_no\":\"1001\"},{\"id\":\"2\",\"street\":\"work Gulshan eRavi\",\"street_number\":\"2000\",\"municipality\":\"Gulshan city Work\",\"postal_code\":\"822\",\"document_no\":\"1002\"}]', 'EN', 'Tu', 'Islamabad city', 1, '2020-07-04 04:56:50', '2020-07-04 07:42:47'),
(18, 'Aslam', 'Raheel', 'raheelaslam548@gmail.com', '1900', '178901783', '500 GB Mamukanjan', '9000', 'TVA BE06 88987 310 651', '1007', '[{\"id\":\"1\",\"street\":\"553 Purbana chak\",\"street_number\":\"2131\",\"municipality\":\"Kamalia Pakistan\",\"postal_code\":\"9000\",\"document_no\":1008},{\"id\":\"2\",\"street\":\"550 Mohlianwala\",\"street_number\":\"29901\",\"municipality\":\"Faislabad pakistan\",\"postal_code\":\"1122\",\"document_no\":1009}]', 'FR', 'Tu', 'Faislabad', 1, '2020-07-10 20:32:59', '2020-07-10 20:32:59'),
(19, 'Ahmad', 'Mujad', 'raheelaslam1136@gmail.com', '6777777', '0432 496 770 5', 'kamlia', '234', 'TVA23232424324242', '1009', '[{\"id\":\"1\",\"street\":\"muzafar 2\",\"street_number\":\"32342\",\"municipality\":\"muzafar city\",\"postal_code\":\"1000\",\"document_no\":1010}]', 'FR', 'Tu', 'kamlia city', 1, '2020-07-31 00:55:29', '2020-07-31 00:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` int(11) NOT NULL,
  `language` enum('FR','NL','EN','') NOT NULL DEFAULT 'FR',
  `language_tone` enum('Tu','Vous','','') NOT NULL DEFAULT 'Tu',
  `message` longtext NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT 'quote',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_configurations`
--

INSERT INTO `email_configurations` (`id`, `language`, `language_tone`, `message`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'FR', 'Tu', 'Hi<br />\n<br />\nThis is Template for bill , Please find attachment<br />\n<br />\nThanks', 1, 'bill', '2020-07-17 01:54:10', '2020-07-16 20:54:10'),
(4, 'NL', 'Tu', 'dsdfdf<br />\n<br />\nsdfs', 1, 'quote', '2020-07-11 17:37:47', '2020-07-11 12:37:47'),
(5, 'EN', 'Tu', 'wewrwrww', 1, 'quote', '2020-07-11 12:38:20', '2020-07-11 12:38:20'),
(6, 'FR', 'Tu', 'Hi<br />\n<br />\nThis is Template for thank, Please find attachment<br />\n<br />\nThanks', 1, 'thank', '2020-07-17 01:54:31', '2020-07-16 20:54:31'),
(7, 'NL', 'Tu', 'sssssssssssss', 1, 'thank', '2020-07-11 17:39:08', '2020-07-11 12:39:08'),
(8, 'FR', 'Tu', 'Hi<br />\n<br />\nThis is Template for quote, Please find attachment<br />\n<br />\nThanks', 1, 'quote', '2020-07-16 20:53:47', '2020-07-16 20:53:47'),
(9, 'EN', 'Tu', 'Hi<br />\n<br />\nPlease find attach document for new bill created<br />\n<br />\nThanks', 1, 'bill', '2020-07-17 22:03:25', '2020-07-17 22:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `title`, `name`, `client_id`, `address_id`, `created_at`, `updated_at`) VALUES
(15, 'yhasdad', 'yhasdad_17_1', 17, 1, '2020-07-08 23:27:47', '2020-07-08 23:27:47'),
(16, 'other data', 'other_data_17_1', 17, 1, '2020-07-08 23:28:36', '2020-07-08 23:28:36'),
(18, 'xyz', 'xyz_17_1', 17, 1, '2020-07-09 02:21:49', '2020-07-09 02:21:49'),
(19, 'yourube', 'yourube_17_1', 17, 1, '2020-07-09 02:26:07', '2020-07-09 02:26:07'),
(21, 'nik', 'nik_17_1', 17, 1, '2020-07-09 02:27:32', '2020-07-09 02:27:32'),
(22, 'SA', 'sa_17_1', 17, 1, '2020-07-09 02:29:15', '2020-07-09 02:29:15'),
(23, 'rrrr', 'rrrr_17_1', 17, 1, '2020-07-09 02:29:40', '2020-07-09 02:29:40'),
(24, 'aeqwdsaad', 'aeqwdsaad_17_1', 17, 1, '2020-07-09 02:31:40', '2020-07-09 02:31:40'),
(25, 'asderq', 'asderq_17_1', 17, 1, '2020-07-09 02:32:55', '2020-07-09 02:32:55'),
(27, 'uoopo', 'uoopo_16_1', 16, 1, '2020-07-09 21:32:28', '2020-07-09 21:32:28'),
(32, 'yeteads', 'yeteads_17_1', 17, 1, '2020-07-10 00:05:50', '2020-07-10 00:05:50'),
(34, 'dadasdsa', 'dadasdsa_16_1', 16, 1, '2020-07-10 20:13:08', '2020-07-10 20:13:08'),
(35, 'Folder 2020', 'folder_2020_16_1', 16, 1, '2020-07-10 20:15:15', '2020-07-10 20:15:15'),
(36, 'Salle 2017', 'salle_2017_16_1', 16, 1, '2020-07-10 20:27:13', '2020-07-10 20:27:13'),
(52, 'Folder 2018', 'folder_2018_18_1', 18, 1, '2020-07-10 21:57:17', '2020-07-10 21:57:17'),
(53, 'Folder 2019', 'folder_2019_18_1', 18, 1, '2020-07-10 21:59:11', '2020-07-10 21:59:11'),
(54, 'Folder 2020', 'folder_2020_18_1', 18, 1, '2020-07-10 22:14:36', '2020-07-10 22:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` enum('image','note','','') DEFAULT NULL,
  `file` text,
  `folder_id` int(11) DEFAULT NULL,
  `note` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `type`, `file`, `folder_id`, `note`, `created_at`, `updated_at`) VALUES
(32, 'rrrr_17_1', 'image', 'xl4mp_mcb_bnk.png', 23, NULL, '2020-07-09 02:30:00', '2020-07-09 02:30:00'),
(33, 'aeqwdsaad_17_1', 'image', 'mudhb_pyyyy.png', 24, NULL, '2020-07-09 02:31:49', '2020-07-09 02:31:49'),
(35, 'asderq_17_1', 'image', 'jFluH_mcb_bnk.png', 25, NULL, '2020-07-09 02:33:10', '2020-07-09 02:33:10'),
(54, '', 'note', NULL, 25, 'asdadyyyyyyyyyyyyyyyyy', '2020-07-09 22:41:21', '2020-07-09 22:41:21'),
(55, 'Asderq_17_1', 'image', 'T1NDo_Screenshot_1.png', 25, NULL, '2020-07-09 22:41:35', '2020-07-09 22:41:35'),
(56, 'Asderq_17_1', 'image', '3CaUi_rrrr.png', 25, NULL, '2020-07-09 22:41:45', '2020-07-09 22:41:45'),
(57, '', 'note', NULL, 32, 'adadsa', '2020-07-10 00:06:54', '2020-07-10 00:06:54'),
(58, 'Yeteads_17_1', 'image', 'ohYbd_37792875_2204645863099095_3821444600405426176_n.jpg', 32, NULL, '2020-07-10 00:07:03', '2020-07-10 00:07:03'),
(59, 'Yeteads_17_1', 'image', 'CkWof_Screenshot_2.png', 32, NULL, '2020-07-10 00:07:12', '2020-07-10 00:07:12'),
(62, 'Dadasdsa_16_1', 'image', 'w1rXb_29683808_1483400025104653_3174632750855081452_n.jpg', 34, NULL, '2020-07-10 20:13:13', '2020-07-10 20:13:13'),
(64, '', 'note', NULL, 34, 'adasdads\'\n\n\n\n\n\n\nfsdfsdf', '2020-07-11 01:14:38', '2020-07-10 20:14:38'),
(65, 'Dadasdsa_16_1', 'image', 'nZeKx_lock_Account.png', 34, NULL, '2020-07-10 20:14:48', '2020-07-10 20:14:48'),
(66, 'Folder_2020_16_1', 'image', 'UxdvY_IMG-20181031-WA0000.jpg', 35, NULL, '2020-07-10 20:15:22', '2020-07-10 20:15:22'),
(67, '', 'note', NULL, 35, 'asda', '2020-07-10 20:17:59', '2020-07-10 20:17:59'),
(69, 'Folder_2020_16_1', 'image', 'mLQ5P_Screenshot_8.png', 35, NULL, '2020-07-10 20:18:11', '2020-07-10 20:18:11'),
(70, 'Salle_2017_16_1', 'image', 'nSBLz_29683808_1483400025104653_3174632750855081452_n.jpg', 36, NULL, '2020-07-10 20:27:21', '2020-07-10 20:27:21'),
(71, 'Salle_2017_16_1', 'image', 'v880d_calculation_.png', 36, NULL, '2020-07-10 20:29:28', '2020-07-10 20:29:28'),
(74, 'Other_data_17_1', 'image', 'AK0kk_Screenshot_20200706-204821.png', 16, NULL, '2020-07-10 21:15:57', '2020-07-10 21:15:57'),
(110, 'Folder_2018_18_1', 'image', 'Tx8Ba_arrow_btn.png', 52, NULL, '2020-07-10 21:57:23', '2020-07-10 21:57:23'),
(112, 'Folder_2018_18_1', 'image', 'D6App_added.png', 52, NULL, '2020-07-10 21:57:40', '2020-07-10 21:57:40'),
(113, '', 'note', NULL, 52, 'You should now be viewing your app on your mobile device. Set it up right next to your main monitor, because it will reload every time your localhost reloads, so it will be perfectly in sync with the locally served desktop web application.\n\nYou should now be viewing your app on your mobile device. Set it up right next to your main monitor, because it will reload every time your localhost reloads, so it will be perfectly in sync with the locally served desktop web application.\n\nYou should now be viewing your app on your mobile device. Set it up right next to your main monitor, because it will reload every time your localhost reloads, so it will be perfectly in sync with the locally served desktop web application.\nYou should now be viewing your app on your mobile device. Set it up right next to your main monitor, because it will reload every time your localhost reloads, so it will be perfectly in sync with the locally served desktop web application.\n\n\nYou should now be viewing your app on your mobile device. Set it up right next to your main monitor, because it will reload every time your localhost reloads, so it will be perfectly in sync with the locally served desktop web application.', '2020-07-10 21:57:54', '2020-07-10 21:57:54'),
(114, 'Folder_2018_18_1', 'image', 'lmO5R_lock_Account.png', 52, NULL, '2020-07-10 21:58:00', '2020-07-10 21:58:00'),
(115, '', 'note', NULL, 52, 'other note update other note update \nother note update \nother note update \nother note update \nother note update other note update \nother note update \nother note update \nother note update \nother note update other note update \nother note update \nother note update \nother note update \nother note update other note update \nother note update \nother note update \nother note update', '2020-07-11 02:58:50', '2020-07-10 21:58:50'),
(116, '', 'note', NULL, 53, '2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes \n2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes \n\n2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes \n2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes 2019 notes', '2020-07-10 21:59:30', '2020-07-10 21:59:30'),
(121, '', 'note', NULL, 54, 'Test notes Here', '2020-07-10 22:14:50', '2020-07-10 22:14:50'),
(122, 'Folder_2020_18_1', 'image', '8H4u1_add_q.png', 54, NULL, '2020-07-10 22:15:06', '2020-07-10 22:15:06'),
(125, 'Folder_2020_18_1', 'image', 'hyZhq_15944377699497664946483356252652.jpg', 54, NULL, '2020-07-10 22:22:58', '2020-07-10 22:22:58'),
(126, 'Folder_2020_18_1', 'image', 'v5NK3_15944377972877144888553149303105.jpg', 54, NULL, '2020-07-10 22:23:27', '2020-07-10 22:23:27');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_10_29_055955_create_categories_table', 1),
(9, '2019_10_29_103034_create_admins_table', 1),
(10, '2019_10_29_103035_create_admin_password_resets_table', 1),
(11, '2019_11_05_050712_create_settings_table', 1),
(12, '2019_11_12_073124_add_avatar_and_active_and_activation_token_to_users', 1),
(13, '2019_11_29_050240_create_countries_table', 1),
(14, '2019_12_05_101142_create_permission_tables', 1),
(15, '2020_06_19_023132_create_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(200) DEFAULT NULL,
  `address` longtext,
  `postal_code` varchar(300) DEFAULT NULL,
  `tva_number` varchar(200) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `concern` varchar(200) DEFAULT NULL,
  `concern_address` varchar(500) DEFAULT NULL,
  `document_number` int(200) NOT NULL DEFAULT '0',
  `calculation_quote` longtext,
  `total` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) NOT NULL DEFAULT '0',
  `total_tva` varchar(200) NOT NULL DEFAULT '0',
  `language` varchar(100) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `language_tone` enum('Tu','Vous','','') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('quote','bill','thanks','') NOT NULL DEFAULT 'quote',
  `status` enum('paid','unpaid','') DEFAULT 'unpaid',
  `is_send` tinyint(4) NOT NULL DEFAULT '0',
  `is_final_review_bill` tinyint(4) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name`, `email`, `phone_number`, `address`, `postal_code`, `tva_number`, `tax`, `concern`, `concern_address`, `document_number`, `calculation_quote`, `total`, `total_amount`, `total_tva`, `language`, `file`, `language_tone`, `user_id`, `client_id`, `address_id`, `type`, `status`, `is_send`, `is_final_review_bill`, `date`, `created_at`, `updated_at`) VALUES
(24, 'Client 1 cl', 'client@gmail.com', NULL, 'Gali number 2 isalamabad', 'Islamabad city', 'TVA BE06 88987 310 651', '21', 'Chaudiere', 'work Gulshan eRavi 2000', 1006, '[{\"quantity\":\"6\",\"description\":\"Remplacement de trois armories\",\"unit_price\":\"15.80\",\"total\":\"114.70800000000001\"}]', '114.70800000000001', '138.80', '24.09', NULL, NULL, NULL, 1, 17, 0, 'quote', 'unpaid', 0, 0, NULL, '2020-07-04 05:09:52', '2020-07-31 01:01:26'),
(25, 'bill name', 'bill@gmail.com', NULL, 'karachi pakistan', '3000', 'TVA1231321', '6', 'Chaudiere', NULL, 1007, '[{\"quantity\":\"2\",\"description\":\"Bill check param Bill check param Bill check param Bill check param Bill check param\",\"unit_price\":\"15.80\",\"total\":\"33.496\"}]', '33.496', '0', '0', 'FR', NULL, 'Tu', 1, 0, 0, 'quote', 'unpaid', 1, 0, NULL, '2020-04-07 06:28:32', '2020-07-16 20:50:27'),
(26, 'Raheel Aslam', 'raheelaslam548@gmail.com', NULL, '500 GB Mamukanjan', 'Faislabad', 'TVA BE06 88987 310 651', '6', 'update quote concern', '550 Mohlianwala 29901', 1009, '[{\"quantity\":\"8\",\"description\":\"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum\",\"unit_price\":\"3.9\",\"total\":\"33.072\"},{\"quantity\":\"5\",\"description\":\"Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description\\nloe madsa  ads asda  sadad\\nads  as dad asd\\nasdas\",\"unit_price\":\"16.5\",\"total\":\"87.45\"}]', '120.522', '127.75', '7.23', 'FR', 'Devis_update_quote_concern_1595391003.pdf', 'Tu', 1, 18, 2, 'quote', 'paid', 1, 1, NULL, '2020-02-03 22:35:40', '2020-07-21 23:10:04'),
(27, 'Client 1 cl', 'client@gmail.com', NULL, 'Gali number 2 isalamabad', 'Islamabad city', 'TVA BE06 88987 310 651', '0', 'cccc', 'work Gulshan eRavi 2000', 1002, '[{\"quantity\":\"2\",\"description\":\"deewqeq\",\"unit_price\":\"23\",\"total\":\"46\"}]', '46', '46.00', '0.00', 'EN', 'Devis_cccc_1595265513.pdf', 'Tu', 1, 17, 2, 'quote', 'paid', 1, 1, NULL, '2020-05-31 22:35:55', '2020-07-20 12:18:35'),
(28, 'Client 1 cl', 'client@gmail.com', NULL, 'Gali number 2 isalamabad', 'Islamabad city', 'TVA BE06 88987 310 651', '0', 'concern field', 'work 1 Gulshan eRavi 3800', 1001, '[{\"quantity\":\"2\",\"description\":\"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum\",\"unit_price\":\"12\",\"total\":\"24\"}]', '24', '24.00', '0.00', 'EN', 'Devis_concern_field_1596351084.pdf', 'Tu', 1, 17, 1, 'quote', 'paid', 1, 1, NULL, '2019-02-05 22:36:29', '2020-08-02 01:51:26'),
(29, 'Mujad Ahmad', 'raheelaslam1136@gmail.com', NULL, 'kamlia', 'kamlia city', 'TVA23232424324242', '0', 'mujad', 'muzafar 2 32342', 1010, '[{\"quantity\":\"6\",\"description\":\"lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum\",\"unit_price\":\"120\",\"total\":\"720\"},{\"quantity\":\"2\",\"description\":\"lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum\",\"unit_price\":\"12.05\",\"total\":\"24.1\"}]', '744.1', '744.10', '0.00', 'FR', 'Facture_mujad_1596177267.pdf', 'Tu', 1, 19, 1, 'quote', 'paid', 1, 1, NULL, '2020-07-30 22:12:17', '2020-07-31 01:35:29'),
(30, 'Gulbadin', 'raheelaslam548@gmail.com', NULL, 'Ahmad', '9008', 'TVA1232123', '0', 'gulbadin', NULL, 1011, '[{\"quantity\":\"4\",\"description\":\"Lorem ipsum Lorem ipsum Lorem ipsum\",\"unit_price\":\"159\",\"total\":\"636\"}]', '636', '636.00', '0.00', 'FR', 'Devis_gulbadin_1596174564.pdf', 'Tu', 1, 0, 0, 'quote', 'unpaid', 0, 0, NULL, '2020-06-09 00:49:31', '2020-07-31 00:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_key`, `setting_type`, `created_at`, `updated_at`, `file`, `value`) VALUES
(1, '', 'logo', 'image', NULL, '2020-07-18 22:31:10', 'vwGD6_jkweb_gall_4.png', NULL),
(2, '', 'contact_image', 'image', NULL, '2020-07-18 22:29:55', 'uR43K_gIekl_contact_page_background.png', NULL),
(3, '', 'home_image', 'image', NULL, '2020-08-02 01:49:33', 'mKoE2_download.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_document`
--

CREATE TABLE `tmp_document` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) DEFAULT NULL,
  `document_number` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_document`
--

INSERT INTO `tmp_document` (`id`, `quote_id`, `document_number`) VALUES
(30, 1, '1001'),
(31, 2, '1007'),
(32, 1, '1008'),
(33, 2, '1009'),
(34, 1, '1010');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bic` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` longtext COLLATE utf8mb4_unicode_ci,
  `street_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `recipient_email`, `address`, `bank_account`, `bic`, `tva_number`, `street`, `street_number`, `municipality`, `postal_code`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `active`, `activation_token`) VALUES
(1, 'Jeam-Daniel Goblet', 'goblet.jeandaniel@gmail.com', 'raheelaslam1136@gmail.com', 'Rue: Rue de Genleau\nNimero: 10\nCode Postal: 1380\nMunicipalite: Lasne', '0032 496 770 7769', 'BWT2423424T', 'BE-0763 783 788', 'Rue de Genleau', '77', 'Lasne', '1380', '0032 496 770 50', NULL, '$2y$10$IH6uJ2NVTNMdt9JbqOKUwuKAckFQOYvRsvSnRiAquhGdjhqL0jpLS', NULL, '2020-06-14 02:04:28', '2020-07-05 22:25:44', 'avatar.png', 0, '');

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
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_document`
--
ALTER TABLE `tmp_document`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmp_document`
--
ALTER TABLE `tmp_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
