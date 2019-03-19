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

        $CustomerInsertQuery = "
            INSERT INTO `customers` (`id`, `name`, `code`, `contact`, `contact_1`, `contact_2`, `contact_3`, `email`, `file_no`, `address_1`, `address_2`, `address_3`, `fax_number`, `secretary_id`, `date_of_incorporation`, `tin_no`, `vat_no`, `ceo`, `ceo_contact`, `ceo_email`, `cfo`, `cfo_contact`, `cfo_email`, `website`, `service_id`, `sector_id`, `location`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
            (1, 'GTB Steel Corporation (Pvt) Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '00015', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-21 18:50:41', '2019-02-21 18:50:41', 1, 1),
            (3, 'Ramco Lanka (PVt) Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '5145', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-21 18:51:20', '2019-02-21 18:51:20', 1, 1),
            (4, 'Sabre Lanka (Pvt) Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '1227', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-28 16:47:36', '2019-02-28 16:47:36', 1, 1),
            (5, 'Renuka Holdings PLC', NULL, NULL, NULL, NULL, NULL, NULL, '610', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-28 16:48:08', '2019-02-28 16:48:08', 1, 1),
            (6, 'Pettah Phamacy (Pvt) Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '106', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-28 16:48:26', '2019-02-28 16:48:26', 1, 1),
            (9, 'Plastishells Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '1251', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 14:41:08', '2019-03-01 14:41:08', 5, 5),
            (14, 'Kreston', NULL, NULL, NULL, NULL, NULL, NULL, 'KRIW01', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 15:36:54', '2019-03-01 15:36:54', 1, 1),
            (15, 'Janet Lanka (Pvt) Ltd', NULL, NULL, NULL, NULL, NULL, NULL, '1205', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-03 21:14:25', '2019-03-03 21:14:25', 1, 1);
          ";

        DB::select($CustomerInsertQuery);

        $UserInsertQuer = "
        
        INSERT INTO `users` (`id`, `name`, `img_url`, `email`, `email_verified_at`, `password`, `date_joined`, `mobile`, `residence`, `hometown_district_id`, `hometown_city`, `cmb_location_district`, `cmb_city`, `address`, `emp_no`, `epf_no`, `designation_id`, `nic`, `user_id`, `ca_agree_no`, `ca_training_period_from`, `ca_training_period_to`, `ca_training`, `basic_sal`, `epf_cost`, `etf_cost`, `allowance_cost`, `gratuity_cost`, `other_cost`, `cost`, `hr_rates`, `hr_billing_rates`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
        (2, 'Vipula Bandara', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'vipula@kreston.lk', NULL, '$2y$10\$LMMiUz/o2AjddJ3u6bcZoejT0dVjXjl0rNQFuIbKrvKensLb.IJIW', '2019-02-21', '+94775104903', NULL, 1, NULL, 1, NULL, NULL, '008', NULL, 1, '88012561425V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 20000, NULL, NULL, 135000, 900, 4500, 'lvc1Ie1ya1YuRYQOaDrTop75mhbojFpP8gWSvLzOWjXT6umJMVmXMMoUVLMF', '2019-02-21 18:53:58', '2019-02-21 18:53:58', NULL, NULL),
        (3, 'Sawumiya Selvaraja', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'sawumiya_selvaraja@kreston.lk', NULL, '$2y$10\$BZE6KtU9TsR5asE7navk..WLv8rC4Zty/iGCbAS4JZtdYl9G1cYt.', '2011-02-07', NULL, NULL, 1, NULL, 1, NULL, NULL, '1791', NULL, 4, '887420742V', -999, NULL, NULL, NULL, NULL, 90000, 10800, 2700, 10000, NULL, NULL, 113500, 756.67, 3783.33, 'mx1wbQY7QaExo4x2LolZsFPXZS7Viq8g4vBYdUASR0Loo2rAhq2VHOiif1AY', '2019-02-28 15:07:39', '2019-02-28 15:07:39', NULL, NULL),
        (4, 'Subodhani Perera', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'subodhani@kreston.lk', NULL, '$2y$10\$DF3M2zwtSvvkXI806iRMfuwuwn8VmiIVBp96LrZyHqhA7G8qZY/sS', '2011-02-26', NULL, NULL, 1, NULL, 1, NULL, NULL, '1713', NULL, 4, '8685425225V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, NULL, NULL, NULL, 115000, 766.67, 3833.33, '2FaevyX5byWRWmcczKWZ0zGKuEZyM4crLYmc1bpd0E5WAPUIvL6ezU7IjVK7', '2019-02-28 16:19:14', '2019-02-28 16:19:14', NULL, NULL),
        (5, 'Mazeer Mozood', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'mazeer@kreston.lk', NULL, '$2y$10\$zP53cQqnRXfhGHhCvaUjYuhRJA9PHEY1.O7nrYRlloy8yjIHIWHO2', '2014-02-25', NULL, NULL, 1, NULL, 1, NULL, NULL, '1507', NULL, 5, '884521421V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, NULL, NULL, NULL, 115000, 766.67, 3833.33, 'lE8nUoj0ftljBEXGtg9NS8tllAMCGU5fTBIhSKYAkok74ZI9FdYd4kRnIGAi', '2019-02-28 16:42:12', '2019-02-28 16:42:12', NULL, NULL),
        (6, 'Mujahid Farook', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'mujahid@kreston.lk', NULL, '$2y$10$8TJ18kwa/fsRxLvnSgf3T.GKAku6wvl6Zemry/aRLxjaVK0LrzSSe', '2014-02-02', NULL, NULL, 1, NULL, 1, NULL, NULL, '1579', NULL, 7, '89254251V', -999, NULL, NULL, NULL, NULL, 50000, 6000, 1500, NULL, NULL, NULL, 57500, 383.33, 1916.67, 'Q7Qhw7ml1srO4Ynl8eOZRrHRaOjFdHsYeJ5v0NjqqLFxGSTHHVYVd8HvMWer', '2019-02-28 16:43:29', '2019-02-28 16:43:29', NULL, NULL),
        (7, 'Rodney Balasingham', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'rodney@kreston.lk', NULL, '$2y$10\$e0ObxS3mWI6Wl.woVBCsQeMsSqwhTDcwWasMKFtoEc1hh3I6zYCQW', '1996-02-02', NULL, NULL, 1, NULL, 1, NULL, NULL, '007', NULL, 1, '75214521V', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 50000, NULL, NULL, 115000, 766.67, 3833.33, '8eB8YtecVmPm36bY5muH3NMAiRwnfJBd3KfZOlOVqVo7uoGrv0WD1aBjdgEN', '2019-02-28 16:44:54', '2019-02-28 16:44:54', NULL, NULL),
        (8, 'S Rajanathan', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'rajanathan@kreston.lk', NULL, '$2y$10\$GPxLz2O5dbAYvczpKzoCf.ro04e6h2xvZX8Tm8/C6yerhJ0oztBDe', '2019-03-01', NULL, NULL, 1, NULL, 1, NULL, NULL, '003', NULL, 1, '862512452V', -999, NULL, NULL, NULL, NULL, 125000, 15000, 3750, 20000, NULL, NULL, 163750, 1091.67, 5458.33, 'NYtk47h2NocqG57myLDtinkNZZX8nkwiuw9o30vDlr5vyZGgdIftojwQVr4p', '2019-03-01 14:22:47', '2019-03-01 14:22:47', NULL, NULL),
        (9, 'S Gokulan', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'gokulan@kreston.lk', NULL, '$2y$10\$xIMMC.6aK.4HZN611j4bc.Kf4DdvA80ksIZZ9cBhamyideE3UGMV6', '2016-03-03', NULL, NULL, 1, NULL, 1, NULL, NULL, '1802', NULL, 4, '885215241', -999, NULL, NULL, NULL, NULL, 100000, 12000, 3000, 20000, NULL, NULL, 135000, 900, 4500, NULL, '2019-03-03 20:38:54', '2019-03-03 20:38:54', NULL, NULL),
        (10, 'Sudharshani Tillekeratne', 'https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png', 'tillekeratne@kreston.lk', NULL, '$2y$10\$T6R8PstixPf5WBdTHhFOM.quOVN7zqmfe2DvNlDVoPjaUVFGMT1J.', '1990-03-03', NULL, NULL, 1, NULL, 1, NULL, NULL, '005', NULL, 1, '752145212 V', -999, NULL, NULL, NULL, NULL, 130000, 15600, 3900, 30000, NULL, NULL, 179500, 1196.67, 5983.33, NULL, '2019-03-03 20:42:32', '2019-03-03 20:42:32', NULL, NULL);
        ";

        DB::select($UserInsertQuer);
    }
}
