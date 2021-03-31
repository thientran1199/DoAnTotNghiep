-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 27, 2021 lúc 03:46 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_webbandongho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'admintest1', '$2y$10$tQG8yKr3wKVdi6ZBK/9AZ.ZG2z0sRC03YZxEwsv347liAP9mpq/Di', 'admin', 'fgfZdOhlgvAfsmtiXs82TKh2sobOd4E1kFyQluVWOswKi9gh6n4tDBbUEe1R', NULL, NULL),
(7, 'customertest1', '$2y$10$4xvPDqqlAwTR7.WFumyk6e58H1XMUDnRziEnAQXHnfCslPBQt4lEu', 'customer', NULL, NULL, '2020-12-24 15:45:03'),
(10, 'customertest3', '$2y$10$Q2rvaoBVQTxnGCq36F6TnepFInTekTYYEPl5VMCg.SHq6zYXHNboC', 'customer', NULL, NULL, NULL),
(11, 'customertest2', '$2y$10$J5.K9ERXC3umW4ErUvIp/eSNTlG4oaVlBkpCnMEyJi7rwHEEzuyIa', 'customer', NULL, '2020-11-24 09:06:45', '2020-11-24 09:06:45'),
(12, 'customertest4', '$2y$10$NJxrCGbM0wmckKu5RGLM6ebbgRjtQbo1cFy6WErKHbomkg0TdRV/a', 'customer', NULL, '2020-11-24 09:11:05', '2020-11-24 09:11:05'),
(13, 'admintest2', '$2y$10$MTn8wmOryvcujUrkbZyvR.97MhCYHoD7lFqnoBrtzXoKFwYrTmmHi', 'admin', NULL, '2020-11-29 09:26:27', '2020-11-29 09:26:27'),
(17, 'customertest10', '$2y$10$xIazwhuXDw4viMeKmLkFgOmchKLI/Is6spOGgVWqwx3PEDBa2AF.u', 'customer', NULL, '2021-01-24 14:15:45', '2021-01-24 14:15:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `person_id`, `identity`, `created_at`, `updated_at`) VALUES
(1, 1, '001098014017', '2020-11-20 14:08:28', '2020-11-20 14:08:28'),
(2, 6, '001098014016', '2020-11-29 09:26:27', '2020-11-29 09:26:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Khác', '2020-10-25 10:06:00', '2020-11-15 22:41:13'),
(9, 'Đồng hồ treo tường', '2020-10-25 10:06:54', '2020-10-25 10:06:54'),
(10, 'Đồng hồ để bàn', '2020-10-25 10:07:10', '2020-10-25 10:07:10'),
(11, 'Đồng hồ tủ đứng', '2020-10-25 10:07:18', '2020-11-02 09:59:54'),
(12, 'Đồng hồ đeo tay', '2020-10-25 10:07:30', '2020-10-25 10:07:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thường',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `person_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 'Vip', NULL, '2020-11-30 09:59:16'),
(2, 3, 'Thường', '2020-11-24 08:37:49', '2020-11-24 08:37:49'),
(3, 4, 'Vip', '2020-11-24 09:06:45', '2020-12-21 04:47:03'),
(4, 5, 'Thường', '2020-11-24 09:11:06', '2020-11-24 09:11:06'),
(8, 10, 'Thường', '2021-01-24 14:15:45', '2021-01-24 14:15:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_shipping_address`
--

CREATE TABLE `customer_shipping_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_shipping_address`
--

INSERT INTO `customer_shipping_address` (`id`, `customer_id`, `recipient_name`, `recipient_phone`, `province`, `district`, `wards`, `address_detail`, `default`, `created_at`, `updated_at`) VALUES
(11, 1, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', 1, '2020-11-26 10:15:25', '2020-12-01 18:08:07'),
(12, 1, 'Nguyễn B', '0123213125', 'Hà Nội', 'Bắc Từ Liêm', 'phường a', 'CT Khu đô thị', 0, '2020-11-26 10:15:42', '2020-12-19 16:35:58'),
(19, 3, 'Nguyễn B', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', 0, '2020-11-28 04:15:55', '2020-12-01 17:59:09'),
(23, 2, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'phường a', 'CT Khu đô thị', 1, '2020-12-01 18:07:01', '2020-12-01 18:07:01'),
(24, 1, 'Nguyễn E', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', 0, '2020-12-24 16:55:32', '2020-12-24 16:55:32'),
(25, 8, 'Linh', '0123456789', 'HN', 'Ba đình', 'abc', 'số 11, đường xyz', 1, '2021-01-24 14:17:22', '2021-01-24 14:17:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 3, 'ProductId3ImageId0.png', '2020-11-02 09:36:27', '2020-11-02 09:36:27'),
(8, 3, 'ProductId3ImageId1.png', '2020-11-02 09:36:28', '2020-11-02 09:36:28'),
(9, 3, 'ProductId3ImageId2.png', '2020-11-02 09:36:28', '2020-11-02 09:36:28'),
(10, 3, 'ProductId3ImageId3.png', '2020-11-02 09:36:28', '2020-11-02 09:36:28'),
(14, 5, 'ProductId5ImageId0.png', '2020-11-02 09:54:51', '2020-11-02 09:54:51'),
(15, 5, 'ProductId5ImageId1.png', '2020-11-02 09:54:51', '2020-11-02 09:54:51'),
(16, 5, 'ProductId5ImageId2.png', '2020-11-02 09:54:51', '2020-11-02 09:54:51'),
(17, 5, 'ProductId5ImageId3.png', '2020-11-02 09:54:51', '2020-11-02 09:54:51'),
(18, 6, 'ProductId6ImageId0.png', '2020-11-02 09:58:04', '2020-11-02 09:58:04'),
(19, 6, 'ProductId6ImageId1.png', '2020-11-02 09:58:04', '2020-11-02 09:58:04'),
(20, 6, 'ProductId6ImageId2.png', '2020-11-02 09:58:04', '2020-11-02 09:58:04'),
(21, 6, 'ProductId6ImageId3.png', '2020-11-02 09:58:04', '2020-11-02 09:58:04'),
(22, 7, 'ProductId7ImageId0.png', '2020-11-02 10:04:28', '2020-11-02 10:04:28'),
(23, 7, 'ProductId7ImageId1.png', '2020-11-02 10:04:28', '2020-11-02 10:04:28'),
(24, 7, 'ProductId7ImageId2.png', '2020-11-02 10:04:28', '2020-11-02 10:04:28'),
(25, 7, 'ProductId7ImageId3.png', '2020-11-02 10:04:28', '2020-11-02 10:04:28'),
(26, 8, 'ProductId8ImageId0.png', '2020-11-02 10:09:33', '2020-11-02 10:09:33'),
(27, 8, 'ProductId8ImageId1.png', '2020-11-02 10:09:33', '2020-11-02 10:09:33'),
(28, 8, 'ProductId8ImageId2.png', '2020-11-02 10:09:33', '2020-11-02 10:09:33'),
(29, 8, 'ProductId8ImageId3.png', '2020-11-02 10:09:33', '2020-11-02 10:09:33'),
(30, 9, 'ProductId9ImageId0.png', '2020-11-02 10:13:18', '2020-11-02 10:13:18'),
(31, 9, 'ProductId9ImageId1.png', '2020-11-02 10:13:18', '2020-11-02 10:13:18'),
(32, 9, 'ProductId9ImageId2.png', '2020-11-02 10:13:18', '2020-11-02 10:13:18'),
(33, 10, 'ProductId10ImageId0.png', '2020-11-02 10:19:17', '2020-11-02 10:19:17'),
(34, 10, 'ProductId10ImageId1.png', '2020-11-02 10:19:17', '2020-11-02 10:19:17'),
(35, 10, 'ProductId10ImageId2.png', '2020-11-02 10:19:17', '2020-11-02 10:19:17'),
(36, 11, 'ProductId11ImageId0.png', '2020-11-02 10:22:37', '2020-11-02 10:22:37'),
(37, 11, 'ProductId11ImageId1.png', '2020-11-02 10:22:37', '2020-11-02 10:22:37'),
(38, 11, 'ProductId11ImageId2.png', '2020-11-02 10:22:37', '2020-11-02 10:22:37'),
(39, 12, 'ProductId12ImageId0.png', '2020-11-02 10:25:25', '2020-11-02 10:25:25'),
(40, 12, 'ProductId12ImageId1.png', '2020-11-02 10:25:25', '2020-11-02 10:25:25'),
(41, 12, 'ProductId12ImageId2.png', '2020-11-02 10:25:25', '2020-11-02 10:25:25'),
(42, 13, 'ProductId13ImageId0.png', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(43, 13, 'ProductId13ImageId1.png', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(44, 13, 'ProductId13ImageId2.png', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(45, 13, 'ProductId13ImageId3.png', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(46, 14, 'ProductId14ImageId0.png', '2020-11-02 10:33:07', '2020-11-02 10:33:07'),
(47, 14, 'ProductId14ImageId1.png', '2020-11-02 10:33:07', '2020-11-02 10:33:07'),
(48, 14, 'ProductId14ImageId2.png', '2020-11-02 10:33:08', '2020-11-02 10:33:08'),
(49, 14, 'ProductId14ImageId3.png', '2020-11-02 10:33:08', '2020-11-02 10:33:08'),
(50, 15, 'ProductId15ImageId0.png', '2020-11-02 10:37:07', '2020-11-02 10:37:07'),
(51, 15, 'ProductId15ImageId1.png', '2020-11-02 10:37:07', '2020-11-02 10:37:07'),
(52, 15, 'ProductId15ImageId2.png', '2020-11-02 10:37:07', '2020-11-02 10:37:07'),
(53, 15, 'ProductId15ImageId3.png', '2020-11-02 10:37:07', '2020-11-02 10:37:07'),
(54, 16, 'ProductId16ImageId0.png', '2020-11-02 10:39:55', '2020-11-02 10:39:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_22_150519_create_account_table', 1),
(3, '2020_10_23_133209_create_category_table', 2),
(4, '2020_10_26_163439_create_product_table', 3),
(5, '2020_10_26_163700_create_image_table', 3),
(6, '2020_11_15_125605_create_slide_table', 4),
(7, '2020_11_17_135053_create_shipping_address_table', 5),
(8, '2020_11_17_134241_create_payment_table', 6),
(15, '2020_11_17_134548_create_review_table', 7),
(16, '2020_11_17_154242_create_order_table', 7),
(17, '2020_11_17_180524_create_order_item_table', 7),
(18, '2020_11_18_165543_create_person_table', 7),
(19, '2020_11_18_165658_create_admin_table', 7),
(20, '2020_11_18_165705_create_customer_table', 7),
(21, '2020_11_19_094708_create_customer_shipping_address_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_address_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xử lý',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `shipping_address_id`, `payment_id`, `customer_id`, `total_quantity`, `grand_total`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 43900000, NULL, 'Đã nhận hàng', '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(2, 2, 2, 1, 12, 77800000, 'nhanh nhé', 'Đã nhận hàng', '2020-11-27 02:22:12', '2020-11-27 02:22:12'),
(3, 3, 3, 3, 1, 1400000, NULL, 'Đã nhận hàng', '2020-11-28 04:16:03', '2020-11-28 04:16:03'),
(4, 4, 4, 1, 1, 1400000, 'chuyển nhanh nhá', 'Đã nhận hàng', '2020-11-28 12:10:52', '2020-11-28 12:10:52'),
(5, 5, 5, 1, 2, 11000000, NULL, 'Hủy', '2020-11-28 12:29:11', '2020-11-28 12:48:45'),
(6, 6, 6, 1, 1, 13500000, NULL, 'Đã nhận hàng', '2020-11-29 04:42:40', '2020-11-30 09:06:32'),
(7, 7, 7, 2, 6, 101000000, 'Chuyển cẩn thận nhé', 'Đã nhận hàng', '2020-11-30 10:12:52', '2020-12-20 18:55:47'),
(8, 8, 8, 1, 4, 128000000, NULL, 'Đã nhận hàng', '2020-12-01 15:33:29', '2021-01-21 16:18:43'),
(9, 9, 9, 3, 4, 128000000, NULL, 'Hủy', '2020-12-01 15:35:18', '2020-12-01 15:36:30'),
(10, 10, 10, 3, 4, 128000000, NULL, 'Chờ xử lý', '2020-12-01 15:38:29', '2020-12-01 15:38:29'),
(11, 11, 11, 1, 1, 12800000, NULL, 'Đã nhận hàng', '2020-12-21 05:01:59', '2020-12-21 05:03:30'),
(12, 12, 12, 1, 3, 84000000, 'Yep test', 'Đang giao', '2021-01-03 13:44:53', '2021-01-23 15:27:33'),
(13, 13, 13, 1, 11, 27700000, 'Test ngày 22/1', 'Đã nhận hàng', '2021-01-22 08:00:41', '2021-01-23 15:26:57'),
(14, 14, 14, 8, 1, 13500000, NULL, 'Chờ xử lý', '2021-01-24 14:18:04', '2021-01-24 14:18:04'),
(15, 15, 15, 1, 2, 11000000, 'test đ', 'Chờ xử lý', '2021-01-25 06:49:29', '2021-01-25 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED NOT NULL,
  `price_sell` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `review_id`, `price_sell`, `quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1400000, 1, 1400000, '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(2, 1, 5, 2, 5500000, 1, 5500000, '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(3, 1, 6, 3, 1000000, 1, 1000000, '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(4, 1, 7, 4, 10500000, 1, 10500000, '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(5, 1, 8, 5, 25500000, 1, 25500000, '2020-11-27 02:18:25', '2020-11-27 02:18:25'),
(6, 2, 3, 6, 1400000, 7, 9800000, '2020-11-27 02:22:13', '2020-11-27 02:22:13'),
(7, 2, 5, 7, 5500000, 1, 5500000, '2020-11-27 02:22:13', '2020-11-27 02:22:13'),
(8, 2, 6, 8, 1000000, 1, 1000000, '2020-11-27 02:22:14', '2020-11-27 02:22:14'),
(9, 2, 7, 9, 10500000, 1, 10500000, '2020-11-27 02:22:14', '2020-11-27 02:22:14'),
(10, 2, 8, 10, 25500000, 2, 51000000, '2020-11-27 02:22:14', '2020-11-27 02:22:14'),
(11, 3, 3, 11, 1400000, 1, 1400000, '2020-11-28 04:16:03', '2020-11-28 04:16:03'),
(12, 4, 3, 12, 1400000, 1, 1400000, '2020-11-28 12:10:52', '2020-11-28 12:10:52'),
(13, 5, 5, 13, 5500000, 2, 11000000, '2020-11-28 12:29:11', '2020-11-28 12:29:11'),
(14, 6, 15, 14, 13500000, 1, 13500000, '2020-11-29 04:42:40', '2020-11-29 04:42:40'),
(15, 7, 9, 15, 17500000, 1, 17500000, '2020-11-30 10:12:53', '2020-11-30 10:12:53'),
(16, 7, 10, 16, 18000000, 1, 18000000, '2020-11-30 10:12:53', '2020-11-30 10:12:53'),
(17, 7, 11, 17, 28500000, 1, 28500000, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(18, 7, 7, 18, 10500000, 1, 10500000, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(19, 7, 8, 19, 25500000, 1, 25500000, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(20, 7, 6, 20, 1000000, 1, 1000000, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(21, 8, 16, 21, 32000000, 4, 128000000, '2020-12-01 15:33:29', '2020-12-01 15:33:29'),
(22, 9, 16, 22, 32000000, 4, 128000000, '2020-12-01 15:35:18', '2020-12-01 15:35:18'),
(23, 10, 16, 23, 32000000, 4, 128000000, '2020-12-01 15:38:29', '2020-12-01 15:38:29'),
(24, 11, 14, 24, 12800000, 1, 12800000, '2020-12-21 05:02:00', '2020-12-21 05:02:00'),
(25, 12, 13, 25, 48500000, 1, 48500000, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(26, 12, 10, 26, 18000000, 1, 18000000, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(27, 12, 9, 27, 17500000, 1, 17500000, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(28, 13, 3, 28, 1400000, 8, 11200000, '2021-01-22 08:00:42', '2021-01-22 08:00:42'),
(29, 13, 5, 29, 5500000, 3, 16500000, '2021-01-22 08:00:42', '2021-01-22 08:00:42'),
(30, 14, 15, 30, 13500000, 1, 13500000, '2021-01-24 14:18:04', '2021-01-24 14:18:04'),
(31, 15, 5, 31, 5500000, 2, 11000000, '2021-01-25 06:49:29', '2021-01-25 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `method`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COD', 'Đã thanh toán', '2020-11-27 02:18:24', '2020-11-27 02:18:24'),
(2, 'COD', 'Đã thanh toán\r\n', '2020-11-27 02:22:12', '2020-11-27 02:22:12'),
(3, 'COD', 'Đã thanh toán\r\n', '2020-11-28 04:16:03', '2020-11-28 04:16:03'),
(4, 'COD', 'Đã thanh toán\r\n', '2020-11-28 12:10:51', '2020-11-28 12:10:51'),
(5, 'COD', 'Chưa thanh toán\r\n', '2020-11-28 12:29:11', '2020-11-28 12:29:11'),
(6, 'COD', 'Đã thanh toán\r\n', '2020-11-29 04:42:40', '2020-11-29 04:42:40'),
(7, 'COD', 'Đã thanh toán', '2020-11-30 10:12:52', '2020-12-20 18:55:47'),
(8, 'COD', 'Đã thanh toán', '2020-12-01 15:33:29', '2021-01-21 16:18:43'),
(9, 'COD', 'Chưa thanh toán', '2020-12-01 15:35:18', '2020-12-01 15:35:18'),
(10, 'COD', 'Chưa thanh toán', '2020-12-01 15:38:29', '2020-12-01 15:38:29'),
(11, 'COD', 'Đã thanh toán', '2020-12-21 05:01:59', '2020-12-21 05:03:30'),
(12, 'COD', 'Chưa thanh toán', '2021-01-03 13:44:52', '2021-01-03 13:44:52'),
(13, 'COD', 'Đã thanh toán', '2021-01-22 08:00:41', '2021-01-23 15:26:57'),
(14, 'COD', 'Chưa thanh toán', '2021-01-24 14:18:04', '2021-01-24 14:18:04'),
(15, 'COD', 'Chưa thanh toán', '2021-01-25 06:49:29', '2021-01-25 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`id`, `account_id`, `full_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 6, 'Hư Sinh Hoa', 'Nam', 'Hà Nội', '1990-11-12', '0123567890', 'example@mail.com', NULL, '2020-11-25 07:27:28'),
(2, 7, 'Cao Lẫm', 'Nam', 'Hà Nội', '1990-11-12', '0123567890', 'example@mail.com', NULL, '2020-12-25 09:49:49'),
(3, 10, 'Lung Linh', 'Nữ', 'Hà Nội', '1998-11-25', '0123456789', 'hung@mail.com', '2020-11-24 08:37:49', '2020-11-24 08:37:49'),
(4, 11, 'Kiều Phong', 'Nam', 'Cái Bang', '1998-11-25', '0123456788', NULL, '2020-11-24 09:06:45', '2020-11-24 09:06:45'),
(5, 12, 'Kiều Công Tiễn', 'Nam', 'Hà Nội', '1998-11-25', '0123456787', NULL, '2020-11-24 09:11:06', '2020-11-24 09:11:06'),
(6, 13, 'Lam Linh', 'Nữ', 'Hà Tây', '1999-12-27', '0123012322', 'Lung@mail.com', '2020-11-29 09:26:27', '2020-12-01 14:32:44'),
(10, 17, 'Nguyễn A', 'Nam', 'Quảng Nam', '1998-12-21', '0123456789', NULL, '2021-01-24 14:15:45', '2021-01-24 14:15:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `quantity_in_stock` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `brand`, `origin`, `price`, `promotion_price`, `description`, `enabled`, `quantity_in_stock`, `views`, `created_at`, `updated_at`) VALUES
(3, 12, 'Đồng Hồ Seiko LM', 'Seiko', 'Nhật bản', 1500000, 1400000, '<p>Vỏ lacke,size 35,6mm</p>\r\n\r\n<p>Mặt số v&agrave; m&aacute;y qu&aacute; đẹp</p>', 1, 92, 102, '2020-11-02 09:36:27', '2021-01-25 03:07:26'),
(5, 12, 'Đồng hồ Seiko Crown Special', 'Seiko', 'Nhật bản', 5500000, 0, '<p>Thương hiệu đồng hồ đến từ đất nước mặt trời mọc <img alt=\"🇯🇵\" src=\"https://www.facebook.com/images/emoji.php/v9/t76/1/16/1f1ef_1f1f5.png\" width=\"16\" /></p>\r\n\r\n<p>Th&acirc;n vỏ bọc v&agrave;ng to&agrave;n bộ 14k Gold Filled</p>\r\n\r\n<p>Size 36,5mm chưa n&uacute;m zin</p>\r\n\r\n<p>Bộ m&aacute;y c&oacute;t tay Special s&aacute;ng đẹp chạy chuẩn chỉ</p>', 1, 97, 19, '2020-11-02 09:54:51', '2021-01-27 02:41:36'),
(6, 12, 'Đồng hồ quartz Thụy sỹ', 'WENGER', 'Thụy sỹ', 1000000, 0, '<p>Zin 100% cả d&acirc;y kho&aacute;</p>\r\n\r\n<p>Độ mới cũng rất gần 100%</p>\r\n\r\n<p>Vỏ inox,size 34 li</p>', 1, 99, 17, '2020-11-02 09:58:04', '2020-12-29 10:21:30'),
(7, 9, 'ĐỒNG HỒ CARREZ THÙNG DÀI', 'Carrez', 'Pháp', 10500000, 0, '<h1>CHẠM TRỔ K&Iacute;NH R&Agrave;O CỔ K&Iacute;NH</h1>', 1, 99, 5, '2020-11-02 10:04:28', '2021-01-25 03:06:56'),
(8, 9, 'ĐỒNG HỒ FFR THÙNG DÀI', 'FFR', 'Pháp', 25500000, 0, '<h1>CHẠM TRỔ CỔ K&Iacute;NH GI&Aacute; TRỊ HIẾM C&Oacute;</h1>', 1, 99, 6, '2020-11-02 10:09:33', '2021-01-23 09:36:25'),
(9, 10, 'BỘ ĐỒNG HỒ CHÂN NẾN TÌNH YÊU VĨNH CỬU', 'Không có', 'Ý', 17500000, 0, '<p>Được l&agrave;m ho&agrave;n to&agrave;n bằng đồng c&ugrave;ng đ&aacute; cẩm thạch cao cấp</p>\r\n\r\n<p>Bộ hai ch&acirc;n nến với năm đế mỗi b&ecirc;n được l&agrave;m nổi bật bằng đ&aacute; cẩm thạch</p>\r\n\r\n<p>Bức tượng đ&ocirc;i uy&ecirc;n ương bằng đồng tượng chưng cho sựu vĩnh cửu của t&igrave;nh y&ecirc;u&nbsp;</p>\r\n\r\n<p>ph&iacute;a dưới l&agrave; chiếc đồng hồ với mặt số in La M&atilde; rất rất đẹp</p>\r\n\r\n<p><strong>Th&ocirc;ng Tin Đặc T&iacute;nh :</strong></p>\r\n\r\n<p>Model : Đồng hồ ITALIA</p>\r\n\r\n<p>Mặt số : Số in La M&atilde;</p>\r\n\r\n<p>Bản nhạc :&nbsp;Chu&ocirc;ng ch&eacute;n b&iacute;nh boong</p>', 1, 98, 0, '2020-11-02 10:13:18', '2021-01-23 15:27:33'),
(10, 9, 'ĐỒNG HỒ ODO 54/8', 'ODO', 'Pháp', 18500000, 18000000, '<p>Thường được biết đến l&agrave; thương hiệu h&agrave;ng đầu về đồng hồ cổ v&agrave; kh&ocirc;ng phải ngẫu nhi&ecirc;n m&agrave; danh tiếng đ&oacute; tồn tại đến tận hiện tại v&agrave; cả mai sau.Những chiếc đồng hồ đến từ thương hiệu ODO lu&ocirc;n sở hữu một sự tinh tế hiếm c&oacute;.Trước hết l&agrave; phần th&ugrave;ng với chất liệu ho&agrave;n to&agrave;n được l&agrave;m từ gỗ sồi tự nhi&ecirc;n l&agrave;m nổi n&ecirc;n c&aacute;c v&acirc;n gỗ rất vừa mắt.Kh&ocirc;ng những thế c&ograve;n được chạm trổ những đường n&eacute;t họa tiết v&agrave; đường kẻ đẹp xong xong.Tất cả h&ograve;a lại tạo n&ecirc;n phần th&ugrave;ng đậm chất cổ k&iacute;nh, ho&agrave;i cổ.Th&ecirc;m nữa tr&ecirc;n phần thiết kế đ&oacute; l&agrave; một mặt số in tr&ecirc;n nền trắng bạc c&ograve;n rất đẹp c&ugrave;ng phần k&iacute;nh tr&aacute;ng gương nổi bật quả lắc s&aacute;ng b&ecirc;n trong nổi bật nhưng k l&agrave;m mất đi n&eacute;t cổ k&iacute;nh của thiết kế</p>\r\n\r\n<p>B&ecirc;n trong phần th&ugrave;ng đẹp l&agrave; một bộ m&aacute;y v&aacute;ch đồng v&agrave;ng c&ugrave;ng củ g&ocirc;ng 101 nổi tiếng cho ra &acirc;m thanh bản nhạc Westminster ng&acirc;n vang gợi nhớ một thời.</p>', 1, 28, 7, '2020-11-02 10:19:17', '2021-01-25 05:56:40'),
(11, 9, 'ĐỒNG HỒ ODO 36/8', 'ODO', 'Pháp', 28500000, 0, '<p>Nhắc đến ODO l&agrave; nhắc đến những &acirc;m thanh tiếng chu&ocirc;ng ng&acirc;y ngất l&agrave;m thỏa m&atilde;n t&acirc;m hồn v&agrave; tạo cảm gi&aacute;c thư gi&atilde;n cho người thưởng nhạc v&agrave; chiếc ODO 36/8 đ&acirc;y l&agrave; một trong những chiếc l&agrave;m rất tốt điều đ&oacute;.</p>\r\n\r\n<p>Trước khi thưởng thức &acirc;m thanh thứ m&agrave; ta được chi&ecirc;m ngưỡng đ&oacute; l&agrave; một chiếc đồng hồ kieur d&aacute;ng th&ugrave;ng d&agrave;i đặc trưng của đời 36.Một phần th&ugrave;ng được chạm trổ c&aacute;c đường n&eacute;t tạo n&ecirc;n hai chi tiết ch&ugrave;m nho đầy vẻ cổ k&iacute;nh.Một mặt số b&aacute;t gi&aacute;c đẹp mộc mạc c&ugrave;ng với phần k&iacute;nh quả lắc được tạo viền v&aacute;t theo h&igrave;nh ảnh độc đ&aacute;o tạo sự ấn tượng nhẹ nh&agrave;ng.B&ecirc;n trong lớp vỏ th&ugrave;ng đẹp đ&oacute; l&agrave; bộ m&aacute;y ba v&aacute;ch đồng v&agrave;ng c&ugrave;ng bộ g&ocirc;ng th&eacute;p xanh d&agrave;i - thứ tạo n&ecirc;n &acirc;m thanh si&ecirc;u l&ograve;ng của thương hiệu ODO.</p>\r\n\r\n<p>&Acirc;m thanh của chiếc đồng hồ kh&ocirc;ng chỉ đem lại cảm gi&aacute;c thư th&aacute;i cho người nghe m&agrave; c&ograve;n l&agrave; những &acirc;m thanh ho&agrave;i niệm về một thời xưa cũ.Mỗi khi nghe lại những &acirc;m thanh bản nhạc West th&acirc;n thuộc, mỗi người lại tự gợi nhớ cho m&igrave;nh những kỉ niệm gắn liền với n&oacute;,những kỉ niệm đ&atilde; cũ lại như vừa mới đ&acirc;y.</p>', 1, 45, 1, '2020-11-02 10:22:37', '2020-12-20 18:55:42'),
(12, 9, 'ĐỒNG HỒ JURA THÙNG BÈ LƯỢN SÓNG CHÙM HOA ĐẸP', 'JURA', 'Pháp', 10500000, 10000000, NULL, 1, 14, 2, '2020-11-02 10:25:25', '2021-01-22 04:03:56'),
(13, 9, 'SIÊU PHẨM ODO 54/8 THÙNG BA BUỒNG', 'ODO', 'Pháp', 49500000, 48500000, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&aacute;y</td>\r\n			<td>M&aacute;y ba v&aacute;ch đồng v&agrave;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thương hiệu</td>\r\n			<td>ODO</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại đồng hồ</td>\r\n			<td>Th&ugrave;ng b&egrave;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu mặt số</td>\r\n			<td>Mặt b&aacute;t gi&aacute;c nằm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại mặt số</td>\r\n			<td>Mặt số nổi Crom</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số lượng G&ocirc;ng</td>\r\n			<td>8 g&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại liệu g&ocirc;ng, củ g&ocirc;ng</td>\r\n			<td>Củ g&ocirc;ng 101</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số bản nhạc</td>\r\n			<td>1 bản nhạc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bản nhạc</td>\r\n			<td>Wesminster</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất sứ</td>\r\n			<td>Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;nh quả lắc</td>\r\n			<td>K&iacute;nh tr&aacute;ng gương hoa văn</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, 25, 5, '2020-11-02 10:29:39', '2021-01-25 04:12:24'),
(14, 8, 'ĐỒNG HỒ LONGINES SẤM SÉT', 'Longines', 'Thụy sỹ', 13800000, 12800000, '', 1, 4, 3, '2020-11-02 10:33:07', '2021-01-23 09:44:10'),
(15, 12, 'ĐỒNG HỒ LONGINES CONQUETS 3 SAO', 'Longines', 'Thụy sỹ', 14500000, 13500000, '', 1, 8, 3, '2020-11-02 10:37:07', '2020-12-01 18:08:24'),
(16, 8, 'ĐỒNG HỒ OMEGA CONSTELLATION', 'OMEGA', 'Thụy sỹ', 32500000, 32000000, '<p>Đồng hồ cổ Omega&nbsp;Constellation bản th&eacute;p mặt số b&aacute;t qu&aacute;i c&agrave;ng gẫy đường k&iacute;nh 34mm chưa t&iacute;nh n&uacute;m. Sản xuất những năm 1966&nbsp; với kiểu d&aacute;ng sang trọng cổ điển đẳng cấp. Vỏ được l&agrave;m từ th&eacute;p đ&aacute;nh b&oacute;ng, nắp đ&aacute;y c&oacute; biểu tượng đ&agrave;i thi&ecirc;n văn. Hiển thị 3 kim v&agrave; 1 lịch ng&agrave;y</p>\r\n\r\n<p>Omega&nbsp;Constellation sản xuất khoảng năm 1966</p>\r\n\r\n<p>Mặt b&aacute;t qu&aacute;i c&agrave;ng gẫy, mặt số đẹp ho&agrave;n hảo</p>\r\n\r\n<p>Hiển thị 3 kim 1 lịch ng&agrave;y</p>\r\n\r\n<p>Đường k&iacute;nh 34mm chưa t&iacute;nh n&uacute;m</p>\r\n\r\n<p>Nắp đ&aacute;y đ&agrave;i thi&ecirc;n văn sắc n&eacute;t với 8 ng&ocirc;i sao</p>\r\n\r\n<p>M&aacute;y 564 trong t&igrave;nh trang đẹp, độ mới cao</p>\r\n\r\n<p>Cọc kim, số trong t&igrave;nh trạng đẹp ho&agrave;n hảo</p>', 1, 0, 9, '2020-11-02 10:39:55', '2020-12-29 09:20:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `rate`, `comment`, `reviewed`, `created_at`, `updated_at`) VALUES
(1, 5, 'Tốt', 1, '2020-11-27 02:18:24', '2020-11-28 03:42:47'),
(2, 5, 'Đắt quá nhưng tốt', 1, '2020-11-27 02:18:24', '2020-11-28 12:26:16'),
(3, 4, 'bthg', 1, '2020-11-27 02:18:24', '2020-11-30 10:10:44'),
(4, 5, 'good', 1, '2020-11-27 02:18:24', '2020-11-30 10:10:32'),
(5, 4, 'dat qua ban oi', 1, '2020-11-27 02:18:24', '2020-11-30 10:10:57'),
(6, 3, NULL, 1, '2020-11-27 02:22:12', '2020-12-01 17:38:45'),
(7, 4, 'cũng được', 1, '2020-11-27 02:22:13', '2020-12-20 09:21:19'),
(8, 4, 'hay hú', 1, '2020-11-27 02:22:13', '2020-11-30 14:49:18'),
(9, NULL, NULL, 0, '2020-11-27 02:22:14', '2020-11-27 02:22:14'),
(10, 5, 'Chát quá bác', 1, '2020-11-27 02:22:14', '2020-11-28 12:56:43'),
(11, 4, 'Hàng tốt bạn ơi', 1, '2020-11-28 04:16:03', '2020-11-28 04:16:35'),
(12, 4, 'Hàng tốt', 1, '2020-11-28 12:10:52', '2020-11-28 12:11:31'),
(13, NULL, NULL, 0, '2020-11-28 12:29:11', '2020-11-28 12:29:11'),
(14, 1, NULL, 1, '2020-11-29 04:42:40', '2020-12-01 17:37:21'),
(15, NULL, NULL, 0, '2020-11-30 10:12:52', '2020-11-30 10:12:52'),
(16, NULL, NULL, 0, '2020-11-30 10:12:53', '2020-11-30 10:12:53'),
(17, NULL, NULL, 0, '2020-11-30 10:12:53', '2020-11-30 10:12:53'),
(18, NULL, NULL, 0, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(19, NULL, NULL, 0, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(20, NULL, NULL, 0, '2020-11-30 10:12:54', '2020-11-30 10:12:54'),
(21, NULL, NULL, 0, '2020-12-01 15:33:29', '2020-12-01 15:33:29'),
(22, NULL, NULL, 0, '2020-12-01 15:35:18', '2020-12-01 15:35:18'),
(23, NULL, NULL, 0, '2020-12-01 15:38:29', '2020-12-01 15:38:29'),
(24, 4, 'test ngày 23/1', 1, '2020-12-21 05:01:59', '2021-01-23 09:43:53'),
(25, NULL, NULL, 0, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(26, NULL, NULL, 0, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(27, NULL, NULL, 0, '2021-01-03 13:44:53', '2021-01-03 13:44:53'),
(28, NULL, NULL, 0, '2021-01-22 08:00:41', '2021-01-22 08:00:41'),
(29, NULL, NULL, 0, '2021-01-22 08:00:42', '2021-01-22 08:00:42'),
(30, NULL, NULL, 0, '2021-01-24 14:18:04', '2021-01-24 14:18:04'),
(31, NULL, NULL, 0, '2021-01-25 06:49:29', '2021-01-25 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `recipient_name`, `recipient_phone`, `province`, `district`, `wards`, `address_detail`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn B', '0123213125', 'Hà Nội', 'Bắc Từ Liêm', 'phường a', 'CT Khu đô thị', '2020-11-27 02:18:23', '2020-11-27 02:18:23'),
(2, 'Nguyễn D', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-11-27 02:22:12', '2020-11-27 02:22:12'),
(3, 'Nguyễn B', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-11-28 04:16:03', '2020-11-28 04:16:03'),
(4, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-11-28 12:10:51', '2020-11-28 12:10:51'),
(5, 'Nguyễn B', '0123213125', 'Hà Nội', 'Bắc Từ Liêm', 'phường a', 'CT Khu đô thị', '2020-11-28 12:29:11', '2020-11-28 12:29:11'),
(6, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-11-29 04:42:40', '2020-11-29 04:42:40'),
(7, 'Nguyễn E', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-11-30 10:12:52', '2020-11-30 10:12:52'),
(8, 'Nguyễn B', '0123213125', 'Hà Nội', 'Bắc Từ Liêm', 'phường a', 'CT Khu đô thị', '2020-12-01 15:33:28', '2020-12-01 15:33:28'),
(9, 'Nguyễn B', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-12-01 15:35:18', '2020-12-01 15:35:18'),
(10, 'Nguyễn B', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-12-01 15:38:29', '2020-12-01 15:38:29'),
(11, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2020-12-21 05:01:59', '2020-12-21 05:01:59'),
(12, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2021-01-03 13:44:52', '2021-01-03 13:44:52'),
(13, 'Nguyễn E', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2021-01-22 08:00:41', '2021-01-22 08:00:41'),
(14, 'Linh', '0123456789', 'HN', 'Ba đình', 'abc', 'số 11, đường xyz', '2021-01-24 14:18:04', '2021-01-24 14:18:04'),
(15, 'Nguyễn A', '0123213123', 'Hà Nội', 'Nam Từ Liêm', 'Mễ Trì', 'CT Khu đô thị', '2021-01-25 06:49:29', '2021-01-25 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'slide1.png', NULL, NULL),
(2, 'slide2.png', NULL, NULL),
(7, 'slide3.png', NULL, NULL),
(8, '160663920710-sieu-pham-dong-ho-nam-co-tourbillon-hap-dan-nhat-2016-f.webp', '2020-11-28 15:31:39', '2020-11-29 08:40:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_person_id_foreign` (`person_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_person_id_foreign` (`person_id`);

--
-- Chỉ mục cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_shipping_address_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_shipping_address_id_foreign` (`shipping_address_id`),
  ADD KEY `order_payment_id_foreign` (`payment_id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_order_id_foreign` (`order_id`),
  ADD KEY `order_item_product_id_foreign` (`product_id`),
  ADD KEY `order_item_review_id_foreign` (`review_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_account_id_foreign` (`account_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD CONSTRAINT `customer_shipping_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `order_shipping_address_id_foreign` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`id`);

--
-- Các ràng buộc cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_item_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`);

--
-- Các ràng buộc cho bảng `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
