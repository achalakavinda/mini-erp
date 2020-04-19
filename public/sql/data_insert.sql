--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img_url`, `email`, `email_verified_at`, `password`, `date_joined`, `mobile`, `residence`, `hometown_district_id`, `hometown_city`, `cmb_location_district`, `cmb_city`, `address`, `emp_no`, `epf_no`, `designation_id`, `nic`, `user_id`, `ca_agree_no`, `ca_training_period_from`, `ca_training_period_to`, `ca_training`, `basic_sal`, `epf_cost`, `etf_cost`, `allowance_cost`, `gratuity_cost`, `other_cost`, `cost`, `hr_rates`, `hr_billing_rates`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Achala Kavinda', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'achalakavinda25r@gmail.com', NULL, '$2y$10$Jq43Uuhsio7C09msEu8KNOLd/6mdQtf/jY36jVQBZMU63FeggOgya', '2020-04-19', '32132131', 'kotte', 5, 'Kotte', 1, 'Kotte', 'No 105/16 1st Lane, Pragathipura', '1001', '109687', 1, '93213213213', -999, '103350', '2020-04-01', '2020-04-30', '4', 100000, 12000, 3000, 5000, 3000, 212, 123212, 821.41, 4107.07, NULL, '2020-04-19 02:41:12', '2020-04-19 02:41:12', NULL, NULL);


--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`user_id`, `date_joined`, `mobile`, `email`, `residence`, `hometown_district_id`, `hometown_city`, `cmb_location_district`, `cmb_city`, `address`, `emp_no`, `epf_no`, `designation_id`, `nic`, `supervisor_user_id`, `ca_agree_no`, `ca_training_period_from`, `ca_training_period_to`, `ca_training`, `basic_sal`, `epf_cost`, `etf_cost`, `allowance_cost`, `gratuity_cost`, `other_cost`, `cost`, `hr_rates`, `hr_billing_rates`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, '2020-04-19', '32132131', 'achalakavinda25r@gmail.com', 'kotte', 5, 'Kotte', 1, 'Kotte', 'No 105/16 1st Lane, Pragathipura', '1001', '109687', 1, '93213213213', -999, '103350', '2020-04-01', '2020-04-30', '4', 100000, 12000, 3000, 5000, 3000, 212, 123212, 821.41, 4107.07, '2020-04-19 02:41:12', '2020-04-19 02:41:12', NULL, NULL);


--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `code`, `contact`, `contact_1`, `contact_2`, `contact_3`, `email`, `file_no`, `address_1`, `address_2`, `address_3`, `fax_number`, `secretary_id`, `date_of_incorporation`, `tin_no`, `vat_no`, `ceo`, `ceo_contact`, `ceo_email`, `cfo`, `cfo_contact`, `cfo_email`, `website`, `service_id`, `sector_id`, `location`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'GTB Steel Corporation (Pvt) Ltd', '0001', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '0001', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 3, '2020-04-01', '2312', '3213434', 'AK', '011-2770784', 'itinrtantnotes.com', 'ak', '011-2770784', 'itinenrant.com', 'sample.com', NULL, NULL, 'location', 'sample description', '2019-02-21 13:20:41', '2020-04-19 03:15:00', 1, 1),
(3, 'Ramco Lanka (PVt) Ltd', '0003', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '5145', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-21 13:21:20', '2019-02-21 13:21:20', 1, 1),
(4, 'Sabre Lanka (Pvt) Ltd', '0004', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '1227', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-28 11:17:36', '2019-02-28 11:17:36', 1, 1),
(5, 'Renuka Holdings PLC', '0005', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '610', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-28 11:18:08', '2019-02-28 11:18:08', 1, 1),
(6, 'Pettah Phamacy (Pvt) Ltd', '0002', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'admin@test.com', '106', 'Address 1', 'Address 1', 'Address 1', '1232132312', 2, '2020-04-19', '2312', '3213434', 'AK', '011-2770784', 'itinrtantnotes.com', 'ak', '011-2770784', 'itinenrant.com', 'sample.com', NULL, NULL, 'location', 'sample', '2019-02-28 11:18:26', '2020-04-19 03:15:59', 1, 1),
(9, 'Plastishells Ltd', '0006', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '1251', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 09:11:08', '2019-03-01 09:11:08', 5, 5),
(14, 'Kreston', '0007', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', 'KRIW01', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 10:06:54', '2019-03-01 10:06:54', 1, 1),
(15, 'Janet Lanka (Pvt) Ltd', '0008', '011-2770784', '011-2770784', '011-2770784', '011-2770784', 'company1@test.com', '1205', 'Sample address 1', 'sample address 2', 'sample Address 3', '1232132312', 1, '2020-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-03 15:44:25', '2019-03-03 15:44:25', 1, 1);


--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `customer_id`, `customer_name`, `code`, `sector_id`, `sector_name`, `job_type_id`, `job_type_name`, `quoted_price`, `p_y_quoted_price`, `budget_number_of_hrs`, `budget_cost_by_work`, `budget_cost_by_overhead`, `budget_revenue`, `actual_number_of_hrs`, `actual_cost_by_work`, `actual_cost_by_overhead`, `actual_revenue`, `invoicing_amount`, `receipt_amount`, `cost_variance`, `recovery_ratio`, `profit_ratio`, `close`, `invoiced`, `status_id`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
(1, 1, 'GTB Steel Corporation (Pvt) Ltd', 'GTB Steel Corporation (Pvt) Ltd-EA20Apr-19', 2, 'Construction', 1, 'External Audit', 50000, 135000, 20, 15000, 20000, 50000, 7.5, 6160.575, 55000, 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, '2020-04-19 03:30:18', '2020-04-19 03:39:12', 1, 1);

--
-- Dumping data for table `project_designations`
--

INSERT INTO `project_designations` (`id`, `project_id`, `project_designation_id`, `user_id`, `hr`, `hr_rates`, `total`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
(1, 1, 1, NULL, 5, 1000, 5000, '2020-04-19 03:32:34', '2020-04-19 03:32:34', 1, 1),
(2, 1, 10, NULL, 10, 550, 5500, '2020-04-19 03:32:34', '2020-04-19 03:32:34', 1, 1),
(3, 1, 3, NULL, 5, 900, 4500, '2020-04-19 03:32:34', '2020-04-19 03:32:34', 1, 1);


INSERT INTO `project_employees` (`project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-19 03:30:18', '2020-04-19 03:30:18');


--
-- Dumping data for table `project_overheads`
--

INSERT INTO `project_overheads` (`id`, `project_id`, `project_cost_type_id`, `project_cost_type`, `project_cost_default`, `cost`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
(1, 1, 3, 'Travelling', 1, 20000, NULL, '2020-04-19 03:32:34', '2020-04-19 03:32:34', 1, 1);


INSERT INTO `project_overheads_actual` (`id`, `project_id`, `project_cost_type_id`, `project_cost_type`, `project_cost_default`, `cost`, `remarks`, `created_at`, `updated_at`, `created_by_id`, `updated_by_id`) VALUES
(1, 1, 1, 'Travelling', 1, 20000, NULL, '2020-04-19 03:33:52', '2020-04-19 03:33:52', 1, 1),
(2, 1, NULL, 'Other Cost', 1, 35000, NULL, '2020-04-19 03:33:52', '2020-04-19 03:33:52', 1, 1);

--
-- Dumping data for table `work_sheets`
--

INSERT INTO `work_sheets` (`id`, `date`, `customer_id`, `customer_name`, `user_id`, `project_id`, `project_code`, `job_type_id`, `job_type`, `sector_id`, `sector_name`, `work_code_id`, `work_code`, `worked`, `from`, `to`, `work_hrs`, `leave_hrs`, `hr_rate`, `hr_cost`, `actual_work_hrs`, `actual_hr_cost`, `extra_work_hrs`, `remark`, `created_at`, `updated_at`) VALUES
(1, '2020-04-19', 1, NULL, 2, 1, NULL, 1, NULL, NULL, NULL, 1, 'Work', 1, '08:30:00', '16:30:00', 7.50, 0.00, 821.41, 6160.57, 8.00, 6571.28, 0.50, 'report', '2020-04-19 03:39:12', '2020-04-19 03:39:12');



