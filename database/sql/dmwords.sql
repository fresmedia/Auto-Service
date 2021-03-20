-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2021 at 05:34 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dmwords`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=active, 0=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `advertiser_name`, `title`, `url`, `slug`, `image`, `description`, `status`, `start_date`, `expiry_date`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(2, 'NA', 'Sample Advertisement', 'http://iapps-demo.devsenv.com/', 'sampleadvertisement', '-1615740495-banner.jpeg', NULL, 1, '2021-03-14', '2021-03-31', NULL, 1, NULL, NULL, '2021-03-14 10:48:15', '2021-03-14 10:48:15'),
(3, 'NA', 'Sample Advertisement2', 'http://iapps-demo.devsenv.com/', 'sampleadvertisement2', '-1615749686-banner.jpeg', NULL, 1, '2021-03-01', '2021-03-31', NULL, 1, NULL, NULL, '2021-03-14 13:21:26', '2021-03-14 13:30:13'),
(4, 'Sample User', 'Sample Final', 'http://iapps-demo.devsenv.com/', 'samplefinal', NULL, NULL, 1, '2021-03-09', '2021-03-17', NULL, 1, NULL, NULL, '2021-03-14 13:31:07', '2021-03-15 11:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `article_types`
--

CREATE TABLE `article_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if category is parent, else parent id',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `enable_bg` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>active, 0=>inactive',
  `bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FFFFFF',
  `text_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000000',
  `priority` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `logo_image`, `description`, `meta_description`, `parent_category_id`, `status`, `enable_bg`, `bg_color`, `text_color`, `priority`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(2, 'Education', 'education', NULL, NULL, NULL, NULL, NULL, 1, 1, '198754', 'FFFFFF', 2, NULL, 1, 1, NULL, '2021-03-04 12:03:12', '2021-03-07 04:23:58'),
(3, 'Greetings', 'greetings', NULL, NULL, NULL, NULL, 2, 1, 0, 'FFFFFF', '000000', 2, NULL, 1, 1, NULL, '2021-03-04 12:03:39', '2021-03-07 01:56:04'),
(4, 'School', 'school', NULL, NULL, NULL, NULL, 2, 1, 0, 'FFFFFF', '000000', 3, NULL, 1, 1, NULL, '2021-03-04 12:03:52', '2021-03-07 01:57:15'),
(5, 'Technology', 'technology', NULL, NULL, NULL, NULL, 2, 1, 0, 'FFFFFF', '000000', 4, NULL, 1, 1, NULL, '2021-03-04 12:04:13', '2021-03-07 01:56:44'),
(6, 'Applications', 'applications', NULL, NULL, NULL, NULL, 2, 1, 0, 'FFFFFF', '000000', 5, NULL, 1, 1, NULL, '2021-03-04 12:04:28', '2021-03-07 01:55:52'),
(7, 'Shops', 'shops', NULL, NULL, NULL, NULL, NULL, 1, 1, 'FFC107', 'FFFFFF', 7, NULL, 1, 1, NULL, '2021-03-04 12:04:56', '2021-03-07 04:25:08'),
(8, 'Foods', 'foods', NULL, NULL, NULL, NULL, 7, 1, 0, 'FFFFFF', '000000', 2, NULL, 1, 1, NULL, '2021-03-04 12:05:15', '2021-03-07 01:55:30'),
(9, 'Clothes', 'clothes', NULL, NULL, NULL, NULL, 7, 1, 0, 'FFFFFF', '000000', 3, NULL, 1, 1, NULL, '2021-03-04 12:05:28', '2021-03-07 01:55:19'),
(10, 'Tools', 'tools', NULL, NULL, NULL, NULL, 7, 1, 0, 'FFFFFF', '000000', 4, NULL, 1, 1, NULL, '2021-03-04 12:05:56', '2021-03-07 01:55:09'),
(11, 'Electronics', 'electronics', NULL, NULL, NULL, NULL, 7, 1, 0, 'FFFFFF', '000000', 5, NULL, 1, 1, NULL, '2021-03-04 12:06:10', '2021-03-07 01:54:59'),
(13, 'Work', 'work', NULL, NULL, NULL, NULL, NULL, 1, 1, '0D6EFD', 'FFFFFF', 13, NULL, 1, 1, NULL, '2021-03-07 01:48:14', '2021-03-07 04:25:43'),
(14, 'Services', 'services', NULL, NULL, NULL, NULL, NULL, 1, 1, 'DC3545', 'FFFFFF', 14, NULL, 1, NULL, NULL, '2021-03-07 05:11:11', '2021-03-07 05:11:11'),
(15, 'Home', 'home', NULL, NULL, NULL, NULL, NULL, 1, 1, '198754', 'FFFFFF', 15, NULL, 1, NULL, NULL, '2021-03-07 05:11:57', '2021-03-07 05:11:57'),
(16, 'Groups', 'groups', NULL, NULL, NULL, NULL, NULL, 1, 1, '6C757D', 'FFFFFF', 16, NULL, 1, NULL, NULL, '2021-03-07 05:12:57', '2021-03-07 05:12:57'),
(17, 'Grammar', 'grammar', NULL, NULL, NULL, NULL, NULL, 1, 1, 'FFC107', 'FFFFFF', 17, NULL, 1, NULL, NULL, '2021-03-07 05:13:45', '2021-03-07 05:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not seen by admin, 1 = seen by admin',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `flag`) VALUES
(1, 'United States of America', 'en', 'en.png'),
(2, 'Finland', 'fi', 'fi.png'),
(3, 'Germany', 'de', 'de.png'),
(4, 'Sweden', 'se', 'se.png'),
(5, 'Norwegian', 'no', 'no.png'),
(6, 'Greenland', 'dk', 'dk.png'),
(7, 'France', 'fr', 'fr.png'),
(8, 'Italy', 'it', 'it.png'),
(9, 'Spain', 'es', 'es.png'),
(10, 'Albanian', 'al', 'al.png'),
(11, 'Bangladesh', 'bn', 'bn.png');

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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `code`, `flag`, `country`, `country_id`) VALUES
(1, 'English', 'Eng', 'en', 'en.png', 'United States of America', 1),
(2, 'Finnish', NULL, 'fi', 'fi.png', 'Finland', 2),
(3, 'German', 'Deutsch', 'de', 'de.png', 'Germany', 3),
(4, 'Svenska', 'Svenska', 'se', 'se.png', 'Sweden', 4),
(5, 'Norsk', 'Norsk', 'no', 'no.png', 'Norwegian', 5),
(6, 'Dansk', 'Dansk', 'dk', 'dk.png', 'Greenland', 6),
(7, 'Francais', 'Francais', 'fr', 'fr.png', 'France', 7),
(8, 'English', 'Eng', 'it', 'it.png', 'Italy', 8),
(9, 'Italiano', 'Italiano', 'es', 'es.png', 'Spain', 9),
(10, 'Spannish', 'Espanol', 'al', 'al.png', 'Albanian', 10),
(11, 'Bangla', NULL, 'bn', 'Bangla-1615826757-flag.png', 'Bangladesh', 11),
(13, 'Russia', NULL, 'ru', 'Russia-1615826644-flag.png', 'United States of America', 1),
(14, 'Turkish', NULL, 'ts', NULL, 'United States of America', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_advertisements`
--

CREATE TABLE `language_advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_advertisements`
--

INSERT INTO `language_advertisements` (`id`, `language_id`, `advertisement_id`, `created_at`, `updated_at`) VALUES
(5, 5, 3, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 1, 3, NULL, NULL),
(8, 2, 3, NULL, NULL),
(10, 6, 4, NULL, NULL),
(11, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_preferreds`
--

CREATE TABLE `language_preferreds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `preferred_language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_preferreds`
--

INSERT INTO `language_preferreds` (`id`, `language_id`, `preferred_language_id`, `created_at`, `updated_at`) VALUES
(1, 13, 2, '2021-03-15 11:12:23', '2021-03-15 11:12:23'),
(2, 13, 3, '2021-03-15 11:12:35', '2021-03-15 11:12:35'),
(3, 11, 1, '2021-03-15 11:12:48', '2021-03-15 11:12:48'),
(4, 2, 1, '2021-03-15 11:27:54', '2021-03-15 11:27:54'),
(5, 2, 9, '2021-03-15 11:27:54', '2021-03-15 11:27:54'),
(6, 2, 13, '2021-03-15 11:27:54', '2021-03-15 11:27:54');

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
(1, '2020_05_01_000000_create_admins_table', 1),
(2, '2020_05_01_0000040_create_settings_table', 1),
(3, '2020_05_01_000010_create_users_table', 1),
(4, '2020_05_01_000020_create_failed_jobs_table', 1),
(5, '2020_05_01_000030_create_password_resets_table', 1),
(6, '2020_05_01_000050_create_categories_table', 1),
(7, '2020_05_01_000060_create_pages_table', 1),
(8, '2020_05_01_000070_create_blogs_table', 1),
(9, '2020_05_01_000080_create_contacts_table', 1),
(10, '2020_05_01_000090_create_tracks_table', 1),
(11, '2021_02_03_094230_create_advertisements_table', 1),
(12, '2021_02_27_184353_create_permission_tables', 1),
(13, '2021_02_27_185000_create_countries_table', 1),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(20, '2016_06_01_000004_create_oauth_clients_table', 2),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(22, '2021_02_03_061323_create_article_types_table', 3),
(32, '2021_02_27_185728_create_languages_table', 4),
(33, '2021_02_27_195321_create_words_table', 4),
(36, '2021_03_07_062247_create_terms_table', 5),
(37, '2021_02_27_195339_create_sentences_table', 6),
(38, '2021_03_14_191206_create_language_advertisements_table', 7),
(39, '2021_03_14_194416_create_language_preferreds_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\Admin', 1),
(3, 'App\\Models\\Admin', 2),
(10, 'App\\Models\\Admin', 3),
(11, 'App\\Models\\Admin', 3),
(12, 'App\\Models\\Admin', 3),
(13, 'App\\Models\\Admin', 3),
(14, 'App\\Models\\Admin', 3),
(3, 'App\\Models\\Admin', 6),
(4, 'App\\Models\\Admin', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'AQv4sjEaoVlRnxvfP1K4wROvzahyueMkWXmwqGr0', NULL, 'http://localhost', 1, 0, 0, '2021-03-03 11:22:18', '2021-03-03 11:22:18'),
(2, NULL, 'Laravel Password Grant Client', 'I2INHqaVnp11m4rCvwJbGehPMuLmn0DfT75irCDY', 'users', 'http://localhost', 0, 1, 0, '2021-03-03 11:22:18', '2021-03-03 11:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-03 11:22:18', '2021-03-03 11:22:18');

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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if page has no category',
  `article_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'If Article Belongs to a Type',
  `advertisement_ids` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'settings.view', 'web', 'settings', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(2, 'settings.edit', 'web', 'settings', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(3, 'permission.view', 'web', 'permission', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(4, 'permission.create', 'web', 'permission', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(5, 'permission.edit', 'web', 'permission', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(6, 'permission.delete', 'web', 'permission', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(7, 'admin.view', 'web', 'admin', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(8, 'admin.create', 'web', 'admin', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(9, 'admin.edit', 'web', 'admin', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(10, 'admin.delete', 'web', 'admin', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(11, 'admin_profile.view', 'web', 'admin_profile', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(12, 'admin_profile.edit', 'web', 'admin_profile', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(13, 'role.view', 'web', 'role', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(14, 'role.create', 'web', 'role', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(15, 'role.edit', 'web', 'role', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(16, 'role.delete', 'web', 'role', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(17, 'user.view', 'web', 'user', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(18, 'user.create', 'web', 'user', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(19, 'user.edit', 'web', 'user', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(20, 'user.delete', 'web', 'user', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(21, 'category.view', 'web', 'category', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(22, 'category.create', 'web', 'category', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(23, 'category.edit', 'web', 'category', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(24, 'category.delete', 'web', 'category', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(25, 'page.view', 'web', 'page', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(26, 'page.create', 'web', 'page', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(27, 'page.edit', 'web', 'page', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(28, 'page.delete', 'web', 'page', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(29, 'blog.view', 'web', 'blog', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(30, 'blog.create', 'web', 'blog', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(31, 'blog.edit', 'web', 'blog', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(32, 'blog.delete', 'web', 'blog', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(33, 'slider.view', 'web', 'slider', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(34, 'slider.create', 'web', 'slider', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(35, 'slider.edit', 'web', 'slider', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(36, 'slider.delete', 'web', 'slider', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(37, 'tracking.view', 'web', 'tracking', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(38, 'tracking.delete', 'web', 'tracking', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(39, 'email_notification.view', 'web', 'email_notification', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(40, 'email_notification.edit', 'web', 'email_notification', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(41, 'email_message.view', 'web', 'email_message', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(42, 'email_message.edit', 'web', 'email_message', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(43, 'module.view', 'web', 'module', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(44, 'module.create', 'web', 'module', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(45, 'module.edit', 'web', 'module', '2020-05-09 23:17:46', '2020-05-09 23:17:46'),
(46, 'module.delete', 'web', 'module', '2020-05-09 23:17:46', '2020-05-09 23:17:46'),
(47, 'module.toggle', 'web', 'module', '2020-05-09 23:17:46', '2020-05-09 23:17:46'),
(48, 'dashboard.view', 'web', 'dashboard', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(49, 'advertisement.view', 'web', 'advertisement', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(50, 'advertisement.create', 'web', 'advertisement', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(51, 'advertisement.edit', 'web', 'advertisement', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(52, 'advertisement.delete', 'web', 'advertisement', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(53, 'word.view', 'web', 'word', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(54, 'word.create', 'web', 'word', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(55, 'word.edit', 'web', 'word', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(56, 'word.delete', 'web', 'word', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(57, 'sentence.view', 'web', 'sentence', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(58, 'sentence.create', 'web', 'sentence', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(59, 'sentence.edit', 'web', 'sentence', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(60, 'sentence.delete', 'web', 'sentence', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(61, 'translation.create', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(62, 'translation.edit', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(63, 'translation.all_language', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(64, 'translation.word', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(65, 'translation.sentence', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(66, 'translation.term', 'web', 'translation', '2020-05-09 23:17:45', '2020-05-09 23:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'web', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(4, 'Editor', 'web', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(5, 'Super Admin', 'web', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(10, 'New Role', 'web', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(11, 'Translator', 'web', '2020-05-09 23:17:45', '2020-05-09 23:17:45'),
(12, 'Word Translator', 'web', NULL, NULL),
(13, 'Sentence Translator', 'web', NULL, NULL),
(14, 'Term Translator', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(11, 3),
(12, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(48, 3),
(11, 4),
(12, 4),
(21, 4),
(22, 4),
(23, 4),
(25, 4),
(26, 4),
(27, 4),
(30, 4),
(31, 4),
(48, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(19, 10),
(20, 10),
(21, 10),
(22, 10),
(23, 10),
(24, 10),
(25, 10),
(26, 10),
(27, 10),
(28, 10),
(29, 10),
(30, 10),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 10),
(46, 10),
(47, 10),
(48, 10),
(48, 11),
(53, 11),
(55, 11),
(57, 11),
(59, 11),
(61, 11),
(62, 11),
(64, 12),
(65, 13),
(66, 14);

-- --------------------------------------------------------

--
-- Table structure for table `sentences`
--

CREATE TABLE `sentences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Main Category Name, e.g: Education',
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sub category Name or chapter name',
  `en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `ts` text COLLATE utf8mb4_unicode_ci,
  `te` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default will be pending = 0',
  `created_by` bigint(20) UNSIGNED NOT NULL COMMENT 'Created By User',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sentences`
--

INSERT INTO `sentences` (`id`, `category_id`, `category`, `chapter_id`, `chapter`, `en`, `fi`, `se`, `no`, `dk`, `de`, `it`, `fr`, `es`, `pl`, `al`, `ru`, `ar`, `bn`, `so`, `ku`, `vi`, `cn`, `sr`, `tr`, `order_nr`, `ts`, `te`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Education', 3, 'Greetings', 'How are you?', 'Mitä kuuluu? hosatu', NULL, NULL, NULL, 'Wie geht es Ihnen?', NULL, NULL, NULL, NULL, 'Si jeni?', NULL, NULL, 'আপনি কেমন আছেন?sdj', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:45:50', '2021-03-15 11:18:52'),
(2, 2, 'Education', 3, 'Greetings', 'How are you today?', 'Kuinka voit tänään?', NULL, NULL, NULL, 'Wie geht es dir heute?', NULL, NULL, NULL, NULL, 'Si jeni sot?', NULL, NULL, 'তুমি আজ কেমন আছো?', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:46:18', '2021-03-14 10:30:39'),
(3, 2, 'Education', 3, 'Greetings', 'How are you today? Was it a good day? What are you doing tomorrow?', 'Kuinka voit tänään? Oliko se hyvä päivä? Mitä teet huomenna?', NULL, NULL, NULL, 'Wie geht es dir heute? War es ein guter Tag? Was machst du morgen?', NULL, NULL, NULL, NULL, 'Si jeni sot? A ishte një ditë e mirë? Cfare po ben neser?', NULL, NULL, 'তুমি আজ কেমন আছো? এটা কি খুব ভাল দিন ছিল? আপনি কি আগামীকাল করছেন?', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:46:41', '2021-03-14 10:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Laravel',
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `site_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_working_day_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `country` bigint(20) UNSIGNED DEFAULT NULL,
  `language` bigint(20) UNSIGNED DEFAULT NULL,
  `menu` tinyint(1) DEFAULT '0',
  `content` tinyint(1) DEFAULT '0',
  `footer` tinyint(1) DEFAULT '0',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en` text COLLATE utf8mb4_unicode_ci,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `ts` text COLLATE utf8mb4_unicode_ci,
  `te` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Default will be approved = 1',
  `created_by` bigint(20) UNSIGNED NOT NULL COMMENT 'Created By User',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `category`, `country`, `language`, `menu`, `content`, `footer`, `key`, `en`, `fi`, `se`, `no`, `dk`, `de`, `it`, `fr`, `es`, `pl`, `al`, `ru`, `ar`, `bn`, `so`, `ku`, `vi`, `cn`, `sr`, `tr`, `order_nr`, `ts`, `te`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 13, NULL, NULL, 0, 0, 0, 'work', 'workesto', 'workesto', 'seganto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:53:33', '2021-03-13 22:17:33'),
(2, 11, NULL, NULL, 0, 0, 0, 'electronics', 'Electo', 'Electronics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'আজ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:54:59', '2021-03-13 23:03:06'),
(3, 10, NULL, NULL, 0, 0, 0, 'tools', 'Tools', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:55:09', '2021-03-13 22:17:33'),
(4, 9, NULL, NULL, 0, 0, 0, 'clothes', 'Cloths', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:55:19', '2021-03-13 22:17:33'),
(5, 8, NULL, NULL, 0, 0, 0, 'foods', 'Foods', 'foods in finnish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:55:30', '2021-03-13 22:40:18'),
(6, 7, NULL, NULL, 0, 0, 0, 'shops', 'Shops', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:55:41', '2021-03-13 22:17:33'),
(7, 6, NULL, NULL, 0, 0, 0, 'applications', 'Applications', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:55:52', '2021-03-13 22:17:33'),
(8, 3, NULL, NULL, 0, 0, 0, 'greetings', 'Terveisiä', 'Terveisiä', NULL, NULL, NULL, 'Groeten', NULL, NULL, NULL, NULL, 'Pershendetje', NULL, NULL, 'শুভেচ্ছা', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:56:04', '2021-03-13 22:17:33'),
(9, 2, NULL, NULL, 0, 0, 0, 'education', 'Koulutus', 'Koulutus', NULL, NULL, NULL, 'Onderwijs', NULL, NULL, NULL, NULL, 'Arsimi', NULL, NULL, 'শিক্ষা', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:56:14', '2021-03-13 22:17:33'),
(10, 5, NULL, NULL, 0, 0, 0, 'technology', 'Technology', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:56:44', '2021-03-13 22:17:33'),
(11, 4, NULL, NULL, 0, 0, 0, 'school', 'School', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 01:57:15', '2021-03-13 22:17:33'),
(12, 14, NULL, NULL, 0, 0, 0, 'services', 'Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:11:11', '2021-03-13 22:17:33'),
(13, 15, NULL, NULL, 0, 0, 0, 'home', 'Home', 'home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:11:57', '2021-03-13 22:33:18'),
(14, 16, NULL, NULL, 0, 0, 0, 'groups', 'Groups', 'groupus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:12:57', '2021-03-13 22:33:18'),
(15, 17, NULL, NULL, 0, 0, 0, 'grammar', 'Grammar', 'grammar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:33:18'),
(16, NULL, NULL, NULL, 0, 1, 0, 'question_and_answer', 'Question and Answers', 'Kysymys ja vastaus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pyetje dhe përgjigje', NULL, NULL, 'প্রশ্ন ও উত্তর', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(17, NULL, NULL, NULL, 1, 0, 0, 'words_1000', '1000 Words', '1000 sanaa', NULL, NULL, NULL, '1000 Wörter', NULL, NULL, NULL, NULL, '1000 fjalë', NULL, NULL, '1000 শব্দ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(18, NULL, NULL, NULL, 1, 0, 0, 'grammar', 'Grammar', 'Kielioppi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gramatikë', NULL, NULL, 'ব্যাকরণ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(19, NULL, NULL, NULL, 1, 0, 0, 'partners', 'Partners', 'Kumppani', NULL, NULL, NULL, NULL, 'Compagna', NULL, 'Pareja', NULL, 'Partnere', NULL, NULL, 'অংশীদার', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(20, NULL, NULL, NULL, 1, 0, 0, 'info', 'Info', 'Tiedot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Info', NULL, NULL, 'তথ্য', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(21, NULL, NULL, NULL, 1, 0, 0, 'learn', 'Learn', 'Oppia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Meso', NULL, NULL, 'শিখুন', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(22, NULL, NULL, NULL, 1, 0, 0, 'contact', 'Contact', 'Ottaa yhteyttä', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kontaktoni', NULL, NULL, 'যোগাযোগ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(23, NULL, NULL, NULL, 0, 1, 0, 'sentences', 'Sentences', 'Lausekkeet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fjalitë', NULL, NULL, 'বাক্য', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33'),
(24, NULL, NULL, NULL, 0, 1, 0, 'words', 'Words', 'Sanat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fjalët', NULL, NULL, 'শব্দ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 05:13:45', '2021-03-13 22:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'If there is possible to keep any reference link',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `description`, `reference_link`, `admin_id`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-04 11:55:38', '2021-03-04 11:55:38'),
(3, 'EDUCATION', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:03:12', '2021-03-04 12:03:12'),
(4, 'Greetings', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:03:39', '2021-03-04 12:03:39'),
(5, 'School', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:03:52', '2021-03-04 12:03:52'),
(6, 'Technology', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:04:13', '2021-03-04 12:04:13'),
(7, 'Applications', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:04:28', '2021-03-04 12:04:28'),
(8, 'Shops', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:04:56', '2021-03-04 12:04:56'),
(9, 'Foods', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:05:15', '2021-03-04 12:05:15'),
(10, 'Clothes', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:05:28', '2021-03-04 12:05:28'),
(11, 'Tools', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:05:56', '2021-03-04 12:05:56'),
(12, 'Electronics', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-04 12:06:10', '2021-03-04 12:06:10'),
(13, 'Hello', 'New Word has been created', NULL, 1, NULL, NULL, '2021-03-04 12:23:07', '2021-03-04 12:23:07'),
(14, 'Hello', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-04 12:53:59', '2021-03-04 12:53:59'),
(15, 'Today', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-04 12:54:41', '2021-03-04 12:54:41'),
(16, 'Today', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:14:57', '2021-03-06 06:14:57'),
(17, 'Hello', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:17:25', '2021-03-06 06:17:25'),
(18, 'Today', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:17:38', '2021-03-06 06:17:38'),
(19, 'Today', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:17:56', '2021-03-06 06:17:56'),
(20, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-06 06:38:30', '2021-03-06 06:38:30'),
(21, 'Hello, Good Morning', 'New Sentence has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:45:24', '2021-03-06 06:45:24'),
(22, 'Hello, Good Morning !', 'New Sentence has been saved', NULL, 1, NULL, NULL, '2021-03-06 06:45:56', '2021-03-06 06:45:56'),
(23, 'Work', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-07 01:48:14', '2021-03-07 01:48:14'),
(24, 'work', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:53:33', '2021-03-07 01:53:33'),
(25, 'work', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:54:34', '2021-03-07 01:54:34'),
(26, 'electronics', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:54:59', '2021-03-07 01:54:59'),
(27, 'tools', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:55:09', '2021-03-07 01:55:09'),
(28, 'clothes', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:55:19', '2021-03-07 01:55:19'),
(29, 'foods', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:55:30', '2021-03-07 01:55:30'),
(30, 'shops', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:55:41', '2021-03-07 01:55:41'),
(31, 'applications', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:55:52', '2021-03-07 01:55:52'),
(32, 'greetings', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:56:04', '2021-03-07 01:56:04'),
(33, 'education', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:56:14', '2021-03-07 01:56:14'),
(34, 'technology', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:56:44', '2021-03-07 01:56:44'),
(35, 'school', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 01:57:15', '2021-03-07 01:57:15'),
(36, 'education', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 04:23:58', '2021-03-07 04:23:58'),
(37, 'work', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 04:24:33', '2021-03-07 04:24:33'),
(38, 'shops', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 04:25:08', '2021-03-07 04:25:08'),
(39, 'work', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-07 04:25:43', '2021-03-07 04:25:43'),
(40, 'Hello', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-07 04:38:43', '2021-03-07 04:38:43'),
(41, 'Today', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-07 04:39:09', '2021-03-07 04:39:09'),
(42, 'How are you?', 'New Sentence has been saved', NULL, 1, NULL, NULL, '2021-03-07 04:45:50', '2021-03-07 04:45:50'),
(43, 'How are you today?', 'New Sentence has been saved', NULL, 1, NULL, NULL, '2021-03-07 04:46:18', '2021-03-07 04:46:18'),
(44, 'How are you today? Was it a good day? What are you doing tomorrow?', 'New Sentence has been saved', NULL, 1, NULL, NULL, '2021-03-07 04:46:41', '2021-03-07 04:46:41'),
(45, 'Services', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-07 05:11:11', '2021-03-07 05:11:11'),
(46, 'Home', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-07 05:11:57', '2021-03-07 05:11:57'),
(47, 'Groups', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-07 05:12:57', '2021-03-07 05:12:57'),
(48, 'Grammar', 'New Category has been created', NULL, 1, NULL, NULL, '2021-03-07 05:13:45', '2021-03-07 05:13:45'),
(49, 'Welcome', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-08 11:22:14', '2021-03-08 11:22:14'),
(50, 'Tomorrow', 'New Word has been saved', NULL, 1, NULL, NULL, '2021-03-08 11:59:56', '2021-03-08 11:59:56'),
(51, 'Translator', 'New Role has been created', NULL, 1, NULL, NULL, '2021-03-10 14:09:09', '2021-03-10 14:09:09'),
(52, 'maniruzzamanakash', 'New Admin has been created', NULL, 1, NULL, NULL, '2021-03-10 14:42:05', '2021-03-10 14:42:05'),
(53, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-11 09:53:59', '2021-03-11 09:53:59'),
(54, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:23:30', '2021-03-13 06:23:30'),
(55, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:31:48', '2021-03-13 06:31:48'),
(56, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:35:26', '2021-03-13 06:35:26'),
(57, 'Translator', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:47:46', '2021-03-13 06:47:46'),
(58, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:58:39', '2021-03-13 06:58:39'),
(59, 'Translator', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 06:59:07', '2021-03-13 06:59:07'),
(60, 'Translator', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 07:14:02', '2021-03-13 07:14:02'),
(61, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 07:20:54', '2021-03-13 07:20:54'),
(62, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 21:48:58', '2021-03-13 21:48:58'),
(63, 'Word Translator', 'New Role has been created', NULL, 1, NULL, NULL, '2021-03-13 21:50:05', '2021-03-13 21:50:05'),
(64, 'Sentence Translator', 'New Role has been created', NULL, 1, NULL, NULL, '2021-03-13 21:50:34', '2021-03-13 21:50:34'),
(65, 'Term Translator', 'New Role has been created', NULL, 1, NULL, NULL, '2021-03-13 21:50:54', '2021-03-13 21:50:54'),
(66, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 21:51:24', '2021-03-13 21:51:24'),
(67, 'superadmin', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 22:08:37', '2021-03-13 22:08:37'),
(68, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 23:01:39', '2021-03-13 23:01:39'),
(69, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-13 23:03:53', '2021-03-13 23:03:53'),
(70, 'superadmin', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 10:44:04', '2021-03-14 10:44:04'),
(71, 'Sample Advertisement', 'New Advertisement has been created', NULL, 1, NULL, NULL, '2021-03-14 10:48:15', '2021-03-14 10:48:15'),
(72, 'Sample Advertisement2', 'New Advertisement has been created', NULL, 1, NULL, NULL, '2021-03-14 13:21:26', '2021-03-14 13:21:26'),
(73, 'Sample Advertisement2', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:28:52', '2021-03-14 13:28:52'),
(74, 'Sample Advertisement2', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:29:04', '2021-03-14 13:29:04'),
(75, 'Sample Advertisement2', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:29:52', '2021-03-14 13:29:52'),
(76, 'Sample Advertisement2', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:30:05', '2021-03-14 13:30:05'),
(77, 'Sample Advertisement2', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:30:13', '2021-03-14 13:30:13'),
(78, 'Sample Final', 'New Advertisement has been created', NULL, 1, NULL, NULL, '2021-03-14 13:31:07', '2021-03-14 13:31:07'),
(79, 'Sample Final', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-14 13:31:50', '2021-03-14 13:31:50'),
(80, 'Maniruzzaman Akash', 'New Language has been created', NULL, 1, NULL, NULL, '2021-03-15 09:50:03', '2021-03-15 09:50:03'),
(81, 'Sumalia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:04:17', '2021-03-15 10:04:17'),
(82, 'Sumalia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:04:30', '2021-03-15 10:04:30'),
(83, 'Sumalia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:38:57', '2021-03-15 10:38:57'),
(84, 'Sumalia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:40:05', '2021-03-15 10:40:05'),
(85, 'Bangla', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:42:10', '2021-03-15 10:42:10'),
(86, 'Russia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:44:04', '2021-03-15 10:44:04'),
(87, 'Bangla', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 10:45:57', '2021-03-15 10:45:57'),
(88, 'Russia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:08:53', '2021-03-15 11:08:53'),
(89, 'Russia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:12:23', '2021-03-15 11:12:23'),
(90, 'Russia', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:12:35', '2021-03-15 11:12:35'),
(91, 'Bangla', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:12:48', '2021-03-15 11:12:48'),
(92, 'Sample Final', 'Advertisement has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:23:12', '2021-03-15 11:23:12'),
(93, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:24:41', '2021-03-15 11:24:41'),
(94, 'Finnish', 'Language has been updated successfully !!', NULL, 1, NULL, NULL, '2021-03-15 11:27:54', '2021-03-15 11:27:54'),
(95, 'Turkish', 'New Language has been created', NULL, 1, NULL, NULL, '2021-03-15 11:31:40', '2021-03-15 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=active, 0=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `language_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 'superadmin', '8801951233080', 'superadmin@example.com', NULL, '$2y$10$RzD2JiZG408lL1jTOzoZLu/oLwgmQv9/P1roBCj.pDlrzULW9KLF.', NULL, 1, NULL, NULL, 1, NULL, 2, NULL, '2021-03-03 11:36:11', '2021-03-14 10:44:04'),
(3, 'Maniruzzaman', 'Akash', 'maniruzzamanakash', '01951233081', 'manirujjamanakash1@gmail.com', NULL, '$2y$10$RzD2JiZG408lL1jTOzoZLu/oLwgmQv9/P1roBCj.pDlrzULW9KLF.', NULL, 1, NULL, 1, 1, NULL, 11, NULL, '2021-03-10 14:42:05', '2021-03-15 11:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Main Category Name, e.g: Education',
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sub category Name or chapter name',
  `en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `ts` text COLLATE utf8mb4_unicode_ci,
  `te` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default will be pending = 0',
  `created_by` bigint(20) UNSIGNED NOT NULL COMMENT 'Created By User',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `category_id`, `category`, `chapter_id`, `chapter`, `en`, `fi`, `se`, `no`, `dk`, `de`, `it`, `fr`, `es`, `pl`, `al`, `ru`, `ar`, `bn`, `so`, `ku`, `vi`, `cn`, `sr`, `tr`, `order_nr`, `ts`, `te`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Education', 3, 'Greetings', 'Hello', 'Hei', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Përshëndetje', NULL, NULL, 'হ্যালো', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:38:43', '2021-03-13 22:14:48'),
(2, 2, 'Education', 3, 'Greetings', 'Hi', 'Tänään', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sot', NULL, NULL, 'আজ', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:39:09', '2021-03-13 22:14:48'),
(3, 2, 'Education', 3, 'Greetings', 'How are you ?', 'Rakkaus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dashuri', NULL, NULL, 'ভালবাসা', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:39:09', '2021-03-13 22:14:48'),
(4, 2, 'Education', 3, 'Greetings', 'Another', 'Hyvää huomenta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Miremengjes', NULL, NULL, 'সুপ্রভাত', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-07 04:39:09', '2021-03-13 22:14:48'),
(5, 2, 'Education', 3, 'Greetings', 'Welcome', 'Welcome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sagotom', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-08 11:22:14', '2021-03-13 22:14:48'),
(6, 2, 'Education', 3, 'Greetings', 'Test', 'Test in finnish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'agamikal', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2021-03-08 11:59:56', '2021-03-13 22:39:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_created_by_foreign` (`created_by`),
  ADD KEY `admins_updated_by_foreign` (`updated_by`),
  ADD KEY `admins_deleted_by_foreign` (`deleted_by`),
  ADD KEY `admins_first_name_index` (`first_name`),
  ADD KEY `admins_phone_no_index` (`phone_no`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisements_slug_unique` (`slug`),
  ADD KEY `advertisements_created_by_foreign` (`created_by`),
  ADD KEY `advertisements_deleted_by_foreign` (`deleted_by`),
  ADD KEY `advertisements_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `article_types`
--
ALTER TABLE `article_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_created_by_foreign` (`created_by`),
  ADD KEY `blogs_updated_by_foreign` (`updated_by`),
  ADD KEY `blogs_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_updated_by_foreign` (`updated_by`),
  ADD KEY `contacts_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`),
  ADD KEY `languages_country_id_foreign` (`country_id`);

--
-- Indexes for table `language_advertisements`
--
ALTER TABLE `language_advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_advertisements_language_id_foreign` (`language_id`),
  ADD KEY `language_advertisements_advertisement_id_foreign` (`advertisement_id`);

--
-- Indexes for table `language_preferreds`
--
ALTER TABLE `language_preferreds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_preferreds_language_id_foreign` (`language_id`),
  ADD KEY `language_preferreds_preferred_language_id_foreign` (`preferred_language_id`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_created_by_foreign` (`created_by`),
  ADD KEY `pages_updated_by_foreign` (`updated_by`),
  ADD KEY `pages_deleted_by_foreign` (`deleted_by`),
  ADD KEY `pages_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sentences_category_id_foreign` (`category_id`),
  ADD KEY `sentences_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_category_index` (`category`),
  ADD KEY `terms_country_index` (`country`),
  ADD KEY `terms_language_index` (`language`),
  ADD KEY `terms_menu_index` (`menu`),
  ADD KEY `terms_content_index` (`content`),
  ADD KEY `terms_footer_index` (`footer`),
  ADD KEY `terms_key_index` (`key`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_first_name_index` (`first_name`),
  ADD KEY `users_phone_no_index` (`phone_no`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `words_category_id_foreign` (`category_id`),
  ADD KEY `words_chapter_id_foreign` (`chapter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article_types`
--
ALTER TABLE `article_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `language_advertisements`
--
ALTER TABLE `language_advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `language_preferreds`
--
ALTER TABLE `language_preferreds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sentences`
--
ALTER TABLE `sentences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `language_advertisements`
--
ALTER TABLE `language_advertisements`
  ADD CONSTRAINT `language_advertisements_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`),
  ADD CONSTRAINT `language_advertisements_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `language_preferreds`
--
ALTER TABLE `language_preferreds`
  ADD CONSTRAINT `language_preferreds_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `language_preferreds_preferred_language_id_foreign` FOREIGN KEY (`preferred_language_id`) REFERENCES `languages` (`id`);

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
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sentences`
--
ALTER TABLE `sentences`
  ADD CONSTRAINT `sentences_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sentences_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `terms_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `terms_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `terms_language_foreign` FOREIGN KEY (`language`) REFERENCES `languages` (`id`);

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `words_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `categories` (`id`);
