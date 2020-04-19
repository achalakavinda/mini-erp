<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::unprepared(file_get_contents('public/sql/data_insert.sql'));



//        INSERT INTO `users` (`id`, `name`, `img_url`, `email`, `email_verified_at`, `password`, `date_joined`, `mobile`, `residence`, `hometown_district_id`, `hometown_city`, `cmb_location_district`, `cmb_city`, `address`, `emp_no`, `epf_no`, `designation_id`, `nic`, `user_id`, `ca_agree_no`, `ca_training_period_from`, `ca_training_period_to`, `ca_training`, `basic_sal`, `epf_cost`, `etf_cost`, `allowance_cost`, `gratuity_cost`, `other_cost`, `cost`, `hr_rates`, `hr_billing_rates`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
//        (2, 'Vipula Bandara', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'vipula@kreston.lk', NULL, '$2y$10\$LMMiUz/o2AjddJ3u6bcZoejT0dVjXjl0rNQFuIbKrvKensLb.IJIW', '2019-02-21', '+94775104903', NULL, 1, NULL, 1, NULL, NULL, '008', NULL, 1, '88012561425V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 20000, NULL, NULL, 135000, 900, 4500, 'lvc1Ie1ya1YuRYQOaDrTop75mhbojFpP8gWSvLzOWjXT6umJMVmXMMoUVLMF', '2019-02-21 18:53:58', '2019-02-21 18:53:58', NULL, NULL),
//        (3, 'Sawumiya Selvaraja', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'sawumiya_selvaraja@kreston.lk', NULL, '$2y$10\$BZE6KtU9TsR5asE7navk..WLv8rC4Zty/iGCbAS4JZtdYl9G1cYt.', '2011-02-07', NULL, NULL, 1, NULL, 1, NULL, NULL, '1791', NULL, 4, '887420742V', -999, NULL, NULL, NULL, NULL, 90000, 10800, 2700, 10000, NULL, NULL, 113500, 756.67, 3783.33, 'mx1wbQY7QaExo4x2LolZsFPXZS7Viq8g4vBYdUASR0Loo2rAhq2VHOiif1AY', '2019-02-28 15:07:39', '2019-02-28 15:07:39', NULL, NULL),
//        (4, 'Subodhani Perera', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'subodhani@kreston.lk', NULL, '$2y$10\$DF3M2zwtSvvkXI806iRMfuwuwn8VmiIVBp96LrZyHqhA7G8qZY/sS', '2011-02-26', NULL, NULL, 1, NULL, 1, NULL, NULL, '1713', NULL, 4, '8685425225V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, NULL, NULL, NULL, 115000, 766.67, 3833.33, '2FaevyX5byWRWmcczKWZ0zGKuEZyM4crLYmc1bpd0E5WAPUIvL6ezU7IjVK7', '2019-02-28 16:19:14', '2019-02-28 16:19:14', NULL, NULL),
//        (5, 'Mazeer Mozood', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'mazeer@kreston.lk', NULL, '$2y$10\$zP53cQqnRXfhGHhCvaUjYuhRJA9PHEY1.O7nrYRlloy8yjIHIWHO2', '2014-02-25', NULL, NULL, 1, NULL, 1, NULL, NULL, '1507', NULL, 5, '884521421V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, NULL, NULL, NULL, 115000, 766.67, 3833.33, 'lE8nUoj0ftljBEXGtg9NS8tllAMCGU5fTBIhSKYAkok74ZI9FdYd4kRnIGAi', '2019-02-28 16:42:12', '2019-02-28 16:42:12', NULL, NULL),
//        (6, 'Mujahid Farook', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'mujahid@kreston.lk', NULL, '$2y$10$8TJ18kwa/fsRxLvnSgf3T.GKAku6wvl6Zemry/aRLxjaVK0LrzSSe', '2014-02-02', NULL, NULL, 1, NULL, 1, NULL, NULL, '1579', NULL, 7, '89254251V', -999, NULL, NULL, NULL, NULL, 50000, 6000, 1500, NULL, NULL, NULL, 57500, 383.33, 1916.67, 'Q7Qhw7ml1srO4Ynl8eOZRrHRaOjFdHsYeJ5v0NjqqLFxGSTHHVYVd8HvMWer', '2019-02-28 16:43:29', '2019-02-28 16:43:29', NULL, NULL),
//        (7, 'Rodney Balasingham', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'rodney@kreston.lk', NULL, '$2y$10\$e0ObxS3mWI6Wl.woVBCsQeMsSqwhTDcwWasMKFtoEc1hh3I6zYCQW', '1996-02-02', NULL, NULL, 1, NULL, 1, NULL, NULL, '007', NULL, 1, '75214521V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 50000, NULL, NULL, 115000, 766.67, 3833.33, '8eB8YtecVmPm36bY5muH3NMAiRwnfJBd3KfZOlOVqVo7uoGrv0WD1aBjdgEN', '2019-02-28 16:44:54', '2019-02-28 16:44:54', NULL, NULL),
//        (8, 'S Rajanathan', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'rajanathan@kreston.lk', NULL, '$2y$10\$GPxLz2O5dbAYvczpKzoCf.ro04e6h2xvZX8Tm8/C6yerhJ0oztBDe', '2019-03-01', NULL, NULL, 1, NULL, 1, NULL, NULL, '003', NULL, 1, '862512452V', -999, NULL, NULL, NULL, NULL, 125000, 15000, 3750, 20000, NULL, NULL, 163750, 1091.67, 5458.33, 'NYtk47h2NocqG57myLDtinkNZZX8nkwiuw9o30vDlr5vyZGgdIftojwQVr4p', '2019-03-01 14:22:47', '2019-03-01 14:22:47', NULL, NULL),
//        (9, 'S Gokulan', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'gokulan@kreston.lk', NULL, '$2y$10\$xIMMC.6aK.4HZN611j4bc.Kf4DdvA80ksIZZ9cBhamyideE3UGMV6', '2016-03-03', NULL, NULL, 1, NULL, 1, NULL, NULL, '1802', NULL, 4, '885215241', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 20000, NULL, NULL, 135000, 900, 4500, NULL, '2019-03-03 20:38:54', '2019-03-03 20:38:54', NULL, NULL),
//        (10, 'Sudharshani Tillekeratne', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'tillekeratne@kreston.lk', NULL, '$2y$10\$T6R8PstixPf5WBdTHhFOM.quOVN7zqmfe2DvNlDVoPjaUVFGMT1J.', '1990-03-03', NULL, NULL, 1, NULL, 1, NULL, NULL, '005', NULL, 1, '752145212 V', -999, NULL, NULL, NULL, NULL, 130000, 15600, 3900, 30000, NULL, NULL, 179500, 1196.67, 5983.33, NULL, '2019-03-03 20:42:32', '2019-03-03 20:42:32', NULL, NULL);
//        ";


//        $ProjectInsertQuery = "
//
//
//        INSERT INTO `projects` (`id`, `customer_id`, `customer_name`, `sector_id`, `sector_name`, `job_type_id`, `job_type_name`, `code`, `quoted_price`, `budget_number_of_hrs`, `budget_cost_by_work`, `budget_cost_by_overhead`, `budget_revenue`, `actual_number_of_hrs`, `actual_cost_by_work`, `actual_cost_by_overhead`, `actual_revenue`, `invoicing_amount`, `receipt_amount`, `cost_variance`, `recovery_ratio`, `profit_ratio`, `close`, `invoiced`, `status_id`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
//        (3, 4, 'Sabre Lanka (Pvt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'Sabre Lanka (Pvt) Ltd-001 - External Audit', 0, 0, 25200.039999999997, 15000, 98100.12, 33.5, 13491.68, 0, 0, 0, 0, 0, 0, 0.5, 0, 0, 2, NULL, '2019-02-28 16:49:47', '2019-03-18 05:49:49', 1, 10),
//        (4, 6, 'Pettah Phamacy (Pvt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'Pettah Phamacy (Pvt) Ltd-001 - External Audit', 89800.26, 26, 19933.42, 20000, 89800.26, 8.75, 6708.3625, 20000, 0, 0, 0, 0, 0, 0.5, 0, 0, 2, NULL, '2019-02-28 16:53:09', '2019-03-01 19:40:06', 1, 1),
//        (5, 5, 'Renuka Holdings PLC', 1, 'Manual Set By Testing', 1, 'manual test type', 'Renuka Holdings PLC-001- External Audit', 118900.08, 40, 27133.36, 25000, 118900.08, 21, 8761.704999999998, 0, 0, 0, 0, 0, 0, 0.5, 0, 0, 2, NULL, '2019-02-28 17:01:01', '2019-03-16 11:17:11', 1, 1),
//        (8, 9, 'Plastishells Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'Plastishells Ltd-001 - External Aduit', 59533.5, 25, 22266.75, 15000, 59533.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, '2019-03-01 14:43:30', '2019-03-01 14:53:34', 5, 5),
//        (14, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Training', 0, 0, 0, 0, 0, 8.5, 7633.35, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 15:37:42', '2019-03-17 12:24:03', 1, 1),
//        (15, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Administration -Staff', 0, 0, 0, 0, 0, 7.5, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 15:46:29', '2019-03-03 11:22:11', 1, 1),
//        (16, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Administration -Finance', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 1, NULL, '2019-03-01 15:54:29', '2019-03-01 15:54:29', 1, 1),
//        (17, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Administration -General', 0, 0, 0, 0, 0, 11, 8433.369999999999, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 15:58:34', '2019-03-18 08:58:23', 1, 1),
//        (18, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Administration -Clients', 0, 0, 0, 0, 0, 4, 3333.34, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 15:59:02', '2019-03-03 11:20:25', 1, 1),
//        (19, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Administration -Sports', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 15:59:53', '2019-03-01 16:00:04', 1, 1),
//        (20, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Business Development', 0, 0, 0, 0, 0, 3.5, 2683.345, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 16:00:36', '2019-03-04 16:43:21', 1, 1),
//        (21, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-Free', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-01 16:01:36', '2019-03-01 16:01:43', 1, 1),
//        (22, 4, 'Sabre Lanka (Pvt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'Sabre Lanka (Pvt) Ltd-3985/A1227/SR/RB', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 1, NULL, '2019-03-01 18:32:19', '2019-03-01 18:32:19', 5, 5),
//        (23, 14, 'Kreston', 1, 'Manual Set By Testing', 1, 'manual test type', 'Kreston-test-must-delete-Agriculture, Fishing & Forestry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 1, NULL, '2019-03-16 11:24:53', '2019-03-16 11:24:53', 1, 1),
//        (24, 1, 'GTB Steel Corporation (Pvt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'GTB Steel Corporation (Pvt) Ltd-P11-Agriculture, Fishing & Forestry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-17 11:32:11', '2019-03-17 11:32:56', 1, 1),
//        (25, 15, 'Sample Co', 1, 'Manual Set By Testing', 1, 'manual test type', 'Sample Co-sc-Agriculture, Fishing & Forestry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-17 11:36:09', '2019-03-17 11:36:25', 1, 1),
//        (26, 3, 'Ramco Lanka (PVt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'Ramco Lanka (PVt) Ltd-0001-Agriculture, Fishing & Forestry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 2, NULL, '2019-03-17 12:37:17', '2019-03-17 12:37:34', 10, 10),
//        (27, 1, 'GTB Steel Corporation (Pvt) Ltd', 1, 'Manual Set By Testing', 1, 'manual test type', 'GTB Steel Corporation (Pvt) Ltd-test code 002-External Audit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 1, NULL, '2019-03-17 21:40:31', '2019-03-17 21:40:31', 1, 1),
//        (28, 1, 'GTB Steel Corporation (Pvt) Ltd', 1, 'Agriculture, Fishing & Forestry', 11, 'Business Development', 'GTB Steel Corporation (Pvt) Ltd-P12-Business Development', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.1, 0, 0, 1, NULL, '2019-03-18 09:10:59', '2019-03-18 09:10:59', 1, 1);
//        ";
//
//        DB::select($ProjectInsertQuery);
//
//        DB::select("
//            INSERT INTO `project_designations` (`id`, `project_id`, `project_designation_id`, `user_id`, `hr`, `hr_rates`, `total`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
//            (2, 3, 1, NULL, 5, 900, 4500, '2019-02-28 16:52:00', '2019-03-18 05:49:49', 1, 10),
//            (3, 3, 5, NULL, 22, 766.67, 16866.739999999998, '2019-02-28 16:52:00', '2019-02-28 16:52:00', 1, 1),
//            (4, 3, 7, NULL, 10, 383.33, 3833.2999999999997, '2019-02-28 16:52:00', '2019-02-28 16:52:00', 1, 1),
//            (5, 4, 1, NULL, 4, 766.67, 3066.68, '2019-02-28 16:56:58', '2019-02-28 16:56:58', 1, 1),
//            (6, 4, 4, NULL, 22, 766.67, 16866.739999999998, '2019-02-28 16:56:58', '2019-02-28 16:56:58', 1, 1),
//            (7, 5, 1, NULL, 5, 766.67, 3833.35, '2019-02-28 17:04:14', '2019-02-28 17:04:14', 1, 1),
//            (8, 5, 1, NULL, 8, 900, 7200, '2019-02-28 17:04:14', '2019-02-28 17:04:14', 1, 1),
//            (9, 5, 4, NULL, 15, 766.67, 11500.05, '2019-02-28 17:04:14', '2019-02-28 17:04:14', 1, 1),
//            (10, 5, 7, NULL, 12, 383.33, 4599.96, '2019-02-28 17:04:14', '2019-02-28 17:04:14', 1, 1),
//            (11, 8, 1, NULL, 10, 1091.67, 10916.7, '2019-03-01 14:51:35', '2019-03-01 14:51:35', 5, 5),
//            (12, 8, 4, NULL, 15, 756.67, 11350.05, '2019-03-01 14:51:35', '2019-03-01 14:51:35', 5, 5);
//        ");
//
//        DB::select("
//
//        INSERT INTO `project_overheads` (`id`, `project_id`, `project_cost_type_id`, `project_cost_type`, `project_cost_default`, `cost`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
//        (2, 3, 1, 'Incentives', 1, 15000, NULL, '2019-02-28 16:52:00', '2019-02-28 16:52:00', 1, 1),
//        (3, 4, 1, 'Incentives', 1, 20000, NULL, '2019-02-28 16:56:58', '2019-02-28 16:56:58', 1, 1),
//        (4, 5, 1, 'Incentives', 1, 25000, NULL, '2019-02-28 17:04:14', '2019-02-28 17:04:14', 1, 1),
//        (5, 8, 3, 'Travelling', 1, 15000, NULL, '2019-03-01 14:51:34', '2019-03-01 14:51:34', 5, 5);
//
//        ");
//
//        DB::select("
//
//        INSERT INTO `project_overheads_actual` (`id`, `project_id`, `project_cost_type_id`, `project_cost_type`, `project_cost_default`, `cost`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
//        (1, 4, 3, 'Incentives', 1, 20000, NULL, '2019-03-01 15:53:50', '2019-03-01 15:53:50', 4, 4);
//
//        ");
//
//        DB::select("
//
//        INSERT INTO `work_sheets` (`id`, `date`, `customer_id`, `customer_name`, `user_id`, `project_id`, `project_code`, `job_type_id`, `job_type`, `work_code_id`, `work_code`, `worked`, `from`, `to`, `work_hrs`, `leave_hrs`, `hr_rate`, `hr_cost`, `actual_work_hrs`, `actual_hr_cost`, `extra_work_hrs`, `remark`, `created_at`, `updated_at`) VALUES
//        (6, '2019-03-01', NULL, NULL, 3, NULL, NULL, NULL, NULL, 2, 'Half Day - Morning', 0, '08:30:00', '12:30:00', 0.00, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-01 15:47:12', '2019-03-01 15:47:12'),
//        (8, '2019-03-01', 5, NULL, 3, 5, NULL, 1, NULL, 1, 'Work', 1, '12:30:00', '18:00:00', 5.50, 0.00, 756.67, 4161.68, 5.50, 4161.68, 0.00, NULL, '2019-03-01 15:49:34', '2019-03-01 15:49:34'),
//        (9, '2019-03-01', 6, NULL, 4, 4, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '15:15:00', 6.75, 0.00, 766.67, 5175.02, 6.75, 5175.02, 0.00, NULL, '2019-03-01 16:01:54', '2019-03-01 16:01:54'),
//        (10, '2019-03-01', NULL, NULL, 4, NULL, NULL, NULL, NULL, 3, 'Half Day - Evening', 0, '15:15:00', '16:45:00', 0.00, 0.75, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-01 16:03:08', '2019-03-01 16:03:08'),
//        (11, '2019-03-01', 4, NULL, 5, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '19:00:00', 7.50, 0.00, 766.67, 5750.02, 10.50, 8050.03, 3.00, NULL, '2019-03-01 18:37:43', '2019-03-01 18:37:43'),
//        (12, '2019-03-01', 14, NULL, 2, 18, NULL, 9, NULL, 1, 'Work', 1, '08:30:00', '10:30:00', 2.00, 0.00, 900.00, 1800.00, 2.00, 1800.00, 0.00, NULL, '2019-03-01 19:36:44', '2019-03-01 19:36:44'),
//        (13, '2019-03-01', 4, NULL, 2, 3, NULL, 1, NULL, 1, 'Work', 1, '10:30:00', '12:30:00', 2.00, 0.00, 900.00, 1800.00, 2.00, 1800.00, 0.00, NULL, '2019-03-01 19:37:29', '2019-03-01 19:37:29'),
//        (14, '2019-03-01', 14, NULL, 2, 14, NULL, 5, NULL, 1, 'Work', 1, '12:30:00', '18:00:00', 3.50, 0.00, 900.00, 3150.00, 5.50, 4950.00, 2.00, NULL, '2019-03-01 19:38:19', '2019-03-01 19:38:19'),
//        (15, '2019-03-01', 6, NULL, 7, 4, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '10:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-01 19:40:06', '2019-03-01 19:40:06'),
//        (16, '2019-03-01', 14, NULL, 7, 18, NULL, 9, NULL, 1, 'Work', 1, '10:30:00', '12:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-01 19:40:30', '2019-03-01 19:40:30'),
//        (17, '2019-03-01', 5, NULL, 7, 5, NULL, 1, NULL, 1, 'Work', 1, '12:30:00', '18:00:00', 3.50, 0.00, 766.67, 2683.34, 5.50, 4216.68, 2.00, NULL, '2019-03-01 19:41:03', '2019-03-01 19:41:03'),
//        (18, '2019-03-01', 4, NULL, 6, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '16:45:00', 7.50, 0.00, 383.33, 2874.97, 8.25, 3162.47, 0.75, NULL, '2019-03-01 19:42:08', '2019-03-01 19:42:08'),
//        (20, '2019-03-03', 14, NULL, 1, 15, NULL, 6, NULL, 1, 'Work', 1, '08:30:00', '16:30:00', 7.50, 0.00, 0.00, 0.00, 8.00, 0.00, 0.50, NULL, '2019-03-03 11:22:11', '2019-03-03 11:22:11'),
//        (21, '2019-03-03', 14, NULL, 9, 17, NULL, 8, NULL, 1, 'Work', 1, '08:30:00', '18:30:00', 7.50, 0.00, 766.67, 5750.02, 10.00, 7666.70, 2.50, NULL, '2019-03-03 11:32:12', '2019-03-03 11:32:12'),
//        (22, '2019-03-04', 14, NULL, 7, 17, NULL, 8, NULL, 1, 'Work', 1, '08:30:00', '10:00:00', 1.50, 0.00, 766.67, 1150.00, 1.50, 1150.00, 0.00, NULL, '2019-03-04 16:41:26', '2019-03-04 16:41:26'),
//        (23, '2019-03-04', 5, NULL, 7, 5, NULL, 1, NULL, 1, 'Work', 1, '10:00:00', '12:30:00', 2.50, 0.00, 766.67, 1916.67, 2.50, 1916.67, 0.00, NULL, '2019-03-04 16:42:12', '2019-03-04 16:42:12'),
//        (25, '2019-03-06', NULL, NULL, 7, NULL, NULL, NULL, NULL, 4, 'Full day leave', 0, '08:30:00', '17:30:00', 0.00, 7.50, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-07 22:17:39', '2019-03-07 22:17:39'),
//        (26, '2019-03-12', NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 'Half Day - Morning', 0, '08:30:00', '17:30:00', 0.00, 7.50, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-12 21:52:58', '2019-03-12 21:52:58'),
//        (27, '2019-03-14', 4, NULL, 1, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '17:30:00', 7.50, 0.00, 0.00, 0.00, 9.00, 0.00, 1.50, NULL, '2019-03-14 19:29:34', '2019-03-14 19:29:34'),
//        (28, '2019-03-15', NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 'Half Day - Morning', 0, '08:30:00', '17:30:00', 0.00, 7.50, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-15 21:36:51', '2019-03-15 21:36:51'),
//        (29, '2019-03-15', 5, NULL, 1, 5, NULL, 1, NULL, 1, 'Work', 1, '17:30:00', '19:30:00', 2.00, 0.00, 0.00, 0.00, 2.00, 0.00, 0.00, NULL, '2019-03-15 21:37:31', '2019-03-15 21:37:31'),
//        (30, '2019-03-16', 5, NULL, 1, 5, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '18:30:00', 7.50, 0.00, 0.00, 0.00, 10.00, 0.00, 2.50, NULL, '2019-03-16 11:17:11', '2019-03-16 11:17:11'),
//        (31, '2019-03-16', 4, NULL, 10, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '10:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-16 12:02:25', '2019-03-16 12:02:25'),
//        (32, '2019-03-16', 14, NULL, 10, 14, NULL, 5, NULL, 1, 'Work', 1, '10:30:00', '12:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-16 12:02:51', '2019-03-16 12:02:51'),
//        (33, '2019-03-16', 14, NULL, 10, 14, NULL, 5, NULL, 1, 'Work', 1, '12:30:00', '13:30:00', 1.00, 0.00, 766.67, 766.67, 1.00, 766.67, 0.00, NULL, '2019-03-16 12:04:18', '2019-03-16 12:04:18'),
//        (34, '2019-03-16', 4, NULL, 4, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '10:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-16 12:29:15', '2019-03-16 12:29:15'),
//        (35, '2019-03-16', NULL, NULL, 4, NULL, NULL, NULL, NULL, 2, 'Half Day - Morning', 0, '10:30:00', '14:30:00', 0.00, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-16 12:33:46', '2019-03-16 12:33:46'),
//        (36, '2019-03-17', NULL, NULL, 8, NULL, NULL, NULL, NULL, 2, 'Half Day - Morning', 0, '08:30:00', '12:30:00', 0.00, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2019-03-17 12:23:43', '2019-03-17 12:23:43'),
//        (37, '2019-03-17', 14, NULL, 8, 14, NULL, 5, NULL, 1, 'Work', 1, '12:30:00', '14:30:00', 2.00, 0.00, 1091.67, 2183.34, 2.00, 2183.34, 0.00, NULL, '2019-03-17 12:24:03', '2019-03-17 12:24:03'),
//        (38, '2019-03-17', 4, NULL, 1, 3, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '13:30:00', 5.00, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, NULL, '2019-03-17 21:46:40', '2019-03-17 21:46:40'),
//        (39, '2019-03-19', 14, NULL, 10, 17, NULL, 1, NULL, 1, 'Work', 1, '08:30:00', '10:30:00', 2.00, 0.00, 766.67, 1533.34, 2.00, 1533.34, 0.00, NULL, '2019-03-18 08:58:23', '2019-03-18 08:58:23');
//
//        ");
    }
}
