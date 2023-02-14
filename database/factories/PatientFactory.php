<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->freeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->address()
        ];
    }
}
