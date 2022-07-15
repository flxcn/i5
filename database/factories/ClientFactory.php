<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\CaseType;
use App\Models\Category;
use App\Models\ReferralSource;
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
        $categories = Category::all()->pluck('id')->toArray();
        $referral_sources = ReferralSource::all()->pluck('id')->toArray();
        $case_types = CaseType::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();

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
            'category_id' => $this->faker->randomElement($categories),
            'referral_source_id' => $this->faker->randomElement($referral_sources),
            'case_type_id' => $this->faker->randomElement($case_types),
            // 'author_id' => 1,
            'author_id' => $this->faker->randomElement($users),
        ];
    }
}
