<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->email(),
            'language' => $this->faker->unique()->languageCode(),
            'address_line_1' => $this->faker->unique()->address(),
            'address_line_2' => $this->faker->unique()->address(),
            'city' => $this->faker->unique()->city(),
            'state' => $this->faker->unique()->locale(),
            'postal_code' => $this->faker->unique()->postcode(),
            'country' => $this->faker->unique()->country(),
        ];
    }
}
