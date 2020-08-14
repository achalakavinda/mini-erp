INSERT INTO `brands` (`id`, `parent_id`, `level`, `name`, `description`, `img_url`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'TOYOTA', NULL, NULL, 1, 1, 1, '2020-08-14 02:55:34', '2020-08-14 02:55:34'),
(2, NULL, 0, 'CARVELET', NULL, NULL, 1, 1, 1, '2020-08-14 02:55:57', '2020-08-14 02:55:57'),
(3, NULL, 0, 'DAIHATHSU', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:03', '2020-08-14 02:56:03'),
(4, NULL, 0, 'HONDA', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:11', '2020-08-14 02:56:11'),
(5, NULL, 0, 'ISUZU', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:17', '2020-08-14 02:56:17'),
(6, NULL, 0, 'ITALY', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:23', '2020-08-14 02:56:23'),
(7, NULL, 0, 'MAZDA', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:28', '2020-08-14 02:56:28'),
(8, NULL, 0, 'MITSUBISHI', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:35', '2020-08-14 02:56:35'),
(9, NULL, 0, 'MIX', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:41', '2020-08-14 02:56:41'),
(10, NULL, 0, 'NISAN', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:45', '2020-08-14 02:56:45'),
(11, NULL, 0, 'NO BRAND', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:54', '2020-08-14 02:56:54'),
(12, NULL, 0, 'SUZUKI', NULL, NULL, 1, 1, 1, '2020-08-14 02:56:58', '2020-08-14 02:56:58');

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `level`, `name`, `description`, `img_url`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'AC BLOVER HEATER', NULL, NULL, 1, 1, 1, '2020-08-14 02:59:39', '2020-08-14 02:59:39'),
(2, NULL, 0, 'AC Condensor', NULL, NULL, 1, 1, 1, '2020-08-14 02:59:47', '2020-08-14 02:59:47'),
(3, NULL, 0, 'BACK BUMPER', NULL, NULL, 1, 1, 1, '2020-08-14 02:59:53', '2020-08-14 02:59:53'),
(4, NULL, 0, 'BEEDING', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:01', '2020-08-14 03:00:01'),
(5, NULL, 0, 'BLOWER,COOLER,FRONT BUFFER', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:07', '2020-08-14 03:00:07'),
(6, NULL, 0, 'CUT GLASS,FIT GLASS,DOOR GLASS', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:20', '2020-08-14 03:00:20'),
(7, NULL, 0, 'DASH BOARD', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:28', '2020-08-14 03:00:28'),
(8, NULL, 0, 'DIEASEL TANK', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:34', '2020-08-14 03:00:34'),
(9, NULL, 0, 'DOOR', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:39', '2020-08-14 03:00:39'),
(10, NULL, 0, 'DOOR REGULATOR', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:45', '2020-08-14 03:00:45'),
(11, NULL, 0, 'DRIVE SHAFT', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:51', '2020-08-14 03:00:51'),
(12, NULL, 0, 'METER BOARD', NULL, NULL, 1, 1, 1, '2020-08-14 03:00:56', '2020-08-14 03:00:56'),
(13, NULL, 0, 'MIRROR', NULL, NULL, 1, 1, 1, '2020-08-14 03:01:45', '2020-08-14 03:01:45'),
(14, NULL, 0, 'REDIATOR', NULL, NULL, 1, 1, 1, '2020-08-14 03:01:51', '2020-08-14 03:01:51'),
(15, NULL, 0, 'SHOCK ABSORBER,CV AXCEL', NULL, NULL, 1, 1, 1, '2020-08-14 03:01:56', '2020-08-14 03:01:56'),
(16, NULL, 0, 'STEARING COLOM', NULL, NULL, 1, 1, 1, '2020-08-14 03:02:00', '2020-08-14 03:02:00');


INSERT INTO `item_codes` (`id`, `brand_id`, `category_id`, `company_id`, `company_division_id`, `type_measurement_id`, `type`, `name`, `description`, `thumbnail_url`, `unit_cost`, `selling_price`, `nbt_tax_percentage`, `vat_tax_percentage`, `unit_price_with_tax`, `market_price`, `min_price`, `max_price`, `active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, NULL, 'product', 'INSIDE HEATER COOLER', NULL, 'http://itinerantnotes.com/blog/images/logo.png', 8000.00, 8000.00, 0.00, 0.00, 8000.00, 9000.00, 8000.00, 9000.00, 1, '2020-08-14 03:24:51', '2020-08-14 03:24:51'),
(2, 4, 1, 1, 1, NULL, 'product', 'FIT HEATER COOLER', NULL, 'http://itinerantnotes.com/blog/images/logo.png', 8000.00, 8000.00, 10.00, 10.00, 9680.00, 9000.00, 8000.00, 9000.00, 1, '2020-08-14 03:25:27', '2020-08-14 03:25:27');
