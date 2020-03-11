-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 12:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condominium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'หน้าแรก', 'fa-home', '/', 'home', NULL, NULL),
(2, 0, 2, 'ทำสัญญา', 'fa-handshake-o', '/contract', 'contract.*', NULL, NULL),
(3, 0, 3, 'บันทึกค่าใช้จ่าย', 'fa-list-ul', 'data/orders', 'orders', NULL, NULL),
(4, 0, 4, 'บันทึกมิเตอร์น้ำ', 'fa-tint', '/water-meters', 'meters', NULL, NULL),
(5, 0, 5, 'บิล', 'fa-file-text-o', '/bills', 'bills', NULL, NULL),
(6, 0, 6, 'ข้อมูล', 'fa-database', '', 'data.*', NULL, NULL),
(7, 0, 7, 'รายงาน', 'fa-files-o', '', 'reports.*', NULL, NULL),
(8, 0, 8, 'เมนูผู้ดูแลระบบ', 'fa-tasks', '', 'admin.*', NULL, NULL),
(9, 6, 1, 'ลูกค้า', 'fa-user-circle-o', 'data/customers', 'data.*', NULL, NULL),
(10, 6, 2, 'สัญญา', 'fa-file-text', 'data/contracts', 'data.*', NULL, NULL),
(11, 6, 4, 'ใบเสร็จ', 'fa-hashtag', 'payments', 'data.*', NULL, NULL),
(12, 6, 5, 'ห้องพัก', 'fa-cube', 'data/rooms', 'data.*', NULL, NULL),
(13, 6, 6, 'นิติบุคคล', 'fa-user-o', 'data/juristics', 'data.*', NULL, NULL),
(14, 7, 1, 'ข้อมูลห้องพัก', 'fa-files-o', 'report/rooms', 'reports.*', NULL, NULL),
(15, 7, 2, 'ข้อมูลบันทึกค่าใช้จ่าย', 'fa-files-o', 'report/orders', 'reports.*', NULL, NULL),
(16, 7, 5, 'ข้อมูลการชำระเงิน', 'fa-files-o', 'report/payments', 'reports.*', NULL, NULL),
(17, 8, 1, 'จัดการข้อมูลนิติบุคคล', 'fa-user-o', 'admin/juristics', 'admin.juristics', NULL, NULL),
(18, 8, 2, 'จัดการข้อมูลอาคาร', 'fa-building-o', 'admin/buildings', 'admin.buildings', NULL, NULL),
(19, 8, 3, 'จัดการข้อมูลห้อง', 'fa-cube', 'admin/rooms', 'admin.rooms', NULL, NULL),
(20, 8, 4, 'จัดการข้อมูลลูกค้า', 'fa-user-circle-o', 'admin/customers', 'admin.customers', NULL, NULL),
(21, 8, 5, 'จัดการข้อมูลบริการ', 'fa-sign-language', 'admin/services', 'admin.services', NULL, NULL),
(22, 8, 6, 'จัดการข้อมูลผู้ใช้', 'fa-users', 'admin/users', 'admin.users', NULL, NULL),
(23, 8, 7, 'สิทธิ์การเข้าถึง', 'fa-book', 'auth/roles', 'admin.roles', NULL, NULL),
(24, 8, 8, 'Permission', 'fa-ban', 'auth/permissions', 'admin.permissions', NULL, NULL),
(25, 8, 9, 'จัดการเมนู', 'fa-bars', 'auth/menu', 'admin.menu', NULL, NULL),
(26, 8, 10, 'ประวัติการใช้งาน', 'fa-history', 'auth/logs', 'admin.logs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'bills', 'GET', '127.0.0.1', '[]', '2019-11-04 15:00:29', '2019-11-04 15:00:29'),
(2, 1, '/', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:00:32', '2019-11-04 15:00:32'),
(3, 1, 'contract', 'GET', '127.0.0.1', '{\"room_id\":\"1\",\"r\":\"admin.home\",\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:00:35', '2019-11-04 15:00:35'),
(4, 1, 'contract', 'POST', '127.0.0.1', '{\"type_id\":\"1\",\"contract_no\":\"R6211040001\",\"customer_id\":\"1\",\"building_id\":\"1\",\"room_id\":\"1\",\"create_date\":\"04\\/11\\/2019\",\"end_date\":\"05\\/11\\/2019\",\"price\":\"10000.00\",\"earnest\":\"0.00\",\"user_id\":\"1\",\"status\":\"0\",\"_token\":\"wfDu04NdV3fE4qLjVprWMSBe3TtYvxGXNd4UcWth\",\"_previous_\":\"http:\\/\\/localhost:8000\\/\"}', '2019-11-04 15:00:42', '2019-11-04 15:00:42'),
(5, 1, 'data/contracts/1', 'GET', '127.0.0.1', '[]', '2019-11-04 15:00:42', '2019-11-04 15:00:42'),
(6, 1, 'data/contracts/1/confirm', 'PUT', '127.0.0.1', '{\"_method\":\"PUT\",\"_token\":\"wfDu04NdV3fE4qLjVprWMSBe3TtYvxGXNd4UcWth\"}', '2019-11-04 15:00:46', '2019-11-04 15:00:46'),
(7, 1, 'data/contracts/1', 'GET', '127.0.0.1', '[]', '2019-11-04 15:00:46', '2019-11-04 15:00:46'),
(8, 1, '/', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:00:48', '2019-11-04 15:00:48'),
(9, 1, 'data/orders/create', 'GET', '127.0.0.1', '{\"room_id\":\"1\",\"r\":\"admin.home\",\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:00:52', '2019-11-04 15:00:52'),
(10, 1, 'data/orders', 'POST', '127.0.0.1', '{\"_token\":\"wfDu04NdV3fE4qLjVprWMSBe3TtYvxGXNd4UcWth\",\"_method\":\"POST\",\"room_id\":\"1\",\"detail\":{\"service_id\":[\"5\"],\"type\":[\"0\"],\"name\":[\"\\u0e0b\\u0e48\\u0e2d\\u0e21\\u0e1a\\u0e33\\u0e23\\u0e38\\u0e07\"],\"amount\":[\"1\"],\"unit\":[null],\"price\":[\"600\"],\"total\":[\"600\"]},\"total_price\":\"600.00\",\"r\":\"admin.home\"}', '2019-11-04 15:01:00', '2019-11-04 15:01:00'),
(11, 1, '/', 'GET', '127.0.0.1', '[]', '2019-11-04 15:01:01', '2019-11-04 15:01:01'),
(12, 1, '_handle_action_', 'POST', '127.0.0.1', '{\"_model\":\"App_Models_Room\",\"_key\":[\"1\"],\"_token\":\"wfDu04NdV3fE4qLjVprWMSBe3TtYvxGXNd4UcWth\",\"_action\":\"App_Admin_Actions_Orders_Generate\",\"_input\":\"true\"}', '2019-11-04 15:01:06', '2019-11-04 15:01:06'),
(13, 1, '/', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:01:06', '2019-11-04 15:01:06'),
(14, 1, 'bills', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-11-04 15:01:10', '2019-11-04 15:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(3, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(4, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/logs', NULL, NULL),
(5, 'home', 'home', '', '/', NULL, NULL),
(6, 'contract', 'contract', '', '/contract', NULL, NULL),
(7, 'contract.*', 'contract.*', '', '/contract/*', NULL, NULL),
(8, 'orders', 'orders', '', 'data/orders', NULL, NULL),
(9, 'orders.*', 'orders.*', '', 'data/orders/*', NULL, NULL),
(10, 'meters.*', 'meters.*', '', '/water-meters/*', NULL, NULL),
(11, 'meters', 'meters', '', '/water-meters', NULL, NULL),
(12, 'payments', 'payments', '', '/payments', NULL, NULL),
(13, 'payments.*', 'payments.*', '', '/payments/*', NULL, NULL),
(14, 'bills.*', 'bills.*', '', '/bills/*', NULL, NULL),
(15, 'bills', 'bills', '', '/bills', NULL, NULL),
(16, 'data', 'data.*', '', '/data/*', NULL, NULL),
(17, 'reports', 'reports.*', '', '/report/*', NULL, NULL),
(18, 'admin', 'admin.*', '', '/admin/*', NULL, NULL),
(19, '_handle_action_', '_handle_action_', '', '_handle_action_', NULL, NULL),
(20, '_handle_form_', '_handle_form_', '', '_handle_form_', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ผู้ดูแลระบบ', 'administrator', NULL, NULL),
(2, 'พนักงาน', 'employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(2, 5, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 5, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL),
(2, 10, NULL, NULL),
(2, 11, NULL, NULL),
(2, 12, NULL, NULL),
(2, 13, NULL, NULL),
(2, 14, NULL, NULL),
(2, 15, NULL, NULL),
(2, 16, NULL, NULL),
(2, 17, NULL, NULL),
(2, 19, NULL, NULL),
(2, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amphur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `idcard` bigint(20) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `email`, `firstname`, `lastname`, `address`, `amphur`, `district`, `province`, `postcode`, `phone`, `birthdate`, `idcard`, `building_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$hiFNPyyRJBH1qlZJdZP8TOBLIAnIF0KWlxIl5ninrnXJNb.xtuMCW', 'ผู้ดูแลระบบ', 'images/user.png', 'admin@admin.com', 'ผู้ดูแลระบบ', 'ผู้ดูแลระบบ', '55555', 'เมืองกำแพงเพชร', 'ทรงธรรม', 'กำแพงเพชร', 62000, '0800000000', '2019-11-04', 0, NULL, NULL, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, 'demo', '$2y$10$zLauZdEE1vyxkwQMD3nwm.pJz3AKg4sVbkx6oGBPdu26DR1LQnbyy', 'ผู้ทดสอบ', 'images/user.png', 'demo@demo.com', 'พนักงาน', 'ทดสอบ', '55555', 'เมืองกำแพงเพชร', 'ทรงธรรม', 'กำแพงเพชร', 62000, '0800000000', '2019-11-04', 10, NULL, NULL, '2019-11-04 15:00:21', '2019-11-04 15:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสอาคาร',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่ออาคาร',
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รายละเอียดอาคาร',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่อาคาร',
  `amphur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` int(11) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `juristic_id` int(11) NOT NULL COMMENT 'รหัสนิติบุคคล',
  `day_of_fine` int(11) NOT NULL COMMENT 'วันที่ชำระเงิน ในแต่ละเดือน',
  `fine` int(11) NOT NULL COMMENT 'ค่าปรับต่อวัน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `detail`, `address`, `amphur`, `district`, `province`, `postcode`, `phone`, `juristic_id`, `day_of_fine`, `fine`, `created_at`, `updated_at`) VALUES
(1, 'อาคารหลัก', 'อาคารนี้มี 7 ชั้น ชั้นละ 25 ห้อง', ' เลขที่ 5/6 หมู่ที่ 5  ถนนบ้านนอกคอกนา', 'เมือง', 'เมือง', 'นครปฐม', 10270, '08000000', 1, 5, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสสัญญา',
  `room_id` int(11) NOT NULL COMMENT 'รหัสห้อง',
  `contract_no` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'เลขที่สัญญา',
  `create_date` date NOT NULL COMMENT 'วันที่สัญญา',
  `end_date` date DEFAULT NULL COMMENT 'วันที่สิ้นสุดสัญญา',
  `price` double NOT NULL COMMENT 'ราคา',
  `earnest` double DEFAULT NULL COMMENT 'ค่ามัดจำ',
  `status` int(11) NOT NULL COMMENT 'สถานะสัญญา 0 = รออนุมัติ,1 = อนุมัติ,2 = ยกเลิก',
  `type_id` bigint(20) NOT NULL COMMENT 'ประเภทสัญญา 1 = เช่า,2 = ขาย',
  `customer_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `user_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `building_id` int(11) NOT NULL COMMENT 'รหัสอาคาร',
  `confirmed_at` datetime DEFAULT NULL COMMENT 'เวลาอนุมัติ',
  `canceled_at` datetime DEFAULT NULL COMMENT 'เวลายกเลิก',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `room_id`, `contract_no`, `create_date`, `end_date`, `price`, `earnest`, `status`, `type_id`, `customer_id`, `user_id`, `building_id`, `confirmed_at`, `canceled_at`, `created_at`, `updated_at`) VALUES
(1, 1, '20200223001', '2019-11-04', '2019-11-05', 10000, 0, 1, 1, 1, 1, 1, '2019-11-04 22:00:46', NULL, '2019-11-04 15:00:42', '2019-11-04 15:00:46'),
(7, 2, '20200223001', '2020-02-23', '2020-02-29', 7500, 7500, 1, 1, 7, 3, 1, NULL, NULL, NULL, NULL),
(8, 3, '20200309001', '2020-03-09', '2020-04-03', 7500, 7500, 1, 1, 4, 1, 1, NULL, NULL, NULL, NULL),
(9, 4, '20200309001', '2020-03-09', '2020-04-16', 7500, 7500, 1, 1, 2, 1, 1, NULL, NULL, NULL, NULL),
(10, 5, '20200309003', '2020-03-09', '2020-03-21', 7500, 7500, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(11, 6, '20200309003', '2020-03-09', '2020-04-01', 7500, 7500, 1, 1, 2, 1, 1, NULL, NULL, NULL, NULL),
(12, 9, '20200311001', '2020-03-11', '2020-04-01', 7500, 7500, 1, 1, 3, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสประเภทสัญญา',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อักษรนำหน้า เลขสัญญา',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'R', 'เช่า', '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, 'D', 'ซื้อขาย', '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(3, 'B', 'จอง', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสลูกค้า',
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อลูกค้า',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `amphur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` int(11) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `birthdate` date NOT NULL COMMENT 'วันเกิด',
  `idcard` bigint(20) NOT NULL COMMENT 'เลขบัตรประชาชน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `amphur`, `district`, `province`, `postcode`, `phone`, `birthdate`, `idcard`, `created_at`, `updated_at`) VALUES
(1, 'ผู้เช่า', 'ทดสอบ', 'ผู้เช่าทดสอบ', 'มวกเหล็ก', 'มวกเหล็ก', 'สระบุรี', 18180, '0222222222', '2019-11-04', 100, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, 'พนักงาน', 'ดูแล', 'บางเมือง', 'กบินทร์บุรี', 'บางเมือง', 'สมุทรปราการ', 10270, '255555555', '2020-02-05', 556653131353453, NULL, NULL),
(3, 'ลูกค้า', 'คนที่สอง', 'บ้าน', 'หดกหด', 'หดกหก', 'สมุทรปราการ', 10270, '8613131321', '2020-02-02', 4564641323123213, NULL, NULL),
(4, 'ทดสอบ', 'ทดลอง', 'บ้าน', 'อำเภอ', 'เมือง', 'เมือง', 10270, '08654', '2020-02-05', 64564646456, NULL, NULL),
(6, 'เทส', 'ทดสอบ', 'บ้าน', 'เมือง', 'เมือง', 'เมือง', 10270, '086498654', '2020-02-02', 3215987132146, NULL, NULL),
(7, 'รอ', 'ดู', 'บ้าน', 'เมือง', 'เมือง', 'เมือง', 10270, '255555555', '2020-01-29', 1322132312311, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `juristics`
--

CREATE TABLE `juristics` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสนิติบุคคล',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อนิติบุคคล',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `amphur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` int(11) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juristics`
--

INSERT INTO `juristics` (`id`, `name`, `address`, `amphur`, `district`, `province`, `postcode`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'นิติบุคคลทดสอบ', 'นิติบุคคลทดสอบ', 'ดงหลวง', 'กกตูม', 'มุกดาหาร', 49140, '0000000000', '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, 'test', '', '', '', '', 10, '', NULL, NULL),
(3, 'test', '', '', '', '', 0, '', NULL, NULL),
(4, 'test', '', '', '', '', 0, '', NULL, NULL),
(5, 'test', '', '', '', '', 0, '', NULL, NULL),
(6, 'test', '', '', '', '', 0, '', NULL, NULL),
(7, 'abc', '', '', '', '', 0, '', NULL, NULL),
(8, 'dda', '', '', '', '', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meter_logs`
--

CREATE TABLE `meter_logs` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'มิเตอร์น้ำ',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meter_current` int(50) DEFAULT NULL COMMENT 'เลขมิเตอร์น้ำปัจจุบัน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meter_logs`
--

INSERT INTO `meter_logs` (`id`, `description`, `created_at`, `updated_at`, `meter_current`) VALUES
(1, NULL, NULL, NULL, 80),
(2, NULL, NULL, NULL, 90),
(3, NULL, NULL, NULL, 100),
(4, NULL, NULL, NULL, 120),
(5, NULL, NULL, NULL, 130),
(6, NULL, NULL, NULL, 140),
(9, NULL, NULL, NULL, 150),
(10, NULL, NULL, NULL, 100),
(13, NULL, NULL, NULL, 110),
(14, NULL, NULL, NULL, 120),
(15, NULL, NULL, NULL, 20),
(16, NULL, NULL, NULL, 30),
(18, NULL, NULL, NULL, 40),
(19, NULL, NULL, NULL, 60),
(20, NULL, NULL, NULL, 70),
(21, NULL, NULL, NULL, 50),
(22, NULL, NULL, NULL, 40),
(23, NULL, NULL, NULL, 30),
(24, NULL, NULL, NULL, 50),
(25, NULL, NULL, NULL, 70),
(26, NULL, NULL, NULL, 0),
(27, NULL, NULL, NULL, 0),
(28, NULL, NULL, NULL, 0),
(29, NULL, NULL, NULL, 0),
(30, NULL, NULL, NULL, 0),
(31, NULL, NULL, NULL, 0),
(32, NULL, NULL, NULL, 0),
(33, NULL, NULL, NULL, 0),
(34, NULL, NULL, NULL, 0),
(35, NULL, NULL, NULL, 0),
(36, NULL, NULL, NULL, 0),
(37, NULL, NULL, NULL, 0),
(38, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meter_log_details`
--

CREATE TABLE `meter_log_details` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสรายการบันทึกมิเตอร์น้ำ',
  `meter_log_id` bigint(20) NOT NULL COMMENT 'รหัสบันทึกมิเตอร์น้ำ',
  `old_number` int(11) NOT NULL COMMENT 'เลขมิเตอร์เดิม',
  `new_number` int(11) DEFAULT NULL COMMENT 'เลขมิเตอร์ใหม่',
  `date_check` date NOT NULL COMMENT 'วันที่จดมิเตอร์',
  `price_water` decimal(8,2) NOT NULL,
  `month` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เดือนปี สำหรับคิดค่าน้ำ',
  `year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meter_log_details`
--

INSERT INTO `meter_log_details` (`id`, `meter_log_id`, `old_number`, `new_number`, `date_check`, `price_water`, `month`, `year`) VALUES
(356, 1, 70, 80, '2020-03-11', '120.00', 'February', '2020'),
(357, 2, 80, 90, '2020-03-11', '120.00', 'February', '2020'),
(358, 3, 90, 100, '2020-03-11', '120.00', 'February', '2020'),
(359, 4, 100, 120, '2020-03-11', '240.00', 'February', '2020'),
(360, 5, 120, 130, '2020-03-11', '120.00', 'February', '2020'),
(361, 6, 130, 140, '2020-03-11', '120.00', 'February', '2020'),
(362, 9, 140, 150, '2020-03-11', '120.00', 'February', '2020');

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
(3, '2016_01_04_173148_create_admin_tables', 1),
(4, '2019_07_06_043425_create_buildings_table', 1),
(5, '2019_07_06_043606_create_rooms_table', 1),
(6, '2019_07_13_225225_create_juristics_table', 1),
(7, '2019_07_13_225825_create_customers_table', 1),
(8, '2019_07_24_223716_create_contracts_table', 1),
(9, '2019_07_26_105421_create_orders_table', 1),
(10, '2019_07_26_105524_create_order_types_table', 1),
(11, '2019_07_26_105628_create_order_details_table', 1),
(12, '2019_07_26_105648_create_services_table', 1),
(13, '2019_07_26_105815_create_water_meters_table', 1),
(14, '2019_09_14_091516_create_payments_table', 1),
(15, '2019_09_15_101928_create_contract_types_table', 1),
(16, '2019_10_26_105827_meter_logs_table', 1),
(17, '2019_10_26_105904_meter_log_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'วันที่บิล',
  `room_id` int(11) DEFAULT NULL COMMENT 'รหัสห้อง',
  `customer_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `total_price` double NOT NULL COMMENT 'จำนวนเงินรวม',
  `order_date` datetime NOT NULL COMMENT 'วันที่บิล',
  `juristic_id` int(11) DEFAULT NULL COMMENT 'รหัสนิติบุคคล',
  `user_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `status` int(11) NOT NULL COMMENT 'สถานะเอกสาร',
  `payment_date` date NOT NULL COMMENT 'กำหนดชำระเงิน',
  `payment_at` datetime DEFAULT NULL COMMENT 'วันที่ชำระเงิน',
  `cash` double DEFAULT NULL COMMENT 'จำนวนเงินสด',
  `bank_slip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รูปสลิป',
  `fine_cash` double DEFAULT NULL COMMENT 'ค่าปรับ',
  `month` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `meterlog_details_id` int(50) DEFAULT NULL COMMENT 'ไอดีของค่าน้ำ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `room_id`, `customer_id`, `total_price`, `order_date`, `juristic_id`, `user_id`, `status`, `payment_date`, `payment_at`, `cash`, `bank_slip`, `fine_cash`, `month`, `year`, `description`, `meterlog_details_id`) VALUES
(1, 1, 1, 10600, '2019-11-04 22:01:06', 1, 1, 0, '2019-12-06', NULL, NULL, NULL, NULL, 'January', '2020', NULL, 1),
(40, 1, 1, 10000, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 1),
(41, 2, 7, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 2),
(42, 3, 4, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 3),
(43, 4, 2, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 4),
(44, 5, 1, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 5),
(45, 6, 2, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 6),
(46, 9, 3, 7500, '2020-03-11 00:00:00', 1, 1, 0, '2020-03-05', NULL, NULL, NULL, NULL, 'February', '2020', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสรายการในบิล',
  `service_id` int(11) NOT NULL COMMENT 'รหัสค่าบริการ',
  `amount` double NOT NULL COMMENT 'จำนวน',
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'หน่วย',
  `price` double NOT NULL COMMENT 'ราคา',
  `total` double NOT NULL COMMENT 'ราคารวม',
  `order_id` int(11) DEFAULT NULL COMMENT 'รหัสบิล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `service_id`, `amount`, `unit`, `price`, `total`, `order_id`) VALUES
(1, 5, 1, '', 600, 600, 1),
(2, 1, 1, 'เดือน', 10000, 10000, 1),
(3, 7, 1, '500', 500, 500, 1),
(4, 9, 1, '250', 250, 250, 1),
(5, 9, 1, '250', 250, 250, 1),
(199, 1, 1, 'เดือน', 10000, 10000, 0),
(200, 4, 1, '-', 0, 0, 0),
(201, 1, 1, 'เดือน', 7500, 7500, 0),
(202, 4, 1, '-', 7500, 7500, 0),
(203, 1, 1, 'เดือน', 7500, 7500, 0),
(204, 4, 1, '-', 7500, 7500, 0),
(205, 1, 1, 'เดือน', 7500, 7500, 0),
(206, 4, 1, '-', 7500, 7500, 0),
(207, 1, 1, 'เดือน', 7500, 7500, 0),
(208, 4, 1, '-', 7500, 7500, 0),
(209, 1, 1, 'เดือน', 7500, 7500, 0),
(210, 4, 1, '-', 7500, 7500, 0),
(211, 1, 1, 'เดือน', 10000, 10000, 21),
(212, 4, 1, '-', 0, 0, 21),
(213, 1, 1, 'เดือน', 7500, 7500, 22),
(214, 4, 1, '-', 7500, 7500, 22),
(215, 1, 1, 'เดือน', 7500, 7500, 23),
(216, 4, 1, '-', 7500, 7500, 23),
(217, 1, 1, 'เดือน', 7500, 7500, 24),
(218, 4, 1, '-', 7500, 7500, 24),
(219, 1, 1, 'เดือน', 7500, 7500, 25),
(220, 4, 1, '-', 7500, 7500, 25),
(221, 1, 1, 'เดือน', 7500, 7500, 26),
(222, 4, 1, '-', 7500, 7500, 26),
(223, 1, 1, 'เดือน', 10000, 10000, 27),
(224, 4, 1, '-', 0, 0, 27),
(225, 1, 1, 'เดือน', 7500, 7500, 28),
(226, 4, 1, '-', 7500, 7500, 28),
(227, 1, 1, 'เดือน', 7500, 7500, 29),
(228, 4, 1, '-', 7500, 7500, 29),
(229, 1, 1, 'เดือน', 7500, 7500, 30),
(230, 4, 1, '-', 7500, 7500, 30),
(231, 1, 1, 'เดือน', 7500, 7500, 31),
(232, 4, 1, '-', 7500, 7500, 31),
(233, 1, 1, 'เดือน', 7500, 7500, 32),
(234, 4, 1, '-', 7500, 7500, 32),
(235, 1, 1, 'เดือน', 10000, 10000, 33),
(236, 1, 1, 'เดือน', 7500, 7500, 34),
(237, 1, 1, 'เดือน', 7500, 7500, 35),
(238, 1, 1, 'เดือน', 7500, 7500, 36),
(239, 1, 1, 'เดือน', 7500, 7500, 37),
(240, 1, 1, 'เดือน', 7500, 7500, 38),
(241, 1, 1, 'เดือน', 7500, 7500, 39),
(242, 1, 1, 'เดือน', 10000, 10000, 40),
(243, 1, 1, 'เดือน', 7500, 7500, 41),
(244, 1, 1, 'เดือน', 7500, 7500, 42),
(245, 1, 1, 'เดือน', 7500, 7500, 43),
(246, 1, 1, 'เดือน', 7500, 7500, 44),
(247, 1, 1, 'เดือน', 7500, 7500, 45),
(248, 1, 1, 'เดือน', 7500, 7500, 46),
(249, 5, 1, '500', 500, 500, 42),
(250, 5, 1, '500', 500, 500, 42),
(251, 7, 1, '200', 200, 200, 42),
(252, 12, 1, '100', 100, 100, 1),
(253, 1, 0, '', 0, 0, 1),
(254, 1, 0, '', 0, 0, 1),
(255, 6, 1, '100', 100, 100, 1),
(256, 5, 1, '500', 500, 500, 41),
(257, 5, 1, '500', 500, 500, 41),
(258, 4, 1, '100', 100, 100, 41),
(259, 6, 1, '500', 500, 500, 41);

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสประเภทบิล',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อักษรนำหน้า เลขที่เอกสาร',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SR', 'บิลขาย', '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, 'BR', 'บิลซื้อ', '2019-11-04 15:00:21', '2019-11-04 15:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสห้อง',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อห้อง',
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียดห้อง',
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชั้น',
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ขนาดห้อง',
  `building_id` int(11) NOT NULL COMMENT 'รหัสอาคาร',
  `customer_id` int(11) DEFAULT NULL COMMENT 'รหัสลูกค้า',
  `water_number` int(11) NOT NULL COMMENT 'เลขมิเตอร์น้ำ',
  `water_price` double NOT NULL COMMENT 'ค่าน้ำมาตรฐาน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meter_logs_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `detail`, `floor`, `size`, `building_id`, `customer_id`, `water_number`, `water_price`, `created_at`, `updated_at`, `meter_logs_id`) VALUES
(1, '101', '', '1', '11', 1, 1, 10, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:46', 1),
(2, '102', '', '1', '11', 1, 7, 10, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:21', 2),
(3, '103', '', '1', '11', 1, 4, 10, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:21', 3),
(4, '104', '', '1', '11', 1, 2, 10, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:21', 4),
(5, '105', '', '1', '11', 1, 1, 0, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:21', 5),
(6, '106', '', '1', '11', 1, 2, 0, 12, '2019-11-04 15:00:21', '2019-11-04 15:00:21', 6),
(9, '107', 'มีหมอนนุ่มมาก ๆ', '1', '100', 1, 3, 0, 12, NULL, NULL, 9),
(10, '108', '', '1', '100', 1, 0, 0, 12, NULL, NULL, 10),
(13, '109', 'น่าอยู่', '1', '750', 1, 0, 0, 12, NULL, NULL, 13),
(14, '110', 'เจอพระอาทิต์', '1', '750', 1, 0, 0, 12, NULL, NULL, 14),
(15, '201', '', '2', '750', 1, 0, 0, 12, NULL, NULL, 15),
(16, '202', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 16),
(18, '203', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 18),
(19, '204', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 19),
(20, '205', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 20),
(21, '206', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 21),
(22, '207', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 22),
(23, '208', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 23),
(24, '209', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 24),
(25, '210', '', '2', '0', 1, 0, 0, 12, NULL, NULL, 25),
(26, '301', '', '3', '750', 1, 0, 0, 12, NULL, NULL, 26),
(27, '302', '', '3', '750', 1, 0, 0, 12, NULL, NULL, 27),
(28, '303', '', '3', '0', 1, NULL, 0, 12, NULL, NULL, 28),
(29, '304', '', '3', '0', 1, NULL, 0, 12, NULL, NULL, 29),
(30, '305', '', '3', '', 1, 0, 0, 12, NULL, NULL, 30),
(31, '306', '', '3', '', 1, 0, 0, 12, NULL, NULL, 31),
(32, '307', '', '3', '', 1, NULL, 0, 12, NULL, NULL, 32),
(33, '308', '', '3', '', 1, NULL, 0, 12, NULL, NULL, 33),
(34, '309', '', '3', '750 ตารางเมตร', 1, 0, 0, 12, NULL, NULL, 34),
(35, '310', '', '3', '750 ตารางเมตร', 1, 0, 0, 12, NULL, NULL, 35),
(36, '401', '', '4', '', 1, 0, 0, 12, NULL, NULL, 36),
(37, '402', 'มีก้อนเมฆใหญ่', '4', '750 ตารางเมตร', 1, 0, 0, 12, NULL, NULL, 37),
(38, '403', '', '4', '100 x 100', 1, 0, 0, 12, NULL, NULL, 38);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสค่าบริการ',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ประเภทค่าบริการ',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'หน่วยนับ',
  `price` double NOT NULL COMMENT 'ราคา',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `type`, `name`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', 'ค่าเช่า', 'เดือน', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(2, '2', 'ค่าน้ำประปา', 'หน่วย', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(3, '3', 'ค่าซื้อขายห้อง', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(4, '4', 'ค่ามัดจำ', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(5, '0', 'ซ่อมบำรุง', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(6, '0', 'ซักรีด', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(7, '0', 'ล้างรถ', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(8, '0', 'กุญแจ / คีย์การ์ด', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(9, '0', 'พัสดุ', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(10, '0', 'ร้องเรียน', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(11, '0', 'ค่าส่วนกลาง', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21'),
(12, '0', 'อื่นๆ', '', 0, '2019-11-04 15:00:21', '2019-11-04 15:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'รหัสพนักงาน',
  `name` varchar(191) NOT NULL COMMENT 'ชื่อพนักงาน',
  `lastname` varchar(191) NOT NULL COMMENT 'นามสกุล',
  `address` varchar(191) NOT NULL COMMENT 'ที่อยู่',
  `born` date NOT NULL COMMENT 'วัน เดือน ปี เกิด',
  `idcardno` bigint(50) NOT NULL COMMENT 'บัตรประชาชน',
  `phone` text NOT NULL COMMENT 'หมายเลขโทรศัพท์',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อสำหรับ login',
  `password` varchar(50) NOT NULL COMMENT 'pass สำหรับ login',
  `postcode` int(11) NOT NULL COMMENT 'เลขไปษณีย์',
  `degree` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `address`, `born`, `idcardno`, `phone`, `username`, `password`, `postcode`, `degree`) VALUES
(1, 'แอดมิน', 'นะจ๊ะ', 'บ้านไกล้ เรือนเคียง แถวๆ ชายแดน', '2020-02-02', 123456789, '866666', 'admin', 'admin', 10270, 'Admin'),
(3, 'ยูสเซอร์', 'นะจ๊ะ', 'แถว ๆ กทม', '2020-02-02', 64642313123, '083165687', 'don', 'don', 10270, 'user'),
(4, 'ไก่', 'นะจ๊ะ', 'สมุทรปราการ', '2020-02-02', 123456789, '0861235654', 'admin1', 'admin1', 10270, 'user'),
(14, 'ไข่', 'นะจ๊ะ', 'บ้านไกล้ เรือนเคียง แถวๆ ชายแดน', '2020-02-02', 123456789, '866666', 'admin2', 'admin2', 10270, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`),
  ADD UNIQUE KEY `admin_users_idcard_unique` (`idcard`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juristics`
--
ALTER TABLE `juristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_logs`
--
ALTER TABLE `meter_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_log_details`
--
ALTER TABLE `meter_log_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสอาคาร', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสสัญญา', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสัญญา', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `juristics`
--
ALTER TABLE `juristics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสนิติบุคคล', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meter_logs`
--
ALTER TABLE `meter_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'มิเตอร์น้ำ', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `meter_log_details`
--
ALTER TABLE `meter_log_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการบันทึกมิเตอร์น้ำ', AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'วันที่บิล', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการในบิล', AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทบิล', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสค่าบริการ', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
