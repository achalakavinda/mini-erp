--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `code`, `contact`, `dob`, `contact_1`, `contact_2`, `contact_3`, `email`, `file_no`, `address_1`, `address_2`, `address_3`, `fax_number`, `secretary_id`, `date_of_incorporation`, `tin_no`, `vat_no`, `nic`, `passport`, `ceo`, `ceo_contact`, `ceo_email`, `cfo`, `cfo_contact`, `cfo_email`, `website`, `service_id`, `sector_id`, `location`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `userdef1`, `userdef2`, `userdef3`, `userdef4`, `userdef5`, `userdef6`, `userdef7`, `userdef8`, `userdef9`) VALUES
(1, 'sanjana', NULL, '0717754078', '1995-08-19', NULL, NULL, NULL, 'ss.weerasena97@gmail.com', NULL, '4767548678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maharagama', 'ifhaugfuefekfm', '2020-08-19 09:10:36', '2020-08-19 09:10:36', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'First Customert', NULL, NULL, '2020-08-19', NULL, NULL, NULL, NULL, NULL, 'sample addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-19 17:58:13', '2020-08-19 17:58:13', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `parent_id`, `level`, `name`, `description`, `img_url`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'DOD01BR', 'linen two tone dress', '/storage/images/system/brands/1/5iVrLuov6IMKdZocdgtpmNaHRQQY0o88HgreNgYz.jpeg', 1, 1, 1, '2020-08-18 22:35:28', '2020-08-19 09:30:47'),
(2, NULL, 0, 'DOD01BGB', 'linen two tone dress', '/storage/images/system/brands/2/Xn5KIGpHKSVtQxq5h86iQgiOie8QtiL50je9I9lO.jpeg', 1, 1, 1, '2020-08-18 22:35:34', '2020-08-19 09:40:16'),
(3, NULL, 0, 'Av 190 - DOD03', NULL, NULL, 1, 1, 1, '2020-08-18 22:35:39', '2020-08-18 22:35:39'),
(4, NULL, 0, 'Av 253 - DOD04', NULL, NULL, 1, 1, 1, '2020-08-18 22:35:43', '2020-08-18 22:35:43'),
(5, NULL, 0, 'Av 204 - DOJ05', NULL, NULL, 1, 1, 1, '2020-08-18 22:35:48', '2020-08-18 22:35:48'),
(6, NULL, 0, 'Av 180B - DOD06', NULL, NULL, 1, 1, 1, '2020-08-18 22:35:52', '2020-08-18 22:35:52'),
(7, NULL, 0, 'Av 209B - DOD07', NULL, NULL, 1, 1, 1, '2020-08-18 22:35:59', '2020-08-18 22:35:59'),
(8, NULL, 0, 'Av 11093 - DOD09', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:04', '2020-08-18 22:36:04'),
(9, NULL, 0, 'Av 239 - DOD10', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:08', '2020-08-18 22:36:08'),
(10, NULL, 0, 'DOD01BrB', 'Linen  Two Tone Dress', NULL, 1, 1, 1, '2020-08-19 11:18:09', '2020-08-19 11:18:09');

--
-- Dumping data for table `brands`
--

INSERT INTO `item_code_batches` (`id`, `parent_id`, `level`, `code`, `description`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'DOD01BR', 'linen two tone dress',  1, 1, 1, '2020-08-18 22:35:28', '2020-08-19 09:30:47'),
(2, NULL, 0, 'DOD01BGB', 'linen two tone dress',  1, 1, 1, '2020-08-18 22:35:34', '2020-08-19 09:40:16'),
(3, NULL, 0, 'Av 190 - DOD03',  NULL, 1, 1, 1, '2020-08-18 22:35:39', '2020-08-18 22:35:39'),
(4, NULL, 0, 'Av 253 - DOD04',  NULL, 1, 1, 1, '2020-08-18 22:35:43', '2020-08-18 22:35:43'),
(5, NULL, 0, 'Av 204 - DOJ05',  NULL, 1, 1, 1, '2020-08-18 22:35:48', '2020-08-18 22:35:48'),
(6, NULL, 0, 'Av 180B - DOD06',  NULL, 1, 1, 1, '2020-08-18 22:35:52', '2020-08-18 22:35:52'),
(7, NULL, 0, 'Av 209B - DOD07',  NULL, 1, 1, 1, '2020-08-18 22:35:59', '2020-08-18 22:35:59'),
(8, NULL, 0, 'Av 11093 - DOD09',  NULL, 1, 1, 1, '2020-08-18 22:36:04', '2020-08-18 22:36:04'),
(9, NULL, 0, 'Av 239 - DOD10', NULL, 1, 1, 1, '2020-08-18 22:36:08', '2020-08-18 22:36:08'),
(10, NULL, 0, 'DOD01BrB', 'Linen  Two Tone Dress', 1, 1, 1, '2020-08-19 11:18:09', '2020-08-19 11:18:09');


--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `parent_id`, `level`, `code`, `description`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'RED', NULL, NULL, NULL, 1, '2020-08-19 11:19:48', '2020-08-19 11:19:48'),
(2, NULL, 0, 'NAVY', NULL, NULL, NULL, 1, '2020-08-19 11:19:57', '2020-08-19 11:19:57'),
(3, NULL, 0, 'RED NAVY', NULL, NULL, NULL, 1, '2020-08-19 11:20:05', '2020-08-19 11:20:05'),
(4, NULL, 0, 'YELLOW', NULL, NULL, NULL, 1, '2020-08-19 11:20:13', '2020-08-19 11:20:13'),
(5, NULL, 0, 'PINK', NULL, NULL, NULL, 1, '2020-08-19 11:20:19', '2020-08-19 11:20:19'),
(6, NULL, 0, 'GREEN', NULL, NULL, NULL, 1, '2020-08-19 11:20:25', '2020-08-19 11:20:25'),
(7, NULL, 0, 'WHITE', NULL, NULL, NULL, 1, '2020-08-19 11:20:32', '2020-08-19 11:20:32');

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `level`, `name`, `description`, `img_url`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'RED', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:31', '2020-08-18 22:36:31'),
(2, NULL, 0, 'NAVY', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:36', '2020-08-18 22:36:36'),
(3, NULL, 0, 'RED NAVY', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:42', '2020-08-18 22:36:42'),
(4, NULL, 0, 'YELLOW', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:46', '2020-08-18 22:36:46'),
(5, NULL, 0, 'PINK', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:49', '2020-08-18 22:36:49'),
(6, NULL, 0, 'GREEN', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:53', '2020-08-18 22:36:53'),
(7, NULL, 0, 'WHITE', NULL, NULL, 1, 1, 1, '2020-08-18 22:36:58', '2020-08-18 22:36:58'),
(8, NULL, 0, 'GREEN', NULL, NULL, 1, 1, 1, '2020-08-18 22:37:05', '2020-08-18 22:37:05');

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `parent_id`, `level`, `code`, `description`, `company_id`, `company_division_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'SIZE 8/S', NULL, NULL, NULL, 1, '2020-08-19 11:31:41', '2020-08-19 11:31:41'),
(2, NULL, 0, 'SIZE 10/M', NULL, NULL, NULL, 1, '2020-08-19 11:31:55', '2020-08-19 11:31:55'),
(3, NULL, 0, 'SIZE 12/L', NULL, NULL, NULL, 1, '2020-08-19 11:33:05', '2020-08-19 11:33:05'),
(4, NULL, 0, 'SIZE 14/XL', NULL, NULL, NULL, 1, '2020-08-19 11:33:20', '2020-08-19 11:33:20'),
(5, NULL, 0, 'SIZE 16/XXL', NULL, NULL, NULL, 1, '2020-08-19 11:33:53', '2020-08-19 11:33:53');



--
-- Dumping data for table `item_codes`
--

INSERT INTO `item_codes` (`id`, `brand_id`, `category_id`, `company_id`, `company_division_id`, `type_measurement_id`, `type`, `name`, `description`, `thumbnail_url`, `unit_cost`, `selling_price`, `nbt_tax_percentage`, `vat_tax_percentage`, `unit_price_with_tax`, `market_price`, `min_price`, `max_price`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, 'product', 'DOD01BgR', 'SIZE 10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-18 22:37:48', '2020-08-19 11:01:48'),
(2, 1, 1, 1, 1, NULL, 'product', 'DOD01BgR', 'SIZE 14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-18 22:38:33', '2020-08-19 11:14:57'),
(3, 1, 1, 1, 1, NULL, 'product', 'DOD01BgR', 'SIZE 16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-18 22:40:07', '2020-08-19 11:15:35'),
(4, 1, 1, 1, 1, NULL, 'product', 'DOD01BgR', 'SIZE 12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:19:41', '2020-08-19 11:20:22'),
(5, 1, 1, 1, 1, NULL, 'product', 'DOD01BR', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:21:19', '2020-08-19 11:28:59'),
(6, 1, 1, 1, 1, NULL, 'product', 'DOD01BR', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:21:42', '2020-08-19 11:29:40'),
(7, 1, 1, 1, 1, NULL, 'product', 'DOD01BR', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:23:12', '2020-08-19 11:29:52'),
(8, 1, 1, 1, 1, NULL, 'product', 'DOD01BR', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:24:12', '2020-08-19 11:33:27'),
(9, 1, 1, 1, 1, NULL, 'product', 'DOD01BgB', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:25:35', '2020-08-19 11:25:35'),
(10, 1, 1, 1, 1, NULL, 'product', 'DOD01BgB', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:34:57', '2020-08-19 11:34:57'),
(11, 1, 1, 1, 1, NULL, 'product', 'DOD01BgB', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:35:24', '2020-08-19 11:37:20'),
(12, 1, 1, 1, 1, NULL, 'product', 'DOD01BgB', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:35:50', '2020-08-19 11:37:36'),
(13, 1, 1, 1, 1, NULL, 'product', 'DOD02Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:36:21', '2020-08-19 11:39:13'),
(14, 1, 1, 1, 1, NULL, 'product', 'DOD02Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:42:06', '2020-08-19 11:42:06'),
(15, 1, 1, 1, 1, NULL, 'product', 'DOD02Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:42:59', '2020-08-19 11:42:59'),
(16, 1, 1, 1, 1, NULL, 'product', 'DOD02Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:43:32', '2020-08-19 11:43:32'),
(17, 1, 1, 1, 1, NULL, 'product', 'DOD02A', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:44:07', '2020-08-19 11:44:07'),
(18, 1, 1, 1, 1, NULL, 'product', 'DOD02A', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:44:23', '2020-08-19 11:44:23'),
(19, 1, 1, 1, 1, NULL, 'product', 'DOD02A', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:44:39', '2020-08-19 11:44:39'),
(20, 1, 1, 1, 1, NULL, 'product', 'DOD02A', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:44:59', '2020-08-19 11:44:59'),
(21, 1, 1, 1, 1, NULL, 'product', 'DOD02R', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:45:31', '2020-08-19 11:45:31'),
(22, 1, 1, 1, 1, NULL, 'product', 'DOD02R', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:45:42', '2020-08-19 11:45:42'),
(23, 1, 1, 1, 1, NULL, 'product', 'DOD02R', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:46:01', '2020-08-19 11:46:01'),
(24, 1, 1, 1, 1, NULL, 'product', 'DOD02R', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:46:13', '2020-08-19 11:46:13'),
(25, 1, 1, 1, 1, NULL, 'product', 'DOD03B', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:46:53', '2020-08-19 11:46:53'),
(26, 1, 1, 1, 1, NULL, 'product', 'DOD03B', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:47:10', '2020-08-19 11:47:10'),
(27, 1, 1, 1, 1, NULL, 'product', 'DOD03B', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:47:24', '2020-08-19 11:47:24'),
(28, 1, 1, 1, 1, NULL, 'product', 'DOD03B', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:47:42', '2020-08-19 11:47:42'),
(29, 1, 1, 1, 1, NULL, 'product', 'DOD03W', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:48:14', '2020-08-19 11:48:14'),
(30, 1, 1, 1, 1, NULL, 'product', 'DOD03W', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:48:29', '2020-08-19 11:48:29'),
(31, 1, 1, 1, 1, NULL, 'product', 'DOD03W', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:48:45', '2020-08-19 11:48:45'),
(32, 1, 1, 1, 1, NULL, 'product', 'DOD03W', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:48:59', '2020-08-19 11:48:59'),
(33, 1, 1, 1, 1, NULL, 'product', 'DOD03Y', '8/S', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:50:12', '2020-08-19 11:50:12'),
(34, 1, 1, 1, 1, NULL, 'product', 'DOD03Y', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:51:29', '2020-08-19 11:51:29'),
(35, 1, 1, 1, 1, NULL, 'product', 'DOD03Y', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:51:40', '2020-08-19 11:51:40'),
(36, 1, 1, 1, 1, NULL, 'product', 'DOD03Y', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:52:12', '2020-08-19 11:52:12'),
(37, 1, 1, 1, 1, NULL, 'product', 'DOD03Y', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:52:50', '2020-08-19 11:52:50'),
(38, 1, 1, 1, 1, NULL, 'product', 'DOP04B', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:53:48', '2020-08-19 11:53:48'),
(39, 1, 1, 1, 1, NULL, 'product', 'DOP04B', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:54:08', '2020-08-19 11:54:08'),
(40, 1, 1, 1, 1, NULL, 'product', 'DOP04B', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:54:43', '2020-08-19 11:54:43'),
(41, 1, 1, 1, 1, NULL, 'product', 'DOP04B', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 11:55:08', '2020-08-19 11:55:08'),
(42, 1, 1, 1, 1, NULL, 'product', 'DOP04G', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:01:05', '2020-08-19 12:01:05'),
(43, 1, 1, 1, 1, NULL, 'product', 'DOP04G', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:03:54', '2020-08-19 12:03:54'),
(44, 1, 1, 1, 1, NULL, 'product', 'DOP04G', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:04:16', '2020-08-19 12:04:16'),
(45, 1, 1, 1, 1, NULL, 'product', 'DOP04G', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:04:33', '2020-08-19 12:04:33'),
(46, 1, 1, 1, 1, NULL, 'product', 'DOP04Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:06:19', '2020-08-19 12:06:19'),
(47, 1, 1, 1, 1, NULL, 'product', 'DOP04Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:06:50', '2020-08-19 12:06:50'),
(48, 1, 1, 1, 1, NULL, 'product', 'DOP04Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:07:08', '2020-08-19 12:07:08'),
(49, 1, 1, 1, 1, NULL, 'product', 'DOP04Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:07:39', '2020-08-19 12:07:39'),
(50, 1, 1, 1, 1, NULL, 'product', 'DOJ05Y', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:08:23', '2020-08-19 12:08:23'),
(51, 1, 1, 1, 1, NULL, 'product', 'DOJ05Y', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:08:39', '2020-08-19 12:08:39'),
(52, 1, 1, 1, 1, NULL, 'product', 'DOJ05Y', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:09:15', '2020-08-19 12:09:15'),
(53, 1, 1, 1, 1, NULL, 'product', 'DOJ05Y', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:09:29', '2020-08-19 12:09:29'),
(54, 1, 1, 1, 1, NULL, 'product', 'DOJ05P', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:10:13', '2020-08-19 12:10:13'),
(55, 1, 1, 1, 1, NULL, 'product', 'DOJ05P', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:10:28', '2020-08-19 12:10:28'),
(56, 1, 1, 1, 1, NULL, 'product', 'DOJ05P', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:10:44', '2020-08-19 12:10:44'),
(57, 1, 1, 1, 1, NULL, 'product', 'DOJ05P', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:10:57', '2020-08-19 12:10:57'),
(58, 1, 1, 1, 1, NULL, 'product', 'DOJ05G', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:12:07', '2020-08-19 12:12:07'),
(59, 1, 1, 1, 1, NULL, 'product', 'DOJ05G', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:12:23', '2020-08-19 12:12:23'),
(60, 1, 1, 1, 1, NULL, 'product', 'DOJ05G', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:12:38', '2020-08-19 12:12:38'),
(61, 1, 1, 1, 1, NULL, 'product', 'DOJ05G', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:13:07', '2020-08-19 12:13:07'),
(62, 1, 1, 1, 1, NULL, 'product', 'DOD06Y', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:17:24', '2020-08-19 12:17:24'),
(63, 1, 1, 1, 1, NULL, 'product', 'DOD06Y', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:17:38', '2020-08-19 12:17:38'),
(64, 1, 1, 1, 1, NULL, 'product', 'DOD06Y', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:17:54', '2020-08-19 12:17:54'),
(65, 1, 1, 1, 1, NULL, 'product', 'DOD06Y', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:18:10', '2020-08-19 12:18:10'),
(66, 1, 1, 1, 1, NULL, 'product', 'DOD06P', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:19:09', '2020-08-19 12:19:09'),
(67, 1, 1, 1, 1, NULL, 'product', 'DOD06P', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:19:23', '2020-08-19 12:19:23'),
(68, 1, 1, 1, 1, NULL, 'product', 'DOD06P', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:19:38', '2020-08-19 12:19:38'),
(69, 1, 1, 1, 1, NULL, 'product', 'DOD06P', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:19:52', '2020-08-19 12:19:52'),
(70, 1, 1, 1, 1, NULL, 'product', 'DOD06B', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:26:14', '2020-08-19 12:26:14'),
(71, 1, 1, 1, 1, NULL, 'product', 'DOD06B', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:26:32', '2020-08-19 12:26:32'),
(72, 1, 1, 1, 1, NULL, 'product', 'DOD06B', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:26:50', '2020-08-19 12:26:50'),
(73, 1, 1, 1, 1, NULL, 'product', 'DOD06B', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:27:05', '2020-08-19 12:27:05'),
(74, 1, 1, 1, 1, NULL, 'product', 'DOD07B', '8/S', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:27:51', '2020-08-19 12:27:51'),
(75, 1, 1, 1, 1, NULL, 'product', 'DOD07B', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:28:02', '2020-08-19 12:28:02'),
(76, 1, 1, 1, 1, NULL, 'product', 'DOD07B', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:28:17', '2020-08-19 12:28:17'),
(77, 1, 1, 1, 1, NULL, 'product', 'DOD07B', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:28:30', '2020-08-19 12:28:30'),
(78, 1, 1, 1, 1, NULL, 'product', 'DOD07B', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:28:46', '2020-08-19 12:28:46'),
(79, 1, 1, 1, 1, NULL, 'product', 'DOD07G', '8/S', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:29:28', '2020-08-19 12:29:28'),
(80, 1, 1, 1, 1, NULL, 'product', 'DOD07G', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:29:41', '2020-08-19 12:29:41'),
(81, 1, 1, 1, 1, NULL, 'product', 'DOD07G', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:30:00', '2020-08-19 12:30:00'),
(82, 1, 1, 1, 1, NULL, 'product', 'DOD07G', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:32:27', '2020-08-19 12:32:27'),
(83, 1, 1, 1, 1, NULL, 'product', 'DOD07G', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:32:45', '2020-08-19 12:32:45'),
(84, 1, 1, 1, 1, NULL, 'product', 'DOD07Bg', '8/S', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:33:11', '2020-08-19 12:33:11'),
(85, 1, 1, 1, 1, NULL, 'product', 'DOD07Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:33:24', '2020-08-19 12:33:24'),
(86, 1, 1, 1, 1, NULL, 'product', 'DOD07Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:33:37', '2020-08-19 12:33:37'),
(87, 1, 1, 1, 1, NULL, 'product', 'DOD07Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:33:52', '2020-08-19 12:33:52'),
(88, 1, 1, 1, 1, NULL, 'product', 'DOD07Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1190.00, 0.00, 0.00, 1190.00, NULL, NULL, NULL, 1, '2020-08-19 12:34:10', '2020-08-19 12:34:10'),
(89, 1, 1, 1, 1, NULL, 'product', 'DOD08Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:34:43', '2020-08-19 12:34:43'),
(90, 1, 1, 1, 1, NULL, 'product', 'DOD08Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:35:02', '2020-08-19 12:35:02'),
(91, 1, 1, 1, 1, NULL, 'product', 'DOD08Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:35:17', '2020-08-19 12:35:17'),
(92, 1, 1, 1, 1, NULL, 'product', 'DOD08Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:35:30', '2020-08-19 12:35:30'),
(93, 1, 1, 1, 1, NULL, 'product', 'DOD08BL', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:35:59', '2020-08-19 12:35:59'),
(94, 1, 1, 1, 1, NULL, 'product', 'DOD08BL', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:36:16', '2020-08-19 12:36:16'),
(95, 1, 1, 1, 1, NULL, 'product', 'DOD08BL', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:36:56', '2020-08-19 12:36:56'),
(96, 1, 1, 1, 1, NULL, 'product', 'DOD08BL', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:37:00', '2020-08-19 12:37:00'),
(97, 1, 1, 1, 1, NULL, 'product', 'DOD08BL', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:37:35', '2020-08-19 12:37:35'),
(98, 1, 1, 1, 1, NULL, 'product', 'DOD08B', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:38:03', '2020-08-19 12:38:03'),
(99, 1, 1, 1, 1, NULL, 'product', 'DOD08B', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:38:19', '2020-08-19 12:38:19'),
(100, 1, 1, 1, 1, NULL, 'product', 'DOD08B', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:38:34', '2020-08-19 12:38:34'),
(101, 1, 1, 1, 1, NULL, 'product', 'DOD08B', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1390.00, 0.00, 0.00, 1390.00, NULL, NULL, NULL, 1, '2020-08-19 12:38:46', '2020-08-19 12:38:46'),
(102, 1, 1, 1, 1, NULL, 'product', 'DOD09R', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:39:13', '2020-08-19 12:39:13'),
(103, 1, 1, 1, 1, NULL, 'product', 'DOD09R', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:39:25', '2020-08-19 12:39:25'),
(104, 1, 1, 1, 1, NULL, 'product', 'DOD09R', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:39:36', '2020-08-19 12:39:36'),
(105, 1, 1, 1, 1, NULL, 'product', 'DOD09R', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:39:49', '2020-08-19 12:39:49'),
(106, 1, 1, 1, 1, NULL, 'product', 'DOD09Br', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:40:07', '2020-08-19 12:40:07'),
(107, 1, 1, 1, 1, NULL, 'product', 'DOD09Br', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:40:29', '2020-08-19 12:40:29'),
(108, 1, 1, 1, 1, NULL, 'product', 'DOD09Br', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:40:40', '2020-08-19 12:40:40'),
(109, 1, 1, 1, 1, NULL, 'product', 'DOD09Br', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:40:51', '2020-08-19 12:40:51'),
(110, 1, 1, 1, 1, NULL, 'product', 'DOD09Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:41:17', '2020-08-19 12:41:17'),
(111, 1, 1, 1, 1, NULL, 'product', 'DOD09Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:41:28', '2020-08-19 12:41:28'),
(112, 1, 1, 1, 1, NULL, 'product', 'DOD09Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:41:40', '2020-08-19 12:41:40'),
(113, 1, 1, 1, 1, NULL, 'product', 'DOD09Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:41:52', '2020-08-19 12:41:52'),
(114, 1, 1, 1, 1, NULL, 'product', 'DOD10Br', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:42:15', '2020-08-19 12:42:15'),
(115, 1, 1, 1, 1, NULL, 'product', 'DOD10Br', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:42:26', '2020-08-19 12:42:26'),
(116, 1, 1, 1, 1, NULL, 'product', 'DOD10Br', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:42:38', '2020-08-19 12:42:38'),
(117, 1, 1, 1, 1, NULL, 'product', 'DOD10Br', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:42:49', '2020-08-19 12:42:49'),
(118, 1, 1, 1, 1, NULL, 'product', 'DOD10Bg', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:43:24', '2020-08-19 12:43:24'),
(119, 1, 1, 1, 1, NULL, 'product', 'DOD10Bg', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:43:41', '2020-08-19 12:43:41'),
(120, 1, 1, 1, 1, NULL, 'product', 'DOD10Bg', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:43:53', '2020-08-19 12:43:53'),
(121, 1, 1, 1, 1, NULL, 'product', 'DOD10Bg', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:44:11', '2020-08-19 12:44:11'),
(122, 1, 1, 1, 1, NULL, 'product', 'DOD10Y', '10/M', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:44:34', '2020-08-19 12:44:34'),
(123, 1, 1, 1, 1, NULL, 'product', 'DOD10Y', '12/L', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:44:46', '2020-08-19 12:44:46'),
(124, 1, 1, 1, 1, NULL, 'product', 'DOD10Y', '14/XL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:44:58', '2020-08-19 12:44:58'),
(125, 1, 1, 1, 1, NULL, 'product', 'DOD10Y', '16/XXL', 'http://itinerantnotes.com/blog/images/logo.png', 500.00, 1290.00, 0.00, 0.00, 1290.00, NULL, NULL, NULL, 1, '2020-08-19 12:45:14', '2020-08-19 12:45:14');
