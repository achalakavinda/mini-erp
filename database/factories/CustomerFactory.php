<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
     protected $model = \App\Models\Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return 
            [
            'name' => $this->faker->company(),  // assuming customer is a company or entity
            'code' => $this->faker->optional()->bothify('CUST###'),
            'contact' => $this->faker->optional()->phoneNumber(),
            'dob' => $this->faker->optional()->date('Y-m-d'),
            'contact_1' => $this->faker->optional()->phoneNumber(),
            'contact_2' => $this->faker->optional()->phoneNumber(),
            'contact_3' => $this->faker->optional()->phoneNumber(),
            'email' => $this->faker->optional()->unique()->safeEmail(),
            'file_no' => $this->faker->optional()->bothify('FILE-###'),
            'address_1' => $this->faker->optional()->address(),
            'address_2' => $this->faker->optional()->secondaryAddress(),
            'address_3' => $this->faker->optional()->city(),
            'fax_number' => $this->faker->optional()->phoneNumber(),
            'secretary_id' => null,  // You can set valid ids or null for now
            'date_of_incorporation' => $this->faker->optional()->date('Y-m-d'),
            'tin_no' => $this->faker->optional()->bothify('TIN#######'),
            'vat_no' => $this->faker->optional()->bothify('VAT#######'),
            'nic' => $this->faker->optional()->regexify('[0-9]{9}[vVxX]'),
            'passport' => $this->faker->optional()->regexify('[A-Z]{2}[0-9]{7}'),
            'ceo' => $this->faker->optional()->name(),
            'ceo_contact' => $this->faker->optional()->phoneNumber(),
            'ceo_email' => $this->faker->optional()->safeEmail(),
            'cfo' => $this->faker->optional()->name(),
            'cfo_contact' => $this->faker->optional()->phoneNumber(),
            'cfo_email' => $this->faker->optional()->safeEmail(),
            'website' => $this->faker->optional()->url(),
            'service_id' => null,  // set valid foreign keys as needed
            'sector_id' => null,
            'location' => $this->faker->optional()->city(),
            'description' => $this->faker->optional()->paragraph(),
            'created_by' => null,
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
