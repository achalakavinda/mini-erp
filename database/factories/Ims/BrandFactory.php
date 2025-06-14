<?php

namespace Database\Factories\Ims;


use App\Models\Ims\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            'parent_id' => null,
            'level' => 0,
            'name' => $this->faker->unique()->company, // or pull from array (see below)
            'company_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
