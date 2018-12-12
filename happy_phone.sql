-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2018 at 05:46 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary_per_hour` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees_salary`
--

CREATE TABLE `employees_salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `salary_advance` text COLLATE utf8mb4_unicode_ci,
  `month` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_systems`
--

CREATE TABLE `image_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_systems`
--

INSERT INTO `image_systems` (`id`, `label`, `url`, `alt`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'user/images/1512409125.png', 'Logo', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(2, 'slide', 'user/images/banner1.png', 'Slide', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(3, 'slide', 'user/images/banner2.png', 'Slide', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(4, 'slide', 'user/images/banner3.png', 'Slide', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(5, 'slide', 'user/images/banner4.png', 'Slide', '2018-11-23 01:48:21', '2018-11-23 01:48:21');

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
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2018_11_25_053040_create_employee_table', 1),
(36, '2018_11_25_053832_create_employee_salary_table', 1),
(37, '2018_11_25_055159_create_products_table', 1),
(38, '2018_11_25_060235_create_products_color_table', 1),
(39, '2018_11_25_061121_create_products_ram_table', 1),
(40, '2018_11_25_061548_create_products_detail_table', 1),
(41, '2018_11_25_063224_create_products_rom_table', 1),
(42, '2018_11_25_065223_create_products_comment_table', 1),
(43, '2018_11_25_065851_create_products_rating_table', 1),
(44, '2018_11_25_070234_create_orders_table', 1),
(45, '2018_11_25_073727_create_orders_detail_table', 1),
(46, '2018_11_25_074648_create_advertises_table', 1),
(47, '2018_12_04_032747_create_image_systems_table', 1),
(48, '2018_12_04_035839_create_web_infos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `total_product_price` int(11) DEFAULT NULL,
  `ship_price` int(11) DEFAULT NULL,
  `time_delivery` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `product_ram_id` int(11) DEFAULT NULL,
  `product_rom_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `new` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `brand`, `price`, `sale`, `new`, `image`, `description`, `remaining`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Iphone 5', '1', 'IPHONE', 1200000, 0, 1, 'user/images/ip5.jpg', 'Máy nguyên bản, hình thức đẹp, chủ yếu các bản Mỹ, Nhật, Hàn...', 99, NULL, NULL, NULL),
(2, 'Iphone 5s', '1', 'IPHONE', 1700000, 0, 1, 'user/images/ip5s.jpg', 'Máy nguyên bản, hình thức đẹp, chủ yếu các bản Mỹ, Nhật, Hàn...', 99, NULL, NULL, NULL),
(3, 'Xiaomi Redmi 5Pro', '1', 'XIAOMI', 3650000, 5, 1, 'user/images/ip6.jpg', 'Là chiếc điện thoại XIAOMI mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(4, 'Xiaomi Redmi 5Pro', '1', 'XIAOMI', 3650000, 5, 1, 'user/images/ip6s.jpg', 'Là chiếc điện thoại XIAOMI mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(5, 'Xiaomi Redmi 5Pro', '1', 'XIAOMI', 3650000, 5, 0, 'user/images/ip7plus.jpg', 'Là chiếc điện thoại XIAOMI mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(6, 'Xiaomi Redmi 5Pro', '1', 'XIAOMI', 3650000, 5, 0, 'user/images/sss9.jpg', 'Là chiếc điện thoại XIAOMI mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(7, 'OPPO F9', '1', 'OPPO', 3500000, 3, 1, 'user/images/ssa8.jpg', 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(8, 'Ip6s', '1', 'IPHONE', 3500000, 2, 1, 'user/images/ssj3pro.jpg', 'Là chiếc điện thoại Apple mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(9, 'Ip6s Plus', '1', 'IPHONE', 5000000, 2, 1, 'user/images/ssj7prime.jpg', 'Là chiếc điện thoại Apple mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(10, 'OPPO F1s', '1', 'OPPO', 4500000, 10, 1, 'user/images/ssnote5.jpg', 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL),
(11, 'OPPO F9', '1', 'OPPO', 3500000, 5, 1, 'user/images/sss7.jpg', 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo.', 99, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_color`
--

CREATE TABLE `products_color` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plus_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_color`
--

INSERT INTO `products_color` (`id`, `product_id`, `color`, `image`, `plus_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Đen', 'user/images/ip5_b.jpg', NULL, '2018-12-05 17:00:00', '2018-12-05 17:00:00', NULL),
(2, 1, 'Bạc', 'user/images/ip5_b.jpg', NULL, '2018-12-05 17:00:00', '2018-12-05 17:00:00', NULL),
(3, 2, 'Bạc', 'user/images/ip5s_b.jpg', NULL, '2018-12-05 17:00:00', '2018-12-05 17:00:00', NULL),
(4, 2, 'Đen', 'user/images/ip5s_d.jpg', NULL, '2018-12-05 17:00:00', '2018-12-05 17:00:00', NULL),
(5, 2, 'Vàng', 'user/images/ip5v_d.jpg', NULL, '2018-12-05 17:00:00', '2018-12-05 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_comment`
--

CREATE TABLE `products_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `screen_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `touch_technology` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `touch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_standard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_operating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_camera` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behind_camera` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_light` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_call` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu_speed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chipset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multiplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memory_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_memory_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery` int(11) DEFAULT NULL,
  `battery_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_removable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_time_call` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_time_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2g` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3g` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4g` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim_slot` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wifi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gps` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bluetooth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gprs_edge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jack` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_connect` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_charger` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_movie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_music` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_call` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fm_radio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `screen_type`, `screen_color`, `resolution`, `screen_size`, `touch_technology`, `touch`, `screen_standard`, `system_operating`, `language`, `front_camera`, `behind_camera`, `flash_light`, `video`, `video_call`, `cpu_speed`, `chipset`, `multiplier`, `gpu`, `contact`, `memory_card`, `max_memory_card`, `battery`, `battery_type`, `battery_removable`, `max_time_call`, `max_time`, `max_time_media`, `sim_type`, `2g`, `3g`, `4g`, `sim_slot`, `wifi`, `gps`, `bluetooth`, `gprs_edge`, `jack`, `nfc`, `usb`, `other_connect`, `port_charger`, `style`, `size`, `weight`, `material`, `play_movie`, `play_music`, `record`, `limit_call`, `fm_radio`, `other_feature`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(2, 2, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(3, 3, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(4, 4, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(5, 5, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(6, 6, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(7, 7, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(8, 8, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(9, 9, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(10, 10, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL),
(11, 11, 'LED-backlit IPS LCD', '16 triệu màu', '1334 x 750', 'Retina HD, 4.7', 'Cảm ứng đa điểm', 'Cảm ứng đa điểm', 'Retina HD', 'iOS 8.0', 'Đa ngôn ngữ, có hỗ trợ tiếng Việt', '1.2 MP, f/2.2, 31mm, 720p@30fps, face detection, HDR, FaceTime over Wi-Fi or Cellular', '8 MP, f/2.2, 29mm, phase detection autofocus, dual-LED (dual tone) flash,', 'Có', 'Quay phim FullHD 1080p@60fps', 'Hỗ trợ', '1.4 GHz', 'Apple A8', '8 nhân', 'Adreno 506', 'Hỗ trợ', '64 GB, 4 GB RAM or 32 GB, 3 GB RAM', 'Up to 256 GB (dedicated slot)', 4000, 'Non-removable Li-Po', 'Không', 'Đang cập nhật', 'Đang cập nhật', 'Đang cập nhật', 'Dual SIM (Nano-SIM, dual stand-by)', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 - Global', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 20(800), 38(2600), 40(2300) - Global', 'Dual SIM', 'Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot', 'Yes, with A-GPS, GLONASS, BDS', '4.2, A2DP, LE', 'Hỗ trợ', '3.5 mm', 'Đang cập nhật', 'Micro USB', 'Đang cập nhật', 'Micro USB', 'Nguyên khối thẳng đứng', '149.3 x 71.7 x 8.8 mm', '178 g', 'Mặt kính, Kim loại cao cấp', 'XviD/MP4/H.264 player', 'MP3/WAV/eAAC+/FLAC player', 'Hỗ trợ', 'Không giới hạn', 'Hỗ trợ qua App', 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_ram`
--

CREATE TABLE `products_ram` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `plus_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_rating`
--

CREATE TABLE `products_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_rom`
--

CREATE TABLE `products_rom` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `plus_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) DEFAULT '3',
  `gender` tinyint(4) DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `gender`, `phone_number`, `birth_day`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đỗ Thị Tuyết', 'bkaprodx@gmail.com', '$2y$10$70yguYVLNoUhgZ/FUKMYXOKzMvrRkQWwbRJz.bGxQ3CgYmWN5kwba', 3, NULL, NULL, NULL, NULL, 'StSRJOB6kEv8wrdcTEutbt957vPPOwHKtUxDFHYNmmxcvGdFi6zpPQNQIHNF', NULL, NULL, NULL),
(2, 'tungnc', 'tungnc@kaopiz.com', '$2y$10$OxV1fLwU8LHZKOF3I/4Dv.ele/yqgEbUaPPHUpZTJuXpyKH1nKezS', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '123', 'bkaprodx1@gmail.com', '$2y$10$peZqNtG68czZb9tUM3G26OYLmqDqrvOgv1P2ykiNFjsOmy3aTV2kK', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Đỗ Thị Tuyết', 'bkaprodx12@gmail.com', '$2y$10$MgKxg202oD1hsX9Yxo6Lx.cXjXXeCFer6bDlRgn8Bv26ZykiydDhG', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '123', 'bkaprodx+2@gmail.com', '123456', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'hihi', '123@gmail.com', '123456', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'tungnc', '1233@gmail.com', '123456', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '123', 'bkaprodx+a@gmail.com', '$2y$10$7lNQMZhiHRz6f81ZXEuFkupK6ZMvzn1EoX67iZAvnZO0.mwUFBB9O', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Đỗ Thị Tuyết', 'bkaprod123x@gmail.com', '$2y$10$86m/bizZfqyF5Wf.FR9lBOq5BNayYMuqaKjSFupd7MToQ/4H29SaC', 3, NULL, 'bkaprodx@gmail.com', NULL, '豊島区西池袋1-11-1', NULL, NULL, NULL, NULL),
(10, 'Đỗ Thị Tuyết', 'b1kaprodx@gmail.com', '$2y$10$aVikm0KuiYMzbvh.RZVCuuT7wmp33tX.zYy1OM/6UVgIQhUE25w9m', 3, NULL, 'bkaprodx@gmail.com', NULL, '豊島区西池袋1-11-1', 'mWm1vNyFNpBpQJPtXrKjbdf0kmapb2Z8dlt9jCZrHGQgBk2JMdbsGI8cDgk7', NULL, NULL, NULL),
(11, 'Tùng đẹp trai', 'tungnc@123.com', '$2y$10$ad8l3lMmB8ZO9a8iVYdLQ.fWa2LXD4N5d9H4YB57oM3gMk2sjl35C', 3, NULL, '0357831525', NULL, 'hòa nam - ứng hòa - hà nội', 'pgeiCGx7b2XbmKIKzuyskkSkEDYAdnj6X1i2KkKdcvx35yO8NVcsG4WF5txh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_infos`
--

CREATE TABLE `web_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_infos`
--

INSERT INTO `web_infos` (`id`, `label`, `title`, `content`, `url`, `created_at`, `updated_at`) VALUES
(1, 'about', 'Giới thiệu ', 'Thể Hình Channel là kênh hướng dẫn các bạn Gymer tập luyện thể hình chuyên nghiệp, với các giáo án thể hình kèm và các bài tập được hướng dẫn chi tiết, phù hợp với tất cả đối tượng từ cơ bản đến nâng cao. Chúc các bạn mau chóng có được Body đẹp cùng Thể Hình Channel. ', '', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(2, 'root_from', 'Nguồn bài viết', 'http://www.thehinh.com/', 'http://www.thehinh.com/', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(3, 'fanpage', 'Theo dõi trên fanpage', 'http://www.facebook.com/TheHinhcom', 'http://www.facebook.com/TheHinhcom', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(4, 'contact', 'Liên hệ chúng tôi', 'thehinhcom@gmail.com', 'thehinhcom@gmail.com', '2018-11-23 01:48:21', '2018-11-23 01:48:21'),
(5, 'youtube', 'Youtube', 'https://www.youtube.com/channel/UC2s9lXvxZ5oNT-GgVdKitYA', 'https://www.youtube.com/channel/UC2s9lXvxZ5oNT-GgVdKitYA', '2018-11-23 01:48:21', '2018-11-23 01:48:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_salary`
--
ALTER TABLE `employees_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_systems`
--
ALTER TABLE `image_systems`
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
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_color`
--
ALTER TABLE `products_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_comment`
--
ALTER TABLE `products_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_ram`
--
ALTER TABLE `products_ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_rating`
--
ALTER TABLE `products_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_rom`
--
ALTER TABLE `products_rom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_infos`
--
ALTER TABLE `web_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees_salary`
--
ALTER TABLE `employees_salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_systems`
--
ALTER TABLE `image_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products_color`
--
ALTER TABLE `products_color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products_comment`
--
ALTER TABLE `products_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products_ram`
--
ALTER TABLE `products_ram`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_rating`
--
ALTER TABLE `products_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_rom`
--
ALTER TABLE `products_rom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `web_infos`
--
ALTER TABLE `web_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
