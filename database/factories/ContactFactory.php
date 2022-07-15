<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Client;
use App\Models\User;
use App\Models\ContactType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clients = Client::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();
        $contact_types = ContactType::all()->pluck('id')->toArray();

        return [
            'client_id' => $this->faker->randomElement($clients),
            'author_id' => $this->faker->randomElement($users),
            'contact_type_id' => $this->faker->randomElement($contact_types),	
            'contact_date' => $this->faker->date(),
            'contact_summary' => $this->faker->text(1000),
        ];
    }
}
