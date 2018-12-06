<?php

use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            [
                'id'=>1,
                'designationType' => "Partner",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'designationType' => "Director",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'designationType' => "Senior Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'designationType' => "Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'designationType' => "Assistant Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'designationType' => "Senior Executive",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'designationType' => "Executive",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>8,
                'designationType' => "Senior Audit Associate",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>9,
                'designationType' => "Accounts Associates (BPS)",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>10,
                'designationType' => "Audit Associate 1",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>11,
                'designationType' => "Audit Associate 2",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],

        ]);
    }
}
