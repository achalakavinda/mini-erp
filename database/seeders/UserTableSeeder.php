<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $UserPWD = 'Password321@';

        DB::table('users')->insert([
            [
                'id'=>2,
                'name' => 'Kasun Weerasekara',
                'img_url'=>'https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/38264075_2022161551168696_7264576597204664320_n.jpg?_nc_cat=100&_nc_oc=AQnHLu5W4kdqzlv2M2jTm4KDwB_p3vkf_SfNapc_RtSXWeUQig0uGxQluoadTd9tVvs&_nc_ht=scontent.fcmb2-1.fna&oh=0b62a6f54537731773f0ebd59258eb9f&oe=5DBD665B',
                'email' => 'kasun.weerasekera@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>3,
                'name' => 'Achala Kavinda',
                'img_url'=>'https://avatars.githubusercontent.com/u/9904044?v=4',
                'email' => 'achalakavinda25r@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>4,
                'img_url'=>'https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/27067383_10204347834653019_8612866018123647031_n.jpg?_nc_cat=103&_nc_oc=AQnRZoI3eY5geqRm3Z4-hMPavpKeriTnQP7biy6BohLqBGu8JD9irffQOndE6FLuTC4&_nc_ht=scontent.fcmb2-1.fna&oh=65f9a9aa1de298d4587c80c9d47e5a74&oe=5D7EF6E4',
                'name' => 'Hashitha Kushayne',
                'email' => 'kkushen78@gmail.com',
                'password' => bcrypt('Password321!'),
            ],
            [
                'id'=>5,
                'img_url'=>'https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/49864597_10213563125053518_2469809437347414016_n.jpg?_nc_cat=100&_nc_oc=AQmavu0y_OqPKGx3DQKOVA-aumkc34zuCs6H2zISLlxviy9EZwhlELSQdi5lv3-RjsU&_nc_ht=scontent.fcmb2-1.fna&oh=550051d9fff484b8aeea8c3790a2f1d9&oe=5D846361',
                'name' => 'Rashinda Sandaru',
                'email' => 'rashindasandaru.hal@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>6,
                'img_url'=>'https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/49864597_10213563125053518_2469809437347414016_n.jpg?_nc_cat=100&_nc_oc=AQmavu0y_OqPKGx3DQKOVA-aumkc34zuCs6H2zISLlxviy9EZwhlELSQdi5lv3-RjsU&_nc_ht=scontent.fcmb2-1.fna&oh=550051d9fff484b8aeea8c3790a2f1d9&oe=5D846361',
                'name' => 'Nimansa Athukorala',
                'email' => 'athukoralathari8@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>7,
                'img_url'=>'/storage/users/7/profile.jpg',
                'name' => 'Sachi Spencer',
                'email' => 'sachispencer@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>8,
                'img_url'=>'/storage/users/8/profile.jpg',
                'name' => 'Thimasha Pramodi',
                'email' => 'kptpramodi@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>9,
                'img_url'=>'/storage/users/9/profile.jpg',
                'name' => 'Thilini Thakshila',
                'email' => 'thilini.thakshila.tt@gmail.com',
                'password' => bcrypt($UserPWD),
            ],
            [
                'id'=>10,
                'img_url'=>'/storage/users/10/profile.jpg',
                'name' => 'Sanjana Jayamaha',
                'email' => 'sanjanajayamaha4@gmail.com',
                'password' => bcrypt('SanjanaDefault'),
            ],
            [
                'id'=>11,
                'img_url'=>'https://0.academia-photos.com/90038445/22835785/21989886/s200_medangi.bandara.jpg',
                'name' => 'Medangi Bandara',
                'email' => 'medangi01@gmail.com',
                'password' => bcrypt('MedangiDefault'),
            ]
        ]);

    }
}
